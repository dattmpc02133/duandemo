<?php
function san_pham_selectall()
{
    $sql = "SELECT * FROM san_pham WHERE dac_biet = 0  ORDER BY ma_sp DESC ";
    return pdo_query($sql);
}
//san pham select not in
function sp_select_not_in($ma_sp)
{
    $sql = "SELECT * FROM san_pham WHERE ma_sp NOT IN (?) ORDER BY ma_sp DESC";
    return pdo_query($sql, $ma_sp);
}
// count products by category
function count_products_by_catagory($ma_loai)
{
    $sql = "SELECT COUNT(*) FROM san_pham a INNER JOIN loai b ON a.ma_loai = b.ma_loai WHERE b.ma_loai = ? AND a.trang_thai = 1 ";
    return pdo_query_value($sql, $ma_loai);
}

// lấy thông tin 1 mã sản phẩm
function san_pham_getinfo($ma_sp)
{
    $sql = "SELECT * FROM san_pham WHERE ma_sp =?";
    return pdo_query_one($sql, $ma_sp);
}
// select 1 sp
function ten_sp_select_in($ma_sp)
{
    $sql = "SELECT ten_sp FROM san_pham WHERE ma_sp = ?";
    return pdo_query_value($sql, $ma_sp);
}

// Thêm sản phẩm mới
function san_pham_insert(
    $ten_sp,
    $don_gia,
    $giam_gia,
    $hinh,
    $so_luong,
    $trang_thai,
    $dac_biet,
    $so_luot_xem,
    $ma_loai,
    $mo_ta
) {
    $sql = "INSERT INTO san_pham VALUES(null,?,?,?,?,?,?,?,?,?,?)";
    // gọi lại hàm thực thi, tương tác dữ liệu
    pdo_execute(
        $sql,
        $ten_sp,
        $don_gia,
        $giam_gia,
        $hinh,
        $so_luong,
        $trang_thai,
        $dac_biet,
        $so_luot_xem,
        $ma_loai,
        $mo_ta
    );
}

// hàng hóa theo loại
function san_pham_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM san_pham  WHERE ma_loai = ? LIMIT 0,5 ";
    return  pdo_query($sql, $ma_loai);
}

// phân trang count 
function phan_trang_count()
{
    $sql = "SELECT COUNT(*) FROM san_pham";
    return pdo_query_value($sql);
}

