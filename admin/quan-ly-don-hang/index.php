<?php 
    require_once("../../global.php");
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/hoa-don.php';
    require_once '../../DAO/san-pham.php';
    extract($_REQUEST);
    if (exit_param("btn-list")) {
        $VIEW_NAME = "list.php";
    } elseif (exit_param("btn_update_ct")) {
        $VIEW_NAME = "update_ct.php";
    } elseif (exit_param("btn_update_hd")) {
        $VIEW_NAME = "update_hd.php"; 
    } elseif (exit_param('btn-details')) {
        $VIEW_NAME = "details.php";
    } elseif(exit_param("btn_add_sp_hdct")){
        $VIEW_NAME = "add_sp_hdct.php";
    } elseif(exit_param("btn_delete_ct")){
        if(isset($_GET['id'])){
            hoa_don_chi_tiet_delete($_GET['id']);
            echo '<script>
                location.href = "index.php";
            </script>';
        }
    } else {
        $VIEW_NAME = "list.php";
    }
    require("../layout.php");
?>
<script>
    document.querySelector('.don-hang').classList.add('active');
</script>