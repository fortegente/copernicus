<?php
session_start();
include "stack.php";
$class = $_POST["class"];
$method = $_POST["method"];
$data = $_POST["data"];
//session_unset(); exit;
if(!isset($_SESSION[$class]))
{
    $obj = new $class();
    $_SESSION[$class] = serialize($obj);
} else {
    $obj = unserialize($_SESSION[$class]);
    //var_dump($obj->countStack()); exit;
}

if (method_exists($obj, $method))
{
    $obj->$method($data);
}