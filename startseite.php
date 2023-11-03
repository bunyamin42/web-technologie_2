<?php
include("db_connection.php");
session_start();

// Benutzername und E-Mail aus der Session holen und bereinigen
$benutzername = mysqli_real_escape_string($connection, $_SESSION['benutzername']);
$email = mysqli_real_escape_string($connection, $_SESSION['email']);

// Die benutzer_id vom Benutzer herausfinden und in der Session speichern
$sql_benutzerid = "SELECT benutzer_id, benutzername FROM benutzer WHERE benutzername = '$benutzername'";

$result_benutzer_id = mysqli_query($connection, $sql_benutzerid);
$row_benutzer_id = mysqli_fetch_assoc($result_benutzer_id);

$_SESSION['benutzer_id'] = $row_benutzer_id['benutzer_id'];
$benutzer_Id = $_SESSION['benutzer_id'];

function speichereBeitragDatenbank($contentBeitrag)
{
    include("db_connection.php");
    $benutzerId = $_SESSION['benutzer_id'];

    // Bereinige den Beitragstext
    $contentBeitrag = mysqli_real_escape_string($connection, $contentBeitrag);

    // SQL-Abfrage zum Einfügen des Beitrags in die Datenbank
    $sql = "INSERT INTO beitrag (inhalt, likes, veröffentlichungsdatum, fk_benutzer_id)
            VALUES ('$contentBeitrag', 0, NOW(), $benutzerId)";

    // Die SQL-Abfrage ausführen
    $result = mysqli_query($connection, $sql);

    // Überprüfe das Ergebnis der SQL-Abfrage
    if ($result) {
        echo "success";
    } else {
        // Gib den genauen Fehler zurück, um das Debuggen zu erleichtern
        echo "error: " . mysqli_error($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Fitbook</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="menuleiste">
        <ul>
            <li><a href="#">Startseite</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Freunde</a></li>
        </ul>
    </nav>
    <div class="logout">
        <a href="logout.php">Abmelden</a>
    </div>

    <button id="beitrag-erstellen-button" onclick="anzeigenBeitragFormular()">Beitrag erstellen</button>

    <div id="post-formular" style="display: none;">
        <form id="posten-form">
            <textarea id="post-text" placeholder="Schreibe deinen Beitrag..."></textarea>
            <button type="button" onclick="posten()">Push</button>
        </form>
    </div>

    <div id="beitraege">
        <!-- Hier werden die Beiträge angezeigt -->
    </div>


    <script>
        // Simuliere eine Datenbank für bereits gelikte Beiträge
        var gelikteBeitraege = [];

        function posten() {
            var benutzername = "<?php echo $benutzername; ?>";
            var textBereich = document.getElementById("post-text");
            var text = textBereich.value;
            if (text.trim() !== "") {
                erstelleBeitrag(benutzername, text);
                zeigeBeiträge();
                textBereich.value = ""; // Leert das Eingabefeld
            }
        }

        function erstelleBeitrag(benutzer, text) {
            var beitragDiv = document.getElementById("beitraege");

            var beitrag = document.createElement("div");
            beitrag.className = "beitrag";
            beitrag.innerHTML = "<p>Benutzer: " + benutzer + "</p><p>Beitrag: " + text + "</p>" +
                "<div class='aktionen'>" +
                "<button onclick='liken(this)'>Liken</button> " +
                "<span class='anzahl-likes'>0 Likes</span> " +
                "<button onclick='klappeKommentare(this)'>Kommentare</button>" +
                "</div>" +
                "<div class='kommentar-bereich'>" +
                "<textarea placeholder='Schreibe einen Kommentar...'></textarea>" +
                "<button onclick='kommentarPosten(this, \"" + benutzer + "\", \"" + text + "\")'>Push</button>" +
                "<div class='kommentare'></div>" +
                "</div>";
                // Rufe die Datenbankfunktion auf, um den Beitrag zu speichern
            speichereBeitragDatenbank(text);
            // Füge den Beitrag zur Seite hinzu
            beitragDiv.appendChild(beitrag);
            
            
        }

        function zeigeBeiträge() {
            // Stelle eine AJAX-Anfrage, um die Beiträge abzurufen
            console.log("zeigeBeiträge() wurde aufgerufen");
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Verarbeite die JSON-Daten
                    var beiträge = JSON.parse(xhr.responseText);
                    // Rufe die Funktion auf, um die Beiträge anzuzeigen
                    anzeigenBeiträge(beiträge);
                }
            };
            xhr.open("POST", "alle_beitraege_anzeigen.php", true);
            xhr.send();
        }

        function anzeigenBeiträge(beiträge) {
            var beitragDiv = document.getElementById("beitraege");
            // Leere den Bereich, um doppelte Einträge zu vermeiden
            beitragDiv.innerHTML = "";

            for (var i = 0; i < beiträge.length; i++) {
                var beitrag = beiträge[i];
                var beitragElement = document.createElement("div");
                beitragElement.className = "beitrag";
                beitragElement.innerHTML =
                    "<p>Benutzer: " + beitrag.Benutzer + "</p>" +
                    "<p>Beitrag: " + beitrag.Inhalt + "</p>" +
                    "<div class='aktionen'>" +
                    "<button onclick='liken(this)'>Liken</button> " +
                    "<span class='anzahl-likes'>" + beitrag.Likes + " Likes</span> " +
                    "<button onclick='klappeKommentare(this)'>Kommentare</button>" +
                    "</div>" +
                    "<div class='kommentar-bereich'>" +
                    "<textarea placeholder='Schreibe einen Kommentar...'></textarea>" +
                    "<button onclick='kommentarPosten(this, \"" + beitrag.Benutzer + "\", \"" + beitrag.Inhalt + "\")'>Push</button>" +
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
                            alert("Ihr Beitrag wurde erfolgreich gepostet!");
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
            xhr.open("POST", "alle_beitraege_anzeigen.php", true);
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
        function liken(button) {
            var beitrag = button.closest('.beitrag');
            var likeButton = beitrag.querySelector('.anzahl-likes');

            // Überprüfe, ob der Beitrag bereits geliked wurde
            if (!beitragGeliked(beitrag)) {
                // Hier kannst du die Logik hinzufügen, um Likes zu verarbeiten
                // Beispiel: Aktualisiere den Like-Button oder sende eine Anfrage an den Server
                var anzahlLikes = parseInt(likeButton.textContent);
                likeButton.textContent = (anzahlLikes + 1) + ' Likes';
                // Füge den Beitrag zur Liste der gelikten Beiträge hinzu
                gelikteBeitraege.push(beitrag);
            } else {
                alert('Du hast diesen Beitrag bereits geliked.');
            }
        }
        function kommentarPosten(button, benutzer, beitragText) {
            var kommentarBereich = button.parentElement;
            var kommentarText = kommentarBereich.querySelector('textarea').value;
            var kommentarListe = kommentarBereich.querySelector('.kommentare');

            if (kommentarText.trim() !== "") {
                var kommentar = document.createElement("div");
                kommentar.className = "kommentar";
                kommentar.innerHTML = "<p>Benutzer: " + benutzer + "</p><p>Kommentar: " + kommentarText + "</p>";
                kommentarListe.appendChild(kommentar);
                
                // Leere das Textarea-Feld nach dem Posten des Kommentars
                kommentarBereich.querySelector('textarea').value = "";
            } else {
                alert('Bitte geben Sie einen Kommentar ein.');
            }
        }

        // Überprüfe, ob der Beitrag bereits geliked wurde
        function beitragGeliked(beitrag) {
            return gelikteBeitraege.includes(beitrag);
        }

        window.onload = function () {
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

</html>
