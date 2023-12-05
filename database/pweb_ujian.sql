-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 10:54 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_ujian`
--

CREATE TABLE IF NOT EXISTS `list_ujian` (
  `id` int(11) NOT NULL,
  `matkul` varchar(255) NOT NULL,
  `sesi` int(2) NOT NULL,
  `tanggalUjian` date NOT NULL,
  `tanggalSimpan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_ujian`
--

INSERT INTO `list_ujian` (`id`, `matkul`, `sesi`, `tanggalUjian`, `tanggalSimpan`) VALUES
(1, 'Pemrograman Web', 2, '2023-12-09', '2023-12-04 10:06:37'),
(3, 'Interaksi Manusia dan Komputer 1', 2, '2023-12-08', '2023-12-04 10:10:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_ujian`
--
ALTER TABLE `list_ujian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_ujian`
--
ALTER TABLE `list_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
