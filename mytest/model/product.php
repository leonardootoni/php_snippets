<?php

function get_products() { 
    global $db;
    $query = "select id, name, price, description from product";
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function getProductDetails($productId) {
    global $db;
    $query = "select id, name, price, description, image_url from product where id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $productId);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

?>