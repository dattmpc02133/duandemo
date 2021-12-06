<?php
if (isset($_GET['ma_km'])) {
    $ma_km_old = $_GET['ma_km'];
}
if (isset($_POST['btn_update1'])) {
    $ma_km = $_POST['ma_km'];
    $loai_km = $_POST['loai_km'];
    $muc_giam = $_POST['muc_giam'];
    $ma_loai_ap_dung = $_POST['ma_loai_ap_dung'];
    $ngay_bat_dau = $_POST['ngay_bat_dau'];
    $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
    ma_km_update($ma_km, $loai_km, $muc_giam, $ma_loai_ap_dung, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old);
    echo '<script>
            location.href = "index.php";
        </script>';
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
    </div>
    <div class="form-group">
        <label for="">Mã loại áp dụng:</label>
        <select name="ma_loai_ap_dung" id="ma_loai_ap_dung" class="form-control">
            <option value="<?=$ma_loai_ap_dung?>" selected><?php $ten_loai_ap_dung = loai_getinfo($ma_loai_ap_dung); echo $ten_loai_ap_dung['ten_loai'];?></option>
            <?php 
                $list_loai_sp = loai_sp_not_in_upkm($ma_loai_ap_dung);
                foreach($list_loai_sp as $loai_sp){
            ?>
            <option value="<?=$loai_sp['ma_loai']?>"><?=$loai_sp['ten_loai']?></option>
            <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Ngày bắt đầu:</label>
        <input type="date" class="form-control" name="ngay_bat_dau" id="ngay_bat_dau" value="<?= $ngay_bat_dau ?>">
    </div>
    <div class="form-group">
        <label for="">Ngày kết thúc:</label>
        <input type="date" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc" value="<?= $ngay_ket_thuc ?>">
    </div>
    <button class="btn btn-primary" type="submit" name="btn_update1">Cập Nhật</button>
    <a class="btn btn-primary" href="index.php?btn_list">Danh sách loại</a>
</form>