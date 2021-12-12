<?php 
    if(isset($_GET['ma_ncc'])){
        $ma_ncc2 = $_GET['ma_ncc'];
        
    }

    if(isset($_POST['update'])){
        $test = true;
        $check_sdt = '/^(0)([2-9])([0-9]+){8}$/';
        $check_email = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        $kt_loi = array();

        if (empty($_POST['ten_ncc'])) {
            $kt_loi['ten_ncc'] = 'Tên nhà cung cấp không được để trống';
            $test = false;
        } else if (empty($_POST['dia_chi'])) {
            $kt_loi['dia_chi'] = 'Địa chỉ không được để trống';
            $test = false;
        } else if (empty($_POST['sdt'])) {
            $kt_loi['sdt'] = 'Số điện thoại không được để trống';
            $test = false;
        } else if (!preg_match($check_sdt, $_POST['sdt'], $matches)) {
            $kt_loi['sdt'] = 'Số điện thoại không đúng định dạng, ví dụ: 0946636844';
            $test = false;
        } else if(isset($_POST['sdt'])){
            $sdt_ncc_old = sdt_ncc_exist($_POST['sdt']);
            if($_POST['sdt'] != $sdt_ncc_old['sdt']){
                if(sdt_ncc_exist($_POST['sdt'])){
                    $kt_loi['sdt'] = 'Số điện đã được sử dụng';
                    $test = false;
                }
            }
        } else if (empty($_POST['email'])) {
            $kt_loi['email'] = 'Số điện thoại không được để trống';
            $test = false;
        } else if (!preg_match($check_email, $_POST['email'], $matches)) {
            $kt_loi['email'] = 'Email không đúng định dạng, ví dụ: duandemo123@gmail.com';
            $test = false;
        } else if(isset($_POST['email'])){
            $email_ncc_old = email_ncc_exist($_POST['email']);
            if($_POST['email'] != $email_ncc_old['email']){
                if(email_ncc_exist($_POST['email'])){
                    $kt_loi['email'] = 'Email đã được sử dụng';
                    $test = false;
                }
            }
        } else {
            $test = true;
        }

        if($test){
            $ma_ncc = $_GET['ma_ncc'];
            $ten_ncc = $_POST['ten_ncc'];
            $dia_chi = $_POST['dia_chi'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            nha_cung_cap_update($ten_ncc,$dia_chi,$sdt,$email,$ma_ncc);
            echo '<script> location.href = "index.php"; </script>';
        }
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
        <span class="errs">
            <?php
            if (isset($kt_loi['ten_ncc'])) {
                echo $kt_loi['ten_ncc'];
            }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi"  class="form-control" value="<?= $dia_chi ?>" placeholder="Nhập địa chỉ" >
        <span class="errs">
            <?php
            if (isset($kt_loi['dia_chi'])) {
                echo $kt_loi['dia_chi'];
            }
            ?>
        </span>  
    </div>
    <div class="form-group">
        <label for="">Điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="<?= $sdt ?>" placeholder="Nhập điện thoại">
        <span class="errs">
            <?php
            if (isset($kt_loi['sdt'])) {
                echo $kt_loi['sdt'];
            }
            ?>
        </span> 
    </div>  
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" value="<?= $email ?>" placeholder="Nhập địa chỉ email">
        <span class="errs">
            <?php
            if (isset($kt_loi['email'])) {
                echo $kt_loi['email'];
            }
            ?>
        </span> 
    </div>  
    <button type="submit" name="update" id="update" class="btn btn-info">Cập nhật</button>
 
   
</form>
