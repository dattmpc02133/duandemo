            <?php
            if (isset($_SESSION['user'])) {
                $user = get_info_kh($_SESSION['user']);
                extract($user);
            }
            ?>
            <nav class="nav flex-column side-bar" style="width:70%;display:flex;margin:0 auto;">
                <div class="top">
                    <div class="accountt" style="text-align: center;background: #232946;">
                        <img style="width: 35%;
                        margin-top:16px;
                        height: 150px;
                         border-radius: 50%;
                        image-rendering: pixelated;
                        filter: drop-shadow(0 0 5px #eee);" src="<?= $CONTENT_URL ?>/images/user/<?= $hinh ?>" style="width:35%" alt="<?= $hinh ?>" class="avt">
                        <div class="account-text" style="display: flex;flex-direction: column;">
                            <h5><?= $ho_ten ?></h5>
                            <hr>
                            <div class="account-tilte" style="text-align: left;">
                                    <?php 
                                        if($vai_tro == 0){
                                            echo ' <a class="dropdown-item" style="color:#b8c1ec;padding:10px" href="../../admin/"><i class="fas fa-users-cog"></i> Quản trị website</a>';
                                        }
                                    ?>           
                                <a class="dropdown-item" style="color:#b8c1ec;padding:10px" href="../tai-khoan/index.php?doi-mk"><i class="fas fa-exchange-alt"></i> Đổi mật khẩu</a>
                                <a class="dropdown-item" style="color:#b8c1ec;padding:10px" href="../tai-khoan/index.php?don-hang"><i class="fas fa-shipping-fast"></i> Đơn hàng của tôi</a>
                                <a class="dropdown-item" style="color:#b8c1ec;padding:10px" href="../tai-khoan/index.php?btn-thong-tin"><i class="fas fa-edit"></i> Cập nhật thông tin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>