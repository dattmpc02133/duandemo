<?php
    function cart_insert($ma_kh,$ma_sp,$hinh,$ten_sp,$don_gia,$so_luong){
        $sql = "INSERT INTO gio_hang_tam (ma_kh,ma_sp,hinh,ten_sp,don_gia,so_luong) VALUES (?,?,?,?,?,?)";
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
    $sql = "SELECT * FROM gio_hang_tam WHERE ma_sp =?";
    return pdo_query_one($sql, $ma_sp);
}
function cart_update_so_luong($them,$ma_sp){
    $sql = "UPDATE gio_hang_tam SET so_luong = so_luong + ? WHERE ma_sp = ?";
    pdo_execute($sql,$them,$ma_sp);
}
?>