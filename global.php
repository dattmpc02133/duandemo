<?php
session_start();
$ROOT_URL = "/duandemo";
$CONTENT_URL = "$ROOT_URL/content";
$DAO_URL = "$ROOT_URL/DAO";
$ADMIN_URL = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";

function exit_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}

// add cookie
function add_cookie($name, $value, $date)
{
    setcookie($name, $value, time() + (86400 * $date), "/");
}

// function get cookie
function get_cookie($name)
{
    return $_COOKIE[$name];
}

// save file
function save_file($hinh, $path)
{
    $file_uploaded = $hinh;
    $file_name = $file_uploaded["name"];
    $target_path = $path . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}
