-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 03:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apk_surat2`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_05_13_041544_create_surats_table', 1),
(5, '2023_05_13_072540_create_roles_table', 1),
(6, '2023_05_13_073036_create_penempatans_table', 1),
(7, '2023_05_13_074129_create_tembusans_table', 1),
(8, '2023_05_13_074419_create_profiles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penempatan`
--

CREATE TABLE `penempatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penempatan`
--

INSERT INTO `penempatan` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', '2023-05-22 17:06:43', '2023-05-22 17:06:43'),
(2, 'Arsitektur', '2023-05-22 17:06:43', '2023-05-22 17:06:43'),
(3, 'Bahasa Jepang', '2023-05-22 17:06:44', '2023-05-22 17:06:44'),
(4, 'Manajemen', '2023-05-22 17:06:44', '2023-05-22 17:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `nama`, `foto`, `alamat`, `no_hp`, `nip`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Kevin Pandoh', 'profile/spClYDoHoSVrK5Bzs52PfyPGm4uq8s5l63se1Be0.jpg', 'Seretan', '089510465800', '21210052', 1, '2023-05-22 17:10:45', '2023-05-22 17:17:54'),
(2, 'Mclaren', 'profile/OjUrHioN1TPZ59rnLBgzNByzVh3DEyYXig937o29.jpg', 'Seretan', '089510465800', '212130123', 2, '2023-05-22 17:31:18', '2023-05-22 17:31:54'),
(3, 'kevin', 'profile/default.png', '', '', '', 3, '2023-05-22 17:33:06', '2023-05-22 17:33:06'),
(4, 'Mesiasi Supit', 'profile/ot5NsGjuYafA7b6pFNjFQMGLFfxLvV4XmkHvL7MM.jpg', 'Remboken', '0812323923', '21210038', 4, '2023-05-22 17:36:59', '2023-05-22 17:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-05-22 17:06:42', '2023-05-22 17:06:42'),
(2, 'Pegawai', '2023-05-22 17:06:43', '2023-05-22 17:06:43'),
(3, 'Wakil Dekan 1', '2023-05-22 17:06:43', '2023-05-22 17:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `head`, `alamat`, `nama_surat`, `no_surat`, `konten`, `tgl_surat`, `tempat`, `penanggung_jawab`, `nip`, `background`, `logo`, `ttd`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Universitas Negeri Manado', 'Kampus Unima', 'Undangan Kuliah Umum', '23/SK/TU/2023', '<p><strong>Contoh Surat 1</strong></p>', '2023-05-17', 'Tondano', 'Mesiasi Supit', '21210038', '#ffffff', 'logo/Xd27JWxzFQsFijTgquebe7Oo61WByJr9anbYZv9j.png', 'ttd/wf43jYbafrT0AXSWUkQ7TCWxlVyNcbLBVWNhxabp.png', 4, '2023-05-22 17:39:32', '2023-05-22 17:40:43'),
(2, 'Universitas Negeri Manado', 'Kampus Unima', 'Surat Libur', '33/SK/2023', '<p><em>Contoh Surat 2</em></p>', '2023-05-24', 'Tondano', 'Kevin Pandoh', '212130123', '#ff8000', 'logo/Rw6atGVD7iZDn8WODBVmBs7GSK4NvZJwh3pc08tQ.png', 'ttd/qd3tAwPFpBol6Gd6zdBCo0bkiL3Pcx6ELHerZGUK.png', 2, '2023-05-22 17:42:33', '2023-05-22 17:42:33'),
(3, 'Universitas Negeri Manado', 'Jalan Kampus Unima', 'Surat Libur', '12/TU/2023', '<p>Contoh Surat 3</p>', '2023-05-23', 'TOndano', 'Kevin', '212130123', '#ffffff', 'logo/GhFu4cl5bybvzv9GdVso2Xet7vzyII6OE8Otvch3.png', 'ttd/lhIvCjHCTyOKPuYc7pHS0g7WatyzoWowZ7wqp6NP.png', 2, '2023-05-22 17:45:15', '2023-05-22 17:45:15'),
(4, 'Universitas Negeri Manado', 'Kampus Unima', 'Surat Laporan', '12/SK/2023', '<p>Contoh Surat 4</p>', '2023-05-23', 'Tondano', 'Kevin', '21210052', '#ffffff', 'logo/4AM65gd0YLW42iIKsX2Jt5oQjZQ2X7coDmuDKyOt.png', 'ttd/kenQor2DPiQTS306fniP4gtLBhbBiGs6xNQYVi9i.png', 3, '2023-05-22 18:33:38', '2023-06-19 05:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `tembusan`
--

CREATE TABLE `tembusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tembusan`
--

INSERT INTO `tembusan` (`id`, `no_surat`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, '23/SK/TU/2023', 'Rektor', '2023-05-22 22:53:34', '2023-05-22 22:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penempatan_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `penempatan_id`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$6F2H6mGU2KQN1zTk8lZZBe7iWPfXKvOGXVLKUJZE/.SfQeoaNhaG2', 1, 1, 1, '2023-05-22 17:06:42', '2023-05-22 17:06:42'),
(2, 'kevinmpandoh', '$2y$10$oScpovhEOIXY5HdSr8SFpud5kmt5W1xSs1cRthfQO7GIegh4XxKNG', 2, 2, 1, '2023-05-22 17:06:42', '2023-05-22 17:06:42'),
(3, 'kevin', '$2y$10$0tkR9151cvieTss0YjUFROlKOo20x25S88onqy2iUxF/zKQmoJqju', 3, 3, 1, '2023-05-22 17:32:58', '2023-05-22 17:32:58'),
(4, 'mesiasi', '$2y$10$jT5sfuSdgFv2STjwCJp9ee6kpnlU3yQRKTunJ9ussZj/RJNZDi4a6', 2, 1, 1, '2023-05-22 17:33:43', '2023-05-22 17:33:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surat_no_surat_unique` (`no_surat`),
  ADD KEY `surat_user_id_foreign` (`user_id`);

--
-- Indexes for table `tembusan`
--
ALTER TABLE `tembusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tembusan_no_surat_foreign` (`no_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `penempatan_id` (`penempatan_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tembusan`
--
ALTER TABLE `tembusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tembusan`
--
ALTER TABLE `tembusan`
  ADD CONSTRAINT `tembusan_no_surat_foreign` FOREIGN KEY (`no_surat`) REFERENCES `surat` (`no_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`penempatan_id`) REFERENCES `penempatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
