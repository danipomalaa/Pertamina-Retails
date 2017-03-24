<?php
    include('../koneksi.php');
    $kode_lokasi = $_GET['kode'];
    $query = mysqli_query($conn,"SELECT * FROM tbl_kegiatan As a inner join tbl_lokasi AS b on a.kode_lokasi = b.kode_lokasi where a.kode_lokasi = '$kode_lokasi' ");
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>KEGIATAN</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- FooTable -->
    <link href="../css/plugins/footable/footable.core.css" rel="stylesheet" />

    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

    <!-- Sweet Alert -->
    <link href="../css/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

</head>

<body>

    <div id="wrapper">
        <?php
            include('b.php');
        ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
            <h2>Kegiatan</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="dashboard.php?kode=<?php echo $kode_lokasi ?>">Home</a>
                </li>
                <li class="active">
                    <strong>Kegiatan</strong>
                </li>
            </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Kegiatan</h5>
                            <div class="ibox-tools">
                                <a href="tambahkegiatan.php?kode=<?php echo $kode_lokasi ?>" class="btn btn-primary btn-xs"><span class="fa fa-plus-square"></span> Buat Baru</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" id="kode" value="<?php echo $kode_lokasi ?>" style="display:none;">
                            <table class="footable table table-stripped" data-page-size="10" id="table">
                                <thead>
                                    <tr>
                                        <td><b>#</b></td>
                                        <td style="display:none;"><b>kode_kegiatan</b></td>
                                        <td><b>Nama Kegiatan</b></td>
                                        <td><b>Lokasi</b></td>
                                        <td><b>Tanggal mulai</b></td>
                                        <td><b>Tanggal akhir</b></td>
                                        <td><b>Status</b></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($query)) {
                                            $i++;
                                            $kode = array();
                                            $kode['kode_kegiatan']=$row['kode_kegiatan'];
                                            $idlokasi=$row['kode_lokasi'];
                                            
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td style='display:none;' id='idkegiatan'>".$row['kode_kegiatan']."</td>";
                                            echo "<td>".$row['nama_kegiatan']."</td>";
                                            echo "<td>".$row['nama_lokasi']."</td>";
                                            echo "<td>".$row['tgl_mulai']."</td>";
                                            echo "<td>".$row['tgl_selesai']."</td>";
                                            echo "<td>".$row['status']."</td>";
                                            echo "<td>".
                                                "<div class='btn-group'>
                                                    <a href='detailkegiatan.php?id=".$kode['kode_kegiatan']."&kode=".$kode_lokasi."' class='btn btn-white btn-xs'>Ubah</a>
                                                    <button class='btn btn-danger btn-xs btn-del' name='hapus' value='".$kode['kode_kegiatan']."'>Hapus</button>
                                                </div>"
                                                ."</td>";
                                            echo "</tr>";
                                          }
                                    ?>
                                </tbody>
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

    <!-- Sweet alert -->
    <script src="../js/plugins/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).on('click','.btn-del',function(e) {
            var id = $(this).val();
            //alert(id);
            swal({
                    title: "Are you sure?",
                    text: "Your will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false },
                function (isConfirm) {
                    if (isConfirm) {
                        hapus(id);
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            });
        
    </script>
    <script type="text/javascript">
        function hapus(val){
            var kode_lokasi = $('#kode').val();
            $.ajax({
                type:"POST",
                url:"persetujuan.php?data=hapus",
                data:"kode_kegiatan="+val+"&kode="+kode_lokasi,
                success:function(data){
                    $("#table").html(data);
                    table.ajax.reload();
                }
            });
        }
    </script>
</body>

</html>
