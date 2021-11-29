<?php
$san_pham =  san_pham_getinfo($ma_sp);
extract($san_pham);
if($so_luong == 0 ){
    trang_thai_sp_het_hang($ma_sp);
} else{
    trang_thai_sp_con_hang($ma_sp);
}
?>

<div class="container__chi-tiet">
    <div class="row">
        <div class="col-6 col-md-6">
            <div class="view__product">
                <div class="row">
                    <div class="col-3">
                        <div class="view__product-img wrap_aside">
                            <?php
                            $hinh_phu = select_hinh_phu($ma_sp);
                            
                            foreach ($hinh_phu as $key) {
                                extract($key);
                            ?>
                                <img style="padding-bottom: 10px;" class="wrap_img" src="<?= $CONTENT_URL ?>/images/products/<?= $hinh_phu ?>" alt="">
                            <?php
                            }
                            ?>
                        <img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" class="wrap_img" alt="">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="view__product-main wrap_aside">
                            <img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" class="wrap_img" alt="" id="main_img">
                        </div>
                       
                        <div class="view__product-main-dot">
                            <!-- <div class="circle"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="description">
                <h4 class="description__title"><?= $ten_sp ?></h4>
                <div class="description__price">
                    <?php
                    if ($giam_gia == 0 || $giam_gia == null || $giam_gia == '0') {
                        echo "";
                    } else {
                        echo " <span class='description__price-percent'>-$giam_gia%</span>";
                    }
                    ?>

                    <span class="description__price-product"><?php 
                    $gia_ban = $don_gia - ($giam_gia * $don_gia / 100);
                    echo number_format($gia_ban); 
                    ?> <sup>đ</sup></span>
                    <?php
                    if ($giam_gia == 0 || $giam_gia == null || $giam_gia == '0') {
                        echo "";
                    } else {
                        echo  ' <span class="description__price-del"><del> ' . number_format($don_gia) . ' <sup>đ</sup></del></span>';
                    }
                    ?>

                </div>
                <div class="description__form">
                    <form action="<?= $SITE_URL ?>/trang-chinh/index.php?addcart" method="post">
                        <div class="row">
                        <div class="col-4">
                            <div class="description__form-left">
                                <div class="quantity-area" id="giam_so_luong">-</div>
                                <input class="so_luong_ton_kho" type="hidden" value="<?=$so_luong?>">
                                <input class="description__form-left-input" name="so_luong" value="1" min="1"  type="number" id="so_luong_chi_tiet">
                                <div class="quantity-area" id="tang_so_luong">+</div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="description__form-right">
                                <?php 
                                    if($trang_thai == 0){
                                        echo '  <button disabled class="btn btn-danger add__carrt btn_het_hang" name="">Hết hàng</button>';
                                    } else{
                                        echo ' <button class="btn btn-primary add__carrt" name="addcart">Thêm vào giỏ hàng</button>';
                                    }
                                ?>
                                   
                                  
                                    <input type="hidden" name="hinh_sp" value="<?= $hinh ?>">
                                    <input type="hidden" name="ten_sp" value="<?= $ten_sp ?>">
                                    <input type="hidden" name="don_gia" value="<?= $gia_ban ?>">
                                    <input type="hidden" name="ma_sp" value="<?= $ma_sp ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                        </form>
                </div>
                <div class="description__text">
                    <div class="description__text-text">Mô tả</div>
                    <?= $mo_ta ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="san_pham__lienquan">
                <div class="row-products">
                    <h3 class="san_pham__lienquan-title">sản phẩm liên quan</h3>
                    <div class="row">
                        <?php
                        $san_pham_cung_loai = san_pham_select_by_loai($ma_loai);
                        foreach ($san_pham_cung_loai as $cung_loai) {
                            extract($cung_loai);

                        ?>
                            <div class="col-default">
                                <div class="block-products">
                                    <a href="#">
                                        <div class="block-image">
                                            <img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" alt="">
                                        </div>
                                        <div class="block-body">
                                            <div class="product-name">
                                                <p><?= $ten_sp ?><span></span></p>
                                            </div>
                                            <div class="product-price">
                                                <p><span><?= number_format($don_gia - ($giam_gia * $don_gia / 100)) ?><sup>đ</sup></span> <del><?= $don_gia ?> <sup>đ</sup></del></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="san__pham-daxem">
                <div class="row-products">
                    <h3 class="san_pham__lienquan-title">sản phẩm đã xem</h3>
                    <div class="row">

                        <div class="col-default">
                            <div class="block-products">
                                <a href="#">
                                    <div class="block-image">
                                        <img src="<?= $CONTENT_URL ?>/images/sofa-giuong-keo.jpg" alt="sofa-giuong-keo">
                                    </div>
                                    <div class="block-body">
                                        <div class="product-name">
                                            <p>Sofa Giường Kéo Roots<span></span></p>
                                        </div>
                                        <div class="product-price">
                                            <p><span>7,800,000<sup>đ</sup></span> <del><sup></sup></del></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-default">
                            <div class="block-products">
                                <a href="#" class="products-item_link">
                                    <div class="block-image">
                                        <img src="<?= $CONTENT_URL ?>/images/sofa-phong-khach.jpg" alt="sofa-phong-khach">
                                        <div class="products-item-sale">
                                            <span class="sale-val">-14%</span>
                                        </div>
                                    </div>
                                    <div class="block-body">
                                        <div class="product-name">
                                            <p>Sofa Phòng Khách <span>S003</span></p>
                                        </div>
                                        <div class="product-price">
                                            <p><span>6,800,000<sup>đ</sup></span> <del>7,900,000<sup>đ</sup></del></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-default">
                            <div class="block-products">
                                <a href="#">
                                    <div class="block-image">
                                        <img src="<?= $CONTENT_URL ?>/images/sofa-giuong-keo.jpg" alt="sofa-giuong-keo">
                                    </div>
                                    <div class="block-body">
                                        <div class="product-name">
                                            <p>Sofa Giường Kéo Roots<span></span></p>
                                        </div>
                                        <div class="product-price">
                                            <p><span>7,800,000<sup>đ</sup></span> <del><sup></sup></del></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-default">
                            <div class="block-products">
                                <a href="#">
                                    <div class="block-image">
                                        <img src="<?= $CONTENT_URL ?>/images/sofa-giuong-keo.jpg" alt="sofa-giuong-keo">
                                    </div>
                                    <div class="block-body">
                                        <div class="product-name">
                                            <p>Sofa Giường Kéo Roots<span></span></p>
                                        </div>
                                        <div class="product-price">
                                            <p><span>7,800,000<sup>đ</sup></span> <del><sup></sup></del></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-default">
                            <div class="block-products">
                                <a href="#">
                                    <div class="block-image">
                                        <img src="<?= $CONTENT_URL ?>/images/sofa-giuong-keo.jpg" alt="sofa-giuong-keo">
                                    </div>
                                    <div class="block-body">
                                        <div class="product-name">
                                            <p>Sofa Giường Kéo Roots<span></span></p>
                                        </div>
                                        <div class="product-price">
                                            <p><span>7,800,000<sup>đ</sup></span> <del><sup></sup></del></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script>
        $(() => {
            $('.wrap_aside img').click(function() {
                let imgPath = $(this).attr('src');
                // alert (imgPath);
                // console.log(imgPath);
                // attr lấy giá trị thuộc tính & thay thế giá trị thuộc tính
                $('#main_img').attr('src',imgPath);
            })
        })
        </script>
<script>
    // xử lý sj số lượng tồn kho
    var so_luong_sp_ton_kho = document.querySelector(".so_luong_ton_kho");
    var so_luong_max = Number(so_luong_sp_ton_kho.value);
    var so_luong_chi_tiet = document.querySelector("#so_luong_chi_tiet");
    so_luong_chi_tiet.setAttribute("max",so_luong_max);
</script>
<script src="<?= $CONTENT_URL ?>/js/chi-tiet.js"></script>