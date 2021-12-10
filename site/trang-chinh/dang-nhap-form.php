<div class="card">
    <div class="card-header">
        <h3>Đăng nhập</h3>
    </div>
    <div class="card-body" style="padding: 0px 5px;">
        <form action="<?=$SITE_URL?>/tai-khoan/dang-nhap.php" id="form_du_an" method="POST">
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Nhập tài khoản">
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Nhập mật khẩu">
                <span class="mess"></span>
            </div>
            <div class="form-group">
                <input type="checkbox" name="save_account" id="save_account"> Lưu tài khoản
            </div>
            <div style="justify-content: space-around;" class="btn__dk-dn">
                <div class="form-group">
                    <button class="btn btn-info" type="submit" name="login" id="login">Đăng nhập</button>
                </div>
                <div class="form-group">
                    <a href="../tai-khoan/index.php?btn-dk" class="btn btn-info" type="submit" name="btn-dk" id="login">Đăng ký</a>
                </div>
            </div>
            <div class="form-group">
                <a href="<?= $SITE_URL ?>/tai-khoan/index.php?quen-mk">Quên mật khẩu</a>
            </div>
        </form>
    </div>
</div>