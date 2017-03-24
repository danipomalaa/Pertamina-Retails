<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" />

    <!-- FooTable -->
    <link href="../css/plugins/footable/footable.core.css" rel="stylesheet" />

    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

    <!-- Sweet Alert -->
    <link href="../css/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

</head>
<body>
<?php
	include('../koneksi.php');
		if($_GET["data"]=="kegiatan"){
            $kode_kegiatan = $_POST["kode_kegiatan"];
            $query = mysqli_query($conn,"SELECT * FROM tbl_kegiatan As a inner join tbl_lokasi AS b on a.kode_lokasi = b.kode_lokasi") ;
            if ($query) {
                $sql = mysqli_query($conn, "UPDATE tbl_kegiatan set status = 'disetujui' WHERE kode_kegiatan = '$kode_kegiatan'");
                echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
            }
        }

        if($_GET["data"]=="batalkan"){
            $kode_kegiatan = $_POST["kode_kegiatan"];
            $query = mysqli_query($conn,"SELECT * FROM tbl_kegiatan As a inner join tbl_lokasi AS b on a.kode_lokasi = b.kode_lokasi") ;
            if ($query) {
                $sql = mysqli_query($conn, "UPDATE tbl_kegiatan set status = '' WHERE kode_kegiatan = '$kode_kegiatan'");
                echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
            }
        }

        if($_GET["data"]=="hapus"){
            $kode_kegiatan = $_POST["kode_kegiatan"];
            $query = mysqli_query($conn,"SELECT * FROM tbl_kegiatan As a inner join tbl_lokasi AS b on a.kode_lokasi = b.kode_lokasi") ;
            if ($query) {
                $sql = mysqli_query($conn, "DELETE FROM tbl_kegiatan WHERE kode_kegiatan = '$kode_kegiatan'");
            }
            if ($sql) {
                $query = mysqli_query($conn, "SELECT * FROM tbl_kegiatan As a inner join tbl_lokasi AS b on a.kode_lokasi = b.kode_lokasi");
                ?>
                <table class="footable table table-stripped" data-page-size="10" id="table">
                    <tr>
                        <td><input id="checkAll" type="checkbox" name="checkAll" /></td>
                        <td style="display:none;"><b>kode_kegiatan</b></td>
                        <td><b>Nama Kegiatan</b></td>
                        <td><b>Lokasi</b></td>
                        <td><b>Tanggal mulai</b></td>
                        <td><b>Tanggal akhir</b></td>
                        <td><b>Status</b></td>
                        <td></td>
                    </tr>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($query)) {
                            $kode = array();
                            $kode['kode_kegiatan']=$row['kode_kegiatan'];
                            $idlokasi=$row['kode_lokasi'];
                            
                            echo "<tr>";
                            echo "<td>"."<input id=Checkbox1 type=checkbox value='".$kode['kode_kegiatan']."' onclick='' />"."</td>";
                            echo "<td style='display:none;' id='idkegiatan'>".$row['kode_kegiatan']."</td>";
                            echo "<td>".$row['nama_kegiatan']."</td>";
                            echo "<td>".$row['nama_lokasi']."</td>";
                            echo "<td>".$row['tgl_mulai']."</td>";
                            echo "<td>".$row['tgl_selesai']."</td>";
                            echo "<td>".$row['status']."</td>";
                            echo "<td>".
                                "<div class='btn-group'>
                                    <a href='detailkegiatan.php?id=".$kode['kode_kegiatan']."' class='btn btn-white btn-xs'>Ubah</a>
                                    <button class='btn btn-danger btn-xs btn-del' name='hapus' value='".$kode['kode_kegiatan']."'>Hapus</button>
                                </div>"
                                ."</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                
                <?php
            }
        }

        if($_GET["data"]=="hapus_peserta"){
            $kode_peserta = $_POST["kode_peserta"];
            $query = mysqli_query($conn,"SELECT a.kode_peserta,concat(a.nama_depan,' ',a.nama_belakang)nama, a.tempat_lahir, a.tgl_lahir, b.nama_sekolah, a.alamat_peserta, b.kode_sekolah FROM tbl_peserta AS a inner join tbl_sekolah AS b on a.kode_sekolah = b.kode_sekolah") ;
            if ($query) {
                $sql = mysqli_query($conn, "DELETE FROM tbl_user WHERE user_id in (SELECT user_id FROM tbl_peserta where kode_peserta = '$kode_peserta')");
            }
            if ($sql) {
                $sql2 = mysqli_query($conn, "DELETE FROM tbl_peserta where kode_peserta = '$kode_peserta' ");
            }
        }
?>
</body>

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

    <!-- Sweet alert -->
    <script src="../js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
           $('#checkAll').click(function() {
                var c = this.checked;
                $(':checkbox').prop('checked',c);
            });
        });
    </script>
</html>
