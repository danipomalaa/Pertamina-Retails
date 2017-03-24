    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- FooTable -->
    <link href="../css/plugins/footable/footable.core.css" rel="stylesheet" />

    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />

    <!-- Sweet Alert -->
    <link href="../css/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

<?php
	include '../koneksi.php';
		if($_GET["data"]=="search"){
			$search_name = $_POST["search_name"];
			$query = "SELECT a.kode_peserta,concat(a.nama_depan,' ',a.nama_belakang)nama, a.tempat_lahir, a.tgl_lahir, b.nama_sekolah, a.alamat_peserta, b.kode_sekolah FROM tbl_peserta AS a inner join tbl_sekolah AS b on a.kode_sekolah = b.kode_sekolah where concat(a.nama_depan,' ',a.nama_belakang) like '%".$search_name."%' "; 
			
			$result = mysqli_query($conn, $query);
			?>
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
                        while ($row = mysqli_fetch_array($result)) {
                            $i++;
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['kode_peserta']."</td>";
                            echo "<td>".$row['nama']."</td>";
                            echo "<td>".$row['nama_sekolah']."</td>";
                            echo "<td>".$row['alamat_peserta']."</td>";
                            echo "<td><center><i class='fa fa-check text-navy' style='font-size:large;''></i></td>";
                            echo "<td><center><a href='formseleksi.php' class='btn btn-white'><i class='fa fa-pencil-square-o' style='color:blue;''></i></a></center></center></td>";
                            echo "<td><center><a href='wawancara.php' class='btn btn-white'><i class='fa fa-pencil-square-o' style='color:blue;''></i></a></center></td>";
                            echo "</tr>";
                        }
                            echo "</tbody>";
                            echo "<tfoot>";
                            echo "<tr>";
                            echo "<td colspan='8'>";
                            echo "<ul class='pagination pull-right'></ul>";
                            echo "</td>";
                            echo "</tr>";
                            echo "</tfoot>";
                    ?>
                </table>
			<?php
		}
?>

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
