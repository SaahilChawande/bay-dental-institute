-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 09:54 AM
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
('admin', 3),
('chawlashravan@gmail.com', 1),
('chawlashravan@gmail.com', 2),
('chawlashravan@gmail.com', 5),
('chawlashravan@gmail.com', 12),
('chawlashravan@gmail.com', 13),
('niveditalodha', 2),
('niveditalodha', 3),
('richa', 1),
('richa', 2),
('richa', 3),
('richa', 4),
('richa', 5),
('richa', 6),
('richa', 7),
('richa', 8),
('richa', 9),
('richa', 10),
('richa', 11),
('richa', 12),
('richa', 13),
('richa', 14),
('saahilchawande', 1);

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
('saahilchawande', 'Saahil@123', 'chawandesaahil600@gmail.com', 'B wing', '9892617671'),
('anilchawande', 'anil@123', 'anilchawande@gmail.com', '12345678', ''),
('nvlodha', 'nivi@123', 'lodhanivedita@yahoo.in', '123456', ''),
('ronakmanglani', 'ronak@123', 'rabc@gmail.com', '1234', ''),
('niveditalodha', 'nivi@123', 'lodhanivedita@yahoo.in', '1234567', '9821683187'),
('admin', 'admin123', 'thevibetheorem@gmail.com', 'mumbai', '9930830048'),
('richa', 'richadoshi@1234', 'richa20@gmail.com', 'abcd', '8097213123'),
('chawlashravan@gmail.com', 'shravan1985', 'chawlashravan@gmail.com', '21-B, vaibhav building, breach candy, bhulabhai desai road', '9820958880'),
('saniya07', 'abc1234#', 'saniyachadda97@gmail.com', 'Malad West', '9820037721');

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
  `main_course` varchar(64) NOT NULL,
  `enrolled` int(11) NOT NULL,
  `maximum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_duration`, `course_cost`, `tutor`, `main_course`, `enrolled`, `maximum`) VALUES
(1, 'ORE / LDS Orientation and Introduction', '1 day / 3 hour program', '1000', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(2, 'Part I - Theory Exam Coaching', '2 days coaching / 9 am to 6 pm', '30000', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(3, 'Part II - Comprehensive Coaching', '5 days / 9 am to 6 pm', '50000', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(4, 'Part II - 2 Day Revision Coourse', '2 days / 9 am to 6 pm', '25000', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(5, '1 Day OSCE Mock Exam', '3 hours mock exam', '6000', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(6, '1 Day Manikin Mock Exam', '3 hour mock exam', '5500', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(7, '1 Day ME + DTP Mock Exam', '20 mins ME Mock exam followed by 1 hour DTP mock exam', '12000', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(8, 'ORE / LDS Part II Complete Mock', '4 Modules conducted over 3 days just like exam', '20000', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(9, '1 Day Manikin Revision', '1 day / 9 am to 6 pm', '6000', 'Dr. Shravan Chawla', 'ORE / LDS - UK', 0, 10),
(10, 'Orientation and Introduction', '6 hours', '1500', 'Dr. Akshari Anchan', 'NBDE (USA) / NDEB (CANADA)', 0, 10),
(11, 'NBDE / NDEB - Impulse Part 1', '8 days (4 + 4) / 9 am to 11 am (15 hours total)', '16000', 'Dr. Akshari Anchan', 'NBDE (USA) / NDEB (CANADA)', 0, 10),
(12, 'NBDE / NDEB - Impulse Part 2', '10 days (5 + 5) / 9 am to 11 am (20 hours total)', '20000', 'Dr. Akshari Anchan', 'NBDE (USA) / NDEB (CANADA)', 0, 10),
(13, 'NBDE / NDEB - Intense Part 1', '24 days total (6 days / week * 4 weeks / 9 am to 11 am / total 48 hours coaching)', '30000', 'Dr. Akshari Anchan', 'NBDE (USA) / NDEB (CANADA)', 0, 10),
(14, 'NBDE / NDEB - Intense Part 2', '24 days total (6 days / week * 4 weeks / 9 am to 11 am / total 48 hours coaching)', '40000', 'Dr. Akshari Anchan', 'NBDE (USA) / NBDE (CANADA)', 0, 10),
(15, 'Demistifying Dentistry - Advanced Composite Clinical Masterclass', 'April 13th / 14th 2019 - 9 am to 5 pm', '25000', 'Dr. Vishal Gupta', 'Composites', 2, 10),
(16, 'Bespoke Veeners - Advanced Clinical Veener Simulation Workshop', 'April 20th / 21st 2019 - 9 am to 5 pm', '16500', 'Dr. Manav Kalra', 'Veneers', 0, 10),
(17, 'Veneers & Occlusion - Bespoke Smile Academy UK', 'Nov 16 - 17, 2019', '26500', 'Dr. Sam Jethwa', 'Veneers', 0, 10),
(18, 'Grey Scale - Advanced Dental Photography Course', '29 - 30th June 2019', '15000', 'Dr. Mayur Davda', 'Photography', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `store_cart`
--

CREATE TABLE `store_cart` (
  `username` varchar(64) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_products`
--

CREATE TABLE `store_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_products`
--

INSERT INTO `store_products` (`id`, `product_name`, `product_price`) VALUES
(1, 'Bur Number 330', 175),
(2, 'Bur Number 170', 175),
(3, 'Dental Mannequin', 25000),
(4, 'Notes for ORE - Part 1', 15000),
(5, 'Notes for ORE - Part 2', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `amount` varchar(64) NOT NULL,
  `invoice_number` varchar(64) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `username`, `amount`, `invoice_number`, `date`) VALUES
('pay_Btjaibbi6YPPJx', 'saahilchawande', '91500', '008/2018-19', '08/02/2019'),
('pay_Btk9EAbJ1ESTeq', 'saniya07', '41000', '008/2018-19', '08/02/2019'),
('pay_Btkjk8SCmQt1kB', 'saahilchawande', '1000', '008/2018-19', '08/02/2019'),
('pay_BtVikvz62z70PK', 'saahilchawande', '128850', '002/2018-19', '07/02/2019'),
('pay_BtVjRlrFGCMOsN', 'saahilchawande', '128850', '003/2018-19', '07/02/2019'),
('pay_BtVrxu1Vfzqoob', 'saahilchawande', '128850', '004/2018-19', '07/02/2019'),
('pay_BtW3inZUZuUKeo', 'saahilchawande', '155500', '005/2018-19', '07/02/2019'),
('pay_BtWHzmNdBpfxyL', 'saahilchawande', '117500', '006/2018-19', '07/02/2019'),
('pay_BtWLxmJaFBLSgy', 'saahilchawande', '143500', '007/2018-19', '08/02/2019');

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
-- Indexes for table `store_cart`
--
ALTER TABLE `store_cart`
  ADD PRIMARY KEY (`username`,`product_id`);

--
-- Indexes for table `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
