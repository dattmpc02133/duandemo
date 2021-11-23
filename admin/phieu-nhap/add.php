<?php 
    if(isset($_POST['add_pn'])){
        $ngay_nhap = $_POST['ngay_nhap'];
        $ma_ncc = $_POST['ma_ncc'];
        phieu_nhap_insert($ngay_nhap, $ma_ncc);

        $list_pn0 = phieu_nhap_selectall();
        foreach ($list_pn0 as $pn0) {
            extract($pn0);
            // $_SESSION['ma_pn'] = $ma_pn;
            echo '<script>
                    location.href = "index.php?btn_add_pn_ct&ma_pn='.$ma_pn.'";
                </script>';
            break;
        }

        
    }
?>
<div class="title">
    <h3>THÊM PHIẾU NHẬP</h3>
</div>
<div class="form__content">
        <form action="index.php?btn_add" method="POST" id="form_du_an">
            <div class="form-group">
                <label for="">Ngày nhập:</label>
                <input type="date" class="form-control" name="ngay_nhap" >
            </div>
            <div class="form-group">
                <label for="">Mã nhà cung cấp:</label>
                <select class="form-control" name="ma_ncc" id="ma_ncc">
                    <?php 
                        $list_ncc = nha_cung_cap_selectall();
                        foreach ($list_ncc as $ncc) {
                            extract($ncc);
                    ?>
                    <option value="<?=$ma_ncc?>"><?php echo '('.$ma_ncc.') '.$ten_ncc?></option>
                    <?php
                        }
                    ?>
                    
                    <!-- <option value="2">Nội thất GOVI</option>
                    <option value="3">Nội thất Hòa Phát</option>
                    <option value="4">Nội thất Misota</option>
                    <option value="5">Nội thất văn hòng Proce</option> -->
                </select>
            </div>
            
            <div class="btn__group">
                <button class="btn__group-item btn btn-info" type="submit" name="add_pn">Thêm mới</button>
                <a class="btn__group-item btn btn-info" href="index.php?btn_list">Danh sách</a>
            </div>
        </form>
    </div>
</div>


