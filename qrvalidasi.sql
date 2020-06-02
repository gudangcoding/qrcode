-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2020 at 06:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrvalidasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `namalengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dadung Awuk'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Neprianto');

-- --------------------------------------------------------

--
-- Table structure for table `packing_list`
--

CREATE TABLE `packing_list` (
  `id` int(10) NOT NULL,
  `part_no` varchar(10) DEFAULT NULL,
  `part_name` varchar(40) DEFAULT NULL,
  `category` varchar(40) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_invoice` varchar(40) DEFAULT NULL,
  `qty_plan` decimal(10,2) DEFAULT NULL,
  `qty_check` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packing_list`
--

INSERT INTO `packing_list` (`id`, `part_no`, `part_name`, `category`, `tanggal`, `no_invoice`, `qty_plan`, `qty_check`, `balance`) VALUES
(1, '10010001', 'Komputer', 'Lokal', '2018-12-05', '2018/IJ/LI-COM/XII/090', '2000.00', '2000.00', '0.00'),
(2, '10010002', 'Keyboard', 'Import', '2018-12-14', '2018/IJ/LI-COM/XII/091', '2000.00', '2000.00', '0.00'),
(3, '10010003', 'Mouse', 'Lokal', '2018-12-11', '2018/IJ/LI-COM/XII/092', '2000.00', '2000.00', '0.00'),
(4, '10010004', 'Hard Disk', 'Import', '2018-12-18', '2018/IJ/LI-COM/XII/093', '2000.00', '2000.00', '0.00'),
(5, '10010005', 'Printer', 'Lokal', '2018-12-04', '2018/IJ/LI-COM/XII/094', '2000.00', '2000.00', '0.00'),
(7, '10010006', 'Laptop', 'Import', '2018-11-22', '2018/IJ/LI-COM/XII/095', '2000.00', '2000.00', '0.00'),
(8, '10010008', 'Flask Disk', 'Lokal', '2018-11-13', '2018/IJ/LI-COM/XII/096', '2000.00', '2000.00', '0.00'),
(9, '10010007', 'Charger Laptop', 'Lokal', '2018-11-22', '2018/IJ/LI-COM/XII/097', '2000.00', '2000.00', '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `packing_list`
--
ALTER TABLE `packing_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packing_list`
--
ALTER TABLE `packing_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
