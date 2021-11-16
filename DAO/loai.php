<?php 

function loai_selectall()
{
    $sql = "select * from loai order by ma_loai DESC";
    return pdo_query($sql);
}
// thêm mới loại
function loai_insert($ten_loai,$hinh)
{
    $sql = "INSERT INTO loai(ten_loai,hinh) VALUES (?,?)";
    pdo_execute($sql, $ten_loai, $hinh);
}
// xóa
function loai_delete($ma_loai)
{
    $sql = "DELETE FROM loai WHERE ma_loai=?";
    pdo_execute($sql, $ma_loai);
}
// lấy thông tin 1 mã loại
function loai_getinfo($ma_loai)
{
    $sql = "select * from loai where ma_loai=?";
    return pdo_query_one($sql, $ma_loai);
}
// cập nhật dữ liệu
function loai_update($ten_loai, $hinh, $ma_loai)
{
    $sql = "UPDATE loai SET ten_loai= ?, hinh = ? WHERE ma_loai=?";
    pdo_execute($sql, $ten_loai, $hinh , $ma_loai);
}

?>