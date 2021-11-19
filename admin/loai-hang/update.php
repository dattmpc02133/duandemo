<?php
require("../../DAO/pdo.php");
require("../../DAO/loai.php");
$_SESSION['ma_loai'] = $_GET['ma_loai'];
if (isset($_POST['btn_update1'])) {  
        if (isset($_POST['btn_update1'])) {
            $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
            $ten_loai = $_POST['ten_loai'];
            $ma_loai = $_POST['ma_loai'];
            if(strlen($_FILES['hinh1']['name'])>0){
                $hinh1 = $_FILES['hinh1'];
                $tenhinh = save_file($hinh1,$path);
            }
            else {
                $tenhinh = $_POST['hinh'];
            }
            loai_update($ten_loai, $tenhinh,$ma_loai);
            unset($_SESSION['ma_loai']);
           echo "<script> location.href = 'index.php'; </script>";
        } else {
            echo "<script> alert('thất bại'); </script>";
        }
        }

// đổ dữ liệu
if (isset($_GET['ma_loai'])) {
    $ma_loai = $_GET['ma_loai'];
    $loai_update =  loai_getinfo($ma_loai);
    extract($loai_update);
}

?>
<div class="title">
    <h3>CẬP NHẬT LOẠI SẢN PHẨM</h3>
</div>

<form action="index.php?btn-update&ma_loai=<?= $_SESSION['ma_loai'] ?>" method="POST"enctype="multipart/form-data" id="form_du_an">
    <div class="form-group">
        <label for="">Mã loại:</label>
        <input type="text" class="form-control" readonly value="<?= $ma_loai ?>" name="ma_loai">
    </div>
    <div class="form-group">
        <label for="">Tên loại:</label>
        <input type="text" class="form-control" name="ten_loai" id="ten_loai" value="<?= $ten_loai  ?>">
    </div>
    <div class="form-group">
        <label for="">Ảnh:</label>
        <input type="file" class="form-control"  value="<?= $hinh ?>" name="hinh1">
        <input type="text" class="form-control" readonly value="<?= $hinh ?>" name="hinh">
    </div>
    <button class="btn btn-primary" type="submit" name="btn_update1">Cập Nhật</button>
    <a class="btn btn-primary" href="index.php?btn_list">Danh sách loại</a>
</form>