-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2021 at 10:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `is_delete` enum('0','1') DEFAULT '1' COMMENT '0. Delete, 1.Aktif',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Baju', '0', 1, 1638761351, 1638864240),
(2, 'Celana Js', '0', 1, 1638761351, 1638864207),
(3, 'Kaos', '0', 1, 1638863147, 1638864240),
(4, 'Makanan', '1', 1, 1638864644, 1638864644),
(5, 'Barang', '1', 1, 1638864868, 1638864868),
(6, 'Alat Tulis', '1', 1, 1638864945, 1638864945),
(19, 'Perlengkapan Rumah', '1', 1, 1639034933, 1639034933),
(20, 'Peralatan Dapur', '1', 1, 1639967379, 1639967379);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `produk_id` varchar(11) DEFAULT NULL,
  `pembayaran_id` varchar(11) DEFAULT NULL,
  `transaksi_id` varchar(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `is_selected` enum('0','1') NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`keranjang_id`, `produk_id`, `pembayaran_id`, `transaksi_id`, `qty`, `harga`, `is_selected`, `created_by`, `created_at`, `updated_at`) VALUES
(27, '10', NULL, NULL, 2, '10000', '0', 1, 1640079526, 1640079659),
(28, '6', NULL, NULL, 2, '10000', '0', 1, 1640079655, 1640079723),
(29, '11', NULL, NULL, 4, '10000', '0', 1, 1640079669, 1640079672),
(33, '8', NULL, NULL, 1, '10000', '0', 1, 1640079730, 1640079730),
(34, '16', NULL, NULL, 2, '10000', '0', 1, 1640079732, 1640079733);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1638712587),
('m130524_201442_init', 1638712587),
('m190124_110200_add_verification_token_column_to_user_table', 1638712587);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `pembayaran` varchar(45) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `gambar` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `upadate_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `pembayaran`, `is_active`, `gambar`, `admin`, `created_by`, `created_at`, `upadate_at`) VALUES
(1, 'FasaPay', '1', 'fasapay.jpeg', '2000', 1, 1638761351, 1638761351),
(2, 'Tunai', '1', 'tunai.png', NULL, 1, 1638761351, 1638761351);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `kategori_id` varchar(11) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `qty` varchar(11) DEFAULT NULL,
  `harga` varchar(45) NOT NULL DEFAULT '10000',
  `gambar` varchar(255) DEFAULT NULL,
  `is_delete` enum('0','1') DEFAULT '1' COMMENT '0. Delete, 1.Aktif',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `kategori_id`, `nama_produk`, `qty`, `harga`, `gambar`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2', 'Baju Batik', '50', '10000', '1', '0', 1, 1638761351, 1638849567),
(6, '4', 'Bakso Granat', '100', '10000', 'bakso-granat-2021-12-20-04-43-10.jpg', '1', 1, 1638864746, 1639969843),
(7, '6', 'Pencil Warna', '100', '10000', 'pencil-warna-2021-12-20-04-33-10.jpg', '0', 1, 1638865043, 1639969833),
(8, '4', 'Nasi Goreng', '100', '10000', 'nasi-goreng-2021-12-20-04-25-09.jpg', '1', 1, 1638865501, 1639969765),
(9, '4', 'Nasi Goreng Gila', '100', '10000', 'nasi-goreng-gila-2021-12-20-04-31-09.jpg', '1', 1, 1638865531, 1639969771),
(10, '4', 'Bakso Beranak', '100', '10000', 'bakso-beranak-2021-12-20-04-24-10.jpg', '1', 1, 1638865544, 1639969824),
(11, '4', 'Bakso Merapi', '100', '10000', 'bakso-merapi-2021-12-20-04-18-10.jpg', '1', 1, 1638865564, 1639969818),
(12, '4', 'Bakso Jumbo', '100', '10000', 'bakso-jumbo-2021-12-20-04-10-10.jpg', '1', 1, 1638866628, 1639969810),
(13, '4', 'Bakso', '100', '10000', 'bakso-2021-12-20-04-02-10.jpg', '1', 1, 1638867427, 1639969802),
(14, '4', 'Nasi Goreng Spesial', '100', '10000', 'nasi-goreng-spesial-2021-12-20-04-14-09.jpg', '1', 1, 1638867468, 1639969754),
(15, '4', 'Nasi Goreng Bakso', '100', '10000', 'nasi-goreng-bakso-2021-12-20-04-15-08.jpg', '1', 1, 1638867534, 1639969695),
(16, '4', 'Nasi Goreng Sosis', '100', '10000', 'nasi-goreng-sosis-2021-12-20-04-08-09.jpg', '1', 1, 1638867549, 1639969748),
(17, '4', 'Nasi', '100', '10000', 'nasi-2021-12-09-07:17:53.jpg', '0', 1, 1639032797, 1639032807),
(18, '5', 'Nasi', '100', '10000', 'nasi-2021-12-09-07:04:55.jpg', '0', 1, 1639032904, 1639032947),
(19, '4', 'Nasi', '100', '10000', 'nasi-2021-12-09-07:37:55.jpg', '0', 1, 1639032937, 1639032949),
(20, '4', 'Nasi', '100', '10000', 'nasi-2021-12-09-08:23:25.jpg', '0', 1, 1639034723, 1639034728);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `tagihan_id` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `kode_tagihan` varchar(255) DEFAULT NULL,
  `status_tagihan` enum('1','2','3','4','5') DEFAULT NULL COMMENT '1. menunggu pembayaran \r\n2. menunggu konfirmasi pembayaran \r\n3. dibayar \r\n4. batal \r\n5. gagal	',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `upadate_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `kode_transaksi` varchar(255) DEFAULT NULL,
  `status_transaksi` enum('1','2','3','4','5','6','7') DEFAULT NULL COMMENT '1. menunggu pembayaran\r\n2. menunggu konfirmasi pembayaran\r\n3. dibayar\r\n4. batal\r\n5. gagal\r\n6. dikirim\r\n7. selesai',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `upadate_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('1','2') COLLATE utf8_unicode_ci DEFAULT '2' COMMENT '1. Master, 2.User',
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0. Tidak Aktif, 1. Aktif, 2. Suspend',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'andri007', 'Andri Rizki Saputra', 'TR00k5SU--Aq_s9arsCa_tGm1WPYks1n', '$2y$13$QLPo1NBu9rOLaY3zHEAQdu.Ecu7bdJ70KbogUF57eRjq8yU08YmL.', NULL, 'andri.rizki007@gmail.com', '1', '1', 1638761351, 1638761351, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`tagihan_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `tagihan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
