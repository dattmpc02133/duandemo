<?php
require("../../DAO/pdo.php");
require("../../DAO/khach-hang.php");
$_SESSION['ma_kh'] = $_GET['ma_kh'];
if (isset($_POST['btn_update1'])) {  
        if (isset($_POST['btn_update1'])) {
            $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
            $ma_kh = $_POST['ma_kh'];
            $mat_khau = $_POST['mat_khau'];
            $ho_ten = $_POST['ho_ten'];
            $dia_chi=$_POST['dia_chi'];
            $kich_hoat=$_POST['kich_hoat'];
            if(strlen($_FILES['hinh1']['name'])>0){
                $hinh1 = $_FILES['hinh1'];
                $tenhinh = save_file($hinh1,$path);
            }
            else {
                $tenhinh = $_POST['hinh'];
            }
            $email=$_POST['email'];
            $vai_tro=$_POST['vai_tro'];
            khach_hang_update($mat_khau, $ho_ten, $dia_chi, $kich_hoat, $hinh, $email, $vai_tro, $ma_kh);
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
<form action="index.php?btn-update&ma_loai=<?= $_SESSION['ma_kh'] ?>" method="POST"enctype="multipart/form-data" id="form_du_an">
    <label>
        <h3>Cập nhật khách hàng</h3>
    </label>
    <div class="form-group">
        <label for="">Mã khách hàng:</label>
        <input type="text" class="form-control" readonly value="<?= $ma_kh ?>" name="ma_kh" id="ma_kh">
    </div>
    <div class="form-group">
        <label for="">Mật khẩu:</label>
        <input type="text" class="form-control" value="<?= $mat_khau ?>" name="mat_khau" id="mat_khau">
    </div>
    <div class="form-group">
        <label for="">Họ tên:</label>
        <input type="text" class="form-control" value="<?= $ho_ten ?>" name="ho_ten" id="ho_ten">
    </div>
    <div class="form-group">
        <label for="">Địa chỉ:</label>
        <input type="text" class="form-control" value="<?= $dia_chi ?>" name="dia_chi" id="dia_chi">
    </div>
    <div class="form-group">
        <label for="">Kích hoạt:</label>
        <div class="form-control-radio">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kich_hoat" id="kich_hoat" value="1" <?php 
                        if($kich_hoat==1){
                            echo 'checked';
                        }
                    ?>>Kích hoạt
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kich_hoat" id="kich_hoat" value="0"<?php 
                        if($kich_hoat==0){
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
        <input type="text" class="form-control" value="<?= $dia_chi ?>" name="dia_chi" id="dia_chi">
    </div>
    <div class="form-group">
        <label for="">Vai trò:</label>
        <div class="form-control-radio">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="0" <?php 
                        if($vai_tro==0){
                            echo 'checked';
                        }
                    ?>>Khách
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="1" <?php 
                        if($vai_tro==1){
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