// sản phẩm phân trang
function phan_trang_sp()
{
    $sp_tung_trang = 9;
    if (!isset($_GET['page'])) {
        $trang = 1;
    } else {
        $trang = $_GET['page'];
    }
    $tung_trang =  ($trang - 1) * $sp_tung_trang;
    $sql = "SELECT * FROM san_pham  ORDER BY ma_sp  DESC LIMIT $tung_trang,$sp_tung_trang";
    return pdo_query($sql);
}
// sản phẩm đặc biệt 
function san_pham_dac_biet()
{
    $sql = "SELECT * FROM san_pham WHERE dac_biet = 1";
    return pdo_query($sql);
}
// xóa sản phẩm
function san_pham_delete($ma_sp)
{
    $sql = "DELETE FROM san_pham WHERE ma_sp = ?";
    pdo_execute($sql, $ma_sp);
}
// hiển thị hàng hóa theo keywwords
function san_pham_select_by_keyword($search)
{
    $sql = "SELECT * FROM san_pham a INNER JOIN  loai b ON b.ma_loai = a.ma_loai 
    WHERE ten_sp LIKE ? OR ten_loai LIKE ? ";
    return pdo_query($sql, '%' . $search . '%', '%' . $search . '%');
}
// cập nhật sản phẩm
function update_sp(
    $ten_sp,
    $don_gia,
    $giam_gia,
    $hinh,
    $so_luong,
    $trang_thai,
    $dac_biet,
    $so_luot_mua,
    $ma_loai,
    $mo_ta,
    $ma_sp
) {
    $sql = "UPDATE san_pham 
    SET ten_sp=?,don_gia=?,giam_gia=?,hinh=?,so_luong=?,trang_thai=?,dac_biet=?,so_luot_mua=?,ma_loai=?,mo_ta = ? WHERE ma_sp=?";
    pdo_execute(
        $sql,
        $ten_sp,
        $don_gia,
        $giam_gia,
        $hinh,
        $so_luong,
        $trang_thai,
        $dac_biet,
        $so_luot_mua,
        $ma_loai,
        $mo_ta,
        $ma_sp
    );
}
// sản phẩm update số lượng nhập kho
function sp_update_so_luong_nhap($so_luong, $ma_sp)
{
    $sql = "UPDATE san_pham SET so_luong = so_luong + ? WHERE ma_sp = ?";
    pdo_execute($sql, $so_luong, $ma_sp);
}
// cập nhật số lượt mua 
function so_luot_mua_sp($so_luong, $ma_sp)
{
    $sql = "UPDATE san_pham SET so_luot_mua = so_luot_mua + ? WHERE ma_sp = ?";
    pdo_execute($sql, $so_luong, $ma_sp);
}
// cập nhật số lượng sản phẩm còn lại trong kho khi khách hàng mua.
function giam_sp_ton_kho_khi_mua($so_luong, $ma_sp)
{
    $sql = "UPDATE san_pham SET so_luong = so_luong - ? WHERE ma_sp = ?";
    pdo_execute($sql, $so_luong, $ma_sp);
}
function sp_update_so_luong_nhap_fix($so_luong_nhap_old, $so_luong_nhap, $ma_sp)
{
    $sql = "UPDATE san_pham SET so_luong = so_luong - ? + ? WHERE ma_sp = ?";
    pdo_execute($sql, $so_luong_nhap_old, $so_luong_nhap, $ma_sp);
}
// cập nhật trạng thái về 0 "hết hàng";
function trang_thai_sp_het_hang($ma_sp)
{
    $sql = "UPDATE san_pham SET trang_thai = 0 WHERE ma_sp = ?";
    pdo_execute($sql, $ma_sp);
}
// cập nhật trạng thái về 1 "còn hàng";
function trang_thai_sp_con_hang($ma_sp)
{
    $sql = "UPDATE san_pham SET trang_thai = 1 WHERE ma_sp = ?";
    pdo_execute($sql, $ma_sp);
}
// số lượt lượt xem
function san_pham_so_luot_luot_xem($ma_sp)
{
    $sql = "UPDATE san_pham SET so_luot_xem = so_luot_xem + 1 WHERE ma_sp = ? ";
    pdo_execute($sql, $ma_sp);
}
// đếm số lượng sản phẩm
function product_count()
{
    $sql = "SELECT COUNT(*) as total  FROM san_pham WHERE ma_sp";
    return pdo_query($sql);
}
// đếm sản phẩm theo loại
function product_giam_gia_count_loai()
{
    $sql = "SELECT COUNT(*) as total  FROM san_pham WHERE giam_gia";
    return pdo_query($sql);
}
// thống kê sản phẩm
function sp_thong_ke()
{

    $sql = "SELECT lo.ma_loai, lo.ten_loai, COUNT(*) so_luong, MIN(sp.don_gia) gia_min, MAX(sp.don_gia) gia_max, AVG(sp.don_gia) gia_avg
                FROM san_pham sp JOIN loai lo ON lo.ma_loai = sp.ma_loai 
                GROUP BY lo.ma_loai, lo.ten_loai";
    return pdo_query($sql);
}
// khuyến mãi
function san_pham_khuyen_mai()
{
    $sql = "SELECT * FROM san_pham WHERE giam_gia > 0 ORDER BY ma_sp DESC LIMIT 0,10";
    return pdo_query($sql);
}
// sản phẩm mới
function select_product_new()
{
    $sql = "SELECT * FROM san_pham ORDER BY ma_sp DESC LIMIT 0,10";
    return pdo_query($sql);
}

// insert hình phụ
function product_hinh_phu($ma_sp, $hinh)
{
    $sql = "INSERT INTO hinh VALUES(null,?,?)";
    pdo_execute($sql, $ma_sp, $hinh);
}
// update
function update_hinh_phu($hinh, $ma_sp)
{
    $sql = "UPDATE hinh SET hinh_phu = ? WHERE ma_sp = ?)";
    pdo_execute($sql, $hinh, $ma_sp);
}

// mã sản phẩm hình phụ 
function ma_sp_hinh_phu()
{
    $sql = "SELECT * FROM san_pham ORDER BY ma_sp DESC LIMIT 0,1 ";
    return  pdo_query_one($sql);
}
// select hinh phụ
function select_hinh_phu($ma_sp)
{
    $sql = "SELECT * FROM hinh WHERE ma_sp = ? LIMIT 0,2";
    return  pdo_query($sql, $ma_sp);
}
// xóa hình phụ 
function hinh_phu_delete($ma_sp)
{
    $sql = "DELETE FROM hinh WHERE $ma_sp = ? ";
    pdo_query($sql, $ma_sp);
}


// sản phẩm đã xem
function sp_da_xem($ma_sp)
{
    $sql = "SELECT * FROM san_pham WHERE ma_sp = ?";
    return pdo_query($sql, $ma_sp);
}
// slideshow 
function slideshow(){
    $sql = "SELECT * FROM san_pham WHERE dac_biet = 1 ";
    return pdo_query($sql);
}