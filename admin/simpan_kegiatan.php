<?php
    include('../koneksi.php');
    if(isset($_POST['save'])){
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $tgl_selesai = $_POST['tgl_selesai'];
        $lokasi = $_POST['lokasi'];
        $target_peserta = $_POST['target_peserta'];
        $tgl_pendaftaran = $_POST['tgl_pendaftaran'];
        $tgl_penutupan = $_POST['tgl_penutupan'];
        $tgl_seleksiberkas = $_POST['tgl_seleksiberkas'];
        $tgl_wawancara = $_POST['tgl_wawancara'];
        $kode_kegiatan = $_POST['kode_kegiatan'];
        $kode_lokasi = $_POST['kode_lokasi'];

        $query= mysqli_query($conn,"UPDATE tbl_kegiatan SET nama_kegiatan='$nama_kegiatan', tgl_mulai='$tgl_mulai', tgl_selesai='$tgl_selesai', kode_lokasi='$lokasi', target_peserta='$target_peserta', tgl_pendaftaran='$tgl_pendaftaran', tgl_penutupan='$tgl_penutupan', tgl_seleksiberkas='$tgl_seleksiberkas', tgl_wawancara='$tgl_wawancara' WHERE kode_kegiatan='$kode_kegiatan' ");

        if ($query) {
            //$sql= mysqli_query($conn,"UPDATE tbl_lokasi SET nama_lokasi='$lokasi' WHERE kode_lokasi = '$kode_lokasi' ");
            //if($sql){
                header('location:kegiatan.php');
            //}
        }
    }
?>