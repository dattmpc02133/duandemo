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
                    <select class="form-control" name="" id="">
                        <option value="1">Bán chạy</option>
                        <option value="2">Tên: A-Z</option>
                        <option value="3">Tên: Z-A</option>
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
           
            foreach ($poducts as $product) {
                extract($product);

            ?>
                <div class="col-default">
                    <div class="block-products">
                        <a href="#">
                            <div class="block-image">
                                <img src="<?= $CONTENT_URL ?>/images/<?= $hinh ?>" alt="">
                            </div>
                            <div class="block-body">
                                <div class="product-name">
                                    <p> <?= $ten_sp ?></p>
                                </div>
                                <div class="product-price">
                                    <p><?= number_format($don_gia - ($giam_gia * $don_gia / 100)) ?><sup>đ</sup> <del> <?= $don_gia ?> <sup>đ</sup></del></p>
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
        <button type="button" name="" id="" class="btn btn-light" btn-lg btn-block">1</button>
    </div>
    <!-- end button page -->
</div>