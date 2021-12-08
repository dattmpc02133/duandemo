<?php 
//
function nha_cung_cap_selectall()
{
    $sql = "select * from nha_cung_cap order by ma_ncc DESC";
    return pdo_query($sql);
}
// chọn nhà cung cấp update
function ncc_select_not($ma_ncc)
{
    $sql = "SELECT * FROM nha_cung_cap WHERE ma_ncc NOT IN (?) ORDER BY ma_ncc DESC";
    return pdo_query($sql, $ma_ncc);
}

// thêm nhà cung cấp
function nha_cung_cap_insert($ten_ncc,$dia_chi,$sdt,$email){
    $sql = "INSERT INTO nha_cung_cap(ten_ncc,dia_chi, sdt, email) VALUES(?,?,?,?) ";
    pdo_execute($sql, $ten_ncc ,$dia_chi, $sdt, $email);
}
// update nhà cung cấp
function nha_cung_cap_update($ten_ncc,$dia_chi,$sdt,$email,$ma_ncc){
    $sql = "UPDATE nha_cung_cap SET ten_ncc = ?, dia_chi = ?, sdt = ?, email = ? WHERE ma_ncc = ?";
    pdo_execute($sql,$ten_ncc, $dia_chi, $sdt, $email,$ma_ncc);
}
// xóa nhà cung cấp
function nha_cung_cap_delete($ma_ncc){
    $sql = "DELETE FROM nha_cung_cap WHERE ma_ncc = ?";
    pdo_execute($sql, $ma_ncc);
}
// lấy thông tin 1 mã nhà cung cấp
function nha_cung_cap_getinfo($ma_ncc)
{
    $sql = "SELECT * FROM nha_cung_cap WHERE ma_ncc=?";
    return pdo_query_one($sql, $ma_ncc);
}
// Đếm nhà cung cấp
function count_ncc(){
    $sql = "SELECT COUNT(*) FROM nha_cung_cap";
    return pdo_query_value($sql);
}
// Phân trang nhà cung cấp
function phan_trang_ncc(){
    $ncc_tung_trang = 10;
    if (!isset($_GET['page'])) {
        $trang = 1;
    } else {
        $trang = $_GET['page'];
    }
    $tung_trang =  ($trang - 1) * $ncc_tung_trang;
    $sql = "SELECT * FROM nha_cung_cap  ORDER BY ma_ncc DESC LIMIT $tung_trang,$ncc_tung_trang";
    return pdo_query($sql);
}
?>