<?php
// ta emot text
$texten = filter_input(INPUT_POST, "texten", FILTER_SANITIZE_STRING);
// öppna textfil för att skriva i
$handtag = fopen("markers.txt", "a");

// skriv en rad
fwrite($handtag, $texten);

// Stäng ned filen
fclose($handtag);
?>