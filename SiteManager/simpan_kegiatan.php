<?php
    include('../koneksi.php');
    if(isset($_POST['save'])){
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $tgl_selesai = $_POST['tgl_selesai'];
        $target_peserta = $_POST['target_peserta'];
        $tgl_pendaftaran = $_POST['tgl_pendaftaran'];
        $tgl_penutupan = $_POST['tgl_penutupan'];
        $tgl_seleksiberkas = $_POST['tgl_seleksiberkas'];
        $tgl_wawancara = $_POST['tgl_wawancara'];
        $kode_kegiatan = $_POST['kode_kegiatan'];
        $lokasi = $_POST['lokasi'];

        $query= mysqli_query($conn,"UPDATE tbl_kegiatan SET nama_kegiatan='$nama_kegiatan', tgl_mulai='$tgl_mulai', tgl_selesai='$tgl_selesai', target_peserta='$target_peserta', tgl_pendaftaran='$tgl_pendaftaran', tgl_penutupan='$tgl_penutupan', tgl_seleksiberkas='$tgl_seleksiberkas', tgl_wawancara='$tgl_wawancara' WHERE kode_kegiatan='$kode_kegiatan' ");

        if ($query) {
            header("location:kegiatan.php?kode=".$lokasi." ");
        }
    }
?>