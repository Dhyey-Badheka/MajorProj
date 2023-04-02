-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 04:39 PM
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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `posted_on` date NOT NULL,
  `dept` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[1,2,3,4,5,6,7,8]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `title`, `description`, `posted_on`, `dept`) VALUES
(1, 'TCS is coming for placement drive on 18/03/2023.', 'All the registered students are requested to remain present at auditorium for Pre-Placement talk at 9:00 AM sharp.', '2023-03-01', '[1,2,3,4,5,6,7,8]'),
(2, 'InfocusP Placement Drive Round 2 for interview is scheduled.', 'Congratulations to all the students shortlisted for round 2 and reach at B-203 on 12/03/2023 at 5:00 PM for Coding Interview.', '2023-03-04', '[2,6]'),
(3, 'Deadline to apply candidature for Tatvasoft is changed to 13/03/2023 till 5PM.', 'All the interested students are requested to apply for the drive.', '2023-03-12', '[1,2,3,4,5,6,7,8]'),
(8, 'This is a new announcement latest ma latest', 'Desc of announcement of', '2023-03-18', '[1,2]');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(10) NOT NULL,
  `comp_name` varchar(64) NOT NULL,
  `company_description` text DEFAULT NULL,
  `location` varchar(64) NOT NULL,
  `comp_hr_name` varchar(64) DEFAULT NULL,
  `comp_hr_email` varchar(64) DEFAULT NULL,
  `comp_hr_mobile` bigint(10) DEFAULT NULL,
  `comp_url` varchar(64) DEFAULT NULL,
  `comp_logo` varchar(64) DEFAULT NULL,
  `active` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `comp_name`, `company_description`, `location`, `comp_hr_name`, `comp_hr_email`, `comp_hr_mobile`, `comp_url`, `comp_logo`, `active`) VALUES
