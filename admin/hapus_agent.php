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
	include '../koneksi.php';
	if($_GET["data"]=="hapus"){
        $kode_agent = $_POST["kode_agent"];
        $query = mysqli_query($conn,"SELECT * FROM tbl_agent") ;
        if ($query) {
            $sql = mysqli_query($conn, "DELETE FROM tbl_agent WHERE kode_agent = '$kode_agent'");
            //echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
        }
        if ($sql) {
        	$sql2 = mysqli_query($conn, "DELETE FROM tbl_user WHERE kode_agent = '$kode_agent'");
        }
        if ($sql2) {
            $query_agent = mysqli_query($conn,"SELECT * FROM tbl_agent") ;
            ?>
                <table class="footable table table-stripped" data-page-size="10" id="table">
                    <thead>
                        <tr>
                            <td><b>#</b></td>
                            <td><b>Nama</b></td>
                            <td><b>Tempat tanggal lahir</b></td>
                            <td style="width:40%;"><b>Alamat</b></td>
                            <td style="width:150px;"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                            while ($row = mysqli_fetch_array($query_agent)) {
                                $i++;
                                echo "<tr>";
                                echo "<td>".$i."</td>";
                                echo "<td>".$row['nama_depan'].' '.$row['nama_belakang']."</td>";
                                echo "<td>".$row['tempat_lahir'].', '.$row['tgl_lahir']."</td>";
                                echo "<td>".$row['alamat']."</td>";
                                echo "<td>".
                                    "<div class='btn-group'>
                                        <a href='profilAgent.php?id=".$row['kode_agent']."' class='btn btn-white btn-xs width=60px'>View</a>
                                        <button class='btn btn-danger btn-xs btn-del' name='hapus' value='".$row['kode_agent']."'>Hapus</button>
                                    </div>"
                                    ."</td>";
                                echo "</tr>";
                              }
                                echo "</tbody>";
                                echo "<tfoot>";
                                echo "<tr>";
                                echo "<td colspan='5'><ul class='pagination pull-right'></ul></td>";
                                echo "</tr>";
                                echo "</tfoot>";
                            ?>
                </table>
            <?php
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
</html>