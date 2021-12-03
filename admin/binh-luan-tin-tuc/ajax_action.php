<?php 
require_once("../../DAO/pdo.php");
require_once("../../DAO/binh-luan.php");
// cập nhật trạng thái bình luận
if(isset($_POST['ma_bl'])){
    $ma_bl = $_POST['ma_bl'];
    $trang_thai = $_POST['trang_thai'];
    
   $result =  update_trang_thai_bl($trang_thai,$ma_bl);
  
  
}

?>