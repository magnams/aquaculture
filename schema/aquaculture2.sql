-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 05:21 PM
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
(1, 16, 7, '2021-12-02 00:00:00', NULL, '123', '1.00', '11.00', '1.00', NULL, NULL, NULL, '2021-12-02 21:13:14', '2021-12-02 21:13:14'),
(2, 16, 7, '2021-12-02 00:00:00', '2021-12-10 02:03:00', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2021-12-02 21:13:15', '2021-12-02 21:13:59'),
(3, 16, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:13:16', '2021-12-02 21:13:16'),
(4, 16, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:13:17', '2021-12-02 21:13:17'),
(5, 16, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:13:18', '2021-12-02 21:13:18'),
(6, 16, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:13:19', '2021-12-02 21:13:19'),
(7, 16, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:13:20', '2021-12-02 21:13:20'),
(8, 16, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:13:21', '2021-12-02 21:13:21'),
(9, 16, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:13:22', '2021-12-02 21:13:22'),
(10, 16, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:13:23', '2021-12-02 21:13:23'),
(11, 17, 7, '2021-12-02 00:00:00', NULL, '123', '10.00', '20.00', '30.00', NULL, NULL, NULL, '2021-12-02 21:41:53', '2021-12-02 21:41:53'),
(13, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:02', '2021-12-02 21:43:02'),
(14, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:03', '2021-12-02 21:43:03'),
(15, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:05', '2021-12-02 21:43:05'),
(16, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:06', '2021-12-02 21:43:06'),
(17, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:06', '2021-12-02 21:43:06'),
(18, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:34', '2021-12-02 21:43:34'),
(19, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:35', '2021-12-02 21:43:35'),
(20, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:36', '2021-12-02 21:43:36'),
(21, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:37', '2021-12-02 21:43:37'),
(22, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:37', '2021-12-02 21:43:37'),
(23, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:39', '2021-12-02 21:43:39'),
(24, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:40', '2021-12-02 21:43:40'),
(25, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:41', '2021-12-02 21:43:41'),
(26, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:42', '2021-12-02 21:43:42'),
(27, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:43', '2021-12-02 21:43:43'),
(28, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:44', '2021-12-02 21:43:44'),
(29, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:45', '2021-12-02 21:43:45'),
(30, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:45', '2021-12-02 21:43:45'),
(31, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:46', '2021-12-02 21:43:46'),
(32, 17, 7, '2021-12-02 00:00:00', NULL, '', '0.00', '0.00', '0.00', NULL, NULL, NULL, '2021-12-02 21:43:47', '2021-12-02 21:43:47');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pond`
--

INSERT INTO `pond` (`pond_id`, `pond_header_id`, `start_stocking_date`, `end_stocking_date`, `revenue`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-11-20 15:54:58', NULL, '50', '2021-11-20 21:55:32', '2021-11-20 15:54:58'),
(3, 2, '2021-11-20 15:54:58', '2021-11-19 15:54:58', '23', '2021-11-20 21:55:32', '2021-11-20 15:54:58'),
(4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '2021-11-21 09:30:19', '2021-11-21 03:30:19'),
(5, 19912, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '2021-11-21 09:31:09', '2021-11-21 03:31:09'),
(6, 1991, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '2021-11-21 15:19:08', '2021-11-21 15:19:08'),
(7, 1991, '2021-11-21 15:04:00', '0000-00-00 00:00:00', '0', '2021-11-21 15:22:48', '2021-11-21 15:22:48'),
(8, 1991, '2021-11-21 00:00:00', '2021-11-24 01:01:00', '1000', '2021-11-21 16:02:44', '2021-11-21 16:02:44'),
(10, 2, '2021-11-27 17:27:00', NULL, '272727', '2021-11-21 16:09:06', '2021-11-21 16:09:06'),
(11, 2, '2021-11-21 00:00:00', NULL, '26', '2021-11-21 16:28:16', '2021-11-21 16:28:16'),
(12, 0, '2021-11-21 00:00:00', NULL, '0', '2021-11-21 16:29:35', '2021-11-21 16:29:35'),
(13, 2, '2021-11-21 00:00:00', NULL, '272727', '2021-11-21 16:30:32', '2021-11-21 16:30:32'),
(14, 5, '2021-11-21 00:00:00', '2021-11-06 18:06:00', '50', '2021-11-21 16:31:36', '2021-11-21 17:07:17'),
(15, 4, '2021-11-23 15:03:00', NULL, '200', '2021-11-21 16:33:47', '2021-11-21 16:33:47'),
(16, 8, '2021-12-02 00:00:00', '2021-12-02 22:34:00', '0', '2021-12-02 21:09:12', '2021-12-02 22:52:01'),
(17, 7, '2021-12-03 00:00:00', NULL, '0', '2021-12-02 21:41:03', '2021-12-02 21:41:03'),
(18, 8, '2021-12-02 00:00:00', NULL, '0', '2021-12-02 22:45:55', '2021-12-02 22:45:55'),
(19, 8, '2021-12-02 00:00:00', NULL, '0', '2021-12-02 22:46:03', '2021-12-02 22:46:03');

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
(1, 99, 'บ่อกุ้ง A01-3', '2021-11-16 17:25:05', '2021-11-16 11:45:46'),
(2, 99, 'บ่อปลา B01', '2021-11-16 17:25:13', '2021-11-16 11:25:13'),
(3, 99, 'บ่อปลาคราฟ-001', '2021-11-16 20:53:55', '2021-11-16 14:53:55'),
(4, 99, '1232', '2021-11-17 22:29:35', '2021-11-21 14:45:35'),
(5, 99, 'บ่อเลี้ยง2', '2021-11-21 14:46:34', '2021-11-21 14:53:53'),
(6, 99, 'A01', '2021-11-29 21:35:12', '2021-11-29 21:35:12'),
(7, 8, 'A01111', '2021-12-02 21:08:30', '2021-12-02 22:41:22'),
(8, 8, 'B02', '2021-12-02 21:08:33', '2021-12-02 21:08:47'),
(9, 8, 'C03', '2021-12-02 21:08:38', '2021-12-02 21:08:38');

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
(1, 99, 'peddigree', NULL, NULL, NULL, '10.00', '56.00', NULL, '2021-11-16 17:02:49', NULL),
(2, 99, 'peddigree2', '', '', '', '10.25', '55.60', '0.00', '2021-11-16 17:02:49', '2021-11-17 07:54:51'),
(3, 99, '342', '', '', '', '0.00', '0.00', '0.00', '2021-11-16 20:18:51', '0000-00-00 00:00:00'),
(4, 99, 'ทับทิม', 'ertge', 'erg', '453', '1222.00', '12.00', '2.00', '2021-11-16 20:20:37', '2021-11-16 14:20:37'),
(5, 99, 'reg', 'erg', '', '', '0.00', '0.00', '0.00', '2021-11-16 20:21:44', '2021-11-16 14:21:44'),
(6, 99, 'six product', 'Brand', 'Pallet ', 'Lot ', '100.00', '20.00', '30.00', '2021-11-16 20:40:43', '2021-11-21 14:46:04'),
(7, 8, 'Crystal', 'wer', '123', '1124', '124.00', '124.00', '124.00', '2021-12-02 21:08:06', '2021-12-02 21:08:06');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_number`, `Firstname`, `Lastname`, `email`, `password`) VALUES
(6, 'pongthanin', NULL, 'nin', 'wang', 'nin@gmail.com', 'ixaajph7'),
(7, 'mom', NULL, 'ธิมลกร', 'สุขขา', 'mom@gmail.com', 'shopee'),
(8, 'palm', NULL, 'ปาล์ม', 'ชาติยิ่งเจริญ', 'palm.cha@gmail.com', '1'),
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
  ADD UNIQUE KEY `Firstname` (`Firstname`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `Lastname` (`Lastname`),
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
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pond_header`
--
ALTER TABLE `pond_header`
  MODIFY `pond_header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
