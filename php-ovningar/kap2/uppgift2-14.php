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
        <p>Ange lönet för tre anställda. </p>
        <form action="#" method="POST">
            <label for="one">Lön 1</label>
            <input id="one" type="text" name="ett">
            <br>
            <label for="two">Lön 2</label>
            <input id="two" type="text" name="tva">
            <br>
            <label for="three">Lön 3</label>
            <input id="three" type="text" name="tre">
            <br>
            <button type="submit">Räkna ut</button>
        </form>
        <?php
        if (isset($_POST["ett"], $_POST["tva"], $_POST["tre"])) {

            $lonEtt = $_POST["ett"];
            $lonTva = $_POST["tva"];
            $lonTre = $_POST["tre"];

            $medellon = ($lonEtt + $lonTva + $lonTre) /3;

            echo "<p>Medellönen för de tre anställda är " . round($medellon) . "kr.</p>";
        }
        ?>
    </div>

</body>
</html>