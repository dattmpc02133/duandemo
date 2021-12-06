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
} else {
    // $items = thong_ke_binh_luan();
    $VIEW_NAME = "list.php";
}
require "../layout.php";
?>
<script>
    document.querySelector('.ncc').classList.add('active');
</script>