<?php
if (isset($_GET['ma_hd'])) {
    $hoa_don = $_GET['ma_hd'];
}


if (isset($_GET['id'])) {
    $a =   get_info_id_hdct($_GET['id']);
    extract($a);
    $tien_tru = $gia_ban * $so_luong;
    echo '<script> alert("'.$tien_tru.'"); </script>';
   
    update_tong_tien_delete_hd($tien_tru, $hoa_don);
    hoa_don_chi_tiet_delete($_GET['id']);
}
$in4_hd = hoa_don_get_info($hoa_don);
extract($in4_hd);
?>

<div class="title">
    <h3>CHI TIẾT HÓA ĐƠN: <?= $ma_hd ?></h3>
</div>
<div class="form__content">
    <form accept="#" method="POST">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th class="check"><input type="checkbox"></th>
                    <th>ID</th>
                    <th>Mã hóa đơn</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $list_detail = hoa_don_chi_tiet_select_by_ma_hd($hoa_don);
                foreach ($list_detail as $chi_tiet) {
                    extract($chi_tiet);
                    $btn_update = "index.php?btn_update_ct&id=$id";
                ?>
                    <tr>
                        <td class="check"><input type="checkbox"></td>
                        <td><?= $id ?></td>
                        <td><?= $ma_hd ?></td>
                        <td><?= $ma_sp ?></td>
                        <td><?= $ten_sp ?></td>
                        <td><?= $gia_ban ?></td>
                        <td><?= $so_luong ?></td>
                        <td class="update__delete">
                            <!-- <a class="btn btn-info" href="index.php?btn-details&ma_hd=<?= $ma_hd ?>"><i class="fas fa-info-circle"></i></a> -->
                            <a class="btn btn-info" href="<?= $btn_update ?>"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="index.php?id=<?= $id ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="button__group">
            <!-- <button class=" btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button> -->
            <a href="index.php?btn-list" class="btn btn-info button__group-item button__group-input">Danh sách đơn hàng</a>
            <a href="index.php?btn_add_sp_hdct&ma_hd=<?= $ma_hd ?>" class="btn btn-info button__group-item button__group-input">Nhập thêm</a>
            <!-- </div>
           </form>
        </div>
    </div>