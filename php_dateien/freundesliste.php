<?php
include 'db_connection.php';

session_start();

if (!isset($_SESSION['benutzer_id'])) {
    header('Location: login.php');
    exit();
}

$eingeloggte_benutzer_id = $_SESSION['benutzer_id'];

// Verarbeite das Formular zum Senden von Freundschaftsanfragen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $freund_username = $_POST['freund'];

    // Überprüfe, ob der Freund existiert
    $freund_existiert_sql = "SELECT benutzer_id FROM benutzer WHERE benutzername = '$freund_username'";
    $freund_existiert_result = $connection->query($freund_existiert_sql);

    if ($freund_existiert_result->num_rows > 0) {
        // Freund existiert, sende Freundschaftsanfrage
        $freund_row = $freund_existiert_result->fetch_assoc();
        $freund_benutzer_id = $freund_row['benutzer_id'];

        // Überprüfe, ob bereits eine Freundschaftsanfrage besteht
        $freundschaft_anfrage_sql = "SELECT * FROM freundschaft WHERE (fk_benutzer_id1 = $eingeloggte_benutzer_id AND fk_benutzer_id2 = $freund_benutzer_id) OR (fk_benutzer_id1 = $freund_benutzer_id AND fk_benutzer_id2 = $eingeloggte_benutzer_id)";
        $freundschaft_anfrage_result = $connection->query($freundschaft_anfrage_sql);

        if ($freundschaft_anfrage_result->num_rows == 0) {
            // Keine bestehende Anfrage, sende neue Anfrage
            $freundschaft_anfrage_insert_sql = "INSERT INTO freundschaft (status, fk_benutzer_id1, fk_benutzer_id2) VALUES (0, $eingeloggte_benutzer_id, $freund_benutzer_id)";
            if ($connection->query($freundschaft_anfrage_insert_sql) === TRUE) {
                echo "Freundschaftsanfrage an $freund_username erfolgreich gesendet.";
            } else {
                echo "Fehler beim Senden der Freundschaftsanfrage: " . $connection->error;
            }
        } else {
            echo "Eine Freundschaftsanfrage besteht bereits.";
        }
    } else {
        echo "Der Freund existiert nicht.";
    }
}



// Abfrage, um alle Freunde des eingeloggten Benutzers abzurufen
$freunde_abfrage_sql = "SELECT b.* FROM benutzer b
                        INNER JOIN freundschaft f ON (b.benutzer_id = f.fk_benutzer_id1 OR b.benutzer_id = f.fk_benutzer_id2)
                        WHERE ((f.fk_benutzer_id1 = $eingeloggte_benutzer_id AND f.fk_benutzer_id2 != $eingeloggte_benutzer_id) OR (f.fk_benutzer_id2 = $eingeloggte_benutzer_id AND f.fk_benutzer_id1 != $eingeloggte_benutzer_id))
                        AND f.status = 1 AND b.benutzer_id != $eingeloggte_benutzer_id";

$freunde_result = $connection->query($freunde_abfrage_sql);





?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freundesliste</title>
</head>
<body>

    <h1>Freundesliste</h1>

    <!-- Formular zum Senden von Freundschaftsanfragen -->
    <form method="post" action="">
        <label for="freund">Freundschaftsanfrage senden an:</label>
        <input type="text" name="freund" required>
        <button type="submit">Anfrage senden</button>
    </form>

    <?php
    if ($freunde_result->num_rows > 0) {
        echo "<h2>Deine Freunde:</h2>";
        while ($freund = $freunde_result->fetch_assoc()) {
            echo "<p>{$freund['benutzername']}</p>";
            // Hier kannst du weitere Informationen über den Freund ausgeben
        }
    } else {
        echo "<p>Keine Freunde gefunden.</p>";
    }
    ?>

</body>
</html>

<?php
$connection->close();
?>
