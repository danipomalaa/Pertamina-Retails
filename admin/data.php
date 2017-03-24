<?php
	require_once '../koneksi.php';

	$sql = mysqli_query($conn, "SELECT DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS tgl_daftar,count(*)jumlah_pendaftar FROM `tbl_peserta` group by tgl_daftar");
	$cek = mysqli_num_rows($sql);
	if ($cek > 0) {
		$data = array();
		foreach ($sql as $row) {
			$data[] = $row;
		}
		print json_encode($data);
	}
?>
