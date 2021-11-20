<?php
require_once("../../DAO/pdo.php");
// require_once("../../DAO/binh-luan.php");
if (isset($_POST['delete_select'])) {
    if (empty($_POST['check'])) {
        echo '<script> alert("Chưa có sản phẩm nào được chọn"); </script>';
    } else {
        foreach ($_POST['check'] as $value_check) {
            // binh_luan_delete($value_check);
        }
    }
    unset($_SESSION['ma_hh']);
    header("location: index.php");
}
?>
<div class="title">
    <h3>TỔNG HỢP BÌNH LUẬN</h3>
</div>
        <div class="form__content">
            <form action="index.php?btn_chitiet" method="POST">
                <!-- <h3>Hàng Hóa: <?= $items[0]['ten_hh'] ?></h3> -->
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th>NỘI DUNG</th>
                            <th>NGÀY BL</th>
                            <th>NGƯỜI BÌNH LUẬN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <!-- <tr>
                                <td class="check"><input type="checkbox" name="check[]" value="<?= $ma_bl ?>"></td>
                                <td><?= $noi_dung ?></td>
                                <td><?= $ngay_bl ?></td>
                                <td><?= $ma_kh ?></td>
                                <td>
                                    <a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>" class="btn btn-primary btn__delete">Xóa</a>
                                </td>
                            </tr> -->
                            <tr>
                                <td class="check"><input type="checkbox" name="check[]" value="<?= $ma_bl ?>"></td>
                                <td>Sản phẩm rất chất lượng</td>
                                <td>2021-11-20</td>
                                <td>admin</td>
                                <td>
                                    <a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>" class="btn btn-primary btn__delete">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="check"><input type="checkbox" name="check[]" value="<?= $ma_bl ?>"></td>
                                <td>Sản phẩm rất chất lượng</td>
                                <td>2021-11-20</td>
                                <td>admin</td>
                                <td>
                                    <a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>" class="btn btn-primary btn__delete">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="check"><input type="checkbox" name="check[]" value="<?= $ma_bl ?>"></td>
                                <td>Sản phẩm rất chất lượng</td>
                                <td>2021-11-20</td>
                                <td>admin</td>
                                <td>
                                    <a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>" class="btn btn-primary btn__delete">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="check"><input type="checkbox" name="check[]" value="<?= $ma_bl ?>"></td>
                                <td>Sản phẩm rất chất lượng</td>
                                <td>2021-11-20</td>
                                <td>admin</td>
                                <td>
                                    <a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>" class="btn btn-primary btn__delete">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="check"><input type="checkbox" name="check[]" value="<?= $ma_bl ?>"></td>
                                <td>Sản phẩm rất chất lượng</td>
                                <td>2021-11-20</td>
                                <td>admin</td>
                                <td>
                                    <a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>" class="btn btn-primary btn__delete">Xóa</a>
                                </td>
                            </tr>
                     
                    </tbody>


                </table>
                <div class="row">
                    <div class="col p-12 t-12 m-12">
                        <div class="button__group">
                            <!-- <button class="button__group-item button__group-checkAll">Chọn tất cả</button>
                            <button class="button__group-item button__group-unCheckAll">Bỏ chọn tất
                                cả</button> -->
                            <button class="btn btn-primary button__group-item button__group-Delete" type="submit" name="delete_select">Xóa các mục
                                chọn</button>
                            <!-- <a href="index.php?btn_add" class="button__group-item button__group-input">Nhập thêm</a> -->
                        </div>
                    </div>
                </div>
            </form>

        </div>
