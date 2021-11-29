<?php
if (isset($_GET['ma_km'])) {
    $ma_km_old = $_GET['ma_km'];
}
if (isset($_POST['btn_update1'])) {
    $ma_km = $_POST['ma_km'];
    $mo_ta_km = $_POST['mo_ta_km'];
    $ngay_bat_dau = $_POST['ngay_bat_dau'];
    $ngay_ket_thuc = $_POST['ngay_ket_thuc'];

    ma_km_update($ma_km, $mo_ta_km, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old);
    echo '<script>
            location.href = "index.php";
        </script>';
}

$km = ma_km_get_info($ma_km);
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
        <label for="">Mô tả khuyến mãi:</label>
        <input type="text" class="form-control" name="mo_ta_km" id="mo_ta_km" value="<?= $mo_ta_km ?>">
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