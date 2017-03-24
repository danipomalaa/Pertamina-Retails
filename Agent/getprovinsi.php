<?php
	include_once "../koneksi.php";
	if($_GET["data"]=="provinsi"){
		$kode_provinsi = $_POST["kode_provinsi"];
		$query = "SELECT * FROM tbl_kabupaten ";
		if($kode_provinsi !="0")
		{
			$query = $query." WHERE kode_provinsi='$kode_provinsi'";
		}
		$result = mysqli_query($conn, $query);
		?>
			<option value="0">Semua Kabupaten</option>
		<?php
			foreach ($result as $kabupaten) {
			?>
			<option value="<?php echo $kabupaten['kode_kabupaten'] ?>"> <?php echo $kabupaten['nama_kabupaten']; ?> </option>
		<?php
		}		
	}
?>