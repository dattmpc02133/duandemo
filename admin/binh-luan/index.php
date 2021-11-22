<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/binh-luan.php");
// require_once("../../DAO/thong_ke_binh_luan.php");
extract($_REQUEST);
if (exit_param("btn_chitiet")) {
    $ma_sp = $_REQUEST['ma_sp'];
    $_SESSION['ma_sp'] =  $ma_sp;
    $items = bl_select_by_san_pham($_SESSION['ma_sp']);
    $VIEW_NAME = "detail.php";
} elseif (exit_param("btn_delete")) {
    $ma_bl = $_REQUEST['ma_bl'];
    $ma_sp = $_REQUEST['ma_sp'];
    try {
        bl_delete($ma_bl);
        $MESSAGE = "Xóa thành công!";
        header("location: index.php?btn_chitiet&ma_sp=" . $_SESSION['ma_sp']);
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
} else {
    // $items = thong_ke_binh_luan();
    $VIEW_NAME = "list.php";
}
require("../layout.php");
