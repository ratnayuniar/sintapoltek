-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 08:19 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinta`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `dosen` varchar(100) DEFAULT NULL,
  `masalah` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `minggu` int(11) DEFAULT NULL,
  `id_user_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `dosen`, `masalah`, `tanggal`, `status`, `id_user`, `nim`, `minggu`, `id_user_dosen`) VALUES
(58, 'Rudy Yuni Widiyatmoko, M.Sc.', 'Bimbingan progress Tugas Akhir', '2021-06-02', 2, NULL, 183307019, 14, 4),
(59, 'Drs. Refrizal Amir, S.T., M.T.', 'Bimbingan laporan BAB 5', '2021-06-03', 0, NULL, 183307020, 14, 9),
(60, 'Rudy Yuni Widiyatmoko, M.Sc.', 'Bimbingan pembuatan abstract', '2021-06-01', 3, NULL, 183307018, 58, 4),
(61, 'Rudy Yuni Widiyatmoko, M.Sc.', 'Pengujian sistem ', '2021-06-02', 3, NULL, 183307018, 912, 4),
(62, 'Rudy Yuni Widiyatmoko, M.Sc.', 'Laporan BAB 5', '2021-06-01', 3, NULL, 183307018, 58, 4),
(63, 'Rudy Yuni Widiyatmoko, M.Sc.', 'Pembuatan abstrak', '2021-06-02', 3, NULL, 183307018, 1316, 4),
(65, 'Riswanda, S.T., M.Eng.', 'Laporan BAB 3', '2021-06-08', 0, NULL, 183307018, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan2`
--

CREATE TABLE `bimbingan2` (
  `id_bimbingan2` int(11) NOT NULL,
  `dosen` varchar(100) NOT NULL,
  `masalah` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `minggu` int(11) NOT NULL,
  `id_user_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan2`
--

INSERT INTO `bimbingan2` (`id_bimbingan2`, `dosen`, `masalah`, `tanggal`, `status`, `id_user`, `nim`, `minggu`, `id_user_dosen`) VALUES
(7, 'Drs. Taufik Hidayat, M.T', 'Bimbingan laporan bab 4', '2021-06-02', 3, 1, 183307018, 14, 10),
(9, 'Drs. Taufik Hidayat, M.T', 'Bimbingan laporan BAB 5', '2021-06-02', 3, 1, 183307018, 58, 10),
(10, 'Drs. Taufik Hidayat, M.T', 'Laporan BAB 5', '2021-06-02', 3, 1, 183307018, 912, 10),
(11, 'Drs. Taufik Hidayat, M.T', 'Pengujian aplikasi', '2021-06-02', 3, 1, 183307018, 1316, 10);

-- --------------------------------------------------------

--
-- Table structure for table `bks_bahasa`
--

CREATE TABLE `bks_bahasa` (
  `id_bks_bhs` int(11) NOT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `nama_bhs` varchar(20) DEFAULT NULL,
  `skor` varchar(10) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `sk_bahasa` varchar(100) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_bahasa`
--

INSERT INTO `bks_bahasa` (`id_bks_bhs`, `periode`, `tahun`, `nama_bhs`, `skor`, `tanggal`, `sk_bahasa`, `nim`, `status`, `id_prodi`) VALUES
(3, '2020/2021 Genap', '2021', 'Bahasa Inggris', '577', '2021-05-28', 'bks_bahasa-2105291.pdf', 183307020, 0, 21),
(5, '2020/2021 Genap', '2021', 'Bahasa Inggris', '600', '2021-06-08', 'bks_bahasa-2106081.jpg', 183307018, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bks_keterampilan`
--

CREATE TABLE `bks_keterampilan` (
  `id_bks_ket` int(11) NOT NULL,
  `nama_ket` varchar(20) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `sk_ket` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_keterampilan`
--

INSERT INTO `bks_keterampilan` (`id_bks_ket`, `nama_ket`, `jenis`, `tingkat`, `sk_ket`, `status`, `id_prodi`, `nim`) VALUES
(4, 'Menyanyi', 'Teknis/Akademis (Hardskill)', 'Menengah', 'bks_keterampilan-2106081.jpg', 3, 20, 183307018),
(5, 'Menari', 'Teknis/Akademis (Hardskill)', 'Menengah', 'bks_keterampilan-2106082.jpg', 0, 21, 183307020);

-- --------------------------------------------------------

--
-- Table structure for table `bks_organisasi`
--

CREATE TABLE `bks_organisasi` (
  `id_bks_org` int(11) NOT NULL,
  `nama_org` varchar(50) DEFAULT NULL,
  `tempat` varchar(250) DEFAULT NULL,
  `tahun_masuk` varchar(10) DEFAULT NULL,
  `tahun_keluar` varchar(10) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `sk_org` varchar(100) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_organisasi`
--

INSERT INTO `bks_organisasi` (`id_bks_org`, `nama_org`, `tempat`, `tahun_masuk`, `tahun_keluar`, `jabatan`, `sk_org`, `nim`, `status`, `id_prodi`) VALUES
(3, 'Himpunan Mahasiswa Jurusan Teknik', 'Politeknik Negeri Madiun', '2020', '2021', 'Bendahara', 'bks_organisasi-210608.jpg', 183307018, 3, 20),
(4, 'Himpunan Mahasiswa Jurusan Administrasi Bisnis', 'Politeknik Negeri Madiun', '2020', '2021', 'Sekretaris', 'bks_organisasi-2106081.jpg', 183307020, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `bks_pkl`
--

CREATE TABLE `bks_pkl` (
  `id_bks_pkl` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `provinsi` varchar(20) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ringkasan` varchar(200) DEFAULT NULL,
  `sk_pkl` varchar(50) DEFAULT NULL,
  `laporan` varchar(50) DEFAULT NULL,
  `nim` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_pkl`
--

INSERT INTO `bks_pkl` (`id_bks_pkl`, `judul`, `tempat`, `provinsi`, `kota`, `tanggal`, `ringkasan`, `sk_pkl`, `laporan`, `nim`, `status`, `id_prodi`) VALUES
(4, 'Apliaksi Android Untuk Monitoring', 'PT Indonesia IT', 'Jawa Tengah', 'Yogyakarta', '2021-05-30', 'PKL adalah untuk membantu dalam mencari pengalaman kerja', 'bks_pkl-210530.pdf', 'bks_pkl-2105301.pdf', 183307018, 0, 20),
(5, 'Aplikasi Penggajian berbasis web', 'Politeknik Negeri Madiun', 'Jawa Timur', 'Madiun', '2021-06-08', 'Praktek Kerja Lapangan', 'bks_pkl-2106081.jpg', 'bks_pkl-2106081.pdf', 183307020, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `bks_prestasi`
--

CREATE TABLE `bks_prestasi` (
  `id_bks_prestasi` int(11) NOT NULL,
  `nama_lomba` varchar(50) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `juara` varchar(20) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `piagam` varchar(100) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_prestasi`
--

INSERT INTO `bks_prestasi` (`id_bks_prestasi`, `nama_lomba`, `tahun`, `juara`, `tingkat`, `jenis`, `piagam`, `nim`, `status`, `id_prodi`) VALUES
(3, 'Kontes IT', '2019', 'Juara 2', 'Lokal', 'Individu', 'bks_prestasi-210608.jpg', 183307018, 3, 20),
(4, 'Kontes Elektrik', '2021', 'Juara 1', 'Internasional', 'Kelompok', 'bks_prestasi-2106081.jpg', 183307020, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `bks_seminar`
--

CREATE TABLE `bks_seminar` (
  `id_bks_seminar` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `berita_acara` varchar(225) DEFAULT NULL,
  `persetujuan` varchar(225) DEFAULT NULL,
  `proposal` varchar(225) DEFAULT NULL,
  `presentasi` varchar(225) DEFAULT NULL,
  `monitoring` varchar(225) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_seminar`
--

INSERT INTO `bks_seminar` (`id_bks_seminar`, `nim`, `id_prodi`, `berita_acara`, `persetujuan`, `proposal`, `presentasi`, `monitoring`, `status`, `id_user`) VALUES
(47, 183307019, 20, 'bks_seminar-2105215.pdf', 'bks_seminar-2105216.pdf', 'bks_seminar-2105217.pdf', 'bks_seminar-2105218.pdf', 'bks_seminar-2105219.pdf', 3, NULL),
(48, 183307020, 21, 'bks_seminar-210526.pdf', 'bks_seminar-2105261.pdf', 'bks_seminar-2105262.pdf', 'bks_seminar-2105263.pdf', 'bks_seminar-2105264.pdf', 0, NULL),
(54, 183307018, 20, 'bks_seminar-210608.docx', 'bks_seminar-210608.pdf', 'bks_seminar-2106081.pdf', 'bks_seminar-2106082.pdf', 'bks_seminar-2106083.pdf', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bks_sidang`
--

CREATE TABLE `bks_sidang` (
  `id_bks_sidang` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `ukt` int(11) DEFAULT NULL,
  `proposal` varchar(225) DEFAULT NULL,
  `pkkmb` varchar(225) DEFAULT NULL,
  `pengesahan` varchar(225) DEFAULT NULL,
  `monitoring` varchar(225) DEFAULT NULL,
  `persetujuan` varchar(225) DEFAULT NULL,
  `progress` varchar(225) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_sidang`
--

INSERT INTO `bks_sidang` (`id_bks_sidang`, `nim`, `ukt`, `proposal`, `pkkmb`, `pengesahan`, `monitoring`, `persetujuan`, `progress`, `status`, `id_user`, `id_prodi`) VALUES
(5, 183307019, NULL, 'bks_sidang-2105265.pdf', 'bks_sidang-2105266.pdf', 'bks_sidang-2105267.pdf', 'bks_sidang-2105268.pdf', 'bks_sidang-2105269.pdf', NULL, 2, NULL, 20),
(6, 183307020, NULL, 'bks_sidang-21052610.pdf', 'bks_sidang-21052611.pdf', 'bks_sidang-21052612.pdf', 'bks_sidang-21052613.pdf', 'bks_sidang-21052614.pdf', NULL, 2, NULL, 21),
(8, 183307018, NULL, 'bks_sidang-210608.pdf', 'bks_sidang-2106081.pdf', 'bks_sidang-2106082.pdf', 'bks_sidang-2106083.pdf', 'bks_sidang-2106084.pdf', NULL, 0, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bks_wisuda`
--

CREATE TABLE `bks_wisuda` (
  `id_bks_wisuda` int(11) NOT NULL,
  `file_ta` varchar(225) DEFAULT NULL,
  `jurnal` varchar(225) DEFAULT NULL,
  `lap_ta_prodi` varchar(225) DEFAULT NULL,
  `aplikasi` varchar(225) DEFAULT NULL,
  `ppt` varchar(225) DEFAULT NULL,
  `video` varchar(225) DEFAULT NULL,
  `foto_ijazah` varchar(225) DEFAULT NULL,
  `foto_wisuda` varchar(225) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bks_wisuda`
--

INSERT INTO `bks_wisuda` (`id_bks_wisuda`, `file_ta`, `jurnal`, `lap_ta_prodi`, `aplikasi`, `ppt`, `video`, `foto_ijazah`, `foto_wisuda`, `nim`, `status`, `id_prodi`) VALUES
(7, 'bks_wisuda-2106086.pdf', 'bks_wisuda-2106087.pdf', 'bks_wisuda-2106088.pdf', 'bks_wisuda-2106089.pdf', 'bks_wisuda-21060810.pdf', 'bks_wisuda-21060811.pdf', 'bks_wisuda-2106082.jpg', 'bks_wisuda-2106083.jpg', 183307020, 0, 7),
(8, 'bks_wisuda-21060812.pdf', 'bks_wisuda-21060813.pdf', 'bks_wisuda-21060814.pdf', 'bks_wisuda-21060815.pdf', 'bks_wisuda-21060816.pdf', 'bks_wisuda-21060817.pdf', 'bks_wisuda-2106084.jpg', 'bks_wisuda-2106085.jpg', 183307018, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `id_pengirim` int(55) NOT NULL,
  `isi_pesan` text NOT NULL,
  `file` text NOT NULL,
  `id_mahasiswabimbingan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `pengirim`, `id_pengirim`, `isi_pesan`, `file`, `id_mahasiswabimbingan`, `tanggal`, `level`) VALUES
(1, 1, 1, 'Assalamualaikum pak saya mau bimbingan', '', 1, '2021-05-09 07:52:52', 0),
(2, 4, 4, 'Iya silahkan', '', 1, '2021-05-09 07:53:26', 1),
(3, 9, 9, 'Kirimkan progres laporan', '', 1, '2021-05-09 07:54:07', 1),
(4, 1, 1, 'Bimbingan tugas akhir bab 1', '', 1, '2021-05-21 14:33:50', 0),
(5, 4, 4, 'Kirimkan laporan bab 1', '', 1, '2021-05-21 14:35:42', 1),
(6, 10, 10, 'oke', '', 1, '2021-05-21 14:40:32', 1),
(7, 1, 1, 'Laporan bab 4', '', 1, '2021-06-08 23:25:49', 0),
(8, 4, 4, 'tes', '', 1, '2021-06-13 16:32:03', 1),
(9, 4, 4, 'tes', '', 1, '2021-06-13 16:34:50', 1),
(10, 4, 4, 'tes', '', 1, '2021-06-13 16:35:07', 1),
(11, 4, 4, 'tes', '', 1, '2021-06-13 16:41:54', 1),
(12, 4, 4, 'tes', '', 1, '2021-06-13 16:45:46', 1),
(13, 4, 4, 'tes', '', 1, '2021-06-13 16:48:22', 1),
(14, 4, 4, 'tes', '', 1, '2021-06-13 16:48:37', 1),
(15, 4, 4, 'tse', '', 1, '2021-06-13 16:48:53', 1),
(16, 4, 4, 'tse', '', 1, '2021-06-13 16:50:20', 1),
(17, 4, 4, 'tse', '', 1, '2021-06-13 16:51:29', 1),
(18, 4, 4, 'tse', '', 1, '2021-06-13 16:54:06', 1),
(19, 4, 4, 'tse', '', 1, '2021-06-13 16:54:14', 1),
(20, 4, 4, 'tse', '', 1, '2021-06-13 16:54:42', 1),
(21, 4, 4, 'tse', '', 1, '2021-06-13 16:54:53', 1),
(22, 4, 4, 'hi', '', 1, '2021-06-13 16:55:09', 1),
(23, 4, 4, 'hi', '', 1, '2021-06-13 16:56:00', 1),
(24, 4, 4, 'hi', '', 1, '2021-06-13 16:57:02', 1),
(25, 4, 4, 'hi', '', 1, '2021-06-13 16:57:19', 1),
(26, 4, 4, 'hi', '', 1, '2021-06-13 16:57:28', 1),
(27, 4, 4, 'hi', '', 1, '2021-06-13 17:01:15', 1),
(28, 4, 4, 'hi', '', 1, '2021-06-13 17:01:44', 1),
(29, 4, 4, 'hi', '', 1, '2021-06-13 17:06:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bimbingan`
--

CREATE TABLE `detail_bimbingan` (
  `id_solusi` int(11) NOT NULL,
  `bimbingan_id` int(11) DEFAULT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bimbingan`
--

INSERT INTO `detail_bimbingan` (`id_solusi`, `bimbingan_id`, `solusi`) VALUES
(12, 9, 'Ganti database saja yang sekiranya bisa digunakan dengan baik'),
(4, 2, '0'),
(5, 2, 'kkk'),
(6, 2, 'seharusnya bisa'),
(7, 2, 'oke'),
(8, 2, 'ss'),
(9, 2, 'dd'),
(10, 4, 'oye'),
(11, 6, 'Masalah nya apa'),
(13, 10, 'Ganti database saja'),
(14, 11, 'Dalam tahap koreksi sebentar ya'),
(15, 14, 'Cari saja yang gratis'),
(16, 13, 'Dibenahi dulu error nya'),
(17, 12, 'Diselidiki dulu'),
(18, 15, 'malah nyanyi'),
(19, 23, 'Iya dicoba'),
(20, 24, 'Lanjutkan BAB 2'),
(21, 25, 'Lanjutkan laporan BAB 3'),
(22, 27, 'Lanjutkan bab 5'),
(23, 36, 'Lanjutkan BAB 5'),
(24, 36, 'asasasasa'),
(25, 41, 'Ya dikerjakan to'),
(26, 42, 'Benahi database tersebut'),
(27, 45, 'Lanjutkan BAB 2'),
(28, 46, 'Lanjutkan BAB 2'),
(29, 47, 'Lanjutkan BAB 3'),
(30, 49, 'people with a diverse culture. Majority ethnic groups in Singapore are Chinese, Malay, and Indian. Singapore Independence Day was on the 9th of August 1965. Merlion Statue is the official mascot of Singapore. Singapore is famous for its Garden by the Bay, Marina Bay Sands, dan Orchard Road (description).'),
(31, 48, 'people with a diverse culture. Majority ethnic groups in Singapore are Chinese, Malay, and Indian. Singapore Independence Day was on the 9th of August 1965. Merlion Statue is the official mascot of Singapore. Singapore is famous for its Garden by the Bay, Marina Bay Sands, dan Orchard Road (description).'),
(32, 56, 'Lanjutkan pembuatan kata pengantar'),
(33, 50, 'Lanjutkan bab 4'),
(34, 51, 'Diperbaiki'),
(35, 57, 'Lanjutkan BAB 4'),
(36, 60, 'Lanjutkan pembuatan motto'),
(37, 61, 'Pengujian sistem menggunakan black box'),
(38, 62, 'Lanjutkan'),
(39, 63, 'Lanjutkan'),
(40, 64, 'ok'),
(41, 58, 'Lanjutkan pembuatan laporan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bimbingan2`
--

CREATE TABLE `detail_bimbingan2` (
  `id_solusi2` int(11) NOT NULL,
  `bimbingan_id` int(11) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bimbingan2`
--

INSERT INTO `detail_bimbingan2` (`id_solusi2`, `bimbingan_id`, `solusi`) VALUES
(1, 2, 'lanjutkan'),
(2, 1, 'lanjutkan'),
(3, 1, 'ok'),
(4, 7, 'lanjutkan bimbingan laporan bab 5'),
(5, 9, 'OK'),
(6, 10, 'okk'),
(7, 11, 'lanjutkan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_topik`
--

CREATE TABLE `detail_topik` (
  `id_detail` int(11) NOT NULL,
  `topik_id` int(11) DEFAULT NULL,
  `komentar` text NOT NULL,
  `waktu_komentar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_topik`
--

INSERT INTO `detail_topik` (`id_detail`, `topik_id`, `komentar`, `waktu_komentar`) VALUES
(1, 6, 'bagus', '2021-04-23'),
(2, NULL, 'mantap', '2021-04-23'),
(3, NULL, 'mantap', '2021-04-23'),
(4, 7, 'mantap', '2021-04-23'),
(5, 1, 'Topik yang bagus', '2021-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama`, `email`, `no_hp`, `level`) VALUES
(20, 197001221995121002, 'Rudy Yuni Widiyatmoko, M.Sc.', NULL, '09876543211', 3),
(23, 100099876545882882, 'Drs. Refrizal Amir, S.T., M.T.', NULL, '085796120150', 3),
(24, 123456789097, 'Riswanda, S.T., M.Eng.', NULL, '0987654321', 4),
(25, 1234567890900, 'Drs. Taufik Hidayat, M.T', NULL, '0987654389', 3),
(26, 1234567890900, 'Angga Yunanda', '', '0987654321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_seminar`
--

CREATE TABLE `jadwal_seminar` (
  `id_jd_seminar` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `jdw_seminar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_seminar`
--

INSERT INTO `jadwal_seminar` (`id_jd_seminar`, `nim`, `jdw_seminar`) VALUES
(14, 183307020, '2021-06-08 09:00:00'),
(15, 183307018, '2021-06-08 09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id_jd_sidang` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `jdw_sidang` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_sidang`
--

INSERT INTO `jadwal_sidang` (`id_jd_sidang`, `nim`, `jdw_sidang`) VALUES
(6, 183307018, '2021-06-08 09:00:00'),
(5, 183307020, '2021-06-08 05:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(5) DEFAULT NULL,
  `nama_jurusan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, NULL, 'Administrasi Bisnis'),
(2, NULL, 'Komputer Akuntansi'),
(6, NULL, 'Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nama` varchar(50) DEFAULT NULL,
  `nim` int(11) NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `laporan_perpus` int(11) DEFAULT NULL,
  `tanggungan_perpus` int(11) DEFAULT NULL,
  `ukt` int(11) DEFAULT NULL,
  `pinjaman_alat` int(11) DEFAULT NULL,
  `angkatan` varchar(20) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nama`, `nim`, `id_prodi`, `id_jurusan`, `alamat`, `hp`, `ttl`, `laporan_perpus`, `tanggungan_perpus`, `ukt`, `pinjaman_alat`, `angkatan`, `level`) VALUES
('Ratna Yuniar Ardiasari', 183307018, NULL, NULL, 'Jl. Pahlawan No.32', '0897654321', 'Madiun, 32 Juli 2000', 2, 2, 2, 2, '2019-2020', 2),
('Adhisty Zara', 183307019, NULL, NULL, 'Jl. Salak N0.32 RT.01 RW.02 Kec.Mejayan Kab.Madiun', '08734567890', 'Surabaya, 07 Juni 1999', 2, 2, 2, 2, '2019-2020', 2),
('Tasya Farasya', 183307020, NULL, NULL, 'Jl.Anggrek NO.76 RT.03 RW.05 Kec.Mejayan Kab.Madiun', '089765432123', 'Malang, 12 Februari 2000', 0, 0, 0, 0, '2019-2020', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_seminar`
--

CREATE TABLE `nilai_seminar` (
  `id_nilai_seminar` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `perumusan` int(11) DEFAULT NULL,
  `teori` int(11) DEFAULT NULL,
  `pemecahan` int(11) DEFAULT NULL,
  `penulisan` int(11) DEFAULT NULL,
  `pustaka` int(11) DEFAULT NULL,
  `rata` float DEFAULT NULL,
  `presentasi` int(11) DEFAULT NULL,
  `penguasaan` int(11) DEFAULT NULL,
  `nilai_akhir` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_seminar`
--

INSERT INTO `nilai_seminar` (`id_nilai_seminar`, `id_dosen`, `id_mahasiswa`, `perumusan`, `teori`, `pemecahan`, `penulisan`, `pustaka`, `rata`, `presentasi`, `penguasaan`, `nilai_akhir`) VALUES
(48, 23, 1, 80, 80, 80, 80, 80, 80, 80, 80, 560),
(50, 23, 11, 90, 100, 90, 90, 90, 91.43, 90, 90, 640),
(51, 20, 1, 100, 100, 100, 100, 100, 100, 100, 100, 700);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sidang`
--

CREATE TABLE `nilai_sidang` (
  `id_nilai_sidang` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `perumusan` int(11) NOT NULL,
  `teori` int(11) NOT NULL,
  `pemecahan` int(11) NOT NULL,
  `penulisan` int(11) NOT NULL,
  `pustaka` int(11) NOT NULL,
  `karya` int(11) NOT NULL,
  `presentasi` int(11) NOT NULL,
  `penguasaan` int(11) NOT NULL,
  `rata` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_sidang`
--

INSERT INTO `nilai_sidang` (`id_nilai_sidang`, `id_dosen`, `id_mahasiswa`, `perumusan`, `teori`, `pemecahan`, `penulisan`, `pustaka`, `karya`, `presentasi`, `penguasaan`, `rata`, `nilai_akhir`) VALUES
(8, 23, 11, 80, 80, 80, 80, 80, 80, 80, 80, 80, 640),
(9, 25, 11, 90, 90, 90, 90, 90, 90, 90, 90, 90, 720);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `pembimbing1` varchar(100) DEFAULT NULL,
  `pembimbing2` varchar(100) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `idpembimbing1` int(11) DEFAULT NULL,
  `idpembimbing2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `pembimbing1`, `pembimbing2`, `id_mahasiswa`, `idpembimbing1`, `idpembimbing2`) VALUES
(50, '24', '20', 183307018, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `id_penguji` int(11) NOT NULL,
  `penguji1` varchar(100) DEFAULT NULL,
  `penguji2` varchar(100) DEFAULT NULL,
  `penguji3` varchar(100) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_penguji1` int(11) DEFAULT NULL,
  `id_penguji2` int(11) DEFAULT NULL,
  `id_penguji3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji`
--

INSERT INTO `penguji` (`id_penguji`, `penguji1`, `penguji2`, `penguji3`, `id_mahasiswa`, `id_penguji1`, `id_penguji2`, `id_penguji3`) VALUES
(27, '3', '4', '9', 1, NULL, NULL, NULL),
(28, '3', '4', '9', 11, NULL, NULL, NULL),
(29, '2', '3', '4', 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penguji_sidang`
--

CREATE TABLE `penguji_sidang` (
  `id_penguji_sidang` int(11) NOT NULL,
  `penguji1` int(11) NOT NULL,
  `penguji2` int(11) NOT NULL,
  `penguji3` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_penguji1` int(11) NOT NULL,
  `id_penguji2` int(11) NOT NULL,
  `id_penguji3` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji_sidang`
--

INSERT INTO `penguji_sidang` (`id_penguji_sidang`, `penguji1`, `penguji2`, `penguji3`, `id_mahasiswa`, `id_penguji1`, `id_penguji2`, `id_penguji3`) VALUES
(2, 4, 9, 10, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `nama_prodi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_jurusan`, `kode_prodi`, `nama_prodi`) VALUES
(20, 6, NULL, 'Teknik Listrik'),
(21, 6, NULL, 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `latar_belakang` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `rumusan_masalah` text NOT NULL,
  `batasan_masalah` text NOT NULL,
  `tujuan` text NOT NULL,
  `teori` text NOT NULL,
  `metode` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `latar_belakang`, `id_user`, `rumusan_masalah`, `batasan_masalah`, `tujuan`, `teori`, `metode`) VALUES
(10, '<ol>\r\n	<li style=\"text-align: justify;\">Politeknik Negeri Madiun (PNM) adalah salah satu penyelenggara pendidikan vokasi dalam beberapa bidang pengetahuan dan keahlian khusus. Dengan lambang PNM yang memiliki makna dengan dilandasi keteguhan dan keluhuran, PNM bertekad mewujudkan insan yang memiliki profesionalisme dalam bidang ilmu pengetahuan dan teknologi. Proses pembelajaran pada bidang hard skill dicapai melalui penerapan konsep learning by doing yang mengkolaborasikan teori dan praktek yang disampaikan melalui Kurikulum Berbasis Kompetensi (PNM, 2015).</li>\r\n	<li style=\"text-align: justify;\">Tugas Akhir (TA) adalah salah satu bentuk karya tulis ilmiah yang dibuat oleh mahasiswa tahap akhir pada masa studinya. Tugas Akhir dibuat berdasarkan hasil penelitian kajian terhadap suatu masalah yang diperoleh pada saat melaksanakan PKL (Praktik Kerja Lapangan), atau masalahan nyata yang lainnya (Susanto, 2014).</li>\r\n</ol>\r\n', 1, '1. Bagaimana membangun Sistem Informasi Tugas Akhir yang dapat\r\nmemfasilitasi dosen dan mahasiswa dalam melaksanakan Tugas Akhir?\r\n2. Bagaimana membangun Sistem Informasi Tugas Akhir menggunakan\r\nframework CodeIgniter?', '1. Sistem Informasi Tugas Akhir merupakan aplikasi berbasis web\r\nmenggunakan framework CodeIgniter.\r\n2. Sistem Informasi Tugas Akhir ini hanya digunakan dalam lingkup\r\nPoliteknik Negeri Madiun.', 'Tujuan dari Tugas Akhir ini adalah menghasilkan Sistem Informasi\r\nTugas Akhir Berbasis Web yang dapat digunakan untuk memfasilitasi dosen\r\ndan mahasiswa yang sedang melaksanakan Tugas Akhir.', '1. Tinjauan Pustaka\r\na. Sistem Informasi Bimbingan Skripsi Berbasis Web di Universitas Pelita\r\nHarapan\r\nSistem informasi yang dibangun ini menggunakan bahasa\r\npemrograman PHP, database MySQL dan tampilan yang lebih menarik\r\nagar memudahkan pengguna dalam mengoperasikan. Selain itu sistem\r\ninformasi ini dirancang dan dibangun untuk membantu keefektivan\r\nproses bimbingan (Kusuma, 2018).', 'Metode yang digunakan dalam penelitian ini adalah waterfall. Metode\r\nWaterfall adalah metode penelitian yang sering disebut siklus hidup klasik\r\n(classic life cycle), hal ini menjelaskan tentang pendekatan yang terstruktur\r\ndan juga urut pada pengembangan software, diawali dengan perincian\r\nkebutuhan pengguna kemudian berlanjut melalui tahapan persiapan ');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Mahasiswa'),
(3, 'Dosen'),
(4, 'Kaprodi'),
(5, 'Keuangan'),
(6, 'Perpustakaan'),
(7, 'BAAK'),
(8, 'LAB'),
(9, 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id_topik` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `bidang` varchar(20) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `lokasi` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id_topik`, `nim`, `bidang`, `judul`, `lokasi`, `status`, `id_user`, `deskripsi`, `id_prodi`) VALUES
(4, 183307019, 'Android', 'Aplikasi pembelajaran anak SD', 'Kota Madiun', 0, NULL, 'Aplikasi pembelajaran yang digunkaan untuk belajar matematika,ips,dan pkn', 21),
(5, 183307020, 'Alat', 'Alat pendeteksi banjir', 'Kota Madiun, Kec Tam', 0, NULL, 'Alat untuk mendeteksi kadar banjir', 20),
(17, 183307018, 'Web', 'Aplikasi pengelolaan stok barang', 'Pasar', 0, NULL, 'Aplikasi untuk mengelola data barang', 20),
(18, 183307018, 'Web', 'Sistem informasi penjualan buku', 'Pasar', 0, NULL, 'Sistem informasi untuk mencatat penjualan buku', 0),
(19, 183307018, 'Web', 'Aplikasi penjualan', 'Dinas tenaga kerja', 0, 1, 'Aplikasi hitung penjualan', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `id_dosen` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `id_role`, `aktif`, `id_prodi`, `id_jurusan`, `nim`, `id_dosen`) VALUES
(1, 'mahasiswa1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 20, 6, 183307018, NULL),
(2, 'adminti@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 20, 3, NULL, 26),
(3, 'kaprodi1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 20, 3, NULL, 24),
(4, 'dosen@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 20, 3, NULL, 20),
(5, 'mahasiswa2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 14, 1, 183307019, NULL),
(6, 'perpus1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, NULL, NULL, NULL, NULL),
(7, 'keuangan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, NULL, NULL, NULL, NULL),
(8, 'lab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, NULL, NULL, NULL, NULL),
(9, 'dosen2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 20, NULL, NULL, 23),
(10, 'dosen3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 21, NULL, NULL, 25),
(11, 'mahasiswa3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 20, 6, 183307020, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `bimbingan2`
--
ALTER TABLE `bimbingan2`
  ADD PRIMARY KEY (`id_bimbingan2`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `bks_bahasa`
--
ALTER TABLE `bks_bahasa`
  ADD PRIMARY KEY (`id_bks_bhs`);

--
-- Indexes for table `bks_keterampilan`
--
ALTER TABLE `bks_keterampilan`
  ADD PRIMARY KEY (`id_bks_ket`);

--
-- Indexes for table `bks_organisasi`
--
ALTER TABLE `bks_organisasi`
  ADD PRIMARY KEY (`id_bks_org`);

--
-- Indexes for table `bks_pkl`
--
ALTER TABLE `bks_pkl`
  ADD PRIMARY KEY (`id_bks_pkl`);

--
-- Indexes for table `bks_prestasi`
--
ALTER TABLE `bks_prestasi`
  ADD PRIMARY KEY (`id_bks_prestasi`);

--
-- Indexes for table `bks_seminar`
--
ALTER TABLE `bks_seminar`
  ADD PRIMARY KEY (`id_bks_seminar`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `bks_sidang`
--
ALTER TABLE `bks_sidang`
  ADD PRIMARY KEY (`id_bks_sidang`);

--
-- Indexes for table `bks_wisuda`
--
ALTER TABLE `bks_wisuda`
  ADD PRIMARY KEY (`id_bks_wisuda`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `detail_bimbingan`
--
ALTER TABLE `detail_bimbingan`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `detail_bimbingan2`
--
ALTER TABLE `detail_bimbingan2`
  ADD PRIMARY KEY (`id_solusi2`);

--
-- Indexes for table `detail_topik`
--
ALTER TABLE `detail_topik`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jadwal_seminar`
--
ALTER TABLE `jadwal_seminar`
  ADD PRIMARY KEY (`id_jd_seminar`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD PRIMARY KEY (`id_jd_sidang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `nilai_seminar`
--
ALTER TABLE `nilai_seminar`
  ADD PRIMARY KEY (`id_nilai_seminar`);

--
-- Indexes for table `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  ADD PRIMARY KEY (`id_nilai_sidang`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id_penguji`),
  ADD KEY `penguji1` (`penguji1`),
  ADD KEY `penguji2` (`penguji2`);

--
-- Indexes for table `penguji_sidang`
--
ALTER TABLE `penguji_sidang`
  ADD PRIMARY KEY (`id_penguji_sidang`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `bimbingan2`
--
ALTER TABLE `bimbingan2`
  MODIFY `id_bimbingan2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bks_bahasa`
--
ALTER TABLE `bks_bahasa`
  MODIFY `id_bks_bhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bks_keterampilan`
--
ALTER TABLE `bks_keterampilan`
  MODIFY `id_bks_ket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bks_organisasi`
--
ALTER TABLE `bks_organisasi`
  MODIFY `id_bks_org` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bks_pkl`
--
ALTER TABLE `bks_pkl`
  MODIFY `id_bks_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bks_prestasi`
--
ALTER TABLE `bks_prestasi`
  MODIFY `id_bks_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bks_seminar`
--
ALTER TABLE `bks_seminar`
  MODIFY `id_bks_seminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `bks_sidang`
--
ALTER TABLE `bks_sidang`
  MODIFY `id_bks_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bks_wisuda`
--
ALTER TABLE `bks_wisuda`
  MODIFY `id_bks_wisuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_bimbingan`
--
ALTER TABLE `detail_bimbingan`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `detail_bimbingan2`
--
ALTER TABLE `detail_bimbingan2`
  MODIFY `id_solusi2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_topik`
--
ALTER TABLE `detail_topik`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jadwal_seminar`
--
ALTER TABLE `jadwal_seminar`
  MODIFY `id_jd_seminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id_jd_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_seminar`
--
ALTER TABLE `nilai_seminar`
  MODIFY `id_nilai_seminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  MODIFY `id_nilai_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id_penguji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `penguji_sidang`
--
ALTER TABLE `penguji_sidang`
  MODIFY `id_penguji_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_seminar`
--
ALTER TABLE `jadwal_seminar`
  ADD CONSTRAINT `jadwal_seminar_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
