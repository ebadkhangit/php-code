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
-- Database: `anfotal_nutritions_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `user_pic` varchar(300) DEFAULT NULL,
  `user_emailid` varchar(100) DEFAULT NULL,
  `user_mobile` varchar(20) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gst_number` varchar(200) DEFAULT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=deactive,1=active',
  `created_by` int(11) DEFAULT NULL,
  `user_create_date` varchar(50) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `user_type` int(1) DEFAULT 0 COMMENT '0=user,1=admin,2=artist'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_name`, `user_password`, `display_name`, `user_pic`, `user_emailid`, `user_mobile`, `company_name`, `address`, `gst_number`, `user_status`, `created_by`, `user_create_date`, `is_delete`, `user_type`) VALUES
(1, 'anfotalnutritioncomadmin', 'aa56c53fb31e66ca7c2714605b452bd3d8c2551d', 'goatshealth', 'assets/user_img/1_5245d86b1b9420cc1f353d19f38383087374f819.png', 'admin@gmail.com', '8989569856', NULL, 'Noida Sector-1o', NULL, 1, 0, NULL, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
