<?php
    require_once("../../DAO/pdo.php");
    require_once("../../DAO/khach-hang.php");
    require_once("../../content/library_email/index.php");
    $ma_so = '';
    if(isset($_POST['btn-quen-mk'])){
        $email = $_POST['email'];
       $kt =  email_gui_kh($email);
        if($kt){
            $ma_so = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $_SESSION['ma_xac_nhan']=$ma_so;     
            $_SESSION['ma_kh_update']=$kt['ma_kh'];   
           
            $title = "Mã xác nhận nhóm 5 -  nội thất";
            $content ="Mã xác nhận của bạn là <strong style= 'color:red;' > $ma_so </strong> ";
            $email1 =  $email;          
            sendMail($title, $content, $email1);

            // echo "<script>location.href = 'index.php?xac-nhan-mk'</script>";
            header("location: index.php?xac-nhan-mk");
        }else{
            echo "<script>alert('Email không tồn tại')</script>";
        }

    }
?>