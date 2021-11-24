<?php
require("../../DAO/pdo.php");
require("../../DAO/loai.php");
// require_once("../../DAO/phan_trang_global.php");

if (isset($_GET['ma_loai'])) {
    loai_delete($_GET['ma_loai']);
    header("Location: ../loai-hang/");
}

// xóa

if (isset($_POST['delete_select'])) {
    if (empty($_POST['check'])) {
        echo '<script> alert("Chưa có loại hàng nào được chọn") </script>';
    } else {
        foreach ($_POST['check'] as $value_check) {
            loai_delete($value_check);
        }
    }
}


?>
<div class="title">
    <h3>QUẢN LÝ LOẠI SẢN PHẨM</h3>
</div>

        <div class="form__content">
            <form accept="#" method="POST">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Hình</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $ten_bang = "loai";
                        // $cot = "ma_loai";
                        $lists = loai_selectall();
                        foreach ($lists as $list) {
                            extract($list);
                            $delete_link = "list.php?ma_loai=$ma_loai";
                            $btn_update = "index.php?btn-update&ma_loai=$ma_loai";
                            echo '
                        <tr>
                        <td class="check"><input type="checkbox"  name= "check[]" value = ' . $ma_loai . '  ></td>
                            <td>' . $ma_loai . '</td>
                            <td>' . $ten_loai . '</td>
                            <td>
                            <img src="'. $CONTENT_URL.'/images/products/'.$hinh_loai_sp.'" alt="" width="60px" > 
                            </td>
                            <td class="update__delete" >
                            <a class="btn btn-info" href="' . $btn_update . '"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="' . $delete_link . '"> <i class="fas fa-trash-alt"></i></a> 
                            </td>
                         </tr>
                        ';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col p-12 t-12 m-12">
                        <div class="button__group">
                            <button class=" btn btn-danger button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
                            <a href="index.php?btn-add" class="btn btn-info button__group-item button__group-input">Thêm mới</a>
                            <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
                        </div>
                    </div>
                </div>


            </form>
        </div>

<!--grid-->

<!--container-->