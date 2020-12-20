-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2020 at 01:29 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nisn`, `nama_siswa`, `jenis_kelamin`) VALUES
(12, '23', 'dimas', 'laki-laki'),
(13, '24', 'angga', 'laki-laki'),
(14, '231', 'anggi', 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL,
  `bobot_core` int(11) NOT NULL,
  `bobot_secondary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `bobot_core`, `bobot_secondary`) VALUES
(7, 'Aspek Kapasistas Intelektual', 20, 55, 45),
(8, 'Aspek Sikap Kerja', 30, 70, 30),
(9, 'Aspek Prilaku', 50, 60, 40);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_subkriteria`, `nilai`) VALUES
(1, 9, 4, 2),
(2, 9, 6, 5),
(3, 10, 4, 1),
(4, 10, 6, 4),
(5, 11, 4, 0),
(6, 11, 6, 2),
(7, 9, 7, 0),
(8, 10, 7, 0),
(9, 11, 7, 0),
(10, 12, 8, 3),
(11, 12, 9, 3),
(12, 12, 10, 3),
(13, 12, 11, 2),
(14, 12, 12, 4),
(15, 12, 13, 1),
(16, 12, 14, 1),
(17, 12, 15, 1),
(18, 12, 16, 1),
(19, 12, 18, 2),
(20, 12, 19, 3),
(21, 12, 20, 2),
(22, 12, 21, 3),
(23, 13, 8, 1),
(24, 13, 9, 1),
(25, 13, 10, 1),
(26, 13, 11, 1),
(27, 13, 12, 1),
(28, 13, 13, 3),
(29, 13, 14, 2),
(30, 13, 15, 2),
(31, 13, 16, 3),
(32, 13, 18, 2),
(33, 13, 19, 3),
(34, 13, 20, 3),
(35, 13, 21, 3),
(36, 14, 8, 2),
(37, 14, 9, 3),
(38, 14, 10, 4),
(39, 14, 11, 3),
(40, 14, 12, 3),
(41, 14, 13, 3),
(42, 14, 14, 4),
(43, 14, 15, 2),
(44, 14, 16, 4),
(45, 14, 18, 3),
(46, 14, 19, 2),
(47, 14, 20, 3),
(48, 14, 21, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_ranking`, `id_alternatif`, `total`) VALUES
(445, 14, 3.8675),
(446, 12, 3.1125),
(447, 13, 3.1);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(255) NOT NULL,
  `nilai_target` int(11) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `nilai_target`, `tipe`) VALUES
(8, 7, 'Verbalisasi Ide', 3, 'core'),
(9, 7, 'Sistematika Berfikir', 4, 'core'),
(10, 7, 'Konsentrasi', 4, 'core'),
(11, 7, 'Logika Praktis', 3, 'secondary'),
(12, 7, 'Potensi Kecerdasan', 3, 'secondary'),
(13, 8, 'Energi Psikis', 3, 'core'),
(14, 8, 'Ketelitian dan Tangggung Jawab', 3, 'core'),
(15, 8, 'Kehati-hatian', 3, 'secondary'),
(16, 8, 'Dorongan Berprestasi', 4, 'secondary'),
(18, 9, 'Dominance (Kekuasaan)', 3, 'core'),
(19, 9, 'Influences (Pengaruh)', 2, 'core'),
(20, 9, 'Steadiness (Keteguhan Hati)', 3, 'secondary'),
(21, 9, 'Compliance (Pemenuhan)', 4, 'secondary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

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
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
