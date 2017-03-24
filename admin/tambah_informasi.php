<?php
	include '../koneksi.php';
	$kode = "";
    $query_pesan=mysqli_query($conn,"select CONCAT('Info-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_topik");
    while ($row = mysqli_fetch_array($query_pesan)) {
        $kode=$row['kode_topik'];
    }
	if (isset($_POST['kirim'])) {
		$topik	= $_POST['topik'];
		$date	= $_POST['tgl'];

		$query 	= mysqli_query($conn, "INSERT INTO tbl_pesan values ('$kode','$topik','','','$date','','')");

		if ($query) {
			echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
		}
	}
?>