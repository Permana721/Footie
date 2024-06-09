-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 06:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_foto` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `user_name`, `user_foto`, `komentar`, `created_at`, `updated_at`) VALUES
(24, 16, 10, 'Permana', '20240311_kopi-turki.jpg', 'enak ini sih', '2024-03-11 08:21:58', '2024-03-11 23:12:22'),
(25, 16, 11, 'Permana', '20240314_piko.jpg', 'P', '2024-03-14 00:40:34', '2024-03-14 00:40:34'),
(26, 18, 10, 'Permana', '20240311_kopi-turki.jpg', 'Enak sih ini', '2024-03-14 23:09:29', '2024-03-14 23:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(63, 16, 10, '2024-03-11 23:12:28', '2024-03-11 23:12:28'),
(66, 16, 11, '2024-03-14 00:48:15', '2024-03-14 00:48:15'),
(68, 16, 9, '2024-03-14 00:50:23', '2024-03-14 00:50:23'),
(69, 18, 9, '2024-03-14 02:15:31', '2024-03-14 02:15:31'),
(72, 18, 10, '2024-03-14 23:09:24', '2024-03-14 23:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2024_02_03_055100_products', 1),
(23, '2024_03_08_081715_comments', 1),
(24, '2024_03_08_081733_likes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `alamat_penjual` varchar(255) NOT NULL,
  `halal` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `foto` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `nama_product`, `link`, `deskripsi`, `category`, `tipe`, `alamat_penjual`, `halal`, `harga`, `discount`, `foto`, `is_active`, `created_at`, `updated_at`) VALUES
(16, 'BRG32873', 'Bigul Pak Malen Babi Guling Frozen', 'https://www.tokopedia.com/somura-tbk/mie-instant-ramen-nissin-gekikara-pas-halal-jepang-murah-kari-jepang?utm_campaign=PDP-0-3993927468-0-100224-default&utm_source=salinlink&utm_medium=share', 'Bigul', 'indonesia', 'makanan', 'Jakarta Utara', 'haram', '110,000', 0.1, '20240311_bigul.jpg', 1, '2024-03-11 07:36:16', '2024-03-14 02:03:06'),
(18, 'BRG95861', 'Anggur Merah Premium', 'https://www.tokopedia.com/kangkebab/kang-kebab-mini-frozen-10-pcs-authentic-turki-original?utm_campaign=PDP-0-3849895724-0-100224-default&utm_source=salinlink&utm_medium=share', 'Amer', 'indonesia', 'minuman', 'Jakarta Utara', 'haram', '110,000', 0.1, '20240314_amer.jpg', 1, '2024-03-14 02:15:16', '2024-03-14 02:15:16'),
(19, 'BRG84996', 'Ocha Jepang', 'https://www.tokopedia.com/somura-tbk/mie-instant-ramen-nissin-gekikara-pas-halal-jepang-murah-kari-jepang?utm_campaign=PDP-0-3993927468-0-100224-default&utm_source=salinlink&utm_medium=share', 'Ocha', 'japan', 'minuman', 'Jakarta Selatan', 'halal', '27,000', 0.1, '20240314_ocha.jpg', 1, '2024-03-14 10:00:47', '2024-03-14 10:00:47'),
(20, 'BRG90080', 'Dimsum 50pcs', 'https://www.tokopedia.com/somura-tbk/mie-instant-ramen-nissin-gekikara-pas-halal-jepang-murah-kari-jepang?utm_campaign=PDP-0-3993927468-0-100224-default&utm_source=salinlink&utm_medium=share', 'Dimsum', 'chinese', 'makanan', 'Jakarta Utara', 'halal', '110,000', 0.1, '20240314_dimsum.jpg', 1, '2024-03-14 10:01:16', '2024-03-14 10:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 1,
  `is_mamber` tinyint(4) NOT NULL DEFAULT 1,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png',
  `tlp` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `jenis_kelamin` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `is_mamber`, `foto`, `tlp`, `is_active`, `jenis_kelamin`, `role`, `created_at`, `updated_at`) VALUES
(9, 'Arido', 'surya@gdriveme.id', NULL, '$2y$12$ARv6yDqhp6MNsknZpHFR1O0epGEBJl7ZXjoq3aWgSaa.ouWS/mrbe', 0, 1, '20240311_ramen.jpg', '082317204718', 1, 'laki-laki', 1, '2024-03-11 07:57:49', '2024-03-11 08:07:50'),
(10, 'Permana', 'sdharma721@gmail.com', NULL, '$2y$12$A4sUESRK0XLToVJxMvn9TOiOjmf/GzysI5U3UTw6c1n2aQgL2py.C', 1, 0, '20240311_kopi-turki.jpg', '082317204718', 1, 'laki-laki', 1, '2024-03-11 08:09:18', '2024-03-14 09:38:14'),
(11, 'Permana', 'kelincihoopeer@metaverse.id', NULL, '$2y$12$v/IyXb6kZABdKf8yUTVOpuFF868dZHtXZygkkJToMHxaMTcmGJmZu', 0, 1, '20240314_piko.jpg', '082317204718', 1, 'laki-laki', 2, '2024-03-14 00:36:42', '2024-03-14 00:36:42'),
(12, 'A Azka', 'apacoba@gmail.com', NULL, '$2y$12$jTSdXXsrmzkxKem3cIAa/.3QplcH17kqhZVdrp6rGKOf9esVajeZ2', 0, 1, '20240315_piko.jpg', '082317204718', 1, 'laki-laki', 2, '2024-03-14 23:10:44', '2024-03-14 23:10:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_product_id_foreign` (`product_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
