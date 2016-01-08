-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2016 at 04:53 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monte`
--



--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `lms_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` varchar(100) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  `Topics` varchar(100) DEFAULT NULL,
  `Descr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `m_id` (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `course`
--

INSERT INTO `lms_course` (`id`, `courseID`, `m_id`, `Topics`, `Descr`) VALUES
(1, 'ILMW01', 1, 'Microsoft Word-Basic', ''),
(2, 'ILMW02', 1, 'MS Word-Intermidiate', ''),
(3, 'ILMW03', 1, 'Microsoft Word-Advanced', ''),
(4, 'IAIC01', 4, 'Introduction To Computer', ''),
(5, 'IAIC02', 5, 'Introduction To Internet', ''),
(6, 'IACT01', 7, 'Basic Computer Technical', ''),
(7, 'IABW01', 8, 'Building Website', ''),
(8, 'IATM01', 7, 'PC Troubleshooting and Maintenance', ''),
(9, 'IAOT01', 13, 'Online Travel', ''),
(10, 'IAOB01', 11, 'Introduction to Online Banking', ''),
(11, 'IAGD01', 3, 'Graphic Design- Basics', '');

-- --------------------------------------------------------

--



--
-- Table structure for table `package_module`
--

CREATE TABLE IF NOT EXISTS `lms_package_module` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `package_module`
--

INSERT INTO `lms_package_module` (`m_id`, `Name`) VALUES
(1, 'Microsoft Word'),
(3, 'Graphic Design'),
(4, 'Computer'),
(5, 'Internet'),
(6, 'Computer Network'),
(7, 'Computer Installation'),
(8, 'Building Website'),
(9, 'Animation'),
(10, 'Social Media'),
(11, 'Online Banking'),
(12, 'Smartphone'),
(13, 'Online Travel'),
(14, 'Entrepreneur Tools'),
(15, 'Women Lifestyles');

-- --------------------------------------------------------

--
-- Table structure for table `questions_bank`
--

CREATE TABLE IF NOT EXISTS `lms_questions_bank` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `q_text` varchar(200) DEFAULT NULL,
  `correct` varchar(11) NOT NULL,
  PRIMARY KEY (`q_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `questions_bank`
--

INSERT INTO `lms_questions_bank` (`q_id`, `id`, `type`, `q_text`, `correct`) VALUES
(1, 1, 'Intermidiate', 'Choose version of MS Word?', '2'),
(26, 1, 'Intermidiate', 'Which of the following is not valid version of MS Office?', '28'),
(27, 1, 'Easy', 'You cannot close MS Word application by', '33'),
(28, 1, 'Easy', 'The key F12 opens a', ''),
(30, 1, 'Easy', 'What is the short cut key to open the Open dialog box?', ''),
(32, 1, 'Easy', 'Which file starts MS Word?', ''),
(33, 1, 'Easy', 'How many ways you can save a document?', '');

-- --------------------------------------------------------

--
-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `lms_answer` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `a_text` varchar(100) DEFAULT NULL,
  `correct` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`),
  KEY `q_id` (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `answer`
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
(33, 27, 'Press Alt+F4bbb', 1),
(34, 27, 'Click X button on title bar', 0),
(35, 27, 'From File menu choose Close submenu', 0),
(36, 28, 'Save As dialog box', 1),
(37, 28, 'Open dialog boxss', 0),
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
(51, 33, '6', 0);

-- --------------------------------------------------------
-- Table structure for table `user_answer`
--

CREATE TABLE IF NOT EXISTS `lms_user_answer` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  KEY `q_id` (`q_id`),
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `lms_user_answer` (`u_id`, `q_id`, `a_id`) VALUES
(1, 33, 49),
(2, 1, 4),
(3, 1, NULL),
(4, 1, NULL),
(5, 1, NULL),
(6, 26, NULL),
(7, 1, NULL),
(8, 26, NULL),
(9, 27, 34),
(10, 28, NULL),
(11, 1, NULL),
(12, 26, 30),
(13, 27, 33),
(14, 28, 39),
(15, 30, 41),
(16, 32, 44),
(17, 1, 3),
(18, 26, 28),
(19, 26, 28),
(20, 26, 28),
(21, 26, 28),
(22, 26, 28),
(23, 26, 28),
(24, 26, 28),
(25, 26, 28),
(26, 26, 28),
(27, 26, 28),
(28, 26, 28),
(29, 26, 28),
(30, 26, 28),
(31, 26, 28),
(32, 26, 28),
(33, 26, 28),
(34, 26, 28),
(35, 26, 28),
(36, 26, 28),
(37, 26, 28),
(38, 26, 30),
(39, 26, 28),
(40, 26, 29),
(41, 26, 31),
(42, 26, 31),
(43, 26, 31),
(44, 26, 31),
(45, 26, 31),
(46, 26, 30),
(47, 26, 28),
(48, 26, 29),
(49, 26, 30),
(50, 26, 31),
(51, 26, 28),
(52, 26, 29),
(53, 26, 30),
(54, 26, 31),
(55, 26, 28),
(56, 26, 28),
(57, 26, 28),
(58, 26, 29),
(59, 26, 30),
(60, 26, 31),
(61, 26, 28),
(62, 26, 29),
(63, 26, 29),
(64, 26, 28),
(65, 26, 30),
(66, 26, 31),
(67, 26, 31),
(68, 26, 31),
(69, 26, 28),
(70, 26, 28),
(71, 26, 29),
(72, 26, 30),
(73, 26, 31),
(74, 26, 28),
(75, 26, 31),
(76, 26, 28),
(77, 26, 29),
(78, 26, 30),
(79, 26, 28),
(80, 26, 28),
(81, 26, 29),
(82, 26, 29),
(83, 26, 29),
(84, 26, 28),
(85, 26, 28),
(86, 26, 28),
(87, 26, 30),
(88, 26, 28),
(89, 26, 28),
(90, 32, 47),
(91, 32, 45),
(92, 32, 45),
(93, 32, 45),
(94, 32, 45),
(95, 32, 47),
(96, 1, 3),
(97, 1, 2),
(98, 1, 1),
(99, 1, NULL),
(100, 1, 1),
(101, 1, 2),
(102, 1, 2),
(103, 1, 1),
(104, 1, 4),
(105, 1, 2),
(106, 1, 4),
(107, 1, 4),
(108, 1, 4),
(109, 26, 31),
(110, 1, 2),
(111, 1, 2),
(112, 1, 2),
(113, 1, 2),
(114, 1, 2),
(115, 1, 1),
(116, 1, 3),
(117, 1, 4),
(118, 1, 2),
(119, 1, 2),
(120, 1, 2),
(121, 1, 2),
(122, 1, 3),
(123, 1, 2),
(124, 1, 4),
(125, 1, 1),
(126, 1, 1),
(127, 1, 1),
(128, 1, 4),
(129, 1, 4),
(130, 1, 2),
(131, 1, 2),
(132, 1, 2),
(133, 1, 2),
(134, 1, 2),
(135, 1, 1),
(136, 1, 2),
(137, 1, 2),
(138, 1, 3),
(139, 1, 3),
(140, 1, 2),
(141, 1, 1),
(142, 1, 4),
(143, 1, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lms_answer`
--
ALTER TABLE `lms_answer`
  ADD CONSTRAINT `lms_answer_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `lms_questions_bank` (`q_id`);

--
-- Constraints for table `lms_course`
--
ALTER TABLE `lms_course`
  ADD CONSTRAINT `lms_course_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `lms_package_module` (`m_id`);

--
-- Constraints for table `lms_questions_bank`
--
ALTER TABLE `lms_questions_bank`
  ADD CONSTRAINT `lms_questions_bank_ibfk_1` FOREIGN KEY (`id`) REFERENCES `lms_course` (`id`);

--
-- Constraints for table `lms_user_answer`
--
ALTER TABLE `lms_user_answer`
  ADD CONSTRAINT `lms_user_answer_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `lms_questions_bank` (`q_id`),
  ADD CONSTRAINT `lms_user_answer_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `lms_answer` (`a_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
