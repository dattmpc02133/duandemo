<?php
require_once '../../DAO/pdo.php';
require_once '../../DAO/khach-hang.php';

if (isset($_GET['ma_kh'])) {
    $kh_del = $_SESSION['admin'];
    if ($kh_del == $_GET['ma_kh']) {
        echo '<script> alert("Bạn không thể xóa chính mình !"); </script>';
    } else {
        khach_hang_delete($_GET['ma_kh']);
        echo '<script> location.href = "index.php"; </script>';
    }
}

// xóa

if (isset($_POST['delete_select'])) {
    if (empty($_POST['check'])) {
        echo '<script> alert("Chưa có khách hàng nào được chọn") </script>';
    } else {
        foreach ($_POST['check'] as $value_check) {
            $me = $_SESSION['admin'];
            if ($value_check == $me) {
                echo '<script> alert("Bạn không thể xóa chính mình !"); </script>';
            } else {
                khach_hang_delete($value_check);
            }
        }
    }
}
?>

<div class="title">
    <h3>QUẢN LÝ KHÁCH HÀNG</h3>
</div>

<div class="form__content"> 
    <form accept="#" method="POST">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <!-- <th class="check"><input type="checkbox"></th> -->
                    <th>Mã kH</th>
                    <!-- <th>Mật khẩu</th> -->
                    <th>Họ tên</th>
                    <th>Địa chỉ</th>
                    <th>Kích hoạt</th>
                    <th>Hình</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Vai trò</th>
                    <th>Đánh giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $list_kh = phan_trang_kh();
                foreach ($list_kh as $kh) {
                    extract($kh);
                    $delete_link = "index.php?ma_kh=$ma_kh";
                    $btn_update = "index.php?btn-update&ma_kh=$ma_kh";
                    $btn_cart = "index.php?btn_cart&ma_kh=$ma_kh";
                ?>
                    <tr>
                       
                        <td><?= $ma_kh ?></td>

                        <td><?= $ho_ten ?></td>
                        <td><?= $dia_chi ?></td>
                        <td>
                            <?php
                            if ($kich_hoat == 1) {
                                echo 'Đã kích hoạt';
                            } else {
                                echo 'Khóa';
                            }
                            ?>
                        </td>
                        <td> <img style="width:60px" src="<?= $CONTENT_URL  ?>/images/user/<?= $hinh ?>" alt=""></td>
                        <td><?= $email ?></td>
                        <td><?= $sdt_kh ?></td>
                        <td>
                            <?php
                            if ($vai_tro == 0) {
                                echo 'Khách hàng';
                            } else {
                                echo 'Admin';
                            }
                            ?>
                        </td>
                        <td><?php if ($danh_gia == 1) {
                                echo "Tốt";
                            } else {
                                echo "Xấu";
                            }

                            ?>
                        </td>
                        <td class="update__delete">
                            <a class="btn btn-success" href="<?= $btn_cart ?>"><i class="fas fa-shopping-cart"></i></a>
                            <a class="btn btn-info" href="<?= $btn_update ?>"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="<?= $delete_link ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class=" col-sm-12 phan_trang" style="display:flex; justify-content:center">
            <?php
            $count_kh = count_kh();
            $trang = ceil($count_kh / 10);
            for ($i = 1; $i <= $trang; $i++) {
            ?>
                <a name="phan_trang" id="phan_trang" class="btn btn-light" href="index.php?btn_list&page=<?= $i ?>" role="button"><?= $i ?></a>
            <?php
            }
            ?>
        </div>
        <div class="button__group">
            <button class=" btn btn-danger button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
            <a href="index.php?btn-add" class="btn btn-info button__group-item button__group-input">Thêm mới</a>
            <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
        </div>
    </form>
</div>