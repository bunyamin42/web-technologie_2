<?php
   include("db_connection.php");

function alleKommentareAnzeigen() {
    global $connection;

    // SQL-Abfrage erstellen, um alle Kommentare abzurufen
    $sql_kommentare = "
        SELECT k.*, u.benutzername as kommentator, b.inhalt as beitrag_inhalt
        FROM kommentar k
        JOIN benutzer u ON k.fk_benutzer_id = u.benutzer_id
        JOIN beitrag b ON k.fk_beitrag_id = b.beitrag_id
        ORDER BY k.kommentar_veröffentlichungsdatum DESC;
    ";

    // SQL-Abfrage ausführen
    $result_kommentare = mysqli_query($connection, $sql_kommentare);

    // Überprüfen, ob die Abfrage erfolgreich war
    if ($result_kommentare === FALSE) {
        die("Abfrage fehlgeschlagen: " . $connection->error);
    }

    // Erstellen Sie ein Array, um alle Kommentare zu speichern
    $alle_kommentare = array();

    while ($row_kommentar = mysqli_fetch_assoc($result_kommentare)) {
        // Fügen Sie jeden Kommentar zum Array hinzu
        $kommentar = array(
            'Kommentator' => $row_kommentar['kommentator'],
            'BeitragInhalt' => $row_kommentar['beitrag_inhalt'],
            'KommentarInhalt' => $row_kommentar['kommentar_inhalt'],
            'Veröffentlichungsdatum' => $row_kommentar['kommentar_veröffentlichungsdatum']
        );

        $alle_kommentare[] = $kommentar;
    }

    // JSON-Ausgabe für JavaScript
    echo json_encode($alle_kommentare);
}

// Funktion aufrufen, um alle Kommentare anzuzeigen
alleKommentareAnzeigen();
?>
