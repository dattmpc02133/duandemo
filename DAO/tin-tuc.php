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
    function tin_tuc_selectlimit(){
        $sql = "SELECT * FROM tin_tuc ORDER BY ma_tin_tuc DESC LIMIT 0,3";
        return pdo_query($sql); 
    }
?>