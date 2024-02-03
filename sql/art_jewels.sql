-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2019 at 05:22 AM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_jewels`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `about_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `about_desc`) VALUES
(6, 'assets/about/15b76d66a44240bb.JPG', 'Arte Jewels not only promise beautiful, well crafted jewellery but also deliver personalised and cared-for consumer experience.\r\n<br>\r\nAn eCommerce initiative was launched in 2017 to make available the jewellery of Arte Jewels for its customers worldwide. The pricing of the jewellery has been retained to be identical to that of the showrooms and the endeavour is to replicate the same incredible shopping experience as is in-store.');

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `order_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `user_emailid` varchar(100) DEFAULT NULL,
  `user_mobile` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(150) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=deactive,1=active',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `user_type` int(1) DEFAULT '0' COMMENT '0=user,1=admin,2=subadmin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `category_image` longtext,
  `created_by_id` int(11) DEFAULT NULL,
  `created_date` varchar(30) DEFAULT NULL,
  `create_date_time` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=active,1=delete',
  `delete_by_id` int(11) DEFAULT NULL,
  `delete_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `created_by_id`, `created_date`, `create_date_time`, `is_delete`, `delete_by_id`, `delete_date`) VALUES
(27, 'Jwellery', 'assets/q4images/category/15b718b5b09993images.jpg', 1, '09-08-2018', '09-08-2018 07:17:50 PM', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` longtext,
  `address_title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `email`, `mobile`, `address`, `address_title`) VALUES
(23, 'mona.budhiraja90@gmail.com', '9654135200', '165,POCKET-1,JASOLA ,New Delhi', 'Corporate Office');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE `payment_gateway` (
  `id` int(11) NOT NULL,
  `pmtgtw_cat` varchar(200) NOT NULL,
  `merchant_key` varchar(240) NOT NULL,
  `salt_key` varchar(240) NOT NULL,
  `dt6` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `pmtgtw_cat`, `merchant_key`, `salt_key`, `dt6`) VALUES
