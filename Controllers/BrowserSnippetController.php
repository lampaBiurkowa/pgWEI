<?php
require_once "GenericController.php";
require_once "../Other/Dispatcher.php";

class BrowserSnippetController extends GenericController
{
    public $output = "";
    public function HandleRequest():string
    {
        $fragment = null;
        if (!empty($_GET[Constants::AJAX_SEARCH]))
            $fragment = $_GET[Constants::AJAX_SEARCH];
        else
            return Dispatcher::GetRouteName("/gallery/browserSnippet");

        $photos = DBHandler::GetPhotosByTitleContainingFragment($fragment);
        $this -> output = '<div class="gallery">';
        if (count($photos) == 0)
            $this -> output .= '<div class="noResults">Nie znaleziono pasujących wyników :D</div>';
        else
        {
            foreach ($photos as $photo)
            {
                $this -> output .= '
                <div class="imgTile">
                    <a href="/photo?'.Constants::GET_PHOTO.$photo["_id"].'">
                        <img src="../images/'.$photo["name"].Constants::THUMBNAIL_PREFIX.$photo["extension"].'" alt="'.$photo["title"].'">
                    </a><br/>
                    Autor:'.$photo["author"].'<br/>
                    Tytuł:'.$photo["title"].'<br/>';

                if ($photo["isPrivate"])
                    $this -> output .= "(prywatne)";
                $this -> output .= "</div>";
            }
        }
        $this -> output .= '<div style="clear:both"></div></div>';

        return Dispatcher::GetRouteName("/gallery/browserSnippet");
    }
}