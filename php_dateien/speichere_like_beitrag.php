<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Benutzer und Beitragsinhalt aus dem Formular erhalten
    $benutzer_id = $_SESSION['benutzer_id'];
    $contentBeitrag = $_POST['contentBeitrag'];

// Durch beitragsinhalt den Beitrag_id herausfinden
$queryBeitrag = "SELECT * FROM beitrag WHERE inhalt = '$contentBeitrag'";
$resultBeitrag = mysqli_query($connection, $queryBeitrag);

if (mysqli_num_rows($resultBeitrag) > 0) {
    // Der Beitrag mit dem angegebenen Inhalt existiert
    //  beitrag_id aus dem Ergebnis holen
    $row = mysqli_fetch_assoc($resultBeitrag);
    $beitrag_id = $row['beitrag_id'];
    // Überprüfe, ob der Benutzer bereits einen Like für diesen Beitrag abgegeben hat
    $query = "SELECT * FROM liked_beitraege WHERE fk_benutzer_id = '$benutzer_id' AND fk_beitrag_id = '$beitrag_id'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 0) {
        // Benutzer hat noch keinen Like abgegeben, speichere den Like in der Datenbank
        $queryInsertLike = "INSERT INTO liked_beitraege (fk_benutzer_id, fk_beitrag_id) VALUES ('$benutzer_id', '$beitrag_id')";
        $resultInsertLike = mysqli_query($connection, $queryInsertLike);

        if ($resultInsertLike) {
            // Erfolgreich gespeichert
            echo "success";
        } else {
            // Fehler beim Speichern
            echo "error";
        }
    } else {
        // Benutzer hat bereits einen Like abgegeben
        echo "already_liked";
    }
} }
