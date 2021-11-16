
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-12" style="padding: 0;">
                            <div class="alert" style="background-color: #1fb5d4;" role="alert">
                                <h3 class="" style="color:white;;" >Danh sách khách hàng</h3>
                            </div>
                            <table class="table table-light">
                                <thead class="table-danger">
                                    <tr>
                                        <th class="check"><input type="checkbox"> </th>
                                        <th>Mã khách hàng</th>
                                        <th>Mật khẩu</th>
                                        <th>Họ tên</th>
                                        <th>Ảnh</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Kích hoạt</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                            <td class="check"><input type="checkbox" name="check[]" value=""></td>
                                            <td class="kh__item">12345</td>
                                            <td class="kh__item">123456</td>
                                            <td class="kh__item">dạt</td>
                                            <td class="kh__item">
                                                <img src="<?= $CONTENT_URL ?>/images/sofa-giuong-keo.jpg" alt="" style="width: 74px; height: 74px;">
                                            </td>
                                            <td class="kh__item"></td>
                                            <td class="kh__item">
                                            
                                            </td>
                                            <td class="kh__item">
                                               
                                            </td>
                                            <td class="kh__item"><a class="btn btn-info" href="">Xóa</a> <a class="btn btn-info" href="">Sửa</a></td>
                                    </tr>
                                <tr>
                                    <td colspan="8">
                                        <!-- <button name="check_all" id="check_all" class="btn btn-primary" href="#" role="button">Chọn tất cả</button>
                                        <button name="uncheck_all" id="uncheck_all" class="btn btn-primary" href="#" role="button">Bỏ chọn tất cả</button> -->
                
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button name="delete_select" id="delete_check_all" class="btn btn-info" href="#" role="button">Xóa các mục đã chọn</button>
                                                <a name="" id="" class="btn btn-info" href="index.php?btn_new" role="button">Thêm Mới</a>
                                               
                                                <!-- <a name="" id="" class="btn btn-info" href="index.php" role="button">Danh sách</a> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class=" col-sm-12 phan_trang" style="display:flex; justify-content:center">
                        </div>
                    </div>          
    </form>
          