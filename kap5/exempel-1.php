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
    <title>Filhantering</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        // Öppna filen för läsning
        $handtag = fopen("style.css", "r");

        // Läs in 10 tecken
        $text = fread($handtag, 10);
        echo "<p>$text</p>";

        // Stäng filen
        fclose($handtag);



        //skriva till en fil, de är då man måste använfa fopen osv
        $handtag = fopen("mandag.txt", "w");

        // skriv en rad, \n = radslut
        fwrite($handtag, "Idag är det en trög morgon..\n");
        fwrite($handtag, "Bra att vi har en kort skoldag\n");
        echo "<p>Har skrivit två rader till filen mandag.txt</p>";

        // Stäng filen
        fclose($handtag);

        // Läsa in hela textfilen på en gång, utan att ange hur många tecken, lättareatt använda än fopen
        $rader = file("mandag.txt");
        print_r($rader);

        // skriv ut rader en-och-en
        foreach ($rader as $rad) {
            echo "<p>$rad</p>";
        }

        // 3. Läsa in hela textfilen i en sträng
        $allText = file_get_contents("mandag.txt");
        echo "<p>$allText</p>";

        // 4. Läsa in en fil från nätet
        $hemsida = file_get_contents("https://vecka.nu/");
        echo "<p>$hemsida</p>";

        // spara ned hemsidan
        $handtag = fopen("veckanu.html", "w");
        fwrite($handtag, $hemsida);
        fclose($handtag);
        ?>
    </div>
</body>
</html>