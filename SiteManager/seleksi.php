<?php
    include('../koneksi.php');
    $kode_lokasi = $_GET['kode'];
    $query = mysqli_query($conn,"SELECT * FROM tbl_assessor");
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>SELEKSI</title>

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
        include 'b.php';
    ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                <h2>Seleksi</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php?kode=<?php echo $kode_lokasi ?>">Home</a>
                    </li>
                    <li class="active">
                        <strong>seleksi</strong>
                    </li>
                </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Daftar Assessor</h5>
                            <div class="ibox-tools">
                                <button class="btn btn-info btn-xs" name="btn_berkas" id="btn_berkas">Seleksi Berkas</button>
                                <button class="btn btn-info btn-xs" name="btn_wawancara" id="btn_wawancara">Wawancara</button>
                                <button class="btn btn-danger btn-xs" name="btn_batal" id="btn_batal">Batalkan</button>
                                <a href="tambah_assessor.php" class="btn btn-primary btn-xs"><i class="fa fa-plus-square"> Tambah</i></a>
                            </div>
                        </div>
                        <div class="ibox-content">
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

    <script type="text/javascript">
        $(document).ready(function () {
           $('#btn_berkas').click(function() {
                var select_kodeassessor=[];
                $('td input[type=checkbox]').each(function(){
                    if ($(this).is(":checked")) {
                        select_kodeassessor.push($(this).attr('value'));
                        berkas(this.value);
                    }
                });
                
            });

           $('#btn_wawancara').click(function() {
                var select_kodeassessor=[];
                $('td input[type=checkbox]').each(function(){
                    if ($(this).is(":checked")) {
                        select_kodeassessor.push($(this).attr('value'));
                        wawancara(this.value);
                    }
                });
                
            });

           $('#btn_batal').click(function() {
                var select_kodeassessor=[];
                $('td input[type=checkbox]').each(function(){
                    if ($(this).is(":checked")) {
                        select_kodeassessor.push($(this).attr('value'));
                        batal(this.value);
                    }
                });
                
            });

        });
    </script>

    <script type="text/javascript">
        function berkas(val){
            $.ajax({
                type:"POST",
                url:"status.php?data=berkas",
                data:"kode_assessor="+val,
                success:function(data){
                    $("#table").html(data);
                    table.ajax.reload();
                }
            });
        }

        function wawancara(val){
            $.ajax({
                type:"POST",
                url:"status.php?data=wawancara",
                data:"kode_assessor="+val,
                success:function(data){
                    $("#table").html(data);
                    table.ajax.reload();
                }
            });
        }

        function batal(val){
            $.ajax({
                type:"POST",
                url:"status.php?data=batal",
                data:"kode_assessor="+val,
                success:function(data){
                    $("#table").html(data);
                    table.ajax.reload();
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
                url:"status.php?data=hapus",
                data:"kode_assessor="+val,
                success:function(data){
                    $("#table").html(data);
                    table.ajax.reload();
                }
            });
        }
    </script>
</body>

</html>
