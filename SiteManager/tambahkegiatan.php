<?php
    include '../koneksi.php';
    $kode_lokasi = $_GET['kode'];
    $query = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_lokasi where kode_lokasi = '$kode_lokasi' "));
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
                <h2>Kegiatan</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="kegiatan.php?kode=<?php echo $kode_lokasi ?>">Home</a>
                    </li>
                    <li class="active">
                        <strong>Tambah Kegiatan</strong>
                    </li>
                </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah kegiatan</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="connect.php">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Kegiatan</label>
                                    <div class="col-sm-9"><input type="text" class="form-control" name="nama_kegiatan" required/></div>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-3 control-label">Tanggal mulai</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tgl_mulai" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-3 control-label">Tanggal akhir</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tgl_selesai" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Lokasi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lokasi" value="<?php echo $kode_lokasi ?>" style="display:none;"/>
                                        <input type="text" class="form-control" value="<?php echo $query['nama_lokasi'] ?>" disabled/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Target Peserta</label>
                                    <div class="col-sm-9"><input type="text" class="form-control" name="target_peserta" required /></div>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-3 control-label">Awal Pendaftaran</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tgl_pendaftaran" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-3 control-label">Penutupan Pendaftaran</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tgl_penutupan" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-3 control-label">Tanggal Seleksi</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tgl_seleksiberkas" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-3 control-label">Tanggal Wawancara</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tgl_wawancara" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button class="btn btn-primary" style="width:100px;" type="submit" name="simpan">Simpan</button>
                                        <a href="kegiatan.php?kode=<?php echo $kode_lokasi ?>" class="btn btn-white" style="width:100px;">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            
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
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- Data picker -->
   <script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <script>
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    </script>

</body>

</html>
