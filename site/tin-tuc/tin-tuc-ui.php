<div class="container_chi-tiet-new">
    <div class="container-fluid" style="padding: 0 80px;">
        <div class="row">
            <?php
            $newsct = tin_tuc_info($_GET['ma-tin-tuc']);
            extract($newsct);
            ?>
            <div class="col-md-9 col-sm-12">
                <div class="content_page-new">
                    <div class="content_page-new-lish">
                        <div class="content_page-images">
                            <img src="<?= $CONTENT_URL  ?>/images/news/<?= $hinh_tin_tuc ?>" alt="hình tin tức" class="img_content-page">
                        </div>
                        <h3 class="page_news-title">
                            <?= $tieu_de ?>
                        </h3>
                        <ul class="page_news-useradmin">
                            <li>
                                Người viết: Đạt G
                                <time pubdate datetime="2021-11-27">27-11-2021</time>
                            </li>
                            <li><i class="far fa-file-alt"></i>
                                <a href="">Tin tức</a>
                            </li>
                            <li><i class="far fa-comment"></i>
                                <a href="">0 <span>Bình luận</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="content_page-new-acticle">
                        <?= $noi_dung_tin_tuc ?>
                    </div>
                    <div class="content_page-new-comment">
                        <h3 style="margin-bottom: 30px;">Viết bình luận</h3>
                        <div class="contact-boxt_sent_lish">
                            <form action="#" method="post" class="row grid">
                                <div class="col-md-6">
                                    <input type="text" class="form-control controller" placeholder="Tên của bạn">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control controller" placeholder="Email của bạn">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control controller" id="exampleFormControlTextarea1" rows="5" placeholder="Nội dung"></textarea>
                                </div>
                                <!-- <div class="contact-sitebox col-sm-12">
                                          <p>This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</p>
                                      </div> -->
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" type="submit">Gửi cho chúng tôi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <?php require_once("../tin-tuc/menu-tin-tuc.php");?>
            </div>
        </div>
    </div>