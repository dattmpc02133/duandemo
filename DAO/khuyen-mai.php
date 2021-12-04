<?php
    // Đổ dữ liệu mã khuyến mãi
    function ma_km_selectAll()
    {
        $sql = "SELECT * FROM khuyen_mai ORDER BY ma_km DESC";
        return pdo_query($sql);
    }
    function ma_km_update($ma_km, $ma_kh_ap_dung, $so_phan_tram_giam, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old)
    {
        $sql = "UPDATE khuyen_mai SET ma_km = ?, ma_kh_ap_dung = ?, so_phan_tram_giam = ?, ngay_bat_dau = ?, ngay_ket_thuc = ? WHERE ma_km = ?";
        pdo_execute($sql, $ma_km, $ma_kh_ap_dung, $so_phan_tram_giam, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old);
    }
    function ma_km_get_info($ma_km)
    {
        $sql = "SELECT * FROM khuyen_mai WHERE ma_km = ?";
        return pdo_query_one($sql, $ma_km);
    }
    // Thêm mã khuyến mãi
    function ma_km_insert($ma_km, $ma_kh_ap_dung, $so_phan_tram_giam, $ngay_bat_dau, $ngay_ket_thuc)
    {
        $sql = "INSERT INTO khuyen_mai (ma_km, ma_kh_ap_dung, so_phan_tram_giam, ngay_bat_dau, ngay_ket_thuc) VALUES (?, ?, ?, ? ,?)";
        pdo_execute($sql, $ma_km, $ma_kh_ap_dung, $so_phan_tram_giam, $ngay_bat_dau, $ngay_ket_thuc);
    }
    //Xóa mã khuyến mãi
    function ma_km_delete($ma_km)
    {
        $sql = "DELETE FROM khuyen_mai WHERE ma_km = ?";
        pdo_execute($sql, $ma_km);
    }
?>