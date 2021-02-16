<?php
/* Gör ett formulär där användaren ska fylla i en text. 
Kontrollera med ett reguljärt uttryck att texten innehåller ett "t" följt av ett eller två "o", dvs "to" eller "too". Endast små bokstäver ska matchas.
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
                <input type="text" name="text" required>
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
            
            if (preg_match("/to|too/", $text)) {
                echo "<p>&#10003; Innehåller 'to' eller 'too'.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE 'to' eller 'too'.</p>";
            }  
            // exempel 2. {1,2} gäller bokstaven/tecknet till höger, 
            // dvs o<-{1,2}, o en eller två gånger
            if (preg_match("/to{1,2}/", $text)) {
                echo "<p>&#10003; Innehåller 'to' eller 'too'.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE 'to' eller 'too'.</p>";
            }  
        }
        ?>
    </div>
</body>
</html>