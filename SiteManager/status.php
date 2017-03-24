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
        if($_GET["data"]=="berkas"){
            $kode_assessor = $_POST["kode_assessor"];
            $query = mysqli_query($conn,"SELECT * FROM tbl_assessor") ;
            if ($query) {
                $sql = mysqli_query($conn, "UPDATE tbl_assessor set status = 'Seleksi Berkas' WHERE kode_assessor = '$kode_assessor'");
                echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
            }
        }

        if($_GET["data"]=="wawancara"){
            $kode_assessor = $_POST["kode_assessor"];
            $query = mysqli_query($conn,"SELECT * FROM tbl_assessor") ;
            if ($query) {
                $sql = mysqli_query($conn, "UPDATE tbl_assessor set status = 'Wawancara' WHERE kode_assessor = '$kode_assessor'");
                echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
            }
        }

        if($_GET["data"]=="batal"){
            $kode_assessor = $_POST["kode_assessor"];
            $query = mysqli_query($conn,"SELECT * FROM tbl_assessor") ;
            if ($query) {
                $sql = mysqli_query($conn, "UPDATE tbl_assessor set status = '' WHERE kode_assessor = '$kode_assessor'");
                echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
            }
        }

        if($_GET["data"]=="hapus"){
            $kode_assessor = $_POST["kode_assessor"];
            $query = mysqli_query($conn,"SELECT * FROM tbl_assessor") ;
            if ($query) {
                $sql = mysqli_query($conn, "DELETE FROM tbl_assessor WHERE kode_assessor = '$kode_assessor'");
            }
            if ($sql) {
                $delete_user = mysqli_query($conn, "DELETE FROM tbl_user WHERE kode_assessor = '$kode_assessor' ");
            }
            if ($delete_user) {
                $query = mysqli_query($conn,"SELECT * FROM tbl_assessor");
                ?>
                <table class="footable table table-stripped" data-page-size="10" id="table">
                    <tr>
                        <td><div class="i-checks"><input type="checkbox" value="" id="checkAll" name="checkAll"/></div></td>
                        <td style="display:none;"><b>kode_assessor</b></td>
                        <td><b>Nama</b></td>
                        <td><b>Tempat tanggal lahir</b></td>
                        <td width="300px"><b>Alamat</b></td>
                        <td width="200px"><b>Status</b></td>
                        <td width="150px"></td>
                    </tr>
                    <tbody>
                        <?php
                          while ($row = mysqli_fetch_array($query)) {
                            $kode = array();
                            $kode['kode_assessor']=$row['kode_assessor'];
                            
                            echo "<tr>";
                            echo "<td>"."<input id=Checkbox1 type=checkbox value='".$kode['kode_assessor']."' />"."</td>";
                            echo "<td style='display:none;' id='id_assessor'>".$row['kode_assessor']."</td>";
                            echo "<td>".$row['nama_depan'].' '.$row['nama_belakang']."</td>";
                            echo "<td>".$row['tempat_lahir'].', '.$row['tgl_lahir']."</td>";
                            echo "<td>".$row['alamat']."</td>";
                            echo "<td>".$row['status']."</td>";
                            echo "<td>".
                                "<div class='btn-group'>
                                    <a href='profile_assessor.php?id=".$kode['kode_assessor']."' class='btn btn-white btn-xs'>View</a>
                                    <button class='btn btn-danger btn-xs btn-del' name='hapus' value='".$kode['kode_assessor']."'>Hapus</button>
                                </div>"
                                ."</td>";
                            echo "</tr>";
                          }
                            echo "</tbody>";
                            echo "<tfoot>";
                            echo "<tr>";
                            echo "<td colspan='6'><ul class='pagination pull-right'></ul></td>";
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

    <script type="text/javascript">
        $(document).ready(function () {
           $('#checkAll').click(function() {
                var c = this.checked;
                $(':checkbox').prop('checked',c);
            });
        });
    </script>
</html>