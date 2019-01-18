<?php
// Database connection

$db_dsn = 'mysql:host=localhost;dbname=php';
$db_username = 'php';
$db_password = 'php';
try {
    $db = new PDO($db_dsn, $db_username, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e;
    die('<p>Error: ' . $e->getMessage() . '</p>');
}
