<?php 
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/khach-hang.php';

    if (isset($_GET['ma_kh'])) {
        khach_hang_delete($_GET['ma_kh']);
        header("Location: ../khach-hang/");
    }
    
    // xóa
    
    if (isset($_POST['delete_select'])) {
        if (empty($_POST['check'])) {
            echo '<script> alert("Chưa có khách hàng nào được chọn") </script>';
        } else {
            foreach ($_POST['check'] as $value_check) {
                khach_hang_delete($value_check);
            }
        }
    }
?>

<div class="row">
    <div class="col p-12 t-12 m-12">
        <h3 class="title__manager" style="background-color: #d4edda; padding:12px 20px ">QUẢN LÝ KHÁCH HÀNG</h3>
    </div>
</div>
<div class="row">
    <div class="col p-12 t-12 m-12">
        <div class="form__content">
            <form accept="#" method="POST">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th>Mã khách hàng</th>
                            <th>Mật khẩu</th>
                            <th>Họ tên</th>
                            <th>Địa chỉ</th>
                            <th>Kích hoạt</th>
                            <th>Hình</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th style="width:15%"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $list_kh = khach_hang_selectAll();
                        foreach ($list_kh as $kh) {
                            extract($kh);
                            $delete_link = "list.php?ma_kh=$ma_kh";
                            $btn_update = "index.php?btn-update&ma_kh=$ma_kh";
                        ?>
                        <tr>
                        <td class="check"><input type="checkbox"  name= "check[]" value = '<?=$ma_kh?>'></td>
                            <td><?=$ma_kh?></td>
                            <td><?=$mat_khau?></td>
                            <td><?=$ho_ten?></td>
                            <td><?=$dia_chi?></td>
                            <td>
                                <?php
                                if($kich_hoat==1){
                                    echo 'Đã kích hoạt';
                                }
                                else{
                                    echo 'Khóa';
                                }
                                ?>
                            </td>
                            <td><?=$hinh?></td>
                            <td><?=$email?></td>
                            <td>
                                <?php 
                                    if($vai_tro==0){
                                        echo 'Khách hàng';
                                    }
                                    else{
                                        echo 'Admin';
                                    }
                                ?>
                            </td>
                            <td class="update__delete" >
                            <a class="btn btn-info" href="<?=$btn_update?>">Sửa</a>
                            <a class="btn btn-info" href="<?=$delete_link?>"> Xóa</a> 
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
                            <button class=" btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
                            <a href="index.php?btn-add" class="btn btn-info button__group-item button__group-input">Thêm mới</a>
                            <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>