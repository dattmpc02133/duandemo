<?php 
function san_pham_selectall()
{
    $sql = "SELECT * FROM san_pham ORDER BY ma_sp DESC";
    return pdo_query($sql);
}

// lấy thông tin 1 mã sản phẩm
function san_pham_getinfo($ma_sp)
{
    $sql = "SELECT * FROM san_pham WHERE ma_sp =?";
    return pdo_query_one($sql, $ma_sp);
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
    $mo_ta)
{
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
    $sql = "SELECT * FROM san_pham WHERE ma_loai = ?";
    return  pdo_query($sql, $ma_loai);
}

// phân trang count 
function phan_trang_count()
{
    $sql = "SELECT COUNT(*) FROM san_pham";
    return pdo_query_value($sql);
}

// sản phẩm phân trang
function phan_trang()
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
function san_pham_select_by_keyword($keyword)
{
    $sql = "SELECT * FROM san_pham a INNER JOIN  loai b ON b.ma_loai = a.ma_loai 
    WHERE ten_sp LIKE ? OR ten_loai LIKE ? ";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}
// cập nhật sản phẩm
function update_sp( $ten_sp, 
                    $don_gia, 
                    $giam_gia, 
                    $hinh, 
                    $so_luong, 
                    $trang_thai, 
                    $dac_biet, 
                    $so_luot_mua, 
                    $ma_loai,
                    $mo_ta, 
                    $ma_sp)
{
    $sql = "UPDATE san_pham 
    SET ten_sp=?,don_gia=?,giam_gia=?,hinh=?,so_luong=?,trang_thai=?,dac_biet=?,so_luot_mua=?,ma_loai=?,mo_ta = ? WHERE ma_sp=?";
    pdo_execute($sql, 
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
                $ma_sp);
}
// sản phẩm update số lượng
function sp_update_so_luong_nhap($so_luong, $ma_sp)
{
    $sql = "UPDATE san_pham SET so_luong = so_luong + ? WHERE ma_sp = ?";
    pdo_execute($sql, $so_luong, $ma_sp);
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
function san_pham_khuyen_mai(){
    $sql = "SELECT * FROM san_pham WHERE giam_gia > 0";
    return pdo_query($sql);
}
// sản phẩm mới
function select_product_new(){
    $sql = "SELECT * FROM san_pham sp INNER JOIN loai l on sp.ma_loai = l.ma_loai WHERE sp.ma_loai = 9";
    return pdo_query($sql);
}


?>
