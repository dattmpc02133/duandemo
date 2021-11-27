<?php
require_once '../../global.php';
require_once '../../DAO/pdo.php';
require_once("../../DAO/khach-hang.php");
require_once("../../DAO/loai.php");
require_once("../../DAO/cart.php");
require_once("../../DAO/hoa-don.php");
// $VIEW_NAME = "dang-ky.php";
extract($_REQUEST);
if(exit_param('btn-thong-tin')){
  $VIEW_NAME = "thong-tin-tk.php";
}elseif (exit_param('doi-mk')){
  $VIEW_NAME = "doi-mk.php";
}elseif(exit_param('don-hang')){
  $VIEW_NAME = "don-hang-account.php";
}
else{
  $VIEW_NAME = "dang-ky.php";
}

require_once '../layout.php';
if (isset($_SESSION['thong_bao'])) {
  echo $_SESSION['thong_bao'];
}
?>