<?php 
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/san-pham.php");
if(isset($_POST['ten_sp'])){
    // $path =  $CONTENT_URL . '/images/products/';
    $path = $CONTENT_URL . '/images/products/';
    // $them_san_pham = $_POST['them_san_pham'];
    $ten_sp = $_POST['ten_sp'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $hinh = $_FILES['hinh'];
    $so_luong = $_POST['so_luong'];
    $trang_thai = $_POST['trang_thai'];
    $dac_biet = $_POST['dac_biet'];
    $luot_xem = $_POST['luot_xem'];
    $ma_loai = $_POST['ma_loai'];
    $hinh2 = save_file($hinh, $path);
    san_pham_insert(
        $ten_sp, 
        $don_gia, 
        $giam_gia, 
        $hinh2, 
        $so_luong, 
        $trang_thai, 
        $dac_biet, 
        $luot_xem, 
        $ma_loai);
} 

?>