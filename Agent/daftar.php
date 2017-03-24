<?php
    include '../koneksi.php';
    $lokasi = $_GET['lokasi'];
    $agent = $_GET['agent'];
    $query_sekolah = mysqli_query($conn,"SELECT * FROM tbl_sekolah where kode_lokasi = '$lokasi' ");
    $query_provinsi = mysqli_query($conn,"SELECT * FROM tbl_provinsi order by nama_provinsi");
    $query_kabupaten = mysqli_query($conn,"SELECT * FROM tbl_kabupaten order by nama_kabupaten");
    $query_kecamatan = mysqli_query($conn,"SELECT * FROM tbl_kecamatan order by nama_kecamatan");
    $query_lokasi = mysqli_query($conn,"SELECT * FROM tbl_lokasi where kode_lokasi = '$lokasi' ");
    $query_agent = mysqli_query($conn,"SELECT * FROM tbl_agent where kode_agent = '$agent' ");
    $row = mysqli_fetch_array($query_lokasi);
    $row2 = mysqli_fetch_array($query_agent);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Pendaftaran</title>

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

<div id="wrapper">
    <?php
        include('b.php');
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Pendaftaran</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="peserta.php?kode=<?php echo $agent ?>">Home</a>
                </li>
                <li class="active">
                    <strong>Pendaftaran Peserta</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Pendaftaran</h5>
                    </div>
                    <div class="ibox-content">
                    <form method="POST" class="form-horizontal" action="pendaftaran.php" enctype="multipart/form-data" >
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $row['kode_lokasi'] ?>" name="kode_lokasi" style="display:none"/>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $agent ?>" name="kode_agent" style="display:none"/>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $row['nama_lokasi'] ?>" disabled />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Agent</label>
                            <input type="text" class="form-control" name="agent" value="<?php echo $agent ?>" style="display:none" />
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $row2['nama_depan'].' '.$row2['nama_belakang'] ?>" disabled />
                            </div>
                        </div>
                    <h3>User Account</h3>
                    <div class="jumbotron" style="background-color:#ebe0e3;">
                        <div class="form-group"><label class="col-sm-2 control-label">Email *</label>
                            <div class="col-sm-10"><input type="email" class="form-control" name="email" required /></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Username *</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="username" required/></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Password *</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" required/>
                                <span style="color:red">Enter pasword longer than 7 characters</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Confirm Password *</label>
                            <div class="col-sm-10"><input type="password" class="form-control" id="confirm_password" required/>
                            <span style="color:red">Please confirm your password</span>
                        </div>
                        </div>
                    </div>
                    <h3>PROFILE</h3>
                        <div class="jumbotron" style="background-color:#e2e9e9;">
                            <div class="form-group"><label class="col-sm-2 control-label">Nama depan *</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="nama_depan" required/></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Nama belakang</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="nama_belakang"/></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group" id="data_1"><label class="col-sm-2 control-label">Tempat tanggal lahir*</label>
                                <div class="col-sm-4"><input type="text" class="form-control" name="tempat_lahir"/></div>
                                <div class="col-sm-6">
                                    <div class="input-group date">
                                        <i class="input-group-addon"><i class="fa fa-calendar"></i></i><input type="text" class="form-control" name="tgl_lahir" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Asal Sekolah</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="sekolah" id="sekolah">
                                        <option value="0">Sekolah</option>
                                        <?php
                                            while ($row2=mysqli_fetch_array($query_sekolah)) {
                                                echo "<option value=".$row2['kode_sekolah'].">".$row2['nama_sekolah']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <a data-toggle="modal" class="btn btn-white" style="width:100%" href="#modal-form"><i class="fa fa-plus-square"></i></a>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">No.Telepon</label>
                                <div class="col-sm-10"><input type="text" class="form-control" data-mask="(999) 999-9999" name="telp"/></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin *</label>
                                <div class="col-sm-10">
                                    <div class="radio-inline i-checks"><label> <input type="radio" value="perempuan" name="jenis_kelamin" /> Perempuan </label></div>
                                    <div class="radio-inline i-checks"><label> <input type="radio" value="laki-laki" name="jenis_kelamin" /> Laki-laki </label></div>
                                </div>
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
                        </div>
                    <h3>Data Dokumen</h3>
                        <div class="jumbotron" style="background-color:#e8e3e3;">
                            <input type="text" name="tgl_daftar" style="display:none" value="<?php echo date("Y/m/d"); ?>">
                            <div class="form-group"><label class="col-sm-2 control-label">No. Ijazah</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="no_ijazah" required="" /></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Upload</label>
                                <input type="hidden" name="size" value="2000000">
                                <div class="col-sm-10">
                                <input type="file" name="ijazah" />
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">No. KTP/ Kartu Pelajar</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="no_ktp" required="" /></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Upload</label>
                                <input type="hidden" name="size" value="2000000">
                                <div class="col-sm-10"><input type="file" name="ktp" /></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">No. Akte Kelahiran</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="no_akte" required="" /></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Upload</label>
                                <input type="hidden" name="size" value="2000000">
                                <div class="col-sm-10"><input type="file" name="akte"/></div>
                            </div>
                        </div>
                            <button type="submit" name="kirim" class="btn btn-primary" id="submit" style="width:100px;">Simpan</button>
                            <a href="peserta.php?kode=<?php echo $agent ?>" class="btn btn-white" style="width:100px;">Cancel</a>
                    </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        
    </div>
</div>

    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12"><h3 class="m-t-none m-b">Tambah Sekolah</h3>
                            <form role="form" action="tambah_sekolah.php" method="post">
                                <div class="form-group"><label>Nama Sekolah</label> 
                                    <input type="text" class="form-control" name="nama_sekolah" required="">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Sekolah</label> 
                                    <textarea class="form-control" name="alamat_sekolah" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No. Tlp</label> 
                                    <input type="text" class="form-control" name="telp_sekolah" data-mask="(999) 999-9999">
                                </div>
                                <div class="form-group">
                                    <input type="text" style="display:none;" class="form-control" value="<?php echo $row['kode_lokasi'] ?>" name="kode_lokasi"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" style="display:none;" class="form-control" value="<?php echo $agent ?>" name="kode_agent"/>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" value="<?php echo $row['nama_lokasi'] ?>" name="lokasi_sekolah" disabled />
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-control" name="provinsi_sekolah" id="provinsi_sekolah" onchange="getkabupaten();">
                                        <option value="0">Provinsi</option>
                                        <?php
                                            foreach ($query_provinsi as $provinsi) {
                                            ?>
                                                <option value="<?php echo $provinsi['kode_provinsi']; ?>"> <?php echo $provinsi['nama_provinsi']; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <select class="form-control" name="kabupaten_sekolah" id="kabupaten_sekolah" onchange="getkecamatan();">
                                        <option value="0">Kabupaten</option>
                                        <?php
                                            $getkabupaten = mysqli_query($conn, "SELECT * FROM tbl_kabupaten");
                                            while ($row_=mysqli_fetch_array($getkabupaten)) {
                                                echo "<option value=".$row_['kode_kabupaten'].">".$row_['nama_kabupaten']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control" id="kecamatan_sekolah" name="kecamatan_sekolah">
                                        <option value="0">Kecamatan</option>
                                        <?php
                                            $getkecamatan = mysqli_query($conn, "SELECT * FROM tbl_kecamatan");
                                            while ($row4=mysqli_fetch_array($getkecamatan)) {
                                                echo "<option value=".$row4['kode_kecamatan'].">".$row4['nama_kecamatan']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit" ><strong>Simpan</strong></button>
                                    <?php echo "<a href='daftar.php?lokasi=".$lokasi."&agent=".$agent."' class='btn btn-sm btn-white pull-right m-t-n-xs'>" ?>Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="app.js"></script>
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
        });
    </script>

    <script type="text/javascript">

        function getkabupaten(){

            var select_kodeprovinsi = $('#provinsi').val();
            var select_kodeprovinsi2 = $('#provinsi_sekolah').val();

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

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kabupaten_sekolah",
                data:"kode_provinsi="+select_kodeprovinsi2,
                success:function(data){
                    $("#kabupaten_sekolah").html(data);
                }
            });

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kecamatan_sekolah",
                data:"kode_provinsi="+select_kodeprovinsi2,
                success:function(data){
                    $("#kecamatan_sekolah").html(data);
                }
            });
        }

        function getkecamatan(){

            var select_kodekabupaten = $('#kabupaten').val();
            var select_kodekabupaten2 = $('#kabupaten_sekolah').val();
            
            $.ajax({
                type:"POST",
                url:"getdata.php?data=kecamatan2",
                data:"kode_kabupaten="+select_kodekabupaten,
                success:function(data){
                    $("#kecamatan").html(data);
                }
            });

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kecamatan3",
                data:"kode_kabupaten="+select_kodekabupaten2,
                success:function(data){
                    $("#kecamatan_sekolah").html(data);
                }
            });
        }
    </script>
</body>

</html>
