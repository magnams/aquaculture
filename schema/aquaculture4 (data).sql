-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 02:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aquaculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `feed_list`
--

CREATE TABLE `feed_list` (
  `Feed_ID` int(11) NOT NULL,
  `Pond_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Start_Check_Time` datetime NOT NULL,
  `Final_Check_Time` datetime DEFAULT NULL,
  `ABW` varchar(50) DEFAULT NULL,
  `Feed_Meal1` decimal(10,2) NOT NULL,
  `Feed_Meal2` decimal(10,2) DEFAULT NULL,
  `Feed_Meal3` decimal(10,2) DEFAULT NULL,
  `Feed_Meal4` decimal(10,2) DEFAULT NULL,
  `Feed_Meal5` decimal(10,2) DEFAULT NULL,
  `Remaining_Feed` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feed_list`
--

INSERT INTO `feed_list` (`Feed_ID`, `Pond_ID`, `Product_ID`, `Start_Check_Time`, `Final_Check_Time`, `ABW`, `Feed_Meal1`, `Feed_Meal2`, `Feed_Meal3`, `Feed_Meal4`, `Feed_Meal5`, `Remaining_Feed`, `created_at`, `updated_at`) VALUES
(1, 9, 5, '2021-12-02 08:00:00', '2021-12-02 21:00:00', '0.2', '1.00', '1.00', '2.00', '2.00', '2.00', '0.00', '2021-12-05 18:33:58', '2021-12-05 19:59:58'),
(2, 9, 5, '2021-12-02 08:00:00', '2021-12-05 01:00:00', '0.34', '2.00', '2.00', '3.00', '2.00', '2.00', '1.00', '2021-12-05 18:34:34', '2021-12-05 20:00:20'),
(3, 9, 5, '2021-12-03 09:00:00', '2021-12-05 01:00:00', '0.5', '9.00', '8.00', '8.00', '6.00', '7.00', '2.00', '2021-12-05 18:35:02', '2021-12-05 18:37:15'),
(4, 9, 5, '2021-12-04 07:00:00', '2021-12-05 01:00:00', '0.7', '5.00', '7.00', '5.00', '8.00', '6.00', '3.00', '2021-12-05 18:35:28', '2021-12-05 20:00:42'),
(5, 9, 5, '2021-12-05 08:00:00', '2021-12-05 01:00:00', '1', '7.00', '6.00', '9.00', '7.00', '4.00', '3.00', '2021-12-05 18:36:17', '2021-12-05 20:01:06'),
(6, 1, 2, '2021-10-05 07:00:00', '2021-10-05 20:00:00', '1.52', '10.00', '11.00', '11.00', '12.00', '13.00', '4.00', '2021-12-05 19:07:00', '2021-12-05 20:01:29'),
(7, 1, 2, '2021-10-06 08:00:00', '2021-10-06 21:00:00', '', '14.00', '15.00', '16.00', '13.00', '15.00', '3.00', '2021-12-05 19:08:03', '2021-12-05 19:54:41'),
(8, 1, 2, '2021-10-07 08:00:00', '2021-10-07 21:00:00', '', '15.00', '11.00', '16.00', '16.00', '11.00', '0.00', '2021-12-05 19:08:47', '2021-12-05 19:55:13'),
(9, 1, 2, '2021-10-08 08:00:00', '2021-10-08 20:00:00', '', '16.00', '15.00', '13.00', '15.00', '16.00', '6.00', '2021-12-05 19:09:11', '2021-12-05 19:55:57'),
(10, 1, 2, '2021-10-09 08:00:00', '2021-10-09 21:00:00', '', '14.00', '13.00', '17.00', '17.00', '15.00', '2.00', '2021-12-05 19:09:44', '2021-12-05 19:56:41'),
(11, 1, 2, '2021-10-10 08:00:00', '2021-10-10 21:00:00', '', '17.00', '16.00', '19.00', '28.00', '19.00', '5.00', '2021-12-05 19:10:25', '2021-12-05 20:03:08'),
(12, 1, 2, '2021-10-11 08:00:00', '2021-10-11 22:00:00', '3.42', '14.00', '12.00', '14.00', '15.00', '12.00', '6.00', '2021-12-05 19:11:10', '2021-12-05 20:02:20'),
(13, 1, 2, '2021-10-12 08:00:00', '2021-10-12 22:00:00', '', '15.00', '14.00', '14.00', '16.00', '14.00', '2.00', '2021-12-05 19:12:11', '2021-12-05 20:07:59'),
(14, 1, 2, '2021-10-13 08:00:00', NULL, '', '25.00', '22.00', '17.00', NULL, NULL, NULL, '2021-12-05 19:12:36', '2021-12-05 19:12:36'),
(15, 1, 2, '2021-10-14 08:00:00', NULL, '', '24.00', '28.00', '25.00', NULL, NULL, NULL, '2021-12-05 19:13:58', '2021-12-05 19:13:58'),
(18, 1, 2, '2021-10-15 08:00:00', NULL, '', '27.00', '25.00', '27.00', NULL, NULL, NULL, '2021-12-05 19:19:48', '2021-12-05 19:19:48'),
(19, 1, 2, '2021-10-16 08:00:00', NULL, '', '29.00', '29.00', '25.00', NULL, NULL, NULL, '2021-12-05 19:20:21', '2021-12-05 19:20:21'),
(20, 1, 2, '2021-10-17 09:00:00', NULL, '', '30.00', '28.00', '27.00', NULL, NULL, NULL, '2021-12-05 19:20:51', '2021-12-05 19:20:51'),
(21, 1, 1, '2021-10-18 08:00:00', NULL, '7.82', '28.00', '30.00', '31.00', NULL, NULL, NULL, '2021-12-05 19:21:37', '2021-12-05 19:21:37'),
(22, 1, 1, '2021-10-19 08:00:00', NULL, '', '34.00', '30.00', '36.00', NULL, NULL, NULL, '2021-12-05 19:26:17', '2021-12-05 19:26:17'),
(23, 1, 1, '2021-10-20 09:00:00', NULL, '', '35.00', '38.00', '32.00', NULL, NULL, NULL, '2021-12-05 19:26:45', '2021-12-05 19:26:45'),
(24, 1, 1, '2021-10-21 08:00:00', NULL, '', '39.00', '37.00', '36.00', NULL, NULL, NULL, '2021-12-05 19:27:23', '2021-12-05 19:27:23'),
(25, 1, 1, '2021-10-22 09:00:00', NULL, '', '41.00', '45.00', '43.00', NULL, NULL, NULL, '2021-12-05 19:28:03', '2021-12-05 19:28:03'),
(26, 1, 1, '2021-10-23 09:00:00', NULL, '', '43.00', '42.00', '40.00', NULL, NULL, NULL, '2021-12-05 19:28:42', '2021-12-05 19:28:42'),
(27, 1, 1, '2021-10-24 08:00:00', NULL, '', '40.00', '44.00', '46.00', NULL, NULL, NULL, '2021-12-05 19:29:09', '2021-12-05 19:29:09'),
(28, 1, 1, '2021-10-25 09:00:00', NULL, '10.66', '47.00', '50.00', '52.00', NULL, NULL, NULL, '2021-12-05 19:30:34', '2021-12-05 19:30:34'),
(29, 1, 1, '2021-10-26 08:00:00', NULL, '', '47.00', '50.00', '52.00', NULL, NULL, NULL, '2021-12-05 19:37:28', '2021-12-05 19:37:28'),
(30, 1, 1, '2021-10-27 08:00:00', NULL, '', '50.00', '55.00', '51.00', NULL, NULL, NULL, '2021-12-05 19:37:49', '2021-12-05 19:37:49'),
(31, 1, 1, '2021-10-28 09:00:00', NULL, '', '54.00', '57.00', '52.00', NULL, NULL, NULL, '2021-12-05 19:38:12', '2021-12-05 19:38:12'),
(32, 1, 3, '2021-10-29 08:00:00', NULL, '', '50.00', '49.00', '51.00', NULL, NULL, NULL, '2021-12-05 19:38:57', '2021-12-05 19:38:57'),
(33, 1, 3, '2021-10-30 09:00:00', NULL, '', '56.00', '52.00', '58.00', NULL, NULL, NULL, '2021-12-05 19:39:22', '2021-12-05 19:39:22'),
(34, 1, 3, '2021-10-31 09:00:00', NULL, '', '58.00', '61.00', '61.00', NULL, NULL, NULL, '2021-12-05 19:39:49', '2021-12-05 19:39:49'),
(35, 1, 3, '2021-11-01 08:00:00', NULL, '13.67', '63.00', '65.00', '60.00', NULL, NULL, NULL, '2021-12-05 19:40:23', '2021-12-05 19:40:23'),
(36, 1, 3, '2021-11-02 09:00:00', NULL, '', '63.00', '60.00', '66.00', NULL, NULL, NULL, '2021-12-05 19:42:06', '2021-12-05 19:42:06'),
(37, 1, 3, '2021-11-03 08:00:00', NULL, '', '66.00', '67.00', '65.00', NULL, NULL, NULL, '2021-12-05 19:42:29', '2021-12-05 19:42:29'),
(38, 1, 3, '2021-11-04 09:00:00', NULL, '', '69.00', '66.00', '68.00', NULL, NULL, NULL, '2021-12-05 19:42:52', '2021-12-05 19:42:52'),
(39, 1, 3, '2021-11-05 09:00:00', NULL, '', '69.00', '71.00', '73.00', NULL, NULL, NULL, '2021-12-05 19:43:41', '2021-12-05 19:43:41'),
(40, 1, 3, '2021-11-07 09:00:00', NULL, '', '73.00', '72.00', '70.00', NULL, NULL, NULL, '2021-12-05 19:44:13', '2021-12-05 19:44:13'),
(41, 1, 3, '2021-11-06 09:00:00', NULL, '', '69.00', '71.00', '73.00', NULL, NULL, NULL, '2021-12-05 19:44:52', '2021-12-05 19:44:52'),
(42, 1, 3, '2021-11-08 08:00:00', NULL, '18.19', '71.00', '75.00', '77.00', NULL, NULL, NULL, '2021-12-05 19:45:57', '2021-12-05 19:45:57'),
(43, 1, 4, '2021-11-09 09:00:00', NULL, '', '76.00', '73.00', '78.00', NULL, NULL, NULL, '2021-12-05 19:46:30', '2021-12-05 19:46:30'),
(44, 1, 4, '2021-11-10 09:00:00', NULL, '', '77.00', '75.00', '79.00', NULL, NULL, NULL, '2021-12-05 19:48:33', '2021-12-05 19:48:33'),
(45, 1, 4, '2021-11-12 09:00:00', NULL, '', '80.00', '80.00', '78.00', NULL, NULL, NULL, '2021-12-05 19:49:03', '2021-12-05 19:49:03'),
(46, 1, 4, '2021-11-11 07:00:00', NULL, '', '76.00', '78.00', '80.00', NULL, NULL, NULL, '2021-12-05 19:50:00', '2021-12-05 19:50:00'),
(47, 1, 4, '2021-11-13 09:00:00', NULL, '', '81.00', '80.00', '83.00', NULL, NULL, NULL, '2021-12-05 19:50:25', '2021-12-05 19:50:25'),
(48, 1, 4, '2021-11-14 09:00:00', NULL, '', '84.00', '83.00', '86.00', NULL, NULL, NULL, '2021-12-05 19:51:00', '2021-12-05 19:51:00'),
(49, 2, 3, '2021-11-09 06:00:00', '2021-12-05 01:00:00', '4.87', '12.00', '10.00', '9.00', '9.00', '8.00', '2.00', '2021-12-05 20:05:58', '2021-12-05 20:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `pond`
--

CREATE TABLE `pond` (
  `pond_id` int(11) NOT NULL,
  `pond_header_id` int(11) NOT NULL,
  `start_stocking_date` datetime NOT NULL,
  `end_stocking_date` datetime DEFAULT NULL,
  `revenue` decimal(10,0) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pond`
--

INSERT INTO `pond` (`pond_id`, `pond_header_id`, `start_stocking_date`, `end_stocking_date`, `revenue`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '2021-09-14 11:00:00', NULL, '0', 1, '2021-12-05 18:27:41', '2021-12-05 18:27:41'),
(2, 4, '2021-08-03 16:00:00', NULL, '0', 1, '2021-12-05 18:27:53', '2021-12-05 18:27:53'),
(3, 5, '2021-07-01 16:00:00', '2021-11-29 01:00:00', '1400000', 0, '2021-12-05 18:28:10', '2021-12-05 20:03:58'),
(4, 6, '2021-07-07 16:00:00', '2021-12-05 19:00:00', '2000000', 0, '2021-12-05 18:29:01', '2021-12-05 18:29:46'),
(5, 7, '2021-07-06 15:00:00', '2021-11-30 10:00:00', '2100000', 0, '2021-12-05 18:30:19', '2021-12-05 18:56:01'),
(6, 13, '2021-07-13 18:00:00', '2021-11-17 15:00:00', '3500000', 0, '2021-12-05 18:30:38', '2021-12-05 18:38:31'),
(7, 15, '2021-11-03 18:00:00', NULL, '0', 1, '2021-12-05 18:30:54', '2021-12-05 18:30:54'),
(8, 18, '2021-08-17 18:00:00', NULL, '0', 1, '2021-12-05 18:31:04', '2021-12-05 18:31:04'),
(9, 21, '2021-12-01 14:00:00', NULL, '0', 1, '2021-12-05 18:31:15', '2021-12-05 18:31:15'),
(10, 22, '2021-12-05 17:00:00', NULL, '0', 1, '2021-12-05 18:31:31', '2021-12-05 18:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `pond_header`
--

CREATE TABLE `pond_header` (
  `pond_header_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pond_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pond_header`
--

INSERT INTO `pond_header` (`pond_header_id`, `user_id`, `pond_name`, `created_at`, `updated_at`) VALUES
(3, 12, 'A01', '2021-12-05 18:23:14', '2021-12-05 18:23:14'),
(4, 12, 'A02', '2021-12-05 18:23:18', '2021-12-05 18:23:18'),
(5, 12, 'A03', '2021-12-05 18:23:21', '2021-12-05 18:23:21'),
(6, 12, 'A04', '2021-12-05 18:23:24', '2021-12-05 18:23:24'),
(7, 12, 'A05', '2021-12-05 18:23:27', '2021-12-05 18:23:27'),
(8, 12, 'A06', '2021-12-05 18:23:30', '2021-12-05 18:23:30'),
(9, 12, 'A07', '2021-12-05 18:23:33', '2021-12-05 18:23:33'),
(10, 12, 'A08', '2021-12-05 18:23:37', '2021-12-05 18:23:37'),
(11, 12, 'A09', '2021-12-05 18:23:39', '2021-12-05 18:23:39'),
(12, 12, 'A10', '2021-12-05 18:23:41', '2021-12-05 18:23:41'),
(13, 12, 'B01', '2021-12-05 18:23:44', '2021-12-05 18:23:44'),
(14, 12, 'B02', '2021-12-05 18:23:46', '2021-12-05 18:23:46'),
(15, 12, 'B03', '2021-12-05 18:23:54', '2021-12-05 18:23:54'),
(18, 12, 'C01', '2021-12-05 18:25:37', '2021-12-05 18:25:37'),
(19, 12, 'C02', '2021-12-05 18:25:40', '2021-12-05 18:25:40'),
(20, 12, 'C03', '2021-12-05 18:25:42', '2021-12-05 18:25:42'),
(21, 12, 'N-01', '2021-12-05 18:25:51', '2021-12-05 18:25:51'),
(22, 12, 'N-02', '2021-12-05 18:25:55', '2021-12-05 18:25:55'),
(23, 12, 'N-03', '2021-12-05 18:25:59', '2021-12-05 18:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `pallet_no` varchar(50) DEFAULT NULL,
  `lot_no` varchar(50) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `unit_weight` decimal(10,2) DEFAULT NULL,
  `remaining_stock` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `user_id`, `product_name`, `brand`, `pallet_no`, `lot_no`, `unit_price`, `unit_weight`, `remaining_stock`, `created_at`, `updated_at`) VALUES
(1, 12, 'Thai lux 1354 S', 'Thai lux', '1354', '001-2564', '220.00', '20.00', '500.00', '2021-12-05 18:04:59', '2021-12-05 19:31:24'),
(2, 12, 'Thai lux 1353 P', 'Thai lux', '1353', '001-2564', '240.00', '20.00', '600.00', '2021-12-05 18:05:43', '2021-12-05 19:31:35'),
(3, 12, 'Thai lux 1354', 'Thai lux', '1354', '002-2563', '260.00', '20.00', '700.00', '2021-12-05 18:06:24', '2021-12-05 19:31:49'),
(4, 12, 'Thai lux 1355', 'Thai lux', '1355', '002-2564', '280.00', '20.00', '500.00', '2021-12-05 18:06:51', '2021-12-05 19:32:16'),
(5, 12, 'Thai lux 301', 'Thai lux', '301', '003-2563', '180.00', '20.00', '200.00', '2021-12-05 18:07:48', '2021-12-05 18:17:24'),
(6, 12, 'Thai lux 302', 'Thai lux', '302', '003-2563', '190.00', '20.00', '100.00', '2021-12-05 18:08:51', '2021-12-05 18:17:39'),
(7, 12, 'Thai lux 303', 'Thai lux', '303', '4', '200.00', '20.00', '120.00', '2021-12-05 18:09:22', '2021-12-05 18:09:22'),
(8, 12, 'Thai lux 303 A', 'Thai lux', '303A', '005', '205.00', '20.00', '100.00', '2021-12-05 18:10:21', '2021-12-05 18:17:56'),
(9, 12, 'Thai lux 303 P', 'Thai lux', '303P', '005_01', '210.00', '20.00', '108.00', '2021-12-05 18:10:55', '2021-12-05 18:18:13'),
(10, 12, 'Thai lux 304 S', 'Thai lux', '304S', '005-2021', '220.00', '20.00', '95.00', '2021-12-05 18:11:27', '2021-12-05 18:18:28'),
(11, 12, 'Thai lux 304', 'Thai lux', '304', '006', '225.00', '20.00', '70.00', '2021-12-05 18:11:55', '2021-12-05 18:18:39'),
(12, 12, 'Thai lux 305', 'Thai lux', '305', '002', '230.00', '20.00', '40.00', '2021-12-05 18:12:32', '2021-12-05 18:18:48'),
(13, 12, 'อีโก้ฟีด (EGOFEED)-1', 'Thai Union', '1', '102-N-2564', '170.00', '10.00', '0.00', '2021-12-05 18:21:33', '2021-12-05 18:23:04'),
(14, 12, 'อีโก้ฟีด (EGOFEED)-2', 'Thai Union', '2', '202-P-2021', '190.00', '25.00', '10.00', '2021-12-05 18:22:10', '2021-12-05 18:22:10'),
(15, 12, 'อีโก้ฟีด (EGOFEED)-3S', 'Thai Union', '3S', '103-PN-64', '200.00', '25.00', '20.00', '2021-12-05 18:22:47', '2021-12-05 18:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_number` varchar(13) DEFAULT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_number`, `Firstname`, `Lastname`, `email`, `password`) VALUES
(6, 'pongthanin', NULL, 'nin', 'wang', 'nin@gmail.com', 'ixaajph7'),
(7, 'mom', NULL, 'ธิมลกร', 'สุขขา', 'mom@gmail.com', 'shopee'),
(8, 'palm', 'ก1234567', 'Palm', 'Chartyingcharoen', 'palm.cha@gmail.com', '1'),
(9, 'main', NULL, 'Palm', 'Chartyingcharoen', 'magnams@hotmail.com', '1234'),
(11, 'maintest', 'etstset ', 'Palmse', 'Chartyingcharoen', 'magnamses@hotmail.com', '1234'),
(12, 'data', '64199130055', 'pongthanin', 'wangkiat ', 'pongthanin.wk@gmail.com', 'ixaajph7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed_list`
--
ALTER TABLE `feed_list`
  ADD PRIMARY KEY (`Feed_ID`),
  ADD KEY `pond_id_fk` (`Pond_ID`) USING BTREE,
  ADD KEY `product_id_fk` (`Product_ID`) USING BTREE;

--
-- Indexes for table `pond`
--
ALTER TABLE `pond`
  ADD PRIMARY KEY (`pond_id`),
  ADD KEY `pond_header_id_fk` (`pond_header_id`);

--
-- Indexes for table `pond_header`
--
ALTER TABLE `pond_header`
  ADD PRIMARY KEY (`pond_header_id`),
  ADD UNIQUE KEY `pond_name` (`pond_name`),
  ADD KEY `user_id_fk` (`user_id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed_list`
--
ALTER TABLE `feed_list`
  MODIFY `Feed_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pond`
--
ALTER TABLE `pond`
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pond_header`
--
ALTER TABLE `pond_header`
  MODIFY `pond_header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feed_list`
--
ALTER TABLE `feed_list`
  ADD CONSTRAINT `Pond_ID_fk` FOREIGN KEY (`Pond_ID`) REFERENCES `pond` (`pond_id`),
  ADD CONSTRAINT `Product_ID_fk` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `pond`
--
ALTER TABLE `pond`
  ADD CONSTRAINT `pond_header_id_fk` FOREIGN KEY (`pond_header_id`) REFERENCES `pond_header` (`pond_header_id`);

--
-- Constraints for table `pond_header`
--
ALTER TABLE `pond_header`
  ADD CONSTRAINT `user_id_pk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
