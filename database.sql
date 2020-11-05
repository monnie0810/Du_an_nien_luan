-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for my_database
CREATE DATABASE IF NOT EXISTS `my_database` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `my_database`;

-- Dumping structure for table my_database.hinhsanpham
CREATE TABLE IF NOT EXISTS `hinhsanpham` (
  `hsp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hsp_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`hsp_id`),
  KEY `fk_hinhsanpham_sanpham1_idx` (`sp_id`),
  CONSTRAINT `fk_hinhsanpham_sanpham1` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`sp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table my_database.hoadon
CREATE TABLE IF NOT EXISTS `hoadon` (
  `hd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hd_ngaylap` datetime DEFAULT NULL,
  `hd_trangthai` int(11) DEFAULT NULL,
  `hd_tongtien` float DEFAULT NULL,
  `tv_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`hd_id`),
  KEY `fk_hoadon_thanhvien1_idx` (`tv_id`),
  CONSTRAINT `fk_hoadon_thanhvien1` FOREIGN KEY (`tv_id`) REFERENCES `thanhvien` (`tv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table my_database.hoadon_chitiet
CREATE TABLE IF NOT EXISTS `hoadon_chitiet` (
  `hd_chitiet_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hd_slsp` int(10) unsigned NOT NULL,
  `hd_id` int(10) unsigned NOT NULL,
  `sp_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`hd_chitiet_id`),
  KEY `fk_hoadon_has_sanpham_sanpham1_idx` (`sp_id`),
  KEY `fk_hoadon_has_sanpham_hoadon1_idx` (`hd_id`),
  CONSTRAINT `fk_hoadon_has_sanpham_hoadon1` FOREIGN KEY (`hd_id`) REFERENCES `hoadon` (`hd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hoadon_has_sanpham_sanpham1` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`sp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table my_database.loaisanpham
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `lsp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lsp_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`lsp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table my_database.phanquyen
CREATE TABLE IF NOT EXISTS `phanquyen` (
  `quyen_id` int(10) unsigned NOT NULL,
  `quyen_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`quyen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table my_database.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `sp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_mausac` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_slkho` int(10) unsigned NOT NULL,
  `sp_mota` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_kichthuoc` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_giabandau` float NOT NULL DEFAULT 0,
  `sp_giaban` float NOT NULL DEFAULT 0,
  `lsp_id` int(10) unsigned NOT NULL,
  `th_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sp_id`),
  KEY `fk_sanpham_loaisanpham1_idx` (`lsp_id`),
  KEY `fk_sanpham_thuonghieu1_idx` (`th_id`),
  CONSTRAINT `fk_sanpham_loaisanpham1` FOREIGN KEY (`lsp_id`) REFERENCES `loaisanpham` (`lsp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sanpham_thuonghieu1` FOREIGN KEY (`th_id`) REFERENCES `thuonghieu` (`th_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table my_database.thanhvien
CREATE TABLE IF NOT EXISTS `thanhvien` (
  `tv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tv_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tv_ngaysinh` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tv_gioitinh` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tv_email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tv_sdt` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tv_diachi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tv_matkhau` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tv_id`),
  KEY `fk_thanhvien_phanquyen1_idx` (`quyen_id`),
  CONSTRAINT `fk_thanhvien_phanquyen1` FOREIGN KEY (`quyen_id`) REFERENCES `phanquyen` (`quyen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table my_database.thuonghieu
CREATE TABLE IF NOT EXISTS `thuonghieu` (
  `th_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `th_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`th_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
