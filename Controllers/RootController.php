<?php
require_once "GenericController.php";
session_start();

$route = $_GET["route"];

$controller = null;
switch ($route)
{
    case "/register":
        $controller = new RegisterController();
        break;
}

$controller -> HandleRequest();