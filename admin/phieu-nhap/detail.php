<?php 
    if(isset($_GET['ma_pn'])){
        $ma_pn = $_GET['ma_pn'];
    }
    if(isset($_GET['ma_ct_pn'])){
        $id = $_GET['ma_ct_pn'];
        phieu_nhap_ct_delete($id);
    }

    $in4_pn = pn_ct_get_info($ma_pn);
    extract($in4_pn);
?>
<div class="title">
    <h3>CHI TIẾT PHIẾU NHẬP: <?=$ma_pn?></h3>
</div>

<div class="form__content">
    <form accept="#" method="POST">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th class="check"><input type="checkbox"> </th>
                    <th>ID</th>
                    <th>Mã phiếu nhập</th>
                    <th>Mã sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="check"><input type="checkbox"> </td>
                    <td><?=$ma_ct_pn?></td>
                    <td><?=$ma_pn?></td>
                    <td><?php
                        $ten_sp_selected = ten_sp_select_in($ma_sp);
                        echo $ten_sp_selected;
                    ?></td>
                    <td><?=$so_luong_nhap?></td>
                    <td><?=$gia?><sup>đ</sup></td>
                    <td class="update__delete">
                        <a class="btn btn-info" href="index.php?btn_update_ct&ma_ct_pn=<?=$ma_ct_pn?>"><i class="fas fa-edit"></i></a>
                        <!-- <a class="btn btn-danger" href="index.php?btn_delete_ct&ma_ct_pn=<?=$ma_ct_pn?>"><i class="fas fa-trash-alt"></i></a> -->
                    </td>
                </tr>
                </tbody>
        </table>
        <div class="row">
            <div class="col p-12 t-12 m-12">
                <div class="button__group">
                    <button class=" btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
                    <!-- <a href="index.php?btn_add" class="btn btn-info button__group-item button__group-input">Thêm mới</a> -->
                    <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
                </div>
            </div>
        </div>


    </form>
</div>