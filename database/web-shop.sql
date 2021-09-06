-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table web_shop.category
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table web_shop.category: ~5 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`category_id`, `category`) VALUES
	(1, 'Men'),
	(2, 'Women'),
	(3, 'Kids'),
	(4, 'Kids-Girls'),
	(5, 'Kids-Boys');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table web_shop.customer_details
CREATE TABLE IF NOT EXISTS `customer_details` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `home_area` varchar(100) DEFAULT NULL,
  `zip_code` varchar(100) DEFAULT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table web_shop.customer_details: ~5 rows (approximately)
/*!40000 ALTER TABLE `customer_details` DISABLE KEYS */;
INSERT INTO `customer_details` (`customer_id`, `user_name`, `first_name`, `last_name`, `email_address`, `phone_number`, `user_password`, `role`, `address`, `country`, `city`, `home_area`, `zip_code`, `created_on`) VALUES
	(1, 'Joseh', 'Joseph', 'Mukunga', 'jos.mukunga@gmail.com', '0707434735', 'Joseph', 'Customer', 'Marurui', 'Kenya', 'Nairobi', '', '00200', '2021-08-31'),
	(2, 'admin', 'Grace', 'Tina', 'admin@gmail.com', '0707546274', 'Admin123', 'Vendor', NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
	(3, 'Ironman', 'Anthony ', 'Stark', 'anthonystark@gmail.com', '0729768505', 'IronMan', 'Customer', 'Bahati Estate', 'Kenya', 'Nairobi', 'Bahati', '00200', '2021-09-02'),
	(4, 'Kara', 'Kara', 'Danvers', 'kara@gmail.com', '0789653472', 'Supergirl', 'Customer', 'Bahati Estate', 'Kenya', 'Nairobi', '', '00200', '2021-09-02'),
	(5, 'carol.denvers', 'Carol', 'Denvers', 'caroldenvers@gmail.com', '0792456372', 'CarolD', 'Customer', 'Marurui, Shade Apartment', 'Kenya', 'Nairobi', '', '00200', '2021-09-03');
/*!40000 ALTER TABLE `customer_details` ENABLE KEYS */;

-- Dumping structure for table web_shop.items
CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(100) NOT NULL,
  `item_number` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table web_shop.items: ~5 rows (approximately)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`item_id`, `category`, `image`, `item_number`, `item_name`, `size`, `price`, `description`, `status`, `date_added`) VALUES
	(1, 'Women', 'cropped-sweater.jpg', '001', 'Crop Sweater', 'Medium', '800', 'Grey, Machine-washable', 'Available', '2021-09-01'),
	(2, 'Women', 'scarfs.jpg', '002', 'Scarf', 'Large', '500', 'Machine-washable, Hand-knitted', 'Available', '2021-09-02'),
	(3, 'Kids', 'dress.jfif', '003', 'Unicorn Dress', 'Medium', '1500', 'Cotton black leggings', 'Available', '2021-09-02'),
	(4, 'Men', 'trousers.jpg', '004', 'Khaki Trousers', 'Small', '700', 'Brown Khaki trousers, Perfect for office wear', 'Available', '2021-09-03'),
	(5, 'Women', 'leather-jacket.jpg', '005', 'Leather Jacket', 'Medium', '1500', 'Real Leather', 'Available', '2021-09-05');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
