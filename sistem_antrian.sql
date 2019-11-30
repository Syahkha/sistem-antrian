-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 06:00 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_departement` int(10) UNSIGNED NOT NULL,
  `nomer_antrian` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `id_departement`, `nomer_antrian`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2019-11-28 16:21:32', '2019-11-28 09:41:51'),
(2, 1, 2, 0, '2019-11-28 16:23:15', NULL),
(3, 1, 3, 0, '2019-11-28 16:25:26', NULL),
(4, 1, 4, 0, '2019-11-28 16:27:21', NULL),
(5, 1, 5, 0, '2019-11-28 16:29:11', NULL),
(6, 1, 6, 0, '2019-11-28 16:29:55', NULL),
(7, 1, 7, 0, '2019-11-28 16:39:34', NULL),
(8, 1, 8, 0, '2019-11-28 16:40:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CS 1', NULL, NULL),
(2, 'CS 2', NULL, NULL),
(4, 'B', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` int(11) NOT NULL,
  `nomer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `nama`, `letter`, `mulai`, `nomer`, `created_at`, `updated_at`) VALUES
(1, 'Customer Service', 'CS', 1, 8, NULL, NULL),
(2, 'Pembayaran', 'B', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_25_151915_departemen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panggilan`
--

CREATE TABLE `panggilan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_antrian` int(10) UNSIGNED NOT NULL,
  `id_departemen` int(10) UNSIGNED NOT NULL,
  `id_counter` int(10) UNSIGNED NOT NULL,
  `nomer_antrian` int(11) NOT NULL,
  `tgl_panggil` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `panggilan`
--

INSERT INTO `panggilan` (`id`, `id_antrian`, `id_departemen`, `id_counter`, `nomer_antrian`, `tgl_panggil`, `created_at`, `updated_at`) VALUES
(11, 125, 2, 4, 1, '2019-11-04', '2019-11-03 23:30:27', '2019-11-03 23:30:27'),
(12, 135, 1, 2, 2, '2019-11-09', '2019-11-09 07:43:21', '2019-11-09 07:43:21'),
(13, 137, 1, 1, 4, '2019-11-20', '2019-11-20 03:31:50', '2019-11-20 03:31:50'),
(14, 1, 1, 1, 1, '2019-11-28', '2019-11-28 09:41:52', '2019-11-28 09:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'super admin'),
(2, 'admin '),
(3, 'admin loket');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `kontak` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama`, `alamat`, `email`, `kontak`, `logo`) VALUES
(1, 'BANK mandiri', 'Jl Perintis Kemardekaan 200', 'mandiri@gmai.com', '08485425484', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_loket`
--

CREATE TABLE `tb_loket` (
  `id_loket` int(12) NOT NULL,
  `nama_loket` varchar(30) DEFAULT NULL,
  `mulai` int(10) NOT NULL,
  `akhir` int(20) NOT NULL,
  `sekarang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_loket`
--

INSERT INTO `tb_loket` (`id_loket`, `nama_loket`, `mulai`, `akhir`, `sekarang`) VALUES
(1, 'CS 1', 10, 100, 10),
(2, 'CS 2', 1, 12, 1),
(3, 'B 1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` int(11) DEFAULT NULL,
  `id_loket` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roles_id`, `id_loket`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$3RZCH.QFNklP2QZaGiC74.fawYuAGe4GmCYrIzcmqsUKir/X/yR72', NULL, '2019-08-01 04:13:01', '2019-08-01 04:13:01'),
(5, 2, NULL, 'nia', 'nia@gmail.com', NULL, '$2y$10$BFjZqcqN6NynmsKeLps06u/luqL2OngZrzTsLVi0yPu1mJHVVh6f6', NULL, NULL, NULL),
(6, 3, 2, 'Srinah', 'elya@gmail.com', NULL, '$2y$10$aigSuByYHBEYtoaIOi74teSsSFItz.2Wr5YHV4hfT.r29vsvnSJAO', NULL, NULL, NULL),
(7, 3, 2, 'Mukidi', 'mikasa@gmail.com', NULL, '$2y$10$H1rPo3z8pPZb0Cgthm5Lo.nQGI4h9rqDIIDU9BM1jxOSCQDduY3Qe', NULL, NULL, NULL),
(8, 3, 1, 'syahril1231', 'syahril57@gmail.com', NULL, '$2y$10$.xdAOK6jvaZr.lwF50gkAOTNCoh4amXkYqOFTq..KupmTLI78Ebzq', NULL, NULL, NULL),
(9, 3, 2, 'bambang', 'bambang@gmail.com', NULL, '$2y$10$6q178iZaJvcl4.G.kEJ.V.xap712sSsSQa9Y9LFkd15OIB.9mns0G', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queues_department_id_foreign` (`id_departement`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panggilan`
--
ALTER TABLE `panggilan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calls_queue_id_foreign` (`id_antrian`),
  ADD KEY `calls_department_id_foreign` (`id_departemen`),
  ADD KEY `calls_counter_id_foreign` (`id_counter`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_loket`
--
ALTER TABLE `tb_loket`
  ADD PRIMARY KEY (`id_loket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panggilan`
--
ALTER TABLE `panggilan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_loket`
--
ALTER TABLE `tb_loket`
  MODIFY `id_loket` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `panggilan`
--
ALTER TABLE `panggilan`
  ADD CONSTRAINT `panggilan_counter_id_foreign` FOREIGN KEY (`id_counter`) REFERENCES `counter` (`id`),
  ADD CONSTRAINT `panggilan_departement_id_foreign` FOREIGN KEY (`id_departemen`) REFERENCES `departement` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
