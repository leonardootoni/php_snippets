<?php

require_once "../util/constants.php";
require_once "../models/user.php";

$email = filter_input(INPUT_POST, 'email');
$hash = filter_input(INPUT_POST, 'hash');

session_start();
try {
    $userData = authenticateUser($email, $hash);
    header("Location: ../views/home.php");
    $_SESSION[USER_SESSION_DATA] = $userData;
} catch (Exception $e) {
    $_SESSION[USER_REGISTRATION_ERROR] = USER_AUTHENTICATION_ERROR_MSG;
    header("Location: ../login.php");
}
