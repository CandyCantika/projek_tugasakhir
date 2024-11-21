-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 02:15 PM
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
-- Database: `tripease_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasis`
--

CREATE TABLE `destinasis` (
  `id` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `harga` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasis`
--

INSERT INTO `destinasis` (`id`, `gambar`, `nama`, `deskripsi`, `harga`) VALUES
(4, 'uploads/1284829150.png', 'Paket Mesra Qiw Qiw', 'Habiskan hari yang santai dan romantis dengan mengunjungi dua destinasi unik di Malang: Café Dancok dan Taman Mesra.', 450000.00),
(8, 'uploads/1179527187.png', 'Trip Balekambang', 'Nikmati keindahan Pantai Balekambang dan pesona alam di sekitar Malang dalam paket wisata ini. Perjalanan dimulai dengan penjemputan di Malang, diikuti dengan perjalanan yang menyuguhkan pemandangan indah menuju Balekambang.', 750000.00),
(11, 'uploads/124658743.png', 'Trip Bromo - Malang', 'Jelajahi keindahan Gunung Bromo dan wisata alam di Malang dalam satu perjalanan seru! Anda akan dibawa menikmati pesona matahari terbit di Bromo, pasir berbisik, dan Bukit Teletubbies yang memukau.', 250000.00),
(13, 'uploads/1428213907.png', 'City Tour Batu', 'Dalam perjalanan ini, Anda akan mengunjungi berbagai tempat menarik seperti Alun-Alun Kota Batu yang ikonik, hingga taman bermain dan wahana seru di Jatim Park. ', 450000.00);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `plat` varchar(45) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `harga` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `gambar`, `nama`, `plat`, `deskripsi`, `harga`) VALUES
(1, 'uploads/899310651.png', 'Daihatsu Luxioo', 'N 4567 MS', 'berkapasitas hingga 8 penumpang. Harga sewa tidak termasuk biaya bensin dan sopir.', 750000.00),
(2, 'uploads/1890603509.jpeg', 'Daihatsu Gran Max', 'N 2712 DR', 'Daihatsu Gran Max berkapasitas hingga 8 penumpang. Harga sewa belum termasuk biaya bensin dan sopir.', 300000.00),
(16, 'uploads/335195092.jpg', 'Hyundai h1', 'N 06769 CBR', 'Hyundai H1 berkapasitas hingga 11 penumpang. Harga sewa belum termasuk biaya bensin dan sopir.', 750000.00);

-- --------------------------------------------------------

--
-- Table structure for table `multi_users`
--

CREATE TABLE `multi_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tlpn` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multi_users`
--

INSERT INTO `multi_users` (`id`, `nama`, `email`, `password`, `tlpn`, `alamat`, `role`) VALUES
(1, 'Candy Cantika', 'candyberliana@gmail.com', 'malang1234', '08912345678', 'jl.nusa indah ', 'admin'),
(2, 'candy', 'candy@gmail.com', '1234', '0812345', 'batu', 'user'),
(17, 'agus', 'agus@gmail.com', '098', '08765467', 'Malang', 'user'),
(19, 'feni', 'feni@gmail.com', '089', '0876543', 'Malang', 'user'),
(22, 'berta ', 'bet@gmail.com', '12345', '087252671818', 'Ngudi', 'user'),
(23, 'Nike', 'nike@gmail.com', '1234', '08729297718910', 'Ngantang, Kab.Malang', 'user'),
(24, 'okta', 'tata@gmail.com', '1234', '0872289187286', 'Karangploso', 'user'),
(25, 'Dimas', 'dim@gmail.com', '123456', '08736628829', 'Batu', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `order_destinasis`
--

CREATE TABLE `order_destinasis` (
  `id` int(11) NOT NULL,
  `tgl_book` date NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(50) NOT NULL,
  `durasi` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_keluar` date NOT NULL DEFAULT current_timestamp(),
  `kendaraan` int(45) NOT NULL,
  `destinasis_id` int(11) NOT NULL,
  `total_harga` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_destinasis`
--

INSERT INTO `order_destinasis` (`id`, `tgl_book`, `nama`, `durasi`, `tgl_mulai`, `tgl_keluar`, `kendaraan`, `destinasis_id`, `total_harga`) VALUES
(23, '2024-10-31', '2', 4, '2024-11-01', '2024-11-04', 2, 8, 1200000.00),
(24, '2024-10-31', '22', 5, '2024-11-07', '2024-11-11', 2, 8, 1500000.00),
(32, '2024-11-15', '24', 3, '2024-11-28', '2024-11-30', 1, 11, 75000000.00),
(47, '2024-11-16', '25', 1, '2024-11-19', '2024-11-19', 1, 13, 450000.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_kendaraan`
--

CREATE TABLE `order_kendaraan` (
  `id` int(11) NOT NULL,
  `tgl_book` date DEFAULT curdate(),
  `user` varchar(50) NOT NULL,
  `durasi` int(45) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_keluar` date NOT NULL DEFAULT current_timestamp(),
  `kendaraan` varchar(45) NOT NULL,
  `total_harga` double(15,2) NOT NULL,
  `kendaraan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_kendaraan`
--

INSERT INTO `order_kendaraan` (`id`, `tgl_book`, `user`, `durasi`, `tgl_mulai`, `tgl_keluar`, `kendaraan`, `total_harga`, `kendaraan_id`) VALUES
(14, '2024-10-31', '2', 5, '2024-10-31', '2024-11-04', 'Daihatsu Luxioo', 3750000.00, 1),
(16, '2024-10-31', '23', 2, '2024-11-04', '2024-11-05', 'h1', 1500000.00, 16),
(21, '2024-11-15', '25', 2, '2024-11-22', '2024-11-23', 'Daihatsu Gran Max', 60000000.00, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasis`
--
ALTER TABLE `destinasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_users`
--
ALTER TABLE `multi_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order_destinasis`
--
ALTER TABLE `order_destinasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinasis_id` (`destinasis_id`);

--
-- Indexes for table `order_kendaraan`
--
ALTER TABLE `order_kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_kendaraan_ibfk_1` (`kendaraan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasis`
--
ALTER TABLE `destinasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `multi_users`
--
ALTER TABLE `multi_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_destinasis`
--
ALTER TABLE `order_destinasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_kendaraan`
--
ALTER TABLE `order_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_destinasis`
--
ALTER TABLE `order_destinasis`
  ADD CONSTRAINT `order_destinasis_ibfk_1` FOREIGN KEY (`destinasis_id`) REFERENCES `destinasis` (`id`);

--
-- Constraints for table `order_kendaraan`
--
ALTER TABLE `order_kendaraan`
  ADD CONSTRAINT `order_kendaraan_ibfk_1` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
