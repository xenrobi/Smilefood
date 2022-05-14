/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.14-MariaDB : Database - kantin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kantin` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `kantin`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`nama`,`level`) values (1,'admin','123','amdin','admin');

/*Table structure for table `cafe` */

DROP TABLE IF EXISTS `cafe`;

CREATE TABLE `cafe` (
  `id_cafe` int(50) NOT NULL AUTO_INCREMENT,
  `nama_cafe` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pemilik` varchar(20) DEFAULT NULL,
  `alamat` mediumtext DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cafe`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cafe` */

insert  into `cafe`(`id_cafe`,`nama_cafe`,`password`,`pemilik`,`alamat`,`notelp`,`email`,`level`) values (7,'RESTO','123','All','MVDM','12345678','resto@gmail.com','cafe'),(9,'Yummy','123','ABAGN','asdsa','12345','y@gmail.com','cafe'),(10,'Happy','123','happy','happy','12345','h@gmail.com','cafe'),(11,'Cafe abang','1234','ab','kantin','812','kantin@gmail.ocm','cafe'),(12,'cafe adek','123','All','MVDM','12345678','resto@gmail.com','cafe'),(13,'cahaya','123','All','MVDM','12345678','resto@gmail.com','cafe'),(14,'blok 2','123','All','MVDM','12345678','resto@gmail.com','cafe'),(15,'nice vege','123','All','MVDM','12345678','resto@gmail.com','cafe');

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id_keranjang` int(100) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `keranjang` */

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id_pembelian` int(50) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `ket` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `id_pembelian` (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id_pembelian`,`id_kelas`,`tanggal`,`total`,`ket`) values (20,12,'2021-03-16','220000','qdw'),(22,12,'2021-03-22','77000','asdad'),(24,12,'2021-03-22','220000','asdad'),(25,1,'2021-05-05','91000','sdad'),(27,1,'2021-05-05','220000','sdad'),(29,1,'2021-05-27','15000','asdadqwdqw'),(30,1,'2021-05-27','15000','asdqwdq'),(31,1,'2021-05-28','60000','qwdqwdqw'),(32,1,'2021-05-28','80000','qwdqwdqw'),(33,1,'2021-05-31','80000','CABE EXTRA PEDAS'),(34,1,'2021-05-31','45000','CABE EXTRA PEDAS'),(35,1,'2021-05-31','100000','mir goreng 4xtra pedas'),(36,1,'2021-05-31','150000','mir goreng 4xtra pedas'),(37,1,'2022-04-22','20000',''),(38,1,'2022-04-22','100000',''),(39,1,'2022-04-22','15000','wwdqwd'),(40,1,'2022-04-22','20000','wwdqwd'),(41,1,'2022-04-22','10000','wwdqwd');

/*Table structure for table `pembelian_detail` */

DROP TABLE IF EXISTS `pembelian_detail`;

CREATE TABLE `pembelian_detail` (
  `id_pembelianproduk` int(100) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(100) DEFAULT NULL,
  `id_produk` int(50) DEFAULT NULL,
  `jumlah` int(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pembelianproduk`),
  KEY `id_pembelianproduk` (`id_pembelianproduk`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembelian_detail` */

insert  into `pembelian_detail`(`id_pembelianproduk`,`id_pembelian`,`id_produk`,`jumlah`,`status`) values (4,4,14,2,'PROSES'),(6,6,14,1,'PROSES'),(7,7,13,1,'PROSES'),(8,8,15,1,'PROSES'),(10,10,13,1,'SUDAH DI TERIMA DI KANTIN'),(12,12,13,1,'SUDAH DI TERIMA DI KANTIN'),(14,14,15,1,'PROSES'),(17,17,13,2,'SUDAH DI TERIMA DI KANTIN'),(18,18,14,4,'LUNAS/SELESAI'),(19,19,13,3,'LUNAS/SELESAI'),(20,20,15,11,'LUNAS/SELESAI'),(21,21,13,1,'LUNAS/SELESAI'),(22,22,14,11,'LUNAS/SELESAI'),(23,23,13,121,'LUNAS/SELESAI'),(24,24,15,11,'LUNAS/SELESAI'),(25,25,14,13,'PROSES'),(26,26,13,12,'LUNAS/SELESAI'),(27,27,15,11,'LUNAS/SELESAI'),(28,28,13,3,'LUNAS/SELESAI'),(29,29,13,1,'PESANAN SELESAI'),(30,30,13,1,'PROSES'),(31,31,13,4,'PROSES'),(32,32,15,4,'PROSES'),(33,33,15,4,'PESANAN SELESAI'),(34,34,32,3,'PESANAN SELESAI'),(35,35,15,5,'PROSES'),(36,36,13,10,'PROSES'),(37,37,28,2,'SUDAH DI ANTAR'),(38,38,31,5,'PESANAN SEDANG DIMASAK'),(39,39,13,1,'PROSES'),(40,40,24,1,'PROSES'),(41,41,35,1,'PROSES');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL,
  `nama_cafe` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`harga`,`nama_cafe`,`jenis`,`keterangan`,`foto`) values (13,'MIE GORENG',15000,'RESTO','MAKANAN','MIE','290-iklan2.png'),(14,'KOPI',10000,'RESTO','MINUMAN','kopi','357-iklan4.png'),(15,'NASI GORENG XIANG CHUN',20000,'RESTO','MAKANAN','NSSX','254-Mask_Group_606_rr@2x.png'),(20,'Nasi Campur',15000,'RESTO','MAKANAN','12','548-a1.jpg'),(24,'Kombucha',20000,'RESTO','MINUMAN','asd','649-kom.jpg'),(25,'NASI LEMAK',15000,'RESTO','MAKANAN','ASD','1533775581_Mask_Group_606_y@2x.png'),(26,'Cemilan',100000,'RESTO','SNACK','aasdasd','1896232720_sn1.jpg'),(27,'MIE GORENG',15000,'YUMMY','MAKANAN','MIE','290-iklan2.png'),(28,'KOPI',10000,'YUMMY','MINUMAN','kopi','357-iklan4.png'),(29,'NASI GORENG XIANG CHUN',20000,'YUMMY','MAKANAN','NSSX','254-Mask_Group_606_rr@2x.png'),(30,'Nasi Campur',15000,'YUMMY','MAKANAN','12','548-a1.jpg'),(31,'Kombucha',20000,'YUMMY','MINUMAN','asd','649-kom.jpg'),(32,'NASI LEMAK',15000,'YUMMY','MAKANAN','ASD','1533775581_Mask_Group_606_y@2x.png'),(33,'Cemilan',100000,'YUMMY','SNACK','aasdasd','1896232720_sn1.jpg'),(34,'MIE GORENG',15000,'HAPPY','MAKANAN','MIE','290-iklan2.png'),(35,'KOPI',10000,'HAPPY','MINUMAN','kopi','357-iklan4.png'),(36,'NASI GORENG XIANG CHUN',20000,'HAPPY','MAKANAN','NSSX','254-Mask_Group_606_rr@2x.png'),(37,'Nasi Campur',15000,'HAPPY','MAKANAN','12','548-a1.jpg'),(38,'Kombucha',20000,'HAPPY','MINUMAN','asd','649-kom.jpg'),(39,'NASI LEMAK',15000,'HAPPY','MAKANAN','ASD','1533775581_Mask_Group_606_y@2x.png'),(40,'Cemilan',100000,'HAPPY','SNACK','aasdasd','1896232720_sn1.jpg'),(41,'MIE GORENG',15000,'CAFE ABANG','MAKANAN','MIE','290-iklan2.png'),(42,'KOPI',10000,'CAFE ABANG','MINUMAN','kopi','357-iklan4.png'),(43,'NASI GORENG XIANG CHUN',20000,'CAFE ABANG','MAKANAN','NSSX','254-Mask_Group_606_rr@2x.png'),(44,'Nasi Campur',15000,'CAFE ABANG','MAKANAN','12','548-a1.jpg'),(45,'Kombucha',20000,'CAFE ABANG','MINUMAN','asd','649-kom.jpg'),(46,'NASI LEMAK',15000,'CAFE ABANG','MAKANAN','ASD','1533775581_Mask_Group_606_y@2x.png'),(47,'Cemilan',100000,'CAFE ABANG','SNACK','aasdasd','1896232720_sn1.jpg'),(48,'MIE GORENG',15000,'CAFE ADEK','MAKANAN','MIE','290-iklan2.png'),(49,'KOPI',10000,'CAFE ADEK','MINUMAN','kopi','357-iklan4.png'),(50,'NASI GORENG XIANG CHUN',20000,'CAFE ADEK','MAKANAN','NSSX','254-Mask_Group_606_rr@2x.png'),(51,'Nasi Campur',15000,'CAFE ADEK','MAKANAN','12','548-a1.jpg'),(52,'Kombucha',20000,'CAFE ADEK','MINUMAN','asd','649-kom.jpg'),(53,'NASI LEMAK',15000,'CAFE ADEK','MAKANAN','ASD','1533775581_Mask_Group_606_y@2x.png'),(54,'Cemilan',100000,'CAFE ADEK','SNACK','aasdasd','1896232720_sn1.jpg'),(55,'MIE GORENG',15000,'CAHAYA','MAKANAN','MIE','290-iklan2.png'),(56,'KOPI',10000,'CAHAYA','MINUMAN','kopi','357-iklan4.png'),(57,'NASI GORENG XIANG CHUN',20000,'CAHAYA','MAKANAN','NSSX','254-Mask_Group_606_rr@2x.png'),(58,'Nasi Campur',15000,'CAHAYA','MAKANAN','12','548-a1.jpg'),(59,'Kombucha',20000,'CAHAYA','MINUMAN','asd','649-kom.jpg'),(60,'NASI LEMAK',15000,'CAHAYA','MAKANAN','ASD','1533775581_Mask_Group_606_y@2x.png'),(61,'Cemilan',100000,'CAHAYA','SNACK','aasdasd','1896232720_sn1.jpg'),(62,'MIE GORENG',15000,'BLOK 2','MAKANAN','MIE','290-iklan2.png'),(63,'KOPI',10000,'BLOK 2','MINUMAN','kopi','357-iklan4.png'),(64,'NASI GORENG XIANG CHUN',20000,'BLOK 2','MAKANAN','NSSX','254-Mask_Group_606_rr@2x.png'),(65,'Nasi Campur',15000,'BLOK 2','MAKANAN','12','548-a1.jpg'),(66,'Kombucha',20000,'BLOK 2','MINUMAN','asd','649-kom.jpg'),(67,'NASI LEMAK',15000,'BLOK 2','MAKANAN','ASD','1533775581_Mask_Group_606_y@2x.png'),(68,'Cemilan',100000,'BLOK 2','SNACK','aasdasd','1896232720_sn1.jpg'),(69,'MIE GORENG',15000,'NICE VEGE','MAKANAN','MIE','290-iklan2.png'),(70,'KOPI',10000,'NICE VEGE','MINUMAN','kopi','357-iklan4.png'),(71,'NASI GORENG XIANG CHUN',20000,'NICE VEGE','MAKANAN','NSSX','254-Mask_Group_606_rr@2x.png'),(72,'Nasi Campur',15000,'NICE VEGE','MAKANAN','12','548-a1.jpg'),(73,'Kombucha',20000,'NICE VEGE','MINUMAN','asd','649-kom.jpg'),(74,'NASI LEMAK',15000,'NICE VEGE','MAKANAN','ASD','1533775581_Mask_Group_606_y@2x.png'),(75,'Cemilan',100000,'NICE VEGE','SNACK','aasdasd','1896232720_sn1.jpg');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_kelas` int(100) NOT NULL AUTO_INCREMENT,
  `ni` int(50) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `notelp` int(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `siswa` */

insert  into `siswa`(`id_kelas`,`ni`,`kelas`,`password`,`notelp`,`email`,`level`) values (1,123,'9A','12345',8123,'AA@gmail.com','siswa '),(12,NULL,'9B','123',1231,'QWDQDQW@GMAIL.COM','siswa'),(13,123123213,'lol','123',123123213,'lol@gmail.com','siswa'),(14,1233213,'asd','123',12312312,'A@gmail.com','siswa'),(15,12,'121','123',1223,'112@gmail.com','siswa');

/* Trigger structure for table `pembelian_detail` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapusorderan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapusorderan` AFTER DELETE ON `pembelian_detail` FOR EACH ROW DELETE from pembelian where id_pembelian=id_pembelian */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
