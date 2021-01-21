-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 08:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkmawapress`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alt` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alt`, `nim`) VALUES
(1, '1511521004'),
(3, '1511521016'),
(4, '1511521027'),
(6, '1511522025'),
(7, '1511522029'),
(5, '1611521003'),
(2, '1611522004');

-- --------------------------------------------------------

--
-- Table structure for table `detail_alternatif`
--

CREATE TABLE `detail_alternatif` (
  `id_detailalt` int(11) NOT NULL,
  `id_alt` int(11) NOT NULL,
  `id_krit` int(11) NOT NULL,
  `value_alt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_alternatif`
--

INSERT INTO `detail_alternatif` (`id_detailalt`, `id_alt`, `id_krit`, `value_alt`) VALUES
(1, 1, 1, '<p>Poin : 7</p><p>Piagam :</p><ul><li>Lokal Unand : Padang Economic Conference 2019</li><li>Lokal Unand : Innovation Paper Contest Smartcity</li><li>Nasional :&nbsp;Indonesia Next 2018</li><li>Internasional :&nbsp;Indonesian Next Future Agile Leaders Program</li></ul>'),
(2, 1, 2, 'A'),
(3, 1, 3, '<p>Poin : 0</p><p>Organisasi : -</p><p><br></p>'),
(4, 1, 4, '8'),
(5, 2, 1, '<p>Poin : 6</p><p>Piagam :</p><ul><li>Lokal Unand :&nbsp;Padang Economic Conference 2019</li><li>Lokal Unand :&nbsp;Padang Economic Converence</li><li>Nasional :&nbsp;BPC Manajement festifal 2019</li><li>Nasional :&nbsp;Indonesian Future Leader Summit 2019</li></ul>'),
(6, 2, 2, 'B'),
(7, 2, 3, '<p>Poin : 4</p><p>Organisasi :</p><ul><li>Presidium : Himpunan Mahasiswa Sistem Informasi</li><li>Presidium : Labor Dasar Komputasi</li></ul>'),
(8, 2, 4, '6'),
(9, 3, 1, '<p>Poin : 2</p><p>Piagam :</p><ul><li>Nasional : Indonesia Next 2018&nbsp;<br></li></ul>'),
(10, 3, 2, 'B+'),
(11, 3, 3, '<p>Poin : 2</p><p>Organisasi :</p><ul><li>Anggota : Al-Fatih</li><li>Anggota : Neo Telemetri&nbsp;</li></ul>'),
(12, 3, 4, '8'),
(13, 4, 1, '<p>Poin : 1</p><p>Piagam :</p><ul><li>Lokal Unand :&nbsp;Open Turnamen Tenis Meja di Politeknik Negeri Padang</li></ul>'),
(14, 4, 2, 'B'),
(15, 4, 3, '<p>Poin : 2</p><p>Organisasi :</p><ul><li>Presidium : Unit Kegiatan Olahraga dan Seni FTI</li></ul><p><br></p>'),
(16, 4, 4, '8'),
(17, 5, 1, '<p>Poin : 1</p><p>Piagam :</p><ul><li>Lokal Unand :&nbsp;Pemilihan Mawapres 2019 Universitas Andalas</li></ul>'),
(18, 5, 2, 'A'),
(19, 5, 3, '<p>Poin : 1</p><p>Organisasi :</p><ul><li>Anggota : Badan Eksekutif Mahaiswa FTI</li></ul>'),
(20, 5, 4, '6'),
(21, 6, 1, '<p>Poin : 2</p><p>Piagam :</p><ul><li>Nasional :&nbsp;Youth Summit 2019&nbsp;</li></ul>'),
(22, 6, 2, 'B'),
(23, 6, 3, '<p>Poin : 1</p><p>Organisasi :</p><ul><li>Anggota : Labor GIS</li></ul>'),
(24, 6, 4, '8'),
(25, 7, 1, '<p>Poin : 2</p><p>Piagam :&nbsp;</p><ul><li>Nasional : Youth Summit 2019&nbsp;<br></li></ul>'),
(26, 7, 2, 'B'),
(27, 7, 3, '<p>Poin : 2</p><p>Organisasi :&nbsp;</p><ul><li>Presidium : Badan Eksekutif Mahasiswa KM Unand</li></ul>'),
(28, 7, 4, '8');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_alt` int(11) NOT NULL,
  `value_hsl` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_alt`, `value_hsl`) VALUES
(1, 0.327959),
(2, 0.224454),
(3, 0.0978766),
(4, 0.0661805),
(5, 0.124838),
(6, 0.0754458),
(7, 0.0832464);

-- --------------------------------------------------------

--
-- Table structure for table `ind_ratio`
--

CREATE TABLE `ind_ratio` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ind_ratio`
--

