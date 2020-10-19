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


-- Dumping structure for table thepinrealestate_social_login.bedrooms
DROP TABLE IF EXISTS `bedrooms`;
CREATE TABLE IF NOT EXISTS `bedrooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `room` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table thepinrealestate_social_login.bedrooms: 9 rows
/*!40000 ALTER TABLE `bedrooms` DISABLE KEYS */;
INSERT INTO `bedrooms` (`id`, `room`, `created_at`, `updated_at`) VALUES
	(1, '1', '2020-06-20 12:55:45', '2020-06-20 12:55:46'),
	(2, '2', '2020-06-20 12:55:46', '2020-06-20 12:55:48'),
	(3, '3', '2020-06-20 12:55:47', '2020-06-20 12:55:47'),
	(4, '4', '2020-06-20 12:55:55', '2020-06-20 12:55:54'),
	(5, '5', '2020-06-20 12:56:01', '2020-06-20 12:56:02'),
	(6, '6', '2020-06-20 12:56:08', '2020-06-20 12:56:09'),
	(7, '7', '2020-06-20 12:56:15', '2020-06-20 12:56:16'),
	(8, '8', '2020-06-20 12:56:24', '2020-06-20 12:56:24'),
	(9, 'More+', '2020-06-20 12:58:03', '2020-06-20 12:58:03');
/*!40000 ALTER TABLE `bedrooms` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
