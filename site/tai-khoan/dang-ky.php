<?php
require_once("../../global.php");
if(isset($_POST['add_kh'])){
    $ma_kh = "";
    $mat_khau = "";
    $ho_ten = "";
    $check_email = '/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/';
    $test = true;
    $kt_loi = array();
if (empty($_POST['ma_kh'])) {
    $kt_loi['ma_kh'] = "Tên đăng nhập không được bỏ trống !";
    $test = false;
} else {
    $ma_kh = $_POST['ma_kh'];
}
if(empty($_POST['sdt_kh'])){
    $kt_loi['sdt_kh'] = "Số điện thoại không được bỏ trống";
    $test = false;
} else{
    $sdt_kh = $_POST['sdt_kh'];
}
if(empty($_POST['xac_nhan_mat_khau'])){
    $kt_loi['xac_nhan_mat_khau'] = "Mật khẩu xác nhận không được bỏ trống";
    $test = false;
} else{
    $xac_nhan_mat_khau = $_POST['xac_nhan_mat_khau'];
}
if (empty($_POST['mat_khau'])) {
    $kt_loi['mat_khau'] = "Mật khẩu không được bỏ trống !";
    $test = false;
} else {
    $mat_khau = $_POST['mat_khau'];
}

if (empty($_POST['ho_ten'])) {
    $kt_loi['ho_ten'] = "Họ Tên không được bỏ trống !";
    $test = false;
} else {
    $ho_ten = $_POST['ho_ten'];
}

if (empty($_POST['dia_chi'])) {
    $kt_loi['dia_chi'] = "Địa chỉ không được bỏ trống !";
    $test = false;
} else {
    $dia_chi = $_POST['dia_chi'];
}

if (empty($_FILES['hinh']['name'])) {
    $kt_loi['hinh'] = "Hình không được bỏ trống !";
    $test = false;
} else {
    $hinh = $_FILES['hinh']['name'];
}

if (empty($_POST['email'])) {
    $kt_loi['email'] = "Email không được để trống !";
    $test = false;
} elseif (!preg_match($check_email, $_POST['email'], $matchs)) {
    $kt_loi['email'] = "Vui lòng nhập đúng định dạng Email !";
    $test = false;
} else {
    $email = $_POST['email'];
}

if($test){
    if (isset($_POST['add_kh'])) {
        if($xac_nhan_mat_khau == $mat_khau){

            $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL;
            $ma_kh = $_POST['ma_kh'];
            $mat_khau = md5($_POST['mat_khau']);
            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $hinh = $_FILES['hinh']['name'];
            $email = $_POST['email'];
            $sdt_kh = $_POST['sdt_kh'];
            $vai_tro = $_POST['vai_tro'];
            $kich_hoat = $_POST['kich_hoat'];
            move_uploaded_file($_FILES['hinh']['tmp_name'], "$path./images/user/$hinh");
            khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $dia_chi, $kich_hoat, $hinh, $email,$sdt_kh, $vai_tro);
            echo "<script>
                    alert('Đăng ký tài khoảng thành công');
                    location.href = '../../index.php';
                  </script>";
        } else{
            echo "<script>
                     alert('Nhập lại mật khẩu không trùng khớp');
                 </script>";
        }

    }else{
        echo "<script>
                location.href = '../../index.php';
              </script>";
    }
}
}

// else {
//     echo "<script> alert('thất bại'); </script>";
// }
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
                <?php if (isset($kt_loi['ma_kh'])) { ?>
                        <span class="err"> <?php echo $kt_loi['ma_kh'] ?> </span>
                    <?php } ?>
                    <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Mật khẩu *</b></label>
                <input type="password" class="form-control" name="mat_khau" id="mat_khau" aria-describedby="helpId" placeholder="Nhập mật khẩu">
                <?php if (isset($kt_loi['mat_khau'])) { ?>
                        <span class="err"> <?php echo $kt_loi['mat_khau'] ?> </span>
                    <?php } ?>
            </div>
            <div class="form-group">
                <label for=""><b>Xác nhân mật khẩu *</b></label>
                <input type="password" class="form-control" name="xac_nhan_mat_khau" id="xac_nhan_mat_khau" aria-describedby="helpId" placeholder="Xác nhận lại mật khẩu">
                <?php if (isset($kt_loi['xac_nhan_mat_khau'])) { ?>
                        <span class="err"> <?php echo $kt_loi['xac_nhan_mat_khau'] ?> </span>
                    <?php } ?>
            </div>
            <div class="form-group">
                <label for=""><b>Họ tên *</b></label>
                <input type="text" class="form-control" name="ho_ten" id="ho_ten" aria-describedby="helpId" placeholder="Nhập họ tên khách hàng">
                <?php if (isset($kt_loi['ho_ten'])) { ?>
                        <span class="err"> <?php echo $kt_loi['ho_ten'] ?> </span>
                    <?php } ?>
            </div>
            <div class="form-group">
                <label for=""><b>Địa chỉ *</b></label>
                <input type="text" class="form-control" name="dia_chi" id="dia_chi" aria-describedby="helpId" placeholder="Nhập Địa chỉ">
                <?php if (isset($kt_loi['dia_chi'])) { ?>
                        <span class="err"> <?php echo $kt_loi['dia_chi'] ?> </span>
                    <?php } ?>
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
                <?php if (isset($kt_loi['email'])) { ?>
                        <span class="err"> <?php echo $kt_loi['email'] ?> </span>
                    <?php } ?>
                    <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Điện thoại *</b></label>
                <input type="text" class="form-control" name="sdt_kh" id="sdt_kh" aria-describedby="helpId" placeholder="Nhập số điện thoại">
                <?php if (isset($kt_loi['sdt_kh'])) { ?>
                        <span class="err"> <?php echo $kt_loi['sdt_kh'] ?> </span>
                    <?php } ?>
                    <span class="mess"></span>
            </div>
            <div hidden class="form-group">
                <label for=""><b>Vai trò *</b></label>
                <div class="form-control-radio">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="0" checked>Khách
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="1">Quản trị
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
