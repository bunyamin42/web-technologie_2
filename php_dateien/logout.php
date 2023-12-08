<?php
include("db_connection.php");
      session_start();
      $update_last_activity = "UPDATE benutzer SET last_activity = NOW(), log_in = 'Offline' WHERE benutzer_id = {$_SESSION['user_id']}";
      mysqli_query($connection, $update_last_activity);
      session_destroy();
      header("Location: login.php");
?>