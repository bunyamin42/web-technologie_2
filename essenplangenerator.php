<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essenplan Generator</title>
  <style>
    /* Add your styles for a better-looking form here */
  </style>
</head>



  <div id="buttonsContainer" style="display: none;">
    <button type="button" onclick="get_json_mealplan()">Essensplan speichern</button>
    <button type="button" onclick="generateNewPlan()">Neuen Plan erstellen</button>
  </div>

  <div id="formContainer">
    <h1>Essenplan Generator</h1>

    <form id="mealPlanForm">
      <label for="targetCalories">Zielkalorien:</label>
      <input type="number" id="targetCalories" name="targetCalories" required>

      <label for="diet">Diät:</label>
      <select id="diet" name="diet">
        <option value="">Keine Auswahl</option>
        <option value="gluten free">Glutenfrei</option>
        <option value="vegetarian">Vegetarisch</option>
        <option value="vegan">Vegan</option>
      </select>

      <label for="exclude">Ausschließen (Zutaten durch Komma getrennt):</label>
      <input type="text" id="exclude" name="exclude">

      <button type="button" onclick="generateMealPlan()">Essensplan generieren</button>
    </form>
  </div>

  <div id="mealPlanResult" style="display: none;">
    <!-- Hier wird der Wochenplan angezeigt -->
  </div>

  <script>
    function generateMealPlan() {

      var formData = new FormData(document.getElementById("mealPlanForm"));

      // AJAX request to myfitnesspal.php
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

      xhr.open("POST", "myfitnesspal.php", true);
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

      xhr.open("GET", "ausgabe_essenplan.php", true);
      xhr.send();
    }
  </script>

</body>

</html>
