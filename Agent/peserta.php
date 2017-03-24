<?php
    include('../koneksi.php');
    $kode_agent = $_GET['kode'];
    $query_peserta = mysqli_query($conn,"SELECT a.kode_peserta,concat(a.nama_depan,' ',a.nama_belakang)nama, a.tempat_lahir, a.tgl_lahir, b.nama_sekolah, a.alamat_peserta, b.kode_sekolah FROM tbl_peserta AS a inner join tbl_sekolah AS b on a.kode_sekolah = b.kode_sekolah where a.kode_agent = '$kode_agent' ");
    $query_agent = mysqli_query($conn, "SELECT * FROM tbl_agent where kode_agent = '$kode_agent' ");
    $row = mysqli_fetch_array($query_agent);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>PESERTA</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- FooTable -->
    <link href="../css/plugins/footable/footable.core.css" rel="stylesheet" />

    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

</head>

<body>

<div id="wrapper">
    <?php
        include('b.php');
    ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Peserta</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php?id=<?php echo $row['user_id'] ?>">Home</a>
                    </li>
                    <li class="active">
                        <strong>Peserta</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Data Peserta</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-10">
                                    <input id="kode" style="display:none" value="<?php echo $kode_agent ?>" />
                                    <div class="input-group"><input type="text" class="form-control" id="txt_search" placeholder="Search by name" />
                                        <span class="input-group-btn"><button type="button" class="btn btn-primary" onclick="search();" ><i class="fa fa-search"></i></button> </span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <?php echo "<a href='daftar.php?agent=".$kode_agent."&lokasi=".$row['kode_lokasi']."' class='btn btn-white col-lg-12'><i class='fa fa-plus-square'></i>&nbsp Add new</a></li>" ?>
                                </div>
                            </div><br />
                            <table class="footable table table-stripped" data-page-size="10" id="table" >
                                <thead>
                                    <tr>
                                        <td><b>#</b></td>
                                        <td><b>Nama</b></td>
                                        <td><b>Tempat tanggal lahir</b></td>
                                        <td><b>Asal sekolah</b></td>
                                        <td><b>Alamat</b></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php $i = 0;
                                          while ($row = mysqli_fetch_array($query_peserta)) {
                                            $i++;
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$row['nama']."</td>";
                                            echo "<td>".$row['tempat_lahir'].', '.$row['tgl_lahir']."</td>";
                                            echo "<td>".$row['nama_sekolah']."</td>";
                                            echo "<td>".$row['alamat_peserta']."</td>";
                                            echo "<td>"."<a href='profilPeserta.php?id=".$row['kode_peserta']."' class='btn btn-white btn-xs'>View</a>"."</td>";
                                            echo "</tr>";

                                          }
                                        ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
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
            var kode_agent = $('#kode').val();
            //alert(kode_agent);
            $.ajax({
                type:"POST",
                url:"search_peserta.php?data=search",
                data:"search_name="+search_name+"&kode_agent="+kode_agent,
                success:function(data){
                    $("#table").html(data);
                }
            });
        }
    </script>

</body>

</html>
