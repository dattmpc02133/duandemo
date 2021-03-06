<?php 
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/khach-hang.php';
    $test = true;
    $kt_loi = array();
    $check_ma_kh = '/^\D[a-zA-Z0-9_\.]{5,15}$/';
    $check_hoten = '/^[\D\s]+$/';
    $check_email = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $check_sdt = '/^(0)([2-9])([0-9]+){8}$/';

    if(isset($_POST['btn_add'])){
        if(empty($_POST['ma_kh'])){
            $kt_loi['ma_kh'] = 'Mã khách hàng không được để trống';
            $test = false;
        }
        else if(strlen($_POST['ma_kh']) < 6){
            $kt_loi['ma_kh'] = 'Mã khách hàng tối thiểu 6 ký tự';
            $test = false;
        }
        else if(!preg_match($check_ma_kh, $_POST['ma_kh'], $matches)){
            $kt_loi['ma_kh'] = 'Mã khách hàng chưa đúng định dạng, ví dụ: hoangduytp1';
            $test = false;
        }
        else if(get_info_kh($_POST['ma_kh'])){
            $kt_loi['ma_kh'] = 'Mã khách hàng đã được sử dụng';
            $test = false;
        }
        else if(empty($_POST['mat_khau'])){
            $kt_loi['mat_khau'] = 'Mật khẩu không được để trống';
            $test = false;
        }
        else if(strlen($_POST['mat_khau']) < 6){
            $kt_loi['mat_khau'] = 'Mật khẩu tối thiểu 6 ký tự';
            $test = false;
        }
        else if(empty($_POST['ho_ten'])){
            $kt_loi['ho_ten'] = 'Họ tên không được để trống';
            $test = false;
        }
        else if(!preg_match($check_hoten, $_POST['ho_ten'], $matches)){
            $kt_loi['ho_ten'] = 'Họ tên chỉ chứa chữ và khoảng trắng';
            $test = false;
        }
        else if(empty($_POST['dia_chi'])){
            $kt_loi['dia_chi'] = 'Địa chỉ không được để trống';
            $test = false;
        }
        else if(empty($_POST['email'])){
            $kt_loi['email'] = 'Email không được để trống';
            $test = false;
        }
        else if(email_kh_exist($_POST['email'])){
            $kt_loi['email'] = 'Email đã được sử dụng';
            $test = false;
        }
        else if(!preg_match($check_email, $_POST['email'], $matches)){
            $kt_loi['email'] = 'Email không đúng định dạng, ví dụ: duandemo123@gmail.com';
            $test = false;
        }
        else if(empty($_POST['sdt_kh'])){
            $kt_loi['sdt_kh'] = 'Số điện thoại không được để trống';
            $test = false;
        }
        else if(!preg_match($check_sdt, $_POST['sdt_kh'], $matches)){
            $kt_loi['sdt_kh'] = 'Số điện thoại không đúng định dạng, ví dụ: 0946636844';
            $test = false;
        }
        else if(sdt_kh_exist($_POST['sdt_kh'])){
            $kt_loi['sdt_kh'] = 'Số điện thoại đã được sử dụng';
            $test = false;
        }
        else{
            $test = true;
        }
        if($test){
            $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/user/';
            if($_FILES['hinh']['name'] > 0){
                $hinh = $_FILES['hinh'];
                $tenhinh = save_file($hinh, $path);
            }
            else{
                $tenhinh = 'user.jpg';
            }
            $ma_kh = $_POST['ma_kh'];
            $mat_khau = md5($_POST['mat_khau']);
            $ho_ten=$_POST['ho_ten'];
            $sdt_kh = $_POST['sdt_kh'];
            $dia_chi=$_POST['dia_chi'];
            $kich_hoat=$_POST['kich_hoat'];
            $email=$_POST['email'];
            $vai_tro=$_POST['vai_tro'];
            $danh_gia = 1;
            khach_hang_insert($ma_kh,$mat_khau,$ho_ten,$dia_chi,$kich_hoat,$tenhinh,$email,$sdt_kh,$vai_tro, $danh_gia);
            // header('location: index.php');
            echo "<script>
                    location.href = 'index.php';
                </script>";
            }
    }
?>
<div class="title">
    <h3>THÊM KHÁCH HÀNG</h3>
</div>
    <div class="form__content">
        <form action="index.php?btn-add" method="POST" enctype="multipart/form-data" id="form_du_an">
            <div class="form-group">
                <label for="">Mã khách hàng:</label>
                <input type="text" class="form-control" placeholder="Nhập mã khách hàng" name="ma_kh" id="ma_kh">
                <span class="errs">
                    <?php 
                        if(isset($kt_loi['ma_kh'])){
                            echo $kt_loi['ma_kh'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="">Mật khẩu:</label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="mat_khau" id="mat_khau">
                <span class="errs">
                    <?php 
                        if(isset($kt_loi['mat_khau'])){
                            echo $kt_loi['mat_khau'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="">Họ tên:</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên" name="ho_ten" id="ho_ten">
                <span class="errs">
                    <?php 
                        if(isset($kt_loi['ho_ten'])){
                            echo $kt_loi['ho_ten'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="">Địa chỉ:</label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="dia_chi" id="dia_chi">
                <span class="errs">
                    <?php 
                        if(isset($kt_loi['dia_chi'])){
                            echo $kt_loi['dia_chi'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="">Kích hoạt:</label>
                <div class="form-control-radio">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="kich_hoat" id="kich_hoat" value="1" checked>Kích hoạt
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="kich_hoat" id="kich_hoat" value="0">Khóa
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Ảnh:</label>
                <input type="file" class="form-control-file" name="hinh" id="hinh" aria-describedby="fileHelpId">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" class="form-control" placeholder="Nhập email" name="email" id="email">
                <span class="errs">
                    <?php 
                        if(isset($kt_loi['email'])){
                            echo $kt_loi['email'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="">Điện thoại:</label>
                <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="sdt_kh" id="sdt_kh">
                <span class="errs">
                    <?php 
                        if(isset($kt_loi['sdt_kh'])){
                            echo $kt_loi['sdt_kh'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="">Vai trò:</label>
                <div class="form-control-radio">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="0" checked>Khách
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="vai_tro" id="vai_tro" value="1">Admin
                        </label>
                    </div>
                </div>
            </div>
            <div class="btn__group">
                <button class="btn__group-item btn btn-primary" type="submit" name="btn_add">Thêm mới</button>
                <a class="btn__group-item btn btn-primary" href="index.php?btn_list">Danh sách</a>
            </div>
        </form>
    </div>