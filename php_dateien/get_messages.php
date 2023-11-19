<?php
session_start();
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['receiver_username'])) {
        $receiverUsername = mysqli_real_escape_string($connection, $_GET['receiver_username']);
        $loggedInUser = $_SESSION['email'];

        $updateQuery = "UPDATE users_chat SET msg_status='read'
                        WHERE sender_username='$receiverUsername' AND receiver_username='$loggedInUser'";

        $runUpdate = mysqli_query($connection, $updateQuery);

        if ($runUpdate) {
            $selectQuery = "SELECT * FROM users_chat
                            WHERE (sender_username='$loggedInUser' AND receiver_username='$receiverUsername')
                                OR (receiver_username='$loggedInUser' AND sender_username='$receiverUsername')
                            ORDER BY msg_date ASC";

            $runSelect = mysqli_query($connection, $selectQuery);

            if ($runSelect) {
                while ($row = mysqli_fetch_assoc($runSelect)) {
                    $senderUsername = $row['sender_username'];
                    $receiverUsername = $row['receiver_username'];
                    $msgContent = $row['msg_content'];
                    $msgDate = $row['msg_date'];

                    echo "<li><strong>$senderUsername:</strong> $msgContent <small>$msgDate</small></li>";
                }
            } else {
                echo "Fehler beim Abrufen der Nachrichten: " . mysqli_error($connection);
            }
        } else {
            echo "Fehler beim Aktualisieren des Nachrichtenstatus: " . mysqli_error($connection);
        }
    } else {
        echo "Ungültige Anfrageparameter.";
    }
} else {
    echo "Ungültige Anfrage-Methode.";
}
?>
