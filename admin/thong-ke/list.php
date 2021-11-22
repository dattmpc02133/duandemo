
<div class="title">
    <h3>QUẢN LÝ LOẠI SẢN PHẨM</h3>
</div>
        <div class="form__content">
            <form action="index.php" method="POST">
                <table class="table">
                    <thead class="table-danger">
                        
                        <tr>
                            <th>Loại sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá cao nhất</th>
                            <th>Giá thấp nhất</th>
                            <th>Giá trung bình</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($items as $thong_ke) {
                            extract($thong_ke);
                        ?>
                            <tr>
                                 <td><?= $ten_loai ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= number_format($gia_max, 2) ?> <sup>đ</sup></td>
                                <td><?= number_format($gia_min, 2) ?> <sup>đ</sup></td>
                                <td><?= number_format($gia_avg, 2) ?> <sup>đ</sup></td>
                               
                            </tr>   
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col p-12 t-12 m-12">
                        <div class="button__group">
                            <a href="index.php?chart" class="btn btn-info button__group-item button__group-input">Xem Biểu Đồ</a>
                            <!-- <button class="button__group-item button__group-checkAll">Xem Biểu Đồ</button> -->
                            <!-- <a href="index.php?btn_add" class="button__group-item button__group-input">Nhập thêm</a> -->
                        </div>
                    </div>
                </div>
            </form>

        </div>
</div>