(2, 'payumoney', 'YCTBJwre', 'qQxujxKQtT', '2018-09-21 06:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `product_title` varchar(100) DEFAULT 'NA',
  `Product_titlehindi` varchar(100) DEFAULT NULL,
  `product_weight` varchar(10) DEFAULT NULL,
  `product_qty` varchar(20) DEFAULT NULL,
  `product_price` varchar(10) DEFAULT 'NA',
  `p_discount` varchar(10) NOT NULL DEFAULT '0',
  `img_1` mediumtext,
  `img_2` mediumtext,
  `img_3` mediumtext,
  `img_4` mediumtext,
  `product_desc` longtext,
  `created_by_id` int(11) DEFAULT NULL,
  `create_date_time` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=active,1=delete',
  `weight_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `sub_category_id`, `product_title`, `Product_titlehindi`, `product_weight`, `product_qty`, `product_price`, `p_discount`, `img_1`, `img_2`, `img_3`, `img_4`, `product_desc`, `created_by_id`, `create_date_time`, `is_delete`, `weight_type`) VALUES
(657, 27, NULL, 'Office Stationary', NULL, NULL, '4', '800', '0', 'assets/q4images/products/15bdd5568769acjwl 3.jpg', 'assets/q4images/products/15bdd5568769e9jwl 3.jpg', 'assets/q4images/products/15bdd556876a23jwl 3.jpg', 'assets/q4images/products/15bdd556876a5djwl 3.jpg', 'zdsdfsdfs', NULL, NULL, 0, NULL),
(660, 27, NULL, 'Bracelet 2', NULL, NULL, '10', '2000', '0', 'assets/q4images/products/15bee9fcbb8bc3SAKI0005.jpg', 'assets/q4images/products/15bee9fcbb8c00SAKI0020 B&W.jpg', '', '', 'Test', NULL, NULL, 0, NULL),
(661, 27, NULL, 'Earings', NULL, NULL, '2', '1800', '0', 'assets/q4images/products/15c09fbf604bc11800.jpg', 'assets/q4images/products/15c09fbf604bff1800(1).jpg', 'assets/q4images/products/15c09fbf604c391800(2).jpg', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(662, 27, NULL, 'Earings', NULL, NULL, '2', '2500', '0', 'assets/q4images/products/15c09fc71d977e2500rs.jpg', 'assets/q4images/products/15c09fc71d97be2500rs (2).jpg', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(663, 27, NULL, 'Earings', NULL, NULL, '2', '2750', '0', 'assets/q4images/products/15c09fcca587d62750.jpg', 'assets/q4images/products/15c09fcca588122750(1).jpg', 'assets/q4images/products/15c09fcca5884b2750(2).jpg', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(664, 27, NULL, 'Earings', NULL, NULL, '2', '2785', '0', 'assets/q4images/products/15c09fd10cadde2785(1).jpg', 'assets/q4images/products/15c09fd10cae1e2785(2).jpg', 'assets/q4images/products/15c09fd10cae5b2785(3).jpg', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(665, 27, NULL, 'Earings', NULL, NULL, '2', '3000', '0', 'assets/q4images/products/15c09fd9001e263000rs.jpg', 'assets/q4images/products/15c09fd9001e633000(2).jpg', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(666, 27, NULL, 'Jhumki', NULL, NULL, '2', '3500', '0', 'assets/q4images/products/15c09fddd805a23500 jhumkis(1).jpg', 'assets/q4images/products/15c09fddd805df3500 jhumkis (2).jpg', '', '', 'Jhumki', NULL, NULL, 0, NULL),
(667, 27, NULL, 'Earings', NULL, NULL, '2', '3500', '0', 'assets/q4images/products/15c09fe0925f7d3500.jpg', 'assets/q4images/products/15c09fe0925fb93500(2).jpg', 'assets/q4images/products/15c09fe0925ff33500(3).jpg', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(668, 27, NULL, 'Earings', NULL, NULL, '2', '3560', '0', 'assets/q4images/products/15c09fe52ecc703560.jpg', 'assets/q4images/products/15c09fe52ecd053560(1).jpg', 'assets/q4images/products/15c09fe52ecd443560(2).jpg', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(669, 27, NULL, 'Earings', NULL, NULL, '2', '3600', '0', 'assets/q4images/products/15c09fe9bb929b3600(1).jpg', '', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(670, 27, NULL, 'Hand Printed Ganesha Earings', NULL, NULL, '2', '3600', '0', 'assets/q4images/products/15c09fed7a89883600hand printed ganesha earings.jpg', '', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(671, 27, NULL, 'Pearl', NULL, NULL, '2', '4500', '0', 'assets/q4images/products/15c09ffb48d80a4500 (pearl 1).jpg', '', '', '', '&lt;br&gt;', NULL, NULL, 0, NULL),
(672, 27, NULL, 'Earings', NULL, NULL, '2', '4500', '0', 'assets/q4images/products/15c09ffe5dd4ec4500(1).jpg', 'assets/q4images/products/15c09ffe5dd5294500(2).jpg', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(673, 27, NULL, 'Earings', NULL, NULL, '2', '4500', '0', 'assets/q4images/products/15c0a002c5cb874500(a).jpg', 'assets/q4images/products/15c0a002c5cbc34500(b).jpg', 'assets/q4images/products/15c0a002c5cbfd4500(c).jpg', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(674, 27, NULL, 'All Set With Dual Tone', NULL, NULL, '2', '3600', '0', 'assets/q4images/products/15c0a0059b0654all set with dual tone3600.jpg', '', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(675, 27, NULL, 'Blue Saphires And Pearl Never Go Wrong', NULL, NULL, '2', '4500', '0', 'assets/q4images/products/15c0a01052d199blue saphires and pearls never go wrong 4500.jpg', '', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(676, 27, NULL, 'Fusion Earings', NULL, NULL, '2', '4500', '0', 'assets/q4images/products/15c0a017e674b8fusion earings 4500.jpg', '', '', '', 'Fusion Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(677, 27, NULL, 'Hand Printed Ganesha Earings', NULL, NULL, '2', '3000', '0', 'assets/q4images/products/15c0a01de90cbdhand printed ganesha 3000.jpg', '', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL),
(678, 27, NULL, 'Mandakini Jhumkas', NULL, NULL, '2', '4500', '0', 'assets/q4images/products/15c0a0271935a4mandakani jhumkas 4500.jpg', '', '', '', 'Jhumkas', NULL, NULL, 0, NULL),
(679, 27, NULL, 'Real Turquoise Studs', NULL, NULL, '2', '2785', '0', 'assets/q4images/products/15c0a04f46cda4real turquoise studs 2785.jpg', '', '', '', 'Earings&lt;br&gt;', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_path` longtext,
  `f_title` varchar(1000) NOT NULL,
  `s_title` varchar(1000) NOT NULL,
  `third_title` varchar(100) NOT NULL,
  `slider_status` tinyint(4) NOT NULL DEFAULT '0',
  `priority` tinyint(4) NOT NULL DEFAULT '0',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=active,1=delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_path`, `f_title`, `s_title`, `third_title`, `slider_status`, `priority`, `is_delete`) VALUES
(52, 'assets/q4images/slider/15ba216de20a99banner-1.jpg', 'save up to 50%', 'LET YOU ', 'SPARKLE', 0, 0, 0),
(53, 'assets/q4images/slider/15ba2176e9a4e7banner-2.jpg', 'FEATURING', 'Exclusive', 'JEWELLERY COLLECTION', 0, 0, 0),
(54, 'assets/q4images/slider/15ba217a0a8362banner-3.jpg', 'Shine', 'Sparkle', 'Clearance Sale', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) DEFAULT NULL,
  `sub_category_image` longtext,
  `created_by_id` int(11) DEFAULT NULL,
  `created_date` varchar(30) DEFAULT NULL,
  `create_date_time` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=active,1=delete',
  `category_status` tinyint(4) NOT NULL DEFAULT '0',
  `delete_by_id` int(11) DEFAULT NULL,
  `delete_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_image`, `created_by_id`, `created_date`, `create_date_time`, `is_delete`, `category_status`, `delete_by_id`, `delete_date`) VALUES
(54, 27, 'Silver', 'no file choose', 1, '13-08-2018', '13-08-2018 06:48:09 PM', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `forget_password` varchar(50) DEFAULT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `user_pic` varchar(300) DEFAULT NULL,
  `user_emailid` varchar(100) DEFAULT NULL,
  `user_mobile` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(150) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=deactive,1=active',
  `created_by` int(11) DEFAULT NULL,
  `user_create_date` varchar(50) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `user_type` int(1) DEFAULT '0' COMMENT '0=user,1=admin,2=subadmin',
  `unique_id` varchar(200) DEFAULT NULL,
  `confirm_dt` varchar(30) DEFAULT NULL,
  `confirm_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_name`, `user_password`, `forget_password`, `f_name`, `l_name`, `display_name`, `user_pic`, `user_emailid`, `user_mobile`, `country`, `state`, `city`, `street`, `company`, `pincode`, `user_status`, `created_by`, `user_create_date`, `is_delete`, `user_type`, `unique_id`, `confirm_dt`, `confirm_status`) VALUES
(1, 'admin', '07d698c962f4d0c7107aa9498405821f7ff937bc', NULL, 'Mona', 'Budhiraja', 'Mona Budhiraja', 'assets/user_img/default.jpg', 'mona.budhiraja90@gmail.com', '9654135200', 'India', 'Up', 'M', 'J', '', '201301', 0, NULL, NULL, 0, 1, NULL, NULL, 0),
(183, 'tejsingh', '92ebd8ec0b6f26d2c2b1ef25b3260a9a44cf730a', 'tej', 'Tej', 'Singh', 'Tej Singh', 'assets/user_img/default.jpg', 'tej123php@gmail.com', '9711522294', 'India', 'Up', 'M', 'J', '', '201301', 0, NULL, '20-04-2019', 0, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(20) DEFAULT NULL,
  `order_type` varchar(80) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `item_code` varchar(100) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `path` mediumtext,
  `weight` varchar(20) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
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
  `product_enq` mediumtext,
  `status` varchar(300) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `order_date` varchar(30) DEFAULT NULL,
  `status_dt` varchar(30) DEFAULT NULL,
  `txn_id` varchar(100) DEFAULT NULL,
  `online_payment` varchar(10) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `payment_dt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `order_no`, `order_type`, `user_name`, `product_id`, `item_code`, `title`, `path`, `weight`, `qty`, `price`, `discount`, `sub_total`, `total_discount`, `grand_total`, `country`, `state`, `city`, `street`, `post_code`, `f_name`, `l_name`, `email`, `mobile`, `company`, `product_enq`, `status`, `is_delete`, `order_date`, `status_dt`, `txn_id`, `online_payment`, `payment_status`, `payment_dt`) VALUES
