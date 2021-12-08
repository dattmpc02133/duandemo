<?php

// phân trang count 
function phan_trang_count($ten_bang)
{
    $sql = "SELECT COUNT(*) FROM $ten_bang";
    return pdo_query_value($sql);
}
// sản phẩm phân trang
function phan_trang($ten_bang, $cot)
{
    $sp_tung_trang = 10;
    if (!isset($_GET['page'])) {
        $trang = 1;
    } else {
        $trang = $_GET['page'];
    }
    $tung_trang =  ($trang - 1) * $sp_tung_trang;
    $sql = "SELECT * FROM $ten_bang   ORDER BY $cot  DESC LIMIT $tung_trang,$sp_tung_trang";
    return pdo_query($sql);
}
