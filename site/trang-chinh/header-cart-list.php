<?php 
require_once("../../DAO/cart.php");

    if(isset($_SESSION['user'])){
        $ma_kh = $_SESSION['user'];   
        $products_cart =cart_count_ma_kh($ma_kh);
        foreach( $products_cart as  $_cart){
            extract($_cart);
        }    
        if( $total > 0){
            require_once("../trang-chinh/hearder-cart-item-active.php");
        }  else{
            require_once("../trang-chinh/header-cart-item.php");
        }
    

    } else{
        require_once("../trang-chinh/header-cart-item.php");
    }
