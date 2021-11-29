<?php
if (isset($_POST['btn_add1'])) {
    $ma_km = $_POST['ma_km'];
    $mo_ta_km = $_POST['mo_ta_km'];
    $ngay_bat_dau = $_POST['ngay_bat_dau'];
    $ngay_ket_thuc = $_POST['ngay_ket_thuc'];

    ma_km_insert($ma_km, $mo_ta_km, $ngay_bat_dau, $ngay_ket_thuc);
    echo '<script>
            location.href = "index.php";
        </script>';
}
?>
<div class="title">
    <h3>THÊM MÃ KHUYẾN MÃI</h3>
</div>

<form action="index.php?btn_add" method="POST" enctype="multipart/form-data" id="form_du_an">
    <div class="form-group">
        <label for="">Mã khuyến mãi:</label>
        <input type="text" class="form-control" name="ma_km" placeholder="Nhập mã khuyến mãi">
    </div>
    <div class="form-group">
        <label for="">Mô tả khuyến mãi:</label>
        <input type="text" class="form-control" name="mo_ta_km" placeholder="Mô tả mã khuyến mãi">
    </div>
    <div class="form-group">
        <label for="">Ngày bắt đầu:</label>
        <input type="date" class="form-control" name="ngay_bat_dau" id="ngay_bat_dau">
    </div>
    <div class="form-group">
        <label for="">Ngày kết thúc:</label>
        <input type="date" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc">
    </div>
    <button class="btn btn-primary" type="submit" name="btn_add1">Thêm</button>
    <a class="btn btn-primary" href="index.php?btn_list">Danh sách loại</a>
</form>