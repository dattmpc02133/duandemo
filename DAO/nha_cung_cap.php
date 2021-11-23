<?php 

function nha_cung_cap_selectall()
{
    $sql = "select * from nha_cung_cap order by ma_ncc DESC";
    return pdo_query($sql);
}

// thêm nhà cung cấp
function nha_cung_cap_insert($dia_chi,$sdt,$email){
    $sql = "INSERT INTO nha_cung_cap(dia_chi, sdt, email) VALUES(?,?,?) ";
    pdo_execute($sql, $dia_chi, $sdt, $email);
}
// update nhà cung cấp
function nha_cung_cap_update($dia_chi,$sdt,$email){
    $sql = "UPDATE nha_cung_cap SET dia_chi = ?, sdt = ?, email = ?";
    pdo_execute($sql, $dia_chi, $sdt, $email);
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
?>