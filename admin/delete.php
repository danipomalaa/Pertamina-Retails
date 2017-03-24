<?php 
include('../koneksi.php');
if(isset($_POST['hapus'])){
	$kode_kegiatan = $_GET['id'];
	$query = mysqli_query($conn, "DELETE FROM tbl_kegiatan where kode_kegiatan='$kode_kegiatan' ");
	if ($query) {
		header('location:kegiatan.php');
	}
	else{
		echo "ERROR";
	}
}

?>
