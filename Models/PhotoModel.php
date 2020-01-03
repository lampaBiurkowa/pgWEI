<?php

class PhotoModel
{
    private $id;
    private $author;
    private $extension;
    private $isPrivate;
    private $name;
    private $title;

    public function __construct($author, $extension, $isPrivate, $name, $title)
    {
        $this -> Create($author, $extension, $isPrivate, $name, $title);
    }

    public function Create($author, $extension, $isPrivate, $name, $title)
    {
        $this -> author = $author;
        $this -> extension = $extension;
        $this -> isPrivate = $isPrivate;
        $this -> name = $name;
        $this -> title = $title;
    }

    public function GetAuthor():string
    {
        return $this -> author;
    }

    public function GetExtension():string
    {
        return $this -> extension;
    }

    public function GetName():string
    {
        return $this -> name;
    }

    public function GetId($id):string
    {
        return $this -> id;
    }

    public function SetId($id)
    {
        $this -> id = $id;
    }

    public function IsPrivate():bool
    {
        return $this -> isPrivate;
    }

    public function GetTitle():string
    {
        return $this -> title;
    }
}