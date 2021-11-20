<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div class="title">
    <h3>BIỂU ĐỒ THỐNG KÊ</h3>
</div>
<div id="myChart" style="width:100%; max-width: 662px;margin:0 auto; display:flex;">
        <img src="../../content/images/chart-image-png.png" style="width:55%; border-radius:100rem;margin-top:30px;" class="mycharrt">
        <ul style="display: flex;
        flex-direction: column;
        margin: auto;">
            <li style="color:#b20000;list-style:circle;"><span class="doc"></span>Sản phẩm khuyến mãi</li>
            <li style="color:#0070ce;list-style:circle;"><span class="doc"></span>Nội thất phòng ngủ</li>
            <li style="color:#5da832;list-style:circle;"><span class="doc"></span>Nội thất phòng khách</li>
            <li style="color:red;list-style:circle;"><span class="doc"></span>Phụ kiện trang trí</li>
        </ul>
  </div>

  <!-- <script>
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Loại', 'Số Lượng'],
        <?php
        foreach ($items as $item) {
          echo "['$item[ten_loai]', $item[so_luong]],";
        }
        ?>
      ]);

      var options = {
        title: 'Tỷ Lệ Hàng Hóa',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);
    }
  </script> -->

</body>

</html>