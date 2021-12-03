<?php
require_once '../../global.php';
require_once '../../DAO/pdo.php';
require_once("../../DAO/khach-hang.php");
require_once("../../DAO/loai.php");
require_once("../../DAO/cart.php");
require_once("../../DAO/hoa-don.php");
require_once("../../content/library_email/index.php");
// $VIEW_NAME = "dang-ky.php";
extract($_REQUEST);
if(exit_param('btn-thong-tin')){
  $VIEW_NAME = "thong-tin-tk.php";
}elseif (exit_param('doi-mk')){
  $VIEW_NAME = "doi-mk.php";
}elseif(exit_param('don-hang')){
  $VIEW_NAME = "don-hang-account.php";
}elseif(exit_param('quen-mk')){
  $VIEW_NAME = "quen-mk.php";
}elseif(exit_param('xac-nhan-mk')){
  $VIEW_NAME = "mk-send.php";
}
else{
  $VIEW_NAME = "dang-ky.php";
}

require_once '../layout.php';
if (isset($_SESSION['thong_bao'])) {
  echo $_SESSION['thong_bao'];
}
?>