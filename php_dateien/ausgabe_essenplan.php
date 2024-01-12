<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
} else {

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


 
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Wöchentlicher Essensplan</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../style_essenplan.css">
</head>
<body>

<!-- HTML-Header -->
<div class="container">
  <h1 class="mt-4 mb-4 text-center">Wöchentlicher Essensplan</h1>

  <!-- Durchlaufe die Tage der Woche -->
  <?php 
   $germanDays = array(
    "monday" => "Montag",
    "tuesday" => "Dienstag",
    "wednesday" => "Mittwoch",
    "thursday" => "Donnerstag",
    "friday" => "Freitag",
    "saturday" => "Samstag",
    "sunday" => "Sonntag"
  );

  foreach ($mealPlan["week"] as $day => $dayMeals): ?>
    <div class="mb-4">
      <h1 class="text-center"><?php echo $germanDays[$day]; ?></h1>

      <!-- Überprüfe, ob Nährstoffe vorhanden sind -->
      <?php if (isset($dayMeals["nutrients"])): ?>
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="card-title text-center">Nährstoffe für den Tag</h3>
            <ul class="list-unstyled">
              <li><strong>Kalorien:</strong> <?php echo $dayMeals['nutrients']['calories']; ?> kcal</li>
              <li><strong>Protein:</strong> <?php echo $dayMeals['nutrients']['protein']; ?> g</li>
              <li><strong>Fett:</strong> <?php echo $dayMeals['nutrients']['fat']; ?> g</li>
              <li><strong>Kohlenhydrate:</strong> <?php echo $dayMeals['nutrients']['carbohydrates']; ?> g</li>
            </ul>
          </div>
        </div>
      <?php else: ?>
        <p>Keine Nährstoffinformationen gefunden.</p>
      <?php endif; ?>

      <!-- Überprüfe, ob es Mahlzeiten für den Tag gibt -->
      <?php if (isset($dayMeals["meals"])): ?>
        <!-- Durchlaufe die Mahlzeiten für den Tag -->
        <div class="row">
          <?php foreach ($dayMeals["meals"] as $meal): ?>
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <img src="https://spoonacular.com/recipeImages/<?php echo $meal['id']; ?>-636x393.jpg" class="card-img-top" alt="<?php echo $meal["title"]; ?>">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $meal["title"]; ?></h3>
                  <p class="card-text"><strong>Quelle:</strong> <a href="<?php echo $meal['sourceUrl']; ?>" target="_blank"><?php echo $meal['sourceUrl']; ?></a></p>
                  <p class="card-text"><strong>Zubereitungszeit:</strong> <?php echo $meal['readyInMinutes']; ?> Minuten</p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p>Keine Mahlzeiten gefunden.</p>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>

<!-- HTML-Footer -->
</div>

<!-- Bootstrap JS und jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

<?php
} else {
  echo "Invalid request method.";
}

}
?>