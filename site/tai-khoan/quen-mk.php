<?php
    require_once("../../content/library_email/index.php");
    $ma_so = '';
    if(isset($_POST['btn-quen-mk'])){
        $email = $_POST['email'];
       $kt =  email_gui_kh($email);
        if($kt){
            $ma_so = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $_SESSION['ma_xac_nhan']=$ma_so;     
            $_SESSION['ma_kh_update']=$kt['ma_kh'];   
            echo "<script>location.href = 'index.php?xac-nhan-mk'</script>";

        }else{
            echo "<script>alert('Email không tồn tại')</script>";
        }
        
    }
?>
<div class="container-fluid" style="padding: 0 80px;">
<div class="row">
    <div class="container">
        <div class="dangky-product">
            <div class="header_dangky" role="alert">
                <h3 style="text-align: center;color:#fff;">Quên mật khẩu</h3>
            </div>
            <form action="" method="POST" >
            <!-- <div class="form-group">
                    <label for=""><b>Tên tài khoản</b></label>
                    <input type="text" placeholder="Tên tài khoản" class="form-control" name="ma_kh" id="" aria-describedby="helpId" value="">
                </div> -->
                <div class="form-group">
                    <label for=""><b>Nhập email *</b></label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Nhập email của bạn">
                </div>
                
                <div class="form-group">
                    <button type="submit" name="btn-quen-mk" class="btn btn-primary">Gửi yêu cầu</button>
                    <!-- <button type="reset" name="reset_form_add_kh" class="btn btn-primary">Nhập lại</button> -->
                </div>
                <div class="">
                    <p style="font-style: oblique; font-weight:500; ">Bạn sẽ đăng nhập lại sau khi đổi mật khẩu</p>
                </div>
            </form>
        </div>
    </div>
</div>
</div>