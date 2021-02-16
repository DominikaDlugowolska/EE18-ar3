<!-- Gör en webbapp  som i en textruta frågar efter ett filnamn på servern. Öppna filen och skriv ut filinnehållet på skärmen.  -->
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
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <form action="#" method="POST">
            <label for="text">Ange filnamn</label>
            <input type="text" name="filnamn">

            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php
        if (isset($_POST["filnamn"])) {

            // Läs in texten från formuläret
            $filnamn = $_POST["filnamn"];

           // läs av från filen
           $handtag = fopen($filnamn, "r");
           $text = fread($handtag, filesize($filnamn));
           //skriv ut på skärmen
           echo "<p>$text</p>";
           fclose($handtag);
        }
        ?>
    </div>
</body>
</html>