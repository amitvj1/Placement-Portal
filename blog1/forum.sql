-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2015 at 09:27 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(25) NOT NULL DEFAULT '',
  `answer` varchar(1500) DEFAULT NULL,
  `upvotes` int(11) DEFAULT NULL,
  PRIMARY KEY (`aid`,`qid`,`user`),
  KEY `qid` (`qid`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`aid`, `qid`, `user`, `answer`, `upvotes`) VALUES
(1, 2, '1PI12CS028', 'Answer', 1),
(2, 2, '1PI12CS028', 'Answer2', 1),
(3, 2, '1PI12CS028', 'Answer3', 1),
(4, 3, '1PI12CS028', 'Answer ', 1),
(12, 4, '1PI12CS028', 'Answer', 1),
(13, 5, '1PI12CS028', 'Answer', 1),
(14, 6, '1PI12CS028', 'Answer', 1),
(15, 4, '1PI12CS028', 'Answer2\r\nasdfdg', 1),
(16, 7, '1PI12CS028', 'Answer', 1),
(17, 8, '1PI12CS028', 'Answer 6\r\n', 1),
(18, 9, '1PI12CS028', 'Answer', 0),
(19, 9, '1PI12CS028', 'Answer\r\n', 0),
(20, 11, '1PI12CS028', 'Answer\r\n', 1),
(21, 11, '1PI12CS028', 'answer2', 1),
(22, 12, '1PI12CS028', 'answer', 1),
(23, 12, '1PI12CS028', 'answer2\r\n', 1),
(24, 13, '1PI12CS028', 'answer', 1),
(25, 13, '1PI12CS028', 'answer2\r\n', 1),
(26, 14, '1PI12CS028', 'answer', 1),
(27, 14, '1PI12CS028', 'answer2', 1),
(28, 15, '1PI12CS028', 'Answer', 1),
(29, 16, '1PI12CS028', 'Answer', 1),
(30, 16, '1PI12CS028', 'Answer2', 1),
(31, 16, '1PI12CS028', 'Answer\r\n3', 1),
(32, 1429858696, '1PI12CS028', 'Answer', 1),
(33, 1429858696, '1PI12CS028', 'Answer2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `a_upvotes`
--

CREATE TABLE IF NOT EXISTS `a_upvotes` (
  `aid` int(11) NOT NULL DEFAULT '0',
  `qid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`aid`,`qid`,`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_upvotes`
--

INSERT INTO `a_upvotes` (`aid`, `qid`, `user`) VALUES
(1, 2, '1PI12CS028'),
(2, 2, '1PI12CS028'),
(3, 2, '1PI12CS028'),
(4, 3, '1PI12CS028'),
(12, 4, '1PI12CS028'),
(13, 5, '1PI12CS028'),
(14, 6, '1PI12CS028'),
(15, 4, '1PI12CS028'),
(16, 7, '1PI12CS028'),
(17, 8, '1PI12CS028'),
(20, 11, '1PI12CS028'),
(21, 11, '1PI12CS028'),
(22, 12, '1PI12CS028'),
(23, 12, '1PI12CS028'),
(24, 13, '1PI12CS028'),
(25, 13, '1PI12CS028'),
(26, 14, '1PI12CS028'),
(27, 14, '1PI12CS028'),
(28, 15, '1PI12CS028'),
(29, 16, '1PI12CS028'),
(30, 16, '1PI12CS028'),
(31, 16, '1PI12CS028'),
(32, 1429858696, '1PI12CS028'),
(33, 1429858696, '1PI12CS028');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `question` varchar(1500) DEFAULT NULL,
  `user` varchar(25) NOT NULL DEFAULT '',
  `tags` varchar(25) DEFAULT NULL,
  `upvotes` int(11) DEFAULT NULL,
  PRIMARY KEY (`qid`,`user`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1429859593 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `title`, `question`, `user`, `tags`, `upvotes`) VALUES
(2, 'QUESTION TITLE-2', 'Question', '1PI12CS048', 'tags', 1),
(3, 'QUESTION TITLE-3', 'Question 2', '1PI12CS048', 'tags', 1),
(4, 'Parameter passing in C++', 'How do I pass  parameters to functions in C++?', '1PI12CS048', 'C++,parameters', 1),
(5, 'QUESTION TITLE-4', 'Question 4', '1PI12CS048', 'tags', 1),
(6, 'QUESTION TITLE-5', 'Question', '1PI12CS048', 'tags', 1),
(7, 'QUESTION TITLE-5', 'Question', '1PI12CS048', 'tags', 1),
(8, 'C++ Passing parameters', 'Question 6', '1PI12CS048', 'C++,parameters', 1),
(9, 'title', 'question', '1PI12CS028', 'tags', 0),
(9, 'title', 'Q`', '1PI12CS048', 't', 0),
(10, 'title', '', '1PI12CS048', '', 0),
(11, 'title 8', 'Question', '1PI12CS048', 'tags', 0),
(12, 'new title', 'question', '1PI12CS048', 'tags', 0),
(13, 'qwert', 'Question', '1PI12CS048', 'tags', 0),
(14, 'new', 'question', '1PI12CS048', 'tags', 0),
(15, 'sdfg', 'asdfg', '1PI12CS048', 'sdf', 0),
(16, 'sdfg', 'ah', '1PI12CS048', 'qawerty', 1),
(1429858696, 'Ajax xmlhhtp object', 'Question', '1PI12CS048', 'ajax,xml', 1),
(1429858917, 'title', 'q', '1PI12CS048', 't', 0),
(1429859591, 'qw', 'we', '1PI12CS048', 'adsf', 0),
(1429859592, 'sdfghj', 'sdfgh', '1PI12CS048', 'dsfgh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `q_upvotes`
--

CREATE TABLE IF NOT EXISTS `q_upvotes` (
  `qid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`qid`,`user`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_upvotes`
--

INSERT INTO `q_upvotes` (`qid`, `user`) VALUES
(2, '1PI12CS028'),
(3, '1PI12CS028'),
(4, '1PI12CS028'),
(5, '1PI12CS028'),
(6, '1PI12CS028'),
(7, '1PI12CS028'),
(8, '1PI12CS028'),
(16, '1PI12CS028'),
(1429858696, '1PI12CS028');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`) VALUES
('1PI12CS028'),
('1PI12CS048');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `question` (`qid`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`user`);

--
-- Constraints for table `a_upvotes`
--
ALTER TABLE `a_upvotes`
  ADD CONSTRAINT `a_upvotes_ibfk_1` FOREIGN KEY (`aid`, `qid`, `user`) REFERENCES `answer` (`aid`, `qid`, `user`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`user`);

--
-- Constraints for table `q_upvotes`
--
ALTER TABLE `q_upvotes`
  ADD CONSTRAINT `q_upvotes_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`user`),
  ADD CONSTRAINT `q_upvotes_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `question` (`qid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
