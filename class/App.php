<?php

require_once "./class/Controller.php";

abstract class App {
    public static $db = null;
    public static $params = array();
    public static $conf = array();
  
    public static function getVersion(){
        return "1.0.0";
    }

    public static function setDataBase($_db){
        self::$db = $_db;
    }

    public static function setParams($_params){
        self::$params = $_params;
    }

    public static function setConf($_conf){
        self::$conf = $_conf;
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