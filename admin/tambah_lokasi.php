<?php
    include '../koneksi.php';
    $query_kabupaten = mysqli_query($conn, "SELECT kode_kabupaten, nama_kabupaten FROM tbl_kabupaten");
    $query_kecamatan = mysqli_query($conn, "SELECT * FROM tbl_kecamatan");
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Kegiatan</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet" />
    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet" />
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" />
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="../css/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

</head>

<body>

    <div id="wrapper">
        <?php
            include('b.php');
        ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                <h2>Lokasi</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Tambah Lokasi</strong>
                    </li>
                </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Lokasi</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="conn.php" enctype="multipart/form-data">
                                
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-2 control-label">Nama Lokasi</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama_lokasi" required/></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="provinsi" id="provinsi" onchange="getkabupaten();">
                                            <option value="0">Pilih Provinsi</option>
                                            <?php
                                                $query_provinsi = mysqli_query($conn,"SELECT kode_provinsi, nama_provinsi FROM tbl_provinsi");
                                                foreach ($query_provinsi as $provinsi) {
                                            ?>
                                                <option value="<?php echo $provinsi['kode_provinsi']; ?>"><?php echo $provinsi['nama_provinsi']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kabupaten</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kabupaten" id="kabupaten" onchange="getkecamatan();">
                                            <option value="0">Semua Kabupaten</option>
                                            <?php
                                                while ($row2= mysqli_fetch_array($query_kabupaten)) {
                                                    echo "<option value=".$row2['kode_kabupaten'].">".$row2['nama_kabupaten']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kecamatan" id="kecamatan">
                                            <option value="0">Semua Kecamatan</option>
                                            <?php
                                                while ($row3= mysqli_fetch_array($query_kecamatan)) {
                                                    echo "<option value=".$row3['kode_kecamatan'].">".$row2['nama_kecamatan']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" style="width:100px;" type="submit" name="simpan">Simpan</button>
                                        <a href="tambahkegiatan.php" class="btn btn-white" style="width:100px;">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong>
            </div>
            <div>
                <strong>Copyright</strong>
            </div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script type="text/javascript">
        function getkabupaten(){
            var select_kodeprovinsi = $('#provinsi').val();
            $.ajax({
                type:"POST",
                url:"getprovinsi.php?data=kabupaten",
                data:"kode_provinsi="+select_kodeprovinsi,
                success:function(data){
                    $("#kabupaten").html(data);
                }
            });

            $.ajax({
                type:"POST",
                url:"getprovinsi.php?data=kecamatan",
                data:"kode_provinsi="+select_kodeprovinsi,
                success:function(data){
                    $("#kecamatan").html(data);
                }
            });
        }

        function getkecamatan(){

            var select_kodekabupaten = $('#kabupaten').val();
            
            $.ajax({
                type:"POST",
                url:"getprovinsi.php?data=kecamatan2",
                data:"kode_kabupaten="+select_kodekabupaten,
                success:function(data){
                    $("#kecamatan").html(data);
                }
            }); 
        }

    </script>

    <!-- Select2 -->
    <script src="../js/plugins/select2/select2.full.min.js"></script>

    <script type="text/javascript">
        $(".select2_demo_1").select2();
    </script>

</body>

</html>
