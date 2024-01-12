<?php
// Diese Datei enthält den Hauptcode

include("db_connection.php");

// Funktion zum Abrufen der Essensdaten
function getMealData($connection) {
    $query = "SELECT plan_daten FROM meal_plans";
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return json_decode($row['plan_daten'], true);
    } else {
        return null;
    }
}

$mealData = getMealData($connection);

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
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Essensplan</title>
        <!-- Chart.js einbinden -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>
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

  
            document.getElementById('myChart').style.width = '500px';
            document.getElementById('myChart').style.height = '450px';
          
            document.getElementById('myChart').parentNode.style.width = '500px';
            document.getElementById('myChart').parentNode.style.height = '450px';
        </script>
    </body>

    </html>
    <?php
} else {
    echo "Keine Daten gefunden.";
}

$connection->close();
?>
