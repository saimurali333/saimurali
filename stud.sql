-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2017 at 06:38 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

--
-- riktam
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `riktam`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE IF NOT EXISTS `stud` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `sname` varchar(11) NOT NULL,
  `s1` varchar(20) NOT NULL,
  `s2` int(11) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`sno`, `sid`, `sname`, `s1`, `s2`) VALUES
(1, 1, 'Abc', 'Abc', 99),
(2, 21, 'murali', 'kanuru', 94),
(5, 9, 'akhil', 'south', 95),
(7, 9, 'akhil', 'south', 95),
(8, 29, 'sanath', 'vizag', 50),
(9, 15, 'teja', 'vizag', 95),
(10, 22, 'sai', 'kanuru', 99),
(11, 28, 'prasad', 'tpg', 50),
(12, 34, 'lalith', 'vizag', 20),
(13, 55, 'kumar', 'west', 34),
(15, 444, 'abc', '0', 11);
