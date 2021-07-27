-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 04:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpmp`
--
CREATE DATABASE IF NOT EXISTS `lpmp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lpmp`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `akar_masalah`
--

CREATE TABLE `akar_masalah` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sekolah_id` int(11) NOT NULL,
  `indikator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akar_masalah`
--

INSERT INTO `akar_masalah` (`id`, `tahun`, `deskripsi`, `status`, `datetime`, `sekolah_id`, `indikator_id`) VALUES
(1, 2021, 'Kompetensi guru dalam penyusunan perangkat pembelajaran kurang.', '0', '2021-07-27 14:08:16', 1, 1),
(2, 2021, 'Pemahaman guru terkait kompetensi keterampilan belum menyeluruh.', '0', '2021-07-27 14:08:26', 1, 1),
(3, 2021, 'Visi, misi dan tujuan sekolah tidak fokus pada pencapaian kompetensi keterampilan.', '0', '2021-07-27 14:08:32', 1, 1),
(4, 2021, 'Kompetensi pedagogik pendidik belum optimal.', '0', '2021-07-27 14:09:05', 1, 3),
(6, 2021, 'Pendidik tidak menyusun sendiri rencana pembelajaran', '0', '2021-07-27 14:10:04', 1, 3),
(7, 2021, 'Bentuk pendalaman materi yang diketahui pendidik terbatas.', '0', '2021-07-27 14:10:11', 1, 3),
(9, 2021, 'Pendidik belum menyusun RPP secara mandiri atau menjiplak dari pendidik lainnya.', '0', '2021-07-27 14:16:32', 1, 4),
(10, 2021, 'Pendidik belum paham mekanisme penyusunan RPP', '0', '2021-07-27 14:17:23', 1, 4),
(11, 2021, 'Pendidik tidak mendapat kesempatan aktualisasi diri dalam menyusun RPP', '0', '2021-07-27 14:17:36', 1, 4),
(12, 2021, 'RPP tidak disusun secara lengkap dan sistematis', '0', '2021-07-27 14:17:48', 1, 5),
(13, 2021, 'Tidak ada supervisi akademik oleh kepala sekolah', '0', '2021-07-27 14:18:57', 1, 5),
(14, 2021, 'Sarana dan prasarana yang belum memadai.', '0', '2021-07-27 14:19:06', 1, 5),
(15, 2021, 'Belum mampu memilih metode pembelajaran yang sesuai.', '0', '2021-07-27 14:19:15', 1, 5),
(16, 2021, 'Belum memahami prosedur penilaian otentik dengan baik', '0', '2021-07-27 14:19:37', 1, 6),
(17, 2021, 'Instrumen yang digunakan banyak', '0', '2021-07-27 14:19:44', 1, 6),
(18, 2021, 'Guru yang dapat melakukan penilaian otentik secara komprehensif terbatas', '0', '2021-07-27 14:19:50', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `akar_masalah_master`
--

CREATE TABLE `akar_masalah_master` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `standar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id`, `tahun`, `nomor`, `nama`, `status`, `standar_id`) VALUES
(1, 2021, '1.1', 'Perangkat pembelajaran sesuai rumusan kompetensi lulusan ', 0, 1),
(2, 2021, '1.2', 'Kurikulum Tingkat Satuan Pendidikan dikembangkan sesuai prosedur', 0, 1),
(3, 2021, '1.3', 'Sekolah melaksanakan kurikulum sesuai ketentuan ', 0, 1),
(4, 2021, '2.1', 'Sekolah merencanakan proses pembelajaran sesuai ketentuan ', 0, 2),
(5, 2021, '2.2', 'Proses pembelajaran dilaksanakan dengan tepat ', 0, 2),
(6, 2021, '2.3', 'Pengawasan dan penilaian otentik dilakukan dalam proses pembelajaran ', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kota_kabupaten`
--

CREATE TABLE `kota_kabupaten` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kota_kabupaten`
--

INSERT INTO `kota_kabupaten` (`id`, `nama`) VALUES
(1, 'Pekanbaru'),
(2, 'Kabupaten Bengkalis'),
(3, 'Kabupaten Indragri Hilir'),
(4, 'Kabupaten Indragiri Hulu'),
(5, 'Kabupaten Kampar'),
(6, 'Kabupaten Kuantan Singingi'),
(7, 'Kabupaten Pelalawan'),
(8, 'Kabupaten Rokan Hilir'),
(9, 'Kabupaten Rokan Hulu'),
(10, 'Kabupaten Siak'),
(11, 'Kabupaten Kepulauan'),
(12, 'Kota Pekanbaru'),
(13, 'Kota Dumai');

-- --------------------------------------------------------

--
-- Table structure for table `lpmp`
--

CREATE TABLE `lpmp` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lpmp`
--

INSERT INTO `lpmp` (`id`, `nama`, `username`, `password`) VALUES
(1, 'LPMP', 'LPMP', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `masalah`
--

CREATE TABLE `masalah` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sekolah_id` int(11) NOT NULL,
  `indikator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masalah`
--

INSERT INTO `masalah` (`id`, `tahun`, `deskripsi`, `status`, `datetime`, `sekolah_id`, `indikator_id`) VALUES
(1, 2021, 'Perangkat pembelajaran  belum sepenuhnya memuat karakteristik kompetensi keterampilan', '0', '2021-07-27 14:27:48', 1, 1),
(2, 2021, 'Beban belajar belum sepenuhnya diatur berdasarkan bentuk pendalaman materi', '0', '2021-07-27 14:28:03', 1, 3),
(3, 2021, 'Dokumen rencana belum sepenuhnya disusun dengan lengkap dan sistematis', '0', '2021-07-27 14:28:16', 1, 4),
(4, 2021, 'Pengelolaan kelas  sebelum pembelajaran dimulai belum optimal', '0', '2021-07-27 14:28:24', 1, 5),
(5, 2021, 'Metode pembelajaran belum sepenuhnya diterapkan sesuai karakteristik siswa', '0', '2021-07-27 14:28:33', 1, 5),
(6, 2021, 'Penilaian otentik belum sepenuhnya dilakukan  secara komprehensif', '0', '2021-07-27 14:28:43', 1, 6),
(7, 2021, 'Hasil penilaian otentik belum sepenuhnya dimanfaatkan', '0', '2021-07-27 14:28:53', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_siklus`
--

CREATE TABLE `pengajuan_siklus` (
  `id` int(11) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '1: Diajukan; 2: Diproses; 3: Diterima; 4: Komunikasi Koordinasi; 5: Ditolak',
  `tpmps_id` int(11) NOT NULL,
  `siklus_periode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_siklus_komunikasi`
--

CREATE TABLE `pengajuan_siklus_komunikasi` (
  `id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_komentar` datetime NOT NULL,
  `status_pemberi_komentar` int(11) NOT NULL COMMENT '1: tpmps; 2: pengawas; 3: lpmp',
  `pengajuan_siklus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE `pengawas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengawas`
--

INSERT INTO `pengawas` (`id`, `nama`, `username`, `password`, `asal`) VALUES
(1, 'Pengawas', 'Pengawas', '12345', 'Pekanbaru');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sekolah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `program_rekomendasi`
--

CREATE TABLE `program_rekomendasi` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `rekomendasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `raport_kpi`
--

CREATE TABLE `raport_kpi` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nilai_kpi` float NOT NULL,
  `kota_kabupaten_id` int(11) NOT NULL,
  `sub_indikator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `raport_sekolah`
--

CREATE TABLE `raport_sekolah` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nilai` float NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `sub_indikator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raport_sekolah`
--

INSERT INTO `raport_sekolah` (`id`, `tahun`, `nilai`, `sekolah_id`, `sub_indikator_id`) VALUES
(1, 2021, 5.12, 1, 1),
(2, 2021, 5.53, 1, 2),
(3, 2021, 4.75, 1, 3),
(4, 2021, 6.04, 1, 4),
(5, 2021, 6.15, 1, 5),
(6, 2021, 5.22, 1, 6),
(7, 2021, 6.94, 1, 7),
(8, 2021, 5.77, 1, 8),
(9, 2021, 6.03, 1, 9),
(10, 2021, 7, 1, 10),
(11, 2021, 2.85, 1, 11),
(12, 2021, 6.53, 1, 12),
(13, 2021, 6.54, 1, 13),
(14, 2021, 7, 1, 14),
(15, 2021, 6.76, 1, 15),
(16, 2021, 6.48, 1, 16),
(17, 2021, 6.76, 1, 17),
(18, 2021, 6.88, 1, 18),
(19, 2021, 4.69, 1, 19),
(20, 2021, 6.48, 1, 20),
(21, 2021, 6.76, 1, 21),
(22, 2021, 6.5, 1, 22),
(23, 2021, 6.76, 1, 23),
(24, 2021, 6.41, 1, 24),
(25, 2021, 6.37, 1, 25),
(26, 2021, 6.9, 1, 26),
(27, 2021, 6.72, 1, 27),
(28, 2021, 6.37, 1, 28),
(29, 2021, 4.57, 1, 29),
(30, 2021, 5.93, 1, 30),
(31, 2021, 5.93, 1, 31),
(32, 2021, 6.66, 1, 32),
(33, 2021, 3.57, 1, 33),
(34, 2021, 4.66, 1, 34),
(35, 2021, 5.9, 1, 35),
(36, 2021, 5.29, 1, 36),
(37, 2021, 5.53, 1, 37),
(38, 2021, 5.97, 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `raport_sekolah_koreksi`
--

CREATE TABLE `raport_sekolah_koreksi` (
  `id` int(11) NOT NULL,
  `nilai_koreksi` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `raport_sekolah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_kerja`
--

CREATE TABLE `realisasi_kerja` (
  `id` int(11) NOT NULL,
  `penanggung_jawab` text NOT NULL,
  `pemangku_kepentingan` text NOT NULL,
  `waktu_pelaksanaan` text NOT NULL,
  `bukti_fisik_keterangan` text NOT NULL,
  `bukti_fisik_url` text NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kegiatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sekolah_id` int(11) NOT NULL,
  `indikator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `tahun`, `deskripsi`, `status`, `datetime`, `sekolah_id`, `indikator_id`) VALUES
(1, 2021, 'Perlu meningkatkan kompetensi guru dalam menyusun perangkat pembelajaran', '0', '2021-07-27 14:21:01', 1, 1),
(2, 2021, 'Perlu meningkatkan pemahaman guru terkait kompetensi keterampilan secara menyeluruh', '0', '2021-07-27 14:21:11', 1, 1),
(3, 2021, 'Perlu penyempurnaan visi,misi, dan tujuan sekolah agar fokus pada pencapaian kompetensi keterampilan', '0', '2021-07-27 14:21:19', 1, 1),
(4, 2021, 'Perlu meningkatkan kompetensi pedagogik pendidik', '0', '2021-07-27 14:21:46', 1, 3),
(5, 2021, 'Perlu meningkatkan kemampuan pendidik  dalam menyusun sendiri rencana pembelajaran', '0', '2021-07-27 14:21:58', 1, 3),
(6, 2021, 'Perlu meningkatkan kemampuan pendidik dalam bentuk pendalaman materi', '0', '2021-07-27 14:22:06', 1, 3),
(7, 2021, 'Perlu meningkatkan kemampuan pendidik dalam  menyusun RPP secara mandiri', '0', '2021-07-27 14:22:34', 1, 4),
(8, 2021, 'Perlu meningkatkan pemahaman pendidik dalam mekanisme penyusunan  RPP', '0', '2021-07-27 14:26:00', 1, 4),
(9, 2021, 'Perlu memberi kesempatan  kepada pendidik untuk aktualisasi diri dalam menyusun RPP', '0', '2021-07-27 14:23:32', 1, 4),
(10, 2021, 'Perlu menyusun RPP secara lengkap dan sistematis', '0', '2021-07-27 14:23:40', 1, 5),
(11, 2021, 'Perlu dilaksanakan supervisi akademik oleh kepala sekolah', '0', '2021-07-27 14:23:47', 1, 5),
(12, 2021, 'Perlu melengkapi sarana dan prasana', '0', '2021-07-27 14:23:59', 1, 5),
(13, 2021, 'Perlu meningkatkan kemampuan dalam memilih metode pembelajaran yang sesuai', '0', '2021-07-27 14:24:10', 1, 5),
(14, 2021, 'Perlu memahami prosedur penilaian otentik dengan baik', '0', '2021-07-27 14:24:17', 1, 6),
(15, 2021, 'Perlu meningkatkan kemampuan dalam memilih instrumen penilaian yang digunakan', '0', '2021-07-27 14:24:24', 1, 6),
(16, 2021, 'Perlu meningkatkan kemampuan guru dalam melakukan penilaian otentik secara komprehensif', '0', '2021-07-27 14:25:54', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_kerja`
--

CREATE TABLE `rencana_kerja` (
  `id` int(11) NOT NULL,
  `indikator_kinerja` text NOT NULL,
  `volume` text NOT NULL,
  `biaya` float NOT NULL,
  `sumber_daya` text NOT NULL,
  `is_dana_bos` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kegiatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telefon` varchar(100) NOT NULL,
  `kota_kabupaten_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `alamat`, `telefon`, `kota_kabupaten_id`) VALUES
(1, 'Sma Dharma Loka', 'Jalan Arengka', '081234567890', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah_pengawas`
--

CREATE TABLE `sekolah_pengawas` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tgl_sk` date NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `pengawas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `siklus_periode`
--

CREATE TABLE `siklus_periode` (
  `id` int(11) NOT NULL,
  `siklus` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siklus_periode`
--

INSERT INTO `siklus_periode` (`id`, `siklus`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 1, '2021-07-19', '2021-07-20'),
(2, 2, '2021-07-20', '2021-08-03'),
(3, 3, '2021-08-03', '2021-10-26'),
(4, 4, '2021-10-26', '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `standar`
--

CREATE TABLE `standar` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `standar`
--

INSERT INTO `standar` (`id`, `tahun`, `nomor`, `nama`, `status`) VALUES
(1, 2021, '1', 'Isi', 0),
(2, 2021, '2', 'Proses', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_indikator`
--

CREATE TABLE `sub_indikator` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `indikator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_indikator`
--

INSERT INTO `sub_indikator` (`id`, `tahun`, `nomor`, `nama`, `status`, `indikator_id`) VALUES
(1, 2021, '1.1.1', 'Memuat karakteristik kompetensi sikap ', 0, 1),
(2, 2021, '1.1.2', 'Memuat karakteristik kompetensi pengetahuan ', 0, 1),
(3, 2021, '1.1.3', 'Memuat karakteristik kompetensi keterampilan ', 0, 1),
(4, 2021, '1.1.4', 'Menyesuaikan tingkat kompetensi siswa ', 0, 1),
(5, 2021, '1.1.5', 'Menyesuaikan ruang lingkup materi pembelajaran ', 0, 1),
(6, 2021, '1.2.1', 'Melibatkan pemangku kepentingan dalam pengembangan kurikulum ', 0, 2),
(7, 2021, '1.2.2', 'Mengacu pada kerangka dasar penyusunan ', 0, 2),
(8, 2021, '1.2.3', 'Melewati tahapan operasional pengembangan ', 0, 2),
(9, 2021, '1.2.4', 'Memiliki perangkat kurikulum tingkat satuan pendidikan yang dikembangkan ', 0, 2),
(10, 2021, '1.3.1', 'Menyediakan alokasi waktu pembelajaran sesuai struktur kurikulum yang berlaku ', 0, 3),
(11, 2021, '1.3.2', 'Mengatur beban belajar berdasarkan bentuk pendalaman materi ', 0, 3),
(12, 2021, '1.3.3', 'Menyelenggarakan aspek kurikulum pada muatan local ', 0, 3),
(13, 2021, '1.3.4', 'Melaksanakan kegiatan pengembangan diri siswa ', 0, 3),
(14, 2021, '2.1.1', 'Mengacu pada silabus yang telah dikembangkan ', 0, 4),
(15, 2021, '2.1.2', 'Mengarah pada pencapaian kompetensi ', 0, 4),
(16, 2021, '2.1.3', 'Menyusun dokumen rencana dengan lengkap dan sistematis ', 0, 4),
(17, 2021, '2.1.4', 'Mendapatkan evaluasi dari kepala sekolah dan pengawas sekolah ', 0, 4),
(18, 2021, '2.2.1', 'Membentuk rombongan belajar dengan jumlah siswa sesuai ketentuan ', 0, 5),
(19, 2021, '2.2.2', 'Mengelola kelas sebelum memulai pembelajaran ', 0, 5),
(20, 2021, '2.2.3', 'Mendorong siswa mencari tahu ', 0, 5),
(21, 2021, '2.2.4', 'Mengarahkan pada penggunaan pendekatan ilmiah', 0, 5),
(22, 2021, '2.2.5', 'Melakukan pembelajaran berbasis kompetensi ', 0, 5),
(23, 2021, '2.2.6', 'Memberikan pembelajaran terpadu ', 0, 5),
(24, 2021, '2.2.7', 'Melaksanakan pembelajaran dengan jawaban yang kebenarannya multi dimensi', 0, 5),
(25, 2021, '2.2.8', 'Melaksanakan pembelajaran menuju pada keterampilan aplikatif ', 0, 5),
(26, 2021, '2.2.9', 'Mengutamakan  pemberdayaan siswa sebagai pembelajar sepanjang hayat', 0, 5),
(27, 2021, '2.2.10', 'Menerapkan prinsip bahwa siapa saja adalah guru, siapa saja adalah siswa, dan di mana saja adalah kelas.', 0, 5),
(28, 2021, '2.2.11', 'Mengakui atas perbedaan individual dan latar belakang budaya siswa.', 0, 5),
(29, 2021, '2.2.12', 'Menerapkan metode pembelajaran sesuai karakteristik siswa ', 0, 5),
(30, 2021, '2.2.13', 'Memanfaatkan media pembelajaran dalam meningkatkan efisiensi dan efektivitas pembelajaran ', 0, 5),
(31, 2021, '2.2.14', 'Menggunakan aneka sumber belajar ', 0, 5),
(32, 2021, '2.2.15', 'Mengelola kelas saat menutup pembelajaran  ', 0, 5),
(33, 2021, '2.3.1', 'Melakukan penilaian otentik secara komprehensif ', 0, 6),
(34, 2021, '2.3.2', 'Memanfaatkan hasil penilaian otentik ', 0, 6),
(35, 2021, '2.3.3', 'Melakukan pemantauan proses pembelajaran ', 0, 6),
(36, 2021, '2.3.4', 'Melakukan supervisi proses pembelajaran kepada guru ', 0, 6),
(37, 2021, '2.3.5', 'Mengevaluasi proses pembelajaran', 0, 6),
(38, 2021, '2.3.6', 'Menindaklanjuti hasil pengawasan proses pembelajaran ', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tpmps`
--

CREATE TABLE `tpmps` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sekolah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tpmps`
--

INSERT INTO `tpmps` (`id`, `nama`, `username`, `password`, `sekolah_id`) VALUES
(1, 'TPMPS', 'TPMPS', '12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akar_masalah`
--
ALTER TABLE `akar_masalah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indikator_id` (`indikator_id`),
  ADD KEY `sekolah_id` (`sekolah_id`);

--
-- Indexes for table `akar_masalah_master`
--
ALTER TABLE `akar_masalah_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standar_id` (`standar_id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `kota_kabupaten`
--
ALTER TABLE `kota_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lpmp`
--
ALTER TABLE `lpmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masalah`
--
ALTER TABLE `masalah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indikator_id` (`indikator_id`),
  ADD KEY `sekolah_id` (`sekolah_id`);

--
-- Indexes for table `pengajuan_siklus`
--
ALTER TABLE `pengajuan_siklus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periode_id` (`siklus_periode_id`),
  ADD KEY `tpmps_id` (`tpmps_id`);

--
-- Indexes for table `pengajuan_siklus_komunikasi`
--
ALTER TABLE `pengajuan_siklus_komunikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_siklus_id` (`pengajuan_siklus_id`);

--
-- Indexes for table `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_id` (`sekolah_id`);

--
-- Indexes for table `program_rekomendasi`
--
ALTER TABLE `program_rekomendasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raport_kpi`
--
ALTER TABLE `raport_kpi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_kabupaten_id` (`kota_kabupaten_id`),
  ADD KEY `sub_indikator_id` (`sub_indikator_id`);

--
-- Indexes for table `raport_sekolah`
--
ALTER TABLE `raport_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_id` (`sekolah_id`),
  ADD KEY `sub_indikator_id` (`sub_indikator_id`);

--
-- Indexes for table `raport_sekolah_koreksi`
--
ALTER TABLE `raport_sekolah_koreksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raport_sekolah_id` (`raport_sekolah_id`);

--
-- Indexes for table `realisasi_kerja`
--
ALTER TABLE `realisasi_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indikator_id` (`indikator_id`),
  ADD KEY `sekolah_id` (`sekolah_id`);

--
-- Indexes for table `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_kabupaten_id` (`kota_kabupaten_id`);

--
-- Indexes for table `sekolah_pengawas`
--
ALTER TABLE `sekolah_pengawas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_id` (`sekolah_id`),
  ADD KEY `pengawas_id` (`pengawas_id`);

--
-- Indexes for table `siklus_periode`
--
ALTER TABLE `siklus_periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_indikator`
--
ALTER TABLE `sub_indikator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indikator_id` (`indikator_id`);

--
-- Indexes for table `tpmps`
--
ALTER TABLE `tpmps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_id` (`sekolah_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akar_masalah`
--
ALTER TABLE `akar_masalah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `akar_masalah_master`
--
ALTER TABLE `akar_masalah_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota_kabupaten`
--
ALTER TABLE `kota_kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lpmp`
--
ALTER TABLE `lpmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masalah`
--
ALTER TABLE `masalah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajuan_siklus`
--
ALTER TABLE `pengajuan_siklus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_siklus_komunikasi`
--
ALTER TABLE `pengajuan_siklus_komunikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_rekomendasi`
--
ALTER TABLE `program_rekomendasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raport_kpi`
--
ALTER TABLE `raport_kpi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raport_sekolah`
--
ALTER TABLE `raport_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `raport_sekolah_koreksi`
--
ALTER TABLE `raport_sekolah_koreksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realisasi_kerja`
--
ALTER TABLE `realisasi_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekolah_pengawas`
--
ALTER TABLE `sekolah_pengawas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siklus_periode`
--
ALTER TABLE `siklus_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_indikator`
--
ALTER TABLE `sub_indikator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tpmps`
--
ALTER TABLE `tpmps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akar_masalah`
--
ALTER TABLE `akar_masalah`
  ADD CONSTRAINT `akar_masalah_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  ADD CONSTRAINT `akar_masalah_ibfk_2` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`);

--
-- Constraints for table `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `indikator_ibfk_1` FOREIGN KEY (`standar_id`) REFERENCES `standar` (`id`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`);

--
-- Constraints for table `masalah`
--
ALTER TABLE `masalah`
  ADD CONSTRAINT `masalah_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  ADD CONSTRAINT `masalah_ibfk_2` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`);

--
-- Constraints for table `pengajuan_siklus`
--
ALTER TABLE `pengajuan_siklus`
  ADD CONSTRAINT `pengajuan_siklus_ibfk_1` FOREIGN KEY (`siklus_periode_id`) REFERENCES `siklus_periode` (`id`),
  ADD CONSTRAINT `pengajuan_siklus_ibfk_2` FOREIGN KEY (`tpmps_id`) REFERENCES `tpmps` (`id`);

--
-- Constraints for table `pengajuan_siklus_komunikasi`
--
ALTER TABLE `pengajuan_siklus_komunikasi`
  ADD CONSTRAINT `pengajuan_siklus_komunikasi_ibfk_1` FOREIGN KEY (`pengajuan_siklus_id`) REFERENCES `pengajuan_siklus` (`id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`);

--
-- Constraints for table `raport_kpi`
--
ALTER TABLE `raport_kpi`
  ADD CONSTRAINT `raport_kpi_ibfk_1` FOREIGN KEY (`kota_kabupaten_id`) REFERENCES `kota_kabupaten` (`id`),
  ADD CONSTRAINT `raport_kpi_ibfk_2` FOREIGN KEY (`sub_indikator_id`) REFERENCES `sub_indikator` (`id`);

--
-- Constraints for table `raport_sekolah`
--
ALTER TABLE `raport_sekolah`
  ADD CONSTRAINT `raport_sekolah_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`),
  ADD CONSTRAINT `raport_sekolah_ibfk_2` FOREIGN KEY (`sub_indikator_id`) REFERENCES `sub_indikator` (`id`);

--
-- Constraints for table `raport_sekolah_koreksi`
--
ALTER TABLE `raport_sekolah_koreksi`
  ADD CONSTRAINT `raport_sekolah_koreksi_ibfk_1` FOREIGN KEY (`raport_sekolah_id`) REFERENCES `raport_sekolah` (`id`);

--
-- Constraints for table `realisasi_kerja`
--
ALTER TABLE `realisasi_kerja`
  ADD CONSTRAINT `realisasi_kerja_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`);

--
-- Constraints for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD CONSTRAINT `rekomendasi_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  ADD CONSTRAINT `rekomendasi_ibfk_2` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`);

--
-- Constraints for table `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
  ADD CONSTRAINT `rencana_kerja_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`);

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`kota_kabupaten_id`) REFERENCES `kota_kabupaten` (`id`);

--
-- Constraints for table `sekolah_pengawas`
--
ALTER TABLE `sekolah_pengawas`
  ADD CONSTRAINT `sekolah_pengawas_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`),
  ADD CONSTRAINT `sekolah_pengawas_ibfk_2` FOREIGN KEY (`pengawas_id`) REFERENCES `pengawas` (`id`);

--
-- Constraints for table `sub_indikator`
--
ALTER TABLE `sub_indikator`
  ADD CONSTRAINT `sub_indikator_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`);

--
-- Constraints for table `tpmps`
--
ALTER TABLE `tpmps`
  ADD CONSTRAINT `tpmps_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
