<!DOCTYPE HTML>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>IV Liga Pomorska</title>
        <link rel="stylesheet" href="../css/main.css">
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
                        <li><a href="/gallery">Galeria</a></li>
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
            <div id="content">
                <header>
                    <div class="commonHeader">
                        <h2>Galeria</h2>
                    </div>
                </header>
                <section>
                    <div id="bigPhoto">
                        <?= $this -> controller -> photo -> GetAuthor() ?>
                    </div>
                </section>
            </div>
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