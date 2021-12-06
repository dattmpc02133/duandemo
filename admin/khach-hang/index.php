<?php
    require_once ("../../global.php");
    require_once("../../DAO/khach-hang.php");
    require_once("../../DAO/hoa-don.php");

    if(!isset($_SESSION['admin'])){
        header('location: ../../site/trang-chinh');
    }
    

    extract($_REQUEST);
    if(exit_param("btn-add")){
        $VIEW_NAME = "add.php";
    } else if(exit_param("btn-update")){
        $VIEW_NAME = "update.php";
    }elseif(exit_param("btn_cart")){
        $VIEW_NAME = "cart_by_kh.php";
    }
    else {
        $VIEW_NAME = "list.php";
    } 
    require_once "../layout.php";  
?>

<script>
    document.querySelector('.khach-hang').classList.add('active');
</script>