<!DOCTYPE HTML>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>IV Liga Pomorska</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../jsui/jquery-ui.css">
        <script src="../js/jq.js"></script>
        <script src="../jsui/jquery-ui.min.js"></script>
        <script src="../js/gui.js"></script>
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
                    <h1>Ankieta</h1>
                </div>
            </header>
            <section>
                <form class="commonForm">
                    <header>
                        <div class="commonHeader">
                            <h3>Podziel się z nami twoim zainteresowaniem ligą!</h3>
                        </div>
                    </header>
                    <div class="inputLabel inputArea">
                        <label for="firstNameInput">Imię:</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="text" id="firstNameInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="surnameInput">Nazwisko:</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="text" id="surnameInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="emailInput">E-mail:</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="email" id="emailInput">
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="ageInput">Wiek:</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="number" id="ageInput">
                    </div>
                    <div class="chooseSection">
                        Jak często śledzisz wyniki ligi?:
                        <div class="inputArea">
                            <label class="blockItem">
                                <input type="radio" name="frequency"> Co każdą kolejkę
                            </label>
                        </div>
                        <div class="inputArea">
                            <label class="blockItem">
                                <input type="radio" name="frequency"> Co miesiąc
                            </label>
                        </div>
                        <div class="inputArea">
                            <label class="blockItem">
                                <input type="radio" name="frequency"> Nigdy
                            </label>
                        </div>
                    </div>
                    <div class="chooseSection">
                        Co doceniasz w lidze?:
                        <div class="inputArea">
                            <label class="blockItem">
                                <input type="checkbox"> Zaangażowanie piłkarzy
                            </label>
                        </div>
                        <div class="inputArea">
                            <label class="blockItem">
                                <input type="checkbox"> Zaangażowanie kibiców
                            </label>
                        </div>
                        <div class="inputArea">
                            <label class="blockItem">
                                <input type="checkbox"> Emocje na meczach
                            </label>
                        </div>
                        <div class="inputArea">
                            <label class="blockItem">
                                <input type="checkbox"> Szacunek między drużynami
                            </label>
                        </div>
                    </div>
                    <div class="inputLabel inputArea">
                        <label for="favouriteTeamInput">Moja ulubiona drużyna to:</label>
                    </div>
                    <div class="inputField inputArea">
                        <input type="text" list="teamsOptions" id="favouriteTeamInput" title="Której ekipie kibicujesz najbardziej?">
                    </div>

                    <datalist id="teamsOptions">
                        <option>Gryf Słupsk</option>
                        <option>Arka II Gdynia</option>
                        <option>GKS Przodkowo</option>
                        <option>Kaszubia Kościerzyna</option>
                        <option>Stolem Gniewino</option>
                        <option>Powiśle Dzierzgoń</option>
                        <option>Lechia II Gdańsk</option>
                        <option>Pogoń Lębork</option>
                        <option>Wierzyca Pelplin</option>
                        <option>Cartusia Kartuzy</option>
                        <option>Wda Lipusz</option>
                        <option>GKS Kowale</option>
                        <option>Gwiazda Karsin</option>
                        <option>Wikęd Luzino</option>
                        <option>Gedania Gdańsk</option>
                        <option>Jantar Ustka</option>
                        <option>Jaguar Gdańsk</option>
                        <option>Lipniczanka Lipnica</option>
                    </datalist>
                    
                    <button class="commonButton">Wyślij</button>
                    <button type="button" class="commonButton" onclick="showDialogBox()">Pomoc</button>
                    <button type="reset" class="commonButton">Wyczyść</button>
                </form>
                <div id="dialogBox" title="Pomoc">
                    Aniketa ma na celu lepsze poznanie opinii kibiców o lidze. Twoje dane pomogą w uzupełnieniu naszej bazy danych.
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