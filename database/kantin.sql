-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 03:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `id_penjual` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(100) NOT NULL,
  `gambar_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_penjual`, `nama_barang`, `harga_barang`, `gambar_barang`) VALUES
(6, 6, 'nasi katsu', 7000, 'nasi_katsu.jpg'),
(7, 7, 'nasi ijo', 7000, 'nasi_ijo.jpg'),
(8, 8, 'Seblak', 5000, 'seblak_1.jpg'),
(9, 8, 'Minuman', 2000, 'popice.jpg'),
(14, 8, 'kolak', 4000, 'kolak_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `id_pembeli` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `id_user`, `nama_pembeli`, `nohp`, `gender`) VALUES
(1, 1, 'Faisal Fahreza', '08123124123', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `nama_kedai` varchar(50) NOT NULL,
  `gambar_kedai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `id_user`, `nama_penjual`, `nama_kedai`, `gambar_kedai`) VALUES
(6, 3, 'Bibi Katsu', 'Kedai 3', 'nasi_katsu.jpg'),
(7, 0, 'Bibi 3', 'Kedai 4', 'nasi_katsu.jpg'),
(8, 0, 'Bibi Seblak', 'Kedai Seblak', 'seblak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(10) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(50) NOT NULL,
  `id_pembeli` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_ruangan` int(10) DEFAULT NULL,
  `tgl_transaksi` date NOT NULL,
  `metode_pemesanan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pembeli`, `id_barang`, `id_ruangan`, `tgl_transaksi`, `metode_pemesanan`, `status`) VALUES
(3, 1, 9, NULL, '2020-11-24', 'bayar ditempat', 'sudah dibayar'),
(4, 1, 9, NULL, '2020-11-24', 'bayar ditempat', 'sudah dibayar'),
(5, 1, 8, NULL, '2020-11-24', 'bayar ditempat', 'sudah dibayar'),
(6, 1, 8, NULL, '2020-11-24', 'bayar ditempat', 'sudah dibayar'),
(7, 1, 7, NULL, '2020-11-24', 'bayar ditempat', 'belum dibayar'),
(8, 1, 9, NULL, '2020-11-24', 'bayar ditempat', 'sudah dibayar'),
(9, 1, 6, NULL, '2020-12-08', 'bayar ditempat', 'belum dibayar'),
(10, 1, 7, NULL, '2020-12-08', 'bayar ditempat', 'belum dibayar'),
(11, 1, 9, NULL, '2020-12-08', 'bayar ditempat', 'sudah dibayar'),
(13, 1, 8, NULL, '2020-12-08', 'bayar ditempat', 'belum dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'faisalf28', '$2y$10$q9R8KsdiAjN3ej6yZ65EOeczfLzKqbKH/9BF8TsivorKVlJliFGmO', 'pembeli', '2020-11-09 23:14:22', '2020-11-09 23:14:22'),
(3, 'rizal', '$2y$10$MR7EjkWex.7ve1tnIp6loeD87WDH9iJ0Fp6JJ8bLVLxF78qAFUvsW', 'penjual', '2020-11-09 23:29:17', '2020-11-09 23:29:17'),
(11, 'admin', '$2y$10$iYSSjjmz1Q4ftS6kWe813u7jrwFsDMuLNP5HTXu2VZfH8UeueWwxO', 'penjual', '2020-11-10 03:15:41', '2020-11-10 03:15:41'),
(17, 'username', '$2y$10$bCifgBx4H2nGzSXyEhgR.OZHGzF3V8KWPBuhG.D82PGg/5Cv22b9q', '', '2020-11-11 04:40:29', '2020-11-11 04:40:29'),
(18, 'admin2', '$2y$10$jbUDxSMUj6aV17Vuj.Tbr.VJ0m7HAUVnMxe2ueJ.QIV1AX.rjADIG', '', '2020-11-18 05:01:13', '2020-11-18 05:01:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_penjual` (`id_penjual`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_pembeli1` (`id_pembeli`),
  ADD KEY `fk_barang2` (`id_barang`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `fk_user1` (`id_user`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_barang1` (`id_barang`),
  ADD KEY `fk_pembeli` (`id_pembeli`),
  ADD KEY `fk_ruangan` (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_penjual` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_barang2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_pembeli1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `fk_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `penjual`
--
ALTER TABLE `penjual`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_barang1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `fk_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
