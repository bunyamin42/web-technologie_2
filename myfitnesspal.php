<?php
session_start();

// API-Schlüssel für Spoonacular einfügen
$apiKey = "2b94f48dd0b84fc8b03fd8c7661e84f4"; // Ersetze dies durch deinen API-Schlüssel

// Funktion zum Erstellen eines Wochenplans definieren
function createWeeklyMealPlan($apiKey, $timeFrame = "week", $targetCalories = 2000, $diet = "", $exclude = "") {
  // API-Anfrage erstellen
  $url = "https://api.spoonacular.com/mealplanner/generate?apiKey=$apiKey&timeFrame=$timeFrame&targetCalories=$targetCalories&diet=$diet&exclude=$exclude&includeIngredients=true";

  // API-Anfrage ausführen
  $response = file_get_contents($url);

  // Antwort als JSON-Objekt decodieren
  $json = json_decode($response, true);

  // Wochenplan zurückgeben
  return $json;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Wochenplan erstellen
  $targetCalories = $_POST['targetCalories'];
  $diet = isset($_POST['diet']) ? $_POST['diet'] : "";
  $exclude = isset($_POST['exclude']) ? $_POST['exclude'] : "";

  $mealPlan = createWeeklyMealPlan($apiKey, "week", $targetCalories, $diet, $exclude);
  $_SESSION['mealplan'] = $mealPlan;
  
  // Wochenplan ausgeben
  echo "<h1>Wöchentlicher Essensplan</h1>";

  // Durchlaufe die Tage der Woche
  foreach ($mealPlan["week"] as $day => $dayMeals) {
    echo "<h2>$day</h2>";

    // Überprüfe, ob Nährstoffe vorhanden sind
    if (isset($dayMeals["nutrients"])) {
      echo "<h3>Nährstoffe für den Tag:</h3>";
      echo "<ul>";
      echo "<li><strong>Kalorien:</strong> {$dayMeals['nutrients']['calories']} kcal</li>";
      echo "<li><strong>Protein:</strong> {$dayMeals['nutrients']['protein']} g</li>";
      echo "<li><strong>Fett:</strong> {$dayMeals['nutrients']['fat']} g</li>";
      echo "<li><strong>Kohlenhydrate:</strong> {$dayMeals['nutrients']['carbohydrates']} g</li>";
      echo "</ul>";
    } else {
      echo "<p>Keine Nährstoffinformationen gefunden.</p>";
    }

    // Überprüfe, ob es Mahlzeiten für den Tag gibt
    if (isset($dayMeals["meals"])) {
      // Durchlaufe die Mahlzeiten für den Tag
      foreach ($dayMeals["meals"] as $meal) {
        echo "<h3>{$meal["title"]}</h3>";
        echo "<img src=\"{$meal["imageType"]}\" alt=\"{$meal["title"]}\">";
        echo "<p><strong>Quelle:</strong> <a href='{$meal['sourceUrl']}' target='_blank'>{$meal['sourceUrl']}</a></p>";
        // Zubereitungszeit ausgeben
        echo "<p><strong>Zubereitungszeit:</strong> {$meal['readyInMinutes']} Minuten</p>";
      }
    } else {
      echo "<p>Keine Mahlzeiten gefunden.</p>";
    }
  }
} else {
  echo "Invalid request method.";
}
?>