(1, 'TCS', 'As a global company with unparalleled scale, a track record of pioneering innovation, and a huge and influential client base, we offer associates a chance to drive change and improve the lives of millions of people around the world.Through the application of innovation and our contextual knowledge, we give associates the opportunity to deliver transformative outcomes that benefit society at large and prove that anything is possible.\r\n\r\n', 'Gandhinagar', 'Apoorva Jain', 'apporva.jain@tcs.com', NULL, 'https://www.tcs.com/careers', 'rk.png', 0),
(2, 'InfocusP', 'Working hard for your career doesn’t necessarily mean committing to an endless series of lengthy workdays. At Infocusp, forget about rigid schedules, strict dress codes, and useless time in the office. We believe in working smart to maximize efficiency and leave time and energy for employees’ interests outside work.', 'Ahmedabad', 'AEGH', 'QWERTY@FSDF.COM', 234567876, 'https://www.infocusp.com/careers', 'infocusp.png', 2),
(3, 'Dhyey Badheka ', 'wgdfhCompany', 'xyz', 'eterhr', 'nbvcvbcvn@bdfgd.com', 546554754, 'https://www.youtube.com/watch?v=KBsqQez-O4w', 'use case dia.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(10) NOT NULL,
  `dept_name` varchar(64) NOT NULL,
  `dept_tpf_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dept_tpf_id`)),
  `dept_tpc_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dept_tpc_id`)),
  `dept_totalstu` int(10) DEFAULT 0,
  `dept_intereststu` int(10) DEFAULT 0,
  `dept_placedstu` int(10) DEFAULT 0,
  `dept_avgpack` decimal(4,2) DEFAULT 0.00,
  `dept_tot_company_visited` int(10) DEFAULT 0,
  `dept_tot_drive_completed` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_tpf_id`, `dept_tpc_id`, `dept_totalstu`, `dept_intereststu`, `dept_placedstu`, `dept_avgpack`, `dept_tot_company_visited`, `dept_tot_drive_completed`) VALUES
(1, 'CE', NULL, NULL, 160, 112, 22, '5.02', 4, 6),
(2, 'CP', NULL, NULL, 85, 71, 15, '6.35', 12, 16),
(3, 'EC', NULL, NULL, 70, 55, 23, '4.80', 8, 13),
(4, 'EE', NULL, NULL, 60, 20, 4, '4.40', 6, 7),
(5, 'EL', NULL, NULL, 65, 43, 23, '5.30', 8, 13),
(6, 'IT', NULL, NULL, 84, 62, 30, '6.59', 12, 16),
(7, 'ME', NULL, NULL, 172, 123, 18, '3.40', 3, 4),
(8, 'PE', NULL, NULL, 54, 12, 6, '3.60', 3, 4);

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
  `dead_backlog` int(10) DEFAULT NULL,
  `dept_eligible` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dept_eligible`)),
  `pdfdoc` varchar(64) DEFAULT NULL,
  `no_of_job_role` int(10) DEFAULT NULL,
  `job_role` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `applied_stu` longtext NOT NULL,
  `inProcess` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drive`
--

INSERT INTO `drive` (`drive_id`, `comp_id`, `deadline`, `salary`, `location`, `description`, `skillsreq`, `bond`, `stipend`, `willprovideinternship`, `internship_duration`, `ssccriteria`, `hsccriteria`, `cpicriteria`, `spicriteria`, `active_backlog`, `dead_backlog`, `dept_eligible`, `pdfdoc`, `no_of_job_role`, `job_role`, `applied_stu`, `inProcess`) VALUES
(1, 1, '2023-03-18', 720000, 'Gandhinagar', 'Gandhinagar, India, November 16, 2013: Tata Consultancy Services (BSE: 532540, NSE: TCS), the leading IT services, consulting and business solutions firm, announced the launch of its 10,000-seat campus, Garima Park, in Gandhinagar, Gujarat today. The state-of-the-art software development facility was inaugurated by Narendra Modi, Hon’ble Chief Minister, Gujarat who was welcomed at the venue by Cyrus P Mistry, Chairman, Tata Group, and N Chandrasekaran, Chief Executive Officer & Managing Director. Also present on the occasion were senior officials of the state government, business, academic and community leaders as well as senior executives from TCS.', '1.Java\r\n2.SQL\r\n3.Python', '1.0', 0, 1, 6, '75.00', '75.00', '6.00', '6.00', 0, 0, '[1,2,3,4,5,6,7,8]', NULL, 6, 'Digital', '[\'19it450\']', 0),
(2, 1, '2023-03-19', 350000, 'Gandhinagar ', 'Gandhinagar, India, November 16, 2013: Tata Consultancy Services (BSE: 532540, NSE: TCS), the leading IT services, consulting and business solutions firm, announced the launch of its 10,000-seat campus, Garima Park, in Gandhinagar, Gujarat today. The state-of-the-art software development facility was inaugurated by Narendra Modi, Hon’ble Chief Minister, Gujarat who was welcomed at the venue by Cyrus P Mistry, Chairman, Tata Group, and N Chandrasekaran, Chief Executive Officer & Managing Director. Also present on the occasion were senior officials of the state government, business, academic and community leaders as well as senior executives from TCS.', '1.Java\r\n2.SQL\r\n3.Python\r\n4.JSP', '1.0', 0, 0, 6, '60.00', '60.00', '6.00', '6.00', 0, 0, '[3,7]', '', 12, 'Ninja', '[\'19it450\',\'19cp015\']', 1),
(3, 2, '2023-03-17', 1250000, 'Ahmedabad ', 'To become the best tech company in the country and the world, building multiple diverse products and services, having exceptionally talented and passionate people with down-to-earth attitude and humility.', '1.Java\r\n2.Python', '0.0', 15000, 1, 6, '60.00', '60.00', '6.00', '6.00', 0, 0, '[2,6]', NULL, 12, 'Software Developer', '[\'19cp015\']', 0);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(10) NOT NULL,
  `heading` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `no_of_stu` int(10) DEFAULT NULL,
  `posted_on` date DEFAULT NULL,
  `student_placed` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`student_placed`)),
  `drive_id` int(10) DEFAULT NULL,
  `comp_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `heading`, `description`, `no_of_stu`, `posted_on`, `student_placed`, `drive_id`, `comp_id`) VALUES
