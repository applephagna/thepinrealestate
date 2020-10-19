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

-- Dumping structure for table thepinrealestate_social_login.facings
DROP TABLE IF EXISTS `facings`;
CREATE TABLE IF NOT EXISTS `facings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `facing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table thepinrealestate_social_login.facings: 8 rows
/*!40000 ALTER TABLE `facings` DISABLE KEYS */;
INSERT INTO `facings` (`id`, `facing`, `created_at`, `updated_at`) VALUES
	(1, 'East', '2020-06-20 13:01:27', '2020-06-20 13:01:31'),
	(2, 'North', '2020-06-20 13:01:27', '2020-06-20 13:01:32'),
	(3, 'Northeast', '2020-06-20 13:01:28', '2020-06-20 13:01:32'),
	(4, 'Northwest', '2020-06-20 13:01:28', '2020-06-20 13:01:33'),
	(5, 'South', '2020-06-20 13:01:29', '2020-06-20 13:01:33'),
	(6, 'Southeast', '2020-06-20 13:01:30', '2020-06-20 13:01:34'),
	(7, 'Southwest', '2020-06-20 13:01:30', '2020-06-20 13:01:34'),
	(8, 'West', '2020-06-20 13:01:31', '2020-06-20 13:01:35');
/*!40000 ALTER TABLE `facings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
