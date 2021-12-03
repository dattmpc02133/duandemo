<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/binh-luan.php");
require_once("../../DAO/san-pham.php");
require_once("../../DAO/tin-tuc.php");
// require_once("../../DAO/thong_ke_binh_luan.php");
extract($_REQUEST);
if (exit_param("btn_chitiet")) {
    $ma_tin_tuc = $_REQUEST['ma_tin_tuc'];
    $_SESSION['ma_tin_tuc'] =  $ma_tin_tuc;
    $items =  bl_select_by_tin_tuc($_SESSION['ma_tin_tuc']);
    $VIEW_NAME = "detail.php";
} elseif (exit_param("btn_delete")) {
    $ma_bl = $_REQUEST['ma_bl'];
    $ma_tin_tuc = $_REQUEST['ma_tin_tuc'];
    try {
        bl_delete($ma_bl);
        $MESSAGE = "Xóa thành công!";
        header("location: index.php?btn_chitiet&ma_tin_tuc=" . $_SESSION['ma_tin_tuc']);
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
} elseif(exit_param("btn_update")){
    $VIEW_NAME = "update.php";
}
 else {
    // $items = thong_ke_binh_luan();
    $VIEW_NAME = "list.php";
}
require("../layout.php");
?>
<script>
    document.querySelector('.binh-luan-tin-tuc').classList.add('active');
</script>