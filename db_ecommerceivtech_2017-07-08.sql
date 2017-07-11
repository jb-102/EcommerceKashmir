# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.19-MariaDB)
# Database: db_ecommerceivtech
# Generation Time: 2017-07-08 10:34:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin_credentials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_credentials`;

CREATE TABLE `admin_credentials` (
  `admin_email` varchar(50) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `confirmation_code` int(4) DEFAULT NULL,
  PRIMARY KEY (`admin_email`),
  UNIQUE KEY `admin_username` (`admin_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin_credentials` WRITE;
/*!40000 ALTER TABLE `admin_credentials` DISABLE KEYS */;

INSERT INTO `admin_credentials` (`admin_email`, `admin_username`, `admin_password`, `confirmation_code`)
VALUES
	('junaidbhat110@gmail.com','admin','admin',3172);

/*!40000 ALTER TABLE `admin_credentials` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  `cat_desc` varchar(400) NOT NULL,
  `cat_stock` int(10) NOT NULL DEFAULT '0',
  `main_category` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_stock`, `main_category`)
VALUES
	(1,'telivision','this is television category',2,'electronic'),
	(2,'Mobiles','all mobiles are available',2,'electronic'),
	(3,'Football','football is beautiful.football is beautiful.football is beautiful.football is beautiful.',0,'Sports');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table main_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `main_categories`;

CREATE TABLE `main_categories` (
  `main_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `main_cat_name` varchar(30) NOT NULL,
  `main_cat_desc` varchar(400) NOT NULL,
  `main_cat_stock` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`main_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `main_categories` WRITE;
/*!40000 ALTER TABLE `main_categories` DISABLE KEYS */;

INSERT INTO `main_categories` (`main_cat_id`, `main_cat_name`, `main_cat_desc`, `main_cat_stock`)
VALUES
	(1,'electronic','all electronics items go here',4),
	(6,'mens_clothing','this is mens clothing',0),
	(7,'women_clothing','this is womens clothing',0),
	(8,'kids_clothing','this is kids clothing category',0),
	(9,'some category','this is some category',0),
	(10,'Sports','sports are good for health.',0);

/*!40000 ALTER TABLE `main_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `item_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_desc` varchar(400) NOT NULL,
  `item_price` float NOT NULL,
  `item_main_category` varchar(100) NOT NULL,
  `item_category` varchar(30) NOT NULL,
  `item_sub_category` varchar(30) NOT NULL,
  `item_ist_view` varchar(100) NOT NULL,
  `item_2nd_view` varchar(100) NOT NULL,
  `item_3rd_view` varchar(100) NOT NULL,
  `item_4th_view` varchar(100) NOT NULL,
  `item_color` varchar(30) NOT NULL,
  `item_size` int(10) NOT NULL,
  `views` int(5) NOT NULL DEFAULT '0',
  `is_popular` varchar(10) NOT NULL DEFAULT 'no',
  `item_added_on` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`item_id`, `item_name`, `item_desc`, `item_price`, `item_main_category`, `item_category`, `item_sub_category`, `item_ist_view`, `item_2nd_view`, `item_3rd_view`, `item_4th_view`, `item_color`, `item_size`, `views`, `is_popular`, `item_added_on`)
VALUES
	(1,'Samsung C4','best phone in market',8000,'electronic','telivision','led tv','christian1.jpg','christian1.jpg','christian1.jpg','christian1.jpg','black',42,17,'yes','2017-06-20 22:37:27.211839'),
	(2,'Some Product','some description',11000,'electronic','telivision','plasma tv','christian1.jpg','christian1.jpg','christian1.jpg','christian1.jpg','black',42,5,'no','2017-06-24 03:42:35.801352'),
	(3,'Samsung J7','samsung j7 are new in market with best configration.samsung j7 are new in market with best configration.samsung j7 are new in market with best configration.',23333,'electronic','Mobiles','Samsung','samsung1.jpg','samsung2.jpg','samsung1.jpg','samsung2.jpg','black',5,1,'yes','2017-06-26 02:18:10.559947'),
	(4,'Redmi 3','Redmi are new in market with best configration.samsung j7 are new in market with best configration.samsung j7 are new in market with best configration.samsung j7 are new in market with best configration.samsung j7 are new in market with best configration.samsung j7 are new in market with best configration.',32222,'electronic','Mobiles','Samsung','redmi1.jpg','redmi2.jpg','redmi1.jpg','redmi2.jpg','black',5,16,'yes','2017-06-26 02:19:28.817073'),
	(5,'Football Shoe','football is fun',1222,'Sports','Football','Shoes','foot1.jpg','foot2.jpg','foot1.jpg','foot2.jpg','white',8,9,'no','0000-00-00 00:00:00.000000'),
	(6,'Jersey','football is fun',2322,'Sports','Football','Football Jersey','jey1.jpg','jey2.jpg','jey1.jpg','jey2.jpg','white',8,24,'no','0000-00-00 00:00:00.000000');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table slider
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `slider_text` varchar(100) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_status` varchar(30) NOT NULL DEFAULT 'published',
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;

INSERT INTO `slider` (`slider_id`, `slider_text`, `slider_image`, `slider_status`)
VALUES
	(1,'Ist Slider','slider1.jpg','published'),
	(2,'2nd Slider','slider2.jpg ','published'),
	(3,'3rd Slider','slider3.jpg','published'),
	(4,'4th Slider','slider4.jpg','published'),
	(5,'5th Slider','slider5.jpg','published');

/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sub_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sub_category`;

CREATE TABLE `sub_category` (
  `sub_cat_id` int(10) NOT NULL,
  `sub_cat_name` varchar(30) NOT NULL,
  `sub_cat_desc` varchar(400) NOT NULL,
  `sub_cat_parent` varchar(30) NOT NULL,
  `sub_cat_stock` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sub_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;

INSERT INTO `sub_category` (`sub_cat_id`, `sub_cat_name`, `sub_cat_desc`, `sub_cat_parent`, `sub_cat_stock`)
VALUES
	(0,'Samsung','electronic are great','Mobiles',2),
	(1,'plasma tv','this is plasma tv category','telivision',1),
	(2,'led tv','some led tv desc','telivision',1);

/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subscription
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscription`;

CREATE TABLE `subscription` (
  `subsription_id` int(10) NOT NULL,
  `sub_email` varchar(100) NOT NULL,
  PRIMARY KEY (`subsription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;

INSERT INTO `subscription` (`subsription_id`, `sub_email`)
VALUES
	(1,'jeel@gmail.com'),
	(2,'je!fgma@gmail.com');

/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tiles`;

CREATE TABLE `tiles` (
  `tile_id` int(10) NOT NULL,
  `tile_image` varchar(100) NOT NULL,
  `tile_url` varchar(100) NOT NULL,
  PRIMARY KEY (`tile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tiles` WRITE;
/*!40000 ALTER TABLE `tiles` DISABLE KEYS */;

INSERT INTO `tiles` (`tile_id`, `tile_image`, `tile_url`)
VALUES
	(1,'tile1.jpg','Tile Url'),
	(2,'tile2.jpg','Tile Url'),
	(3,'tile3.jpg','Tile Url');

/*!40000 ALTER TABLE `tiles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_cart`;

CREATE TABLE `user_cart` (
  `item_id` int(5) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `total_quantity` int(5) NOT NULL,
  PRIMARY KEY (`item_id`,`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_cart` WRITE;
/*!40000 ALTER TABLE `user_cart` DISABLE KEYS */;

INSERT INTO `user_cart` (`item_id`, `user_email`, `total_quantity`)
VALUES
	(1,'jeel@gmail.com',3),
	(5,'jeel@gmail.com',1),
	(6,'jeel@gmail.com',2);

/*!40000 ALTER TABLE `user_cart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_credentials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_credentials`;

CREATE TABLE `user_credentials` (
  `user_id` bigint(7) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(30) DEFAULT NULL,
  `registered_from` varchar(20) NOT NULL DEFAULT 'mainsite',
  `confirmation_code` int(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_credentials` WRITE;
/*!40000 ALTER TABLE `user_credentials` DISABLE KEYS */;

INSERT INTO `user_credentials` (`user_id`, `user_name`, `user_email`, `user_password`, `registered_from`, `confirmation_code`)
VALUES
	(2,'juni bhat','junaidbhat@gmail.com','junaid','mainsite',2887),
	(4,'junaid ','junaidbhat110@gmail.com',NULL,'gmail',NULL),
	(7,'Bhat Junaid','bhatjunaid_jb@rediffmail.com',NULL,'facebook',NULL),
	(8,'junaid','junaid110@gmail.com','juniii','mainsite',8887),
	(9,'junai','juni@gmail.com','juna','mainsite',9560);

/*!40000 ALTER TABLE `user_credentials` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_registration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_registration`;

CREATE TABLE `user_registration` (
  `user_reg_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  PRIMARY KEY (`user_reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_wishlist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_wishlist`;

CREATE TABLE `user_wishlist` (
  `item_id` int(5) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  PRIMARY KEY (`item_id`,`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_wishlist` WRITE;
/*!40000 ALTER TABLE `user_wishlist` DISABLE KEYS */;

INSERT INTO `user_wishlist` (`item_id`, `user_email`)
VALUES
	(4,'jeel@gmail.com'),
	(5,'jeel@gmail.com'),
	(6,'jeel@gmail.com');

/*!40000 ALTER TABLE `user_wishlist` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
