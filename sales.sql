-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 12:48 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) NOT NULL,
  `officeNo` varchar(200) NOT NULL,
  `streetNo` varchar(200) NOT NULL,
  `landMark` varchar(200) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pinCode` int(10) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `officeNo`, `streetNo`, `landMark`, `city`, `state`, `pinCode`, `createdAt`, `updatedAt`) VALUES
(1, 'fdafdas', 'fsasfas', '', 'Rajkot', 'Gujarat', 360005, '2017-11-12 00:38:00', '2017-11-12 00:38:00'),
(2, 'fdafdas', 'fsasfas', '', 'Rajkot', 'Gujarat', 360005, '2017-11-12 00:38:00', '2017-11-12 00:38:00'),
(3, 'fdafdas', 'fsasfas', '', 'Rajkot', 'Gujarat', 360005, '2017-11-12 00:39:45', '2017-11-12 00:39:45'),
(4, 'fdafdas', 'fsasfas', '', 'Rajkot', 'Gujarat', 360005, '2017-11-12 00:39:45', '2017-11-12 00:39:45'),
(5, 'fdafdas', 'fsasfas', '', 'Rajkot', 'Gujarat', 360005, '2017-11-12 00:40:09', '2017-11-12 00:40:09'),
(6, 'fdafdas', 'fsasfas', '', 'Rajkot', 'Gujarat', 360005, '2017-11-12 00:40:10', '2017-11-12 00:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETE') NOT NULL DEFAULT 'ACTIVE',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'Tyre', 'DELETE', '2017-12-17 23:21:46', '2017-12-17 23:30:23'),
(2, 'Tyre', 'ACTIVE', '2017-12-17 23:26:56', '2017-12-17 23:47:43'),
(3, 'Tyre', 'DELETE', '2017-12-17 23:27:15', '2017-12-17 23:30:19'),
(4, 'Tyre', 'DELETE', '2017-12-17 23:27:53', '2017-12-17 23:30:22'),
(5, 'Tube', 'ACTIVE', '2017-12-21 17:21:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_firm_relation`
--

