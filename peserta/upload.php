<?php
    include('../koneksi.php');

    $kode_ijazah="";
    $kode_ktp="";
    $kode_akte="";

    $query_ijazah=mysqli_query($conn,"select CONCAT('Ijazah-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_ijazah");
    $query_ktp=mysqli_query($conn,"select CONCAT('KTP-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_ktp");
    $query_akte=mysqli_query($conn,"select CONCAT('Akte-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_akte");

    while ($row2 = mysqli_fetch_array($query_ijazah)) {
        $kode_ijazah=$row2['kode_ijazah'];
    }
    while ($row3 = mysqli_fetch_array($query_ktp)) {
        $kode_ktp=$row3['kode_ktp'];
    }
    while ($row4 = mysqli_fetch_array($query_akte)) {
        $kode_akte=$row4['kode_akte'];
    }
    
    $msg = "";
    if(isset($_POST['upload'])){
        
        $kode_peserta = $_POST['kode_peserta'];
        $user_id = $_POST['user_id'];
        $tgl_upload = $_POST['tgl_upload'];

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

        if ($_FILES['ijazah']['name'] != "") {
        	$result= mysqli_query($conn,"
            UPDATE tbl_dokumen_peserta set file_dokumen = '$ijazah', tgl_upload = '$tgl_upload' where kode_peserta = '$kode_peserta' and jenis_dokumen = 'ijazah' ");
        }
        if ($_FILES['ktp']['name'] != "") {
        	$result= mysqli_query($conn,"
            UPDATE tbl_dokumen_peserta set file_dokumen = '$ktp', tgl_upload = '$tgl_upload' where kode_peserta = '$kode_peserta' and jenis_dokumen = 'ktp' ");
        }
        if ($_FILES['akte']['name'] != "") {
        	$result= mysqli_query($conn,"
            UPDATE tbl_dokumen_peserta set file_dokumen = '$akte', tgl_upload = '$tgl_upload' where kode_peserta = '$kode_peserta' and jenis_dokumen = 'akte' ");
        }

        if ($result) {
            header('location:profile.php?id='.$user_id.'');
        }
        else{
	       	header('location:profile.php?id='.$user_id.'');
        }
    }
?>