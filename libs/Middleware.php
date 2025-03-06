<?php
class Middleware
{
    public static function authCheck()
    {
        session_start();
        if (!isset($_SESSION['kulad'])) {
            header('Location: ' . URL . '/login/Form');
            exit();
        }
    }
}
?>