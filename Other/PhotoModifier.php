<?php

require_once "Constants.php";

class PhotoModifier
{
    public function CreateThumbnail($sourcePath, $mimeType)
    {
        if ($mimeType == Constants::FORMAT_JPG)
            $this -> createThumbnailFromJPG($sourcePath);
        else
            $this -> createThumbnailFromPNG($sourcePath);
    }

    private function createThumbnailFromJPG($sourcePath)
    {
        $baseImage = imagecreatefromjpeg($sourcePath);
        $thumbnail = $this -> getThumbnail($baseImage);
        imagejpeg($thumbnail, $this -> getDestinationPath($sourcePath, Constants::THUMBNAIL_PREFIX));
    }

    private function getThumbnail($baseImage)
    {
        $width = imagesx($baseImage);
        $height = imagesy($baseImage);

        $thumbnail = imagecreatetruecolor(Constants::THUMBNAIL_WIDTH, Constants::THUMBNAIL_HEIGHT);
        imagecopyresampled($thumbnail, $baseImage, 0, 0, 0, 0, Constants::THUMBNAIL_WIDTH, Constants::THUMBNAIL_HEIGHT, $width, $height);

        return $thumbnail;
    }

    private function getDestinationPath($sourcePath, $prefix)
    {
        $dotIndex = strrpos($sourcePath, ".");
        return substr_replace($sourcePath, $prefix, $dotIndex, 0);
    }

    private function createThumbnailFromPNG($sourcePath)
    {
        $thumbnail = $this -> getThumbnail(imagecreatefrompng($sourcePath));
        imagepng($thumbnail, $this -> getDestinationPath($sourcePath, Constants::THUMBNAIL_PREFIX));
    }

    public function CreateWaterMark($sourcePath, $mimeType, $waterMark)
    {
        if ($mimeType == Constants::FORMAT_JPG)
            $this -> createWaterMarkFromJPG($sourcePath, $waterMark);
        else
            $this -> createWaterMarkFromPNG($sourcePath, $waterMark);
    }

    private function  createWaterMarkFromJPG($sourcePath, $waterMark)
    {
        $baseImage = imagecreatefromjpeg($sourcePath);
        $newImage = $this -> getWaterMark($baseImage, $waterMark);
        imagejpeg($newImage, $this -> getDestinationPath($sourcePath, Constants::WATERMARK_PREFIX));
    }

    private function getWaterMark($baseImage, $waterMark)
    {
        $color = imagecolorallocate($baseImage, 0, 0, 0);
        imagestring($baseImage, 5, 15, 30, $waterMark, $color);
        return $baseImage;
    }

    private function  createWaterMarkFromPNG($sourcePath, $waterMark)
    {
        $baseImage = imagecreatefrompng($sourcePath);
        $newImage = $this -> getWaterMark($baseImage, $waterMark);
        imagepng($newImage, $this -> getDestinationPath($sourcePath, Constants::WATERMARK_PREFIX));
    }
}