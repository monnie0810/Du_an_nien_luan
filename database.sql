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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table my_database.hinhsanpham: ~27 rows (approximately)
/*!40000 ALTER TABLE `hinhsanpham` DISABLE KEYS */;
INSERT INTO `hinhsanpham` (`hsp_id`, `hsp_ten`, `sp_id`) VALUES
	(5, '20201106082912_somi_1.2.jpg', 2),
	(6, '20201106082919_somi_1.jpg', 2),
	(7, '20201106082926_somi_1.1.jpg', 2),
	(8, '20201106082945_bonam_1.jpg', 3),
	(9, '20201106082950_bonam_1.1.jpg', 3),
	(10, '20201106082955_bonam_1.2.jpg', 3),
	(12, '20201106083115_setnu2.1.jpg', 4),
	(13, '20201106083121_setnu2.jpg', 4),
	(14, '20201106083223_dam_2.1.jpg', 5),
	(15, '20201106083237_dam_2.2.jpg', 5),
	(16, '20201106083531_dam_3.1.jpg', 6),
	(17, '20201106083539_dam_3.jpg', 6),
	(18, '20201106083544_dam_3.2.jpg', 6),
	(19, '20201106083649_dam_2.3.jpg', 7),
	(20, '20201106083740_dam_2.jpg', 8),
	(21, '20201106083747_dam_2.1.jpg', 8),
	(22, '20201106083753_dam_2.2.jpg', 8),
	(23, '20201106083941_dam_5.1.PNG', 9),
	(24, '20201106083950_dam_5.2.PNG', 9),
	(25, '20201106084132_khoacnu_1.2.jpg', 10),
	(26, '20201106084138_khoacnu_1.jpg', 10),
	(27, '20201106084400_thunnam_2.1.jpg', 12),
	(28, '20201106084410_thunnam_2.2.jpg', 12),
	(29, '20201106084514_khoacnu_1.1.jpg', 11),
	(30, '20201106084521_khoacnu_1.3.jpg', 11),
	(31, '20201106084822_thunnam_1.jpg', 13),
	(32, '20201106084831_thunnam_1_.1.jpg', 13);
/*!40000 ALTER TABLE `hinhsanpham` ENABLE KEYS */;

