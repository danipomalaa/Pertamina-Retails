-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 03:31 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pertamina_retails`
--
CREATE DATABASE IF NOT EXISTS `db_pertamina_retails` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_pertamina_retails`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `kode_admin` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `alamat` varchar(250) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kode_admin`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `alamat`, `telp`, `email`, `image`, `user_id`) VALUES
('001', 'Admin', '', 'perempuan', 'New York', '2000-02-27', 'vdb', 'vnkjf', '(888) 888-8888', 'admin@gmail.com', '0011f53c11b39f91ee8d8d404103661b463.jpg', '001'),
('002', 'Kenan', 'Artawijaya', 'laki-laki', 'German', '2000-02-01', 'pegusaha', 'jakarta', '(666) 666-6666', 'kenan@gmail.com', '', '002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

DROP TABLE IF EXISTS `tbl_agent`;
CREATE TABLE IF NOT EXISTS `tbl_agent` (
  `kode_agent` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `alamat` varchar(250) NOT NULL,
  `kode_provinsi` varchar(50) DEFAULT NULL,
  `kode_kabupaten` varchar(50) DEFAULT NULL,
  `kode_kecamatan` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kode_lokasi` varchar(50) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`kode_agent`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `alamat`, `kode_provinsi`, `kode_kabupaten`, `kode_kecamatan`, `telp`, `email`, `foto`, `kode_lokasi`, `user_id`) VALUES
('Agent-2017221141627', 'alfira', 'rahmalia', 'perempuan', 'jakarta', '2000-03-03', 'karyawan swasta', 'vip', '', '', '', '(666) 666-6666', 'alfira@gmail.com', '', '001', 'user-2017221141627'),
('Agent-201722114539', 'fuji', 'agustin', 'perempuan', 'bekasi', '2000-10-06', 'pns', 'wisma asri II', '', '', '', '(777) 777-7777', 'fujiagustin@gmail.com', '../img/nab.jpg', '001', 'user-201722114539'),
('Agent-20172221578', 'agent', '', 'perempuan', 'bekasi', '2000-04-29', 'guru', 'villa gading harapan', '', '', '', '(777) 777-7777', 'agent@gmail.com', 'Agent-20172221578349e4301ab450c32b16a18c733c401b8.jpg', '001', 'user-20172221578'),
('Agent-2017311101139', 'p', 'p', 'perempuan', 'p', '2017-01-06', 'p', 'p', '008', '001', '001', '(999) 999-9999', 'p@gmail.com', '', 'Location-20173211938', 'user-2017311101139'),
('Agent-20173111069', 'd', 'd', 'perempuan', 'f', '2017-02-25', 'vvd', 'scs', '008', '001', '001', '(333) 333-3333', 'a@gmail.com', '', '', 'user-201731110610'),
('Agent-20173515222', 'ishani', '', 'perempuan', 'india', '2017-03-07', 'pns', 'kvnfjdb', '008', '001', '003', '(999) 999-9999', 'ishani@gmail.com', '', 'Location-20173211955', 'user-20173515222'),
('Agent-201736204724', 'agent', 'bali', 'perempuan', 'bali', '2017-03-01', 'guru', 'bali', '013', '013', '0', '(111) 111-1111', 'elina@gmail.com', 'Agent-2017362047244e62ff96fe3a68e6401a55786b0895b3.jpg', 'Location-20173211717', 'user-201736204725'),
('Agent-2017362047245', 'erika', '', 'perempuan', 'bali', '2017-03-03', 'guru', 'bali', '013', '013', '0', '(111) 111-1111', 'elina@gmail.com', 'Agent-2017362047244e62ff96fe3a68e6401a55786b0895b3.jpg', 'Location-20173211717', 'user-201736204725');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessor`
--

DROP TABLE IF EXISTS `tbl_assessor`;
CREATE TABLE IF NOT EXISTS `tbl_assessor` (
  `kode_assessor` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_provinsi` varchar(50) DEFAULT NULL,
  `kode_kabupaten` varchar(50) DEFAULT NULL,
  `kode_kecamatan` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_assessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessor`
--

INSERT INTO `tbl_assessor` (`kode_assessor`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `alamat`, `kode_provinsi`, `kode_kabupaten`, `kode_kecamatan`, `telp`, `email`, `foto`, `user_id`, `status`) VALUES
('001', 'Assessor', '', 'laki-laki', 'bekasi', '1996-02-07', 'pns', 'jakarta', '008', '001', '001', '(666) 666-6666', 'assessor@gmail.com', '001c0670bdca2f165db3aa4f44cd11d6336.jpg', '090', 'Seleksi Berkas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessor_bertugas`
--

