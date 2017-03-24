<?php
    include('../koneksi.php');
    $code_lokasi="";
    $query_lokasi=mysqli_query($conn,"SELECT CONCAT('Location-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_lokasi");
    while ($row = mysqli_fetch_array($query_lokasi)) {
        $code_lokasi=$row['kode_lokasi'];
    }

    $msg = "";

    if(isset($_POST['simpan'])){
        $nama_lokasi = $_POST['nama_lokasi'];
        $kode_provinsi = $_POST['provinsi'];
        $kode_kabupaten = $_POST['kabupaten'];
        $kode_kecamatan = $_POST['kecamatan'];

        $target = "img_lokasi/".$code_lokasi.basename($_FILES['image']['name']);
        $image = $code_lokasi.$_FILES['image']['name'];

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "image changed";
        }else{
            $msg = "error";
        }


        $query= mysqli_query($conn,"INSERT INTO tbl_lokasi VALUES('$code_lokasi','$nama_lokasi','$kode_provinsi','$kode_kabupaten','$image','$kode_kecamatan')");
        if ($query) {
            header('location:tambahkegiatan.php');
        }
        
    }
?>