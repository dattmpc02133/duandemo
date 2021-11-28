<div class="main_container">
    <div class="main_container-product">
        <div class="container-fluid" style="padding: 30px 85px;">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="blog_news">
                        <div class="blog_heading">
                            <h3>TIN TỨC</h3>
                        </div>
                        <?php
                            $tin_tuc = tin_tuc_selectlimit();
                            foreach($tin_tuc as $ban_tin){
                                extract($ban_tin);
                        ?>
                        <div class="blog_content">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <a href="../tin-tuc/tin-tuc.php?ma-tin-tuc=<?=$ma_tin_tuc?>" class="blog_content-links">
                                        <img src="<?= $CONTENT_URL  ?>/images/news/<?=$hinh_tin_tuc?>" alt="" class="blog_content-img">
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <h4 class="blog_heading-title">
                                        <a href="../tin-tuc/tin-tuc.php?ma-tin-tuc=<?=$ma_tin_tuc?>"><?=$tieu_de?></a>
                                    </h4>
                                    <div class="blog_post-news">
                                        <p class="blog_post-lish">
                                            <?=$mo_ta_tin_tuc?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                <?php require_once("../tin-tuc/menu-tin-tuc.php");?>
                </div>
            </div>
        </div>
    </div>
</div>