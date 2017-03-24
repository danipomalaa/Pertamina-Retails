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
  $top_agent = mysqli_query($conn, "SELECT concat(b.nama_depan,' ',b.nama_belakang)nama, c.nama_lokasi, count(a.kode_peserta) as total FROM tbl_peserta AS a inner join tbl_agent AS b on a.kode_agent = b.kode_agent inner join tbl_lokasi AS c on b.kode_lokasi = c.kode_lokasi GROUP BY a.kode_agent ORDER BY total DESC LIMIT 5");

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Dashboard</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

    <script src="../js/jquery-2.1.1.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/45.1/loader.js"></script>
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
                url:"data_dashboard.php?data=admin",
                data:"pilih="+pilih,
                success:function(data){
                    $('#curve_chart').html(data);
                }

            });
        }
        
    </script>

    <style>
        th
        {
            text-align:center;}
        table
        {
            text-align:center;}
    </style>

</head>

<body>
    <div id="wrapper">
        <?php
            include('b.php');
        ?>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Agent</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    <?php
                                        $query_agent = mysqli_query($conn, "SELECT * FROM tbl_agent");
                                        $numrows = mysqli_num_rows($query_agent);
                                        echo $numrows;
                                    ?>
                                </h1>
                                <small>Agent</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Peserta</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    <?php
                                        $query_peserta = mysqli_query($conn, "SELECT * FROM tbl_peserta");
                                        $numrows = mysqli_num_rows($query_peserta);
                                        echo $numrows;
                                    ?>
                                </h1>
                                <small>Peserta</small>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Site Manager</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    <?php
                                        $query_manager = mysqli_query($conn, "SELECT * FROM tbl_sitemanager");
                                        $numrows = mysqli_num_rows($query_manager);
                                        echo $numrows;
                                    ?>
                                </h1>
                                <small>SiteManager</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Kegiatan</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    <?php
                                        $query_kegiatan = mysqli_query($conn, "SELECT * FROM tbl_kegiatan");
                                        $numrows = mysqli_num_rows($query_kegiatan);
                                        echo $numrows;
                                    ?>
                                </h1>
                                <small>kegiatan</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="col-sm-5">
                                    <h5>Grafik Pendaftaran</h5>
                                </div>
                                <div class="col-sm-5">
                                    Berdasarkan
                                    <select class="form-control pull-right" id="pilih" style="width:auto" onchange="getdata()">
                                        <option value="">Tanggal</option>
                                        <option value="lokasi">Lokasi</option>
                                        <option value="agent">Agent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="flot-chart" style="height:auto">
                                            <div id="curve_chart" style="height:auto"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <ul class="stat-list">
                                            <li>
                                                <h2 class="no-margins">
                                                    <?php
                                                        $query1 = mysqli_query($conn, "SELECT * FROM tbl_peserta WHERE YEAR(tgl_daftar) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(tgl_daftar) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)");
                                                        $jumlah = mysqli_num_rows($query1);
                                                        echo $jumlah;
                                                        $bar = round($jumlah *100 / 100);
                                                    ?>
                                                </h2>
                                                <small>1 Bulan yang lalu</small>
                                                <div class="stat-percent"><?php echo $bar ?> % <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width:<?php echo $bar ?>%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins">
                                                    <?php
                                                        $query2 = mysqli_query($conn, "SELECT * FROM tbl_peserta WHERE YEAR(tgl_daftar) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) AND MONTH(tgl_daftar) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)");
                                                        $jumlah2 = mysqli_num_rows($query2);
                                                        echo $jumlah2;
                                                        $bar2 = round($jumlah2 *100 / 100);
                                                    ?>
                                                </h2>
                                                <small>2 Bulan yang lalu</small>
                                                <div class="stat-percent"><?php echo $bar2 ?> % <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width:<?php echo $bar2 ?>%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins">
                                                    <?php
                                                        $query3 = mysqli_query($conn, "SELECT * FROM tbl_peserta WHERE YEAR(tgl_daftar) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH) AND MONTH(tgl_daftar) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)");
                                                        $jumlah3 = mysqli_num_rows($query3);
                                                        echo $jumlah3;
                                                        $bar3 = round($jumlah3 *100 / 100);
                                                    ?>
                                                </h2>
                                                <small>3 Bulan yang lalu</small>
                                                <div class="stat-percent"><?php echo $bar3 ?> % <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo $bar3 ?>%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Agent Terbaik</h5>
                            </div>
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Lokasi</th>
                                            <th>Nama</th>
                                            <th>Jumlah Peserta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            while ($a = mysqli_fetch_array($top_agent)) {
                                                $i++;
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $i;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $a['nama_lokasi'];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $a['nama'];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $a['total'];
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>New Information</h5>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3><i class="fa fa-envelope-o"></i>    New Information</h3>
                                <small><i class="fa fa-tim"></i> You have 22 New Information.</small>
                            </div>
                            <div class="ibox-content">
                                <div class="feed-activity-list">

                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right text-navy">1m ago</small>
                                            <strong>Monica Smith</strong>
                                            <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</div>
                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right">2m ago</small>
                                            <strong>Jogn Angel</strong>
                                            <div>There are many variations of passages of Lorem Ipsum available</div>
                                            <small class="text-muted">Today 2:23 pm - 11.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right">5m ago</small>
                                            <strong>Jesica Ocean</strong>
                                            <div>Contrary to popular belief, Lorem Ipsum</div>
                                            <small class="text-muted">Today 1:00 pm - 08.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right">5m ago</small>
                                            <strong>Monica Jackson</strong>
                                            <div>The generated Lorem Ipsum is therefore </div>
                                            <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                                        </div>
                                    </div>


                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right">5m ago</small>
                                            <strong>Anna Legend</strong>
                                            <div>All the Lorem Ipsum generators on the Internet tend to repeat </div>
                                            <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right">5m ago</small>
                                            <strong>Damian Nowak</strong>
                                            <div>The standard chunk of Lorem Ipsum used </div>
                                            <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <div>
                                            <small class="pull-right">5m ago</small>
                                            <strong>Gary Smith</strong>
                                            <div>200 Latin words, combined with a handful</div>
                                            <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Kegiatan</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Lokasi</th>
                                            <th>
                                                <div class="text-center">Pelaksanaan</div>
                                                <div class="col-sm-6">Mulai</div>
                                                <div class="col-sm-6">Akhir</div>
                                            </th>
                                            <th>Peserta</th>
                                            <th>
                                                <div class="text-center">Lulus Seleksi</div>
                                                <div class="col-sm-6">Berkas</div>
                                                <div class="col-sm-6">Wawancara</div>
                                            </th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 0;
                                            $query = mysqli_query($conn, "SELECT b.nama_lokasi,a.status, a.tgl_mulai, a.tgl_selesai, a.target_peserta FROM tbl_kegiatan AS a inner join tbl_lokasi AS b on a.kode_lokasi = b.kode_lokasi");
                                            while($row=mysqli_fetch_array($query)) {
                                                $i++;
                                                echo "<tr>";
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$row['nama_lokasi']."</td>";
                                                echo "<td>";
                                                echo "<div class='col-sm-6'>".$row['tgl_mulai']."</div>";
                                                echo "<div class='col-sm-6'>".$row['tgl_selesai']."</div>";
                                                echo "</td>";
                                                echo "<td>".$row['target_peserta']."</td>";
                                                echo "<td>";
                                                echo "<div class='col-sm-6'></div>";
                                                echo "<div class='col-sm-6'></div>";
                                                echo "</td>";
                                                echo "<td>".$row['status']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">

            </div>
    </div>

    <!-- Mainly scripts -->
    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="../js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="../js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="../js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="../js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../js/demo/sparkline-demo.js"></script>

</body>
</html>
