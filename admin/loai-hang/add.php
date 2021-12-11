<?php
require_once("../../DAO/pdo.php");
require_once("../../DAO/loai.php");
if (isset($_POST['btn_add'])) {
    $ten_loai = "";
    $test = true;
    $kt_loi = array();
    if (empty($_POST['ten_loai'])) {
        $kt_loi['ten_loai'] = "Tên loại không được để trống";
        $test = false;
    } 
    else if(ten_loai_exist($_POST['ten_loai'])){
        $kt_loi['ten_loai'] = "Tên loại đã được sử dụng";
        $test = false;
    }
    else if(!isset($_FILES['hinh'])){
        $kt_loi['hinh'] = "Vui lòng chọn hình";
        $test = false;
    }
    else {
        $test = true;
    }
    if ($test) {
        if (isset($_POST['btn_add'])) {
            $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
            $ten_loai = $_POST['ten_loai'];
            $hinh = $_FILES['hinh'];
            $tenhinh = save_file($hinh, $path);
            loai_insert($ten_loai, $tenhinh);
            echo "<script>
                     location.href = 'index.php';
           </script>";
        }
        else{
            echo "<script>alert('thất bại');</script>";
        }
    }
}
?>
<div class="title">
    <h3>THÊM LOẠI SẢN PHẨM</h3>
</div>
<div class="form__content">
    <form action="index.php?btn-add" method="POST" enctype="multipart/form-data" id="form_du_an">
        <div class="form-group">
            <label for="">Mã loại:</label>
            <input type="text" class="form-control" placeholder="Nhập tên hàng hóa" name="ma_loai" value="mã loại: auto" disabled>
        </div>
        <div class="form-group">
            <label for="">Tên loại:</label>
            <input type="text" class="form-control" placeholder="Nhập tên loại" name="ten_loai" id="ten_loai">
            <?php if (isset($kt_loi['ten_loai'])) { ?>
                    <span class="errs"> <?php echo $kt_loi['ten_loai'] ?> </span>
                <?php } ?>
        </div>
        <div class="form-group">
            <label for="">Ảnh:</label>
            <input type="file" class="form-control-file" name="hinh" id="hinh" aria-describedby="fileHelpId">
            <?php if (isset($kt_loi['hinh'])) { ?>
                    <span class="errs"> <?php echo $kt_loi['hinh'] ?> </span>
                <?php } ?>
        </div>
        <div class="btn__group">
            <button class="btn__group-item btn btn-primary" type="submit" name="btn_add">Thêm mới</button>
            <a class="btn__group-item btn btn-primary" href="index.php?btn_list">Danh sách</a>
        </div>
    </form>
</div>
</div>





<!--link đổi trang-->