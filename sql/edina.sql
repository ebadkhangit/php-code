-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 06:26 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edina`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `a_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `vision` mediumtext DEFAULT NULL,
  `mission` mediumtext DEFAULT NULL,
  `about_desc` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`a_id`, `image`, `vision`, `mission`, `about_desc`) VALUES
(25, 'assets/about/15ccd4460e077cimages (1).jpg', '&nbsp;This is the common name whisch 9is the main feauture.&nbsp;This is the common name whisch 9is the main feauture,&nbsp;This is the common name whisch 9is the main feauture.&nbsp;This is the common name whisch 9is the main feauture', '&nbsp;This is the common name whisch 9is the main feauture .&nbsp;This is the common name whisch 9is the main feauture.&nbsp;This is the common name whisch 9is the main feauture.&nbsp;This is the common name whisch 9is the main feauture', '<span open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\" style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0);\">Lorem Ipsum</span><span open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\" style=\"color: rgb(0, 0, 0);\">&nbsp;is si&nbsp; xxdc this the common name&nbsp;</span>&nbsp;This is the common name whisch 9is the main feauture&nbsp;&nbsp;This is the common name whisch 9is the main feauture<div>&nbsp;This is the common name whisch 9is the main feauture<br></div><div>&nbsp;This is the common name whisch 9is the main feauture<br></div>');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `c_id` int(11) NOT NULL,
  `address_title` varchar(100) DEFAULT NULL,
  `mobile1` varchar(20) DEFAULT NULL,
  `mobile2` varchar(20) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `address1` longtext DEFAULT NULL,
  `address2` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`c_id`, `address_title`, `mobile1`, `mobile2`, `email1`, `email2`, `address1`, `address2`) VALUES
(1, 'Corporate Office', '9191919191', '+1 347 592 8847', 'care@englishsafari.com', NULL, 'noida', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `category_image` longtext DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_date` varchar(30) DEFAULT NULL,
  `create_date_time` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=delete',
  `delete_by_id` int(11) DEFAULT NULL,
  `delete_date` varchar(30) DEFAULT NULL,
  `category_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `created_by_id`, `created_date`, `create_date_time`, `is_delete`, `delete_by_id`, `delete_date`, `category_path`) VALUES
