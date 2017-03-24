<?php
    include('../koneksi.php');
    if(isset($_POST['simpan'])){
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $pekerjaan = $_POST['pekerjaan'];
        $status = $_POST['status'];
        $kode_assessor = $_POST['kode_assessor'];

        $sql = mysqli_query($conn,"UPDATE tbl_assessor set nama_depan='$nama_depan', nama_belakang='$nama_belakang', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat', telp='$telp', email='$email', pekerjaan = '$pekerjaan', status = '$status' where kode_assessor ='$kode_assessor' ");
        
            if ($sql) {
                header('location:seleksi.php');
            }
            else{
                echo "ERROR";
            }
        
    }
?>