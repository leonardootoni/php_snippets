<?php

function insertProductToCart($productId, $qty) {
    global $db;
    $query = "select id, qty from cart where product_id = :productId";
    $statement = $db->prepare($query);
    $statement->bindValue(":productId", $productId);
    $statement->execute();
    $existingProduct = $statement->fetch();
    $productCount = $statement->rowCount();
    
    $dbQty = 0; 
    if ($productCount === 0) {
        $query = "insert into cart(product_id, qty) values(:productId, :qty)";
    } else {
        $query = "update cart set qty= :qty where product_id = :productId";
        $dbQty = $existingProduct['qty'];
    }

    $statement = $db->prepare($query);
    $statement->bindValue(":productId", $productId);
    $statement->bindValue(":qty", ($qty + $dbQty));
    $statement->execute();
    $statement->closeCursor();
    
}

function getProductsFromCart() { 
    global $db;
    $query = "select p.id, p.name, p.price, c.qty, (p.price * c.qty) as total
    from product as p join cart as c on p.id = c.product_id";
    
    $statement = $db->prepare($query);
    $statement->execute();
    $cartProducts = $statement->fetchAll();
    $statement->closeCursor();
    return $cartProducts;
}

function updateProdutcQtyInCart($productId, $qty) {
    global $db;
    $query = "update cart set qty = :qty where product_id = :productId";
    $statement = $db->prepare($query);
    $statement->bindValue(":qty", $qty);
    $statement->bindValue(":productId", $productId);
    $statement->execute();
    $statement->closeCursor();
}

function deleteProdutcFromCart($productId) {
    global $db;
    $query = "delete from cart where product_id = :productId";
    $statement = $db->prepare($query);
    $statement->bindValue(":productId", $productId);
    $statement->execute();
    $statement->closeCursor();
}

?>