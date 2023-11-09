<?php
include("db_connection.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $benutzer_Id = $_SESSION['benutzer_id'];
    $contentBeitrag = $_POST['contentBeitrag'];

    // Durch beitragsinhalt den Beitrag_id herausfinden
$queryBeitrag = "SELECT * FROM beitrag WHERE inhalt = '$contentBeitrag'";
$resultBeitrag = mysqli_query($connection, $queryBeitrag);

if (mysqli_num_rows($resultBeitrag) > 0) {
    // Der Beitrag mit dem angegebenen Inhalt existiert
    //  beitrag_id aus dem Ergebnis holen
    $row = mysqli_fetch_assoc($resultBeitrag);
    $beitrag_id = $row['beitrag_id'];

    // Überprüfe in der Datenbank, ob der Benutzer den Beitrag bereits geliked hat
    $query = "SELECT * FROM liked_beitraege WHERE fk_benutzer_id = '$benutzer_Id' AND fk_beitrag_id = '$beitrag_id'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Der Beitrag wurde bereits geliked
        echo "liked";
    } else {
        // Der Beitrag wurde noch nicht geliked
        echo "not_liked";
    }
} }
?>
