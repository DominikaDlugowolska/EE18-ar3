<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skolans salar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Skolans salar</h1>
        <?php

        // Textfilen som skall läsas in
        $tsvfil = "salar.tsv";

        // Är filens läsbar?
        if (is_readable($tsvfil)) {

            // Läs in filens alla rader
            $rader = file($tsvfil);

            // Loopa igenom alla rader
            foreach ($rader as $rad) {

                // Skippa första raden om dom 2 första tecken är 'id'
                if (substr($rad, 0, 2) == "id") {
                    continue; // Börjar raden med id? hoppa till nästa rad
                }
                // Plocka ut det som vi behöver: nr/namn, bokbar. Delar efter tab
                $delar = explode($rad, "\t");

                // Dela upp raden i dess delar
                $salNrNamn = $delar[1];
                $bokbar = $delar[3];

                // Visa salar i en tabell med kolumnrubriker: nr/namn, bokbar
                echo "<p>Texten finns</p>";

                echo "<table>";
                echo "<tr>";
                echo "<td>Sal namn</td>";
                echo "<td>$Bokbar</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>$salNrNamn</td>";
                echo "<td>$bokbar</td>";
                echo "</tr>";
                echo "</table>";
            }
        } else {
            echo "<p>Texten finns inte</p>";
        }



        ?>
    </div>
</body>
</html>