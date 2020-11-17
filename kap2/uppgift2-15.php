<?php
/*
Skapa ett skript som ber användaren mata in lönen för 3 anställda. 
Skriptet ska sedan presentera medellönen för personalen.
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
        <h1>Medellönet för personalen</h1>
        <form action="#" method="POST">
            <label for="one">Ange lönet för tre anställda</label>
            <input id="one" type="text" name="ett">
            <input id="two" type="text" name="tva">
            <input id="three" type="text" name="tre">
            <button type="submit">Räkna ut</button>
        </form>
        <?php
        if (isset($_POST["ett"], $_POST["tva"], $_POST["tre"])) {

            $antalDagar = $_POST["dagar"];
            $antalKm = $_POST["kilometer"];

            $dagar = $antalDagar * 400;
            $kilometer = $antalKm * 5;
            $kostnad = 500 + $dagar + $kilometer;

            echo "<p>Du vill uthyra bilen för $antalDagar dagar och köra $antalKm km. Kostnaden kommer att bli $kostnad.</p>";
        }
        ?>
    </div>

</body>
</html>