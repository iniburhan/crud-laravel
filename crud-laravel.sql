-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2023 pada 09.08
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-laravel`
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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2023_06_12_022204_create_products_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_customers`
--

CREATE TABLE `ms_customers` (
  `id_customer` int(11) NOT NULL,
  `customer_name` varchar(128) DEFAULT NULL,
  `gender` enum('pria','wanita') DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(64) NOT NULL,
  `flag` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_customers`
--

INSERT INTO `ms_customers` (`id_customer`, `customer_name`, `gender`, `telp`, `address`, `image`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'Darsono', 'pria', '088888888812', 'Jalan Pepaya Gang Janur No. 108 C, RT.4/RW.5', '1686901139.jpg', 1, '2023-06-16 07:38:59', '2023-06-16 07:38:59'),
(2, 'Rita', 'wanita', '088888888812', 'DESA TINGGARJAYA RT 002 RW 008', '1686901181.jpg', 1, '2023-06-16 07:39:42', '2023-06-16 07:39:42'),
(3, 'Yuda', 'pria', '088888888812', 'Jalan Pepaya Gang Janur No. 108 C, RT.4/RW.5', '1686902353.jpg', 0, '2023-06-16 08:14:07', '2023-06-16 01:14:07');

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
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `kd_product` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `flag` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_product`, `kd_product`, `product_name`, `price`, `image`, `stok`, `id_supplier`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'FW', 'Kahf Kuning', 20000, '1686628938.jpg', 5, 2, 1, '2023-06-16 04:09:04', '2023-06-15 21:09:04'),
(18, 'SC', 'Sunlight', 2000, '1686723721.jpg', 1, 7, 0, '2023-06-16 04:10:25', '2023-06-15 21:10:25'),
(19, 'PG', 'Formula', 20500, '1686726704.jpg', 1, 2, 1, '2023-06-16 04:09:59', '2023-06-15 21:09:59'),
(20, 'SC', 'Shinzui', 20000, '1686643361.jpg', 0, 0, 1, '2023-06-14 04:25:49', '2023-06-13 21:19:45'),
(21, 'SC', 'Mama Lemon', 10000, '1686648854.jpg', 0, 0, 1, '2023-06-14 04:25:49', '2023-06-13 21:21:15'),
(22, 'SC', 'Mama Lemon', 10000, '1686648970.jpg', 0, 0, 1, '2023-06-13 09:36:10', '2023-06-13 09:36:10'),
(23, 'SC', 'Mama Lemon', 10000, '1686649037.jpg', 0, 0, 1, '2023-06-13 09:37:17', '2023-06-13 09:37:17'),
(24, 'SC', 'Mama Lemon', 10000, '1686649056.jpg', 0, 0, 1, '2023-06-13 09:37:36', '2023-06-13 09:37:36'),
(25, 'SC', 'Mama Lemon', 10000, '1686649160.jpg', 0, 0, 1, '2023-06-13 09:39:20', '2023-06-13 09:39:20'),
(26, 'TR', 'Kahf Hijau', 10000, '1686649910.jpg', 0, 0, 1, '2023-06-13 09:51:50', '2023-06-13 09:51:50'),
(27, 'RR', 'Sampoerna', 20000, '1686709758.jpg', 0, 0, 1, '2023-06-14 04:25:49', '2023-06-13 21:21:22'),
(28, 'SC', 'Nasi Uduk', 10000, '1686885118.jpg', 5, 1, 1, '2023-06-16 04:03:08', '2023-06-15 21:03:08'),
(29, 'OB', 'Bodrex', 5000, '1686885211.jpg', 50, 2, 1, '2023-06-16 03:13:31', '2023-06-16 03:13:31'),
(30, 'PG', 'Sunlight', 15000, '1686885537.jpg', 20, 8, 1, '2023-06-16 03:18:57', '2023-06-16 03:18:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` int(11) NOT NULL,
  `supplier_name` varchar(64) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(64) NOT NULL,
  `flag` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `supplier_name`, `telp`, `address`, `image`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'mbok minah', '085647922136', 'purwokerto', '1686820807.jpg', 1, '2023-06-16 04:11:52', '2023-06-15 21:11:52'),
(2, 'Kimia Farma', '088888888812', 'test', '1686816139.jpg', 1, '2023-06-16 01:24:40', '2023-06-15 18:24:40'),
(3, NULL, '088888888812', 'test', '1686816202.jpg', 1, '2023-06-16 00:49:00', '2023-06-16 00:49:00'),
(4, NULL, '088888888812', 'test', '1686816291.jpg', 1, '2023-06-16 00:49:00', '2023-06-16 00:49:00'),
(5, NULL, '088888888812', 'test', '1686816323.jpg', 1, '2023-06-16 00:49:00', '2023-06-16 00:49:00'),
(6, NULL, '088888888812', 'test', '1686818218.jpg', 1, '2023-06-16 00:49:00', '2023-06-16 00:49:00'),
(7, 'Mbah John', '088888888812', 'test', '1686818339.jpg', 1, '2023-06-16 00:49:00', '2023-06-16 00:49:00'),
(8, 'Unileverr', '088888888812', 'Cikarang Utara, Jababeka', '1686821893.jpg', 1, '2023-06-16 00:49:00', '2023-06-16 00:49:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_transactions`
--

CREATE TABLE `trx_transactions` (
  `id_transaction` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `flag` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trx_transactions`
--

INSERT INTO `trx_transactions` (`id_transaction`, `id_customer`, `date`, `keterangan`, `total`, `flag`, `created_at`) VALUES
(1, 1, '2023-06-19', 'test', 20000, 1, '2023-06-19 03:15:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_transaction_details`
--

CREATE TABLE `trx_transaction_details` (
  `id_transaction_detail` int(11) NOT NULL,
  `id_transaction` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trx_transaction_details`
--

INSERT INTO `trx_transaction_details` (`id_transaction_detail`, `id_transaction`, `id_product`, `qty`, `flag`, `created_at`) VALUES
(1, NULL, 1, 1, NULL, NULL),
(3, NULL, 19, 2, NULL, NULL),
(4, NULL, 18, 2, NULL, NULL);

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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_customers`
--
ALTER TABLE `ms_customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `trx_transactions`
--
ALTER TABLE `trx_transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indeks untuk tabel `trx_transaction_details`
--
ALTER TABLE `trx_transaction_details`
  ADD PRIMARY KEY (`id_transaction_detail`);

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ms_customers`
--
ALTER TABLE `ms_customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `trx_transactions`
--
ALTER TABLE `trx_transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `trx_transaction_details`
--
ALTER TABLE `trx_transaction_details`
  MODIFY `id_transaction_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
