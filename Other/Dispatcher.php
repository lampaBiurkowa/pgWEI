<?php
require_once "../Controllers/GenericController.php";
require_once "../Controllers/RegisterController.php";

class Dispatcher
{
    private static $routing = [
    "/" => "Login",
    "/login" => "Login",
    "/register" => "Register",
    "/error" => "Error",
    ];
    const REDIRECT_PREFIX = "redirect:";

    public function __construct()
    {
        session_start();

        $actionUrl = $_GET["action"];
        $viewName = $this -> getViewName($actionUrl);
        $this -> handleResponse($viewName);
    }

    public static function GetRouteName($route) : string
    {
        $controllerName = null;
        if (array_key_exists($route, self::$routing))
            $controllerName = self::$routing[$route];
        else
            $controllerName = self::$routing["/error"];

        return $controllerName;
    }

    function getViewName(string $actionUrl):string
    {
        $controller = null;
        $controllerName = self::GetRouteName($actionUrl)."Controller";

        try
        {
            $controller = new $controllerName();
        }
        catch (Exception $e)
        {
            return self::$routing["/error"];
        }
        if (!$controller instanceof GenericController)
            return self::$routing["/error"];

        return $controller -> HandleRequest();
    }

    function handleResponse($viewName)
    {
        if (strpos($viewName, self::REDIRECT_PREFIX) === 0)
        {
            $url = substr($viewName, strlen(self::REDIRECT_PREFIX));
            header("Location: " . $url);
            exit;
        }
        else
            $this -> render($viewName);
    }

    function render($viewName)
    {
        include "../Views/".$viewName.".php";
    }
}