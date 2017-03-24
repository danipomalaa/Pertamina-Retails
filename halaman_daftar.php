<?php 
    include 'koneksi.php';
    $query_lokasi = mysqli_query($conn,"SELECT * FROM tbl_lokasi order by nama_lokasi");
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Daftar</title>

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet" />
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet" />
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" />

    <style type="text/css">
        .zoomin img { height: 80px; width: 80px; } 
        .zoomin img:hover { width: 150px; height: 150px; }
        .img5 {
            margin:10px;
            width: 120px;
            transition: all 0.5s;
            -o-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            display: inline-block;
            text-align: center;
        }
        .img5 img{
            width: 60px;
            height: 80px;
        }
        .img5:hover {
            transition: all 0.3s;
            -o-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -webkit-transition: all 0.3s;
            transform: scale(1.5);
            -moz-transform: scale(1.5);
            -o-transform: scale(1.5);
            -webkit-transform: scale(1.5);
            box-shadow: 2px 2px 6px rgba(0,0,0,0.5);
        }
    </style>
</head>

<body class="gray-bg">

<div id="wrapper">

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form method="post">
                            <?php
                                foreach ($query_lokasi as $lokasi) {
                                    echo "<a class='img5' href='daftar.php?id=".$lokasi['kode_lokasi']."'><img src='admin/img_lokasi/".$lokasi['gambar']."'><br><span>".$lokasi['nama_lokasi']."</span></a>";
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
    </div>

</div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    
    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
    <script>
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    </script>
</body>

</html>
