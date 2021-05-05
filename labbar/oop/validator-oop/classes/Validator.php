<?php
/**
 * From Validator
* PHP version 7
* @category   PHP
* @author     Dominika Dlugowolska <dominika.dlugowolska.@elev.ga.ntig.se>
* @license    PHP CC
*/

class Validator {
   private $errors = [];
   private $data;

// methods
public function set($postdata) {
    $this->data = $postdata;
}

public function validateUsername()
{
    if (!preg_match("/[a-zA-Z0-9]{6,12}/", $this->data["username"])) {
        $this->errors['username'][] = "&#10005; Innehåller INTE a-z, 0-9 eller en stor bokstav.";
    }
}
public function validatePassword()
{
    if (!preg_match("/[a-zåäö]/", $this->data["password"]) > 0) {
        $this->errors['password'][] = '&#10005; password must contain a least one lowercase character<br>';
    }
    if (!preg_match("/[A-ZÅÄÖ]/", $this->data["password"]) > 0) {
        $this->errors['password'][] = '&#10005; password must contain a least one uppercase character<br>';
    }
    if (!preg_match("/[0-9]/", $this->data["password"]) > 0) {
        $this->errors['password'][] = '&#10005; password must contain a least one alphanumeric<br>';
    }
    if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $this->data["password"]) > 0) {
        $this->errors['password'][] = '&#10005; password must contain a least one special character<br>';
    }
    if (!preg_match("/^.{8,40}$/", $this->data["password"]) > 0) {
        $this->errors['password'][] = '&#10005; password must at least 8 character long<br>';
    } 
}
public function validateEmail()
{
    if (!filter_var($this->data["email"], FILTER_VALIDATE_EMAIL)) {
        $this->errors['email'][]  = "&#10005; Invalid email format";
}
}

public function showErrors($type) {

        if (array_key_exists($type, $this->errors)) {
            echo "<p>";
            foreach ($this->errors[$type] as $error) {
                echo $error;
            }
            echo "</p>";
        }
    
    }
}

// ta emot data som skickas
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);



?>