(334, '3335baa', 'payuMoney', 'tej123php@gmail.com', 652, NULL, 'Earing', 'assets/q4images/products/15b9b511bd16daj2.jpg', NULL, 1, '600', NULL, NULL, NULL, '900', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Shift', 0, '25-09-2018 04:07:44 PM', '2018-09-25 07:10:05', 'f9b76a16650e2ccdc3ba', NULL, 'failure', '2018-09-25 16:07:55'),
(335, '3335baa', 'payuMoney', 'tej123php@gmail.com', 649, NULL, 'Earing', 'assets/q4images/products/15b9b4f2f17592j-4.jpg', NULL, 1, '300', NULL, NULL, NULL, '900', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Shift', 0, '25-09-2018 04:07:44 PM', '2018-09-25 07:10:05', 'f9b76a16650e2ccdc3ba', NULL, 'failure', '2018-09-25 16:07:55'),
(336, '3355baa', 'payuMoney', 'tej123php@gmail.com', 654, NULL, 'Pandle', 'assets/q4images/products/15b9b877eac9a3art-4.jpg', NULL, 1, '200', NULL, NULL, NULL, '700', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 04:11:42 PM', NULL, '350a8ef65d5b3e72e8db', NULL, 'failure', '2018-09-25 16:11:53'),
(337, '3355baa', 'payuMoney', 'tej123php@gmail.com', 650, NULL, 'Earing', 'assets/q4images/products/15b9b4f54ca190j-5.jpg', NULL, 1, '500', NULL, NULL, NULL, '700', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 04:11:42 PM', NULL, '350a8ef65d5b3e72e8db', NULL, 'failure', '2018-09-25 16:11:53'),
(338, '3375baa', 'payuMoney', 'tej123php@gmail.com', 652, NULL, 'Earing', 'assets/q4images/products/15b9b511bd16daj2.jpg', NULL, 1, '600', NULL, NULL, NULL, '600', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 04:30:35 PM', NULL, '857ebf585a85f6338ace', NULL, 'failure', '2018-09-25 17:32:32'),
(339, '3385baa', 'payuMoney', 'tej123php@gmail.com', 647, NULL, 'Earing', 'assets/q4images/products/15b9b4eeb50436j2.jpg', NULL, 2, '5600', NULL, NULL, NULL, '11500', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 05:33:37 PM', NULL, 'c0023423b5d25370ada7', NULL, 'success', '2018-09-25 17:35:57'),
(340, '3385baa', 'payuMoney', 'tej123php@gmail.com', 649, NULL, 'Earing', 'assets/q4images/products/15b9b4f2f17592j-4.jpg', NULL, 1, '300', NULL, NULL, NULL, '1', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 05:33:37 PM', NULL, 'c0023423b5d25370ada7', NULL, 'success', '2018-09-25 17:35:57'),
(341, '3405baa', 'payuMoney', 'tej123php@gmail.com', 652, NULL, 'Earing', 'assets/q4images/products/15b9b511bd16daj2.jpg', NULL, 1, '600', NULL, NULL, NULL, '600', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 05:49:49 PM', NULL, 'bcc9bdd2cf6d6ff797d6', NULL, 'failure', '2018-09-25 17:50:06'),
(342, '3415baa', NULL, 'tej123php@gmail.com', 653, NULL, 'Braclet', 'assets/q4images/products/15b9b51388eb0dj-1.jpg', NULL, 1, '15000', NULL, NULL, NULL, '15000', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 1, '25-09-2018 05:50:31 PM', NULL, NULL, NULL, NULL, NULL),
(343, '3425baa', 'COD', 'tej123', 645, NULL, 'Ring', 'assets/q4images/products/15b9b4dbdc7580art-7.jpg', NULL, 1, '406', NULL, NULL, NULL, '406', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 06:55:15 PM', NULL, NULL, NULL, NULL, NULL),
(344, '3435baa', 'COD', 'tej123', 643, NULL, 'Ring3', 'assets/q4images/products/15b9b4d34cb0bddownload.jpg', NULL, 1, '800', NULL, NULL, NULL, '6500', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 06:56:23 PM', NULL, NULL, NULL, NULL, NULL),
(345, '3435baa', 'COD', 'tej123', 642, NULL, 'Necklace', 'assets/q4images/products/15b9b4d1131f5fart-5.jpg', NULL, 1, '4500', NULL, NULL, NULL, '6500', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 06:56:23 PM', NULL, NULL, NULL, NULL, NULL),
(346, '3435baa', 'COD', 'tej123', 636, NULL, 'Branding', 'assets/q4images/products/15b99f70f533bfbanner-1.jpg', NULL, 3, '400', NULL, NULL, NULL, '6500', 'Egypt', 'Arkansas', 'NOIDA', 'A 200, Noida', '201304', 'Tej', 'Singh', 'tej123php@gmail.com', '9711522294', NULL, '', 'Process', 0, '25-09-2018 06:56:23 PM', NULL, NULL, NULL, NULL, NULL),
(347, '3465bac', 'COD', 'sanjay87verma@gmail.com', 653, NULL, 'Braclet', 'assets/q4images/products/15b9b51388eb0dj-1.jpg', NULL, 3, '15000', NULL, NULL, NULL, '45000', 'India', 'Uttar Pradesh', 'Noida', 'Noida, Uttar Pradesh, India', '201301', 'Sanjay Kumar', 'Kumar', 'sanjay87verma@gmail.com', '+918588964420', NULL, '', 'Process', 1, '27-09-2018 12:21:41 PM', NULL, NULL, NULL, NULL, NULL),
(348, '3475c09', 'payuMoney', 'admin', 661, NULL, 'Earings', 'assets/q4images/products/15c09fbf604bc11800.jpg', NULL, 1, '1800', NULL, NULL, NULL, '1800', 'India', 'Uttar Pradesh', 'Noida', 'Noida, Uttar Pradesh, India', '201301', 'Mona', 'Budhiraja', 'mona.budhiraja90@gmail.com', '9654135200', NULL, '', 'Process', 0, '07-12-2018 10:21:07 AM', NULL, '5cfaacfdd696059b4a83', '1800.00', 'failure', '2018-12-07 10:22:07'),
(349, '3485cba', 'COD', 'vishal@gtspvtltd.com', 668, NULL, 'Earings', 'assets/q4images/products/15c09fe52ecc703560.jpg', NULL, 1, '3560', NULL, NULL, NULL, '3560', 'India', 'Up', 'Noida', 'C-239', '201301', 'Sanjay', 'Verma', 'vishal@gtspvtltd.com', '8588964420', NULL, '', 'Process', 0, '20-04-2019 11:49:50 AM', NULL, NULL, NULL, NULL, NULL),
(350, '3495cba', 'COD', 'vishu.sahr@gmail.com', 657, NULL, 'Office Stationary', 'assets/q4images/products/15bdd5568769acjwl 3.jpg', NULL, 1, '800', NULL, NULL, NULL, '800', 'India', 'Up', 'M', 'J', '201301', 'V', 'S', 'vishu.sahr@gmail.com', '9867196909', NULL, '', 'Process', 0, '20-04-2019 03:12:27 PM', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `emailid` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(30) DEFAULT NULL,
  `txn_id` varchar(100) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `product_info` mediumtext,
  `status` varchar(100) DEFAULT NULL,
  `dt` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `user_id`, `name`, `emailid`, `mobile_no`, `txn_id`, `amount`, `product_info`, `status`, `dt`) VALUES
(8, 139, 'TejSingh', 'tej123php@gmail.com', '9711522294', '83aee4c6605d174e89fa', '200.00', 'Earing', 'failure', '2018-09-22'),
(7, 139, 'TejSingh', 'tej123php@gmail.com', '9711522294', '234a3253fac151897fd4', '600.00', 'Earing', 'failure', '2018-09-22'),
(6, 0, 'TejSingh', 'tej123php@gmail.com', '9711522294', 'e39e0613c11f24b3e616', '4500.00', 'Necklace', 'failure', '2018-09-22'),
(5, 0, 'TejSingh', 'tej123php@gmail.com', '9711522294', 'd560693996f1170aa4c8', '1.00', 'success', 'Earing', '2018-09-22'),
(9, 159, 'TejSingh', 'tej123php@gmail.com', '9711522294', '9f049d2144d2535acee4', '5600.00', 'Earing', 'failure', '2018-09-22'),
(10, 0, 'TejSingh', 'tej123php@gmail.com', '9711522294', '49bffb3cd374cdaf7b7a', '700.00', 'Earing', 'failure', '2018-09-25'),
(11, 0, 'TejSingh', 'tej123php@gmail.com', '9711522294', '72b772b1d29c1c31ed0f', '4500.00', 'Necklace', 'failure', '2018-09-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `user_emailid` (`user_emailid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_emailid` (`user_emailid`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=680;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
