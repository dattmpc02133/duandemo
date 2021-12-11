<?php 
    if(isset($_GET['ma_pn'])){
        $ma_pn = $_GET['ma_pn'];
    }

    if(isset($_POST['add_pn_ct'])){
        $test = true;
        $kt_loi = array();
        if(empty($_POST['so_luong_nhap'])){
            $kt_loi['so_luong_nhap'] = 'Số lượng nhập không được bỏ trống';
            $test = false;
        }
        else if($_POST['so_luong_nhap'] < 0){
            $kt_loi['so_luong_nhap'] = 'Số lượng nhập phải là số dương';
            $test = false;
        }
        else if(empty($_POST['gia'])){
            $kt_loi['gia'] = 'Giá không được bỏ trống';
            $test = false;
        }
        else if($_POST['gia'] < 0){
            $kt_loi['gia'] = 'Giá phải là số dương';
            $test = false;
        }
        else{
            $test = true;
        }
        if($test){
            $ma_pn = $_POST['ma_pn'];
            $ma_sp = $_POST['ma_sp'];
            $so_luong_nhap = $_POST['so_luong_nhap'];
            $gia = $_POST['gia'];
            chi_tiet_pn_insert($ma_pn, $ma_sp, $so_luong_nhap, $gia);
            sp_update_so_luong_nhap($so_luong_nhap, $ma_sp);
            
            echo '<script>
                    var choice = confirm ("Bạn muốn nhập tiếp không ?");
                    if(choice == true){
                        location.href = "index.php?btn_add_pn_ct&ma_pn='.$ma_pn.'";
                    }
                    else {
                        location.href = "index.php";
                    }
                </script>';
        }
    }
?>
<div class="title">
    <h3>THÊM CHI TIẾT PHIẾU NHẬP</h3>
</div>
<div class="form__content">
        <form action="index.php?btn_add_pn_ct&ma_pn=<?=$ma_pn?>" method="POST" id="form_du_an">
            <div class="form-group">
                <label for="">Mã phiếu nhập:</label>
                <input type="text" class="form-control" name="ma_pn" value="<?=$ma_pn?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Mã sản phẩm:</label>
                <select class="form-control" name="ma_sp" id="ma_sp">
                    <?php 
                        $list_sp = san_pham_selectall();
                        foreach ($list_sp as $sp) {
                            extract($sp);
                    ?>
                        <option value="<?=$ma_sp?>"><?php echo $ma_sp.' ('.$ten_sp.')' ?></option>
                    <?php
                        }
                    ?>
                    
                  </select>
            </div>
            <div class="form-group">
              <label for="">Số lượng:</label>
              <input type="number" class="form-control" name="so_luong_nhap" id="so_luong_nhap" placeholder="Nhập số lượng" min=1>
              <span class="errs">
                    <?php 
                        if(isset($kt_loi['so_luong_nhap'])){
                            echo $kt_loi['so_luong_nhap'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
              <label for="">Giá:</label>
              <input type="number" class="form-control" name="gia" id="gia" placeholder="Nhập giá" min=1>
              <span class="errs">
                    <?php 
                        if(isset($kt_loi['gia'])){
                            echo $kt_loi['gia'];
                        }
                    ?>
                </span>
            </div>

            <div class="btn__group">
                <button class="btn__group-item btn btn-info" type="submit" name="add_pn_ct">Thêm mới</button>
                <a class="btn__group-item btn btn-info" href="index.php?btn_list">Danh sách</a>
            </div>
        </form>
    </div>
</div>