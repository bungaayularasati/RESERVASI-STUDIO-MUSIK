-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2026 at 05:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_studiomusik`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@gmail.com|127.0.0.1', 'i:1;', 1768793680),
('laravel-cache-admin@gmail.com|127.0.0.1:timer', 'i:1768793680;', 1768793680),
('laravel-cache-admin@studi.com|127.0.0.1', 'i:1;', 1768790587),
('laravel-cache-admin@studi.com|127.0.0.1:timer', 'i:1768790587;', 1768790587),
('laravel-cache-admin@studio.comt|127.0.0.1', 'i:1;', 1768741690),
('laravel-cache-admin@studio.comt|127.0.0.1:timer', 'i:1768741690;', 1768741690),
('laravel-cache-admin@studiomusik.test|127.0.0.1', 'i:1;', 1768744291),
('laravel-cache-admin@studiomusik.test|127.0.0.1:timer', 'i:1768744291;', 1768744291);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint UNSIGNED NOT NULL,
  `studio_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_dimulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status` enum('kosong','booked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `studio_id`, `tanggal`, `jam_dimulai`, `jam_selesai`, `status`, `created_at`, `updated_at`) VALUES
(21, 1, '2026-01-16', '09:00:00', '21:00:00', 'booked', '2026-01-13 23:29:11', '2026-01-13 23:29:11'),
(22, 1, '2026-01-17', '09:00:00', '21:00:00', 'booked', '2026-01-13 23:47:47', '2026-01-13 23:47:47'),
(23, 1, '2026-01-18', '09:00:00', '21:00:00', 'booked', '2026-01-14 00:42:09', '2026-01-14 00:42:09'),
(24, 1, '2026-01-19', '09:00:00', '21:00:00', 'booked', '2026-01-14 00:52:11', '2026-01-14 00:52:11'),
(25, 2, '2026-01-22', '09:00:00', '21:00:00', 'booked', '2026-01-14 01:06:19', '2026-01-14 01:06:19'),
(26, 3, '2026-01-16', '09:00:00', '10:00:00', 'kosong', '2026-01-14 18:47:06', '2026-01-17 22:21:23'),
(27, 2, '2026-01-16', '09:00:00', '10:00:00', 'kosong', '2026-01-14 20:27:21', '2026-01-17 22:21:23'),
(28, 1, '2026-01-16', '21:00:00', '22:00:00', 'booked', '2026-01-15 04:05:30', '2026-01-15 04:05:30'),
(30, 2, '2026-01-16', '10:00:00', '11:00:00', 'booked', '2026-01-15 04:20:04', '2026-01-15 04:20:04'),
(32, 3, '2026-01-16', '10:00:00', '12:00:00', 'kosong', '2026-01-15 21:33:49', '2026-01-17 22:21:23'),
(33, 3, '2026-01-16', '13:00:00', '15:00:00', 'booked', '2026-01-16 06:43:18', '2026-01-16 06:43:18'),
(34, 2, '2026-01-17', '09:00:00', '22:00:00', 'kosong', '2026-01-16 08:09:54', '2026-01-17 22:21:23'),
(35, 1, '2026-01-18', '09:00:00', '22:00:00', 'booked', '2026-01-16 21:43:17', '2026-01-16 21:43:17'),
(36, 2, '2026-01-17', '09:00:00', '22:00:00', 'booked', '2026-01-16 21:49:31', '2026-01-16 21:49:31'),
(37, 2, '2026-01-16', '09:00:00', '22:00:00', 'booked', '2026-01-16 22:28:17', '2026-01-16 22:28:17'),
(38, 3, '2026-01-18', '09:00:00', '11:00:00', 'kosong', '2026-01-17 20:26:21', '2026-01-17 22:21:23'),
(39, 3, '2026-01-18', '11:00:00', '13:00:00', 'kosong', '2026-01-17 21:02:19', '2026-01-18 05:04:04'),
(40, 3, '2026-01-18', '20:00:00', '22:00:00', 'kosong', '2026-01-18 05:02:58', '2026-01-18 08:02:17'),
(41, 2, '2026-01-18', '09:00:00', '22:00:00', 'booked', '2026-01-18 05:11:13', '2026-01-18 05:11:13'),
(42, 1, '2026-01-20', '09:00:00', '12:00:00', 'booked', '2026-01-18 06:15:33', '2026-01-18 06:15:33'),
(43, 6, '2026-01-18', '09:00:00', '12:00:00', 'kosong', '2026-01-18 06:57:51', '2026-01-18 06:58:43'),
(44, 4, '2026-01-19', '09:00:00', '13:00:00', 'booked', '2026-01-18 08:00:46', '2026-01-18 08:00:46'),
(45, 5, '2026-01-19', '09:00:00', '10:00:00', 'kosong', '2026-01-18 18:09:47', '2026-01-18 20:43:05'),
(46, 5, '2026-01-19', '10:00:00', '12:00:00', 'booked', '2026-01-18 18:26:09', '2026-01-18 18:26:09'),
(47, 5, '2026-01-19', '12:00:00', '13:00:00', 'kosong', '2026-01-18 19:01:44', '2026-01-18 20:26:41'),
(48, 5, '2026-01-19', '13:00:00', '14:00:00', 'booked', '2026-01-18 19:43:10', '2026-01-18 19:43:10'),
(50, 4, '2026-01-19', '13:00:00', '15:00:00', 'kosong', '2026-01-18 21:06:07', '2026-01-18 21:07:01'),
(51, 6, '2026-01-19', '12:00:00', '13:00:00', 'booked', '2026-01-18 21:12:32', '2026-01-18 21:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayarans`
--

