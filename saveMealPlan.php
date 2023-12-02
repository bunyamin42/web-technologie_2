<?php
include("php_dateien/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = 34;

    // Hole den JSON-String aus dem Eingabestrom
    $raw_data = file_get_contents("php://input");

    // Überprüfe, ob Daten vorhanden sind
    if (!empty($raw_data)) {
        // Dekodiere den JSON-String
        $plan_data = json_decode($raw_data, true);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // JSON-Daten in Zeichenfolge umwandeln und escapen
        $plan_data_str = $connection->real_escape_string(json_encode($plan_data));

        // SQL-Befehl zum Einfügen des Essensplans in die Datenbank
        $sql = "INSERT INTO meal_plans (benutzer_id, plan_daten) VALUES ('$user_id', '$plan_data_str')";

        if ($connection->query($sql) === TRUE) {
            echo "Essensplan erfolgreich gespeichert.";
        } else {
            echo "Fehler beim Speichern des Essensplans: " . $connection->error;
        }

        // Schließe die Verbindung zur Datenbank
        $connection->close();
    } else {
        // Ausgabe einer Fehlermeldung, wenn keine Daten vorhanden sind
        echo "Fehler: Keine Daten im JSON-Format empfangen.";
    }
} else {
    // Ausgabe einer Fehlermeldung, wenn keine POST-Anfrage
    echo "Fehler: Keine POST-Anfrage.";
}
?>
