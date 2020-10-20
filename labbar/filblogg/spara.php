<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Min enkla blogg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/sketchy/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Bloggen</h1>
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="blogg.php">Alla inlägg</a></li>
                    <li class="nav-item"><a class="active nav-link" href="spara.php">Skriva inlägg</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form action="#" method="post">
                <textarea class="form-control" name="inlagg" id="inlagg" cols="30" rows="10"></textarea>
                <button class="btn btn-primary">Spara inlägg</button>
            </form>
            <?php
            /* //Ta emot data från formuläret
            if (isset($_POST['inlagg'])) {

                // skapa en intern variabel med datat
                $texten = $_POST["inlagg"]; */

                // Läs in från formuläret och rensa från hot

                $texten = filter_input(INPUT_POST, "inlagg", FILTER_SANITIZE_STRING);

                //Om vi får data
                if ($texten) {
                   
                // Förbeedd texten för HTML-utskrift
                $textenMedBr = str_replace("\n", "<br>", $texten);

                // Klockslag och dagens datum
                setlocale(LC_ALL, "sv_SE.utf8");
                $datumStämpel = strftime("%A %e %B kl %H:%M");

                // Vad heter textfilen?
                $filnamn = "blogg.txt";

                // Är filen skrivbar?
                if (is_writable($filnamn)) {

                    // 1: Får vi öppna filen?
                    if (!$handtag = fopen($filnamn, "a")) {
                        echo "<p class=\"alert alert-warning\">Filen gick inte att öppna. Avbryter...</p>";
                        exit;
                    }

                    // 2: Går det bra att skriva i filen?
                    if (fwrite($handtag, "<p>$datumStämpel<br>$textenMedBr</p>\n") === FALSE) {
                        echo "<p class=\"alert alert-warning\">Kan inte skriva i filen. Avbryter...</p>";
                        exit;
                    }

                    // 3: Stäng anslutningen
                    fclose($handtag);

                    //Skriv ut en bekräftelse
                    echo "<p class=\"alert alert-success\">Inlägget har sparats!</p>";
                } else {
                   echo "<p class=\"alert alert-success\">Filen är inte skrivbar</p>";
                }
            }
                
/* 
                // 1: Öppna textfilen för att skriva
                $handtag = fopen($filnamn, "a");


                // 2: Skriv text i textfilen, för varje inlägg blir det en ny rad i txt
                fwrite($handtag, "<p>$datumStämpel<br>$textenMedBr</p>\n");

                // 3. Stäng anslutningen till textfilen
                fclose($handtag);

                echo "<p class=\"alert alert-primary\" role=\"alert\">Inlägget har sparats!</p>";
            } else {
                echo "<p>Inlägget kan inte sparas</p>";
            } */
            ?>
        </main>
        <footer>
            2020
        </footer>
    </div>
</body>
</html>