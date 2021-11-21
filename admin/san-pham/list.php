<?php
    require_once("../../global.php");
    require_once("../../DAO/pdo.php");
    require_once("../../DAO/san-pham.php");
    if(isset($_GET['ma_sp'])){
        san_pham_delete($_GET['ma_sp']);
        header('location: index.php');
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
                            <th class="check"><input type="checkbox"> </th>
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
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td>7878793</td>
                            <td> Tranh canvas - Kool (Bộ 3 tranh)</td>
                            <td>399,000 <sup>đ</sup></td>
                            <td class="">0% </td>
                            <td class="">200</td>
                            <td class="">Còn hàng</td>
                            <td class="">Thường</td>
                            <td>50</td>
                            <td>3</td>
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td>7878792</td>
                            <td> Giường hiện đại cho trẻ em</td>
                            <td>322,900,000 <sup>đ</sup></td>
                            <td class="">0% </td>
                            <td class="">30</td>
                            <td class="">Còn hàng</td>
                            <td class="">Thường</td>
                            <td>20</td>
                            <td>2</td>
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td>7878791</td>
                            <td> Sofa băng Tân Á</td>
                            <td>5,900,000 <sup>đ</sup></td>
                            <td class="">0% </td>
                            <td class="">50</td>
                            <td class="">Còn hàng</td>
                            <td class="">Thường</td>
                            <td>40</td>
                            <td>1</td>
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td>7878790</td>
                            <td> Đèn ngủ để bàn chân sứ tròn</td>
                            <td>355,000 <sup>đ</sup></td>
                            <td class="">15% </td>
                            <td class="">100</td>
                            <td class="">Còn hàng</td>
                            <td class="">Thường</td>
                            <td>50</td>
                            <td>3</td>
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td>7878789</td>
                            <td>Giường ngủ tân cổ điển</td>
                            <td>18,900,000<sup>đ</sup></td>
                            <td class="">0% </td>
                            <td class="">30</td>
                            <td class="">Còn hàng</td>
                            <td class="">Thường</td>
                            <td>10</td>
                            <td>2</td>
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td>7878788</td>
                            <td>Tủ đầu giường 3 hộc trơn</td>
                            <td>1,500,000<sup>đ</sup></td>
                            <td class="">25% </td>
                            <td class="">50</td>
                            <td class="">Còn hàng</td>
                            <td class="">Thường</td>
                            <td>50</td>
                            <td>1</td>
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                        </tr>
                   </tbody>
                </table>
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
    <div class=" col-sm-12 phan_trang" style="display:flex; justify-content:center">
      
    </div>
</div>