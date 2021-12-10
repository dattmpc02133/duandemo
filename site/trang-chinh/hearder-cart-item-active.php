<form action="./cart.php" method="POST">
    <div class="header_cart-list" id="header_cart-list">
        <h3 class="header_cart-textt">Giỏ hàng</h3>
        <div class="header_drop-dow">
            <?php
           
            $ma_kh = $_SESSION['user'];
            $gio_hang = cart_select_ma_kh($ma_kh);
            foreach ($gio_hang as $gio_hang_new) {
                extract($gio_hang_new);
                $delete_link = "index.php?addcart&id=$id";
            ?>
                <div class="header_cart-products">
                    <div class="row">
                        <div class="col-3">
                            <img src="../../content/images/products/<?= $hinh_tam ?>" alt="" class="product-img">
                        </div>
                        <div class="col-9" style="padding: 0;">
                            <div class="header_cart-items-wraps">
                                <div class="header_cart-items-content">
                                    <h6 class="header_cart-item-name">
                                        <?= $ten_sp_tam ?>
                                    </h6>
                                    <div class="header_cart-money-wraper">
                                        <span class="header_cart-money-item">
                                            <?= number_format($don_gia_tam) ?> <sup>đ</sup>
                                            <div hidden class="don_gia_tams"> <?= $don_gia_tam ?></div>

                                        </span>

                                        <span class="header_cart-money-mutify">x</span>
                                        <span class="header_cart-money-quanty"><?= $so_luong_tam ?></span>
                                    </div>
                                </div>
                                <div class="header_cart-classify">
                                    <span class="header_cart-item-decription"></span>
                                    <span class="header_cart-item-remove"><a href="<?= $delete_link ?>">Xóa</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        
            ?>

        </div>

        <div class="header_cart-price">
            <span class="cart-text_left" name="tong_tien">Tổng tiền: </span>
            <span class="cart-text_right" style="display: flex;">
                <div class="tong_tien_cart_header">0</div><sup>đ</sup>
            </span>
        </div>
        <div class="cart_pay">
            <a href="index.php?addcart"  class="PayPay">Xem giỏ hàng</a>
            <!-- <a href="./cart.html" class="PayPay">Thanh toán</a> -->
            <!-- <button type="submit" style="outline: none; border:none" class="PayPay" name="dat_hang">Thanh Toán</button> -->

        </div>
    </div>
</form>
<script>
    function tong_tien_gio_hang_tam() {
        var don_gia_tams = document.querySelectorAll(".don_gia_tams");
        var tong_tien_cart_header = document.querySelector(".tong_tien_cart_header");
        var tong_tien_tam = 0;
        don_gia_tams.forEach(function(don_gia_tam) {
            tong_tien_tam += Number(don_gia_tam.innerHTML);
        })
        var dinh_dang_tien = tong_tien_tam.toLocaleString("en");
        tong_tien_cart_header.innerHTML = dinh_dang_tien;


    }
    tong_tien_gio_hang_tam();
</script>