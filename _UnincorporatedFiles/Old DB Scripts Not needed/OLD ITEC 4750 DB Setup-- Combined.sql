-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 12:20 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

-- Dummy Database setup Combined from Summer Team's MySQL Script
-- Changed password data inserted into 'login table' to SHA1 checksum to agree with current login page 
-- Added Current team members' 'login table' information for 'default' insert

-- Create Local mga_db and run sql


-- Config file should be setup for localhost for running locally --


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mga_db`
--

-- --------------------------------------------------------
use `mga_db`;
--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int(6) NOT NULL,
  `ClassName` varchar(20) NOT NULL,
  `Semester` varchar(20) NOT NULL, 
  PRIMARY KEY (ClassID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `ClassName`, `Semester`) VALUES
(1, 'ITEC4750', 'Spring 2017');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(6)  NOT NULL AUTO_INCREMENT,
  `Email` varchar(60) NOT NULL,
  `Pword` varchar(40) NOT NULL,
  `Role` varchar(8) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `LModified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Locked` INT NOT NULL DEFAULT 0,  
  `TOKEN` varchar(255),
  PRIMARY KEY (LoginID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `Email`, `Pword`, `Role`, `FName`, `LName`) VALUES
(11, 'scott.spangler@mga.edu', SHA1('sspangler17'), 'Faculty', 'Scott', 'Spangler'),
(12, 'alan.stines@mga.edu', SHA1('astines17'), 'Faculty', 'Alan', 'Stines'),
(13, 'chase.cummings@mga.edu', SHA1('ccummings17'), 'Student', 'Chase', 'Cummings'),
(14, 'chelsea.bennett@mga.edu', SHA1('cbennett17'), 'Student', 'Chelsea', 'Bennett'),
(15, 'luke.ayler@mga.edu', SHA1('layler17'), 'Student', 'Luke', 'Ayler'),
(16, 'andrea.day@mga.edu', SHA1('aday17'), 'Student', 'Andrea', 'Day'),
(17, 'johnathan.brown3@mga.edu', SHA1('jbrown17'), 'Student', 'Johnathan', 'Brown'),
(18, 'duane.crampton@mga.edu', SHA1('dcrampton17'), 'Student', 'Duane', 'Crampton'),
(19, 'ryan.bennett@mga.edu', SHA1('rbennett17'), 'Student', 'Ryan', 'Bennett'),
(20, 'richard.dorminey@mga.edu', SHA1('rdorminey17'), 'Student', 'Richard', 'Dorminey'),
(21, 'alexander.bos@mga.edu', SHA1('abos17'), 'Student', 'Alexander', 'Bos'),
(22, 'jamison.hampton@mga.edu', SHA1('jhampton17'), 'Student', 'Jamison', 'Hampton'),
(23, 'deodrick.baugh@mga.edu', SHA1('dbaugh17'), 'Student', 'Deodrick', 'Baugh'),
(24, 'colby.carr@mga.edu', SHA1('ccarr17'), 'Student', 'Colby', 'Carr'),
(25, 'jack.campbell@mga.edu', SHA1('jcampbell17'), 'Student', 'Jack', 'Campbell'),
(26, 'theresa.brown@mga.edu', SHA1('tbrown17'), 'Student', 'theresa', 'Brown'),
(27, 'ronak.brahmbhatt@mga.edu', SHA1('rbrahmbhatt17'), 'Student', 'Ronak', 'Brahmbhatt'),
(28, 'joseph.dent@mga.edu', SHA1('jdent17'), 'Student', 'Joe', 'Dent'),
(29, 'andrew.dixon@mga.edu', SHA1('adixon17'), 'Student', 'Andrew', 'Dixon'),
(30, 'sarah.goodman@mga.edu', SHA1('sgoodman17'), 'Student', 'Sarah', 'Goodman'),
(31, 'joel.gregory@mga.edu', SHA1('jgregory17'), 'Student', 'Joel', 'Gregory'),
(32, 'thomas.haastrup@mga.edu', SHA1('thaastrup17'), 'Student', 'Thomas', 'Haastrup'),
(33, 'molly.hester@mga.edu', SHA1('mhester17'), 'Student', 'Macenzie', 'Hester'),
(34, 'adam.hudnall@mga.edu', SHA1('ahudnall17'), 'Student', 'Adam', 'Hudnall'), 
(35, 'angela.ivey@mga.edu', SHA1('livey17'), 'Student', 'Leigh', 'Ivey'),
(36, 'katie.hodnett@mga.edu', SHA1('kmarkham17'), 'Student', 'Katie', 'Markham'),
(37, 'michael.mathews@mga.edu', SHA1('mmathews17'), 'Student', 'Mike', 'Mathews');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `EvalId` int(6) NOT NULL AUTO_INCREMENT,
  `ClassID` int,
  PRIMARY KEY (EvalId),
  FOREIGN KEY (ClassID) REFERENCES class(ClassID) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  SET foreign_key_checks = 0;
  
--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`EvalId`, `ClassID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FacultyId` int(6) NOT NULL AUTO_INCREMENT,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `LoginID` int(6),
  PRIMARY KEY (FacultyId),
  FOREIGN KEY (LoginID) REFERENCES login(LoginID) ON DELETE CASCADE
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyId`, `FName`, `LName`, `Email`, `LoginID`) VALUES
(1, 'Scott', 'Spangler', 'scott.spangler@mga.edu', 11),
(2, 'Alan', 'Stines', 'alan.stines@mga.edu', 12);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionID` int(6) NOT NULL AUTO_INCREMENT,
  `QuestionTxt` varchar(110) NOT NULL,
  `QuestionNum` int(6) NOT NULL,
  `QKey` varchar(25) NOT NULL,
   PRIMARY KEY (QuestionID),
   UNIQUE KEY (QKey)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `QuestionTxt`, `QuestionNum`, `QKey`) VALUES
(1, 'Rate this group member on his/her QUALITY of contribtuion', 1, 'quality'),
(2, 'Rate this group member on his/her QUANTITY of contribution', 2, 'quantity'),
(3, 'Rate this group member on his/her CREATIVITY', 3, 'creativity'),
(4, 'Rate this group member on his/her TURN TAKING or allowing others to participant', 4, 'turnTaking'),
(5, 'Rate this group member on his/her EFFORT or time spent on project', 5, 'effort'),
(6, 'Rate this group member on his/her ATTITUDE toward the group', 6, 'attitude'),
(7, 'Rate this group member on his/her ATTENDANCE to group meetings', 7, 'attendance'),
(8, 'Rate this group member on his/her PREPARATION for group meetings', 8, 'preparation'),
(9, 'Rate this group member on his/her WILLINGNESS to accept and complete tasks', 9, 'willingness'),
(10, 'Rate this group member on his/her COMPLETION of tasks ON TIME', 10, 'completion');

-- --------------------------------------------------------
--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentId` varchar(50) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `LoginID` int,
  PRIMARY KEY (StudentID),
  FOREIGN KEY (LoginID) REFERENCES login(LoginID) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET foreign_key_checks = 1;

  
