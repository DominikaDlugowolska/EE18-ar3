<?php
/* Skapa ett skript som frågar användaren vilken plats hen kom på i senaste idrottsturneringen. 
Skriptet ska sedan berätta om användaren fick guld, silver, brons eller ingen medalj.  
Skriptet får endast ha en switch-sats,
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
    <title>Idrottstuneringen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Idrottstuneringen</h1>
        <form action="#" method="POST">
            <label for="alder">Skriv nedan vilken plats du kom på i idrottstuneringen.</label>
            <input id="alder" class="form-control" type="text" name="plats" required>

            <button type="submit" class="btn btn-primary">Visa svaret</button>
        </form>

        <?php
        // Finns data? (När man kommer tillbaka till sidan)
        if (isset($_POST["plats"])){

            // Ta emot data från formuläret
            $plats = $_POST["plats"];

            switch ($plats) {
                case "1":
                    echo "<p>Du får en guld medalj</p>";
                    break;
                case "2":
                    echo "<p>Silver</p>";
                    break;
                case "3":
                    echo "<p>Brons</p>";
                    break;
                default:
                    echo "<p>ingen</p>";
                    break;
            }

        } 

        ?>
    </div>

</body>
</html>