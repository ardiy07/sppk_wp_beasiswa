-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 03:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `alternatif` varchar(250) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` varchar(20) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif`, `k1`, `k2`, `k3`, `k4`) VALUES
('Ira Nur Safitri',	'666667',	'93',	'80',	'40'),
('Halfi Syahdan Basith',	'1000000',	'86',	'40',	'60'),
('Ananda Dirga Aqilanaza', '1500000',	'93',	'40',	'100'),
('Dewi Alwiyana Yanti',	'1000000',	'92',	'60',	'40'),
('Femas Bagus Suseno',	'900000',	'83',	'80',	'100'),
('Lia Indriani',	'500000',	'82',	'60',	'80'),
('Intan Nurainy',	'1000000',	'81',	'20',	'80'),
('Imelda Mega Kanya',	'1500000',	'89',	'20',	'80'),
('Vita Nur Amalia',	'900000',	'81',	'20',	'100'),
('Ika Nur Fitriani',	'1500000',	'93',	'80',	'80'),
('Imelia Putika Sari',	'1000000',	'83',	'80',	'60'),
('Yuniar Rachmalita',	'1500000',	'92',	'20',	'60'),
('Linda Handayani',	'1000000',	'90',	'60',	'40');


-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(100) NOT NULL,
  `kepentingan` varchar(20) NOT NULL,
  `cost_benefit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria`, `kepentingan`, `cost_benefit`) VALUES
('C1 Pendapatan Orang Tua', '35', 'cost'),
('C2 Nilai Raport', '30', 'benefit'),
('C3 Motivation Letter', '15', 'benefit'),
('C4 Wawancara', '20', 'benefit');

--
-- Indexes for dumped tables
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
