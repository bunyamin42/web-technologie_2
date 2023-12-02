<?php

use LDAP\Result;

include("db_connection.php");
session_start();

$eingeloggter_benutzer_id = $_SESSION['benutzer_id'];

// Hier startet der Pyhton Prozess, als übergabe Parameter wird die benutzer_id übergeben

$python_path = '"C:/Users/dual Studierende/AppData/Local/Programs/Python/Python311/python.exe"';
$python_script_path = '"C:/xampp2/htdocs/Projekt FitBook/Web-Technologie-Projektarbeit - Kopie (2)/php_dateien/freundesempehlung.py"';


$cmd = $python_path . ' ' . $python_script_path . ' ' . escapeshellarg($eingeloggter_benutzer_id) . ' 2>&1';
$freundeempfehlung_json = shell_exec($cmd);

// 
$freundeempfehlung_data = json_decode($freundeempfehlung_json, true);
$freundeempfehlung = $freundeempfehlung_data['freundeempfehlung'];

if ($freundeempfehlung_json !== null) {
    // Verarbeite die JSON-Daten
    $freundeempfehlung_data = json_decode($freundeempfehlung_json, true);

   
    if (isset($freundeempfehlung_data['freundeempfehlung'])) {
        $freundeempfehlung = $freundeempfehlung_data['freundeempfehlung'];
    
        foreach($freundeempfehlung as $freundid){
            $sql_freundid = "select * from benutzer where benutzer_id=$freundid";
            $sql_result= mysqli_query($connection, $sql_freundid);
            $result_assoc = mysqli_fetch_assoc($sql_result);
            
            $response['freundendaten'][] = $result_assoc;
        }
    } else {
        $response['error'] = "Fehler: 'freundeempfehlung' nicht im JSON gefunden.";
    }
} else {
    $response['error'] = "Fehler: Keine Daten von der Python-Datei erhalten.";
}

// Gib das Ergebnis als JSON zurück
header('Content-Type: application/json');
echo json_encode($response);
?>