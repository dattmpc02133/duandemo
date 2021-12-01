<?php
// Truy vấn danh sách
function khach_hang_selectAll()
{
    $sql = "SELECT * FROM khach_hang ORDER BY ma_kh";
    return pdo_query($sql);
}

// Thêm
function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $dia_chi, $kich_hoat, $hinh, $email,$sdt, $vai_tro)
{
    $sql = "INSERT INTO khach_hang VALUES(?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ma_kh, $mat_khau, $ho_ten, $dia_chi, $kich_hoat, $hinh, $email,$sdt, $vai_tro);
}

// Xóa
function khach_hang_delete($ma_kh)
{
    $sql = "DELETE FROM khach_hang WHERE ma_kh=?";
    pdo_execute($sql, $ma_kh);
}

// Lấy thông tin
function get_info_kh($ma_kh)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
    return pdo_query_one($sql, $ma_kh);
}

// Cập nhật admin
function khach_hang_update($mat_khau, $ho_ten, $dia_chi, $kich_hoat, $hinh, $email, $vai_tro, $ma_kh)
{
    $sql = "UPDATE khach_hang SET mat_khau=?,ho_ten=?,dia_chi=?,kich_hoat=?,hinh=?,email=?,vai_tro=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau, $ho_ten, $dia_chi, $kich_hoat, $hinh, $email, $vai_tro, $ma_kh);
}

// cập nhật vai trò khách
function cap_nhat_tai_khoang_vai_tro_khach($ho_ten, $dia_chi, $hinh, $email, $ma_kh)
{
    $sql = "UPDATE khach_hang SET ho_ten = ?, dia_chi = ?, hinh = ?, email = ? WHERE ma_kh = ?";
    pdo_execute($sql, $ho_ten, $dia_chi, $hinh, $email, $ma_kh);
}

// // cập nhật thông tin
// function kh_update($ho_ten, $dia_chi, $hinh, $email, $ma_kh)
// {
//     $sql = "UPDATE khach_hang SET ho_ten = ?, dia_chi = ?, hinh = ?, email = ? WHERE ma_kh = ?";
//     pdo_execute($sql, $ho_ten, $dia_chi, $hinh, $email, $ma_kh);
// }
// cập nhật mật khẩu
function kh_update_mat_khau($mat_khau, $ma_kh)
{
    $sql = "UPDATE khach_hang SET mat_khau = ? WHERE ma_kh  = ?";
    pdo_execute($sql, $mat_khau, $ma_kh);
}

// kiểm tra tồn tại của tài khoảng
function khach_hang_exist($ma_kh)
{
    $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

// vai trò của tải khoảng
function khach_hang_select_by_role($vai_tro)
{
    $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
    return pdo_query($sql, $vai_tro);
}
