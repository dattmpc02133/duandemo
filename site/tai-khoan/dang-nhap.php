<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/khach_hang.php");
extract($_REQUEST);
if (isset($_POST['login'])) {
    $ma_kh = $_POST['username'];
    $mat_khau = $_POST['password'];
    if (exit_param('login')) {
        $user =  get_info_kh($ma_kh);
        if ($user) {
            if ($user['mat_khau'] == $mat_khau) {
                $_SESSION['thong_bao'] = "Đăng nhập thành công";
                $_SESSION['user'] = $ma_kh;
                if (exit_param('save_account')) {
                    // add_cookie("ma_kh", $ma_kh, 30);
                    // add_cookie("mat_khau", $mat_khau, 30);
                    setcookie('ma_kh', $_POST['username'], strtotime("+1 week"), '/');
                    setcookie('mat_khau', $_POST['password'], strtotime("+1 week"), '/');
                } else {
                    setcookie('ma_kh', $_POST['username'], strtotime("-1 week"), '/');
                    setcookie('mat_khau', $_POST['password'], strtotime("-1 week"), '/');
                    // add_cookie("ma_kh", $ma_kh, -30);
                    // add_cookie("mat_khau", $mat_khau, -30);
                }
                $_SESSION['user'] = $ma_kh;
                // if ($user['vai_tro'] == 0) {
                //     header("location: ../../admin/");
                // } else {
                //     header("location:../../index.php");
                // }
                header("location:../../index.php");
            } else {
                $_SESSION['thong_bao'] = "Sai mật khẩu";
                header("location: ../../index.php");
            }
        } else {
            $_SESSION['thong_bao'] = "Sai tên tài khoảng";
            header("location: ../../index.php");
        }
    }
} else {
    if (exit_param("logout")) {
        session_unset();
        header("location: ../../index.php");
    }
}
