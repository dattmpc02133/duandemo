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
    function hoa_don_update($dia_chi_giao_hang, $trang_thai, $ma_hd)
    {
        $sql = "UPDATE hoa_don SET dia_chi_giao_hang = ?, trang_thai = ? WHERE ma_hd = ?";
        pdo_execute($sql, $dia_chi_giao_hang, $trang_thai, $ma_hd);
    }
    function hoa_don_chi_tiet_update($so_luong, $id)
    {
        $sql = "UPDATE hoa_don_chi_tiet SET so_luong = ? WHERE id = ?";
                // UPDATE hoa_don_chi_tiet SET so_luong = 2 WHERE id = 5
        pdo_execute($sql,$so_luong, $id);
    }
    function update_tong_tien_hd($tien_tru, $thanh_tien, $ma_hd){
        $sql = "UPDATE hoa_don SET tong_tien = tong_tien - ? + ? WHERE ma_hd = ?";
        pdo_execute($sql, $tien_tru, $thanh_tien, $ma_hd);
    }
        // Xóa sản phẩm khi khách hàng muốn bỏ sản phẩm đó khỏi đơn hàng
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
    function get_info_id_hdct($id)
    {
        $sql = "SELECT * FROM hoa_don_chi_tiet WHERE id = ?";
        return pdo_query_one($sql, $id);
    }
    // Lấy tất cả sản phẩm trong giỏ hàng của một khách hàng
    function get_ma_sp_gio_hang_tam($ma_kh)
    {
        $sql = "SELECT * FROM gio_hang_tam WHERE ma_kh = ?";
        return pdo_query($sql, $ma_kh);
    }
    // Xóa giỏ hàng tạm sau khi đặt hàng thành công !
    function delete_all_gio_hang_tam(){
        $sql = "DELETE FROM gio_hang_tam";
        pdo_execute($sql);
    }
    // 

    // xóa hóa đơn
    // function hoa_don_delete($ma_hd)
    // {
    //     $sql = "DELETE FROM hoa_don WHERE ma_hd = ?";
    //     pdo_execute($sql, $ma_hd);
    // }
    //

    // hóa đơn khách hàng
    function hoa_don_ma_kh($ma_kh){
        $sql = "SELECT ma_hd,tong_tien,dia_chi_giao_hang,ngay_dat,trang_thai FROM hoa_don WHERE ma_kh = ?";
        return pdo_query($sql,$ma_kh);
    }
?>