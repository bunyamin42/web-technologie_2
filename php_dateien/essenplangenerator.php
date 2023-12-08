<!DOCTYPE html>
<html lang="de">

<?php 
include('header.php');
if (!isset($_SESSION['email'])) {
  header("location: login.php");
} else {
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essenplan Generator</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Add your custom styles here */

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

  <div id="buttonsContainer" style="display: none;">
    <button type="button" class="btn btn-secondary" onclick="get_json_mealplan()">Essensplan speichern</button>
    <button type="button" class="btn btn-secondary" onclick="generateNewPlan()">Neuen Plan erstellen</button>
  </div>

  <div id="formContainer">
    <h1 class="mb-4">Essenplan Generator</h1>

    <form id="mealPlanForm">
      <div class="mb-3">
        <label for="targetCalories" class="form-label">Zielkalorien:</label>
        <input type="number" class="form-control" id="targetCalories" name="targetCalories" required>
      </div>

      <div class="mb-3">
        <label for="diet" class="form-label">Diät:</label>
        <select class="form-select" id="diet" name="diet">
          <option value="">Keine Auswahl</option>
          <option value="gluten free">Glutenfrei</option>
          <option value="vegetarian">Vegetarisch</option>
          <option value="vegan">Vegan</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="exclude" class="form-label">Ausschließen (Zutaten durch Komma getrennt):</label>
        <input type="text" class="form-control" id="exclude" name="exclude">
      </div>

      <button type="button" class="btn btn-dark" onclick="generateMealPlan()">Essensplan generieren</button>
    </form>
  </div>

  <div id="mealPlanResult" style="display: none;">
    <!-- Hier wird der Wochenplan angezeigt -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function generateMealPlan() {

      var formData = new FormData(document.getElementById("mealPlanForm"));

      // AJAX request nach ausgabe_essenplan.php
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

          document.getElementById("mealPlanResult").innerHTML = this.responseText;

          document.getElementById("buttonsContainer").style.display = "block";

          // Button verstecken
          document.getElementById("formContainer").style.display = "none";
          document.getElementById("mealPlanResult").style.display = "block";
        }
      };

      xhr.open("POST", "ausgabe_essenplan.php", true);
      xhr.send(formData);
    }

    // Globale Variable für die Meal Plan Daten
    var mealPlanData;

    // AJAX-Anfrage zum Speichern des Essensplans
    function saveMealPlan() {
  // Erhalte den Wochenplan-Daten als JSON-String
  var mealPlanDataToSave = mealPlanData;
  console.log("Daten", mealPlanDataToSave); 

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    console.log("Ready state: " + this.readyState);
    console.log("Status: " + this.status);
    if (this.readyState == 4 && this.status == 200) {
      // Zeige die Antwort (z.B., Erfolgsmeldung) an
      alert("Erfolgreich gespeichert");
    }
  };

  xhr.open("POST", "saveMealPlan.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(mealPlanDataToSave));

}


    function generateNewPlan() {
      // Show the form and hide the result
      document.getElementById("formContainer").style.display = "block";
      document.getElementById("mealPlanResult").style.display = "none";

      // Hide the buttons container
      document.getElementById("buttonsContainer").style.display = "none";
    }

    function get_json_mealplan() {
      var xhr = new XMLHttpRequest()
      xhr.onreadystatechange = function() {
        console.log("Ready state: " + this.readyState);
        console.log("Status: " + this.status);
        if (this.readyState == 4 && this.status == 200) {
          // Die global deklarierte Variable aktualisieren
          mealPlanData = JSON.parse(this.responseText);
          console.log("Meal Plan Data:", mealPlanData);
          // Die Funktion saveMealPlan aufrufen
          saveMealPlan();
        }
      };

      xhr.open("GET", "essenplan_json.php", true);
      xhr.send();
    }
  </script>

</body>
<?php }?>
</html>
