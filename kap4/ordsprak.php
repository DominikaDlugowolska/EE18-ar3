<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slumpa fram sex ordspråk</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // Skapa en array med tio ordspråk
    $ordsprak[] = "Blyga pojkar får aldrig kyssa vackra flickor.";
    $ordsprak[] = "Att skiljas är att dö en smula.";
    $ordsprak[] = "Finns det hjärterum finns det stjärterum";
    $ordsprak[] = "Nära skjuter ingen hare.";
    $ordsprak[] = "När katten är borta dansar råttorna på bordet.";
    $ordsprak[] = "Mota Olle i grind.";
    $ordsprak[] = "Man ska inte ropa hej förrän man kommit över bäcken.";
    $ordsprak[] = "Kasta inte yxan i sjön.";
    $ordsprak[] = "Ingenting är nytt under solen.";
    $ordsprak[] = "Gråt inte över spilld mjölk";



   // Array för att lagra antal kast
   $tagna =  [];

   // Upprepa mig 6 gånger, gvs skriv ut 6 ggr
   for ($i = 0; $i < 6; $i++) {
       // Slumpa fram ett tal mellan 0 och 9 med funktionen rand()
   $index = rand(0, 9);

   //Skriv ut ordspråket om det inte redan taget
   if (!in_array($index, $tagna)) {
       echo "<p>$ordsprak[$index]</p>";

       // spara nu det tagna indexet
       $tagna[] = $index;

   } else {
       $i--;
   }
   print_r($tagna);
   }

   
   

    /* 
    echo "<ol>";
    // for-loop som går 6 varv för att vi vill skriva ut 6 ordspråk
    for ($i = 0; $i < 6; $i++) {
        // Slumpa fram ett tal mellan 0 och 9 med funktionen rand()
        $index = rand(0, 9);

        // Skriv ut ordspråket 
        echo "<li>$ordsprak[$index]</li>";
    }
    echo "</ol>"; 
    */

    ?>
</body>
</html>