-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for thepinrealestate_social_login
DROP DATABASE IF EXISTS `thepinrealestate_social_login`;
CREATE DATABASE IF NOT EXISTS `thepinrealestate_social_login` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `thepinrealestate_social_login`;

-- Dumping structure for table thepinrealestate_social_login.provinces
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table thepinrealestate_social_login.provinces: 25 rows
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`, `name_en`, `name_kh`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Phnom Penh', 'ភ្នំពេញ', 'phnom-penh', NULL, NULL),
	(2, 'Preah Sihanouk', 'ព្រះសីហនុ', 'preah-sihanouk', NULL, NULL),
	(3, 'Kampong Cham', 'កំពង់ចាម', 'kampong-cham', NULL, NULL),
	(4, 'Siem Reap', 'សៀមរាប', 'siem-reap', NULL, NULL),
	(5, 'Battambang', 'បាត់ដំបង', 'battambang', NULL, NULL),
	(6, 'Kandal', 'កណ្តាល', 'kandal', NULL, NULL),
	(7, 'Banteay Meanchey', 'បន្ទាយមានជ័យ', 'banteay-meanchey', NULL, NULL),
	(8, 'Kampong Chhnang', 'កំពង់ឆ្នាំង', 'kampong-chhnang', NULL, NULL),
	(9, 'Kampong Speu', 'កំពង់ស្ពឺ', 'kampong-speu', NULL, NULL),
	(10, 'Kampong Thom', 'កំពង់ធំ', 'kampong-thom', NULL, NULL),
	(11, 'Kampot', 'កំពត', 'kampot', NULL, NULL),
	(12, 'Kep', 'កែប', 'kep', NULL, NULL),
	(13, 'Koh Kong', 'កោះកុង', 'koh-Kong', NULL, NULL),
	(14, 'Kratie', 'ក្រចេះ', 'kratie', NULL, NULL),
	(15, 'Mondulkiri', 'មណ្ឌលគិរី', 'mondulkiri', NULL, NULL),
	(16, 'Oddar Meanchey', 'ឧត្តរមានជ័យ', 'oddar-meanchey', NULL, NULL),
	(17, 'Pailin', 'ប៉ៃលិន', 'pailin', NULL, NULL),
	(18, 'Preah Vihear', 'ព្រះវិហារ', 'preah-vihear', NULL, NULL),
	(19, 'Prey Veng', 'ព្រៃវែង', 'prey-veng', NULL, NULL),
	(20, 'Pursat', 'ពោធ៌សាត់', 'pursat', NULL, NULL),
	(21, 'Ratanakiri', 'រតនគីរី', 'ratanakiri', NULL, NULL),
	(22, 'Stung Treng', 'ស្ទឹងត្រែង', 'stung-treng', NULL, NULL),
	(23, 'Svay Rieng', 'ស្វាយរៀង', 'svay-rieng', NULL, NULL),
	(24, 'Takeo', 'តាកែវ', 'takeo', NULL, NULL),
	(25, 'Tboung Khmum', 'ត្បូងឃ្មុំ', 'tboung-khmum', NULL, NULL);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
