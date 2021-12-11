<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/loai.php");
require_once("../../DAO/san-pham.php");

$test = true;
$kt_loi = array();
if (isset($_POST['add'])) {
    if(empty($_POST['ten_sp'])){
        $kt_loi['ten_sp'] = 'Tên sản phẩm không được để trống';
        $test = false;
    }
    else if(empty($_POST['don_gia'])){
        $kt_loi['don_gia'] = 'Đơn giá không được để trống';
        $test = false;
    }
    else if($_POST['don_gia'] < 0){
        $kt_loi['don_gia'] = 'Đơn giá phải là số dương';
        $test = false;
    }
    else if($_POST['giam_gia'] < 0){
        $kt_loi['giam_gia'] = 'Giảm giá phải là số dương';
        $test = false;
    }
    else if($_POST['so_luong'] < 0){
        $kt_loi['so_luong'] = 'Số lượng phải là số dương';
        $test = false;
    }
    else{
        $test = true;
    }
    if($test){
        $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
        $ten_sp = $_POST['ten_sp'];
        $don_gia = $_POST['don_gia'];
        $giam_gia = $_POST['giam_gia'];
        // echo '<pre>';
        // print_r($_FILES);
        // die();

        $hinh_array = $_FILES['hinh'];
        if ($hinh_array['type'] == 'image/jpeg' || $hinh_array['type'] == 'image/jpg' || $hinh_array['type'] == 'image/png') {
            $hinh = save_file($hinh_array, $path);
        } else {
            echo "<script> alert('Ảnh không đúng định dạng: jpeg, jpg, png') </script>";
            echo "<script>
                        location.href = 'index.php?btn-add';
                </script>";
        }

    

        $so_luong = $_POST['so_luong'];
        $trang_thai = $_POST['trang_thai'];
        $dac_biet = $_POST['dac_biet'];
        $so_luot_xem = 0;
        $ma_loai = $_POST['ma_loai'];
        $mo_ta = $_POST['mo_ta'];
        san_pham_insert(
            $ten_sp,
            $don_gia,
            $giam_gia,
            $hinh,
            $so_luong,
            $trang_thai,
            $dac_biet,
            $so_luot_xem,
            $ma_loai,
            $mo_ta
        );
        // hình phụ
        // lấy mã sp cho hình phụ 
        // kết thúc hình phụ
        // header('location: index.php');
        $ma_sp_hinh_phu = ma_sp_hinh_phu();
        $hinh_phu = $_FILES['hinh_phu'];
        $hinh_phu_name = $hinh_phu['name'];
        extract($ma_sp_hinh_phu);
        foreach ($hinh_phu_name as $key => $value) { 
            move_uploaded_file($hinh_phu['tmp_name'][$key], $path . $value);
            product_hinh_phu($ma_sp ,$value);
        }
        echo "<script>
                    location.href = 'index.php';
            </script>";
    }
}
?>
<div class="title">
    <h3>THÊM SẢN PHẨM</h3>
</div>
<form action="" method="POST" enctype="multipart/form-data" id="form_du_an1" style="margin-bottom: 10px;" >
    <div class="form-group">
        <label for="">Tên sản phẩm:</label>
        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="ten_sp" id="ten_sp">
        <span class="errs">
            <?php 
                if(isset($kt_loi['ten_loai'])){
                    echo $kt_loi['ten_loai'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Đơn giá:</label>
        <input type="number" class="form-control" placeholder="Nhập đơn giá" name="don_gia" id="don_gia">
        <span class="errs">
            <?php 
                if(isset($kt_loi['don_gia'])){
                    echo $kt_loi['don_gia'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Giảm giá (%):</label>
        <input type="number" min="0" max="100" class="form-control" placeholder="Nhập đơn giá giảm" name="giam_gia" id="giam_gia">
        <span class="errs">
            <?php 
                if(isset($kt_loi['giam_gia'])){
                    echo $kt_loi['giam_gia'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Ảnh chính:</label>
        <input type="file" class="form-control-file" name="hinh" id="hinh" aria-describedby="fileHelpId">
    </div>
    <div class="form-group">
        <label for="">Ảnh phụ:</label>
        <input type="file" multiple="true" class="form-control-file" name="hinh_phu[]" id="hinh_phu" aria-describedby="fileHelpId">
    </div>
    <div class="form-group">
        <label for="">Số lượng:</label>
        <input type="number" class="form-control" placeholder="Nhập số lượng" name="so_luong" id="so_luong">
        <span class="errs">
            <?php 
                if(isset($kt_loi['so_luong'])){
                    echo $kt_loi['so_luong'];
                }
            ?>
        </span>
    </div>
    <!-- <div class="form-group">
        <label for="">Trạng thái</label>
        <select class="form-control" name="trang_thai" id="trang_thai">
            <option value="0">kích hoạt</option>
            <option value="1">chưa kích hoạt</option>
        </select>
    </div> -->
    <div class="form-group">
        <label for="">Trạng thái:</label>
        <div class="form-control-radio">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai" value="1" checked>Còn hàng
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai" value="0">Hết hàng
                </label>
            </div>
        </div>
    </div>
    <!-- <div class="form-group">
        <label for="dac_biet">Đặc biệt</label>
         <select name="dac_biet" id="dac_biet">
            <option value="0">SP thường</option>
            <option value="1">SP đặc biệt</option>
        </select>
    </div> -->
    <div class="form-group">
        <label for="">Đặc biệt:</label>
        <div class="form-control-radio">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="dac_biet" id="dac_biet" value="1">Đặc biệt
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="dac_biet" id="dac_biet" value="0" checked>Thường
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <select class="form-control" id="ma_loai" name="ma_loai">
            <?php
            $loai_sps = loai_selectall();
            foreach ($loai_sps as $loai) {
                extract($loai);
                echo '<option value="' . $ma_loai . '">' . $ten_loai . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Mô tả:</label>
        <textarea name="mo_ta"></textarea>
    </div>
    <button type="submit" name="add" id="add" class="btn btn-info">Thêm sản phẩm</button>
    <button type="reset" class="btn btn-info" name="nhap_lai">Nhập lại</button>
    <a href="index.php?btn_list" class="btn btn-info">Danh sách</a>
</form>