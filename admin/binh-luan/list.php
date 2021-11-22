<?php

require_once("../../DAO/pdo.php");
require_once("../../DAO/binh-luan.php");
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
            <form action="index.php" method="POST">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th>Tên sản phẩm</th>
                            <th>Số bình luận</th>
                            <th>Mới nhất</th>
                            <th>Cũ nhất</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $list = bl_thong_ke();
                        foreach ($list as $binh_luan){
                            extract($binh_luan);
                        
                    ?>
                        <tr>
                                <td><input type="checkbox" name="check[]" value="<?= $ma_bl ?>"></td>
                                <td><?= $ten_sp ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= $bl_moi_nhat ?></td>
                                <td><?= $bl_cu_nhat ?></td>
                                <td>
                                    <a href="index.php?btn_chitiet&ma_sp=<?= $ma_sp ?>" class="btn btn-primary btn btn__delete">Chi Tiết</a>
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
                            <button class="btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục
                                chọn</button>
                            <!-- <a href="index.php?btn_add" class="button__group-item button__group-input">Nhập thêm</a> -->
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>