<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Agent</title>

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
<?php
	include '../koneksi.php';
		if($_GET["data"]=="search"){
			$search_name = $_POST["search_name"];
			$query = "SELECT a.kode_agent, b.nama_lokasi, concat(a.nama_depan,' ',a.nama_belakang)nama_agent, concat(a.tempat_lahir,', ',a.tgl_lahir)ttl, a.alamat FROM tbl_agent AS a inner join tbl_lokasi as b on a.kode_lokasi = b.kode_lokasi where concat(a.nama_depan,' ',a.nama_belakang) like '%".$search_name."%' "; 
			
			$result = mysqli_query($conn, $query);
			?>
				<table class="footable table table-stripped" data-page-size="10" id="table">
                    <thead>
                        <tr>
                            <td><b>#</b></td>
                            <td><b>Nama</b></td>
                            <td><b>Tempat tanggal lahir</b></td>
                            <td style="width:30%;"><b>Alamat</b></td>
                            <td><b>Lokasi</b></td>
                            <td style="width:150px;"></td>
                        </tr>
                    </thead>
                        <?php $i = 0;
                          while ($row = mysqli_fetch_array($result)) {
                            $i++;
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['nama_agent']."</td>";
                            echo "<td>".$row['ttl']."</td>";
                            echo "<td>".$row['alamat']."</td>";
                            echo "<td>".$row['nama_lokasi']."</td>";
                            echo "<td>".
                                "<div class='btn-group'>
                                    <a href='profilAgent.php?id=".$row['kode_agent']."' class='btn btn-white btn-xs width=60px'>View</a>
                                    <button class='btn btn-danger btn-xs btn-del' name='hapus' value='".$row['kode_agent']."'>Hapus</button>
                                </div>"
                                ."</td>";
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
</body>

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
            $.ajax({
                type:"POST",
                url:"hapus_agent.php?data=hapus",
                data:"kode_agent="+val,
                success:function(data){
                    $("#table").html(data);
                }
            });
        }
    </script>

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

    <!-- Sweet alert -->
    <script src="../js/plugins/sweetalert/sweetalert.min.js"></script>

</html>