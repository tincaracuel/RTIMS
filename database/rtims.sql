-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2013 at 08:22 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rtims`
--
CREATE DATABASE IF NOT EXISTS `rtims` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rtims`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_username` varchar(15) NOT NULL,
  `admin_password` varchar(15) NOT NULL,
  PRIMARY KEY (`admin_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('admin', 'admin'),
('tin', 'tin');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE IF NOT EXISTS `incident` (
  `inc_id` varchar(20) NOT NULL,
  `classification` varchar(20) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`inc_id`),
  UNIQUE KEY `inc_id` (`inc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `map_coordinates`
--

CREATE TABLE IF NOT EXISTS `map_coordinates` (
  `map_id` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `street` varchar(20) NOT NULL,
  `barangay` varchar(20) NOT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(5) NOT NULL AUTO_INCREMENT,
  `location` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `sender_name` varchar(20) NOT NULL,
  `sender_email` varchar(20) NOT NULL,
  `date_received` date NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roadwork`
--

CREATE TABLE IF NOT EXISTS `roadwork` (
  `contract_no` varchar(20) NOT NULL,
  `rwork_name` varchar(20) NOT NULL,
  `rwork_type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`contract_no`),
  UNIQUE KEY `contract_number` (`contract_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
