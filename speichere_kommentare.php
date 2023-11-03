<?php
// speichere_kommentar.php

require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["beitragId"]) && isset($_POST["benutzer"]) && isset($_POST["text"])) {
    $beitragId = $_POST["beitragId"];
    $benutzer = $_POST["benutzer"];
    $text = $_POST["text"];

    // Hier die Logik zum Speichern des Kommentars in der Datenbank
    $sql = "INSERT INTO kommentar (kommentar_inhalt, kommentar_veröffentlichungsdatum, fk_beitrag_id, fk_benutzer_id) 
            VALUES ('$text', NOW(), $beitragId, (SELECT benutzer_id FROM benutzer WHERE benutzername = '$benutzer'))";

    if ($conn->query($sql) === TRUE) {
        // Erfolgreich eingefügt
        echo "success";
    } else {
        // Fehler beim Einfügen
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Unerlaubter Zugriff
    http_response_code(403);
    echo "Forbidden";
}
?>
