<div class="title">
    <h3>Đơn hàng của khách: <?= $_GET['ma_kh']; ?></h3>
</div>

<div class="form__content">
    <form accept="#" method="POST">
        <table class="table">
            <thead class="table-danger">
                <tr> 
                    <th>STT</th>                
                    <th>Mã hóa đơn</th>
                    <th>Tổng tiền</th>
                    <th>Địa chỉ giao hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                   
                </tr>
            </thead>
            <tbody>

               
                    <?php
                 
                      $tong = 0;
                     $list_hd = cart_by_kh($_GET['ma_kh']);
                       foreach($list_hd as $hd){
                           $tong++;
                           extract($hd); 
                    ?> 
                     <tr>
                    <td><?=$tong?></td>
                    <td><?=$ma_hd?></td>
                    <td><?=number_format($tong_tien)?><sup>đ</sup></td>
                    <td><?=$dia_chi_giao_hang?></td>
                    <td><?=$ngay_dat?></td>
                    <td><?php 
                        if($trang_thai == 1){
                            echo "Chờ xác nhận";
                        } elseif($trang_thai == 2){
                            echo "Đang giao hàng";
                        } elseif($trang_thai == 3){
                            echo "Đã thanh toán";
                        } else{
                            echo "Đã hủy";
                        }
                    ?></td>
                    </tr>
                    <?php 
                           }
                    ?>
              
                           
                                    
            </tbody>
        </table>

       
    </form>
</div>
</div>