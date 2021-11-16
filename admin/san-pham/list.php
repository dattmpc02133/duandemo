<?php
    require_once("../../global.php");
    require_once("../../DAO/pdo.php");
    require_once("../../DAO/san-pham.php");
?>
<div class="row">
    <div class="col-12">
        <h3 class="title__manager" style="background-color: #d4edda; padding:12px 20px;">Danh sách sản phẩm</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form__content">
            <form action="#" method="POST">
                <table class="form__content-table table">
                    <thead class="table-danger">
                        <tr>
                            <th class="check"><input type="checkbox"> </th>
                            <th>Mã SP</th>
                            <th style="text-align:center"> Ảnh </th>
                            <th> Tên SP </th>
                            <th>Đơn giá</th>
                            <th class="">Giá giảm</th>
                            <th class="">Ngày nhập</th>
                            <th class="">Số lượng</th>
                            <th class="">Mô tả</th>
                            <th class="">Trạng thái</th>
                            <th class="">Đặc biệt</th>
                            <!-- <th>GIÁ ĐÃ GIẢM</th> -->
                            <!-- <td>' . number_format($giam_gia * $don_gia / $percent)   . ' VNĐ</td> -->
                            <th>Lượt xem</th>
                            <th>Mã loại</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="check"><input type="checkbox"> </td>
                        <td>01</td>
                        <td style="text-align:center;"> <img src="<?= $CONTENT_URL ?>/images/den-ban.jpg"   alt=""> </td>
                        <td> Đèn bàn </td>
                        <td>200.000 <sup>đ</sup></td>
                        <td class="">25%</td>
                        <td class="">11/06/2021</td>
                        <td class="">30</td>
                        <td class="">Đèn bàn</td>
                        <td class="">Còn hàng</td>
                        <td class="">0</td>
                           
                        <td>0</td>
                        <td>01</td>
                    </tr>
                    <tr>
                        <td class="check"><input type="checkbox"> </td>
                        <td>02</td>
                        <td style="text-align:center;"> <img src="<?= $CONTENT_URL ?>/images/den-ban.jpg"   alt=""> </td>
                        <td> Đèn bàn </td>
                        <td>200.000 <sup>đ</sup></td>
                        <td class="">25%</td>
                        <td class="">11/06/2021</td>
                        <td class="">30</td>
                        <td class="">Đèn bàn</td>
                        <td class="">Còn hàng</td>
                        <td class="">0</td>
                           
                        <td>0</td>
                        <td>01</td>
                    </tr>
                    <tr>
                        <td class="check"><input type="checkbox"> </td>
                        <td>03</td>
                        <td style="text-align:center;"> <img src="<?= $CONTENT_URL ?>/images/den-ban.jpg"   alt=""> </td>
                        <td> Đèn bàn </td>
                        <td>200.000 <sup>đ</sup></td>
                        <td class="">25%</td>
                        <td class="">11/06/2021</td>
                        <td class="">30</td>
                        <td class="">Đèn bàn</td>
                        <td class="">Còn hàng</td>
                        <td class="">0</td>
                           
                        <td>0</td>
                        <td>01</td>
                    </tr>
                    <tr>
                        <td class="check"><input type="checkbox"> </td>
                        <td>04</td>
                        <td style="text-align:center;"> <img src="<?= $CONTENT_URL ?>/images/den-ban.jpg"   alt=""> </td>
                        <td> Đèn bàn </td>
                        <td>200.000 <sup>đ</sup></td>
                        <td class="">25%</td>
                        <td class="">11/06/2021</td>
                        <td class="">30</td>
                        <td class="">Đèn bàn</td>
                        <td class="">Còn hàng</td>
                        <td class="">0</td>
                           
                        <td>0</td>
                        <td>01</td>
                    </tr>
                    <tr>
                        <td class="check"><input type="checkbox"> </td>
                        <td>05</td>
                        <td style="text-align:center;"> <img src="<?= $CONTENT_URL ?>/images/den-ban.jpg"   alt=""> </td>
                        <td> Đèn bàn </td>
                        <td>200.000 <sup>đ</sup></td>
                        <td class="">25%</td>
                        <td class="">11/06/2021</td>
                        <td class="">30</td>
                        <td class="">Đèn bàn</td>
                        <td class="">Còn hàng</td>
                        <td class="">0</td>
                        <td>0</td>
                        <td>01</td>
                    </tr>
                   </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        <div class="button__group">
                            <!-- <button class="button__group-item button__group-checkAll">Chọn tất cả</button>
                            <button class="button__group-item button__group-unCheckAll">Bỏ chọn tất
                                cả</button> -->
                            <button class=" btn btn-info button__group-item button__group-input" name="delete_select">Xóa các mục
                                chọn</button>
                            <a href="index.php?btn_add" class=" btn btn-info button__group-item button__group-input">Nhập sản phẩm mới</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class=" col-sm-12 phan_trang" style="display:flex; justify-content:center">
      
    </div>
</div>