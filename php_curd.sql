-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 11:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_curd`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergency_case`
--

CREATE TABLE `emergency_case` (
  `case_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `case_name` varchar(50) NOT NULL,
  `case_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_case`
--

INSERT INTO `emergency_case` (`case_id`, `cat_id`, `case_name`, `case_date`) VALUES
(1, 1, 'case 1 in cat1', '2022-11-21'),
(2, 1, 'case 2 in cat1', '2022-11-21'),
(3, 1, 'case 3 in cat1', '2022-11-21'),
(4, 2, 'case 1 in cat2', '2022-11-21'),
(5, 1, 'case 4 in cat1', '2022-11-21'),
(6, 2, 'case 2 in cat2', '2022-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_details`
--

CREATE TABLE `emergency_details` (
  `d_id` int(10) NOT NULL,
  `case_id` int(10) NOT NULL,
  `status` varchar(1) NOT NULL,
  `remark` varchar(250) NOT NULL,
  `d_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_details`
--

INSERT INTO `emergency_details` (`d_id`, `case_id`, `status`, `remark`, `d_date`) VALUES
(5, 4, 'P', 'still not done', '0000-00-00'),
(6, 4, 'D', 'Done', '2022-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_master`
--

CREATE TABLE `emergency_master` (
  `e_id` int(10) NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_master`
--

INSERT INTO `emergency_master` (`e_id`, `e_name`, `e_cat_id`) VALUES
(1, '1 process and service to be done for cat 1', 1),
(2, '2 process and service to be done for cat 1', 1),
(3, '3 process and service to be done for cat 1', 1),
(5, '1 process and service to be done for cat 2', 2),
(6, '2 process and service to be done for cat 2', 2),
(20, '4 process and service to be done for cat 1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency_case`
--
ALTER TABLE `emergency_case`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `emergency_master`
--
ALTER TABLE `emergency_master`
  ADD PRIMARY KEY (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency_case`
--
ALTER TABLE `emergency_case`
  MODIFY `case_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emergency_master`
--
ALTER TABLE `emergency_master`
  MODIFY `e_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
