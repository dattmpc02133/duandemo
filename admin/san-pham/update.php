<?php
require("../../DAO/san-pham.php");
require("../../DAO/pdo.php");
require("../../DAO/loai.php");
require_once("../../global.php");
$_SESSION['ma_sp'] = $_GET['ma_sp'];
if (isset($_POST['btn_update1'])) {
    $ten_sp = "";
    $don_gia = "";
    $test = true;
    $kt_loi = array();

    if (empty($_POST['ten_sp'])) {
        $kt_loi['ten_sp'] = "Tên hàng hóa không được bỏ trống !";
        $test =  false;
    } else {
        $ten_sp = $_POST['ten_sp'];
    }
    if (empty($_POST['don_gia'])) {
        $kt_loi['don_gia'] = "Đơn giá không được bỏ trống !";
        $test = false;
    } else {
        $don_gia = $_POST['don_gia'];
    }
   
    if ($test) {
        if (isset($_POST['ma_sp'])) {
            $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
            $ten_sp = $_POST['ten_sp'];
            $don_gia = $_POST['don_gia'];
            $giam_gia = $_POST['giam_gia'];
            $so_luong = $_POST['so_luong'];
            $trang_thai = $_POST['trang_thai'];
            $dac_biet = $_POST['dac_biet'];
            $so_luot_mua = $_POST['so_luot_mua'];
            $ma_loai = $_POST['ma_loai'];
            $mo_ta = $_POST['mo_ta'];
            $ma_sp = $_POST['ma_sp'];
            if (strlen($_FILES['hinh_new']['name']) > 0) {
                $hinh = $_FILES['hinh_new'];
                $hinh2 = save_file($hinh, $path);
            } else {
                $hinh2 = $_POST['hinh'];
            }
            update_sp(
                $ten_sp, 
                $don_gia, 
                $giam_gia, 
                $hinh2,
                $so_luong,
                $trang_thai,
                $dac_biet, 
                $so_luot_mua, 
                $ma_loai,
                $mo_ta ,
                $ma_sp);
// hình phụ 
                if(!empty($_FILES['hinh_phu'])){
                    hinh_phu_delete($ma_sp);
                    $hinh_phu = $_FILES['hinh_phu'];
                    $hinh_phu_name = $hinh_phu['name'];                
                    foreach ($hinh_phu_name as $key => $value) { 
                        move_uploaded_file($hinh_phu['tmp_name'][$key], $path . $value);
                        product_hinh_phu($ma_sp ,$value);
                       
                    }    
                }  
            unset($_SESSION['ma_sp']);
            // header("location: index.php");
            echo "<script>
                  location.href = 'index.php';
               </script>";
        }
    } else {
        echo "<script> alert('thất bại'); </script>";
    }
}

if (isset($_GET['ma_sp'])) {
    $ma_sp = $_GET['ma_sp'];
    $sp_get_info = san_pham_getinfo($ma_sp);
    extract($sp_get_info);
}
?>
<div class="title">
    <h3>CẬP NHẬT SẢN PHẨM</h3>
</div>
<form action="index.php?btn-update&ma_sp=<?= $_SESSION['ma_sp'] ?>" method="POST" enctype="multipart/form-data" id="form_du_an">
    <div class="form-group">
      <label for="">Mã sản phẩm:</label>
      <input type="text" class="form-control" name="ma_sp" id="ma_sp" placeholder="" value="<?=$ma_sp?>" readonly>
    </div>
    <div class="form-group">
        <label for="">Tên sản phẩm:</label>
        <input type="text" class="form-control" value="<?= $ten_sp ?>" name="ten_sp" id="ten_sp">
        <?php if (isset($kt_loi['ten_sp'])) { ?>
            <span class="err"> <?php echo $kt_loi['ten_sp'] ?> </span>
        <?php } ?>
        <span class="mess "></span>
    </div>
    <div class="form-group">
        <label for="">Đơn giá:</label>
        <input type="number" class="form-control" value="<?= $don_gia ?>" name="don_gia" id="don_gia" min=0>
        <?php if (isset($kt_loi['don_gia'])) { ?>
            <span class="err"> <?php echo $kt_loi['don_gia'] ?> </span>
        <?php } ?>
        <span class="mess "></span>
    </div>
    <div class="form-group">
        <label for="">Giảm giá (%):</label>
        <input type="number" class="form-control" value="<?=$giam_gia?>" name="giam_gia" min=0>
    </div>
    <div class="form-group">
        <label for="">Số lượng:</label>
        <input type="number" class="form-control" value="<?=$so_luong?>" name="so_luong">
    </div>
    <div class="form-group">
        <label for="">Ảnh chính:</label>
        <input type="file" class="form-control-file" name="hinh_new" id="hinh_new" aria-describedby="fileHelpId">
        <input class="form-control"type="text" name="hinh" id="hinh" value="<?php echo $hinh ?>" readonly style="border: none; outline:none;">
    </div>
    <div class="form-group">
        <label for="">Ảnh phụ:</label>
        <input type="file" class="form-control-file" name="hinh_phu[]" id="hinh_phu" multiple="true" aria-describedby="fileHelpId">           
    </div>
    <?php 
        $hinh_phu = select_hinh_phu($ma_sp);
        foreach($hinh_phu as $key){
            extract($key);   
    ?>
        <img style="width:100px" src="../../content/images/products/<?= $hinh_phu ?>" alt="">
    <?php 
        }
    ?>
    <div class="form-group">
        <label for="">Trạng thái:</label>
        <div class="form-control-radio">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai" value="1" <?php 
                        if($trang_thai==1){
                            echo 'checked';
                        }
                    ?>>Còn hàng
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai" value="0"<?php 
                        if($trang_thai==0){
                            echo 'checked';
                        }
                    ?>>Hết hàng
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Đặc biệt:</label>
        <div class="form-control-radio">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="dac_biet" id="dac_biet" value="1" <?php 
                        if($dac_biet==1){
                            echo 'checked';
                        }
                    ?>>Đặc biệt
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="dac_biet" id="dac_biet" value="0"<?php 
                        if($dac_biet==0){
                            echo 'checked';
                        }
                    ?>>Thường
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Số lượt mua:</label>
        <input type="number" class="form-control" value="<?= $so_luot_mua ?>" name="so_luot_mua">
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
    <div class="form-group">
       <textarea name="mo_ta"> <?=  $mo_ta ?> </textarea>
    </div>
    <div class="btn__group">
        <button type="submit" class="btn btn-info" name="btn_update1">Cập nhật sản phẩm</button>
        <a href="index.php" class="btn btn-info">Danh sách</a>
        <a href="index.php?btn-add" class="btn btn-info">Thêm mới</a>
    </div>
</form>