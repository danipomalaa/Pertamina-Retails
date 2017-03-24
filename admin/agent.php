<?php
    include('../koneksi.php');
    $query = mysqli_query($conn,"SELECT * FROM tbl_agent as a inner join tbl_lokasi as b on a.kode_lokasi = b.kode_lokasi");
?>

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

<div id="wrapper">
    <?php
        include('b.php');
    ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Agent</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Agent</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Data Agent</h5>
                            <div class="ibox-tools">
                                <a href="tambahAgent.php" class="btn btn-primary btn-xs"><span class="fa fa-plus-square"> </span> Tambah Agent</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group"><input type="text" class="form-control" id="txt_search" placeholder="Search by name"  />
                                        <span class="input-group-btn"><button type="button" class="btn btn-primary" onclick="search();" ><i class="fa fa-search"></i></button> </span>
                                    </div>
                                </div>
                            </div><br />
                            <table class="footable table table-stripped" data-page-size="10" id="table" style="border-top:none">
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
                                <tbody>
                                    <?php $i = 0;
                                      while ($row = mysqli_fetch_array($query)) {
                                        $i++;
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$row['nama_depan'].' '.$row['nama_belakang']."</td>";
                                        echo "<td>".$row['tempat_lahir'].', '.$row['tgl_lahir']."</td>";
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

    <!-- Sweet alert -->
    <script src="../js/plugins/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
        function search(){
            var search_name = $('#txt_search').val();
            $.ajax({
                type:"POST",
                url:"search_agent.php?data=search",
                data:"search_name="+search_name,
                success:function(data){
                    $("#table").html(data);
                }
            });
        }
    </script>
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

</body>

</html>
