<?php 
    require_once("infra/database.php");
    require_once("model/product.php"); 
    $products = get_products();
    
    require_once("views/commons/header.php");
    require_once("views/home_view.php"); 
    require_once("views/commons/footer.php");
?>
