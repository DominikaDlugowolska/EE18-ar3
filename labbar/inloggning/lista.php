<?php
/**
* PHP version 7
* @category   Inloggning
* @author     Dominika Dlugowolska <domi.dlugowolska@gmail.com>
* @license    PHP CC
*/
include "./resurser/conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <header>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="./lista.php">Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
            </ul>
        </nav>
        <h1>Lista på användare</h1>
        </header>
    <main>
        <?php
        if (isset($_SESSION["anamn"])) {
           echo "<p class=\"alert alert-success\">Du är inloggad</p>";
        } else {
            echo "<p class=\"alert alert-warning\">Du är utloggad</p>";
        }
            
        ?>
    </main>
    </div>
</body>
</html>