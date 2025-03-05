<?php

class boots
{


	function __construct()
	{

		$url = isset($_GET["url"]) ? $_GET["url"] : null;

		$url = rtrim($url, '/');

		$url = explode('/', $url);

		// eğer kontrolcü yazılmaz ise varsayılan olaran ana kontrolücü çalışyıorum.
		if (empty($url[0])) {
			require 'controllers/Main.php';
			$controller = new Main();
		} else {
			$file = 'controllers/' . $url[0] . '.php';

			
			if (file_exists($file)) {
				require $file;
				$controller = new $url[0];
			} else {
				require 'controllers/error.php';
			}
		}


		if (isset($url[2])){
			$controller->{$url[1]}($url[2]);
		}else{
			if (isset($url[1])){
				$controller->{$url[1]}();
			}
		}
	}
}
