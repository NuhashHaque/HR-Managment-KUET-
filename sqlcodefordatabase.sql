-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2019 at 05:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrkuet`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_course` ()  NO SQL
SELECT * FROM course$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showwithid` (IN `id` INT(11))  NO SQL
SELECT * FROM employee where emp_id=id$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `no_of_years` (`date1` DATE) RETURNS INT(11) BEGIN
 DECLARE date2 DATE;
  Select current_date()into date2;
  RETURN year(date2)-year(date1);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminstration`
--

CREATE TABLE `adminstration` (
  `admin_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `section` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminstration`
--

INSERT INTO `adminstration` (`admin_id`, `emp_id`, `section`, `designation`) VALUES
(2, 19, 'account ', 'sectionofficer'),
(3, 25, 'IT ', 'itofficer'),
(5, 27, 'admin ', 'clerk'),
(6, 29, 'library ', 'librarian');

--
-- Triggers `adminstration`
--
DELIMITER $$
CREATE TRIGGER `lower_adminstration` BEFORE INSERT ON `adminstration` FOR EACH ROW SET NEW.section=LOWER(NEW.section),
NEW.designation = LOWER(NEW.designation)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `fact_id` int(11) DEFAULT NULL,
  `d_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `fact_id`, `d_no`) VALUES
(1, 'Database', 17, 19),
(2, 'Machine', 18, 20);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_no` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_no`, `d_name`, `faculty`) VALUES
(19, 'CSE', 'EEE'),
(20, 'EEE', 'EEE'),
(21, 'LE', 'ME'),
(22, 'BME', 'EEE'),
(23, 'MTE', 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phn_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `jointime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `email`, `phn_no`, `address`, `age`, `gender`, `salary`, `jointime`) VALUES
(17, 'mr.professor', 'mr.professor@gmail.com', '123', 'khulna', 45, 'male', 80000, '2013-06-14 16:36:36'),
(18, 'mr.professor1', 'professor1@gmail.com', '3452', 'satkhira', 47, 'male', 81000, '2014-06-14 16:37:56'),
(19, 'mr.sectionofficer', 'sectionofficer@gmail.com', '4632', 'jessore', 43, 'male', 50000, '2005-06-14 16:39:59'),
(20, 'mr.officestuff', 'officestuff@gmail.com', '78966', 'gopalgonj', 36, 'male', 30000, '2002-06-14 16:41:02'),
(21, 'mr.officestuff1', 'officestuff1@gmail.com', '8665', 'dhaka', 45, 'male', 32000, '2014-06-14 16:41:52'),
(22, 'mr.sectionofficer1', 'sectionofficer1@gmail.com', '5754', 'faridpur', 49, 'male', 60000, '2012-06-14 16:42:55'),
(23, 'mr.professor2', 'professor2@gmail.com', '3263', 'Khulna', 50, 'male', 100000, '2007-06-14 16:45:00'),
(24, 'mr.professor3', 'professor3@gmail.com', '4353', 'Khulna', 56, 'male', 120000, '2004-06-14 16:45:52'),
(25, 'mr.itoffiecr', 'itofficer@gmail.com', '6653', 'Khulna', 33, 'male', 45000, '2001-06-14 16:46:56'),
(26, 'mr.itofficer1', 'itofficer1@gmail.com', '21521', 'rajbari', 31, 'male', 30000, '1999-06-14 16:48:07'),
(27, 'mr.clerkboy', 'clerkboy@gmail.com', '2124', 'Khulna', 18, 'male', 1000, '2005-06-15 11:14:23'),
(28, 'mr.lecturer', 'lecturer@gmail.com', '0991', 'Dhaka', 27, 'male', 40000, '2002-06-15 11:17:58'),
(29, 'mr.librarian', 'librarian@gmail.com', '4215', 'barishal', 18, 'male', 60000, '2005-06-15 12:30:55');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `employee_trigger` BEFORE INSERT ON `employee` FOR EACH ROW SET NEW.name=LOWER(NEW.name),
NEW.email = LOWER(NEW.email),NEW.phn_no = LOWER(NEW.phn_no),NEW.address= LOWER(NEW.address),NEW.gender = LOWER(NEW.gender)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `facultymember`
--

CREATE TABLE `facultymember` (
  `fact_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `d_no` int(11) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultymember`
--

INSERT INTO `facultymember` (`fact_id`, `emp_id`, `d_no`, `designation`, `department`) VALUES
(17, 17, 19, 'professor', 'CSE'),
(18, 18, 20, 'professor', 'EEE'),
(19, 28, 19, 'lecturer', 'cse');

--
-- Triggers `facultymember`
--
DELIMITER $$
CREATE TRIGGER `lower_facultymember` BEFORE INSERT ON `facultymember` FOR EACH ROW SET NEW.designation=LOWER(NEW.designation),
NEW.department = LOWER(NEW.department)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `fund` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `name`, `supervisor_id`, `duration`, `fund`) VALUES
(1, 'Bigdata', 17, '2 year', 200000),
(2, 'Renewable Energy', 18, '3 year', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `section` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `emp_id`, `section`, `department`, `designation`) VALUES
(2, 20, 'staff ', 'admin', 'staff'),
(3, 21, 'staff ', 'CSE', 'staff');

--
-- Triggers `staff`
--
DELIMITER $$
CREATE TRIGGER `lower_staff` BEFORE INSERT ON `staff` FOR EACH ROW SET NEW.section=LOWER(NEW.section),
NEW.department = LOWER(NEW.department),
NEW.designation = LOWER(NEW.designation)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `tr_id` int(11) NOT NULL,
  `training_name` varchar(255) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`tr_id`, `training_name`, `emp_id`, `duration`) VALUES
(1, 'Access To Information', 25, '1 year'),
(2, 'ComputerTraining', 20, '1 year'),
(3, 'ClassRoomDigital', 17, '6 months'),
(4, 'ClassRoomDigital', 18, '6 months');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminstration`
--
ALTER TABLE `adminstration`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fact_id` (`fact_id`),
  ADD KEY `d_no` (`d_no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `facultymember`
--
ALTER TABLE `facultymember`
  ADD PRIMARY KEY (`fact_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `d_no` (`d_no`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fact_id` (`supervisor_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminstration`
--
ALTER TABLE `adminstration`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `facultymember`
--
ALTER TABLE `facultymember`
  MODIFY `fact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminstration`
--
ALTER TABLE `adminstration`
  ADD CONSTRAINT `adminstration_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`fact_id`) REFERENCES `facultymember` (`fact_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`d_no`) REFERENCES `department` (`d_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facultymember`
--
ALTER TABLE `facultymember`
  ADD CONSTRAINT `facultymember_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facultymember_ibfk_2` FOREIGN KEY (`d_no`) REFERENCES `department` (`d_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `facultymember` (`fact_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
