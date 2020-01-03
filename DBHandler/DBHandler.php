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

    public static function AddPhoto(PhotoModel $photo)
    {
        $db = self::connect();

        $photoData = [
            "author" => $photo -> GetAuthor(),
            "extension" => $photo -> GetExtension(),
            "isPrivate" => $photo -> IsPrivate(),
            "name" => $photo -> GetName(),
            "title" => $photo -> GetTitle()
        ];

        $db -> wai -> insertOne($photoData);
        self::increasePhotoCount();
    }

    private static function increasePhotoCount()
    {
        $db = self::connect();

        $counter = $db -> wai -> findOne(["function" => "photo"]);
        if ($counter == null)
            $db -> wai -> insertOne(["function" => "photo", "count" => 1]);
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

    public static function GetPhotosUnpaginaed():array
    {
        $db = self::connect();

        $records = $db -> wai -> find() -> toArray();
        $photos = array();
        for ($i = 0; $i < count($records); $i++)
        {
            if (key_exists("author", $records[$i])) //one of unique keys
            {
                if ($records[$i]["isPrivate"] && (empty($_SESSION[Constants::SESSION_USER_LOGIN]) || $records[$i]["author"] != $_SESSION[Constants::SESSION_USER_LOGIN]))
                    continue;

                array_push($photos, $records[$i]);
            }
        }

        return $photos;
    }

    public static function GetPhotosPaginated():array
    {
        $db = self::connect();

        $records = $db -> wai -> find() -> toArray();
        $photos = array();
        $currentPhotosPerPage = 0;

        $subarray = array();
        for ($i = 0; $i < count($records); $i++)
        {
            if (key_exists("author", $records[$i])) //one of unique keys
            {
                if ($records[$i]["isPrivate"] && (empty($_SESSION[Constants::SESSION_USER_LOGIN]) || $records[$i]["author"] != $_SESSION[Constants::SESSION_USER_LOGIN]))
                    continue;

                $currentPhotosPerPage++;
                array_push($subarray, $records[$i]);
            }

            if ($currentPhotosPerPage == Constants::PAGINATION_LIMIT)
            {
                array_push($photos, $subarray);
                $currentPhotosPerPage = 0;
                $subarray = array();
            }
        }

        if (count($subarray) != 0)
            array_push($photos, $subarray);

        return $photos;
    }

    public static function GetPhotoById(string $id)
    {
        $db = self::connect();

        $photo = $db -> wai -> findOne(["_id" => new ObjectID($id)]);
        if ($photo == null)
            return null;

        return new PhotoModel($photo["author"], $photo["extension"], $photo["isPrivate"], $photo["name"], $photo["title"]);
    }

    public static function GetPhotosByTitleContainingFragment(string $fragment):array
    {
        $result = array();
        $photos = self::GetPhotosUnpaginaed();
        foreach ($photos as $photo)
            if (strpos($photo["title"], $fragment) !== false)
                array_push($result, $photo);

        return $result;
    }
}