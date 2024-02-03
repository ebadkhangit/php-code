-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2024 at 10:22 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `page_name` varchar(100) DEFAULT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `category_image` longtext DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_date` varchar(30) DEFAULT NULL,
  `create_date_time` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=delete',
  `delete_by_id` int(11) DEFAULT NULL,
  `delete_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `page_name`, `category_name`, `category_image`, `created_by_id`, `created_date`, `create_date_time`, `is_delete`, `delete_by_id`, `delete_date`) VALUES
(39, NULL, 'Attar', 'assets/images/category/1_77a87e3ffc16f11b60585f04e078b4ea0d7894e4.jpg', NULL, '17-04-2023', NULL, 0, NULL, NULL),
(40, NULL, 'Perfume', 'assets/images/category/1_77a87e3ffc16f11b60585f04e078b4ea0d7894e4.jpg', NULL, '17-04-2023', NULL, 0, NULL, NULL),
(41, NULL, 'Room Freshners', 'assets/images/category/1_2b723bc6fd8b1fb6de863fd5450440169189a201.jpg', NULL, '18-04-2023', NULL, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
