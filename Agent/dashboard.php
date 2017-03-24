<?php 
  include('../koneksi.php');
  $id = $_GET['id'];
  $sql = mysqli_query($conn,"SELECT * from tbl_agent where user_id = '$id' ");
  $row = mysqli_fetch_array($sql);
  $kode_lokasi = $row['kode_lokasi'];
  $kode_agent = $row['kode_agent'];

  $query  = mysqli_query($conn,"SELECT DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS tgl_daftar,count(*)peserta FROM `tbl_peserta` where kode_agent = '$kode_agent' group by tgl_daftar ");
  $myurl[] = "['tgl_daftar','peserta']";
  while ($r = mysqli_fetch_assoc($query)) {
    $title = "Peserta";
    $tgl_daftar = $r['tgl_daftar'];
    $peserta = $r['peserta'];
    $myurl[] = "['".$tgl_daftar."',".$peserta."]";

  }
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {
            var data = new google.visualization.arrayToDataTable([
              <?php echo (implode(",",$myurl)); ?>
            ]);
            var options = {
                hAxis: {
                  title: 'Tanggal'
                },
                vAxis: {
                  title: '<?php echo ($title); ?>'
                },
                curveType: 'function'
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        function getdata(){
            var pilih = $('#pilih').val();
            var kode = $('#kode_lokasi').val();
            var kode_agent = $('#kode_agent').val();
            $.ajax({
                type:"POST",
                url:"../admin/data_dashboard.php?data=agent",
                data:"pilih="+pilih+"&kode="+kode+"&kode_agent="+kode_agent,
                success:function(data){
                    $('#chart_div').html(data);
                }

            });
        }
        
    </script>

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
                        <input type="text" id="kode_lokasi" value="<?php echo $kode_lokasi ?>" style="display:none">
                        <input type="text" id="kode_agent" value="<?php echo $kode_agent ?>" style="display:none">
                        <div class="ibox-title">
                            <h5>Peserta</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">
                                <?php
                                    $kode_agent = $row['kode_agent'];
                                    $query_peserta = mysqli_query($conn, "SELECT * FROM tbl_peserta where kode_agent = '$kode_agent' ");
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
                            <h5>Lulus seleksi berkas</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">
                                0
                            </h1>
                            <small>peserta</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Lulus wawancara</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">
                                0
                            </h1>
                            <small>peserta</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5></h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">
                                
                            </h1>
                            <div class="stat-percent font-bold text-danger"> </div>
                            <small></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Grafik Pendaftaran</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="flot-chart" style="height:auto">
                                        <div id="chart_div" style="height:300px"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <ul class="stat-list">
                                        <li>
                                            <select class="form-control" onchange="getdata()" id="pilih" style="width:100%">
                                                <option value="agent">Agent</option>
                                                <option value="lokasi">Lokasi</option>
                                            </select>
                                        </li>
                                        <li>
                                            <h2 class="no-margins">
                                                <?php
                                                    $query1 = mysqli_query($conn, "SELECT * FROM tbl_peserta WHERE YEAR(tgl_daftar) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(tgl_daftar) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) and kode_agent = '$kode_agent' ");
                                                    $jumlah = mysqli_num_rows($query1);
                                                    echo $jumlah;
                                                    $bar = round($jumlah * 100 / 100);
                                                ?>
                                            </h2>
                                            <small>1 Bulan yang lalu</small>
                                            <div class="stat-percent"><?php echo $bar ?> % <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php echo $bar; ?>%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">
                                                <?php
                                                    $query2 = mysqli_query($conn, "SELECT * FROM tbl_peserta WHERE YEAR(tgl_daftar) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) AND MONTH(tgl_daftar) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) and kode_agent = '$kode_agent' ");
                                                    $jumlah2 = mysqli_num_rows($query2);
                                                    echo $jumlah2;
                                                    $bar2 = round($jumlah2 * 100 / 100);
                                                ?>
                                            </h2>
                                            <small>2 Bulan yang lalu</small>
                                            <div class="stat-percent"><?php echo $bar2 ?> % <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php echo $bar2; ?>%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">
                                                <?php
                                                    $query3 = mysqli_query($conn, "SELECT * FROM tbl_peserta WHERE YEAR(tgl_daftar) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH) AND MONTH(tgl_daftar) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH) and kode_agent = '$kode_agent' ");
                                                    $jumlah3 = mysqli_num_rows($query3);
                                                    echo $jumlah3;
                                                    $bar3 = round($jumlah3 * 100 / 100);
                                                ?>
                                            </h2>
                                            <small>3 Bulan yang lalu</small>
                                            <div class="stat-percent"><?php echo $bar3 ?> % <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php echo $bar3; ?>%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
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
            </div>
        </div>
        <div class="footer">

        </div>
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
