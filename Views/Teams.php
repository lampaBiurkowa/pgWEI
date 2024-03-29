<!DOCTYPE HTML>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>IV Liga Pomorska</title>
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/teams.css">
        <script src="../js/teams.js"></script>
    </head>
    <body onload="loadFavouriteTeam()">
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
            <div id="teamContentWrapper">
                <div id="teamMainContent">
                    <header>
                        <div class="commonHeader">
                            <h2>Drużyny</h2>
                        </div>
                    </header>
                    IV Liga Pomorska liczy 18 drużyn z województwa pomorskiego. Organizatorem rozgrywek jest Pomorski Związek Piłki nożnej.
                    Zwycięzca ligi uzyskuje promocję do III ligi (region Polski północno-zachodniej).
                    Ostatnie zespoły spadają do Klas Okręgowych podrzędnych okręgów (gdańskiego lub słupskiego).
                    W lidze najwięcej jest drużyn z okolic trójmiasta, ale swoich reprezentantów ma także Pomorze Środkowe i mniejsze miejscowości.
                    A diam sollicitudin tempor id eu. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra. Eu augue ut lectus arcu bibendum at varius vel pharetra. Sem viverra aliquet eget sit. At auctor urna nunc id cursus metus aliquam. Et ultrices neque ornare aenean euismod. Nibh nisl condimentum id venenatis a. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum.

                    <p>
                        Aliquam vestibulum morbi blandit cursus risus at. Tortor at auctor urna nunc id cursus. Sed risus pretium quam vulputate dignissim. Tristique nulla aliquet enim tortor. Non curabitur gravida arcu ac tortor dignissim. Fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Feugiat nisl pretium fusce id velit. Egestas dui id ornare arcu odio.
                    </p>
                    <p>
                        Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Ut sem nulla pharetra diam sit. Et malesuada fames ac turpis egestas maecenas pharetra. Eros donec ac odio tempor orci. Cursus mattis molestie a iaculis at erat pellentesque adipiscing. Sem viverra aliquet eget sit amet tellus cras adipiscing enim.
                    </p>
                    <p>
                        Amet porttitor eget dolor morbi non arcu risus quis varius. Interdum velit euismod in pellentesque massa placerat duis ultricies. Proin libero nunc consequat interdum varius. Bibendum at varius vel pharetra vel turpis nunc eget. Donec ac odio tempor orci dapibus ultrices. Aenean euismod elementum nisi quis eleifend. Vitae tempus quam pellentesque nec nam aliquam sem et tortor. Dignissim diam quis enim lobortis scelerisque fermentum dui faucibus. Morbi tincidunt ornare massa eget egestas purus.
                    </p>
                    <p>
                        Ut etiam sit amet nisl purus in mollis nunc. Posuere sollicitudin aliquam ultrices sagittis orci a. In egestas erat imperdiet sed. Quis vel eros donec ac odio tempor orci. Ornare lectus sit amet est. Cursus sit amet dictum sit amet justo donec. Volutpat commodo sed egestas egestas fringilla phasellus. Pellentesque nec nam aliquam sem et tortor consequat id porta. Pharetra sit amet aliquam id diam maecenas ultricies. Auctor augue mauris augue neque gravida in fermentum.
                    </p>
                    <p>
                        Aliquam vestibulum morbi blandit cursus risus at. Tortor at auctor urna nunc id cursus. Sed risus pretium quam vulputate dignissim. Tristique nulla aliquet enim tortor. Non curabitur gravida arcu ac tortor dignissim. Fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Feugiat nisl pretium fusce id velit. Egestas dui id ornare arcu odio.
                    </p>
                    <p>
                        Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Ut sem nulla pharetra diam sit. Et malesuada fames ac turpis egestas maecenas pharetra. Eros donec ac odio tempor orci. Cursus mattis molestie a iaculis at erat pellentesque adipiscing. Sem viverra aliquet eget sit amet tellus cras adipiscing enim.
                    </p>
                    <p>
                        Amet porttitor eget dolor morbi non arcu risus quis varius. Interdum velit euismod in pellentesque massa placerat duis ultricies. Proin libero nunc consequat interdum varius. Bibendum at varius vel pharetra vel turpis nunc eget. Donec ac odio tempor orci dapibus ultrices. Aenean euismod elementum nisi quis eleifend. Vitae tempus quam pellentesque nec nam aliquam sem et tortor. Dignissim diam quis enim lobortis scelerisque fermentum dui faucibus. Morbi tincidunt ornare massa eget egestas purus.
                    </p>
                    <p>
                        Ut etiam sit amet nisl purus in mollis nunc. Posuere sollicitudin aliquam ultrices sagittis orci a. In egestas erat imperdiet sed. Quis vel eros donec ac odio tempor orci. Ornare lectus sit amet est. Cursus sit amet dictum sit amet justo donec. Volutpat commodo sed egestas egestas fringilla phasellus. Pellentesque nec nam aliquam sem et tortor consequat id porta. Pharetra sit amet aliquam id diam maecenas ultricies. Auctor augue mauris augue neque gravida in fermentum.
                    </p>
                    <p>
                        Aliquam vestibulum morbi blandit cursus risus at. Tortor at auctor urna nunc id cursus. Sed risus pretium quam vulputate dignissim. Tristique nulla aliquet enim tortor. Non curabitur gravida arcu ac tortor dignissim. Fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Feugiat nisl pretium fusce id velit. Egestas dui id ornare arcu odio.
                    </p>
                    <p>
                        Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Ut sem nulla pharetra diam sit. Et malesuada fames ac turpis egestas maecenas pharetra. Eros donec ac odio tempor orci. Cursus mattis molestie a iaculis at erat pellentesque adipiscing. Sem viverra aliquet eget sit amet tellus cras adipiscing enim.
                    </p>
                    <p>
                        Amet porttitor eget dolor morbi non arcu risus quis varius. Interdum velit euismod in pellentesque massa placerat duis ultricies. Proin libero nunc consequat interdum varius. Bibendum at varius vel pharetra vel turpis nunc eget. Donec ac odio tempor orci dapibus ultrices. Aenean euismod elementum nisi quis eleifend. Vitae tempus quam pellentesque nec nam aliquam sem et tortor. Dignissim diam quis enim lobortis scelerisque fermentum dui faucibus. Morbi tincidunt ornare massa eget egestas purus.
                    </p>
                    <p>
                        Ut etiam sit amet nisl purus in mollis nunc. Posuere sollicitudin aliquam ultrices sagittis orci a. In egestas erat imperdiet sed. Quis vel eros donec ac odio tempor orci. Ornare lectus sit amet est. Cursus sit amet dictum sit amet justo donec. Volutpat commodo sed egestas egestas fringilla phasellus. Pellentesque nec nam aliquam sem et tortor consequat id porta. Pharetra sit amet aliquam id diam maecenas ultricies. Auctor augue mauris augue neque gravida in fermentum.
                    </p>
                </div>
                <aside>
                    <div class="commonHeader">
                        <h3>Wybierz ulubioną drużynę</h3>
                    </div>
                    <div id="teamList">
                        <form>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio1"  onclick="setFavouriteTeam(1)">
                                </div>
                                <label for="teamRadio1">
                                    <span class="teamDesc" id="teamDesc1">Gryf Słupsk</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio2" onclick="setFavouriteTeam(2)">
                                </div>
                                <label for="teamRadio2">
                                    <span class="teamDesc" id="teamDesc2">Gedania Gdańsk</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio3" onclick="setFavouriteTeam(3)">
                                </div>
                                <label for="teamRadio3">
                                    <span class="teamDesc" id="teamDesc3">Lechia II Gdańsk</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio4" onclick="setFavouriteTeam(4)">
                                </div>
                                <label for="teamRadio4">
                                    <span class="teamDesc" id="teamDesc4">Jaguar Gdańsk</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio5"  onclick="setFavouriteTeam(5)">
                                </div>
                                <label for="teamRadio5">
                                    <span class="teamDesc" id="teamDesc5">Arka II Gdynia</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio6" onclick="setFavouriteTeam(6)">
                                </div>
                                <label for="teamRadio6">
                                    <span class="teamDesc" id="teamDesc6">Cartusia Kartuzy</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio7" onclick="setFavouriteTeam(7)">
                                </div>
                                <label for="teamRadio7">
                                    <span class="teamDesc" id="teamDesc7">Gwiazda Karsin</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio8" onclick="setFavouriteTeam(8)">
                                </div>
                                <label for="teamRadio8">
                                    <span class="teamDesc" id="teamDesc8">Kaszubia Kościerzyna</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio9" onclick="setFavouriteTeam(9)">
                                </div>
                                <label for="teamRadio9">
                                    <span class="teamDesc" id="teamDesc9">Lipniczanka Lipnica</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio10" onclick="setFavouriteTeam(10)">
                                </div>
                                <label for="teamRadio10">
                                    <span class="teamDesc" id="teamDesc10">Stolem Gniewino</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio11" onclick="setFavouriteTeam(11)">
                                </div>
                                <label for="teamRadio11">
                                    <span class="teamDesc" id="teamDesc11">GKS Przodkowo</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio12" onclick="setFavouriteTeam(12)">
                                </div>
                                <label for="teamRadio12">
                                    <span class="teamDesc" id="teamDesc12">GKS Kowale</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio13" onclick="setFavouriteTeam(13)">
                                </div>
                                <label for="teamRadio13">
                                    <span class="teamDesc" id="teamDesc13">Pogoń Lębork</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio14" onclick="setFavouriteTeam(14)">
                                </div>
                                <label for="teamRadio14">
                                    <span class="teamDesc" id="teamDesc14">Wikęd Luzino</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio15" onclick="setFavouriteTeam(15)">
                                </div>
                                <label for="teamRadio15">
                                    <span class="teamDesc" id="teamDesc15">Powiśle Dzierzgoń</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio16" onclick="setFavouriteTeam(16)">
                                </div>
                                <label for="teamRadio16">
                                    <span class="teamDesc" id="teamDesc16">Jantar Ustka</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio17" onclick="setFavouriteTeam(17)">
                                </div>
                                <label for="teamRadio17">
                                    <span class="teamDesc" id="teamDesc17">Wierzyca Pelplin</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio18" onclick="setFavouriteTeam(18)">
                                </div>
                                <label for="teamRadio18">
                                    <span class="teamDesc" id="teamDesc18">GKS Kolbudy</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div class="team">
                                <div class="teamRadio">
                                    <input type="radio" name="favouriteTeam" id="teamRadio19" onclick="setFavouriteTeam(19)">
                                </div>
                                <label for="teamRadio19">
                                    <span class="teamDesc" id="teamDesc19">Wda Lipusz</span>
                                </label>
                                <div style="clear:both"></div>
                            </div>
                            <div style="clear:both"></div>
                        </form>
                    </div>    
                </aside>
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