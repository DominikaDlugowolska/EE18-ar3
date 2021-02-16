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
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Skanna katalog</h1>
    <?php
      // Välj katalog
      $katalog = ".";

      // Skriv ut vilken är katalog som skannas
      echo "<p>Katalogen: '$katalog'</p>";

      // Skanna av katalog
      $resultat = scandir($katalog);

      // Vad innehåller resultatet?
      //var_dump($resultat);

      // Loopa igenom arrayen $resultat
      foreach ($resultat as $objekt) {

          // skippa . och ..
          if ($objekt == "." || $objekt == "..") {
              continue;
          }

          // SKapa underkataloger
          if (is_dir("$katalog/$objekt")) {
              continue;
          }

          // Skaffa fram lite info om filen
          $info = pathinfo($objekt);
          var_dump($info);

          echo "<p>$objekt</p>";
      }
    ?>
    </div>
</body>
</html>