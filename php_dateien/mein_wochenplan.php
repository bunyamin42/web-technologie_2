<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mein Wochenplan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
  <style>


    #buttonsContainer {
      text-align: center;
      margin-top: 20px;
    }

    #formContainer {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 15px;
      margin-top: 50px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    #mealPlanForm button {
      width: 100%;
      margin-top: 15px;
      font-size: 18px;
    }

    #mealPlanForm label {
      font-size: 18px;
    }
  </style>
</head>
<body>

<!-- Hier beginnt dein PHP-Code -->
<?php
include('header.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    header("location: login.php");
} else {

    include("db_connection.php");

    $germanDays = array(
        "monday" => "Montag",
        "tuesday" => "Dienstag",
        "wednesday" => "Mittwoch",
        "thursday" => "Donnerstag",
        "friday" => "Freitag",
        "saturday" => "Samstag",
        "sunday" => "Sonntag"
    );

    $benutzer_id = $_SESSION['user_id'];

    $sql = "select * from meal_plans where benutzer_id=$benutzer_id";
    $result = mysqli_query($connection, $sql);

    // Überprüfen, ob die Abfrage erfolgreich war
    if ($result) {
        // Daten aus der Datenbank lesen
        while ($row = mysqli_fetch_assoc($result)) {
            // Die JSON-Daten dekodieren
            $mealPlan = json_decode($row["plan_daten"], true);

            // Deine vorhandene foreach-Schleife bleibt weitgehend unverändert
            foreach ($mealPlan["week"] as $day => $dayMeals): ?>
                <div class="mb-4">
                    <h1 class="text-center"><?php echo $germanDays[$day]; ?></h1>

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

                    <?php if (isset($dayMeals["meals"])): ?>
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
            <?php endforeach;
        }
    } else {
        echo "Fehler bei der Abfrage: " . mysqli_error($conn);
    }

}
?>
<!-- Hier endet dein PHP-Code -->

<!-- Hier könnten weitere HTML-Elemente, Skripte oder Stylesheets hinzugefügt werden -->

</body>
</html>
