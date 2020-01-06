-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 10:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id_agama` int(10) UNSIGNED NOT NULL,
  `nama_agama` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id_agama`, `nama_agama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2019-03-22 08:42:30', '2019-03-22 08:42:30'),
(2, 'Kristen', '2019-03-22 08:42:49', '2019-03-22 08:42:49'),
(3, 'Katolik', '2019-03-22 08:42:57', '2019-03-22 08:42:57'),
(4, 'Hindu', '2019-03-22 08:43:06', '2019-03-22 08:43:06'),
(7, 'Budha', '2019-11-19 06:32:08', '2019-11-19 06:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Grad B', '2019-11-27 12:51:39', '2020-01-05 23:27:35'),
(2, 'Kategori 2', '2019-11-27 12:51:39', NULL),
(4, 'Grad A', '2019-11-28 02:26:40', '2020-01-05 23:25:34'),
(5, 'Kategori 4', '2020-01-05 23:13:58', '2020-01-05 23:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id_karyawan` int(10) UNSIGNED NOT NULL,
  `sap` char(7) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `id_gender` int(10) UNSIGNED NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_agama` int(10) UNSIGNED DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id_karyawan`, `sap`, `nama_karyawan`, `id_gender`, `tgl_lahir`, `tgl_daftar`, `id_agama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(9, '1234567', 'Karyawan A', 1, '1980-09-23', '2009-11-18', 1, 'Jl. Indah Kasih', '08123123', '2019-11-18 03:26:05', '2019-11-18 15:30:19'),
(12, '0987654', 'Karyawan E', 1, '1980-10-10', '2000-11-18', 1, 'Jn. Permai', '0567654343', '2019-11-18 07:01:38', '2019-11-18 07:01:38'),
(13, '1102233', 'Karyawan D', 3, '1988-09-23', '2009-11-28', 1, 'Jl. 1', '08435654767', '2019-11-28 02:19:52', '2020-01-03 16:10:19'),
(14, '4538276', 'Karyawan H', 1, '1987-09-10', '2000-01-03', 3, 'Jl. Satu', '556455656567', '2020-01-03 15:59:27', '2020-01-03 15:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id_gender` int(10) UNSIGNED NOT NULL,
  `nama_gender` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id_gender`, `nama_gender`, `created_at`, `updated_at`) VALUES
(1, 'Laki-laki', '2019-03-22 09:38:24', '2019-03-22 09:38:24'),
(3, 'Perempuan', '2019-11-19 06:18:02', '2019-11-19 06:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('arif@contoh.com', '$2y$10$teDGfASs9BQExEzZkCf/OOoMBeOMYIlbwfHUzyVKNEg2NECzNIxyC', '2019-08-26 00:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `image` varchar(100) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `id_unit` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `ket_produk` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `image`, `stok_produk`, `id_unit`, `id_supplier`, `lokasi`, `ket_produk`, `created_at`, `updated_at`) VALUES
(1, 'MH009', 'Metal Ring', 1, '1577107585.jpg', 20, 3, 1, 'rak 4, kolom12', 'Flamable', '2019-12-23 13:26:25', '2019-12-23 13:26:25'),
(4, 'MM001', 'A3 SIDU', 2, '1578270970.jpg', 28, 3, 1, 'rak 5, kolom 1', 'Urgent', '2020-01-06 00:36:10', '2020-01-06 00:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id_purchase` int(10) UNSIGNED NOT NULL,
  `tgl_purchase` date NOT NULL,
  `id_produk` int(10) UNSIGNED NOT NULL,
  `qty_purchase` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id_purchase`, `tgl_purchase`, `id_produk`, `qty_purchase`, `status`, `created_at`, `updated_at`) VALUES
(5, '2020-01-06', 4, 15, 1, '2020-01-06 05:09:57', '2020-01-06 05:11:30'),
(7, '2020-01-06', 4, 10, 1, '2020-01-06 06:49:18', '2020-01-06 06:49:21');

--
-- Triggers `purchases`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `purchases` FOR EACH ROW BEGIN
	UPDATE products SET stok_produk = stok_produk+NEW.qty_purchase
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cancel_purchase` AFTER DELETE ON `purchases` FOR EACH ROW BEGIN
	UPDATE products SET stok_produk = products.stok_produk - OLD.qty_purchase
	WHERE id_produk = OLD.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id_sell` int(10) UNSIGNED NOT NULL,
  `tgl_sell` date NOT NULL,
  `id_karyawan` int(10) UNSIGNED NOT NULL,
  `id_produk` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id_sell`, `tgl_sell`, `id_karyawan`, `id_produk`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, '2019-12-23', 9, 1, 2, 1, '2019-12-23 13:27:42', '2019-12-23 13:28:09'),
