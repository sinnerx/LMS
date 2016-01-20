-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 10:08 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `digitalgaia_iris`
--
CREATE DATABASE IF NOT EXISTS `digitalgaia_iris` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `digitalgaia_iris`;

-- --------------------------------------------------------

--
-- Table structure for table `lms_answer`
--

CREATE TABLE IF NOT EXISTS `lms_answer` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `a_text` varchar(100) DEFAULT NULL,
  `correct` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`),
  KEY `q_id` (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Table structure for table `lms_module`
--

CREATE TABLE IF NOT EXISTS `lms_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `packageid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(100) DEFAULT NULL,
  `deletedate` datetime DEFAULT NULL,
  `deleteby` varchar(100) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `updateby` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_id` (`packageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `lms_module_type`
--

CREATE TABLE IF NOT EXISTS `lms_module_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(100) DEFAULT NULL,
  `deletedate` datetime DEFAULT NULL,
  `deleteby` varchar(100) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `updateby` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lms_package`
--

CREATE TABLE IF NOT EXISTS `lms_package` (
  `packageid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(100) DEFAULT NULL,
  `deletedate` datetime DEFAULT NULL,
  `deleteby` varchar(100) DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `updateby` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`packageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `lms_questions_bank`
--

CREATE TABLE IF NOT EXISTS `lms_questions_bank` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `q_text` varchar(200) DEFAULT NULL,
  `correct` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`q_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Table structure for table `lms_question_user`
--

CREATE TABLE IF NOT EXISTS `lms_question_user` (
  `qn_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `q_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  PRIMARY KEY (`qn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `lms_user_answer`
--

CREATE TABLE IF NOT EXISTS `lms_user_answer` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  KEY `q_id` (`q_id`),
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lms_user_answer`
--
ALTER TABLE `lms_user_answer`
  ADD CONSTRAINT `lms_user_answer_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `lms_answer` (`a_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
