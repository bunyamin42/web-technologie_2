<?php 
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
        echo "Freundeempfehlung: ";
        print_r($freundeempfehlung);
        
    } else {
        echo "Fehler: 'freundeempfehlung' nicht im JSON gefunden.";
    }
} else {
    echo "Fehler: Keine Daten von der Python-Datei erhalten.";
}
?>