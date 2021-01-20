<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Dominika Dlugowolska <domi.dlugowolska@gmail.com>
 * @license    PHP CC
 */
include "./resurser/conn.php";
session_start();

//Om inte inloggad, kickad till login sidan
if (!isset($_SESSION["anamn"])) {
    header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="kontainer">
        <header>
            <nav>
                <ul class="nav nav-tabs">
                    <!-- bestäm vad som syns och inte syns när man är inloggad-->
                    <?php if (isset($_SESSION["anamn"])) { ?>
                        <li class="nav-item"><a class="nav-link active" href="./lista.php">Lista</a></li>
                        <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                        <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                        <li class="nav-item anamn"> <?php echo $_SESSION["anamn"] . " (" . $_SESSION["antal"] . ")"; ?> </li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                        <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                        <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                        <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
                    <?php } ?>
                </ul>
            </nav>
            <h1>Lista på användare</h1>
        </header>
        <main>
            <?php
                // Ta emot användare id som finns som value på kanppen i listan
                $id = $_GET["id"];
                // Ta emot data som finns för id som vi har valt
                $sql = "SELECT * FROM user WHERE id = '$id'";
                // Kör sql satsen
                $result = $conn->query($sql);
                // ta emot data
                $rad = $result->fetch_assoc();

                echo "<table>";
                echo "<tr>
                <th></th>
                <th>Förnamn</th>
                <th>Efternamn</th>
                <th></th>
                </tr>";

                echo "<tr>";
                echo "<td>Är du säker på att du vill radera:</td>";
                echo "<td>{$rad['fnamn']}</td>";
                echo "<td>{$rad['enamn']}</td>";
                echo "<form method=\"post\" action=\"#\">";
                echo "<td><button type=\"submit\" name=\"deletebtn\" class=\"btn btn-outline-danger\">Radera</button></td>";
                echo "</form>";

                if (isset($_POST['deletebtn'])) {
                    // ta bort användare med id "$id"
                    $sql = "DELETE FROM user WHERE id = '$id'";
                    $conn->query($sql);
                     if (!$result) {
                        die("Något blev fel med SQL-satsen." . $conn->error);
                    } else {
                        echo "<p class=\"alert alert-success\" role=\"alert\">Användaren har raderats.</p>";
                    }
                }

                echo "</tr>";

                echo "</table>";

                $conn->close();
            ?>
        </main>
    </div>
</body>

</html>