<?php
    include '../koneksi.php';
    $query_provinsi = mysqli_query($conn,"SELECT * FROM tbl_provinsi");
    $query_kabupaten = mysqli_query($conn,"SELECT * FROM tbl_kabupaten");
    $query_kecamatan = mysqli_query($conn,"SELECT * FROM tbl_kecamatan");
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Tambah Assessor</title>

    <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet" />
    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet" />
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" />

</head>

<body>
    <?php
        include 'b.php';
    ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Assessor</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Tambah Assessor</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Assessor</h5>
                        </div>
                        <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="add_assessor.php">
                        <h3>PROFILE</h3>
                            <div class="jumbotron" style="background-color:#ebe0e3;">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama depan *</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama_depan" required/></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama belakang</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama_belakang" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1"><label class="col-sm-2 control-label">Tempat tanggal lahir *</label>
                                    <div class="col-sm-4"><input type="text" class="form-control" name="tempat_lahir" /></div>
                                    <div class="col-sm-6">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_lahir" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin *</label>
                                    <div class="col-sm-10">
                                        <div class="radio-inline i-checks"><label> <input type="radio" value="perempuan" name="jenis_kelamin" /> Perempuan </label></div>
                                        <div class="radio-inline i-checks"><label> <input type="radio" value="laki-laki" name="jenis_kelamin" /> Laki-laki </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">No.Telepon</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" data-mask="(999) 999-9999" name="telp"/></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat *</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" required="" class="form-control"></textarea><br>
                                        <select class="form-control" name="provinsi" id="provinsi" onchange="getkabupaten();">
                                            <option value="0">Provinsi</option>
                                            <?php
                                                foreach ($query_provinsi as $provinsi) {
                                                ?>
                                                    <option value="<?php echo $provinsi['kode_provinsi']; ?>"> <?php echo $provinsi['nama_provinsi']; ?></option>
                                                <?php
                                                }
                                            ?>
                                        </select><br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control" name="kabupaten" id="kabupaten" onchange="getkecamatan();">
                                                    <option value="0">Kabupaten</option>
                                                    <?php
                                                        while ($row2=mysqli_fetch_array($query_kabupaten)) {
                                                            echo "<option value=".$row2['kode_kabupaten'].">".$row2['nama_kabupaten']."</option>";
                                                        }
                                                    ?>
                                                </select><br>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="kecamatan" name="kecamatan">
                                                    <option value="0">Kecamatan</option>
                                                    <?php
                                                        while ($row3=mysqli_fetch_array($query_kecamatan)) {
                                                            echo "<option value=".$row3['kode_kecamatan'].">".$row3['nama_kecamatan']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pekerjaan" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <h3>User Account</h3>
                        <div class="jumbotron" style="background-color:#e2e9e9;">
                            <div class="form-group"><label class="col-sm-2 control-label">Email *</label>
                                <div class="col-sm-10"><input type="email" name="email" class="form-control" required /></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Username *</label>
                                <div class="col-sm-10"><input type="text" name="username" class="form-control" required/></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Password *</label>
                                <div class="col-sm-10">
                                    <input type="password" id="password" name="pass" class="form-control" required/>
                                    <span style="color:red">Enter pasword longer than 7 characters</span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Confirm Password *</label>
                                <div class="col-sm-10">
                                    <input type="password" id="confirm_password" class="form-control" required/>
                                    <span style="color:red">Please confirm your password</span>
                                </div>
                            </div>
                        </div>
                            <button type="submit" name="kirim" class="btn btn-primary" id="submit" style="width:100px;">Simpan</button>
                            <a href="seleksi.php" class="btn btn-white" style="width:100px;">Cancel</a>
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

    <script src="../agent/app.js"></script>

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
        });
    </script>
    <script type="text/javascript">

        function getkabupaten(){

            var select_kodeprovinsi = $('#provinsi').val();
            var select_kodekabupaten = $('#kabupaten').val();

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kabupaten",
                data:"kode_provinsi="+select_kodeprovinsi,
                success:function(data){
                    $("#kabupaten").html(data);
                }
            });

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kecamatan",
                data:"kode_provinsi="+select_kodeprovinsi,
                success:function(data){
                    $("#kecamatan").html(data);
                }
            });
        }

        function getkecamatan(){

            var select_kodeprovinsi = $('#provinsi').val();
            var select_kodekabupaten = $('#kabupaten').val();

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kecamatan2",
                data:"kode_kabupaten="+select_kodekabupaten,
                success:function(data){
                    $("#kecamatan").html(data);
                }
            });
        }
    </script>
</body>

</html>
