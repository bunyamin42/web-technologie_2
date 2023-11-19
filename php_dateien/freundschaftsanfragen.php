<?php
include 'db_connection.php';

session_start();

if (!isset($_SESSION['benutzer_id'])) {
    header('Location: login.php');
    exit();
}

$eingeloggte_benutzer_id = $_SESSION['benutzer_id'];

// Abfrage, um alle eingehenden Freundschaftsanfragen abzurufen
$freundschaftsanfragen_sql = "SELECT b.benutzername, f.freundschaft_id FROM freundschaft f
                              JOIN benutzer b ON f.fk_benutzer_id1 = b.benutzer_id
                              WHERE f.fk_benutzer_id2 = $eingeloggte_benutzer_id
                              AND f.status = 0";

$freundschaftsanfragen_result = $connection->query($freundschaftsanfragen_sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freundschaftsanfragen</title>
</head>
<body>

    <h1>Freundschaftsanfragen</h1>

    <?php
    if ($freundschaftsanfragen_result->num_rows > 0) {
        while ($anfrage = $freundschaftsanfragen_result->fetch_assoc()) {
            echo "<p>{$anfrage['benutzername']} möchte mit dir befreundet sein. ";
            echo "<a href='freundschaft_annehmen.php?id={$anfrage['freundschaft_id']}'>Annehmen</a> | ";
            echo "<a href='freundschaft_ablehnen.php?id={$anfrage['freundschaft_id']}'>Ablehnen</a></p>";
        }
    } else {
        echo "<p>Keine Freundschaftsanfragen vorhanden.</p>";
    }
    ?>

</body>
</html>

<?php
$connection->close();
?>
