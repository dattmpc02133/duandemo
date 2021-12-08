<?php 
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/khuyen-mai.php';
    require_once '../../DAO/loai.php';
    if(isset($_GET['ma_km'])){
        ma_km_delete($_GET['ma_km']);
    }
?>
<div class="title">
    <h3>QUẢN LÝ KHUYẾN MÃI</h3>
</div>

        <div class="form__content">
            <form accept="#" method="POST">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th>Mã khuyến mãi</th>
                            <th>Loại khuyến mãi</th>
                            <th>Mức giảm<br>(% hoặc số tiền)</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Khách hàng đã dùng</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $ten_bang = "loai";
                        // $cot = "ma_loai";
                        $lists = ma_km_selectAll();
                        foreach ($lists as $list) {
                            extract($list);
                            $delete_link = "index.php?ma_km=$ma_km";
                            $btn_update = "index.php?btn_update&ma_km=$ma_km";
                            $btn_detail = "index.php?btn_detail&ma_km=$ma_km";
                        ?>
                        <tr>
                        <td class="check"><input type="checkbox"  name= "check[]" value = ' . $ma_km . '  ></td>
                            <td><?=$ma_km?></td>
                            <td><?php $ten_loai_km = loai_km_get_in4($loai_km); echo $ten_loai_km['ten_loai_km'];?></td>
                            <td><?=$muc_giam?><?php 
                                if($loai_km == 1){
                                    echo '<sup>đ</sup>';
                                }
                                else{
                                    echo '%';
                                }
                            ?></td>
                            <td><?=$ngay_bat_dau?></td>
                            <td><?=$ngay_ket_thuc?></td>
                            <td><a class="btn btn-info" href="index.php?btn_detail&ma_km=<?=$ma_km?>" role="button">Xem</a></td>
                            <td class="update__delete" >
                            <a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="<?=$delete_link?>"> <i class="fas fa-trash-alt"></i></a> 
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
                            <button class=" btn btn-danger button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
                            <a href="index.php?btn_add" class="btn btn-info button__group-item button__group-input">Thêm mới</a>
                            <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
                        </div>
                    </div>
                </div>


            </form>
        </div>