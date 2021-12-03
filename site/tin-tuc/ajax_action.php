<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/binh-luan.php");
require_once("../../DAO/tin-tuc.php");

if(isset($_POST['noi_dung_gui_bl'])){  
    $ma_kh = $_POST['ma_kh'];
    $ma_tin_tuc = $_POST['ma_tin_tuc'];
    $noi_dung_bl = $_POST['noi_dung_gui_bl'];
    $ngay_bl = date_format(date_create(), 'Y-m-d');
    $trang_thai = "chưa kích hoạt";
    $ma_sp = null;
    bl_insert($ma_kh,$ma_sp,$ma_tin_tuc,$noi_dung_bl,$ngay_bl,$trang_thai);
}

if (isset($_POST['ma_tin_tuc'])) {
    $ma_tin_tuc = $_POST['ma_tin_tuc'];
    $bl_all_kich_hoat = bl_select_by_kh_va_tt_trang_thai1($ma_tin_tuc);

    foreach ($bl_all_kich_hoat as $bl_1) {
        extract($bl_1);
?>
        <div class="col-1 user_comment">
            <img src="../../content/images/user/<?= $hinh ?>" alt="" class="user_comment-img">
        </div>
        <div class="col-11 content_comment-moment">
            <p class="full_comment">
                <span class="user-tex">
                    <b><?= $ma_kh ?></b>
                    <br>
                </span>
                <?= $noi_dung ?>
            </p>
            <p class="block_like-comment">
                <!-- <a class="classnutdive" href=""><i class="fas fa-thumbs-up"></i> Like</a>
                <a class="classnutdive" href="">Trả lời</a>
                <a class="classnutdive" href="">Chia sẻ</a> -->
                <span class="time-com" style="color:#757575;font-size: 13px;"><?= $ngay_bl ?></span>
            </p>
        </div>
<?php
    }
}


?>