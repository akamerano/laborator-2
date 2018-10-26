-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.38 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mydb
CREATE DATABASE IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mydb`;

-- Dumping structure for table mydb.autori
CREATE TABLE IF NOT EXISTS `autori` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nume` text NOT NULL,
  `prenume` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.autori: ~4 rows (approximately)
/*!40000 ALTER TABLE `autori` DISABLE KEYS */;
INSERT INTO `autori` (`id`, `nume`, `prenume`) VALUES
	(1, 'Maiakovski', 'Vladimir'),
	(2, 'Eminescu', 'Mihai'),
	(3, 'Creanga', 'Ion'),
	(4, 'Mateevici', 'Alexei');
/*!40000 ALTER TABLE `autori` ENABLE KEYS */;

-- Dumping structure for table mydb.carti
CREATE TABLE IF NOT EXISTS `carti` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Denumire` varchar(50) DEFAULT NULL,
  `Anul_editie` tinyint(4) DEFAULT NULL,
  `autor_id` int(11) unsigned DEFAULT NULL,
  `pagini` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `autor_id` (`autor_id`),
  CONSTRAINT `autor_id` FOREIGN KEY (`autor_id`) REFERENCES `autori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.carti: ~2 rows (approximately)
/*!40000 ALTER TABLE `carti` DISABLE KEYS */;
INSERT INTO `carti` (`id`, `Denumire`, `Anul_editie`, `autor_id`, `pagini`) VALUES
	(3, 'Vara2', 127, NULL, 100500),
	(4, 'Hello world', 127, 4, 231);
/*!40000 ALTER TABLE `carti` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
