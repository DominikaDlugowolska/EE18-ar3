<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dagens Väder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Vädret i Stockholm</h1>
    <?php

    // api nyckeln
    $key = "22ee1d58f7adae08ee71fa7c0bd24481";
    $stad = "Stockholm";

    // URL till tjänsten
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$stad&appid=$key&units=metric";
    echo $url;

    // Gör ett anrop
    $json = file_get_contents($url);
    // avkoda json
    $jsonData = json_decode($json);

    // plocka ut koordinaterna
    $coord = $jsonData->coord;
    $lon = $coord->lon;
    $lat = $coord->lat;

    echo "<p>$lon $lat</p>";

    // plocka ut vädret
    $weather = $jsonData->weather;
    $description = $weather[0]->description;
    $icon = $weather[0]->icon;

    echo "<p>Vädret är: $description</p>";
    echo "<img src=\"http://openweathermap.org/img/wn/{ikon}@2x.png\ alt=\"OWM\">";

    ?>
    </div>
</body>
</html>