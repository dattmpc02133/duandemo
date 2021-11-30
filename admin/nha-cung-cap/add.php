<?php 
    if(isset($_POST['add'])){
        $ten_ncc = $_POST['ten_ncc'];
        $dia_chi = $_POST['dia_chi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        nha_cung_cap_insert($ten_ncc,$dia_chi,$sdt,$email);
        echo '<script> location.href= "index.php" </script>';
    }

?>



<div class="title">
    <h3>THÊM NHÀ CUNG CẤP</h3>
</div>
<form action="index.php?btn_add" method="POST" enctype="multipart/form-data" id="form_du_an1">
    <div class="form-group">
        <label for="">Tên nhà cung cấp</label>
        <input name="ten_ncc" type="text" class="form-control" placeholder="Nhập tên nhà cung cấp" >
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input name="dia_chi" type="text" class="form-control" placeholder="Nhập địa chỉ" >  
    </div>
    <div class="form-group">
        <label for="">Điện thoại</label>
        <input name="sdt" type="text"  class="form-control" placeholder="Nhập điện thoại">
    </div>  
    <div class="form-group">
        <label for="">Email</label>
        <input name="email" type="text" class="form-control" placeholder="Nhập địa chỉ email">
    </div>  
    <button type="submit" name="add" id="add" class="btn btn-info">Thêm mới</button>
    <button type="reset" class="btn btn-info" name="nhap_lai">Nhập lại</button>
    <a href="index.php?btn_list" class="btn btn-info">Danh sách</a>
</form>
