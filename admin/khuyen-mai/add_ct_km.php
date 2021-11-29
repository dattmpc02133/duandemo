<?php
if (isset($_GET['ma_km'])) {
    $ma_km = $_GET['ma_km'];
}

if (isset($_POST['btn_add_ct'])) {
    $ma_km = $_POST['ma_km'];
    $ma_sp = $_POST['ma_sp'];

    ma_km_ct_insert($ma_km, $ma_sp);
    echo '<script>
            location.href = "index.php";
        </script>';
}
?>

<div class="title">
    <h3>THÊM SẢN PHẨM KHUYẾN MÃI</h3>
</div>

<form action="index.php?btn_add_ct" method="POST" enctype="multipart/form-data" id="form_du_an">
    <div class="form-group">
        <label for="">Mã khuyến mãi:</label>
        <input type="text" class="form-control" name="ma_km" placeholder="Nhập mã khuyến mãi" value="<?= $ma_km ?>" readonly>
    </div>
    <div class="form-group">
        <label for="">Mã sản phẩm:</label>
        <select name="ma_sp" id="ma_sp" class="form-control">
            <?php
            $list_sp_km = san_pham_selectall();
            foreach ($list_sp_km as $key) {
                extract($key);
            ?>
                <option value="<?= $ma_sp ?>"><?= $ten_sp ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit" name="btn_add_ct">Thêm</button>
    <a class="btn btn-primary" href="index.php?btn_list">Danh sách loại</a>
</form>