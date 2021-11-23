<?php 
    if(isset($_POST['update_pn'])){
        $ma_pn = $_POST['ma_pn'];
        $ngay_nhap = $_POST['ngay_nhap'];
        $ma_ncc = $_POST['ma_ncc'];
        phieu_nhap_update($ngay_nhap, $ma_ncc, $ma_pn);
        echo '<script>
            location.href = "index.php";
        </script>';
    }

    if(isset($_GET['ma_pn'])){
        $ma_pn = $_GET['ma_pn'];
        $in4_phieu_nhap = phieu_nhap_getinfo($ma_pn);
        extract($in4_phieu_nhap);
    }
?>
<div class="title">
    <h3>SỬA PHIẾU NHẬP</h3>
</div>
<div class="form__content">
        <form action="index.php?btn_update&ma_pn=<?=$ma_pn?>" method="POST" id="form_du_an">
            <div class="form-group">
                <label for="">Mã phiếu nhập:</label>
                <input type="text" class="form-control" name="ma_pn" value="<?=$ma_pn?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Ngày nhập:</label>
                <input type="date" class="form-control" name="ngay_nhap" value="<?=$ngay_nhap?>">
            </div>
            <div class="form-group">
                <label for="">Mã nhà cung cấp:</label>
                <select class="form-control" name="ma_ncc">
                    <option value="<?=$ma_ncc?>"><?php 
                        $ncc_selected = nha_cung_cap_getinfo($ma_ncc);
                        extract($ncc_selected);
                        echo '('.$ma_ncc.') '.$ten_ncc;
                    ?></option>
                    <?php 
                        $list_ncc = ncc_select_not($ma_ncc);
                        foreach ($list_ncc as $ncc) {
                            extract($ncc);
                    ?>
                    <option value="<?=$ma_ncc?>"><?php echo '('.$ma_ncc.') '.$ten_ncc?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            
            <div class="btn__group">
                <button class="btn__group-item btn btn-info" type="submit" name="update_pn">Cập nhật</button>
                <a class="btn__group-item btn btn-info" href="index.php?btn_list">Danh sách</a>
            </div>
        </form>
    </div>
</div>