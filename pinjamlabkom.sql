-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 08:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjamlabkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` varchar(51) NOT NULL,
  `pass` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` varchar(10) NOT NULL,
  `mhsNama` varchar(43) NOT NULL,
  `pass` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(3) NOT NULL,
  `nama_ruang` varchar(18) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`) VALUES
(58, 'LABKOM PUTRI - A'),
(59, 'LABKOM PUTRI - B'),
(60, 'LABKOM PUTRI - C');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `nip` varchar(20) NOT NULL,
  `nama_lengkap_staff` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `nama_admin`, `user`, `pass`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_jam`
--

CREATE TABLE `t_jam` (
  `_id` int(2) NOT NULL,
  `waktu` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `t_jam`
--

INSERT INTO `t_jam` (`_id`, `waktu`) VALUES
(1, 'jam ke-1'),
(2, 'jam ke-2'),
(3, 'jam ke-3'),
(4, 'jam ke-4'),
(5, 'jam ke-5'),
(6, 'jam ke-6'),
(7, 'jam ke-7'),
(8, 'jam ke-8'),
(9, 'siang'),
(10, 'sore');

-- --------------------------------------------------------

--
-- Table structure for table `t_pinjam`
--

CREATE TABLE `t_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` varchar(16) NOT NULL,
  `id_ruang` varchar(16) NOT NULL,
  `id_admin` varchar(16) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `lembaga` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jam_pengajuan` time NOT NULL,
  `tgl_acc` date NOT NULL,
  `jam_acc` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_pinjam`
--

INSERT INTO `t_pinjam` (`id_pinjam`, `id_user`, `id_ruang`, `id_admin`, `keperluan`, `lembaga`, `tgl_pinjam`, `jam_mulai`, `jam_selesai`, `tgl_pengajuan`, `jam_pengajuan`, `tgl_acc`, `jam_acc`, `status`) VALUES
(12, '3124', '58', '', 'NGAJAR', '12', '2024-09-28', '08:00:00', '12:00:00', '2024-09-27', '11:12:02', '2024-09-27', '11:12:40', 2),
(13, '3124', '58', '', 'NGAJAR', '12', '2024-09-28', '08:00:00', '12:00:00', '2024-09-28', '02:22:09', '2024-09-28', '02:45:19', 0),
(14, '3124', '59', '', 'NGAJAR', '12', '2024-09-29', '08:00:00', '09:00:00', '2024-09-28', '02:34:21', '2024-09-28', '02:45:24', 2),
(15, '3124', '59', '', 'NGAJAR', '12', '2024-09-29', '08:00:00', '09:00:00', '2024-09-28', '02:47:33', '2024-09-28', '03:31:49', 0),
(16, '3124', '59', '', 'NGAJAR', '11', '2024-09-30', '07:30:00', '08:20:00', '2024-09-28', '03:29:02', '2024-09-28', '04:33:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(16) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` int(1) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `no_telp` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `NIM_NIP` varchar(50) NOT NULL,
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_user`, `tgl_lahir`, `status`, `fakultas`, `no_telp`, `email`, `NIM_NIP`, `user`, `pass`) VALUES
(3124, 'test', '1998-08-15', 1, 'Kesehatan', '08111111111', 'ellinaswaja@gmail.com', '123456', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `t_jam`
--
ALTER TABLE `t_jam`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `t_pinjam`
--
ALTER TABLE `t_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `NIM_NIP` (`NIM_NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `t_jam`
--
ALTER TABLE `t_jam`
  MODIFY `_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_pinjam`
--
ALTER TABLE `t_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
