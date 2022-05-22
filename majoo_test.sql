-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Bulan Mei 2022 pada 10.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majoo_test`
--

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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'makanan', '2022-05-21 01:25:45', '0000-00-00 00:00:00'),
(2, 'minuman', '2022-05-21 06:04:55', '2022-05-20 23:04:55'),
(3, 'pakaian', '2022-05-20 18:40:42', '2022-05-20 18:40:42'),
(8, 'perabot', '2022-05-21 07:07:54', '2022-05-21 07:07:54'),
(9, 'sekolah', '2022-05-22 00:25:19', '2022-05-22 00:25:19');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `nomor_hp`, `created_at`, `updated_at`) VALUES
(1, 'john', '086713689933', '2022-05-21 06:28:36', '2022-05-20 23:28:36'),
(3, 'doni wijad', '085526227272', '2022-05-21 13:30:22', '2022-05-21 06:30:22'),
(4, 'faisal', '08671388885', '2022-05-21 06:28:26', '2022-05-20 23:28:26'),
(5, 'mamad', '08671366665', '2022-05-21 06:28:55', '2022-05-20 23:28:55'),
(6, 'setyawan', '08578229233', '2022-05-21 06:28:44', '2022-05-20 23:28:44'),
(7, 'ahmad widodo', '086713242516', '2022-05-21 07:35:55', '2022-05-21 07:35:55');

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
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga_produk` decimal(10,0) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `stok`, `id_kategori`, `id_supplier`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'es teh', 'es teh enak dengan harga murah', '5000', 197, 2, 1, NULL, '2022-05-22 07:23:44', '2022-05-21 03:08:34'),
(2, 'roti susu', 'roti enak tidak keras dan berkualitas', '10000', 150, 1, 2, NULL, '2022-05-22 00:22:59', '2022-05-21 08:50:12'),
(3, 'bolu kukus', 'bolu kukus cap panda adalah bolu kukus terbaik dan nomor 1 di Indonesia', '15000', 150, 1, 3, NULL, '2022-05-22 00:23:01', '2022-05-21 03:37:14'),
(4, 'kopi paste', 'kopi dengan kualitas terbaik berasal dari biji hitam pilihan', '20000', 149, 2, 1, NULL, '2022-05-22 03:20:32', '2022-05-21 03:38:31'),
(5, 'pel', 'alat kebersihan', '15000', 47, 8, 2, NULL, '2022-05-22 03:21:20', '2022-05-21 17:20:43'),
(6, 'mie goreng', 'makanan kesukaan kita', '10000', 75, 1, 3, NULL, '2022-05-22 00:23:06', '2022-05-21 07:22:59'),
(7, 'bakso', 'bakso sapi enak dimakan ketika hangat', '10000', 300, 1, 1, NULL, '2022-05-22 00:23:09', '2022-05-21 07:33:49'),
(8, 'jeruk panas', 'minuman sehat', '3000', 30, 2, 2, NULL, '2022-05-22 00:23:11', '2022-05-21 07:34:14'),
(9, 'sapu', 'alat pembersih lantai', '10000', 2, 8, 3, NULL, '2022-05-22 02:28:10', '2022-05-21 19:28:10'),
(11, 'kemeja', 'pakaian kerja', '100000', 4, 3, 1, NULL, '2022-05-21 20:26:44', '2022-05-21 20:26:44'),
(15, 'sepatu', 'sepatu ATT', '5000', 6, 9, 1, NULL, '2022-05-22 00:26:40', '2022-05-22 00:26:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_hp` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `nomor_hp`, `created_at`, `updated_at`) VALUES
(1, 'Adi Karya', 'Surakarta, Jawa Tengah', '086455556281', '2022-05-21 05:12:57', '2022-05-21 05:12:57'),
(2, 'Jaya Abadi', 'Boyolali, Jawa Tengah', '084528461734', '2022-05-21 13:13:04', '2022-05-21 06:13:04'),
(3, 'Maju Jaya', 'Klaten, Jawa Tengah', '085167284617', '2022-05-21 05:14:00', '2022-05-21 05:14:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nota` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_total` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nota`, `id_produk`, `jumlah`, `harga_total`, `created_at`, `updated_at`) VALUES
(3, 'NOTA-1', 3, 2, '30000', '2022-05-21 18:51:23', '2022-05-21 18:51:23'),
(4, 'NOTA-4', 1, 5, '25000', '2022-05-20 18:51:37', '2022-05-21 18:51:37'),
(5, 'NOTA-5', 2, 4, '40000', '2022-05-19 18:51:52', '2022-05-21 18:51:52'),
(6, 'NOTA-6', 4, 1, '20000', '2022-05-18 18:52:20', '2022-05-21 18:52:20'),
(8, 'NOTA-7', 5, 2, '30000', '2022-05-17 19:31:39', '2022-05-21 19:31:39'),
(9, 'NOTA-4', 4, 1, '20000', '2022-05-21 20:20:32', '2022-05-21 20:20:32'),
(11, 'NOTA-10', 1, 3, '15000', '2022-05-22 00:23:44', '2022-05-22 00:23:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$r7beCoOCutQKoS9UmLP5ke7r2UlVMfO6MmAlS5maoFbfVTUTRVh/m', NULL, '2022-05-20 17:09:08', '2022-05-20 17:09:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
