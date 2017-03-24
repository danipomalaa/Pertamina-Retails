<?php
    include('../koneksi.php');
    $code_agent="";
    $code_user="";
    $querycode=mysqli_query($conn,"select CONCAT('Agent-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_agent");
    $querycodeuser=mysqli_query($conn,"select CONCAT('user-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))user_id");
     while ($row = mysqli_fetch_array($querycode)) {
        $code_agent=$row['kode_agent'];
     }
     while ($row2 = mysqli_fetch_array($querycodeuser)) {
        $code_user=$row2['user_id'];
     }
    if(isset($_POST['kirim'])){
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $provinsi = $_POST['provinsi'];
        $kabupaten = $_POST['kabupaten'];
        $kecamatan = $_POST['kecamatan'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $kode_lokasi = $_POST['kode_lokasi'];
        $pekerjaan = $_POST['pekerjaan'];
        $query= mysqli_query($conn,"INSERT INTO tbl_agent VALUES('$code_agent','$nama_depan','$nama_belakang','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$pekerjaan','$alamat','$provinsi','$kabupaten','$kecamatan','$telp','$email','','$kode_lokasi','$code_user')");

        if ($query) {
            $sql= mysqli_query($conn,"INSERT INTO tbl_user VALUES('$code_user','$username','$email','$password','agent','','$code_agent','','','')");
            if($sql){
                header("location:agent.php?kode=".$kode_lokasi." ");
            }
        }
    }
?>