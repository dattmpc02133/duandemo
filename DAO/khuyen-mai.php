<?php
    // Đổ dữ liệu mã khuyến mãi
    function ma_km_selectAll()
    {
        $sql = "SELECT * FROM khuyen_mai ORDER BY ma_km DESC";
        return pdo_query($sql);
    }
    // Đổ dữ liệu chi tiết
    function ma_km_ct_selectAll($ma_km)
    {
        $sql = "SELECT * FROM khuyen_mai_ct WHERE ma_km = ?";
        return pdo_query($sql, $ma_km);
    }
    function ma_km_update($ma_km, $mo_ta_km, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old)
    {
        $sql = "UPDATE khuyen_mai SET ma_km = ?, mo_ta_km = ?, ngay_bat_dau = ?, ngay_ket_thuc = ? WHERE ma_km = ?";
        pdo_execute($sql, $ma_km, $mo_ta_km, $ngay_bat_dau, $ngay_ket_thuc, $ma_km_old);
    }
    function ma_km_get_info($ma_km)
    {
        $sql = "SELECT * FROM khuyen_mai WHERE ma_km = ?";
        return pdo_query_one($sql, $ma_km);
    }
    // Thêm mã khuyến mãi
    function ma_km_insert($ma_km, $mo_ta_km, $ngay_bat_dau, $ngay_ket_thuc)
    {
        $sql = "INSERT INTO khuyen_mai (ma_km, mo_ta_km, ngay_bat_dau, ngay_ket_thuc) VALUES (?, ?, ? ,?)";
        pdo_execute($sql, $ma_km, $mo_ta_km, $ngay_bat_dau, $ngay_ket_thuc);
    }
    // Thêm chi tiết khuyến mãi
    function ma_km_ct_insert($ma_km, $ma_sp)
    {
        $sql = "INSERT INTO khuyen_mai_ct (ma_km, ma_sp) VALUES (?, ?)";
        pdo_execute($sql, $ma_km, $ma_sp);
    }
    // Lấy mã sản phẩm từ bảng khuyến mãi chi tiết
    function ma_sp_select_by_ma_km($ma_km)
    {
        $sql = "SELECT ma_sp FROM khuyen_mai_ct WHERE ma_km = ?";
        return pdo_query($sql, $ma_km);
    }
    //Xóa mã khuyến mãi
    function ma_km_delete($ma_km)
    {
        $sql = "DELETE FROM khuyen_mai WHERE ma_km = ?";
        pdo_execute($sql, $ma_km);
    }
    //Xóa chi tiết khuyến mãi
    function ct_km_delete($id)
    {
        $sql = "DELETE FROM khuyen_mai_ct WHERE id = ?";
        pdo_execute($sql, $id);
    }
?>