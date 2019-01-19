<?php

require_once "../util/constants.php";

session_start();
if (!isset($_SESSION[USER_SESSION_DATA])) {
    //TODO: check if the time session is expired!
    //User not authenticated!!!
    header("Location: ../login.php");
    exit();
}
