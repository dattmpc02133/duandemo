
<div class="title">
    <h3>QUẢN LÝ ĐƠN HÀNG</h3>
</div>

<div class="form__content">
    <form accept="#" method="POST">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th class="check"><input type="checkbox"></th>
                    <th>Mã hóa đơn</th>
                    <th>Mã khách hàng</th>
                    <th>tong_tien</th>
                    <th >Địa chỉ giao hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>            
            <tr>
                <td class="check"><input type="checkbox"></td>
                <td>01</td>
                <td>01</td>
                <td>3.000.000 <sup>đ</sup></td>
                <td>Lương Tâm - Long Mỹ - Hậu Giang</td>
                <td>20/11/2021</td>
                <td>Đang xử lý </td>
                <td class="update__delete">
                    <a class="btn btn-info" href="index.php?btn-details"><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> 
                    <a class="btn btn-info" href="<?=$delete_link?>"><i class="fas fa-trash-alt"> </i></a>
                </td>
            </tr>
            <tr>
                <td class="check"><input type="checkbox"></td>
                <td>02</td>
                <td>02</td>
                <td>3.000.000 <sup>đ</sup></td>
                <td>Lương Tâm - Long Mỹ - Hậu Giang</td>
                <td>20/11/2021</td>
                <td> Đang vận chuyển </td>
                <td class="update__delete">
                    <a class="btn btn-info" href="index.php?btn-details"><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> 
                    <a class="btn btn-info" href="<?=$delete_link?>"><i class="fas fa-trash-alt"> </i></a>
                </td>
            </tr>
            <tr>
                <td class="check"><input type="checkbox"></td>
                <td>03</td>
                <td>03</td>
                <td>3.000.000 <sup>đ</sup></td>
                <td>Lương Tâm - Long Mỹ - Hậu Giang</td>
                <td>20/11/2021</td>
                <td>Đã thanh toán </td>
                <td class="update__delete">
                    <a class="btn btn-info" href="index.php?btn-details"><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> 
                    <a class="btn btn-info" href="<?=$delete_link?>"><i class="fas fa-trash-alt"> </i></a>
                </td>
            </tr>
            <tr>
                <td class="check"><input type="checkbox"></td>
                <td>04</td>
                <td>04</td>
                <td>3.000.000 <sup>đ</sup></td>
                <td>Lương Tâm - Long Mỹ - Hậu Giang</td>
                <td>20/11/2021</td>
                <td> Đơn hàng đổi trả</td>
                <td class="update__delete">
                    <a class="btn btn-info" href="index.php?btn-details"><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> 
                    <a class="btn btn-info" href="<?=$delete_link?>"><i class="fas fa-trash-alt"> </i></a>
                </td>
            </tr>
            <tr>
                <td class="check"><input type="checkbox"></td>
                <td>05</td>
                <td>05</td>
                <td>3.000.000 <sup>đ</sup></td>
                <td>Lương Tâm - Long Mỹ - Hậu Giang</td>
                <td>20/11/2021</td>
                <td>Đang xử lý </td>
                <td class="update__delete">
                    <a class="btn btn-info" href="index.php?btn-details"><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-info" href="<?=$btn_update?>"><i class="fas fa-edit"></i></a> 
                    <a class="btn btn-info" href="<?=$delete_link?>"><i class="fas fa-trash-alt"> </i></a>
                </td>
            </tr>
            </tbody>
                </table>
                
                <div class="button__group">
                    <button class=" btn btn-info button__group-item button__group-Delete" name="delete_select">Xóa các mục chọn</button>
                    <!-- <a href="index.php?btn-add" class="btn btn-info button__group-item button__group-input">Thêm mới</a> -->
                    <!-- <a href="./insert_hang_hoa.php" class="button__group-item button__group-input">Nhập thêm</a> -->
                </div>
           </form>
        </div>
    </div>