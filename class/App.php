<?php

require_once "./class/Configuration.php";
require_once "./class/Database.php";
require_once "./class/Controller.php";

abstract class App {
    public static $db = null;
    public static $params = array();
    public static $conf = array();

    // --------------------------------------------------
    public static function start() {
        session_start();
        self::createParams(); 
        $conf = new Configuration();     
        self::$conf = $conf->getConfiguration();
        self::$db = new Database();

        // var_dump(self::$params);
        // var_dump(self::$db);
        // var_dump(self::$conf);
        // var_dump($_SESSION);

        // Casos especiales
        // Si está logueado y llega a login, si la acción no es logout, siempre va a panel
        if (isset($_SESSION["user_id"]) && self::$params["c"]=="login") {
            if (self::$params["a"] != "logout") {
                header("Location:index.php?c=panel&a=default");
                die();
            }
        }

        // Si no está logueado y va a cualquier lado, va a login
        if (!isset($_SESSION["user_id"]) && self::$params["c"]!="login") {
            header("Location:index.php?c=login&a=default");
            die();
        }

        // Si no se cumplen estos casos, la ejecución continua
        $controller = self::getController(self::$params["c"]);
        $_method = self::$params["a"].'Action';
        $controller->$_method();
    }

    // --------------------------------------------------
    public static function createParams() {
        $arr = array();
        foreach ($_REQUEST as $name => $val) {
            $arr[$name]=$val;
        }
        if (!isset($arr['c'])) {
            $arr['c']='login';
        }
        if (!isset($arr['a'])) {
            $arr['a']='default';
        }
        self::$params = $arr;
    }

    public static function getVersion(){
        return "1.0.0";
    }

    public static function getParam($_param) {
        $result = "";
        if (isset(self::$params[$_param])) {
            $result = self::$params[$_param];
        }
        return $result;
    }

    public static function getController($name) {
        $result = null;
        $c = "./controllers/".$name."Controller.php";
        if (file_exists($c)) {
            require_once($c);
            $class = $name."Controller";
            $controller = new $class();
            $result = $controller;
        }
        return $result;
    }

    public static function getModel($name) {
        $result = null;
        $c = "./models/".$name.".php";
        if (file_exists($c)) {
            require_once($c);
            $class = $name;
            $model = new $class();
            $result = $model;
        } else {
            die("No se encuentra el modelo ".$c);
        }
        return $result;
    }

    
}

?>