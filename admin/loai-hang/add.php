<?php
require("../../DAO/pdo.php");
require("../../DAO/loai.php");
    if (isset($_POST['btn_add'])) {
        $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
        $ten_loai = $_POST['ten_loai'];
        $hinh = $_FILES['hinh'];
        $tenhinh = save_file($hinh, $path);
        loai_insert($ten_loai, $tenhinh);
        header('location: index.php');
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
            </div>
            <div class="form-group">
                <label for="">Ảnh:</label>
                <input type="file" class="form-control-file" name="hinh" id="hinh" aria-describedby="fileHelpId">
            </div>
            <div class="btn__group">
                <button class="btn__group-item btn btn-primary" type="submit" name="btn_add">Thêm mới</button>
                <a class="btn__group-item btn btn-primary" href="index.php?btn_list">Danh sách</a>
            </div>
        </form>
    </div>
</div>





<!--link đổi trang-->