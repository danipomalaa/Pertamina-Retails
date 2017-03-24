<?php 

include('../koneksi.php');

$id = $_POST['kode_kegiatan'];

$query = mysqli_query("DELETE from tbl_kegiatan where kode_kegiatan='$id'");

if ($query) {
	header('location:kegiatan.php');
}
?>
