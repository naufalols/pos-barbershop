-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 02:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barberotong`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_cukur` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_nota`
--

CREATE TABLE `keranjang_nota` (
  `id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `id_cukur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nm_menu` varchar(120) NOT NULL,
  `harga` varchar(120) NOT NULL,
  `gambar` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nm_menu`, `harga`, `gambar`) VALUES
(1, 'Cukur Rambut', '20000', ''),
(2, 'Shampoo', '5000', ''),
(3, 'Creambath', '10000', 'gunting.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `katasandi` varchar(120) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `is_active` int(11) NOT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `katasandi`, `role_id`, `is_active`, `tanggal_buat`, `gambar`) VALUES
(1, 'Admin', 'admin', '$2y$10$qd4BYntpzKCAMehKF5Ob6.ASY1mYwMPlW.mudTm2dre41vHeSw7PK', 1, 1, '2020-12-30 13:18:50', ''),
(2, 'Admiuser', 'user', '$2y$10$qd4BYntpzKCAMehKF5Ob6.ASY1mYwMPlW.mudTm2dre41vHeSw7PK', 2, 1, '2020-12-30 13:18:43', ''),
(3, 'naufal', 'user1', '$2y$10$qd4BYntpzKCAMehKF5Ob6.ASY1mYwMPlW.mudTm2dre41vHeSw7PK', 2, 1, '0000-00-00 00:00:00', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `id_cukur` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `tgl_nota_cukur` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_nota`, `id_cukur`, `id_menu`, `tgl_nota_cukur`) VALUES
(1, 5768, 1, 1, '2020-12-30 12:14:32'),
(2, 5768, 1, 2, '2020-12-30 12:14:32'),
(3, 6224, 2, 2, '2020-12-30 12:21:57'),
(4, 6224, 2, 1, '2020-12-30 12:21:57'),
(5, 7139, 1, 2, '2020-12-30 12:30:28'),
(6, 490, 1, 2, '2020-12-30 12:36:21'),
(7, 7561, 1, 2, '2020-12-30 13:02:24'),
(8, 8090, 2, 2, '2020-12-30 13:09:56'),
(9, 119, 2, 2, '2020-12-30 13:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `tk_cukur`
--

CREATE TABLE `tk_cukur` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `no_tlp` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tk_cukur`
--

INSERT INTO `tk_cukur` (`id`, `nama`, `no_tlp`) VALUES
(1, 'Fahmi', ''),
(2, 'Dwi', ''),
(3, 'Daifullah', '081694361');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang_nota`
--
ALTER TABLE `keranjang_nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tk_cukur`
--
ALTER TABLE `tk_cukur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `keranjang_nota`
--
ALTER TABLE `keranjang_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tk_cukur`
--
ALTER TABLE `tk_cukur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
