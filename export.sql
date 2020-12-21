-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2020 at 06:21 PM
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
(1, '1', 'Dandi', 'laki-laki'),
(2, '2', 'Eldy Efriyana', 'perempuan'),
(3, '3', 'Febri Patma Sari', 'perempuan'),
(4, '4', 'Ulul Azniah Sudarmo', 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `jenis` varchar(5) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL,
  `bobot_core` int(11) NOT NULL,
  `bobot_secondary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `jenis`, `bobot_kriteria`, `bobot_core`, `bobot_secondary`) VALUES
(5, 'Pengetahuan', 'angka', 40, 60, 40),
(6, 'Keterampilan', 'angka', 40, 60, 40),
(7, 'Sikap', 'huruf', 20, 60, 40);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_subkriteria`, `nilai`) VALUES
(1137, 1, 2, '85'),
(1138, 1, 4, '77'),
(1139, 1, 6, '78'),
(1140, 1, 8, '70'),
(1141, 1, 10, '73'),
(1142, 1, 12, '70'),
(1143, 1, 14, '75'),
(1144, 1, 16, '84'),
(1145, 1, 18, '80'),
(1146, 1, 20, '70'),
(1147, 1, 22, '70'),
(1148, 1, 24, '70'),
(1149, 1, 26, '79'),
(1150, 1, 28, '70'),
(1151, 1, 30, '70'),
(1152, 1, 32, '75'),
(1153, 1, 3, '84'),
(1154, 1, 5, '77'),
(1155, 1, 7, '78'),
(1156, 1, 9, '70'),
(1157, 1, 11, '73'),
(1158, 1, 13, '70'),
(1159, 1, 15, '75'),
(1160, 1, 17, '92'),
(1161, 1, 19, '80'),
(1162, 1, 21, '70'),
(1163, 1, 23, '70'),
(1164, 1, 25, '70'),
(1165, 1, 27, '80'),
(1166, 1, 29, '70'),
(1167, 1, 31, '71'),
(1168, 1, 33, '75'),
(1169, 1, 34, 'B'),
(1170, 1, 35, 'B'),
(1171, 2, 2, '86'),
(1172, 2, 4, '84'),
(1173, 2, 6, '79'),
(1174, 2, 8, '85'),
(1175, 2, 10, '77'),
(1176, 2, 12, '90'),
(1177, 2, 14, '89'),
(1178, 2, 16, '86'),
(1179, 2, 18, '89'),
(1180, 2, 20, '80'),
(1181, 2, 22, '80'),
(1182, 2, 24, '72'),
(1183, 2, 26, '82'),
(1184, 2, 28, '85'),
(1185, 2, 30, '86'),
(1186, 2, 32, '80'),
(1187, 2, 3, '85'),
(1188, 2, 5, '84'),
(1189, 2, 7, '80'),
(1190, 2, 9, '85'),
(1191, 2, 11, '77'),
(1192, 2, 13, '90'),
(1193, 2, 15, '90'),
(1194, 2, 17, '90'),
(1195, 2, 19, '89'),
(1196, 2, 21, '79'),
(1197, 2, 23, '85'),
(1198, 2, 25, '72'),
(1199, 2, 27, '81'),
(1200, 2, 29, '85'),
(1201, 2, 31, '86'),
(1202, 2, 33, '82'),
(1203, 2, 34, 'A'),
(1204, 2, 35, 'B'),
(1205, 3, 2, '89'),
(1206, 3, 4, '78'),
(1207, 3, 6, '90'),
(1208, 3, 8, '75'),
(1209, 3, 10, '85'),
(1210, 3, 12, '80'),
(1211, 3, 14, '89'),
(1212, 3, 16, '90'),
(1213, 3, 18, '80'),
(1214, 3, 20, '80'),
(1215, 3, 22, '80'),
(1216, 3, 24, '73'),
(1217, 3, 26, '85'),
(1218, 3, 28, '75'),
(1219, 3, 30, '84'),
(1220, 3, 32, '87'),
(1221, 3, 3, '89'),
(1222, 3, 5, '78'),
(1223, 3, 7, '78'),
(1224, 3, 9, '75'),
(1225, 3, 11, '85'),
(1226, 3, 13, '80'),
(1227, 3, 15, '90'),
(1228, 3, 17, '90'),
(1229, 3, 19, '80'),
(1230, 3, 21, '82'),
(1231, 3, 23, '88'),
(1232, 3, 25, '72'),
(1233, 3, 27, '82'),
(1234, 3, 29, '75'),
(1235, 3, 31, '87'),
(1236, 3, 33, '87'),
(1237, 3, 34, 'B'),
(1238, 3, 35, 'A'),
(1239, 4, 2, '89'),
(1240, 4, 4, '83'),
(1241, 4, 6, '90'),
(1242, 4, 8, '92'),
(1243, 4, 10, '84'),
(1244, 4, 12, '90'),
(1245, 4, 14, '95'),
(1246, 4, 16, '88'),
(1247, 4, 18, '89'),
(1248, 4, 20, '80'),
(1249, 4, 22, '80'),
(1250, 4, 24, '85'),
(1251, 4, 26, '86'),
(1252, 4, 28, '87'),
(1253, 4, 30, '87'),
(1254, 4, 32, '85'),
(1255, 4, 3, '90'),
(1256, 4, 5, '83'),
(1257, 4, 7, '88'),
(1258, 4, 9, '92'),
(1259, 4, 11, '84'),
(1260, 4, 13, '90'),
(1261, 4, 15, '95'),
(1262, 4, 17, '86'),
(1263, 4, 19, '89'),
(1264, 4, 21, '84'),
(1265, 4, 23, '90'),
(1266, 4, 25, '85'),
(1267, 4, 27, '84'),
(1268, 4, 29, '87'),
(1269, 4, 31, '87'),
(1270, 4, 33, '85'),
(1271, 4, 34, 'A'),
(1272, 4, 35, 'B');

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
(353, 4, 34.16),
(354, 2, 31.92),
(355, 3, 31),
(356, 1, 27.32);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(255) NOT NULL,
  `nilai_target` varchar(11) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `nilai_target`, `tipe`) VALUES
