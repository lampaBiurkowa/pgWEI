<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";

class LogoutController extends GenericController
{
    public function HandleRequest():string
    {
        $_SESSION[Constants::SESSION_USER_LOGGED] = false;
        unset($_SESSION[Constants::SESSION_USER_LOGIN]);
        unset($_SESSION[Constants::SESSION_USER_EMAIL]);
        return Dispatcher::GetRouteName("/index");
    }
}