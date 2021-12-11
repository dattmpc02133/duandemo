<?php
require_once("../../global.php");
require_once '../../DAO/hoa-don.php';
require_once '../../DAO/khuyen-mai.php';

$_SESSION['kq'] = 0;
if (!isset($_SESSION['user'])) {

    echo '<script>
    alert("Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng");
    location.href = "' . $ROOT_URL . '";
</script>';
}
if (isset($_GET['id'])) {
    car_delete($_GET['id']);
    echo "<script>
         location.href = 'index.php?addcart';
       </script>";
}
if (isset($_POST['addcart'])) {
    if (!isset($_SESSION['user'])) {
        $ma_sp_tam = $_POST['ma_sp'];
        echo '<script> alert("Vui lòng đăng nhập để mua sản phẩm"); </script>';
        echo '<script>
                location.href = "' . $SITE_URL . '/san-pham/chi-tiet.php?ma_sp=' . $ma_sp_tam . '";
            </script>';
    } else {
        $ma_kh = $_SESSION['user'];
        $ma_sp_tam = $_POST['ma_sp'];
        $hinh_tam = $_POST['hinh_sp'];
        $ten_sp_tam = $_POST['ten_sp'];
        $don_gia_tam = $_POST['don_gia'];
        $so_luong_tam = $_POST['so_luong'];
        if (san_pham_getinfo_tam($ma_sp_tam)) {
            $them = $_POST['so_luong'];
            cart_update_so_luong($them, $ma_sp_tam);
        } else {
            $cart = cart_insert($ma_kh, $ma_sp_tam, $hinh_tam, $ten_sp_tam, $don_gia_tam, $so_luong_tam);
        }
    }
}

if (isset($_POST['dat_hang'])) {
    $ma_kh = $_SESSION['user'];
    $tong_tien = $_POST['tong_tien'];
    $dia_chi_giao_hang = $_POST['dia_chi_giao_hang'];
    $ngay_dat = date_format(date_create(), "Y-m-d");
    $trang_thai = 1;
    $so_luong_input_data = $_POST['so_luong_input_data'];
    hoa_don_insert($ma_kh, $tong_tien, $dia_chi_giao_hang, $ngay_dat, $trang_thai);

    if (isset($_SESSION['kq']) && $_SESSION['kq'] == 0 ) {
        khach_hang_da_dung_insert($_POST['ma_km'], $_SESSION['user']);
        unset($_SESSION['kq']);
    }

    $ma_hd2 = get_ma_hd();
    $list_sp_ght = get_ma_sp_gio_hang_tam($ma_kh);
    foreach ($list_sp_ght as $sp) {
        extract($sp);
        hoa_don_chi_tiet_insert($ma_hd2, $ma_sp_tam, $don_gia_tam, $so_luong_input_data);
        // tăng số lượt mua hàng của sản phẩm
        so_luot_mua_sp($so_luong_tam, $ma_sp_tam);
        // trừ đi số lượng sản phẩm trong kho khi khách hàng mua.
        giam_sp_ton_kho_khi_mua($so_luong_tam, $ma_sp_tam);
    }
    delete_all_gio_hang_tam();
    echo "
   
    <script>
        alert('Đặt hàng thành công !');
    </script>";
    // location.href = "index.php";
}
?>
<section class="mainn">
    <?php
    if (isset($_SESSION['user'])) {

        $exist_cart = count_cart_temp($_SESSION['user']);
        if ($exist_cart >= 1) {
    ?>
            <div class="container-fluid" style="padding: 0 80px;">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-9 col-xs-12">
                            <h3 style="text-align: center;">Giỏ hàng của bạn</h3>
                            <table class="form__content-table table">
                                <thead class="table-danger">
                                    <tr>
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
                                            $tong = $don_gia_tam * $so_luong_tam;
                                            $tongtien[] = $tong;
                                            $delete_link = "index.php?addcart&id=$id";
                                    ?>
                                            <tr>

                                                <td><?= $stt ?></td>
                                                <td style="text-align:center;"><img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh_tam ?>" alt=""></td>
                                                <td><?= $ten_sp_tam ?></td>
                                                <td> <input class="don_gia" type="hidden" value="<?= $don_gia_tam ?>">
                                                    <?= number_format($don_gia_tam) ?><sup>đ</sup>
                                                </td>
                                                <td><input style="width:65px" oninput="thanh_tien()" name="so_luong_input_data" class="form-control so_luong" type="number" min=1 value="<?= $so_luong_tam ?>"></td>
                                                <td class="tt">
                                                    <input class="thanhtien" type="hidden" value="<?= $tong ?>">
                                                    <span class="thanh_tien_show">thành tiền</span><sup>đ</sup>
                                                    <span hidden class="thanh_tien_js">thành tiền</span>
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
                        <div class="col-xs-12 col-sm-12 col-lg-3 col-xs-12">
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
                                    <textarea name="dia_chi_giao_hang" class="form-control" style="font-size: 0.9rem; line-height:35px;" maxlength="255"><?= $dia_chi ?></textarea>
                                    <div class="form-group">
                                        <label for="">Mã khuyến mãi</label>
                                        <input class="form-control" type="text" name="ma_km" id="ma_km_ap_dung">
                                        <input type="button" class="btn btn-danger" id="ap_dung" value="Áp dụng">
                                    </div>
                                    <p id="result_ap_dung_km_action"></p>
                                    <p class="order_total_dix" style="padding: 0 8px; color: rgba(0, 0, 0, 0.3); font-size: 1rem"><strong>Tổng Tiền:</strong>
                                        <span id="tong_tien" style="color: red; margin-left: 8px; ">0</span> <sup style="color:red">đ</sup>
                                        <input type="hidden" id="tong_tien2" name="tong_tien">
                                    </p>
                                </div>
                                <div class="note-promo">
                                    <!-- <p>Phí vận chuyển sẽ được tính khi bạn bấm vào thanh toán. <br>
                                </p> -->
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
        <?php
        } else {

        ?>

            <div class="header_cart-hanghoa box__cart-exist" style="min-height:80vh" >
                <i class="header_cart-no-cart-img fab fa-shopify cart_exist"></i>
                <span class="header_cart-list-no-cart-msg text__cart-exist">Chưa có sản phẩm nào trong giỏ hàng</span>
            </div>

    <?php

        }
    }
    ?>




