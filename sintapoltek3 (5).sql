-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2021 at 07:45 PM
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
-- Database: `sintapoltek3`
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
  `jenis` varchar(7) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_solusi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_bimbingan`),
  KEY `fk_bimbingan_dosen1_idx` (`id_dosen`),
  KEY `fk_bimbingan_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_dosen`, `nim`, `masalah`, `solusi`, `tanggal`, `status`, `status_dosen`, `jenis`, `file`, `file_solusi`) VALUES
(51, 24, 183307018, 'Bimbingan 1', 'Solusi bimbingan 1', '2021-07-01', 1, 1, 'seminar', NULL, NULL),
(52, 24, 183307018, 'Bimbingan 2', 'Solusi bimbingan 2', '2021-07-02', 1, 1, 'seminar', NULL, NULL),
(53, 24, 183307018, 'Bimbingan 3', 'Solusi bimbingan 3', '2021-07-03', 1, 1, 'seminar', NULL, NULL),
(54, 24, 183307018, 'Bimbingan 4', 'Solusi bimbingan 2', '2021-07-04', 1, 1, 'seminar', NULL, NULL),
(55, 24, 183307018, 'Bimbingan 5', 'Solusi bimbingan 1', '2021-07-05', 1, 1, 'seminar', NULL, NULL),
(57, 25, 183307018, 'Bimbingan 1', 'Solusi bimbingan 1', '2021-07-01', 1, 2, 'seminar', NULL, NULL),
(60, 25, 183307018, 'Bimbingan 2', 'Solusi bimbingan 2', '2021-07-02', 1, 2, 'seminar', NULL, NULL),
(61, 25, 183307018, 'Bimbingan 3', 'Solusi bimbingan 3', '2021-07-03', 1, 2, 'seminar', NULL, NULL),
(62, 25, 183307018, 'Bimbingan 4', 'Solusi bimbingan 4', '2021-07-04', 1, 2, 'seminar', NULL, NULL),
(63, 25, 183307018, 'Bimbingan 5', 'Solusi bimbingan 5', '2021-07-05', 1, 2, 'seminar', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `aplikasi` varchar(30) DEFAULT NULL,
  `ppt` varchar(30) DEFAULT NULL,
  `video` varchar(30) DEFAULT NULL,
  `foto_ijazah` varchar(30) DEFAULT NULL,
  `foto_wisuda` varchar(30) DEFAULT NULL,
  `lap_ta_prodi` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `laporan_perpus` int(11) DEFAULT NULL,
  `tanggungan_perpus` int(11) DEFAULT NULL,
  `catatan_laporan_perpus` varchar(100) DEFAULT NULL,
  `catatan_tanggungan_perpus` varchar(100) DEFAULT NULL,
  `ukt` int(11) DEFAULT NULL,
  `catatan_ukt` varchar(100) DEFAULT NULL,
  `pinjaman_alat` int(11) DEFAULT NULL,
  `catatan_pinjaman_alat` varchar(100) DEFAULT NULL,
  `status_baak` tinyint(1) DEFAULT NULL,
  `status_file_ta` tinyint(1) DEFAULT NULL,
  `status_jurnal` tinyint(1) DEFAULT NULL,
  `status_lap_ta` tinyint(1) DEFAULT NULL,
  `status_aplikasi` tinyint(1) DEFAULT NULL,
  `status_ppt` tinyint(1) DEFAULT NULL,
  `status_video` tinyint(1) DEFAULT NULL,
  `catatan_file_ta` varchar(100) DEFAULT NULL,
  `catatan_jurnal` varchar(100) DEFAULT NULL,
  `catatan_aplikasi` varchar(100) DEFAULT NULL,
  `catatan_ppt` varchar(100) DEFAULT NULL,
  `catatan_video` varchar(100) DEFAULT NULL,
  `catatan_lap_ta` varchar(100) DEFAULT NULL,
  `tgl_file_ta` date DEFAULT NULL,
  `tgl_jurnal` date DEFAULT NULL,
  `tgl_aplikasi` date DEFAULT NULL,
  `tgl_ppt` date DEFAULT NULL,
  `tgl_video` date DEFAULT NULL,
  `tgl_lap_ta` date DEFAULT NULL,
  PRIMARY KEY (`id_bks_wisuda`),
  KEY `fk_bks_wisuda_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_prodi`, `email`, `password`, `nip`, `nama`, `hp`, `level`, `aktif`) VALUES
(20, 30, 'rudy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '197001221995121002', 'Rudy Yuni Widiyatmoko, M.Sc.', '6281359997740', 3, 1),
(23, 30, 'refrizal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882882', 'Drs. Refrizal Amir, S.T., M.T.', '6281217226810', 3, 1),
(24, 30, 'riswanda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882999', 'Riswanda, S.T., M.Eng.', '0987654321', 4, 1),
(25, 30, 'taufik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545876546', 'Drs. Taufik Hidayat, M.T', '6285796120150', 3, 1),
(26, 30, 'angga@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882000', 'Angga Yunanda', '0987654321', 1, 1),
(27, 0, 'adminbahasa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '98765423567899925', 'Admin Bahasa', '098789654456', 9, 1),
(28, 0, 'adminperpus@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123456789090099765', 'Admin Perpustakaan', '0987654389', 6, 1),
(29, 0, 'adminlab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9886541467999098', 'Admin Lab', '09876543235', 8, 1),
(30, 0, 'adminkeuangan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890900', 'Admin Keuangan', '0987654389', 5, 1),
(31, 0, 'adminbaak@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123456789090099765', 'Admin BAAK', '098789654456', 7, 1),
(32, 30, 'abimanyu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882880', 'Abimanyu S.Kom.M.Kom,', '6281359997740', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(183307019, 30, '81dc9bdb52d04dc20036dbd8313ed055', 'Uswatun Khasanah', 'Jl. Merpati No.56 Ds. Kaliurang Yogyakarta', '087612345677', 'Madiun, 32 Maret 1999', '2019-2020', 2, 1),
(183307020, 30, '81dc9bdb52d04dc20036dbd8313ed055', 'Tasya Farasya', 'Jl.Merdeka No. 34 RT.01 RW.08 Kel. Sukajaya Jawa Timur', '08734567890', 'Surabaya, 07 Agustus 1999', '2019-2020', 2, 1);

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
  `judul` varchar(50) DEFAULT NULL,
  `jadwal_seminar` date DEFAULT NULL,
  `jadwal_sidang` date DEFAULT NULL,
  `ruang_seminar` varchar(10) DEFAULT NULL,
  `ruang_sidang` varchar(10) DEFAULT NULL,
  `revisi_seminar` varchar(30) DEFAULT NULL,
  `status_seminar` varchar(25) DEFAULT NULL,
  `revisi_sidang` varchar(20) DEFAULT NULL,
  `status_sidang` varchar(25) DEFAULT NULL,
  `jam` varchar(15) DEFAULT NULL,
  `jam_sidang` varchar(15) NOT NULL,
  `jadwal_wisuda` date DEFAULT NULL,
  `tempat_wisuda` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_ta`
