<?php
require_once("../../DAO/khach_hang.php");
require_once("../../DAO/loai.php");
require_once("../../DAO/pdo.php");
if (isset($_SESSION['user'])) {
    $info = get_info_kh($_SESSION['user']);
    extract($info);
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="box__img" align="center">
                <img class="card-img-top" src="<?= $CONTENT_URL ?>/images/user/<?= $hinh ?>" alt="" style="border:none  outline:none solid black;max-width:100%">
            </div>
            <div class="card-body">
                <h5 class="card-title text-center"><?= $ho_ten ?></h5>
                <p class="card-text">
                <ul class="list__administration" style="color: #62656e; list-style:none; padding:0px 10px; ">
                    <li><a href="<?= $SITE_URL ?>/tai-khoang/index.php?btn-doi-mk"> <i class="fas fa-exchange-alt account__chage"></i> Đổi mật khẩu</a></li>
                    <li><a href="<?= $SITE_URL ?>/tai-khoang/index.php?update_account&ma_kh=<?= $ma_kh ?>"> <i class="far fa-edit account__update "></i> Cập nhật tài khoản</a></li>
                    <?php
                    if ($vai_tro == 0) {
                        echo '
                        <li>  <i class="fas fa-cogs account__admin"></i> <a href="../../admin">Quản trị trang web</a></li>
                        ';
                    }
                    ?>
                    <li> <a href=" <?= $SITE_URL ?>/tai-khoang/dang-nhap.php?logout"><i class="fas fa-sign-out-alt account__logout "></i> Đăng Xuất</a></li>
                </ul>
                </p>
            </div>
        </div>
    </div>
</div>