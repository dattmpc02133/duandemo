<section class="mainn">
               <h3 style="text-align: center;">Giỏ hàng của bạn</h3>
              <div class="container-fluid" style="padding: 0 80px;">
                <div class="row">
                    <div class="col-9">
                       <form action="" method="post">
                        <table class="form__content-table table">
                            <thead class="table-danger">
                                <tr>
                                    <th class="check"><input type="checkbox"> </th>
                                    <th>STT</th>
                                    <th style="text-align:center;width: 10%;"> Hình </th>
                                    <th> Tên sản phẩm </th>
                                    <th>Đơn giá</th>
                                    <th class="">Số Lượng</th>
                                    <th class="">Thành Tiền</th>
                                    <th class="">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="check"><input type="checkbox"> </td>
                                <td>01</td>
                                <td style="text-align:center;"> <img src="<?= $CONTENT_URL ?>/images/den-ban.jpg" style="width:100%"  alt=""> </td>
                                <td> Đèn bàn </td>
                                <td>200.000 <sup>đ</sup></td>                                   
                                <td>2</td>
                                <td>200.000 <sup>đ</sup></td>
                                <td><a class="btn btn-danger" href="">Xóa</a></td>
                            </tr>
                            <tr>
                                <td class="check"><input type="checkbox"> </td>
                                <td>02</td>
                                <td style="text-align:center;"> <img src="<?= $CONTENT_URL ?>/images/den-ban.jpg" style="width:100%"  alt=""> </td>
                                <td> Đèn bàn </td>
                                <td>200.000 <sup>đ</sup></td>                                   
                                <td>2</td>
                                <td>200.000 <sup>đ</sup></td>
                                <td><a class="btn btn-danger" href="">Xóa</a></td>
                            </tr>
                           
                           </tbody>
                        </table>
                       </form>
                    </div>
                    <div class="col-3">
                        <div class="waxbox_odercart">
                            <div class="order_title">
                                <h3>Thông tin đơn hàng</h3>
                            </div>
                            <div class="order_total_price">
                                <p class="order_total_dix" style="padding: 0 8px; color: rgba(0, 0, 0, 0.3)"><strong>Tổng Tiền:</strong>
                                    <span style="color: red; margin-left: 8px;">0<sup>đ</sup></span>
                                </p>
                            </div>
                            <div class="note-promo">
                                <p>Phí vận chuyển sẽ được tính ở trang thanh toán. <br>
                                    Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                            </div>
                            <div class="cart-buttons">
                                <a href="./cart.html" class="checkout-btn">Thanh Toán</a>
                            </div>
                            <a href="./san-pham.html" class="countine_order_cart"><i class="fas fa-reply"></i> Tiếp tục mua hàng</a>
                        </div>

                    </div>
                   </div>   
              </div>
           </section>