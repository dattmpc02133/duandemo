<?php 

if(isset($_GET['ma_ncc'])){
    nha_cung_cap_delete($_GET['ma_ncc']);
}

?>


<div class="title">
    <h3>QUẢN LÝ NHÀ CUNG CẤP</h3>
</div>
<div class="row">
    <div class="col p-12 t-12 m-12">
        <div class="form__content">
            <form method="POST">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th class="">Mã NCC</th>
                            <th class="">Tên nhà cung cấp</th>
                            <th class="">Địa chỉ</th>
                            <th class="">Điện thoại</th>
                            <th class="">Email</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $list_ncc = nha_cung_cap_selectall();
                            foreach($list_ncc as $ncc){
                                extract($ncc);    
                                $btn_update = "index.php?btn_update&ma_ncc=$ma_ncc" ;     
                                $delete_link = "index.php?ma_ncc=$ma_ncc";
                        ?>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td class=""><?= $ma_ncc ?></td>
                            <td class=""><?= $ten_ncc ?></td>
                            <td class=""><?= $dia_chi ?></td>
                            <td class=""><?= $sdt ?></td>
                            <td class=""><?= $email ?></td>                         
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                           
                        </tr>
                        <?php 
 }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col p-12 t-12 m-12">
                        <div class="button__group">
                            <!-- <button class="button__group-item button__group-checkAll">Chọn tất cả</button>
                            <button class="button__group-item button__group-unCheckAll">Bỏ chọn tất
                                cả</button> -->
                            <button class="btn btn-danger button__group-item button__group-Delete" name="delete_select">Xóa các mục
                                chọn</button>
                                <a href="index.php?btn_add" class=" btn btn-info button__group-item button__group-input">Thêm mới</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>