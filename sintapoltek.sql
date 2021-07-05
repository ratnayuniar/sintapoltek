-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 03.57
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `masalah` text DEFAULT NULL,
  `solusi` text NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `status_dosen` tinyint(1) NOT NULL,
  `jenis` varchar(7) NOT NULL,
  `file` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_dosen`, `nim`, `masalah`, `solusi`, `tanggal`, `status`, `status_dosen`, `jenis`, `file`) VALUES
(21, 20, 183307018, 'Laporan BAB 5', 'Melanjutkan selanjutnya', '2021-06-30', 3, 1, 'seminar', 'bks_bimbingan-210629.pdf'),
(22, 23, 183307018, 'Laporan Bab 4', 'Melanjutkan', '2021-07-10', 3, 2, 'seminar', 'bks_bimbingan-2106291.pdf'),
(24, 23, 183307018, 'Bimbingan kesimpulan', '', '2021-07-21', 0, 2, 'ta', ''),
(27, 20, 183307018, 'Bimbingan laporan BAB 5', '', '2021-07-28', 0, 1, 'ta', 'kkkkkk'),
(28, 25, 183307018, 'Laporan BAB 5', '', '2021-07-03', 0, 1, 'seminar', 'bks_bimbingan-210702'),
(29, 32, 183307018, 'Kesimpulan', '', '2021-07-30', 0, 2, 'seminar', 'bks_bimbingan-210702');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bks_bahasa`
--

