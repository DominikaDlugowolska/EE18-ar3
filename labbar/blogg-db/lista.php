<?php

/**
 * PHP version 7
 * @category   
 * @author     Dominika Dlugowolska <domi.dlugowolska@gmail.com>
 * @license    PHP CC
 */
include "./resurser/conn.php;";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link active" href="./lista.php">Admin</a></li>
            </ul>
        </nav>
        <div>
        <?php
        // 2. Ställ en SQL-fråga
        $sql = "SELECT * FROM blogg";
        $result = $conn->query($sql);

        // Gick det bra?
        if (!$result) {
            die("Något blev fel med SQL-satsen.");
        } else {
            echo "<p>Lista på bilar kunde hämtas.</p>";
        }

        // Presentera resultatet
        while ($rad = $result->fetch_assoc()) {
            echo "<p>$rad[rubrik] $rad[inlagg]</p>";
        }
        ?>
        </div>
        
    </div>
</body>
</html>