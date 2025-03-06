<?php

class Router
{
    private $routes = [];

    public function addRoute($pattern, $controller, $method, $middlewares = [])
    {
        $patternParts = explode("/", $pattern);
        $lastPart = end($patternParts);  

        if (strpos($lastPart, "{id?}") !== false) {
           
            array_pop($patternParts); 
            $newPattern = implode("/", $patternParts); 
            $this->routes['#^' . $newPattern . '$#'] = ['controller' => $controller, 'method' => $method, 'params' => false, 'middlewares' => $middlewares];
        }

        $pattern = preg_replace_callback('/\{([^\}]+)\}/', function ($matches) {
            
            if (preg_match('/^\\\d+/', $matches[1])) {
                return '(\d+)'; 
            }
            return '([^\/]+)'; 
        }, $pattern);

        $this->routes['#^' . $pattern . '$#'] = ['controller' => $controller, 'method' => $method, 'middlewares' => $middlewares];
    }

    public function matchRoute($url)
    {
        foreach ($this->routes as $pattern => $route) {
            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                return ['controller' => $route['controller'], 'method' => $route['method'], 'params' => $matches, 'middlewares' => $route['middlewares']];
            }
        }
        return null;
    }
    public function runMiddlewares($middlewares)
    {
        foreach ($middlewares as $middleware) {
            if (method_exists('Middleware', $middleware)) {
                call_user_func(['Middleware', $middleware]);
            }
        }
    }
}

class Routers
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();
        $this->defineRoutes();
        $this->handleRequest();
    }

    private function defineRoutes()
    {
        $this->router->addRoute('', 'Main', 'index');
        $this->router->addRoute('Main', 'Main', 'index');


        // Kayıt
        $this->router->addRoute('kayit', 'Kayit', 'listele');
        $this->router->addRoute('kayit/kayitekle', 'Kayit', 'kayitekle');
        $this->router->addRoute('kayit/listele', 'Kayit', 'listele');
        $this->router->addRoute('kayit/arama', 'Kayit', 'arama');
        $this->router->addRoute('kayit/guncelleson', 'Kayit', 'guncelleson');
        $this->router->addRoute('kayit/addData', 'Kayit', 'addData');
        $this->router->addRoute('kayit/kayitguncelle/{id?}', 'Kayit', 'kayitguncelle'); // Optional
        $this->router->addRoute('kayit/kayitsil/{\d+}', 'Kayit', 'kayitsil'); // REGEX

        // Return Test Area
        $this->router->addRoute('returnTest', 'Main', 'returnTest');

        // Login Form
        $this->router->addRoute('login/Form', 'Login', 'Form');
        $this->router->addRoute('Login/accountCheck', 'Login', 'accountCheck');
        $this->router->addRoute('panel', 'Panel', 'index', ["authCheck"]); // MiddleWare
        $this->router->addRoute('panel/cikis', 'Panel', 'cikis'); //
    }

    private function handleRequest()
    {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

        $matchedRoute = $this->router->matchRoute($url);

        if ($matchedRoute) {
            $controllerName = $matchedRoute['controller'];
            $method = $matchedRoute['method'];
            $params = $matchedRoute['params'];
            $middlewares = $matchedRoute['middlewares'];
            $this->router->runMiddlewares($middlewares);

            if (file_exists("controllers/$controllerName.php")) {
                require_once "controllers/$controllerName.php";
                $controller = new $controllerName();

                if (method_exists($controller, $method)) {
                    $datas = call_user_func_array([$controller, $method], $params);
                    if(isset($datas)){
                        header('Content-type: application/json');
                        echo json_encode($datas);
                    }
                } else {
                    echo "Error: Method not found!";
                }
            } else {
                echo "Error: Controller not found!";
            }
        } else {
            echo "404 Not Found";
        }
    }
}
