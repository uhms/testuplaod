-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 04:29 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skputm`
--

-- --------------------------------------------------------

--
-- Table structure for table `kod_program`
--

CREATE TABLE `kod_program` (
  `ID_Program` text NOT NULL,
  `Nama_Program` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kod_program`
--

INSERT INTO `kod_program` (`ID_Program`, `Nama_Program`) VALUES
('SKEE', 'Sarjana Muda Kejuruteraan Eletrik'),
('SKEW', 'Sarjana Muda Kejuruteraan AWAM'),
('SKPP', 'Sarjana Muda Kejuruteraan Petrolium');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `NoKP` text NOT NULL,
  `Nama` text NOT NULL,
  `Tarikh_Lahir` date NOT NULL,
  `Jantina` text NOT NULL,
  `Alamat` text NOT NULL,
  `No_Telefon` text NOT NULL,
  `Emel` text NOT NULL,
  `Program_Pohon` text NOT NULL,
  `Status_Permohonan` text NOT NULL,
  `Catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`NoKP`, `Nama`, `Tarikh_Lahir`, `Jantina`, `Alamat`, `No_Telefon`, `Emel`, `Program_Pohon`, `Status_Permohonan`, `Catatan`) VALUES
('050703064434', 'SITI BINTI ALI', '2021-11-11', 'P', '72, KAMPUNG BUKIT KUARI,\r\nPARIT RAJA,', '6012-7337081', 'uh@gmail.com', 'SKPP', 'G', 'DAH CUKUP UMUR 2'),
('050703064442', 'RAMLAH BINTI MOHD RAMLI', '2021-11-24', 'P', '72, KAMPUNG BUKIT KUARI,\r\nPARIT RAJA,', '0127337081', 'ummihumaira1708.uh@gmail.com', 'SKPP', 'L', 'DAH CUKUP UMUR'),
('800606015131', 'SITI BINTI ALI', '2021-11-12', 'P', '72, KAMPUNG BUKIT KUARI,\r\nPARIT RAJA,', '012-7337081', 'uh@gmail.com', 'SKEE', 'L', 'Berjaya Memenuhi syarat'),
('95081701646', 'UMMI HUMAIRA BINTI MOHD SHAHLI', '2021-11-13', 'P', '72, KAMPUNG BUKIT KUARI,\r\nPARIT RAJA,', '012-7337082', 'humaira@gmail.com', 'SKEE', 'G', 'TidK Memenuhi syarat'),
('970809101112', 'Mohd Ali Bin Maulid', '1997-08-09', 'L', 'No. 1 Jalan Kubis 2, Seksyen 24, 40300 Shah Alam, Selangor', '019-7113766', 'ali@gmail.com', 'SKEE', 'L', 'Berjaya Memenuhi syarat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kod_program`
--
ALTER TABLE `kod_program`
  ADD PRIMARY KEY (`ID_Program`(5));

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`NoKP`(12));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
