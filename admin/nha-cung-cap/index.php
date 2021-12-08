<?php 
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/nha_cung_cap.php");

if(!isset($_SESSION['admin'])){
    header('location: ../../site/trang-chinh');
}

extract($_REQUEST);
if (exit_param("btn_add")) {
    $VIEW_NAME = "add.php";
} else if(exit_param("btn_update")){
    $VIEW_NAME = "update.php";
} else if(exit_param("btn-list")){
    $VIEW_NAME = "list.php";
}
else{
    $VIEW_NAME = "list.php";
}
require "../layout.php";
?>
<script>
    document.querySelector('.ncc').classList.add('active');
</script>