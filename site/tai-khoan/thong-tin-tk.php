<?php 
    if(isset($_POST['update_account'])){
        $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/user/';
        $ma_kh = $_POST['ma_kh'];
        $mat_khau = $_POST['mat_khau'];
        $ho_ten = $_POST['ho_ten'];
        $dia_chi = $_POST['dia_chi'];
        $kich_hoat = $_POST['kich_hoat'];
        if(strlen($_FILES['hinh_new']['name'])>0){
            $hinh1 = $_FILES['hinh_new'];
            $tenhinh = save_file($hinh1,$path);
        }
        else {
            $tenhinh = $_POST['hinh'];
        }
        $email = $_POST['email'];
        $vai_tro = $_POST['vai_tro'];
        khach_hang_update($mat_khau, $ho_ten, $dia_chi, $kich_hoat, $tenhinh, $email, $vai_tro, $ma_kh);
        echo '<script> location.href = "index.php?btn-thong-tin"; </script>';
    }
?>
<div class="container-fluid" style="padding: 0 80px;">
    <div class="row">
        <div class="col-5">
            <?php
            require_once('aside-menu.php');
            ?>

        </div>
        <div class="col-7">
            <div class="dangky-product" style="width:80%;">
                <?php 
                    if(isset($_SESSION['user'])){
                        $user_data = get_info_kh($_SESSION['user']);
                        extract($user_data);
                    }
                ?>
                <div class="header_dangky" role="alert">
                    <h3 style="text-align: center;">Cập nhật tài khoản</h3>
                </div>
                <form action="" method="post" id="form_du_an" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for=""><b>Tên đăng nhập*</b></label>
                        <input type="text" class="form-control" name="ma_kh" id="ma_kh" aria-describedby="helpId" placeholder="Nhập tên đăng nhập" value="<?=$ma_kh?>" readonly>
                    </div>
                    <input type="hidden" name="mat_khau" value="<?=$mat_khau?>">
                    <input type="hidden" name="kich_hoat" value="<?=$kich_hoat?>">
                    <input type="hidden" name="vai_tro" value="<?=$vai_tro?>">

                    <div class="form-group">
                        <label for=""><b>Họ tên *</b></label>
                        <input type="text" class="form-control" name="ho_ten" id="ho_ten" aria-describedby="helpId" placeholder="Nhập họ tên khách hàng" value="<?=$ho_ten?>">
                        <span class="mess"></span>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Địa chỉ *</b></label>
                        <input type="text" class="form-control" name="dia_chi" id="dia_chi" value="<?=$dia_chi?>" aria-describedby="helpId" placeholder="Nhập địa chỉ">
                        <span class="mess"></span>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Ảnh đại diện *</b></label>
                        <input type="file" class="form-control-file" name="hinh_new" id="hinh_new" aria-describedby="fileHelpId">
                        <input class="form-control" type="text" name="hinh" id="hinh" value="<?=$hinh?>" readonly style="border: none; outline:none;">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Email *</b></label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Nhập địa chỉ email khách hàng" value="<?=$email?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update_account" class="btn btn-primary">Cập nhật</button>
                        <!-- <a name="back" id="" class="btn btn-primary" href="index.php?btn_list" role="button">Quay lại</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>