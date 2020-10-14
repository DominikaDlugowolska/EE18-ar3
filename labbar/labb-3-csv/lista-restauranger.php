<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skriv ut csv-fil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>NTI lunchrestauranger</h1>
        <form class="bg-light" action="#" method="POST">
            <label>Ange filnamn</label>
            <input class="form-control" type="text" name="filnamn">
            <button type="submit" class="btn btn-primary">Läs in</button>
        </form>

        <?php
        if (isset($_POST["filnamn"])) {

            $filnamn = $_POST["filnamn"];

            //Kollar om filen finns
            if (is_readable($filnamn)) {

                $rader = file($filnamn);

                $antalRader = count($rader);

                echo "<p class=\"alert alert-success\">Filen $filnamn har lästs in</p>";

                echo "<table class=\"table table-striped\">";
                echo "<tr>
                 <th>Namn</th>
                <th>Gata</th>
                <th>Postnr</th>
                <th>Postort</th>
                </tr>";

                // Loopa igenom alla rader
                foreach ($rader as $rad) {
                    //dela upp raden i delar efter , tecknet
                    $delar = explode(",", $rad);

                    //skriv ut raden
                    echo "<tr><td>$delar[0]</td><td>$delar[1]</td><td>$delar[2]</td><td>$delar[3]</td></tr>";
                }

                echo "</table>";
                echo "<p class=\"alert alert-success\">Hittat $antalRader</p>";
            } else {
                echo "<p class=\"alert alert-warning\">Kan ej läsa filen $filnamn</p>";
            }
        }


        ?>
    </div>
</body>
</html>