--

INSERT INTO `master_ta` (`id_master_ta`, `nim`, `pembimbing1`, `pembimbing2`, `penguji1_sempro`, `penguji2_sempro`, `penguji3_sempro`, `penguji1_sidang`, `penguji2_sidang`, `penguji3_sidang`, `judul`, `jadwal_seminar`, `jadwal_sidang`, `ruang_seminar`, `ruang_sidang`, `revisi_seminar`, `status_seminar`, `revisi_sidang`, `status_sidang`, `jam`, `jam_sidang`, `jadwal_wisuda`, `tempat_wisuda`) VALUES
(30, 183307018, 24, 25, 20, 23, 24, NULL, NULL, NULL, '3', '2021-07-12', NULL, 'R.1', NULL, 'revisi_seminar-2107221.pdf', 'Lulus Dengan Revisi', NULL, NULL, '10:00-11:00', '', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_sempro`
--

INSERT INTO `nilai_sempro` (`id_nilai_sempro`, `nim`, `id_dosen`, `perumusan`, `teori`, `pemecahan`, `penulisan`, `pustaka`, `presentasi`, `penguasaan`, `rata`, `nilai_akhir`) VALUES
(10, 183307018, 24, 90, 90, 98, 89, 87, 90, 87, 90, 631),
(11, 183307018, 20, 97, 89, 80, 85, 87, 80, 85, 86, 603),
(12, 183307018, 23, 90, 90, 87, 85, 89, 90, 80, 87, 611);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persetujuan`
--

DROP TABLE IF EXISTS `persetujuan`;
CREATE TABLE IF NOT EXISTS `persetujuan` (
  `id_persetujuan_seminar` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `status_dosen` int(11) NOT NULL,
  `tanggal_persetujuan` date NOT NULL,
  `jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_persetujuan_seminar`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persetujuan`
--

INSERT INTO `persetujuan` (`id_persetujuan_seminar`, `nim`, `id_dosen`, `judul`, `status_dosen`, `tanggal_persetujuan`, `jenis`) VALUES
(42, 183307018, 24, 'Sistem informasi penjualan online', 1, '2021-07-22', 'proposal'),
(43, 183307018, 25, 'Sistem informasi penjualan online', 2, '2021-07-22', 'proposal');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
  `file_proposal` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_proposal`),
  KEY `fk_proposal_mahasiswa1_idx` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `nim`, `file_proposal`) VALUES
