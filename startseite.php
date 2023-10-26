
<?php
session_start();

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Fitbook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Startseite</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Freunde</a></li>
        </ul>
    </nav>

    <div id="post-formular">
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
            var username = "<?php echo $username; ?>";
            var text = document.getElementById("post-text").value;
            if (text.trim() !== "") {
                erstelleBeitrag(username, text);
                zeigeBeiträge();
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

            beitragDiv.appendChild(beitrag);
        }

        function zeigeBeiträge() {
            // Hier kannst du die Logik hinzufügen, um tatsächliche Beiträge vom Server zu laden
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

        function klappeKommentare(button) {
            var kommentarBereich = button.parentElement.nextElementSibling;
            var kommentare = kommentarBereich.querySelector('.kommentare');

            if (kommentare.style.display === "none") {
                kommentare.style.display = "block";
            } else {
                kommentare.style.display = "none";
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
    </script>



</body>
</html>
