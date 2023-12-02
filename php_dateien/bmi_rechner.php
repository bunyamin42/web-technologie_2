<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Rechner</title>
    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #calculator {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        h3 {
            margin-top: 20px;
            color: #333;
        }

        p {
            color: #777;
            font-size: 18px;
        }
    </style>
</head>

<body>

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
                var resultText = 'Ihr BMI: ' + bmi.toFixed(2) + '<br>';

                if (bmi < 18.5) {
                    resultText += 'Untergewicht';
                } else if (bmi < 24.9) {
                    resultText += 'Normalgewicht';
                } else if (bmi < 29.9) {
                    resultText += 'Übergewicht';
                } else {
                    resultText += 'Adipositas';
                }

                document.getElementById('result').innerHTML = resultText;
            } else {
                document.getElementById('result').innerHTML = 'Bitte geben Sie Gewicht und Größe ein.';
            }
        }
    </script>
</body>

</html>
