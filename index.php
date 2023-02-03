<?php

$words[0] = "dog";
$words[1] = "horse";
$words[2] = "car";
$words[3] = "barbecue";
$words[4] = "truck";
$words[5] = "fence";
$words[6] = "woman";
$words[7] = "man";
$words[8] = "donut";
$words[9] = "kid";
$words[10] = "apple";
$words[11] = "boat";
$words[12] = "house";
$words[13] = "beach";
$words[14] = "bike";
$words[15] = "fire";
$words[16] = "moon";
$words[17] = "band";
$words[18] = "rock";
$words[19] = "ferrari";
$words[20] = "cat";
$words[21] = "pill";
$words[22] = "star wars";
$words[23] = "wes anderson";
$words[24] = "tarantino";
$words[25] = "kill bill";
$words[26] = "dracula";
$words[27] = "party";
$words[28] = "monster";
$words[29] = "pool";
$words[30] = "plane";
$words[31] = "hairy";
$words[32] = "tall";
$words[33] = "fat";
$words[34] = "short";
$words[35] = "awesome";

shuffle($words);

?>

<h1>Imagen a crear</h1>

<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="text" name="prompt" id="prompt" value="<?php echo $words[0] . " " . $words[1] . " " . $words[2] . " " . $words[3]; ?>">
    <input type="submit" value="Crear" name="submit">
</form>

<?php

$prompt = $_POST['prompt'];

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = "YOUR KEY";
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
?>



