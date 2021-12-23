-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2021 at 08:37 AM
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
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_assignment`
--

CREATE TABLE `tbl_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_auth_assignment`
--

INSERT INTO `tbl_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1640226826),
('admin', '3', 1640226826),
('superadmin', '1', 1640226826);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_item`
--

CREATE TABLE `tbl_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_auth_item`
--

INSERT INTO `tbl_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/create', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/admin/index', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/admin/reset-password', 2, NULL, NULL, NULL, 1640226826, 1640226826),
('/admin/update', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/admin/view', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/data-pemesan/index', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/data-pemesan/view', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/gambar-produk/change-status', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/gambar-produk/create', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/gambar-produk/index', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/gambar-produk/update', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/gambar-produk/view', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/merchant/create', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/merchant/index', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/merchant/lists', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/merchant/update', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/merchant/view', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/order/index', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/order/to-merchant', 2, NULL, NULL, NULL, 1640226826, 1640226826),
('/order/to-pembeli', 2, NULL, NULL, NULL, 1640226826, 1640226826),
('/order/update', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/order/update-resi', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/order/view', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/produk/change-status', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/produk/create', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/produk/image', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/produk/index', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/produk/update', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/produk/view', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('/rbac/*', 2, NULL, NULL, NULL, 1640226824, 1640226824),
('admin', 1, NULL, NULL, NULL, 1640226824, 1640226824),
('admin.read', 2, 'view admin', NULL, NULL, 1640226824, 1640226824),
('admin.write', 2, 'create, update admin', NULL, NULL, 1640226824, 1640226824),
('data-pemesan.read', 2, 'view data-pemesan', NULL, NULL, 1640226824, 1640226824),
('gambar-produk.read', 2, 'view gambar-produk', NULL, NULL, 1640226824, 1640226824),
('gambar-produk.write', 2, 'create, update gambar-produk', NULL, NULL, 1640226824, 1640226824),
('merchant.read', 2, 'view merchant', NULL, NULL, 1640226824, 1640226824),
('merchant.write', 2, 'create, update merchant', NULL, NULL, 1640226824, 1640226824),
('order.read', 2, 'view order', NULL, NULL, 1640226824, 1640226824),
('order.write', 2, 'update order', NULL, NULL, 1640226824, 1640226824),
('produk.read', 2, 'view produk', NULL, NULL, 1640226824, 1640226824),
('produk.write', 2, 'create, update produk', NULL, NULL, 1640226824, 1640226824),
('rbac.access', 2, 'access all rbac process', NULL, NULL, 1640226824, 1640226824),
('superadmin', 1, NULL, NULL, NULL, 1640226824, 1640226824);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_item_child`
--

CREATE TABLE `tbl_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_auth_item_child`
--

INSERT INTO `tbl_auth_item_child` (`parent`, `child`) VALUES
('admin', '/merchant/lists'),
('admin', 'admin.read'),
('admin', 'admin.write'),
('admin', 'data-pemesan.read'),
('admin', 'gambar-produk.read'),
('admin', 'gambar-produk.write'),
('admin', 'merchant.read'),
('admin', 'merchant.write'),
('admin', 'order.read'),
('admin', 'order.write'),
('admin', 'produk.read'),
('admin', 'produk.write'),
('admin.read', '/admin/index'),
('admin.read', '/admin/view'),
('admin.write', '/admin/create'),
('admin.write', '/admin/reset-password'),
('admin.write', '/admin/update'),
('data-pemesan.read', '/data-pemesan/index'),
('data-pemesan.read', '/data-pemesan/view'),
('gambar-produk.read', '/gambar-produk/index'),
('gambar-produk.read', '/gambar-produk/view'),
('gambar-produk.write', '/gambar-produk/change-status'),
('gambar-produk.write', '/gambar-produk/create'),
('gambar-produk.write', '/gambar-produk/update'),
('merchant.read', '/merchant/index'),
('merchant.read', '/merchant/view'),
('merchant.write', '/merchant/create'),
('merchant.write', '/merchant/lists'),
('merchant.write', '/merchant/update'),
('order.read', '/order/index'),
('order.read', '/order/view'),
('order.write', '/order/to-merchant'),
('order.write', '/order/to-pembeli'),
('order.write', '/order/update'),
('order.write', '/order/update-resi'),
('produk.read', '/produk/image'),
('produk.read', '/produk/index'),
('produk.read', '/produk/view'),
('produk.write', '/produk/change-status'),
('produk.write', '/produk/create'),
('produk.write', '/produk/update'),
('rbac.access', '/rbac/*'),
('superadmin', 'admin'),
('superadmin', 'rbac.access');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_rule`
--

CREATE TABLE `tbl_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_number`
--

CREATE TABLE `tbl_bill_number` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_pemesan`
--

CREATE TABLE `tbl_data_pemesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_handphone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filename`
--

CREATE TABLE `tbl_filename` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar_produk`
--

CREATE TABLE `tbl_gambar_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 10,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `id` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`id`, `id_kota`, `id_provinsi`, `tipe`, `nama_kota`, `kode_pos`, `created_at`, `updated_at`) VALUES
(2, 1, 21, 'Kabupaten', 'Aceh Barat', '23681', 1640231545, 1640231545),
(3, 2, 21, 'Kabupaten', 'Aceh Barat Daya', '23764', 1640231545, 1640231545),
(4, 3, 21, 'Kabupaten', 'Aceh Besar', '23951', 1640231545, 1640231545),
(5, 4, 21, 'Kabupaten', 'Aceh Jaya', '23654', 1640231545, 1640231545),
(6, 5, 21, 'Kabupaten', 'Aceh Selatan', '23719', 1640231545, 1640231545),
(7, 6, 21, 'Kabupaten', 'Aceh Singkil', '24785', 1640231545, 1640231545),
(8, 7, 21, 'Kabupaten', 'Aceh Tamiang', '24476', 1640231545, 1640231545),
(9, 8, 21, 'Kabupaten', 'Aceh Tengah', '24511', 1640231545, 1640231545),
(10, 9, 21, 'Kabupaten', 'Aceh Tenggara', '24611', 1640231545, 1640231545),
(11, 10, 21, 'Kabupaten', 'Aceh Timur', '24454', 1640231545, 1640231545),
(12, 11, 21, 'Kabupaten', 'Aceh Utara', '24382', 1640231545, 1640231545),
(13, 12, 32, 'Kabupaten', 'Agam', '26411', 1640231545, 1640231545),
(14, 13, 23, 'Kabupaten', 'Alor', '85811', 1640231545, 1640231545),
(15, 14, 19, 'Kota', 'Ambon', '97222', 1640231545, 1640231545),
(16, 15, 34, 'Kabupaten', 'Asahan', '21214', 1640231545, 1640231545),
(17, 16, 24, 'Kabupaten', 'Asmat', '99777', 1640231545, 1640231545),
(18, 17, 1, 'Kabupaten', 'Badung', '80351', 1640231545, 1640231545),
(19, 18, 13, 'Kabupaten', 'Balangan', '71611', 1640231545, 1640231545),
(20, 19, 15, 'Kota', 'Balikpapan', '76111', 1640231545, 1640231545),
(21, 20, 21, 'Kota', 'Banda Aceh', '23238', 1640231545, 1640231545),
(22, 21, 18, 'Kota', 'Bandar Lampung', '35139', 1640231545, 1640231545),
(23, 22, 9, 'Kabupaten', 'Bandung', '40311', 1640231545, 1640231545),
(24, 23, 9, 'Kota', 'Bandung', '40111', 1640231545, 1640231545),
(25, 24, 9, 'Kabupaten', 'Bandung Barat', '40721', 1640231545, 1640231545),
(26, 25, 29, 'Kabupaten', 'Banggai', '94711', 1640231545, 1640231545),
(27, 26, 29, 'Kabupaten', 'Banggai Kepulauan', '94881', 1640231545, 1640231545),
(28, 27, 2, 'Kabupaten', 'Bangka', '33212', 1640231545, 1640231545),
(29, 28, 2, 'Kabupaten', 'Bangka Barat', '33315', 1640231545, 1640231545),
(30, 29, 2, 'Kabupaten', 'Bangka Selatan', '33719', 1640231545, 1640231545),
(31, 30, 2, 'Kabupaten', 'Bangka Tengah', '33613', 1640231545, 1640231545),
(32, 31, 11, 'Kabupaten', 'Bangkalan', '69118', 1640231545, 1640231545),
(33, 32, 1, 'Kabupaten', 'Bangli', '80619', 1640231545, 1640231545),
(34, 33, 13, 'Kabupaten', 'Banjar', '70619', 1640231545, 1640231545),
(35, 34, 9, 'Kota', 'Banjar', '46311', 1640231545, 1640231545),
(36, 35, 13, 'Kota', 'Banjarbaru', '70712', 1640231545, 1640231545),
(37, 36, 13, 'Kota', 'Banjarmasin', '70117', 1640231545, 1640231545),
(38, 37, 10, 'Kabupaten', 'Banjarnegara', '53419', 1640231545, 1640231545),
(39, 38, 28, 'Kabupaten', 'Bantaeng', '92411', 1640231545, 1640231545),
(40, 39, 5, 'Kabupaten', 'Bantul', '55715', 1640231545, 1640231545),
(41, 40, 33, 'Kabupaten', 'Banyuasin', '30911', 1640231545, 1640231545),
(42, 41, 10, 'Kabupaten', 'Banyumas', '53114', 1640231545, 1640231545),
(43, 42, 11, 'Kabupaten', 'Banyuwangi', '68416', 1640231545, 1640231545),
(44, 43, 13, 'Kabupaten', 'Barito Kuala', '70511', 1640231545, 1640231545),
(45, 44, 14, 'Kabupaten', 'Barito Selatan', '73711', 1640231545, 1640231545),
(46, 45, 14, 'Kabupaten', 'Barito Timur', '73671', 1640231545, 1640231545),
(47, 46, 14, 'Kabupaten', 'Barito Utara', '73881', 1640231545, 1640231545),
(48, 47, 28, 'Kabupaten', 'Barru', '90719', 1640231545, 1640231545),
(49, 48, 17, 'Kota', 'Batam', '29413', 1640231545, 1640231545),
(50, 49, 10, 'Kabupaten', 'Batang', '51211', 1640231545, 1640231545),
(51, 50, 8, 'Kabupaten', 'Batang Hari', '36613', 1640231545, 1640231545),
(52, 51, 11, 'Kota', 'Batu', '65311', 1640231545, 1640231545),
(53, 52, 34, 'Kabupaten', 'Batu Bara', '21655', 1640231545, 1640231545),
(54, 53, 30, 'Kota', 'Bau-Bau', '93719', 1640231545, 1640231545),
(55, 54, 9, 'Kabupaten', 'Bekasi', '17837', 1640231545, 1640231545),
(56, 55, 9, 'Kota', 'Bekasi', '17121', 1640231545, 1640231545),
(57, 56, 2, 'Kabupaten', 'Belitung', '33419', 1640231545, 1640231545),
(58, 57, 2, 'Kabupaten', 'Belitung Timur', '33519', 1640231545, 1640231545),
(59, 58, 23, 'Kabupaten', 'Belu', '85711', 1640231545, 1640231545),
(60, 59, 21, 'Kabupaten', 'Bener Meriah', '24581', 1640231545, 1640231545),
(61, 60, 26, 'Kabupaten', 'Bengkalis', '28719', 1640231545, 1640231545),
(62, 61, 12, 'Kabupaten', 'Bengkayang', '79213', 1640231545, 1640231545),
(63, 62, 4, 'Kota', 'Bengkulu', '38229', 1640231545, 1640231545),
(64, 63, 4, 'Kabupaten', 'Bengkulu Selatan', '38519', 1640231545, 1640231545),
(65, 64, 4, 'Kabupaten', 'Bengkulu Tengah', '38319', 1640231545, 1640231545),
(66, 65, 4, 'Kabupaten', 'Bengkulu Utara', '38619', 1640231545, 1640231545),
(67, 66, 15, 'Kabupaten', 'Berau', '77311', 1640231545, 1640231545),
(68, 67, 24, 'Kabupaten', 'Biak Numfor', '98119', 1640231545, 1640231545),
(69, 68, 22, 'Kabupaten', 'Bima', '84171', 1640231545, 1640231545),
(70, 69, 22, 'Kota', 'Bima', '84139', 1640231545, 1640231545),
(71, 70, 34, 'Kota', 'Binjai', '20712', 1640231545, 1640231545),
(72, 71, 17, 'Kabupaten', 'Bintan', '29135', 1640231545, 1640231545),
(73, 72, 21, 'Kabupaten', 'Bireuen', '24219', 1640231545, 1640231545),
(74, 73, 31, 'Kota', 'Bitung', '95512', 1640231545, 1640231545),
(75, 74, 11, 'Kabupaten', 'Blitar', '66171', 1640231545, 1640231545),
(76, 75, 11, 'Kota', 'Blitar', '66124', 1640231545, 1640231545),
(77, 76, 10, 'Kabupaten', 'Blora', '58219', 1640231545, 1640231545),
(78, 77, 7, 'Kabupaten', 'Boalemo', '96319', 1640231545, 1640231545),
(79, 78, 9, 'Kabupaten', 'Bogor', '16911', 1640231545, 1640231545),
(80, 79, 9, 'Kota', 'Bogor', '16119', 1640231545, 1640231545),
(81, 80, 11, 'Kabupaten', 'Bojonegoro', '62119', 1640231545, 1640231545),
(82, 81, 31, 'Kabupaten', 'Bolaang Mongondow (Bolmong)', '95755', 1640231545, 1640231545),
(83, 82, 31, 'Kabupaten', 'Bolaang Mongondow Selatan', '95774', 1640231545, 1640231545),
(84, 83, 31, 'Kabupaten', 'Bolaang Mongondow Timur', '95783', 1640231545, 1640231545),
(85, 84, 31, 'Kabupaten', 'Bolaang Mongondow Utara', '95765', 1640231545, 1640231545),
(86, 85, 30, 'Kabupaten', 'Bombana', '93771', 1640231545, 1640231545),
(87, 86, 11, 'Kabupaten', 'Bondowoso', '68219', 1640231545, 1640231545),
(88, 87, 28, 'Kabupaten', 'Bone', '92713', 1640231545, 1640231545),
(89, 88, 7, 'Kabupaten', 'Bone Bolango', '96511', 1640231545, 1640231545),
(90, 89, 15, 'Kota', 'Bontang', '75313', 1640231545, 1640231545),
(91, 90, 24, 'Kabupaten', 'Boven Digoel', '99662', 1640231545, 1640231545),
(92, 91, 10, 'Kabupaten', 'Boyolali', '57312', 1640231545, 1640231545),
(93, 92, 10, 'Kabupaten', 'Brebes', '52212', 1640231545, 1640231545),
(94, 93, 32, 'Kota', 'Bukittinggi', '26115', 1640231545, 1640231545),
(95, 94, 1, 'Kabupaten', 'Buleleng', '81111', 1640231545, 1640231545),
(96, 95, 28, 'Kabupaten', 'Bulukumba', '92511', 1640231545, 1640231545),
(97, 96, 16, 'Kabupaten', 'Bulungan (Bulongan)', '77211', 1640231545, 1640231545),
(98, 97, 8, 'Kabupaten', 'Bungo', '37216', 1640231545, 1640231545),
(99, 98, 29, 'Kabupaten', 'Buol', '94564', 1640231545, 1640231545),
(100, 99, 19, 'Kabupaten', 'Buru', '97371', 1640231545, 1640231545),
(101, 100, 19, 'Kabupaten', 'Buru Selatan', '97351', 1640231545, 1640231545),
(102, 101, 30, 'Kabupaten', 'Buton', '93754', 1640231545, 1640231545),
(103, 102, 30, 'Kabupaten', 'Buton Utara', '93745', 1640231545, 1640231545),
(104, 103, 9, 'Kabupaten', 'Ciamis', '46211', 1640231545, 1640231545),
(105, 104, 9, 'Kabupaten', 'Cianjur', '43217', 1640231545, 1640231545),
(106, 105, 10, 'Kabupaten', 'Cilacap', '53211', 1640231545, 1640231545),
(107, 106, 3, 'Kota', 'Cilegon', '42417', 1640231545, 1640231545),
(108, 107, 9, 'Kota', 'Cimahi', '40512', 1640231545, 1640231545),
(109, 108, 9, 'Kabupaten', 'Cirebon', '45611', 1640231545, 1640231545),
(110, 109, 9, 'Kota', 'Cirebon', '45116', 1640231545, 1640231545),
(111, 110, 34, 'Kabupaten', 'Dairi', '22211', 1640231545, 1640231545),
(112, 111, 24, 'Kabupaten', 'Deiyai (Deliyai)', '98784', 1640231545, 1640231545),
(113, 112, 34, 'Kabupaten', 'Deli Serdang', '20511', 1640231545, 1640231545),
(114, 113, 10, 'Kabupaten', 'Demak', '59519', 1640231545, 1640231545),
(115, 114, 1, 'Kota', 'Denpasar', '80227', 1640231545, 1640231545),
(116, 115, 9, 'Kota', 'Depok', '16416', 1640231545, 1640231545),
(117, 116, 32, 'Kabupaten', 'Dharmasraya', '27612', 1640231545, 1640231545),
(118, 117, 24, 'Kabupaten', 'Dogiyai', '98866', 1640231545, 1640231545),
(119, 118, 22, 'Kabupaten', 'Dompu', '84217', 1640231545, 1640231545),
(120, 119, 29, 'Kabupaten', 'Donggala', '94341', 1640231545, 1640231545),
(121, 120, 26, 'Kota', 'Dumai', '28811', 1640231545, 1640231545),
(122, 121, 33, 'Kabupaten', 'Empat Lawang', '31811', 1640231545, 1640231545),
(123, 122, 23, 'Kabupaten', 'Ende', '86351', 1640231545, 1640231545),
(124, 123, 28, 'Kabupaten', 'Enrekang', '91719', 1640231545, 1640231545),
(125, 124, 25, 'Kabupaten', 'Fakfak', '98651', 1640231545, 1640231545),
(126, 125, 23, 'Kabupaten', 'Flores Timur', '86213', 1640231545, 1640231545),
(127, 126, 9, 'Kabupaten', 'Garut', '44126', 1640231545, 1640231545),
(128, 127, 21, 'Kabupaten', 'Gayo Lues', '24653', 1640231545, 1640231545),
(129, 128, 1, 'Kabupaten', 'Gianyar', '80519', 1640231545, 1640231545),
(130, 129, 7, 'Kabupaten', 'Gorontalo', '96218', 1640231545, 1640231545),
(131, 130, 7, 'Kota', 'Gorontalo', '96115', 1640231545, 1640231545),
(132, 131, 7, 'Kabupaten', 'Gorontalo Utara', '96611', 1640231545, 1640231545),
(133, 132, 28, 'Kabupaten', 'Gowa', '92111', 1640231545, 1640231545),
(134, 133, 11, 'Kabupaten', 'Gresik', '61115', 1640231545, 1640231545),
(135, 134, 10, 'Kabupaten', 'Grobogan', '58111', 1640231545, 1640231545),
(136, 135, 5, 'Kabupaten', 'Gunung Kidul', '55812', 1640231545, 1640231545),
(137, 136, 14, 'Kabupaten', 'Gunung Mas', '74511', 1640231545, 1640231545),
(138, 137, 34, 'Kota', 'Gunungsitoli', '22813', 1640231545, 1640231545),
(139, 138, 20, 'Kabupaten', 'Halmahera Barat', '97757', 1640231545, 1640231545),
(140, 139, 20, 'Kabupaten', 'Halmahera Selatan', '97911', 1640231545, 1640231545),
(141, 140, 20, 'Kabupaten', 'Halmahera Tengah', '97853', 1640231545, 1640231545),
(142, 141, 20, 'Kabupaten', 'Halmahera Timur', '97862', 1640231545, 1640231545),
(143, 142, 20, 'Kabupaten', 'Halmahera Utara', '97762', 1640231545, 1640231545),
(144, 143, 13, 'Kabupaten', 'Hulu Sungai Selatan', '71212', 1640231545, 1640231545),
(145, 144, 13, 'Kabupaten', 'Hulu Sungai Tengah', '71313', 1640231545, 1640231545),
(146, 145, 13, 'Kabupaten', 'Hulu Sungai Utara', '71419', 1640231545, 1640231545),
(147, 146, 34, 'Kabupaten', 'Humbang Hasundutan', '22457', 1640231545, 1640231545),
(148, 147, 26, 'Kabupaten', 'Indragiri Hilir', '29212', 1640231545, 1640231545),
(149, 148, 26, 'Kabupaten', 'Indragiri Hulu', '29319', 1640231545, 1640231545),
(150, 149, 9, 'Kabupaten', 'Indramayu', '45214', 1640231545, 1640231545),
(151, 150, 24, 'Kabupaten', 'Intan Jaya', '98771', 1640231545, 1640231545),
(152, 151, 6, 'Kota', 'Jakarta Barat', '11220', 1640231545, 1640231545),
(153, 152, 6, 'Kota', 'Jakarta Pusat', '10540', 1640231545, 1640231545),
(154, 153, 6, 'Kota', 'Jakarta Selatan', '12230', 1640231545, 1640231545),
(155, 154, 6, 'Kota', 'Jakarta Timur', '13330', 1640231545, 1640231545),
(156, 155, 6, 'Kota', 'Jakarta Utara', '14140', 1640231545, 1640231545),
(157, 156, 8, 'Kota', 'Jambi', '36111', 1640231545, 1640231545),
(158, 157, 24, 'Kabupaten', 'Jayapura', '99352', 1640231545, 1640231545),
(159, 158, 24, 'Kota', 'Jayapura', '99114', 1640231545, 1640231545),
(160, 159, 24, 'Kabupaten', 'Jayawijaya', '99511', 1640231545, 1640231545),
(161, 160, 11, 'Kabupaten', 'Jember', '68113', 1640231545, 1640231545),
(162, 161, 1, 'Kabupaten', 'Jembrana', '82251', 1640231545, 1640231545),
(163, 162, 28, 'Kabupaten', 'Jeneponto', '92319', 1640231545, 1640231545),
(164, 163, 10, 'Kabupaten', 'Jepara', '59419', 1640231545, 1640231545),
(165, 164, 11, 'Kabupaten', 'Jombang', '61415', 1640231545, 1640231545),
(166, 165, 25, 'Kabupaten', 'Kaimana', '98671', 1640231545, 1640231545),
(167, 166, 26, 'Kabupaten', 'Kampar', '28411', 1640231545, 1640231545),
(168, 167, 14, 'Kabupaten', 'Kapuas', '73583', 1640231545, 1640231545),
(169, 168, 12, 'Kabupaten', 'Kapuas Hulu', '78719', 1640231545, 1640231545),
(170, 169, 10, 'Kabupaten', 'Karanganyar', '57718', 1640231545, 1640231545),
(171, 170, 1, 'Kabupaten', 'Karangasem', '80819', 1640231545, 1640231545),
(172, 171, 9, 'Kabupaten', 'Karawang', '41311', 1640231545, 1640231545),
(173, 172, 17, 'Kabupaten', 'Karimun', '29611', 1640231545, 1640231545),
(174, 173, 34, 'Kabupaten', 'Karo', '22119', 1640231545, 1640231545),
(175, 174, 14, 'Kabupaten', 'Katingan', '74411', 1640231545, 1640231545),
(176, 175, 4, 'Kabupaten', 'Kaur', '38911', 1640231545, 1640231545),
(177, 176, 12, 'Kabupaten', 'Kayong Utara', '78852', 1640231545, 1640231545),
(178, 177, 10, 'Kabupaten', 'Kebumen', '54319', 1640231545, 1640231545),
(179, 178, 11, 'Kabupaten', 'Kediri', '64184', 1640231545, 1640231545),
(180, 179, 11, 'Kota', 'Kediri', '64125', 1640231545, 1640231545),
(181, 180, 24, 'Kabupaten', 'Keerom', '99461', 1640231545, 1640231545),
(182, 181, 10, 'Kabupaten', 'Kendal', '51314', 1640231545, 1640231545),
(183, 182, 30, 'Kota', 'Kendari', '93126', 1640231545, 1640231545),
(184, 183, 4, 'Kabupaten', 'Kepahiang', '39319', 1640231545, 1640231545),
(185, 184, 17, 'Kabupaten', 'Kepulauan Anambas', '29991', 1640231545, 1640231545),
(186, 185, 19, 'Kabupaten', 'Kepulauan Aru', '97681', 1640231545, 1640231545),
(187, 186, 32, 'Kabupaten', 'Kepulauan Mentawai', '25771', 1640231545, 1640231545),
(188, 187, 26, 'Kabupaten', 'Kepulauan Meranti', '28791', 1640231545, 1640231545),
(189, 188, 31, 'Kabupaten', 'Kepulauan Sangihe', '95819', 1640231545, 1640231545),
(190, 189, 6, 'Kabupaten', 'Kepulauan Seribu', '14550', 1640231545, 1640231545),
(191, 190, 31, 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862', 1640231545, 1640231545),
(192, 191, 20, 'Kabupaten', 'Kepulauan Sula', '97995', 1640231545, 1640231545),
(193, 192, 31, 'Kabupaten', 'Kepulauan Talaud', '95885', 1640231545, 1640231545),
(194, 193, 24, 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', '98211', 1640231545, 1640231545),
(195, 194, 8, 'Kabupaten', 'Kerinci', '37167', 1640231545, 1640231545),
(196, 195, 12, 'Kabupaten', 'Ketapang', '78874', 1640231545, 1640231545),
(197, 196, 10, 'Kabupaten', 'Klaten', '57411', 1640231545, 1640231545),
(198, 197, 1, 'Kabupaten', 'Klungkung', '80719', 1640231545, 1640231545),
(199, 198, 30, 'Kabupaten', 'Kolaka', '93511', 1640231545, 1640231545),
(200, 199, 30, 'Kabupaten', 'Kolaka Utara', '93911', 1640231545, 1640231545),
(201, 200, 30, 'Kabupaten', 'Konawe', '93411', 1640231545, 1640231545),
(202, 201, 30, 'Kabupaten', 'Konawe Selatan', '93811', 1640231545, 1640231545),
(203, 202, 30, 'Kabupaten', 'Konawe Utara', '93311', 1640231545, 1640231545),
(204, 203, 13, 'Kabupaten', 'Kotabaru', '72119', 1640231545, 1640231545),
(205, 204, 31, 'Kota', 'Kotamobagu', '95711', 1640231545, 1640231545),
(206, 205, 14, 'Kabupaten', 'Kotawaringin Barat', '74119', 1640231545, 1640231545),
(207, 206, 14, 'Kabupaten', 'Kotawaringin Timur', '74364', 1640231545, 1640231545),
(208, 207, 26, 'Kabupaten', 'Kuantan Singingi', '29519', 1640231545, 1640231545),
(209, 208, 12, 'Kabupaten', 'Kubu Raya', '78311', 1640231545, 1640231545),
(210, 209, 10, 'Kabupaten', 'Kudus', '59311', 1640231545, 1640231545),
(211, 210, 5, 'Kabupaten', 'Kulon Progo', '55611', 1640231545, 1640231545),
(212, 211, 9, 'Kabupaten', 'Kuningan', '45511', 1640231545, 1640231545),
(213, 212, 23, 'Kabupaten', 'Kupang', '85362', 1640231546, 1640231546),
(214, 213, 23, 'Kota', 'Kupang', '85119', 1640231546, 1640231546),
(215, 214, 15, 'Kabupaten', 'Kutai Barat', '75711', 1640231546, 1640231546),
(216, 215, 15, 'Kabupaten', 'Kutai Kartanegara', '75511', 1640231546, 1640231546),
(217, 216, 15, 'Kabupaten', 'Kutai Timur', '75611', 1640231546, 1640231546),
(218, 217, 34, 'Kabupaten', 'Labuhan Batu', '21412', 1640231546, 1640231546),
(219, 218, 34, 'Kabupaten', 'Labuhan Batu Selatan', '21511', 1640231546, 1640231546),
(220, 219, 34, 'Kabupaten', 'Labuhan Batu Utara', '21711', 1640231546, 1640231546),
(221, 220, 33, 'Kabupaten', 'Lahat', '31419', 1640231546, 1640231546),
(222, 221, 14, 'Kabupaten', 'Lamandau', '74611', 1640231546, 1640231546),
(223, 222, 11, 'Kabupaten', 'Lamongan', '64125', 1640231546, 1640231546),
(224, 223, 18, 'Kabupaten', 'Lampung Barat', '34814', 1640231546, 1640231546),
(225, 224, 18, 'Kabupaten', 'Lampung Selatan', '35511', 1640231546, 1640231546),
(226, 225, 18, 'Kabupaten', 'Lampung Tengah', '34212', 1640231546, 1640231546),
(227, 226, 18, 'Kabupaten', 'Lampung Timur', '34319', 1640231546, 1640231546),
(228, 227, 18, 'Kabupaten', 'Lampung Utara', '34516', 1640231546, 1640231546),
(229, 228, 12, 'Kabupaten', 'Landak', '78319', 1640231546, 1640231546),
(230, 229, 34, 'Kabupaten', 'Langkat', '20811', 1640231546, 1640231546),
(231, 230, 21, 'Kota', 'Langsa', '24412', 1640231546, 1640231546),
(232, 231, 24, 'Kabupaten', 'Lanny Jaya', '99531', 1640231546, 1640231546),
(233, 232, 3, 'Kabupaten', 'Lebak', '42319', 1640231546, 1640231546),
(234, 233, 4, 'Kabupaten', 'Lebong', '39264', 1640231546, 1640231546),
(235, 234, 23, 'Kabupaten', 'Lembata', '86611', 1640231546, 1640231546),
(236, 235, 21, 'Kota', 'Lhokseumawe', '24352', 1640231546, 1640231546),
(237, 236, 32, 'Kabupaten', 'Lima Puluh Koto/Kota', '26671', 1640231546, 1640231546),
(238, 237, 17, 'Kabupaten', 'Lingga', '29811', 1640231546, 1640231546),
(239, 238, 22, 'Kabupaten', 'Lombok Barat', '83311', 1640231546, 1640231546),
(240, 239, 22, 'Kabupaten', 'Lombok Tengah', '83511', 1640231546, 1640231546),
(241, 240, 22, 'Kabupaten', 'Lombok Timur', '83612', 1640231546, 1640231546),
(242, 241, 22, 'Kabupaten', 'Lombok Utara', '83711', 1640231546, 1640231546),
(243, 242, 33, 'Kota', 'Lubuk Linggau', '31614', 1640231546, 1640231546),
(244, 243, 11, 'Kabupaten', 'Lumajang', '67319', 1640231546, 1640231546),
(245, 244, 28, 'Kabupaten', 'Luwu', '91994', 1640231546, 1640231546),
(246, 245, 28, 'Kabupaten', 'Luwu Timur', '92981', 1640231546, 1640231546),
(247, 246, 28, 'Kabupaten', 'Luwu Utara', '92911', 1640231546, 1640231546),
(248, 247, 11, 'Kabupaten', 'Madiun', '63153', 1640231546, 1640231546),
(249, 248, 11, 'Kota', 'Madiun', '63122', 1640231546, 1640231546),
(250, 249, 10, 'Kabupaten', 'Magelang', '56519', 1640231546, 1640231546),
(251, 250, 10, 'Kota', 'Magelang', '56133', 1640231546, 1640231546),
(252, 251, 11, 'Kabupaten', 'Magetan', '63314', 1640231546, 1640231546),
(253, 252, 9, 'Kabupaten', 'Majalengka', '45412', 1640231546, 1640231546),
(254, 253, 27, 'Kabupaten', 'Majene', '91411', 1640231546, 1640231546),
(255, 254, 28, 'Kota', 'Makassar', '90111', 1640231546, 1640231546),
(256, 255, 11, 'Kabupaten', 'Malang', '65163', 1640231546, 1640231546),
(257, 256, 11, 'Kota', 'Malang', '65112', 1640231546, 1640231546),
(258, 257, 16, 'Kabupaten', 'Malinau', '77511', 1640231546, 1640231546),
(259, 258, 19, 'Kabupaten', 'Maluku Barat Daya', '97451', 1640231546, 1640231546),
(260, 259, 19, 'Kabupaten', 'Maluku Tengah', '97513', 1640231546, 1640231546),
(261, 260, 19, 'Kabupaten', 'Maluku Tenggara', '97651', 1640231546, 1640231546),
(262, 261, 19, 'Kabupaten', 'Maluku Tenggara Barat', '97465', 1640231546, 1640231546),
(263, 262, 27, 'Kabupaten', 'Mamasa', '91362', 1640231546, 1640231546),
(264, 263, 24, 'Kabupaten', 'Mamberamo Raya', '99381', 1640231546, 1640231546),
(265, 264, 24, 'Kabupaten', 'Mamberamo Tengah', '99553', 1640231546, 1640231546),
(266, 265, 27, 'Kabupaten', 'Mamuju', '91519', 1640231546, 1640231546),
(267, 266, 27, 'Kabupaten', 'Mamuju Utara', '91571', 1640231546, 1640231546),
(268, 267, 31, 'Kota', 'Manado', '95247', 1640231546, 1640231546),
(269, 268, 34, 'Kabupaten', 'Mandailing Natal', '22916', 1640231546, 1640231546),
(270, 269, 23, 'Kabupaten', 'Manggarai', '86551', 1640231546, 1640231546),
(271, 270, 23, 'Kabupaten', 'Manggarai Barat', '86711', 1640231546, 1640231546),
(272, 271, 23, 'Kabupaten', 'Manggarai Timur', '86811', 1640231546, 1640231546),
(273, 272, 25, 'Kabupaten', 'Manokwari', '98311', 1640231546, 1640231546),
(274, 273, 25, 'Kabupaten', 'Manokwari Selatan', '98355', 1640231546, 1640231546),
(275, 274, 24, 'Kabupaten', 'Mappi', '99853', 1640231546, 1640231546),
(276, 275, 28, 'Kabupaten', 'Maros', '90511', 1640231546, 1640231546),
(277, 276, 22, 'Kota', 'Mataram', '83131', 1640231546, 1640231546),
(278, 277, 25, 'Kabupaten', 'Maybrat', '98051', 1640231546, 1640231546),
(279, 278, 34, 'Kota', 'Medan', '20228', 1640231546, 1640231546),
(280, 279, 12, 'Kabupaten', 'Melawi', '78619', 1640231546, 1640231546),
(281, 280, 8, 'Kabupaten', 'Merangin', '37319', 1640231546, 1640231546),
(282, 281, 24, 'Kabupaten', 'Merauke', '99613', 1640231546, 1640231546),
(283, 282, 18, 'Kabupaten', 'Mesuji', '34911', 1640231546, 1640231546),
(284, 283, 18, 'Kota', 'Metro', '34111', 1640231546, 1640231546),
(285, 284, 24, 'Kabupaten', 'Mimika', '99962', 1640231546, 1640231546),
(286, 285, 31, 'Kabupaten', 'Minahasa', '95614', 1640231546, 1640231546),
(287, 286, 31, 'Kabupaten', 'Minahasa Selatan', '95914', 1640231546, 1640231546),
(288, 287, 31, 'Kabupaten', 'Minahasa Tenggara', '95995', 1640231546, 1640231546),
(289, 288, 31, 'Kabupaten', 'Minahasa Utara', '95316', 1640231546, 1640231546),
(290, 289, 11, 'Kabupaten', 'Mojokerto', '61382', 1640231546, 1640231546),
(291, 290, 11, 'Kota', 'Mojokerto', '61316', 1640231546, 1640231546),
(292, 291, 29, 'Kabupaten', 'Morowali', '94911', 1640231546, 1640231546),
(293, 292, 33, 'Kabupaten', 'Muara Enim', '31315', 1640231546, 1640231546),
(294, 293, 8, 'Kabupaten', 'Muaro Jambi', '36311', 1640231546, 1640231546),
(295, 294, 4, 'Kabupaten', 'Muko Muko', '38715', 1640231546, 1640231546),
(296, 295, 30, 'Kabupaten', 'Muna', '93611', 1640231546, 1640231546),
(297, 296, 14, 'Kabupaten', 'Murung Raya', '73911', 1640231546, 1640231546),
(298, 297, 33, 'Kabupaten', 'Musi Banyuasin', '30719', 1640231546, 1640231546),
(299, 298, 33, 'Kabupaten', 'Musi Rawas', '31661', 1640231546, 1640231546),
(300, 299, 24, 'Kabupaten', 'Nabire', '98816', 1640231546, 1640231546),
(301, 300, 21, 'Kabupaten', 'Nagan Raya', '23674', 1640231546, 1640231546),
(302, 301, 23, 'Kabupaten', 'Nagekeo', '86911', 1640231546, 1640231546),
(303, 302, 17, 'Kabupaten', 'Natuna', '29711', 1640231546, 1640231546),
(304, 303, 24, 'Kabupaten', 'Nduga', '99541', 1640231546, 1640231546),
(305, 304, 23, 'Kabupaten', 'Ngada', '86413', 1640231546, 1640231546),
(306, 305, 11, 'Kabupaten', 'Nganjuk', '64414', 1640231546, 1640231546),
(307, 306, 11, 'Kabupaten', 'Ngawi', '63219', 1640231546, 1640231546),
(308, 307, 34, 'Kabupaten', 'Nias', '22876', 1640231546, 1640231546),
(309, 308, 34, 'Kabupaten', 'Nias Barat', '22895', 1640231546, 1640231546),
(310, 309, 34, 'Kabupaten', 'Nias Selatan', '22865', 1640231546, 1640231546),
(311, 310, 34, 'Kabupaten', 'Nias Utara', '22856', 1640231546, 1640231546),
(312, 311, 16, 'Kabupaten', 'Nunukan', '77421', 1640231546, 1640231546),
(313, 312, 33, 'Kabupaten', 'Ogan Ilir', '30811', 1640231546, 1640231546),
(314, 313, 33, 'Kabupaten', 'Ogan Komering Ilir', '30618', 1640231546, 1640231546),
(315, 314, 33, 'Kabupaten', 'Ogan Komering Ulu', '32112', 1640231546, 1640231546),
(316, 315, 33, 'Kabupaten', 'Ogan Komering Ulu Selatan', '32211', 1640231546, 1640231546),
(317, 316, 33, 'Kabupaten', 'Ogan Komering Ulu Timur', '32312', 1640231546, 1640231546),
(318, 317, 11, 'Kabupaten', 'Pacitan', '63512', 1640231546, 1640231546),
(319, 318, 32, 'Kota', 'Padang', '25112', 1640231546, 1640231546),
(320, 319, 34, 'Kabupaten', 'Padang Lawas', '22763', 1640231546, 1640231546),
(321, 320, 34, 'Kabupaten', 'Padang Lawas Utara', '22753', 1640231546, 1640231546),
(322, 321, 32, 'Kota', 'Padang Panjang', '27122', 1640231546, 1640231546),
(323, 322, 32, 'Kabupaten', 'Padang Pariaman', '25583', 1640231546, 1640231546),
(324, 323, 34, 'Kota', 'Padang Sidempuan', '22727', 1640231546, 1640231546),
(325, 324, 33, 'Kota', 'Pagar Alam', '31512', 1640231546, 1640231546),
(326, 325, 34, 'Kabupaten', 'Pakpak Bharat', '22272', 1640231546, 1640231546),
(327, 326, 14, 'Kota', 'Palangka Raya', '73112', 1640231546, 1640231546),
(328, 327, 33, 'Kota', 'Palembang', '30111', 1640231546, 1640231546),
(329, 328, 28, 'Kota', 'Palopo', '91911', 1640231546, 1640231546),
(330, 329, 29, 'Kota', 'Palu', '94111', 1640231546, 1640231546),
(331, 330, 11, 'Kabupaten', 'Pamekasan', '69319', 1640231546, 1640231546),
(332, 331, 3, 'Kabupaten', 'Pandeglang', '42212', 1640231546, 1640231546),
(333, 332, 9, 'Kabupaten', 'Pangandaran', '46511', 1640231546, 1640231546),
(334, 333, 28, 'Kabupaten', 'Pangkajene Kepulauan', '90611', 1640231546, 1640231546),
(335, 334, 2, 'Kota', 'Pangkal Pinang', '33115', 1640231546, 1640231546),
(336, 335, 24, 'Kabupaten', 'Paniai', '98765', 1640231546, 1640231546),
(337, 336, 28, 'Kota', 'Parepare', '91123', 1640231546, 1640231546),
(338, 337, 32, 'Kota', 'Pariaman', '25511', 1640231546, 1640231546),
(339, 338, 29, 'Kabupaten', 'Parigi Moutong', '94411', 1640231546, 1640231546),
(340, 339, 32, 'Kabupaten', 'Pasaman', '26318', 1640231546, 1640231546),
(341, 340, 32, 'Kabupaten', 'Pasaman Barat', '26511', 1640231546, 1640231546),
(342, 341, 15, 'Kabupaten', 'Paser', '76211', 1640231546, 1640231546),
(343, 342, 11, 'Kabupaten', 'Pasuruan', '67153', 1640231546, 1640231546),
(344, 343, 11, 'Kota', 'Pasuruan', '67118', 1640231546, 1640231546),
(345, 344, 10, 'Kabupaten', 'Pati', '59114', 1640231546, 1640231546),
(346, 345, 32, 'Kota', 'Payakumbuh', '26213', 1640231546, 1640231546),
(347, 346, 25, 'Kabupaten', 'Pegunungan Arfak', '98354', 1640231546, 1640231546),
(348, 347, 24, 'Kabupaten', 'Pegunungan Bintang', '99573', 1640231546, 1640231546),
(349, 348, 10, 'Kabupaten', 'Pekalongan', '51161', 1640231546, 1640231546),
(350, 349, 10, 'Kota', 'Pekalongan', '51122', 1640231546, 1640231546),
(351, 350, 26, 'Kota', 'Pekanbaru', '28112', 1640231546, 1640231546),
(352, 351, 26, 'Kabupaten', 'Pelalawan', '28311', 1640231546, 1640231546),
(353, 352, 10, 'Kabupaten', 'Pemalang', '52319', 1640231546, 1640231546),
(354, 353, 34, 'Kota', 'Pematang Siantar', '21126', 1640231546, 1640231546),
(355, 354, 15, 'Kabupaten', 'Penajam Paser Utara', '76311', 1640231546, 1640231546),
(356, 355, 18, 'Kabupaten', 'Pesawaran', '35312', 1640231546, 1640231546),
(357, 356, 18, 'Kabupaten', 'Pesisir Barat', '35974', 1640231546, 1640231546),
(358, 357, 32, 'Kabupaten', 'Pesisir Selatan', '25611', 1640231546, 1640231546),
(359, 358, 21, 'Kabupaten', 'Pidie', '24116', 1640231546, 1640231546),
(360, 359, 21, 'Kabupaten', 'Pidie Jaya', '24186', 1640231546, 1640231546),
(361, 360, 28, 'Kabupaten', 'Pinrang', '91251', 1640231546, 1640231546),
(362, 361, 7, 'Kabupaten', 'Pohuwato', '96419', 1640231546, 1640231546),
(363, 362, 27, 'Kabupaten', 'Polewali Mandar', '91311', 1640231546, 1640231546),
(364, 363, 11, 'Kabupaten', 'Ponorogo', '63411', 1640231546, 1640231546),
(365, 364, 12, 'Kabupaten', 'Pontianak', '78971', 1640231546, 1640231546),
(366, 365, 12, 'Kota', 'Pontianak', '78112', 1640231546, 1640231546),
(367, 366, 29, 'Kabupaten', 'Poso', '94615', 1640231546, 1640231546),
(368, 367, 33, 'Kota', 'Prabumulih', '31121', 1640231546, 1640231546),
(369, 368, 18, 'Kabupaten', 'Pringsewu', '35719', 1640231546, 1640231546),
(370, 369, 11, 'Kabupaten', 'Probolinggo', '67282', 1640231546, 1640231546),
(371, 370, 11, 'Kota', 'Probolinggo', '67215', 1640231546, 1640231546),
(372, 371, 14, 'Kabupaten', 'Pulang Pisau', '74811', 1640231546, 1640231546),
(373, 372, 20, 'Kabupaten', 'Pulau Morotai', '97771', 1640231546, 1640231546),
(374, 373, 24, 'Kabupaten', 'Puncak', '98981', 1640231546, 1640231546),
(375, 374, 24, 'Kabupaten', 'Puncak Jaya', '98979', 1640231546, 1640231546),
(376, 375, 10, 'Kabupaten', 'Purbalingga', '53312', 1640231546, 1640231546),
(377, 376, 9, 'Kabupaten', 'Purwakarta', '41119', 1640231546, 1640231546),
(378, 377, 10, 'Kabupaten', 'Purworejo', '54111', 1640231546, 1640231546),
(379, 378, 25, 'Kabupaten', 'Raja Ampat', '98489', 1640231546, 1640231546),
(380, 379, 4, 'Kabupaten', 'Rejang Lebong', '39112', 1640231546, 1640231546),
(381, 380, 10, 'Kabupaten', 'Rembang', '59219', 1640231546, 1640231546),
(382, 381, 26, 'Kabupaten', 'Rokan Hilir', '28992', 1640231546, 1640231546),
(383, 382, 26, 'Kabupaten', 'Rokan Hulu', '28511', 1640231546, 1640231546),
(384, 383, 23, 'Kabupaten', 'Rote Ndao', '85982', 1640231546, 1640231546),
(385, 384, 21, 'Kota', 'Sabang', '23512', 1640231546, 1640231546),
(386, 385, 23, 'Kabupaten', 'Sabu Raijua', '85391', 1640231546, 1640231546),
(387, 386, 10, 'Kota', 'Salatiga', '50711', 1640231546, 1640231546),
(388, 387, 15, 'Kota', 'Samarinda', '75133', 1640231546, 1640231546),
(389, 388, 12, 'Kabupaten', 'Sambas', '79453', 1640231546, 1640231546),
(390, 389, 34, 'Kabupaten', 'Samosir', '22392', 1640231546, 1640231546),
(391, 390, 11, 'Kabupaten', 'Sampang', '69219', 1640231546, 1640231546),
(392, 391, 12, 'Kabupaten', 'Sanggau', '78557', 1640231546, 1640231546),
(393, 392, 24, 'Kabupaten', 'Sarmi', '99373', 1640231546, 1640231546),
(394, 393, 8, 'Kabupaten', 'Sarolangun', '37419', 1640231546, 1640231546),
(395, 394, 32, 'Kota', 'Sawah Lunto', '27416', 1640231546, 1640231546),
(396, 395, 12, 'Kabupaten', 'Sekadau', '79583', 1640231546, 1640231546),
(397, 396, 28, 'Kabupaten', 'Selayar (Kepulauan Selayar)', '92812', 1640231546, 1640231546),
(398, 397, 4, 'Kabupaten', 'Seluma', '38811', 1640231546, 1640231546),
(399, 398, 10, 'Kabupaten', 'Semarang', '50511', 1640231546, 1640231546),
(400, 399, 10, 'Kota', 'Semarang', '50135', 1640231546, 1640231546),
(401, 400, 19, 'Kabupaten', 'Seram Bagian Barat', '97561', 1640231546, 1640231546),
(402, 401, 19, 'Kabupaten', 'Seram Bagian Timur', '97581', 1640231546, 1640231546),
(403, 402, 3, 'Kabupaten', 'Serang', '42182', 1640231546, 1640231546),
(404, 403, 3, 'Kota', 'Serang', '42111', 1640231546, 1640231546),
(405, 404, 34, 'Kabupaten', 'Serdang Bedagai', '20915', 1640231546, 1640231546),
(406, 405, 14, 'Kabupaten', 'Seruyan', '74211', 1640231546, 1640231546),
(407, 406, 26, 'Kabupaten', 'Siak', '28623', 1640231546, 1640231546),
(408, 407, 34, 'Kota', 'Sibolga', '22522', 1640231546, 1640231546),
(409, 408, 28, 'Kabupaten', 'Sidenreng Rappang/Rapang', '91613', 1640231546, 1640231546),
(410, 409, 11, 'Kabupaten', 'Sidoarjo', '61219', 1640231546, 1640231546),
(411, 410, 29, 'Kabupaten', 'Sigi', '94364', 1640231546, 1640231546),
(412, 411, 32, 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', '27511', 1640231546, 1640231546),
(413, 412, 23, 'Kabupaten', 'Sikka', '86121', 1640231546, 1640231546),
(414, 413, 34, 'Kabupaten', 'Simalungun', '21162', 1640231546, 1640231546),
(415, 414, 21, 'Kabupaten', 'Simeulue', '23891', 1640231546, 1640231546),
(416, 415, 12, 'Kota', 'Singkawang', '79117', 1640231546, 1640231546),
(417, 416, 28, 'Kabupaten', 'Sinjai', '92615', 1640231546, 1640231546),
(418, 417, 12, 'Kabupaten', 'Sintang', '78619', 1640231546, 1640231546),
(419, 418, 11, 'Kabupaten', 'Situbondo', '68316', 1640231546, 1640231546),
(420, 419, 5, 'Kabupaten', 'Sleman', '55513', 1640231546, 1640231546),
(421, 420, 32, 'Kabupaten', 'Solok', '27365', 1640231546, 1640231546),
(422, 421, 32, 'Kota', 'Solok', '27315', 1640231546, 1640231546),
(423, 422, 32, 'Kabupaten', 'Solok Selatan', '27779', 1640231546, 1640231546),
(424, 423, 28, 'Kabupaten', 'Soppeng', '90812', 1640231546, 1640231546),
(425, 424, 25, 'Kabupaten', 'Sorong', '98431', 1640231546, 1640231546),
(426, 425, 25, 'Kota', 'Sorong', '98411', 1640231546, 1640231546),
(427, 426, 25, 'Kabupaten', 'Sorong Selatan', '98454', 1640231546, 1640231546),
(428, 427, 10, 'Kabupaten', 'Sragen', '57211', 1640231546, 1640231546),
(429, 428, 9, 'Kabupaten', 'Subang', '41215', 1640231546, 1640231546),
(430, 429, 21, 'Kota', 'Subulussalam', '24882', 1640231546, 1640231546),
(431, 430, 9, 'Kabupaten', 'Sukabumi', '43311', 1640231546, 1640231546),
(432, 431, 9, 'Kota', 'Sukabumi', '43114', 1640231546, 1640231546),
(433, 432, 14, 'Kabupaten', 'Sukamara', '74712', 1640231546, 1640231546),
(434, 433, 10, 'Kabupaten', 'Sukoharjo', '57514', 1640231546, 1640231546),
(435, 434, 23, 'Kabupaten', 'Sumba Barat', '87219', 1640231546, 1640231546),
(436, 435, 23, 'Kabupaten', 'Sumba Barat Daya', '87453', 1640231546, 1640231546),
(437, 436, 23, 'Kabupaten', 'Sumba Tengah', '87358', 1640231546, 1640231546),
(438, 437, 23, 'Kabupaten', 'Sumba Timur', '87112', 1640231546, 1640231546),
(439, 438, 22, 'Kabupaten', 'Sumbawa', '84315', 1640231546, 1640231546),
(440, 439, 22, 'Kabupaten', 'Sumbawa Barat', '84419', 1640231546, 1640231546),
(441, 440, 9, 'Kabupaten', 'Sumedang', '45326', 1640231546, 1640231546),
(442, 441, 11, 'Kabupaten', 'Sumenep', '69413', 1640231546, 1640231546),
(443, 442, 8, 'Kota', 'Sungaipenuh', '37113', 1640231546, 1640231546),
(444, 443, 24, 'Kabupaten', 'Supiori', '98164', 1640231546, 1640231546),
(445, 444, 11, 'Kota', 'Surabaya', '60119', 1640231546, 1640231546),
(446, 445, 10, 'Kota', 'Surakarta (Solo)', '57113', 1640231546, 1640231546),
(447, 446, 13, 'Kabupaten', 'Tabalong', '71513', 1640231546, 1640231546),
(448, 447, 1, 'Kabupaten', 'Tabanan', '82119', 1640231546, 1640231546),
(449, 448, 28, 'Kabupaten', 'Takalar', '92212', 1640231546, 1640231546),
(450, 449, 25, 'Kabupaten', 'Tambrauw', '98475', 1640231546, 1640231546),
(451, 450, 16, 'Kabupaten', 'Tana Tidung', '77611', 1640231546, 1640231546),
(452, 451, 28, 'Kabupaten', 'Tana Toraja', '91819', 1640231546, 1640231546),
(453, 452, 13, 'Kabupaten', 'Tanah Bumbu', '72211', 1640231546, 1640231546),
(454, 453, 32, 'Kabupaten', 'Tanah Datar', '27211', 1640231546, 1640231546),
(455, 454, 13, 'Kabupaten', 'Tanah Laut', '70811', 1640231546, 1640231546),
(456, 455, 3, 'Kabupaten', 'Tangerang', '15914', 1640231546, 1640231546),
(457, 456, 3, 'Kota', 'Tangerang', '15111', 1640231546, 1640231546),
(458, 457, 3, 'Kota', 'Tangerang Selatan', '15435', 1640231546, 1640231546),
(459, 458, 18, 'Kabupaten', 'Tanggamus', '35619', 1640231546, 1640231546),
(460, 459, 34, 'Kota', 'Tanjung Balai', '21321', 1640231546, 1640231546),
(461, 460, 8, 'Kabupaten', 'Tanjung Jabung Barat', '36513', 1640231546, 1640231546),
(462, 461, 8, 'Kabupaten', 'Tanjung Jabung Timur', '36719', 1640231546, 1640231546),
(463, 462, 17, 'Kota', 'Tanjung Pinang', '29111', 1640231546, 1640231546),
(464, 463, 34, 'Kabupaten', 'Tapanuli Selatan', '22742', 1640231546, 1640231546),
(465, 464, 34, 'Kabupaten', 'Tapanuli Tengah', '22611', 1640231546, 1640231546),
(466, 465, 34, 'Kabupaten', 'Tapanuli Utara', '22414', 1640231546, 1640231546),
(467, 466, 13, 'Kabupaten', 'Tapin', '71119', 1640231546, 1640231546),
(468, 467, 16, 'Kota', 'Tarakan', '77114', 1640231546, 1640231546),
(469, 468, 9, 'Kabupaten', 'Tasikmalaya', '46411', 1640231546, 1640231546),
(470, 469, 9, 'Kota', 'Tasikmalaya', '46116', 1640231546, 1640231546),
(471, 470, 34, 'Kota', 'Tebing Tinggi', '20632', 1640231546, 1640231546),
(472, 471, 8, 'Kabupaten', 'Tebo', '37519', 1640231546, 1640231546),
(473, 472, 10, 'Kabupaten', 'Tegal', '52419', 1640231546, 1640231546),
(474, 473, 10, 'Kota', 'Tegal', '52114', 1640231546, 1640231546),
(475, 474, 25, 'Kabupaten', 'Teluk Bintuni', '98551', 1640231546, 1640231546),
(476, 475, 25, 'Kabupaten', 'Teluk Wondama', '98591', 1640231546, 1640231546),
(477, 476, 10, 'Kabupaten', 'Temanggung', '56212', 1640231546, 1640231546),
(478, 477, 20, 'Kota', 'Ternate', '97714', 1640231546, 1640231546),
(479, 478, 20, 'Kota', 'Tidore Kepulauan', '97815', 1640231546, 1640231546),
(480, 479, 23, 'Kabupaten', 'Timor Tengah Selatan', '85562', 1640231546, 1640231546),
(481, 480, 23, 'Kabupaten', 'Timor Tengah Utara', '85612', 1640231546, 1640231546),
(482, 481, 34, 'Kabupaten', 'Toba Samosir', '22316', 1640231546, 1640231546),
(483, 482, 29, 'Kabupaten', 'Tojo Una-Una', '94683', 1640231546, 1640231546),
(484, 483, 29, 'Kabupaten', 'Toli-Toli', '94542', 1640231546, 1640231546),
(485, 484, 24, 'Kabupaten', 'Tolikara', '99411', 1640231546, 1640231546),
(486, 485, 31, 'Kota', 'Tomohon', '95416', 1640231546, 1640231546),
(487, 486, 28, 'Kabupaten', 'Toraja Utara', '91831', 1640231546, 1640231546),
(488, 487, 11, 'Kabupaten', 'Trenggalek', '66312', 1640231546, 1640231546),
(489, 488, 19, 'Kota', 'Tual', '97612', 1640231546, 1640231546),
(490, 489, 11, 'Kabupaten', 'Tuban', '62319', 1640231546, 1640231546),
(491, 490, 18, 'Kabupaten', 'Tulang Bawang', '34613', 1640231546, 1640231546),
(492, 491, 18, 'Kabupaten', 'Tulang Bawang Barat', '34419', 1640231546, 1640231546),
(493, 492, 11, 'Kabupaten', 'Tulungagung', '66212', 1640231546, 1640231546),
(494, 493, 28, 'Kabupaten', 'Wajo', '90911', 1640231546, 1640231546),
(495, 494, 30, 'Kabupaten', 'Wakatobi', '93791', 1640231546, 1640231546),
(496, 495, 24, 'Kabupaten', 'Waropen', '98269', 1640231546, 1640231546),
(497, 496, 18, 'Kabupaten', 'Way Kanan', '34711', 1640231546, 1640231546),
(498, 497, 10, 'Kabupaten', 'Wonogiri', '57619', 1640231546, 1640231546),
(499, 498, 10, 'Kabupaten', 'Wonosobo', '56311', 1640231546, 1640231546),
(500, 499, 24, 'Kabupaten', 'Yahukimo', '99041', 1640231546, 1640231546),
(501, 500, 24, 'Kabupaten', 'Yalimo', '99481', 1640231546, 1640231546),
(502, 501, 5, 'Kota', 'Yogyakarta', '55111', 1640231546, 1640231546);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merchant`
--

CREATE TABLE `tbl_merchant` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fasapay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_handphone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_merchant`
--

INSERT INTO `tbl_merchant` (`id`, `nama`, `id_fasapay`, `slug`, `email`, `no_handphone`, `alamat`, `kota`, `provinsi`, `kode_pos`, `created_at`, `updated_at`) VALUES
(3, 'tokoku', 'TR2245', 'tokoku', 'andri.rizki007@gmail.com', '082322525083', 'Bandung', '39', '5', 55165, 1640231615, 1640231615),
(4, 'Oseng Mercon Bu Narti', 'TR2244', 'oseng-mercon-bu-narti', 'andri.rizki007@gmail.com', '082322525083', 'Bandung', '39', '5', 55165, 1640231714, 1640231714);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1640226817),
('m130524_201442_init', 1640226824),
('m190124_110200_add_verification_token_column_to_user_table', 1640226824),
('m201105_025500_create_tableDataPemesan', 1640226824),
('m201105_025935_create_tableKota', 1640226824),
('m201105_030105_create_tableProvinsi', 1640226824),
('m201105_030211_create_tableOrder', 1640226824),
('m201105_031309_create_tableBillNumber', 1640226824),
('m201105_031441_create_tableMerchant', 1640226824),
('m201105_031725_create_tableProduk', 1640226824),
('m201105_032100_create_tableGambarProduk', 1640226824),
('m201105_095048_table_rbac', 1640226824),
('m201105_095249_add_role_rbac', 1640226824),
('m201105_100003_add_produk_rbac', 1640226824),
('m201106_032216_add_updated_by_tbl_order', 1640226824),
('m201106_035228_addColumnSlug_inTableMerchant', 1640226824),
('m201106_050239_tbl_filename', 1640226824),
('m201106_065416_editNullColumnTotalPembayaran_TableOrder', 1640226824),
('m201106_070702_editTypeAgenPengiriman_tableOrder', 1640226824),
('m201106_072820_add_status_in_tbl_gambar_produk', 1640226824),
('m201106_073125_add_gambar_produk_rbac', 1640226824),
('m201106_090737_add_rbac_produk_image', 1640226824),
('m201106_092151_add_rbac_order', 1640226824),
('m201106_092539_add_rbac_merchant', 1640226824),
('m201106_092803_add_rbac_data_pemesan', 1640226824),
('m201106_092938_add_rbac_admin', 1640226824),
('m201106_093056_add_rbac_access', 1640226824),
('m201109_041909_addRbacMerchantListKota', 1640226824),
('m201109_045957_editNullUpdateBy_tableOrder', 1640226824),
('m201109_072412_add_gambar_produk_change_status_rbac', 1640226824),
('m201109_075252_add_status_tbl_produk', 1640226824),
('m201109_092000_add_produk_change_status_rbac', 1640226824),
('m201124_093721_userAdmin', 1640226826),
('m201124_094648_setAdminRbac', 1640226826),
('m201125_021300_editTypeKodepos_tableDataPemesan', 1640226826),
('m201125_021727_editTypeKodepos_tableKota', 1640226826),
('m201125_025256_addColumnKecamatan_tableDataPemesan', 1640226826),
('m201125_025917_create_tableKecamatan', 1640226826),
('m201207_034045_add_column_nama_in_table_user', 1640226826),
('m201207_042451_add_rbac_reset_password_admin', 1640226826),
('m201207_062842_add_column_id_fasapay_tbl_merchant', 1640226826),
('m201210_035020_add_rbac_send_email_order', 1640226826);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `id_datapemesan` int(11) NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agen_pengiriman` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ongkir` decimal(10,0) DEFAULT NULL,
  `total_belanja` decimal(10,0) NOT NULL COMMENT 'total harga belanja sebelum diskon',
  `batchnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diskon` decimal(10,0) DEFAULT NULL,
  `total_pembayaran` decimal(10,0) DEFAULT NULL COMMENT 'total harga yang dibayarkan setelah diskon',
  `bill_number` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_resi_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga_asli` decimal(10,0) DEFAULT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 10,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE `tbl_provinsi` (
  `id` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id`, `id_provinsi`, `nama_provinsi`, `created_at`, `updated_at`) VALUES
(2, 1, 'Bali', 1640231522, 1640231522),
(3, 2, 'Bangka Belitung', 1640231522, 1640231522),
(4, 3, 'Banten', 1640231522, 1640231522),
(5, 4, 'Bengkulu', 1640231522, 1640231522),
(6, 5, 'DI Yogyakarta', 1640231522, 1640231522),
(7, 6, 'DKI Jakarta', 1640231522, 1640231522),
(8, 7, 'Gorontalo', 1640231522, 1640231522),
(9, 8, 'Jambi', 1640231522, 1640231522),
(10, 9, 'Jawa Barat', 1640231522, 1640231522),
(11, 10, 'Jawa Tengah', 1640231522, 1640231522),
(12, 11, 'Jawa Timur', 1640231522, 1640231522),
(13, 12, 'Kalimantan Barat', 1640231522, 1640231522),
(14, 13, 'Kalimantan Selatan', 1640231522, 1640231522),
(15, 14, 'Kalimantan Tengah', 1640231522, 1640231522),
(16, 15, 'Kalimantan Timur', 1640231522, 1640231522),
(17, 16, 'Kalimantan Utara', 1640231522, 1640231522),
(18, 17, 'Kepulauan Riau', 1640231522, 1640231522),
(19, 18, 'Lampung', 1640231522, 1640231522),
(20, 19, 'Maluku', 1640231522, 1640231522),
(21, 20, 'Maluku Utara', 1640231522, 1640231522),
(22, 21, 'Nanggroe Aceh Darussalam (NAD)', 1640231522, 1640231522),
(23, 22, 'Nusa Tenggara Barat (NTB)', 1640231522, 1640231522),
(24, 23, 'Nusa Tenggara Timur (NTT)', 1640231523, 1640231523),
(25, 24, 'Papua', 1640231523, 1640231523),
(26, 25, 'Papua Barat', 1640231523, 1640231523),
(27, 26, 'Riau', 1640231523, 1640231523),
(28, 27, 'Sulawesi Barat', 1640231523, 1640231523),
(29, 28, 'Sulawesi Selatan', 1640231523, 1640231523),
(30, 29, 'Sulawesi Tengah', 1640231523, 1640231523),
(31, 30, 'Sulawesi Tenggara', 1640231523, 1640231523),
(32, 31, 'Sulawesi Utara', 1640231523, 1640231523),
(33, 32, 'Sumatera Barat', 1640231523, 1640231523),
(34, 33, 'Sumatera Selatan', 1640231523, 1640231523),
(35, 34, 'Sumatera Utara', 1640231523, 1640231523);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `nama`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'superadmin', NULL, 'NDWIiIO9Hzbh4E4LTscYM1R9PrYDV7ld', '$2y$13$a1nUuKfUV9K0j1kSmE9.2.t294BGaGlMtDMT87LXSdO9mMO88fize', NULL, 'programmer@fasapay.co.id', 10, 1640226825, 1640226825, NULL),
(2, 'admin1', NULL, 'ZxYCIyqMmGqRHBYgPC02x8-5H8NaSt3G', '$2y$13$pKoOvioz6hfKXZtgGmKkDO/KUQ6N3WuC280oVJXkayqBvBkxVzq52', NULL, 'donnaokta@fasapay.co.id', 10, 1640226825, 1640226825, NULL),
(3, 'admin2', NULL, 'sGrFoB-nlsHr4KE97TP5mUdJrJceZog6', '$2y$13$7YdrIxTKR7FJoIIcQzymfe0XjxZnlqeCj3RXgr6wTg3F./J1f/x.6', NULL, 'marketing@fasapay.co.id', 10, 1640226826, 1640226826, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auth_assignment`
--
ALTER TABLE `tbl_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `tbl_idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `tbl_auth_item`
--
ALTER TABLE `tbl_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `tbl_idx-auth_item-type` (`type`);

--
-- Indexes for table `tbl_auth_item_child`
--
ALTER TABLE `tbl_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `tbl_auth_rule`
--
ALTER TABLE `tbl_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `tbl_bill_number`
--
ALTER TABLE `tbl_bill_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_pemesan`
--
ALTER TABLE `tbl_data_pemesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_filename`
--
ALTER TABLE `tbl_filename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gambar_produk`
--
ALTER TABLE `tbl_gambar_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_merchant`
--
ALTER TABLE `tbl_merchant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bill_number`
--
ALTER TABLE `tbl_bill_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_data_pemesan`
--
ALTER TABLE `tbl_data_pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_filename`
--
ALTER TABLE `tbl_filename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gambar_produk`
--
ALTER TABLE `tbl_gambar_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `tbl_merchant`
--
ALTER TABLE `tbl_merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_auth_assignment`
--
ALTER TABLE `tbl_auth_assignment`
  ADD CONSTRAINT `tbl_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_auth_item`
--
ALTER TABLE `tbl_auth_item`
  ADD CONSTRAINT `tbl_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `tbl_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_auth_item_child`
--
ALTER TABLE `tbl_auth_item_child`
  ADD CONSTRAINT `tbl_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
