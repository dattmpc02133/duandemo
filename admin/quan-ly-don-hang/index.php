<?php 
    require("../../global.php");
    extract($_REQUEST);
    if (exit_param("btn-list")) {
        // trang danh sach loaim hang
        $VIEW_NAME = "list.php";
    } elseif (exit_param("btn_update")) {
        $VIEW_NAME = "update.php";
    } elseif (exit_param('btn-details')) {
        $VIEW_NAME = "details.php";
    } else {
        $VIEW_NAME = "list.php";
    }
    require("../layout.php");
?>
<script>
    document.querySelector('.don-hang').classList.add('active');
</script>