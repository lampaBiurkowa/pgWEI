<?php

require_once "Models/UserModel.php";
use MongoDB\BSON\ObjectID;

class DBHandler
{
    private static function connect()
    {
        $connection = new MongoDB\Client("mongodb://localhost:27017/wai",
            ['username' => 'wai_web','password' => 'w@i_w3b',]);
        return $connection -> wai;
    }

    public static function TryAddUser(UserModel $user)
    {
        $db = self::connect();

        $userData = [
            "login" => $user -> GetLogin(),
            "email" => $user -> GetEmail(),
            "password" => $user -> GetPassword(),
            "_id" => $user -> GetId()
        ];
        if ($db -> wai -> findOne(["login" => $user -> GetLogin()]) != null)
            return false;

        $db -> wai -> insertOne($userData);
        return true;
    }
}