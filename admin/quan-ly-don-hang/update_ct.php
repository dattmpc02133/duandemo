<?php 
    if(isset($_GET['id'])){
        $id_hdct = $_GET['id'];
        $_SESSION['id'] = $id_hdct;
    }

    if(isset($_POST['update_hdct'])){
        $id = $_POST['id'];
        $ma_hd = $_POST['ma_hd'];
        $gia_ban = $_POST['gia_ban'];
        $so_luong_old = $_POST['so_luong_old'];
        $so_luong = $_POST['so_luong'];
        $tien_tru = $so_luong_old * $gia_ban;
        $thanh_tien = $gia_ban * $so_luong;
        update_tong_tien_hd($tien_tru, $thanh_tien, $ma_hd);
        hoa_don_chi_tiet_update($so_luong, $id);
        unset($_SESSION['id']);
        echo '
            <script>
                location.href = "index.php";
            </script>
        ';
    }
?>

<div class="title">
    <h3>CẬP NHẬT CHI TIẾT HÓA ĐƠN</h3>
</div>

<?php 
    $info = get_info_id_hdct($id_hdct);
    extract($info);
?>

<form action="index.php?btn_update_ct&id=<?=$_SESSION['id']?>" method="POST" id="form_du_an">
    <div class="form-group">
        <label for="">ID:</label>
        <input type="text" class="form-control" value="<?= $id ?>" name="id" id="id" readonly>
    </div>
    <div class="form-group">
        <label for="">Mã hóa đơn:</label>
        <input type="text" class="form-control" value="<?=$ma_hd?>" name="ma_hd" id="ma_hd" readonly>
    </div>
    <div class="form-group">
        <label for="">Mã sản phẩm:</label>
        <input type="text" class="form-control" value="<?= $ma_sp ?>" name="ma_sp" id="ma_sp" readonly>
    </div>
    <div class="form-group">
        <label for="">Giá bán:</label>
        <input type="number" class="form-control" value="<?= $gia_ban ?>" name="gia_ban" id="gia_ban" readonly>
    </div>
    <div class="form-group">
        <label for="">Số lượng:</label>
        <input type="number" class="form-control" value="<?= $so_luong ?>" name="so_luong" id="so_luong" min=1>
        <input style="display: none;" type="number" class="form-control" value="<?= $so_luong ?>" name="so_luong_old" min=1>
    </div>
    <div class="btn__group">
        <button class="btn btn-info" type="submit" name="update_hdct">Cập Nhật</button>
        <a class="btn btn-info" href="index.php?btn_list">Danh sách loại</a>
    </div>
</form>