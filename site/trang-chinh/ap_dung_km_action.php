<?php 
    require_once '../../global.php';
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/khuyen-mai.php';
    require_once '../../DAO/khach-hang.php';
    $result = '';
    if(isset($_POST['ma_km'])){
        $ma_km_ap_dung = $_POST['ma_km'];
        $get_in4_ma_km = ma_km_get_info($ma_km_ap_dung);
        $ma_kh_ap_dung = $_SESSION['user'];
        $get_ma_kh_ap_dung = kh_da_dung_km($ma_kh_ap_dung, $ma_km_ap_dung);
        if($get_ma_kh_ap_dung == false){
            if($get_in4_ma_km){
                if($get_in4_ma_km['loai_km'] == 1){
                    $result = '-'.number_format($get_in4_ma_km['muc_giam']).'đ ['.$get_in4_ma_km['ma_km'].']';
                }
                else {
                    $result = '-'.$get_in4_ma_km['muc_giam'].'% ['.$get_in4_ma_km['ma_km'].']';
                }
            }
            else{
                echo '<script> alert("Mã khuyến mãi không tồn tại !"); </script>';
            }
        }
        else{
            echo '<script> alert("Bạn đã sử dụng mã này rồi, vui lòng chọn mã khác !"); </script>';
        }
    }
    // $ma_km2 = ma_km_get_info($_POST['ma_km']);
    // echo $ma_km2['ma_km'];
    echo $result;
?>