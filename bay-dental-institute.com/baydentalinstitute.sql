-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 06:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baydentalinstitute`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(64) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `course_id`) VALUES
('niveditalodha', 2),
('niveditalodha', 3),
('saahilchawande', 1),
('saahilchawande', 14);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(512) NOT NULL,
  `mobileNo` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`username`, `password`, `email`, `address`, `mobileNo`) VALUES
('saahilchawande', 'saahil@123', 'chawandesaahil600@gmail.com', 'B wing', '9892617671'),
('anilchawande', 'anil@123', 'anilchawande@gmail.com', '12345678', ''),
('nvlodha', 'nivi@123', 'nivi@gail.com', '123456', ''),
('ronakmanglani', 'ronak@123', 'rabc@gmail.com', '1234', ''),
('niveditalodha', 'nivi@123', 'nivi@gmail.com', '1234567', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(264) NOT NULL,
  `course_duration` varchar(264) NOT NULL,
  `course_cost` varchar(10) NOT NULL,
  `tutor` varchar(128) NOT NULL,
  `main_course` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_duration`, `course_cost`, `tutor`, `main_course`) VALUES
(1, 'ORE / LDS Orientation and Introduction', '1 day / 3 hour program', '1000', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(2, 'Part I - Theory Exam Coaching', '2 days coaching / 9 am to 6 pm', '30000', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(3, 'Part II - Comprehensive Coaching', '5 days / 9 am to 6 pm', '50000', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(4, 'Part II - 2 Day Revision Coourse', '2 days / 9 am to 6 pm', '25000', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(5, '1 Day OSCE Mock Exam', '3 hours mock exam', '6000', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(6, '1 Day Manikin Mock Exam', '3 hour mock exam', '5500', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(7, '1 Day ME + DTP Mock Exam', '20 mins ME Mock exam followed by 1 hour DTP mock exam', '12000', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(8, 'ORE / LDS Part II Complete Mock', '4 Modules conducted over 3 days just like exam', '20000', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(9, '1 Day Manikin Revision', '1 day / 9 am to 6 pm', '6000', 'Dr. Shravan Chawla', 'ORE / LDS - UK'),
(10, 'Orientation and Introduction', '6 hours', '1500', 'Dr. Akshari Anchan', 'NBDE (USA) / NDEB (CANADA)'),
(11, 'NBDE / NDEB - Impulse Part 1', '8 days (4 + 4) / 9 am to 11 am (15 hours total)', '16000', 'Dr. Akshari Anchan', 'NBDE (USA) / NDEB (CANADA)'),
(12, 'NBDE / NDEB - Impulse Part 2', '10 days (5 + 5) / 9 am to 11 am (20 hours total)', '20000', 'Dr. Akshari Anchan', 'NBDE (USA) / NDEB (CANADA)'),
(13, 'NBDE / NDEB - Intense Part 1', '24 days total (6 days / week * 4 weeks / 9 am to 11 am / total 48 hours coaching)', '30000', 'Dr. Akshari Anchan', 'NBDE (USA) / NDEB (CANADA)'),
(14, 'NBDE / NDEB - Intense Part 2', '24 days total (6 days / week * 4 weeks / 9 am to 11 am / total 48 hours coaching)', '40000', 'Dr. Akshari Anchan', 'NBDE (USA) / NBDE (CANADA)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`username`,`course_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
