use `mga db`;

-- ALTER TABLE login
-- ADD `LModified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ;

-- ALTER TABLE login
-- ADD `Locked` INT NOT NULL DEFAULT 0;

-- ALTER TABLE login
-- ADD `TOKEN` varchar(255);

--ALTER TABLE response
--ADD `Completion_Date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ;

ALTER TABLE faculty
--ADD COLUMN ClassID INT,
ADD FOREIGN KEY fk_ClassID(ClassID) REFERENCES class(ClassID) ON DELETE CASCADE;

ALTER TABLE evaluation
--ADD COLUMN ClassID INT,
ADD FOREIGN KEY fk_ClassID(ClassID) REFERENCES class(ClassID) ON DELETE CASCADE;

SET foreign_key_checks = 0;

ALTER TABLE student
ADD foreign key fk_loginID(LoginID) REFERENCES login(LoginID) ON DELETE CASCADE;

SET foreign_key_checks = 1;


ALTER TABLE faculty
ADD foreign key fk_loginID(LoginID) REFERENCES login(LoginID) ON DELETE CASCADE;

ALTER TABLE response
ADD foreign key fk_studentID(studentID) REFERENCES student(studentID) ON DELETE CASCADE;

/*ALTER TABLE login
DROP column PASSWORD_TOKEN*/

INSERT INTO `login` (`LoginID`, `Email`, `Pword`, `Role`, `FName`, `LName`) VALUES
(15, 'luke.ayler@mga.edu', SHA1('layler17'), 'Student', 'Luke', 'Ayler'),
(16, 'andrea.day@mga.edu', SHA1('aday17'), 'Student', 'Andrea', 'Day'),
(17, 'johnathan.brown3@mga.edu', SHA1('jbrown17'), 'Student', 'Johnathan', 'Brown'),
(18, 'duane.crampton@mga.edu', SHA1('dcrampton17'), 'Student', 'Duane', 'Crampton'),
(19, 'ryan.bennett@mga.edu', SHA1('rbennett17'), 'Student', 'Ryan', 'Bennett'),
(20, 'richard.dorminey@mga.edu', AES_ENCRYPT('rdorminey17','sha1'), 'Student', 'Richard', 'Dorminey'),
(21, 'alexander.bos@mga.edu', AES_ENCRYPT('abos17','sha1'), 'Student', 'Alexander', 'Bos'),
(22, 'jamison.hampton@mga.edu', AES_ENCRYPT('jhampton17','sha1'), 'Student', 'Jamison', 'Hampton'),
(23, 'deodrick.baugh@mga.edu', AES_ENCRYPT('dbaugh17','sha1'), 'Student', 'Deodrick', 'Baugh'),
(24, 'colby.carr@mga.edu', AES_ENCRYPT('ccarr17','sha1'), 'Student', 'Colby', 'Carr'),
(25, 'jack.campbell@mga.edu', AES_ENCRYPT('jcampbell17','sha1'), 'Student', 'Jack', 'Campbell'),
(26, 'theresa.brown@mga.edu', AES_ENCRYPT('tbrown17','sha1'), 'Student', 'theresa', 'Brown'),
(27, 'ronak.brahmbhatt@mga.edu', AES_ENCRYPT('rbrahmbhatt17','sha1'), 'Student', 'Ronak', 'Brahmbhatt');