CREATE TABLE `bks_bahasa` (
  `id_bks_bhs` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `nama_bhs` varchar(20) DEFAULT NULL,
  `skor` varchar(10) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `sk_bahasa` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bks_bahasa`
--

INSERT INTO `bks_bahasa` (`id_bks_bhs`, `nim`, `periode`, `tahun`, `nama_bhs`, `skor`, `tanggal`, `sk_bahasa`, `status`) VALUES
(5, 183307018, '2020/2021 Genap', '2021', 'Bahasa Inggris', '600', '2021-06-26', 'bks_bahasa-210626.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bks_keterampilan`
--

CREATE TABLE `bks_keterampilan` (
  `id_bks_ket` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_ket` varchar(20) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `sk_ket` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bks_keterampilan`
--

INSERT INTO `bks_keterampilan` (`id_bks_ket`, `nim`, `nama_ket`, `jenis`, `tingkat`, `sk_ket`, `status`) VALUES
(8, 183307018, 'Web Developer', 'Teknis/Akademis (Hardskill)', 'Dasar', 'bks_keterampilan-210625.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bks_organisasi`
--

CREATE TABLE `bks_organisasi` (
  `id_bks_org` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_org` varchar(50) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tahun_masuk` varchar(4) DEFAULT NULL,
  `tahun_keluar` varchar(4) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `sk_org` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bks_organisasi`
--

INSERT INTO `bks_organisasi` (`id_bks_org`, `nim`, `nama_org`, `tempat`, `tahun_masuk`, `tahun_keluar`, `jabatan`, `sk_org`, `status`) VALUES
(6, 183307018, 'Himpunan Mahasiswa Jurusan Teknik', 'Politeknik Negeri Madiun', '2020', '2021', 'Ketua', 'bks_organisasi-210625.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bks_pkl`
--

CREATE TABLE `bks_pkl` (
  `id_bks_pkl` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ringkasan` text DEFAULT NULL,
  `sk_pkl` varchar(30) DEFAULT NULL,
  `laporan` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bks_pkl`
--

INSERT INTO `bks_pkl` (`id_bks_pkl`, `nim`, `judul`, `tempat`, `provinsi`, `kota`, `tanggal`, `ringkasan`, `sk_pkl`, `laporan`, `status`) VALUES
(8, 183307018, 'Kampung Pesilat Madiun', 'PT Indonesia IT', 'Jawa Tengah', 'Yogyakarta', '0000-00-00', 'hhhh', 'bks_pkl-210625.jpg', 'bks_pkl-210625.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bks_prestasi`
--

CREATE TABLE `bks_prestasi` (
  `id_bks_prestasi` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_lomba` varchar(50) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `juara` varchar(20) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `piagam` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bks_prestasi`
--

INSERT INTO `bks_prestasi` (`id_bks_prestasi`, `nim`, `nama_lomba`, `tahun`, `juara`, `tingkat`, `jenis`, `piagam`, `status`) VALUES
(6, 183307018, 'Kontes Elektro', '2021', 'JUARA 1', 'Regional', 'Individu', 'bks_prestasi-210625.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bks_wisuda`
--

CREATE TABLE `bks_wisuda` (
  `id_bks_wisuda` int(11) NOT NULL,
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
  `status_file_ta` tinyint(1) DEFAULT NULL,
  `status_jurnal` tinyint(1) DEFAULT NULL,
  `status_lap_ta` tinyint(1) DEFAULT NULL,
  `status_aplikasi` tinyint(1) DEFAULT NULL,
  `status_ppt` tinyint(1) DEFAULT NULL,
  `status_video` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bks_wisuda`
--

INSERT INTO `bks_wisuda` (`id_bks_wisuda`, `nim`, `file_ta`, `jurnal`, `lap_ta_prodi`, `aplikasi`, `ppt`, `video`, `foto_ijazah`, `foto_wisuda`, `status`, `laporan_perpus`, `tanggungan_perpus`, `ukt`, `pinjaman_alat`, `status_baak`, `status_file_ta`, `status_jurnal`, `status_lap_ta`, `status_aplikasi`, `status_ppt`, `status_video`) VALUES
(1, 183307018, 'bks_wisuda-2107031.pdf', 'bks_wisuda-2107032.pdf', NULL, 'bks_wisuda-2107033.pdf', 'bks_wisuda-2107034.pdf', 'bks_wisuda-2107035.pdf', NULL, NULL, NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_mahasiswabimbingan` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `file` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `hp` varchar(14) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_prodi`, `email`, `password`, `nip`, `nama`, `hp`, `level`, `aktif`) VALUES
(20, 30, 'rudy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '197001221995121002', 'Rudy Yuni Widiyatmoko, M.Sc.', '6281359997740', 3, 1),
(23, 30, 'refrizal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882882', 'Drs. Refrizal Amir, S.T., M.T.', '6281217226810', 3, 1),
(24, 30, 'riswanda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882999', 'Riswanda, S.T., M.Eng.', '0987654321', 4, 1),
(25, 30, 'taufik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545876546', 'Drs. Taufik Hidayat, M.T', '6281359997740', 3, 1),
(26, 30, 'angga@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882000', 'Angga Yunanda', '0987654321', 1, 1),
(27, 0, 'adminbahasa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '98765423567899925', 'Admin Bahasa', '098789654456', 9, 1),
(28, 0, 'adminperpus@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123456789090099765', 'Admin Perpustakaan', '0987654389', 6, 1),
(29, 0, 'adminlab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9886541467999098', 'Admin Lab', '09876543235', 8, 1),
(30, 0, 'adminkeuangan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890900', 'Admin Keuangan', '0987654389', 5, 1),
(31, 0, 'adminbaak@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123456789090099765', 'Admin BAAK', '098789654456', 7, 1),
(32, 30, 'abimanyu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '100099876545882880', 'Abimanyu S.Kom.M.Kom,', '081234567890', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(8, 'Komputer Akuntansi'),
(9, 'Teknik'),
(10, 'Administrasi Bisnis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `hp` varchar(14) DEFAULT NULL,
  `ttl` varchar(35) DEFAULT NULL,
  `angkatan` varchar(12) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_prodi`, `password`, `nama`, `alamat`, `hp`, `ttl`, `angkatan`, `level`, `aktif`) VALUES
(183307018, 30, '81dc9bdb52d04dc20036dbd8313ed055', 'Ratna Yuniar Ardiasari', 'Jl. Diponegoro No.54 RT.01 RW.02 Kel.Sukoharjo ', '087612345678', 'Madiun, 20 Mei 1998', '2019-2020', 2, 1),
(183307019, 30, '81dc9bdb52d04dc20036dbd8313ed055', 'Uswatun Khasanah', 'Jl. Merpati No.56 Ds. Kaliurang Yogyakarta', '087612345677', 'Madiun, 32 Maret 1999', '2019-2020', 2, 1),
(183307020, 30, NULL, 'Tasya Farasya', 'Jl.Merdeka No. 34 RT.01 RW.08 Kel. Sukajaya Jawa Timur', '08734567890', 'Surabaya, 07 Agustus 1999', '2019-2020', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_ta`
--

CREATE TABLE `master_ta` (
  `id_master_ta` int(11) NOT NULL,
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
  `jadwal_seminar` datetime DEFAULT NULL,
  `jadwal_sidang` datetime DEFAULT NULL,
  `ruang_seminar` varchar(10) DEFAULT NULL,
  `ruang_sidang` varchar(10) DEFAULT NULL,
  `revisi_seminar` varchar(30) DEFAULT NULL,
  `status_seminar` varchar(25) DEFAULT NULL,
  `revisi_sidang` varchar(20) DEFAULT NULL,
  `status_sidang` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_ta`
--

INSERT INTO `master_ta` (`id_master_ta`, `nim`, `pembimbing1`, `pembimbing2`, `penguji1_sempro`, `penguji2_sempro`, `penguji3_sempro`, `penguji1_sidang`, `penguji2_sidang`, `penguji3_sidang`, `judul`, `jadwal_seminar`, `jadwal_sidang`, `ruang_seminar`, `ruang_sidang`, `revisi_seminar`, `status_seminar`, `revisi_sidang`, `status_sidang`) VALUES
(3, 183307018, 20, 23, 20, 23, 24, 24, 25, 32, 'Sistem informasi market place', '2021-07-03 23:06:00', '2021-07-04 06:05:00', 'R.1', 'R.2', 'revisi_seminar-2107034.pdf', 'Lulus Dengan Revisi', 'revisi_sidang-210703', 'Lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sempro`
--

CREATE TABLE `nilai_sempro` (
  `id_nilai_sempro` int(11) NOT NULL,
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
  `nilai_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_sempro`
--

INSERT INTO `nilai_sempro` (`id_nilai_sempro`, `nim`, `id_dosen`, `perumusan`, `teori`, `pemecahan`, `penulisan`, `pustaka`, `presentasi`, `penguasaan`, `rata`, `nilai_akhir`) VALUES
(1, 183307019, 23, 90, 95, 97, 98, 100, 85, 90, 94, 655),
(3, 183307019, 25, 90, 80, 95, 97, 90, 87, 100, 91, 639),
(4, 183307018, 32, 90, 89, 87, 85, 99, 97, 95, 92, 642),
(5, 183307018, 25, 87, 85, 90, 97, 89, 80, 90, 88, 618),
(6, 183307018, 24, 90, 98, 89, 87, 85, 85, 90, 89, 624),
(9, 183307018, 32, 90, 80, 98, 90, 100, 100, 95, 93, 653),
(10, 183307018, 32, 90, 80, 98, 90, 100, 100, 95, 93, 653);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sidang`
--

CREATE TABLE `nilai_sidang` (
  `id_nilai_sidang` int(11) NOT NULL,
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
  `nilai_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_sidang`
--

INSERT INTO `nilai_sidang` (`id_nilai_sidang`, `nim`, `id_dosen`, `perumusan`, `teori`, `pemecahan`, `penulisan`, `pustaka`, `karya`, `presentasi`, `penguasaan`, `rata`, `nilai_akhir`) VALUES
(1, 183307019, 20, 90, 90, 90, 90, 90, 90, 90, 90, 90, 720),
(2, 183307018, 20, 100, 100, 100, 100, 100, 100, 100, 100, 100, 800);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_prodi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
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
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `latar_belakang` text DEFAULT NULL,
  `rumusan_masalah` text DEFAULT NULL,
  `batasan_masalah` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `teori` text DEFAULT NULL,
  `metode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `nim`, `latar_belakang`, `rumusan_masalah`, `batasan_masalah`, `tujuan`, `teori`, `metode`) VALUES
(23, 183307018, '<p>halo</p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></span></p>\r\n', '<ol>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Membuat aplikasi yang bagus untuk di baca</span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Menerapkan prinsip coding yang benar</span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Mempunyai nilai yang berharga</span></span></li>\r\n</ol>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</span></span></p>\r\n'),
(24, 183307018, '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></span></p>\r\n', '<ol>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Membuat aplikasi yang bagus untuk di baca</span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Menerapkan prinsip coding yang benar</span></span></li>\r\n	<li><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Mempunyai nilai yang berharga</span></span></li>\r\n</ol>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</span></span></p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `revisi`
--

CREATE TABLE `revisi` (
  `id_revisi` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `jenis` varchar(15) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0:belum disetujui; 1:disetujui',
  `file_revisi` varchar(255) DEFAULT NULL,
  `penguji` varchar(80) DEFAULT NULL,
  `revisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `revisi`
--

INSERT INTO `revisi` (`id_revisi`, `nim`, `jenis`, `status`, `file_revisi`, `penguji`, `revisi`) VALUES
(17, 183307018, 'seminar', 1, '183307018_-_Revisi_Sidang.pdf', '25', 'tes aja yaa'),
(18, 183307018, 'seminar', 1, '183307018_-_Revisi_Sidang.pdf', '32', 'tes abimanyu'),
(20, 183307018, 'seminar', 1, '183307018_-_Revisi_Sidang.pdf', '24', ' Riswanda revisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_proposal`
--

CREATE TABLE `seminar_proposal` (
  `id_seminar_proposal` int(11) NOT NULL,
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
  `tgl_beritaacara` date DEFAULT NULL,
  `catatan_persetujuan` varchar(100) DEFAULT NULL,
  `tgl_persetujuan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seminar_proposal`
--

INSERT INTO `seminar_proposal` (`id_seminar_proposal`, `id_nilai_sempro`, `nim`, `berita_acara`, `persetujuan`, `proposal`, `monitoring`, `status`, `presentasi`, `rata`, `jumlah`, `st_beritaacara`, `st_persetujuan`, `st_proposal`, `st_monitoring`, `st_presentasi`, `catatan_beritaacara`, `tgl_beritaacara`, `catatan_persetujuan`, `tgl_persetujuan`) VALUES
(8, NULL, 183307018, 'bks_seminar-210703.docx', 'bks_seminar-210703.pdf', 'bks_seminar-2107031.pdf', 'bks_seminar-2107032.pdf', NULL, 'bks_seminar-210703.pptx', 0, 0, 1, 0, 0, 0, 0, 'JJ', '2021-07-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_ta`
--

CREATE TABLE `seminar_ta` (
  `id_seminar_ta` int(11) NOT NULL,
  `id_nilai_ta` int(11) DEFAULT NULL,
  `nim` int(11) NOT NULL,
  `file_ta` varchar(30) DEFAULT NULL,
  `pkkmb` varchar(30) DEFAULT NULL,
  `monitoring` varchar(30) DEFAULT NULL,
  `persetujuan` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `berita_acara` varchar(30) NOT NULL,
  `presentasi` varchar(30) NOT NULL,
  `link` varchar(20) NOT NULL,
  `st_file_ta` tinyint(4) DEFAULT NULL,
  `st_pkkmb` tinyint(4) DEFAULT NULL,
  `st_monitoring` tinyint(4) DEFAULT NULL,
  `st_persetujuan` tinyint(4) DEFAULT NULL,
  `st_berita_acara` tinyint(4) DEFAULT NULL,
  `st_presentasi` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seminar_ta`
--

INSERT INTO `seminar_ta` (`id_seminar_ta`, `id_nilai_ta`, `nim`, `file_ta`, `pkkmb`, `monitoring`, `persetujuan`, `status`, `berita_acara`, `presentasi`, `link`, `st_file_ta`, `st_pkkmb`, `st_monitoring`, `st_persetujuan`, `st_berita_acara`, `st_presentasi`) VALUES
(17, NULL, 183307018, 'bks_sidang-2107032.pdf', 'bks_sidang-2107035.pdf', 'bks_sidang-2107034.pdf', 'bks_sidang-2107031.pdf', NULL, 'bks_sidang-2107026.pdf', 'bks_sidang-2107033.pdf', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik`
--

CREATE TABLE `topik` (
  `id_topik` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `bidang` varchar(20) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `lokasi` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `topik`
--

INSERT INTO `topik` (`id_topik`, `nim`, `bidang`, `judul`, `lokasi`, `status`, `deskripsi`, `komentar`) VALUES
(5, 183307019, NULL, 'Android', 'Kampus', 3, 'Android untuk kampus', 'oke'),
(7, 183307018, NULL, 'Sistem monitoring', 'Kota Madiun', 1, 'sistem untuk mengawasi', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `fk_bimbingan_dosen1_idx` (`id_dosen`),
  ADD KEY `fk_bimbingan_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `bks_bahasa`
--
ALTER TABLE `bks_bahasa`
  ADD PRIMARY KEY (`id_bks_bhs`),
  ADD KEY `fk_bks_bahasa_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `bks_keterampilan`
--
ALTER TABLE `bks_keterampilan`
  ADD PRIMARY KEY (`id_bks_ket`),
  ADD KEY `fk_bks_keterampilan_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `bks_organisasi`
--
ALTER TABLE `bks_organisasi`
  ADD PRIMARY KEY (`id_bks_org`),
  ADD KEY `fk_bks_organisasi_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `bks_pkl`
--
ALTER TABLE `bks_pkl`
  ADD PRIMARY KEY (`id_bks_pkl`),
  ADD KEY `fk_bks_pkl_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `bks_prestasi`
--
ALTER TABLE `bks_prestasi`
  ADD PRIMARY KEY (`id_bks_prestasi`),
  ADD KEY `fk_bks_prestasi_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `bks_wisuda`
--
ALTER TABLE `bks_wisuda`
  ADD PRIMARY KEY (`id_bks_wisuda`),
  ADD KEY `fk_bks_wisuda_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `fk_chat_dosen1_idx` (`id_pengirim`),
  ADD KEY `fk_chat_mahasiswa1_idx` (`id_mahasiswabimbingan`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `fk_dosen_prodi1_idx` (`id_prodi`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `fk_mahasiswa_prodi1_idx` (`id_prodi`);

--
-- Indeks untuk tabel `master_ta`
--
ALTER TABLE `master_ta`
  ADD PRIMARY KEY (`id_master_ta`),
  ADD KEY `fk_master_ta_dosen1_idx` (`pembimbing1`),
  ADD KEY `fk_master_ta_dosen2_idx` (`pembimbing2`),
  ADD KEY `fk_master_ta_dosen3_idx` (`penguji1_sempro`),
  ADD KEY `fk_master_ta_dosen4_idx` (`penguji1_sidang`),
  ADD KEY `fk_master_ta_dosen5_idx` (`penguji2_sidang`),
  ADD KEY `fk_master_ta_dosen6_idx` (`penguji3_sidang`),
  ADD KEY `fk_master_ta_dosen7_idx` (`penguji2_sempro`),
  ADD KEY `fk_master_ta_dosen8_idx` (`penguji3_sempro`),
  ADD KEY `fk_master_ta_mahasiswa1_idx` (`nim`),
  ADD KEY `fk_master_ta_topik1_idx` (`judul`);

--
-- Indeks untuk tabel `nilai_sempro`
--
ALTER TABLE `nilai_sempro`
  ADD PRIMARY KEY (`id_nilai_sempro`),
  ADD KEY `fk_nilai_sempro_dosen1_idx` (`id_dosen`),
  ADD KEY `fk_nilai_sempro_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  ADD PRIMARY KEY (`id_nilai_sidang`),
  ADD KEY `fk_nilai_ta_dosen1_idx` (`id_dosen`),
  ADD KEY `fk_nilai_ta_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `fk_prodi_jurusan1_idx` (`id_jurusan`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD KEY `fk_proposal_mahasiswa1_idx` (`nim`);

--
-- Indeks untuk tabel `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id_revisi`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD PRIMARY KEY (`id_seminar_proposal`),
  ADD KEY `fk_seminar_proposal_mahasiswa1_idx` (`nim`),
  ADD KEY `fk_seminar_proposal_nilai_sempro1_idx` (`id_nilai_sempro`);

--
-- Indeks untuk tabel `seminar_ta`
--
ALTER TABLE `seminar_ta`
  ADD PRIMARY KEY (`id_seminar_ta`),
  ADD KEY `fk_seminar_ta_mahasiswa1_idx` (`nim`),
  ADD KEY `fk_seminar_ta_nilai_ta2_idx` (`id_nilai_ta`);

--
-- Indeks untuk tabel `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `bks_bahasa`
--
ALTER TABLE `bks_bahasa`
  MODIFY `id_bks_bhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bks_keterampilan`
--
ALTER TABLE `bks_keterampilan`
  MODIFY `id_bks_ket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bks_organisasi`
--
ALTER TABLE `bks_organisasi`
  MODIFY `id_bks_org` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `bks_pkl`
--
ALTER TABLE `bks_pkl`
  MODIFY `id_bks_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bks_prestasi`
--
ALTER TABLE `bks_prestasi`
  MODIFY `id_bks_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `bks_wisuda`
--
ALTER TABLE `bks_wisuda`
  MODIFY `id_bks_wisuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `master_ta`
--
ALTER TABLE `master_ta`
  MODIFY `id_master_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `nilai_sempro`
--
ALTER TABLE `nilai_sempro`
  MODIFY `id_nilai_sempro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  MODIFY `id_nilai_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id_revisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  MODIFY `id_seminar_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `seminar_ta`
--
ALTER TABLE `seminar_ta`
  MODIFY `id_seminar_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `fk_bimbingan_dosen1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bimbingan_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `bks_bahasa`
--
ALTER TABLE `bks_bahasa`
  ADD CONSTRAINT `fk_bks_bahasa_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bks_keterampilan`
--
ALTER TABLE `bks_keterampilan`
  ADD CONSTRAINT `fk_bks_keterampilan_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bks_organisasi`
--
ALTER TABLE `bks_organisasi`
  ADD CONSTRAINT `fk_bks_organisasi_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bks_pkl`
--
ALTER TABLE `bks_pkl`
  ADD CONSTRAINT `fk_bks_pkl_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bks_prestasi`
--
ALTER TABLE `bks_prestasi`
  ADD CONSTRAINT `fk_bks_prestasi_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bks_wisuda`
--
ALTER TABLE `bks_wisuda`
  ADD CONSTRAINT `fk_bks_wisuda_mahasiswa1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_mahasiswa1` FOREIGN KEY (`id_mahasiswabimbingan`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_prodi1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
