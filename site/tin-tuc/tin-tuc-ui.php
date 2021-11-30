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
                        <!-- <ul class="page_news-useradmin">
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
                        </ul> -->
                    </div>
                    <div class="content_page-new-acticle">
                        <?= $noi_dung_tin_tuc ?>
                    </div>
                    <div class="content_page-new-comment">
                        <h3 style="margin-bottom: 30px;">Viết bình luận</h3>
                        <div class="contact-boxt_sent_lish">
                            <form action="#" method="post" class="row grid">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<div class="col-md-12">
                                        <textarea class="form-control controller" id="exampleFormControlTextarea1" rows="5" placeholder="Nội dung"></textarea>
                                    </div>';
                                    echo '<div class="col-sm-12">
                                    <button class="btn btn-primary" style="float:right;" type="submit">Gửi bình luận</button>
                                </div>';
                                } else {
                                    echo '<div class="col-md-12">
                                        <textarea class="form-control controller" id="exampleFormControlTextarea1" disabled rows="5" placeholder="Đăng nhập để viết bình luận"></textarea>
                                    </div>';
                                    echo '<div class="col-sm-12">
                                    <button class="btn btn-primary"style="float:right; disabled type="submit">Gửi bình luận</button>
                                </div>';
                                }
                                ?>
                               <div class="col-sm-12">
                                   <a href="" class="comment_news">
                                       Bình Luận
                                   </a>
                                   <hr>
                                   <div class="comment_news-wrap">
                                      <div class="row comment_news-container">
                                      <div class="col-1 user_comment">
                                           <img src="../../content/images/user/z2975563806417_87be175912960c0cbea56f10736a3cab.jpg" alt="" class="user_comment-img">
                                       </div>
                                       <div class="col-11 content_comment-moment">
                                           <p class="full_comment">
                                               <span class="user-tex">
                                                  <b>Đạt G:</b>
                                               </span>
                                               Sự hài hước của QBV... đã tăng lên cấp số nhân theo từng năm. VĐ Copa mà 5 năm tổ chức 4 lần ( thua cả cái AFF cúp ao làng nhà ta 2 năm tổ chức 1 lần ) và ở cấp CLB thì chả ra sao vậy Jorginho vđ C1 và UEFA mà thua với bé làng nhàng mà có QBV. Do đâu, do về độ hot và không thu hút được tiền và fan rồi, chung quy là tiền giải thưởng chỉ là hình thức thôi. Fifa còn có phốt đầy ra nên những giải thưởng như thế này cũng là bình thường. Cười ra nước mắt hhhh
                                            </p>
                                            <p class="block_like-comment">
                                                <a class="classnutdive" href=""><i class="fas fa-thumbs-up"></i> Like</a>
                                                <a class="classnutdive" href="">Trả lời</a>
                                                <a class="classnutdive" href="">Chia sẻ</a>
                                                <span class="time-com" style="color:#757575;font-size: 13px;">1 phút trước</span>
                                            </p>
                                       </div>
                                      </div>
                                   </div>
                               </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <?php require_once("../tin-tuc/menu-tin-tuc.php"); ?>
            </div>
        </div>
    </div>