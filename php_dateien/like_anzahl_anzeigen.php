<?php
include("db_connection.php");

// Funktion, um Likes für alle Beiträge abzurufen
function alleLikesAnzeigen() {
    global $connection;

    // SQL-Abfrage erstellen, um Likes für alle Beiträge abzurufen
    $sql_likes = "
        SELECT b.inhalt as beitrag_inhalt, COUNT(l.fk_beitrag_id) as likes_anzahl
        FROM beitrag b
        LEFT JOIN liked_beitraege l ON b.beitrag_id = l.fk_beitrag_id
        GROUP BY b.beitrag_id, b.inhalt;
    ";

    // SQL-Abfrage ausführen
    $result_likes = mysqli_query($connection, $sql_likes);

    // Überprüfen, ob die Abfrage erfolgreich war
    if ($result_likes === FALSE) {
        die("Abfrage fehlgeschlagen: " . $connection->error);
    }

    // Erstellen Sie ein Array, um alle Likes zu speichern
    $alle_likes = array();

    while ($row_likes = mysqli_fetch_assoc($result_likes)) {
        // Fügen Sie jeden Like zum Array hinzu
        $like = array(
            'BeitragInhalt' => $row_likes['beitrag_inhalt'],
            'LikesAnzahl' => $row_likes['likes_anzahl']
        );

        $alle_likes[] = $like;
    }

    // JSON-Ausgabe für JavaScript
    echo json_encode($alle_likes);
}

// Funktion aufrufen, um alle Likes anzuzeigen
alleLikesAnzeigen();
?>
