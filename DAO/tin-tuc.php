<?php
    function tin_tuc_insert($tieu_de,$mo_ta_tin_tuc,$hinh_tin_tuc,$noi_dung_tin_tuc){
        $sql = "INSERT INTO tin_tuc VALUES (null,?,?,?,?)";
        pdo_execute($sql,$tieu_de,$mo_ta_tin_tuc,$hinh_tin_tuc,$noi_dung_tin_tuc);
    }

    function tin_tuc_delete($ma_tin_tuc) {
        $sql = "DELETE FROM tin_tuc WHERE ma_tin_tuc = ?";
        pdo_execute($sql,$ma_tin_tuc);
    }

    function tin_tuc_update($tieu_de,$mo_ta_tin_tuc,$hinh_tin_tuc,$noi_dung_tin_tuc,$ma_tin_tuc){
        $sql = "UPDATE tin_tuc SET tieu_de=?,mo_ta_tin_tuc=?,hinh_tin_tuc=?,noi_dung_tin_tuc=? WHERE ma_tin_tuc = ?";
        pdo_execute($sql,$tieu_de,$mo_ta_tin_tuc,$hinh_tin_tuc,$noi_dung_tin_tuc,$ma_tin_tuc);
    }
    function tin_tuc_selectall(){
        $sql = "SELECT * FROM tin_tuc ORDER BY ma_tin_tuc DESC";
        return pdo_query($sql); 
    }
    function tin_tuc_info($ma_tin_tuc){
        $sql = "SELECT * FROM tin_tuc WHERE ma_tin_tuc = ?";
        return pdo_query_one($sql,$ma_tin_tuc);
    }
    // select by tin tuc
    function bl_select_by_tin_tuc($ma_tin_tuc){
        // $sp_tung_trang = 9;
        // if (!isset($_GET['page'])) {
        //     $trang = 1;
        // } else {
        //     $trang = $_GET['page'];
        // }
        // $tung_trang =  ($trang - 1) * $sp_tung_trang;
    
        $sql = "SELECT b.*,t.* FROM binh_luan b JOIN tin_tuc t ON b.ma_tin_tuc = t.ma_tin_tuc
        WHERE b.ma_tin_tuc=? ORDER BY ma_bl DESC";
        // $sql = "SELECT b.*,t.tin_tuc FROM binh_luan b JOIN tin_tuc t ON h.ma_sp = b.ma_sp
        // WHERE b.ma_sp=? ORDER BY ma_bl DESC LIMIT $tung_trang,$sp_tung_trang";
        return pdo_query($sql, $ma_tin_tuc);
    }
    function tin_tuc_selectlimit(){
        $sql = "SELECT * FROM tin_tuc ORDER BY ma_tin_tuc DESC LIMIT 0,3";
        return pdo_query($sql); 
    }
    // thông kê bình luanạ của tin tức tin tức
    function thong_ke_bl_tt(){
        $sql = "SELECT tt.ma_tin_tuc, tt.tieu_de, COUNT(*) AS so_luong, MIN(bl.ngay_bl) AS bl_cu_nhat, MAX(bl.ngay_bl) AS bl_moi_nhat FROM binh_luan bl 
        INNER JOIN tin_tuc tt ON bl.ma_tin_tuc = tt.ma_tin_tuc 
        GROUP BY tt.ma_tin_tuc, tt.tieu_de HAVING so_luong > 0 ORDER BY tt.ma_tin_tuc DESC";
        return pdo_query($sql);
    }
    // Đếm bình luận
    function count_tin_tuc(){
        $sql = "SELECT COUNT(*) FROM tin_tuc";
        return pdo_query_value($sql); 
    }
    // Phân trang bình luận
    function phan_trang_tin_tuc(){
        $tin_tuc_tung_trang = 10;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang =  ($trang - 1) * $tin_tuc_tung_trang;
        $sql = "SELECT * FROM tin_tuc  ORDER BY ma_tin_tuc DESC LIMIT $tung_trang,$tin_tuc_tung_trang";
        return pdo_query($sql);
    }
?>