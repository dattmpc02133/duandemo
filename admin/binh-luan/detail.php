<?php
require_once("../../DAO/pdo.php");
// require_once("../../DAO/binh-luan.php");
if (isset($_POST['delete_select'])) {
    if (empty($_POST['check'])) {
        echo '<script> alert("Chưa có sản phẩm nào được chọn"); </script>';
    } else {
        foreach ($_POST['check'] as $value_check) {
            // binh_luan_delete($value_check);
        }
    }
    unset($_SESSION['ma_sp']);
    header("location: index.php");
}
?>
<div class="title">
    <h3>TỔNG HỢP BÌNH LUẬN</h3>
</div>
<div class="form__content">
  
        <?php
        $sp_get_info = san_pham_getinfo($ma_sp);
        extract($sp_get_info);
        ?>
        <h3>Sản phẩm: <?= $ten_sp ?></h3>
        <form  method="POST">
            <table class="table">
                <thead class="table-danger">
                    <tr>
                        <th class="check"><input type="checkbox"> </th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Người bình luận</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $detail) {
                        extract($detail);
                    ?>
                        <tr>
                            <td class="check"><input type="checkbox" name="check[]" value="<?= $ma_bl ?>"></td>
                            <td><?= $noi_dung ?></td>
                            <td><?= $ngay_bl ?></td>
                            <td><?= $ma_kh ?></td>
                            <td>
                                <select data-ma_bl="<?= $ma_bl ?>" name="trang_thai" class="trang_thai" style="border: none; outline:none">
                                    <option value="<?=$trang_thai?>"> <?php if($trang_thai == 1){
                                        echo "kích hoạt";
                                    } else{
                                        echo "chưa kích hoạt";
                                    } ?> </option>
                                   <?php 
                                        if($trang_thai == 1){
                                            echo '  <option value="0"> chưa kích hoạt </option>';
                                        } else{
                                            echo ' <option value="1"> kích hoạt </option>';
                                        }
                                   ?>
                                   
                                  
                                </select>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>


            </table>
         
        </form>
        <div class="row">
            <div class="col p-12 t-12 m-12">
                <div class="button__group">
                    <!-- <button class="button__group-item button__group-checkAll">Chọn tất cả</button>
                            <button class="button__group-item button__group-unCheckAll">Bỏ chọn tất
                                cả</button> -->
                    <button class="btn btn-danger button__group-item button__group-Delete" type="submit" name="delete_select">Xóa các mục
                        chọn</button>
                    <!-- <a href="index.php?btn_add" class="button__group-item button__group-input">Nhập thêm</a> -->
                </div>
            </div>
        </div>
       
   

</div>

<script type="text/javascript">
    // func edit
    function edit(ma_bl,trang_thai){
    $.ajax({
              url:'ajax_action.php',
              method: "POST",
              data: {
                  ma_bl:ma_bl,
                  trang_thai:trang_thai,
              },
              success: function(respone){
            alert("Cập nhật trạng thái bình luận thành công");
            // fetch_data();
              }
          })
}
   $(document).ready(function() {

       $('.trang_thai').on('change',function(){
            var ma_bl = $(this).data('ma_bl');        
                
            var trang_thai = $(this).val();        
            
            edit(ma_bl,trang_thai);
       })

    })

    
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>