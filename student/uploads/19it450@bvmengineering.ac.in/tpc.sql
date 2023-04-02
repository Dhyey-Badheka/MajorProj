-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 03:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tpc`
--

CREATE TABLE `tpc` (
  `tpc_id` varchar(20) NOT NULL,
  `tpc_name` varchar(64) NOT NULL,
  `tpc_email` varchar(64) DEFAULT NULL,
  `tpc_password` varchar(64) DEFAULT NULL,
  `tpc_mobile` bigint(10) DEFAULT NULL,
  `tpc_dept_id` int(10) DEFAULT NULL,
  `tpc_is_approved` int(10) DEFAULT 0,
  `academic_year` int(10) DEFAULT NULL,
  `isActive` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpc`
--

INSERT INTO `tpc` (`tpc_id`, `tpc_name`, `tpc_email`, `tpc_password`, `tpc_mobile`, `tpc_dept_id`, `tpc_is_approved`, `academic_year`, `isActive`) VALUES
('19IT450', 'Dhyey Badheka', '19it450@bvmengineering.ac.in', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 7984528154, 6, 0, 2023, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tpc`
--
ALTER TABLE `tpc`
  ADD PRIMARY KEY (`tpc_id`),
  ADD KEY `tpc_dept_id` (`tpc_dept_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tpc`
--
ALTER TABLE `tpc`
  ADD CONSTRAINT `tpc_ibfk_1` FOREIGN KEY (`tpc_dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `tpc_ibfk_2` FOREIGN KEY (`tpc_id`) REFERENCES `student` (`id_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
