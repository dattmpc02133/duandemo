<?php 


    if(isset($_GET['ma_ncc'])){
        $ma_ncc2 = $_GET['ma_ncc'];
        
    }

    if(isset($_POST['update'])){
        
        $ma_ncc = $_GET['ma_ncc'];
        $ten_ncc = $_POST['ten_ncc'];
        $dia_chi = $_POST['dia_chi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        nha_cung_cap_update($ten_ncc,$dia_chi,$sdt,$email,$ma_ncc);
        echo '<script> location.href = "index.php"; </script>';
    }

$ma_ncc = nha_cung_cap_getinfo($ma_ncc2);
extract($ma_ncc);
    




?>
<div class="title">
    <h3>CẬP NHẬT THÔNG TIN NHÀ CUNG CẤP</h3>
</div>
<form action="index.php?btn_update&ma_ncc=<?= $ma_ncc ?>" method="POST" enctype="multipart/form-data" id="form_du_an1">
    <div class="form-group">
        <label for="">Tên nhà cung cấp</label>
        <input type="text" name="ten_ncc" class="form-control" value="<?= $ten_ncc ?>" placeholder="Nhập tên nhà cung cấp" >
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi"  class="form-control" value="<?= $dia_chi ?>" placeholder="Nhập địa chỉ" >  
    </div>
    <div class="form-group">
        <label for="">Điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="<?= $sdt ?>" placeholder="Nhập điện thoại">
    </div>  
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" value="<?= $email ?>" placeholder="Nhập địa chỉ email">
    </div>  
    <button type="submit" name="update" id="update" class="btn btn-info">Cập nhật</button>
 
   
</form>
