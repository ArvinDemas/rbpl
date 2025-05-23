-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 12:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klp10`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(255) NOT NULL,
  `nama` char(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(255) NOT NULL,
  `status` char(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_mekanik` int(255) NOT NULL,
  `id_customer` int(255) NOT NULL,
  `id_motor` int(255) NOT NULL,
  `id_layanan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(255) NOT NULL,
  `nama` char(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `email`, `password`, `no_hp`) VALUES
(1, 'Arvin Demas Naryama', 'arpin@gmail.com', '12345678', '0'),
(4, '', '', '$2y$10$seiDf4E.In9Ap', '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_motor`
--

CREATE TABLE `detail_motor` (
  `id_motor` int(255) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `plat` varchar(10) NOT NULL,
  `vin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_servis`
--

CREATE TABLE `detail_servis` (
  `id_detail` int(255) NOT NULL,
  `id_layanan` int(255) NOT NULL,
  `id_servis` int(255) NOT NULL,
  `id_customer` int(255) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `id_sparepart` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `ID_Layanan` int(255) NOT NULL,
  `Nama` char(20) NOT NULL,
  `Harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int(255) NOT NULL,
  `nama` char(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `spesialis` char(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id_servis` int(255) NOT NULL,
  `status` char(255) NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `id_booking` int(255) NOT NULL,
  `id_mekanik` int(255) NOT NULL,
  `id_sparepart` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_sparepart` int(255) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `stock` int(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_motor`
--
ALTER TABLE `detail_motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indexes for table `detail_servis`
--
ALTER TABLE `detail_servis`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id_servis`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_motor`
--
ALTER TABLE `detail_motor`
  MODIFY `id_motor` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_servis`
--
ALTER TABLE `detail_servis`
  MODIFY `id_detail` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id_mekanik` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id_servis` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id_sparepart` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
