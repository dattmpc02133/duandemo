<?php
require_once("../../DAO/pdo.php");
require_once("../../global.php");
require_once("../../DAO/san-pham.php");
// require_once("../../DAO/binh-luan.php");
require_once("../../DAO/loai.php");
require_once("../../DAO/cart.php");
extract($_REQUEST);

// truy vấn hàng hóa theo loại

// $hang_hh =  hang_hoa_getinfo($ma_hh);
// extract($hang_hh);
// // tăng lượt xem lên 1

// hang_hoa_so_luot_luot_xem($ma_hh);
// // hàng cùng loại

// $hh_cung_loai = hang_hoa_select_by_loai($ma_loai);
// // bình luận 
// if (exit_param("noi_dung")) {
//     $noi_dung = $_POST['noi_dung'];
//     $ma_kh = $_SESSION['user'];
//     $ngay_bl = date_format(date_create(), 'Y-m-d');
//     binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
// }
// $binh_luan_list =  binh_luan_select_by_hang_hoa($ma_hh);
$VIEW_NAME = "san-pham/chi-tiet-ui.php";
require("../layout.php");
