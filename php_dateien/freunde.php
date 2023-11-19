<?php
include('db_connection.php');
// Annahme: Der eingeloggte Benutzer hat die ID 1
$loggedUserId = 27;

// SQL-Abfrage für Freunde des eingeloggten Benutzers
$sql = "SELECT benutzer.* FROM benutzer
        INNER JOIN freundschaft ON (benutzer.benutzer_id = freundschaft.fk_benutzer_id1 OR benutzer.benutzer_id = freundschaft.fk_benutzer_id2)
        WHERE (freundschaft.fk_benutzer_id1 = $loggedUserId OR freundschaft.fk_benutzer_id2 = $loggedUserId) AND freundschaft.status = 1";

$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freundesliste</title>
</head>
<body>
    <h1>Freundesliste</h1>
    <div id="friendList"></div>

    <!-- Hier wird die Freundesliste angezeigt -->

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $friendId = $row['benutzer_id'];
            $friendUsername = $row['benutzername'];
            $friendProfilePic = $row['user_profil'];

            // Hier kannst du JavaScript verwenden, um die Freundesliste zu manipulieren und anzuzeigen
            if ($friendId != $loggedUserId) {
                echo "<script>
                      // Annahme: Du hast ein HTML-Element mit der ID 'friendList' für die Anzeige
                      var friendList = document.getElementById('friendList');
                      var friendItem = document.createElement('div');
                      friendItem.innerHTML = '<img src=\"$friendProfilePic\" alt=\"$friendUsername\'s Profilbild\"><p>$friendUsername</p>';
                      friendList.appendChild(friendItem);
                    </script>";
            }
        }
    }


    // Die Verbindung schließen (optional)
    mysqli_close($connection);
    ?>

    <script>
        // Dein zusätzliches JavaScript hier, falls erforderlich
    </script>
</body>
</html>
