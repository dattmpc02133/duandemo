<?php 
    if(isset($_GET['ma_hd'])){
        $ma_hd_update = $_GET['ma_hd'];
        $_SESSION['ma_hd'] = $ma_hd_update;
    }

    if(isset($_POST['update_hd'])){
        $ma_hd = $_POST['ma_hd'];
        $trang_thai = $_POST['trang_thai'];
        $dia_chi_giao_hang = $_POST['dia_chi_giao_hang'];
        hoa_don_update($dia_chi_giao_hang, $trang_thai, $ma_hd);
        unset($_SESSION['ma_hd']);
        echo '<script>
            location.href = "index.php";
        </script>';
    }
?>

<div class="title">
    <h3>CẬP NHẬT HÓA ĐƠN</h3>
</div>

<?php 
    $info = hoa_don_get_info($ma_hd);
    extract($info);
?>

<form action="index.php?btn_update_hd&ma_hd=<?=$_SESSION['ma_hd']?>" method="POST" id="form_du_an">
    <div class="form-group">
        <label for="">Mã hóa đơn:</label>
        <input type="text" class="form-control" value="<?= $ma_hd ?>" name="ma_hd" id="ma_hd" readonly>
    </div>
    <div class="form-group">
        <label for="">Mã khách hàng:</label>
        <input type="text" class="form-control" value="<?=$ma_kh?>" name="ma_kh" id="ma_kh" readonly>
    </div>
    <div class="form-group">
        <label for="">Tổng tiền:</label>
        <input type="number" class="form-control" value="<?= $tong_tien ?>" name="tong_tien" id="tong_tien" readonly>
    </div>
    <div class="form-group">
        <label for="">Địa chỉ giao hàng:</label>
        <input type="text" class="form-control" value="<?= $dia_chi_giao_hang ?>" name="dia_chi_giao_hang" id="dia_chi_giao_hang">
    </div>
    <div class="form-group">
        <label for="">Trạng thái:</label>
        <select class="form-control" name="trang_thai" id="">
            <option value="Chờ xử lý"><?= $trang_thai ?></option>
            <option value="Đã xác nhận đơn hàng">Đã xác nhận đơn hàng</option>
            <option value="Đang vận chuyển">Đang vận chuyển</option>
            <option value="Đã thanh toán">Đã thanh toán</option>
            <option value="Đã hủy">Đã hủy</option>
        </select>
       
        
    </div>
    <div class="btn__group">
        <button class="btn btn-info" type="submit" name="update_hd">Cập nhật</button>
        <a class="btn btn-info" href="index.php?btn_list">Danh sách</a>
    </div>
</form>