/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 10.4.22-MariaDB : Database - tokoku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tokoku` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tokoku`;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `is_delete` enum('0','1') DEFAULT '1' COMMENT '0. Delete, 1.Aktif',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`kategori_id`,`nama_kategori`,`is_delete`,`created_by`,`created_at`,`updated_at`) values 
(1,'Baju','0',1,1638761351,1638864240),
(2,'Celana Js','0',1,1638761351,1638864207),
(3,'Kaos','0',1,1638863147,1638864240),
(4,'Makanan','1',1,1638864644,1638864644),
(5,'Barang','1',1,1638864868,1638864868),
(6,'Alat Tulis','1',1,1638864945,1638864945),
(19,'Perlengkapan Rumah','1',1,1639034933,1639034933),
(20,'Peralatan Dapur','1',1,1639967379,1639967379);

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_id` varchar(11) DEFAULT NULL,
  `pembayaran_id` varchar(11) DEFAULT NULL,
  `transaksi_id` varchar(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `is_selected` enum('0','1') NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`keranjang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4;

/*Data for the table `keranjang` */

insert  into `keranjang`(`keranjang_id`,`produk_id`,`pembayaran_id`,`transaksi_id`,`qty`,`harga`,`is_selected`,`created_by`,`created_at`,`updated_at`) values 
(120,'6','1','24',2,'10','1',1,1641350276,1641350277),
(128,'10','3','25',1,'10','1',1,1641358794,1641358794),
(129,'6','3','25',1,'1000','1',1,1641363377,1641363377),
(131,'6','3','26',1,'1000','1',1,1641435364,1641435364),
(139,'10','1','27',4,'10','1',1,1641450650,1641450782),
(141,'6','3','28',1,'1000','1',1,1641456189,1641456189),
(142,'10','1',NULL,3,'10','0',1,1641456237,1641457133);

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m000000_000000_base',1638712587),
('m130524_201442_init',1638712587),
('m190124_110200_add_verification_token_column_to_user_table',1638712587);

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `pembayaran` varchar(45) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `gambar` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `upadate_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`pembayaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`pembayaran_id`,`pembayaran`,`is_active`,`gambar`,`admin`,`created_by`,`created_at`,`upadate_at`) values 
(1,'FasaPay','1','fasapay.jpeg',NULL,1,1638761351,1638761351),
(2,'Tunai','0','tunai.png',NULL,1,1638761351,1638761351),
(3,'QRIS','1','qr.png',NULL,1,NULL,NULL);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` varchar(11) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `qty` varchar(11) DEFAULT NULL,
  `harga` varchar(45) NOT NULL DEFAULT '10000',
  `gambar` varchar(255) DEFAULT NULL,
  `is_delete` enum('0','1') DEFAULT '1' COMMENT '0. Delete, 1.Aktif',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`produk_id`,`kategori_id`,`nama_produk`,`qty`,`harga`,`gambar`,`is_delete`,`created_by`,`created_at`,`updated_at`) values 
(1,'2','Baju Batik','50','1000','1','0',1,1638761351,1638849567),
(6,'4','Bakso Granat','100','1000','bakso-granat-2021-12-20-04-43-10.jpg','1',1,1638864746,1639969843),
(7,'6','Pencil Warna','100','10','pencil-warna-2021-12-20-04-33-10.jpg','0',1,1638865043,1639969833),
(8,'4','Nasi Goreng','100','10','nasi-goreng-2021-12-20-04-25-09.jpg','1',1,1638865501,1639969765),
(9,'4','Nasi Goreng Gila','100','10','nasi-goreng-gila-2021-12-20-04-31-09.jpg','1',1,1638865531,1639969771),
(10,'4','Bakso Beranak','100','10','bakso-beranak-2021-12-20-04-24-10.jpg','1',1,1638865544,1639969824),
(11,'4','Bakso Merapi','100','10','bakso-merapi-2021-12-20-04-18-10.jpg','1',1,1638865564,1639969818),
(12,'4','Bakso Jumbo','100','10','bakso-jumbo-2021-12-20-04-10-10.jpg','1',1,1638866628,1639969810),
(13,'4','Bakso','100','10','bakso-2021-12-20-04-02-10.jpg','1',1,1638867427,1639969802),
(14,'4','Nasi Goreng Spesial','100','10','nasi-goreng-spesial-2021-12-20-04-14-09.jpg','1',1,1638867468,1639969754),
(15,'4','Nasi Goreng Bakso','100','10','nasi-goreng-bakso-2021-12-20-04-15-08.jpg','1',1,1638867534,1639969695),
(16,'4','Nasi Goreng Sosis','100','10','nasi-goreng-sosis-2021-12-20-04-08-09.jpg','1',1,1638867549,1639969748),
(17,'4','Nasi','100','10','nasi-2021-12-09-07:17:53.jpg','0',1,1639032797,1639032807),
(18,'5','Nasi','100','10','nasi-2021-12-09-07:04:55.jpg','0',1,1639032904,1639032947),
(19,'4','Nasi','100','10','nasi-2021-12-09-07:37:55.jpg','0',1,1639032937,1639032949),
(20,'4','Nasi','100','10','nasi-2021-12-09-08:23:25.jpg','0',1,1639034723,1639034728);

/*Table structure for table `tagihan` */

DROP TABLE IF EXISTS `tagihan`;

CREATE TABLE `tagihan` (
  `tagihan_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) DEFAULT NULL,
  `kode_tagihan` varchar(255) DEFAULT NULL,
  `status_tagihan` enum('1','2','3','4','5') DEFAULT NULL COMMENT '1. menunggu pembayaran \r\n2. menunggu konfirmasi pembayaran \r\n3. dibayar \r\n4. batal \r\n5. gagal	',
  `total_bayar` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`tagihan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tagihan` */

