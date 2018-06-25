-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2018 at 04:31 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dependent`
--

CREATE TABLE `dependent` (
  `emp_no` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_no` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_no` int(10) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_no`, `username`, `password`, `name`, `gender`, `address`, `telephone_no`, `flag`) VALUES
(1, 'hirantha', 'admin', 'Hirantha Rathnayake', 'male', 'ginipenda,kalugamuwa', 702693523, 40),
(2, 'admin', 'admin', 'sample staff member', 'male', 'on earth', 72131323, 30);

-- --------------------------------------------------------

--
-- Table structure for table `has_illness`
--

CREATE TABLE `has_illness` (
  `p_no` int(5) NOT NULL,
  `ill_code` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `illness`
--

CREATE TABLE `illness` (
  `ill_code` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `illness`
--

INSERT INTO `illness` (`ill_code`, `title`, `description`) VALUES
(8, 'dfsfd', 'cxczx'),
(18, 'New illness ponna pathum', 'By phone edit work toozx'),
(19, 'dengu', 'hard feaverdsad'),
(25, 'sanka rathnayake', 'rathnayake sex'),
(27, 'add', 'ane sudu hirantha wada karanna'),
(28, 'adcf', 'kasuni ekka passe mal kadanna..');

-- --------------------------------------------------------

--
-- Table structure for table `in_paitient`
--

CREATE TABLE `in_paitient` (
  `p_no` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_no` int(10) NOT NULL,
  `blood_type` varchar(4) NOT NULL,
  `cholesterol_level` int(5) NOT NULL,
  `blood_sugar` int(3) NOT NULL,
  `date_admission` date NOT NULL,
  `nursing_unit` int(5) NOT NULL,
  `room_number` int(5) NOT NULL,
  `bed_number` int(5) NOT NULL,
  `emp_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical_corporation`
--

CREATE TABLE `medical_corporation` (
  `c_name` varchar(100) NOT NULL,
  `headquaters` varchar(100) NOT NULL,
  `owner_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `m_code` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity_hand` int(5) NOT NULL,
  `quantity_order` int(5) NOT NULL,
  `unit_cost` int(5) NOT NULL,
  `interact` int(5) NOT NULL,
  `severity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `emp_no` int(5) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `years_experiance` int(2) NOT NULL,
  `annual_salary` int(8) NOT NULL,
  `surgery_code` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `out_patient`
--

CREATE TABLE `out_patient` (
  `p_no` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_no` int(10) NOT NULL,
  `blood_type` varchar(4) NOT NULL,
  `cholesterol_level` int(5) NOT NULL,
  `blood_sugar` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_Id` int(5) NOT NULL,
  `percentage` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_no` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone_no` int(10) NOT NULL,
  `blood_type` varchar(4) NOT NULL,
  `cholesterol_level` int(5) NOT NULL,
  `blood_sugar` int(3) NOT NULL,
  `emp_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_allergies`
--

CREATE TABLE `patient_allergies` (
  `p_no` int(5) NOT NULL,
  `allergy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physician`
--

CREATE TABLE `physician` (
  `emp_no` int(5) NOT NULL,
  `speciality` varchar(30) NOT NULL,
  `annual_salary` int(8) NOT NULL,
  `p_no` int(5) NOT NULL,
  `owner_Id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescribe`
--

CREATE TABLE `prescribe` (
  `emp_no` int(5) NOT NULL,
  `p_no` int(5) NOT NULL,
  `m_code` int(5) NOT NULL,
  `dosage` int(5) NOT NULL,
  `frequency` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support_staff`
--

CREATE TABLE `support_staff` (
  `emp_no` int(5) NOT NULL,
  `annual_salary` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surgeon`
--

CREATE TABLE `surgeon` (
  `emp_no` int(5) NOT NULL,
  `speciality` varchar(30) NOT NULL,
  `contract_type` varchar(100) NOT NULL,
  `contract_length` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surgery`
--

CREATE TABLE `surgery` (
  `surgery_code` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surgery`
--

INSERT INTO `surgery` (`surgery_code`, `name`, `category`) VALUES
(5, 'fdsf', 'dsfsf');

-- --------------------------------------------------------

--
-- Table structure for table `surgery_perform`
--

CREATE TABLE `surgery_perform` (
  `surgery_code` int(5) NOT NULL,
  `p_no` int(5) NOT NULL,
  `emp_no` int(5) NOT NULL,
  `theatre_Id` int(5) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surgery_skill`
--

CREATE TABLE `surgery_skill` (
  `skill_code` int(5) NOT NULL,
  `description` int(255) NOT NULL,
  `surgery_code` int(5) NOT NULL,
  `emp_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surgery_specialneeds`
--

CREATE TABLE `surgery_specialneeds` (
  `surgery_code` int(5) NOT NULL,
  `special_need` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`emp_no`,`name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_no`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `has_illness`
--
ALTER TABLE `has_illness`
  ADD PRIMARY KEY (`p_no`,`ill_code`);

--
-- Indexes for table `illness`
--
ALTER TABLE `illness`
  ADD PRIMARY KEY (`ill_code`);

--
-- Indexes for table `in_paitient`
--
ALTER TABLE `in_paitient`
  ADD PRIMARY KEY (`p_no`),
  ADD KEY `in_paitient_ibfk_1` (`emp_no`);

--
-- Indexes for table `medical_corporation`
--
ALTER TABLE `medical_corporation`
  ADD PRIMARY KEY (`c_name`),
  ADD KEY `owner_Id` (`owner_Id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`m_code`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`emp_no`),
  ADD KEY `surgery_code` (`surgery_code`);

--
-- Indexes for table `out_patient`
--
ALTER TABLE `out_patient`
  ADD PRIMARY KEY (`p_no`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_no`),
  ADD KEY `emp_no` (`emp_no`);

--
-- Indexes for table `patient_allergies`
--
ALTER TABLE `patient_allergies`
  ADD PRIMARY KEY (`p_no`,`allergy`);

--
-- Indexes for table `physician`
--
ALTER TABLE `physician`
  ADD PRIMARY KEY (`emp_no`),
  ADD KEY `p_no` (`p_no`),
  ADD KEY `owner_Id` (`owner_Id`);

--
-- Indexes for table `prescribe`
--
ALTER TABLE `prescribe`
  ADD PRIMARY KEY (`emp_no`,`p_no`,`m_code`);

--
-- Indexes for table `support_staff`
--
ALTER TABLE `support_staff`
  ADD PRIMARY KEY (`emp_no`);

--
-- Indexes for table `surgeon`
--
ALTER TABLE `surgeon`
  ADD PRIMARY KEY (`emp_no`);

--
-- Indexes for table `surgery`
--
ALTER TABLE `surgery`
  ADD PRIMARY KEY (`surgery_code`);

--
-- Indexes for table `surgery_perform`
--
ALTER TABLE `surgery_perform`
  ADD PRIMARY KEY (`surgery_code`,`p_no`,`emp_no`);

--
-- Indexes for table `surgery_skill`
--
ALTER TABLE `surgery_skill`
  ADD PRIMARY KEY (`skill_code`),
  ADD KEY `surgery_skill_ibfk_1` (`surgery_code`),
  ADD KEY `surgery_skill_ibfk_2` (`emp_no`);

--
-- Indexes for table `surgery_specialneeds`
--
ALTER TABLE `surgery_specialneeds`
  ADD PRIMARY KEY (`surgery_code`,`special_need`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `illness`
--
ALTER TABLE `illness`
  MODIFY `ill_code` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `in_paitient`
--
ALTER TABLE `in_paitient`
  ADD CONSTRAINT `in_paitient_ibfk_1` FOREIGN KEY (`emp_no`) REFERENCES `employee` (`emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medical_corporation`
--
ALTER TABLE `medical_corporation`
  ADD CONSTRAINT `medical_corporation_ibfk_1` FOREIGN KEY (`owner_Id`) REFERENCES `owner` (`owner_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurse_fk` FOREIGN KEY (`emp_no`) REFERENCES `employee` (`emp_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`surgery_code`) REFERENCES `surgery` (`surgery_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `physician`
--
ALTER TABLE `physician`
  ADD CONSTRAINT `physicial_ibpk` FOREIGN KEY (`emp_no`) REFERENCES `employee` (`emp_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `physician_ibfk_1` FOREIGN KEY (`owner_Id`) REFERENCES `owner` (`owner_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `physician_ibfk_2` FOREIGN KEY (`p_no`) REFERENCES `patient` (`p_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `support_staff`
--
ALTER TABLE `support_staff`
  ADD CONSTRAINT `pk_support_staff` FOREIGN KEY (`emp_no`) REFERENCES `employee` (`emp_no`) ON DELETE CASCADE;

--
-- Constraints for table `surgeon`
--
ALTER TABLE `surgeon`
  ADD CONSTRAINT `pk_surgeon` FOREIGN KEY (`emp_no`) REFERENCES `employee` (`emp_no`) ON DELETE CASCADE;

--
-- Constraints for table `surgery_skill`
--
ALTER TABLE `surgery_skill`
  ADD CONSTRAINT `surgery_skill_ibfk_1` FOREIGN KEY (`surgery_code`) REFERENCES `surgery` (`surgery_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `surgery_skill_ibfk_2` FOREIGN KEY (`emp_no`) REFERENCES `nurse` (`emp_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
