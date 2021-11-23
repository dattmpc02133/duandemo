<?php 
    require_once("../../global.php");
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/hoa-don.php';
    extract($_REQUEST);
    if (exit_param("btn-list")) {
        $VIEW_NAME = "list.php";
    } elseif (exit_param("btn_update_ct")) {
        $VIEW_NAME = "update_ct.php";
    } elseif (exit_param("btn_update_hd")) {
        $VIEW_NAME = "update_hd.php"; 
    } elseif (exit_param('btn-details')) {
        $VIEW_NAME = "details.php";
    } else {
        $VIEW_NAME = "list.php";
    }
    require("../layout.php");