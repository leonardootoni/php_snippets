<?php
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

require_once "../model/user.php";

$authenticated = authenticateUser($email, $password);
if ($authenticated) {
    header("Location: ../views/home.php");
} else {
    session_start();
    $_SESSION[USER_REGISTRATION_ERROR] = "Email or Password is not valid.";
    header("Location: ../login.php");
}
