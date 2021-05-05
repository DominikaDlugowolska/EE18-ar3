<?php
// användarnamnet måste vara 6-12 tecken långt, stora o små bokstäver samt siffror
$errors = [];
function validateUsername($data)
{
    global $errors;
    if (!preg_match("/[a-zA-Z0-9]{6,12}/", $data)) {
        $errors['username'][] = "&#10005; Innehåller INTE a-z, 0-9 eller en stor bokstav.";
    }
}
function validatePassword($data)
{
    global $errors;
    if (!preg_match("/[a-zåäö]/", $data) > 0) {
        $errors['password'][] = '&#10005; password must contain a least one lowercase character<br>';
    }
    if (!preg_match("/[A-ZÅÄÖ]/", $data) > 0) {
        $errors['password'][] = '&#10005; password must contain a least one uppercase character<br>';
    }
    if (!preg_match("/[0-9]/", $data) > 0) {
        $errors['password'][] = '&#10005; password must contain a least one alphanumeric<br>';
    }
    if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $data) > 0) {
        $errors['password'][] = '&#10005; password must contain a least one special character<br>';
    }
    if (!preg_match("/^.{8,40}$/", $data) > 0) {
        $errors['password'][] = '&#10005; password must at least 8 character long<br>';
    } 
}
function validateEmail($data)
{
    global $errors;
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        $errors['email'][]  = "&#10005; Invalid email format";
}
}

function showErrors($type) {

    global $errors;
    echo "<p>";
    foreach ($errors[$type] as $error) {
       echo $error;
    }
echo "</p>";
}

// ta emot data som skickas
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

// om data finns..
if ($username && $password && $email) {
    // kontrollera att username följer reglerna
    validateUsername($username);

    // kontrollera att lösenordet följer reglerna
    validatePassword($password);

    // kontroller att email följr reglerna
    validateEmail($email);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Create New User</h1>
        <form action="#" method="post">
            <label>Username: <input type="text" name="username"></label>
            <?php
                showErrors('username');
               // echo $errors['username'][0];
            ?>
            <label>Password: <input type="password" name="password"></label>
            <?php
                showErrors('password');
            /*echo "<p>";
                 foreach ($errors['password'] as $error) {
                    echo $error;
                 }
            echo "</p>"; */
            ?>
            <label>Email: <input type="email" name="email"></label>
            <?php
                //echo $errors['email'][0];
                showErrors('email');
            ?>
            <br>
            <button>Submit</button>
        </form>
        <?php
        //var_dump($errors);
        ?>
    </div>
</body>
</html>