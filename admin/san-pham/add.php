<?php
require("../../DAO/san-pham.php");
require("../../DAO/pdo.php");
require("../../DAO/loai.php");
require_once("../../global.php");
?>


<div class="row">
    <div class="col p-12 t-12 m-12">
        <h3 class="title__manager">Thêm sản phẩm</h3>
    </div>
</div>
<form action="" method="POST" enctype="multipart/form-data" id="form_du_an1">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="ten_sp" id="ten_sp">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="Nhập đơn giá" name="don_gia" id="don_gia">  
    </div>
    <div class="form-group">
        <input type="number" min="0" max="100" class="form-control" placeholder="Nhập đơn giá giảm" name="giam_gia" id="giam_gia">
    </div>
    <div class="form-group">
        <label for=""><b>Ảnh *</b></label>
        <input type="file" class="form-control-file" name="hinh" id="hinh" aria-describedby="fileHelpId">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" placeholder="Nhập số lượng" name="so_luong" id="so_luong">
    </div>

    <div class="form-control form-group">
        <label for="">Trạng thái</label>
        <select name="trang_thai" id="trang_thai">
            <option value="0">kích hoạt</option>
            <option value="1">chưa kích hoạt</option>
        </select>
        <!-- <input type="text" class="form-control" placeholder="Trạng thái của sản phẩm" name="trang_thai" id="trang_thai_san_pham"> -->
    </div>
    <div class="form-group">
        <label for="dac_biet">Đặc biệt</label>
         <select name="dac_biet" id="dac_biet">
            <option value="0">SP thường</option>
            <option value="1">SP đặc biệt</option>
        </select>
    </div>
    <div class="form-group">
        <input type="number" class="form-control custom-file-input" value="0" readonly placeholder="số lượt xem" id="luot_xem" name="luot_xem">
    </div>
    <div class="form-group">
        <select class="form-control" id="ma_loai" name="ma_loai">
            <?php
            $loai_sps = loai_selectall();
            foreach ($loai_sps as $loai) {
                extract($loai);
                echo '<option value="' . $ma_loai . '">' . $ten_loai . '</option>';
            }
            ?>
        </select>
    </div>
    <input type="submit" class="btn btn-info" name="them_san_pham" id="them_san_pham" value="Thêm sản phẩm"></input>
    <button type="reset" class="btn btn-info" name="nhap_lai">Nhập lại</button>
    <a href="index.php?btn_list" class="btn btn-info">Danh sách</a>
    <!-- <a href="index.php?btn_add" class="btn btn-primary">Thêm mới</a> -->
</form>
<script>
    $(document).ready(function(){
           $('#form_du_an1').on('submit',function(e){   
            //    e.preventDefault();
               var ten_sp  = $('#ten_sp').val();
               var don_gia = $('#don_gia').val();
               var giam_gia = $('#giam_gia').val();
               var hinh = $('#hinh').val();
               var so_luong = $('#so_luong').val();
               var trang_thai = $('#trang_thai').val();
               var dac_biet = $('#dac_biet').val();
               var luot_xem = $('#luot_xem').val();
               var ma_loai = $('#ma_loai').val();
                
                $.ajax({
                    url:"ajax_action.php",
                    method:"POST",
                    data: {
                           url:"ajax_action.php",
                           method:"POST",
                           data: {
                            ten_sp:ten_sp,
                            on_gia:on_gia,
                            giam_gia:giam_gia,
                            hinh:hinh,
                            so_luong:so_luong,
                            trang_thai:trang_thai,
                            dac_biet:dac_biet,
                            luot_xem:luot_xem,
                            ma_loai:ma_loai,
                           },
                           contentType:false,
                           processData:false,
                           success: function(e){
                               alert();
                           }
                    },
                    success: function(e){
                        alert();
                    }  
                })
            })
    })

</script>