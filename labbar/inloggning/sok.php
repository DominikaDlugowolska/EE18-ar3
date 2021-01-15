<?php

/**
 * PHP version 7
 * @category   Webbapplikation med databas
 * @author     Dominika Dlugowolska <domi.dlugowolska@gmail.com>
 * @license    PHP CC
 */
include "./resurser/conn.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogg</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Min Blogg</h1>
        <nav>
            <ul class="nav nav-tabs">
            <?php if (isset($_SESSION["anamn"])) { ?>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriva</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link active" href="./sok.php">Sök</a></li>
            <?php } ?>
            </ul>
        </nav>
        <form action="#" method="POST">
            <label>Ange sökterm <input type="text" name="sökterm"></label>
            <button>Sök</button>
        </form>
        <?php
        // Ta emot data som skickats
        $sökterm = filter_input(INPUT_POST, 'sökterm', FILTER_SANITIZE_STRING);


        // Om data finns..
        if ($sökterm) {

            // SQL-satsen
            $sql = "SELECT * FROM post WHERE header LIKE '%$sökterm%' OR postText LIKE '%$sökterm%'";

            // Steg 2: Nu kör vi sql-satsen
            $result = $conn->query($sql);

            // Steg 3: Gick det bra att köra SQL-satsen?
            if (!$result) {
                die("Något blev fel med SQL-satsen " . $conn->error);
            } else {
                echo "<p class=\"alert alert-success\" role=\"alert\">Hittade " . $result->num_rows . " inlägg.</p>";
            }

            // Presentera resultatet
            while ($rad = $result->fetch_assoc()) {
                echo "<div class=\"inlägg\">";
                echo "<h5>$rad[header]</h5>";
                echo "<h6>$rad[postDate]</h6>";
                echo "<p>$rad[postText]</p>";
                echo "</div>";
            }

            // Steg 4: Stänga ned anslutningen
            $conn->close();
        }

        ?>
    </div>
</body>
</html>