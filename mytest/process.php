<?php

require_once "database/database.php";

$actionField = filter_input(INPUT_GET, 'name_form');
$actionMethod = "";
$modified_name = "";

if (isset($actionField)) {
    $actionMethod = "GET Method";
} else {
    $actionField = filter_input(INPUT_POST, 'name_form');
    if (isset($actionField)) {
        $actionMethod = "POST Method";
        $modified_name = "The name is " . $actionField;
    } else {
        $actionMethod = "Not identified";
        error_log("The action was not identified as HTTP POST - action value: " . $actionMethod);
        exit("Error Identifying the http method " . date('Y-M'));
    }
}

$query = "select name, description from product";
$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>This is the result:</h1>
    <div><span><?php echo $modified_name ?></span></div>
    <br>
    <?php foreach ($products as $product): ?>
        <div>
            <td><?php echo $product['name'] ?></td>
            <td><?php echo $product['description'] ?></td>
        </div>
    <?php endforeach?>
</body>
</html>