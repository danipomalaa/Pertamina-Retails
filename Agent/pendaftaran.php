<?php
    include('../koneksi.php');
    $code_peserta="";
    $code_user="";
    $kode_ijazah="";
    $kode_ktp="";
    $kode_akte="";

    $query_peserta=mysqli_query($conn,"select CONCAT('Peserta-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_peserta");

    $query_ijazah=mysqli_query($conn,"select CONCAT('Ijazah-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_ijazah");
    $query_ktp=mysqli_query($conn,"select CONCAT('KTP-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_ktp");
    $query_akte=mysqli_query($conn,"select CONCAT('Akte-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_akte");

    $query_user=mysqli_query($conn,"select CONCAT('user-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))user_id");

    while ($row = mysqli_fetch_array($query_peserta)) {
        $code_peserta=$row['kode_peserta'];
    }

    while ($row2 = mysqli_fetch_array($query_ijazah)) {
        $kode_ijazah=$row2['kode_ijazah'];
    }
    while ($row3 = mysqli_fetch_array($query_ktp)) {
        $kode_ktp=$row3['kode_ktp'];
    }
    while ($row4 = mysqli_fetch_array($query_akte)) {
        $kode_akte=$row4['kode_akte'];
    }

    while ($row5 = mysqli_fetch_array($query_user)) {
        $code_user=$row5['user_id'];
    }
    
     $msg = "";
    if(isset($_POST['kirim'])){
        $lokasi = $_POST['kode_lokasi'];
        $agent = $_POST['kode_agent'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $telp = $_POST['telp'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $provinsi = $_POST['provinsi'];
        $kabupaten = $_POST['kabupaten'];
        $kecamatan = $_POST['kecamatan'];
        $sekolah = $_POST['sekolah'];
        $tgl_daftar = $_POST['tgl_daftar'];
        $no_ijazah = $_POST['no_ijazah'];
        $no_ktp = $_POST['no_ktp'];
        $no_akte = $_POST['no_akte'];
        
        $target = "../doc/".$kode_ijazah.basename($_FILES['ijazah']['name']);
        $ijazah = $kode_ijazah.$_FILES['ijazah']['name'];

        if(move_uploaded_file($_FILES['ijazah']['tmp_name'], $target)) {
            $msg = "upload success";
        }else{
            $msg = "error";
        }

        $target = "../doc/".$kode_ktp.basename($_FILES['ktp']['name']);
        $ktp = $kode_ktp.$_FILES['ktp']['name'];

        if(move_uploaded_file($_FILES['ktp']['tmp_name'], $target)) {
            $msg = "upload success";
        }else{
            $msg = "error";
        }

        $target = "../doc/".$kode_akte.basename($_FILES['akte']['name']);
        $akte = $kode_akte.$_FILES['akte']['name'];

        if(move_uploaded_file($_FILES['akte']['tmp_name'], $target)) {
            $msg = "upload success";
        }else{
            $msg = "error";
        }

        $query= mysqli_query($conn,"INSERT INTO tbl_peserta VALUES('$code_peserta','$nama_depan','$nama_belakang','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$sekolah','$alamat','$provinsi','$kabupaten','$kecamatan','$telp','$email','','$agent','$lokasi','$code_user','$tgl_daftar')");

        if ($query) {
            $sql= mysqli_query($conn,"INSERT INTO tbl_user VALUES('$code_user','$username','$email','$password','peserta','','','$code_peserta','','')");
        }
        if($sql){
            if($_FILES['ijazah']['tmp_name'] != ""){
                $result= mysqli_query($conn,"
                INSERT INTO tbl_dokumen_peserta
                    (kode_dokumen,jenis_dokumen,kode_peserta,tgl_upload,file_dokumen,no_dokumen)
                VALUES
                    ('$kode_ijazah','ijazah','$code_peserta','$tgl_daftar','$ijazah','$no_ijazah')");
                    
            }
            if($_FILES['ktp']['tmp_name'] != ""){
                $result= mysqli_query($conn,"
                INSERT INTO tbl_dokumen_peserta
                    (kode_dokumen,jenis_dokumen,kode_peserta,tgl_upload,file_dokumen,no_dokumen)
                VALUES
                    ('$kode_akte','akte','$code_peserta','$tgl_daftar','$akte','$no_akte')");
            }
            if($_FILES['akte']['tmp_name'] != ""){
                $result= mysqli_query($conn,"
                INSERT INTO tbl_dokumen_peserta
                    (kode_dokumen,jenis_dokumen,kode_peserta,tgl_upload,file_dokumen,no_dokumen)
                VALUES
                    ('$kode_ktp','ktp','$code_peserta','$tgl_daftar','$ktp','$no_ktp')");
            }
                    
            if ($_FILES['ijazah']['tmp_name'] == "") {
                $result= mysqli_query($conn,"
                INSERT INTO tbl_dokumen_peserta
                    (kode_dokumen,jenis_dokumen,kode_peserta,tgl_upload,file_dokumen,no_dokumen)
                VALUES
                    ('$kode_ijazah','ijazah','$code_peserta','$tgl_daftar','','$no_ijazah') ");
            }
            if ($_FILES['ktp']['tmp_name'] == "") {
                $result= mysqli_query($conn,"
                INSERT INTO tbl_dokumen_peserta
                    (kode_dokumen,jenis_dokumen,kode_peserta,tgl_upload,file_dokumen,no_dokumen)
                VALUES
                     ('$kode_ktp','ktp','$code_peserta','$tgl_daftar','','$no_ktp') ");
            }
            if ($_FILES['akte']['tmp_name'] == "") {
                $result= mysqli_query($conn,"
                INSERT INTO tbl_dokumen_peserta
                    (kode_dokumen,jenis_dokumen,kode_peserta,tgl_upload,file_dokumen,no_dokumen)
                VALUES
                     ('$kode_akte','akte','$code_peserta','$tgl_daftar','','$no_akte') ");
            }
        }
        if ($result) {
            header('location:peserta.php?kode='.$agent.'');
        }
    }
?>