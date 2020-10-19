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


-- Dumping structure for table thepinrealestate_social_login.bathrooms
DROP TABLE IF EXISTS `bathrooms`;
CREATE TABLE IF NOT EXISTS `bathrooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `room` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table thepinrealestate_social_login.bathrooms: 9 rows
/*!40000 ALTER TABLE `bathrooms` DISABLE KEYS */;
INSERT INTO `bathrooms` (`id`, `room`, `created_at`, `updated_at`) VALUES
	(1, '1', '2020-06-20 12:58:51', '2020-06-20 12:58:53'),
	(2, '2', '2020-06-20 12:58:52', '2020-06-20 12:58:51'),
	(3, '3', '2020-06-20 12:58:54', '2020-06-20 12:58:54'),
	(4, '4', '2020-06-20 12:58:55', '2020-06-20 12:58:55'),
	(5, '5', '2020-06-20 12:58:56', '2020-06-20 12:58:56'),
	(6, '6', '2020-06-20 12:58:57', '2020-06-20 12:58:57'),
	(7, '7', '2020-06-20 12:58:58', '2020-06-20 12:58:59'),
	(8, '8', '2020-06-20 12:58:59', '2020-06-20 12:59:02'),
	(9, 'More+', '2020-06-20 12:59:00', '2020-06-20 12:59:00');
/*!40000 ALTER TABLE `bathrooms` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
