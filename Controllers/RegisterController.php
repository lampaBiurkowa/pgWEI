<?php

require_once "GenericController.php";

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

    }
}