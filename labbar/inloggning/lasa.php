<?php

/**
 * PHP version 7
 * @category   
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
    <title>Läsa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Läs inlägg</h1>
    <nav>
        <ul class="nav nav-tabs">  
            <!-- bestäm vad som syns och inte syns när man är inloggad-->           
            <?php if (isset($_SESSION["anamn"])) { ?>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                <li class="nav-item"><a class="nav-link active" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
            <?php } ?>
        </ul>
    </nav>
        <div>
            <?php
            // 2. Ställ en SQL-fråga
            $sql = "SELECT post.header, post.postText, post.postDate, user.fnamn, user.enamn, user.anamn FROM post JOIN user ON post.user_id=user.id ORDER BY postDate DESC";
            $result = $conn->query($sql);

            // Gick det bra?
            if (!$result) {
                die("Något blev fel med SQL-satsen." . $conn->error);
            } else {
                echo "<p class=\"alert alert-success\" role=\"alert\">Hämtade " .  $result->num_rows . " inlägg.</p>";
            }

            // Presentera resultatet
            while ($rad = $result->fetch_assoc()) {
                echo "<div class=\"inlagg\">";
                echo "<h5>$rad[header]</h5>";
                echo "<p>$rad[postText]</p>";
                echo "<div class=\"date\">";
                echo "<div><p>$rad[anamn]</p></div>";
                echo "<div><p>$rad[postDate]</p></div>";
                echo "</div>";
                echo "</div>";
            } 

            $conn->close;

            ?>
        </div>
    </div>
</body>
</html>