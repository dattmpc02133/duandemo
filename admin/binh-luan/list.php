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
            <form action="index.php" method="POST">
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

                        <!-- <tr>
                                <td><input type="checkbox" name="check[]" value="<?= $ma_hh ?>"></td>
                                <td><?= $ten_hh ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= $bl_moi_nhat ?></td>
                                <td><?= $bl_cu_nhat ?></td>
                                <td>
                                    <a href="index.php?btn_chitiet&ma_hh=<?= $ma_hh ?>" class="btn btn-primary btn btn__delete">Chi Tiết</a>
                                </td>
                            </tr> -->
                        <tr>
                            <td><input type="checkbox" name="check[]" value="<?= $ma_hh ?>"></td>
                            <td>Ghế banasonic</td>
                            <td>3</td>
                            <td>2021-11-11</td>
                            <td>2021-10-11</td>
                            <td>
                                <a href="index.php?btn_chitiet&ma_hh=" class="btn btn-primary btn btn__delete">Chi Tiết</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="check[]" value="<?= $ma_hh ?>"></td>
                            <td>Bàn tre phòng khách</td>
                            <td>3</td>
                            <td>2021-11-11</td>
                            <td>2021-10-11</td>
                            <td>
                                <a href="index.php?btn_chitiet&ma_hh=" class="btn btn-primary btn btn__delete">Chi Tiết</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="check[]" value="<?= $ma_hh ?>"></td>
                            <td>Đèn ngủ</td>
                            <td>1</td>
                            <td>2021-11-11</td>
                            <td>2021-10-11</td>
                            <td>
                                <a href="index.php?btn_chitiet&ma_hh=" class="btn btn-primary btn btn__delete">Chi Tiết</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="check[]" value="<?= $ma_hh ?>"></td>
                            <td>Ghế 4 chân </td>
                            <td>2</td>
                            <td>2021-11-11</td>
                            <td>2021-10-11</td>
                            <td>
                                <a href="index.php?btn_chitiet&ma_hh=" class="btn btn-primary btn btn__delete">Chi Tiết</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="check[]" value="<?= $ma_hh ?>"></td>
                            <td>Sofa phòng khách</td>
                            <td>1</td>
                            <td>2021-11-11</td>
                            <td>2021-10-11</td>
                            <td>
                                <a href="index.php?btn_chitiet&ma_hh=" class="btn btn-primary btn btn__delete">Chi Tiết</a>
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