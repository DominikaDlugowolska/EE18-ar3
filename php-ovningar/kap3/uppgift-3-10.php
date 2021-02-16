<?php
/* För att få åka berg-och-dalbana på en nöjespark så måste man vara mellan 1,4 och 1,9 meter lång. 
Skapa ett skript som frågar om användarens längd.
Skriptet skriver ut om hen får åka eller inte.
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
    <title>Berg-och-dalbana</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Berg-och-dalbana</h1>
        <form action="#" method="POST">
            <label for="langd">Skriv nedan din längd i meter.</label>
            <input id="langd" class="form-control" type="text" name="langd" required>

            <button type="submit" class="btn btn-primary">Visa svaret</button>
        </form>

        <?php
        // Finns data? (När man kommer tillbaka till sidan)
        if (isset($_POST["langd"])){

            // Ta emot data från formuläret
            $längd = $_POST["langd"];

            if ($längd > 1.4 && $längd < 1.9) {
                echo "<p>Du får åka berg-och-dalbanan, yippie!</p>";
            } else {
                echo "<p>Tyvär får du inte åka ber-och-dalbanan.</p>";
            }

        } 

        ?>
    </div>

</body>
</html>