<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/tin-tuc.php");
extract($_REQUEST);
if (exit_param("btn-add")) {
    // trang danh sach loai hang
    $VIEW_NAME = "add.php";
} elseif (exit_param("btn-update")) {
    $VIEW_NAME = "update-new.php";
} else {
    // $VIEW_NAME = "list.php";
    $VIEW_NAME = "list.php";
}
require("../layout.php");
?>

<script>
    document.querySelector('.tin-tuc').classList.add('active');
</script>