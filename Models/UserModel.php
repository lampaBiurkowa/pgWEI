<?php


class UserModel
{
    private $email;
    private $id;
    private $login;
    private $hashedPassword;

    public function __construct($login, $email, $hashedPassword)
    {
        $this -> Create($login, $email, $hashedPassword);
    }

    public function Create($login, $email, $hashedPassword)
    {
        $this -> email = $email;
        $this -> login = $login;
        $this -> hashedPassword = $hashedPassword;
    }

    public function GetEmail()
    {
        return $this -> email;
    }

    public function GetId()
    {
        return $this -> id;
    }

    public function SetId($id)
    {
        $this -> id = $id;
    }

    public function GetLogin()
    {
        return $this -> login;
    }

    public function GetHashedPassword()
    {
        return $this -> hashedPassword;
    }
}