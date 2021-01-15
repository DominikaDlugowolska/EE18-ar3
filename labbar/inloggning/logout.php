<?php
/**
* PHP version 7
* @category   Inloggning
* @author     Dominika Dlugowolska <domi.dlugowolska@gmail.com>
* @license    PHP CC
*/
session_start();

// Logga ut genom att döda session variablarna
session_destroy();

// Hoppa till sidan lista
header("Location: ./login.php");
?>  