<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NASA Recent Posts</title>
    <link rel="stylesheet" href="nasa-style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        // Hämta sidan
        $sidan = file_get_contents("https://blogs.nasa.gov/disaster-response/2020/10/28/nasa-prepares-for-hurricane-zeta/?fbclid=IwAR1eTmcq417i50AZ7S2vzo-IWn0WOWNnQAGyxBxxnKDpBE018lJm4liiYiU");

        // Sök början på texten
        $start = strpos($sidan, "widget widget_recent_entries");
        /* if ($start !== false) {
            echo "<p>Recent posts började på position $start</p>";
        } else {
            echo "<p>Hittade inte början på recent posts!</p>";
        } */

        // Hitta var texten slutar
        $slut = strpos($sidan, "widget widget_recent_comments", $start);
        /* if ($slut !== false) {
            echo "<p>Texten slutar på position $slut</p>";
        } else {
            echo "<p>Hittade inte Textens slut!</p>";
        } */

        // Skriv ut den här delen
        $caText = substr($sidan, $start + 30, $slut - $start);

        // Hämta alla div-boxar i en loop
        for ($i = 0; $i < 5; $i++) {
            $start = strpos($caText, "<li>", $slut);
            $slut = strpos($caText, "</li>", $start);
            $del2 = substr($caText, $start, $slut - $start);
            echo "$del2</li>\n";
        }
        ?>
    </div>
</body>
</html>