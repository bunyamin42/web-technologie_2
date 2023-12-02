<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['friendId'])) {
    // Hier kannst du den Code zum Löschen des Freundes aus der Datenbank implementieren
    $friendId = $_POST['friendId'];
    // Führe die DELETE-Operation in der Datenbank aus
    $deleteQuery = "DELETE FROM freundschaft WHERE fk_benutzer_id1 = $friendId OR fk_benutzer_id2 = $friendId";
    $result = mysqli_query($connection, $deleteQuery);

    if ($result) {
        // Erfolgreich gelöscht
        echo 'Freund erfolgreich gelöscht.';
    } else {
        // Fehler beim Löschen
        echo 'Fehler beim Löschen des Freundes.';
    }
} else {
    // Ungültige Anfrage
    echo 'Ungültige Anfrage.';
}

// Die Verbindung schließen (optional)
mysqli_close($connection);
?>
