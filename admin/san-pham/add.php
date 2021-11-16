<?php
require("../../DAO/san-pham.php");
require("../../DAO/pdo.php");
require("../../DAO/loai.php");
require_once("../../global.php");

if (isset($_POST['them_san_pham'])) {
    $ten_san_pham = "";
    $don_gia = "";
    $ngay_nhap = "";
    $hinh = "";
    $test = true;
    $kt_loi = array();

    if (empty($_POST['ten_san_pham'])) {
        $kt_loi['ten_san_pham'] = "Tên sản phẩm  không được bỏ trống !";
        $test =  false;
    } else {
        $ten_san_pham = $_POST['ten_san_pham'];
    }


    if (empty($_POST['don_gia'])) {
        $kt_loi['don_gia'] = "Đơn giá không được bỏ trống !";
        $test = false;
    } else {
        $don_gia = $_POST['don_gia'];
    }

    if (empty($_FILES['hinh']['name'])) {
        $kt_loi['hinh'] = "Hình không được bỏ trống !";
        $test = false;
    } else {
        $hinh = $_FILES['hinh']['name'];
    }

    if (empty($_POST['ngay_nhap'])) {
        $kt_loi['ngay_nhap'] = "Ngày nhập không được bỏ trống !";
        $test = false;
    } else {
        $ngay_nhap = $_POST['ngay_nhap'];
    }
    if ($test) {
        // echo "<script> alert('Thành công'); </script>";
        if (isset($_POST['them_hoang_hoa'])) {
            $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
            $them_hang_hoa = $_POST['them_hoang_hoa'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $don_gia = $_POST['don_gia'];
            $don_gia_giam = $_POST['don_gia_giam'];
            // $ten_hinh = $_POST['ten_hinh'];
            // $ten_hinh = $_FILES['hinh']['name'];
            $ten_hinh = $_FILES['hinh'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $description = $_POST['description'];
            $trang_thai = $_POST['trang_thai'];
            $trang_thai_db = $_POST['dac_biet'];
            $luot_xem = $_POST['luot_xem'];
            $ma_loai = $_POST['ma_loai'];
            $ten_hinh2 =  save_file($ten_hinh, $path);
            // move_uploaded_file($_FILES['hinh']['tmp_name'], "$path.$ten_hinh");
            // hang_hoa_insert($ten_san_pham, $don_gia, $don_gia_giam, $ten_hinh2, $ngay_nhap, $description, $trang_thai,  $trang_thai_db, $luot_xem, $ma_loai);
            header("location: index.php");
        }
    } else {
        echo "<script> alert('thất bại'); </script>";
    }
}




?>


<div class="row">
    <div class="col p-12 t-12 m-12">
        <h3 class="title__manager">Thêm sản phẩm</h3>
    </div>
</div>
<form action="index.php?btn_add" method="POST" enctype="multipart/form-data" id="form_du_an">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="ten_san_pham" id="ten_hh">
       
        <span class="mess "></span>
    </div>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="Nhập đơn giá" name="don_gia" id="don_gia">
       
        <span class="mess "></span>
    </div>
    <div class="form-group">
        <input type="number" min="0" max="100" class="form-control" placeholder="Nhập đơn giá giảm" name="don_gia_giam">
    </div>
    <div class="form-group">
        <label for=""><b>Ảnh *</b></label>
        <input type="file" class="form-control-file" name="hinh" id="hinh" aria-describedby="fileHelpId">
      
    </div>
    <div class="form-group">
        <label for="">Ngày nhập</label>
        <input type="date" class="form-control" placeholder="Ngày nhập kho" name="ngay_nhap" id="ngay_nhap_kho">
        <span class="mess "></span>
       
    </div>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="Nhập số lượng" name="so_luong" id="so_luong">
        <span class="mess "></span>
    </div>
    <textarea class="form-control" part="Nhập mô tả sản phẩm" name="description" id="mo_ta" rows="3"> </textarea>

    <div class="form-control form-group">
        <label for="">Trạng thái</label>
        <select name="trang_thai" id="trang_thai_san_pham">
            <option value="0">kích hoạt</option>
            <option value="1">chưa kích hoạt</option>
        </select>
        <!-- <input type="text" class="form-control" placeholder="Trạng thái của sản phẩm" name="trang_thai" id="trang_thai_san_pham"> -->
    </div>
    <div class="form-group">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="customRadio" name="dac_biet" value="1">
            <label class="custom-control-label" for="customRadio">Đặc biệt</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="customRadio2" name="dac_biet" checked value="0">
            <label class="custom-control-label" for="customRadio2">Bình Thường</label>
        </div>

    </div>
    <div class="form-group">
        <input type="number" class="form-control custom-file-input" value="0" readonly placeholder="số lượt xem" name="luot_xem">
    </div>

    <div class="form-group">
        <select class="form-control" id="sel1" name="ma_loai">
            <?php
            // $loai_hangs = loai_selectall();
            // foreach ($loai_hangs as $loai_hang) {
            //     extract($loai_hang);
            //     echo '<option value="' . $ma_loai . '">' . $ten_loai . '</option>';
            // }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-info" name="them_hoang_hoa">Thêm sản phẩm</button>
    <button type="reset" class="btn btn-info" name="nhap_lai">Nhập lại</button>
    <a href="index.php?btn_list" class="btn btn-info">Danh sách</a>
    <!-- <a href="index.php?btn_add" class="btn btn-primary">Thêm mới</a> -->
</form>





















<!-- <div class="row">
    <div class="col p-12 t-12 m-12">
        <h3 class="title__manager">Thêm hàng hóa</h3>
    </div>
</div>
<form action="index.php?btn_add" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Nhập tên hàng hóa" name="ten_san_pham">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="Nhập đơn giá" name="don_gia">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="Nhập đơn giá giảm" name="don_gia_giam">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Nhập tên hình" name="ten_hinh">
    </div>
    <div class="form-group">
        <input type="date" class="form-control" name="ngay_nhap">
    </div>
    <div class="form-group">
        <textarea cols="125" rows="5" placeholder="Nhập mô tả sản phẩm" name="description"></textarea>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Trạng thái của sản phẩm" name="trang_thai">
    </div>
    <div class="form-group">
        <input type="number" min="0" max="1" step="1" class="form-control" placeholder="Trạng thái đặc biệt" name="trang_thai_bd">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="số lượt xem" name="luot_xem">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Nhập mã loại" name="ma_loai">
    </div>
    <button type="submit" class="btn btn-primary" name="them_hoang_hoa">Thêm sản phẩm</button>
    <button type="reset" class="btn btn-primary" name="them_hoang_hoa">Nhập lại</button>
    <a href="index.php?btn_list" class="btn btn-primary">Danh sách</a>
    <a href="index.php?btn_add" class="btn btn-primary">Thêm mới</a>

</form> -->