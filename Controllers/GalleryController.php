<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";
require_once "../Other/PhotoModifier.php";
require_once "../DBHandler/DBHandler.php";

class GalleryController extends GenericController
{
    public $currentPage = 0;

    public function HandleRequest():string
    {
        if (!empty($_GET[Constants::GET_PAGE]))
            $this -> currentPage = $_GET[Constants::GET_PAGE];

        return Dispatcher::GetRouteName("/gallery");
    }
}