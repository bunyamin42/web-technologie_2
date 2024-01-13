<?php
session_start();
include("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['friendId'])) {
        $friendId = $_POST['friendId'];
        $loggedUserId = $_SESSION['user_id'];

        $sql = "UPDATE freundschaft SET status = 1 WHERE (fk_benutzer_id1 = $friendId AND fk_benutzer_id2 = $loggedUserId) OR (fk_benutzer_id1 = $loggedUserId AND fk_benutzer_id2 = $friendId)";

        if (mysqli_query($connection, $sql)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "Ungültige Anfrage, FriendId fehlt!";
    }
}
?>
