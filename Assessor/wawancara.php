<?php
    include('../koneksi.php');
        include '../koneksi.php';
    $kode = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_peserta as a inner join tbl_sekolah as b on a.kode_sekolah = b.kode_sekolah where a.kode_peserta = '$kode' ");
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Wawancara</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet" />
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" />

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
                        <strong>Seleksi</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Penilaian Wawancara</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile-image">
                                        <?php echo "<img src='../peserta/images/".$row['foto']."' class='img-circle circle-border m-b-md' alt='profile' />"; ?>
                                    </div>
                                    <div class="profile-info">
                                        <div class="">
                                            <div><br />
                                                <h2 class="no-margins">
                                                    <?php echo $row['nama_depan'].' '.$row['nama_belakang'] ?>
                                                </h2>
                                                <h4><?php echo $row['nama_sekolah'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-1">#</th>
                                            <th class="col-sm-3">Dimensi </th>
                                            <th class="col-sm-6">Uraian </th>
                                            <th class="text-center" class="col-sm-2">Verifikasi
                                                <div class="row">
                                                    <div class="col-sm-3">1</div>
                                                    <div class="col-sm-3">2</div>
                                                    <div class="col-sm-3">3</div>
                                                    <div class="col-sm-3">4</div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Pendidikan Formal</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="a"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="a"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="a"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="a"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Pengalaman Kerja</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="b"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="b"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="b"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="b"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Pengetahuan Teknis</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="c"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="c"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="c"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="c"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Keterampilan Teknis</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="d"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="d"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="d"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="d"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Motivasi</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="e"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="e"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="e"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="e"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Kerjasama</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="f"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="f"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="f"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="f"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Etika</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="g"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="g"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="g"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="g"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Kemampuan Berkomunikasi</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="h"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="h"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="h"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="h"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Kemampuan Bahasa Asing</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="i"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="i"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="i"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="i"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Penampilan Diri</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="j"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="j"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="j"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="j"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Kemampuan Memimpin</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="k"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="k"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="k"></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="k"></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Pemeriksaan Referensi</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option1" name="l" /></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option2" name="l" /></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option3" name="l" /></div></div>
                                                    <div class="col-sm-3"> <div class="i-checks"><input type="radio" value="option4" name="l" /></div></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr />
                            
                            <div class="form-group">
                                <label class="col-sm-12">Kesimpulan/ saran :</label>
                                <textarea rows="4" cols="12" class="form-control no-borders"></textarea><hr />
                                <button class="btn btn-info" style="width:100px;" name="simpan">Simpan</button>
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

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

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

    <!-- Peity -->
    <script src="../js/demo/peity-demo.js"></script>

</body>

</html>