insert  into `tagihan`(`tagihan_id`,`transaksi_id`,`kode_tagihan`,`status_tagihan`,`total_bayar`,`bukti_bayar`,`created_by`,`created_at`,`updated_at`) values 
(15,24,'TKO84396','1','20',NULL,1,1641350295,1641350295),
(16,25,'TKO84068','1','1010',NULL,1,1641365517,1641365517),
(17,26,'TKO93382','1','1000',NULL,1,1641435372,1641435372),
(18,27,'TKO13731','1','40',NULL,1,1641456141,1641456141),
(19,28,'TKO98550','1','1000',NULL,1,1641456199,1641456199);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(255) DEFAULT NULL,
  `status_transaksi` enum('1','2','3','4','5','6','7') DEFAULT NULL COMMENT '1. menunggu pembayaran\r\n2. menunggu konfirmasi pembayaran\r\n3. dibayar\r\n4. batal\r\n5. gagal\r\n6. dikirim\r\n7. selesai',
  `harga_produk` varchar(255) DEFAULT NULL,
  `ongkir` varchar(255) DEFAULT NULL,
  `url_bayar` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`transaksi_id`,`kode_transaksi`,`status_transaksi`,`harga_produk`,`ongkir`,`url_bayar`,`qr_code`,`created_by`,`created_at`,`updated_at`) values 
(24,'TKU44333','1','20','0','https://sci.fasapay.co.id/fi632106-pasarmalam-req-189670375efaa5e1a3f4c109f1b21d8ec1',NULL,1,1641350295,1641350295),
(25,'TKU66965','1','1010','0',NULL,'qr-code-5Ld2K2WTfubbKh_ndMeIr8mBq-sajW-x.png',1,1641365517,1641365517),
(26,'TKU87782','1','1000','0',NULL,'qr-code-ogZssTB8NXhNO6AVaIA5qwro5omhMAVj.png',1,1641435372,1641435372),
(27,'TKU68936','1','40','0','https://sci.fasapay.co.id/fi632106-pasarmalam-req-257ecac043fc7da6803ca38df777e28d48',NULL,1,1641456141,1641456141),
(28,'TKU20875','1','1000','0',NULL,'qr-code-tmQ-abbXxpqoDh7xnhNlhRwoOxQIRIAh.png',1,1641456199,1641456199);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`nama`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`role`,`status`,`created_at`,`updated_at`,`verification_token`) values 
(1,'andri007','Andri Rizki Saputra','TR00k5SU--Aq_s9arsCa_tGm1WPYks1n','$2y$13$QLPo1NBu9rOLaY3zHEAQdu.Ecu7bdJ70KbogUF57eRjq8yU08YmL.',NULL,'andri.rizki007@gmail.com','1','1',1638761351,1638761351,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
