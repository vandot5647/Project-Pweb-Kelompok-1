-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 10:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb_labti`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(6) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `foto_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama_kategori`, `url`, `foto_kategori`) VALUES
(1, 'Atomizer', 'atomizer', 'atomizer.png'),
(2, 'Battery', 'battery', 'battery.png'),
(3, 'Liquid', 'liquid', 'liquid.png'),
(4, 'Mod Device', 'mod_device', 'mod_device.png'),
(5, 'Pod', 'pod', 'pod.png');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `instagram` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `kelas`, `instagram`) VALUES
('50421046', 'Aditya Jonathan', '3IA12', 'https://www.instagram.com/inijonaa/'),
('50421440', 'Fahmi Hidayat', '3IA12', 'https://instagram.com/himfahmi/'),
('50421969', 'Muhammad Firdaus Kurniawan', '3IA12', 'https://www.instagram.com/frds.k/'),
('51421535', 'Yohanes Danu Widyatmaka', '3IA12', 'https://www.instagram.com/y.danu.w/');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(6) NOT NULL,
  `judul_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `judul_produk`, `deskripsi`, `harga`, `kategori`, `jumlah`, `foto`) VALUES
(1, 'Alexa S24', 'RDA Single coil dengan ukuran 24mm', '330000', '1', '6', '960-Alexa S24 330k.jpg'),
(2, 'Kapas Kendo', 'Kapas Kendo Gold editions batch baru', '80000', '1', '10', '798-Kapas Kendo 80k.jpg'),
(3, 'RDA Reload S', 'RDA Reload S single coil dengan ukuran 24mm', '900000', '1', '4', '238-Reload S 900k.jpg'),
(4, 'RDA Reload S Spectrum', 'RDA Reload S versi Spectrum MIX Color dengan ukuran 24mm', '900000', '1', '8', '822-Reload S Spectrum 900k.jpg'),
(5, 'Coil Baby Alien', 'Coil Gluduk Baby Alien 2pcs 3.0mm', '60000', '1', '9', '773-Coil Baby Alien 60k.jpg'),
(6, 'RBA Silo', 'RBA Silo untuk Dot device', '1200000', '1', '9', '805-RBA Silo 1200k.jpg'),
(7, 'Basen 2600mah', 'Batrai Basen Kapasistas 2600 mAH 1pcs', '60000', '2', '7', '242-Basen 2600mah 1pcs 60k.jpg'),
(8, 'Batrai Molicel P28a', 'Molicel P28a Kapasitas 2800mAh 1pcs', '105000', '2', '2', '696-Molicel P28A 1pcs 105k.jpg'),
(9, 'Charger Basen', 'Charger Basen 2 Slot dengan cable type C fast charging', '80000', '2', '8', '423-Charger Basen 80k.jpg'),
(10, 'Enigmatic', 'Liquid Creamy 60ml', '145000', '3', '9', '580-Enigmatic 60ml 145k.jpg'),
(11, 'Foom Fruity', 'Liquid Fruity untuk pod 30ml', '110000', '3', '5', '503-Foom 30ml 110k.jpg'),
(12, 'Monster Labs', 'Liquid Creamy 60ml', '200000', '3', '8', '676-Monster Labs 190k.jpg'),
(13, 'Secret Banana', 'Liquid Creamy 60ml', '145000', '3', '4', '803-Secret Banana 60ml 145k.jpg'),
(14, 'Secret Strawberry', 'Liquid Creamy Saltnic/pods friendly 30ml', '130000', '3', '4', '78-Secret Strawberry 30ml 130k.jpg'),
(15, 'Centaurus M200', 'Mod Electrical Dual Battrey', '580000', '4', '2', '735-Centaurus M200 580k.jpg'),
(16, 'Pulse AIO PRO Kit', 'AIO fullset dengan kit include RBA', '900000', '4', '3', '809-Pulse AIO KIT 900k.jpg'),
(17, 'Hexohm Anodized', 'Mod Semi Mechanical Dual Battrey garansi seumur hidup by VapeZOO', '3200000', '4', '9', '18-Hexohm Anodized 3200k.jpg'),
(18, 'Hexohm Oframe', 'Mod Semi Mechanical Dual Battrey garansi seumur hidup by VapeZOO', '3800000', '4', '4', '282-Hexohm Oframe 3800k.jpeg'),
(19, 'Thelema mini Kit', 'Mod mini dengan batrai tanam', '390000', '4', '7', '916-Thelema Mini Kit 390k.jpg'),
(20, 'Argus P1', 'Pod by voopoo', '330000', '5', '2', '346-Argus P1 330k.jpg'),
(21, 'Catridge Foom', 'Catridge Foom dengan isi 3pcs', '100000', '5', '3', '265-Catridge Foom 3pcs 100k.jpg'),
(22, 'Foom X', 'Foom X Include liquid', '200000', '5', '2', '228-Foom X 200k.jpg'),
(23, 'Oxva Xlim PRO', 'Pod Oxva Xlim PRO terbaru dengan fitur variable wattage ', '310000', '5', '3', '511-Oxva Xlim Pro 310k.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `phone` varchar(85) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `phone`, `alamat`, `created_on`, `foto`) VALUES
(2, 'Himfahmi', 'f939ec3d28085b7fa8266cda45c8748e', 'hidayatfahmi4587@gmail.com', 'User', '087780386030', 'Bogor', '1701709546', 'Himfahmi-905-Fahmi Hidayat - I104358.jpg'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Admin', '', '', '', ''),
(4, 'Javlin', '1e58f093aaf827b93252eeacf7363b64', 'jav33@gmail.com', 'User', '', '', '1701787917', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
