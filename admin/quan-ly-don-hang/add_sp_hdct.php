<?php
    if(isset($_GET['ma_hd'])){
        $ma_hd = $_GET['ma_hd'];
    }

    if(isset($_POST['add_hdct'])){
        $ma_hd = $_POST['ma_hd'];
        $ma_sp = $_POST['ma_sp'];
        $gia_ban = $_POST['gia_ban'];
        $so_luong = $_POST['so_luong'];
        hoa_don_chi_tiet_insert($ma_hd, $ma_sp, $gia_ban, $so_luong);
        echo '<script> location.href = "index.php"; </script>';
    }
?>
<div class="title">
    <h3>THÊM CHI TIẾT HÓA ĐƠN</h3>
</div>

<form action="index.php?btn_add_sp_hdct" method="POST" id="form_du_an">
    <!-- <div class="form-group">
        <label for="">ID:</label>
        <input type="text" class="form-control" name="id" id="id">
    </div> -->
    <div class="form-group">
        <label for="">Mã hóa đơn:</label>
        <input type="text" class="form-control" value="<?=$ma_hd?>" name="ma_hd" id="ma_hd" readonly>
    </div>
    <div class="form-group">
        <label for="">Mã sản phẩm:</label>
        <select name="ma_sp" id="ma_sp" class="form-control">
            <?php 
                $list_sp = san_pham_selectall();
                foreach ($list_sp as $sp) {
                    extract($sp);
            ?>
            <option value="<?=$ma_sp?>"><?php echo $ma_sp.' ('.$ten_sp.')'; ?></option>
            <?php
                }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="">Giá bán:</label>
        <input type="number" class="form-control" name="gia_ban" id="gia_ban">
    </div>
    <div class="form-group">
        <label for="">Số lượng:</label>
        <input type="number" class="form-control" name="so_luong" id="so_luong" min=1>
    </div>
    <div class="btn__group">
        <button class="btn btn-info" type="submit" name="add_hdct">Thêm</button>
        <a class="btn btn-info" href="index.php?btn_list">Danh sách</a>
    </div>
</form>