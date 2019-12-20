<?php


class Constants
{
    const SESSION_ID_ERROR = "app_error";
    const SESSION_USER_LOGIN = "userLogin";
    const SESSION_USER_EMAIL = "userEmail";
    const SESSION_USER_LOGGED = "userLogged";

    const POST_REGISTER_LOGIN = "PRLogin";
    const POST_REGISTER_EMAIL = "PREmail";
    const POST_REGISTER_PASSWORD = "PRPassword";
    const POST_REGISTER_REPEAT_PASSWORD = "PRRepeat";

    const POST_LOGIN_LOGIN = "PLLogin";
    const POST_LOGIN_PASSWORD = "PLPassword";

    const ERROR_PASSWORD_NOT_MATCHING = "Hasła nie są takie same!";
    const ERROR_LOGIN_ALREADY_EXISTS = "Użytkownik o tym loginie już istnieje!";
    const ERROR_LOGIN_INCORRECT = "Błędny login!";
    const ERROR_PASSWORD_INCORRECT = "Błędne hasło!";
}