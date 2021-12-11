<?php
if (isset($_GET['ma_km'])) {
    $ma_km_old = $_GET['ma_km'];
}
if (isset($_POST['btn_update1'])) {
    $test = true;
    $kt_loi = array();
    if(empty($_POST['ma_km'])){
        $kt_loi['ma_km'] = 'Mã khuyến mãi không được để trống';
        $test = false;
    }
    else if(empty($_POST['muc_giam'])){
        $kt_loi['muc_giam'] = 'Mức giảm không được để trống';
        $test = false;
    }
    else if($_POST['muc_giam'] < 0){
        $kt_loi['muc_giam'] = 'Mức giảm phải là số dương';
        $test = false;
    }
    else if(empty($_POST['ngay_bat_dau'])){
        $kt_loi['ngay_bat_dau'] = 'Ngày bắt đầu không được để trống';
        $test = false;
    }
    else if(empty($_POST['ngay_ket_thuc'])){
        $kt_loi['ngay_ket_thuc'] = 'Ngày kết thúc không được để trống';
        $test = false;
    }
    else{
        $test = true;
    }
    if($test){
        $ma_km = $_POST['ma_km'];
        $loai_km = $_POST['loai_km'];
        $muc_giam = $_POST['muc_giam'];
        $ngay_bat_dau = $_POST['ngay_bat_dau'];
        $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
        ma_km_update($ma_km, $loai_km, $muc_giam, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old);
        echo '<script>
                location.href = "index.php";
            </script>';
    }
}

$km = ma_km_get_info($ma_km_old);
extract($km);
?>
<div class="title">
    <h3>CẬP NHẬT MÃ KHUYẾN MÃI</h3>
</div>

<form action="index.php?btn_update&ma_km=<?= $ma_km_old ?>" method="POST" enctype="multipart/form-data" id="form_du_an">
    <div class="form-group">
        <label for="">Mã khuyến mãi:</label>
        <input type="text" class="form-control" value="<?= $ma_km ?>" name="ma_km">
        <span class="errs">
            <?php 
                if(isset($kt_loi['ma_km'])){
                    echo $kt_loi['ma_km'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Loại khuyến mãi:</label>
        <select name="loai_km" id="loai_km" class="form-control">
            <option value="<?=$loai_km?>" selected><?php $ten_loai_km = loai_km_get_in4($loai_km); echo $ten_loai_km['ten_loai_km'];?></option>
            <?php  
                $list_loai_km = loai_km_get_not_in($loai_km); 
                foreach ($list_loai_km as $loai_km) {
            ?>
            <option value="<?=$loai_km['ma_loai_km']?>"><?=$loai_km['ten_loai_km']?></option>
            <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Mức giảm:</label>
        <input type="text" class="form-control" name="muc_giam" id="muc_giam" value="<?= $muc_giam ?>">
        <span class="errs">
            <?php 
                if(isset($kt_loi['muc_giam'])){
                    echo $kt_loi['muc_giam'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Ngày bắt đầu:</label>
        <input type="date" class="form-control" name="ngay_bat_dau" id="ngay_bat_dau" value="<?= $ngay_bat_dau ?>">
        <span class="errs">
            <?php 
                if(isset($kt_loi['ngay_bat_dau'])){
                    echo $kt_loi['ngay_bat_dau'];
                }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Ngày kết thúc:</label>
        <input type="date" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc" value="<?= $ngay_ket_thuc ?>">
        <span class="errs">
            <?php 
                if(isset($kt_loi['ngay_ket_thuc'])){
                    echo $kt_loi['ngay_ket_thuc'];
                }
            ?>
        </span>
    </div>
    <button class="btn btn-primary" type="submit" name="btn_update1">Cập Nhật</button>
    <a class="btn btn-primary" href="index.php?btn_list">Danh sách loại</a>
</form>