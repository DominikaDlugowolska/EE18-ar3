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
                <li class="nav-item anamn"> <?php echo $_SESSION["anamn"] . " (". $_SESSION["antal"].")" ;?> </li>
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
           
        // Hämta alla användare i tabellen
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        // Gick det bra?
        if (!$result) {
            die("Något blev fel med SQL-satsen." . $conn->error);
        } else {
            echo "<p class=\"alert alert-success\" role=\"alert\">Hittade " .  $result->num_rows . " användare.</p>";
        }

        echo "<table>";
        echo "<tr>
                <th>Gånger inloggad</th>
                <th>Förnamn</th>
                <th>Efternamn</th>
                <th>Användarnamn</th>
                <th>Skapad</th>
            </tr>";
        // Presentera resultatet
        while ($rad = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>$rad[antal]</td>";
            echo "<td>$rad[fnamn]</td>";
            echo "<td>$rad[enamn]</td>";
            echo "<td>$rad[anamn]</td>";
            echo "<td>$rad[skapad]</td>";
            echo "</tr>";
        }
        echo "</table>";

        $conn->close();
        ?>
    </main>
    </div>
</body>
</html>