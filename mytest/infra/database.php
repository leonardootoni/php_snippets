<?php
    $dsn = 'mysql:host=localhost;dbname=php';
    $username='php';
    $password = 'php';
    try{
        $db = new PDO( $dsn, $username, $password );
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }catch(PDOException $e){
        echo $e;
        die('<p>Error: ' . $e->getMessage() . '</p>');
    }
?>