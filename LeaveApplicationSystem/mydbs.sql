-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2014 at 06:55 PM
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
-- Table structure for table `mydbs`
--

CREATE TABLE IF NOT EXISTS `mydbs` (
  `EmpID` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(256) NOT NULL,
  `Start_Date` bigint(20) NOT NULL DEFAULT '0',
  `End_Date` bigint(20) NOT NULL DEFAULT '0',
  `Granted` tinyint(1) NOT NULL DEFAULT '0',
  `Email_ID` varchar(255) NOT NULL,
  KEY `EmpID` (`EmpID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydbs`
--

INSERT INTO `mydbs` (`EmpID`, `Name`, `Start_Date`, `End_Date`, `Granted`, `Email_ID`) VALUES
(2013107, 'srijan', 1399314600, 1399660200, 0, 'srijan.94@gmail.com'),
(23423, 'popo', 1399314600, 1399660200, 0, 'hello@heell');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
