<div class="container-fluid" style="padding: 0 80px;">
    <div class="row">
        <div class="col-3">
            <?php
            require_once('aside-menu.php');
            ?>
        </div>
        <div class="col-9">
            <div class="oder_invoice-wrapper">
                <div class="oder_invoice-content">
                    <div class="oder_invoice-items">
                        <a href="" class="oder_invoice-links">
                            <span class="oder_invoice-text">
                                Tất cả
                            </span>
                        </a>
                        <a href="" class="oder_invoice-links">
                            <span class="oder_invoice-text">
                                Chờ xác nhận
                            </span>
                        </a>
                        <!-- <a href="" class="oder_invoice-links">
                            <span class="oder_invoice-text">
                                Chờ lấy hàng
                            </span>
                        </a> -->
                        <a href="" class="oder_invoice-links">
                            <span class="oder_invoice-text">
                                Đang giao
                            </span>
                            <span class="oder_invoice-delivering">(1)</span>
                        </a>
                        <a href="" class="oder_invoice-links">
                            <span class="oder_invoice-text">
                                Đã giao
                            </span>
                        </a>
                        <a href="" class="oder_invoice-links">
                            <span class="oder_invoice-text">
                                Đã hủy
                            </span>
                        </a>
                    </div>
                    <div class="bill_search">
                        <form action="" method="post" class="form-inline my-2 my-lg-0 bill_search" style="padding: 0 5px;">
                            <button class="btn my-2 my-sm-0"><i class="fas fa-search"></i></button>
                            <input type="text" class="my-2 my-sm-0 bill_search_input" placeholder="Tìm kiếm theo đơn hàng">
                        </form>
                    </div>
                    <!-- block all product -->

                    <div class="oder_invoice-products active">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã HD</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $hoa_don_ma_kh = hoa_don_ma_kh($ma_kh);
                                foreach ($hoa_don_ma_kh as $hd) {
                                    extract($hd);
                                ?>

                                    <tr>
                                        <td class="hoa__don_background" ><?= $ma_hd ?></td>
                                        <td class="hoa__don_background"  ><?= $ngay_dat ?></td>
                                        <td class="hoa__don_background" ><?= number_format($tong_tien) ?><sup>đ</sup></td>
                                        <td class="hoa__don_background" ><?= $dia_chi_giao_hang ?></td>
                                        <td class="hoa__don_background" ><?php if($trang_thai == 1){
                                            echo "Chờ xác nhận";
                                        } elseif( $trang_thai == 2){
                                            echo "Đang giao hàng";                                                                      
                                        }  elseif( $trang_thai == 3){
                                            echo "Đã thanh toán";
                                        } else{
                                            echo "Đã hủy";
                                        }
                                        ?></td>
                                        
                                     
                                    </tr>
                                    <tr>
                                        <td style="border-top:none" colspan="6">
                                        <table  class="table table-in">
                                            <!-- <tr>
                                                <th>*</th>
                                                <th>Mã SP</th>
                                                <th>Hình</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                            </tr> -->
                                            <?php
                                            $hoa_don_kh =  hoa_don_kh($ma_hd);

                                            foreach ($hoa_don_kh as $hd_kh) {
                                                extract($hd_kh);
                                            ?>
                                                <tr class="tr_child" >
                                                   
                                                    <td  style="border-left:2px dashed #ccc ;" ><?= $ten_sp ?></td>
                                                    <td><img style="width:60px" src="../../content//images/products/<?= $hinh ?>" alt=""></td>
                                                    <td><?= $gia_ban ?></td>
                                                    <td>x <?= $so_luong ?></td>
                                                </tr>
                                            <?php

                                            }

                                            ?>
                                        </table>
                                        </td>
                                    </tr>



                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- chờ xác nhận -->

                    <div class="oder_invoice-products active">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã HD</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $hoa_don_cho_xac_nhan = hoa_don_cho_xac_nhan($ma_kh);
                                foreach ($hoa_don_cho_xac_nhan as $hd_xac_nhan) {
                                    extract($hd_xac_nhan);
                                ?>
                                    <tr>
                                        <td class="hoa__don_background" ><?= $ma_hd ?></td>
                                        <td class="hoa__don_background"  ><?= $ngay_dat ?></td>
                                        <td class="hoa__don_background" ><?= number_format($tong_tien) ?><sup>đ</sup></td>
                                        <td class="hoa__don_background" ><?= $dia_chi_giao_hang ?></td>
                                        <td class="hoa__don_background" ><?php if($trang_thai == 1){
                                            echo "Chờ xác nhận";
                                        } elseif( $trang_thai == 2){
                                            echo "Đang giao hàng";                                                                      
                                        }  elseif( $trang_thai == 3){
                                            echo "Đã thanh toán";
                                        } else{
                                            echo "Đã hủy";
                                        }
                                        ?></td>
                                        
                                     
                                    </tr>
                                    <tr>
                                        <td style="border-top:none" colspan="6">
                                        <table  class="table table-in">
                                            <!-- <tr>
                                                <th>*</th>
                                                <th>Mã SP</th>
                                                <th>Hình</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                            </tr> -->
                                            <?php
                                            $hoa_don_kh =  hoa_don_kh($ma_hd);

                                            foreach ($hoa_don_kh as $hd_kh) {
                                                extract($hd_kh);
                                            ?>
                                                <tr class="tr_child" >
                                                   
                                                    <td  style="border-left:2px dashed #ccc;" ><?= $ten_sp ?></td>
                                                    <td><img style="width:60px" src="../../content//images/products/<?= $hinh ?>" alt=""></td>
                                                    <td><?= $gia_ban ?></td>
                                                    <td>x <?= $so_luong ?></td>
                                                </tr>
                                            <?php

                                            }

                                            ?>
                                        </table>
                                        </td>
                                    </tr>



                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                 
                  
                    <!-- đang giao -->
                    <div class="oder_invoice-products active">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã HD</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $hoa_don_cho_xac_nhan = hoa_don_dang_giao($ma_kh);
                                foreach ($hoa_don_cho_xac_nhan as $hd_xac_nhan) {
                                    extract($hd_xac_nhan);
                                ?>
                                    <tr>
                                        <td class="hoa__don_background" ><?= $ma_hd ?></td>
                                        <td class="hoa__don_background"  ><?= $ngay_dat ?></td>
                                        <td class="hoa__don_background" ><?= number_format($tong_tien) ?><sup>đ</sup></td>
                                        <td class="hoa__don_background" ><?= $dia_chi_giao_hang ?></td>
                                        <td class="hoa__don_background" ><?php if($trang_thai == 1){
                                            echo "Chờ xác nhận";
                                        } elseif( $trang_thai == 2){
                                            echo "Đang giao hàng";                                                                      
                                        }  elseif( $trang_thai == 3){
                                            echo "Đã thanh toán";
                                        } else{
                                            echo "Đã hủy";
                                        }
                                        ?></td>
                                        
                                     
                                    </tr>
                                    <tr>
                                        <td style="border-top:none" colspan="6">
                                        <table  class="table table-in">
                                            <!-- <tr>
                                                <th>*</th>
                                                <th>Mã SP</th>
                                                <th>Hình</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                            </tr> -->
                                            <?php
                                            $hoa_don_dang_giao = hoa_don_dang_giao($ma_kh);

                                            foreach ( $hoa_don_dang_giao as $dang_giao) {
                                                extract($dang_giao);
                                            ?>
                                                <tr class="tr_child" >
                                                   
                                                    <td  style="border-left:2px dashed #ccc;" ><?= $ten_sp ?></td>
                                                    <td><img style="width:60px" src="../../content//images/products/<?= $hinh ?>" alt=""></td>
                                                    <td><?= $gia_ban ?></td>
                                                    <td>x <?= $so_luong ?></td>
                                                </tr>
                                            <?php

                                            }

                                            ?>
                                        </table>
                                        </td>
                                    </tr>



                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!--  đã giao-->
                    <div class="oder_invoice-products">
                        <h4>Đã giao</h4>
                        <div class="row">
                            <div class="col-10">
                                <div class="oder_invoice-picture_area">
                                    <img src="../../content/images/products/banbep.jpg" alt="" class="invoice_img">
                                    <div class="oder_invoice-text-product">
                                        <h6 class="oder_invoice-title">[Shop siêu saLe] [TẶNG KÈM PHỤ KIỆN] Lều cho bé, Lều công chúa lều hoàng tử - Hàng loại 1</h6>
                                        <div class="oder_invoice-number">
                                            x1
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="oder_invoice-product-price">
                                    <div class="oder_price">
                                        <span style="color:#333;"><del>840,000</del><sup>đ</sup></span>
                                        <span style="color:red">420,000<sup>đ</sup></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oder_invoice-total-money-product">
                            <div class="money-tile" style="margin-right:5px;">
                                Tổng số tiền:
                            </div>
                            <div class="money-tile_proview">
                                420,000<sup>đ</sup>
                            </div>
                        </div>
                        <div class="button_riseve">
                            <button class="btn btn-info">Đã nhận hàng</button>
                            <button class="btn btn-info">Yêu cầu hủy đơn hàng</button>
                        </div>
                    </div>
                    <!-- đã hủy -->
                    <div class="oder_invoice-products">
                        <h4>Đã hủy</h4>
                        <div class="row">
                            <div class="col-10">
                                <div class="oder_invoice-picture_area">
                                    <img src="../../content/images/products/banbep.jpg" alt="" class="invoice_img">
                                    <div class="oder_invoice-text-product">
                                        <h6 class="oder_invoice-title">[Shop siêu saLe] [TẶNG KÈM PHỤ KIỆN] Lều cho bé, Lều công chúa lều hoàng tử - Hàng loại 1</h6>
                                        <div class="oder_invoice-number">
                                            x1
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="oder_invoice-product-price">
                                    <div class="oder_price">
                                        <span style="color:#333;"><del>840,000</del><sup>đ</sup></span>
                                        <span style="color:red">420,000<sup>đ</sup></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oder_invoice-total-money-product">
                            <div class="money-tile" style="margin-right:5px;">
                                Tổng số tiền:
                            </div>
                            <div class="money-tile_proview">
                                420,000<sup>đ</sup>
                            </div>
                        </div>
                        <div class="button_riseve">
                            <button class="btn btn-info">Đã nhận hàng</button>
                            <button class="btn btn-info">Yêu cầu hủy đơn hàng</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var $ = document.querySelector.bind(document);
    var $$ = document.querySelectorAll.bind(document);
    var oder_invoice_links = $$(".oder_invoice-links");
    var oder_invoice_products = $$(".oder_invoice-products");
    oder_invoice_links.forEach(function(link, index) {
        link.onclick = function(e) {
            var $ = document.querySelector.bind(document);
            e.preventDefault();

            $('.oder_invoice-products.active').classList.remove('active');
            oder_invoice_products[index].classList.add('active');
        }
    })
</script>