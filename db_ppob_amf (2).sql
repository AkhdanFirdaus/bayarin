-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3203
-- Generation Time: Apr 10, 2019 at 01:32 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppob_amf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','bank') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akhdan Musyaffa Firdaus', 'akhdanfirdaus', '$2y$10$gLATkQJkVxSL0MkLRIxZVeRLT5oNTAPMnvN4sgkehDj.xtZ7e1RZS', 'admin', 'CX6GaoLd4SSLDoJYOJmmInEAbNce08VaUEBWAiTdNNemWGNdF08VsJe8w41P', '2019-04-03 23:03:46', '2019-04-03 23:03:46'),
(2, 'admin', 'admin', '$2y$10$3DOKZgEhLXZLtGZlSZP7hOVY29ESLHvMsSBkFi2CoBTqen22mHWAG', 'admin', 'Vl0YkcQUxXKv0TE8EzUke8uthKitSFoImI8bwUeyJCYk3R5SjXNxXDscCw0R', '2019-04-03 23:13:47', '2019-04-03 23:13:47'),
(3, 'bank1', 'bank1', '$2y$10$UNARxtdnYl0SZxfCAdu.xOWL4ev.kVNT3B.Ar61mAaNqy2wrUrvK.', 'bank', NULL, '2019-04-09 22:57:15', '2019-04-09 22:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kwh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `username`, `password`, `no_kwh`, `nama`, `alamat`, `tarif_id`, `created_at`, `updated_at`) VALUES
(4, 'slamet1', '$2y$10$lLMSBURW2s6CYXrjorzO5eulx5bh7yPjqjZSUBAMxJPbQBWcKarda', '51181035124', 'Slamet Wibisana', 'Jalan Sukamantri Bandung', 1, '2019-04-04 02:42:59', '2019-04-09 09:11:23'),
(5, 'salwa1', '$2y$10$.hTRyZyRFqL6Xi6VyKNywuLUCIbWo3e4LzhWH1tBZF48Cypk0Se2y', '51181035123', 'Salwa Raina', 'Jalan Cikutra Bandung', 1, '2019-04-04 02:46:19', '2019-04-04 02:46:19'),
(6, 'aloy', '$2y$10$XeXGFtRKmTkywh8v1UW2b.X0UmHNwfyWLDgJ2.rayyfea/t3E.3hW', '123124334', 'Yusup', 'leuweung', 1, '2019-04-05 02:21:51', '2019-04-05 02:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tagihan_id` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `bulan_bayar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_admin` float NOT NULL,
  `total_bayar` float NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `metode` enum('Transfer','Tunai','Bank') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tagihan_id`, `pelanggan_id`, `tanggal_pembayaran`, `bulan_bayar`, `biaya_admin`, `total_bayar`, `admin_id`, `metode`, `kode`, `created_at`, `updated_at`) VALUES
(22, NULL, 4, '2019-04-10 05:49:04', 'Apr', 5369, 542000, NULL, 'Bank', '123131231231232', '2019-04-09 22:49:40', '2019-04-09 22:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id` int(10) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `bulan` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `meter_awal` int(11) NOT NULL,
  `meter_akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`id`, `pelanggan_id`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`, `created_at`, `updated_at`) VALUES
(1, 4, 'Januari', 2019, 654, 900, NULL, NULL),
(2, 4, 'Februari', 2019, 750, 770, NULL, NULL),
(3, 4, 'Maret', 2019, 750, 850, '2019-04-09 09:45:46', '2019-04-09 09:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `penggunaan_id` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `bulan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_meter` int(11) NOT NULL,
  `status` enum('Belum Bayar','Konfirmasi','Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `penggunaan_id`, `pelanggan_id`, `bulan`, `tahun`, `jumlah_meter`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Januari', 2019, 246, 'Konfirmasi', '2019-04-09 10:00:00', '2019-04-09 22:49:40'),
(2, 2, 4, 'Februari', 2019, 20, 'Konfirmasi', '2019-04-09 10:00:00', '2019-04-09 22:49:40'),
(4, 3, 4, 'Maret', 2019, 100, 'Konfirmasi', '2019-04-09 19:46:27', '2019-04-09 22:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `daya` int(11) NOT NULL,
  `tarifperkwh` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `daya`, `tarifperkwh`, `created_at`, `updated_at`) VALUES
(1, 1300, 1467, NULL, NULL),
(3, 900, 1200, '2019-04-05 19:42:09', '2019-04-09 20:16:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`username`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarif_id` (`tarif_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_id` (`tagihan_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penggunaan_id` (`penggunaan_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`tarif_id`) REFERENCES `tarif` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`tagihan_id`) REFERENCES `tagihan` (`id`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`penggunaan_id`) REFERENCES `penggunaan` (`id`),
  ADD CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
