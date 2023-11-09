

<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Benutzername und E-Mail aus der Session holen und bereinigen
$benutzername = mysqli_real_escape_string($connection, $_SESSION['benutzername']);
$email = mysqli_real_escape_string($connection, $_SESSION['email']);

// Die benutzer_id vom Benutzer herausfinden und in der Session speichern
$sql_benutzerid = "SELECT benutzer_id, benutzername FROM benutzer WHERE benutzername = '$benutzername'";

$result_benutzer_id = mysqli_query($connection, $sql_benutzerid);
$row_benutzer_id = mysqli_fetch_assoc($result_benutzer_id);

$_SESSION['benutzer_id'] = $row_benutzer_id['benutzer_id'];
$benutzer_Id = $_SESSION['benutzer_id'];

?>