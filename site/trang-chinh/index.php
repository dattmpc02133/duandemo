<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/san-pham.php");
require_once("../../DAO/loai.php");
extract($_REQUEST);
if(exit_param("dang_ky", $_REQUEST)){
    $VIEW_NAME = "dang-ky.php";
} else{
    // $VIEW_NAME = "../trang-chinh/cart.php";
    $VIEW_NAME = "home.php";
}
require("../layout.php");
