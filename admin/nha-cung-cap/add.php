<?php
if (isset($_POST['add'])) {
    $test = true;
    $check_sdt = '/^(0)([2-9])([0-9]+){8}$/';
    $check_email = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $kt_loi = array();

    if (empty($_POST['ten_ncc'])) {
        $kt_loi['ten_ncc'] = 'Tên nhà cung cấp không được để trống';
        $test = false;
    } else if (empty($_POST['dia_chi'])) {
        $kt_loi['dia_chi'] = 'Địa chỉ không được để trống';
        $test = false;
    } else if (empty($_POST['sdt'])) {
        $kt_loi['sdt'] = 'Số điện thoại không được để trống';
        $test = false;
    } else if (!preg_match($check_sdt, $_POST['sdt'], $matches)) {
        $kt_loi['sdt'] = 'Số điện thoại không đúng định dạng, ví dụ: 0946636844';
        $test = false;
    } else if (empty($_POST['email'])) {
        $kt_loi['email'] = 'Số điện thoại không được để trống';
        $test = false;
    } else if (!preg_match($check_email, $_POST['email'], $matches)) {
        $kt_loi['email'] = 'Email không đúng định dạng, ví dụ: duandemo123@gmail.com';
        $test = false;
    } else {
        $test = true;
    }

    if ($test) {
        $ten_ncc = $_POST['ten_ncc'];
        $dia_chi = $_POST['dia_chi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        nha_cung_cap_insert($ten_ncc, $dia_chi, $sdt, $email);
        echo '<script> location.href= "index.php" </script>';
    }
}

?>



<div class="title">
    <h3>THÊM NHÀ CUNG CẤP</h3>
</div>
<form action="index.php?btn_add" method="POST" enctype="multipart/form-data" id="form_du_an1">
    <div class="form-group">
        <label for="">Tên nhà cung cấp</label>
        <input name="ten_ncc" type="text" class="form-control" placeholder="Nhập tên nhà cung cấp">
        <span class="errs">
            <?php
            if (isset($kt_loi['ten_ncc'])) {
                echo $kt_loi['ten_ncc'];
            }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input name="dia_chi" type="text" class="form-control" placeholder="Nhập địa chỉ">
        <span class="errs">
            <?php
            if (isset($kt_loi['dia_chi'])) {
                echo $kt_loi['dia_chi'];
            }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Điện thoại</label>
        <input name="sdt" type="text" class="form-control" placeholder="Nhập điện thoại">
        <span class="errs">
            <?php
            if (isset($kt_loi['sdt'])) {
                echo $kt_loi['sdt'];
            }
            ?>
        </span>
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input name="email" type="text" class="form-control" placeholder="Nhập địa chỉ email">
        <span class="errs">
            <?php
            if (isset($kt_loi['email'])) {
                echo $kt_loi['email'];
            }
            ?>
        </span>
    </div>
    <button type="submit" name="add" id="add" class="btn btn-info">Thêm mới</button>
    <button type="reset" class="btn btn-info" name="nhap_lai">Nhập lại</button>
    <a href="index.php?btn_list" class="btn btn-info">Danh sách</a>
</form>