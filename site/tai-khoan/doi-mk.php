<?php
    if (isset($_POST['btn-doi-mk'])) {
        $ma_kh = $_POST['ma_kh'];
        $mat_khau = $_POST['mat_khau'];
        $mat_khau_1 = $_POST['mat_khau_1'];
        $mat_khau_moi = $_POST['mat_khau_moi'];

        if($mat_khau_1 == $mat_khau){
            kh_update_mat_khau($mat_khau_moi, $ma_kh);
            // $_SESSION['alert'] = 'Đổi mật khẩu thành công !';
            echo '<script> alert("Đổi mật khẩu thành công !"); </script>';
            echo "<script> location.href = 'dang-nhap.php?logout'; </script>";
        }
        else{
            echo '<script> alert("Đổi mật khẩu thất bại !"); </script>';
        }
    }

$info_kh = get_info_kh($_SESSION['user']);
extract($info_kh);

// kiểm form

?>
<div class="container-fluid" style="padding: 0 80px;">
<div class="row">
    <div class="col-3">
        <?php
            require_once('aside-menu.php');
        ?>
    </div>
    <div class="col-9">
        <div class="dangky-product">
            <div class="header_dangky" role="alert">
                <h3 style="text-align: center;color:#fff;">Đổi mật khẩu</h3>
            </div>
            <form action="#" method="post" enctype="multipart/form-data" id="form_du_an">
                <div class="form-group">
                    <label for=""><b>Tên tài khoản</b></label>
                    <input type="text" readonly class="form-control" name="ma_kh" id="" aria-describedby="helpId" value="<?= $ma_kh ?>">
                </div>
                <div class="form-group">
                    <label for=""><b>Mật khẩu hiện tại *</b></label>
                    <input type="password" class="form-control" name="mat_khau_1" id="mat_khau_1" aria-describedby="helpId" placeholder="Nhập mật khẩu hiện tại">
                    <input type="hidden" name="mat_khau" value="<?=$mat_khau?>">
                </div>
                <div class="form-group">
                    <label for=""><b>Mật khẩu mới *</b></label>
                    <input type="password" class="form-control" name="mat_khau_moi" id="mat_khau_moi" aria-describedby="helpId" placeholder="Nhập mật khẩu mới">                  
                </div>
                <div class="form-group">
                    <label for=""><b>Xác nhận mật khẩu mới *</b></label>
                    <input type="password" class="form-control" name="mat_khau_moi_xac_nhan" id="xac_nhan_mat_khau_moi" aria-describedby="helpId" placeholder="Xác nhận mật khẩu mới">
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