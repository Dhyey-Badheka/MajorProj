-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 08:55 PM
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
-- Table structure for table `student_document`
--

CREATE TABLE `student_document` (
  `s_id` varchar(64) NOT NULL,
  `s_email` varchar(64) NOT NULL,
  `ssc_marksheet` varchar(64) DEFAULT NULL,
  `hsc_marksheet` varchar(64) DEFAULT NULL,
  `d2d_marksheet` varchar(64) DEFAULT NULL,
  `bvm_marksheet` varchar(64) DEFAULT NULL,
  `resume` varchar(64) DEFAULT NULL,
  `photo` varchar(64) DEFAULT NULL,
   PRIMARY KEY (s_id),
   FOREIGN KEY (s_email) REFERENCES student(pemail)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data for table `student_document`
--

INSERT INTO `student_document` (`s_id`, `ssc_marksheet`, `hsc_marksheet`, `d2d_marksheet`, `bvm_marksheet`, `resume`, `photo`) VALUES
('19CP015', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'infocusp.png'),
('19IT450', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Dhyey.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_document`
--
ALTER TABLE `student_document`
  ADD PRIMARY KEY (`s_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_document`
--
ALTER TABLE `student_document`
  ADD CONSTRAINT `student_document_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`id_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
