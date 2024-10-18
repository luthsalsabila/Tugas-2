-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 06:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_izin`
--

CREATE TABLE `permohonan_izin` (
  `izin_id` int NOT NULL,
  `dosen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alasan_izin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lama_izin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permohonan_izin`
--

INSERT INTO `permohonan_izin` (`izin_id`, `dosen`, `nip`, `jabatan`, `alasan_izin`, `lama_izin`) VALUES
(1, 'Prof. Dr. Masha', '123456789', 'Rektor', 'Izin Sakit\r\n', '30'),
(2, 'Drs. Sals', '897564321', 'Ketua Kelas', 'Izin Cuti', '100'),
(3, 'Dr. Loid', '33445677', 'Ketua Jurusan', 'Izin Tugas', '5');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `surat_tugas_id` int NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `tgl_surat_tugas` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `transportasi` varchar(50) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `dosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`surat_tugas_id`, `nomor`, `tgl_surat_tugas`, `tujuan`, `transportasi`, `keperluan`, `dosen`) VALUES
(1, '142/ZAF/2024', '2024-10-18', 'Surga', 'Buroq', 'Tugas Luar Kota\r\n', 'Prof. Dr. Sasha'),
(2, '321/TRA/24', '2024-10-01', 'Isekai', 'Capung', 'Tugas Luar Negeri', 'Prof. Fatimatuzzahro'),
(3, '345/CBA/24', '2024-10-17', 'Kebahagiaan', 'Delman', 'Tugas Internal', 'Drs. Sheeyya'),
(4, '180/ADL/2024', '2024-10-18', 'Hatiku', 'Buroq', 'Tugas Luar Negeri', 'Prof. DR. Sasha'),
(5, '544/RFA/24', '2024-10-01', 'Jogja', 'Kapal ', 'Tugas Internal', 'Prof. Spongebob'),
(6, '675/LJG/24', '2024-10-09', 'Nusakambangan', 'Sayap', 'Tugas Luar Kota', 'Prof.  Dr. Seth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permohonan_izin`
--
ALTER TABLE `permohonan_izin`
  ADD PRIMARY KEY (`izin_id`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`surat_tugas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permohonan_izin`
--
ALTER TABLE `permohonan_izin`
  MODIFY `izin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `surat_tugas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