(1, 'TCS on-campus results are out.', 'Congratulations to the shortlisted and check this out.', 5, '2023-03-21', '[\"19it450\",\"19cp015\",\"19it453\"]', 1, 1),
(2, 'Infocusp results are out.', 'Congratulations to the shortlisted and check this out.', 3, '2023-03-20', '[\"19it429\",\"19it476\",\"19cp025\"]', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_number` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `middle_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `pemail` varchar(64) DEFAULT NULL,
  `semail` varchar(64) DEFAULT NULL,
  `dept_id` int(10) DEFAULT NULL,
  `linkedinurl` varchar(64) DEFAULT NULL,
  `dob` date NOT NULL,
  `enrolno` varchar(64) DEFAULT NULL,
  `category` varchar(64) DEFAULT NULL,
  `isinterestedforplacement` int(10) DEFAULT 1,
  `paddressline1` varchar(64) DEFAULT NULL,
  `paddresslcity` varchar(64) DEFAULT NULL,
  `paddressldis` varchar(64) DEFAULT NULL,
  `paddresslpin` int(6) DEFAULT NULL,
  `paddresslstate` varchar(64) DEFAULT NULL,
  `paddresslcountry` varchar(64) DEFAULT NULL,
  `tpaddressline1` varchar(64) DEFAULT NULL,
  `taddresslcity` varchar(64) DEFAULT NULL,
  `taddressldis` varchar(64) DEFAULT NULL,
  `taddresslpin` int(6) DEFAULT NULL,
  `taddresslstate` varchar(64) DEFAULT NULL,
  `taddresslcountry` varchar(64) DEFAULT NULL,
  `is_registered` int(10) DEFAULT 0,
  `is_approved` int(10) DEFAULT 0,
  `is_placed` int(10) DEFAULT 0,
  `bvm_passing_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_number`, `password`, `first_name`, `middle_name`, `last_name`, `gender`, `mobile`, `pemail`, `semail`, `dept_id`, `linkedinurl`, `dob`, `enrolno`, `category`, `isinterestedforplacement`, `paddressline1`, `paddresslcity`, `paddressldis`, `paddresslpin`, `paddresslstate`, `paddresslcountry`, `tpaddressline1`, `taddresslcity`, `taddressldis`, `taddresslpin`, `taddresslstate`, `taddresslcountry`, `is_registered`, `is_approved`, `is_placed`, `bvm_passing_year`) VALUES
