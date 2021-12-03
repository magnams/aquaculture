-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 02:39 PM
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
  MODIFY `Feed_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pond`
--
ALTER TABLE `pond`
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pond_header`
--
ALTER TABLE `pond_header`
  MODIFY `pond_header_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
