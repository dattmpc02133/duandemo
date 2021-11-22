<?php
require ("../../global.php");
require ("../../DAO/binh-luan.php");
require ("../../DAO/san-pham.php");
require ("../../DAO/pdo.php");
// 
extract($_REQUEST);
if(exit_param("chart")){
    $items = sp_thong_ke();
    $VIEW_NAME = "chart.php";
}else{
    $items = sp_thong_ke();
    $VIEW_NAME = "list.php";
}
$items = sp_thong_ke();
require ("../layout.php");

?>