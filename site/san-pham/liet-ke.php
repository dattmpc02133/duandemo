<?php

require_once("../../DAO/pdo.php");
require_once("../../DAO/san-pham.php");
require_once("../../DAO/loai.php");
require_once("../../global.php");
extract($_REQUEST);
if (exit_param("ma_loai")) {
    $poducts = san_pham_select_by_loai($ma_loai);
} elseif (exit_param("search")) {
    $poducts = san_pham_select_by_keyword($search);
} else {
    $poducts =  san_pham_selectall();
}
$VIEW_NAME = "liet-ke-ui.php";
require("../layout.php");
