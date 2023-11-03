<?php
// lade_kommentare.php

require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["beitragId"])) {
    $beitragId = $_POST["beitragId"];

    // Hier die Logik zum Laden der Kommentare aus der Datenbank
    $sql = "SELECT kommentar.*, benutzer.benutzername 
            FROM kommentar 
            JOIN benutzer ON kommentar.fk_benutzer_id = benutzer.benutzer_id 
            WHERE kommentar.fk_beitrag_id = $beitragId";
    
    $result = $conn->query($sql);

    $kommentare = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kommentare[] = [
                'Benutzer' => $row['benutzername'],
                'Inhalt' => $row['kommentar_inhalt'],
                'Veröffentlichungsdatum' => $row['kommentar_veröffentlichungsdatum']
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($kommentare);
} else {
    // Unerlaubter Zugriff
    http_response_code(403);
    echo "Forbidden";
}
?>
