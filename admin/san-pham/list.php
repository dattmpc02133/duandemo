<?php
require_once("../../global.php");
require_once("../../DAO/pdo.php");
require_once("../../DAO/san-pham.php");
if (isset($_GET['ma_sp'])) {
    san_pham_delete($_GET['ma_sp']);
    // header('location: index.php');
    echo "<script>
              location.href = 'index.php';
           </script>";
}
if (isset($_POST['delete_select'])) {
    if (empty($_POST['check'])) {
        echo '<script> alert("Chưa có loại hàng nào được chọn") </script>';
    } else {
        foreach ($_POST['check'] as $value_check) {
            san_pham_delete($value_check);
        }
    }
}
?>
<div class="title">
    <h3>QUẢN LÝ SẢN PHẨM</h3>
</div>
<div class="form__content">
    <form action="#" method="POST">
        <table class="form__content-table table">
            <thead class="table-danger">
                <tr>
                    <!-- <th class="check"><input type="checkbox"> </th> -->
                    <th>Mã SP</th>
                    <th> Tên SP </th>
                    <th>Đơn giá</th>
                    <th class="">Giảm giá (%)</th>
                    <th class="">Số lượng</th>
                    <th class="">Trạng thái</th>
                    <th class="">Đặc biệt</th>
                    <th>Lượt mua</th>
                    <th>Mã loại</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $lists = phan_trang_sp();
                foreach ($lists as $sp) {
                    extract($sp);
                    $delete_link = "list.php?btn-delete&ma_sp=$ma_sp";
                    $btn_update = "index.php?btn-update&ma_sp=$ma_sp";
                ?>
                    <tr>
                        <!-- <td class="check"><input type="checkbox"> </td> -->
                        <td class="ma_sp"><?= $ma_sp ?></td>
                        <td><?= $ten_sp ?></td>
                        <td><?= number_format($don_gia) ?><sup>đ</sup></td>
                        <td class=""><?php
                                        if ($giam_gia == null || $giam_gia == 0) {
                                            echo '0%';
                                        } else {
                                            echo $giam_gia . '%';
                                        }
                                        ?></td>
                        <td class=""><?= $so_luong ?></td>
                        <td class=""><?php
                                        if ($trang_thai == 0) {
                                            echo 'Hết hàng';
                                        } else {
                                            echo 'Còn hàng';
                                        }
                                        ?></td>
                        <td class=""><?php
                                        if ($dac_biet == 0) {
                                            echo 'Thường';
                                        } else {
                                            echo 'Đặc biệt';
                                        }
                                        ?></td>
                        <td><?= $so_luot_mua ?></td>
                        <td><?= $ma_loai ?></td>
                        <td class="update__delete"><a class="btn btn-info" href="<?= $btn_update ?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger xoa_sp" href="<?= $delete_link ?>"><i class="fas fa-trash-alt"></a></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <div class=" col-sm-12 phan_trang" style="display:flex; justify-content:center">
            <?php 
                $count_sp = phan_trang_count();
                $trang = ceil($count_sp/10);
                for($i = 1; $i <= $trang; $i++){
            ?>
                <a name="phan_trang" id="phan_trang" class="btn btn-light" href="index.php?btn-list&page=<?=$i?>" role="button"><?=$i?></a>
            <?php
                }
            ?>
        </div>
        <div class="button__group">
            <!-- <button class="button__group-item button__group-checkAll">Chọn tất cả</button>
                            <button class="button__group-item button__group-unCheckAll">Bỏ chọn tất
                                cả</button> -->
            <button class=" btn btn-info button__group-item button__group-input" name="delete_select">Xóa các mục
                chọn</button>
            <a href="index.php?btn-add" class=" btn btn-info button__group-item button__group-input">Thêm mới</a>
        </div>
    </form>
</div>
</div>
</div>

<script type="text/javascript">
    function xoa_sp() {
        var btn_xoa_sp = document.querySelectorAll(".xoa_sp");
        var ma_sp = document.querySelectorAll('.ma_sp');
        btn_xoa_sp.forEach(function(xoa_sp, index) {
            xoa_sp.onclick = function(e) {
                e.preventDefault();
                var choice = confirm("bạn có muốn xóa không");
                if (choice) {
                    location.href = "list.php?btn-delete&ma_sp=" + ma_sp[index].innerHTML;
                }
            }

        })
    }
    xoa_sp()
</script>