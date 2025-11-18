-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2025 at 02:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectpembuatansuratatayya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fotoadmin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `password`, `fotoadmin`) VALUES
(1, 'Admin 1', 'kasihatayyaa@gmail.com', '1234565', 'ksih.jpg'),
(2, 'Admin 2', 'admin1@gmail.com', '123456', 'admin2.png'),
(3, 'Admin 3', 'admin2@gmail.com', '123456', 'admin3.jpg'),
(4, 'Admin 4', 'admin3@gmail.com', '123456', NULL),
(12, 'atayya', 'atayya@gmail.com', '1314', NULL),
(13, 'kasihadmin', 'kasih@gmail.com', '1314', NULL),
(14, 'kasih atayya', 'kasihatayya@gmail.com', '12345', 'andi.jpg'),
(15, 'Budi Santoso', 'budi@gmail.com', 'budi123', 'budi.png'),
(16, 'Citra Ayu', 'citra@gmail.com', 'citra321', 'citra.jpg'),
(17, 'Dewi Lestari', 'dewi@gmail.com', 'dewi789', 'dewi.png'),
(20, 'ksh', 'atayya@kasih.com', '1111', NULL),
(21, 'kasih1', 'putri@kasih.com', '131409', NULL),
(22, 'kasih2', 'rzka@kasih.com', '131409', NULL),
(23, 'kasih3', 'ptri@nay.com', '131409', NULL),
(24, 'kasih4', 'aufa@lina.com', '131409', NULL),
(25, 'kasih5', 'una@sri.com', '131409', NULL),
(26, 'kasih6', 'yas@mira.com', '131409', NULL),
(27, 'kasih7', 'nela@kia.com', '131409', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fotopegawai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nama`, `jabatan`, `alamat`, `nohp`, `email`, `fotopegawai`) VALUES
(1, 'kasih atayya', 'Kepala Bagian', 'Jl. Melati No.10', '081234567890', 'kasihatayya@gmail.com', 'kasih.jpg'),
(2, 'Budi Santoso', 'Staff Keuangan', 'Jl. Kenanga No.15', '081298765432', 'budi@gmail.com', 'budi.png'),
(3, 'Citra Ayu', 'Staff Administrasi', 'Jl. Mawar No.22', '082134567890', 'citra@gmail.com', 'citra.jpg'),
(4, 'Dewi Lestari', 'Sekretaris', 'Jl. Anggrek No.30', '083198765432', 'dewi@gmail.com', 'dewi.png'),
(5, 'naufal', 'guru', 'payabedi', '082345637228', 'npl@htm.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penyuratan`
--

CREATE TABLE `penyuratan` (
  `idpenyuratan` int NOT NULL,
  `idadmin` int NOT NULL,
  `idsurat` int NOT NULL,
  `idpegawai` int NOT NULL,
  `jenissurat` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggalproses` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penyuratan`
--

INSERT INTO `penyuratan` (`idpenyuratan`, `idadmin`, `idsurat`, `idpegawai`, `jenissurat`, `status`, `tanggalproses`) VALUES
(3, 1, 3, 4, 'Surat Masuk', 'Pending', '2025-10-30'),
(4, 3, 4, 4, 'Surat Keluar', 'Dikirim', '2025-10-04'),
(13, 2, 4, 1, 'kenaikan pangkat', 'Pending', '2025-10-13'),
(14, 2, 1, 5, 'permohonan izin sakit', 'pegawai', '2025-10-06'),
(15, 3, 4, 5, 'surat panggilan orang tua', 'Selesai', '2025-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `idsurat` int NOT NULL,
  `tanggalsurat` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `isisurat` text,
  `nosurat` varchar(100) DEFAULT NULL,
  `fotosurat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`idsurat`, `tanggalsurat`, `perihal`, `isisurat`, `nosurat`, `fotosurat`) VALUES
(1, '2025-10-01', 'Permohonan Cuti', 'Surat ini berisi permohonan cuti selama 3 hari kerja.', '001/CUTI/X/2025', 'cuti1.jpg'),
(2, '2025-10-02', 'Undangan Rapat', 'Surat undangan rapat koordinasi antar divisi.', '002/RAPAT/X/2025', 'rapat2.png'),
(3, '2025-10-03', 'Pemberitahuan Libur Nasional', 'Surat pemberitahuan mengenai libur Maulid Nabi.', '003/LIBUR/X/2025', 'libur3.jpg'),
(4, '2025-10-04', 'Pengumuman Kenaikan Jabatan', 'Surat pengumuman tentang pegawai yang naik jabatan.', '004/PENGUMUMAN/X/2025', 'kenaikan4.png'),
(5, '2025-10-14', 'cuti bersama', 'pada tanggal 14 10 2025 cuti bersama', '4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `penyuratan`
--
ALTER TABLE `penyuratan`
  ADD PRIMARY KEY (`idpenyuratan`),
  ADD KEY `idadmin` (`idadmin`),
  ADD KEY `idsurat` (`idsurat`),
  ADD KEY `idpegawai` (`idpegawai`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`idsurat`),
  ADD UNIQUE KEY `nosurat` (`nosurat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyuratan`
--
ALTER TABLE `penyuratan`
  MODIFY `idpenyuratan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `idsurat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyuratan`
--
ALTER TABLE `penyuratan`
  ADD CONSTRAINT `penyuratan_ibfk_1` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`),
  ADD CONSTRAINT `penyuratan_ibfk_2` FOREIGN KEY (`idsurat`) REFERENCES `surat` (`idsurat`),
  ADD CONSTRAINT `penyuratan_ibfk_3` FOREIGN KEY (`idpegawai`) REFERENCES `pegawai` (`idpegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
