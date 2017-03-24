<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
	include_once "../koneksi.php";
	if($_GET["data"]=="agent"){
		
			$kode_lokasi = $_POST["kode_lokasi"];
			$query = "SELECT * FROM tbl_agent ";
			if($kode_lokasi !="0")
			{
				$query = $query." WHERE kode_lokasi='$kode_lokasi'";
			}
			$result = mysqli_query($conn, $query);
			?>
				<option value="0">Semua agent</option>
			<?php
				foreach ($result as $agent) {
				?>
				
				<option value="<?php echo $agent['kode_agent'] ?>"> <?php echo $agent['nama_depan'].' '.$agent['nama_belakang'] ;?> </option>
			<?php
			}

		
	}
	if($_GET["data"]=="sekolah"){
			$kode_lokasi = $_POST["kode_lokasi"];
			$query2 = "SELECT * FROM tbl_sekolah";
			if($kode_lokasi !="0")
			{
				$query2 = $query2." WHERE kode_lokasi='$kode_lokasi'";
			}
			$result2 = mysqli_query($conn, $query2);
			?>
			<option value="0">Semua sekolah</option>
			<?php
			foreach ($result2 as $sekolah) {
			?>
				
				<option value="<?php echo $sekolah['kode_sekolah'] ?>"> <?php echo $sekolah['nama_sekolah'] ;?> </option>
			<?php
			}	
	}
	if($_GET["data"]=="kabupaten"){
		
			$kode_provinsi = $_POST["kode_provinsi"];
			$query = "SELECT * FROM tbl_kabupaten ";
			if($kode_provinsi !="0")
			{
				$query = $query." WHERE kode_provinsi='$kode_provinsi'";
			}
			$result = mysqli_query($conn, $query);
			?>
				<option value="0">Kabupaten</option>
			<?php
				foreach ($result as $kabupaten) {
				?>
				
				<option value="<?php echo $kabupaten['kode_kabupaten'] ?>"> <?php echo $kabupaten['nama_kabupaten'] ?> </option>
			<?php
			}

		
	}
	if($_GET["data"]=="kecamatan"){
			$kode_provinsi = $_POST["kode_provinsi"];
			$query2 = "SELECT * FROM tbl_kecamatan";
			if($kode_provinsi !="0")
			{
				$query2 = $query2." WHERE kode_provinsi='$kode_provinsi'";
			}
			$result2 = mysqli_query($conn, $query2);
			?>
			<option value="0">Kecamatan</option>
			<?php
			foreach ($result2 as $kecamatan) {
			?>
				
				<option value="<?php echo $kecamatan['kode_kecamatan'] ?>"> <?php echo $kecamatan['nama_kecamatan'] ;?> </option>
			<?php
			}	
	}
	if($_GET["data"]=="kecamatan2"){
			$kode_kabupaten = $_POST["kode_kabupaten"];
			$query2 = "SELECT * FROM tbl_kecamatan";
			if($kode_kabupaten !="0")
			{
				$query2 = $query2." WHERE kode_kabupaten='$kode_kabupaten'";
			}
			$result2 = mysqli_query($conn, $query2);
			?>
			<option value="0">Kecamatan</option>
			<?php
			foreach ($result2 as $kecamatan) {
			?>
				
				<option value="<?php echo $kecamatan['kode_kecamatan'] ?>"> <?php echo $kecamatan['nama_kecamatan'] ;?> </option>
			<?php
			}	
	}
	if($_GET["data"]=="level_user"){
		$level_user = $_POST['level_user'];
		if ($level_user != "" and $_POST['level_user']=='peserta') {
			$query = "SELECT * FROM tbl_peserta";
			$result2 = mysqli_query($conn, $query);
			?>
			<option value="">--Peserta--</option>
			<?php
			foreach ($result2 as $peserta) {
			?>
				
				<option value="<?php echo $peserta['kode_peserta'] ?>"> <?php echo $peserta['nama_depan'].' '.$peserta['nama_belakang'] ;?> </option>
			<?php
			}	
		}
		if ($level_user != "" and $_POST['level_user']=='agent') {
			$query = "SELECT * FROM tbl_agent";
			$result2 = mysqli_query($conn, $query);
			?>
			<option value="">--Agent--</option>
			<?php
			foreach ($result2 as $agent) {
			?>
				
				<option value="<?php echo $agent['kode_agent'] ?>"> <?php echo $agent['nama_depan'].' '.$agent['nama_belakang'] ;?> </option>
			<?php
			}	
		}
		if ($level_user != "" and $_POST['level_user']=='sitemanager') {
			$query = "SELECT * FROM tbl_sitemanager";
			$result2 = mysqli_query($conn, $query);
			?>
			<option value="">--Site Manager--</option>
			<?php
			foreach ($result2 as $sitemanager) {
			?>
				
				<option value="<?php echo $sitemanager['kode_manager'] ?>"> <?php echo $sitemanager['nama_depan'].' '.$sitemanager['nama_belakang'] ;?> </option>
			<?php
			}	
		}
		
			
	}

	if($_GET["data"]=="search"){
			$kode_lokasi = $_POST["kode_lokasi"];
			$kode_agent = $_POST["kode_agent"];
			$kode_sekolah = $_POST["kode_sekolah"];
			$search_name = $_POST["search_name"];

			$query = "SELECT a.kode_peserta, concat(a.nama_depan,' ',a.nama_belakang)nama_peserta, concat(a.tempat_lahir,', ',a.tgl_lahir)ttl, b.nama_sekolah, a.alamat_peserta, a.user_id FROM tbl_peserta AS a left outer join tbl_sekolah AS b on a.kode_sekolah = b.kode_sekolah where a.kode_lokasi = '".$kode_lokasi."'"; 
			if($kode_agent != "0"){
				$query = $query." and a.kode_agent='".$kode_agent."'";
			}
			if($kode_sekolah != "0"){
				$query = $query." and a.kode_sekolah='".$kode_sekolah."'";
			}
			if($search_name != ""){
				$query = $query." and concat(a.nama_depan,' ',a.nama_belakang) LIKE '%".$search_name."%'";
			}
			$result = mysqli_query($conn, $query);
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
			<?php
				echo "<tbody>";
				$i = 0;
              	while ($row = mysqli_fetch_array($result)) {
	                $i++;
	                echo "<tr>";
	                echo "<td>".$i."</td>";
	                echo "<td id='user_id' style='display:none'>".$row['user_id']."</td>";
	                echo "<td>".$row['nama_peserta']."</td>";
	                echo "<td>".$row['ttl']."</td>";
	                echo "<td>".$row['nama_sekolah']."</td>";
	                echo "<td>".$row['alamat_peserta']."</td>";
	                echo "<td><div class='btn-group'>"."<a href='profilPeserta.php?id=".$row['kode_peserta']."' class='btn btn-white btn-xs'>View</a>
	                			<button class='btn btn-danger btn-xs btn-del' name='hapus' value='".$row['kode_peserta']."'>Hapus</button>"."</div></td>";
	                echo "</tr>";
	            }
             	echo "</tbody>";
	}

?>
				<tfoot>
	                <tr>
	                    <td colspan="7">
	                        <ul class="pagination pull-right"></ul>
	                    </td>
	                </tr>
                </tfoot>
			</table>
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

    	function hapus(val){
            $.ajax({
                type:"POST",
                url:"persetujuan.php?data=hapus_peserta",
                data:"kode_peserta="+val,
                success:function(data){
                    $("#table").html(data);
                    table.ajax.reload();
                }
            });
        }
</script>

    <!-- Sweet alert -->
    <script src="../js/plugins/sweetalert/sweetalert.min.js"></script>
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

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });
    </script>

</body>
</html>
