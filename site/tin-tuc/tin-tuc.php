<?php 
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/cart.php");
require_once("../../DAO/san-pham.php");
require_once("../../DAO/loai.php");
require_once("../../DAO/tin-tuc.php");
extract($_REQUEST);



$VIEW_NAME = "tin-tuc-ui.php";
require("../layout.php");
?>