('19CP015', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'Jimish', 'asdfghjk', 'Ravat', 'Male', '8733095566', '19cp015@bvmengineering.ac.in', 'jimish@gmail.com', 2, 'www.linkedin.com', '2001-03-15', '6101', 'General', 1, 'C-1512,Kaliyabid ', 'Bhavnagar', 'Bhavnagar', 364002, 'Gujarat', 'India', 'Sector2A', 'Gandhinagar ', 'Gandhinagar', 382007, 'Gujarat ', 'India', 0, 1, 0, 0),
('19IT450', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'Dhyey', 'Dhruvkumar', 'Badheka', 'Male', '7984528154', '19it450@bvmengineering.ac.in', 'badheka15@gmail.com', 6, NULL, '2001-10-23', '6006', 'General', 1, 'C-1512,Kaliyabid ', 'Bhavnagar', 'Bhavnagar', 364002, 'Gujarat', 'India', 'Sector2A', 'Gandhinagar ', 'Gandhinagar', 382007, 'Gujarat ', 'India', 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_academic`
--

CREATE TABLE `student_academic` (
  `s_id` varchar(20) NOT NULL,
  `ssc_passing_year` int(10) DEFAULT NULL,
  `ssc_total` int(10) DEFAULT NULL,
  `ssc_board` varchar(64) DEFAULT NULL,
  `ssc_school` varchar(64) DEFAULT NULL,
  `ssc_educational_gap` int(10) DEFAULT NULL,
  `hsc_passing_year` int(10) DEFAULT NULL,
  `hsc_th_percentage` decimal(4,2) DEFAULT NULL,
  `hsc_th_p_percentage` decimal(4,2) DEFAULT NULL,
  `hsc_th_marks` int(10) DEFAULT NULL,
  `hsc_th_p_marks` int(10) DEFAULT NULL,
  `hsc_board` varchar(64) DEFAULT NULL,
  `hsc_school` varchar(64) DEFAULT NULL,
  `isd2d` int(10) DEFAULT 0,
  `hsc_educational_gap` int(10) DEFAULT NULL,
  `d2d_passing_year` int(10) DEFAULT NULL,
  `d2d_cgpa` decimal(4,2) DEFAULT NULL,
  `d2d_college` varchar(64) DEFAULT NULL,
  `d2d_sem1` decimal(4,2) DEFAULT NULL,
  `d2d_sem2` decimal(4,2) DEFAULT NULL,
  `d2d_sem3` decimal(4,2) DEFAULT NULL,
  `d2d_sem4` decimal(4,2) DEFAULT NULL,
  `d2d_sem5` decimal(4,2) DEFAULT NULL,
  `d2d_sem6` decimal(4,2) DEFAULT NULL,
  `d2d_backlogs` int(10) DEFAULT NULL,
  `d2d_educational_gap` int(10) DEFAULT NULL,
  `bvm_sem1` decimal(4,2) DEFAULT NULL,
  `bvm_sem2` decimal(4,2) DEFAULT NULL,
  `bvm_sem3` decimal(4,2) DEFAULT NULL,
  `bvm_sem4` decimal(4,2) DEFAULT NULL,
  `bvm_sem5` decimal(4,2) DEFAULT NULL,
  `bvm_sem6` decimal(4,2) DEFAULT NULL,
  `bvm_sem7` decimal(4,2) NOT NULL,
  `bvm_sem8` decimal(4,2) NOT NULL,
  `bvm_active_backlog` int(10) DEFAULT NULL,
  `bvm_dead_backlog` int(10) DEFAULT NULL,
  `bvm_total_backlog` int(10) DEFAULT NULL,
  `bvm_cpi` decimal(4,2) DEFAULT NULL,
  `ssc_th_percentage` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_academic`
--

INSERT INTO `student_academic` (`s_id`, `ssc_passing_year`, `ssc_total`, `ssc_board`, `ssc_school`, `ssc_educational_gap`, `hsc_passing_year`, `hsc_th_percentage`, `hsc_th_p_percentage`, `hsc_th_marks`, `hsc_th_p_marks`, `hsc_board`, `hsc_school`, `isd2d`, `hsc_educational_gap`, `d2d_passing_year`, `d2d_cgpa`, `d2d_college`, `d2d_sem1`, `d2d_sem2`, `d2d_sem3`, `d2d_sem4`, `d2d_sem5`, `d2d_sem6`, `d2d_backlogs`, `d2d_educational_gap`, `bvm_sem1`, `bvm_sem2`, `bvm_sem3`, `bvm_sem4`, `bvm_sem5`, `bvm_sem6`, `bvm_sem7`, `bvm_sem8`, `bvm_active_backlog`, `bvm_dead_backlog`, `bvm_total_backlog`, `bvm_cpi`, `ssc_th_percentage`) VALUES
('19CP015', 2017, 510, 'GSEB', 'Saint Arnold High School', 0, 2019, '80.80', '79.23', 404, 515, 'GSEB', 'Sahjanand School of Achievers ', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.53', '10.00', '8.71', '10.00', '9.81', '9.26', '0.00', '0.00', 0, 0, 0, '9.26', '87.75'),
('19IT450', 2017, 527, 'GSEB', 'Sardar Patel Educational Institute', 0, 2019, '82.00', '81.69', 410, 531, 'GSEB', 'Gyanmanjari Vidyapith ', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9.29', '10.00', '9.18', '10.00', '9.62', '9.18', '0.00', '0.00', 0, 0, 0, '9.33', '85.42');

-- --------------------------------------------------------

--
-- Table structure for table `student_document`
--

CREATE TABLE `student_document` (
  `s_id` varchar(20) NOT NULL,
  `ssc_marksheet` varchar(64) DEFAULT NULL,
  `hsc_marksheet` varchar(64) DEFAULT NULL,
  `d2d_marksheet` varchar(64) DEFAULT NULL,
  `bvm_marksheet` varchar(64) DEFAULT NULL,
  `resume` varchar(64) DEFAULT NULL,
  `photo` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_document`
--

INSERT INTO `student_document` (`s_id`, `ssc_marksheet`, `hsc_marksheet`, `d2d_marksheet`, `bvm_marksheet`, `resume`, `photo`) VALUES
('19CP015', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'infocusp.png'),
('19IT450', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Student Profile Update.pdf', 'Dhyey.jpg');

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
('19cp015', 'Jimish Ravat', '19cp015@bvmengineering.ac.in', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 9876543210, 2, 0, 2023, 1),
('19IT450', 'Dhyey Badheka', '19it450@bvmengineering.ac.in', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 7984528154, 6, 0, 2023, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tpf`
--

CREATE TABLE `tpf` (
  `tpf_id` int(10) NOT NULL,
  `tpf_name` varchar(64) NOT NULL,
  `tpf_email` varchar(64) DEFAULT NULL,
  `tpf_password` varchar(64) DEFAULT NULL,
  `tpf_mobile` bigint(10) DEFAULT NULL,
  `tpf_dept_id` int(10) DEFAULT NULL,
  `tpf_is_approved` int(10) DEFAULT 0,
  `academic_year` int(10) DEFAULT NULL,
  `isActive` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpf`
--

INSERT INTO `tpf` (`tpf_id`, `tpf_name`, `tpf_email`, `tpf_password`, `tpf_mobile`, `tpf_dept_id`, `tpf_is_approved`, `academic_year`, `isActive`) VALUES
(1, 'Dr. Vatsal Shah', 'vatsal.shah@bvmengineering.ac.in', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 9879657543, 6, 0, 2023, 1),
(2, 'Dr. Mahashweta', 'mahashweta@bvmengineering.ac.in', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 9679657543, 2, 0, 2023, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tpo`
--

CREATE TABLE `tpo` (
  `tpo_id` varchar(64) NOT NULL,
  `tpo_name` varchar(64) NOT NULL,
  `tpo_email` varchar(64) NOT NULL,
  `tpo_number` bigint(10) NOT NULL,
  `tpo_password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpo`
--

INSERT INTO `tpo` (`tpo_id`, `tpo_name`, `tpo_email`, `tpo_number`, `tpo_password`) VALUES
('1', 'Dhyey', '19it450@bvmengineering.ac.in', 7984528154, 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU='),
('2', 'admin', 'admin@bvmengineering.ac.in', 8733095566, 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `drive`
--
ALTER TABLE `drive`
  ADD PRIMARY KEY (`drive_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `drive_id` (`drive_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `pemail` (`pemail`),
  ADD UNIQUE KEY `semail` (`semail`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `student_academic`
--
ALTER TABLE `student_academic`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_document`
--
ALTER TABLE `student_document`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tpc`
--
ALTER TABLE `tpc`
  ADD PRIMARY KEY (`tpc_id`),
  ADD KEY `tpc_dept_id` (`tpc_dept_id`);

--
-- Indexes for table `tpf`
--
ALTER TABLE `tpf`
  ADD PRIMARY KEY (`tpf_id`),
  ADD UNIQUE KEY `tpf_email` (`tpf_email`),
  ADD KEY `tpf_dept_id` (`tpf_dept_id`);

--
-- Indexes for table `tpo`
--
ALTER TABLE `tpo`
  ADD PRIMARY KEY (`tpo_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drive`
--
ALTER TABLE `drive`
  MODIFY `drive_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tpf`
--
ALTER TABLE `tpf`
  MODIFY `tpf_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drive`
--
ALTER TABLE `drive`
  ADD CONSTRAINT `drive_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`drive_id`) REFERENCES `drive` (`drive_id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `student_academic`
--
ALTER TABLE `student_academic`
  ADD CONSTRAINT `student_academic_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`id_number`);

--
-- Constraints for table `student_document`
--
ALTER TABLE `student_document`
  ADD CONSTRAINT `student_document_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`id_number`);

--
-- Constraints for table `tpc`
--
ALTER TABLE `tpc`
  ADD CONSTRAINT `tpc_ibfk_1` FOREIGN KEY (`tpc_dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `tpc_ibfk_2` FOREIGN KEY (`tpc_id`) REFERENCES `student` (`id_number`);

--
-- Constraints for table `tpf`
--
ALTER TABLE `tpf`
  ADD CONSTRAINT `tpf_ibfk_1` FOREIGN KEY (`tpf_dept_id`) REFERENCES `department` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
