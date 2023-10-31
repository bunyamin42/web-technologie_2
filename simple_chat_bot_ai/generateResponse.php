<?php
require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai = new OpenAi('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');

$complete = $open_ai->completion([
    'model' => 'gpt-3.5-turbo-instruct',
    'prompt' => 'Gib mir einen Wochenessensplan in eine Json Datei für jeden Tag, mit dem Namen, Zutaten, Zubereitung.',
    'temperature' => 0.2,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.5,
 ]);

 echo $complete;
?>