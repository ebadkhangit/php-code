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
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) DEFAULT NULL,
  `sub_category_image` longtext DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_date` varchar(30) DEFAULT NULL,
  `create_date_time` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=delete',
  `category_status` tinyint(4) NOT NULL DEFAULT 0,
  `delete_by_id` int(11) DEFAULT NULL,
  `delete_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_image`, `created_by_id`, `created_date`, `create_date_time`, `is_delete`, `category_status`, `delete_by_id`, `delete_date`) VALUES
(81, 39, 'Fragrance', 'assets/images/sub-category/1_77a87e3ffc16f11b60585f04e078b4ea0d7894e4.jpg', NULL, '17-04-2023', NULL, 0, 0, NULL, NULL),
(82, 40, 'Perfumes', 'assets/images/sub-category/1_77a87e3ffc16f11b60585f04e078b4ea0d7894e4.jpg', NULL, '17-04-2023', NULL, 0, 0, NULL, NULL),
(83, 41, 'Ceramic Candles', 'assets/images/sub-category/1_2b723bc6fd8b1fb6de863fd5450440169189a201.jpg', NULL, '18-04-2023', NULL, 0, 0, NULL, NULL),
(84, 41, 'Travel & Tin Candles', 'assets/images/sub-category/1_2b723bc6fd8b1fb6de863fd5450440169189a201.jpg', NULL, '18-04-2023', NULL, 0, 0, NULL, NULL),
(85, 41, '3 Wick Candles', 'assets/images/sub-category/1_2b723bc6fd8b1fb6de863fd5450440169189a201.jpg', NULL, '18-04-2023', NULL, 0, 0, NULL, NULL),
(86, 41, 'Pillar Candles', 'assets/images/sub-category/1_2b723bc6fd8b1fb6de863fd5450440169189a201.jpg', NULL, '18-04-2023', NULL, 0, 0, NULL, NULL),
(87, 41, 'Scented Jar Candles', 'assets/images/sub-category/1_2b723bc6fd8b1fb6de863fd5450440169189a201.jpg', NULL, '18-04-2023', NULL, 0, 0, NULL, NULL),
(88, 41, 'Votives', 'assets/images/sub-category/1_2b723bc6fd8b1fb6de863fd5450440169189a201.jpg', NULL, '18-04-2023', NULL, 0, 0, NULL, NULL),
(89, 41, 'Soy Candles', 'assets/images/sub-category/1_2b723bc6fd8b1fb6de863fd5450440169189a201.jpg', NULL, '18-04-2023', NULL, 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
