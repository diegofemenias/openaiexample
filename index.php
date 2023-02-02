<h1>Imagen a crear</h1>
<h3>Ejemplo: star wars pixel art<h3>

<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="text" name="prompt" id="prompt">
    <input type="submit" value="Crear" name="submit">
</form>

<?php

$prompt = $_POST['prompt'];

require __DIR__ . '/vendor/autoload.php'; 

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = "AQUI VA TU API KEY SOLICITADA EN OPEN AI";

$open_ai = new OpenAi($open_ai_key);

if ($prompt) {

    echo "<h1>Imágenes de: " . $prompt . "</h1>";

    $complete = $open_ai->image([
        "prompt" => $prompt,
        "n" => 3,
        "size" => "512x512",
        "response_format" => "url",
    ]);

    $result = json_decode($complete);

    foreach ($result->data as $data) {
        echo "<img src=" . $data->url . ">";
        echo "<br><br><br>";
    }
}

