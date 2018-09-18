-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for skillmanagement
CREATE DATABASE IF NOT EXISTS `skillmanagement` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `skillmanagement`;

-- Dumping structure for table skillmanagement.domains
CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table skillmanagement.domains: ~6 rows (approximately)
/*!40000 ALTER TABLE `domains` DISABLE KEYS */;
INSERT INTO `domains` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'C++', '2018-09-16 01:58:03', '2018-09-16 01:58:05'),
	(2, 'Java', '2018-09-16 01:58:22', '2018-09-16 01:58:23'),
	(3, 'Python', '2018-09-16 01:58:34', '2018-09-16 01:58:36'),
	(4, 'Unix ', '2018-09-16 01:59:47', '2018-09-16 01:59:45'),
	(5, 'PHP ', '2018-09-16 02:00:07', '2018-09-16 02:00:08'),
	(6, 'SQL', NULL, NULL);
/*!40000 ALTER TABLE `domains` ENABLE KEYS */;

-- Dumping structure for table skillmanagement.levels
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table skillmanagement.levels: ~5 rows (approximately)
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'level 1', NULL, NULL),
	(2, 'level 2', NULL, NULL),
	(3, 'level 3', NULL, NULL),
	(4, 'level 4', NULL, NULL),
	(5, 'level 5', NULL, NULL);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;

