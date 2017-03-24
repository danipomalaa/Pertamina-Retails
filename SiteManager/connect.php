<?php
    include('../koneksi.php');
    $code_kegiatan="";
    $code_lokasi="";
    $query_kegiatan=mysqli_query($conn,"select CONCAT('Event-',YEAR(NOW()),MONTH(NOW()),DAY(NOW()),HOUR(NOW()),MINUTE(NOW()),SECOND(NOW()))kode_kegiatan");
    while ($row = mysqli_fetch_array($query_kegiatan)) {
        $code_kegiatan=$row['kode_kegiatan'];
    }

    if(isset($_POST['simpan'])){
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $tgl_selesai = $_POST['tgl_selesai'];
        $lokasi = $_POST['lokasi'];
        $target_peserta = $_POST['target_peserta'];
        $tgl_pendaftaran = $_POST['tgl_pendaftaran'];
        $tgl_penutupan = $_POST['tgl_penutupan'];
        $tgl_seleksiberkas = $_POST['tgl_seleksiberkas'];
        $tgl_wawancara = $_POST['tgl_wawancara'];
        $query= mysqli_query($conn,"INSERT INTO tbl_kegiatan VALUES('$code_kegiatan','$nama_kegiatan','$tgl_mulai','$tgl_selesai','$lokasi','$target_peserta','$tgl_pendaftaran','$tgl_penutupan','$tgl_seleksiberkas','$tgl_wawancara','')");
        if ($query) {
            header("location:kegiatan.php?kode=".$lokasi." ");
        }
        
    }
?>