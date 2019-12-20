<?php


class ErrorController extends GenericController
{
    public function HandleRequest():string
    {
       /* if (!$exception instanceof Exception)
            return "register";

        echo $exception -> getMessage();*/

        return "error";
    }
}