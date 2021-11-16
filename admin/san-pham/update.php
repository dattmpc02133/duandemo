<?php
require("../../DAO/hang_hoa.php");
require("../../DAO/pdo.php");
require("../../DAO/loai.php");
require_once("../../global.php");
$_SESSION['ma_hh'] = $_GET['ma_hh'];


if (isset($_POST['btn_update'])) {
    $ten_hang_hoa = "";
    $don_gia = "";
    $ngay_nhap = "";
    $hinh = "";
    $test = true;
    $kt_loi = array();

    if (empty($_POST['ten_hang_hoa'])) {
        $kt_loi['ten_hang_hoa'] = "Tên hàng hóa không được bỏ trống !";
        $test =  false;
    } else {
        $ten_hang_hoa = $_POST['ten_hang_hoa'];
    }
    if (empty($_POST['don_gia'])) {
        $kt_loi['don_gia'] = "Đơn giá không được bỏ trống !";
        $test = false;
    } else {
        $don_gia = $_POST['don_gia'];
    }
    if (empty($_POST['ngay_nhap'])) {
        $kt_loi['ngay_nhap'] = "Ngày nhập không được bỏ trống !";
        $test = false;
    } else {
        $ngay_nhap = $_POST['ngay_nhap'];
    }
    if ($test) {
        // echo "<script> alert('Thành công'); </script>";
        if (isset($_POST['ma_hh'])) {
            // $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL;
            $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
            $ten_hh = $_POST['ten_hang_hoa'];
            $don_gia = $_POST['don_gia'];
            $giam_gia = $_POST['giam_gia'];
            // $hinh = $_POST['hinh'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['description'];
            $trang_thai = $_POST['trang_thai'];
            $dac_biet = $_POST['trang_thai_bd'];
            $so_luot_xem = $_POST['luot_xem'];
            $ma_loai = $_POST['ma_loai'];
            $ma_hh = $_POST['ma_hh'];

            if (strlen($_FILES['hinh_new']['name']) > 0) {
                $hinh = $_FILES['hinh_new'];
                $hinh2 =    save_file($hinh, $path);
                // move_uploaded_file($_FILES['hinh_new']['tmp_name'], "$path./images/products/$hinh");
            } else {
                $hinh2 = $_POST['hinh'];
            }
            update_hh(
                $ten_hh,
                $don_gia,
                $giam_gia,
                $hinh2,
                $ngay_nhap,
                $mo_ta,
                $trang_thai,
                $dac_biet,
                $so_luot_xem,
                $ma_loai,
                $ma_hh,
            );
            unset($_SESSION['ma_hh']);
            header("location: index.php");
        }
    } else {
        echo "<script> alert('thất bại'); </script>";
    }
}



if (isset($_GET['ma_hh'])) {
    $ma_hh = $_GET['ma_hh'];
    $hh_get_info =  hang_hoa_getinfo($ma_hh);
    extract($hh_get_info);
}
?>
<div class="row">
    <div class="col p-12 t-12 m-12">
        <h3 class="title__manager">Cập nhật hàng hóa</h3>
    </div>
</div>
<form action="index.php?btn_update&ma_hh=<?= $_SESSION['ma_hh'] ?>" method="POST" enctype="multipart/form-data" id="form_du_an">
    <div class="form-group">
        <input type="text" class="form-control" value="<?= $ten_hh ?>" name="ten_hang_hoa" id="ten_hh">
        <?php if (isset($kt_loi['ten_hang_hoa'])) { ?>
            <span class="err"> <?php echo $kt_loi['ten_hang_hoa'] ?> </span>
        <?php } ?>
        <span class="mess "></span>
    </div>
    <div class="form-group">
        <input type="number" class="form-control" value="<?= $don_gia ?>" name="don_gia" id="don_gia">
        <?php if (isset($kt_loi['don_gia'])) { ?>
            <span class="err"> <?php echo $kt_loi['don_gia'] ?> </span>
        <?php } ?>
        <span class="mess "></span>
    </div>
    <div class="form-group">
        <input type="number" class="form-control" value="<?= $giam_gia ?>" name="giam_gia">
    </div>
    <div class="form-group">
        <label for=""><b>Ảnh *</b></label>
        <input type="file" class="form-control-file" name="hinh_new" id="hinh_new" aria-describedby="fileHelpId">
        <input class="form-control" type="text" name="hinh" id="hinh" value="<?php echo $hinh ?>" readonly style="border: none; outline:none;">

    </div>
    <div class="form-group">
        <input type="date" class="form-control" value="<?= $ngay_nhap ?>" name="ngay_nhap">
        <?php if (isset($kt_loi['ngay_nhap'])) { ?>
            <span class="err"> <?php echo $kt_loi['ngay_nhap'] ?> </span>
        <?php } ?>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="description" id="description" rows="3"> <?= $mo_ta ?></textarea>
        <!-- <textarea cols="125" rows="5" name="description"> <?= $mo_ta ?> </textarea> -->
    </div>
    <div class="form-group">
        <label>Trạng thái</label>
        <input type="text" class="form-control" value="<?= $trang_thai ?>" name="trang_thai">
    </div>
    <div class="form-group">
        <label>Đặc biệt</label>
        <input type="number" min="0" max="1" step="1" class="form-control" value="<?= $dac_biet ?>" name="trang_thai_bd">
    </div>
    <div class="form-group">
        <label>Số lượt xem</label>
        <input type="number" class="form-control" value="<?= $so_luot_xem ?>" name="luot_xem">
    </div>
    <div class="form-group">
        <select class="form-control" id="sel1" name="ma_loai">
            <?php
            $loai_hangs = loai_selectall();
            foreach ($loai_hangs as $loai_hang) {
                extract($loai_hang);
                echo '<option value="' . $ma_loai . '">' . $ten_loai . '</option>';
            }
            ?>
        </select>
    </div>
    <input readonly type="text" class="form-control" value="<?= $ma_hh ?>" name="ma_hh">
    <button type="submit" class="btn btn-info" name="btn_update">Cập nhật sản phẩm</button>
    <a href="index.php?btn_list" class="btn btn-info">Danh sách</a>
    <a href="index.php?btn_add" class="btn btn-info">Thêm mới</a>
</form>