CREATE TABLE `category_firm_relation` (
  `firmId` bigint(20) NOT NULL,
  `categoryId` bigint(20) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_firm_relation`
--

INSERT INTO `category_firm_relation` (`firmId`, `categoryId`, `createdAt`) VALUES
(1, 2, '2017-12-22 23:06:17'),
(1, 3, '2017-12-17 23:30:07'),
(1, 4, '2017-12-17 23:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `firms`
--

CREATE TABLE `firms` (
  `id` bigint(20) NOT NULL,
  `firmName` varchar(200) NOT NULL,
  `billingAddressId` bigint(20) NOT NULL,
  `shippingAddressId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `gstNo` varchar(50) NOT NULL,
  `panNo` varchar(30) NOT NULL,
  `conditions` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETE') NOT NULL DEFAULT 'ACTIVE',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firms`
--

INSERT INTO `firms` (`id`, `firmName`, `billingAddressId`, `shippingAddressId`, `userId`, `gstNo`, `panNo`, `conditions`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'Kirit & Sons Enterprise', 5, 6, 1, 'fdafdsfas', 'fasdfsa', '<p>This is test</p>\r\n\r\n<p>let me know if any issues found</p>\r\n', 'ACTIVE', '2017-11-12 00:40:10', '2017-11-12 00:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `orderBY` bigint(20) NOT NULL,
  `receivedBY` bigint(20) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `totalDiscount` int(11) NOT NULL,
  `totalItems` int(11) NOT NULL,
  `firmId` bigint(20) NOT NULL,
  `invoiceId` varchar(20) NOT NULL,
  `invoiceDate` date NOT NULL,
  `invoiceFilePath` varchar(100) NOT NULL,
  `status` enum('NEW','COMPLETED','CANCELLED') NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` bigint(20) NOT NULL,
  `orderId` bigint(20) NOT NULL,
  `productId` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `discountPP` int(11) NOT NULL,
  `taxPercentage` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `productCode` varchar(30) NOT NULL,
  `categoryId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `pieceInBundle` int(11) NOT NULL,
  `firmId` bigint(20) NOT NULL,
  `discountPP` float NOT NULL DEFAULT '0',
  `discountType` enum('FLAT','PERCENTAGE') NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `status` enum('ACTIVE','INACTIVE','DELETE') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productName`, `productCode`, `categoryId`, `userId`, `pieceInBundle`, `firmId`, `discountPP`, `discountType`, `price`, `status`, `createdAt`, `updatedAt`) VALUES
(1, '26 X 2.125', '123456', 2, 1, 60, 1, 0, 'FLAT', 120, 'DELETE', '2017-12-30 18:12:18', '2017-12-30 18:34:36'),
(2, '26 X 2.125', '123456', 2, 1, 60, 1, 10, 'FLAT', 120, 'ACTIVE', '2017-12-30 18:34:15', '2017-12-30 18:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `roleName` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roleName`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', '2017-07-25 23:26:28', '2017-07-25 23:26:28'),
(2, 'Vendor', '2017-07-25 23:26:28', '2017-07-25 23:26:28'),
(3, 'Dealer', '2017-07-25 23:26:35', '2017-07-25 23:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `status` enum('ENABLE','DISABLE','INAPPROPRIATE') NOT NULL DEFAULT 'ENABLE',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'Sohil Parekh', 'sohilparekh89@gmail.com', '19143e413758421d749d2b8d430861cc5bb12cf3', 'ENABLE', '2017-10-02 23:03:14', '2017-10-02 23:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `userId` bigint(20) NOT NULL,
  `roleId` int(10) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`userId`, `roleId`, `createdAt`) VALUES
(1, 1, '2017-11-12 15:51:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_firm_relation`
--
ALTER TABLE `category_firm_relation`
  ADD PRIMARY KEY (`firmId`,`categoryId`),
  ADD KEY `FK_CATEGORY_FIRM_RELATION_CATEGORY_ID` (`categoryId`);

--
-- Indexes for table `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shippingAddressId` (`shippingAddressId`),
  ADD UNIQUE KEY `billingAddressId` (`billingAddressId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderBY` (`orderBY`),
  ADD KEY `receivedBY` (`receivedBY`),
  ADD KEY `firmId` (`firmId`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `FK_PRODUCT_FIRM_ID` (`firmId`),
  ADD KEY `FK_PRODUCT_USER_ID` (`userId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`userId`,`roleId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `firms`
--
ALTER TABLE `firms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_firm_relation`
--
ALTER TABLE `category_firm_relation`
  ADD CONSTRAINT `FK_CATEGORY_FIRM_RELATION_CATEGORY_ID` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CATEGORY_FIRM_RELATION_FIRM_ID` FOREIGN KEY (`firmId`) REFERENCES `firms` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `firms`
--
ALTER TABLE `firms`
  ADD CONSTRAINT `FK_FIRMS_BILLINGADDRESSID` FOREIGN KEY (`billingAddressId`) REFERENCES `address` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_FIRMS_SHIPPINGADDRESSID` FOREIGN KEY (`shippingAddressId`) REFERENCES `address` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_ORDER_FIRMID` FOREIGN KEY (`firmId`) REFERENCES `firms` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDER_ORDERBY` FOREIGN KEY (`orderBY`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDER_RECEIVEDBY` FOREIGN KEY (`receivedBY`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `FK_ORDERDETAILS_ORDER_ID` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDERDETAILS_PRODUCT_ID` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_PRODUCT_CATEGORY_ID` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRODUCT_FIRM_ID` FOREIGN KEY (`firmId`) REFERENCES `firms` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRODUCT_USER_ID` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `FK_USERROLES_ROLES` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USERROLES_USERS` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
