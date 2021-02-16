<?php
/* Skapa ett skript som frågar användaren, ”Vilket är Europas folkrikaste land?”
Så länge som användaren svarar fel ska hen få en ny chans att svara på frågan.
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
    <title>Natioella provet i Matematik 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <h1>Svara rätt</h1>
        <form action="#" method="POST">
            <label for="land">Europas folkrikaste land är:</label>
            <input id="land" class="form-control" type="text" name="land" required>

            <button type="submit" class="btn btn-primary">Visa svaret</button>
        </form>

        <?php
        // Finns data? (När man kommer tillbaka till sidan)
        if (isset($_POST["land"])) /* isset = finns variablarna, */ {

            // Ta emot data från formuläret
            $land = $_POST["land"];

            $land = strtolower($land);

            if ($land == "ryssland") {
                echo "<p>Rätt</p>";
            } else {
                echo "<p>Fel svar, pröva igen.</p>";
            }

        } 

        ?>
    </div>

</body>
</html>