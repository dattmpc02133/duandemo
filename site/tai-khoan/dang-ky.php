<?php
require_once("../../global.php");
if (isset($_POST['add_kh'])) {
    $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL;
    $ma_kh = $_POST['ma_kh'];
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $dia_chi = $_POST['dia_chi'];
    $hinh = $_FILES['hinh']['name'];
    $email = $_POST['email'];
    $vai_tro = $_POST['vai_tro'];
    $kich_hoat = $_POST['kich_hoat'];
    move_uploaded_file($_FILES['hinh']['tmp_name'], "$path./images/user/$hinh");
    khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $dia_chi, $kich_hoat, $hinh, $email, $vai_tro);
    $_SESSION['alert'] = 'Đã thêm khách hàng !';
    echo "<script>
                 location.href = '../../index.php';
                  </script>";
} else {
    echo "<script> alert('thất bại'); </script>";
}
?>
<div class="container">
    <div class="dangky-product">
        <div class="header_dangky">
            <h3 style="text-align: center;">Tạo tài khoản</h3>
        </div>
        <form action="#" method="post" id="form_du_an" enctype="multipart/form-data">
            <div class="form-group">
                <label for=""><b>Tên đăng nhập *</b></label>
                <input type="text" class="form-control" name="ma_kh" id="ma_kh" aria-describedby="helpId" placeholder="Nhập tên đăng nhập">
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Mật khẩu *</b></label>
                <input type="password" class="form-control" name="mat_khau" id="mat_khau" aria-describedby="helpId" placeholder="Nhập mật khẩu">
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Họ tên *</b></label>
                <input type="text" class="form-control" name="ho_ten" id="ho_ten" aria-describedby="helpId" placeholder="Nhập họ tên khách hàng">
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Địa chỉ *</b></label>
                <input type="text" class="form-control" name="dia_chi" id="dia_chi" aria-describedby="helpId" placeholder="Nhập Địa chỉ">
                <span class="mess "></span>
            </div>
            <div class="form-group">
                <label for=""><b>Ảnh *</b></label>
                <input type="file" class="form-control-file" name="hinh" id="hinh" aria-describedby="fileHelpId">
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Email *</b></label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Nhập địa chỉ email khách hàng">
                <span class="mess"></span>
            </div>
            <div hidden class="form-group">
                <label for=""><b>Vai trò *</b></label>
                <div class="form-control-radio">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="1" checked>Khách
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="0">Quản trị
                        </label>
                    </div>
                </div>
            </div>
            <div hidden class="form-group">
                <label for=""><b>Kích hoạt *</b></label>
                <div class="form-control-radio">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="kich_hoat" id="kich_hoat" value="1" checked>Kích hoạt
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="kich_hoat" id="kich_hoat" value="0">Chưa kích hoạt
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="add_kh" class="btn btn-primary">Đăng ký</button>
                <button type="reset" name="reset_form_add_kh" class="btn btn-primary">Nhập lại</button>
            </div>
        </form>
    </div>
</div>