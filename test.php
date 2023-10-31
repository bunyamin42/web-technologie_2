<?php
include("db_connection.php");
session_start();



function speichereBeitragDatenbank($benutzervombeitrag, $contentBeitrag) {
    include("db_connection.php");
    //SQL-Abfrage zum Einfügen des Beitrags in die Datenbank
    $sql= "INSERT INTO beitrag (inhalt, likes, veröffentlichungsdatum, fk_benutzer_id)
    VALUES ('$contentBeitrag', 0, NOW(), $benutzervombeitrag )";

    // Die SQL-Abfrage ausführen
if ($connection->query($sql) === TRUE) {
    echo "Beitrag erfolgreich in die Datenbank eingefügt";
} else {
    echo "Fehler beim Einfügen des Beitrags: " . $connection->error;
}

}


speichereBeitragDatenbank("timmm", "hello wie gehts");



?>