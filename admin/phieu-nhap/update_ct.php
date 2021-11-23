<?php 
    if(isset($_GET['ma_ct_pn'])){
        $ma_ct_pn = $_GET['ma_ct_pn'];
        $_SESSION = $ma_ct_pn;
    }
    $in4_pnct = pn_ct_get_info($ma_ct_pn);
    extract($in4_pnct);
    $so_luong_nhap_old = $so_luong_nhap;

    if(isset($_POST['update_pn_ct'])){
        $ma_pn_ct = $_POST['ma_ct_pn'];
        // $ma_pn = $_POST['ma_pn'];
        $ma_sp = $_POST['ma_sp'];
        $so_luong_nhap = $_POST['so_luong_nhap'];
        $gia = $_POST['gia'];
        chi_tiet_pn_update($ma_sp, $so_luong_nhap, $gia, $ma_ct_pn);
        sp_update_so_luong_nhap_fix($so_luong_nhap_old, $so_luong_nhap, $ma_sp);
        echo '<script>
            location.href = "index.php";
        </script>';
    }
?>
<div class="title">
    <h3>SỬA CHI TIẾT PHIẾU NHẬP</h3>
</div>
<div class="form__content">
        <form action="index.php?btn_update_ct&ma_ct_pn=<?=$ma_ct_pn?>" method="POST" id="form_du_an">
            <div class="form-group">
                <label for="">ID:</label>
                <input type="text" class="form-control" name="ma_ct_pn" value="<?=$ma_ct_pn?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Mã phiếu nhập:</label>
                <input type="text" class="form-control" name="ma_pn" value="<?=$ma_pn?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Mã sản phẩm:</label>
                <select class="form-control" name="ma_sp" id="ma_sp">
                    <?php $ten_sp_selected = ten_sp_select_in($ma_sp);?>
                    <option value="<?=$ma_sp?>"><?php echo $ma_sp.' ('.$ten_sp_selected.')' ?></option>
                    <?php 
                        $list_sp = sp_select_not_in($ma_sp);
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
              <input type="number" class="form-control" name="so_luong_nhap" id="so_luong_nhap" placeholder="Nhập số lượng" min=1 value="<?=$so_luong_nhap?>">
            </div>
            <div class="form-group">
              <label for="">Giá:</label>
              <input type="number" class="form-control" name="gia" id="gia" placeholder="Nhập giá" min=1 value="<?=$gia?>">
            </div>

            <div class="btn__group">
                <button class="btn__group-item btn btn-info" type="submit" name="update_pn_ct">Cập nhật</button>
                <a class="btn__group-item btn btn-info" href="index.php?btn_list">Danh sách</a>
            </div>
        </form>
    </div>
</div>