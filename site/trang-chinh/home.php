<!--  -->

<div class="slider_show">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php 
             $item_slideshows =   slideshow();
             foreach($item_slideshows as $slide){
            ?>
            <div class="carousel-item active">
                <img src="<?= $CONTENT_URL  ?>/images/products/<?=$slide['hinh']?>" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> -->
            </div>
           <?php 
             }
           ?>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</div>
<div class="container banner_show">
    <div class="grid">
        <div class="row ">

            <div class="col-sm">
                <a href="../../site/san-pham/liet-ke.php?ma_loai=15"> <img  src="<?= $CONTENT_URL  ?>/images/products/thiet-ke-phong-ngu-cho-co-nang-16-tuoi-1-3.png" alt="" class="banner-content"></a>
            </div>
            <div class="col-sm">
                <a href="../../site/san-pham/liet-ke.php?ma_loai=9"><img src="<?= $CONTENT_URL  ?>/images/img_banner_home_2.jpg" alt="" class="banner-content"></a>
            </div>
            <div class="col-sm">
                <a href="../../site/san-pham/liet-ke.php?ma_loai=3"><img src="<?= $CONTENT_URL  ?>/images/img_banner_home_3.jpg" alt="" class="banner-content"></a>
            </div>
        </div>
    </div>
</div>


