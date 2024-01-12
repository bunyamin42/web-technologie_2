<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Rechner</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e8e8e8;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #navbar-container {
            width: 100%;
        }

        #calculator {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 20px;
            margin-bottom: 20px; /* Add margin to give some space at the bottom */
            margin-left: auto; /* Auto left margin for centering */
            margin-right: auto; /* Auto right margin for centering */
        }

        h2 {
            color: #333;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
        }

        input {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #616161;
            color: #fff;
            border: none;
            padding: 12px 24px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #424242;
        }

        h3 {
            margin-top: 30px;
            color: #333;
            font-size: 20px;
        }

        p#result {
            margin-top: 10px;
            font-size: 18px;
            color: #333;
            padding: 10px;
            border-radius: 8px;
            background-color: #e0e0e0;
        }

        .underweight {
            color: #2196F3;
        }

        .normalweight {
            color: #4CAF50;
        }

        .overweight {
            color: #FFC107;
        }

        .obesity {
            color: #F44336;
        }
    </style>
</head>

<body>

    <div id="navbar-container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Fitbook</a>
            <ul class="navbar-nav ml-auto">
                <?php 
                if(isset($_SESSION['user_id'])){
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="startseite.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chat.php">Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php } else {?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php }  ?>
            </ul>
        </nav>
    </div>

    <div id="calculator">
        <h2>BMI Rechner</h2>
        <form id="bmiForm">
            <label for="weight">Gewicht (kg):</label>
            <input type="number" id="weight" name="weight" required step="0.1">

            <label for="height">Größe (cm):</label>
            <input type="number" id="height" name="height" required step="1">

            <button type="button" onclick="calculateBMI()">BMI berechnen</button>

            <h3>Ergebnis:</h3>
            <p id="result"></p>
        </form>
    </div>

    <script>
        function calculateBMI() {
            var weight = document.getElementById('weight').value;
            var height = document.getElementById('height').value / 100; // Umrechnung von cm in m

            if (weight > 0 && height > 0) {
                var bmi = weight / (height * height);
                var resultText = 'Ihr BMI: <strong>' + bmi.toFixed(2) + '</strong><br>';

                if (bmi < 18.5) {
                    resultText += '<span class="underweight">Untergewicht</span>';
                } else if (bmi < 24.9) {
                    resultText += '<span class="normalweight">Normalgewicht</span>';
                } else if (bmi < 29.9) {
                    resultText += '<span class="overweight">Übergewicht</span>';
                } else {
                    resultText += '<span class="obesity">Adipositas</span>';
                }

                document.getElementById('result').innerHTML = resultText;
            } else {
                document.getElementById('result').innerHTML = 'Bitte geben Sie Gewicht und Größe ein.';
            }
        }
    </script>
</body>

</html>
