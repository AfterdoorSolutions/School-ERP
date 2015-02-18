-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2015 at 10:35 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads_assigned_subject`
--

CREATE TABLE IF NOT EXISTS `ads_assigned_subject` (
  `assigned_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`assigned_subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ads_batch`
--

CREATE TABLE IF NOT EXISTS `ads_batch` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ads_batch`
--

INSERT INTO `ads_batch` (`batch_id`, `section_id`, `name`, `author`, `date`, `start_date`, `end_date`, `code`, `status`) VALUES
(1, 4, '2015', '1', '2015-02-12 06:41:54', '02/01/2015', '02/17/2015', 'LKG', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `ads_course`
--

CREATE TABLE IF NOT EXISTS `ads_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ads_course`
--

INSERT INTO `ads_course` (`course_id`, `author`, `date`, `name`, `code`, `status`) VALUES
(1, '', '2015-02-12 05:36:48', 'LKG', 'LKG', 'Enabled'),
(2, '', '2015-02-12 05:37:51', 'LKG', 'LKG', 'Enabled'),
(3, '', '2015-02-12 05:39:41', 'LKG', 'LKG', 'Enabled'),
(4, '1', '2015-02-12 05:43:12', 'The Hindus', 'LKG', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `ads_person`
--

CREATE TABLE IF NOT EXISTS `ads_person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ads_person`
--

INSERT INTO `ads_person` (`person_id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'info@test.com', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `ads_section`
--

CREATE TABLE IF NOT EXISTS `ads_section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ads_section`
--

INSERT INTO `ads_section` (`section_id`, `course_id`, `author`, `date`, `name`, `code`, `status`) VALUES
(1, 0, '1', '2015-02-12 06:02:01', 'The Hindus', 'LKG', 'Enabled'),
(2, 0, '1', '2015-02-12 06:02:17', 'The Hindus', 'LKG', 'Enabled'),
(3, 0, '1', '2015-02-12 06:02:22', 'The Hindus', 'LKG', 'Enabled'),
(4, 1, '1', '2015-02-12 06:02:55', 'The Hindus', 'LKG', 'Enabled'),
(5, 4, '1', '2015-02-12 06:29:50', 'B', 'asd', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `ads_subject`
--

CREATE TABLE IF NOT EXISTS `ads_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ads_subject`
--

INSERT INTO `ads_subject` (`subject_id`, `author`, `date`, `name`, `code`, `status`) VALUES
(1, '1', '2015-02-12 07:05:28', 'Hindi', '123', 'Enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
