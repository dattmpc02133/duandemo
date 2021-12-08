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
    // Lấy thông tin chi tiết 1 phiếu nhập
    function pn_ct_get_info($ma_ct_pn)
    {
        $sql = "SELECT * FROM chi_tiet_phieu_nhap WHERE ma_ct_pn = ?";
        return pdo_query_one($sql, $ma_ct_pn);
    }
    // Lấy các chi tiết của 1 phiếu nhập
    function get_ct_1_pn($ma_pn)
    {
        $sql = "SELECT * FROM chi_tiet_phieu_nhap WHERE ma_pn = ?";
        return pdo_query($sql, $ma_pn);
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

    // Đếm phiếu nhập
    function count_pn(){
        $sql = "SELECT COUNT(*) FROM phieu_nhap";
        return pdo_query_value($sql);
    }

    // Phân trang phiếu nhập
    function phan_trang_pn(){
        $pn_tung_trang = 10;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang =  ($trang - 1) * $pn_tung_trang;
        $sql = "SELECT * FROM phieu_nhap  ORDER BY ma_pn DESC LIMIT $tung_trang,$pn_tung_trang";
        return pdo_query($sql);
    }

    // Đếm phiếu nhập chi tiết
    function count_pnct($ma_pn){
        $sql = "SELECT COUNT(*) FROM chi_tiet_phieu_nhap WHERE ma_pn = ?";
        return pdo_query_value($sql, $ma_pn);
    }

    // Phân trang phiếu nhập chi tiết
    function phan_trang_pnct($ma_pn){
        $pnct_tung_trang = 10;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang =  ($trang - 1) * $pnct_tung_trang;
        $sql = "SELECT * FROM chi_tiet_phieu_nhap WHERE ma_pn = ? ORDER BY ma_ct_pn DESC LIMIT $tung_trang,$pnct_tung_trang";
        return pdo_query($sql, $ma_pn);
    }
?>