--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentId`, `FName`, `LName`, `Email`, `LoginID`) VALUES
('andrea.day', 'Andrea', 'Day', 'andrea.day@mga.edu', 16),
('chase.cummings', 'Chase', 'Cummings', 'chase.cummings@mga.edu', 13),
('chelsea.bennett', 'Chelsea', 'Bennett', 'chelsea.bennett@mga.edu', 14),
('duane.crampton', 'Duane', 'Crampton', 'duane.crampton@mga.edu', 18),
('johnathan.brown3', 'Johnathan', 'Brown', 'johnathan.brown3@mga.edu', 17),
('luke.ayler', 'Luke', 'Ayler', 'luke.ayler@mga.edu', 15),
('ryan.bennett', 'Ryan', 'Bennett', 'ryan.bennett@mga.edu', 19);

-- ----------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `ResponseID` int(6) NOT NULL AUTO_INCREMENT,
  `quality` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `creativity` int(11) NOT NULL,
  `turnTaking` int(11) NOT NULL,
  `effort` int(11) NOT NULL,
  `attitude` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `preparation` int(11) NOT NULL,
  `willingness` int(11) NOT NULL,
  `Completion_Date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
  `completion` int(11) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  PRIMARY KEY (ResponseID),
  FOREIGN KEY (StudentID) REFERENCES student(StudentID) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `response`
--

INSERT INTO `response` (`ResponseID`, `StudentID`, `quality`, `quantity`, `creativity`, `turnTaking`, `effort`, `attitude`, `attendance`, `preparation`, `willingness`, `completion`) VALUES
(38, 'johnathan.brown3', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(39, 'luke.ayler', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(41, 'duane.crampton', 1, 1, 1, 3, 1, 1, 1, 1, 1, 1),
(42, 'chase.cummings', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(43, 'chelsea.bennett', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(44, 'andrea.day', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(45, 'ryan.bennett', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(47, 'andrea.day', 5, 0, 5, 5, 5, 5, 5, 5, 5, 5),
(48, 'andrea.day', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;