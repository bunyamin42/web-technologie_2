<?php 
include("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['friendID'])) {
        $friendid = $_POST['friendID'];
        session_start();
        $logeduserid= $_SESSION['benutzer_id'];

        // Überprüfen, ob der eingeloggte Benutzer nicht der gleiche wie der Freund ist
        if ($logeduserid != $friendid) {
            $sql = "INSERT INTO freundschaft (status, fk_benutzer_id1, fk_benutzer_id2) VALUES (0, '$logeduserid', '$friendid')";

            if (mysqli_query($connection, $sql)) {
                echo "success"; 
            } else {
                echo "error"; 
            }
        } else {
            echo "error: Sie können sich nicht selbst eine Freundschaftsanfrage senden.";
        }
    } else {
        echo "error: Ungültige Anfrage, friendID fehlt!";
    }
}
?>
