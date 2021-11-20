<?php
require ("../../global.php");
// require ("../../DAO/binh-luan.php");
// require ("../../DAO/thong_ke_binh_luan.php");
require ("../../DAO/pdo.php");
// 
extract($_REQUEST);
if(exit_param("chart")){
    // $items = thong_ke_hang_hoa();
    $VIEW_NAME = "chart.php";
}else{
    // $items = thong_ke_hang_hoa();
    $VIEW_NAME = "list.php";
}
// $items = thong_ke_hang_hoa();
require ("../layout.php");

?>