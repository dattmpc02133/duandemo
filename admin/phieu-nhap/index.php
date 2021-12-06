<?php 
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once '../../DAO/phieu-nhap.php';
require_once '../../DAO/nha_cung_cap.php';
require_once '../../DAO/san-pham.php';
if(!isset($_SESSION['admin'])){
    header('location: ../../site/trang-chinh');
}

extract($_REQUEST);
if (exit_param("btn_add")) {
    $VIEW_NAME = "add.php";
} 
else if(exit_param("btn_add_pn_ct")){
    $VIEW_NAME = "add_pn_ct.php";
} 
else if(exit_param("btn_detail")){
    $VIEW_NAME = "detail.php";
}
else if(exit_param("btn_update")){
    $VIEW_NAME = "update.php";
}
else if(exit_param("btn_update_ct")){
    $VIEW_NAME = "update_ct.php";
}
else {
    $VIEW_NAME = "list.php";
}
require "../layout.php";
?>
<script>
    document.querySelector('.phieu_nhap').classList.add('active');
</script>