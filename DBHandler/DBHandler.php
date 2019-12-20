<?php

require_once "../Models/UserModel.php";

class DBHandler
{
    private static function connect()
    {
        $connection = new MongoDB\Client("mongodb://localhost:27017/wai",
            ["username" => "wai_web","password" => "w@i_w3b",]);
        return $connection -> wai;
    }

    public static function TryAddUser(UserModel $user)
    {
        $db = self::connect();

        $userData = [
            "login" => $user -> GetLogin(),
            "email" => $user -> GetEmail(),
            "password" => $user -> GetHashedPassword()
        ];
        if ($db -> wai -> findOne(["login" => $user -> GetLogin()]) != null)
        {
            $_SESSION[Constants::SESSION_ID_ERROR] = Constants::ERROR_LOGIN_ALREADY_EXISTS;
            return false;
        }

        $db -> wai -> insertOne($userData);
        return true;
    }

    public static function LoginIfAuthorizationCorrect(string $login, string $password):bool
    {
        $db = self::connect();

        $user = $db -> wai -> findOne(["login" => $login]);
        if ($user == null)
        {
            $_SESSION[Constants::SESSION_ID_ERROR] = Constants::ERROR_LOGIN_INCORRECT;
            return false;
        }

        if (!password_verify($password, $user["password"]))
        {
            $_SESSION[Constants::SESSION_ID_ERROR] = Constants::ERROR_PASSWORD_INCORRECT;
            return false;
        }

        $_SESSION[Constants::SESSION_USER_LOGGED] = true;
        $_SESSION[Constants::SESSION_USER_LOGIN] = $user["login"];
        $_SESSION[Constants::SESSION_USER_EMAIL] = $user["email"];
        return true;
    }
}