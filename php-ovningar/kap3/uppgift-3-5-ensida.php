<?php
/* Gör ett skript som är en lånekalkylator. Mha radioknappar ska användaren kunna välja mellan 1, 3 och 5 års lånetid. I en ruta ska användaren skriva i lånebeloppet och i nästa räntan i hela procent. Programmet ska sedan räkna ut den totala lånekostnaden. Räknas ut genom ränta på ränta-principen, årsvis). Så för ett tvåårigt lån på 5000 med räntan 4% skulle alltså lånekostnaden bli 5000*1,04*1,04 - 5000. Observera att lånet är "amorteringsfritt". */

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontaktformulär</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Kontaktformulär</h1>
        <form action="#" method="POST">
            <label for="namn">Ange lånebelopp</label>
            <input id="namn" class="form-control" type="text" name="belopp">
            <label for="epost">Ange ränta i %</label>
            <input id="epost" class="form-control" type="text" name="ränta">
            

            <label>Ange lånetid</label>
            <div>
                <input type="radio" name="lånetid" value="1" checked> 1 år
                <input type="radio" name="lånetid" value="3"> 3 år
                <input type="radio" name="lånetid" value="5"> 5 år
            </div>

            <button type="submit" class="btn btn-primary">Räkna ut</button>
        </form>
    </div>
    <?php
    // Finns data?
    if (isset($_POST["belopp"], $_POST["ränta"], $_POST["lånetid"])) /* isset = finns variablarna */{

    // Ta emot data från formuläret
    $belopp = $_POST["belopp"];
    $ranta = $_POST["ränta"];
    $lanetid = $_POST["lånetid"];

    //Start år = 0
    $laneKostnad = $belopp;

    // Räkna ut totala lånekostnaden
    for ($i = 0; $i < $lanetid; $i++) { 
        $laneKostnad = $laneKostnad * ( 1 + $ranta / 100);
    }
    // Skriv ut resultatet
    echo "<p>Den totala lånekostnaden efter $lanetid år blir $laneKostnad kr</p>";
    }

    ?>
</body>
</html>