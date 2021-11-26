<?php 
require_once("../../DAO/cart.php");
$products_cart = cart_count();
    if($products_cart > 0){
        require_once("../trang-chinh/hearder-cart-item-active.php");
    } else{
        require_once("../trang-chinh/header-cart-item.php");
    }
?>