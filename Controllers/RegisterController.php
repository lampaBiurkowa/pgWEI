<?php

require_once "GenericController.php";
require_once "../Models/UserModel.php";
require_once "../Other/Constants.php";
require_once "../DBHandler/DBHandler.php";

class RegisterController extends GenericController
{
    public function HandleRequest():string
    {
        if (!$this -> isFormComplete())
            return Dispatcher::GetRouteName("/register");

        $login = $_POST[Constants::POST_REGISTER_LOGIN];
        $email = $_POST[Constants::POST_REGISTER_EMAIL];
        $password = $_POST[Constants::POST_REGISTER_PASSWORD];
        $passwordRepeated = $_POST[Constants::POST_REGISTER_REPEAT_PASSWORD];

        if (!$this -> passwordMatches($password, $passwordRepeated))
            return Dispatcher::GetRouteName("/register");

        $user = new UserModel($login, $email, password_hash($password, PASSWORD_DEFAULT));
        if (DBHandler::TryAddUser($user))
            header("Location: /login");
        else
            return Dispatcher::GetRouteName("/register");
    }

    private function isFormComplete():bool
    {
        if (empty($_POST[Constants::POST_REGISTER_LOGIN]))
            return false;
        if (empty($_POST[Constants::POST_REGISTER_EMAIL]))
            return false;
        if (empty($_POST[Constants::POST_REGISTER_PASSWORD]))
            return false;
        if (empty($_POST[Constants::POST_REGISTER_REPEAT_PASSWORD]))
            return false;

        return true;
    }

    private function passwordMatches(string $pass1, string $pass2):bool
    {
        if (strcmp($pass1, $pass2) != 0)
        {
            $_SESSION[Constants::SESSION_ID_ERROR] = Constants::ERROR_PASSWORD_NOT_MATCHING;
            return false;
        }

        return true;
    }
}