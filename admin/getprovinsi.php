<?php
	include_once "../koneksi.php";
	if($_GET["data"]=="kabupaten"){
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
	if($_GET["data"]=="kecamatan"){
			$kode_provinsi = $_POST["kode_provinsi"];
			$query2 = "SELECT * FROM tbl_kecamatan";
			if($kode_provinsi !="0")
			{
				$query2 = $query2." WHERE kode_provinsi='$kode_provinsi'";
			}
			$result2 = mysqli_query($conn, $query2);
			?>
			<option value="0">Semua Kecamatan</option>
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
			<option value="0">Semua Kecamatan</option>
			<?php
			foreach ($result2 as $kecamatan) {
			?>
				
				<option value="<?php echo $kecamatan['kode_kecamatan'] ?>"> <?php echo $kecamatan['nama_kecamatan'] ;?> </option>
			<?php
			}	
	}
?>