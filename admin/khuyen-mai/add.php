<?php
if (isset($_POST['btn_add1'])) {
    $ma_km = $_POST['ma_km'];
    $loai_km = $_POST['loai_km'];
    $muc_giam = $_POST['muc_giam'];
    $ma_loai_ap_dung = $_POST['ma_loai_ap_dung'];
    $ngay_bat_dau = $_POST['ngay_bat_dau'];
    $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
    ma_km_insert($ma_km, $loai_km, $muc_giam, $ma_loai_ap_dung, $ngay_bat_dau, $ngay_ket_thuc);
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
        <label for="">Loại khuyến mãi:</label>
        <select name="loai_km" id="loai_km" class="form-control">
            <option value="1">Giảm tiền hóa đơn</option>
            <option value="2">Giảm phần trăm hóa đơn</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Mức giảm:</label>
        <input type="number" class="form-control" name="muc_giam" placeholder="Nhập mức giảm">
    </div>
    <div class="form-group">
        <label for="">Loại sản phẩm áp dụng:</label>
        <select name="ma_loai_ap_dung" id="ma_loai_ap_dung" class="form-control">
            <?php $list_loai_sp = loai_selectall(); 
                foreach ($list_loai_sp as $key) {
                    extract($key);
            ?>
            <option value="<?=$ma_loai?>"><?=$ten_loai?></option>
            <?php
                }
            ?>
        </select>
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