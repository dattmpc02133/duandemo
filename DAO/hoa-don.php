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
        // xử lý khi xóa sản phẩm hóa đơn chi tiết
    function update_tong_tien_delete_hdct($tien_tru,$ma_hd){
        $sql = "UPDATE hoa_don SET tong_tien = tong_tien - ? WHERE ma_hd = ?";
        pdo_execute($sql, $tien_tru, $ma_hd);
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
    // Chọn các trạng thái hóa đơn not in
    function hoa_don_get_trang_thai($trang_thai)
    {
        $sql = 'SELECT * FROM trang_thai_hoa_don WHERE ma_trang_thai NOT IN (?)';
        return pdo_query($sql, $trang_thai);
    }

    // select hoa_don_huy_by_kh
    function hoa_don_huy_by_kh($ma_kh){
        $sql = "SELECT COUNT(*) AS so_don_huy FROM hoa_don a INNER JOIN khach_hang b ON a.ma_kh = b.ma_kh WHERE a.ma_kh = ? AND a.trang_thai = 4" ;
        return pdo_query_value($sql,$ma_kh);
    }
    // select hoa_don_thanh_cong
    function hoa_don_thanh_cong($ma_kh){
        $sql = "SELECT COUNT(*) AS so_don_huy FROM hoa_don a INNER JOIN khach_hang b ON a.ma_kh = b.ma_kh WHERE a.ma_kh = ? AND a.trang_thai = 3";
        return pdo_query_value($sql,$ma_kh);
    }
    
    // select hd cho xac nhan
    function hoa_don_cho_xac_nhan($ma_kh){
        $sql = "SELECT * FROM hoa_don WHERE ma_kh = ?  AND trang_thai = 1";
        return pdo_query($sql,$ma_kh);
    }
    // select hd dang giao
    function hoa_don_dang_giao($ma_kh){
        $sql = "SELECT * FROM hoa_don WHERE ma_kh = ?  AND trang_thai = 2";
        return pdo_query($sql,$ma_kh);
    }
    // select hd da huy
    function hoa_don_da_huy($ma_kh){
        $sql = "SELECT * FROM hoa_don WHERE ma_kh = ?  AND trang_thai = 4";
        return pdo_query($sql,$ma_kh);
    }
    // select hd giao thanh cong
    function hoa_don_giao_thanh_cong($ma_kh){
        $sql = "SELECT * FROM hoa_don WHERE ma_kh = ?  AND trang_thai = 3";
        return pdo_query($sql,$ma_kh);
    }

    // Đếm số đơn theo khách hàng và trạng thái
    function count_hoa_don_by_kh_and_trang_thai($ma_kh, $trang_thai){
        $sql = "SELECT COUNT(*) FROM hoa_don WHERE ma_kh = ? AND trang_thai = ?";
        return pdo_query_value($sql, $ma_kh, $trang_thai);
    }

    // Đếm số hóa đơn
    function count_hd(){
        $sql = "SELECT COUNT(*) FROM hoa_don";
        return pdo_query_value($sql);
        
    }
    // Phân trang hóa đơn
    function phan_trang_hd(){
        $hd_tung_trang = 10;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang =  ($trang - 1) * $hd_tung_trang;
        $sql = "SELECT * FROM hoa_don  ORDER BY ma_hd DESC LIMIT $tung_trang, $hd_tung_trang";
        return pdo_query($sql);
    }

    // Đếm hóa đơn chi tiết
    function count_hdct($ma_hd){
        $sql = "SELECT COUNT(*) FROM hoa_don_chi_tiet WHERE ma_hd = ?";
        return pdo_query_value($sql, $ma_hd);
    }

    // Phân trang hóa đơn chi tiết
    function phan_trang_hdct($ma_hd){
        $sp_tung_trang = 10;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang =  ($trang - 1) * $sp_tung_trang;
        $sql = "SELECT hd.*,hdct.*, sp.ten_sp FROM hoa_don_chi_tiet hdct INNER JOIN hoa_don hd ON hd.ma_hd = hdct.ma_hd 
                INNER JOIN san_pham sp ON hdct.ma_sp = sp.ma_sp 
                WHERE hdct.ma_hd = ? 
                ORDER BY id DESC 
                LIMIT $tung_trang,$sp_tung_trang";
        return pdo_query($sql, $ma_hd);
    }
?>