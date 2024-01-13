<?php
include("db_connection.php");
include("header.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freundeempfehlung</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

        body {
            overflow: auto;
        }

        .friendItem {
            border-top: 1px solid rgba(204, 204, 204, 0.5);
            border-bottom: 1px solid rgba(204, 204, 204, 0.5);
            padding: 10px;
            padding-bottom: 25px;
            padding-top: 25px;
        }

        .friendItem img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .friendItem .col {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Hier wird der Platz zwischen den Elementen maximiert */
            margin-top: 10px;
        }

        .friendItem .col div {
            margin-left: 15px;
        }

        .fa-user,
        .fa-user-plus {
            font-size: 20px;
            color: black !important;
        }

        .fa-user-xmark {
            font-size: 20px;
            color: red;
            cursor: pointer;
        }

    </style>
</head>

<body>
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link " href="freunde.php">Freundeliste</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="freundschaftsanfragen.php">Freundschaftsanfragen</a>
        <a class="flex-sm-fill text-sm-center nav-link " href="freunde_hinzufuegen.php">Freunde hinzufügen</a>
        <a class="flex-sm-fill text-sm-center nav-link active" href="Freundeempfehlung.php">Freundeempfehlung</a>
    </nav>
    <h2 style="margin-top: 5%;margin-bottom: 25px; text-align: center;">Matching-Profile: Entdecke Freunde, die zu
        dir passen</h2>

    <div id="friendListContainer">
        <!-- Hier werden die Freundenelemente hinzugefügt -->
    </div>

    <script>
        //Ajax Anfrage sobald die Seite lädt, um eine Freundeempfehlung Liste zu erhalten
        document.addEventListener('DOMContentLoaded', function () {

            var xhr = new XMLHttpRequest();

            var url = 'hol_und_verarbeite_freundeempehlung.php';

            xhr.open('GET', url, true);

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    var jsonResponse = JSON.parse(xhr.responseText);

                    //übergabe des Ergebnis an die Funktion
                    verarbeiteJsonDaten(jsonResponse);

                } else {
                    console.error('Fehler bei der AJAX-Anfrage: ', xhr.statusText);
                }
            };

            xhr.onerror = function () {
                console.error('Fehler bei der AJAX-Anfrage.');
            };

            xhr.send();
        });

        // Funktion zur Verarbeitung der JSON-Daten, um alle Benutzerinformationen auszugeben als ein div Tag
        function verarbeiteJsonDaten(jsonData) {
            var freundeempfehlung = jsonData.freundeempfehlung;
            var freundendaten = jsonData.freundendaten;

            var friendList = document.getElementById('friendListContainer');

            for (var i = 0; i < freundendaten.length; i++) {
                var benutzer = freundendaten[i];

                var friendItem = document.createElement('div');
                friendItem.classList.add('friendItem', 'col-12', 'mb-0');

                var friendId = benutzer.benutzer_id;
                var friendProfilePic = benutzer.user_profil;
                var friendUsername = benutzer.benutzername;
                var friendinformation = benutzer.profile_informationen;
                var similarity = benutzer.ähnlichkeitswert.toFixed(7);; // Hinzugefügter Ähnlichkeitswert

                friendItem.innerHTML = '<div class="row"><div class="col-1" style="margin-right: 4%;"><img src="'
                    + friendProfilePic + '" alt="' + friendUsername + '\'s Profilbild" class="rounded-circle"></div><div class="col d-flex align-items-center justify-content-between"><div><b>'
                    + friendUsername + '</b></div><div style="margin-left: 10px;"><b>' + friendinformation + '</b></div><div style="margin-left: 10px;"><b>Ähnlichkeitswert: '
                    + similarity + '</b></div></div> <i class="fa-solid fa-user-plus" style="margin-left: 10px;"></i> <a href="/Projekt%20FitBook/Web-Technologie-Projektarbeit%20-%20Kopie%20(2)/php_dateien/profile.php?user_id='
                    + encodeURIComponent(friendId) + '" title="Userprofil" style="margin-right: 10px;" class="fa-solid fa-user"></a></div>';

                friendList.appendChild(friendItem);
            }
        }
    </script>

</body>

</html>
