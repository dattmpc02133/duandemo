<div class="title">
    <h3>QUẢN LÝ ĐƠN HÀNG</h3>
</div>

<div class="form__content">
    <form accept="#" method="POST">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <!-- <th class="check"><input type="checkbox"></th> -->
                    <th>Mã hóa đơn</th>
                    <th>Mã khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <?php
                    $list = phan_trang_hd();
                    foreach ($list as $hoa_don) {
                        extract($hoa_don);
                        $btn_update_hd = "index.php?btn_update_hd&ma_hd=$ma_hd";
                    ?>
                        <!-- <td class="check"><input type="checkbox"></td> -->
                        <td><?= $ma_hd ?></td>
                        <td><?= $ma_kh ?></td>
                        <td><?php echo number_format($tong_tien) ?><sup>đ</sup></td>
                        <td><?= $dia_chi_giao_hang ?></td>
                        <td><?= $ngay_dat ?></td>
                        <td><?php
                            if ($trang_thai == 1) {
                                echo 'Chờ xác nhận';
                            } else if ($trang_thai == 2) {
                                echo 'Đang giao hàng';
                            } else if ($trang_thai == 3) {
                                echo 'Đã giao hàng';
                            } else {
                                echo 'Đã hủy';
                            }
                            ?></td>
                        <td class="update__delete">
                            <a class="btn btn-info" href="index.php?btn-details&ma_hd=<?= $ma_hd ?>"><i class="fas fa-info-circle"></i></a>
                            <a class="btn btn-info" href="<?= $btn_update_hd ?>"><i class="fas fa-edit"></i></a>
                            <!-- <a class="btn btn-danger" href="<?= $delete_link ?>"><i class="fas fa-trash-alt"> </i></a> -->
                        </td>
                </tr>
            <?php
                    }
            ?>
            </tbody>
        </table>
        <div class=" col-sm-12 phan_trang" style="display:flex; justify-content:center">
            <?php
            $count_hd = count_hd();
            $trang = ceil($count_hd / 10);
            for ($i = 1; $i <= $trang; $i++) {
            ?>
                <a name="phan_trang" id="phan_trang" class="btn btn-light" href="index.php?btn-list&page=<?= $i ?>" role="button"><?= $i ?></a>
            <?php
            }
            ?>
        </div>
        <div class="button__group">
            <button class=" btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
            <!-- <a href="index.php?btn-add" class="btn btn-info button__group-item button__group-input">Thêm mới</a> -->
            <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
        </div>
    </form>
</div>
</div>