<?php
    include('../koneksi.php');
    $code_assessor="";
    $code_user="";
    $query_assessor=mysqli_query($conn,"select CONCAT('assessor-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_assessor");
    $querycodeuser=mysqli_query($conn,"select CONCAT('user-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))user_id");
     while ($row = mysqli_fetch_array($query_assessor)) {
        $code_assessor=$row['kode_assessor'];
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
        $kode_provinsi = $_POST['provinsi'];
        $kode_kabupaten = $_POST['kabupaten'];
        $kode_kecamatan = $_POST['kecamatan'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $pekerjaan = $_POST['pekerjaan'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $query= mysqli_query($conn,"INSERT INTO tbl_assessor VALUES('$code_assessor','$nama_depan','$nama_belakang','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$pekerjaan','$alamat','$kode_provinsi','$kode_kabupaten','$kode_kecamatan','$telp','$email','','$code_user','')");

        if ($query) {
            $sql= mysqli_query($conn,"INSERT INTO tbl_user VALUES('$code_user','$username','$email','$password','assessor','','','','','$code_assessor')");
            if($sql){
                header('location:seleksi.php');
            }
        }
    }
?>