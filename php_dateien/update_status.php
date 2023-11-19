
<?php

include("db_connection.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {}

    $benutzer_id = $_SESSION['benutzer_id'];

    $sql_status_ändern= "UPDATE benutzer SET log_in='Online' WHERE benutzer_id='$benutzer_id'";
    $sql_result = mysqli_query($connection, $sql_status_ändern);

    if ($sql_result) {
        echo "success";
    } else {
        echo "error";
    }


    ?>