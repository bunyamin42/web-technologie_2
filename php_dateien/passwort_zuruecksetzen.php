<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("db_connection.php");

// Überprüfen, ob ein Token in der URL vorhanden ist
if (isset($_GET['token'])) {    
    $token = $_GET['token'];

    // Überprüfen, ob das Token in der Datenbank vorhanden ist
    $result = mysqli_query($connection, "SELECT * FROM benutzer WHERE passwort_reset_token='$token'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Token ist gültig, hier das Formular zum Zurücksetzen des Passworts anzeigen
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Hier die Logik für das Zurücksetzen des Passworts implementieren
            $neues_passwort = mysqli_real_escape_string($connection, $_POST['neues_passwort']);
           

            // Das Passwort in der Datenbank aktualisieren und das Token zurücksetzen
            mysqli_query($connection, "UPDATE benutzer SET passwort='$neues_passwort', passwort_reset_token=NULL WHERE benutzer_id ={$row['benutzer_id']}");

            // Erfolgsmeldung
            echo "<div class='message_success'>Passwort erfolgreich zurückgesetzt. Du kannst dich jetzt anmelden.</div>";
        } else {
            // Formular zum Zurücksetzen des Passworts anzeigen
            echo '
            <!DOCTYPE html>
            <html lang="de">
            <head>
                <!-- Kopfzeile wie in der login.code-Datei -->
            </head>
            <body>
                <div class="container">
                    <div class="box form-box">
                        <header>Passwort zurücksetzen</header>
                        <form action="" method="post">
                            <div class="field input">
                                <label for="neues_passwort">Neues Passwort</label>
                                <input type="password" name="neues_passwort" id="neues_passwort" autocomplete="off" required>
                            </div>
                            <div class="field">
                                <input type="submit" class="btn" value="Passwort zurücksetzen">
                            </div>
                        </form>
                        <div class="links">
                            <a href="login.php">Zurück zum Login</a>
                        </div>
                    </div>
                </div>
            </body>
            </html>';
        }
    } else {
        echo "<div class='message'>Ungültiges Token.</div>";
    }
} else {
    echo "<div class='message'>Token nicht vorhanden.</div>";
}
?>
