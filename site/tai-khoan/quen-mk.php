<?php
require_once("../../DAO/pdo.php");
require_once("../../DAO/khach_hang.php");
if (isset($_POST['quen-mk'])) {
    $ma_kh = $_POST['username'];
    $email_kh = $_POST['email'];
    $info_kh = get_info_kh($_POST['username']);
    if ($info_kh) {
        extract($info_kh);
        if ($email_kh == $email) {
            echo "<h4 style='color: green;' > Mật khẩu của bạn là:  $mat_khau </h4> ";
        } else {
            echo "<span style='color: red;'> Sai địa chỉ email ! </span>";
        }
    } elseif (empty($ma_kh) || empty($email_kh)) {
        echo "<span style='color: red;'> Tên tài khoảng và địa chỉ email không được để trống ! </span>";
    } else {
        echo "<span style='color: red;'> tên tài khoảng không tồn tài </span>";
    }
}

?>

<div class="">
    <div class="card-header">
        <h3>Quên mật khẩu</h3>
    </div>
    <div class="card-body">
        <form action="<?= $SITE_URL ?>/tai-khoang/index.php?quen-mk" method="post">
            <div class="form-group" style="margin-top: 20px;">
                <!-- <label for="">Tên đăng nhập</label> -->
                <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Nhập tên tài khoảng">
            </div>
            <div class="form-group">
                <!-- <label for="">Email</label> -->
                <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Nhập địa chỉ email">
            </div>
            <div class="form-group">
                <input class="btn btn-info" type="submit" name="quen-mk" id="save_account" value="Lấy lại mật khẩu">
            </div>

        </form>
    </div>
</div>