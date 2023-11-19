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

    // Lösche die Freundschaftsanfrage (optional, je nach deinem Design)
    $freundschaft_ablehnen_sql = "DELETE FROM freundschaft WHERE freundschaft_id = $freundschaftsanfrage_id AND fk_benutzer_id2 = $eingeloggte_benutzer_id";

    if ($connection->query($freundschaft_ablehnen_sql) === TRUE) {
        echo "Freundschaftsanfrage abgelehnt.";
    } else {
        echo "Fehler beim Ablehnen der Freundschaftsanfrage: " . $connection->error;
    }
} else {
    echo "Ungültige Anfrage.";
}

$connection->close();
?>
