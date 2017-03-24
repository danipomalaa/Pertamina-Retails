<?php
    include('../koneksi.php');
    $id = $_GET['id'];
    $admin = mysqli_query($conn, "SELECT * FROM tbl_admin where user_id = '$id' ");
    $result = mysqli_fetch_array($admin);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Informasi</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="../css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="../css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
    <?php
        include('b.php');
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Informasi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="dashboard.php">Home</a>
                </li>
                <li class="active">
                    <strong>Informasi</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
    <div class="animated fadeInRight">
        <div class="mail-box-header">
            <div class="pull-right tooltip-demo">
                
            </div>
            <h2>
                Informasi
            </h2>
        </div>
        <div class="mail-box">

                <div class="mail-body">
                    <div class="form-horizontal">
                        <input type="text" style="display:none" id="tgl" value="<?php echo date("Y/m/d"); ?>">
                        <input type="text" style="display:none" id="user_id" value="<?php echo $id ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">To :</label>
                            <div class="col-sm-10">
                                <select class="form-control" tabindex="2" name="level_user" id="level_user" onchange="getdata();">
                                    <option value="">--Select--</option>
                                    <option value="agent">Agent</option>
                                    <option value="sitemanager">Site Manager</option>
                                    <option value="peserta">Peserta</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-sm-9">
                                <select class="form-control" name="daftar_nama" id="daftar_nama">
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-white" id="btn" name="btn" style="width:100%"><i class="fa fa-plus-square"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-sm-10">
                                <textarea id="result" name="tujuan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Create by :</label>
                            <div class="col-sm-10">
                                <input type="text" name="createby" class="form-control" value="<?php echo $result['nama_depan'].' '.$result['nama_belakang'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Topik :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="topik">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mail-text h-200">

                    <textarea class="summernote" name="isi">

                    </textarea>
                	<div class="clearfix"></div>
                </div>
                <div class="mail-body text-right tooltip-demo">
                    <button id="kirim" class="btn btn-primary btn-sm" style="width:80px;"><i class="fa fa-reply"></i> Kirim</button>
                    <a href="dashboard.php" class="btn btn-danger btn-sm" style="width:80px;"><i class="fa fa-times"></i> Cancel</a>
                </div>
                <div class="clearfix"></div>

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

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="../js/plugins/iCheck/icheck.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="../js/plugins/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


            $('.summernote').summernote();

        });
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };

    </script>

    <!-- Chosen -->
    <script src="../js/plugins/chosen/chosen.jquery.js"></script>

    <script>
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
            }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

    </script>
    <script type="text/javascript">
        function getdata(){
            var level_user = $('#level_user').val();
            //alert(level_user);
            $.ajax({
                type:"POST",
                url:"getdata.php?data=level_user",
                data:"level_user="+level_user,
                success:function(data){
                    $('#daftar_nama').html(data);
                }

            });
        }
        
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#btn').click(function(event) {
                var info = $('#daftar_nama').val();
                var tgl = $('#tgl').val();
                var user_id = $('#user_id').val();
                var topik = $('#topik').val();

                $.ajax({
                    method: "POST",
                    url: "action.php?data=nama",
                    data: "nama="+info+"&createdate="+tgl+"&createby="+user_id+"&topik="+topik,
                    success: function(status){
                        $('#result').append(status);
                        $('#daftar_nama').val('select');
                    }
                });
            });

            $('#kirim').click(function(event) {
            	var info = $('#daftar_nama').val();
                var tgl = $('#tgl').val();
                var user_id = $('#user_id').val();
                var topik = $('#topik').val();
                var isi = $('#isi').val();
                $.ajax({
                    method: "POST",
                    url: "action.php?data=kirim",
                    data: "nama="+info+"&createdate="+tgl+"&createby="+user_id+"&topik="+topik+"&isi"+isi,
                    success: function(status){
                        $('#daftar_nama').val('select');
                    }
                });
            });

        });
    </script>

</body>

</html>
