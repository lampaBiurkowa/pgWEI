<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";

class QuestionsController extends GenericController
{
    public function HandleRequest():string
    {
        return Dispatcher::GetRouteName("/questions");
    }
}