<?php
/* Ett fik har en kampanj där personer äldre än 65 år och personer mellan 12 och 18 år erbjuds att köpa kaffe extra billigt. 
Skriv ett skript som kollar om användaren får köpa kaffe extra billigt. 
Skriptet får endast ha en if-sats.
*
* PHP version 7
* @category   
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
          
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kaffe rabatt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Kaffe rabatt!</h1>
        <form action="#" method="POST">
            <label for="alder">Skriv nedan din ålder.</label>
            <input id="alder" class="form-control" type="text" name="alder" required>

            <button type="submit" class="btn btn-primary">Visa svaret</button>
        </form>

        <?php
        // Finns data? (När man kommer tillbaka till sidan)
        if (isset($_POST["alder"])){

            // Ta emot data från formuläret
            $ålder = $_POST["alder"];

            if ($ålder > 11 && $ålder < 19 || $ålder > 64) {
                echo "<p>Du får rabatt på kaffe och kan köpa det billigare, enjoy your coffee!</p>";
            } else {
                echo "<p>Tyvär kan du inte ta en del av kampanien</p>";
            }

        } 

        ?>
    </div>

</body>
</html>