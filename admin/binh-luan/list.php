<?php

require_once("../../DAO/pdo.php");
// require_once("../../DAO/binh-luan.php");
if (isset($_POST['delete_select'])) {
    if (empty($_POST['check'])) {
        echo '<script> alert("Chưa có bình nào được chọn"); </script>';
    } else {
        foreach ($_POST['check'] as $value_check) {
            // binh_luan_delete_($value_check);
        }
        header("location: index.php");
    }
}
?>


<div class="title">
    <h3>QUẢN LÝ BÌNH LUẬN</h3>
</div>
<div class="row">
    <div class="col p-12 t-12 m-12">
        <div class="form__content">
            <form action="index.php" method="POST" id="form-list-bl">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th class="ten_hinh">HÀNG HÓA</th>
                            <th class="don_gia">SỐ BL</th>
                            <th class="gia_giam">MỚI NHẤT</th>
                            <th class="luot_xem">CŨ NHẤT</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $list_bl_sp = bl_thong_ke();
                                foreach($list_bl_sp as $bl){
                                    extract($bl);
                                    
                              
                            ?>
                       
                        <tr>
                           <?php if(isset($ma_sp)){ echo ' <td><input type="checkbox" name="check[]" value=" '.$ma_sp.'"></td>';} ?>
                            <td><?php if(isset($ten_sp)){echo $ten_sp;} else{echo "";} ?></td>
                            <td><?php if(isset($so_luong)){echo $so_luong;} else{echo "";} ?></td>
                            <td> <?php if(isset($bl_moi_nhat)){echo $bl_moi_nhat;} else{echo "";} ?> </td>
                            <td>  <?php if(isset($bl_cu_nhat)){echo $bl_cu_nhat;} else{echo "";} ?> </td>
                            <td>
                                <?php if(isset($ma_sp)){
                                    echo '
                                    <a href="index.php?btn_chitiet&ma_sp='.$ma_sp.'" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                    ';
                                } else{ echo "";} ?>
                               
                            </td>
                        </tr>
                       <?php 
                            }
                       ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col p-12 t-12 m-12">
                        <div class="button__group">
                            <!-- <button class="button__group-item button__group-checkAll">Chọn tất cả</button>
                            <button class="button__group-item button__group-unCheckAll">Bỏ chọn tất
                                cả</button> -->
                            <button class="btn btn-danger button__group-item button__group-Delete" name="delete_select">Xóa các mục
                                chọn</button>
                            <!-- <a href="index.php?btn_add" class="button__group-item button__group-input">Nhập thêm</a> -->
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>