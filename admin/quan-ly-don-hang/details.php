<?php 
    if(isset($_GET['ma_hd'])){
        $hoa_don = $_GET['ma_hd'];
    }
?>
<div class="title">
    <h3>CHI TIẾT HÓA ĐƠN</h3>
</div>

<div class="form__content">
    <form accept="#" method="POST">
    <!-- <h3>Hóa đơn: <?= $hoa_don[0]['ma_hd'] ?></h3> -->
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
                    <td><?=$id?></td>
                    <td><?=$ma_hd?></td>
                    <td><?=$ma_sp?></td>
                    <td><?=$ten_sp?></td>
                    <td><?=$gia_ban?></td>
                    <td><?=$so_luong?></td>
                    <td class="update__delete">
                        <!-- <a class="btn btn-info" href="index.php?btn-details&ma_hd=<?=$ma_hd?>"><i class="fas fa-info-circle"></i></a> -->
                        <a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> 
                        <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></i></a>
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
                    <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
                <!-- </div>
           </form>
        </div>
    </div>