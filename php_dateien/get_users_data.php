<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("db_connection.php");

$eingeloggte_benutzer_id = $_SESSION['user_id'];

$freunde_abfrage_sql = "SELECT b.* FROM benutzer b
                        INNER JOIN freundschaft f ON (b.benutzer_id = f.fk_benutzer_id1 OR b.benutzer_id = f.fk_benutzer_id2)
                        WHERE ((f.fk_benutzer_id1 = $eingeloggte_benutzer_id AND f.fk_benutzer_id2 != $eingeloggte_benutzer_id)
                               OR (f.fk_benutzer_id2 = $eingeloggte_benutzer_id AND f.fk_benutzer_id1 != $eingeloggte_benutzer_id))
                        AND f.status = 1 AND b.benutzer_id != $eingeloggte_benutzer_id";

$freunde_result = mysqli_query($connection, $freunde_abfrage_sql);

while($row_user = mysqli_fetch_array($freunde_result)) {
    $user_id_friend = $row_user['benutzer_id'];
    $user_name_friend = $row_user['benutzername'];
    $user_profile_friend = $row_user['user_profil'];
    $login_friend = $row_user['log_in'];

    echo "<li>
            <div class='chat-left-img'>";
    
    // Füge eine Bedingung hinzu, um das Profilbild anzuzeigen, wenn vorhanden
    
        echo "<img src='$user_profile_friend'>";
  
    
    echo "</div>
            <div class='chat-left-detail'>
                <p><a href='chat.php?user_name=$user_name_friend'>$user_name_friend</a></p>";

    if ($login_friend == 'Online') {
        echo "<span><i class='fa fa-circle' aria-hidden='true' ></i> Online</span>";
    } else {
        echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
    }

    echo "</div>
        </li>";
}

?>
