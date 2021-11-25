<?php
require_once("../../global.php");
if (isset($_GET['id'])){
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
    if(san_pham_getinfo_tam($ma_sp)){
        $them = $_POST['so_luong'];
        cart_update_so_luong($them,$ma_sp);
    }else{
        $cart = cart_insert($ma_kh, $ma_sp, $hinh, $ten_sp, $don_gia, $so_luong);
    }
}
?>
<section class="mainn">
    <h3 style="text-align: center;">Giỏ hàng của bạn</h3>
    <div class="container-fluid" style="padding: 0 80px;">
        <div class="row">
            <div class="col-9">
                <form action="" method="post">
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
                                    $tong = $don_gia*$so_luong;
                                    $delete_link = "index.php?addcart&id=$id";
                            ?>
                                <tr>
                                    <td class="check"><input type="checkbox"> </td>
                                    <td><?= $stt ?></td>
                                    <td style="text-align:center;"><img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" alt=""></td>
                                    <td><?= $ten_sp ?></td>
                                    <td><?= number_format($don_gia) ?><sup>đ</sup></td>
                                    <td><?= $so_luong ?></td>
                                    <td><?= number_format($tong)?><sup>đ</sup></td>
                                    <td><a class="btn btn-danger" href="<?=$delete_link?>">Xóa</a></td>
                                </tr>
                           
                            <?php
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col-3">
                <div class="waxbox_odercart">
                    <div class="order_title">
                        <h3>Thông tin đơn hàng</h3>
                    </div>
                    <div class="order_total_price">
                        <p class="order_total_dix" style="padding: 0 8px; color: rgba(0, 0, 0, 0.3)"><strong>Tổng Tiền:</strong>
                            <span style="color: red; margin-left: 8px;">0<sup>đ</sup></span>
                        </p>
                    </div>
                    <div class="note-promo">
                        <p>Phí vận chuyển sẽ được tính ở trang thanh toán. <br>
                            Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                    </div>
                    <div class="cart-buttons">
                        <a href="./cart.php" class="checkout-btn">Thanh Toán</a>
                        <!--   -->
                    </div>
                    <a href="<?= $ROOT_URL ?>" class="countine_order_cart"><i class="fas fa-reply"></i> Tiếp tục mua hàng</a>
                </div>

            </div>
        </div>
    </div>
</section>