(2, 5, 'Pendidikan Agama Islam (PAI)', '10', 'secondary'),
(3, 6, 'Pendidikan Agama Islam (PAI)', '10', 'secondary'),
(4, 5, 'Pendidikan Kewarganegaraan (PKn)', '10', 'secondary'),
(5, 6, 'Pendidikan Kewarganegaraan (PKn)', '10', 'secondary'),
(6, 5, 'Bahasa Indonesia', '10', 'core'),
(7, 6, 'Bahasa Indonesia', '10', 'core'),
(8, 5, 'Matematika Wajib', '10', 'core'),
(9, 6, 'Matematika Wajib', '10', 'core'),
(10, 5, 'Sejarah Indonesia', '10', 'secondary'),
(11, 6, 'Sejarah Indonesia', '10', 'secondary'),
(12, 5, 'Bahasa Inggris', '10', 'core'),
(13, 6, 'Bahasa Inggris', '10', 'core'),
(14, 5, 'Seni Budaya', '10', 'secondary'),
(15, 6, 'Seni Budaya', '10', 'secondary'),
(16, 5, 'Pendidikan Jasmani dan Kesehatan', '10', 'secondary'),
(17, 6, 'Pendidikan Jasmani dan Kesehatan', '10', 'secondary'),
(18, 5, 'PKWU', '10', 'secondary'),
(19, 6, 'PKWU', '10', 'secondary'),
(20, 5, 'Kemuh', '10', 'secondary'),
(21, 6, 'Kemuh', '10', 'secondary'),
(22, 5, 'Bahasa Arab', '10', 'secondary'),
(23, 6, 'Bahasa Arab', '10', 'secondary'),
(24, 5, 'Matematika MIA', '10', 'core'),
(25, 6, 'Matematika MIA', '10', 'core'),
(26, 5, 'Biologi', '10', 'core'),
(27, 6, 'Biologi', '10', 'core'),
(28, 5, 'Fisika', '10', 'core'),
(29, 6, 'Fisika', '10', 'core'),
(30, 5, 'Kimia', '10', 'core'),
(31, 6, 'Kimia', '10', 'core'),
(32, 5, 'Sejarah', '10', 'secondary'),
(33, 6, 'Sejarah', '10', 'secondary'),
(34, 7, 'Kesopanan', 'A', 'core'),
(35, 7, 'Tingkah laku', 'A', 'secondary');

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
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1273;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
