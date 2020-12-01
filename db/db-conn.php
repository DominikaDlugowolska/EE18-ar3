<?php
/**
* PHP version 7
* @category   
* @author     Dominika Dlugowolska <domi.dlugowolska@gmail.com>
* @license    PHP CC
*/

$user = "domika";
$db = "labbar";
$host = "localhost";
$pass = "wZhVim6UuDnLzvw0";

// Logga in på mysql-server och välj databas
$conn = new mysqli($host, $user, $pass, $db);

// Gick det att ansluta?
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->connect_error);
} else {
    echo "<p>Det gick bra att ansluta</p>";
}

// Ställ en sql-fråga
$sql = "SELECT * FROM bilar"; // skriv det du vill skicka
$result = $conn->query($sql);

// Gick sql-satsen att köra?
if (!$result) {
    die("Något blev fel med sql-satsen");
} else {
    echo "<p>Lista på alla bilar kunde hämtas</p>";
}

// Skriv listan  på bilar(som blir en array)
while ($rad = $result->fetch_assoc()){
    echo "<p>$rad</p>";
}

// Stäng ned anslutningen
$conn->close();
?>