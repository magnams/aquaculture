-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 10:49 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

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
(1, 1, 1, '2021-12-02 05:19:47', '2021-12-11 04:04:00', '2', '10.00', '20.00', '30.00', '0.00', '0.00', '15.00', '2021-12-02 11:20:41', '2021-12-02 17:12:12'),
(2, 2, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:00:23', '2021-12-02 16:00:23'),
(4, 1, 5, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:06:41', '2021-12-02 16:06:41'),
(5, 1, 1, '2021-12-03 06:06:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:07:13', '2021-12-02 16:07:13'),
(6, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:10', '2021-12-02 16:09:10'),
(7, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:11', '2021-12-02 16:09:11'),
(8, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:12', '2021-12-02 16:09:12'),
(9, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:13', '2021-12-02 16:09:13'),
(11, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:15', '2021-12-02 16:09:15'),
(12, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:16', '2021-12-02 16:09:16'),
(13, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:17', '2021-12-02 16:09:17'),
(14, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:17', '2021-12-02 16:09:17'),
(15, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:18', '2021-12-02 16:09:18'),
(16, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:19', '2021-12-02 16:09:19'),
(17, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:20', '2021-12-02 16:09:20'),
(18, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:21', '2021-12-02 16:09:21'),
(19, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:22', '2021-12-02 16:09:22'),
(20, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:23', '2021-12-02 16:09:23'),
(21, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:24', '2021-12-02 16:09:24'),
(22, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:25', '2021-12-02 16:09:25'),
(23, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:26', '2021-12-02 16:09:26'),
(24, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:27', '2021-12-02 16:09:27'),
(25, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:27', '2021-12-02 16:09:27'),
(26, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:28', '2021-12-02 16:09:28'),
(27, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:29', '2021-12-02 16:09:29'),
(28, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:30', '2021-12-02 16:09:30'),
(29, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:30', '2021-12-02 16:09:30'),
(30, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:09:31', '2021-12-02 16:09:31'),
(31, 1, 1, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 16:15:32', '2021-12-02 16:15:32'),
(32, 11, 2, '2021-12-03 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-03 16:35:32', '2021-12-03 16:35:32');

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
(1, 2, '2021-11-20 15:54:58', '1970-01-01 01:00:00', '0', 1, '2021-11-20 21:55:32', '2021-12-03 13:29:07'),
(3, 2, '2021-11-20 15:54:58', '2021-12-31 05:06:00', '0', 0, '2021-11-20 21:55:32', '2021-12-03 13:29:14'),
(4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 1, '2021-11-21 09:30:19', '2021-11-21 03:30:19'),
(5, 19912, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 1, '2021-11-21 09:31:09', '2021-11-21 03:31:09'),
(7, 1991, '2021-11-21 15:04:00', '0000-00-00 00:00:00', '0', 1, '2021-11-21 15:22:48', '2021-11-21 15:22:48'),
(8, 1991, '2021-11-21 00:00:00', '2021-11-24 01:01:00', '1000', 1, '2021-11-21 16:02:44', '2021-11-21 16:02:44'),
(10, 2, '2021-11-27 17:27:00', '2021-12-03 03:02:00', '0', 0, '2021-11-21 16:09:06', '2021-12-03 13:34:19'),
(11, 2, '2021-11-21 00:00:00', NULL, '26', 1, '2021-11-21 16:28:16', '2021-11-21 16:28:16'),
(12, 1, '2021-11-21 00:00:00', NULL, '0', 1, '2021-11-21 16:29:35', '2021-11-21 16:29:35'),
(13, 2, '2021-11-21 00:00:00', NULL, '272727', 1, '2021-11-21 16:30:32', '2021-11-21 16:30:32'),
(15, 4, '2021-11-23 15:03:00', NULL, '200', 1, '2021-11-21 16:33:47', '2021-11-21 16:33:47');

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
(1, 8, 'บ่อกุ้ง A01-3', '2021-11-16 17:25:05', '2021-11-16 11:45:46'),
(2, 8, 'บ่อปลา B01', '2021-11-16 17:25:13', '2021-11-16 11:25:13'),
(3, 99, 'บ่อปลาคราฟ-001', '2021-11-16 20:53:55', '2021-11-16 14:53:55'),
(4, 99, '1232', '2021-11-17 22:29:35', '2021-11-21 14:45:35'),
(5, 8, 'บ่อเลี้ยง2', '2021-11-21 14:46:34', '2021-11-21 14:53:53'),
(6, 8, 'A01', '2021-11-29 21:35:12', '2021-11-29 21:35:12');

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
(1, 8, 'peddigree', NULL, NULL, NULL, '10.00', '56.00', NULL, '2021-11-16 17:02:49', NULL),
(2, 8, 'peddigree2', '', '', '', '10.25', '55.60', '0.00', '2021-11-16 17:02:49', '2021-11-17 07:54:51'),
(3, 99, '342', '', '', '', '0.00', '0.00', '0.00', '2021-11-16 20:18:51', '0000-00-00 00:00:00'),
(4, 99, 'ทับทิม', 'ertge', 'erg', '453', '1222.00', '12.00', '2.00', '2021-11-16 20:20:37', '2021-11-16 14:20:37'),
(5, 8, 'reg', 'erg', '', '', '0.00', '0.00', '0.00', '2021-11-16 20:21:44', '2021-11-16 14:21:44'),
(6, 8, 'six product', 'Brand', 'Pallet ', 'Lot ', '100.00', '20.00', '30.00', '2021-11-16 20:40:43', '2021-12-02 17:57:10'),
(7, 99, 'ทับทิม', 'ertge', 'erg', '453', '1222.00', '12.00', '2.00', '2021-12-02 10:59:28', '2021-12-02 10:59:28'),
(8, 99, 'หนึ่งพันทุกอย่าง', 'erg', 'erg', 'Lot ', '100.00', '12.00', '2.00', '2021-12-02 10:59:41', '2021-12-02 10:59:41');

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
(8, 'palm', 'ก123', 'Palm', 'Chartyingcharoen', 'palm.cha@gmail.com', '1'),
(9, 'main', NULL, 'Palm', 'Chartyingcharoen', 'magnams@hotmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed_list`
--
ALTER TABLE `feed_list`
  ADD PRIMARY KEY (`Feed_ID`);

--
-- Indexes for table `pond`
--
ALTER TABLE `pond`
  ADD PRIMARY KEY (`pond_id`);

--
-- Indexes for table `pond_header`
--
ALTER TABLE `pond_header`
  ADD PRIMARY KEY (`pond_header_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `Feed_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pond`
--
ALTER TABLE `pond`
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pond_header`
--
ALTER TABLE `pond_header`
  MODIFY `pond_header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
