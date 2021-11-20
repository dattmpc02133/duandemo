<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
// require("../../DAO/binh-luan.php");
// require_once("../../DAO/thong_ke_binh_luan.php");
extract($_REQUEST);
if (exit_param("btn_chitiet")) {
    $ma_hh = $_REQUEST['ma_hh'];
    $_SESSION['ma_hh'] =  $ma_hh;
    // $items = binh_luan_select_by_hang_hoa($_SESSION['ma_hh']);
    $VIEW_NAME = "detail.php";
} elseif (exit_param("btn_delete")) {
    $ma_bl = $_REQUEST['ma_bl'];
    $ma_hh = $_REQUEST['ma_hh'];
    try {
        // binh_luan_delete($ma_bl);
        $MESSAGE = "Xóa thành công!";
        header("location: index.php?btn_chitiet&ma_hh=" . $_SESSION['ma_hh']);
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
} else {
    // $items = thong_ke_binh_luan();
    $VIEW_NAME = "list.php";
}
require("../layout.php");
