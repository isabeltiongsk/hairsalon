-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2018 at 12:22 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hairsalondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `timeslot_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `customer_name` int(255) NOT NULL,
  `customer_contact` int(255) NOT NULL,
  `description` int(255) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Payment'),
(2, 'Timetable'),
(3, 'Report'),
(4, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `type`) VALUES
(1, 'Tsubaki hair mask', '15.94', 'product'),
(2, 'Mise en scene hair oil', '10.90', 'product'),
(3, 'S2 energy shampoo -400ml', '15.70', 'product'),
(4, 'S2 energy shampoo -1000ml', '40', 'product'),
(5, 'hair cut -man', '35', 'service'),
(6, 'hair cut -woman short', '35', 'service'),
(7, 'hair coloring - short', '120', 'service'),
(8, 'hair coloring - long', '150', 'service'),
(9, 'Redken hair treatment - short', '123', 'service'),
(10, 'Redken hair treatment - long', '163', 'serivice'),
(11, 'Biotin & Collagen shampoo', '6.48', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(30) DEFAULT NULL,
  `quantity` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `date`, `name`, `price`, `quantity`) VALUES
(1, '2018-05-30 15:21:21', 'Tsubaki hair mask', '15.94', '1'),
(2, '2018-05-30 15:33:08', 'Mise en scene hair oil', '10.90', '2'),
(3, '2018-05-30 15:37:18', 'Tsubaki hair mask', '15.94', '2'),
(4, '2018-05-30 15:37:18', 'hair cut -woman short', '35', '1'),
(5, '2018-06-06 19:04:57', 'Tsubaki hair mask', '15.94', '1'),
(6, '2018-06-06 19:04:57', 'Mise en scene hair oil', '10.90', '2'),
(7, '2018-06-07 10:47:55', 'hair cut -man', '35', '1');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category_id` int(2) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `name`, `description`, `category_id`) VALUES
(1, 'Sales report', 'report for overall sales', 3),
(2, 'Purchase report', 'report for purchases', 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `contact`, `dob`) VALUES
(1, 'Jonathan Lim Xin Yun', 'saberrrr@outlook.com', '82281672', '1990-05-03'),
(2, 'Hikawa Sayo', 'hikawasayo0320@gmail.com', '81273445', '1999-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

DROP TABLE IF EXISTS `timeslot`;
CREATE TABLE IF NOT EXISTS `timeslot` (
  `timeslot_id` int(11) NOT NULL AUTO_INCREMENT,
  `duration` varchar(20) NOT NULL,
  PRIMARY KEY (`timeslot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`timeslot_id`, `duration`) VALUES
(1, '9am'),
(2, '10am'),
(3, '11am'),
(4, '1pm'),
(5, '2pm'),
(6, '3pm'),
(7, '4pm'),
(8, '5pm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
