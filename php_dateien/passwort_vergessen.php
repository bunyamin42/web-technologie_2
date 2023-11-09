<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("db_connection.php");
include("mailMock.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $result = mysqli_query($connection, "SELECT * FROM benutzer WHERE email='$email'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $token = bin2hex(random_bytes(32));
        $benutzer_id = $row['benutzer_id'];
        mysqli_query($connection, "UPDATE benutzer SET passwort_reset_token='$token' WHERE benutzer_id=$benutzer_id");

        $resetLink = "http://localhost/Projekt%20FitBook/Web-Technologie-Projektarbeit/passwort_zuruecksetzen.php?token=$token";
        $subject = "Passwort zurücksetzen";
        $message = "Hallo,\n\nDu kannst dein Passwort hier zurücksetzen: $resetLink";
        
        // Statt mail() die Mock-Funktion verwenden
        sendMail($email, $subject, $message);
        
        // Hinweis an den Benutzer
        echo "<div class='message_success'>Eine E-Mail zum Zurücksetzen des Passworts wurde an deine E-Mail-Adresse gesendet.</div>";
    } else {
        echo "<div class='message'>Die angegebene E-Mail-Adresse existiert nicht.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Kopfzeile wie in der login.code-Datei -->
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Passwort vergessen</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
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
</html>
