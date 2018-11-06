-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema rms
--

CREATE DATABASE IF NOT EXISTS rms;
USE rms;

--
-- Definition of table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`,`name`,`slug`,`created_at`,`updated_at`) VALUES 
 (1,'First Food','first-food','2018-02-28 04:44:06','2018-02-28 04:44:06'),
 (2,'Drinks','drinks','2018-02-28 04:44:28','2018-02-28 04:44:28'),
 (3,'Lounch','lounch','2018-02-28 04:45:52','2018-02-28 04:45:52'),
 (4,'Dinner','dinner','2018-02-28 04:46:02','2018-02-28 04:46:02'),
 (5,'Test','test','2018-03-05 06:32:41','2018-03-05 06:32:41');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


--
-- Definition of table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pre_address` text NOT NULL,
  `per_address` text NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `sex` varchar(45) NOT NULL,
  `identity` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`,`name`,`phone`,`email`,`pre_address`,`per_address`,`role_id`,`sex`,`identity`,`created_at`,`updated_at`) VALUES 
 (5,'Md. Abdullah','01938029709','abdullah.wpsi@gmail.com','20/A, Dhaka Housing, Adabar, Dhaka-1207','Vill: Kashimpur, Keshobpur, Jessore',2,'Male','md-abdullah-2018-02-27-5a955116eccec.jpg','2018-02-27 12:37:42','2018-02-27 12:37:42'),
 (6,'Ruhul Amin','01723514168','ruhuldcss1989@gmail.com','Katasur, Mohommadpur, Dhaka-1209','Pirgonj, Rangpur',2,'Male','ruhul-amin-2018-02-27-5a95527824a95.jpg','2018-02-27 12:43:36','2018-02-27 12:43:36'),
 (7,'Mehedi Hasan','01728443313','emailusepersonal@gmail.com','Katasur, Mohommodpur, Dhaka-1209','Gopalgonj',4,'Male','mehedi-hasan-2018-02-27-5a9559891cf68.jpg','2018-02-27 13:13:45','2018-02-27 13:13:45'),
 (8,'Shamima Yeasmin','01913468320','shamimayeasmin567@gmail.com','Kallanpur, Dhaka-1209','Sirajgonj',4,'Female','shamima-yeasmin-2018-02-27-5a955cef0632c.jpg','2018-02-27 13:28:15','2018-02-27 13:28:15'),
 (9,'Momtaj Akter','01732815336','momtakjakter40@gmail.com','Zigatola, Dhaka-1209','Noakhali',2,'Female','momtaj-akter-2018-02-27-5a955d6ad445f.jpg','2018-02-27 13:30:18','2018-02-27 13:30:18'),
 (10,'Samsul Alam Rony','01926146256','alamrony.nu@gmail.com','Katasur, Mohommadpur, Dhaka-1209','Chandpur',2,'Male','samsul-alam-rony-2018-02-27-5a955dfae3397.jpg','2018-02-27 13:32:42','2018-02-27 13:32:42'),
 (11,'Rahena Akter','01784093575','sumi.ru.88@gmail.com','Farmget, Dhaka-1207','Gaibandha',4,'Female','rahena-akter-2018-02-27-5a955e79ae4eb.jpg','2018-02-27 13:34:49','2018-02-27 13:34:49'),
 (12,'Shehnaj Pervin','01659874658','ShehnajPervin@gmail.con','Dhaka','Dinajpur',4,'Female','shehnaj-pervin-2018-02-28-5a967dc7f0add.jpg','2018-02-28 10:00:39','2018-02-28 10:00:39'),
 (13,'Rafiqul Alam','01659874645','akmrafiq@gmail.com','Dhaka','Jessore',2,'Male','rafiqul-alam-2018-02-28-5a967ea270235.jpg','2018-02-28 10:04:18','2018-02-28 10:04:18');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;


--
-- Definition of table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`,`category_id`,`name`,`description`,`price`,`uom_id`,`image`,`created_at`,`updated_at`) VALUES 
 (1,1,'Pizza','Good',350,1,'default.png','2018-02-28 18:00:09','0000-00-00 00:00:00'),
 (2,2,'Sprite','well',22,2,'default.png','2018-02-28 18:00:09','0000-00-00 00:00:00'),
 (3,1,'Bargur','good',120,1,'default.png','2018-02-28 18:00:09','0000-00-00 00:00:00'),
 (5,3,'Rice','Fresh',20,3,'default.png','2018-02-28 18:00:09','2018-02-28 10:08:24'),
 (6,1,'Spring Role','Good',90,1,'default.png','2018-02-28 12:57:41','2018-02-28 12:57:41');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;


--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  `qty` int(10) unsigned DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;


--
-- Definition of table `order_masters`
--

DROP TABLE IF EXISTS `order_masters`;
CREATE TABLE `order_masters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_masters`
--

