<?php
if(isset($_GET['ma-tin-tuc'])){
    $ma_tin_tuc = $_GET['ma-tin-tuc'];
}
    $news = tin_tuc_info($ma_tin_tuc);
    extract($news);
    if(isset($_POST['btn_update'])){
        $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/news/';
        $tieu_de = $_POST['tieu_de'];
        $hinh_tin_tuc = $_FILES['hinh_tin_tuc'];
        $mo_ta_tin_tuc = $_POST['mo_ta_tin_tuc'];
        $noi_dung_tin_tuc = $_POST['noi_dung_tin_tuc'];
        if(strlen($_FILES['hinh_tin_tuc']['name'])>0){
            $hinh = save_file($hinh_tin_tuc,$path);
            
        }else{
            $hinh = $_POST['hinh_newa'];
        }
        tin_tuc_update($tieu_de,$mo_ta_tin_tuc,$hinh,$noi_dung_tin_tuc,$ma_tin_tuc);
        echo "<script> location.href='index.php'; </script>";
    }
?>
<div class="title">
    <h3>Cập nhật tin tức</h3>
</div>
<form action="" method="POST" enctype="multipart/form-data" id="form_du_an1">
    <div class="form-group">
        <label for="">Tiêu đề:</label>
        <input type="text" class="form-control" value="<?=$tieu_de?>" placeholder="Tiêu đề" name="tieu_de" id="ten_sp">
    </div>
    <div class="form-group">
        <label for="">Ảnh:</label>
        <input type="file" class="form-control-file" name="hinh_tin_tuc" id="hinh" aria-describedby="fileHelpId">
        <input type="text" name="hinh_newa" value="<?=$hinh_tin_tuc?>">
    </div>
    <div class="form-group">
        <label for="">Mô tả:</label>
        <textarea name="mo_ta_tin_tuc"> <?=$mo_ta_tin_tuc?> </textarea>
    </div>
    <div class="form-group">
        <label for="">Nội dung:</label>
        <textarea name="noi_dung_tin_tuc"><?=$noi_dung_tin_tuc?></textarea>
    </div>
    <div class="btn__group">
        <button type="submit" class="btn btn-info" name="btn_update">Cập nhật sản phẩm</button>
    </div>
</form>