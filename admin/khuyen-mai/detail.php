<?php
if (isset($_GET['ma_km'])) {
    $ma_km = $_GET['ma_km'];
}

?>
<div class="title">
    <h3>CHI TIẾT KHUYẾN MÃI: <?= $ma_km ?></h3>
</div>

<div class="form__content">
    <form accept="#" method="POST">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th class="check"><input type="checkbox"> </th>
                    <th>ID</th>
                    <th>Mã khuyến mãi</th>
                    <th>Mã khách hàng đã dùng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $in4_ct_km = kh_da_dung_get($ma_km);
                foreach ($in4_ct_km as $ct_km) {
                    extract($ct_km);
                ?>
                    <tr>
                        <td class="check"><input type="checkbox"> </td>
                        <td><?= $id ?></td>
                        <td><?= $ma_km ?></td>
                        <td><?=$ma_kh_da_dung?></td>
                        <td class="update__delete">
                            <!-- <a class="btn btn-info" href="index.php?btn_update_ct&id=<?= $id ?>"><i class="fas fa-edit"></i></a> -->
                            <a class="btn btn-danger" href="index.php?btn_detail&ma_km=<?= $ma_km ?>&id=<?= $id ?>"><i class="fas fa-trash-alt"></i></a>
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
                    <button class=" btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
                    <a href="index.php?btn_add_ct&ma_km=<?= $ma_km ?>" class="btn btn-info button__group-item button__group-input">Thêm mới</a>
                    <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
                </div>
            </div>
        </div>


    </form>
</div>