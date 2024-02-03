-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2019 at 04:33 AM
-- Server version: 5.6.39-cll-lve
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
-- Database: `dguniquecabs_cab`
--

-- --------------------------------------------------------

--
-- Table structure for table `popup_mail`
--

CREATE TABLE `popup_mail` (
  `id` int(11) NOT NULL,
  `mailid` varchar(200) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `popup_mail`
--

INSERT INTO `popup_mail` (`id`, `mailid`, `dt`) VALUES
(1, 'tej123php@gmail.com', '2019-04-03 09:58:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `popup_mail`
--
ALTER TABLE `popup_mail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mailid` (`mailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `popup_mail`
--
ALTER TABLE `popup_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
