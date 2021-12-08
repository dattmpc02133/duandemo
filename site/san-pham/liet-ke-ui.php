<div class="container-allproducts">
    <!-- row title -->
    <div class="row_title">
        <div class="row">
            <div class="col-sm-4">
                <!-- <div class="fillter">
                    <a href="#"><i class="bi bi-sliders"></i> Bộ lọc</a>
                </div> -->
               
            </div>
            <div class="col-sm-4">
                <div class="main-title">
                    <h1>Tất cả sản phẩm</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="fill2">
                    <select class="form-control" name="" onchange="SelecterOption(this)" id="lister">
                        <option value="" >Lọc sản phẩm theo giá</option>
                        <option value="1" >Giá < 500.000<sup>đ</sup></option>
                        <option value="2" >Giá từ 600000<sup>đ</sup> đến 1000000<sup>đ</sup></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- end row title -->
    <!-- row products -->
    <div class="row-products">
        <div class="row">
            <?php

            foreach ($products as $product) {
                extract($product)
            ?>
                <div class="col-default">
                    <div class="block-products">
                        <a href="../san-pham/chi-tiet.php?ma_sp=<?= $ma_sp ?>" class="products-item_link">
                            <div class="block-image">
                                <?php
                                $hinh_hover = select_hinh_phu($ma_sp);
                                foreach ($hinh_hover as $hover) {
                                    extract($hover);
                                }
                                ?>
                                <img class="hinh_chinh" src="<?= $CONTENT_URL  ?>/images/products/<?= $hinh ?>">
                                <img hidden class="onmouseout" src="<?= $CONTENT_URL  ?>/images/products/<?= $hinh ?>">
                                <?php
                                if ($hinh_phu == null) {
                                    echo ' <img hidden class="img_onmouseover" src="' . $CONTENT_URL . '/images/products/' . $hinh . '">
                                        ';
                                } else {
                                    echo '
                                        <img hidden class="img_onmouseover" src="' . $CONTENT_URL . '/images/products/' . $hinh_phu . '">
                                        
                                        ';
                                }
                                ?>
                                <?php
                                if ($giam_gia == 0 || $giam_gia == null) {
                                    echo "";
                                } else {
                                    echo '
                                      <div class="products-item-sale">
                                             <span class="sale-val">- ' . $giam_gia . ' %</span>
                                       </div>
                                        ';
                                }
                                ?>
                            </div>
                            <div class="block-body">
                                <div class="product-name">
                                    <p> <?= $ten_sp ?></span></p>
                                </div>
                                <div class="product-price">
                                    <p class="giasp"><span><?= number_format($don_gia - ($giam_gia * $don_gia / 100)) ?><sup>đ</sup></span><?php
                                                                                                                                if ($giam_gia != 0 && $giam_gia != null) {
                                                                                                                                    echo '<del>' . number_format($don_gia) . '<sup>đ</sup></del>';
                                                                                                                                }
                                                                                                                                ?></p>
                                    <p hidden class="giasp2">
                                        <?= $don_gia - ($giam_gia * $don_gia / 100)?>
                                    </p>
                                    
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
    <!-- end row products -->
    <!-- button page -->
    <div class="button-page">
        <button type="button" name="" id="" class="btn btn-light">1</button>
    </div>
    <!-- end button page -->
</div>
<script>
                    function SelecterOption(fill) {
                        var defau = document.querySelectorAll('.col-default');
                        var gia = document.querySelectorAll('.giasp2');
                        console.log(defau,gia);

                        switch(fill.value){
                            case "1":
                                for (var i = 0; i < defau.length; i++) {
                                    if(Number(gia[i].innerHTML)>500000){
                                        defau[i].style.display = "none";
                                    }                        
                                }
                                break;
                                case "2":
                                for (var i = 0; i < defau.length; i++) {
                                    if(Number(gia[i].innerHTML)<500000 && Number(gia[i].innerHTML)>1000000) {
                                        defau[i].style.display = "none";
                                    }                        
                                }
                                break;
                        }
                        // var selecter = document.getElementById('lister').value;
                        // var oplist = document.getElementsByClassName('giasp');
                        // // console.log(selecter);
                        // for (i = 0; i < oplist.length; i++) {
                        //     gia = parseFloat(oplist[i].innerText);
                        //     if (gia < selecter) {
                        //         oplist[i].parentNode.style.display = "block";
                        //     } else {
                        //         oplist[i].parentNode.style.display = "none";
                        //     }
                        // }
                        // console.log(selecterList());
                        
                    }
                </script>