CREATE TABLE `metode_pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durasi_menit` int UNSIGNED NOT NULL DEFAULT '30',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_pembayarans`
--

INSERT INTO `metode_pembayarans` (`id`, `nama`, `barcode_path`, `durasi_menit`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'QRIS', 'barcode_metode/qru1j0ZTe1fL9o5nUPZH6SdIbKCPvHYonCdp2nqG.jpg', 30, 1, '2026-01-14 00:33:48', '2026-01-14 00:33:48'),
(2, 'Bunga', 'barcode_metode/Db8phhn7ZkTK8q58HYDq6zValMfjIt9KmfDvGuhm.jpg', 30, 1, '2026-01-14 00:40:55', '2026-01-14 00:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_05_045449_create_studios_table', 1),
(5, '2025_12_05_045501_create_jadwals_table', 1),
(6, '2025_12_05_045509_create_reservasis_table', 1),
(7, '2025_12_05_045524_create_pembayarans_table', 1),
(8, '2025_12_11_031645_add_status_pembayaran_to_reservasis_table', 2),
(9, '2026_01_14_000000_create_metode_pembayarans_table', 3),
(10, '2026_01_16_000000_add_kapasitas_to_studios_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `reservasi_id` bigint UNSIGNED NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_transfer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('menunggu','valid','invalid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `reservasi_id`, `metode`, `bukti_transfer`, `status`, `created_at`, `updated_at`) VALUES
(45, 45, 'Transfer Bank', 'bukti_transfer/kS1Jw2T2O0qVLcWgoLG9ApoqPbUAkA0PdXGbvys1.jpg', 'valid', '2026-01-15 21:34:11', '2026-01-15 21:35:06'),
(46, 47, 'Transfer Bank', 'bukti_transfer/S4ldPy1DbTbLsxmrq2dmIR5jikR6HncPExkSMcDb.jpg', 'valid', '2026-01-16 08:25:38', '2026-01-16 08:32:48'),
(47, 48, 'Transfer Bank', 'bukti_transfer/uvGmcS8z42Z5xoYslLovXwgAt30B1FN9lR5FgxIe.png', 'valid', '2026-01-17 20:26:34', '2026-01-17 20:29:46'),
(48, 49, 'Transfer Bank', 'bukti_transfer/p1thuDSVUHdi1lH9z31oEuhtnFkqYvg0ZAiyl7xB.png', 'valid', '2026-01-17 21:02:39', '2026-01-17 21:03:20'),
(49, 50, 'Transfer Bank', 'bukti_transfer/XAabkUbtYGfDKudaJxm43TdVp0V0saaz5Kk0VBf5.png', 'valid', '2026-01-18 05:03:19', '2026-01-18 05:03:49'),
(50, 51, 'Transfer Bank', 'bukti_transfer/v3D1QwumiDeTRqAguVHrM1jdcKAeEi54t1JMwFby.jpg', 'invalid', '2026-01-18 05:11:25', '2026-01-18 05:11:53'),
(52, 53, 'Transfer Bank', 'bukti_transfer/I1skqnegR1WO3EG1S3LqBkvT3MXbhqFVUPus8GxO.jpg', 'invalid', '2026-01-18 06:58:09', '2026-01-18 06:58:43'),
(54, 55, 'Transfer Bank', 'bukti_transfer/M2pA7eqjTLMEPxyw5sGldSbULyNAAfh9faCrBbmb.png', 'valid', '2026-01-18 18:10:17', '2026-01-18 18:10:52'),
(55, 56, 'Transfer Bank', 'bukti_transfer/mKX1PBYfGQETWus9a9M6WfzyXkA8FhPBCtyOgcvg.jpg', 'valid', '2026-01-18 18:26:39', '2026-01-18 18:28:05'),
(56, 57, 'Transfer Bank', 'bukti_transfer/pm1dgMahxTkNzXq2ndD1YMMCkDAUWokwsetQhdUX.png', 'valid', '2026-01-18 19:02:01', '2026-01-18 19:02:38'),
(57, 58, 'Transfer Bank', 'bukti_transfer/eYyVaGjZW9jcLsgJa2SviYQfROV7sacgl9q41nxJ.jpg', 'invalid', '2026-01-18 19:43:27', '2026-01-18 19:44:03'),
(58, 60, 'Transfer Bank', 'bukti_transfer/YSrBNksVwtmyJmnbZFWDIDpwOKDW0UOZ1bbcZ2bQ.jpg', 'invalid', '2026-01-18 21:06:32', '2026-01-18 21:07:01'),
(59, 61, 'Transfer Bank', 'bukti_transfer/zzbvqfErvAAWJKC1FL3N2z3SVqLAmEcbjgsTulOx.png', 'valid', '2026-01-18 21:12:45', '2026-01-18 21:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `reservasis`
--

CREATE TABLE `reservasis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jadwal_id` bigint UNSIGNED NOT NULL,
  `studio_id` bigint UNSIGNED NOT NULL,
  `total_biaya` int NOT NULL,
  `status` enum('pending','dibayar','selesai','batal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_pembayaran` enum('menunggu','valid','gagal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasis`
--

INSERT INTO `reservasis` (`id`, `user_id`, `jadwal_id`, `studio_id`, `total_biaya`, `status`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(39, 7, 26, 3, 50000, 'selesai', 'valid', '2026-01-14 18:47:06', '2026-01-16 22:10:50'),
(40, 7, 27, 2, 80000, 'selesai', 'valid', '2026-01-14 20:27:21', '2026-01-16 22:10:50'),
(45, 13, 32, 3, 100000, 'selesai', 'valid', '2026-01-15 21:33:49', '2026-01-16 21:15:14'),
(47, 12, 34, 2, 1040000, 'selesai', 'valid', '2026-01-16 08:09:54', '2026-01-16 19:23:07'),
(48, 1, 38, 3, 100000, 'selesai', 'valid', '2026-01-17 20:26:21', '2026-01-17 21:03:54'),
(49, 14, 39, 3, 100000, 'selesai', 'valid', '2026-01-17 21:02:20', '2026-01-18 05:03:53'),
(50, 15, 40, 3, 100000, 'selesai', 'valid', '2026-01-18 05:02:58', '2026-01-18 08:01:18'),
(51, 15, 41, 2, 1040000, 'batal', 'menunggu', '2026-01-18 05:11:13', '2026-01-18 06:02:57'),
(53, 16, 43, 6, 75000, 'batal', 'gagal', '2026-01-18 06:57:51', '2026-01-18 06:58:43'),
(55, 18, 45, 5, 30000, 'selesai', 'valid', '2026-01-18 18:09:47', '2026-01-18 20:01:13'),
(56, 19, 46, 5, 60000, 'dibayar', 'valid', '2026-01-18 18:26:09', '2026-01-18 18:28:05'),
(57, 21, 47, 5, 30000, 'selesai', 'valid', '2026-01-18 19:01:44', '2026-01-18 20:26:41'),
(58, 20, 48, 5, 30000, 'batal', 'gagal', '2026-01-18 19:43:10', '2026-01-18 20:44:34'),
(60, 18, 50, 4, 90000, 'batal', 'gagal', '2026-01-18 21:06:07', '2026-01-18 21:07:01'),
(61, 17, 51, 6, 25000, 'dibayar', 'valid', '2026-01-18 21:12:32', '2026-01-18 21:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bXFW98d7g3WRtF2egN3vHhRLdcOhdW1XZnEKCTNu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWx4U20zY25raE5nUkRxVzhYc3FJVlIxRnVGdElKZFBLWWY4SnNyeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1768798610);

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_studio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_per_jam` int NOT NULL,
  `kapasitas` int UNSIGNED NOT NULL DEFAULT '0',
  `fasilitas` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `nama_studio`, `harga_per_jam`, `kapasitas`, `fasilitas`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'STUDIO A', 100000, 9, 'PIANO, GITAR, DRUM, BASS, BIOLA , TEROMPET, AC', '1768613205.jpg', '2025-12-11 05:38:53', '2026-01-16 18:32:42'),
(2, 'STUDIO B', 80000, 6, 'PIANO, DRUMM, GITAR, BASS, AC', '1768613421.jpg', '2026-01-03 06:43:24', '2026-01-16 18:30:21'),
(3, 'STUDIO C', 50000, 5, 'PIANO, DRUMM, BASS, AC', '1768613255.jpg', '2026-01-03 06:45:19', '2026-01-16 18:34:18'),
(4, 'STUDIO D', 45000, 5, 'PIANO, GITAR, BIOLA, AC', '1768742488.jpg', '2026-01-18 06:20:36', '2026-01-18 06:23:40'),
(5, 'STUDIO E', 30000, 5, 'DRUM, GITAR, BASS, AC', '1768742593.jpg', '2026-01-18 06:23:13', '2026-01-18 06:23:49'),
(6, 'STUDIO F', 25000, 5, 'DRUM, GITAR ELEKTRIK, AC', '1768744189.jpg', '2026-01-18 06:49:49', '2026-01-18 06:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','users') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'users',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'bunga ayu', 'bungaayularasati977@gmail.com', '$2y$12$CCAHggWpj/YAMKd/uFtzG.jw271drzWIEetLBIFPFfV66tkemBnSa', 'users', '2025-12-15 06:46:42', '2025-12-15 06:46:42'),
(6, 'Frizka', 'frizka@gmail.com', '$2y$12$6VC0tPQbyZkNY47OTBQB2uaPacp.Qm.ZfLIfwNFLsENp/8LLZa86C', 'users', '2026-01-08 22:08:12', '2026-01-08 22:08:12'),
(7, 'Jeremyy', 'jeremy@gmail.com', '$2y$12$pDEcEuxIGJOC.s81343gIOmwbDHsO07gQJZmUR6Zrm.e0mgBeIy9K', 'users', '2026-01-08 23:44:09', '2026-01-10 06:39:25'),
(10, 'Admin Studio', 'admin@studio.com', '$2y$12$Cz2u6GX2EmKK0cQZjug4SeGj.p7wLHBzsNOnNaHitUq3ZSSheHsZy', 'admin', '2026-01-12 17:21:39', '2026-01-12 17:21:39'),
(11, 'User Studio', 'user@studio.com', '$2y$12$HH0dYxnOuoTUASkYQdZEceyfdw586H3vqe0yl5Q4PnYZRQmhFgq86', 'users', '2026-01-12 17:21:40', '2026-01-12 17:21:40'),
(12, 'Vero', 'veronica@gmail.com', '$2y$12$AJlsDZhFnJmDzGCN3YUrW.q6pc8LbkkFIs4CHMMmIIIwzjvVJPG/e', 'users', '2026-01-15 20:52:54', '2026-01-15 20:52:54'),
(13, 'Rudi', 'rudi@gmail.com', '$2y$12$dhe7kIWz74uPX4kU9GC/2uOeOrlDCLr6PgL3yBj67OINYQvjBtwGC', 'users', '2026-01-15 21:13:28', '2026-01-15 21:13:28'),
(14, 'Daniel', 'daniel@gmail.com', '$2y$12$3SF4TgbcVzHw0vtIgVEgf.4wfWSAUx0RYAR8p8LY9Ez2yAC5V9I0G', 'users', '2026-01-17 21:00:57', '2026-01-17 21:00:57'),
(15, 'Lukas', 'lukas@gmail.com', '$2y$12$93yb09Vm6OnuidB3Ywfpme/1MLig6SSEYTRfuzrPenatBG1x60c/S', 'users', '2026-01-18 05:00:50', '2026-01-18 05:00:50'),
(16, 'Jona', 'jona@gmail.com', '$2y$12$Y5QXZWMCVQdazh8RiVlfnOI6RODHS8yl/OAevR06L1V4s0dCal9ky', 'users', '2026-01-18 06:08:11', '2026-01-18 06:08:11'),
(17, 'Matius', 'matius@gmail.com', '$2y$12$a7ECb2nZhtXPJR0gIa3FNuJQ6QZTfABTkTdamn0i38B8WzjrSW0Sq', 'users', '2026-01-18 07:59:53', '2026-01-18 07:59:53'),
(18, 'Dhama', 'dhama@gmail.com', '$2y$12$EJNs6AZuY0pWKH9Q8.9BQer.xs8IGQ1fyzW0k0vnT..Ad8m5BeMwS', 'users', '2026-01-18 18:09:08', '2026-01-18 18:09:08'),
(19, 'Pratama', 'pratama@gmail.com', '$2y$12$j0kzRlASUXtRndH9zvJ0P.mAXvC3fS/lBEXrEvSV4qfzR9DpLbETe', 'users', '2026-01-18 18:25:43', '2026-01-18 18:25:43'),
(20, 'Satriyo', 'satriyo@gmail.com', '$2y$12$3T3he2iJhFsAjZePBZ3Wd.L0CclnMauJ5alpgffmbCx9elOWE9dTC', 'users', '2026-01-18 19:00:02', '2026-01-18 19:00:02'),
(21, 'Bu supri', 'busupri@gmail.com', '$2y$12$xFIDOjJVJzHm9DaZ953xtuntfR/W9x2qinpqHM9m2NSdB30XMIiae', 'users', '2026-01-18 19:01:08', '2026-01-18 19:01:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_studio_id_foreign` (`studio_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_pembayarans`
--
ALTER TABLE `metode_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_reservasi_id_foreign` (`reservasi_id`);

--
-- Indexes for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservasis_user_id_foreign` (`user_id`),
  ADD KEY `reservasis_jadwal_id_foreign` (`jadwal_id`),
  ADD KEY `reservasis_studio_id_foreign` (`studio_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metode_pembayarans`
--
ALTER TABLE `metode_pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `reservasis`
--
ALTER TABLE `reservasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_studio_id_foreign` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_reservasi_id_foreign` FOREIGN KEY (`reservasi_id`) REFERENCES `reservasis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD CONSTRAINT `reservasis_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasis_studio_id_foreign` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