-- Dumping structure for table my_database.hoadon
CREATE TABLE IF NOT EXISTS `hoadon` (
  `hd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hd_ma` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hd_ngaylap` datetime NOT NULL,
  `hd_trangthai` int(11) NOT NULL,
  `hd_tongtien` float NOT NULL,
  `tv_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`hd_id`),
  KEY `fk_hoadon_thanhvien1_idx` (`tv_id`),
  CONSTRAINT `fk_hoadon_thanhvien1` FOREIGN KEY (`tv_id`) REFERENCES `thanhvien` (`tv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table my_database.hoadon: ~0 rows (approximately)
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` (`hd_id`, `hd_ma`, `hd_ngaylap`, `hd_trangthai`, `hd_tongtien`, `tv_id`) VALUES
	(2, '', '2020-11-06 08:54:50', 1, 2120000, 8);
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table my_database.hoadon_chitiet: ~2 rows (approximately)
/*!40000 ALTER TABLE `hoadon_chitiet` DISABLE KEYS */;
INSERT INTO `hoadon_chitiet` (`hd_chitiet_id`, `hd_slsp`, `hd_id`, `sp_id`) VALUES
	(3, 2, 2, 9),
	(4, 1, 2, 5);
/*!40000 ALTER TABLE `hoadon_chitiet` ENABLE KEYS */;

-- Dumping structure for table my_database.loaisanpham
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `lsp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lsp_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`lsp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table my_database.loaisanpham: ~9 rows (approximately)
/*!40000 ALTER TABLE `loaisanpham` DISABLE KEYS */;
INSERT INTO `loaisanpham` (`lsp_id`, `lsp_ten`) VALUES
	(3, 'Áo nam'),
	(4, 'Áo nữ'),
	(5, 'Đầm nữ'),
	(6, 'Quần nam'),
	(7, 'Quần nữ'),
	(8, 'Áo khoác nam'),
	(9, 'Áo khoác nữ'),
	(10, 'Set bộ nam'),
	(11, 'Set - đầm nữ');
/*!40000 ALTER TABLE `loaisanpham` ENABLE KEYS */;

-- Dumping structure for table my_database.phanquyen
CREATE TABLE IF NOT EXISTS `phanquyen` (
  `quyen_id` int(10) unsigned NOT NULL,
  `quyen_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`quyen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table my_database.phanquyen: ~2 rows (approximately)
/*!40000 ALTER TABLE `phanquyen` DISABLE KEYS */;
INSERT INTO `phanquyen` (`quyen_id`, `quyen_ten`) VALUES
	(0, 'nhân viên'),
	(1, 'Khách hàng');
/*!40000 ALTER TABLE `phanquyen` ENABLE KEYS */;

-- Dumping structure for table my_database.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `sp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_mausac` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_slkho` int(10) unsigned NOT NULL,
  `sp_mota` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_giabandau` int(10) unsigned NOT NULL,
  `sp_kichthuoc` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_giaban` int(11) NOT NULL,
  `lsp_id` int(10) unsigned NOT NULL,
  `th_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sp_id`),
  KEY `fk_sanpham_loaisanpham1_idx` (`lsp_id`),
  KEY `fk_sanpham_thuonghieu1_idx` (`th_id`),
  CONSTRAINT `fk_sanpham_loaisanpham1` FOREIGN KEY (`lsp_id`) REFERENCES `loaisanpham` (`lsp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sanpham_thuonghieu1` FOREIGN KEY (`th_id`) REFERENCES `thuonghieu` (`th_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table my_database.sanpham: ~12 rows (approximately)
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` (`sp_id`, `sp_ten`, `sp_mausac`, `sp_slkho`, `sp_mota`, `sp_giabandau`, `sp_kichthuoc`, `sp_giaban`, `lsp_id`, `th_id`) VALUES
	(2, 'Sơ mi nam', 'Trắng', 20, 'Đường may chắc chắn và tỉ mỉ, mang đến độ bền đẹp lâu dài cho sản phẩm.\r\nDễ giặt sạch, dễ ủi thẳng khi sử dụng, tiết kiệm nhiều thời gian.\r\nDễ dàng phối hợp cùng nhiều phụ kiện khác mang đến phong cách thời trang riêng cho bạn nữ, khéo léo lựa chọn trang phục cùng phụ kiện phù hợp, bạn sẽ có set đồ đẹp mắt...', 700000, 'freesize (dưới 70kg)', 800000, 3, 5),
	(3, 'Set thể thao nam', 'xanh lam - trắng', 30, '', 650000, 'freesize (dưới 75kg)', 750000, 10, 4),
	(4, 'Set bộ trắng công sở', 'Trắng', 10, '', 950000, 'freesize (dưới 60kg)', 1000000, 11, 3),
	(5, 'Đầm trắng công sở', 'Trắng', 39, '', 900000, 'freesize (dưới 57kg)', 980000, 11, 3),
	(6, 'Đầm maxi trăng sao', 'Xanh dương đậm', 5, '', 800000, 'freesize (dưới 57kg)', 900000, 11, 3),
	(7, 'Đầm maxi trơn', 'Đem', 10, '', 650000, 'freesize (dưới 57kg)', 730000, 11, 3),
	(8, 'Đầm maxi trơn', 'Trắng', 5, '', 650000, 'freesize (dưới 57kg)', 750000, 11, 3),
	(9, 'Đầm maxi trắng đuôi cá', 'Trắng', 12, '', 500000, 'freesize (dưới 57kg)', 570000, 11, 3),
	(10, 'khoác măng tô', 'Nâu be', 10, '', 570000, 'freesize (dưới 60kg)', 650000, 9, 4),
	(11, 'khoác măng tô', 'xanh dương ngọc', 8, '', 580000, 'freesize (dưới 60kg)', 650000, 9, 4),
	(12, 'Áo thun ', 'Nâu', 20, '', 450000, 'freesize (dưới 70kg)', 500000, 3, 2),
	(13, 'Áo hoodie gấu', 'xanh da trời', 5, '', 650000, 'freesize (dưới 85kg)', 690000, 3, 5);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table my_database.thanhvien: ~2 rows (approximately)
/*!40000 ALTER TABLE `thanhvien` DISABLE KEYS */;
INSERT INTO `thanhvien` (`tv_id`, `tv_ten`, `tv_ngaysinh`, `tv_gioitinh`, `tv_email`, `tv_sdt`, `tv_diachi`, `tv_matkhau`, `quyen_id`) VALUES
	(7, 'Admin', '1999-10-08', 'nu', 'nguyetb1709356@student.ctu.edu.vn', '0111111111', 'Quận Ninh Kiều - Cần Thơ', '7c222fb2927d828af22f592134e8932480637c0d', 0),
	(8, 'Nguyễn Minh Nguyệt', '2013-02-16', 'nam', 'nguyetb1709356@student.ctu.edu.vn', '0123456789', 'Quận Ninh Kiều - Cần Thơ', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1);
/*!40000 ALTER TABLE `thanhvien` ENABLE KEYS */;

-- Dumping structure for table my_database.thuonghieu
CREATE TABLE IF NOT EXISTS `thuonghieu` (
  `th_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `th_ten` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`th_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table my_database.thuonghieu: ~4 rows (approximately)
/*!40000 ALTER TABLE `thuonghieu` DISABLE KEYS */;
INSERT INTO `thuonghieu` (`th_id`, `th_ten`) VALUES
	(2, 'Canifa'),
	(3, 'Ivy Moda'),
	(4, 'Elise'),
	(5, 'Gucci');
/*!40000 ALTER TABLE `thuonghieu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
