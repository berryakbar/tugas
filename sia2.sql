-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2020 at 03:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin Yayasan NM', '7488e331b8b64e5794da3fa4eb10ad5d'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `alert` text NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `alert`, `profil`) VALUES
(1, '<p>17 Agustusan</p>\r\n', 'team.png');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'kelas coba coba 1'),
(4, 'kelas 2'),
(6, 'oce');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `nama_pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`) VALUES
(0, 'Jaringan Nirkabel'),
(1, 'Matematika'),
(2, 'bahasa indonesia'),
(3, 'bahasa inggris');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `password`, `status`, `id_kelas`) VALUES
('123123123', 'oke klas', '4297f44b13955235245b2497399d7a93', 'AKTIF', 6),
('12345', 'ROGER D', 'ec1e693ca1f963898566d544150c365a', 'AKTIF', 4),
('123456', 'Kurnia', 'dc502eff4e2efeaecb6566348dfb630b', 'AKTIF', 1),
('15220010', 'berry user', '5076e33378db3b35c88d9189851ed3bf', 'AKTIF', 1),
('3827837123', 'ASNO AZZAWAGAMA FFFFFF', 'a79adf769242cbee7550049eeb57a032', 'AKTIF', 1),
('67890', 'Siti', 'db04eb4b07e0aaf8d1d477ae342bdff9', 'AKTIF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `uploading` date NOT NULL,
  `soal` text NOT NULL,
  `batas_tugas` varchar(15) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `uploading`, `soal`, `batas_tugas`, `id_pelajaran`, `id_kelas`) VALUES
(20, '2020-07-26', '<p>Apakah yg dimaksud dengan php</p>\r\n', '2020-07-31', 0, 1),
(22, '2020-07-27', '<p>apakah yg diseebut dgn ?</p>\r\n', '2020-08-01', 0, 1),
(23, '2020-07-27', '<p>das</p>\r\n', '2020-07-31', 0, 4),
(24, '2020-07-27', '<p>coba</p>\r\n', '2020-08-01', 2, 1),
(25, '2020-08-09', 'qweqweqwe', '2020-08-09', 0, 6),
(26, '2020-08-09', 'oooooooooooooooooooooooooo\"', '2020-08-09', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_terkumpul`
--

CREATE TABLE `tugas_terkumpul` (
  `id_tugas_terkumpul` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `nis` varchar(32) NOT NULL,
  `file_jawaban` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_terkumpul`
--

INSERT INTO `tugas_terkumpul` (`id_tugas_terkumpul`, `id_tugas`, `nis`, `file_jawaban`, `tanggal`, `nilai`) VALUES
(13, 20, '3827837123', 'Surat_Keterangan_Aktif_Kuliah3.docx', '2020-07-26', '90'),
(14, 22, '3827837123', 'SOP_TDC_DESA_(UPDATE)_(1).doc', '2020-07-27', '75'),
(15, 20, '15220010', 'DSC_0071.jpg', '2020-08-09', '10'),
(16, 22, '15220010', 'kosong3.png', '2020-08-09', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_pelajaran` (`id_pelajaran`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tugas_terkumpul`
--
ALTER TABLE `tugas_terkumpul`
  ADD PRIMARY KEY (`id_tugas_terkumpul`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tugas_terkumpul`
--
ALTER TABLE `tugas_terkumpul`
  MODIFY `id_tugas_terkumpul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `id_pelajaran` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`),
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `tugas_terkumpul`
--
ALTER TABLE `tugas_terkumpul`
  ADD CONSTRAINT `id_tugas` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`),
  ADD CONSTRAINT `nis` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
