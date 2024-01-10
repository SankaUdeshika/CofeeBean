-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.34 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for cofeebean_db
CREATE DATABASE IF NOT EXISTS `cofeebean_db` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cofeebean_db`;

-- Dumping structure for table cofeebean_db.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `adminEmail` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`adminEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cofeebean_db.admin: ~0 rows (approximately)

-- Dumping structure for table cofeebean_db.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_id` int NOT NULL AUTO_INCREMENT,
  `Coffee_CoffeeId` int NOT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`Cart_id`),
  KEY `fk_cart_Coffee1_idx` (`Coffee_CoffeeId`),
  CONSTRAINT `fk_cart_Coffee1` FOREIGN KEY (`Coffee_CoffeeId`) REFERENCES `coffee` (`CoffeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cofeebean_db.cart: ~0 rows (approximately)
INSERT INTO `cart` (`Cart_id`, `Coffee_CoffeeId`, `qty`) VALUES
	(5, 6, 4);

-- Dumping structure for table cofeebean_db.coffee
CREATE TABLE IF NOT EXISTS `coffee` (
  `CoffeeId` int NOT NULL AUTO_INCREMENT,
  `CoffeeName` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `CofeeDescription` text,
  `CoffeeCategory_Category_id` int NOT NULL,
  `CoffeImagePath` text,
  PRIMARY KEY (`CoffeeId`),
  KEY `fk_Cofee_CofeeCategory_idx` (`CoffeeCategory_Category_id`),
  CONSTRAINT `fk_Cofee_CofeeCategory` FOREIGN KEY (`CoffeeCategory_Category_id`) REFERENCES `coffeecategory` (`Category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cofeebean_db.coffee: ~3 rows (approximately)
INSERT INTO `coffee` (`CoffeeId`, `CoffeeName`, `price`, `CofeeDescription`, `CoffeeCategory_Category_id`, `CoffeImagePath`) VALUES
	(5, 'AMERICANO', 100, 'Description americano', 1, 'img//CofeeImages//AMERICANO.jpeg'),
	(6, 'CaffeMocha', 150, 'Description Cafe Mocha', 1, 'img//CofeeImages//CaffeMocha.png'),
	(7, 'Cappuchino', 200, 'Description Cappuchino', 2, 'img//CofeeImages//Cappuchino.jpeg');

-- Dumping structure for table cofeebean_db.coffeecategory
CREATE TABLE IF NOT EXISTS `coffeecategory` (
  `Category_id` int NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cofeebean_db.coffeecategory: ~3 rows (approximately)
INSERT INTO `coffeecategory` (`Category_id`, `Category_name`) VALUES
	(1, 'HotCoffee'),
	(2, 'ColdCoffee'),
	(3, 'Shakes');

-- Dumping structure for table cofeebean_db.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `email` varchar(100) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `gender_gId` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_customer_gender1_idx` (`gender_gId`),
  CONSTRAINT `fk_customer_gender1` FOREIGN KEY (`gender_gId`) REFERENCES `gender` (`gId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cofeebean_db.customer: ~0 rows (approximately)

-- Dumping structure for table cofeebean_db.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `gId` int NOT NULL AUTO_INCREMENT,
  `genderName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`gId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cofeebean_db.gender: ~0 rows (approximately)

-- Dumping structure for table cofeebean_db.purchasehistory
CREATE TABLE IF NOT EXISTS `purchasehistory` (
  `PH_id` int NOT NULL AUTO_INCREMENT,
  `total` double DEFAULT NULL,
  `cart_Cart_id` int NOT NULL,
  PRIMARY KEY (`PH_id`),
  KEY `fk_PurchaseHistory_cart1_idx` (`cart_Cart_id`),
  CONSTRAINT `fk_PurchaseHistory_cart1` FOREIGN KEY (`cart_Cart_id`) REFERENCES `cart` (`Cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cofeebean_db.purchasehistory: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
