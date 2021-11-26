<?php
require_once("../../global.php");
require_once '../../DAO/hoa-don.php';
if (isset($_GET['id'])) {
    car_delete($_GET['id']);
    echo "<script>
         location.href = 'index.php?addcart';
       </script>";
}
if (isset($_POST['addcart'])) {
    $ma_kh = $_SESSION['user'];
    $ma_sp = $_POST['ma_sp'];
    $hinh = $_POST['hinh_sp'];
    $ten_sp = $_POST['ten_sp'];
    $don_gia = $_POST['don_gia'];
    $so_luong = $_POST['so_luong'];
    if (san_pham_getinfo_tam($ma_sp)) {
        $them = $_POST['so_luong'];
        cart_update_so_luong($them, $ma_sp);
    } else {
        $cart = cart_insert($ma_kh, $ma_sp, $hinh, $ten_sp, $don_gia, $so_luong);
    }
}

if (isset($_POST['dat_hang'])) {
    $ma_kh = $_SESSION['user'];
    $tong_tien = $_POST['tong_tien'];
    $dia_chi_giao_hang = $_POST['dia_chi_giao_hang'];
    $ngay_dat = date_format(date_create(), "Y-m-d");
    $trang_thai = "Chờ xử lý";
    hoa_don_insert($ma_kh, $tong_tien, $dia_chi_giao_hang, $ngay_dat, $trang_thai);
    $ma_hd2 = get_ma_hd();
    $list_sp_ght = get_ma_sp_gio_hang_tam($ma_kh);
    foreach ($list_sp_ght as $sp) {
        extract($sp);
        hoa_don_chi_tiet_insert($ma_hd2, $ma_sp, $don_gia, $so_luong);
    }
    delete_all_gio_hang_tam();
    echo '<script>
        location.href = "index.php";
        alert("Đặt hàng thành công !");
    </script>';
}
?>
<section class="mainn">
    <div class="container-fluid" style="padding: 0 80px;">
        <form action="" method="post">
            <div class="row">
                <div class="col-9">
                    <h3 style="text-align: center;">Giỏ hàng của bạn</h3>
                    <table class="form__content-table table">
                        <thead class="table-danger">
                            <tr>
                                <th class="check"><input type="checkbox"> </th>
                                <th>STT</th>
                                <th style="text-align:center;width: 10%;"> Hình </th>
                                <th> Tên sản phẩm </th>
                                <th>Đơn giá</th>
                                <th class="">Số Lượng</th>
                                <th class="">Thành Tiền</th>
                                <th class="">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_SESSION['user'])) {
                                $ma_kh = $_SESSION['user'];
                                $gio_hang = cart_select_ma_kh($ma_kh);
                                $stt = 0;
                                foreach ($gio_hang as $gio_hang_new) {
                                    extract($gio_hang_new);
                                    $stt++;
                                    $tong = $don_gia * $so_luong;
                                    $tongtien[] = $tong;
                                    $delete_link = "index.php?addcart&id=$id";
                            ?>
                                    <tr>
                                        <td class="check"><input type="checkbox"> </td>
                                        <td><?= $stt ?></td>
                                        <td style="text-align:center;"><img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" alt=""></td>
                                        <td><?= $ten_sp ?></td>
                                        <td> <input type="hidden" value="<?= $don_gia ?>">
                                            <?= number_format($don_gia) ?><sup>đ</sup>
                                        </td>
                                        <td><input type="number" min=1 value="<?= $so_luong ?>"></td>
                                        <td class="tt">
                                            <input class="thanhtien" type="hidden" value="<?= $tong ?>">
                                            <?= number_format($tong) ?><sup>đ</sup>
                                        </td>
                                        <td><a class="btn btn-danger" href="<?= $delete_link ?>">Xóa</a></td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-3">
                    <div class="waxbox_odercart">
                        <div class="order_title">
                            <h3>Thông tin đơn hàng</h3>
                        </div>
                        <div class="order_total_price">
                            <label for="">Địa chỉ giao hàng:</label>
                            <?php
                            $kh = get_info_kh($ma_kh);
                            extract($kh);
                            ?>
                            <textarea name="dia_chi_giao_hang" class="form-control" style="font-size: 0.9rem; line-height:35px;" maxlength="255"><?= $dia_chi?></textarea>
                            <p></p>
                            <p class="order_total_dix" style="padding: 0 8px; color: rgba(0, 0, 0, 0.3); font-size: 1rem"><strong>Tổng Tiền:</strong>
                                <span id="tong_tien" style="color: red; margin-left: 8px; ">0</span> <sup style="color:red">đ</sup>
                                <input type="hidden" id="tong_tien2" name="tong_tien">
                            </p>
                        </div>
                        <div class="note-promo">
                            <p>Phí vận chuyển sẽ được tính ở trang thanh toán. <br>
                                Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                        </div>
                        <div class="cart-buttons">
                            <button type="submit" class="btn btn-danger checkout-btn" name="dat_hang">Thanh Toán</button>
                            <!--   -->
                        </div>
                        <a href="<?= $ROOT_URL ?>" class="countine_order_cart"><i class="fas fa-reply"></i> Tiếp tục mua hàng</a>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>
<script>
    var thanhtiens = document.querySelectorAll(".thanhtien");
    var tong = 0;
    thanhtiens.forEach(function(thanhtien) {
        tong += thanhtien.value * 1;
    })

    var tong_tien = document.querySelector("#tong_tien");
    var tong_tien2 = document.querySelector("#tong_tien2");
    tong_tien2.value = tong;
    tong_tien.innerHTML = tong.toLocaleString("en");
</script>