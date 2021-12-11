<?php
    function cart_insert($ma_kh,$ma_sp,$hinh,$ten_sp,$don_gia,$so_luong){
        $sql = "INSERT INTO gio_hang_tam (ma_kh,ma_sp_tam,hinh_tam,ten_sp_tam,don_gia_tam,so_luong_tam) VALUES (?,?,?,?,?,?)";
        pdo_execute($sql,$ma_kh,$ma_sp,$hinh,$ten_sp,$don_gia,$so_luong);
    }
    function cart_select_ma_kh($ma_kh){
        $sql = "SELECT * FROM gio_hang_tam WHERE ma_kh = ?";
        return pdo_query($sql,$ma_kh);
    }
    function car_delete($id){
        $sql = "DELETE FROM gio_hang_tam WHERE id = ? ";
        pdo_execute($sql,$id);
    }
    function san_pham_getinfo_tam($ma_sp)
{
    $sql = "SELECT * FROM gio_hang_tam WHERE ma_sp_tam =?";
    return pdo_query_one($sql, $ma_sp);
}
function cart_update_so_luong($them,$ma_sp){
    $sql = "UPDATE gio_hang_tam SET so_luong_tam = so_luong_tam + ? WHERE ma_sp_tam = ?";
    pdo_execute($sql,$them,$ma_sp);
}

// đếm số lượng sản phẩm trong giỏ hàng 
        function cart_count()
        {
            $sql = "SELECT COUNT(*) as total  FROM gio_hang_tam WHERE ma_kh";
            return pdo_query($sql);
        }
        // hiển thị số lượng theo mã khách hàng
        function cart_count_ma_kh($ma_kh)
        {
            $sql = "SELECT COUNT(*) as total  FROM gio_hang_tam WHERE ma_kh = ?";
            return pdo_query($sql,$ma_kh);
        }
        // đếm sản phẩm trong giỏ hàng theo mã khách hàng
        
// hóa đơn chi tiết (khách hàng)
function hoa_don_kh($ma_hd){
    $sql = "SELECT a.*,b.ten_sp,b.hinh FROM hoa_don_chi_tiet a INNER JOIN san_pham b ON a.ma_sp = b.ma_sp WHERE a.ma_hd = ?";
    return pdo_query($sql,$ma_hd);
}
//  
function count_cart_temp($ma_kh){
    $sql = "SELECT COUNT(*) FROM gio_hang_tam WHERE ma_kh = ?";
    return pdo_query_value($sql, $ma_kh);
}
?>