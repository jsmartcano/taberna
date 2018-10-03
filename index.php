<?php

require_once "conf.php";
require_once "./class/Database.php";
require_once "./class/App.php";

session_start();

// Ver si está logeada
// ---------------------------------------
if (!isset($_SESSION['user_name'])) {
    $_c = "login";
} 

// Ver si llega controlador
// ---------------------------------------
if (isset($_REQUEST["c"])) {
    $_c = $_REQUEST["c"];
} else {
    $_c = "login";
}

// Ver si llega acción
// ---------------------------------------
if (isset($_REQUEST["a"])) {
    $_a= $_REQUEST["a"];
} else {
    $_a = "default";
}

// Crear array asociativo con los parámetros
// ---------------------------------------
$params = array();
foreach ($_REQUEST as $name => $val) {
   if ($name!="a" && $name!="c") {
        $params[$name]=$val;
   }
}

// Configurar APP
// ----------------------------------------------------------
App::setParams($params);
App::setConf($conf);
App::setDataBase(new Database());

// Cargar controlador
// ---------------------------------------
$controller = App::getController($_c);
$_method = $_a.'Action';
$controller->$_method();

die();







?>