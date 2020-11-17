<?php
/*
Skapa ett skript som frågar användaren hur långt hen kan hoppa mätt i meter. 
Skriptet ska sen berätta hur mycket längre världsrekordet är (8,90 meter): "Bob Beamon hopar ... m längre än dig!".
*
* PHP version 7
* @category   
* @author     Dominika Dlugowolska <domi.dlugowolska@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Hur bra är du i längd hopp?</h1>
        <form action="#" method="POST">
            <label for="year">Ange distans i meter</label>
            <input id="year" type="text" name="längd">
            <button type="submit">Räkna ut</button>
        </form>
        <?php
        if (isset($_POST["längd"])) {

            $längd = $_POST["längd"];

            // Om hen kan hoppa längre
            if ($längd > 8.90) {
                $svar = $längd - 8.90;
                echo "<p>Bob Beamon hoppar $svar m kortare än dig!</p>";
            } else {
                $svar = 8.90 - $längd; 
                echo "<p>Bob Beamon hoppar $svar m längre än dig!</p>";
            }
                   
            
        }
        ?>
    </div>

</body>
</html>