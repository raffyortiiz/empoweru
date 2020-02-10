-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 05:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `contact` int(13) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fname`, `lname`, `type`, `contact`, `email`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin', 'Admin', 1234567891, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `appID` int(6) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(10) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `education` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `recent job` varchar(30) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `experience` varchar(30) NOT NULL,
  `job position` varchar(30) NOT NULL,
  `r_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `tagby` varchar(255) NOT NULL,
  `u_resume` blob NOT NULL,
  `filename` varchar(255) NOT NULL,
  `i_date` date NOT NULL,
  `i_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`appID`, `fname`, `mname`, `lname`, `gender`, `age`, `email`, `education`, `city`, `contact`, `recent job`, `company`, `experience`, `job position`, `r_date`, `status`, `tagby`, `u_resume`, `filename`, `i_date`, `i_time`) VALUES
(78, 'Diego', NULL, 'Saylon', 'Male', 0, 'foundingfathers2019@gmail.com', 'Waiting', '', 12345, '', '', '1 year', '', '2020-02-07 13:27:11', 'Approved', 'test', '', '', '0000-00-00', '00:00:00'),
(84, 'Diego', NULL, 'Saylon', 'Male', 0, 'foundingfathers2018@gmail.com', 'High School Equivalent', '', 12345, '', '', 'Less than 1 year', '', '2020-02-07 21:01:23', 'Approved', 'test', 0x75706c6f6164732f37313730353463765f646965676f2e646f63782e706466, 'uploads/717054cv_diego.docx.pdf', '0000-00-00', '00:00:00'),
(85, 'test', NULL, 'test', 'Male', 0, 'jegomeister@gmail.com', 'High School Equivalent', '', 12345, '', '', 'Less than 1 year', '', '2020-02-07 21:41:29', 'Approved', 'test', 0x75706c6f6164732f39393736323370706c65747465722e706466, 'uploads/997623ppletter.pdf', '0000-00-00', '00:00:00'),
(86, 'Rafael Francisco', NULL, 'Ortiz', 'Male', 0, 'raffyortiiz@gmail.com', 'Postgraduate', '', 639954838853, '', '', 'Less than 1 year', '', '2020-02-07 01:30:20', 'For Interview', 'admin', 0x75706c6f6164732f393431343633726573756d652e706466, 'uploads/941463resume.pdf', '0000-00-00', '00:00:00'),
(87, 'Jose Mari', NULL, 'Lim', 'Male', 0, 'josemari.lim@gmail.com', 'Postgraduate', '', 9951239874, '', '', 'More than 1 year', '', '2020-02-08 01:29:04', 'Pending', '', 0x75706c6f6164732f353939303739726573756d652e706466, 'uploads/599079resume.pdf', '0000-00-00', '00:00:00'),
(88, 'Allan', NULL, 'Rigates', 'Male', 0, 'allan.rigates@yahoo.com', 'Postgraduate', '', 9224187792, '', '', 'More than 1 year', '', '2020-02-08 01:41:32', 'Pending', '', 0x75706c6f6164732f323235303039746573742e706466, 'uploads/225009test.pdf', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hired`
--

CREATE TABLE `hired` (
  `hid` int(11) NOT NULL,
  `appid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hired`
--

INSERT INTO `hired` (`hid`, `appid`) VALUES
(3, 85),
(1, 86),
(2, 87);

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `hrID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(21) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`hrID`, `username`, `password`, `type`, `fname`, `lname`, `contact`, `email`) VALUES
(4, 'hrmanager202', '2020', 'HR Manager', '', '', 0, ''),
(7, 'jegs1', 'jegs1', 'HR Manager', 'jegs1', 'jegs1', 123456, 'dgxsyln@gmail.com'),
(8, 'hr0001', '1234', 'HR', 'juan', 'dela cruz', 9167719691, 'hr001@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job qualification`
--

CREATE TABLE `job qualification` (
  `id` int(11) NOT NULL,
  `jobtype` varchar(30) NOT NULL,
  `education` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job qualification`
--

INSERT INTO `job qualification` (`id`, `jobtype`, `education`, `experience`) VALUES
(1, 'Customer Service', 0, 0),
(2, 'Sales', 0, 0),
(3, 'Tech Support', 0, 0),
(4, 'Others', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`appID`);

--
-- Indexes for table `hired`
--
ALTER TABLE `hired`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `hired applicant` (`appid`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`hrID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `job qualification`
--
ALTER TABLE `job qualification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `appID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `hired`
--
ALTER TABLE `hired`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `hrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job qualification`
--
ALTER TABLE `job qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