-- Dumping structure for table skillmanagement.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table skillmanagement.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_10_12_000000_create_users_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2018_09_15_174547_create_skills_table', 2),
	('2018_09_15_175610_create_domains_table', 3),
	('2018_09_15_175621_create_levels_table', 3),
	('2018_09_15_191113_add_enabled_to_skills_table', 4),
	('2018_09_16_202828_alter_date_recorded_from_text_to_datetime', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table skillmanagement.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table skillmanagement.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table skillmanagement.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `domain_id` int(10) unsigned NOT NULL,
  `level_id` int(11) NOT NULL,
  `date_recorded` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enabled` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `skills_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Dumping data for table skillmanagement.skills: ~26 rows (approximately)
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` (`id`, `user_id`, `domain_id`, `level_id`, `date_recorded`, `created_at`, `updated_at`, `enabled`) VALUES
	(6, 3, 4, 5, '2018-09-28 00:00:00', '2018-09-16 00:24:12', '2018-09-17 18:06:29', 1),
	(7, 3, 4, 4, '2018-09-16 23:24:39', '2018-09-15 23:24:39', '2018-09-17 18:06:16', 1),
	(10, 3, 3, 3, '2018-09-18 23:24:39', '2018-09-18 09:30:14', '2018-09-16 09:30:14', 1),
	(11, 3, 3, 5, '2018-09-17 23:24:39', '2018-09-17 09:38:24', '2018-09-16 09:38:24', 1),
	(14, 3, 3, 3, '2018-09-05 00:00:00', '2018-09-16 23:07:27', '2018-09-16 23:07:27', 1),
	(15, 3, 4, 4, '2018-09-18 00:00:00', '2018-09-16 23:08:20', '2018-09-16 23:08:20', 1),
	(16, 3, 4, 3, '2018-09-28 00:00:00', '2018-09-16 23:08:39', '2018-09-17 18:08:57', 1),
	(17, 3, 3, 2, '2018-09-21 00:00:00', '2018-09-16 23:09:10', '2018-09-17 18:07:25', 1),
	(18, 3, 3, 5, '2018-09-19 00:00:00', '2018-09-16 23:09:29', '2018-09-16 23:09:29', 1),
	(19, 2, 1, 1, '2018-09-03 00:00:00', '2018-09-17 09:59:36', '2018-09-17 13:22:18', 0),
	(20, 2, 1, 2, '2018-09-04 00:00:00', '2018-09-17 09:59:43', '2018-09-17 13:24:56', 0),
	(21, 2, 1, 1, '2018-09-07 00:00:00', '2018-09-17 09:59:51', '2018-09-17 14:59:03', 1),
	(23, 2, 1, 4, '2018-09-17 00:00:00', '2018-09-17 10:00:13', '2018-09-17 10:00:13', 1),
	(24, 2, 1, 5, '2018-09-21 00:00:00', '2018-09-17 10:00:41', '2018-09-17 13:24:48', 0),
	(25, 2, 3, 1, '2018-09-04 00:00:00', '2018-09-17 10:09:06', '2018-09-17 10:09:06', 1),
	(26, 2, 3, 3, '2018-09-05 00:00:00', '2018-09-17 10:09:14', '2018-09-17 10:09:14', 1),
	(27, 2, 1, 3, '2018-09-20 00:00:00', '2018-09-17 13:25:42', '2018-09-17 13:25:42', 1),
	(28, 2, 5, 2, '2018-09-03 00:00:00', '2018-09-17 13:26:29', '2018-09-17 13:26:29', 1),
	(29, 2, 5, 3, '2018-09-07 00:00:00', '2018-09-17 13:26:39', '2018-09-17 13:26:39', 1),
	(30, 2, 5, 4, '2018-09-20 00:00:00', '2018-09-17 13:27:11', '2018-09-17 13:27:11', 1),
	(31, 2, 1, 4, '2018-09-03 00:00:00', '2018-09-17 13:27:38', '2018-09-17 13:27:38', 1),
	(32, 2, 4, 4, '2018-09-04 00:00:00', '2018-09-17 13:34:03', '2018-09-17 13:34:03', 1),
	(33, 2, 4, 2, '2018-09-13 00:00:00', '2018-09-17 13:34:36', '2018-09-17 13:34:36', 1),
	(34, 2, 4, 5, '2018-09-21 00:00:00', '2018-09-17 13:35:08', '2018-09-17 13:35:08', 1),
	(35, 2, 3, 4, '2018-09-19 00:00:00', '2018-09-17 13:56:50', '2018-09-17 13:56:50', 1),
	(36, 2, 1, 4, '2018-09-13 00:00:00', '2018-09-17 13:57:24', '2018-09-17 13:57:24', 1);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

-- Dumping structure for table skillmanagement.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table skillmanagement.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Admin', 'admin@admin.com', '$2y$10$9aEWhxM62wE7uD.0u/prMev7JlkL6KuzN4wbbvPpzbW0uXhlWh5Bu', 'HYY6QN9GHTbUbdgbUQotfPL6KNt0sjNDvuJ1Dp0g6bu3uTy6ShKamMXP4dgi', '2018-09-15 11:50:09', '2018-09-18 07:45:55'),
	(3, 'Tascau Robert', 'aaaa@fff.com', '$2y$10$zEgObGFt7RddlDXqDpKxYOaiPwnp5R6pn9SlGrzqSx.XPnB28esAu', NULL, '2018-09-15 22:51:51', '2018-09-15 22:51:51'),
	(4, 'Andrei Alex', 'andrei@andrei.com', '$2y$10$ITPyhfti0gEM9tnCv3iHNuyII1nR2iiDL4Ns/6BXkZ.exPzR55haS', 'aCS5Y2H9t8O2CnehBCX464MiYS1CrW5YV8gDDV30irDohzM1138JVJioLt06', '2018-09-18 07:46:37', '2018-09-18 07:46:44'),
	(5, 'Ion Popescu', 'popescu@popescu.com', '$2y$10$U2wLDnDokM4pC3cGPVrOTOjUXZX4/cOA2MfWEwgTmvUM2bAyRJGva', 'NjOW0PtQ3J2Uk0l1CSiumTPCWYa3O0Uw9LTvo6EHYdo468AkAUGHaaEB1QL3', '2018-09-18 07:48:33', '2018-09-18 07:48:42'),
	(6, 'Bogdan Avramescu', 'bogdan@bogdan.com', '$2y$10$OFdIdgOcu/3sWuZSYj06xOzuqG8rTHl9Akr1SGu2iwqvyzVyWWQSq', 'fsmAbTduXBJp6dQcXQTMDneCeDPYjpQbRbvKEfIcd40yo5YBkBDOSMIVeuPa', '2018-09-18 07:51:17', '2018-09-18 07:54:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
