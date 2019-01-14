<?php 
    require_once("infra/database.php");
    require_once("model/product.php");
    $productId = filter_input(INPUT_GET, "product_id" ,FILTER_VALIDATE_INT);
    if ($productId == null) {
        die("Error processing request");
    } else {
        $product = getProductDetails($productId);
        require_once("views/commons/header.php");
        require_once("views/product_detail_view.php"); 
        require_once("views/commons/footer.php");
    }

    
?>