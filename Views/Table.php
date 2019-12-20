<!DOCTYPE HTML>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>IV Liga Pomorska</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/stats.css">
        <script src="../js/jq.js"></script>
        <script src="../js/table.js"></script>
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
                        if (empty($_SESSION[Constants::SESSION_USER_LOGGED]) || $_SESSION[Constants::SESSION_USER_LOGGED])
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
                    <h2>Tabela</h2>
                </div>
            </header>
            <section>
                <div id="leagueTableContainer">
                    <table id="leagueTable">
                        <tr>
                            <th>Miejsce</th>
                            <th>Drużyna</th>
                            <th>Mecze</th>
                            <th>Punkty</th>
                        </tr>
                        <tr><td class="textCenter">1</td><td>Gryf Słupsk</td><td class="textCenter">12</td><td class="textCenter">28</td></tr>
                        <tr><td class="textCenter">2</td><td>Arka II Gdynia</td><td class="textCenter">11</td><td class="textCenter">28</td></tr>
                        <tr><td class="textCenter">3</td><td>GKS Przodkowo</td><td class="textCenter">12</td><td class="textCenter">28</td></tr>
                        <tr><td class="textCenter">4</td><td>Kaszubia Kościerzyna</td><td class="textCenter">12</td><td class="textCenter">27</td></tr>
                        <tr><td class="textCenter">5</td><td>Stolem Gniewino</td><td class="textCenter">12</td><td class="textCenter">19</td></tr>
                        <tr><td class="textCenter">6</td><td>Powiśle Dzierzgoń</td><td class="textCenter">12</td><td class="textCenter">18</td></tr>
                        <tr><td class="textCenter">7</td><td>Lechia II Gdańsk</td><td class="textCenter">12</td><td class="textCenter">18</td></tr>
                        <tr><td class="textCenter">8</td><td>Pogoń Lębork</td><td class="textCenter">12</td><td class="textCenter">18</td></tr>
                        <tr><td class="textCenter">9</td><td>Wierzyca Pelplin</td><td class="textCenter">12</td><td class="textCenter">17</td></tr>
                        <tr><td class="textCenter">10</td><td>Cartusia Kartuzy</td><td class="textCenter">12</td><td class="textCenter">16</td></tr>
                        <tr><td class="textCenter">11</td><td>Wda Lipusz</td><td class="textCenter">12</td><td class="textCenter">16</td></tr>
                        <tr><td class="textCenter">12</td><td>GKS Kowale</td><td class="textCenter">12</td><td class="textCenter">13</td></tr>
                        <tr><td class="textCenter">13</td><td>Gwiazda Karsin</td><td class="textCenter">11</td><td class="textCenter">13</td></tr>
                        <tr><td class="textCenter">14</td><td>Wikęd Luzino</td><td class="textCenter">12</td><td class="textCenter">13</td></tr>
                        <tr><td class="textCenter">15</td><td>Gedania Gdańsk</td><td class="textCenter">12</td><td class="textCenter">12</td></tr>
                        <tr><td class="textCenter">16</td><td>Jantar Ustka</td><td class="textCenter">12</td><td class="textCenter">9</td></tr>
                        <tr><td class="textCenter">17</td><td>Jaguar Gdańsk</td><td class="textCenter">12</td><td class="textCenter">6</td></tr>
                        <tr><td class="textCenter">18</td><td>Lipniczanka Lipnica</td><td class="textCenter">12</td><td class="textCenter">4</td></tr>
                    </table>
                </div>
            </section>
            <section>
                <div id="choosingArea" class="textCenter">
                    <noscript>
                            Wybieranie zespołów nie działa z wyłączonym JavaScriptem.
                    </noscript>
                </div>
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