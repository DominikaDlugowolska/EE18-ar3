<?php
/* Gör ett formulär där användaren ska fylla i ett domännamn. Kontrollera sedan att domännamnet slutar på .com, .net eller .org. Du ska också kontrollera att de övriga tecknen endast består av bokstäver a-z, siffror 0-9 eller bindestreck (-). Första tecknet måste vara en bokstav. Domännamnet ska vara minst 6 tecken och högst 200 tecken långt.
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

            // Matcha .com, .net, .org
            if (preg_match("/.org|.net|.com$/", $text)) {
                echo "<p>&#10003; Slutar på .com, .net eller .org.</p>";
            } else {
                echo "<p>&#10005; Slutar INTE på .com, .net eller .org.</p>";
            }  

            // Matcha a-z, 0-9, @ och -
            if (preg_match("/[a-z0-9@\-\.]+/i", $text)) {
                echo "<p>&#10003; Innehåller a-z, 0-9, @ och -.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE a-z, 0-9, @ och -.</p>";
            } 

            // Första tecknet måste vara en bokstav!
            if (preg_match("/^[]/i", $text)) {
                echo "<p>&#10003; Innehåller a-z, 0-9, @ och -.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE a-z, 0-9, @ och -.</p>";
            }  
             
        }
        ?>
    </div>
</body>
</html>