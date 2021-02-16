<?php
/*
Skapa ett skript för beräkna kostnaden för att hyra bil hos en biluthyrningsfirma. 
Startavgiften för att hyra bilen är 500:-, därefter kostar det ytterligare 5:-/km och 400:- för varje extra dag förutom den första. 
Skriptet ska fråga hur många dagar man vill hyra bilen och hur många kilometer man vill köra.
Skriptet ska sedan presentera den totala hyran.
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
            <label for="days">Ange antal dagar för uthyrning</label>
            <input id="days" type="text" name="dagar">
            <label for="km">Ange distans i kilometer</label>
            <input id="km" type="text" name="kilometer">
            <button type="submit">Räkna ut</button>
        </form>
        <?php
        if (isset($_POST["dagar"], $_POST["kilometer"])) {

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