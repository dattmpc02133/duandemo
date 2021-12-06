<?php
require_once("../../global.php");
if(!isset($_SESSION['admin'])){
    header('location: ../../site/trang-chinh');
}

extract($_REQUEST);
if (exit_param("btn-add")) {
    // trang danh sach loai hang
    $VIEW_NAME = "add.php";
} elseif (exit_param("btn-update")) {
    $VIEW_NAME = "update.php";
} else {
    $VIEW_NAME = "list.php";
}
require_once("../layout.php");
?>

<script>
    document.querySelector('.san-pham').classList.add('active');
</script>