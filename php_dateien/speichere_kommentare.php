<?php
   include("db_connection.php");

// Überprüfung, ob Anfrage mit der POST-Methode gesendet wurde
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Überprüfe, ob erforderlichen POST-Variablen gesetzt sind

    if(isset($_POST['benutzer'])  && isset($_POST['kommentarText']) && isset($_POST['beitragText'])) {
        
    
        $benutzer = mysqli_real_escape_string($connection, $_POST['benutzer']);
        $beitragText = mysqli_real_escape_string($connection, $_POST['beitragText']);
        $kommentarText = mysqli_real_escape_string($connection, $_POST['kommentarText']);

        // Beitrag_id finden mithilfe des Beitragstext:
        $sql_find_beitrag_id = "SELECT beitrag_id FROM beitrag WHERE inhalt = '$beitragText'";
        $result_find_beitrag_id = mysqli_query($connection, $sql_find_beitrag_id);
        if ($row = mysqli_fetch_assoc($result_find_beitrag_id)) {
            $beitrag_id = $row['beitrag_id'];

            // SQL-Query zum Einfügen des Kommentars in die Datenbank
            $sql = "INSERT INTO kommentar (kommentar_inhalt, kommentar_veröffentlichungsdatum, fk_beitrag_id, fk_benutzer_id) VALUES ('$kommentarText', NOW(), '$beitrag_id', (SELECT benutzer_id FROM benutzer WHERE benutzername = '$benutzer'))";

            // Führe die Query aus
            if(mysqli_query($connection, $sql)) {
                echo "success"; // Erfolgreiche Speicherung in der Datenbank
            } else {
                echo "error"; // Fehler beim Speichern in der Datenbank
            }
        } else {
            echo "error"; // Beitrag nicht gefunden
        }
    } else {
        echo "error"; // Fehler, wenn alle POST variablen nicht gesetzt sind
    }
} else {
    echo "error"; // Fehler, bei senden der Anfrage mit GET statt POST
}

mysqli_close($connection);
?>
