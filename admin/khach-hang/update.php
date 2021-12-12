<?php
require_once("../../DAO/pdo.php");
require_once("../../DAO/khach-hang.php");
$_SESSION['ma_kh'] = $_GET['ma_kh'];
$test = true;
$kt_loi = array();
$check_ma_kh = '/^\D[a-zA-Z0-9_\.]{5,15}$/';
$check_hoten = '/^[\D\s]+$/';
$check_email = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
$check_sdt = '/^(0)([2-9])([0-9]+){8}$/';
if (isset($_POST['btn_update1'])) {
    if(empty($_POST['mat_khau'])){
        $kt_loi['mat_khau'] = 'Mật khẩu không được để trống';
        $test = false;
    }
    else if(strlen($_POST['mat_khau']) < 6){
        $kt_loi['mat_khau'] = 'Mật khẩu tối thiểu 6 ký tự';
        $test = false;
    }
    else if(empty($_POST['ho_ten'])){
        $kt_loi['ho_ten'] = 'Họ tên không được để trống';
        $test = false;
    }
    else if(!preg_match($check_hoten, $_POST['ho_ten'], $matches)){
        $kt_loi['ho_ten'] = 'Họ tên chỉ chứa chữ cái và khoảng trắng';
        $test = false;
    }
    else if(empty($_POST['dia_chi'])){
        $kt_loi['dia_chi'] = 'Địa chỉ không được để trống';
        $test = false;
    }
    else if(empty($_POST['email'])){
        $kt_loi['email'] = 'Email không được để trống';
        $test = false;
    }
    else if(isset($_POST['email'])){
        $email_old = email_kh_exist($_POST['email']);
        if($_POST['email'] != $email_old['email']){
            if(email_kh_exist($_POST['email'])){
                $kt_loi['email'] = 'Email đã được sử dụng';
                $test = false;
            }
        }
    }
    else if(!preg_match($check_email, $_POST['email'], $matches)){
        $kt_loi['email'] = 'Email không đúng định dạng, ví dụ: duandemo123@gmail.com';
        $test = false;
    }
    else if(empty($_POST['sdt_kh'])){
        $kt_loi['sdt_kh'] = 'Số điện thoại không được để trống';
        $test = false;
    }
    else if(!preg_match($check_sdt, $_POST['sdt_kh'], $matches)){
        $kt_loi['sdt_kh'] = 'Số điện thoại không đúng định dạng, ví dụ: 0946636844';
        $test = false;
    }
    else if(isset($_POST['sdt_kh'])){
        $sdt_kh_old = sdt_kh_exist($_POST['sdt_kh']);
        if($_POST['sdt_kh'] != $sdt_kh_old['sdt_kh']){
            if(sdt_kh_exist($_POST['sdt_kh'])){
                $kt_loi['sdt_kh'] = 'Số điện thoại đã được sử dụng';
                $test = false;
            }
        }
    }
    else{
        $test = true;
    }
    if ($test) {
        $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/user/';
        $ma_kh = $_POST['ma_kh'];
        $mat_khau = md5($_POST['mat_khau']);
        $ho_ten = $_POST['ho_ten'];
        $dia_chi = $_POST['dia_chi'];
        $kich_hoat = $_POST['kich_hoat'];
        if (strlen($_FILES['hinh1']['name']) > 0) {
            $hinh1 = $_FILES['hinh1'];
            $tenhinh = save_file($hinh1, $path);
        } else {
            $tenhinh = $_POST['hinh'];
        }
        $email = $_POST['email'];
        $sdt_kh = $_POST['sdt_kh'];
        $vai_tro = $_POST['vai_tro'];
        khach_hang_update($mat_khau, $ho_ten, $dia_chi, $kich_hoat, $tenhinh, $email, $sdt_kh, $vai_tro, $ma_kh);
        unset($_SESSION['ma_kh']);
        echo "<script> location.href = 'index.php'; </script>";
    } else {
        echo "<script> alert('thất bại'); </script>";
    }
}

// đổ dữ liệu
if (isset($_GET['ma_kh'])) {
    $ma_kh = $_GET['ma_kh'];
    $kh_update =  get_info_kh($ma_kh);
    extract($kh_update);
}

?>
<div class="title">
    <h3>CẬP NHẬT KHÁCH HÀNG</h3>
</div>
<form action="index.php?btn-update&ma_kh=<?= $_SESSION['ma_kh'] ?>" method="POST" enctype="multipart/form-data" id="form_du_an">
    <div class="form-group">
        <label for="">Mã khách hàng:</label>
        <input type="text" class="form-control" readonly value="<?= $ma_kh ?>" name="ma_kh" id="ma_kh">
    </div>
    <div class="form-group">
        <label for="">Mật khẩu:</label>
        <input type="text" class="form-control" value="<?= $mat_khau ?>" name="mat_khau" id="mat_khau">
        <span class="errs">
            <?php 
                if(isset($kt_loi['mat_khau'])){
                    echo $kt_loi['mat_khau'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Họ tên:</label>
        <input type="text" class="form-control" value="<?= $ho_ten ?>" name="ho_ten" id="ho_ten">
        <span class="errs">
            <?php 
                if(isset($kt_loi['ho_ten'])){
                    echo $kt_loi['ho_ten'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Địa chỉ:</label>
        <input type="text" class="form-control" value="<?= $dia_chi ?>" name="dia_chi" id="dia_chi">
        <span class="errs">
            <?php 
                if(isset($kt_loi['dia_chi'])){
                    echo $kt_loi['dia_chi'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Kích hoạt:</label>
        <div class="form-control-radio">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kich_hoat" id="kich_hoat" value="1" <?php
                                                                                                            if ($kich_hoat == 1) {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                            ?>>Kích hoạt
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kich_hoat" id="kich_hoat" value="0" <?php
                                                                                                            if ($kich_hoat == 0) {
                                                                                                                echo 'checked';
                                                                                                            }
                                                                                                            ?>>Khóa
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Ảnh:</label>
        <input type="file" class="form-control" name="hinh1" id="hinh1">
        <input type="text" class="form-control" readonly value="<?= $hinh ?>" name="hinh" id="hinh">
    </div>
    <div class="form-group">
        <label for="">Email:</label>
        <input type="text" class="form-control" value="<?= $email ?>" name="email" id="email">
        <span class="errs">
            <?php 
                if(isset($kt_loi['email'])){
                    echo $kt_loi['email'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Số điện thoại:</label>
        <input type="text" class="form-control" value="<?= $sdt_kh ?>" name="sdt_kh" id="sdt_kh">
        <span class="errs">
            <?php 
                if(isset($kt_loi['sdt_kh'])){
                    echo $kt_loi['sdt_kh'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Vai trò:</label>
        <div class="form-control-radio">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="0" <?php
                                                                                                        if ($vai_tro == 0) {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                        ?>>Khách
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="1" <?php
                                                                                                        if ($vai_tro == 1) {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                        ?>>Admin
                </label>
            </div>
        </div>
    </div>
    <div class="btn__group">
        <button class="btn btn-primary" type="submit" name="btn_update1">Cập Nhật</button>
        <a class="btn btn-primary" href="index.php?btn_list">Danh sách loại</a>
    </div>
</form>