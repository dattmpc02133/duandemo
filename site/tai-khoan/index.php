<?php
require_once '../../global.php';
require_once '../../DAO/pdo.php';
require_once("../../DAO/khach-hang.php");
require_once("../../DAO/loai.php");
$VIEW_NAME = "dang-ky.php";
extract($_REQUEST);



require_once '../layout.php';
if (isset($_SESSION['thong_bao'])) {
  echo $_SESSION['thong_bao'];
}
?>