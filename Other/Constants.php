<?php


class Constants
{
    const SESSION_ID_LOGIN_ERROR = "errorLogin";
    const SESSION_ID_REGISTRATION_ERROR = "errorRegistration";
    const SESSION_ID_SENDER_ERROR = "errorSender";
    const SESSION_USER_LOGIN = "userLogin";
    const SESSION_USER_EMAIL = "userEmail";
    const SESSION_USER_LOGGED = "userLogged";
    const SESSION_IMAGES_CHECKED = "imagesChecked";

    const POST_REGISTER_LOGIN = "PRLogin";
    const POST_REGISTER_EMAIL = "PREmail";
    const POST_REGISTER_PASSWORD = "PRPassword";
    const POST_REGISTER_REPEAT_PASSWORD = "PRRepeat";

    const POST_LOGIN_LOGIN = "PLLogin";
    const POST_LOGIN_PASSWORD = "PLPassword";

    const POST_SEND_AUTHOR = "PSAuthor";
    const POST_SEND_PRIVACY = "PSPrivacy";
    const POST_SEND_TITLE = "PSTitle";
    const POST_SEND_WATERMARK = "PSWaterMark";
    const FILES_SEND_FILE = "FSFile";

    const POST_VALUE_SEND_PRIVATE_TRUE = true;
    const POST_VALUE_SEND_PRIVATE_FALSE = false;

    const AJAX_SEARCH = "ASearch";
    const AJAX_TARGET_DIV_ID = "ATarget";

    const ERROR_DB = "Błąd bazy danych :)";
    const ERROR_PASSWORD_NOT_MATCHING = "Hasła nie są takie same!";
    const ERROR_LOGIN_ALREADY_EXISTS = "Użytkownik o tym loginie już istnieje!";
    const ERROR_LOGIN_INCORRECT = "Błędny login!";
    const ERROR_PASSWORD_INCORRECT = "Błędne hasło!";
    const ERROR_FILE_FORMAT_INCORRECT = "Błędny format pliku! Wybierz .jpg lub .png";
    const ERROR_FILE_TOO_LARGE = "Zbyt duży rozmar pliku! Maksymalny rozmiar pliku to 1 MiB.";
    const ERROR_FILE_TOO_LARGE_AND_INCORRECT = "Błędny format i rozmiar pliku.";
    const ERROR_SAVING_FILE = "Nie udało się zapisać pliku.";

    const FORMAT_PNG = "image/png";
    const FORMAT_JPG = "image/jpeg";
    const MAX_BYTES_PER_FILE = 1048576; //1 MiB
    const FILES_DEST_PATH = "/var/www/dev/src/web/images";

    const THUMBNAIL_WIDTH = 200;
    const THUMBNAIL_HEIGHT = 125;
    const THUMBNAIL_PREFIX = "_min";
    const WATERMARK_PREFIX = "_wm";

    const PAGINATION_LIMIT = 9;

    const GET_PAGE = "GPage";
    const GET_PHOTO = "GPhoto";
}