-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2018 at 08:37 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_solmit`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_lokasi_kerja`
--

CREATE TABLE `m_lokasi_kerja` (
  `lokasi_kerja_id` int(11) NOT NULL,
  `lokasi_kerja_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_lokasi_kerja`
--

INSERT INTO `m_lokasi_kerja` (`lokasi_kerja_id`, `lokasi_kerja_nama`) VALUES
(2, 'Bandung'),
(3, 'Cianjur'),
(4, 'Cimahi'),
(5, 'Purwakarta'),
(6, 'Karawang'),
(7, 'Tasikmalaya'),
(8, 'Sukabumi'),
(9, 'Bogor'),
(10, 'Depok'),
(11, 'Bekasi'),
(12, 'Banjar'),
(21, 'Kuningan'),
(25, 'Cikarang'),
(26, 'Indramayu'),
(27, 'Pangandaran');

-- --------------------------------------------------------

--
-- Table structure for table `m_unit_kerja`
--

CREATE TABLE `m_unit_kerja` (
  `unit_kerja_id` int(11) NOT NULL,
  `unit_kerja_nama` varchar(100) NOT NULL,
  `lokasi_kerja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_unit_kerja`
--

INSERT INTO `m_unit_kerja` (`unit_kerja_id`, `unit_kerja_nama`, `lokasi_kerja_id`) VALUES
(3, 'Sarijadi', 2),
(4, 'Bandung Wetan', 2),
(6, 'Haurwangi', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_lokasi_kerja`
--
ALTER TABLE `m_lokasi_kerja`
  ADD PRIMARY KEY (`lokasi_kerja_id`);

--
-- Indexes for table `m_unit_kerja`
--
ALTER TABLE `m_unit_kerja`
  ADD PRIMARY KEY (`unit_kerja_id`),
  ADD KEY `lokasi_kerja_id` (`lokasi_kerja_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_lokasi_kerja`
--
ALTER TABLE `m_lokasi_kerja`
  MODIFY `lokasi_kerja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `m_unit_kerja`
--
ALTER TABLE `m_unit_kerja`
  MODIFY `unit_kerja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
