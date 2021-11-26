<?php 

function loai_selectall()
{
    $sql = "select * from loai order by ma_loai DESC";
    return pdo_query($sql);
}
// thêm mới loại
function loai_insert($ten_loai,$hinh)
{
    $sql = "INSERT INTO loai(ten_loai,hinh_loai_sp) VALUES (?,?)";
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
    $sql = "UPDATE loai SET ten_loai= ?, hinh_loai_sp = ? WHERE ma_loai=?";
    pdo_execute($sql, $ten_loai, $hinh , $ma_loai);
}


// loại khuyễn mãi và sản phẩm mới

function loai_mk_moi(){
    $sql = "SELECT * FROM loai WHERE ma_loai IN(8,9) ";
    return pdo_query($sql);
}
// loại not in khuyến mãi và sản phẩm mới

function loai_not_in(){
    // $sql = "SELECT * FROM san_pham sp INNER JOIN loai l ON sp.ma_loai = l.ma_loai  WHERE sp.giam_gia > 0 AND l.ma_loai NOT IN (8,9,10)";
    $sql = "SELECT * FROM loai WHERE ma_loai IN (3,1,11,12) "; // NOT IN(8,9,10)
    return pdo_query($sql);
}

?>