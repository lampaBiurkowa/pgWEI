<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";

class GalleryController extends GenericController
{
    public function HandleRequest():string
    {
        if (!$this -> isFormComplete())
            return Dispatcher::GetRouteName("/gallery");

        if (!$this -> isFileCorrect())
            return Dispatcher::GetRouteName("/gallery");

        $this -> trySaveFile();
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
        $mimeType = $this -> getMimeType();
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

    private function getMimeType():string
    {
        $file = $_FILES[Constants::FILES_SEND_FILE];
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileName = $file["tmp_name"];
        return finfo_file($fileInfo, $fileName);
    }

    private function trySaveFile():bool
    {
        $file = $_FILES[Constants::FILES_SEND_FILE];

        $destinationPath = Constants::FILES_DEST_PATH."/".basename($file["name"]);
        if (!move_uploaded_file($file["tmp_name"], $destinationPath))
        {
            $_SESSION[Constants::SESSION_ID_ERROR] = Constants::ERROR_SAVING_FILE;
            return false;
        }

        return true;
    }
}