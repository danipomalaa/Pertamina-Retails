<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- FooTable -->
    <link href="../css/plugins/footable/footable.core.css" rel="stylesheet" />

    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

</head>

<body>

<?php
	include '../koneksi.php';
		if($_GET["data"]=="search"){
			$search_name = $_POST["search_name"];
            $kode_agent = $_POST["kode_agent"];
            $query_peserta = "SELECT a.kode_peserta,concat(a.nama_depan,' ',a.nama_belakang)nama, concat(a.tempat_lahir,', ',a.tgl_lahir)ttl, b.nama_sekolah, a.alamat_peserta, b.kode_sekolah FROM tbl_peserta AS a inner join tbl_sekolah AS b on a.kode_sekolah = b.kode_sekolah WHERE a.kode_agent = '$kode_agent' AND concat(a.nama_depan,' ',a.nama_belakang) like '%".$search_name."%' ";

			$result = mysqli_query($conn, $query_peserta);
			?>
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
                        <?php $i = 0;
                          while ($row = mysqli_fetch_array($result)) {
                            $i++;
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['nama']."</td>";
                            echo "<td>".$row['ttl']."</td>";
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
			<?php
		}
?>

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

</body>

</html>