</section>
<script>
    // tính tông tiền của giỏ hàng
    function tong_tien() {
        var thanhtiens = document.querySelectorAll(".thanh_tien_js");
        var tong_tien_nums = 0;
        var tong_tien2 = document.querySelector("#tong_tien2");
        var tong_tien_html = document.querySelector("#tong_tien");
        thanhtiens.forEach(function(thanhtien) {

            tong_tien_nums += Number(thanhtien.innerHTML) * 1;
        })
        tong_tien_html.innerHTML = tong_tien_nums.toLocaleString("en");
        tong_tien2.value = tong_tien_nums;
        console.log(tong_tien2.value);
    }

    // kết thúc tính tổng tiền của giỏ hàng
    // thành tiền của sản phẩm
    function thanh_tien() {

        var don_gia = document.querySelectorAll(".don_gia");
        var so_luong = document.querySelectorAll(".so_luong");

        var thanh_tien = document.querySelectorAll(".thanh_tien_show");
        var thanh_tien_js = document.querySelectorAll('.thanh_tien_js');
        don_gia.forEach(function(gia, index) {
            var tien = (Number(gia.value) * Number(so_luong[index].value)).toLocaleString("en");
            var tien_js = (Number(gia.value) * Number(so_luong[index].value));
            thanh_tien[index].innerHTML = tien;
            thanh_tien_js[index].innerHTML = tien_js;

        })
        tong_tien();
    }

    thanh_tien();
</script>
<script>
    function cat_chuoi(str) {
        var a = str;
        var b = a.split('');
        var c = '';
        for (var i = 1; i < a.length; i++) {
            console.log(a[i]);
            c += a[i];
            if (a[i] == 'đ' || a[i] == '%') {
                break;
            }
        }
        var d = c.substr(0, c.length - 1);
        var e = d.split(',');
        var f = '';
        for (var j = 0; j < e.length; j++) {
            f += e[j];
        }
        return f;
    }

    function tinh_tong_tien() {
        var tong_tien2 = document.getElementById('tong_tien2');
        var tong_tien = document.getElementById('tong_tien');
        var result_ap_dung_km_action = document.getElementById('result_ap_dung_km_action');
        var kt_loai_km = result_ap_dung_km_action.innerHTML.split('');
        var loai_km = '';
        for (var i = 1; i < kt_loai_km.length; i++) {
            if (kt_loai_km[i] == 'đ') {
                console.log(1 + kt_loai_km[i]);
                loai_km = 1;
                break;
            } else if (kt_loai_km[i] == '%') {
                console.log(2 + kt_loai_km[i]);
                loai_km = 2;
                break;
            }
        }
        var muc_giam = cat_chuoi(result_ap_dung_km_action.innerHTML);
        console.log(muc_giam);
        var tt_ban_dau = tong_tien2.value;
        console.log(tt_ban_dau);
        var tong_tien3 = 0;
        if (Number(muc_giam) > 0) {
            if (loai_km == 1) {
                tong_tien3 = Number(tt_ban_dau) - Number(muc_giam);
                console.log(1);
            } else if (loai_km == 2) {
                tong_tien3 = Number(tt_ban_dau) - (Number(tt_ban_dau) * (Number(muc_giam) / 100));
                console.log(2);
            }
            console.log(tong_tien3);
            tong_tien.innerHTML = tong_tien3.toLocaleString('en');
            tong_tien2.value = tong_tien3;
        }
    }

    function show_km(ma_km) {
        $.ajax({
            url: "ap_dung_km_action.php",
            method: "post",
            data: {
                ma_km: ma_km
            },
            success: function(respone) {
                // alert('Thành công');
                $('#result_ap_dung_km_action').html(respone);
                tinh_tong_tien();
            }
        });

    }

    // function fetch_data(){
    //     $.ajax({
    //         url: "ap_dung_km_action.php",
    //         method: "POST",
    //         success: function(respone){
    //             $('#result_ap_dung_km_action').html(respone);
    //         }
    //     })
    // }
    $(document).ready(function() {
        $('#ap_dung').on("click", function() {
            var ma_km = $('#ma_km_ap_dung').val();
            var btn_ap_dung = $('#ap_dung');
            if(ma_km.length > 0){
                show_km(ma_km);
                btn_ap_dung.attr('disabled', 'true');
            }
        })
        // fetch_data();
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>