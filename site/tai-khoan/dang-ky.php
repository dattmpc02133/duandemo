<?php

require_once("../../global.php");
require_once '../../DAO/pdo.php';
require_once '../../DAO/khach-hang.php';
if (isset($_POST['add_kh'])) {
    $check_ma_kh = '/^\D[A-Za-z0-9_\.]{6,16}$/';
    $check_email = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $check_sdt_kh = '/^(0)([2-9])([0-9]+){8}$/';
    $check_hoten = '/^[\D\s]+$/';
    $test = true;
    $kt_loi = array();
    if (empty($_POST['ma_kh'])) {
        $kt_loi['ma_kh'] = "Tên đăng nhập không được bỏ trống !";
        $test = false;
    } else if (!preg_match($check_ma_kh, $_POST['ma_kh'], $matches)) {
        $kt_loi['ma_kh'] = "Tên đăng nhập không được bắt đầu bằng số và phải từ 6 - 16 ký tự !";
        $test = false;
    } else if (get_info_kh($_POST['ma_kh'])) {
        $kt_loi['ma_kh'] = "Tên đăng nhập đã tồn tại";
        $test = false;
    } else if (empty($_POST['sdt_kh'])) {
        $kt_loi['sdt_kh'] = "Số điện thoại không được bỏ trống";
        $test = false;
    } else if (!preg_match($check_sdt_kh, $_POST['sdt_kh'], $matches)) {
        $kt_loi['sdt_kh'] = 'Số điện thoại không đúng định dạng, ví dụ: 0946636844';
        $test = false;
    } else if (sdt_kh_exist($_POST['sdt_kh'])) {
        $kt_loi['sdt_kh'] = "Số điện thoại đã được sử dụng";
        $test = false;
    } else if (empty($_POST['xac_nhan_mat_khau'])) {
        $kt_loi['xac_nhan_mat_khau'] = "Mật khẩu xác nhận không được bỏ trống";
        $test = false;
    } else if (empty($_POST['mat_khau'])) {
        $kt_loi['mat_khau'] = "Mật khẩu không được bỏ trống !";
        $test = false;
    } else if (empty($_POST['ho_ten'])) {
        $kt_loi['ho_ten'] = "Họ Tên không được bỏ trống !";
        $test = false;
    } else if(!preg_match($check_hoten, $_POST['ho_ten'], $matches)){
        $kt_loi['ho_ten'] = "Họ tên chỉ chứa chữ và khoảng trắng";
        $test = false;
    }else if (empty($_POST['dia_chi'])) {
        $kt_loi['dia_chi'] = "Địa chỉ không được bỏ trống !";
        $test = false;
    } else if (empty($_POST['email'])) {
        $kt_loi['email'] = "Email không được để trống !";
        $test = false;
    } elseif (!preg_match($check_email, $_POST['email'], $matchs)) {
        $kt_loi['email'] = "Email không đúng định dạng ! Ví dụ: duandemo123@gmail.com";
        $test = false;
    } else if (email_kh_exist($_POST['email'])) {
        $kt_loi['email'] = "Email đã được sử dụng";
        $test = false;
    } else {
        $test = true;
    }
    if ($test) {
        if (isset($_POST['add_kh'])) {
            if ($xac_nhan_mat_khau == $mat_khau) {

                $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL;
                $ma_kh = $_POST['ma_kh'];
                $mat_khau = md5($_POST['mat_khau']);
                $ho_ten = $_POST['ho_ten'];
                $dia_chi = $_POST['dia_chi'];
                if ($_FILES['hinh']['name'] > 0) {
                    $hinh = $_FILES['hinh']['name'];
                    move_uploaded_file($_FILES['hinh']['tmp_name'], "$path./images/user/$hinh");
                } else {
                    $hinh = 'user.jpg';
                }
                $email = $_POST['email'];
                $sdt_kh = $_POST['sdt_kh'];
                $vai_tro = 0;
                $kich_hoat = 1;
                $danh_gia = 1;
                khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $dia_chi, $kich_hoat, $hinh, $email, $sdt_kh, $vai_tro, $danh_gia);
                echo "
                <div id='toast'>
                <div class='toast toast--success'>
                    <div class='toast__icon'>
                      <i class='far fa-check-circle'></i>
                    </div>
                    <div class='toast__body'>
                    <h3 class='toast__title'> Đăng ký tài khoản</h3>
                      <p class='toast__msg'>Chúc mừng bạn đã đăng ký tài khoản thành công</p>
                    </div>
                    <div class='toast__close'>
                      <i class='fas fa-times'></i>
                    </div>
                  </div>
                 </div>

                    <script>
                   
                    setTimeout(function(){
                        location.href = '../../index.php';
                    },3000)
                  </script>";
            } else {
                echo "<script>
                     alert('Nhập lại mật khẩu không trùng khớp');
                 </script>";
            }
        } else {
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
        <form action="#" method="POST" id="form_du_an" enctype="multipart/form-data">
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
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Xác nhận mật khẩu *</b></label>
                <input type="password" class="form-control" name="xac_nhan_mat_khau" id="xac_nhan_mat_khau" aria-describedby="helpId" placeholder="Xác nhận lại mật khẩu">
                <?php if (isset($kt_loi['xac_nhan_mat_khau'])) { ?>
                    <span class="err"> <?php echo $kt_loi['xac_nhan_mat_khau'] ?> </span>
                <?php } ?>
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Họ tên *</b></label>
                <input type="text" class="form-control" name="ho_ten" id="ho_ten" aria-describedby="helpId" placeholder="Nhập họ tên khách hàng">
                <?php if (isset($kt_loi['ho_ten'])) { ?>
                    <span class="err"> <?php echo $kt_loi['ho_ten'] ?> </span>
                <?php } ?>
                <span class="mess"></span>
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
            <div class="form-group">
                <button type="submit" name="add_kh" class="btn btn-primary">Đăng ký</button>
                <button type="reset" name="reset_form_add_kh" class="btn btn-primary">Nhập lại</button>
            </div>
        </form>
    </div>
</div>
