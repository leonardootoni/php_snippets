<?php
/**
 * Controller to dispatch the user registration form
 * Author: Leonardo Otoni
 */
require_once "../util/constants.php";
require_once '../models/user.php';

$email = filter_input(INPUT_POST, 'email');
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$birthday = filter_input(INPUT_POST, 'birthday');
$hash = filter_input(INPUT_POST, 'hash');

try {
    registerUser($email, $firstName, $lastName, $hash, $birthday);
    header("Location: ../login.php");
} catch (Exception $e) {
    session_start();
    $_SESSION[USER_REGISTRATION_ERROR] = "Invalid Registration: " . $e->getMessage();
    header("Location: ../sign_up.php");
}
