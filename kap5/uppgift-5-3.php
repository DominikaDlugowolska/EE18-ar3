<!-- Utveckla webbappen i uppgift 1 till ett enkelt gästboksskript. Skapa en sida kallad "Lägg till gästbok", där användaren får fylla i namn, e-post-adress och meddelande. När användaren skickar i väg formuläret ska informationen sparas snyggt formaterad i en fil. Snyggt formaterad innebär att du har mellanrum mellan namnet och e-post-adressen, och ny rad (<br>) innan du skriver meddelandet, och dessutom ny rad (<br>) efter själva meddelandet. Obs! Använd append (a) som filöppningsmetod, ej write (w), eftersom du då skriver över tidigare innehåll! Längst ned på varje sida ska en rubrik med texten "Skrivet i gästboken" samt filinnehållet visas.  -->
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
    <title>Gästbok</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Lägg till gästbok</h1>
        <form action="#" method="POST">
            <label for="text">Ange ditt namn</label>
            <input type="text" name="namn">
            <label for="mail">Ange din mail</label>
            <input type="mail" name="email">
            <label for="meddelande">Ange ditt meddelande</label>
            <textarea name="meddelande" id="meddelande" cols="30" rows="10"></textarea>

            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php
        if (isset($_POST["namn"], $_POST["email"], $_POST["meddelande"])) {

            // Läs in texten från formuläret
            $namn = $_POST["namn"];
            $email = $_POST["email"];
            $meddelande = $_POST["meddelande"];

           // Spara snyggt formaterat i gästbok-filen
           $handtag = fopen("gastboken.txt", "a"); //a = append, lägg till
           // spara namn och email på en rad
           fwrite($handtag, "$namn $email <br>\n");
           // spara meddelande på en rad till
           fwrite($handtag, "$meddelande <br>\n");
           
           fclose($handtag);
        }
        ?>
    </div>
</body>
</html>