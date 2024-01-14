<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mein Wochenplan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
          body {
        background-size: cover;
   
  
    }
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
        .noMealPlanBackground {
        background-image: url("../images/hintergrund_2.JFIF");
      
    }
        #noMealPlanMessage {
    text-align: center;
    font-size: 50px;
    font-weight: bold;
    margin-top: 50px;
    white-space: nowrap; 
    overflow: hidden; 
    animation: moveRight 10s infinite, changeColor 10s infinite;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}


        @keyframes moveRight {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        @keyframes changeColor {
            0% {
                color: red;
            }
            50% {
                color: blue;
            }
            100% {
                color: green;
            }
        }
    </style>
</head>
<body>

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
    $user_id = $_SESSION['user_id'];

    function getMealData($connection, $user_id) {
        $query = "SELECT plan_daten FROM meal_plans WHERE benutzer_id = '$user_id'";
        $result = $connection->query($query);
    
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return json_decode($row['plan_daten'], true);
        } else {
            return null;
        }
    }
 

    $mealData = getMealData($connection, $user_id);

    if ($mealData) {
        $proteins = [];
        $carbs = [];
        $fats = [];

        foreach ($mealData['week'] as $day => $data) {
            $proteins[] = $data['nutrients']['protein'];
            $carbs[] = $data['nutrients']['carbohydrates'];
            $fats[] = $data['nutrients']['fat'];
        }
        ?>
        <div style="text-align: center; margin-top: 20px;">
            <canvas id="myChart"></canvas>
        </div>

        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'],
                    datasets: [{
                        label: 'Proteine',
                        data: <?php echo json_encode($proteins); ?>,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false
                    }, {
                        label: 'Kohlenhydrate',
                        data: <?php echo json_encode($carbs); ?>,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    }, {
                        label: 'Fett',
                        data: <?php echo json_encode($fats); ?>,
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                }
            });
        </script>
    <?php
    } 
    $benutzer_id = $_SESSION['user_id'];
    $sql = "select * from meal_plans where benutzer_id=$benutzer_id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            echo '<body class="noMealPlanBackground">';
            echo '<div id="noMealPlanMessage">Kein Wochenessensplan vorhanden!</div>';
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $mealPlan = json_decode($row["plan_daten"], true);
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
        }
    } else {
        echo "Fehler bei der Abfrage: " . mysqli_error($conn);
    }

    $connection->close();
}
?>
</body>
</html>
