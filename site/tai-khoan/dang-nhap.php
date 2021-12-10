<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/khach-hang.php");
require_once("../../DAO/loai.php");
extract($_REQUEST);
if (isset($_POST['login'])) {

    $ma_kh = $_POST['username'];

    $mat_khau = md5($_POST['password']);
    if (exit_param('login')) {
        $user =  get_info_kh($ma_kh);

        if ($user) {         
            if ($user['mat_khau'] == $mat_khau) {

                if($user['kich_hoat'] == 0){
                    echo '<script> 
                             alert("Tài khoảng của bạn đã bị khóa");
                             location.href = "../../index.php";
                          </script>';
                } else{
                    
                $_SESSION['thong_bao'] = "<script> alert('Đăng nhập thành công'); </script>";
                $_SESSION['user'] = $ma_kh;
                if (exit_param('save_account')) {
                    setcookie('ma_kh', $_POST['username'], strtotime("+1 week"), '/');
                    setcookie('mat_khau', $_POST['password'], strtotime("+1 week"), '/');
                } else {
                    setcookie('ma_kh', $_POST['username'], strtotime("-1 week"), '/');
                    setcookie('mat_khau', $_POST['password'], strtotime("-1 week"), '/');
                }
                $_SESSION['user'] = $ma_kh;
                if($user['vai_tro'] == 1){
                    $_SESSION['admin'] = $ma_kh;
                }

                header("location: ../../index.php");
                }

            } 
            else {
                $_SESSION['thong_bao'] = "<script> alert('Sai tài mật khẩu'); </script>";
                header("location: ../../index.php");
            }
        } else {

            echo '<script> 
                    alert("Sai tên đăng nhập");    
                    location.href = "../../index.php";              
                 </script>';
           

        }
    }
} else {
    if (exit_param("logout")) {
        unset($_SESSION['user']);
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("location: ../../index.php");
    }
}
