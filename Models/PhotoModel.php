<?php

class PhotoModel
{
    private $id;
    private $author;
    private $name;
    private $title;

    public function __construct($author, $name, $title)
    {
        $this -> Create($author, $name, $title);
    }

    public function Create($author, $name, $title)
    {
        $this -> author = $author;
        $this -> name = $name;
        $this -> title = $title;
    }

    public function GetAuthor()
    {
        return $this -> author;
    }

    public function GetName()
    {
        return $this -> name;
    }

    public function GetId($id)
    {
        return $this -> id;
    }

    public function SetId($id)
    {
        $this -> id = $id;
    }

    public function GetTitle()
    {
        return $this -> title;
    }
}