(3, '2020-01-06', 9, 4, 3, 1, '2020-01-06 04:34:45', '2020-01-06 04:42:18'),
(4, '2020-01-06', 9, 4, 4, 0, '2020-01-06 06:39:19', '2020-01-06 06:39:19');

--
-- Triggers `sells`
--
DELIMITER $$
CREATE TRIGGER `cancel_sell` AFTER DELETE ON `sells` FOR EACH ROW BEGIN
	UPDATE products SET stok_produk = products.stok_produk + OLD.qty
	WHERE id_produk = OLD.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengambilan` AFTER INSERT ON `sells` FOR EACH ROW BEGIN
	UPDATE products SET stok_produk = stok_produk-NEW.qty
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telp_supplier` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `nama_supplier`, `cp`, `alamat_supplier`, `telp_supplier`, `created_at`, `updated_at`) VALUES
(1, 'Supplier 1', 'Joko', 'Palembang', '081232435436', '2019-11-28 03:14:50', '2019-11-28 03:27:22'),
(4, 'Supplier 4', 'Bari', 'Jakabaring', '067677987987', '2020-01-04 16:34:10', '2020-01-04 16:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id_unit` int(10) UNSIGNED NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id_unit`, `nama_unit`, `created_at`, `updated_at`) VALUES
(1, 'kg', '2019-11-28 14:30:50', '2019-11-28 14:30:50'),
(3, 'piece', '2019-11-28 14:31:53', '2019-11-28 14:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` enum('admin','operator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operator',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `akses`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Administrator', 'admin', 'admin@contoh.com', 'admin', '$2y$10$e/4AEFdynOYFe3GLoEZ7luQ6KSvZUAecX8hgE.oIzRzLi0BKr.u4C', 'zZhGTtUR7cGPUvhXvl1fkk1pBi4WLD4haj1OLQ3diy7hAaSIgo7roCUbWxlD', '2019-03-27 09:18:02', '2019-11-28 02:18:04'),
(8, 'M Siddik', 'siddik', 'siddik@contoh.com', 'operator', '$2y$10$Z0c.v7qIqwQzHK.CZRR.t.i39bJDF5qXJpLIVqv.tgr3CwvoLwwNa', NULL, '2020-01-06 02:39:05', '2020-01-06 02:39:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id_agama`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_agama_2` (`id_agama`),
  ADD KEY `id_agama_3` (`id_agama`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_pasien` (`id_karyawan`),
  ADD KEY `id_pasien_2` (`id_karyawan`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_agama_2` (`id_agama`),
  ADD KEY `id_gender` (`id_gender`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id_gender`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchase`),
  ADD KEY `id_purchase` (`id_purchase`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id_sell`),
  ADD KEY `id_sell` (`id_sell`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_unit`),
  ADD KEY `id_unit` (`id_unit`);

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
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id_agama` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_karyawan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id_gender` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id_sell` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id_unit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agamas` (`id_agama`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`id_gender`) REFERENCES `genders` (`id_gender`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `categories` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `units` (`id_unit`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`) ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `sells_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `employees` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sells_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
