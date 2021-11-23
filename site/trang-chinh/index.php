<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/san-pham.php");
require_once("../../DAO/loai.php");
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
} elseif (exit_param("cart")) {
    $VIEW_NAME = "cart.php";
} else {
    // $VIEW_NAME = "../trang-chinh/cart.php";
    $VIEW_NAME = "../trang-chinh/home.php";
}
require("../layout.php");
