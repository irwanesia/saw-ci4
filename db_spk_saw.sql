-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 01:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode`, `alternatif`, `prodi`) VALUES
(1, 'A1', 'Alternatif 1', ''),
(2, 'A2', 'Alternatif 2', ''),
(3, 'A3', 'Alternatif 3', '');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `type` enum('Benefit','Cost') NOT NULL,
  `bobot` float NOT NULL,
  `ada_pilihan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `kriteria`, `type`, `bobot`, `ada_pilihan`) VALUES
(16, 'C1', 'Status Orang Tua', 'Cost', 0.2, 1),
(17, 'C2', 'Jumlah Tanggungan', 'Benefit', 0.1, 1),
(18, 'C3', 'Penghasilan Orang Tua', 'Cost', 0.15, 1),
(19, 'C4', 'Pekerjaan Orang Tua', 'Cost', 0.15, 1),
(21, 'C5', 'Status Tempat Tinggal', 'Benefit', 0.05, 1),
(22, 'C6', 'Keterangan Miskin', 'Benefit', 0.3, 1),
(23, 'C7', 'Prestasi Non Akademik', 'Benefit', 0.05, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(8, 1, 16, 4),
(9, 1, 17, 3),
(10, 1, 18, 2),
(11, 1, 19, 4),
(12, 1, 21, 4),
(13, 1, 22, 5),
(14, 1, 23, 1),
(15, 2, 16, 2),
(16, 2, 17, 3),
(17, 2, 18, 1),
(18, 2, 19, 3),
(19, 2, 21, 3),
(20, 2, 22, 3),
(21, 2, 23, 2),
(22, 3, 16, 5),
(23, 3, 17, 3),
(24, 3, 18, 1),
(25, 3, 19, 2),
(26, 3, 21, 3),
(27, 3, 22, 3),
(28, 3, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `sub_kriteria` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `sub_kriteria`, `nilai`) VALUES
(17, 16, 'Yatim', 5),
(18, 16, 'Yatim/Piatu', 4),
(19, 16, 'Bercerai', 3),
(20, 16, 'Hidup', 2),
(23, 17, '4 Orang', 4),
(24, 17, '2-3 Orang', 3),
(25, 17, '0-1 Orang', 2),
(27, 18, 'Rp. 0 - Rp. 750.000', 5),
(28, 18, 'Rp. 750.001 - Rp. 1.000.000', 4),
(29, 18, 'Rp. 1.000.001 - Rp. 2.000.000', 3),
(30, 18, 'Rp. 2.000.001 - Rp. 2.500.000', 2),
(31, 18, 'Rp. 2.500.001 - Rp. 4.000.000', 1),
(32, 19, 'Petani/Nelayan/Tidak Bekerja', 5),
(33, 19, 'Buruh', 4),
(34, 19, 'Swasta', 3),
(35, 19, 'Wirausaha/Lainnya', 2),
(36, 19, 'PNS/Polri', 1),
(38, 17, '5 Orang', 5),
(39, 21, 'Sewa Tahunan/Bulanan', 5),
(40, 21, 'Menumpang', 4),
(41, 21, 'Milik Sendiri', 3),
(42, 22, 'KIP', 5),
(43, 22, 'KKS/PKH', 4),
(44, 22, 'SKTM', 3),
(45, 23, 'Internasional', 5),
(46, 23, 'Nasional', 4),
(47, 23, 'Provinsi', 3),
(48, 23, 'Kabupaten/Kota', 2),
(49, 23, 'Tidak Memiliki', 1),
(54, 27, 'test sub kriteria', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'admin@gmail.com', '1'),
(10, 'irwanesia', '$2y$10$W24GJ7Vm9PuoHFGPj.lOFuNYJbndySTaMkkqxBYhP/2', 'irwan', 'adfasd@dsf', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
