<?php
    include '../koneksi.php';
    $kode_peserta ="";
    $query_peserta= mysqli_query($conn,"SELECT CONCAT('peserta-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_peserta");
     while ($row = mysqli_fetch_array($query_peserta)) {
        $kode_peserta = $row['kode_peserta'];
     }

    $user_id ="";
    $query_user= mysqli_query($conn,"SELECT CONCAT('user-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))user_id");
     while ($row = mysqli_fetch_array($query_user)) {
        $user_id = $row['user_id'];
     }

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telp_peserta = $_POST['telp_peserta'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $nama_sekolah = $_POST['sekolah'];
    $alamat_peserta = $_POST['alamat'];
    $kode_provinsi = $_POST['kode_provinsi'];
    $kode_kabupaten = $_POST['kode_kabupaten'];
    $kode_kecamatan = $_POST['kode_kecamatan'];

        $sql = mysqli_query($connect,"INSERT INTO tbl_peserta VALUES ('$kode_peserta', '$nama_depan', '$nama_belakang', '$jenis_kelamin', '$tempat_lahir', '$tgl_lahir', '$kode_sekolah', '$alamat_peserta', '$kode_provinsi', '$kode_kabupaten', '$kode_kecamatan', '$telp_peserta', '$email', '', '$kode_agent', '', '$user_id' )");
    }
?>