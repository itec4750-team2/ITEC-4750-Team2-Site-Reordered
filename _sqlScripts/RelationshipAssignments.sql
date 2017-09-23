
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

-----------------------------------------------------------

--
-- Table structure for table `group_survey_questions`
-- Assigns questions to group survey
-- When Instructor creates a class group survey
-- 

-- ++++changed group to cgroup because group is a protected word in MySqli 
--     statements++++
CREATE TABLE `group_survey_q` (
  `GroupQID` int(6) NOT NULL AUTO_INCREMENT,
  `GSurveyName` varchar(255),
  `GroupID` varchar(255) NOT NULL,
  `QuestionID` int,
   PRIMARY KEY (GroupQID),
   FOREIGN KEY (`GroupID`) REFERENCES `cgroup`(`GroupID`) ON DELETE CASCADE,
   FOREIGN KEY (`QuestionID`) REFERENCES `gen_survey_q`(`QuestionID`) ON DELETE CASCADE
   
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  SET foreign_key_checks = 0;

--
-- Dumping data for table `survey`
--

INSERT INTO `group_survey_q` (`GroupQID`,`GroupID`, `GSurveyName`, `QuestionID`) VALUES
(1,'1-2', 'Group 2, Week 1 Team Survey', 1),
(2,'1-2', 'Group 2, Week 1 Team Survey', 2),
(3,'1-2', 'Group 2, Week 1 Team Survey', 3),
(4,'1-2', 'Group 2, Week 1 Team Survey', 4),
(5,'1-2', 'Group 2, Week 1 Team Survey', 5),
(6,'1-2', 'Group 2, Week 1 Team Survey', 6),
(7,'1-2', 'Group 2, Week 1 Team Survey', 7),
(8,'1-2', 'Group 2, Week 1 Team Survey', 8),
(9,'1-2', 'Group 2, Week 1 Team Survey', 9),
(10,'1-2', 'Group 2, Week 1 Team Survey', 10),
(11,'86756-2', 'Group 2, Week 1 Team Survey', 1),
(12,'86756-2', 'Group 2, Week 1 Team Survey', 2),
(13,'86756-2', 'Group 2, Week 1 Team Survey', 3),
(14,'86756-2', 'Group 2, Week 1 Team Survey', 4),
(15,'86756-2', 'Group 2, Week 1 Team Survey', 5),
(16,'86756-2', 'Group 2, Week 1 Team Survey', 6),
(17,'86756-2', 'Group 2, Week 1 Team Survey', 7),
(18,'86756-2', 'Group 2, Week 1 Team Survey', 8),
(19,'86756-2', 'Group 2, Week 1 Team Survey', 9),
(20,'86756-2', 'Group 2, Week 1 Team Survey', 10),
(21,'87123-2', 'Group 2, Week 1 Team Survey', 1),
(22,'87123-2', 'Group 2, Week 1 Team Survey', 3),
(23,'87123-2', 'Group 2, Week 1 Team Survey', 5),
(24,'87123-2', 'Group 2, Week 1 Team Survey', 6),
(25,'87123-2', 'Group 2, Week 1 Team Survey', 10);

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
-- Holds Responses to specific student's specific survey questions
-- Survey shows by student name will be pulled by loginid 

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
-- Holds Responses to specific student's specific survey questions
-- Survey shows by student name will be pulled by loginid 

-- 
CREATE TABLE `survey_responses`(
 `ResponseID` int(10) NOT NULL AUTO_INCREMENT,
 `GroupQID` int,
 `LoginID` int,
 `ResponseValue` int(2),
  PRIMARY KEY (`ResponseID`),
  FOREIGN KEY (`GroupQID`) REFERENCES `group_survey_q`(`GroupQID`) ON DELETE CASCADE,
  FOREIGN KEY (`LoginID`) REFERENCES `login`(`LoginID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Dumping data for table `responses`
--

INSERT INTO `survey_responses` (`ResponseID`, `GroupQID`, `LoginID`,`ResponseValue`) VALUES
(1, 1, 100, 1), (2, 2, 100, 1), (3, 3, 100, 1), (4, 4, 100, 1), (5, 5, 100, 1), (6, 6, 100, 1), (7, 7, 100, 1), (8, 8, 100, 1), (9, 9, 100, 1), (10, 10, 100, 1),
(11, 1, 101, 1), (12, 2, 101, 1), (13, 3, 101, 1), (14, 4, 101, 1), (15, 5, 101, 1), (16, 6, 101, 1), (17, 7, 101, 1), (18, 8, 101, 1), (19, 9, 101, 1), (20, 10, 101, 1),
(21, 1, 102, 1), (22, 2, 102, 1), (23, 3, 102, 1), (24, 4, 102, 1), (25, 5, 102, 1), (26, 6, 102, 1), (27, 7, 102, 1), (28, 8, 102, 1), (29, 9, 102, 1), (30, 10, 102, 1),
(31, 1, 103, 1), (32, 2, 103, 1), (33, 3, 103, 1), (34, 4, 103, 1), (35, 5, 103, 1), (36, 6, 103, 1), (37, 7, 103, 1), (38, 8, 103, 1), (39, 9, 103, 1), (40, 10, 103, 1),
(41, 1, 104, 1), (42, 2, 104, 1), (43, 3, 104, 1), (44, 4, 104, 1), (45, 5, 104, 1), (46, 6, 104, 1), (47, 7, 104, 1), (48, 8, 104, 1), (49, 9, 104, 1), (50, 10, 104, 1),
(51, 1, 105, 1), (52, 2, 105, 1), (53, 3, 105, 1), (54, 4, 105, 3), (55, 5, 105, 1), (56, 6, 105, 1), (57, 7, 105, 1), (58, 8, 105, 1), (59, 9, 105, 1), (60, 10, 105, 1),
(61, 1, 106, 1), (62, 2, 106, 1), (63, 3, 106, 1), (64, 4, 106, 1), (65, 5, 106, 1), (66, 6, 106, 1), (67, 7, 106, 1), (68, 8, 106, 1), (69, 9, 106, 1), (70, 10, 103, 1);
