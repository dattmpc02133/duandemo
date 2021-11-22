<?php 
    // select tất cả phiếu nhập
    function nhieu_nhap_selectall()
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

    // Thêm phiếu nhập mới
    function phieu_nhap_insert( $ngay_nhap, $ma_ncc)
    {
        $sql = "INSERT INTO phieu_nhap VALUES(?,?)";
        // gọi lại hàm thực thi, tương tác dữ liệu
        pdo_execute($sql,$ngay_nhap,$ma_ncc);
    }

    // xóa phiếu nhập
    function phieu_nhap_delete($ma_pn)
    {
        $sql = "DELETE FROM phieu_nhap WHERE ma_pn = ?";
        pdo_execute($sql, $ma_pn);
    }

    // cập nhật phiếu nhập
    function phieu_nhap_update($ngay_nhap, $ma_ncc,$ma_pn)
    {
        $sql = "UPDATE phieu_nhap
        SET ngay_nhap=?,ma_ncc=? WHERE ma_pn=?";
        pdo_execute($sql,$ngay_nhap, $ma_ncc,$ma_pn);
    }

    // đếm số lượng phiếu nhập
    function product_count()
    {
        $sql = "SELECT COUNT(*) as total  FROM phieu_nhap WHERE ma_pn";
        return pdo_query($sql);
    }

?>