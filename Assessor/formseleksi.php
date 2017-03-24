<?php
    include '../koneksi.php';
    $kode = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_peserta as a inner join tbl_sekolah as b on a.kode_sekolah = b.kode_sekolah where a.kode_peserta = '$kode' ");
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>form seleksi</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="../css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet" />

</head>
<body>
    <?php
        include 'sitemaster.php';
    ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Seleksi</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="seleksi.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Seleksi Berkas</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Verifikasi Dokumen</h5>
                        </div>
                        <div class="ibox-content">
                                <div class="col-md-6">
                                    <div class="profile-image">
                                        <?php echo "<img src='../peserta/images/".$row['foto']."' class='img-circle circle-border m-b-md' alt='profile' />"; ?>
                                    </div>
                                    <div class="profile-info">
                                        <div><br />
                                            <h2 class="no-margins">
                                                <?php echo $row['nama_depan'].' '.$row['nama_belakang'] ?>
                                            </h2>
                                            <h4><?php echo $row['nama_sekolah']?></h4>
                                        </div>
                                    </div>
                                </div>
                            <table class="footable table table-stripped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Dokumen</th>
                                    <th>Nomor Dokumen</th>
                                    <th>Verifikasi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:35px;">1</td>
                                        <td>Ijazah Terakhir</td>
                                        <td></td>
                                        <td><div class="i-checks"><input type="checkbox" value="option1" name="a"></div></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>KTP</td>
                                        <td></td>
                                        <td><button class="tampil btn btn-white">✖</button></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Akte Kelahiran</td>
                                        <td></td>
                                        <td><button class="tampil btn btn-white">✖</button></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Sertifikat</td>
                                        <td></td>
                                        <td><button class="tampil btn btn-white">✖</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button class="btn btn-primary" style="width:100px" name="simpan">Simpan</button>
                                <a href="seleksi.php" class="btn btn-white" style="width:100px">Cancel</a>
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
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- FooTable -->
        <script src="../js/plugins/footable/footable.all.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="../js/inspinia.js"></script>
        <script src="../js/plugins/pace/pace.min.js"></script>
        <script>
            $('.tampil').click(function () {

                var ganti = $(this);

                ganti.text(ganti.text() == '✖' ? '✔' : '✖');

            });
        
        </script>
        <script src="../js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
        
</body>
</html>
