<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bildgalleri</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="kontainer">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Ange katalogen
                $katalog = "./bilder";

                echo "<h1>Bildgalleri</h1>";

                // Hämta katalogens innehåll
                $filer = scandir($katalog);

                // Skapa en div för grid
                echo "<div class=\"carousel-item active\">";

                // Loopa igenom alla funna filer
                foreach ($filer as $bild) {

                    // Visa inte ”." och ”.."
                    if ($bild == "." || $bild == "..") {
                        continue;
                    }

                    // Visa bara bilden om filformat ”jpg”
                    $info = pathinfo($bild);
                    //var_dump($info["extension"]);
                    if ($info['extension'] == "jpg") {
                        echo "<img class=\"d-block w-100\" src=\"$katalog/$bild\" alt=\"\">";
                    }
                }
                echo "</div>";
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</body>
</html>