(22, 'Phonics Safari', 'assets/category/1_d9f404835bd2ae3fe52faef2edaa56a145279fa6.png', NULL, '2019-04-04 02:06:29 PM', NULL, 0, NULL, NULL, 'phonics.php'),
(23, 'Grammer Safari', 'assets/category/1_6defd34ef273785f5cc80531871fb21bd9f7238c.png', NULL, '2019-04-04 02:06:47 PM', NULL, 0, NULL, NULL, 'grammer.php');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `key`, `value`, `date_created`) VALUES
(1, 'authorizenet_login_id', '6jwtD9VQ4V', '2014-12-04 05:13:59'),
(2, 'authorizenet_transaction_key', '36t2ZF5A9ZJ79ze8', '2014-12-04 05:13:59'),
(3, 'authorizenet_environment', 'production', '2014-12-04 05:13:59'),
(4, 'payment_type', 'input', '2014-12-04 05:13:59'),
(5, 'https_redirect', '0', '2014-12-04 05:13:59'),
(6, 'email', 'tej123php@gmail.com', '2014-12-04 05:13:59'),
(7, 'show_description', '1', '2014-12-04 05:13:59'),
(8, 'page_title', 'OSSMIDO', '2014-12-04 05:13:59'),
(9, 'show_billing_address', '1', '2014-12-04 05:13:59'),
(10, 'name', 'Tej Singh', '2014-12-04 16:49:55'),
(11, 'enable_paypal', '1', '2014-12-04 19:22:47'),
(12, 'enable_subscriptions', 'authorizenet_only', '2014-12-04 21:03:15'),
(13, 'paypal_email', 'info@ossmido.com', '2014-12-04 22:59:49'),
(14, 'subscription_length', '0', '2014-12-08 21:11:49'),
(15, 'subscription_interval', '1', '2014-12-08 21:13:06'),
(16, 'paypal_environment', 'production', '2014-12-11 19:24:45'),
(17, 'currency', 'USD', '2014-12-30 04:29:16'),
(18, 'enable_trial', '0', '2014-12-31 17:48:23'),
(19, 'trial_days', '7', '2014-12-31 18:03:34'),
(20, 'notification_status', 'check', '2014-12-31 17:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

CREATE TABLE `contact_enquiry` (
  `con_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `subject` mediumtext NOT NULL,
  `message` longtext NOT NULL,
  `dt` varchar(30) DEFAULT NULL,
  `status` mediumtext DEFAULT NULL,
  `status_dt` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_enquiry`
--

INSERT INTO `contact_enquiry` (`con_id`, `name`, `email`, `mobile`, `subject`, `message`, `dt`, `status`, `status_dt`) VALUES
(27, 'Ebad khan', 'ebadullah76@gmail.com', '9555479369', 'xcszcsc', 'xccvsdc', '29-04-2019 02:37:44 PM', NULL, NULL),
(25, 'Ebad khan', 'ebadullah7689@gmail.com', '9555479369', 'FFRTGRGR', 'EDFEFGEFGE', '', NULL, NULL),
(26, 'Ebad khan', 'ebadullah76@gmail.com', '8882246311', 'Hiii', 'Ghjj', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_emailid` varchar(200) DEFAULT NULL,
  `user_mobile` varchar(50) DEFAULT NULL,
  `user_messg` mediumtext DEFAULT NULL,
  `dt` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_name`, `user_emailid`, `user_mobile`, `user_messg`, `dt`) VALUES
(26, 'Tej singh', 'tej123php@gmail.com', '9711522294', 'testing contactus', '19-10-2018 03:49:35 PM'),
(25, 'Tej singh', 'tej123php@gmail.com', '9711522294', 'Welcone India', '19-10-2018 12:50:15 PM'),
(24, 'Tej singh', 'tej123php@gmail.com', '9711522294', 'Welcome testing by developer', '19-10-2018 12:33:42 PM'),
(22, 'Tej singh', 'tej123php@gmail.com', '9711522294', 'welcome', '19-10-2018 12:26:55 PM'),
(23, 'Tej singh', 'tej123php@gmail.com', '9711522294', 'Hiiiiiiii', '19-10-2018 12:28:56 PM'),
(27, 'dharnmwy', 'sample@email.tst', '987-65-4329', '1', '16-11-2018 03:40:06 AM'),
(28, 'yprfdbkm', 'sample@email.tst', '987-65-4329', '1', '18-11-2018 07:22:34 PM'),
(29, 'Danielevipt', 'yourmail@gmail.com', '87124887565', 'Hello. And Bye.', '22-12-2018 01:41:24 PM');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `date_created`) VALUES
(1, 'Test payment', '11.00', '2018-11-30 13:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` int(11) NOT NULL,
  `news` longtext DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`n_id`, `news`, `created_date`) VALUES
(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s<br>', '2019-05-03 12:08:27 PM'),
(6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\'s standard dummy text ever since the 1700s<br>', '2019-05-03 12:38:58 PM'),
(8, 'abcd', '2019-05-03 03:19:18 PM');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE `payment_gateway` (
  `id` int(11) NOT NULL,
  `pmtgtw_cat` varchar(200) NOT NULL,
  `merchant_key` varchar(240) NOT NULL,
  `salt_key` varchar(240) NOT NULL,
  `dt6` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `pmtgtw_cat`, `merchant_key`, `salt_key`, `dt6`) VALUES
(2, 'payumoney', '51Ts99OL', 'ToIGsLv3T2', '2018-08-01 07:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_title` varchar(100) DEFAULT NULL,
  `product_qty` int(5) DEFAULT 0,
  `product_price` varchar(10) DEFAULT NULL,
  `p_discount` varchar(10) NOT NULL DEFAULT '0',
  `img_1` mediumtext DEFAULT NULL,
  `img_2` mediumtext DEFAULT NULL,
  `product_desc` longtext DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `create_date_time` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=delete',
  `created_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `sub_category_id`, `product_title`, `product_qty`, `product_price`, `p_discount`, `img_1`, `img_2`, `product_desc`, `created_by_id`, `create_date_time`, `is_delete`, `created_date`) VALUES
(36, 22, 0, 'safari', NULL, '300', '0', 'assets/product/1_50cafd896b7e15ea1442fade046eed296a10c7f1.pdf', 'assets/screen/1_bbabd1cb515694fa6155dbf213f4b91e626c98aa.jpg', 'sqsqs', NULL, NULL, 0, '2019-05-04 12:42:39 PM'),
(37, 23, 0, 'Grammer Safari', NULL, '300', '0', 'assets/product/1_50cafd896b7e15ea1442fade046eed296a10c7f1.pdf', 'assets/screen/1_bbabd1cb515694fa6155dbf213f4b91e626c98aa.jpg', 'xsxscxs', NULL, NULL, 0, '2019-05-04 01:00:45 PM'),
(38, 22, 0, 'Phonics-1', NULL, '500', '0', 'assets/product/1_50cafd896b7e15ea1442fade046eed296a10c7f1.pdf', 'assets/screen/1_bbabd1cb515694fa6155dbf213f4b91e626c98aa.jpg', 'zxzxzsx', NULL, NULL, 0, '2019-05-04 01:01:53 PM');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_path` longtext DEFAULT NULL,
  `text_1` varchar(500) DEFAULT NULL,
  `text_2` varchar(500) DEFAULT NULL,
  `text_3` varchar(20) DEFAULT NULL,
  `slider_status` tinyint(4) NOT NULL DEFAULT 0,
  `priority` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_path`, `text_1`, `text_2`, `text_3`, `slider_status`, `priority`, `is_delete`) VALUES
(34, 'assets/q4images/slider/15bc9bba8c172bbanner-77.jpg', 'Ossmido ', 'Season sale', '50', 0, 0, 0),
(35, 'assets/q4images/slider/15bc9bbe376761baneer-88.jpg', 'collection  FASHION', 'MORE', '0', 0, 0, 0),
(36, 'assets/q4images/slider/15bc9bc136ad89banner-99.jpg', 'Street Fashion ', 'Subcultures ', '20', 0, 0, 0),
(37, 'assets/q4images/slider/15bc9bc5b3fad3banner10.jpg', 'Summer Very Soon', 'discount', '10', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_email`
--

CREATE TABLE `subscribe_email` (
  `subscribe_id` int(11) NOT NULL,
  `user_emailid` varchar(200) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dt` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe_email`
--

INSERT INTO `subscribe_email` (`subscribe_id`, `user_emailid`, `name`, `dt`) VALUES
(24, 'ebadullah7289@gmail.com', 'Ebad khan2', '14-04-2019 12:47:06 PM'),
(26, '', '', '05-05-2019 10:01:13 AM');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `authorizenet_subscription_id` varchar(255) DEFAULT NULL,
  `paypal_subscription_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `billing_day` int(2) DEFAULT NULL,
  `length` int(4) DEFAULT NULL,
  `interval` int(4) DEFAULT NULL,
  `trial_days` int(4) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_trial_ends` date DEFAULT NULL,
  `date_canceled` datetime DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_image`, `created_by_id`, `created_date`, `create_date_time`, `is_delete`, `category_status`, `delete_by_id`, `delete_date`) VALUES
(45, 27, 'T Shirt', 'assets/q4images/sub_category/15c1e0d03726d8mock-10-2122-14213D-nh-ns-111802514472174936291489614087-3_1800x.png', 1, '09-08-2018', '09-08-2018 07:18:13 PM', 0, 0, NULL, NULL),
(46, 27, 'Pants', 'assets/q4images/sub_category/15c1e0c83451e2MZG002_NAVY.jpg', 1, '10-08-2018', '10-08-2018 07:03:41 PM', 0, 0, NULL, NULL),
(47, 27, 'Corporate Wear', 'assets/q4images/sub_category/15b6d97d7ae080mtb2.jpg', 1, '10-08-2018', '10-08-2018 07:05:03 PM', 0, 0, NULL, NULL),
(48, 27, 'Party Wear', 'assets/q4images/sub_category/15b6d97f7bc8dewomen.jpg', 1, '10-08-2018', '10-08-2018 07:05:37 PM', 0, 0, NULL, NULL),
(49, 27, 'Blazers', 'assets/q4images/sub_category/15b6d983b334dfl3.jpg', 1, '10-08-2018', '10-08-2018 07:20:51 PM', 0, 0, NULL, NULL),
(50, 28, 'T-shirt', 'assets/q4images/sub_category/15b6d98bfb5f74ws1.jpg', 1, '10-08-2018', '10-08-2018 07:23:03 PM', 0, 0, NULL, NULL),
(51, 28, 'Corporate Wear', 'assets/q4images/sub_category/15b6d98dbec65fw-pants.jpg', 1, '10-08-2018', '10-08-2018 07:23:31 PM', 0, 0, NULL, NULL),
(52, 28, 'Pants', 'assets/q4images/sub_category/15b6d992c72866ws2.jpg', 1, '10-08-2018', '10-08-2018 07:24:52 PM', 0, 0, NULL, NULL),
(53, 31, 'Traditional', 'assets/q4images/sub_category/15bb498a2d3995Traditional.jpg', 1, '03-10-2018', '03-10-2018 03:53:30 PM', 0, 0, NULL, NULL),
(54, 30, 'BoutonniÃ¨re', 'assets/q4images/sub_category/15bb4a27a39f7fBoutonniÃ¨re.jpg', 1, '03-10-2018', '03-10-2018 04:35:30 PM', 0, 0, NULL, NULL),
(55, 30, 'Jewellery', 'assets/q4images/sub_category/15bb4a4b1a2e43Jewellery.jpeg', 1, '03-10-2018', '03-10-2018 04:44:57 PM', 0, 0, NULL, NULL),
(56, 30, 'Handbags', 'assets/q4images/sub_category/15bb4a68e4e57bHandbags.jpg', 1, '03-10-2018', '03-10-2018 04:52:54 PM', 0, 0, NULL, NULL),
(57, 29, 'Clothes', 'assets/q4images/sub_category/15bb4ac1e5374aKids Cloths.jpg', 1, '03-10-2018', '03-10-2018 05:16:38 PM', 0, 0, NULL, NULL),
(58, 32, 'Offers', 'no file choose', 1, '19-10-2018', '19-10-2018 01:27:46 PM', 0, 0, NULL, NULL),
(59, 33, 'Deepawali', 'assets/q4images/sub_category/15bc99e0997c60deepawali.jpg', 1, '19-10-2018', '19-10-2018 02:31:44 PM', 0, 0, NULL, NULL),
(60, 33, 'Karwa Chauth', 'assets/q4images/sub_category/15bc99dd24bbb4k7.jpg', 1, '19-10-2018', '19-10-2018 02:33:14 PM', 0, 0, NULL, NULL),
(61, 34, 'Wholesale(B2B)', 'assets/q4images/sub_category/15bc9a1e2d5d93kid.jpg', 1, '19-10-2018', '19-10-2018 02:50:34 PM', 0, 0, NULL, NULL),
(62, 27, 'Shirt', 'no file choose', 1, '26-11-2018', '26-11-2018 05:04:25 PM', 0, 0, NULL, NULL),
(63, 28, 'Kurti', 'assets/q4images/sub_category/15c178ea371cdf81M3uh0aH1L.jpg', 1, '17-12-2018', '17-12-2018 05:25:15 PM', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authorizenet_payment`
--

CREATE TABLE `tbl_authorizenet_payment` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(25) NOT NULL,
  `auth_code` varchar(25) NOT NULL,
  `response_code` varchar(25) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `payment_response` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `m_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `post` varchar(100) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `description` mediumtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`m_id`, `name`, `post`, `image`, `description`) VALUES
(1, 'Aditay Roy', 'Engineer', 'assets/team/15ccd782b3f169images.jpg', '&nbsp;This is the common name whisch 9is the main feauture.&nbsp;&nbsp;This is the common name whisch 9is the main feauture.&nbsp;This is the common name whisch 9is the main feauture');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `t_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `post` varchar(100) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`t_id`, `name`, `post`, `image`, `description`) VALUES
(2, 'Sanjay cdfcefe', 'Salse Executive z s', 'assets/team/15ccd540085e6etesti.png', 'This is the common name whisch 9is the main feauture  This is the common name whisch 9is the main feauture  This is the common name whisch 9is the main feauture  This is the common name whisch 9is the main feauture  This is the common name whisch 9is the main feauture'),
(3, 'Anuj', 'Technical', 'assets/testimonial/15ccc12d9c2d8ctesti.png', 'This is the common name whisch 9is the main feauture  This is the common name whisch 9is the main feauture');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
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
  `user_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=deactive,1=active',
  `created_by` int(11) DEFAULT NULL,
  `user_create_date` varchar(50) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `user_type` int(1) DEFAULT 0 COMMENT '0=user,1=admin,2=subadmin',
  `unique_id` varchar(200) DEFAULT NULL,
  `confirm_dt` varchar(30) DEFAULT NULL,
  `confirm_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_name`, `user_password`, `f_name`, `l_name`, `display_name`, `user_pic`, `user_emailid`, `user_mobile`, `country`, `state`, `city`, `street`, `company`, `pincode`, `user_status`, `created_by`, `user_create_date`, `is_delete`, `user_type`, `unique_id`, `confirm_dt`, `confirm_status`) VALUES
(1, 'admin', '85f5a0beaa5bf201ad84b4108de0b20ddb5b084a', 'English', 'Safari', 'Safari', 'assets/user_img/default.jpg', 'admin@gmail.com', '8989569856', '', '', 'Wdwdw', '', '', '', 1, 0, '25-06-2018 03:01:58 PM', 0, 1, NULL, NULL, 1),
(124, 'ebad', 'MTIzNDU=', 'Ebad', 'Khan', 'Ebad Khan', 'assets/user_img/default.jpg', 'ebadullah76@gmail.com', '9555479369', '', '', 'Wdwdw', '', '', '', 0, NULL, '', 0, 0, NULL, NULL, 0),
(125, 'tej', 'MTIzNDU2', 'Ebad', 'Khan', 'Ebad Khan', 'assets/user_img/default.jpg', 'tejphp@gmail.com', '9555479369', '', '', 'Wdwdw', '', '', '', 0, NULL, '', 0, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL COMMENT '0=guest user',
  `order_no` varchar(20) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `path` mediumtext DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
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
  `status` varchar(300) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `order_date` varchar(30) DEFAULT NULL,
  `order_type` varchar(100) DEFAULT NULL,
  `txn_id` varchar(100) DEFAULT NULL,
  `online_payment` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `payment_dt` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `order_no`, `product_id`, `user_id`, `user_name`, `title`, `path`, `price`, `sub_total`, `total_discount`, `grand_total`, `country`, `state`, `city`, `street`, `post_code`, `f_name`, `l_name`, `email`, `mobile`, `company`, `product_enq`, `status`, `is_delete`, `order_date`, `order_type`, `txn_id`, `online_payment`, `payment_status`, `payment_dt`) VALUES
(361, '5ccd', 36, 1, 'admin', 'safari', 'assets/screen/1_bbabd1cb515694fa6155dbf213f4b91e626c98aa.jpg', '300', '300', NULL, '300', '', '', 'Wdwdw', '', '', 'English', 'Safari', 'admin@gmail.com', '8989569856', NULL, '', 'Process', 0, '04-05-2019 12:58:34 PM', 'COD', NULL, NULL, NULL, NULL);

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
  `product_info` mediumtext DEFAULT NULL,
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
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

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
-- Indexes for table `subscribe_email`
--
ALTER TABLE `subscribe_email`
  ADD PRIMARY KEY (`subscribe_id`),
  ADD UNIQUE KEY `user_emailid` (`user_emailid`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`t_id`);

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
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subscribe_email`
--
ALTER TABLE `subscribe_email`
  MODIFY `subscribe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '0=guest user', AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
