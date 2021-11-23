<?php 
    // select tất cả phiếu nhập
    function phieu_nhap_selectall()
    {
        $sql = "SELECT * FROM phieu_nhap ORDER by ma_pn DESC";
        return pdo_query($sql);
    }

    // lấy thông tin của 1 phiếu nhập 
    function phieu_nhap_getinfo($ma_pn)
    {
        $sql = "SELECT * FROM phieu_nhap WHERE ma_pn =?";
        return pdo_query_one($sql, $ma_pn);
    }
    // Lấy thông tin chi tiết phiếu nhập
    function pn_ct_get_info($ma_pn)
    {
        $sql = "SELECT * FROM chi_tiet_phieu_nhap WHERE ma_pn = ?";
        return pdo_query_one($sql, $ma_pn);
    }

    // Thêm phiếu nhập mới
    function phieu_nhap_insert( $ngay_nhap, $ma_ncc)
    {
        $sql = "INSERT INTO phieu_nhap(ngay_nhap, ma_ncc) VALUES(?,?)";
        pdo_execute($sql,$ngay_nhap,$ma_ncc);
    }
    
    // Thêm chi tiết phiếu nhập
    function chi_tiet_pn_insert($ma_pn, $ma_sp, $so_luong_nhap, $gia)
    {
        $sql = "INSERT INTO chi_tiet_phieu_nhap (ma_pn, ma_sp, so_luong_nhap, gia) VALUES (?,?,?,?)";
        pdo_execute($sql, $ma_pn, $ma_sp, $so_luong_nhap, $gia);
    }

    // xoá phiếu nhập
    function phieu_nhap_delete($ma_pn)
    {
        $sql = "DELETE FROM phieu_nhap WHERE ma_pn = ?";
        pdo_execute($sql, $ma_pn);
    }

    // xóa phiếu nhập chi tiết
    function phieu_nhap_ct_delete($id)
    {
        $sql = "DELETE FROM chi_tiet_phieu_nhap WHERE id = ?";
        pdo_execute($sql, $id);
    }

    // cập nhật phiếu nhập
    function phieu_nhap_update($ngay_nhap, $ma_ncc,$ma_pn)
    {
        $sql = "UPDATE phieu_nhap
        SET ngay_nhap=?,ma_ncc=? WHERE ma_pn=?";
        pdo_execute($sql,$ngay_nhap, $ma_ncc,$ma_pn);
    }

    // phieu nhap chi tiet update
    function chi_tiet_pn_update($ma_sp, $so_luong_nhap, $gia, $ma_ct_pn)
    {
        $sql = "UPDATE chi_tiet_phieu_nhap SET ma_sp = ?, so_luong_nhap = ?, gia = ? WHERE ma_ct_pn = ?";
        pdo_execute($sql, $ma_sp, $so_luong_nhap, $gia, $ma_ct_pn);
    }

    // đếm số lượng phiếu nhập
    function phieu_nhap_count()
    {
        $sql = "SELECT COUNT(*) as total  FROM phieu_nhap WHERE ma_pn";
        return pdo_query($sql);
    }

?>