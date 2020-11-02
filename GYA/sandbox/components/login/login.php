<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php">

        <!-- </?php echo display_error(); ?> -->

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_btn">Login</button>
        </div>
        <?php
        //skapa en table i txt filen som ska fungera som en databas?
        if (isset($_POST["namn"], $_POST["email"], $_POST["meddelande"])) {

            // Läs in texten från formuläret
            $namn = $_POST["namn"];
            $email = $_POST["email"];
            $meddelande = $_POST["meddelande"];

           // Spara snyggt formaterat i gästbok-filen
           $handtag = fopen("anvandare.txt", "a"); //a = append, lägg till
           // spara namn och email på en rad
           fwrite($handtag, "$namn $email <br>\n");
           // spara meddelande på en rad till
           fwrite($handtag, "$meddelande <br>\n");
           
           fclose($handtag);
        }
        ?>

    </form>
</body>
</html>