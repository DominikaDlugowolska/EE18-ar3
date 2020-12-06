<?php

$host = "localhost";
$db = "blogg";
$user = "blogg";
$pass = "bZ7EL0i4JS6tzaqi";


// Steg 1 - skapa anslutning
$conn = new mysqli($host, $user, $pass, $db);

// Gick det bra att ansluta?
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->error);
} else {
    echo "<p>Gick bra att ansluta till vår databas</p>";
}


?>