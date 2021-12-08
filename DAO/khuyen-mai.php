<?php
    // Đổ dữ liệu mã khuyến mãi
    function ma_km_selectAll()
    {
        $sql = "SELECT * FROM khuyen_mai ORDER BY ma_km";
        return pdo_query($sql);
    }
    function ma_km_update($ma_km, $loai_km, $muc_giam, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old)
    {
        $sql = "UPDATE khuyen_mai SET ma_km = ?, loai_km = ?, muc_giam = ?, ngay_bat_dau = ?, ngay_ket_thuc = ? WHERE ma_km = ?";
        pdo_execute($sql, $ma_km, $loai_km, $muc_giam, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old);
    }
    function ma_km_get_info($ma_km)
    {
        $sql = "SELECT * FROM khuyen_mai WHERE ma_km = ?";
        return pdo_query_one($sql, $ma_km);
    }
    // Thêm mã khuyến mãi
    function ma_km_insert($ma_km, $loai_km, $muc_giam, $ngay_bat_dau, $ngay_ket_thuc)
    {
        $sql = "INSERT INTO khuyen_mai (ma_km, loai_km, muc_giam, ngay_bat_dau, ngay_ket_thuc) VALUES (?, ?, ?, ?, ?)";
        pdo_execute($sql, $ma_km, $loai_km, $muc_giam, $ngay_bat_dau, $ngay_ket_thuc);
    }
    //Xóa mã khuyến mãi
    function ma_km_delete($ma_km)
    {
        $sql = "DELETE FROM khuyen_mai WHERE ma_km = ?";
        pdo_execute($sql, $ma_km);
    }
    // Loại khuyến mãi select all
    function loai_km_select_all(){
        $sql = "SELECT * FROM loai_km";
        return pdo_query($sql);
    }
    // Lấy loại km
    function loai_km_get_in4($ma_loai_km){
        $sql = "SELECT * FROM loai_km WHERE ma_loai_km = ?";
        return pdo_query_one($sql, $ma_loai_km);
    }
    function loai_km_get_not_in($not_in){
        $sql = "SELECT * FROM loai_km WHERE ma_loai_km NOT IN (?)";
        return pdo_query($sql, $not_in);
    }
    // Lấy các khách hàng đã dùng mã km
    function kh_da_dung_get($ma_km){
        $sql = 'SELECT * FROM khach_hang_da_dung WHERE ma_km = ?';
        return pdo_query($sql , $ma_km);
    }

    // Kiểm tra khách hàng đã nhập mã khuyến mãi hay chưa
    function kh_da_dung_km($ma_kh_da_dung, $ma_km){
        $sql = "SELECT * FROM khach_hang_da_dung WHERE ma_kh_da_dung = ? AND ma_km = ?";
        return pdo_query_one($sql, $ma_kh_da_dung, $ma_km);
    }

    // Thêm khách hàng vào danh sách đã dùng sau khi áp dụng khuyến mãi thành công
    function khach_hang_da_dung_insert($ma_km, $ma_kh){
        $sql = "INSERT INTO khach_hang_da_dung (ma_km, ma_kh_da_dung) VALUES (?, ?)";
        pdo_execute($sql, $ma_km, $ma_kh);
    }

    // Đếm khuyến mãi
    function count_km(){
        $sql = "SELECT COUNT(*) FROM khuyen_mai";
        return pdo_query_value($sql);
    }

    // Đếm khuyến mãi chi tiết
    function count_kh_da_dung($ma_km){
        $sql = "SELECT COUNT(*) FROM khach_hang_da_dung WHERE ma_km = ?";
        return pdo_query_value($sql, $ma_km);
    }

    // Phân trang khuyến mãi
    function phan_trang_km(){
        $km_tung_trang = 10;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang =  ($trang - 1) * $km_tung_trang;
        $sql = "SELECT * FROM khach_hang_da_dung ORDER BY ma_km DESC LIMIT $tung_trang,$km_tung_trang";
        return pdo_query($sql);
    }

    // Phân trang khuyến mãi chi tiết
    function phan_trang_kh_da_dung($ma_km){
        $ctkm_tung_trang = 10;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang =  ($trang - 1) * $ctkm_tung_trang;
        $sql = "SELECT * FROM khach_hang_da_dung WHERE ma_km = ? LIMIT $tung_trang,$ctkm_tung_trang";
        return pdo_query($sql , $ma_km);
    }
?>