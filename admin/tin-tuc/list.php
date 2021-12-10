<?php
require_once('../../DAO/pdo.php');
require_once('../../DAO/tin-tuc.php');
    if(isset($_GET['ma-tin-tuc'])){
        $ma_tin_tuc=$_GET['ma-tin-tuc'];
        tin_tuc_delete($ma_tin_tuc);
        echo "<script> location.href='index.php'; </script>";    
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
                    <th class="check"><input type="checkbox"> </th>
                    <th>Mã tin tức</th>
                    <th>Tiêu đề</th>
                    <th>Hình</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tin_tuc = phan_trang_tin_tuc();

                foreach ($tin_tuc as $tin_tuc_news) {
                    extract($tin_tuc_news);
                    $link_update_new = "../tin-tuc/index.php?btn-update&ma-tin-tuc=$ma_tin_tuc";
                    $link_delete_new = "../tin-tuc/list.php?btn-delete&ma-tin-tuc=$ma_tin_tuc";
                ?>
                    <tr>
                        <td class="check"><input type="checkbox"> </td>
                        <td><?= $ma_tin_tuc ?></td>
                        <td><?= $tieu_de ?></td>
                        <td><img style="width:100px;" src="<?=$CONTENT_URL?>/images/news/<?=$hinh_tin_tuc?>" alt=""></td>

                        <td class="update__delete"><a class="btn btn-info" href="<?= $link_update_new ?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?= $link_delete_new ?>"><i class="fas fa-trash-alt"></a></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <div class=" col-sm-12 phan_trang" style="display:flex; justify-content:center">
            <?php 
                $count_bl = count_tin_tuc();
                $trang = ceil($count_bl/10);
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