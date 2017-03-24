<?php
    include('../koneksi.php');
    $kode_lokasi = $_GET['kode'];
    $query_peserta = mysqli_query($conn,"SELECT a.kode_peserta,concat(a.nama_depan,' ',a.nama_belakang)nama, a.tempat_lahir, a.tgl_lahir, b.nama_sekolah, a.alamat_peserta, b.kode_sekolah FROM tbl_peserta AS a inner join tbl_sekolah AS b on a.kode_sekolah = b.kode_sekolah ");
    $query_agent = mysqli_query($conn,"SELECT kode_agent,concat(nama_depan,' ',nama_belakang)nama FROM tbl_agent");
    $query_sekolah = mysqli_query($conn,"SELECT kode_sekolah,nama_sekolah FROM tbl_sekolah");


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
                        <a href="dashboard.php?kode=<?php echo $kode_lokasi ?>">Home</a>
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
                                <div class="col-lg-3">
                                    <select class="form-control" name="lokasi" id="lokasi" onchange="getagent();">
                                        <option value="0">Pilih Lokasi</option>
                                        <?php
                                            $query_lokasi = mysqli_query($conn,"SELECT kode_lokasi, nama_lokasi FROM tbl_lokasi");
                                            foreach ($query_lokasi as $lokasi) {

                                        ?>
                                            <option value="<?php echo $lokasi['kode_lokasi']; ?>"> <?php echo $lokasi['nama_lokasi']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-control" name="agent" id="agent"  onchange="getsekolah();">
                                        <option value="0">Semua agent</option>
                                        <?php
                                            while ($row2= mysqli_fetch_array($query_agent)) {
                                                echo "<option value=".$row2['kode_agent'].">".$row2['nama']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-control" name="sekolah" id="sekolah">
                                        <option value="0">Semua sekolah</option>
                                        <?php
                                            while ($row2= mysqli_fetch_array($query_sekolah)) {
                                                echo "<option value=".$row2['kode_sekolah'].">".$row2['nama_sekolah']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group"><input type="text" class="form-control" id="txt_search" placeholder="Search by name" />
                                        <span class="input-group-btn"><button type="button" class="btn btn-primary" onclick="search();"><i class="fa fa-search"></i></button> </span>
                                    </div>
                                </div>
                            </div><br />
                            <table class="footable table table-stripped" data-page-size="10" id="table">
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

        function getagent(){

            var select_kodelokasi = $('#lokasi').val();
            var select_kodeagent = $('#agent').val();

            $.ajax({
                type:"POST",
                url:"getdata.php?data=agent",
                data:"kode_lokasi="+select_kodelokasi,
                success:function(data){
                    $("#agent").html(data);
                }
            });

            $.ajax({
                type:"POST",
                url:"getdata.php?data=sekolah",
                data:"kode_lokasi="+select_kodelokasi,
                success:function(data){
                    $("#sekolah").html(data);
                }
            });
        }

        function getsekolah(){

            var select_kodelokasi = $('#lokasi').val();
            var select_kodeagent = $('#agent').val();

            $.ajax({
                type:"POST",
                url:"getdata.php?data=sekolah",
                data:"kode_lokasi="+select_kodelokasi,
                success:function(data){
                    $("#sekolah").html(data);
                }
            });
        }

        function search(){

            var select_kodelokasi = $('#lokasi').val();
            var select_kodeagent = $('#agent').val();
            var select_kodesekolah = $('#sekolah').val();
            var search_name = $('#txt_search').val();
            $.ajax({
                type:"POST",
                url:"getdata.php?data=search",
                data:"kode_lokasi="+select_kodelokasi+"&kode_agent="+select_kodeagent+"&kode_sekolah="+select_kodesekolah+"&search_name="+search_name,
                success:function(data){
                    $("#table").html(data);
                }
            });
        }

    </script>

</body>

</html>
