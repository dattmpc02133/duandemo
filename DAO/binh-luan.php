<?php
//    thêm mới  
function bl_insert($ma_kh,$ma_sp,$ma_tin_tuc,$noi_dung,$ngay_bl,$trang_thai)
{
    $sql = "INSERT INTO binh_luan(ma_kh,ma_sp,ma_tin_tuc,noi_dung,ngay_bl,trang_thai) VALUES(?,?,?,?,?,?)";
    pdo_execute($sql,$ma_kh,$ma_sp,$ma_tin_tuc,$noi_dung,$ngay_bl,$trang_thai);
}

// function bl_update($ma_bl,$noi_dung,$ma_sp,$ma_kh,$ngay_bl,$trang_thai)
// {
//     $sql = "UPDATE binh_luan SET noi_dung=?,ma_sp=?,ma_kh=?,ngay_bl=?,trang_thai=?";
//     return pdo_execute($sql,$noi_dung,$ma_sp,$ma_kh,$ngay_bl,$trang_thai);
// }
// lấy mã thông tin hàng hóa
function bl_info ($ma_bl){
    $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
    return pdo_query_one($sql,$ma_bl);
}
// select all bl trang thái kích hoạt (1);
function bl_select_by_kh_va_sp_trang_thai1($ma_sp){
    $sql = "SELECT a.noi_dung,a.ngay_bl, b.ma_kh, b.hinh FROM binh_luan a INNER JOIN khach_hang b ON a.ma_kh = b.ma_kh WHERE a.trang_thai = 1 AND ma_sp = ? ORDER BY a.ma_bl DESC";
    return pdo_query($sql,$ma_sp);
}

function bl_select_by_kh_va_tt_trang_thai1($ma_tin_tuc){
    $sql = "SELECT a.noi_dung,a.ngay_bl, b.ma_kh, b.hinh FROM binh_luan a INNER JOIN khach_hang b ON a.ma_kh = b.ma_kh WHERE a.trang_thai = 1 AND ma_tin_tuc = ? ORDER BY a.ma_bl DESC";
    return pdo_query($sql,$ma_tin_tuc);
}



// xóa bl
function bl_delete($ma_bl)
{
    $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
    if (is_array($ma_bl)) {
        foreach ($ma_bl as $bl_new) {
            pdo_execute($sql, $bl_new);
        }
    } else {
        pdo_execute($sql, $ma_bl);
    }
}
// cập nhật trạng thái bình luận
function update_trang_thai_bl($trang_thai,$ma_bl){
$sql = "UPDATE binh_luan SET trang_thai = ? WHERE ma_bl = ?";
pdo_execute($sql,$trang_thai,$ma_bl);
}
function bl_exits($ma_bl)
{
    $sql = "SELECT COUNT(*) FROM binh_luan WHERE ma_bl=?";
    return pdo_query_value($sql,$ma_bl) > 0;
}
function bl_select_by_san_pham($ma_sp){
    // $sp_tung_trang = 9;
    // if (!isset($_GET['page'])) {
    //     $trang = 1;
    // } else {
    //     $trang = $_GET['page'];
    // }
    // $tung_trang =  ($trang - 1) * $sp_tung_trang;

    $sql = "SELECT b.*,h.ten_sp FROM binh_luan b JOIN san_pham h ON h.ma_sp = b.ma_sp
    WHERE b.ma_sp=? ORDER BY ma_bl DESC";
    // $sql = "SELECT b.*,h.ten_sp FROM binh_luan b JOIN san_pham h ON h.ma_sp = b.ma_sp
    // WHERE b.ma_sp=? ORDER BY ma_bl DESC LIMIT $tung_trang,$sp_tung_trang";
    return pdo_query($sql, $ma_sp);
}
function bl_select_by_id($ma_bl)
{
    $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
    return pdo_query_one($sql,$ma_bl);
}

// bình luận thống kê
function bl_thong_ke()
{

    // $sp_tung_trang = 9;
    // if (!isset($_GET['page'])) {
    //     $trang = 1;
    // } else {
    //     $trang = $_GET['page'];
    // }
    // $tung_trang =  ($trang - 1) * $sp_tung_trang;

    $sql = "SELECT sp.ma_sp, sp.ten_sp, COUNT(*) AS so_luong, MIN(bl.ngay_bl) AS bl_cu_nhat, MAX(bl.ngay_bl) AS bl_moi_nhat
                FROM binh_luan bl INNER JOIN san_pham sp ON sp.ma_sp = bl.ma_sp
                GROUP BY sp.ma_sp, sp.ten_sp 
                HAVING so_luong > 0 ORDER BY sp.ma_sp  DESC ";

    return pdo_query($sql);
}

?>