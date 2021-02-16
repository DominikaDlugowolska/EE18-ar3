<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Hitta match med regex</h1>
        <form action="#" method="POST">
            <label>Ange text
                <input type="text" name="text" required>
            </label>
            <button>Skicka</button>
        </form>
        <?php
        /* Ta emot data som skickas */
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);

        if ($text) {
            echo "<h3>Inmattat</h3>";
            echo "<p>Text: <em>'$text'</em></p>";

            echo "<h3>Resultat</h3>";
            // Matcha "123"
            // Regex = regular expression = reguljära uttryck
            // På samma sätt som strstr()
            if (preg_match("/123/", $text)) {
                echo "<p>&#10003; Innehåller '123'.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE '123'.</p>";
            }  

            // Matcha bokstav i alfabetet
            if (preg_match("/[a-zåäö]/", $text)) {
                echo "<p>&#10003; Innehåller en bokstav ur alfabetet.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en bokstav ur alfabetet.</p>";
            }  
            // Matcha siffror
            if (preg_match("/[0-9]/", $text)) {
                echo "<p>&#10003; Innehåller en bokstav ur alfabetet.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en bokstav ur alfabetet.</p>";
            }  


            // Negativ matching, kolla att det inte finns
            if (preg_match("/[^_]/", $text)) {
                echo "<p>&#10003; Innehåller ej '_' tecknet.</p>";
            } else {
                echo "<p>&#10005; Innehåller '_' tecknet.</p>";
            } 

            // Matcha stora och små bokstäver (case insensitive)
            if (preg_match("/[a-zåäö]/i", $text)) {
                echo "<p>&#10003; Innehåller små eller stora bokstäver.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE små eller stora bokstäver.</p>";
            } 

            // Säk efter 'a', 'aa', 'aaa' dvs en eller flera
            if (preg_match("/[a+]/i", $text)) {
                echo "<p>&#10003; Innehåller en eller flera 'a'.</p>";
            } else {
                echo "<p>&#10005; Innehåller INGA 'a'.</p>";
            } 
            // Säk efter noll eller flera 'a'
            if (preg_match("/[a*]/i", $text)) {
                echo "<p>&#10003; Innehåller noll eller flera 'a'.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE noll eller flera 'a'.</p>";
            } 

            // Matcha ett antal, tex en ip-adress som 192.168.0.10
            if (preg_match("/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}/", $text)) {
                echo "<p>&#10003; Matchar en ip-adress.</p>";
            } else {
                echo "<p>&#10005; Matchar INTE en ip-adress.</p>";
            } 


            // Matcha orden SAB eller SAAB
            if (preg_match("/SA{1,2}B/", $text)) {
                echo "<p>&#10003; Matchar orden SAB eller SAAB.</p>";
            } else {
                echo "<p>&#10005; Matchar INTE orden SAB eller SAAB.</p>";
            } 
            // Matcha orden SAB eller SAAB exempel 2 med | tecknet
            if (preg_match("/SAB|SAAB/", $text)) {
                echo "<p>&#10003; Matchar orden SAB eller SAAB.</p>";
            } else {
                echo "<p>&#10005; Matchar INTE orden SAB eller SAAB.</p>";
            } 

            // Matcha orden Obs eller OBS eller obs
            if (preg_match("/Obs|OBS|obs/", $text)) {
                echo "<p>&#10003; Matchar orden obs.</p>";
            } else {
                echo "<p>&#10005; Matchar INTE orden obs.</p>";
            } 
            // Matcha orden Obs oavsett små eller stora bokstäver (i= case insensitive)
            if (preg_match("/obs/i", $text)) {
                echo "<p>&#10003; Matchar orden obs.</p>";
            } else {
                echo "<p>&#10005; Matchar INTE orden obs.</p>";
            } 


            // Matcha gatuadress tex Sveavägen 12, Sveaväg. 12
            if (preg_match("/Sveavägen 12|Sveaväg\. 12/", $text)) {
                echo "<p>&#10003; Matchar Sveavägen 12.</p>";
            } else {
                echo "<p>&#10005; Matchar INTE Sveavägen 12.</p>";
            } 
            // Matcha gatuadress tex Sveavägen 12, Sveaväg. 12 LÖSNING 2
            if (preg_match("/Sveaväg(en 12|\. 12)/", $text)) {
                echo "<p>&#10003; Matchar Sveavägen 12.</p>";
            } else {
                echo "<p>&#10005; Matchar INTE Sveavägen 12.</p>";
            } 
        }
        ?>
    </div>
</body>
</html>