<?php
if (isset($_SESSION['ma_xac_nhan'])) {

    if (isset($_POST['btn-doi-mk'])) {
        $ma_xac_nhan = $_POST['ma_xac_nhan'];
        $doi_mk = md5($_POST['mat_khau_moi']);
        $xac_nhan_mk = md5($_POST['mat_khau_moi_xac_nhan']);
        if ($doi_mk == $xac_nhan_mk) {
            if ($ma_xac_nhan == $_SESSION['ma_xac_nhan']) {
                kh_update_mat_khau($doi_mk,$_SESSION['ma_kh_update']);
                echo "<script>
                            alert('Đổi mật khẩu thành công');
                          location.href = '$ROOT_URL';
                     </script>";
            } else {
                echo "<script>alert('Mã xác nhận sai')</script>"; 
            }
        } else {
            echo "<script>alert('mật khẩu xác nhận sai')</script>";
        }
    }
}

?>
<div class="container">
    <div class="dangky-product">
        <div class="header_dangky" role="alert">
            <h3 style="text-align: center;color:#fff;">Mật khẩu mới</h3>
        </div>
        
        <form action="#" method="post" id="form_du_an">
            <div class="form-group">
                <label for=""><b>Mã xác nhận *</b></label>
                <input type="text" class="form-control" name="ma_xac_nhan" id="ma_xac_nhan" aria-describedby="helpId" placeholder="Nhập mã xác nhận">
            </div>
            <div class="form-group">
                <label for=""><b>Mật khẩu mới *</b></label>
                <input type="password" class="form-control" name="mat_khau_moi" id="mat_khau_moi" aria-describedby="helpId" placeholder="Nhập mật khẩu mới">
                <?php if (isset($kt_loi['mat_khau_moi'])) { ?>
                    <span class="err"> <?php echo $kt_loi['mat_khau_moi'] ?> </span>
                <?php } ?>
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for=""><b>Xác nhận mật khẩu mới *</b></label>
                <input type="password" class="form-control" name="mat_khau_moi_xac_nhan" id="xac_nhan_mat_khau_moi" aria-describedby="helpId" placeholder="Xác nhận mật khẩu mới">
                <?php if (isset($kt_loi['mat_khau_moi_xac_nhan'])) { ?>
                    <span class="err"> <?php echo $kt_loi['mat_khau_moi_xac_nhan'] ?> </span>
                <?php } ?>
                <span class="mess "></span>
            </div>
            <div class="form-group">
                <button type="submit" name="btn-doi-mk" class="btn btn-primary">Đổi mật khẩu</button>
                <button type="reset" name="reset_form_add_kh" class="btn btn-primary">Nhập lại</button>
            </div>
            <!-- <div class="">
                    <p style="font-style: oblique; font-weight:500; ">Bạn sẽ đăng nhập lại sau khi đổi mật khẩu</p>
                </div> -->
        </form>
    </div>
</div>