<?php
    require_once "../Other/Constants.php";
?>

<!DOCTYPE HTML>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>IV Liga Pomorska</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../jsui/jquery-ui.min.css">
    </head>
    <body>
        <header>
            <nav>
                <div id="mainNav">
                    <ol>
                        <li><a id="mainHeader" href="/index"><span id="mainHeaderText">IV Liga Pomorska</span></a></li>
                        <li><a href="/questions">Ankieta</a></li>
                        <li>
                            <a href="#">Statystyki</a>
                            <ul>
                                <li><a href="/table">Tabele</a></li>
                                <li><a href="/strikers">Strzelcy</a></li>
                                <li><a href="/teams">Drużyny</a></li>
                            </ul>
                            <div style="clear:both"></div>
                        </li>
                        <li>
                            <a href="/gallery">Galeria</a>
                            <ul>
                                <li><a href="/gallery">Zdjęcia</a></li>
                                <li><a href="/gallery/checked">Wybrane zdjęcia</a></li>
                                <li><a href="/sender">Wyślij zdjęcie</a></li>
                                <li><a href="/gallery/browser">Wyszukiwarka</a></li>
                            </ul>
                            <div style="clear:both"></div>
                        </li>
                        <?php
                        if (empty($_SESSION[Constants::SESSION_USER_LOGGED]) || !$_SESSION[Constants::SESSION_USER_LOGGED])
                            echo '<li><a href="/login">Zaloguj</a></li>';
                        else
                            echo '<li><a href="/logout">Wyloguj</a></li>';
                        ?>
                    </ol>
                    <div style="clear:both"></div>
                </div>
            </nav>
        </header>
        <main>
            <header>
                <div class="commonHeader">
                    <h2>Rejestracja</h2>
                </div>
            </header>
            <section>
                <form class="commonForm" method="POST" action="/register">
                    <header>
                        <div class="commonHeader">
                            <h3>Zarejestruj się</h3>
                        </div>
                    </header>
                    <div class="inputLabel inputArea">
                        <label for="loginInput">Login</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="text" name="<?= Constants::POST_REGISTER_LOGIN ?>" id="loginInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="emailInput">E-mail:</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="email" name="<?= Constants::POST_REGISTER_EMAIL ?>" id="emailInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="passwordInput">Hasło</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="password" name="<?= Constants::POST_REGISTER_PASSWORD ?>" id="passwordInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="repeatPasswordInput">Powtórz hasło</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="password" name="<?= Constants::POST_REGISTER_REPEAT_PASSWORD ?>" id="repeatPasswordInput">
                    </div>

                    <button class="commonButton">Zarejestruj</button>
                    <button type="reset" class="commonButton">Wyczyść</button>
                    <?php
                        if (!empty($_SESSION[Constants::SESSION_ID_REGISTRATION_ERROR]))
                            echo $_SESSION[Constants::SESSION_ID_REGISTRATION_ERROR];
                    ?>
                </form>
            </section>
        </main>
        <footer>
            <div id="footer">
                <div class="footerItem">
                    <div class="footerItemImg">
                        <img src="../img/wai.png" alt="WAI">
                    </div>
                    <div class="footerItemDesc">
                        Wytwarzanie aplikacji internetowych
                    </div>
                </div>
                <div class="footerItem">
                    <div class="footerItemImg">
                        <img src="../img/change.png" alt="s180182">
                    </div>
                    <div class="footerItemDesc">
                        s180182
                    </div>
                </div>
                <div class="footerItem">
                    <a href="mailto:s180182@student.pg.edu.pl">
                        <div class="footerItemImg">
                            <img src="../img/contact.png" alt="Kontakt">
                        </div>
                        <div class="footerItemDesc">
                            Kontakt
                        </div>
                    </a>
                </div>
                <div class="footerItem">
                    <div class="footerItemImg">
                        <img src="../img/like.png" alt="Poleć nas">
                    </div>
                    <div class="footerItemDesc">
                        Poleć nas
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
        </footer>
    </body>
</html>