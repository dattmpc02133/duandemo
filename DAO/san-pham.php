<?php 
function hang_hoa_selectall()
{
    $sql = "SELECT * FROM san_pham ORDER BY ma_sp DESC";
    return pdo_query($sql);
}

// lấy thông tin 1 mã sản phẩm
function hang_hoa_getinfo($ma_hh)
{
    $sql = "SELECT * FROM san_pham WHERE ma_sp =?";
    return pdo_query_one($sql, $ma_hh);
}

// Thêm sản phẩm mới
function hang_hoa_insert(
    $ten_sp, 
    $don_gia, 
    $giam_gia, 
    $hinh, 
    $ngay_nhap, 
    $so_luong, 
    $mo_ta, 
    $trang_thai, 
    $dac_biet, 
    $luot_xem, 
    $ma_loai)
{
    $sql = "INSERT INTO hang_hoa(ten_sp,don_gia,giam_gia,hinh,ngay_nhap,so_luong,mo_ta,trang_thai,dac_biet,so_luot_xem,ma_loai) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    // gọi lại hàm thực thi, tương tác dữ liệu
    pdo_execute(
        $sql,
        $ten_sp,
        $don_gia,
        $giam_gia,
        $hinh,
        $ngay_nhap,
        $so_luong,
        $mo_ta,
        $trang_thai,
        $dac_biet,
        $luot_xem,
        $ma_loai
    );
}

// hàng hóa theo loại
function hang_hoa_select_by_loai($ma_loai)
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
function san_pham_delete($ma_hh)
{
    $sql = "DELETE FROM san_pham WHERE ma_sp = ?";
    pdo_execute($sql, $ma_hh);
}
// hiển thị hàng hóa theo keywwords
function san_pham_select_by_keyword($keyword)
{
    $sql = "SELECT * FROM san_pham a INNER JOIN  loai b ON b.ma_loai = a.ma_loai 
    WHERE ten_sp LIKE ? OR ten_loai LIKE ? ";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}
// cập nhật sản phẩm
function update_hh(
$ten_sp, 
$don_gia, 
$giam_gia, 
$hinh, 
$ngay_nhap, 
$so_luong , 
$mo_ta, 
$trang_thai, 
$dac_biet, 
$so_luot_xem, 
$ma_loai, 
$ma_sp)
{
    $sql = "UPDATE san_pham 
    SET ten_sp=?,don_gia=?,giam_gia=?,hinh=?,ngay_nhap=?,so_luong = ?,mo_ta=?,trang_thai=?,dac_biet=?,so_luot_xem=?,ma_loai=? WHERE ma_sp=?";
    pdo_execute($sql, 
    $ten_sp, 
    $don_gia, 
    $giam_gia, 
    $hinh, 
    $ngay_nhap, 
    $so_luong , 
    $mo_ta, 
    $trang_thai, 
    $dac_biet, 
    $so_luot_xem, 
    $ma_loai, 
    $ma_sp);
}
// số lượt lượt xem
function san_pham_so_luot_luot_xem($ma_sp)
{
    $sql = "UPDATE san_pham SET so_luot_xem = so_luot_xem + 1 WHERE ma_sp = ? ";
    pdo_execute($sql, $ma_sp);
}
// đếm số lượng hàng hóa
function product_count()
{
    $sql = "SELECT COUNT(*) as total  FROM san_pham WHERE ma_sp";
    return pdo_query($sql);
}
?>
