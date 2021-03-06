<?php
require_once("../../DAO/pdo.php");
require_once("../../DAO/khach-hang.php");
?>
<section class="navbar_header-pc">
    <div class="col-sm-12" style="padding: 0;">
        <h3 style="background: #1fb5d4; color: white; text-align: center; padding: 10px; font-size: 1.2rem;">
            Tô thêm vẻ đẹp tâm hồn bên trong ngôi nhà của bạn !</h3>
    </div>
    <div class="grid">
        <div class="row" style="padding: 0 25px; text-align: center; align-items: center; margin:0 !important" >
            <div class="col-sm-2">
                <a href="<?= $ROOT_URL ?>"> <img src="<?= $CONTENT_URL  ?>/images/Removal-195.png" style="width:70%" alt="Hình" class="header_img"></a>
            </div>
            <div class="col-sm-5">
                <div class="search">
                    <form  action="../san-pham/liet-ke.php" class="form-inline my-2 my-lg-0 header_seachr">
                        <input class="form-control mr-sm-2 header_seachr" name="search" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0 btn_seachr" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="header_box-right">
                    <div class="hotline riverdungchung">
                        <i class="incon_size fas fa-phone-alt"></i>
                        <span>Hotline:<p style="margin: 0;"> <a href="tel:1900150063">1900.1500</a></p></span>
                    </div>
                    <div class="account riverdungchung">
                        <div class="user__active" id="account_dangnhap">
                        <?php 
                                if(isset($_SESSION['user'])){
                                    $info_img = get_info_kh($_SESSION['user']) ;
                                    if($info_img['hinh'] == null){
                                        echo '<img class="avt__user"  src="'.$CONTENT_URL.'/images/user/user.jpg" alt="">';
                                    }
                                    echo '<img class="avt__user" src="'.$CONTENT_URL.'/images/user/'.$info_img['hinh'].'" alt="">';
                                } else{

                                    echo "<i class='incon_size fas fa-user-circle'></i>";
                                }
                            ?>

                            <div style="margin-left: 10px;" class="account_dangnhap">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo $_SESSION['user'] . ' /';
                                    echo ' <a href="../tai-khoan/dang-nhap.php?logout">Đăng Xuất</a><br>';
                                    echo '<a href="../tai-khoan/index.php?btn-thong-tin" style="margin: 0; text-align: center;">Tài Khoản Của Tôi</a>';
                                } else {
                                    echo ' <a id="dang_nhap" href="#">Đăng Nhập /</a>
                                        <a id="dang_ky" href="../tai-khoan/index.php?dang_ky">Đăng Ký</a><br>';
                                }
                                ?>
                                <!-- <a href="#" style="margin: 0; text-align: center;">Tài Khoản Của Tôi</a> -->
                            </div>
                        </div>
                        <div class="header-dropdown_content" id="header-dropdown_content">
                            <div class="site_account_panel_list">
                                <h3 class="site_account-title">
                                    Đăng nhập tài khoản
                                    <p style="color:#677297; font-size:0.9rem;margin: 0;padding-top: 5px;">Tên đăng nhập và mật khẩu:</p>
                                </h3>
                                <form action="../tai-khoan/dang-nhap.php" method="POST" id="form_du_an_dn" class="customer_login">
                                    <div class="customer_account">
                                        <div class="form-group customer_account">
                                            <input type="text" placeholder="Tên đăng nhập" id="username" class="site_account-input" name="username">
                                            <span align="left" style="color:red;font-style:oblique;font: size 14px;" class="mess"></span>
                                            <span><?php if (isset($kt_username)) {
                                                        echo "$kt_username";
                                                    } ?></span>
                                        </div>
                                        <div class="form-group customer_account">
                                            <input type="password" placeholder="Mật khẩu" class="site_account-input" id="password" name="password">
                                            <span align="left" style="color:red;font-style:oblique;font: size 14px;" class="mess"></span>
                                            <span><?php if (isset($kt_password)) {
                                                        echo $kt_password;
                                                    } ?></span>
                                        </div>
                                    </div>
                                    <span>
                                        <!-- <p style="font-size: 0.9rem;text-align: justify; color: #677297;">This site is protected by reCAPTCHA and the Google Privacy Policy and
                                            Terms of Service apply.
                                        </p> -->
                                    </span>
                                    <button type="submit" id="login" name="login" class="btn btn-primary account-dangnhap">Đăng nhập</button>
                                    <div class="site_account-register" style="margin-top: 10px;">
                                        <span>Khách hàng mới? <a href="../tai-khoan/index.php?dang_ky" class="link">Tạo tài khoản</a></span> <br>
                                        <span>Quên mật khẩu? <a href="../tai-khoan/index.php?quen-mk" class="link">Khôi phục mật khẩu</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="cart riverdungchung" id="cart">
                        <div class="cart_gio">
                            <i class="incon_size fas fa-shopping-cart"></i>

                            <span class="header_cart-notice"></span>
                            <span class="header_cart-notice numbers_by_cart">0</span>

                        </div>
                        <span style="cursor: pointer;">Giỏ Hàng</span>

                        <?php
                        require_once("../trang-chinh/header-cart-list.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- menu -->
        <nav class="navbar_header">
            <ul class="navbar_header-product">
                <li class="navbar_header-link"><a href="<?= $ROOT_URL ?>" class="header-linkk">TRANG CHỦ</a></li>
                <li class="navbar_header-link header--ative">
                    <a href="<?= $SITE_URL ?>/san-pham/liet-ke.php" class="header-linkk">SẢN PHẨM</a>
                    <ul class="header_chill-product">
                        <li class="header_chill-link">
                            <?php
                            $list_ds = loai_selectall();
                            foreach ($list_ds as $ds_loai) {
                                extract($ds_loai);


                            ?>
                                <a href="<?= $SITE_URL ?>/san-pham/liet-ke.php?ma_loai=<?= $ma_loai ?>" class="header-link_chilll"><?= $ten_loai ?></a>

                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </li>
                <!-- <li class="navbar_header-link"><a href="#" class="header-linkk">PRODUCT VIEW</a></li> -->
                <li class="navbar_header-link"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?tin-tuc">TIN TỨC</a></li>
                <li class="navbar_header-link"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?gioi-thieu" class="header-linkk">GIỚI THIỆU</a></li>
                <li class="navbar_header-link"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?lien-he" class="header-linkk">LIÊN HỆ</a></li>
            </ul>
        </nav>
    </div>
</section>
<section class="navbar_header-mobie3">
    <div class="col-sm-12" style="padding: 0;">
        <h3 style="background: #1fb5d4; color: white; text-align: center; padding: 10px; font-size: 1.2rem;">Tô thêm vẻ đẹp tâm hồn bên trong ngôi nhà của bạn !</h3>
    </div>
    <div class="grid">
        <div class="row" style="padding: 0 25px; text-align: center; width: 100% ;align-items: center;">

            <div class="col-4">
                <div class="navbar_baricon">
                    <label for="nav_mobie_input">
                        <i class="navbar_icon fas fa-bars"></i>
                    </label>
                </div>
                <input type="checkbox" hidden name="" class="nav__iput" id="nav_mobie_input">

                <label for="nav_mobie_input" class="navbar_overplay-product">

                </label>
                <ul class="navbar_overplay-list header_nabv3">
                    <div class="navbar_bar-close">
                        <label for="nav_mobie_input"><i class="navbar_iconx fas fa-times"></i></label>
                    </div>
                    <li class="navbar_bar-lish"><a href="<?= $ROOT_URL ?>" class="header-linkk_items">TRANG CHỦ</a></li>
                    <li class="navbar_bar-lish header--ative">
                        <!-- <a href="<?= $SITE_URL ?>/san-pham/" id="spmobie" class="header-linkk_items">SẢN PHẨM</a> -->
                        <span id="spmobie" class="header-linkk_items">SẢN PHẨM</span>
                        <ul class="header_chill-productt">
                                <li id="header_chill-linked">
                                <a class="header-link_chilll" href="<?= $SITE_URL ?>/san-pham/liet-ke.php">Tất cả sản phẩm</a>
                                <?php
                                $list_ds = loai_selectall();
                                foreach ($list_ds as $ds_loai) {
                                    extract($ds_loai);
                                ?>
                                    <a href="<?= $SITE_URL ?>/san-pham/liet-ke.php?ma_loai=<?= $ma_loai ?>" class="header-link_chilll"><?= $ten_loai ?></a>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="navbar_bar-lish"><a href="#" class="header-linkk_items">PRODUCT VIEW</a></li> -->
                    <li class="navbar_bar-lish"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?tin-tuc" class="header-linkk_items">TIN TỨC</a></li>
                    <li class="navbar_bar-lish"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?gioi-thieu" class="header-linkk_items">GIỚI THIỆU</a></li>
                    <li class="navbar_bar-lish"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?lien-he" class="header-linkk_items">LIÊN HỆ</a></li>
                </ul>
            </div>
            <div class="col-4 ">
                <img src="<?= $CONTENT_URL  ?>/images/Removal-195.png" style="width:100%" alt="Hình" class="header_img">
            </div>
            <div class="col-4">
                <div class="header_box-right">
                    <div class="hotline riverdungchung">
                        <i class="incon_size fas fa-phone-alt"></i>
                        <span>Hotline:<p style="margin: 0;">1900.1500.63</p></span>
                    </div>
                    <div class="account riverdungchung">
                    <?php 
                                if(isset($_SESSION['user'])){
                                    $info_img = get_info_kh($_SESSION['user']) ;
                                    if($info_img['hinh'] == null){
                                        echo '<img class="avt__user"  src="'.$CONTENT_URL.'/images/user/user.jpg" alt="">';
                                    }
                                    echo '<img class="avt__user" src="'.$CONTENT_URL.'/images/user/'.$info_img['hinh'].'" alt="">';
                                } else{

                                    echo "<i class='incon_size fas fa-user-circle'></i>";
                                }
                            ?>
                        <div class="account_dangnhap">
                            <a href="#">Đăng Nhập /</a>
                            <a href="../tai-khoan/index.php?dang_ky">Đăng Ký</a><br>
                            <a href="../tai-khoan/index.php?thong-tin-tk" style="margin: 0; text-align: center;">Tài Khoản Của Tôi</a>
                        </div>
                        <div class="header-dropdown_content">
                            <div class="site_account_panel_list">
                                <h3 class="site_account-title">
                                    Đăng Nhập Tài Khoản
                                    <p style="color:#677297; font-size:0.9rem;margin: 0;padding-top: 5px;">Nhập email và mật khẩu của bạn:</p>
                                </h3>
                                <form action="#" method="post" class="customer_login">
                                    <div class="customer_account">
                                        <input type="text" placeholder="Email" class="site_account-input">
                                        <input type="password" placeholder="Mật Khẩu" class="site_account-input">
                                    </div>
                                    <span>
                                        <!-- <p style="font-size: 0.9rem;text-align: justify; color: #677297;">This site is protected by reCAPTCHA and the Google Privacy Policy and
                                            Terms of Service apply.
                                        </p> -->
                                    </span>
                                    <button type="submit" name="" class="btn btn-primary account-dangnhap">Đăng Nhập</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="cart riverdungchung">
                        <div class="cart_gio">
                           <a href="<?= $SITE_URL?>/trang-chinh/index.php?addcart"> <i class="incon_size fas fa-shopping-cart"></i></a>
                          
                            <!-- <span class="header_cart-notice">3</span> -->
                        </div>
                        <span class="header_cart-mobie" style="cursor: pointer;">Giỏ Hàng</span>
                        <div class="header_cart-list">
                            <h3 class="header_cart-textt">Giỏ Hàng</h3>
                            <div class="header_cart-hanghoa">

                                <i class="header_cart-no-cart-img fab fa-shopify"></i>
                                <span class="header_cart-list-no-cart-msg">Chưa có sản phẩm nào..!!</span>

                            </div>
                            <div class="header_cart-price">
                                <span class="cart-text_left">Tổng Tiền: </span>
                                <span class="cart-text_right">0<sup>đ</sup></span>
                            </div>
                            <div class="cart_pay">
                                <a href="trang-chinh/index.php?addcart" class="PayPay">Xem Giỏ Hàng</a>
                                <!-- <a href="" class="PayPay">Thanh Toán</a> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" style="width:100%">
                <input class="form-control mr-sm-2 search__mobile" name="search" type="search" placeholder="Tìm kiến sản phẩm" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 btn__responsive" type="submit">Search</button>
            </form>
        </nav>
    </div>
</section>
<!-- end menu -->

<script type="text/javascript">
    function kt_form() {
        var username = document.querySelector('#username')
        var password = document.querySelector("#password")
        var mess = document.querySelectorAll(".mess");
        var login = document.querySelector("#login");
        login.onclick = function(e) {
            if (username.value == "") {
                mess[0].innerHTML = "Tên đăng nhập không được bỏ trống";
                e.preventDefault();
            }
            if (password.value == "") {
                mess[1].innerHTML = "Mật khẩu không được bỏ trống";
                e.preventDefault();
            }
        }
    }
    kt_form();

    function numbers_by_cart() {
    
        var numbers_by_cart = document.querySelector(".numbers_by_cart");
        var header_cart_products = document.querySelectorAll(".header_cart-products");
        numbers_by_cart.innerHTML = header_cart_products.length;
        
    }
    numbers_by_cart()

    function spmobie() {
        var spmobie = document.querySelector("#spmobie");
        console.log([spmobie]);
        var limobie = document.querySelector("#header_chill-linked");
        spmobie.addEventListener('click', () => {

            if (limobie.style.display == "none") {
                limobie.style.display = 'block';
                limobie.style.animation = `mobiedifile ease-in 2s`;
            } else {
                limobie.style.display = 'none';
            }
        });
        
    }
    spmobie();
</script>