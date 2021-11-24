<?php
if (isset($_POST['btn-doi-mk'])) {
    $mat_khau = "";
    $mat_khau_moi = "";
    $mat_khau_moi_xac_nhan = "";
    $test = true;
    $kt_loi = array();
    // kiểm tra xác nhận mật khẩu trùng khớp 
    if (empty($_POST['mat_khau_moi'])) {
        $kt_loi['mat_khau_moi'] = 'Mật khẩu mới không được để trống !';
        $test = false;
    } else {
        $mat_khau_moi = $_POST['mat_khau_moi'];
    }
    if (empty($_POST['mat_khau_moi_xac_nhan'])) {
        $kt_loi['mat_khau_moi_xac_nhan'] = 'Xác nhận không được để trống !';
        $test = false;
    } else {
        $mat_khau_moi_xac_nhan = $_POST['mat_khau_moi_xac_nhan'];
    }
    if ($mat_khau_moi_xac_nhan != $mat_khau_moi) {
        $kt_loi['mat_khau_moi_xac_nhan'] = "Mật khẩu không khớp, vui lòng kiểm tra lại !";
        $test = false;
    }
    if (empty($_POST['mat_khau'])) {
        $kt_loi['mat_khau'] = "Mật khẩu không được bỏ trống !";
        $test = false;
    } else {
        $don_gia = $_POST['mat_khau'];
    }
    if ($test) {
        // xử lý dữ liệu
        // update khách hàng
        if (isset($_POST['btn-doi-mk'])) {
            // xử lý dữ liệu
            // update khách hàng
            $ma_kh = $_POST['ma_kh'];
            $mat_khau_moi = $_POST['mat_khau_moi'];
            $ho_ten = $_POST['ho_ten'];
            kh_update_mat_khau($mat_khau_moi, $ma_kh);
            $_SESSION['alert'] = 'Đã cập nhật khách hàng !';
            unset($_SESSION['user']);
            echo "<script> location.href = '../../index.php'; </script>";
            // header('location: ../../index.php');
        }
    } else {
        echo "<script> alert('thất bại'); </script>";
    }
}

$info_kh = get_info_kh($_SESSION['user']);
extract($info_kh);

// kiểm form

?>
<div class="container-fluid" style="padding: 0 80px;">
<div class="row">
    <div class="col-5">
        <?php
            require_once('aside-menu.php');
        ?>
    </div>
    <div class="col-7">
        <div class="dangky-product" style="width:80%;">
            <div class="header_dangky" role="alert">
                <h3 style="text-align: center;">Đổi mật khẩu</h3>
            </div>
            <form action="index.php?btn-doi-mk&ma_kh<?= $_SESSION['user'] ?>" method="post" enctype="multipart/form-data" id="form_du_an">
                <div class="form-group">
                    <label for=""><b>Tên tài khoản</b></label>
                    <input type="text" readonly class="form-control" name="ma_kh" id="ho_ten" aria-describedby="helpId" value="<?= $ma_kh  ?>">
                    
                </div>
                <div class="form-group">
                    <label for=""><b>Mật khẩu cũ *</b></label>
                    <input type="password" class="form-control" name="mat_khau" id="mat_khau" aria-describedby="helpId" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group">
                    <label for=""><b>Mật khẩu mới *</b></label>
                    <input type="password" class="form-control" name="mat_khau_moi" id="mat_khau_moi" aria-describedby="helpId" placeholder="Nhập mật khẩu mới">
                   
                </div>
                <div class="form-group">
                    <label for=""><b>Xác nhận mật khẩu mới *</b></label>
                    <input type="password" class="form-control" name="mat_khau_moi_xac_nhan" id="xac_nhan_mat_khau_moi" aria-describedby="helpId" placeholder="Xác nhận mật khẩu">
                </div>
                <div class="form-group">
                    <button type="submit" name="btn-doi-mk" class="btn btn-primary">Đổi mật khẩu</button>
                    <button type="reset" name="reset_form_add_kh" class="btn btn-primary">Nhập lại</button>
                </div>
                <div class="">
                    <p style="font-style: oblique; font-weight:500; ">Bạn sẽ đăng nhập lại sau khi đổi mật khẩu</p>
                </div>
            </form>
        </div>
    </div>
</div>
</div>