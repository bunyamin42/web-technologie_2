<?php

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