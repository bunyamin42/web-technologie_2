<?php
include 'db_connection.php';

session_start();

if (!isset($_SESSION['benutzer_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $freundschaftsanfrage_id = $_GET['id'];
    $eingeloggte_benutzer_id = $_SESSION['benutzer_id'];

    // Aktualisiere den Status der Freundschaftsanfrage auf "angenommen" (status = 1)
    $freundschaft_annehmen_sql = "UPDATE freundschaft SET status = 1 WHERE freundschaft_id = $freundschaftsanfrage_id AND fk_benutzer_id2 = $eingeloggte_benutzer_id";

    if ($connection->query($freundschaft_annehmen_sql) === TRUE) {
        echo "Freundschaftsanfrage angenommen.";
    } else {
        echo "Fehler beim Annehmen der Freundschaftsanfrage: " . $connection->error;
    }
} else {
    echo "Ungültige Anfrage.";
}

$connection->close();
?>
