<?php
// mailMock.php

function sendMail($to, $subject, $message) {
    // Suchmuster, um den Passwort-Wiederherstellungslink zu extrahieren
    $pattern = '/(http:\/\/.*\/passwort_zuruecksetzen.php\?token=[a-f0-9]+)/';

    // Prüfe, ob das Muster im Nachrichtentext vorhanden ist
    if (preg_match($pattern, $message, $matches)) {
        // Extrahiere den Link
        $resetLink = $matches[1];

        // Leite den Benutzer auf die Passwort-Wiederherstellungsseite weiter
        header("Location: $resetLink");
        exit();
    } else {
        echo "Fehler beim Extrahieren des Reset-Links.";
        // Hier könntest du den Benutzer auf eine Fehlerseite weiterleiten oder andere Maßnahmen ergreifen.
        exit();
    }
}
?>
