<?php
if (isset($_GET['ma_km'])) {
    $ma_km = $_GET['ma_km'];
}

if (isset($_GET['id'])) {
    ct_km_delete($_GET['id']);
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
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $in4_ct_km = ma_km_ct_selectAll($ma_km);
                foreach ($in4_ct_km as $ct_km) {
                    extract($ct_km);
                ?>
                    <tr>
                        <td class="check"><input type="checkbox"> </td>
                        <td><?= $id ?></td>
                        <td><?= $ma_sp ?></td>
                        <td><?php
                            $ten_sp_selected = ten_sp_select_in($ma_sp);
                            echo $ten_sp_selected;
                            ?></td>
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