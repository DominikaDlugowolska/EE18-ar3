<?php
/**
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
    <title>Stränghantering</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        // Rensa från mellanslag i början och slutet på en text
        $epost = "  domi@gmail.com  ";
        $epostTrimmad = trim($epost);
        echo "<p>**$epost**$epostTrimmad**</p>";

        // Omvandla till små eller stora bokstäver
        $svar = "Usa"; // USA, Usa, uSa
        $svarGemena = strtolower($svar);
        $svarVersaler = strtoupper($svar);
        $svenska = mb_strtoupper("Hej på dig, är det bra?");
        echo "<p>$svenska</p>";

        // Hur många tecken innehåller detta stycke?
        $stycke = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum exercitationem animi reprehenderit laborum dolorum dolores in assumenda qui sapiente voluptatum sequi veniam vero ex, quo explicabo. Vero eius animi labore?";
        $antal = strlen($stycke);
        echo "<p>Antal tecken = $antal</p>";

        // Plocka del av en sträng
        $epost = "dominika.dlugowolska@elev.ga.ntig.se";
        $förnamn = substr($epost, 0, 8);
        echo "<p>$förnamn ur $epost</p>";
        $efternamn = substr($epost, 9, 11);
        echo "<p>$efternamn ur $epost</p>";

        $domän = substr($epost, 21, 35);
        echo "<p>$domän ur $epost</p>";
        $domän = substr($epost, -15);
        echo "<p>$domän ur $epost</p>";

        // Plocka domän ur en epost
        $epost = "dominika.dlugowolska@elev.ga.ntig.se";
        $domän = strstr($epost, "@");
        echo "<p>$domän ur $epost</p>";

        // Hitta position på @-tecknet
        $epost = "dominika.dlugowolska@elev.ga.ntig.se";
        $position = strpos($epost, "@");
        echo "<p>@ ligger på position $position</p>";

        // Finns "ntig" i inmattad epost-adressen?
        $epost = "dominika.dlugowolska@elev.ga.ntig.se";
        if (strpos($epost, "ntig") !== false) {
            echo "<p>Ja, ntig finns i epost-adressen</p>";
        } else {
            echo "<p>Nej, ntig finns inte i epost-adressen</p>";
        }

        // Ersätta text i sträng
        $texten = "Karim är läraren i webb";
        $nyText = str_replace("Karim", "Carl", $texten);
        echo "<p>$nyText</p>";
        ?>
    </div>
    
</body>
</html>