<?php
/*
Skapa ett skript som frågar användaren vilket årtal det är.
Skriptet ska sedan berätta hur många år det är kvar till år 2100.
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
        <h1>Ange ett årtal</h1>
        <form action="#" method="POST">
            <label for="year">Årtal =</label>
            <input id="year" type="text" name="årtal">
            <button type="submit">Räkna ut</button>
        </form>
        <?php
        if (isset($_POST["årtal"])) {

            $årtal = $_POST["årtal"];

            // Räkna ut hur många år det är kvar tills 2100
            $svar = 2100 - $årtal;

            echo "<p>Det är $svar år kvar tills 2100.</p>";
        }
        ?>
    </div>

</body>
</html>