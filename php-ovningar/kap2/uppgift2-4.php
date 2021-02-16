<?php
/**
* PHP version 7
* @category   
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        //Ta emot data från formuläret
        $temp = $_POST["celsius"];

        //Omvandla till Farenheit
        $farenheit = $celsius * 9 / 5 + 32;

        //Skriv ut svaret
        echo "<p>$celsius grader Celsius motsvarar $farenheit$deg; Farenheit</p>";
        ?>
    </div>
</body>
</html>