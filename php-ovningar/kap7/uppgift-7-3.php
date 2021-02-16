<?php
/* Gör ett formulär där användaren ska fylla i en text. 
Konstruera ett reguljärt uttryck som ska kontrollera adresser som ska föras in i en databas. Adresserna får endast bestå av små och stora bokstäver, punkt, siffror och mellanslag. Använd preg-match-all().
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
    <title>Regex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Hitta match med regex</h1>
        <form action="#" method="POST">
            <label>Ange text
                <textarea name="text" cols="30" rows="10"></textarea>
            </label>
            <button>Skicka</button>
        </form>
        <?php
        /* Ta emot data som skickas */
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);

        if ($text) {
            echo "<h3>Inmattat</h3>";
            echo "<p>Text: <em>'$text'</em></p>";

            echo "<h3>Resultat</h3>";
            // HITTA ALLA ADRESSER
            // Tillåt stora och små bokstäver, * flera siffror
            // preg_match hittar en, preg_match_all hittar alla
            if (preg_match_all("/[a-zåäö0-9 .]*/i", $text, $träffar)) {
                echo "<p>&#10003; Några träffar.</p>";
                var_dump($träffar);

                // skriv ut arrayen om en punktlista
                echo "<ol>";
                foreach ($träffar[0] as $träff) {
                    
                  echo "<li>$träff</li>";
                }
                echo "</ol>";
            } else {
                echo "<p>&#10005; INGA träffar.</p>";
            }  
            
        }
        ?>
    </div>
</body>
</html>