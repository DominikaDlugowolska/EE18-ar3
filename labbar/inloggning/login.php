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
    <title>Inloggning</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <header>
        <nav>
        <ul class="nav nav-tabs">  
        <?php if (isset($_SESSION["anamn"])) { ?>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link active" href="./login.php">Logga in</a></li>
                <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
            <?php } ?>
        </ul>
    </nav>
            <h1>Inloggning</h1>
        </header>
    <main>
        <form action="#" method="post">
            <label>Användarnamn <input type="text" name="anamn" required></label>
            <label>Lösenord <input type="password" name="lösen" required></label>
            <button>Logga in</button>
        </form>
        <?php
        // Ta emot data och skydda från hot
    
        $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
        $lösen = filter_input(INPUT_POST, "lösen", FILTER_SANITIZE_STRING);
    

        // Kontrollera om data finns
        if($anamn && $lösen) {

            // Finns användaren i tabellen?
            $sql = "SELECT * FROM user WHERE anamn='$anamn'";
            $result = $conn->query($sql);

            if ($result->num_rows == 0) {
                echo "<p class=\"alert alert-warning\">Användaren fins inte.</p>";
            } else {
                // Plocka hashet för användaren
                //Detta är en array, hämtar all information. Behövs inte göra variabel 
                //för varje liten grej så länge data inom dem inte ska ändras.
                // Exempel är $row[id] på rad 84
                $rad = $result->fetch_assoc();
                $hash = $rad['hash'];
                // var_dump($rad);
                // exit;

                // Kontrollera lösenordet (kommer ut true eller false ifall de matchar)
                if (password_verify($lösen, $hash)) {
                    //inloggad
                    echo "<p class=\"alert alert-success\">Du är inloggad.</p>";

                    // Skapa en sessionvariabel
                    $_SESSION["anamn"] = $anamn;

                    // Räkna antal
                    $antal =$rad["antal"] + 1;

                    // Registrera ny inloggning
                    $sql = "UPDATE user SET antal = '$antal' WHERE id = $rad[id]";
                    $result = $conn->query($sql);

                    // Skapa en sessionvariabel
                    $_SESSION["antal"] = $antal;
                    $_SESSION["username"] = $rad["anamn"];

                    // Hoppa till sidan lista
                    header("Location: ./lista.php");

                } else {
                    echo "<p class=\"alert alert-warning\">Lösenordet stämmer inte.</p>";
                }
            } 
        }
    ?>
    </main>
    </div>
</body>
</html>