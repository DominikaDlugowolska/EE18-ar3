<?php
/**
* PHP version 7
* @category   
* @author     Dominika Dlugowolska <domi.dlugowolska@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/sketchy/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Lägg till gästbok</h1>
        <form action="#" method="POST">
            <label for="text">Namn</label>
            <input type="text" name="namn" required>
            <label for="text">Adress</label>
            <input type="text" name="adress" required>
            <label for="text">Postnr</label>
            <input type="text" name="postnr" required>
            <label for="text">Postort</label>
            <input type="text" name="postort" required>
            <label for="email">Epost</label>
            <input type="email" name="epost" required>
            
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php
        // Läs in från formuläret och rensa från hot
        $namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
        $adress = filter_input(INPUT_POST, "adress", FILTER_SANITIZE_STRING);
        $postnr = filter_input(INPUT_POST, "postnr", FILTER_SANITIZE_STRING);
        $postort = filter_input(INPUT_POST, "postort", FILTER_SANITIZE_STRING);
        $epost = filter_input(INPUT_POST, "epost", FILTER_SANITIZE_STRING);

        // Om vi får data
        if ($namn && $adress && $postnr && $postort) {
            
            // Kontrollera att alla fälten innehåller minst 3 tecken: strlen()
            if (strlen($namn) < 3) {
                echo "<p class=\"alert alert-warning\">Namnet måste vara minst 3 tecken långt !</p>";
            }
            if (strlen($adress) < 3) {
                echo "<p class=\"alert alert-warning\">Adressen måste vara minst 3 tecken lång !</p>";
            }
            if (strlen($postnr) < 3) {
                echo "<p class=\"alert alert-warning\">Postnumret måste vara minst 3 tecken långt !</p>";
            }
            if (strlen($postort) < 3) {
                echo "<p class=\"alert alert-warning\">Postorten måste vara minst 3 tecken lång !</p>";
            }

            // Kontrollera att postnumret innehåller 5 tecken: strlen()
            if (strlen($postnr) > 5) {
                echo "<p class=\"alert alert-warning\">Postnumret måste vara 5 tecken långt !</p>";
            }

            // Kontrollera att postnumret innehåller endast siffror
            if (is_numeric($postnr)) {
                echo "<p class=\"alert alert-warning\">Postnumret måste vara endast siffror !</p>";
            }

            // Kontrollera att epostadressen innehåller ett @, och minst en punkt

            // Kontrollera också att epostadressen är misnt sex tecken lång
        }
        ?>
    </div>
    
</body>
</html>