<?php 

    require_once("infra/database.php");
    require_once("model/cart.php");
    $cartProducts = null;

    $action = filter_input(INPUT_GET, "action");
    if ($action === "update") {
        $productId = filter_input(INPUT_GET, "product_id");
        $qty = filter_input(INPUT_GET, "qty");
        if (!empty($productId) && !empty($qty)) {
            updateProdutcQtyInCart($productId, $qty);
        }
    } else if($action === "delete" ) {
        $productId = filter_input(INPUT_GET, "product_id");
        if (!empty($productId)) {
            deleteProdutcFromCart($productId);
        }
    }

    //only show the Products Cart
    $cartProducts = getProductsFromCart();
    if(count($cartProducts) === 0){
        header("Location: /mytest");
    }  

    require_once("views/commons/header.php");
    require_once("views/mycart_view.php"); 
    require_once("views/commons/footer.php");
?>