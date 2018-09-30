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
   $params[$name]=$val;
}

// Crear clase de base de datos
// ---------------------------------------
$db = new Database();

// Ejecutar acción
// ---------------------------------------
$_class = $_controller.'Controller';
$_method = $_action.'Action';
$controllerObject = new $_class($params, $db);
$controllerObject->$_method();


die();







?>