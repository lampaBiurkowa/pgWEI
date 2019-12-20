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
                        <li><a id="mainHeader" href="Index.html"><span id="mainHeaderText">IV Liga Pomorska</span></a></li>
                        <li><a href="Questions.html">Ankieta</a></li>
                        <li><a href="Teams.html">Drużyny</a></li>
                        <li>
                            <a href="#">Statystyki</a>
                            <ul>
                                <li><a href="Table.html">Tabele</a></li>
                                <li><a href="Strikers.html">Strzelcy</a></li>
                            </ul>
                            <div style="clear:both"></div>
                        </li>
                        <li><a href="Gallery.html">Galeria</a></li>
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
                <form class="commonForm" method="POST" action="../Controllers/RootController.php">
                    <input type="hidden" name="route" value="/register"/>
                    <header>
                        <div class="commonHeader">
                            <h3>Zarejestruj się</h3>
                        </div>
                    </header>
                    <div class="inputLabel inputArea">
                        <label for="loginInput">Login</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="text" name="login" id="loginInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="emailInput">E-mail:</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="email" name="email" id="emailInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="passwordInput">Hasło</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="password" name="password" id="passwordInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="repeatPasswordInput">Powtórz hasło</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="password" name="passwordRepeat" id="repeatPasswordInput">
                    </div>

                    <button class="commonButton">Zarejestruj</button>
                    <button type="reset" class="commonButton">Wyczyść</button>
                    <?php
                        if (!empty($_SESSION[Constants::SESSION_ID_ERROR]))
                            echo $_SESSION[Constants::SESSION_ID_ERROR];
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