<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/khach-hang.php");
require_once("../../DAO/loai.php");
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
                    setcookie('ma_kh', $_POST['username'], strtotime("+1 week"), '/');
                    setcookie('mat_khau', $_POST['password'], strtotime("+1 week"), '/');
                } else {
                    setcookie('ma_kh', $_POST['username'], strtotime("-1 week"), '/');
                    setcookie('mat_khau', $_POST['password'], strtotime("-1 week"), '/');
                }
                $_SESSION['user'] = $ma_kh;
               
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
        unset($_SESSION['user']);
        header("location: ../../index.php");
    }
}
