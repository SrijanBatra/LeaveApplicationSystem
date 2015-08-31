-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2014 at 06:54 PM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `Name` varchar(256) NOT NULL,
  `Login_ID` varchar(256) NOT NULL,
  `EmpID` int(11) NOT NULL DEFAULT '0',
  `Email_ID` varchar(256) NOT NULL,
  `Department` char(1) NOT NULL DEFAULT 'E',
  `Password` varchar(256) NOT NULL,
  `Gender` char(1) NOT NULL DEFAULT 'M',
  KEY `EmpID` (`EmpID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Name`, `Login_ID`, `EmpID`, `Email_ID`, `Department`, `Password`, `Gender`) VALUES
('Srijan', 'srij94', 2013107, 'srijan.94@gmail.com', 'H', 'hello', 'm'),
('saumya', 'saumya', 2013035, 'saumya@gmail.com', 'E', 'hello', 'f'),
('testuser', 'test', 213214, 'test@testmail.com', 'E', 'hellotesting', 'm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
