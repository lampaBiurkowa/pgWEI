<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";
require_once "../Other/PhotoModifier.php";
require_once "../DBHandler/DBHandler.php";

class GalleryController extends GenericController
{
    private $baseName = null;

    public function HandleRequest():string
    {
        if (!$this -> isFormComplete())
            return Dispatcher::GetRouteName("/gallery");

        $this -> baseName = (string)(DBHandler::GetPhotoCount() + 1);

        if (!$this -> isFileCorrect())
            return Dispatcher::GetRouteName("/gallery");

        if (!$this -> trySaveFile())
            return Dispatcher::GetRouteName("/gallery");

        $this -> createModifiedPhotoVersions();

        DBHandler::AddPhoto(new PhotoModel($_POST[Constants::POST_SEND_AUTHOR], $this -> baseName, $_POST[Constants::POST_SEND_TITLE]));

        return Dispatcher::GetRouteName("/gallery");
    }

    private function isFormComplete():bool
    {
        if (empty($_POST[Constants::POST_SEND_AUTHOR]))
            return false;
        if (empty($_FILES[Constants::FILES_SEND_FILE]))
            return false;
        if (empty($_POST[Constants::POST_SEND_TITLE]))
            return false;
        if (empty($_POST[Constants::POST_SEND_WATERMARK]))
            return false;

        return true;
    }

    private function isFileCorrect():bool
    {
        $mimeType = $this -> getMimeType($_FILES[Constants::FILES_SEND_FILE]["tmp_name"]);
        if ($mimeType != Constants::FORMAT_PNG && $mimeType != Constants::FORMAT_JPG)
        {
            $_SESSION[Constants::SESSION_ID_ERROR] = Constants::ERROR_FILE_FORMAT_INCORRECT;
            return false;
        }

        if ($_FILES[Constants::FILES_SEND_FILE]["size"] > Constants::MAX_BYTES_PER_FILE)
        {
            $_SESSION[Constants::SESSION_ID_ERROR] = Constants::ERROR_FILE_TOO_LARGE;
            return false;
        }

        return true;
    }

    private function getMimeType($filePath):string
    {
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        return finfo_file($fileInfo, $filePath);
    }

    private function getDestinationPath():string
    {
        $originalName = $_FILES[Constants::FILES_SEND_FILE]["name"];
        $dotIndex = strrpos($originalName, ".");
        $extension = substr($originalName, $dotIndex);
        return Constants::FILES_DEST_PATH."/".$this -> baseName.$extension;
    }

    private function trySaveFile():bool
    {
        if (!move_uploaded_file($_FILES[Constants::FILES_SEND_FILE]["tmp_name"], $this -> getDestinationPath()))
        {
            $_SESSION[Constants::SESSION_ID_ERROR] = Constants::ERROR_SAVING_FILE;
            return false;
        }

        return true;
    }

    private function createModifiedPhotoVersions()
    {
        $photoModifier = new PhotoModifier();
        $photoModifier -> CreateThumbnail($this -> getDestinationPath(), $this -> getMimeType($this -> getDestinationPath()));
        $waterMark = $_POST[Constants::POST_SEND_WATERMARK];
        $photoModifier -> CreateWaterMark($this -> getDestinationPath(), $this -> getMimeType($this -> getDestinationPath()), $waterMark);
    }
}