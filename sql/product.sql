-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2024 at 10:23 PM
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_title` varchar(100) DEFAULT NULL,
  `product_qty` int(11) DEFAULT 10,
  `product_price` varchar(10) DEFAULT NULL,
  `price_gram` varchar(10) DEFAULT NULL,
  `trending_type` varchar(10) DEFAULT NULL,
  `img_1` mediumtext DEFAULT NULL,
  `img_2` mediumtext DEFAULT NULL,
  `img_3` mediumtext DEFAULT NULL,
  `img_4` mediumtext DEFAULT NULL,
  `product_desc` longtext DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `create_date_time` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=delete',
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `sub_category_id`, `product_title`, `product_qty`, `product_price`, `price_gram`, `trending_type`, `img_1`, `img_2`, `img_3`, `img_4`, `product_desc`, `created_by_id`, `create_date_time`, `is_delete`, `type`) VALUES
(804, 40, 82, 'Green apple', 20, '1', NULL, NULL, 'assets/images/product/1_7020d95b1cb4148bae1deb8128227ad992efa6bb.png', NULL, NULL, NULL, '', NULL, '18-04-2023', 0, 'Essential Oil'),
(805, 40, 82, 'Niroli pure', 20, '499', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, 'Pure and Natural', NULL, '18-04-2023', 0, 'Essential Oil'),
(806, 39, 81, 'Ajmal Alif Lela', 20, '799', NULL, NULL, 'assets/images/product/1_a194eb96394d05bdc3ff45877a060dc4006f7218.jpg', NULL, NULL, NULL, 'Pure and Natural', NULL, '18-04-2023', 0, 'French'),
(807, 39, 81, 'Majmua', 20, '899', NULL, NULL, 'assets/images/product/1_52c0223e1eb7bf5d8a39bf84d17a56acb7187684.jpg', NULL, NULL, NULL, 'Pure and Natural', NULL, '18-04-2023', 0, 'Floral'),
(808, 39, 81, 'Tomford Oud Wood', 20, '599', NULL, NULL, 'assets/images/product/1_42fdb879ae5ec782bf3ab640029003a079cd621d.jpg', NULL, NULL, NULL, 'Pure and Natural', NULL, '18-04-2023', 0, 'Khus'),
(809, 39, 81, 'Hydra', 20, '499', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, 'Pure and Natural', NULL, '18-04-2023', 0, 'Floral'),
(812, 39, 81, 'Mukhallat super', 20, '799', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, 'pure and natural', NULL, '18-04-2023', 0, 'Fruit'),
(813, 39, 81, 'Vanillla musk', 20, '499', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, 'Pure and Natural', NULL, '18-04-2023', 0, 'Musk'),
(814, 39, 81, 'Musk Rijali', 20, '599', NULL, NULL, 'assets/images/product/1_86c3a2e779b541108cf7bd5de653447022fef2d1.jpg', NULL, NULL, NULL, 'Synthetic Mix', NULL, '18-04-2023', 0, 'French'),
(815, 39, 81, 'White  Oud', 20, '899', NULL, NULL, 'assets/images/product/1_0628730a66d27126383056da643e5da737df232c.jpg', NULL, NULL, NULL, 'Synthetic Mix', NULL, '18-04-2023', 0, 'French'),
(816, 40, 82, 'Grape Fruit', 20, '699', NULL, NULL, 'assets/images/product/1_b4acac404cb21b862a6b52f13f005a625525436a.png', NULL, NULL, NULL, 'Synthetic', NULL, '18-04-2023', 0, 'Essential Oil'),
(817, 39, 81, 'Icon', 20, '799', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, 'Synthetic', NULL, '18-04-2023', 0, 'Compound'),
(818, 40, 82, 'Rose Pure', 20, '599', NULL, NULL, 'assets/images/product/1_b867c180b60817df5736152fc464d3cea4ffafd4.png', NULL, NULL, NULL, 'Synthetic', NULL, '18-04-2023', 0, 'Essential Oil'),
(819, 39, 81, 'Blue wave', 20, '499', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, '', NULL, '18-04-2023', 0, 'Compound'),
(820, 39, 81, 'Cool water', 20, '899', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, '<div><br></div>', NULL, '18-04-2023', 0, 'Floral'),
(821, 39, 81, 'Mitti', 20, '599', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, '', NULL, '19-04-2023', 0, 'French'),
(822, 39, 81, 'Dollar', 20, '499', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, 'Synthetic Mix', NULL, '19-04-2023', 0, 'French'),
(823, 39, 81, 'Shamama', 20, '899', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, 'Synthetic Mix', NULL, '19-04-2023', 0, 'French'),
(824, 39, 81, 'Amber', 20, '799', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, '<br>', NULL, '19-04-2023', 0, 'Jannatul Firdaus'),
(825, 39, 81, 'Silver arrow', 20, '599', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, '', NULL, '19-04-2023', 0, 'French'),
(827, 39, 81, 'Ruh gulab', 20, '499', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, 'Synthetic Mix', NULL, '19-04-2023', 0, 'French'),
(828, 39, 81, 'Jasmine absolute', 20, '899', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, '', NULL, '19-04-2023', 0, 'Rose'),
(829, 39, 81, 'Affection', 20, '799', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, '', NULL, '19-04-2023', 0, 'Mukhallat'),
(830, 39, 81, 'Vanilla tobacco', 20, '599', NULL, NULL, 'assets/images/product/1_dab3c8577c98dff9a351dca6bdf073c8e2e3f950.jpeg', NULL, NULL, NULL, '', NULL, '19-04-2023', 0, 'Aseel'),
(835, 40, 82, 'Lavender Oil', 20, '899', NULL, NULL, 'assets/images/product/1_958c198a6f78b6c922d73e7f260184fa0043605b.png', NULL, NULL, NULL, '<h3 style=\"box-sizing: inherit; clear: both; font-family: \" proxima=\"\" nova\",=\"\" \"proxima=\"\" nova=\"\" fallback\",=\"\" sans-serif;=\"\" font-size:=\"\" 26px;=\"\" line-height:=\"\" 30px;=\"\" margin-bottom:=\"\" 20px;=\"\" margin-top:=\"\" 35px;=\"\" color:=\"\" rgb(35,=\"\" 31,=\"\" 32);\"=\"\">Lavender</h3>', NULL, '19-04-2023', 0, 'Lavender'),
(838, 40, 82, 'Jasmine Oil', 20, '699', NULL, NULL, 'assets/images/product/1_051840655e3810034d658abbbd4be57af51afee0.png', NULL, NULL, NULL, 'Jasmine<br>', NULL, '19-04-2023', 0, 'Jasmine'),
(841, 40, 82, 'Chameli', 20, '599', NULL, NULL, 'assets/images/product/1_c6ad2b793f753efbc9df1e25d7287aaec54d24e3.png', NULL, NULL, NULL, '<div><br></div>', NULL, '19-04-2023', 0, 'Patchouli'),
(842, 40, 82, 'Lotus Pure', 20, '699', NULL, NULL, 'assets/images/product/1_f2783c4e6f1b2048a172242532356b7735dda4e9.png', NULL, NULL, NULL, '<div><br></div><div><div></div></div>', NULL, '19-04-2023', 0, 'Orange'),
(843, 40, 82, 'Cucumber Pure', 20, '899', NULL, NULL, 'assets/images/product/1_69508f90d3a53f96f6e3518374c50867712b380b.png', NULL, NULL, NULL, '<br><b> </b>', NULL, '19-04-2023', 0, 'Cedarwood'),
(844, 40, 82, 'Sandalwood', 20, '499', NULL, NULL, 'assets/images/product/1_a77424db2fff945c668905680e21f3a7c07a6eb2.png', NULL, NULL, NULL, '<div><br></div>', NULL, '19-04-2023', 0, 'Sandalwood');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
