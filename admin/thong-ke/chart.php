<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div class="title">
    <h3>BIỂU ĐỒ THỐNG KÊ</h3>
</div>
<div id="myChart" style="width:100%; max-width:700px; height:600px; display:flex; margin:0 auto;">
  </div>

  <script>
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
  </script>

</body>

</html>