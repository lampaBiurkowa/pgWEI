<?php


class LoginController extends GenericController
{
    public function HandleRequest():string
    {
        if (!$this -> isFormComplete())
            return Dispatcher::GetRouteName("/login");

        $login = $_POST[Constants::POST_LOGIN_LOGIN];
        $password = $_POST[Constants::POST_LOGIN_PASSWORD];
        if (!DBHandler::LoginIfAuthorizationCorrect($login, $password))
            return Dispatcher::GetRouteName("/login");

        return Dispatcher::GetRouteName("/index");
    }

    private function isFormComplete():bool
    {
        if (empty($_POST[Constants::POST_LOGIN_LOGIN]))
            return false;
        if (empty($_POST[Constants::POST_LOGIN_PASSWORD]))
            return false;

        return true;
    }
}