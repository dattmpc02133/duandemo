<?php
$san_pham =  san_pham_getinfo($ma_sp);
extract($san_pham);
if ($so_luong == 0) {
    trang_thai_sp_het_hang($ma_sp);
} else {
    trang_thai_sp_con_hang($ma_sp);
}

?>

<div class="container__chi-tiet">

    <div class="row rowresponsive">
        <div class="col-6 col-md-6 colresponsive">
            <div class="view__product">
                <div class="row">
                    <div class="col-3">
                        <div class="view__product-img wrap_aside">
                            <?php
                            $hinh_phu = select_hinh_phu($ma_sp);

                            foreach ($hinh_phu as $key) {
                                extract($key);
                            ?>
                                <input type="hidden" name="ma_sp" class="ma_sp" value="<?= $ma_sp ?>">
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
                <span class="so_luong_sp_con_lai">Còn lại: <?= $so_luong ?> sản phẩm </span>
                <div class="description__form">
                    <form action="<?= $SITE_URL ?>/trang-chinh/index.php?addcart" method="post">
                        <div class="row">
                            <div class="col-4">
                                <div class="description__form-left">
                                    <div class="quantity-area" id="giam_so_luong">-</div>
                                    <input class="so_luong_ton_kho" type="hidden" value="<?= $so_luong ?>">
                                    <input class="description__form-left-input" name="so_luong" value="1" min="1" type="number" id="so_luong_chi_tiet">
                                    <div class="quantity-area" id="tang_so_luong">+</div>

                                </div>

                            </div>
                            <div class="col-8">
                                <div class="description__form-right">
                                    <?php
                                    if ($so_luong == 0) {
                                        echo '  <button disabled class="btn btn-danger add__carrt btn_het_hang" name="">Hết hàng</button>';
                                    } else {
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
<div class="col-12 col-lg-6 col-md-12 col-sm-12 ">
    <div class="content_page-new-comment">

        <div class="contact-boxt_sent_lish" style="padding-top:20px">
            <h3 style="margin-bottom: 30px;">Viết bình luận</h3>
            <form method="post" id="form__gui-bl" class="row grid">
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<div class="col-md-12">
                         <input type="hidden" name="ma_sp" id="ma_sp" value="' . $ma_sp . '" >
                         <input type="hidden" id= "ma_kh" name="ma_kh" value="' . $_SESSION['user'] . '" >
                              <textarea class="form-control controller" name ="noi_dung_gui_bl" id="exampleFormControlTextarea1" rows="5" placeholder="Nội dung"></textarea>
                         </div>
                         <div class="col-sm-12">
                             <button class="btn btn-primary" style="float:right;" name = "btn_gui_bl" type="submit">Gửi bình luận</button>
                         </div>
                         ';
                } else {
                    echo '<div class="col-md-12">
                               <textarea class="form-control controller" id="exampleFormControlTextarea1" disabled rows="5" placeholder="Đăng nhập để viết bình luận"></textarea>
                           </div>';
                    echo '<div class="col-sm-12">
                               <button class="btn btn-primary"style="float:right; disabled type="submit">Gửi bình luận</button>
                           </div>';
                }
                ?>
            </form>
            <div class="col-sm-12">
                <div class="bl__kh">
                    <?php require_once("./bl-khach-hang.php") ?>
                </div>
            </div>
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
                                <a href="<?= $SITE_URL ?>/san-pham/chi-tiet.php?ma_sp=<?= $ma_sp ?>">
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
                <div class="row spdaxem_reponsive">

                    <?php
                  
                    $_SESSION['sp_da_xem'][] = $_GET['ma_sp'];
                    array_unique($_SESSION['sp_da_xem']);
                    $length = count($_SESSION['sp_da_xem']);
                    if ($length >= 6) {
                        array_shift($_SESSION['sp_da_xem']);
                        foreach ( array_unique($_SESSION['sp_da_xem']) as $show1) {
                            $sp_dx1 =  san_pham_getinfo($show1);
                            echo '
                            <div class="col-default">
                            <div class="block-products">
                                <a href="'.$SITE_URL.'/san-pham/chi-tiet.php?ma_sp='.$sp_dx1['ma_sp'].'">
                                    <div class="block-image">
                                        <img src="../../content/images/products/'.$sp_dx1['hinh'].'" alt="sofa-giuong-keo">
                                    </div>
                                    <div class="block-body">
                                        <div class="product-name">
                                            <p>' .$sp_dx1['ten_sp'] . '<span></span></p>
                                        </div>
                                        <div class="product-price">
                                        <p><span>' . number_format($sp_dx1['don_gia'] - ($sp_dx1['giam_gia'] * $sp_dx1['don_gia'] / 100)) . '<sup>đ</sup></span> <del>' . $sp_dx1['don_gia'] . '<sup>đ</sup></del></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                            ';
                        }
                    } else {
                        foreach ( array_unique($_SESSION['sp_da_xem']) as $show2) {
                            $sp_dx2 =  san_pham_getinfo($show2);
                            echo '
                            <div class="col-default">
                            <div class="block-products">
                                <a href="'.$SITE_URL.'/san-pham/chi-tiet.php?ma_sp='.$sp_dx2['ma_sp'].'">
                                    <div class="block-image">
                                        <img src="../../content/images/products/'.$sp_dx2['hinh'].'" alt="sofa-giuong-keo">
                                    </div>
                                    <div class="block-body">
                                        <div class="product-name">
                                            <p>' .$sp_dx2['ten_sp'] . '<span></span></p>
                                        </div>
                                        <div class="product-price">
                                        <p><span>' . number_format($sp_dx2['don_gia'] - ($sp_dx2['giam_gia'] * $sp_dx2['don_gia'] / 100)) . '<sup>đ</sup></span> <del>' . $sp_dx2['don_gia'] . '<sup>đ</sup></del></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                            ';

                            // echo "<pre>";
                            // print_r($sp_dx2);
                            // echo "</pre>";
                          
                        }
                    }

                  


                    //  unset($_SESSION['sp_da_xem']);



                    ?>


                    <!-- <div class="col-default">
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script>
    $(() => {
        $('.wrap_aside img').mouseover(function() {
            let imgPath = $(this).attr('src');
            // alert (imgPath);
            // console.log(imgPath);
            // attr lấy giá trị thuộc tính & thay thế giá trị thuộc tính
            $('#main_img').attr('src', imgPath);
        })
    })
    //
    // xử lý số lượng sản phẩm tồn kho
    function sp_ton_kho() {
        var so_luong_sp_ton_kho = document.querySelector(".so_luong_ton_kho");
        var so_luong_max = Number(so_luong_sp_ton_kho.value);
        var so_luong_chi_tiet = document.querySelector("#so_luong_chi_tiet");
        so_luong_chi_tiet.setAttribute("max", so_luong_max);
    }
    sp_ton_kho()
    // hiển thị thông báo khi mua vượt số lượng sản phẩm có trong kho

    function thong_so_luong() {
        var so_luong_ton_kho = document.querySelector('.so_luong_ton_kho').value;

        var element_input = document.querySelector(".description__form-left-input");
        element_input.addEventListener('invalid', function() {
            if (element_input.value > Number(so_luong_ton_kho)) {
                element_input.setCustomValidity("Số lượng sản phẩm còn lại trong kho là " + so_luong_ton_kho + " sản phẩm");
            }
        })
    }

    thong_so_luong()
    // xử lý gửi bình luận bằng ajax

    $(document).ready(function() {

        $("#form__gui-bl").on("submit", function(e) {

            e.preventDefault();
            // var ma_kh = $('#ma_kh').val();
            // var ma_sp = $("#ma_sp").val();
            // alert(ma_sp);
            $.ajax({
                url: "ajax_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(respone) {
                    $("#form__gui-bl")[0].reset();
                }
            })
        })


    })
</script>


<script src="<?= $CONTENT_URL ?>/js/chi-tiet.js"></script>