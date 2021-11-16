<?php
require_once("../../global.php");
extract($_REQUEST);
if (exit_param("btn_add")) {
    // trang danh sach loaim hang
    $VIEW_NAME = "add.php";
} elseif (exit_param("btn_update")) {
    $VIEW_NAME = "update.php";
} else {
    $VIEW_NAME = "list.php";
}
require("../layout.php");
