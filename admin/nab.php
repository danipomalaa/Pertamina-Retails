
<html>
  <head>
    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <script src="../js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
      include '../koneksi.php';
      $query  = mysqli_query($conn,"SELECT DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS tgl_daftar,count(*)peserta FROM `tbl_peserta` group by tgl_daftar");
      $myurl[] = "['tgl_daftar','peserta']";
      while ($r = mysqli_fetch_assoc($query)) {
        $title = "Peserta";
        $tgl_daftar = $r['tgl_daftar'];
        $peserta = $r['peserta'];
        $myurl[] = "['".$tgl_daftar."',".$peserta."]";

      }
    ?>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
              <?php echo (implode(",",$myurl)); ?>
            ]);

            var options = {
              title: '<?php echo ($title); ?>',
              curveType: 'function',
              legend: { position: 'bottom' }
            };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        function getdata(){
            var pilih = $('#pilih').val();
            $.ajax({
                type:"POST",
                url:"data_dashboard.php",
                data:"pilih="+pilih,
                success:function(data){
                    $('#curve_chart').html(data);
                }

            });
        }
        
    </script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  </head>
  <body class="gray-bg">
    <select id="pilih" class="form-control" onchange="getdata()">
      <option value="">select</option>
      <option value="lokasi">Lokasi</option>
      <option value="agent">Agent</option>
    </select>
    <!--<div id="chart_div" style="width: 100%; height: 500px;"></div>-->
    <div id="curve_chart" style="width: 100%; height: 500px;">
    </div>
  </body>
</html>