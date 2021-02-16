<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
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
        ?>
    </div>
</body>
</html>