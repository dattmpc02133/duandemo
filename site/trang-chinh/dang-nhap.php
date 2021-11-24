<?php
if (!isset($_SESSION['user'])) {
    require_once("dang-nhap-form.php");
} else {
    if (isset($_COOKIE['ma_kh']) && isset($_COOKIE['mat_khau'])) {
        // $ma_kh = get_cookie("ma_kh");
        // $mat_khau = get_cookie("mat_khau");
    }
    require_once("dang-nhap-info.php");
}

// session_destroy();
