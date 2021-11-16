-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 12:37 AM
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
(78, 99, 'tyutyuds', '2021-11-13 20:29:39', '2021-11-15 17:03:31'),
(82, 99, 'ty82d', '2021-11-15 21:12:44', '2021-11-15 16:49:13'),
(83, 99, 'palm8383', '2021-11-15 22:03:06', '2021-11-15 16:39:09'),
(84, 99, 'palm12', '2021-11-15 22:37:48', '2021-11-15 16:37:48'),
(85, 99, 'dfasd', '2021-11-15 22:37:56', '2021-11-15 16:37:56'),
(86, 99, 'sdfsd', '2021-11-15 22:38:01', '2021-11-15 16:38:01'),
(87, 99, 'palm87', '2021-11-15 22:38:07', '2021-11-15 16:38:22'),
(88, 99, 'gdfg', '2021-11-15 22:51:22', '2021-11-15 16:51:22'),
(89, 99, 'asd', '2021-11-15 22:54:14', '2021-11-15 16:54:14'),
(90, 99, 'sdff', '2021-11-15 22:54:37', '2021-11-15 16:54:37'),
(91, 99, 'หกด', '2021-11-15 23:00:29', '2021-11-15 17:00:29'),
(92, 99, 'หกดหกด', '2021-11-15 23:00:32', '2021-11-15 17:00:32'),
(93, 99, 'หกดหด', '2021-11-15 23:04:07', '2021-11-15 17:04:07'),
(94, 99, 'ดออ', '2021-11-15 23:04:17', '2021-11-15 17:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_code` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pond`
--
ALTER TABLE `pond`
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pond_header`
--
ALTER TABLE `pond_header`
  MODIFY `pond_header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
