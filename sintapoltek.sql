-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2021 at 08:31 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sintapoltek`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

DROP TABLE IF EXISTS `bimbingan`;
CREATE TABLE IF NOT EXISTS `bimbingan` (
  `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `masalah` text,
  `solusi` text NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `status_dosen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_bimbingan`),
  KEY `fk_bimbingan_dosen1_idx` (`id_dosen`),
  KEY `fk_bimbingan_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_dosen`, `nim`, `masalah`, `solusi`, `tanggal`, `status`, `status_dosen`) VALUES
(46, 20, 183307018, 'Laporan BAB 4', 'lanjutkan bab 5', '2021-06-22', 3, 1),
(47, 23, 183307018, 'Pembuatan aplikasi', 'lanjutkan pembuatan', '2021-06-23', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bks_bahasa`
--

DROP TABLE IF EXISTS `bks_bahasa`;
CREATE TABLE IF NOT EXISTS `bks_bahasa` (
  `id_bks_bhs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `nama_bhs` varchar(20) DEFAULT NULL,
  `skor` varchar(10) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `sk_bahasa` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bks_bhs`),
  KEY `fk_bks_bahasa_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_bahasa`
--

INSERT INTO `bks_bahasa` (`id_bks_bhs`, `nim`, `periode`, `tahun`, `nama_bhs`, `skor`, `tanggal`, `sk_bahasa`, `status`) VALUES
(2, 183307018, '2020/2021 Genap', '2021', 'Bahasa Inggris', '577', '2021-06-22', 'bks_bahasa-210622.jpg', 1),
(3, 183307019, '2020/2021 Genap', '2021', 'Bahasa Inggris', '577', '2021-06-23', 'bks_bahasa-210624.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bks_keterampilan`
--

DROP TABLE IF EXISTS `bks_keterampilan`;
CREATE TABLE IF NOT EXISTS `bks_keterampilan` (
  `id_bks_ket` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `nama_ket` varchar(20) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `sk_ket` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bks_ket`),
  KEY `fk_bks_keterampilan_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_keterampilan`
--

INSERT INTO `bks_keterampilan` (`id_bks_ket`, `nim`, `nama_ket`, `jenis`, `tingkat`, `sk_ket`, `status`) VALUES
(3, 183307018, 'Menari', 'Teknis/Akademis (Hardskill)', 'Dasar', 'bks_keterampilan-210622.jpg', 2),
(4, 183307019, 'Menari', 'Non Teknis / Non Akademis (Sof', 'Menengah', 'bks_keterampilan-210623.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bks_organisasi`
--

DROP TABLE IF EXISTS `bks_organisasi`;
CREATE TABLE IF NOT EXISTS `bks_organisasi` (
  `id_bks_org` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `nama_org` varchar(50) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tahun_masuk` varchar(4) DEFAULT NULL,
  `tahun_keluar` varchar(4) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `sk_org` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bks_org`),
  KEY `fk_bks_organisasi_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_organisasi`
--

INSERT INTO `bks_organisasi` (`id_bks_org`, `nim`, `nama_org`, `tempat`, `tahun_masuk`, `tahun_keluar`, `jabatan`, `sk_org`, `status`) VALUES
(3, 183307018, 'Himpunan Mahasiswa Jurusan Teknik', 'Politeknik Negeri Madiun', '2020', '2021', 'Sekretaris', 'bks_organisasi-210622.jpg', 1),
(4, 183307019, 'Himpunan Mahasiswa Jurusan Administrasi Bisnis', 'Politeknik Negeri Madiun', '2020', '2021', 'Bendahara', 'bks_organisasi-210624.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bks_pkl`
--

DROP TABLE IF EXISTS `bks_pkl`;
CREATE TABLE IF NOT EXISTS `bks_pkl` (
  `id_bks_pkl` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ringkasan` text,
  `sk_pkl` varchar(30) DEFAULT NULL,
  `laporan` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bks_pkl`),
  KEY `fk_bks_pkl_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_pkl`
--

INSERT INTO `bks_pkl` (`id_bks_pkl`, `nim`, `judul`, `tempat`, `provinsi`, `kota`, `tanggal`, `ringkasan`, `sk_pkl`, `laporan`, `status`) VALUES
(3, 183307018, 'Apliaksi Android Untuk Monitoring', 'PT Indonesia IT', 'Jawa Tengah', 'Yogyakarta', '2021-06-23', 'Pkl untuk melatih kerja', 'bks_pkl-210622.jpg', 'bks_pkl-210622.pdf', 1),
(4, 183307019, 'Aplikasi penjualan', 'PT Indonesia IT', 'Jawa Tengah', 'Yogyakarta', '2021-06-23', 'PKL adalah', 'bks_pkl-210623.pdf', 'bks_pkl-2106231.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bks_prestasi`
--

DROP TABLE IF EXISTS `bks_prestasi`;
CREATE TABLE IF NOT EXISTS `bks_prestasi` (
  `id_bks_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `nama_lomba` varchar(50) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `juara` varchar(20) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `piagam` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bks_prestasi`),
  KEY `fk_bks_prestasi_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_prestasi`
--

INSERT INTO `bks_prestasi` (`id_bks_prestasi`, `nim`, `nama_lomba`, `tahun`, `juara`, `tingkat`, `jenis`, `piagam`, `status`) VALUES
(3, 183307018, 'Lomba Pidato', '2021', 'JUARA 1', 'Regional', 'Kelompok', 'bks_prestasi-210622.jpg', 1),
(4, 183307019, 'Lomba Pidato', '2021', 'JUARA 1', 'Nasional', 'Individu', 'bks_prestasi-210624.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bks_wisuda`
--

DROP TABLE IF EXISTS `bks_wisuda`;
CREATE TABLE IF NOT EXISTS `bks_wisuda` (
  `id_bks_wisuda` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `file_ta` varchar(30) DEFAULT NULL,
  `jurnal` varchar(30) DEFAULT NULL,
  `lap_ta_prodi` varchar(30) DEFAULT NULL,
  `aplikasi` varchar(30) DEFAULT NULL,
  `ppt` varchar(30) DEFAULT NULL,
  `video` varchar(30) DEFAULT NULL,
  `foto_ijazah` varchar(30) DEFAULT NULL,
  `foto_wisuda` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `laporan_perpus` int(11) DEFAULT NULL,
  `tanggungan_perpus` int(11) DEFAULT NULL,
  `ukt` int(11) DEFAULT NULL,
  `pinjaman_alat` int(11) DEFAULT NULL,
  `status_baak` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bks_wisuda`),
  KEY `fk_bks_wisuda_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_wisuda`
--

INSERT INTO `bks_wisuda` (`id_bks_wisuda`, `nim`, `file_ta`, `jurnal`, `lap_ta_prodi`, `aplikasi`, `ppt`, `video`, `foto_ijazah`, `foto_wisuda`, `status`, `laporan_perpus`, `tanggungan_perpus`, `ukt`, `pinjaman_alat`, `status_baak`) VALUES
(3, 183307018, 'bks_wisuda-210621.pdf', 'bks_wisuda-2106211.pdf', 'bks_wisuda-2106212.pdf', 'winbox.exe', 'bks_wisuda-2106213.pdf', 'bks_wisuda-2106213.pdf', 'bks_wisuda-210621.jpg', 'bks_wisuda-2106211.jpg', 3, 2, 2, 2, 2, 3),
(4, 183307019, 'bks_wisuda-210623.pdf', 'bks_wisuda-2106231.pdf', 'bks_wisuda-2106232.pdf', 'bks_wisuda-2106233.pdf', 'bks_wisuda-2106234.pdf', 'bks_wisuda-2106235.pdf', 'bks_wisuda-210623.jpg', 'bks_wisuda-2106231.jpg', 1, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswabimbingan` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `file` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_chat`),
  KEY `fk_chat_dosen1_idx` (`id_pengirim`),
  KEY `fk_chat_mahasiswa1_idx` (`id_mahasiswabimbingan`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_mahasiswabimbingan`, `id_pengirim`, `isi_pesan`, `file`, `tanggal`, `level`) VALUES
(15, 0, 0, 'Laporan BAB 4', '', '2021-06-21 08:10:08', 0),
(16, 0, 0, 'Kirimkan file laporan', '', '2021-06-21 08:11:35', 1),
(17, 0, 0, 'File laporan', 'BERITA_ACARA_LENGKAP', '2021-06-21 09:05:39', 0),
(18, 0, 0, 'Oke akan saya periksa', '', '2021-06-21 09:07:41', 1),
(19, 0, 0, 'Baik pak', '', '2021-06-21 09:07:57', 0),
(20, 0, 0, 'Silahkan diperbaiki', '', '2021-06-21 09:10:05', 1),
(23, 183307018, 183307018, 'laporan bab 4', '', '2021-06-22 17:22:45', 0),
(25, 183307018, 20, 'kirim', '', '2021-06-22 17:55:19', 1),
(26, 183307018, 23, 'Silahkan dilanjutkan', '', '2021-06-22 17:57:00', 1),
(27, 183307018, 20, 'file', 'sk_magang.jpg', '2021-06-24 04:56:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodi` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `hp` varchar(14) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `fk_dosen_prodi1_idx` (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_prodi`, `email`, `password`, `nip`, `nama`, `hp`, `level`, `aktif`) VALUES
(20, 30, 'rudy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '197001221995121002', 'Rudy Yuni Widiyatmoko, M.Sc.', '6281217226810', 3, 1),
(23, 30, 'refrizal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882882', 'Drs. Refrizal Amir, S.T., M.T.', '6281359997740', 3, 1),
(24, 30, 'riswanda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882999', 'Riswanda, S.T., M.Eng.', '0987654321', 4, 1),
(25, 28, 'taufik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545876546', 'Drs. Taufik Hidayat, M.T', '0987654389', 3, 1),
(26, 30, 'angga@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882000', 'Angga Yunanda Real', '0987654321', 1, 1),
(27, 0, 'adminbahasa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '98765423567899925', 'Admin Bahasa', '098789654456', 9, 1),
(28, 0, 'adminperpus@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123456789090099765', 'Admin Perpustakaan', '0987654389', 6, 1),
(29, 0, 'adminlab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9886541467999098', 'Admin Lab', '09876543235', 8, 1),
(30, 0, 'adminkeuangan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890900', 'Admin Keuangan', '0987654389', 5, 1),
(31, 0, 'adminbaak@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123456789090099765', 'Admin BAAK', '098789654456', 7, 1),
(32, 29, 'abimanyu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882880', 'Abimanyu S.Kom.M.Kom,', '081234567890', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(8, 'Komputer Akuntansi'),
(9, 'Teknik'),
(10, 'Administrasi Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `hp` varchar(14) DEFAULT NULL,
  `ttl` varchar(35) DEFAULT NULL,
  `angkatan` varchar(12) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`nim`),
  KEY `fk_mahasiswa_prodi1_idx` (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_prodi`, `password`, `nama`, `alamat`, `hp`, `ttl`, `angkatan`, `level`, `aktif`) VALUES
(183307018, 30, '81dc9bdb52d04dc20036dbd8313ed055', 'Ratna Yuniar Ardiasari', 'Jl. Diponegoro No.54 RT.01 RW.02 Kel.Sukoharjo ', '087612345678', 'Madiun, 20 Mei 1998', '2019-2020', 2, 1),
(183307019, 24, '81dc9bdb52d04dc20036dbd8313ed055', 'Uswatun Khasanah', 'Jl. Merpati No.56 Ds. Kaliurang Yogyakarta', '087612345677', 'Madiun, 32 Maret 1999', '2019-2020', 2, 1),
(183307020, 30, NULL, 'Tasya Farasya', 'Jl.Merdeka No. 34 RT.01 RW.08 Kel. Sukajaya Jawa Timur', '08734567890', 'Surabaya, 07 Agustus 1999', '2019-2020', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_ta`
--

DROP TABLE IF EXISTS `master_ta`;
CREATE TABLE IF NOT EXISTS `master_ta` (
  `id_master_ta` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) DEFAULT NULL,
  `pembimbing1` int(11) DEFAULT NULL,
  `pembimbing2` int(11) DEFAULT NULL,
  `penguji1_sempro` int(11) DEFAULT NULL,
  `penguji2_sempro` int(11) DEFAULT NULL,
  `penguji3_sempro` int(11) DEFAULT NULL,
  `penguji1_sidang` int(11) DEFAULT NULL,
  `penguji2_sidang` int(11) DEFAULT NULL,
  `penguji3_sidang` int(11) DEFAULT NULL,
  `judul` int(11) DEFAULT NULL,
  `jadwal_seminar` datetime DEFAULT NULL,
  `jadwal_sidang` datetime DEFAULT NULL,
  PRIMARY KEY (`id_master_ta`),
  KEY `fk_master_ta_dosen1_idx` (`pembimbing1`),
  KEY `fk_master_ta_dosen2_idx` (`pembimbing2`),
  KEY `fk_master_ta_dosen3_idx` (`penguji1_sempro`),
  KEY `fk_master_ta_dosen4_idx` (`penguji1_sidang`),
  KEY `fk_master_ta_dosen5_idx` (`penguji2_sidang`),
  KEY `fk_master_ta_dosen6_idx` (`penguji3_sidang`),
  KEY `fk_master_ta_dosen7_idx` (`penguji2_sempro`),
  KEY `fk_master_ta_dosen8_idx` (`penguji3_sempro`),
  KEY `fk_master_ta_mahasiswa1_idx` (`nim`),
  KEY `fk_master_ta_topik1_idx` (`judul`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_ta`
--

INSERT INTO `master_ta` (`id_master_ta`, `nim`, `pembimbing1`, `pembimbing2`, `penguji1_sempro`, `penguji2_sempro`, `penguji3_sempro`, `penguji1_sidang`, `penguji2_sidang`, `penguji3_sidang`, `judul`, `jadwal_seminar`, `jadwal_sidang`) VALUES
(7, 183307019, 24, 25, 23, 20, 25, 20, 23, 24, 0, '2021-06-22 01:00:00', '2021-06-19 01:25:00'),
(12, 183307018, 23, 24, 32, 20, 23, 24, 25, 20, 0, '2021-06-25 10:30:00', '2021-06-25 10:00:00'),
(14, 183307020, 25, 20, 23, 20, 24, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sempro`
--

DROP TABLE IF EXISTS `nilai_sempro`;
CREATE TABLE IF NOT EXISTS `nilai_sempro` (
  `id_nilai_sempro` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `perumusan` int(11) NOT NULL,
  `teori` int(11) NOT NULL,
  `pemecahan` int(11) NOT NULL,
  `penulisan` int(11) NOT NULL,
  `pustaka` int(11) NOT NULL,
  `presentasi` int(11) NOT NULL,
  `penguasaan` int(11) NOT NULL,
  `rata` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai_sempro`),
  KEY `fk_nilai_sempro_dosen1_idx` (`id_dosen`),
  KEY `fk_nilai_sempro_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_sempro`
--

INSERT INTO `nilai_sempro` (`id_nilai_sempro`, `nim`, `id_dosen`, `perumusan`, `teori`, `pemecahan`, `penulisan`, `pustaka`, `presentasi`, `penguasaan`, `rata`, `nilai_akhir`) VALUES
(1, 183307019, 23, 90, 95, 97, 98, 100, 85, 90, 94, 655),
(3, 183307019, 25, 90, 80, 95, 97, 90, 87, 100, 91, 639),
(4, 183307018, 32, 90, 89, 87, 85, 99, 97, 95, 92, 642),
(5, 183307018, 25, 87, 85, 90, 97, 89, 80, 90, 88, 618),
(6, 183307018, 24, 90, 98, 89, 87, 85, 85, 90, 89, 624),
(7, 183307019, 20, 90, 80, 98, 90, 100, 100, 95, 0, 0),
(8, 183307019, 20, 90, 80, 98, 90, 100, 100, 95, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sidang`
--

DROP TABLE IF EXISTS `nilai_sidang`;
CREATE TABLE IF NOT EXISTS `nilai_sidang` (
  `id_nilai_sidang` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `perumusan` int(11) NOT NULL,
  `teori` int(11) NOT NULL,
  `pemecahan` int(11) NOT NULL,
  `penulisan` int(11) NOT NULL,
  `pustaka` int(11) NOT NULL,
  `karya` int(11) NOT NULL,
  `presentasi` int(11) NOT NULL,
  `penguasaan` int(11) NOT NULL,
  `rata` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai_sidang`),
  KEY `fk_nilai_ta_dosen1_idx` (`id_dosen`),
  KEY `fk_nilai_ta_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_sidang`
--

INSERT INTO `nilai_sidang` (`id_nilai_sidang`, `nim`, `id_dosen`, `perumusan`, `teori`, `pemecahan`, `penulisan`, `pustaka`, `karya`, `presentasi`, `penguasaan`, `rata`, `nilai_akhir`) VALUES
(1, 183307019, 20, 90, 90, 90, 90, 90, 90, 90, 90, 90, 720),
(2, 183307018, 20, 100, 100, 100, 100, 100, 100, 100, 100, 100, 800);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) NOT NULL,
  `nama_prodi` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `fk_prodi_jurusan1_idx` (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_jurusan`, `nama_prodi`) VALUES
(23, 10, 'Administrasi Bisnis'),
(24, 10, 'Bahasa Inggris'),
(25, 8, 'Akuntansi'),
(26, 8, 'Komputerisasi Akuntansi'),
(27, 9, 'Teknik Listrik'),
(28, 9, 'Mesin Otomotif'),
(29, 9, 'Teknik Komputer Kontrol'),
(30, 9, 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
CREATE TABLE IF NOT EXISTS `proposal` (
  `id_proposal` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `latar_belakang` text,
  `rumusan_masalah` text,
  `batasan_masalah` text,
  `tujuan` text,
  `teori` text,
  `metode` text,
  PRIMARY KEY (`id_proposal`),
  KEY `fk_proposal_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposal`
--

DROP TABLE IF EXISTS `seminar_proposal`;
CREATE TABLE IF NOT EXISTS `seminar_proposal` (
  `id_seminar_proposal` int(11) NOT NULL AUTO_INCREMENT,
  `id_nilai_sempro` int(11) DEFAULT NULL,
  `nim` int(11) NOT NULL,
  `berita_acara` varchar(30) DEFAULT NULL,
  `persetujuan` varchar(30) DEFAULT NULL,
  `proposal` varchar(30) DEFAULT NULL,
  `monitoring` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `presentasi` varchar(30) NOT NULL,
  `rata` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_seminar_proposal`),
  KEY `fk_seminar_proposal_mahasiswa1_idx` (`nim`),
  KEY `fk_seminar_proposal_nilai_sempro1_idx` (`id_nilai_sempro`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar_proposal`
--

INSERT INTO `seminar_proposal` (`id_seminar_proposal`, `id_nilai_sempro`, `nim`, `berita_acara`, `persetujuan`, `proposal`, `monitoring`, `status`, `presentasi`, `rata`, `jumlah`) VALUES
(7, NULL, 183307018, 'bks_seminar-21062330.pdf', 'bks_seminar-21062331.pdf', 'bks_seminar-21062332.pdf', 'bks_seminar-21062334.pdf', 3, 'bks_seminar-21062333.pdf', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seminar_ta`
--

DROP TABLE IF EXISTS `seminar_ta`;
CREATE TABLE IF NOT EXISTS `seminar_ta` (
  `id_seminar_ta` int(11) NOT NULL AUTO_INCREMENT,
  `id_nilai_ta` int(11) DEFAULT NULL,
  `nim` int(11) NOT NULL,
  `proposal` varchar(30) DEFAULT NULL,
  `pkkmb` varchar(30) DEFAULT NULL,
  `pengesahan` varchar(30) DEFAULT NULL,
  `monitoring` varchar(30) DEFAULT NULL,
  `persetujuan` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_seminar_ta`),
  KEY `fk_seminar_ta_mahasiswa1_idx` (`nim`),
  KEY `fk_seminar_ta_nilai_ta2_idx` (`id_nilai_ta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar_ta`
--

INSERT INTO `seminar_ta` (`id_seminar_ta`, `id_nilai_ta`, `nim`, `proposal`, `pkkmb`, `pengesahan`, `monitoring`, `persetujuan`, `status`) VALUES
(2, NULL, 183307018, 'bks_sidang-2106235.pdf', 'bks_sidang-2106236.pdf', 'bks_sidang-2106237.pdf', 'bks_sidang-2106238.pdf', 'bks_sidang-2106239.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

DROP TABLE IF EXISTS `topik`;
CREATE TABLE IF NOT EXISTS `topik` (
  `id_topik` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `bidang` varchar(20) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `lokasi` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `deskripsi` text,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id_topik`),
  KEY `nim` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id_topik`, `nim`, `bidang`, `judul`, `lokasi`, `status`, `deskripsi`, `komentar`) VALUES
(23, 183307018, 'Web', 'Sistem Informasi retribusi', 'Madiun', 3, 'Sistem untuk daftar', 'Topik yang menarik'),
(25, 183307018, 'Web', 'Aplikasi pembelajaran', 'Madiun', 3, 'Untuk belajar', 'ok');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `fk_bimbingan_dosen1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bimbingan_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bks_bahasa`
--
ALTER TABLE `bks_bahasa`
  ADD CONSTRAINT `fk_bks_bahasa_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `bks_keterampilan`
--
ALTER TABLE `bks_keterampilan`
  ADD CONSTRAINT `fk_bks_keterampilan_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `bks_organisasi`
--
ALTER TABLE `bks_organisasi`
  ADD CONSTRAINT `fk_bks_organisasi_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `bks_pkl`
--
ALTER TABLE `bks_pkl`
  ADD CONSTRAINT `fk_bks_pkl_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `bks_prestasi`
--
ALTER TABLE `bks_prestasi`
  ADD CONSTRAINT `fk_bks_prestasi_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `bks_wisuda`
--
ALTER TABLE `bks_wisuda`
  ADD CONSTRAINT `fk_bks_wisuda_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_mahasiswa1` FOREIGN KEY (`id_mahasiswabimbingan`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_dosen_prodi1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_prodi1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `master_ta`
--
ALTER TABLE `master_ta`
  ADD CONSTRAINT `fk_master_ta_dosen1` FOREIGN KEY (`pembimbing1`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_master_ta_dosen2` FOREIGN KEY (`pembimbing2`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_master_ta_dosen3` FOREIGN KEY (`penguji1_sempro`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_master_ta_dosen4` FOREIGN KEY (`penguji1_sidang`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_master_ta_dosen5` FOREIGN KEY (`penguji2_sidang`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_master_ta_dosen6` FOREIGN KEY (`penguji3_sidang`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_master_ta_dosen7` FOREIGN KEY (`penguji2_sempro`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_master_ta_dosen8` FOREIGN KEY (`penguji3_sempro`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_master_ta_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `nilai_sempro`
--
ALTER TABLE `nilai_sempro`
  ADD CONSTRAINT `fk_nilai_sempro_dosen1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_sempro_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  ADD CONSTRAINT `fk_nilai_ta_dosen1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_ta_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_prodi_jurusan1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `fk_proposal_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD CONSTRAINT `fk_seminar_proposal_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seminar_proposal_nilai_sempro1` FOREIGN KEY (`id_nilai_sempro`) REFERENCES `nilai_sempro` (`id_nilai_sempro`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `seminar_ta`
--
ALTER TABLE `seminar_ta`
  ADD CONSTRAINT `fk_seminar_ta_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seminar_ta_nilai_ta2` FOREIGN KEY (`id_nilai_ta`) REFERENCES `nilai_sidang` (`id_nilai_sidang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
