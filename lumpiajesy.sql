-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 01:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumpiajesy`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `Nama` varchar(128) NOT NULL,
  `Telepon` varchar(128) NOT NULL,
  `user_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `Nama`, `Telepon`, `user_role`) VALUES
(2, 'Tysca', '081111111111', 1),
(3, 'Aldrich', '08201830123', 0),
(4, 'Erwin', '08201830124', 0),
(5, 'Aldrich', '08129311213', 0),
(6, 'Erwin', '08123345678', 0),
(7, 'Aldrich', '081981231231', 0),
(13, 'Aldrich', '082350424688', 0),
(14, 'Aldrich', '0812931121344', 0),
(15, 'Livia', '081342608161', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Lumpia'),
(3, 'Gorengan'),
(4, 'minuman'),
(10, 'Ayam'),
(11, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga`, `kategori`) VALUES
(1, 'Lumpia Goreng', '8000', 'Lumpia'),
(3, 'Lumpia Kukus', '8000', 'Lumpia'),
(4, 'Ayam Suwir Pete', '30000', 'Makanan'),
(5, 'Ayam Betutu', '100000', 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id` int(11) NOT NULL,
  `nama_cust` varchar(128) NOT NULL,
  `menu` varchar(600) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `pengambilan` datetime NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id`, `nama_cust`, `menu`, `harga`, `pengambilan`, `status`) VALUES
(27, 'Aldrich', ' Ayam Suwir Pete 1,', 'Rp 30.000,00', '2022-06-19 16:18:00', 1),
(28, 'Aldrich', ' Ayam Suwir Pete 2,', 'Rp 70.000,00', '2022-06-23 16:18:00', 0),
(30, 'Aldrich', ' Ayam Suwir Pete 1,', 'Rp 30.000,00', '2022-06-19 17:41:00', 1),
(31, 'Aldrich', ' Ayam Suwir Pete 1,', 'Rp 40.000,00', '2022-06-19 17:44:00', 1),
(32, 'Livia', ' Ayam Suwir Pete 3, Lumpia Goreng 10,', 'Rp 180.000,00', '2022-06-21 10:30:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
