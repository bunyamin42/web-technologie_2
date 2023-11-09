<?php

   include("db_connection.php");
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contentBeitrag = mysqli_real_escape_string($connection, $_POST['contentBeitrag']);
    $benutzerId = $_SESSION['benutzer_id'];

    // SQL-Abfrage, um den Beitrag in die Datenbank einzufügen
    $sql = "INSERT INTO beitrag (inhalt, likes, veröffentlichungsdatum, fk_benutzer_id) VALUES ('$contentBeitrag', 0, NOW(), '$benutzerId' )";

    if ($connection->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }

    $connection->close();
}
?>
