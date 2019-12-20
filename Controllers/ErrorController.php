<?php


class ErrorController extends GenericController
{
    public function HandleRequest():string
    {
        return Dispatcher::GetRouteName("/error");
    }
}