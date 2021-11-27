<div class="sidebar-log">
    <div class="sidebar-log_news">
        <div class="sidebar-log_heading">
            <h4 style="text-align: center;">BÀI VIẾT MỚI NHẤT</h4>
            <div class="wraper_heading-h3"></div>
        </div>
        <div class="sidebar-log_list">
            <?php
            $newnew = tin_tuc_selectall();
            foreach ($newnew as $newasss) {
                extract($newasss);
            ?>
                <div class="sidebar-log_items">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <a href="../tin-tuc/tin-tuc.php?ma-tin-tuc=<?= $ma_tin_tuc ?>">
                                <img style="width:100%;" src="<?= $CONTENT_URL  ?>/images/news/<?= $hinh_tin_tuc ?>" alt="" class="sidebar-post_img">
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-12" style="padding: 0;">
                            <div class="sidebar-post_title">
                                <h3 class="sidebar-post_text">
                                    <a href="../tin-tuc/tin-tuc.php?ma-tin-tuc=<?= $ma_tin_tuc ?>"><?= $tieu_de ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</div>
<div class="menu_blog">
    <div class="menu_ground-page">
        <h3 style="text-align: center;">DANH MỤC</h3>
        <div class="wraper_heading-h3"></div>
    </div>
    <div class="menu_ground-cetory">
        <div class="menu_ground-content">
            <ul class="menu_ground-wrap">
                <li class="menu_ground-items">
                    <a href="" class="menu_ground-links">Tìm Kiếm</a>
                </li>
                <li class="menu_ground-items">
                    <a href="<?= $SITE_URL ?>/trang-chinh/index.php?gioi-thieu" class="menu_ground-links">Giới Thiệu</a>
                </li>
                <li class="menu_ground-items">
                    <a href="<?= $SITE_URL ?>/trang-chinh/index.php?chinh-sach-doi-tra" class="menu_ground-links">Chính Sách Đổi Trả</a>
                </li>
                <li class="menu_ground-items">
                    <a href="<?= $SITE_URL ?>/trang-chinh/index.php?chinh-sach-bao-mat" class="menu_ground-links">Chính Sách Bảo Mật</a>
                </li>
                <li class="menu_ground-items">
                    <a href="<?= $SITE_URL ?>/trang-chinh/index.php?dieu-khoang-dich-vu" class="menu_ground-links">Điều Khoản Dịch Vụ</a>
                </li>
            </ul>
        </div>
    </div>
</div>