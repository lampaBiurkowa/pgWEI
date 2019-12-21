<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";

class CheckedPhotosController extends GenericController
{
    public $currentPage = 0;
    public $checkedPhotosPaginated = array();

    public function HandleRequest():string
    {
        if (!empty($_GET[Constants::GET_PAGE]))
            $this -> currentPage = $_GET[Constants::GET_PAGE];

        $this -> prepareCheckedPhotosPaginated();
        $this -> removePhotosSelected();
        return Dispatcher::GetRouteName("/gallery/checked");
    }

    private function prepareCheckedPhotosPaginated()
    {
        if (empty($_SESSION[Constants::SESSION_IMAGES_CHECKED]))
            $_SESSION[Constants::SESSION_IMAGES_CHECKED] = array();

        $this -> checkedPhotosPaginated = array();
        $allPhotos = DBHandler::GetPhotosPaginated();
        $currentPhotosPerPage = 0;
        $subarray = array();
        foreach ($allPhotos as $collection)
            foreach ($collection as $photo)
                if (in_array($photo["_id"], $_SESSION[Constants::SESSION_IMAGES_CHECKED]))
                {
                    $currentPhotosPerPage++;
                    array_push($subarray, $photo);

                    if ($currentPhotosPerPage == Constants::PAGINATION_LIMIT)
                    {
                        array_push($this -> checkedPhotosPaginated, $subarray);
                        $subarray = array();
                        $currentPhotosPerPage = 0;
                    }
                }

        array_push($this -> checkedPhotosPaginated, $subarray);
    }

    private function removePhotosSelected()
    {
        $deleted = false;
        foreach ($this -> checkedPhotosPaginated as $collection)
            foreach ($collection as $photo)
                if (!empty($_POST[(string)$photo["_id"]]) && $_POST[(string)$photo["_id"]])
                {
                    $this -> removePhotoFromChecked((string)$photo["_id"]);
                    $deleted = true;
                }

        if ($deleted)
            $this -> prepareCheckedPhotosPaginated();
    }

    private function removePhotoFromChecked(string $photoId)
    {
        if (in_array($photoId, $_SESSION[Constants::SESSION_IMAGES_CHECKED]))
        {
            $key = array_search($photoId, $_SESSION[Constants::SESSION_IMAGES_CHECKED]);
            unset($_SESSION[Constants::SESSION_IMAGES_CHECKED][$key]);
        }
    }
}