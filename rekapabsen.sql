-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2021 pada 18.56
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekapabsen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Mila', 'admin@admin.com', NULL, '$2y$10$PCsYUafpyuFBVU8yy1In4.2q3RhlFK/oHfFOn7JFRTFxr3mwwMF2i', NULL, '2021-06-03 10:56:16', '2021-06-04 01:16:21'),
(3, 'Admin ', 'admin26@admin.com', NULL, '$2y$10$U93mNviobo0HwROLJYa6LuYyp21sI9C5ygP1P0biR3bEzF0HceFW6', NULL, '2021-06-04 01:14:49', '2021-06-04 01:14:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `kode_matkul`, `nama_matkul`, `semester`, `tahun`, `sks`, `created_at`, `updated_at`) VALUES
(1, 'TSI202 A', 'TSI202', 'Analisis Perancangan Sistem Informasi', '2', '2002', '3', '2021-06-03 07:32:39', '2021-06-04 00:29:56'),
(2, 'PWEB 02', 'PWEB ', 'Pemograman Web Yuhuu', '2', '2021', '3', '2021-06-03 12:27:18', '2021-06-04 00:28:41'),
(3, 'APSI 02', 'APSI 02', 'Analisis Perancangan Sistem Informasi', '2', '2020', '4', '2021-06-04 00:27:00', '2021-06-04 09:41:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_mahasiswa`
--

CREATE TABLE `kelas_mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_mahasiswa`
--

INSERT INTO `kelas_mahasiswa` (`id`, `mahasiswa_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-06-03 08:58:03', '2021-06-03 08:58:03'),
(2, 6, 1, '2021-06-03 09:07:58', '2021-06-03 09:07:58'),
(3, 7, 1, '2021-06-03 09:08:04', '2021-06-03 09:08:04'),
(4, 9, 1, '2021-06-03 09:08:10', '2021-06-03 09:08:10'),
(5, 8, 1, '2021-06-03 09:09:25', '2021-06-03 09:09:25'),
(6, 2, 2, '2021-06-03 12:28:31', '2021-06-03 12:28:31'),
(7, 6, 2, '2021-06-04 05:36:57', '2021-06-04 05:36:57'),
(8, 8, 2, '2021-06-04 05:38:24', '2021-06-04 05:38:24'),
(9, 7, 2, '2021-06-04 05:38:59', '2021-06-04 05:38:59'),
(10, 9, 2, '2021-06-04 05:40:04', '2021-06-04 05:40:04'),
(11, 10, 2, '2021-06-04 09:12:06', '2021-06-04 09:12:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_mahasiswa_pertemuan`
--

CREATE TABLE `kelas_mahasiswa_pertemuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_id` bigint(20) UNSIGNED NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `durasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_mahasiswa_pertemuan`
--

INSERT INTO `kelas_mahasiswa_pertemuan` (`id`, `kelas_mahasiswa_id`, `pertemuan_id`, `jam_masuk`, `jam_keluar`, `durasi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '01:32:03', '02:58:34', 86, '2021-06-03 12:30:22', '2021-06-03 12:30:22'),
(2, 4, 1, '02:57:52', '02:57:52', 85, '2021-06-03 12:30:22', '2021-06-03 12:30:22'),
(3, 2, 1, '02:57:42', '02:57:42', 85, '2021-06-03 12:30:22', '2021-06-03 12:30:22'),
(4, 3, 1, '02:57:40', '02:57:40', 85, '2021-06-03 12:30:22', '2021-06-03 12:30:22'),
(5, 5, 1, '02:57:36', '02:57:36', 85, '2021-06-03 12:30:22', '2021-06-03 12:30:22'),
(6, 6, 2, '01:32:03', '02:58:34', 86, '2021-06-04 06:39:43', '2021-06-04 06:39:43'),
(7, 10, 2, '02:57:52', '02:57:52', 85, '2021-06-04 06:39:43', '2021-06-04 06:39:43'),
(8, 7, 2, '02:57:42', '02:57:42', 85, '2021-06-04 06:39:43', '2021-06-04 06:39:43'),
(9, 9, 2, '02:57:40', '02:57:40', 85, '2021-06-04 06:39:43', '2021-06-04 06:39:43'),
(10, 8, 2, '02:57:36', '02:57:36', 85, '2021-06-04 06:39:43', '2021-06-04 06:39:43'),
(11, 6, 3, '01:32:03', '02:58:34', 86, '2021-06-04 08:07:11', '2021-06-04 08:07:11'),
(12, 10, 3, '02:57:52', '02:57:52', 85, '2021-06-04 08:07:11', '2021-06-04 08:07:11'),
(13, 7, 3, '02:57:42', '02:57:42', 85, '2021-06-04 08:07:11', '2021-06-04 08:07:11'),
(14, 9, 3, '02:57:40', '02:57:40', 85, '2021-06-04 08:07:11', '2021-06-04 08:07:11'),
(15, 8, 3, '02:57:36', '02:57:36', 85, '2021-06-04 08:07:11', '2021-06-04 08:07:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_06_03_135439_create_sessions_table', 1),
(7, '2021_05_23_160141_create_kelas_table', 2),
(8, '2021_05_28_193036_create_pertemuan_table', 2),
(9, '2021_05_28_221206_create_kelas_mahasiswa_table', 2),
(10, '2021_05_30_064026_create_kelas_mahasiswa_pertemuan', 2),
(11, '2021_06_03_174630_create_admins_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertemuan`
--

INSERT INTO `pertemuan` (`id`, `kelas_id`, `pertemuan_ke`, `tanggal`, `materi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-05-13', 'Materi 1', '2021-06-03 08:58:27', '2021-06-03 08:58:27'),
(2, 2, 1, '2021-06-17', 'Materi I', '2021-06-03 16:12:35', '2021-06-04 00:40:28'),
(3, 2, 2, '2021-06-04', 'Materi PHP', '2021-06-04 07:28:26', '2021-06-04 07:28:26'),
(4, 2, 3, '2021-06-21', 'Materi 3', '2021-06-04 07:37:56', '2021-06-04 07:37:56'),
(5, 2, 4, '2021-06-04', 'Materi Auth', '2021-06-04 08:45:21', '2021-06-04 09:42:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('t1Wveh7uY5yOstSLNJF9ZMdvbhTkWmMNYfOYzqPb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjlIcVZ5ZDJpM2ZBU3RrMlBHNXhVWm1ieXBmcTIyRm1vWjRKQ1VUVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9rZWxhcy9kZXRhaWwvMi9wZXJ0ZW11YW4vYWJzZW5zaS81Ijt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1622825050);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'Camila Faiza', '1911523014', 'camilafaizam@gmail.com', NULL, '$2y$10$l3Vh7/BwU1zPhlgSz24sle6kGtwFjgijQ985gA8vvaViQkzeCHG0e', NULL, NULL, NULL, NULL, NULL, '2021-06-03 07:15:20', '2021-06-03 07:15:20'),
(6, 'Nurul Hafizhah Alza', '1911523004', 'enha@gmail.com', NULL, '$2y$10$I4ffJYc3NIQKeTJKCDyBnuJh4cm8yCN7.Zp7Hx4Hn1vRTpXh5F.j2', NULL, NULL, NULL, NULL, NULL, '2021-06-03 09:04:34', '2021-06-03 09:04:34'),
(7, 'Jesica Resi Livera', '1911523018', 'jesica@gmail.com', NULL, '$2y$10$xSUcs3Xp5wMZ/QkyUBpGn.XeTeEbxkE6hak2VF0lJKtKbUHl0ueqK', NULL, NULL, NULL, NULL, NULL, '2021-06-03 09:05:09', '2021-06-03 09:05:09'),
(8, 'Hayatul Annisa B', '1911521008', 'haya@gmail.com', NULL, '$2y$10$XcSpvMuNFpdDsiW5qE2ISO9rqYX622YCeKE19NfPHAl4Nl7pjIEXW', NULL, NULL, NULL, NULL, NULL, '2021-06-03 09:05:56', '2021-06-04 01:46:43'),
(9, 'Distifia Oktari', '1911521016', 'disti@gmail.com', NULL, '$2y$10$7d2st4o1u0rYRDhv41NCZeAB0t1CmVeydAVXCafGUigRdW5dyx0iq', NULL, NULL, NULL, NULL, NULL, '2021-06-03 09:06:36', '2021-06-03 09:06:36'),
(10, 'Robert', '1911523015', 'robert@gmail.com', NULL, '$2y$10$Po55XL8.i0uQPj1rnSm4nuyo5spxu1h3qAkQ.JLpOJcU46.uU./qi', NULL, NULL, NULL, NULL, NULL, '2021-06-03 09:08:54', '2021-06-03 09:08:54'),
(13, 'Budi Budiman', '1911522019', 'budi@gmail.com', NULL, '$2y$10$JJd.OP6eo.c2GopyR5WHwOR7Qo4dCCxxiop2jqT0yW0YqL0pEt4UG', NULL, NULL, NULL, NULL, NULL, '2021-06-04 09:11:57', '2021-06-04 09:11:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_mahasiswa_mahasiswa_id_index` (`mahasiswa_id`),
  ADD KEY `kelas_mahasiswa_kelas_id_index` (`kelas_id`);

--
-- Indeks untuk tabel `kelas_mahasiswa_pertemuan`
--
ALTER TABLE `kelas_mahasiswa_pertemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_mahasiswa_pertemuan_kelas_mahasiswa_id_index` (`kelas_mahasiswa_id`),
  ADD KEY `kelas_mahasiswa_pertemuan_pertemuan_id_index` (`pertemuan_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertemuan_kelas_id_index` (`kelas_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kelas_mahasiswa_pertemuan`
--
ALTER TABLE `kelas_mahasiswa_pertemuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  ADD CONSTRAINT `kelas_mahasiswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_mahasiswa_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas_mahasiswa_pertemuan`
--
ALTER TABLE `kelas_mahasiswa_pertemuan`
  ADD CONSTRAINT `kelas_mahasiswa_pertemuan_kelas_mahasiswa_id_foreign` FOREIGN KEY (`kelas_mahasiswa_id`) REFERENCES `kelas_mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_mahasiswa_pertemuan_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD CONSTRAINT `pertemuan_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
