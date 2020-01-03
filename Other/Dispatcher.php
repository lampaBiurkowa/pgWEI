<?php
require_once "../Controllers/GenericController.php";
require_once "../Controllers/BrowserController.php";
require_once "../Controllers/BrowserSnippetController.php";
require_once "../Controllers/CheckedPhotosController.php";
require_once "../Controllers/ErrorController.php";
require_once "../Controllers/GalleryController.php";
require_once "../Controllers/IndexController.php";
require_once "../Controllers/LoginController.php";
require_once "../Controllers/LogoutController.php";
require_once "../Controllers/PhotoController.php";
require_once "../Controllers/RegisterController.php";
require_once "../Controllers/QuestionsController.php";
require_once "../Controllers/SenderController.php";
require_once "../Controllers/StrikersController.php";
require_once "../Controllers/TableController.php";
require_once "../Controllers/TeamsController.php";

class Dispatcher
{
    private static $routing = [
        "/" => "Login",
        "/gallery/browser" => "Browser",
        "/gallery/browserSnippet" => "BrowserSnippet",
        "/gallery/checked" => "CheckedPhotos",
        "/error" => "Error",
        "/gallery" => "Gallery",
        "/index" => "Index",
        "/login" => "Login",
        "/logout" => "Logout",
        "/questions" => "Questions",
        "/photo" => "Photo",
        "/register" => "Register",
        "/sender" => "Sender",
        "/strikers" => "Strikers",
        "/table" => "Table",
        "/teams" => "Teams"
    ];
    const REDIRECT_PREFIX = "redirect:"; //TODO ?
    private $controller = null;

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
        $controllerName = self::GetRouteName($actionUrl)."Controller";

        try
        {
            $this -> controller = new $controllerName();
        }
        catch (Exception $e)
        {
            return self::$routing["/error"];
        }
        if (!$this -> controller instanceof GenericController)
            return self::$routing["/error"];

        return $this -> controller -> HandleRequest();
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