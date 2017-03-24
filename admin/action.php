<?php
	include '../koneksi.php';
	$kode = "";
    $query_pesan=mysqli_query($conn,"select CONCAT('Info-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_topik");
    while ($row = mysqli_fetch_array($query_pesan)) {
        $kode=$row['kode_topik'];
    }

	if ($_GET['data']=="nama") {
		$nama = $_POST['nama'];
		if ($nama != "") {
			echo $nama.', ';

			$createdate = $_POST['createdate'];
			$createby = $_POST['createby'];
			$topik = $_POST['topik'];

		    $query = mysqli_query($conn, "INSERT INTO tbl_tujuan_pesan VALUES ('$kode','$nama') ");
		    if ($query) {
		    	$sql = mysqli_query($conn, "INSERT INTO tbl_pesan VALUES ('$kode','$topik','','$nama','$createdate','$createby','tersimpan')");
		    }
		}
	}

?>