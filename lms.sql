-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2016 at 03:35 PM
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

DROP TABLE IF EXISTS `lms_answer`;
CREATE TABLE IF NOT EXISTS `lms_answer` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `a_text` varchar(100) DEFAULT NULL,
  `correct` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`),
  KEY `q_id` (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `lms_answer`
--

INSERT INTO `lms_answer` (`a_id`, `q_id`, `a_text`, `correct`) VALUES
(1, 1, '1997', 0),
(2, 1, '2007', 1),
(3, 1, '1957', 0),
(4, 1, '1934', 0),
(28, 26, ' Office XP', 1),
(29, 26, 'Office Vista', 0),
(30, 26, 'Office 2007', 0),
(31, 26, 'None of above', 0),
(32, 27, 'Choosing File menu then Exit submenu', 0),
(33, 27, 'Press Alt+F4', 1),
(34, 27, 'Click X button on title bar', 0),
(35, 27, 'From File menu choose Close submenu', 0),
(36, 28, 'Save As dialog box', 1),
(37, 28, 'Open dialog box', 0),
(38, 28, 'Save dialog box', 0),
(39, 28, 'Close dialog box', 0),
(40, 30, 'F12', 0),
(41, 30, 'Shift F12', 0),
(42, 30, ' Alt + F12', 0),
(43, 30, 'Ctrl + F12', 1),
(44, 32, 'Winword.exe', 0),
(45, 32, 'Word.exe', 0),
(46, 32, 'Msword.exe', 0),
(47, 32, 'Word2003.exe', 1),
(48, 33, '3', 0),
(49, 33, '4', 1),
(50, 33, '5', 0),
(51, 33, '6', 0),
(59, 41, 'Go to Facebook.com insert email and password.', NULL),
(60, 41, 'Click Login Button', NULL),
(61, 41, 'Huawei', NULL),
(63, 42, 'cccccccccccccccccccccccccc', NULL),
(64, 34, 'ans1', NULL),
(65, 34, 'ans2', NULL),
(66, 34, 'ans3', NULL),
(67, 35, 'apa?', NULL),
(68, 36, 'For Writing Document', NULL),
(69, 36, 'Create Words', NULL),
(70, 36, 'Create Text', NULL),
(71, 37, 'ans a', NULL),
(72, 37, 'ans b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lms_module`
--

DROP TABLE IF EXISTS `lms_module`;
CREATE TABLE IF NOT EXISTS `lms_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `lms_module`
--

INSERT INTO `lms_module` (`id`, `code`, `name`, `description`, `typeid`, `createdate`, `createby`, `deletedate`, `deleteby`, `updatedate`, `updateby`, `status`) VALUES
(1, 'ILMW01', 'Microsoft Word-Basic', 'dsgsegsg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ILMW02', 'MS Word-Intermidiate', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'ILMW031', 'Microsoft Word-Advanced', 'hehehe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'IAIC01', 'Introduction To Computer', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'IAIC02', 'Introduction To Internet', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'IACT01', 'Basic Computer Technical', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'IABW01', 'Building Website', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'IATM01', 'PC Troubleshooting and Maintenance', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'IAGD01', 'Graphic Design- Basics', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'qqqq', 'ddd', 'hehehehehe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lms_module_type`
--

DROP TABLE IF EXISTS `lms_module_type`;
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

DROP TABLE IF EXISTS `lms_package`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `lms_package`
--

