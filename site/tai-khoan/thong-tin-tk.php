<div class="container-fluid" style="padding: 0 80px;">
    <div class="row">
        <div class="col-5">
            <?php
            require_once('aside-menu.php');
            ?>

        </div>
        <div class="col-7">
            <div class="dangky-product" style="width:80%;">
                <div class="header_dangky" role="alert">
                    <h3 style="text-align: center;">Cập nhật tài khoản</h3>
                </div>
                <form action="index.php?update_account&ma_kh=<?= $_SESSION['ma_kh'] ?>" method="post" id="form_du_an" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for=""><b>Tên đăng nhập*</b></label>
                        <input type="text" class="form-control" name="ma_kh" id="ma_kh" aria-describedby="helpId" placeholder="Nhập tên đăng nhập" value="" readonly>
                    </div>

                    <div class="form-group">
                        <label for=""><b>Họ tên *</b></label>
                        <input type="text" class="form-control" name="ho_ten" id="ho_ten" aria-describedby="helpId" placeholder="Nhập họ tên khách hàng" value="">
                        <span class="mess"></span>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Địa chỉ *</b></label>
                        <input type="text" class="form-control" name="dia_chi" id="dia_chi" value="" aria-describedby="helpId" placeholder="Nhập địa chỉ">
                        <span class="mess"></span>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Ảnh đại diện *</b></label>
                        <input type="file" class="form-control-file" name="hinh_new" id="hinh_new" aria-describedby="fileHelpId">
                        <input class="form-control" type="text" name="hinh" id="hinh" value="" readonly style="border: none; outline:none;">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Email *</b></label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Nhập địa chỉ email khách hàng" value="">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update_account" class="btn btn-primary">Cập nhật</button>
                        <!-- <a name="back" id="" class="btn btn-primary" href="index.php?btn_list" role="button">Quay lại</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>