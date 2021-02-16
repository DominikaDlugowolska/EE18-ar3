<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Array och foreach()</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // En array som innehåller länder
    $länder = ["Sverige", "Norge", "Finland"];

    // Skriver ut en array
    print_r($länder); //skriver ut hela array, allting som finns inuti

    //Skriver ut en del ur en array
    echo "<p>$länder[0]</p>";
    echo "<p>$länder[1]</p>";
    echo "<p>$länder[2]</p>";

    //Utöka arrayen (lägg till)
    $länder[] = "Danmark";
    print_r($länder);
    echo "<p></p>";

    //Ta bort ett element ur en array (Findland)
    unset($länder[2]);
    print_r($länder);
    echo "<p></p>";

    // Associativ array (bra när man jobbar med databas)
    $elever = []; //En tom array (index behöver inte vara siffror)
    $elever["Liwia"] = "Gitarr";
    $elever["Lucas"] = "Keyboard";
    $elever["Olle"] = "Munspel";
    print_r($elever);

    //Skriva ut hela arrayen?
    $länder[2] = "Finland";
    echo "<p>$länder[0]</p>";
    echo "<p>$länder[1]</p>";
    echo "<p>$länder[2]</p>";
    echo "<p>$länder[3]</p>";

    // Loopa igenom en array = foreach
    foreach ($länder as $land) {
        echo "<p>$land</p>";
    }

    // Loopa igenom arrayen för $elever
    foreach ($elever as $instrument) {
        echo "<p>$instrument</p>";
    }
    foreach ($elever as $key => $instrument) {
        echo "<p>$key spelar $instrument</p>";
    }

    // Skriv ut som en tabell
    echo "<table>";
    echo "<tr>";
    echo "<td>John</td>";
    echo "<td>Doe</td>";
    echo "</tr>";
    echo "</table>";

    // Dynamiskt skapad tabell
    echo "<table>";
    foreach ($länder as $land) {
        echo "<tr>";
        echo "<td>$land</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<p></p>";

    // Skriv ut arrayen elever som en tabell
    echo "<table>";
    echo "<tr>
            <th>Namn</th>
            <th>Instrument</th>
         </tr>";
    foreach ($elever as $key => $instrument) {
        echo "<tr>";
        echo "<td>$key</td><td>$instrument</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<p></p>";


    // Splitta (dela) en sträng
    $mening = "Vi och våra partners bearbetar personuppgifter såsom IP-adress, unikt ID och browsingdata. Vissa partner begär inte ditt samtycke till att behandla dina data, utan de litar på sitt legitima affärsintresse. Visa vår lista över partners för att se de syften som de tror att de har ett legitimt intresse för och hur du kan göra invändningar mot det.";

    //Klippa på mellanslagen
    $allaOrd = explode(" ", $mening);

    // skriv ut alla ord numrerade i en tabell
    echo "<table>";
    echo "<tr>
            <th>Ordning</th>
            <th>Ord</th>
         </tr>";
    foreach ($allaOrd as $key => $ord) {
        $key++; //börja från 1 och inte 0
        echo "<tr>";
        echo "<td>$key</td><td>$ord</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>