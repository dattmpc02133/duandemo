            <?php
            if (isset($_SESSION['user'])) {
                $user = get_info_kh($_SESSION['user']);
                extract($user);
            }
            ?>
            <nav class="nav flex-column side-bar nav_accounttttt" id="nav_accounttttt">
                <div class="top">
                    <div class="accountt">
                        <div class="change_img">
                            <img  src="<?= $CONTENT_URL ?>/images/user/<?php if($hinh == null){
                                echo 'user.jpg';
                            }
                            else{
                                echo $hinh;
                            } ?>"  alt="<?= $hinh ?>" class="avt">
                            <label for="hinh_new" class="change_picture">
                                <!-- <i class="fas fa-camera change_picture-icon"></i> -->
                            </label>
                           <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group" hidden>
                        <label for=""><b>Ảnh đại diện *</b></label>
                        <input type="file" class="form-control-file" name="hinh_new" id="hinh_new" aria-describedby="fileHelpId">
                        <input class="form-control" type="text" name="hinh" id="hinh" value="<?=$hinh?>" readonly style="border: none; outline:none;">
                           </form>
                    </div>
                        </div>

                        <div class="account-text" style="display: flex;flex-direction: column;">
                            <h5 style="color:#b8c1ec"><?= $ho_ten ?></h5>
                            <hr>
                            <div class="account-tilte" style="text-align: left;">
                                    <?php 
                                        if($vai_tro == 1){
                                            echo ' <a class="dropdown-item" style="color:#b8c1ec;padding:10px" href="../../admin/"><i class="fas fa-users-cog"></i> Quản trị website</a>';
                                        }
                                    ?>           
                                <a class="dropdown-item"  style="color:#b8c1ec;padding:10px" href="../tai-khoan/index.php?doi-mk"><i class="fas fa-exchange-alt"></i> Đổi mật khẩu</a>
                                <a class="dropdown-item"  style="color:#b8c1ec;padding:10px" href="../tai-khoan/index.php?don-hang"><i class="fas fa-shipping-fast"></i> Đơn hàng của tôi</a>
                                <a class="dropdown-item"  style="color:#b8c1ec;padding:10px" href="../tai-khoan/index.php?btn-thong-tin"><i class="fas fa-edit"></i> Cập nhật thông tin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>