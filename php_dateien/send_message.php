<?php
// send_message.php

session_start();
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['msg_content'], $_POST['sender'], $_POST['receiver'])) {
        $msg = htmlentities($_POST['msg_content']);
        $sender = $_POST['sender'];
        $receiver = $_POST['receiver'];

        if ($msg !== "") {
            // Fügen Sie die Nachricht in die Datenbank ein
            $insert = "INSERT INTO users_chat(sender_username, receiver_username, msg_content, msg_status, msg_date) VALUES('$sender', '$receiver', '$msg', 'unread', NOW())";
            $run_insert = mysqli_query($connection, $insert);

            echo "Nachricht erfolgreich gesendet";
        } else {
            echo "Leere Nachricht wurde nicht gesendet";
        }
    } else {
        echo "Ungültige Anfrageparameter";
    }
} else {
    echo "Nicht autorisierte Anfrage";
}
?>
