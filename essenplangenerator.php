<?php

$url = 'https://api.openai.com/v1/chat/completions';  
$auth_token = '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';  // Gebt hier den API-Key von der Website ein  

$question = 'Hallo Welt';  

$data = array(
    "model" => "gpt-3.5-turbo",  
    "messages" => array(  
        array(
            "role" => "user",  
            "content" => $question  
        )
    )
);

$payload = json_encode($data);

$headers = array(
    'Content-Type: application/json',  
    'Authorization: ' . $auth_token,  
    'Content-Length: ' . strlen($payload)  
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

curl_close($ch);

$response = json_decode($result, true);

if (!empty($response['choices'][0]['message']['content'])) {  
    $answer = $response['choices'][0]['message']['content'];  
    echo $answer;
}
