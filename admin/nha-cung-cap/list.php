<div class="title">
    <h3>QUẢN LÝ NHÀ CUNG CẤP</h3>
</div>
<div class="row">
    <div class="col p-12 t-12 m-12">
        <div class="form__content">
            <form method="POST">
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th class="">Mã NCC</th>
                            <th class="">Tên nhà cung cấp</th>
                            <th class="">Địa chỉ</th>
                            <th class="">Điện thoại</th>
                            <th class="">Email</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td class="">1</td>
                            <td class="">Nội thất XLUXURY Design</td>
                            <td class="">168 Thịnh Quang, Đống Đa, Hà Nội</td>
                            <td class="">0868.228.686</td>
                            <td class="">xluxury@gmail.com</td>                         
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                           
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td class="">2</td>
                            <td class="">Nội thất GOVI</td>
                            <td class="">259 Yên Hòa, Cầu Giấy, Hà Nội</td>
                            <td class="">0909.121.111</td>
                            <td class="">noithatgovi.com</td>
                           
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                            
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td class="">3</td>
                            <td class="">Nội thất Hòa Phát</td>
                            <td class="">55 Phường 15, Quận Bình Thạnh, TP.HCM</td>
                            <td class="">0909.123.123</td>
                            <td class="">noithathoaphat@gmail.com</td>
                           
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                           
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td class="">4</td>
                            <td class="">Nội thất Misota</td>
                            <td class="">33 Dương Nội, Hà Đông, Hà Nội</td>
                            <td class="">0931.060.333</td>
                            <td class="">misotavietnam@gmail.com</td>
                          
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                           
                        </tr>
                        <tr>
                            <td class="check"><input type="checkbox"> </td>
                            <td class="">5</td>
                            <td class="">Nội thất văn hòng Proce</td>
                            <td class="">67 Nguyễn Cơ Thạch, An Lợi Đông, Quận 2, TP.HCM</td>
                            <td class="">0901.156.767</td>
                            <td class="">info@proce.vn</td>
                           
                            <td class="update__delete"><a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> <a class="btn btn-danger" href="<?=$delete_link?>"><i class="fas fa-trash-alt"></a></td>
                           
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col p-12 t-12 m-12">
                        <div class="button__group">
                            <!-- <button class="button__group-item button__group-checkAll">Chọn tất cả</button>
                            <button class="button__group-item button__group-unCheckAll">Bỏ chọn tất
                                cả</button> -->
                            <button class="btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục
                                chọn</button>
                                <a href="index.php?btn_add" class=" btn btn-info button__group-item button__group-input">Thêm mới</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>