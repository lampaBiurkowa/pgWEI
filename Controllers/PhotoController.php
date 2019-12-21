<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";

class PhotoController extends GenericController
{
    public $photo = null;
    public function HandleRequest():string
    {
        if (empty($_GET[Constants::GET_PHOTO]))
            return Dispatcher::GetRouteName("/photo");

        $id = $_GET[Constants::GET_PHOTO];
        $this -> photo = DBHandler::GetPhotoById($id);
        return Dispatcher::GetRouteName("/photo");
    }
}