<!-- -->
<h2 style="text-align: center; padding: 50px 0px 20px 0px; text-transform: uppercase;">Sản Phẩm Mới</h2>
<section class="container-fluid" style="padding:0 80px;">
    <!-- row products -->
    <div class="row-products">
        <div class="row">
            <?php
            $list_products = select_product_new();
            foreach ($list_products as $item) {
                extract($item)
            ?>
                <div class="col-default">
                    <div class="block-products">
                        <a href="../san-pham/chi-tiet.php?ma_sp=<?= $ma_sp ?>" class="products-item_link">
                            <div class="block-image">
                                <?php  
                                  $hinh_hover = select_hinh_phu($ma_sp);
                                  foreach($hinh_hover as $hover){
                                      extract($hover);
                                  }
                                 
                                 ?>
                                <img class="hinh_chinh" src="<?= $CONTENT_URL  ?>/images/products/<?= $hinh ?>">
                                <img hidden class="onmouseout" src="<?= $CONTENT_URL  ?>/images/products/<?= $hinh ?>">
                                <?php 
                                    if($hinh_phu == null){
                                        echo ' <img hidden class="img_onmouseover" src="'.$CONTENT_URL.'/images/products/'.$hinh.'">
                                        ';
                                    } else{
                                        echo '
                                        <img hidden class="img_onmouseover" src="'. $CONTENT_URL.'/images/products/'.$hinh_phu.'">
                                        
                                        ';
                                    }
                                ?>
                               <?php
                               if($giam_gia == 0 || $giam_gia == null){
                                   echo "";
                               } else{
                                   echo '
                                      <div class="products-item-sale">
                                             <span class="sale-val">- '.$giam_gia.' %</span>
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
                                    <p><span><?= number_format($don_gia - ($giam_gia * $don_gia / 100)) ?><sup>đ</sup></span><?php 
                                        if($giam_gia != 0 && $giam_gia != null){
                                            echo '<del>'.number_format($don_gia).'<sup>đ</sup></del>';
                                        }
                                    ?></p>
                                    <!-- <p><span><?= number_format($don_gia - ($giam_gia * $don_gia / 100)) ?><sup>đ</sup> </span><del><?= number_format($don_gia) ?><sup>đ</sup></del></p> -->
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
    <div class="grid row">
        <div class="news_content">
            <div class="col-md-6">
                <?php
                // loại sản phẩm mới
                $list_cats = loai_mk_moi();
                foreach ($list_cats as $list_cat) {
                    extract($list_cat);


                ?>
                    <a href="../../site/san-pham/liet-ke.php?ma_loai=<?=$ma_loai?>" class="news_content-item">
                        <img src="<?= $CONTENT_URL  ?>/images/<?= $hinh_loai_sp ?>" alt="Hình Sp new" class="news_content-sp">
                    </a>
                <?php
                }
                ?>
                <!-- <a href="" class="news_content-item">
                                <img src="<?= $CONTENT_URL  ?>/images/img_banner_center_2.jpg" alt="Hình Sp new"
                                    class="news_content-sp">
                            </a> -->
            </div>

            <div class="col-md-6">
                <?php
                // nhà bếp
                $nha_bep = loai_getinfo(10);
                extract($nha_bep);

                ?>
                <a href="../../site/san-pham/liet-ke.php?ma_loai=<?=$ma_loai?>" class="news_content-item">
                    <img src="<?= $CONTENT_URL  ?>/images/<?= $hinh_loai_sp ?>" alt="Hình Sp new" class="news_content-sp">
                </a>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid" style="padding: 0 80px;">
    <div class="grid row">
        <?php
        // phòng khách, trong trí, ghế phụ, phòng làm việc;
        $loai_not_ins = loai_not_in();
        foreach ($loai_not_ins as $loai_not_in) {
            extract($loai_not_in);
            $count_products = count_products_by_catagory($ma_loai);

        ?>
            <div class="col-sm-3">
                <div class="collect_content-product">
                    <a href="../../site/san-pham/liet-ke.php?ma_loai=<?=$ma_loai?>"><img src="<?= $CONTENT_URL  ?>/images/products/<?= $hinh_loai_sp ?>" alt="" class="collorest-item"></a>
                    <div class="collect_content-group">
                        <h4 class="collect-title">
                            <a href="" class="collect-title_link"><?= $ten_loai ?></a>
                            <p class="collect_coult">Còn lại <?= $count_products ?> sản phẩm</p>
                        </h4>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>




</section>
<section class="container-fluid" style="padding: 0 80px;">
    <h4 class="promotional_productss" style="text-align: center; text-transform: uppercase;">
        Sản phẩm Khuyến mãi
    </h4>
    <!-- row products -->
    <div class="row-products">
        <div class="row">
            <?php
            $sp_khuyen_mai = san_pham_khuyen_mai();
            foreach ($sp_khuyen_mai as $khuyen_mai) {
                extract($khuyen_mai);


            ?>
                <div class="col-default">
                    <div class="block-products">
                        <a href="../san-pham/chi-tiet.php?ma_sp=<?= $ma_sp ?>" class="products-item_link">
                            <div class="block-image">


                            <?php  
                                  $hinh_hover = select_hinh_phu($ma_sp);
                                  foreach($hinh_hover as $hover){
                                      extract($hover);
                                  }
                                 ?>
                                <img class="hinh_chinh" src="<?= $CONTENT_URL  ?>/images/products/<?= $hinh ?>">
                                <img hidden class="onmouseout" src="<?= $CONTENT_URL  ?>/images/products/<?= $hinh ?>">
                                <?php 
                                    if($hinh_phu == null){
                                        echo ' <img hidden class="img_onmouseover" src="'.$CONTENT_URL.'/images/products/'.$hinh.'">
                                        ';
                                    } else{
                                        echo '
                                        <img hidden class="img_onmouseover" src="'. $CONTENT_URL.'/images/products/'.$hinh_phu.'">
                                        
                                        ';
                                    }
                                ?>
                            
                                <div class="products-item-sale">
                                    <span class="sale-val">- <?= $giam_gia ?> %</span>
                                </div>
                            </div>
                            <div class="block-body">
                                <div class="product-name">
                                    <p> <?= $ten_sp ?></span></p>
                                </div>
                                <div class="product-price">
                                    <p><span><?= number_format($don_gia - ($giam_gia * $don_gia / 100)) ?><sup>đ</sup></span> <del><?= number_format($don_gia) ?><sup>đ</sup></del></p>
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
</section>
<section class="container-fluid" style="padding: 0 80px;">
    <h4 class="promotional_productss" style="text-align: center; text-transform: uppercase;">
        Tin Tức
    </h4>
    <div class="grid row">
        <?php 
            $news = tin_tuc_selectlimit();
            foreach ($news as $ket){
                extract($ket);
        ?>
        <div class="col-sm-4 col-md-4 col-xs-12">
            <a href="../tin-tuc/tin-tuc.php?ma-tin-tuc=<?=$ma_tin_tuc?>">
           <div class="box_hinh" style="max-height:327px">
           <img src="<?= $CONTENT_URL  ?>/images/news/<?=$hinh_tin_tuc?>" alt="tin tức" class="news_tintuc">
           </div>
        </a>
            <div class="news_tintuc-product">
                <h3 class="news_tintuc-items">
                    <a class="box_tiltes" href="../tin-tuc/tin-tuc.php?ma-tin-tuc=<?=$ma_tin_tuc?>"><?=$tieu_de?></a>
                </h3>
                <div class="news_tintuc-tiile">
                   <?=$mo_ta_tin_tuc?>
                </div>
                <a href="../tin-tuc/tin-tuc.php?ma-tin-tuc=<?=$ma_tin_tuc?>" class="xem-them">Xem Thêm</a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</section>
<script>
    function hover_img(){
        var img_mains = document.querySelectorAll(".hinh_chinh");
        var img_mouseover = document.querySelectorAll(".img_onmouseover")
        var img_onmouseout = document.querySelectorAll(".onmouseout");
        img_mains.forEach(function(img_main,index){
            img_main.onmouseover = function(){
                
                img_main.src = img_mouseover[index].src;
            }
            img_main.onmouseout = function(){
                img_main.src = img_onmouseout[index].src;
            }
        })
       
    }
    hover_img();
    // handler slieshow 
    function handeler_slide(){
        var carousel_items = document.querySelectorAll('.carousel-item');
        var item_actives = document.querySelectorAll('.carousel-item.active');
        item_actives.forEach(function($item_active){
                $item_active.classList.remove('active');
        })
    }
    handeler_slide()
    function active_slide(){
        var carousel_items = document.querySelector('.carousel-item');
        carousel_items.classList.add("active");
    }
    active_slide()
</script>