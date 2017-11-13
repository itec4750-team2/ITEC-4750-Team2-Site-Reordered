
-- #1 Run NEW ITEC 4750 DB Setup First
-- #2 Run RelationshipAssignments
-- #3 Optional Class Data in Fall2017ITEC

use mga_db;
-- 
-- Table structure for table `class_assign`
-- class assignments table
--

CREATE TABLE `class_assign` (
  `ClassAssignID` int(10) NOT NULL AUTO_INCREMENT,
  `ClassID` int,
  `LoginID` int,
  PRIMARY KEY (`ClassAssignID`),
  FOREIGN KEY (`ClassID`) REFERENCES `class`(`ClassID`) ON DELETE CASCADE,
  FOREIGN KEY (`LoginID`) REFERENCES `login`(`LoginID`) ON DELETE CASCADE
  
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `class_assign`
--

INSERT INTO `class_assign` (`ClassAssignID`, `ClassID`, `LoginID`) VALUES
-- Dr. Spangler's Classes
(20,  87123,  1),
(21,  86756,  1),
(19,  87361,  1),
(22,  86654,  1),
(91, 1, 1),

-- Students
(1, 1, 100),
(2, 1, 101),
(3, 1, 102),
(4, 1, 103),
(5, 1, 104),
(6, 1, 105),
(7, 1, 106),
(8, 86756, 115),
(9, 86756, 116),
(10, 86756, 117),
(11, 86756, 118),
(12, 86756, 119),
(13, 86756, 120),
(14, 86756, 121),
(15, 86756, 122),
(16, 86756, 123),
(17, 86756, 124);

-- 
-- Table structure for table `group_assign`
-- Group assignments table
--

-- ++++changed group to cgroup because group is a protected word in MySqli 
--     statements++++
CREATE TABLE `group_assign` (
  `GroupAssignID` int(10) NOT NULL AUTO_INCREMENT,
  `GroupID` varchar(255),
  `LoginID` int,
  PRIMARY KEY (`GroupAssignID`),
  FOREIGN KEY (`GroupID`) REFERENCES `cgroup`(`GroupID`) ON DELETE CASCADE,
  FOREIGN KEY (`LoginID`) REFERENCES `login`(`LoginID`) ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `group_assign`
--

INSERT INTO `group_assign` (`GroupAssignID`, `GroupID`, `LoginID`) VALUES
-- last team
(1, '1-2', 100),
(2, '1-2', 101),
(3, '1-2', 102),
(4, '1-2', 103),
(5, '1-2', 104),
(6, '1-2', 105),
(7, '1-2', 106),
-- 2017 Fall Team
(8, '86756-2', 115),
(9, '86756-2', 116),
(10, '86756-2', 117),
(11, '86756-2', 118),
(12, '86756-2', 119),
(13, '86756-2', 120),
(14, '86756-2', 121),
(15, '86756-2', 122),
(16, '86756-2', 123),
(17, '86756-2', 124);

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
-- Holds Responses to specific student's specific survey questions
-- Survey shows by student name will be pulled by loginid 
-- --------------------------------------------------------
--
-- Table structure for table `surveys`
-- Holds Survey Names
-- 

-- 
CREATE TABLE `surveys`(
 `GSurveyID` int(10) NOT NULL AUTO_INCREMENT,
 `GSurveyName` varchar(255),
 PRIMARY KEY (`GSurveyID`)
 )ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`GSurveyID`, `GSurveyName`) VALUES
(1,'Week 1 Team Survey'), (2, 'Week 2 Team Survey'), 
(3, 'Week 3 Team Survey'), (4, 'Week 4 Team Survey');

-- ---------------------------------------------------------

--
-- Table structure for table `group_survey_questions`
-- Assigns questions to group survey
-- When Instructor creates a class group survey
-- 

-- ++++changed group to cgroup because group is a protected word in MySqli 
--     statements++++
CREATE TABLE `group_survey_q` (
  `GroupQID` int(6) NOT NULL AUTO_INCREMENT,
  `GSurveyID` int(6) NOT NULL, 
  `QuestionNum` int(6) NOT NULL,
  `GroupID` varchar(255) NOT NULL,
  `QuestionID` int,
   PRIMARY KEY (`GroupQID`),
   FOREIGN KEY (`GSurveyID`) REFERENCES `surveys`(`GSurveyID`) ON DELETE CASCADE,
   FOREIGN KEY (`GroupID`) REFERENCES `cgroup`(`GroupID`) ON DELETE CASCADE,
   FOREIGN KEY (`QuestionID`) REFERENCES `gen_survey_q`(`QuestionID`) ON DELETE CASCADE
   
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  SET foreign_key_checks = 0;

--
-- Dumping data for table `group_survey_q`
--

INSERT INTO `group_survey_q` (`GroupQID`,`GroupID`, `QuestionNum`, `GSurveyID`, `QuestionID`) VALUES
(1,'1-2', 1, 1, 1),
(2,'1-2', 2, 1, 2),
(3,'1-2', 3, 1, 3),
(4,'1-2', 4, 1, 4),
(5,'1-2', 5, 1, 5),
(6,'1-2', 6, 1, 6),
(7,'1-2', 7, 1, 7),
(8,'1-2', 8, 1, 8),
(9,'1-2', 9, 1, 9),
(10,'1-2', 10, 1, 10),
(11,'86756-2', 1, 1, 1),
(12,'86756-2', 2, 1, 2),
(13,'86756-2', 3, 1, 3),
(14,'86756-2', 4, 1, 4),
(15,'86756-2', 5, 1, 5),
(16,'86756-2', 6, 1, 6),
(17,'86756-2', 7, 1, 7),
(18,'86756-2', 8, 1, 8),
(19,'86756-2', 9, 1, 9),
(20,'86756-2', 10, 1, 10),
(21,'87123-2', 1, 1, 1),
(22,'87123-2', 2, 1, 3),
(23,'87123-2', 3, 1, 5),
(24,'87123-2', 4, 1, 6),
(25,'87123-2', 5, 1, 10),
(26,'1-2', 1, 2, 1),
(27,'1-2', 2, 2, 2),
(28,'1-2', 3, 2, 3),
(29,'1-2', 4, 2, 4),
(30,'1-2', 5, 2, 5),
(31,'1-2', 6, 2, 6),
(32,'1-2', 7, 2, 7),
(33,'1-2', 8, 2, 8),
(34,'1-2', 9, 2, 9),
(35,'1-2', 10, 2, 10),
(41,'86756-2', 1, 3, 1),
(42,'86756-2', 2, 3, 9),
(43,'86756-2', 3, 3, 2),
(44,'86756-2', 4, 3, 12),
(45,'86756-2', 5, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
-- Holds Responses to specific student's specific survey questions
-- Survey shows by student name will be pulled by loginid 

-- 
CREATE TABLE `survey_responses`(
 `ResponseID` int(10) NOT NULL AUTO_INCREMENT,
 `LoginID` int,
 `GSurveyID` int,
 `QuestionID` int,
 `TeamMemberID` int,
 `ResponseValue` int(2),
  PRIMARY KEY (`ResponseID`),
  FOREIGN KEY (`LoginID`)  REFERENCES `login`(`LoginID`) ON DELETE CASCADE,
  FOREIGN KEY (`GSurveyID`)  REFERENCES `surveys`(`GSurveyID`) ON DELETE CASCADE,
  FOREIGN KEY (`QuestionID`) REFERENCES `gen_survey_q`(`QuestionID`) ON DELETE CASCADE,
  FOREIGN KEY (`TeamMemberID`) REFERENCES `login`(`LoginID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

