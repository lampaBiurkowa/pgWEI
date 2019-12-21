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

        if (empty($_SESSION[Constants::SESSION_IMAGES_CHECKED]))
            $_SESSION[Constants::SESSION_IMAGES_CHECKED] = array();

        $this -> getCheckedPhotos();
        return Dispatcher::GetRouteName("/gallery");
    }

    private function getCheckedPhotos()
    {
        $photos = DBHandler::GetPhotosPaginated();
        foreach ($photos as $collection)
            foreach ($collection as $photo)
                if (!empty($_POST[(string)$photo["_id"]]) && $_POST[(string)$photo["_id"]])
                    $this -> addPhotoToChecked((string)$photo["_id"]);
    }

    private function addPhotoToChecked(string $photoId)
    {
        if (!in_array($photoId, $_SESSION[Constants::SESSION_IMAGES_CHECKED]))
            array_push($_SESSION[Constants::SESSION_IMAGES_CHECKED], $photoId);
    }
}