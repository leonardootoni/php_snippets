<?php
require_once "infra/database.php";
require_once "model/cart.php";

$productId = filter_input(INPUT_POST, "product_id", FILTER_VALIDATE_INT);
$qty = filter_input(INPUT_POST, "qty", FILTER_VALIDATE_INT);
if ($productId == null || $qty == null) {
    die("Error processing request");
} else {
    insertProductToCart($productId, $qty);
    header("Location: mycart");
}
