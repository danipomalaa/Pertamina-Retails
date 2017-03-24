<?php
    include('../koneksi.php');
    $iduser = $_GET['id_user'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_peserta AS a inner join tbl_user AS b on a.user_id = b.user_id inner join tbl_sekolah as c on a.kode_sekolah = c.kode_sekolah WHERE a.user_id = '$iduser' ");
    $row = mysqli_fetch_array($query);

    $msg = "";
    if(isset($_POST['simpan'])){
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat_peserta = $_POST['alamat'];
        $telp = $_POST['telp'];        
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $kode = $_POST['kode_peserta'];

        $target = "images/".$kode.basename($_FILES['image']['name']);
        $image = $kode.$_FILES['image']['name'];
        if ($_FILES['image']['name'] == "") {
            $query = mysqli_query($conn,"UPDATE tbl_peserta set nama_depan='$nama_depan', nama_belakang='$nama_belakang', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', telp_peserta='$telp', alamat_peserta='$alamat_peserta', email='$email' where kode_peserta ='$kode' "); 
        }
        if ($_FILES['image']['name'] != "") {
            $query = mysqli_query($conn,"UPDATE tbl_peserta set foto = '$image', nama_depan='$nama_depan', nama_belakang='$nama_belakang', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', telp_peserta='$telp', alamat_peserta='$alamat_peserta', email='$email' where kode_peserta ='$kode' "); 
        }

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "image changed";
        }else{
            $msg = "error";
        }
        
        if($query){
            $insert=mysqli_query($conn,"UPDATE tbl_user set email='$email', username='$username', password='$password' where user_id='$iduser' ");
        }
        if ($insert) {
            header('location:profile.php?id='.$iduser.'');
        }
        //echo "<meta http-equiv=\"refresh\" content=\"0\" /> ";
    }
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
                        <strong>Biodata Peserta</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Biodata Peserta</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group" style="display:none"><label class="col-sm-2 control-label">Kode Peserta</label>
                                    <div class="col-sm-10"><input type="text" name="kode_peserta" class="form-control" value="<?php echo $row['kode_peserta'] ?>" /></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama depan</label>
                                    <div class="col-sm-10"><input type="text" name="nama_depan" class="form-control" value="<?php echo $row['nama_depan'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama belakang</label>
                                    <div class="col-sm-10"><input type="text" name="nama_belakang" class="form-control" value="<?php echo $row['nama_belakang'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="radio-inline i-checks"><label> <input type="radio" value="<?php echo $row['jenis_kelamin'] ?>" <?php if($row['jenis_kelamin']=='perempuan'){echo "checked";} ?> name="jenis_kelamin" /> Perempuan </label></div>
                                        <div class="radio-inline i-checks"><label> <input type="radio" value="<?php echo $row['jenis_kelamin'] ?>" <?php if($row['jenis_kelamin']=='laki-laki'){echo "checked";} ?> name="jenis_kelamin" /> Laki-laki </label></div>
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
                                    <div class="form-group"><label class="col-sm-2 control-label">Asal Sekolah</label>
                                    <div class="col-sm-10"><input type="text" name="nama_sekolah" class="form-control" value="<?php echo $row['nama_sekolah'] ?>" disabled/></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><textarea class="form-control" name="alamat" rows="2" cols="12"><?php echo $row['alamat_peserta'] ?></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">No.Telepon</label>
                                    <div class="col-sm-10"><input type="text" name="telp" class="form-control" data-mask="(999) 999-9999" value="<?php echo $row['telp_peserta'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"><input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10"><input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10"><input type="password" name="pass" class="form-control" value="<?php echo $row['password'] ?>" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-10">
                                    <?php echo "<img width='150px' src='images/".$row['foto']."'>"?>
                                    <input type="file" name="image">
                                    <label style="color:red">*only jpg</label>
                                </div>
                                </div>
                                <br />  
                                <div class="form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" type="submit" style="width:100px;" name="simpan">Simpan</button>
                                        <?php echo "<a href='profile.php?id=".$iduser."' class='btn btn-white' style='width:100px;''>Close</a>" ?>
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
