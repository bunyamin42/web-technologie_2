<!DOCTYPE html>
<html>
<head>
    <title>OpenAI API Aufruf und Feedback</title>
</head>
<body>
    <h1>OpenAI API Aufruf und Feedback</h1>

    <form method="post">
        <label for="prompt">Geben Sie Ihren Prompt ein:</label><br>
        <textarea id="prompt" name="prompt" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Generieren">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prompt = $_POST["prompt"];
        if (!empty($prompt)) {
            $api_key = "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"; // Ihren OpenAI API-Schlüssel hier einfügen
            $endpoint = "https://api.openai.com/v1/chat/completions";
            $response = getAPIResponse($prompt, $endpoint, $api_key);
            echo "<h2>Antwort</h2>";
            echo $response;
        } else {
            echo "Bitte geben Sie einen Prompt ein.";
        }
    }

    function getAPIResponse($prompt, $endpoint, $api_key) {
        // Initialisiere die cURL-Sitzung
        $ch = curl_init($endpoint);
    
        // Setze cURL-Optionen
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $api_key",
            "Content-Type: application/json"
        ));
    
        // Nutzlast für den Chat-Eingang unter Verwendung der Nachrichtenstruktur
        $data = array(
            'model' => 'gpt-3.5-turbo',
            'messages' => array(
                array('role' => 'system', 'content' => 'Sie sind ein hilfreicher Assistent.'),
                array('role' => 'user', 'content' => $prompt)
            )
        );
        $data_string = json_encode($data);
    
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    
        // Führe die cURL-Sitzung aus
        $response = curl_exec($ch);
    
        // Überprüfe auf cURL-Fehler
        if(curl_errno($ch)){
            echo 'Curl-Fehler: ' . curl_error($ch);
            exit;
        }
    
        // Dekodiere die Antwort
        $response_data = json_decode($response, true);
    
        // Überprüfe, ob der Schlüssel 'choices' in der Antwort vorhanden ist und ob der Nachrichteninhalt vorhanden ist
        if (!isset($response_data['choices']) || !isset($response_data['choices'][0]['message']['content'])) {
            echo "Fehler: Unerwartete API-Antwort.<br>";
            echo "Vollständige Antwort:<br>";
            print_r($response_data);
            exit;
        }
    
        // Hole die Antwort aus der API-Antwort
        $answer = $response_data['choices'][0]['message']['content'];
    
        // Schließe die cURL-Sitzung
        curl_close($ch);
    
        return $answer;
    }
    
    ?>
</body>
</html>
