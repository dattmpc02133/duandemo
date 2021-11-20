<?php 
require_once("../../global.php");
require_once("../../DAO/pdo.php");

extract($_REQUEST);
if (exit_param("btn_add")) {
    $VIEW_NAME = "add.php";
} else if(exit_param("btn-add")){

} else {
    // $items = thong_ke_binh_luan();
    $VIEW_NAME = "list.php";
}
require "../layout.php";
?>