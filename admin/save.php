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
        $kode_agent = $_POST['kode_agent'];
        $pekerjaan = $_POST['pekerjaan'];

        $sql = mysqli_query($conn,"UPDATE tbl_agent set nama_depan='$nama_depan', nama_belakang='$nama_belakang', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat', telp='$telp', pekerjaan = '$pekerjaan', email='$email' where kode_agent ='$kode_agent' ");
        
            if ($sql) {
                header('location:agent.php');
            }
            else{
                echo "ERROR";
            }
        
    }
?>