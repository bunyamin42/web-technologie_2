<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalorienrechner</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('header.php'); ?>
<div class="container mt-5">
  <h2>Kalorienrechner</h2>
  <form id="calorieForm">
    <div class="form-group">
      <label for="food">Lebensmittel:</label>
      <input type="text" class="form-control" id="food" placeholder="Lebensmittel" required>
    </div>
    <div class="form-group">
      <label for="calories">Kalorien pro 100g:</label>
      <input type="number" class="form-control" id="calories" placeholder="Kalorien" required>
    </div>
    <div class="form-group">
      <label for="amount">Menge (in Gramm):</label>
      <input type="number" class="form-control" id="amount" placeholder="Menge" required>
    </div>
    <div class="form-group">
      <label for="activity">Aktivität:</label>
      <select class="form-control" id="activity" required>
        <option value="1.2">Sitzend (wenig oder kein Sport)</option>
        <option value="1.375">Leicht aktiv (leichter Sport 1-3 Tage/Woche)</option>
        <option value="1.55">Mäßig aktiv (mäßiger Sport 3-5 Tage/Woche)</option>
        <option value="1.725">Sehr aktiv (harter Sport 6-7 Tage/Woche)</option>
        <option value="1.9">Extrem aktiv (sehr harter Sport & körperliche Arbeit)</option>
      </select>
    </div>
    <button type="button" class="btn btn-primary" name="submit" onclick="calculateCalories()">Berechnen</button>
  </form>

 
  <div class="mt-3" id="resultSection" style="display: none;">
    <h4>Ergebnis:</h4>
    <p id="result"></p>
  </div>
</div>

<script>
  function calculateCalories() {
    document.getElementById('resultSection').style.display = 'block';
    var food = document.getElementById('food').value;
    var caloriesPer100g = parseFloat(document.getElementById('calories').value);
    var amount = parseFloat(document.getElementById('amount').value);
    var activityMultiplier = parseFloat(document.getElementById('activity').value);

    if (!food || isNaN(caloriesPer100g) || isNaN(amount) || isNaN(activityMultiplier)) {
      alert('Bitte füllen Sie alle Felder korrekt aus.');
      return;
    }

    var totalCalories = ((caloriesPer100g / 100) * amount) * activityMultiplier;
    document.getElementById('result').innerHTML = 'Das Essen ' + food + ' enthält insgesamt ' + totalCalories.toFixed(2) + ' Kalorien.';
  }
</script>

</body>
</html>
