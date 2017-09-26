-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2017 at 06:46 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--
CREATE DATABASE IF NOT EXISTS `sales` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sales`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--
-- Creation: Sep 26, 2017 at 04:42 PM
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) NOT NULL,
  `neighbourhood` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `address`:
--

--
-- Truncate table before insert `address`
--

TRUNCATE TABLE `address`;
-- --------------------------------------------------------

--
-- Table structure for table `firms`
--
-- Creation: Jul 26, 2017 at 05:13 PM
--

DROP TABLE IF EXISTS `firms`;
CREATE TABLE IF NOT EXISTS `firms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `billingAddressId` bigint(20) NOT NULL,
  `shippingAddressId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `gstNo` varchar(50) NOT NULL,
  `panNo` varchar(30) NOT NULL,
  `conditions` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shippingAddressId` (`shippingAddressId`),
  UNIQUE KEY `billingAddressId` (`billingAddressId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `firms`:
--   `billingAddressId`
--       `address` -> `id`
--   `shippingAddressId`
--       `address` -> `id`
--

--
-- Truncate table before insert `firms`
--

TRUNCATE TABLE `firms`;
-- --------------------------------------------------------

--
-- Table structure for table `order`
--
-- Creation: Sep 05, 2017 at 05:20 PM
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `orderBY` bigint(20) NOT NULL,
  `receivedBY` bigint(20) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `totalDiscount` int(11) NOT NULL,
  `totalItems` int(11) NOT NULL,
  `invoiceId` varchar(20) NOT NULL,
  `invoiceDate` date NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `orderBY` (`orderBY`),
  KEY `receivedBY` (`receivedBY`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `order`:
--   `orderBY`
--       `users` -> `id`
--   `receivedBY`
--       `users` -> `id`
--

--
-- Truncate table before insert `order`
--

TRUNCATE TABLE `order`;
-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--
-- Creation: Jul 26, 2017 at 05:13 PM
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `orderId` bigint(20) NOT NULL,
  `productId` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `discountPP` int(11) NOT NULL,
  `taxPercentage` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `orderId` (`orderId`),
  KEY `productId` (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `orderdetails`:
--   `orderId`
--       `order` -> `id`
--   `productId`
--       `product` -> `id`
--

--
-- Truncate table before insert `orderdetails`
--

TRUNCATE TABLE `orderdetails`;
-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Sep 05, 2017 at 04:44 PM
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `code` varchar(30) NOT NULL,
  `discountPP` int(11) DEFAULT '0',
  `firmId` bigint(20) NOT NULL,
  `pieceInBundle` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETE') NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `firmId` (`firmId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `product`:
--   `firmId`
--       `firms` -> `id`
--

--
-- Truncate table before insert `product`
--

TRUNCATE TABLE `product`;
-- --------------------------------------------------------

--
-- Table structure for table `roles`
--
-- Creation: Jul 24, 2017 at 05:33 PM
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(30) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `roles`:
--

--
-- Truncate table before insert `roles`
--

TRUNCATE TABLE `roles`;
--
-- Dumping data for table `roles`
--

INSERT IGNORE INTO `roles` (`id`, `roleName`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', '2017-07-25 17:56:28', '2017-07-25 17:56:28'),
(2, 'Vendor', '2017-07-25 17:56:28', '2017-07-25 17:56:28'),
(3, 'Dealer', '2017-07-25 17:56:35', '2017-07-25 17:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--
-- Creation: Jul 26, 2017 at 05:15 PM
--

DROP TABLE IF EXISTS `userroles`;
CREATE TABLE IF NOT EXISTS `userroles` (
  `userId` bigint(20) NOT NULL,
  `roleId` int(10) NOT NULL,
  PRIMARY KEY (`userId`,`roleId`),
  KEY `userId` (`userId`),
  KEY `roleId` (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `userroles`:
--   `roleId`
--       `roles` -> `id`
--   `userId`
--       `users` -> `id`
--

--
-- Truncate table before insert `userroles`
--

TRUNCATE TABLE `userroles`;
-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jul 24, 2017 at 05:31 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `firms`
--
ALTER TABLE `firms`
  ADD CONSTRAINT `FK_FIRMS_BILLINGADDRESSID` FOREIGN KEY (`billingAddressId`) REFERENCES `address` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_FIRMS_SHIPPINGADDRESSID` FOREIGN KEY (`shippingAddressId`) REFERENCES `address` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_ORDER_ORDERBY` FOREIGN KEY (`orderBY`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDER_RECEIVEDBY` FOREIGN KEY (`receivedBY`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK_ORDERDETAILS_ORDER_ID` FOREIGN KEY (`orderId`) REFERENCES `order` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDERDETAILS_PRODUCT_ID` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_PRODUCT_FIRM_ID` FOREIGN KEY (`firmId`) REFERENCES `firms` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `userroles`
--
ALTER TABLE `userroles`
  ADD CONSTRAINT `FK_USERROLES_ROLES` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USERROLES_USERS` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
