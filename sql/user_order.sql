-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2024 at 10:24 PM
-- Server version: 10.6.16-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naturalfrag_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL COMMENT '0=guest user',
  `order_no` varchar(20) DEFAULT NULL,
  `product_id` int(5) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `item_code` varchar(100) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `path` mediumtext DEFAULT NULL,
  `qty` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `sub_total` varchar(10) DEFAULT NULL,
  `total_discount` varchar(5) DEFAULT NULL,
  `grand_total` varchar(15) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `post_code` varchar(20) DEFAULT NULL,
  `f_name` varchar(30) DEFAULT NULL,
  `l_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `product_enq` mediumtext DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL COMMENT '1=Pending,2=Processing,3=Shipped,4=Canceled',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `order_date` varchar(30) DEFAULT NULL,
  `status_dt` varchar(30) DEFAULT NULL,
  `order_type` varchar(100) DEFAULT NULL,
  `txn_id` varchar(100) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `payment_dt` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `order_no`, `product_id`, `user_id`, `user_name`, `item_code`, `title`, `path`, `qty`, `price`, `discount`, `sub_total`, `total_discount`, `grand_total`, `country`, `state`, `city`, `street`, `post_code`, `f_name`, `l_name`, `email`, `mobile`, `company`, `product_enq`, `status`, `is_delete`, `order_date`, `status_dt`, `order_type`, `txn_id`, `payment_type`, `payment_status`, `payment_dt`) VALUES
(60, '65bb71', 804, 21, 'amzad', NULL, 'Green apple', 'assets/images/product/1_7020d95b1cb4148bae1deb8128227ad992efa6bb.png', '1', '1', NULL, NULL, NULL, '1', 'India', 'UP', 'Wdwd', 'Wdfe', '343556', 'Amzad', 'Khan', 'amzad@gmail.com', '9267965520', 'Wffef', '', '3', 0, '01-02-2024 03:54:45 PM', '2024-02-01 03:55:12', NULL, NULL, 'Online', NULL, NULL),
(61, '6065bca0', 804, 21, 'amzad', NULL, 'Green apple', 'assets/images/product/1_7020d95b1cb4148bae1deb8128227ad992efa6bb.png', '1', '1', NULL, NULL, NULL, '1', 'India', 'UP', 'Noida', 'Noida Sector-4', '201301', 'Amzad', 'Khan', 'amzad@gmail.com', '9267965520', 'Anfotal', '', '3', 0, '02-02-2024 01:28:56 PM', '2024-02-02 01:30:37', NULL, NULL, 'Online', NULL, NULL),
(62, '6165bccd', 807, 26, 'dan', NULL, 'Majmua', 'assets/images/product/1_52c0223e1eb7bf5d8a39bf84d17a56acb7187684.jpg', '1', '899', NULL, NULL, NULL, '899', 'India', 'UP', '', '', '', 'Dan', 'Nf', 'danish@a.inn', '9869768', '', '', '2', 0, '02-02-2024 04:39:43 PM', NULL, NULL, NULL, 'Cod', NULL, NULL),
(63, '6265bccd', 807, 26, 'dan', NULL, 'Majmua', 'assets/images/product/1_52c0223e1eb7bf5d8a39bf84d17a56acb7187684.jpg', '1', '899', NULL, NULL, NULL, '899', 'India', 'UP', '', '', '', 'Dan', 'Nf', 'danish@a.inn', '9869768', '', '', '2', 0, '02-02-2024 04:39:59 PM', NULL, NULL, NULL, 'Cod', NULL, NULL),
(64, '6365bccd', 807, 26, 'dan', NULL, 'Majmua', 'assets/images/product/1_52c0223e1eb7bf5d8a39bf84d17a56acb7187684.jpg', '1', '899', NULL, NULL, NULL, '899', 'India', 'UP', '', '', '', 'Dan', 'Nf', 'danish@a.inn', '9869768', '', '', '2', 0, '02-02-2024 04:40:14 PM', NULL, NULL, NULL, 'Cod', NULL, NULL),
(65, '6465bccd', 807, 26, 'dan', NULL, 'Majmua', 'assets/images/product/1_52c0223e1eb7bf5d8a39bf84d17a56acb7187684.jpg', '1', '899', NULL, NULL, NULL, '899', 'India', 'UP', '', '', '', 'Dan', 'Nf', 'danish@a.inn', '9869768', '', '', '2', 0, '02-02-2024 04:40:30 PM', NULL, NULL, NULL, 'Cod', NULL, NULL),
(66, '6565bccd', 807, 26, 'dan', NULL, 'Majmua', 'assets/images/product/1_52c0223e1eb7bf5d8a39bf84d17a56acb7187684.jpg', '1', '899', NULL, NULL, NULL, '899', 'India', 'UP', '', '', '', 'Dan', 'Nf', 'danish@a.inn', '9869768', '', '', '2', 0, '02-02-2024 04:40:46 PM', NULL, NULL, NULL, 'Cod', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '0=guest user', AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
