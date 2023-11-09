<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "web-technologie";

// Verbindung herstellen
$connection = new mysqli($servername, $username, $password, $dbname);

// Die Verbindung prüfen

if($connection->connect_error ){
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);


}
