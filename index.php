<?php

require_once "conf.php";
require_once "Database.php";

session_start();

// Ver si está logeada
// ---------------------------------------
if (!isset($_SESSION['user_name'])) {
    $_controller = "login";
} 

// Ver si llega controlador
// ---------------------------------------
if (isset($_REQUEST["c"])) {
    $_contoller = $_REQUEST["c"];
} else {
    $_controller = "login";
}

// Ver si llega acción
// ---------------------------------------
if (isset($_REQUEST["a"])) {
    $_action = $_REQUEST["a"];
} else {
    $_action = "default";
}

// Cargar controlador
// ---------------------------------------
require_once("class/Controller.php");
require_once("controllers/".$_controller.'Controller.php');

// Crear array asociativo con los parámetros
// ---------------------------------------
$params = array();
foreach ($_REQUEST as $name => $val) {
   if ($name!="a" && $name!="c") {
        $params[$name]=$val;
   }
}

// Crear clase de base de datos
// ---------------------------------------
$db = new Database();

// Crear controlador, inyectarle parámetros y conexión
// y ejecutar acción
// ---------------------------------------
$_class = $_controller.'Controller';
$_method = $_action.'Action';
$controllerObject = new $_class();
$controllerObject->setDb($db);
$controllerObject->setParams($params);
$controllerObject->setConfigutation($conf);
$controllerObject->$_method();


die();







?>