<?php 
    // Khách đặt hàng
    function hoa_don_insert($ma_kh, $tong_tien, $dia_chi_giao_hang, $ngay_dat, $trang_thai)
    {
        $sql = "INSERT INTO hoa_don (ma_kh, tong_tien, dia_chi_giao_hang, ngay_dat, trang_thai) VALUES (?, ?, ?, ?, ?)";
        pdo_execute($sql, $ma_kh, $tong_tien, $dia_chi_giao_hang, $ngay_dat, $trang_thai);
    }
    function hoa_don_chi_tiet_insert($ma_hd, $ma_sp, $gia_ban, $so_luong)
    {
        $sql = "INSERT INTO hoa_don_chi_tiet (ma_hd, ma_sp, gia_ban, so_luong) VALUES (?, ?, ?, ?)";
        pdo_execute($sql, $ma_hd, $ma_sp, $gia_ban, $so_luong);  
    }
    //
    
    // Cập nhật trạng thái hóa đơn
        function update_trang_thai_hd($trang_thai, $ma_hd)
        {
            $sql = "UPDATE hoa_don SET trang_thai = ? WHERE ma_hd = ?";
            pdo_execute($sql, $trang_thai, $ma_hd);
        }
    // 

    // Sửa hóa đơn theo khách yêu cầu
    function hoa_don_update($tong_tien, $dia_chi_giao_hang, $trang_thai, $ma_hd)
    {
        $sql = "UPDATE hoa_don SET tong_tien = ?, dia_chi_giao_hang = ?, trang_thai = ? WHERE ma_hd = ?";
        pdo_execute($sql, $tong_tien, $dia_chi_giao_hang, $trang_thai, $ma_hd);
    }
    function hoa_don_chi_tiet_update($ma_sp, $gia_ban, $so_luong)
    {
        $sql = "UPDATE hoa_don_chi_tiet SET ma_sp = ?, gia_ban = ?, so_luong = ? WHERE id = ?";
        pdo_execute($sql, $ma_sp, $gia_ban, $so_luong);
    }
        // Xóa sản phẩm khi khách hàng bỏ sản phẩm đó khỏi đơn hàng
    function hoa_don_chi_tiet_delete($id)
    {
        $sql = "DELETE FROM hoa_don_chi_tiet WHERE id = ?";
        pdo_execute($sql, $id);
    }
        //
    //

    // Hiển thị hóa đơn
    function hoa_don_select_all(){
        $sql = "SELECT * FROM hoa_don ORDER BY ma_hd DESC";
        return pdo_query($sql);
    }
    function hoa_don_chi_tiet_select_by_ma_hd($ma_hd)
    {
        $sql = "SELECT hd.*,hdct.*, sp.ten_sp FROM hoa_don_chi_tiet hdct INNER JOIN hoa_don hd ON hd.ma_hd = hdct.ma_hd 
                                                                         INNER JOIN san_pham sp ON hdct.ma_sp = sp.ma_sp 
                                                                         WHERE hdct.ma_hd = ?";
        return pdo_query($sql, $ma_hd);
    }
    // 

    // Lấy thông tin
    function hoa_don_get_info($ma_hd)
    {
        $sql = "SELECT * FROM hoa_don WHERE ma_hd = ?";
        return pdo_query_one($sql, $ma_hd);
    }
    function get_ma_hd(){
        $sql = "SELECT ma_hd FROM hoa_don ORDER BY ma_hd DESC LIMIT 0,1";
        return pdo_query_value($sql);
    }
    // 

    // xóa hóa đơn
    // function hoa_don_delete($ma_hd)
    // {
    //     $sql = "DELETE FROM hoa_don WHERE ma_hd = ?";
    //     pdo_execute($sql, $ma_hd);
    // }
    //
?>