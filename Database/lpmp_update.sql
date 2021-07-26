-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2021 at 07:08 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL,
  `sekolah_id` int NOT NULL,
  `indikator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `akar_masalah_master`
--

CREATE TABLE `akar_masalah_master` (
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `standar_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL,
  `program_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `kota_kabupaten`
--

CREATE TABLE `kota_kabupaten` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL,
  `sekolah_id` int NOT NULL,
  `indikator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_siklus`
--

CREATE TABLE `pengajuan_siklus` (
  `id` int NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `status` int NOT NULL COMMENT '1: Diajukan; 2: Diproses; 3: Diterima; 4: Komunikasi Koordinasi; 5: Ditolak',
  `tpmps_id` int NOT NULL,
  `siklus_periode_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_siklus_komunikasi`
--

CREATE TABLE `pengajuan_siklus_komunikasi` (
  `id` int NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_komentar` datetime NOT NULL,
  `status_pemberi_komentar` int NOT NULL COMMENT '1: tpmps; 2: pengawas; 3: lpmp',
  `pengajuan_siklus_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE `pengawas` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL,
  `sekolah_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `program_rekomendasi`
--

CREATE TABLE `program_rekomendasi` (
  `id` int NOT NULL,
  `program_id` int NOT NULL,
  `rekomendasi_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `raport_kpi`
--

CREATE TABLE `raport_kpi` (
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `nilai_kpi` float NOT NULL,
  `kota_kabupaten_id` int NOT NULL,
  `sub_indikator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `raport_sekolah`
--

CREATE TABLE `raport_sekolah` (
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `nilai` float NOT NULL,
  `sekolah_id` int NOT NULL,
  `sub_indikator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `raport_sekolah_koreksi`
--

CREATE TABLE `raport_sekolah_koreksi` (
  `id` int NOT NULL,
  `nilai_koreksi` int NOT NULL,
  `datetime` timestamp NOT NULL,
  `raport_sekolah_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_kerja`
--

CREATE TABLE `realisasi_kerja` (
  `id` int NOT NULL,
  `penanggung_jawab` text NOT NULL,
  `pemangku_kepentingan` text NOT NULL,
  `waktu_pelaksanaan` text NOT NULL,
  `bukti_fisik_keterangan` text NOT NULL,
  `bukti_fisik_url` text NOT NULL,
  `status` int NOT NULL,
  `datetime` timestamp NOT NULL,
  `kegiatan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL,
  `sekolah_id` int NOT NULL,
  `indikator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `rencana_kerja`
--

CREATE TABLE `rencana_kerja` (
  `id` int NOT NULL,
  `indikator_kinerja` text NOT NULL,
  `volume` text NOT NULL,
  `biaya` float NOT NULL,
  `sumber_daya` text NOT NULL,
  `is_dana_bos` int NOT NULL,
  `status` int NOT NULL,
  `datetime` timestamp NOT NULL,
  `kegiatan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telefon` varchar(100) NOT NULL,
  `kota_kabupaten_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `tgl_sk` date NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `sekolah_id` int NOT NULL,
  `pengawas_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `siklus_periode`
--

CREATE TABLE `siklus_periode` (
  `id` int NOT NULL,
  `siklus` int NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `siklus_periode`
--

INSERT INTO `siklus_periode` (`id`, `siklus`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 1, '2021-07-19', '2021-07-20'),
(2, 2, '2021-07-20', '2021-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `standar`
--

CREATE TABLE `standar` (
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `sub_indikator`
--

CREATE TABLE `sub_indikator` (
  `id` int NOT NULL,
  `tahun` year NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `indikator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tpmps`
--

CREATE TABLE `tpmps` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sekolah_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akar_masalah`
--
ALTER TABLE `akar_masalah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akar_masalah_master`
--
ALTER TABLE `akar_masalah_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota_kabupaten`
--
ALTER TABLE `kota_kabupaten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lpmp`
--
ALTER TABLE `lpmp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masalah`
--
ALTER TABLE `masalah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_siklus`
--
ALTER TABLE `pengajuan_siklus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_siklus_komunikasi`
--
ALTER TABLE `pengajuan_siklus_komunikasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_rekomendasi`
--
ALTER TABLE `program_rekomendasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raport_kpi`
--
ALTER TABLE `raport_kpi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raport_sekolah`
--
ALTER TABLE `raport_sekolah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raport_sekolah_koreksi`
--
ALTER TABLE `raport_sekolah_koreksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realisasi_kerja`
--
ALTER TABLE `realisasi_kerja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekolah_pengawas`
--
ALTER TABLE `sekolah_pengawas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siklus_periode`
--
ALTER TABLE `siklus_periode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_indikator`
--
ALTER TABLE `sub_indikator`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tpmps`
--
ALTER TABLE `tpmps`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akar_masalah`
--
ALTER TABLE `akar_masalah`
  ADD CONSTRAINT `akar_masalah_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `akar_masalah_ibfk_2` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `indikator_ibfk_1` FOREIGN KEY (`standar_id`) REFERENCES `standar` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `masalah`
--
ALTER TABLE `masalah`
  ADD CONSTRAINT `masalah_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `masalah_ibfk_2` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pengajuan_siklus`
--
ALTER TABLE `pengajuan_siklus`
  ADD CONSTRAINT `pengajuan_siklus_ibfk_1` FOREIGN KEY (`siklus_periode_id`) REFERENCES `siklus_periode` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pengajuan_siklus_ibfk_2` FOREIGN KEY (`tpmps_id`) REFERENCES `tpmps` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pengajuan_siklus_komunikasi`
--
ALTER TABLE `pengajuan_siklus_komunikasi`
  ADD CONSTRAINT `pengajuan_siklus_komunikasi_ibfk_1` FOREIGN KEY (`pengajuan_siklus_id`) REFERENCES `pengajuan_siklus` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `raport_kpi`
--
ALTER TABLE `raport_kpi`
  ADD CONSTRAINT `raport_kpi_ibfk_1` FOREIGN KEY (`kota_kabupaten_id`) REFERENCES `kota_kabupaten` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `raport_kpi_ibfk_2` FOREIGN KEY (`sub_indikator_id`) REFERENCES `sub_indikator` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `raport_sekolah`
--
ALTER TABLE `raport_sekolah`
  ADD CONSTRAINT `raport_sekolah_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `raport_sekolah_ibfk_2` FOREIGN KEY (`sub_indikator_id`) REFERENCES `sub_indikator` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `raport_sekolah_koreksi`
--
ALTER TABLE `raport_sekolah_koreksi`
  ADD CONSTRAINT `raport_sekolah_koreksi_ibfk_1` FOREIGN KEY (`raport_sekolah_id`) REFERENCES `raport_sekolah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `realisasi_kerja`
--
ALTER TABLE `realisasi_kerja`
  ADD CONSTRAINT `realisasi_kerja_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD CONSTRAINT `rekomendasi_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `rekomendasi_ibfk_2` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `rencana_kerja`
--
ALTER TABLE `rencana_kerja`
  ADD CONSTRAINT `rencana_kerja_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`kota_kabupaten_id`) REFERENCES `kota_kabupaten` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sekolah_pengawas`
--
ALTER TABLE `sekolah_pengawas`
  ADD CONSTRAINT `sekolah_pengawas_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sekolah_pengawas_ibfk_2` FOREIGN KEY (`pengawas_id`) REFERENCES `pengawas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sub_indikator`
--
ALTER TABLE `sub_indikator`
  ADD CONSTRAINT `sub_indikator_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tpmps`
--
ALTER TABLE `tpmps`
  ADD CONSTRAINT `tpmps_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
