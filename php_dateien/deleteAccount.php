<?php
include("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // E-Mail-Adresse aus der URL-Parameter
    $userEmail = $_GET['userEmail'];

    
    $sql = "DELETE FROM benutzer WHERE email = '$userEmail'";
    $sql_run = mysqli_query($connection, $sql);

    if ($sql_run === TRUE) {
        // Account erfolgreich gelöscht
        // Weiterleitung zum Login
        header('Location: login.php');
        exit(); 
    } else {
        echo "Fehler beim Löschen des Accounts: " . $connection->error;
    }

    
    $connection->close();
} else {
    
    http_response_code(405); 
    echo "Ungültige Anfragemethode";
}
?>
