<?php
    include '../koneksi.php';
    $kode_peserta = $_GET['id'];
    $peserta = mysqli_query($conn, "SELECT * FROM tbl_peserta where kode_peserta = '$kode_peserta' ");
    $row2 = mysqli_fetch_array($peserta);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>PROFILE PESERTA</title>

    <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet" />
    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" />

</head>

<body>

<div id="wrapper">
    <?php
        include 'b.php';
    ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Profile</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="daftar.html">Home</a>
                    </li>
                    <li class="active">
                        <strong>Upload Dokumen</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Upload Dokumen</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="upload.php" enctype="multipart/form-data">
                                <input type="text" name="kode_peserta" value="<?php echo $kode_peserta ?>" style="display:none">
                                <input type="text" name="user_id" value="<?php echo $row2['user_id'] ?>" style="display:none">
                                <input type="text" name="tgl_upload" value="<?php echo date("Y/m/d") ?>" style="display:none">
                                <div class="form-group"><label class="col-sm-2 control-label">Ijazah</label>
                                    <div class="col-sm-10">
                                        <?php
                                            $ijazah = mysqli_query($conn, "SELECT file_dokumen FROM tbl_dokumen_peserta where jenis_dokumen = 'ijazah' and kode_peserta = '$kode_peserta' ");
                                            $row = mysqli_fetch_array($ijazah);
                                            if ($row['file_dokumen'] != "") {
                                                echo "<input type='text' class='form-control' value='Sudah Upload' disabled />";
                                            }
                                            else{
                                                echo "<input type='file' class='form-control' name='ijazah'/>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">KTP/ Kartu Pelajar</label>
                                    <div class="col-sm-10">
                                        <?php 
                                            $ktp = mysqli_query($conn, "SELECT file_dokumen FROM tbl_dokumen_peserta where jenis_dokumen = 'ktp' and kode_peserta = '$kode_peserta' ");
                                            $row3 = mysqli_fetch_array($ktp);
                                            if ($row3['file_dokumen'] != "") {
                                                echo "<input type='text' class='form-control' value='Sudah Upload' disabled />";
                                            }
                                            else{
                                                echo "<input type='file' class='form-control' name='ktp' />";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Akte Kelahiran</label>
                                    <div class="col-sm-10">
                                        <?php 
                                            $akte = mysqli_query($conn, "SELECT file_dokumen FROM tbl_dokumen_peserta where jenis_dokumen = 'akte' and kode_peserta = '$kode_peserta' ");
                                            $row4 = mysqli_fetch_array($akte);
                                            if ($row4['file_dokumen'] != "") {
                                                echo "<input type='text' class='form-control' value='Sudah Upload' disabled />";
                                            }
                                            else{
                                                echo "<input type='file' class='form-control' name='akte' />";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <br />  
                                <div class="form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" type="submit" name="upload" style="width:100px;"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Upload</span></button>
                                        <?php echo "<a href='profile.php?id=".$row2['user_id']."' class='btn btn-white' style='width:100px;''>Close</a>" ?>
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

    <script src="../js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    
    <!-- Data picker -->
    <script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- iCheck -->
    <script src="../js/plugins/iCheck/icheck.min.js"></script>
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
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    </script>
</body>

</html>
