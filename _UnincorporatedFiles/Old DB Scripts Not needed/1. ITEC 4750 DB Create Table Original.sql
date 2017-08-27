-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2017 at 11:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mga db`
--

-- --------------------------------------------------------
use `mga db`;
--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int(6) NOT NULL,
  `ClassName` varchar(20) NOT NULL,
  `Semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `ClassName`, `Semester`) VALUES
(1, 'ITEC4750', 'Spring 2017');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `EvalId` int(6) NOT NULL,
  `ClassName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`EvalId`, `ClassName`) VALUES
(1, 'ITEC4750');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FacultyId` int(6) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `LoginID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyId`, `FName`, `LName`, `Email`, `LoginID`) VALUES
(2, 'Alan', 'Stines', 'alan.stines@mga.edu', 12),
(1, 'Scott', 'Spangler', 'scott.spangler@mga.edu', 11);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(6) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Pword` varchar(24) NOT NULL,
  `Role` varchar(8) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `FName` (`FName`),
  ADD KEY `LName` (`LName`),
  ADD KEY `LoginID` (`LoginID`),
  ADD KEY `Role` (`Role`),
  ADD KEY `Email` (`Email`);

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `Email`, `Pword`, `Role`, `FName`, `LName`) VALUES
(11, 'scott.spangler@mga.edu', 'sspangler17', 'Faculty', 'Scott', 'Spangler'),
(12, 'alan.stines@mga.edu', 'astines17', 'Faculty', 'Alan', 'Stines'),
(13, 'chase.cummings@mga.edu', 'ccummings17', 'Student', 'Chase', 'Cummings'),
(14, 'chelsea.bennett@mga.edu', 'cbennett17', 'Student', 'Chelsea', 'Bennett'),
(15, 'luke.ayler@mga.edu', 'layler17', 'Student', 'Luke', 'Ayler'),
(16, 'andrea.day@mga.edu', 'aday17', 'Student', 'Andrea', 'Day'),
(17, 'johnathan.brown3@mga.edu', 'jbrown17', 'Student', 'Johnathan', 'Brown'),
(18, 'duane.crampton@mga.edu', 'dcrampton17', 'Student', 'Duane', 'Crampton'),
(19, 'ryan.bennett@mga.edu', 'rbennett17', 'Student', 'Ryan', 'Bennett');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionID` int(6) NOT NULL,
  `QuestionTxt` varchar(110) NOT NULL,
  `QuestionNum` int(6) NOT NULL,
  `QKey` varchar(25) NOT NULL
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
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `ResponseID` int(6) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  `quality` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `creativity` int(11) NOT NULL,
  `turnTaking` int(11) NOT NULL,
  `effort` int(11) NOT NULL,
  `attitude` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `preparation` int(11) NOT NULL,
  `willingness` int(11) NOT NULL,
  `completion` int(11) NOT NULL
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

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentId` varchar(50) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `LoginID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`),
  ADD KEY `ClassName` (`ClassName`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`EvalId`),
  ADD KEY `ClassName` (`ClassName`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FacultyId`),
  ADD KEY `FName` (`FName`,`LName`,`Email`,`LoginID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `FName` (`FName`),
  ADD KEY `LName` (`LName`),
  ADD KEY `LoginID` (`LoginID`),
  ADD KEY `Role` (`Role`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionID`),
  ADD UNIQUE KEY `QKey` (`QKey`),
  ADD KEY `QuestionTxt` (`QuestionTxt`,`QuestionNum`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`ResponseID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentId`),
  ADD KEY `FName` (`FName`),
  ADD KEY `LName` (`LName`,`Email`,`LoginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `EvalId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `FacultyId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QuestionID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `ResponseID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
