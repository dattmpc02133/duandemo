<?php
    require_once("../../DAO/pdo.php");
    require_once("../../DAO/tin-tuc.php");
?>
<?php
    if(isset($_POST['add'])){
        $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/news/';
        $tieu_de = $_POST['tieu_de'];
        $hinh_tin_tuc = $_FILES['hinh_tin_tuc'];
        $mo_ta_tin_tuc = $_POST['mo_ta_tin_tuc'];
        $noi_dung_tin_tuc = $_POST['noi_dung_tin_tuc'];
        $hinh = save_file($hinh_tin_tuc,$path);
        tin_tuc_insert($tieu_de,$mo_ta_tin_tuc,$hinh,$noi_dung_tin_tuc);
        echo "<script> location.href='index.php'; </script>";    
    }
?>
<div class="title">
    <h3>THÊM TIN TỨC</h3>
</div>
<form action="" method="POST" enctype="multipart/form-data" id="form_du_an1">
    <div class="form-group">
        <label for="">Tiêu đề:</label>
        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="tieu_de" id="ten_sp">
    </div>
    <div class="form-group">
        <label for="">Ảnh:</label>
        <input type="file" class="form-control-file" name="hinh_tin_tuc" id="hinh" aria-describedby="fileHelpId">
    </div>
    <div class="form-group">
        <label for="">Mô tả:</label>
        <textarea name="mo_ta_tin_tuc"></textarea>
    </div>
    <div class="form-group">
        <label for="">Nội dung:</label>
        <textarea name="noi_dung_tin_tuc"></textarea>
    </div>
    <div class="button__group">
        <button type="submit" name="add" id="add" class="btn btn-info">Thêm tin tức</button>
    </div>
</form>