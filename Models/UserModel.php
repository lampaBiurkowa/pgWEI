<?php


class UserModel
{
    private $email;
    private $id;
    private $login;
    private $password;

    public function Create($email, $login, $password)
    {
        $this -> email = $email;
        $this -> login = $login;
        $this -> password = $password;
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

    public function GetPassword()
    {
        return $this -> password;
    }
}