DROP TABLE IF EXISTS `tbl_assessor_bertugas`;
CREATE TABLE IF NOT EXISTS `tbl_assessor_bertugas` (
  `kode_assessor` varchar(50) NOT NULL,
  `kode_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balasan_pesan`
--

DROP TABLE IF EXISTS `tbl_balasan_pesan`;
CREATE TABLE IF NOT EXISTS `tbl_balasan_pesan` (
  `kode_topik` varchar(50) NOT NULL,
  `balasan` varchar(250) NOT NULL,
  `reply_date` date NOT NULL,
  `reply_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen_peserta`
--

DROP TABLE IF EXISTS `tbl_dokumen_peserta`;
CREATE TABLE IF NOT EXISTS `tbl_dokumen_peserta` (
  `kode_dokumen` varchar(50) NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL,
  `kode_peserta` varchar(50) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file_dokumen` varchar(255) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokumen_peserta`
--

INSERT INTO `tbl_dokumen_peserta` (`kode_dokumen`, `jenis_dokumen`, `kode_peserta`, `tgl_upload`, `file_dokumen`, `no_dokumen`) VALUES
('Akte-2017316141233', 'akte', 'Peserta-2017316141233', '2017-03-16', '', '90909090'),
('Akte-2017316142336', 'akte', 'Peserta-2017316142336', '2017-03-16', '', '212121'),
('Akte-20173794049', 'akte', 'Peserta-20173794049', '2017-03-10', 'Akte-201731085523agama.docx', '7'),
('Akte-201739131612', 'akte', 'Peserta-201739131612', '2017-03-09', '', '6'),
('Ijazah-2017316141233', 'ijazah', 'Peserta-2017316141233', '2017-03-16', 'Ijazah-2017316141535agama.docx', '90909090'),
('Ijazah-2017316142336', 'ijazah', 'Peserta-2017316142336', '2017-03-16', '', '212121'),
('Ijazah-20173794049', 'ijazah', 'Peserta-20173794049', '2017-03-07', 'Ijazah-20173794535kelompok 2.docx', '7'),
('Ijazah-201739131612', 'ijazah', 'Peserta-201739131612', '2017-03-09', '', '6'),
('KTP-2017316141233', 'ktp', 'Peserta-2017316141233', '2017-03-16', '', '90909090'),
('KTP-2017316142336', 'ktp', 'Peserta-2017316142336', '2017-03-16', '', '212121'),
('KTP-20173794049', 'ktp', 'Peserta-20173794049', '2017-03-07', 'KTP-20173795636makalah kelompok 6.docx', '7'),
('KTP-201739131612', 'ktp', 'Peserta-201739131612', '2017-03-09', '', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kabupaten`
--

DROP TABLE IF EXISTS `tbl_kabupaten`;
CREATE TABLE IF NOT EXISTS `tbl_kabupaten` (
  `kode_kabupaten` varchar(50) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL,
  `kode_provinsi` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kabupaten`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kabupaten`
--

INSERT INTO `tbl_kabupaten` (`kode_kabupaten`, `nama_kabupaten`, `kode_provinsi`) VALUES
('001', 'Bekasi', '008'),
('002', 'Aceh Barat', '001'),
('003', 'Asahan', '002'),
('004', 'Padang Pariaman', '003'),
('005', 'Bengkalis', '004'),
('006', 'Kerinci', '005'),
('007', 'Bengkulu Selatan', '006'),
('008', 'Tangerang', '007'),
('009', 'Kabupaten Administrasi Kepulauan Seribu', '009'),
('010', 'Brebes', '010'),
('011', 'Banyuwangi', '011'),
('012', 'Bantul', '012'),
('013', 'Buleleng', '013'),
('014', 'Lombok Barat', '014'),
('015', 'Alor', '015'),
('016', 'Ketapang', '016'),
('017', 'Bogor', '008');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

DROP TABLE IF EXISTS `tbl_kecamatan`;
CREATE TABLE IF NOT EXISTS `tbl_kecamatan` (
  `kode_kecamatan` varchar(50) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `kode_provinsi` varchar(50) NOT NULL,
  `kode_kabupaten` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`kode_kecamatan`, `nama_kecamatan`, `kode_provinsi`, `kode_kabupaten`) VALUES
('001', 'Bantar Gebang', '008', '001'),
('002', 'Bekasi Barat', '008', '001'),
('003', 'Bekasi Selatan', '008', '001'),
('004', 'Bekasi Timur', '008', '001'),
('005', 'Bekasi Utara', '008', '001'),
('006', 'Cibinong', '008', '017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

DROP TABLE IF EXISTS `tbl_kegiatan`;
CREATE TABLE IF NOT EXISTS `tbl_kegiatan` (
  `kode_kegiatan` varchar(50) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kode_lokasi` varchar(50) NOT NULL,
  `target_peserta` varchar(50) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `tgl_penutupan` date NOT NULL,
  `tgl_seleksiberkas` date NOT NULL,
  `tgl_wawancara` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kegiatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`kode_kegiatan`, `nama_kegiatan`, `tgl_mulai`, `tgl_selesai`, `kode_lokasi`, `target_peserta`, `tgl_pendaftaran`, `tgl_penutupan`, `tgl_seleksiberkas`, `tgl_wawancara`, `status`) VALUES
('Event-2017311105415', 'l', '2017-02-27', '2017-02-27', '001', '90', '2017-02-27', '2017-02-27', '2017-02-27', '2017-02-27', ''),
('Event-201739103147', 'u', '2017-03-09', '2017-03-21', 'Location-20173211928', '3', '2017-03-20', '2017-03-21', '2017-03-14', '2017-03-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lampiran`
--

DROP TABLE IF EXISTS `tbl_lampiran`;
CREATE TABLE IF NOT EXISTS `tbl_lampiran` (
  `kode_lampiran` varchar(50) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_lampiran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

DROP TABLE IF EXISTS `tbl_log`;
CREATE TABLE IF NOT EXISTS `tbl_log` (
  `log_id` varchar(50) NOT NULL,
  `log_event` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

DROP TABLE IF EXISTS `tbl_lokasi`;
CREATE TABLE IF NOT EXISTS `tbl_lokasi` (
  `kode_lokasi` varchar(50) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `kode_provinsi` varchar(50) NOT NULL,
  `kode_kabupaten` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kode_kecamatan` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`kode_lokasi`, `nama_lokasi`, `kode_provinsi`, `kode_kabupaten`, `gambar`, `kode_kecamatan`) VALUES
('001', 'Bekasi', '008', '001', 'bekasi.jpg', ''),
('Location-201722417027', 'Lampung', '008', '001', 'lampung.png', ''),
('Location-20173115131', 'Lamongan', '008', '017', 'lamongan.png', ''),
('Location-201732111011', 'Karawang', '008', '0', 'karawang.png', ''),
('Location-20173211103', 'Jambi', '005', '0', 'jambi.png', ''),
('Location-201732111758', 'Papua', '0', '0', 'papua.png', ''),
('Location-201732111832', 'Riau', '004', '0', 'riau.png', ''),
('Location-201732111839', 'Semarang', '0', '0', 'semarang.png', ''),
('Location-201732111843', 'Sragen', '0', '0', 'sragen.png', ''),
('Location-201732111933', 'Sumatera Barat', '0', '0', 'sumatera_barat.png', ''),
('Location-201732111943', 'Sumatera Selatan', '0', '0', 'sumatera_selatan.png', ''),
('Location-20173211655', 'Banda Aceh', '001', '', 'banda_aceh.png', ''),
('Location-20173211717', 'Bali', '013', '013', 'bali.png', ''),
('Location-20173211754', 'Bandung', '008', '0', 'bandung.png', ''),
('Location-20173211815', 'Bangka Belitung', '0', '0', 'bangka_belitung.png', ''),
('Location-20173211837', 'Banten', '007', '0', 'banten.png', ''),
('Location-20173211848', 'Bengkulu', '006', '0', 'bengkulu.png', ''),
('Location-20173211928', 'Brebes', '010', '010', 'brebes.png', ''),
('Location-20173211938', 'Depok', '008', '0', 'depok.png', ''),
('Location-20173211955', 'Jakarta', '009', '0', 'jakarta.png', ''),
('Location-2017321197', 'Bogor', '008', '017', 'bogor.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

DROP TABLE IF EXISTS `tbl_pesan`;
CREATE TABLE IF NOT EXISTS `tbl_pesan` (
  `kode_topik` varchar(50) NOT NULL,
  `topik` varchar(50) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `createdate` date NOT NULL,
  `createby` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_topik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`kode_topik`, `topik`, `isi`, `tujuan`, `createdate`, `createby`, `status`) VALUES
('Info-2017316161735', '', '', 'Agent-201722114539', '2017-03-16', '001', 'tersimpan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta`
--

DROP TABLE IF EXISTS `tbl_peserta`;
CREATE TABLE IF NOT EXISTS `tbl_peserta` (
  `kode_peserta` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `kode_sekolah` varchar(50) NOT NULL,
  `alamat_peserta` varchar(250) NOT NULL,
  `kode_provinsi` varchar(50) DEFAULT NULL,
  `kode_kabupaten` varchar(50) DEFAULT NULL,
  `kode_kecamatan` varchar(50) DEFAULT NULL,
  `telp_peserta` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kode_agent` varchar(50) DEFAULT NULL,
  `kode_lokasi` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  PRIMARY KEY (`kode_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`kode_peserta`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `kode_sekolah`, `alamat_peserta`, `kode_provinsi`, `kode_kabupaten`, `kode_kecamatan`, `telp_peserta`, `email`, `foto`, `kode_agent`, `kode_lokasi`, `user_id`, `tgl_daftar`) VALUES
('001', 'nabilah', '123', 'perempuan', 'bekasi', '2000-10-24', '001', 'kav.hamidi jl.solihin rt 07/14 no.20\r\n', '008', '001', '005', '(222) 222-2222', 'bilah@gmail.com', '0011.jpg', 'Agent-20172221578', '001', '004', '2017-01-09'),
('ffd', 'sa', 'sa', 'laki-laki', 'jakarta', '2000-09-09', '001', 'dsd', '008', '001', '002', '1111111111', 'a@gmail.com', '', 'Agent-2017221141627', '001', '005', '2017-01-09'),
('Peserta-2017316141233', 'sa', 'sa', 'perempuan', 'sa', '2017-03-07', 'Sch-20173222310', 'bali', '013', '013', '0', '(222) 222-2222', 'a@gmail.com', 'Peserta-2017316141233c1add1f0a1aa9fe5819cdf4cc03abd4a.jpg', 'Agent-201736204724', 'Location-20173211717', 'user-2017316141233', '2017-03-16'),
('Peserta-2017316142336', 'qori', 'nabilah', 'perempuan', 'bekasi', '2017-03-01', 'Sch-20173222310', 'as', '013', '013', '0', '(222) 222-2222', 'a@gmail.com', '', 'Agent-2017362047245', 'Location-20173211717', 'user-2017316142336', '2017-03-16'),
('Peserta-201732162726', 'husnul', 'hotimah', 'perempuan', 'bekasi', '2017-03-09', '001', 'pu', '008', '001', '002', '(222) 222-2222', 'husnulhotimah472@gmail.com', '', 'Agent-2017221141627', '001', 'user-201732162726', '2017-01-09'),
('Peserta-201733111340', 'biru', '', 'laki-laki', 'jakarta', '2017-03-01', '001', 'bekasi', '008', '001', '002', '(999) 999-9999', 'biru@gmail.com', '', 'Agent-20172221578', '001', 'user-201733111340', '2016-12-09'),
('Peserta-201733155054', 'dimas', 'putra', 'laki-laki', 'jakarta', '2017-03-01', '002', 'bekasi', '008', '001', '002', '(444) 444-4444', 'dim@gmail.com', '', 'Agent-2017221141627', '001', 'user-201733155054', '2017-03-10'),
('Peserta-201734141353', 'nabilah', 'bilah', 'perempuan', 'bekasi', '2017-03-07', '001', 'scs', '008', '001', '005', '(222) 222-2222', 'nabilah9626@gmail.com', '', 'Agent-20172221578', '001', 'user-201734141353', '2017-02-10'),
('Peserta-20173794049', 'peserta', '', 'perempuan', 'bekasi', '2017-03-07', 'Sch-20173222310', 'bali', '013', '013', '0', '(333) 333-3333', 'peserta@gmail.com', 'Peserta-2017379404907e3ada13f43f4371a061c75ab7d7491.jpg', 'Agent-201736204724', 'Location-20173211717', 'user-20173794049', '2017-01-19'),
('Peserta-201739131612', 'f', 'g', 'perempuan', 'h', '2017-03-27', 'Sch-20173222310', 'i', '013', '013', '0', '(666) 666-6666', 'a@gmail.com', '', 'Agent-201736204724', 'Location-20173211717', 'user-201739131612', '2017-03-09'),
('Peserta-2017391316121', 'pp', '', 'perempuan', 'h', '2017-03-27', 'Sch-20173222310', 'i', '013', '013', '0', '(666) 666-6666', 'a@gmail.com', '', 'Agent-201736204724', 'Location-20173211717', 'user-201739131612', '2017-03-09'),
('Peserta-20173913161214', 'ii', '', 'perempuan', 'h', '2017-03-27', 'Sch-20173222310', 'i', '013', '013', '0', '(666) 666-6666', 'a@gmail.com', '', 'Agent-201736204724', 'Location-20173211717', 'user-201739131612', '2017-03-09'),
('Peserta-201739131612145', 'll', '', 'perempuan', 'h', '2017-03-27', 'Sch-20173222310', 'i', '013', '013', '0', '(666) 666-6666', 'a@gmail.com', '', 'Agent-2017362047245', 'Location-20173211717', 'user-201739131612', '2017-03-16'),
('Peserta-201739131612147', 'ii', '', 'perempuan', 'h', '2017-03-27', 'Sch-20173222310', 'i', '013', '013', '0', '(666) 666-6666', 'a@gmail.com', '', 'Agent-201736204724', 'Location-20173211717', 'user-201739131612', '2017-01-09'),
('Peserta-2017391316121478', 'ii', '', 'perempuan', 'h', '2017-03-27', 'Sch-20173222310', 'i', '013', '013', '0', '(666) 666-6666', 'a@gmail.com', '', 'Agent-201736204724', 'Location-20173211717', 'user-201739131612', '2017-01-09'),
('Peserta-201739131616', 'dd', '', 'perempuan', 'h', '2017-03-27', 'Sch-20173222310', 'i', '013', '013', '0', '(666) 666-6666', 'a@gmail.com', '', 'Agent-20173515222', 'Location-20173211955', '', '2017-03-09'),
('Peserta-2017391316165', 'rrrr', '', 'perempuan', 'h', '2017-03-27', 'Sch-20173222310', 'i', '013', '013', '0', '(666) 666-6666', 'a@gmail.com', '', 'Agent-2017311101139', 'Location-20173211938', '', '2017-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

DROP TABLE IF EXISTS `tbl_provinsi`;
CREATE TABLE IF NOT EXISTS `tbl_provinsi` (
  `kode_provinsi` varchar(50) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`kode_provinsi`, `nama_provinsi`) VALUES
('001', 'Aceh'),
('002', 'Sumatera Utara'),
('003', 'Sumatera Barat'),
('004', 'Riau'),
('005', 'Jambi'),
('006', 'Bengkulu'),
('007', 'Banten'),
('008', 'Jawa Barat'),
('009', 'DKI Jakarta'),
('010', 'Jawa Tengah'),
('011', 'Jawa Timur'),
('012', 'DI Yogyakarta'),
('013', 'Bali'),
('014', 'Nusa Tenggara Barat'),
('015', 'Nusa Tenggara Timur'),
('016', 'Kalimantan Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

DROP TABLE IF EXISTS `tbl_sekolah`;
CREATE TABLE IF NOT EXISTS `tbl_sekolah` (
  `kode_sekolah` varchar(50) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` varchar(250) NOT NULL,
  `kode_provinsi` varchar(50) NOT NULL,
  `kode_kabupaten` varchar(50) NOT NULL,
  `kode_kecamatan` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `kode_lokasi` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`kode_sekolah`, `nama_sekolah`, `alamat_sekolah`, `kode_provinsi`, `kode_kabupaten`, `kode_kecamatan`, `telp`, `kode_lokasi`) VALUES
('001', 'SMKN 1 KOTA BEKASI', 'Bintara VIII', '001', '001', '002', '', '001'),
('002', 'SMAN 4 Kota Bekasi', 'Harapan Jaya', '001', '001', '002', '', '001'),
('003', 'SMAN 14 Kota Bekasi', 'Alinda', '001', '001', '005', '', '001'),
('Sch-201732161016', 'SMA 3', 'NJKCJCJ', '008', '001', '003', '(777) 777-7777', '001'),
('Sch-201732161055', 'SMA 2', 'D D D', '005', '006', '0', '(444) 444-4444', 'Location-20173211103'),
('Sch-20173216553', 'SMAN 12 KOTA BEKASI', 'DBUDB', '008', '001', '002', '(777) 777-7777', '001'),
('Sch-20173222310', 'sma 4', 'bchbhcja', '013', '013', '0', '(333) 333-3333', 'Location-20173211717'),
('Sch-20173311126', 'smk2', 'dsaas', '005', '006', '0', '(222) 222-2222', 'Location-20173211103'),
('Sch-20173315419', 'SMK 3', 'jbjdbh', '008', '001', '002', '(444) 444-4444', '001'),
('Sch-20173315636', 'SMKN 5', 'CBHCJ', '008', '001', '003', '(444) 444-4444', '001'),
('Sch-20173515427', 'sman 8', 'vbjbvuisd', '008', '001', '003', '(888) 888-8888', '001'),
('Sch-201735171555', 'smk 11', 'snxjsab', '008', '001', '004', '(999) 999-9999', '001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sitemanager`
--

DROP TABLE IF EXISTS `tbl_sitemanager`;
CREATE TABLE IF NOT EXISTS `tbl_sitemanager` (
  `kode_manager` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `alamat` varchar(250) NOT NULL,
  `kode_provinsi` varchar(50) DEFAULT NULL,
  `kode_kabupaten` varchar(50) DEFAULT NULL,
  `kode_kecamatan` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kode_lokasi` varchar(50) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_manager`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sitemanager`
--

INSERT INTO `tbl_sitemanager` (`kode_manager`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `alamat`, `kode_provinsi`, `kode_kabupaten`, `kode_kecamatan`, `telp`, `email`, `foto`, `kode_lokasi`, `user_id`) VALUES
('001', 'Site', 'Manager', 'laki-laki', 'Jakarta', '2000-10-06', 'karyawan swasta', 'bekasi utara', '008', '001', '005', '089666498448', 'sitemanager@gmail.com', '001logo.jpg', '001', '003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tujuan_pesan`
--

DROP TABLE IF EXISTS `tbl_tujuan_pesan`;
CREATE TABLE IF NOT EXISTS `tbl_tujuan_pesan` (
  `kode_topik` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tujuan_pesan`
--

INSERT INTO `tbl_tujuan_pesan` (`kode_topik`, `user_id`) VALUES
('Info-2017316161735', 'Agent-201722114539');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` varchar(50) NOT NULL,
  `kode_admin` varchar(50) NOT NULL,
  `kode_agent` varchar(50) NOT NULL,
  `kode_peserta` varchar(50) NOT NULL,
  `kode_manager` varchar(50) NOT NULL,
  `kode_assessor` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `password`, `level_user`, `kode_admin`, `kode_agent`, `kode_peserta`, `kode_manager`, `kode_assessor`) VALUES
('001', 'admin', 'admin@gmail.com', 'admin', 'admin', '001', '', '', '', ''),
('002', 'kenan', 'kenan@gmail.com', 'kenan123', 'admin', '002', '', '', '', ''),
('003', 'Sitemanager', 'sitemanager@gmail.com', '123', 'site manager', '', '', '', '001', ''),
('004', 'nabnab', 'bilah@gmail.com', 'bilah', 'peserta', '', '', '001', '', ''),
('090', 'Assessor', 'assessor@gmail.com', '123', 'assessor', '', '', '', '', '001'),
('user-2017221142554', 'bilah', 'bilah@gmail.com', 'bilah', 'agent', '', 'Agent-2017221142554', '', '', ''),
('user-201722114539', 'fuji', 'fujiagustin@gmail.com', '1', 'agent', '', 'Agent-201722114539', '', '', ''),
('user-2017316141233', 'sasa', 'a@gmail.com', 'sasasasasa', 'peserta', '', '', 'Peserta-2017316141233', '', ''),
('user-2017316142336', 'nabilaah24', 'a@gmail.com', 'nab241000', 'peserta', '', '', 'Peserta-2017316142336', '', ''),
('user-201732162726', 'husnul', 'husnulhotimah472@gmail.com', 'husnul', 'peserta', '', '', 'Peserta-201732162726', '', ''),
('user-201733111340', 'biru', 'biru@gmail.com', 'biru', 'peserta', '', '', 'Peserta-201733111340', '', ''),
('user-201733155054', 'dimas', 'dim@gmail.com', 'nadh', 'peserta', '', '', 'Peserta-201733155054', '', ''),
('user-201734141353', 'bilah', 'nabilah9626@gmail.com', 'a', 'peserta', '', '', 'Peserta-201734141353', '', ''),
('user-20173515222', 'ishani', 'ishani@gmail.com', '1', 'agent', '', 'Agent-20173515222', '', '', ''),
('user-201736204725', 'agent', 'elina@gmail.com', 'agent', 'agent', '', 'Agent-201736204724', '', '', ''),
('user-20173794049', 'peserta', 'peserta@gmail.com', 'peserta', 'peserta', '', '', 'Peserta-20173794049', '', ''),
('user-201739131612', 'f', 'a@gmail.com', 'f', 'peserta', '', '', 'Peserta-201739131612', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
