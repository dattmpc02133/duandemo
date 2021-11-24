            <?php 
                if(isset($_SESSION['user'])){
                    $user = get_info_kh($_SESSION['user']);
                    extract($user);
                }
            ?>
            <nav class="nav flex-column side-bar" style="width:70%;display:flex;margin:0 auto;">
                <div class="top">
                    <div class="accountt" style="text-align: center;">
                        <img src="<?= $CONTENT_URL ?>/images/user/<?=$hinh?>" style="width:35%" alt="<?=$hinh?>" class="avt">
                        <div class="account-text" style="display: flex;flex-direction: column;">
                            <h5><?=$ho_ten?></h5>
                            <hr>
                            <div class="account-tilte" style="text-align: left;">
                                <a class="dropdown-item" href="../../admin/">Quản trị website</a>
                                <a class="dropdown-item" href="../tai-khoan/index.php?doi-mk">Đổi mật khẩu</a>
                                <a class="dropdown-item" href="../../doi-mk.html">Đơn hàng của tôi</a>
                                <a class="dropdown-item" href="../tai-khoan/index.php?btn-thong-tin">Cập nhật thông tin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>