<?php
    include('../koneksi.php');
    $query_peserta = mysqli_query($conn,"SELECT a.kode_peserta,concat(a.nama_depan,' ',a.nama_belakang)nama, a.tempat_lahir, a.tgl_lahir, b.nama_sekolah, a.alamat_peserta, b.kode_sekolah FROM tbl_peserta AS a inner join tbl_sekolah AS b on a.kode_sekolah = b.kode_sekolah ");
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SELEKSI</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="../css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

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
                    <strong>seleksi</strong>
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
                            <div class="input-group"><input type="text" class="form-control" id="txt_search" placeholder="Search by name"  />
                                <span class="input-group-btn"><button type="button" class="btn btn-primary" onclick="search();" ><i class="fa fa-search"></i></button> </span>
                            </div>
                            <br />
                            <table class="footable table table-stripped" data-page-size="10" id="table">
                                <thead>
                                <tr>
                                    <td><b>#</b></td>
                                    <td><b>No. Peserta</b></td>
                                    <td><b>Nama Lengkap</b></td>
                                    <td><b>Asal Sekolah</b></td>
                                    <td><b>Alamat Peserta</b></td>
                                    <td style="text-align:center;"><strong>Status</strong></td>
                                    <td style="width:120px; text-align:center;"><strong>Seleksi Berkas</strong></td>
                                    <td style="width:120px; text-align:center;"><strong>Seleksi Wawancara</strong></td>
                                </tr>
                                </thead>
                                <?php
                                    echo "<tbody>";
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($query_peserta)) {
                                        $i++;
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$row['kode_peserta']."</td>";
                                        echo "<td>".$row['nama']."</td>";
                                        echo "<td>".$row['nama_sekolah']."</td>";
                                        echo "<td>".$row['alamat_peserta']."</td>";
                                        echo "<td><center><i class='fa fa-check text-navy' style='font-size:large;''></i></td>";
                                        echo "<td><center><a href='formseleksi.php?id=".$row['kode_peserta']."' class='btn btn-white'><i class='fa fa-pencil-square-o' style='color:blue;''></i></a></center></center></td>";
                                        echo "<td><center><a href='wawancara.php?id=".$row['kode_peserta']."' class='btn btn-white'><i class='fa fa-pencil-square-o' style='color:blue;''></i></a></center></td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                ?>
                                <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
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

    <!-- FooTable -->
    <script src="../js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });
    </script>
    <script type="text/javascript">
        function search(){
            var search_name = $('#txt_search').val();
            $.ajax({
                type:"POST",
                url:"search_peserta.php?data=search",
                data:"search_name="+search_name,
                success:function(data){
                    $("#table").html(data);
                }
            });
        }
    </script>
</body>

</html>
