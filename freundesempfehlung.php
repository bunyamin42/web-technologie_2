<?php
include("db_connection.php");
require 'vendor/autoload.php'; // Stelle sicher, dass die PHP-ML-Bibliothek installiert ist
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Metric\Similarity;
use Phpml\Math\Distance\Cosine;


// Benutzer, der gerade eingeloggt ist
$eingeloggter_benutzer_id = 1; // Hier deine Benutzer-ID einsetzen

// Alle Benutzerprofile und -IDs aus der Datenbank abrufen
$sql = "SELECT benutzer_id, profile_informationen FROM benutzer WHERE benutzer_id != $eingeloggter_benutzer_id";
$result = $connection->query($sql);

$benutzerprofile = [];
while ($row = $result->fetch_assoc()) {
    $benutzerprofile[] = $row;
}

// Profile in eine Liste extrahieren
$profile_texts = array_column($benutzerprofile, 'profile_informationen');

// Das Profil des eingeloggten Benutzers extrahieren
$sql = "SELECT profile_informationen FROM benutzer WHERE benutzer_id = $eingeloggter_benutzer_id";
$result = $connection->query($sql);
$eingeloggter_benutzer_profil = $result->fetch_assoc()['profile_informationen'];

// Tokenizer und Vektorizer erstellen
$vectorizer = new TokenCountVectorizer(new TfIdfTransformer());
$vectorizer->fit($profile_texts);

// Vektoren erstellen
$vectors = $vectorizer->transform([$eingeloggter_benutzer_profil] + $profile_texts);

// Ähnlichkeitsmatrix erstellen
$cosine = new Cosine();
$similarityMatrix = Similarity::cosineSimilarityMatrix($vectors, $cosine);

// Ergebnisse
$similarities_with_logged_in_user = array_slice($similarityMatrix[0], 1);

// Benutzer-IDs sortiert nach Ähnlichkeit in absteigender Reihenfolge erhalten
$sorted_user_ids = array_keys($similarities_with_logged_in_user, max($similarities_with_logged_in_user));

// Freundeempfehlung
$freundeempfehlung = array_column($benutzerprofile, 'benutzer_id');
array_multisort(array_values($similarities_with_logged_in_user), SORT_DESC, $freundeempfehlung);

// Ausgabe der Freundeempfehlung
echo "Freundeempfehlung (nach Ähnlichkeit absteigend): " . implode(", ", $freundeempfehlung);

// Verbindung schließen
$connection->close();
?>