INSERT INTO `ind_ratio` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_krit` int(11) NOT NULL,
  `nama_krit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_krit`, `nama_krit`) VALUES
(1, 'Piagam'),
(2, 'IPK'),
(3, 'Organisasi'),
(4, 'Semester');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nama_mhs` varchar(100) NOT NULL,
  `nim` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nama_mhs`, `nim`) VALUES
('Dartieka Anie Marian', '1511521004'),
('Vedo Alfarizi', '1511521016'),
('Virani Oktavia', '1511521027'),
('Novisa Ardewati', '1511522025'),
('Cahaya Camila', '1511522029'),
('Hanifah Azra Lubis', '1611521003'),
('Dira Yosfiranda', '1611522004');

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id_pa` int(11) NOT NULL,
  `alt_utama` int(11) NOT NULL,
  `alt_pembanding` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `value_alt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`id_pa`, `alt_utama`, `alt_pembanding`, `pembanding`, `value_alt`) VALUES
(1, 1, 2, 1, 2),
(2, 1, 3, 1, 6),
(3, 1, 4, 1, 7),
(4, 1, 5, 1, 7),
(5, 1, 6, 1, 6),
(6, 1, 7, 1, 6),
(7, 2, 3, 1, 5),
(8, 2, 4, 1, 6),
(9, 2, 5, 1, 6),
(10, 2, 6, 1, 5),
(11, 2, 7, 1, 5),
(12, 3, 4, 1, 2),
(13, 3, 5, 1, 2),
(14, 3, 6, 1, 1),
(15, 3, 7, 1, 1),
(16, 4, 5, 1, 1),
(17, 4, 6, 1, 0.5),
(18, 4, 7, 1, 0.5),
(19, 5, 6, 1, 0.5),
(20, 5, 7, 1, 0.5),
(21, 6, 7, 1, 1),
(22, 1, 2, 2, 6),
(23, 1, 3, 2, 3),
(24, 1, 4, 2, 6),
(25, 1, 5, 2, 1),
(26, 1, 6, 2, 6),
(27, 1, 7, 2, 6),
(28, 2, 3, 2, 0.5),
(29, 2, 4, 2, 1),
(30, 2, 5, 2, 0.166667),
(31, 2, 6, 2, 1),
(32, 2, 7, 2, 1),
(33, 3, 4, 2, 2),
(34, 3, 5, 2, 0.333333),
(35, 3, 6, 2, 2),
(36, 3, 7, 2, 2),
(37, 4, 5, 2, 0.166667),
(38, 4, 6, 2, 1),
(39, 4, 7, 2, 1),
(40, 5, 6, 2, 6),
(41, 5, 7, 2, 6),
(42, 6, 7, 2, 1),
(43, 1, 2, 3, 0.2),
(44, 1, 3, 3, 0.333333),
(45, 1, 4, 3, 0.333333),
(46, 1, 5, 3, 0.5),
(47, 1, 6, 3, 0.5),
(48, 1, 7, 3, 0.333333),
(49, 2, 3, 3, 3),
(50, 2, 4, 3, 3),
(51, 2, 5, 3, 4),
(52, 2, 6, 3, 4),
(53, 2, 7, 3, 3),
(54, 3, 4, 3, 1),
(55, 3, 5, 3, 2),
(56, 3, 6, 3, 2),
(57, 3, 7, 3, 1),
(58, 4, 5, 3, 2),
(59, 4, 6, 3, 2),
(60, 4, 7, 3, 1),
(61, 5, 6, 3, 1),
(62, 5, 7, 3, 0.5),
(63, 6, 7, 3, 0.5),
(64, 1, 2, 4, 3),
(65, 1, 3, 4, 1),
(66, 1, 4, 4, 1),
(67, 1, 5, 4, 3),
(68, 1, 6, 4, 1),
(69, 1, 7, 4, 1),
(70, 2, 3, 4, 0.333333),
(71, 2, 4, 4, 0.333333),
(72, 2, 5, 4, 1),
(73, 2, 6, 4, 0.333333),
(74, 2, 7, 4, 0.333333),
(75, 3, 4, 4, 1),
(76, 3, 5, 4, 3),
(77, 3, 6, 4, 1),
(78, 3, 7, 4, 1),
(79, 4, 5, 4, 3),
(80, 4, 6, 4, 1),
(81, 4, 7, 4, 1),
(82, 5, 6, 4, 0.333333),
(83, 5, 7, 4, 0.333333),
(84, 6, 7, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id_pk` int(11) NOT NULL,
  `krit_pembanding` int(11) NOT NULL,
  `krit_utama` int(11) NOT NULL,
  `value_krit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id_pk`, `krit_pembanding`, `krit_utama`, `value_krit`) VALUES
