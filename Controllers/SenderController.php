<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";
require_once "../Other/PhotoModifier.php";
require_once "../DBHandler/DBHandler.php";

class SenderController extends GenericController
{
    private $baseName = null;
    private $extension = null;

    public function HandleRequest():string
    {
        if (!$this -> isFormComplete())
            return Dispatcher::GetRouteName("/sender");

        $this -> baseName = (string)(DBHandler::GetPhotoCount() + 1);

        if (!$this -> isFileCorrect())
            return Dispatcher::GetRouteName("/sender");

        if (!$this -> trySaveFile())
            return Dispatcher::GetRouteName("/sender");

        $this -> createModifiedPhotoVersions();
        $this -> addPhotoToDB();

        return Dispatcher::GetRouteName("/sender");
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
        $sizeCorrect = true;
        $formatCorrect = true;

        if ($mimeType != Constants::FORMAT_PNG && $mimeType != Constants::FORMAT_JPG)
            $formatCorrect = false;
        if ($_FILES[Constants::FILES_SEND_FILE]["size"] > Constants::MAX_BYTES_PER_FILE)
            $sizeCorrect = false;

        if (!$sizeCorrect && !$formatCorrect)
            $_SESSION[Constants::SESSION_ID_SENDER_ERROR] = Constants::ERROR_FILE_TOO_LARGE_AND_INCORRECT;
        else if (!$sizeCorrect)
            $_SESSION[Constants::SESSION_ID_SENDER_ERROR] = Constants::ERROR_FILE_TOO_LARGE;
        else if (!$formatCorrect)
            $_SESSION[Constants::SESSION_ID_SENDER_ERROR] = Constants::ERROR_FILE_FORMAT_INCORRECT;
        else
        {
            unset($_SESSION[Constants::SESSION_ID_SENDER_ERROR]);
            return true;
        }

        return false;
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
        $this -> extension = substr($originalName, $dotIndex);
        return Constants::FILES_DEST_PATH."/".$this -> baseName.$this -> extension;
    }

    private function trySaveFile():bool
    {
        if (!move_uploaded_file($_FILES[Constants::FILES_SEND_FILE]["tmp_name"], $this -> getDestinationPath()))
        {
            $_SESSION[Constants::SESSION_ID_SENDER_ERROR] = Constants::ERROR_SAVING_FILE;
            return false;
        }

        unset($_SESSION[Constants::SESSION_ID_SENDER_ERROR]);
        return true;
    }

    private function createModifiedPhotoVersions()
    {
        $photoModifier = new PhotoModifier();
        $photoModifier -> CreateThumbnail($this -> getDestinationPath(), $this -> getMimeType($this -> getDestinationPath()));
        $waterMark = $_POST[Constants::POST_SEND_WATERMARK];
        $photoModifier -> CreateWaterMark($this -> getDestinationPath(), $this -> getMimeType($this -> getDestinationPath()), $waterMark);
    }

    private function addPhotoToDB()
    {
        $author = $_POST[Constants::POST_SEND_AUTHOR];
        $title = $_POST[Constants::POST_SEND_TITLE];

        $isPrivate = false;
        if (!empty($_POST[Constants::POST_SEND_PRIVACY]))
            $isPrivate = $_POST[Constants::POST_SEND_PRIVACY];

        DBHandler::AddPhoto(new PhotoModel($author, $this -> extension, $isPrivate, $this -> baseName, $title));
    }
}