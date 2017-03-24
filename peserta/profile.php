<?php
    include('../koneksi.php');
    $iduser = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_peserta AS a inner join tbl_user AS b on a.user_id = b.user_id inner join tbl_sekolah AS c on a.kode_sekolah = c.kode_sekolah WHERE a.user_id = '$iduser' ");
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Profile</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

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
                        <a href="daftar.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Profile</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="profile-image">
                <?php echo "<img width='150px' class='img-circle circle-border m-b-md' alt='profile' src='images/".$row['foto']."'>"?>
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            <?php echo $row['nama_depan'].' '.$row['nama_belakang'] ?>
                        </h2>
                        <h4><?php echo $row['nama_sekolah'] ?></h4>
                        <small>
                            Pengalaman :
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5></h5>
                        </div>
                        <div class="ibox-content ibox-heading">
                            <h3><i class="fa fa-envelope-o"></i></h3>
                            <small><i class="fa fa-tim"></i> You have 22 Message.</small>
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
                <div class="col-lg-6 m-b-lg">
                    <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <h2>Pendaftaran</h2>
                                <p>Peserta harus melakukan pendaftaran terlebih dahulu dengan mengisi beberapa persyaratan, seperti alamat email, username, dan password untuk user account. dan juga melengkapi beberapa nomor dokumen yg diperlukan.
                                </p>
                                <?php echo "<a href='profilPeserta.php?id_user=".$iduser."' class='btn btn-sm btn-primary'>Biodata Peserta</a>" ?>
                                <span class="vertical-date">Today<br /><small><?php echo date("Y/m/d") . "<br>"; ?></small></span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon blue-bg">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Upload Dokumen</h2>
                                <p>Dokumen yang diperlukan :</p>
                                <ul>
                                    <li>Ijazah</li>
                                    <li>KTP/ Kartu Pelajar</li>
                                    <li>Akta Kelahiran</li>
                                </ul>
                                <?php echo "<a href='uploadDokumen.php?id=".$row['kode_peserta']."' class='btn btn-sm btn-success'> Upload Dokumen </a>" ?>
                                <span class="vertical-date">Today<br /><small><?php echo date("Y/m/d") . "<br>"; ?></small></span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon lazur-bg">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Seleksi</h2>
                                <p>Tanggal seleksi berkas : <br />
                                    Tanggal seleksi wawancara :
                                </p>
                                <a href="#" class="btn btn-sm btn-info">Selengkapnya</a>
                                <span class="vertical-date">Today<br /><small><?php echo date("Y/m/d") . "<br>"; ?></small></span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon yellow-bg">
                                <i class="fa fa-map-marker"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Penempatan</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                <span class="vertical-date">Today<br /><small><?php echo date("Y/m/d") . "<br>"; ?></small></span>
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
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- Sparkline -->
    <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <script>
        $(document).ready(function() {


            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });


        });
    </script>

</body>

</html>
