<!DOCTYPE HTML>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>IV Liga Pomorska</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../jsui/jquery-ui.min.css">
        <script src="../js/jq.js"></script>
        <script src="../jsui/jquery-ui.min.js"></script>
        <script src="../js/home.js"></script>
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
                    <h1 id="fadeableHeader">IV LIGA POMORSKA</h1>
                </div>
            </header>
            <section>
                <div class="majorLink">
                    <a href="http://www.pomorski-zpn.pl/rozgrywki#31630" target="_blank">Oficjalna strona ligi</a>
                </div>
                <div class="majorLink">
                    <a href="http://www.pomorskifutbol.pl/liga.php?id=1170" target="_blank">Strona kibiców ligi</a>
                </div>
            </section>
            <section>
                <div id="svgSection">
                    <svg width="240" height="240" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="100" r="100" fill="#ffffff" transform="scale(1.2, 1.2)">     
                            <animate attributeName="fill" attributeType="XML" from="#ffffff" to="#0099ff" dur="3s" repeatCount="indefinite"/>
                        </circle>
                    </svg>
                </div>
            </section>
            <section>
                
                <div id="slider"></div>
                <div class="commonHeader">
                    <header>
                        <h4>Brak wyglądu strony oceniam na: <span id="rateIndicator">1</span>/100.</h4>
                    </header>
                </div>
            </section>
            <article>
                <div id="entryText">
                    <br/>
                    IV Liga Pomorska nie zwalnia! W meczu na szczycie Gryf Słupsk pokonał GKS Przodkowo i zasiadł na fotelu lidera.
                    W meczu nie brakowało dodatkowych akcentów, do takich należy niewątpliwie zaliczyć występ byłych zawodników Gryfa w zespole GKS-u.
                    Gryf mimo ubytków kadrowych spisuje się nadspodziewanie dobrze, ale celujące w powrót do III ligi GKS na pewno nie powiedziało ostatniego słowa.
                    Nie należy zapominać o tym, że rezerwy Arki mają zaległy mecz, a drużyna ta może przecież wspierać się zawodnikami z ekstraklasy i również ma duże szanse na awans.
                    <p><span id="slideableText"><noscript>nie </noscript>można schować za pomocą JQuery...</span></p>
                    
                    <p>In 1995, rugby union became an "open" game, that is one which allowed professional players. Although the original dispute between the two codes has now disappeared – and despite the fact that officials from both forms of rugby football have sometimes mentioned the possibility of re-unification – the rules of both codes and their culture have diverged to such an extent that such an event is unlikely in the foreseeable future.</p>

                    <p>The word football, when used in reference to a specific game can mean any one of those described above. Because of this, much friendly controversy has occurred over the term football, primarily because it is used in different ways in different parts of the English-speaking world. Most often, the word "football" is used to refer to the code of football that is considered dominant within a particular region. So, effectively, what the word "football" means usually depends on where one says it.</p>

                    <p>These codes have in common the prohibition of the use of hands (by all players except the goalkeeper), unlike other codes where carrying or handling the ball is allowed</p>

                    <p>These codes have in common the ability of players to carry the ball with their hands, and to throw it to teammates, unlike association football where the use of hands is prohibited by anyone except the goal keeper.  They also feature various methods of scoring based upon whether the ball is carried into the goal area, or kicked through a target.</p>

                    <p>These codes have in common the absence of an offside rule, the prohibition of continuous carrying of the ball (requiring a periodic bounce or solo (toe-kick), depending on the code) while running, handpassing by punching or tapping the ball rather than throwing it, and other traditions.</p>

                    <p>Football is a family of team sports that involve, to varying degrees, kicking a ball to score a goal.  Unqualified, the word football normally means the form of football that is the most popular where the word is used. Sports commonly called football include association football (known as soccer in some countries); gridiron football (specifically American football or Canadian football); Australian rules football; rugby football (either rugby league or rugby union); and Gaelic football. These various forms of football are known as football codes.</p>

                    <p>The various codes of football share certain common elements and can be grouped into two main classes of football: carrying codes like American football, Canadian football, rugby union and rugby league, where the ball is moved about the field while being held in the hands or thrown, and kicking codes such as Association football and Gaelic football, where the ball is moved primarily with the feet, and where handling is strictly limited.</p>

                    <p>In all codes, common skills include passing, tackling, evasion of tackles, catching and kicking. In most codes, there are rules restricting the movement of players offside, and players scoring a goal must put the ball either under or over a crossbar between the goalposts.</p>

                    <p>There are conflicting explanations of the origin of the word "football".  It is widely assumed that the word "football" (or the phrase "foot ball") refers to the action of the foot kicking a ball.  There is an alternative explanation, which is that football originally referred to a variety of games in medieval Europe, which were played on foot. There is no conclusive evidence for either explanation.</p>

                    <p>The Māori in New Zealand played a game called Ki-o-rahi consisting of teams of seven players play on a circular field divided into zones, and score points by touching the 'pou' (boundary markers) and hitting a central 'tupu' or target.</p>
                </div>
            </article>
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