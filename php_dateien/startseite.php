<?php
include("db_connection.php");
include("speichereBeitragDatenbank.php");
include("session_handling.php");
include("speichere_beitrag.php");

if (!isset($_SESSION['email'])) {
    header("location: login.php");
} else {



?>

    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="UTF-8">
        <title>Fitbook</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <nav>
            <div class="nav-left">
                <img src="../images/logo.png" class="logo">
                <ui>
                    <li><img src="../images/email_icon.png"></li>
                    <li><img src="../images/glocke_icon.png"></li>
                    <li><img src="../images/kalender_icon.png"></li>
                </ui>
            </div>
            <div class="nav-right">
                <div class="search-box">
                    <img src="../images/such_icon.png">
                    <input type="text" placeholder="Suchen">
                </div>
                <div class="nav-profil-icon">
                    <img src="../images/profil_icon.png" id="profile-icon">
                    <script>
                        document.getElementById("profile-icon").addEventListener("click", function() {
                            window.location.href = "account_settings.php";
                        });
                    </script>
                </div>
                <div class="logout">

                    <span id="logoutText" class="logout-text">Abmelden</span>
                    <img src="../images/abmelden_icon.png" id="abmelde_icon">
                    </a>
                    <script>
                        document.getElementById("abmelde_icon").addEventListener("click", function() {
                            window.location.href = "logout.php";
                        });
                    </script>
                </div>

        </nav>

        <div class="container_startseite">
            <!-------------------left sidebar ------------------->
            <div class="left-sidebar">
                <div class="imp-links">
                    <a href="#"><img src="../images/wochenplan_icon.png">Mein Wochenplan</a>
                    <a href="freunde.php"><img src="../images/freunde_icon.png">Freunde</a>
                    <a href=" #"><img src="../images/wochenplanersteller_icon.png">Wochenplanerstellen</a>
                    <a href="#"><img src="../images/kalorien_icon.png">Kalorienrechner</a>
                    <a href="bmi_rechner.php"><i style="color: black; padding-left:2px; padding-right:12px; font-size: 20px " class="fa-solid fa-dumbbell"></i> BMI Rechner</a>
                    

                </div>
            </div>

            <!-------------------main content ------------------->
            <!-- HTML für Toast-Benachrichtigung -->

            <div class="toast" id="toast"></div>
            <form id="filter-form" action="alle_beitraege_anzeigen.php" method="post">
                <label for="sortierung">Sortieren nach:</label>
                <select name="sortierung" id="sortierung">
                    <option value="aufsteigend">Aufsteigend</option>
                    <option value="absteigend">Absteigend</option>
                </select>

                <button type="button" onclick="applyFilter()">Filter anwenden</button>
            </form>

            <div class="main-content">
                <div class="beitragerstellen_button">
                    <button id="beitrag-erstellen-button" onclick="anzeigenBeitragFormular()">Beitrag erstellen</button>
                </div>


                <div id="post-formular" style="display: none;">
                    <form id="posten-form">
                        <textarea id="post-text" placeholder="Schreibe deinen Beitrag..."></textarea>
                        <button type="button" onclick="posten()">Push</button>
                    </form>
                </div>

                <div id="beitraege">
                    <!-- Hier werden die Beiträge angezeigt -->
                </div>

            </div>

            <!-------------------right sidebar ------------------->
            <div class="right-sidebar">
                <div class="sidebar-titel">
                    <h4>Konversationen</h4>
                    <a href="chat.php" onclick="updateUserStatus()">Chat</a>
                </div>

            </div>
        </div>





        <script>
            function updateUserStatus() {
                // Wenn der User auf Chat klickt, ändert sich sein Status von Offline auf Online
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {

                        if (xhr.responseText === "success") {

                            console.log("Status Änderung auf Online")

                        } else {
                            console.log("Status Änderung nicht geklappt")

                        }
                    }
                };
                xhr.open('GET', 'update_status.php', true); // Passe den Dateinamen an
                xhr.send();
            }



            function showLogoutText() {
                document.getElementById('logoutText').style.display = 'inline';
            }

            function hideLogoutText() {
                document.getElementById('logoutText').style.display = 'none';
            }
            // Simuliere eine Datenbank für bereits gelikte Beiträge
            // var gelikteBeitraege = [];

            function posten() {
                var benutzername = "<?php echo $benutzername; ?>";
                var textBereich = document.getElementById("post-text");
                var text = textBereich.value;
                if (text.trim() !== "") {
                    erstelleBeitrag(benutzername, text);

                    textBereich.value = ""; // Leert das Eingabefeld
                }
            }

            function erstelleBeitrag(benutzer, text) {
                var beitragDiv = document.getElementById("beitraege");

                var beitrag = document.createElement("div");
                beitrag.className = "beitrag";
                beitrag.setAttribute("title", text); // Füge den Beitragstitel für spätere Referenz hinzu
                beitrag.innerHTML = "<p>  <img src='../images/profil_icon.png'> " + benutzer + "</p><p>Beitrag: " + text + "</p>" +
                    "<div class='aktionen'>" +
                    "<button onclick='liken(this)'>Liken</button> " +
                    "<span class='anzahl-likes'>0 Likes</span> " +
                    "<button onclick='klappeKommentare(this)'>Kommentare</button>" +
                    "</div>" +
                    "<div class='kommentar-bereich'>" +
                    "<textarea placeholder='Schreibe einen Kommentar...'></textarea>" +
                    "<button onclick='kommentarPosten(this,  \"" + text + "\")'>Push</button>" +
                    "<div class='kommentare'></div>" +
                    "</div>";
                // Rufe die Datenbankfunktion auf, um den Beitrag zu speichern
                speichereBeitragDatenbank(text);
                // Füge den Beitrag zur Seite hinzu
                beitragDiv.appendChild(beitrag);


            }

          function applyFilter() {
        var form = document.getElementById("filter-form");
        var sortierungValue = form.elements["sortierung"].value;
        console.log("Sortierung testen applyfilter:", sortierungValue);
        zeigeBeiträge(sortierungValue);
    }


            function zeigeBeiträge(sortierungValue = null) {
                // Stelle eine AJAX-Anfrage, um die Beiträge abzurufen
                console.log("Sortierung testen zeigeBeiträge:", sortierungValue);
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Verarbeite die JSON-Daten
                        var beiträge = JSON.parse(xhr.responseText);
                        // Rufe die Funktion auf, um die Beiträge anzuzeigen
                        anzeigenBeiträge(beiträge);
                        // Nachdem die Beiträge geladen wurden, rufe die Funktion auf, um die Kommentare zu laden
                        ladeKommentare();
                    }
                };
                xhr.open("POST", "alle_beitraege_anzeigen.php", true);
                xhr.send("sortierung=" + encodeURIComponent(sortierungValue));
            }

            function ladeKommentare() {
                // Stelle eine AJAX-Anfrage, um alle Kommentare abzurufen
                var xhrKommentare = new XMLHttpRequest();
                xhrKommentare.onreadystatechange = function() {
                    if (xhrKommentare.readyState == 4 && xhrKommentare.status == 200) {
                        // Verarbeite die JSON-Daten für Kommentare
                        var kommentare = JSON.parse(xhrKommentare.responseText);
                        // Rufe die Funktion auf, um die Kommentare anzuzeigen
                        anzeigenKommentare(kommentare);
                    }
                };
                xhrKommentare.open("GET", "alle_kommentare_anzeigen.php", true);
                xhrKommentare.send();
            }

            function anzeigenKommentare(kommentare) {
               

                for (var i = 0; i < kommentare.length; i++) {
                    var kommentar = kommentare[i];
                    var beitragElement = document.querySelector(`.beitrag[title="${kommentar.BeitragInhalt.replace(/"/g, '&quot;')}"]`);
                    console.log("Beitragstitel:", kommentar.BeitragInhalt);
                    if (beitragElement) {

                        console.log("Beitragselement gefunden:", beitragElement);

                        var kommentarListe = beitragElement.querySelector('.kommentare');
                        console.log("Kommentarliste gefunden:", kommentarListe);

                        if (!kommentarListe) {
                            console.error("Kommentarliste nicht gefunden:", beitragElement);
                            continue;
                        }

                        var kommentarDiv = document.createElement("div");
                        kommentarDiv.className = "kommentar";
                        kommentarDiv.innerHTML = "<p>Benutzer: " + kommentar.Kommentator + "</p><p>Kommentar: " + kommentar.KommentarInhalt + "</p>";
                        kommentarListe.appendChild(kommentarDiv);
                    } else {
                        console.error("Beitragselement nicht gefunden:", kommentar.BeitragInhalt);
                    }
                }
            }



            function anzeigenBeiträge(beiträge) {
                var beitragDiv = document.getElementById("beitraege");
                // Leere den Bereich, um doppelte Einträge zu vermeiden
                beitragDiv.innerHTML = "";

                for (var i = 0; i < beiträge.length; i++) {
                    var beitrag = beiträge[i];
                    var beitragElement = document.createElement("div");
                    beitragElement.className = "beitrag";
                    beitragElement.setAttribute("title", beitrag.Inhalt);
                    beitragElement.innerHTML =
                        "<p> <img src='../images/profil_icon.png'> " + beitrag.Benutzer + "</p>" +
                        "<p>Beitrag: " + beitrag.Inhalt + "</p>" +
                        "<div class='aktionen'>" +
                        "<button onclick='liken(this)'>Liken</button> " +
                        "<span class='anzahl-likes'>" + beitrag.Likes + " Likes</span> " +
                        "<button onclick='klappeKommentare(this)'>Kommentare</button>" +
                        "</div>" +
                        "<div class='kommentar-bereich'>" +
                        "<textarea placeholder='Schreibe einen Kommentar...'></textarea>" +
                        "<button onclick='kommentarPosten(this,  \"" + beitrag.Inhalt + "\")'>Push</button>" +
                        "<div class='kommentare'></div>" +
                        "</div>";

                    beitragDiv.appendChild(beitragElement);
                }
            }

            function speichereBeitragDatenbank(contentBeitrag) {
                // Stelle eine AJAX-Anfrage, um den Beitrag in die Datenbank einzufügen
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // Erfolgreiche Anfrage, zeige eine Erfolgsmeldung
                            if (xhr.responseText === "success") {

                                zeigeBeiträge(); // Zeige die Beiträge nur bei erfolgreichem Beitrag

                            } else {
                                // Fehler beim Einfügen des Beitrags

                                alert("Fehler beim Einfügen des Beitrags. Bitte versuchen Sie es erneut.");
                            }
                        } else {
                            // Fehler beim Senden der Anfrage
                            alert("Fehler beim Senden der Anfrage. Bitte versuchen Sie es erneut.");
                        }
                    }
                };

                // Konfiguriere die AJAX-Anfrage für POST
                xhr.open("POST", "speichere_beitrag.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Sende die Daten an das PHP-Skript
                xhr.send("contentBeitrag=" + encodeURIComponent(contentBeitrag));
            }


            function klappeKommentare(button) {
                var kommentarBereich = button.parentElement.nextElementSibling;
                var kommentare = kommentarBereich.querySelector('.kommentare');

                if (kommentare.style.display === "none") {
                    kommentare.style.display = "block";
                } else {
                    kommentare.style.display = "none";
                }
            }


            function kommentarPosten(button, beitragText) {
                var kommentarBereich = button.parentElement;
                var kommentarText = kommentarBereich.querySelector('textarea').value;
                var kommentarListe = kommentarBereich.querySelector('.kommentare');

                if (kommentarText.trim() !== "") {
                    var benutzername = "<?php echo $benutzername; ?>";
                    var kommentar = document.createElement("div");
                    kommentar.className = "kommentar";
                    kommentar.innerHTML = "<p>Benutzer: " + benutzername + "</p><p>Kommentar: " + kommentarText + "</p>";
                    kommentarListe.appendChild(kommentar);

                    // Leere das Textarea-Feld nach dem Posten des Kommentars
                    kommentarBereich.querySelector('textarea').value = "";


                    // Funktion aufrufen, um Kommentar mit AJAX an den Server zu schicken, um Kommentare in DB zu speichern
                    sendeKommentarAnServer(benutzername, kommentarText, beitragText);

                } else {
                    alert('Bitte geben Sie einen Kommentar ein.');
                }
            }

            function sendeKommentarAnServer(benutzer, kommentarText, beitragText) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {


                    }
                };
                xhttp.open("POST", "speichere_kommentare.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("benutzer=" + encodeURIComponent(benutzer) + "&beitragText=" + encodeURIComponent(beitragText) + "&kommentarText=" + encodeURIComponent(kommentarText));
            }

            // Überprüfe, ob der Beitrag bereits geliked wurde
            function beitragGeliked(beitrag, callback) {
                var contentBeitrag = beitrag.getAttribute("title");

                // Sende eine AJAX-Anfrage an den Server, um zu überprüfen, ob der Benutzer den Beitrag bereits geliked hat
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText === "liked") {
                            // Der Beitrag wurde bereits geliked
                            callback(true);
                        } else {
                            // Der Beitrag wurde noch nicht geliked
                            callback(false);
                        }
                    }
                };

                xhr.open("POST", "pruefe_like.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("contentBeitrag=" + encodeURIComponent(contentBeitrag));
            }

            // Funktion zum Liken eines Beitrags
            function liken(button) {
                var beitrag = button.closest('.beitrag');
                var likeButton = beitrag.querySelector('.anzahl-likes');

                // Überprüfe, ob der Beitrag bereits geliked wurde
                beitragGeliked(beitrag, function(istGeliked) {
                    if (!istGeliked) {
                        var anzahlLikes = parseInt(likeButton.textContent);
                        likeButton.textContent = (anzahlLikes + 1) + ' Likes';

                        // Beispiel: Sende eine Anfrage an den Server, um den Like zu speichern
                        sendeLikeAnServer(beitrag);

                    } else {
                        console.log('Du hast diesen Beitrag bereits geliked.');
                    }
                });
            }
            // Funktion zum Senden des Likes an den Server (speichere_like_beitrag.php)
            function sendeLikeAnServer(beitrag) {
                var benutzer_id = "<?php echo $_SESSION['benutzer_id']; ?>";
                var contentBeitrag = beitrag.getAttribute("title");

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // Erfolgreiche Anfrage
                            if (xhr.responseText === "success") {
                                // Erfolgsmeldung (optional)
                                console.log("Like erfolgreich gespeichert.");
                            } else {
                                // Fehler beim Speichern des Likes
                                console.error("Fehler beim Speichern des Likes. Antwort vom Server:", xhr.responseText);
                            }
                        } else {
                            // Fehler beim Senden der Anfrage
                            console.error("Fehler beim Senden der Like-Anfrage. Statuscode:", xhr.status);
                        }
                    }
                };

                // Konfiguriere die AJAX-Anfrage für POST
                xhr.open("POST", "speichere_like_beitrag.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Sende die Daten an das PHP-Skript
                xhr.send("benutzer_id=" + encodeURIComponent(benutzer_id) + "&contentBeitrag=" + encodeURIComponent(contentBeitrag));
            }




            window.onload = function() {
                zeigeBeiträge();

            };



            function anzeigenBeitragFormular() {
                var formular = document.getElementById("post-formular");
                var button = document.getElementById("beitrag-erstellen-button");

                if (formular.style.display === "none") {
                    formular.style.display = "block";
                    button.innerText = "Beitrag schließen";
                } else {
                    formular.style.display = "none";
                    button.innerText = "Beitrag erstellen";
                }
            }
        </script>

    </body>
<?php } ?>

    </html>