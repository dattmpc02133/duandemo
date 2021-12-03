<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/san-pham.php");
require_once("../../DAO/khach-hang.php");
require_once("../../DAO/loai.php");
require_once("../../DAO/cart.php");
require_once("../../DAO/tin-tuc.php");
require_once("../../DAO/hoa-don.php");

// quét đánh giá kh
$kh_select_all = khach_hang_selectAll();
foreach ($kh_select_all as $kh) {
    $so_dh_huy = hoa_don_huy_by_kh($kh['ma_kh']);
    $so_don_thanh_cong = hoa_don_thanh_cong($kh['ma_kh']);
    if ($so_dh_huy  > 2) {
        $tong_hd = $so_dh_huy + $so_don_thanh_cong;
        $phan_tram_hoa_don = ($so_dh_huy * 100) / $tong_hd;
        if ($phan_tram_hoa_don >= 25) {
            update_danh_gia_kh($kh['ma_kh']);
        }
    }
}
// kiểm tra và cập nhật kích hoạt tài khoản
update_kich_hoat_kh();
extract($_REQUEST);
if (exit_param("dang_ky", $_REQUEST)) {
    $VIEW_NAME = "dang-ky.php";
} elseif (exit_param("gioi-thieu")) {
    $VIEW_NAME = "gioi-thieu.php";
} elseif (exit_param("chinh-sach-doi-tra")) {
    $VIEW_NAME = "chinh-sach-doi-tra.php";
} elseif (exit_param("chinh-sach-bao-mat")) {
    $VIEW_NAME = "chinh-sach-bao-mat.php";
} elseif (exit_param("dieu-khoang-dich-vu")) {
    $VIEW_NAME = "dieu-khoang-dich-vu.php";
} elseif (exit_param("tin-tuc")) {
    $VIEW_NAME = "tin-tuc.php";
} elseif (exit_param("lien-he")) {
    $VIEW_NAME = "lien-he.php";
} elseif (exit_param("addcart")) {
    $VIEW_NAME = "cart.php";
} else {
    // $VIEW_NAME = "../trang-chinh/cart.php";
    $VIEW_NAME = "../trang-chinh/home.php";
}
require("../layout.php");
