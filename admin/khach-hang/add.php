<?php 
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/khach-hang.php';

    if(isset($_POST['btn_add'])){
        $path = $_SERVER['DOCUMENT_ROOT'] . $CONTENT_URL . '/images/products/';
        $hinh = $_FILES['hinh'];
        $tenhinh = save_file($hinh, $path);
        $ma_kh = $_POST['ma_kh'];
        $mat_khau =$_POST['mat_khau'];
        $ho_ten=$_POST['ho_ten'];
        $dia_chi=$_POST['dia_chi'];
        $kich_hoat=$_POST['kich_hoat'];
        $email=$_POST['email'];
        $vai_tro=$_POST['vai_tro'];
        khach_hang_insert($ma_kh,$mat_khau,$ho_ten,$dia_chi,$kich_hoat,$tenhinh,$email,$vai_tro);
        // header('location: index.php');
        echo "<script>
                location.href = 'index.php';
              </script>";
    }
?>
<div class="row">
    <div class="col-sm-12 ">
        <form action="index.php?btn-add" method="POST" enctype="multipart/form-data" id="form_du_an">
            <label>
                <h3>Thêm khách hàng</h3>
            </label>
            <div class="form-group">
                <label for="">Mã khách hàng:</label>
                <input type="text" class="form-control" placeholder="Nhập mã khách hàng" name="ma_kh" id="ma_kh">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu:</label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="mat_khau" id="mat_khau">
            </div>
            <div class="form-group">
                <label for="">Họ tên:</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên" name="ho_ten" id="ho_ten">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ:</label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="dia_chi" id="dia_chi">
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
</div>