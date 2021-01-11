<?php
// Slå på felmeddelande
error_reporting(E_ALL);

$host = "localhost";
$db = "register";
$user = "register";
$pass = "T6XRe1mBC94IsUNF";


// Steg 1 - skapa anslutning
$conn = new mysqli($host, $user, $pass, $db);

// Gick det bra att ansluta?
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->error);
} else {
    echo "<p>Gick bra att ansluta till vår databas</p>";
}


?>