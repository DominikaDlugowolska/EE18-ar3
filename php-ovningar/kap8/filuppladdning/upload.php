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
        <?php
        if (isset($_POST["submit"])) {
            // Ta emot filen
            $file = $_FILES["file"];
            var_dump($file);

            // FIlens information
            $fileName = $file["name"];
            $fileSize = $file["size"];
            $fileType = $file["type"];
            $fileTmpName = $file["tmp_name"];
            $error = $file["error"];

            // Tillåtna filtyper
            $allowed = ["jpeg", "png", "gif"];
            //Bilden filtyp
            $delar = explode("/", $fileType);
            $imageType = $delar[1];

            // Är filen tillåten? sök efter imageType i allowed 
            //(needle inhaystack)
            if (in_array($imageType, $allowed)) {
                // Blev det något felmeddelande
                if ($error === 0) {
                    // Är filen för stor?
                    if ($fileSize <= 200000) {
                        // skapa ett unikt filnamn
                        $fileNameNew = uniqid("", true). ".$imageType";

                        // Var filen skall hamna
                        $fileDestination = "./uppladdat/$fileNameNew";

                        // Äntligen! Flytta filen in i mappen
                        move_uploaded_file($fileTmpName, $fileDestination);

                        echo "<p>Filen är uppladda</p>";
                    } else {
                        echo "<p>Filen är för stor. Försök igen.</p>";
                    }
                    
                } else {
                    echo "<p>Något blev fel.</p>";
                }
                
            } else {
                echo "<p>Du får bara ladda upp jpeg, png eller gif</p>";
            }
            
        }
        ?>
    </div>
</body>
</html>