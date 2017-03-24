<?php
    include('../koneksi.php');
    $id=$_GET['id'];
    $query = mysqli_query($conn,"SELECT * FROM tbl_assessor where kode_assessor = '$id'");
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>PROFILE AGENT</title>

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
    <?php
        include 'b.php';
    ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Agent</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Profile Agent</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Assessor</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="simpan.php">
                                <div class="form-group">
                                <div class="col-sm-12"><input type="text" style="display:none" class="form-control" value="<?php echo $row['kode_assessor'] ?>" name="kode_assessor"/></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama depan</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row['nama_depan'] ?>" name="nama_depan"/></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama belakang</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row['nama_belakang'] ?>" name="nama_belakang" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="radio-inline i-checks"><label> <input type="radio" value="perempuan" name="jenis_kelamin" <?php if($row['jenis_kelamin']=='perempuan'){echo "checked";} ?>/> Perempuan </label></div>
                                        <div class="radio-inline i-checks"><label> <input type="radio" value="laki-laki" name="jenis_kelamin" <?php if($row['jenis_kelamin']=='laki-laki'){echo "checked";} ?>/> Laki-laki </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1"><label class="col-sm-2 control-label">Tempat tanggal lahir</label>
                                    <div class="col-sm-4"><input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row['tempat_lahir'] ?>" /></div>
                                    <div class="col-sm-6">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_lahir" value="<?php echo $row['tgl_lahir'] ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><textarea name="alamat" class="form-control" rows="2" cols="12"><?php echo $row['alamat'] ?></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">No.Telepon</label>
                                    <div class="col-sm-10"><input type="text" name="telp" class="form-control" data-mask="(999) 999-9999" value="<?php echo $row['telp'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"><input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-10"><input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="status" class="form-control" value="<?php echo $row['status'] ?>" disabled />
                                    </div>
                                </div>
                                <br />  
                                <div class="form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" style="width:100px;" type="submit" name="simpan">Simpan</button>
                                        <a href="seleksi.php" class="btn btn-white" style="width:100px;">Close</a>
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
            format: 'yyyy-mm-dd',
            autoclose: true
        })
    </script>
</body>

</html>
