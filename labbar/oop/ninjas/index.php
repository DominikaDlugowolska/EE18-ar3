<?php
// det här är en mall
class User {
    // egenskaper (properties) 
    public $username = "Jun";
    public $email = "junzzy@google.com";

    // metoder (methods)
    public function addFriend() {
        
        return "$this->email added a new friend";
    }
}

// skapar ett objekt 
$userOne = new User();
$userTwo = new User();

echo $userOne->username . '<br>';
echo $userOne->email . '<br>';
echo $userOne->addFriend() . '<br>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP</title>
</head>
<body>
    
</body>
</html>