INSERT INTO `lms_package` (`packageid`, `name`, `code`, `createdate`, `createby`, `deletedate`, `deleteby`, `updatedate`, `updateby`, `status`) VALUES
(1, 'Microsoft Word', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Graphic Design', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Computer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Internet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Computer Network', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Computer Installation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Building Website', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Animation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Social Media', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Online Banking', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Smartphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Online Travel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Entrepreneur Tools', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Women Lifestyles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Facebook', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lms_package_module`
--

DROP TABLE IF EXISTS `lms_package_module`;
CREATE TABLE IF NOT EXISTS `lms_package_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `packageid` int(11) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `lms_package_module`
--

INSERT INTO `lms_package_module` (`id`, `packageid`, `moduleid`) VALUES
(95, 1, 1),
(96, 1, 2),
(97, 1, 3),
(98, 3, 6),
(99, 3, 11),
(100, 3, 5),
(101, 3, 8),
(102, 1, 11),
(103, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `lms_questions_bank`
--

DROP TABLE IF EXISTS `lms_questions_bank`;
CREATE TABLE IF NOT EXISTS `lms_questions_bank` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `q_text` varchar(200) DEFAULT NULL,
  `correct` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`q_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `lms_questions_bank`
--

INSERT INTO `lms_questions_bank` (`q_id`, `id`, `type`, `q_text`, `correct`) VALUES
(1, 1, 'Intermidiate', 'Choose version of MS Word?', '3'),
(26, 1, 'Intermidiate', 'Which of the following is not valid version of MS Office?', '31'),
(27, 1, 'Easy', 'You cannot close MS Word application by', '33'),
(28, 1, 'Easy', 'The key F12 opens a?', '37'),
(30, 1, 'Easy', 'What is the short cut key to open the Open dialog box?', ''),
(32, 1, 'Easy', 'Which file starts MS Word?', '46'),
(33, 1, 'Easy', 'How many ways you can save a document?', '49'),
(35, 6, 'Intermidiate', 'hahahaha', NULL),
(36, 1, 'Easy', 'What is MS Word for?', '68'),
(37, 1, 'Intermidiate', 'no1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lms_question_user`
--

DROP TABLE IF EXISTS `lms_question_user`;
CREATE TABLE IF NOT EXISTS `lms_question_user` (
  `qn_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `sessionid` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `q_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  PRIMARY KEY (`qn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Dumping data for table `lms_question_user`
--

INSERT INTO `lms_question_user` (`qn_id`, `userid`, `sessionid`, `id`, `q_id`, `a_id`, `marks`) VALUES
(98, 134, '160131100007', 1, 1, 2, 0),
(99, 134, '160131100007', 1, 26, 31, 1),
(100, 134, '160131100007', 1, 27, 34, 0),
(101, 134, '160131100007', 1, 28, 39, 0),
(102, 134, '160131100007', 1, 30, 42, 0),
(103, 134, '160131100007', 1, 32, 47, 0),
(104, 134, '160131100007', 1, 33, 49, 1),
(105, 134, '160131100007', 1, 32, 45, 0),
(107, 134, '160131103306', 1, 1, NULL, 0),
(108, 134, '160131103306', 1, 26, NULL, 0),
(109, 134, '160131103306', 1, 27, NULL, 0),
(110, 134, '160131103306', 1, 28, NULL, 0),
(111, 134, '160131103306', 1, 30, NULL, 1),
(112, 134, '160131103306', 1, 32, NULL, 0),
(113, 134, '160131103306', 1, 33, NULL, 0),
(114, 134, '160131103306', 1, 32, NULL, 0),
(115, 134, '160131103306', 1, 33, NULL, 0),
(116, 134, '160131110000', 1, 1, NULL, 0),
(117, 134, '160131110000', 1, 26, NULL, 0),
(118, 134, '160131110000', 1, 27, NULL, 0),
(119, 134, '160131110000', 1, 28, NULL, 0),
(120, 134, '160131110000', 1, 30, NULL, 1),
(121, 134, '160131110000', 1, 32, NULL, 0),
(122, 134, '160131110000', 1, 33, NULL, 0),
(123, 134, '160131113212', 1, 1, NULL, 0),
(124, 134, '160131113645', 1, 1, NULL, 0),
(125, 134, '160131113645', 1, 26, NULL, 0),
(126, 134, '160131113645', 1, 27, NULL, 0),
(127, 134, '160131113645', 1, 28, NULL, 0),
(128, 134, '160131113645', 1, 30, NULL, 1),
(129, 134, '160131113645', 1, 32, NULL, 0),
(130, 134, '160131113645', 1, 33, NULL, 0),
(131, 134, '160131114115', 1, 1, NULL, 0),
(132, 134, '160131114115', 1, 33, NULL, 0),
(133, 134, '160131114421', 1, 1, NULL, 0),
(134, 134, '160131011851', 1, 1, 2, 0),
(135, 134, '160131011851', 1, 26, 30, 0),
(136, 134, '160131011851', 1, 27, 34, 0),
(137, 134, '160131011851', 1, 28, 38, 0),
(138, 134, '160131011851', 1, 30, 40, 0),
(139, 134, '160131011851', 1, 32, 47, 0),
(140, 134, '160131011851', 1, 33, 50, 0),
(141, 134, '160131022305', 1, 1, 2, 0),
(142, 134, '160131022305', 1, 33, NULL, 0),
(143, 134, '160131105609', 1, 1, NULL, 0),
(144, 134, '160131105609', 1, 26, NULL, 0),
(145, 134, '160131105609', 1, 27, NULL, 0),
(146, 134, '160131105609', 1, 28, NULL, 0),
(147, 134, '160131105609', 1, 30, NULL, 1),
(148, 134, '160131105609', 1, 32, NULL, 0),
(149, 134, '160131105609', 1, 33, NULL, 0),
(150, 134, '160131110056', 1, 1, NULL, 0),
(151, 134, '160131110056', 1, 33, NULL, 0),
(152, 134, '160201023638', 1, 1, NULL, 0),
(153, 134, '160201023638', 1, 26, NULL, 0),
(154, 134, '160201042545', 1, 1, 69, 0),
(158, 134, '160201043926', 1, 1, 69, 0),
(159, 134, '160201043926', 1, 36, 69, 0),
(160, 134, '160201043926', 1, 36, 72, 0),
(161, 134, '160201043926', 1, 37, 72, 0),
(162, 122, '160201045445', 1, 1, NULL, 0),
(163, 122, '160201045445', 1, 1, NULL, 0),
(164, 122, '160201045445', 1, 26, NULL, 0),
(165, 122, '160201045445', 1, 26, NULL, 0),
(166, 122, '160201045445', 1, 27, NULL, 0),
(167, 122, '160201045445', 1, 28, NULL, 0),
(168, 122, '160201045445', 1, 30, NULL, 1),
(169, 122, '160201045445', 1, 32, NULL, 0),
(170, 122, '160201045445', 1, 33, NULL, 0),
(171, 122, '160201045445', 1, 36, NULL, 0),
(172, 134, '160201022548', 1, 1, 2, 0),
(173, 134, '160201022548', 1, 26, NULL, 0),
(174, 134, '160201022548', 1, 27, 33, 1),
(175, 134, '160201022548', 1, 28, 37, 1),
(176, 134, '160201022548', 1, 30, 43, 0),
(177, 134, '160201022548', 1, 32, NULL, 0),
(178, 134, '160201022548', 1, 33, 49, 1),
(179, 134, '160201022548', 1, 36, 68, 1),
(180, 134, '160201024401', 1, 1, 3, 1),
(181, 134, '160201024401', 1, 26, 31, 1),
(182, 134, '160201024401', 1, 27, 34, 0),
(183, 134, '160201024401', 1, 28, 39, 0),
(184, 134, '160201024401', 1, 30, 43, 0),
(185, 134, '160201024401', 1, 32, 44, 0),
(186, 134, '160201024401', 1, 33, 51, 0),
(187, 134, '160201024401', 1, 36, 68, 1),
(188, 134, '160201024649', 1, 1, 2, 0),
(189, 134, '160201024649', 1, 33, 48, 0),
(190, 134, '160201024649', 1, 36, 68, 1),
(191, 134, '160201030058', 1, 1, 1, 0),
(192, 134, '160201030058', 1, 33, 49, 1),
(193, 134, '160201030058', 1, 36, 68, 1),
(194, 134, '160201030852', 1, 1, 4, 0),
(195, 134, '160201030852', 1, 33, 50, 0),
(196, 134, '160201030852', 1, 36, 68, 1),
(197, 134, '160201031421', 1, 1, 2, 0),
(198, 134, '160201031421', 1, 33, 51, 0),
(199, 134, '160201031421', 1, 36, 68, 1),
(200, 134, '160201031616', 1, 1, 2, 0),
(201, 134, '160201031616', 1, 33, 51, 0),
(202, 134, '160201031616', 1, 36, 68, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lms_result`
--

DROP TABLE IF EXISTS `lms_result`;
CREATE TABLE IF NOT EXISTS `lms_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `result` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `packageid` int(11) DEFAULT NULL,
  `sessionid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=300 ;

--
-- Dumping data for table `lms_result`
--

INSERT INTO `lms_result` (`id`, `userid`, `result`, `datecreated`, `status`, `packageid`, `sessionid`) VALUES
(291, 134, 15, NULL, 'Fail', 1, '2147483647'),
(292, 134, 5, NULL, 'Fail', 1, '2147483647'),
(293, 134, 10, NULL, 'Fail', 1, '2147483647'),
(294, 134, 10, NULL, 'Fail', 1, '2147483647'),
(295, 134, 5, NULL, 'Fail', 1, '2147483647'),
(296, 134, 5, NULL, 'Fail', 1, '2147483647'),
(297, 134, 5, NULL, 'Fail', 1, '160201031616'),
(298, 134, 5, NULL, 'Fail', 1, '160201031616'),
(299, 134, 5, NULL, 'Fail', 1, '160201031616');

-- --------------------------------------------------------

--
-- Table structure for table `lms_user_answer`
--

DROP TABLE IF EXISTS `lms_user_answer`;
CREATE TABLE IF NOT EXISTS `lms_user_answer` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  KEY `q_id` (`q_id`),
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=445 ;

--
-- Dumping data for table `lms_user_answer`
--

INSERT INTO `lms_user_answer` (`u_id`, `q_id`, `a_id`) VALUES
(1, 1, 1),
(2, 26, 28),
(3, 27, 35),
(4, 28, 37),
(5, 30, 41),
(6, 32, 44),
(7, 1, 1),
(8, 26, 29),
(9, 27, 33),
(10, 28, 37),
(11, 30, 40),
(12, 1, 1),
(13, 26, 29),
(14, 27, 35),
(15, 28, 37),
(16, 30, 40),
(17, 32, 46),
(18, 33, 49),
(19, 41, NULL),
(20, 42, NULL),
(21, 42, NULL),
(22, 1, 2),
(23, 26, 30),
(24, 1, 2),
(25, 26, 28),
(26, 27, 34),
(27, 28, 36),
(28, 30, 43),
(29, 32, 45),
(30, 1, NULL),
(31, 26, NULL),
(32, 27, NULL),
(33, 28, NULL),
(34, 30, NULL),
(35, 32, NULL),
(36, 33, NULL),
(37, 41, NULL),
(38, 42, NULL),
(39, 42, 63),
(40, 42, 63),
(41, 42, 63),
(42, 42, 63),
(43, 42, 63),
(44, 42, 63),
(45, 42, 63),
(46, 1, 2),
(47, 1, 2),
(48, 26, 31),
(49, 27, 33),
(50, 28, 36),
(51, 30, 42),
(52, 32, 45),
(53, 33, 49),
(54, 41, 60),
(55, 42, 63),
(56, 1, 4),
(57, 26, 29),
(58, 27, 33),
(59, 28, 37),
(60, 1, NULL),
(61, 26, NULL),
(62, 33, NULL),
(63, 41, NULL),
(64, 42, NULL),
(65, 42, NULL),
(66, 42, NULL),
(67, 1, 4),
(68, 26, 31),
(69, 27, 35),
(70, 1, 3),
(71, 26, 31),
(72, 27, 33),
(73, 28, 38),
(74, 1, 2),
(75, 26, NULL),
(76, 27, NULL),
(77, 1, 2),
(78, 26, 30),
(79, 26, NULL),
(80, 27, NULL),
(81, 28, NULL),
(82, 30, NULL),
(83, 32, NULL),
(84, 33, 50),
(85, 41, NULL),
(86, 41, NULL),
(87, 41, NULL),
(88, 41, NULL),
(89, 41, NULL),
(90, 1, NULL),
(91, 26, NULL),
(92, 1, 2),
(93, 26, 30),
(94, 27, 32),
(95, 28, 37),
(96, 30, 40),
(97, 32, 45),
(98, 33, 49),
(99, 41, 60),
(100, 41, 61),
(101, 41, 60),
(102, 41, 59),
(103, 1, 2),
(104, 26, 29),
(105, 27, NULL),
(106, 28, NULL),
(107, 30, NULL),
(108, 32, NULL),
(109, 33, NULL),
(110, 41, NULL),
(111, 1, 3),
(112, 26, 30),
(113, 27, 33),
(114, 28, 38),
(115, 30, 40),
(116, 32, 46),
(117, 33, 50),
(118, 41, 59),
(119, 41, 59),
(120, 1, 2),
(121, 26, 29),
(122, 27, 33),
(123, 1, NULL),
(124, 33, 49),
(125, 41, 60),
(126, 41, NULL),
(127, 41, NULL),
(128, 41, NULL),
(129, 1, 2),
(130, 26, 29),
(131, 27, 32),
(132, 28, 39),
(133, 30, 41),
(134, 32, 45),
(135, 33, 48),
(136, 41, 60),
(137, 1, 2),
(138, 26, 31),
(139, 1, 1),
(140, 26, 31),
(141, 27, 35),
(142, 28, 38),
(143, 30, 41),
(144, 32, 45),
(145, 33, 48),
(146, 1, 2),
(147, 26, NULL),
(148, 27, NULL),
(149, 1, 2),
(150, 1, 2),
(151, 26, 30),
(152, 27, 35),
(153, 27, 35),
(154, 27, 35),
(155, 1, 2),
(156, 1, 2),
(157, 1, 2),
(158, 1, NULL),
(159, 26, 30),
(160, 27, 35),
(161, 27, 35),
(162, 1, NULL),
(163, 1, NULL),
(164, 1, NULL),
(165, 1, NULL),
(166, 26, NULL),
(167, 1, NULL),
(168, 26, NULL),
(169, 1, 2),
(170, 1, 2),
(171, 26, 31),
(172, 27, 33),
(173, 28, 37),
(174, 30, 40),
(175, 32, 45),
(176, 33, 49),
(177, 1, 2),
(178, 26, 31),
(179, 27, 33),
(180, 1, 2),
(181, 26, 31),
(182, 27, 33),
(183, 28, 36),
(184, 30, 41),
(185, 32, 46),
(186, 33, 50),
(187, 1, 2),
(188, 26, 31),
(189, 1, 2),
(190, 26, 29),
(191, 27, 34),
(192, 1, 2),
(193, 26, 30),
(194, 27, 33),
(195, 28, 36),
(196, 30, NULL),
(197, 32, 45),
(198, 1, 2),
(199, 26, 31),
(200, 27, 33),
(201, 28, 36),
(202, 30, 43),
(203, 32, 45),
(204, 33, 51),
(205, 1, 2),
(206, 26, 28),
(207, 27, 34),
(208, 28, NULL),
(209, 30, 40),
(210, 32, 44),
(211, 33, 50),
(212, 33, 50),
(213, 33, 50),
(214, 1, 2),
(215, 26, 31),
(216, 27, 32),
(217, 28, 39),
(218, 30, 40),
(219, 32, 46),
(220, 1, 2),
(221, 26, 31),
(222, 27, 32),
(223, 1, NULL),
(224, 26, NULL),
(225, 27, NULL),
(226, 28, NULL),
(227, 30, NULL),
(228, 32, NULL),
(229, 33, NULL),
(230, 1, NULL),
(231, 1, NULL),
(232, 1, 2),
(233, 1, NULL),
(234, 1, 2),
(235, 1, NULL),
(236, 26, NULL),
(237, 27, NULL),
(238, 28, NULL),
(239, 30, NULL),
(240, 32, NULL),
(241, 33, NULL),
(242, 35, NULL),
(243, 1, 2),
(244, 1, NULL),
(245, 1, 2),
(246, 26, 31),
(247, 27, 33),
(248, 28, 37),
(249, 1, NULL),
(250, 33, NULL),
(251, 35, NULL),
(252, 1, NULL),
(253, 33, NULL),
(254, 35, NULL),
(255, 35, NULL),
(256, 1, NULL),
(257, 26, NULL),
(258, 26, NULL),
(259, 1, NULL),
(260, 26, NULL),
(261, 1, NULL),
(262, 26, NULL),
(263, 1, NULL),
(264, 26, NULL),
(265, 1, NULL),
(266, 26, NULL),
(267, 1, NULL),
(268, 26, NULL),
(269, 1, NULL),
(270, 1, 3),
(271, 26, 31),
(272, 1, NULL),
(273, 1, 3),
(274, 1, NULL),
(275, 26, NULL),
(276, 27, NULL),
(277, 28, NULL),
(278, 30, NULL),
(279, 32, 46),
(280, 33, 50),
(281, 33, 50),
(282, 1, NULL),
(283, 26, NULL),
(284, 1, 3),
(285, 26, NULL),
(286, 1, NULL),
(287, 1, NULL),
(288, 1, NULL),
(289, 1, 2),
(290, 1, 1),
(291, 1, 2),
(292, 1, NULL),
(293, 1, NULL),
(294, 1, NULL),
(295, 1, NULL),
(296, 1, NULL),
(297, 1, NULL),
(298, 1, NULL),
(299, 1, NULL),
(300, 1, NULL),
(301, 1, NULL),
(302, 1, NULL),
(303, 1, NULL),
(304, 1, NULL),
(305, 1, NULL),
(306, 1, NULL),
(307, 1, NULL),
(308, 1, NULL),
(309, 1, NULL),
(310, 1, NULL),
(311, 1, NULL),
(312, 1, NULL),
(313, 1, NULL),
(314, 1, NULL),
(315, 1, NULL),
(316, 1, NULL),
(317, 26, NULL),
(318, 27, NULL),
(319, 28, NULL),
(320, 30, NULL),
(321, 32, NULL),
(322, 33, NULL),
(323, 1, NULL),
(324, 26, NULL),
(325, 27, NULL),
(326, 28, NULL),
(327, 30, NULL),
(328, 32, NULL),
(329, 33, NULL),
(330, 1, NULL),
(331, 26, NULL),
(332, 1, NULL),
(333, 26, NULL),
(334, 27, 33),
(335, 35, NULL),
(336, 35, NULL),
(337, 35, NULL),
(338, 35, NULL),
(339, 35, NULL),
(340, 1, 2),
(341, 26, 31),
(342, 27, 34),
(343, 28, 39),
(344, 30, 42),
(345, 32, 47),
(346, 33, 49),
(347, 32, 45),
(348, 32, 46),
(349, 1, NULL),
(350, 26, NULL),
(351, 27, NULL),
(352, 28, NULL),
(353, 30, NULL),
(354, 32, NULL),
(355, 33, NULL),
(356, 32, NULL),
(357, 33, NULL),
(358, 1, NULL),
(359, 26, NULL),
(360, 27, NULL),
(361, 28, NULL),
(362, 30, NULL),
(363, 32, NULL),
(364, 33, NULL),
(365, 1, NULL),
(366, 1, NULL),
(367, 26, NULL),
(368, 27, NULL),
(369, 28, NULL),
(370, 30, NULL),
(371, 32, NULL),
(372, 33, NULL),
(373, 1, NULL),
(374, 33, NULL),
(375, 1, NULL),
(376, 1, 2),
(377, 26, 30),
(378, 27, 34),
(379, 28, 38),
(380, 30, 40),
(381, 32, 47),
(382, 33, 50),
(383, 1, 2),
(384, 33, NULL),
(385, 1, NULL),
(386, 26, NULL),
(387, 27, NULL),
(388, 28, NULL),
(389, 30, NULL),
(390, 32, NULL),
(391, 33, NULL),
(392, 1, NULL),
(393, 33, NULL),
(394, 1, NULL),
(395, 26, NULL),
(396, 1, 69),
(400, 1, 69),
(401, 36, 69),
(402, 36, 72),
(403, 37, 72),
(404, 1, NULL),
(405, 1, NULL),
(406, 26, NULL),
(407, 26, NULL),
(408, 27, NULL),
(409, 28, NULL),
(410, 30, NULL),
(411, 32, NULL),
(412, 33, NULL),
(413, 36, NULL),
(414, 1, 2),
(415, 26, NULL),
(416, 27, 33),
(417, 28, 37),
(418, 30, 43),
(419, 32, NULL),
(420, 33, 49),
(421, 36, 68),
(422, 1, 3),
(423, 26, 31),
(424, 27, 34),
(425, 28, 39),
(426, 30, 43),
(427, 32, 44),
(428, 33, 51),
(429, 36, 68),
(430, 1, 2),
(431, 33, 48),
(432, 36, 68),
(433, 1, 1),
(434, 33, 49),
(435, 36, 68),
(436, 1, 4),
(437, 33, 50),
(438, 36, 68),
(439, 1, 2),
(440, 33, 51),
(441, 36, 68),
(442, 1, 2),
(443, 33, 51),
(444, 36, 68);

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
