<?php
    require_once '../../global.php';
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/khach-hang.php';
    if(isset($_SESSION['admin'])){
        $user = $_SESSION['admin'];
    }
    $get_kh = get_info_kh($user);
    extract($get_kh);
?>
                <nav class="nav flex-column side-bar">
                    <div class="top">
                        <div class="account">
                            <img src="<?=$CONTENT_URL?>/images/user/<?=$hinh?>" alt="<?=$hinh?>" class="avt">
                           <div class="account-text">
                             <h5 style="word-wrap: break-word;"><?=$user?></h5>
                            <div class="btn-group drop-button">
                              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?=$SITE_URL?>/tai-khoan/index.php?doi_mk">Đổi mật khẩu</a>
                                <a class="dropdown-item" href="<?=$SITE_URL?>/tai-khoan/index.php?btn-thong-tin">Cập nhật thông tin</a>
                                <a class="dropdown-item" href="<?=$SITE_URL?>/trang-chinh">Giao diện khách hàng</a>
                                <a class="dropdown-item" href="<?=$SITE_URL?>/tai-khoan/dang-nhap.php?logout">Đăng xuất</a>
                              </div>
                            </div>
                           </div>
                        </div>
                        <hr>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link trang-chu" href="<?=$ADMIN_URL?>/index.php"><i class="fas fa-tachometer-alt"></i>Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link khach-hang" href="<?=$ADMIN_URL?>/khach-hang"><i class="fas fa-address-card"></i>Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link loai" href="<?=$ADMIN_URL?>/loai-hang"><i class="fas fa-boxes"></i>Loại sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ncc" href="<?=$ADMIN_URL?>/nha-cung-cap"><i class="fas fa-warehouse"></i>Nhà cung cấp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link phieu_nhap" href="<?=$ADMIN_URL?>/phieu-nhap"><i class="fas fa-file-invoice"></i>Phiếu nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link san-pham" href="<?=$ADMIN_URL?>/san-pham"><i class="fas fa-box-open"></i>Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link don-hang" href="<?=$ADMIN_URL?>/quan-ly-don-hang"><i class="fas fa-shipping-fast"></i>Đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link khuyen-mai" href="<?=$ADMIN_URL?>/khuyen-mai"><i class="fas fa-piggy-bank"></i>Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tin-tuc" href="<?=$ADMIN_URL?>/tin-tuc"><i class="far fa-newspaper"></i> Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link binh-luan" href="<?=$ADMIN_URL?>/binh-luan"><i class="fas fa-comments"></i>Bình luận sản phẩm</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link binh-luan-tin-tuc" href="<?=$ADMIN_URL?>/binh-luan-tin-tuc"><i class="fas fa-comments"></i>Bình luận tin tức</a>
                       
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link thong-ke" href="<?=$ADMIN_URL?>/thong-ke"><i class="fas fa-chart-line"></i>Thống kê</a>
                    </li>
                   
                </nav>
               