/*!40000 ALTER TABLE `order_masters` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_masters` ENABLE KEYS */;


--
-- Definition of table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `qty` int(10) unsigned NOT NULL,
  `price` double NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  `payment_method` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`,`name`,`phone`,`address`,`item_id`,`qty`,`price`,`uom_id`,`payment_method`,`created_at`,`updated_at`) VALUES 
 (1,'Ruhul','01710472020','Dhaka',1,2,220,1,'Cash','2018-03-01 00:42:57','0000-00-00 00:00:00'),
 (2,'Mehedi','01728443313','Dhaka',6,2,220,1,'Cash','2018-03-01 05:50:08','2018-03-01 05:50:08'),
 (3,'Abdullah','45687989','Shamoly',1,12,120,1,'Cash','2018-03-10 04:07:54','2018-03-10 04:07:54');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


--
-- Definition of table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` (`id`,`name`,`phone`,`email`,`date`,`message`,`status`,`created_at`,`updated_at`) VALUES 
 (1,'Mizanur','01710472020','mizanurrahman615@gmail.com','2018-03-15','This is test',1,'2018-03-09 18:56:23','2018-03-09 12:56:23'),
 (2,'Mizanur','01710472020','mizanurrahman615@gmail.com','2018-03-15','Test',1,'2018-03-09 19:25:01','2018-03-09 13:25:01'),
 (4,'mikjfjkdf','01710472020','mizanurrahman615@gmail.com','2018-03-15','ghdhfgh',0,'2018-03-09 18:53:38','2018-03-09 12:48:48'),
 (7,'Mehedi','0124898996','mehedi@gmail.com','2018-03-22','this test for mehedi',0,'2018-03-08 05:20:30','2018-03-08 05:20:30'),
 (8,'Ruhul','01575489','ruhul@gmail.com','2018-03-21','this is test for ruhul',0,'2018-03-10 03:23:36','2018-03-10 03:23:36');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;


--
-- Definition of table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`,`name`,`created_at`,`updated_at`) VALUES 
 (1,'Manager','2018-03-05 06:41:51','2018-03-05 06:41:51'),
 (2,'Asst. Manager','2018-03-05 06:41:58','2018-03-05 06:41:58'),
 (3,'Waiter','2018-03-05 06:42:05','2018-03-05 06:42:05'),
 (4,'Cooker','2018-03-05 06:42:19','2018-03-05 06:42:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


--
-- Definition of table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`,`title`,`sub_title`,`image`,`created_at`,`updated_at`) VALUES 
 (7,'Best Food','This is the sub title for best food','best-food-2018-02-25-5a930ae114e02.jpg','2018-02-25 19:13:37','2018-02-25 19:13:37'),
 (8,'Best Snacks','This is the sub title for best Snacks','best-snacks-2018-02-25-5a930b4f133cd.jpg','2018-02-25 19:15:27','2018-02-25 19:15:27'),
 (9,'Best Drinks','This is the sub title for best Drinks','best-drinks-2018-02-25-5a930b7f030fb.jpg','2018-02-25 19:16:15','2018-02-25 19:16:15');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;


--
-- Definition of table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` (`id`,`name`,`phone`,`email`,`address`,`created_at`,`updated_at`) VALUES 
 (1,'dfghdgh','ghdfgh','dfhgh@gmail.com','dhaka','2018-02-27 06:55:22','2018-02-27 06:55:22'),
 (2,'hdgd','dfghdfgh','dfhgh@gmail.com','hfghfgh','2018-02-27 07:15:32','2018-02-27 07:15:32'),
 (3,'htreyt','rtyt','dfhgh@gmail.com','trtre','2018-02-27 16:14:01','2018-02-27 10:14:01');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;


--
-- Definition of table `uoms`
--

DROP TABLE IF EXISTS `uoms`;
CREATE TABLE `uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uoms`
--

/*!40000 ALTER TABLE `uoms` DISABLE KEYS */;
INSERT INTO `uoms` (`id`,`name`,`created_at`,`updated_at`) VALUES 
 (1,'Piece','2018-02-28 18:38:21','2018-02-28 12:38:21'),
 (2,'ML','2018-02-28 18:26:25','0000-00-00 00:00:00'),
 (3,'Plate','2018-02-28 18:26:25','0000-00-00 00:00:00'),
 (4,'Cup','2018-02-28 12:27:11','2018-02-28 12:27:11');
/*!40000 ALTER TABLE `uoms` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'Mizanur Rahman','admin@gmail.com','$2y$10$nblil6GoXNU0Zscln9Wa9.CF.Jq2y2hVfZA.QccFGCCJEMD0qSPnS','YeJvToS7abqKvXirP9JbYStnYFw56FGWdc4bZ1rI5d771fXOUXlqb1Yw5hXp','2018-02-25 09:06:53','2018-02-25 09:06:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
