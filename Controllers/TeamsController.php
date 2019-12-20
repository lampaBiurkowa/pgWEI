<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";

class TeamsController extends GenericController
{
    public function HandleRequest():string
    {
        return Dispatcher::GetRouteName("/teams");
    }
}