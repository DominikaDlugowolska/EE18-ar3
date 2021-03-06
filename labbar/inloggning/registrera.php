<?php
/**
* PHP version 7
* @category   Inloggning
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
    <title>Registrera</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <header>
    <nav>
        <ul class="nav nav-tabs">  
            <!-- bestäm vad som syns och inte syns när man är inloggad-->           
            <?php if (isset($_SESSION["anamn"])) { ?>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                <li class="nav-item"><a class="nav-link active" href="./registrera.php">Registrera</a></li>
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
            <?php } ?>
        </ul>
    </nav>
    <h1>Inloggning</h1>
    </header>
    <main>
    <form action="#" method="post">
    <label>Förnamn <input type="text" name="fnamn" required></label>
    <label>Efternamn <input type="text" name="enamn" required></label>
    <label>Användarnamn <input type="text" name="anamn" required></label>
    <label>Lösenord <input type="password" name="lösen1" required></label>
    <label>Upprepa lösenord <input type="password" name="lösen2" required></label>
    <button>Registrera</button>
    </form>
    <?php
    // Ta emot data och skydda från hot
    $fnamn = filter_input(INPUT_POST, "fnamn", FILTER_SANITIZE_STRING);
    $enamn = filter_input(INPUT_POST, "enamn", FILTER_SANITIZE_STRING);
    $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
    $lösen1 = filter_input(INPUT_POST, "lösen1", FILTER_SANITIZE_STRING);
    $lösen2 = filter_input(INPUT_POST, "lösen2", FILTER_SANITIZE_STRING);

    // Kontrollera om data finns
    if($fnamn && $enamn && $anamn && $lösen1 && $lösen2) {

        // TODO Kontrollera att användaren inte redan finns
        $sql_a = "SELECT anamn FROM user WHERE anamn='$anamn'";
        $res_a = $conn->query($sql_a);
        if ($res_a->num_rows > 0) {
            echo "<p>Användarnamnet finns redan</p>";
        }else{
            
        // Kontrollera om lösenorden matchar
        if ($lösen1 == $lösen2) {

            // räkna ut hash på lösenordet. Pass får inte sparas i db i okrypterad text
            $hash = password_hash($lösen1, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (fnamn, enamn, anamn, hash) VALUES ('$fnamn', '$enamn', '$anamn', '$hash')";

            // Kör koden för att det ska fungera
            $conn->query($sql);

            echo "<div class=\"alert alert-success\" role=\"alert\"><p>Användaren registrerad</p></div>";

            // Stäng ner anslutningen
            $conn->close();

        } else {
            echo "<div class=\"alert alert-info\" role=\"alert\"><p>Lösenorden matchar inte, vg försök igen</p></div>";
        }
        
    }
    }
    ?>
    </main>
    </div>
</body>
</html>