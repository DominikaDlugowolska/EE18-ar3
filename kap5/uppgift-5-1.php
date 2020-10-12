<!-- Gör en webbapplikation som tar den inmatade texten ur ett formulärs "textarea" och sparar den i en fil -->
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <form action="#" method="POST">
            <label for="text">Önske brunn</label>
            <textarea name="texten" id="text" cols="30" rows="10"></textarea>

            <button type="submit" class="btn btn-primary">Räkna ut</button>
        </form>
        <?php
        if (isset($_POST["texten"])) {

            // Läs in texten från formuläret
            $texten = $_POST["texten"];

            // spara texten i en textfil vvv

            // öppna filen för att skriva
            $fil = fopen("onskebrunn.txt", "w");
            //skriv i textfilen
            fwrite($fil, $texten);
            // stäng textfilen
            fclose($fil);
        }
        ?>
    </div>
</body>
</html>