(1, 2, 1, 3),
(2, 3, 1, 5),
(3, 4, 1, 7),
(4, 3, 2, 3),
(5, 4, 2, 5),
(6, 4, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sp_alternatif`
--

CREATE TABLE `sp_alternatif` (
  `id_alt` int(11) NOT NULL,
  `id_krit` int(11) NOT NULL,
  `id_spalt` int(11) NOT NULL,
  `value_spalt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_alternatif`
--

INSERT INTO `sp_alternatif` (`id_alt`, `id_krit`, `id_spalt`, `value_spalt`) VALUES
(1, 1, 0, 0.401806),
(2, 1, 0, 0.292059),
(3, 1, 0, 0.0734629),
(4, 1, 0, 0.042873),
(5, 1, 0, 0.042873),
(6, 1, 0, 0.0734629),
(7, 1, 0, 0.0734629),
(1, 2, 0, 0.333333),
(2, 2, 0, 0.0555556),
(3, 2, 0, 0.111111),
(4, 2, 0, 0.0555556),
(5, 2, 0, 0.333333),
(6, 2, 0, 0.0555556),
(7, 2, 0, 0.0555556),
(1, 3, 0, 0.0490099),
(2, 3, 0, 0.357257),
(3, 3, 0, 0.144349),
(4, 3, 0, 0.144349),
(5, 3, 0, 0.080343),
(6, 3, 0, 0.080343),
(7, 3, 0, 0.144349),
(1, 4, 0, 0.176471),
(2, 4, 0, 0.0588235),
(3, 4, 0, 0.176471),
(4, 4, 0, 0.176471),
(5, 4, 0, 0.0588235),
(6, 4, 0, 0.176471),
(7, 4, 0, 0.176471);

-- --------------------------------------------------------

--
-- Table structure for table `sp_kriteria`
--

CREATE TABLE `sp_kriteria` (
  `id_krit` int(11) NOT NULL,
  `value_spkrit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_kriteria`
--

INSERT INTO `sp_kriteria` (`id_krit`, `value_spkrit`) VALUES
(1, 0.557893),
(2, 0.263345),
(3, 0.121873),
(4, 0.0568898);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `username`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alt`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `detail_alternatif`
--
ALTER TABLE `detail_alternatif`
  ADD PRIMARY KEY (`id_detailalt`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_alt`);

--
-- Indexes for table `ind_ratio`
--
ALTER TABLE `ind_ratio`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_krit`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id_pa`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `sp_kriteria`
--
ALTER TABLE `sp_kriteria`
  ADD PRIMARY KEY (`id_krit`);

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
  MODIFY `id_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_alternatif`
--
ALTER TABLE `detail_alternatif`
  MODIFY `id_detailalt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ind_ratio`
--
ALTER TABLE `ind_ratio`
  MODIFY `jumlah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_krit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sp_kriteria`
--
ALTER TABLE `sp_kriteria`
  MODIFY `id_krit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
