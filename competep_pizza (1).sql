-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2015 at 01:32 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `competep_pizza`
--
CREATE DATABASE IF NOT EXISTS `competep_pizza` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `competep_pizza`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `c_password`, `email`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE IF NOT EXISTS `delivery_address` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `house` varchar(50) NOT NULL,
  `floor` varchar(20) NOT NULL,
  `street` varchar(100) NOT NULL,
  `building` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `state`, `city`, `area`, `house`, `floor`, `street`, `building`, `company`, `landmark`, `remarks`) VALUES
(1, 'UTTAR PRADESH', 'NOIDA', 'sec 65', 'c-104', '1', 'sec 65', '', 'Internet Bees', 'sopra', 'Drop off at the receipt'),
(2, 'UTTAR PRADESH', 'NOIDA', 'Sec65', '12', '12', 'sec 65', 'c 104', 'ibees', '', ''),
(3, 'UTTAR PRADESH', 'GHAZIABAD', 'abc', 'dkfjasldkf', 'gdsfkglfdsg', 'lfdskg;fdkg', 'qfdlskg;lfdk', 'lfdksg;lfdk', 'fdlskg;fdlsg', 'qfdlskg;lkfdsl;gkdl');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ph` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `verified` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `dob`, `ph`, `email`, `password`, `verified`) VALUES
(6, 'dskajflkdsjaflkd', '4-6-1955', '9711791955', 'creativegaurav13@gmail.com', '9711791955', '1'),
(4, 'Ashish', '30-11-1989', '9897136830', 'ashish6830@gmail.com', '123456789', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE IF NOT EXISTS `tbl_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `isdisplay` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `name`, `isdisplay`) VALUES
(1, 'Coventry City Centre', 1),
(2, 'Gosford Green', 1),
(3, 'Hillfields', 1),
(4, 'Spon End', 1),
(5, 'Coventry University Coventry', 1),
(6, 'Walsgrave', 1),
(7, 'Wyken', 1),
(8, 'Stoke', 1),
(9, 'Bell Green', 1),
(10, 'Wood End', 1),
(11, 'Potters Green', 1),
(12, 'Aldermans Green', 1),
(13, 'Clifford Park', 1),
(14, 'Woodway Park', 1),
(15, 'Binley', 1),
(16, 'Whitley', 1),
(17, 'Willenhall', 1),
(18, 'Cheylesmore', 1),
(19, 'Styvechale', 1),
(20, 'Finham', 1),
(21, 'Fenside', 1),
(22, 'Stoke Aldermoor', 1),
(23, 'Green Lane', 1),
(24, 'Ernesford Grange', 1),
(25, 'Allesley', 1),
(26, 'Allesley Park', 1),
(27, 'Allesley Green', 1),
(28, 'Earlsdon', 1),
(29, 'Eastern Green', 1),
(30, 'Whoberley', 1),
(31, 'Chapelfields', 1),
(32, 'Mount Nod', 1),
(33, 'Brownshill Green', 1),
(34, 'Holbrooks', 1),
(35, 'Coundon', 1),
(36, 'Radford', 1),
(37, 'Longford', 1),
(38, 'Rowley''s Green', 1),
(39, 'Courthouse Green', 1),
(40, 'Whitmore Park', 1),
(41, 'Exhall', 1),
(42, 'Ash Green', 1),
(43, 'Keresley', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `isdisplay` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `menu_name`, `isdisplay`) VALUES
(1, 'What''s New', 1),
(2, 'Drinks', 1),
(3, 'Special Offers', 1),
(4, 'Pizzas', 1),
(5, 'Garlic Bread', 0),
(6, 'Kebabs', 1),
(9, 'Continental', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_postcode`
--

CREATE TABLE IF NOT EXISTS `tbl_postcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` varchar(255) NOT NULL,
  `delivery_charge` varchar(20) NOT NULL,
  `coventry` varchar(255) NOT NULL,
  `locations` varchar(255) NOT NULL,
  `isdisplay` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_postcode`
--

INSERT INTO `tbl_postcode` (`id`, `postcode`, `delivery_charge`, `coventry`, `locations`, `isdisplay`) VALUES
(1, 'CV1', 'Free Delivery', 'C', '1,5,2,3,4', 1),
(2, 'CV2', '1', 'NE', '12,9,13,11,8,6,10,14,7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `extra_cost` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `isdisplay` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `menu_id`, `prod_name`, `food_category`, `price`, `extra_cost`, `img`, `isdisplay`) VALUES
(1, 9, 'Muffins', 'veg', '20', '2', '74381026.jpg', 1),
(2, 1, 'Chiken BBQ Bread', 'nonveg', '2.00', '.6', '31074668Chicken Tikka Kebab on Naan.jpg', 1),
(3, 2, '7 up', 'veg', '2.00', '', '874859697-up.png', 0),
(4, 4, 'BBQ Chicken Pizza', 'nonveg', '22.00', '2.50', '78646576BBQ Chicken.gif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signup`
--

CREATE TABLE IF NOT EXISTS `tbl_signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `isdisplay` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_signup`
--

INSERT INTO `tbl_signup` (`id`, `cust_name`, `email`, `password`, `c_password`, `mobile`, `house_no`, `location`, `postcode`, `isdisplay`) VALUES
(1, 'Love Chaudhary', 'lovechaudhary17@gmail.com', '9f2feb0f1ef425b292f2f94bc8482494df430413', 'love', '9465273424', '121', 'Bell Green', '1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
