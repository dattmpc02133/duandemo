<div class="title">
    <h3>QUẢN LÝ LOẠI SẢN PHẨM</h3>
</div>

<div class="form__content">
    <form accept="#" method="POST">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th class="check"><input type="checkbox"> </th>
                    <th>Mã phiếu nhập</th>
                    <th>Ngày nhập</th>
                    <th>Mã nhà cung cấp</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $list = phieu_nhap_selectall();
                    foreach ($list as $pn) {
                        extract($pn);
                ?>
                <tr>
                    <td class="check"><input type="checkbox"> </td>
                    <td><?=$ma_pn?></td>
                    <td><?=$ngay_nhap?></td>
                    <td><?php 
                        // echo $ma_ncc;
                        $ncc = nha_cung_cap_getinfo($ma_ncc);
                        extract($ncc);
                        echo $ten_ncc;
                    ?></td>
                    <td class="update__delete"><a class="btn btn-info" href="index.php?btn_update&ma_pn=<?=$ma_pn?>"><i class="fas fa-edit"></i></a></td>
                </tr>
                <?php
                    }
                ?>

                
                <!-- <tr>
                    <td class="check"><input type="checkbox"> </td>
                    <td>2</td>
                    <td>21/11/2021</td>
                    <td>Nội thất GOVI	</td>
                   <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                </tr>
                <tr>
                    <td class="check"><input type="checkbox"> </td>
                    <td>3</td>
                    <td>21/11/2021</td>
                    <td>Nội thất Hòa Phát</td>
                   <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                </tr>
                <tr>
                    <td class="check"><input type="checkbox"> </td>
                    <td>4</td>
                    <td>21/11/2021</td>
                    <td>Nội thất Misota</td>
                   <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                </tr>
                <tr>
                    <td class="check"><input type="checkbox"> </td>
                    <td>5</td>
                    <td>21/11/2021</td>
                    <td>Nội thất văn hòng Proce</td>
                   <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                </tr> -->
            </tbody>
        </table>
        <div class="row">
            <div class="col p-12 t-12 m-12">
                <div class="button__group">
                    <button class=" btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
                    <a href="index.php?btn_add" class="btn btn-info button__group-item button__group-input">Thêm mới</a>
                    <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
                </div>
            </div>
        </div>


    </form>
</div>