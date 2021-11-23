<?php
require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once("../../DAO/khach_hang.php");
extract($_REQUEST);
if (exit_param("btn-dk")) {
  $VIEW_NAME = "dang-ky.php";
}
//  else if (exit_param('btn-quen-mk')) {
//   $VIEW_NAME = "form-quen-mk.php";
// } else if (exit_param("btn-doi-mk")) {
//   $VIEW_NAME = "doi-mk.php";
// } else if (exit_param('update_account')) {
//   $VIEW_NAME = "update-account.php";
// } else if (exit_param("quen-mk")) {
//   $VIEW_NAME = "quen-mk.php";
// }
require_once '../layout.php';
if (isset($_SESSION['thong_bao'])) {
  echo $_SESSION['thong_bao'];
}
?>