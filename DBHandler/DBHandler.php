<?php

require_once "../Models/UserModel.php";
require_once "../Models/PhotoModel.php";

use MongoDB\BSON\ObjectID;

class DBHandler
{
    private static function connect()
    {
        $connection = new MongoDB\Client("mongodb://localhost:27017/wai",
            ["username" => "wai_web","password" => "w@i_w3b",]);
        return $connection -> wai;
    }

    public static function TryAddUser(UserModel $user):bool
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

    public static function GetPhotoCount():int
    {
        $db = self::connect();

        $counter = $db -> wai -> findOne(["function" => "photo"]);
        if ($counter == null)
            return 0;

        return $counter["count"];
    }

    public static function AddPhoto(PhotoModel $user)
    {
        $db = self::connect();

        $photoData = [
            "author" => $user -> GetAuthor(),
            "name" => $user -> GetName(),
            "title" => $user -> GetTitle()
        ];

        $db -> wai -> insertOne($photoData);
        self::increasePhotoCount();
    }

    private static function increasePhotoCount()
    {
        $db = self::connect();

        $counter = $db -> wai -> findOne(["function" => "photo"]);
        if ($counter == null)
            $db -> wau -> insertOne(["function" => "photo", "count" => 0]);
        else
        {
            $counter["count"]++;
            $db -> wai -> replaceOne(["_id" => new ObjectID($counter["_id"])], $counter);
        }
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