(42, 183307018, '183307018_-_Proposal4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

DROP TABLE IF EXISTS `revisi`;
CREATE TABLE IF NOT EXISTS `revisi` (
  `id_revisi` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `penguji` int(11) DEFAULT NULL,
  `jenis` varchar(15) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `file_revisi` varchar(255) DEFAULT NULL,
  `revisi` varchar(100) DEFAULT NULL,
  `status_hasil` varchar(20) NOT NULL,
  PRIMARY KEY (`id_revisi`),
  KEY `nim` (`nim`),
  KEY `penguji` (`penguji`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revisi`
--

INSERT INTO `revisi` (`id_revisi`, `nim`, `penguji`, `jenis`, `status`, `file_revisi`, `revisi`, `status_hasil`) VALUES
(4, 183307018, 23, 'seminar', 1, '183307018_-_Revisi_Seminar5.pdf', 'Perbaikan penomoran halaman', ''),
(5, 183307018, 20, 'seminar', 1, '183307018_-_Revisi_Seminar5.pdf', 'Penataan paragraf dirapikan', ''),
(6, 183307018, 24, 'seminar', 1, '183307018_-_Revisi_Seminar5.pdf', 'Daftar pustaka', '');

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
  `st_beritaacara` tinyint(4) DEFAULT NULL,
  `st_persetujuan` tinyint(4) DEFAULT NULL,
  `st_proposal` tinyint(4) DEFAULT NULL,
  `st_monitoring` tinyint(4) DEFAULT NULL,
  `st_presentasi` tinyint(4) DEFAULT NULL,
  `catatan_beritaacara` varchar(100) DEFAULT NULL,
  `catatan_persetujuan` varchar(100) DEFAULT NULL,
  `catatan_proposal` varchar(100) DEFAULT NULL,
  `catatan_presentasi` varchar(100) DEFAULT NULL,
  `catatan_monitoring` varchar(100) DEFAULT NULL,
  `tgl_beritaacara` date DEFAULT NULL,
  `tgl_persetujuan` date DEFAULT NULL,
  `tgl_proposal` date DEFAULT NULL,
  `tgl_monitoring` date DEFAULT NULL,
  `tgl_presentasi` date DEFAULT NULL,
  `persetujuan_dosen1` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_seminar_proposal`),
  KEY `fk_seminar_proposal_mahasiswa1_idx` (`nim`),
  KEY `fk_seminar_proposal_nilai_sempro1_idx` (`id_nilai_sempro`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar_proposal`
--

INSERT INTO `seminar_proposal` (`id_seminar_proposal`, `id_nilai_sempro`, `nim`, `berita_acara`, `persetujuan`, `proposal`, `monitoring`, `status`, `presentasi`, `rata`, `jumlah`, `st_beritaacara`, `st_persetujuan`, `st_proposal`, `st_monitoring`, `st_presentasi`, `catatan_beritaacara`, `catatan_persetujuan`, `catatan_proposal`, `catatan_presentasi`, `catatan_monitoring`, `tgl_beritaacara`, `tgl_persetujuan`, `tgl_proposal`, `tgl_monitoring`, `tgl_presentasi`, `persetujuan_dosen1`) VALUES
(6, NULL, 183307018, 'bks_seminar-2107222.docx', 'bks_seminar-2107223.docx', 'bks_seminar-2107222.pdf', 'bks_seminar-2107223.pdf', NULL, 'bks_seminar-2107221.pptx', 0, 0, 2, 2, 2, 2, 2, '', '', '', '', '', '2021-07-22', '2021-07-22', '2021-07-22', '2021-07-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seminar_ta`
--

DROP TABLE IF EXISTS `seminar_ta`;
CREATE TABLE IF NOT EXISTS `seminar_ta` (
  `id_seminar_ta` int(11) NOT NULL AUTO_INCREMENT,
  `id_nilai_ta` int(11) DEFAULT NULL,
  `nim` int(11) NOT NULL,
  `file_ta` varchar(30) DEFAULT NULL,
  `pkkmb` varchar(30) DEFAULT NULL,
  `monitoring` varchar(30) DEFAULT NULL,
  `persetujuan` varchar(30) DEFAULT NULL,
  `berita_acara` varchar(30) DEFAULT NULL,
  `presentasi` varchar(30) DEFAULT NULL,
  `link` varchar(20) DEFAULT NULL,
  `st_file_ta` tinyint(1) DEFAULT NULL,
  `st_pkkmb` tinyint(1) DEFAULT NULL,
  `st_monitoring` tinyint(1) DEFAULT NULL,
  `st_persetujuan` tinyint(1) DEFAULT NULL,
  `st_berita_acara` tinyint(1) DEFAULT NULL,
  `st_presentasi` tinyint(1) DEFAULT NULL,
  `catatan_file_ta` varchar(100) DEFAULT NULL,
  `catatan_pkkmb` varchar(100) DEFAULT NULL,
  `catatan_monitoring` varchar(100) DEFAULT NULL,
  `catatan_persetujuan` varchar(100) DEFAULT NULL,
  `catatan_berita_acara` varchar(100) DEFAULT NULL,
  `catatan_presentasi` varchar(100) DEFAULT NULL,
  `tgl_file_ta` date DEFAULT NULL,
  `tgl_pkkmb` date DEFAULT NULL,
  `tgl_monitoring` date DEFAULT NULL,
  `tgl_persetujuan` date DEFAULT NULL,
  `tgl_berita_acara` date DEFAULT NULL,
  `tgl_presentasi` date DEFAULT NULL,
  PRIMARY KEY (`id_seminar_ta`),
  KEY `fk_seminar_ta_mahasiswa1_idx` (`nim`),
  KEY `fk_seminar_ta_nilai_ta2_idx` (`id_nilai_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

DROP TABLE IF EXISTS `topik`;
CREATE TABLE IF NOT EXISTS `topik` (
  `id_topik` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `deskripsi` text,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id_topik`),
  KEY `nim` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id_topik`, `nim`, `judul`, `lokasi`, `status`, `deskripsi`, `komentar`) VALUES
(3, 183307018, 'Sistem informasi penjualan online', 'CV. Makmur Jaya', 3, 'Sistem yang digunakan untuk melakukan penjualan online', 'Judul diterima');

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
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_prodi1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `revisi`
--
ALTER TABLE `revisi`
  ADD CONSTRAINT `revisi_ibfk_1` FOREIGN KEY (`penguji`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
