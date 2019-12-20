<?php
<<<<<<< HEAD
require "../vendor/autoload.php";
require_once  "../Other/Dispatcher.php";

$dispatcher = new Dispatcher();
=======
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
>>>>>>> a99b86bea5e27661b232227aa712399ff378068c
