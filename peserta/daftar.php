<?php 
    include '../koneksi.php';
    $query_kabupaten = mysqli_query($conn,"SELECT * FROM tbl_kabupaten");
    $query_kecamatan = mysqli_query($conn,"SELECT * FROM tbl_kecamatan");
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/plugins/steps/jquery.steps.css" rel="stylesheet" />
    <link href="../css/animate.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <!--<link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet" />-->

    <style>

        .wizard > .content > .body { position: relative; }

    </style>

</head>
<body>
    <?php
        include 'b.php';
    ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Pendaftaran Baru</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="daftar.html">Home</a>
                    </li>
                    <li class="active">
                        <strong>Pendaftaran Baru</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Mendaftar Baru</h5>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Silahkan isi data anda dengan benar
                            </h3>
                            <form id="form" action="#" class="wizard-big">
                                <h1>Akun</h1>
                                <fieldset>
                                    <h2>Informasi Akun</h2>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input id="email" name="email" type="email" class="form-control required" />
                                            </div>
                                            <div class="form-group">
                                                <label>Username *</label>
                                                <input id="userName" name="userName" type="text" class="form-control required" />
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="password" class="form-control required" />
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input id="confirm" name="confirm" type="password" class="form-control required" />
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Profil</h1>
                                <fieldset>
                                    <h2>Data Pribadi</h2>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <label>Nama Lengkap *</label>
                                                <input id="name" name="surename" type="text" class="form-control required" />
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat/ Tanggal Lahir *</label>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input id="surename" name="ttl" type="text" class="form-control required" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input id="Text8" name="date" type="date" class="form-control required" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Asal Sekolah</label>
                                                <input id="email" name="email2" type="text" class="form-control required" />
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Alamat Domisili</label>
                                                    <input id="address" name="address" type="text" class="form-control required" />
                                                </div>
                                            
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <select class="form-control" name="provinsi" id="provinsi" onchange="getkabupaten();">
                                                            <option value="0">Pilih Provinsi</option>
                                                            <?php
                                                                $query_provinsi = mysqli_query($conn,"SELECT * FROM tbl_provinsi");
                                                                foreach ($query_provinsi as $provinsi) {
                                                            ?>
                                                                <option value="<?php echo $provinsi['kode_provinsi']; ?>"> <?php echo $provinsi['nama_provinsi']; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="kabupaten" id="kabupaten"  onchange="getkecamatan();">
                                                            <option value="0">Semua Kabupaten</option>
                                                            <?php
                                                                while ($row2= mysqli_fetch_array($query_kabupaten)) {
                                                                    echo "<option value=".$row2['kode_kabupaten'].">".$row2['nama_kabupaten']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="kecamatan" id="kecamatan">
                                                            <option value="0">Semua Kecamatan</option>
                                                            <?php
                                                                while ($row2= mysqli_fetch_array($query_kecamatan)) {
                                                                    echo "<option value=".$row2['kode_kecamatan'].">".$row2['nama_kecamatan']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Lorem Ipsum</label>
                                                <input id="Text1" name="text1" type="text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label>Lorem Ipsum</label>
                                                <input id="Text2" name="text1" type="text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label>Lorem Ipsum</label>
                                                <textarea rows="3" id="Text3" name="text1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Dokumen</h1>
                                <fieldset>
                                    <h2>Data Dokumen</h2>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <label>No. Surat Permohonan *</label>
                                                <input id="text4" name="permohonan" type="text" class="form-control required" />
                                            </div>
                                            <div class="form-group">
                                                <label>No. Ijazah *</label>
                                                <input id="Text5" name="ijazah" type="text" class="form-control required" />
                                            </div>
                                            <div class="form-group">
                                                <label>No. KTP/ Kartu Pelajar *</label>
                                                <input id="text6" name="ktp" type="text" class="form-control required" />
                                            </div>
                                            <div class="form-group">
                                                <label>No. Akta Kelahiran *</label>
                                                <input id="text7" name="akta" type="text" class="form-control required" />
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                                <h1>Lainnya</h1>
                                <fieldset>
                                    <h2>Terms and Conditions</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    </div>

            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                            
            </div>
            <div>
                <strong>Copyright</strong>
            </div>
        </div>
    </div>
</div>

    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="../js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Data picker -->
   <!--<script src="../js/plugins/datapicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
     
    <!-- Steps -->
    <script src="../js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="../js/plugins/validate/jquery.validate.min.js"></script>

    <script src="../js/plugins/datapicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex) {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3) {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex) {
                    var form = $(this);

                    // Submit form input
                    window.location.href = 'profile.html';
                }
            }).validate({
                errorPlacement: function (error, element) {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
    });
        
    </script>
    <!--<script>
        $('#data_1.input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    </script>-->

    <script type="text/javascript">

        function getkabupaten(){

            var select_kodeprovinsi = $('#provinsi').val();
            var select_kodekabupaten = $('#kabupaten').val();

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kabupaten",
                data:"kode_provinsi="+select_kodeprovinsi,
                success:function(data){
                    $("#kabupaten").html(data);
                }
            });

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kecamatan",
                data:"kode_provinsi="+select_kodeprovinsi,
                success:function(data){
                    $("#kecamatan").html(data);
                }
            });
        }

        function getkecamatan(){

            var select_kodeprovinsi = $('#provinsi').val();
            var select_kodekabupaten = $('#kabupaten').val();

            $.ajax({
                type:"POST",
                url:"getdata.php?data=kecamatan",
                data:"kode_provinsi="+select_kodeprovinsi,
                success:function(data){
                    $("#kecamatan").html(data);
                }
            });
        }

    </script>
</body>


</html>
