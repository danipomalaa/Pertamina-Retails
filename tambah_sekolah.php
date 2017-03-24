<?php
    include('koneksi.php');
    $code_sekolah="";
    $query_sekolah=mysqli_query($conn,"select CONCAT('Sch-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_sekolah");
    while ($row = mysqli_fetch_array($query_sekolah)) {
        $code_sekolah=$row['kode_sekolah'];
    }
    if(isset($_POST['submit'])){
        $nama_sekolah = $_POST['nama_sekolah'];
        $alamat_sekolah = $_POST['alamat_sekolah'];
        $lokasi_sekolah = $_POST['kode_lokasi'];
        $telp = $_POST['telp_sekolah'];
        $provinsi_sekolah = $_POST['provinsi_sekolah'];
        $kabupaten_sekolah = $_POST['kabupaten_sekolah'];
        $kecamatan_sekolah = $_POST['kecamatan_sekolah'];
        
        $query= mysqli_query($conn,"INSERT INTO tbl_sekolah VALUES('$code_sekolah','$nama_sekolah','$alamat_sekolah','$provinsi_sekolah','$kabupaten_sekolah','$kecamatan_sekolah','$telp','$lokasi_sekolah')");
        if($query){
            header('location:daftar.php?id='.$lokasi_sekolah.' ');
        }
    }
?>