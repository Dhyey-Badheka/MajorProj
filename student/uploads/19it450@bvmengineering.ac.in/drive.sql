-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 03:53 AM
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
-- Table structure for table `drive`
--

CREATE TABLE `drive` (
  `drive_id` int(10) NOT NULL,
  `comp_id` int(10) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `skillsreq` text DEFAULT NULL,
  `bond` decimal(2,1) DEFAULT NULL,
  `stipend` int(10) DEFAULT NULL,
  `willprovideinternship` int(10) DEFAULT 1,
  `internship_duration` int(10) DEFAULT NULL,
  `ssccriteria` decimal(4,2) DEFAULT NULL,
  `hsccriteria` decimal(4,2) DEFAULT NULL,
  `cpicriteria` decimal(4,2) DEFAULT NULL,
  `spicriteria` decimal(4,2) DEFAULT NULL,
  `active_backlog` int(10) DEFAULT NULL,
  `total_backlog` int(10) DEFAULT NULL,
  `dept_eligible` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dept_eligible`)),
  `pdfdoc` varchar(10) DEFAULT NULL,
  `no_of_job_role` int(10) DEFAULT NULL,
  `job_role` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `applied_stu` longtext NOT NULL,
  `inProcess` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drive`
--

INSERT INTO `drive` (`drive_id`, `comp_id`, `deadline`, `salary`, `location`, `description`, `skillsreq`, `bond`, `stipend`, `willprovideinternship`, `internship_duration`, `ssccriteria`, `hsccriteria`, `cpicriteria`, `spicriteria`, `active_backlog`, `dead_backlog`, `dept_eligible`, `pdfdoc`, `no_of_job_role`, `job_role`, `applied_stu`, `inProcess`) VALUES
(1, 1, '2023-03-18', 720000, 'Gandhinagar', 'Gandhinagar, India, November 16, 2013: Tata Consultancy Services (BSE: 532540, NSE: TCS), the leading IT services, consulting and business solutions firm, announced the launch of its 10,000-seat campus, Garima Park, in Gandhinagar, Gujarat today. The state-of-the-art software development facility was inaugurated by Narendra Modi, Hon’ble Chief Minister, Gujarat who was welcomed at the venue by Cyrus P Mistry, Chairman, Tata Group, and N Chandrasekaran, Chief Executive Officer & Managing Director. Also present on the occasion were senior officials of the state government, business, academic and community leaders as well as senior executives from TCS.', '1.Java\r\n2.SQL\r\n3.Python', '1.0', 0, 1, 6, '75.00', '75.00', '6.00', '6.00', 0, 0, '[1,2,3,4,5,6,7,8]', NULL, 6, 'Digital', '[\'19it450\']', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drive`
--
ALTER TABLE `drive`
  ADD PRIMARY KEY (`drive_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drive`
--
ALTER TABLE `drive`
  MODIFY `drive_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drive`
--
ALTER TABLE `drive`
  ADD CONSTRAINT `drive_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
