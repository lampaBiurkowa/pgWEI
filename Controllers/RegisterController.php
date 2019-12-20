<?php

require_once "GenericController.php";
<<<<<<< HEAD
require_once "../Models/UserModel.php";
require_once "../Other/Constants.php";

class RegisterController extends GenericController
{
    public function HandleRequest():string
    {
        $user = new UserModel();
        if (!$user instanceof UserModel)
            return Dispatcher::GetRouteName("/error");

        if (empty($_POST["login"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["passwordRepeat"]))
            return Dispatcher::GetRouteName("/register");

        $login = $_POST["login"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordRepeated = $_POST["passwordRepeat"];

        if (!$this -> passwordMatches($password, $passwordRepeated))
            return Dispatcher::GetRouteName("/register");

        $user -> Create($login, $email, $password);
        $this -> register($user);

        return Dispatcher::GetRouteName("/register");
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

    public function register(UserModel $user)
    {
        if (DBHandler::TryAddUser($user))
            echo "sadads";
        else
            echo "Sraka";
=======

class RegisterController extends GenericController
{
    public function HandleRequest()
    {
        $login = $_POST["login"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    }

    public function Register($login, $email, $password)
    {

>>>>>>> a99b86bea5e27661b232227aa712399ff378068c
    }
}