<?php






include("db_connection.php");
session_start();
$benutzername = $_SESSION['benutzername'];

// Die benutzer_id vom Benutzer herausfinden, und in Session speichern
$sql_benutzerid = "SELECT benutzer_id, benutzername FROM benutzer WHERE benutzername = '$benutzername'";

$result = mysqli_query($connection, $sql_benutzerid);
$row = mysqli_fetch_assoc($result);

$_SESSION['benutzer_id'] = $row['benutzer_id'];
$_SESSION['benutzername'] = $row['benutzername'];

// Verbindung überprüfen
if ($connection->connect_error) {
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);
}

// SQL-Abfrage erstellen, um alle Beiträge von Freunden und eigene Beiträge anzuzeigen
$sql_beiträge = "
    SELECT DISTINCT b.*, u.benutzername as autor
    FROM beitrag b
    JOIN freundschaft f ON (b.fk_benutzer_id  = f.fk_benutzer_id1 OR b.fk_benutzer_id = f.fk_benutzer_id2)
    JOIN benutzer u ON b.fk_benutzer_id = u.benutzer_id
    WHERE f.status = 1  -- Annahme: Status 1 bedeutet Freundschaft akzeptiert
    AND (f.fk_benutzer_id1 = {$_SESSION['benutzer_id']} OR f.fk_benutzer_id2 = {$_SESSION['benutzer_id']})
    ORDER BY b.veröffentlichungsdatum DESC;
";

// SQL-Abfrage ausführen
$result_beiträge =  mysqli_query($connection, $sql_beiträge);

// Überprüfen, ob die Abfrage erfolgreich war
if ($result_beiträge === FALSE) {
    die("Abfrage fehlgeschlagen: " . $connection->error);
}

// Erstellen Sie ein Array, um alle Beiträge zu speichern
$alle_beiträge = array();

while ($row_beiträge = mysqli_fetch_assoc($result_beiträge)) {
    // Fügen Sie jeden Beitrag zum Array hinzu
    $beitrag = array(
        'Benutzer' => $row_beiträge['autor'],
        'Inhalt' => $row_beiträge['inhalt'],
        'Autor' => $row_beiträge['autor'],
        'Likes' => $row_beiträge['likes'],
        'Kommentare' => holeKommentare($row_beiträge['beitrag_id'])
    );

    $alle_beiträge[] = $beitrag;
}

// Verbindung schließen
$connection->close();

echo json_encode($alle_beiträge);

// Funktion zum Abrufen der Kommentare für einen Beitrag
function holeKommentare($beitragId) {
    global $connection;
    $kommentare = array();

    $sql_kommentare = "
        SELECT k.*, u.benutzername as kommentator
        FROM kommentar k
        JOIN benutzer u ON k.fk_benutzer_id = u.benutzer_id
        WHERE k.fk_beitrag_id = $beitragId
    ";

    $result_kommentare = mysqli_query($connection, $sql_kommentare);

    if ($result_kommentare !== FALSE) {
        while ($row_kommentar = mysqli_fetch_assoc($result_kommentare)) {
            $kommentare[] = array(
                'Kommentator' => $row_kommentar['kommentator'],
                'Text' => $row_kommentar['kommentar_inhalt']
            );
        }
    }

    return $kommentare;
}

?>