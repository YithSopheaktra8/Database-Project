-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2023 at 02:38 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rupp_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attandent`
--

DROP TABLE IF EXISTS `attandent`;
CREATE TABLE IF NOT EXISTS `attandent` (
  `attID` int NOT NULL AUTO_INCREMENT,
  `attAbsent` int DEFAULT NULL,
  `attPresent` int DEFAULT NULL,
  `stuID` int DEFAULT NULL,
  PRIMARY KEY (`attID`),
  KEY `stuID` (`stuID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Dumping data for table `attandent`
--

INSERT INTO `attandent` (`attID`, `attAbsent`, `attPresent`, `stuID`) VALUES
(1, 3, 27, 1),
(2, 10, 20, 2),
(3, 6, 24, 3),
(4, 5, 25, 4),
(5, 4, 26, 5);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `clsID` int NOT NULL AUTO_INCREMENT,
  `clsName` varchar(250) DEFAULT NULL,
  `clslevel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`clsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`clsID`, `clsName`, `clslevel`) VALUES
(1, 'mahanama', 'One'),
(2, 'patacara', 'Two'),
(3, 'kantara', 'Three'),
(4, 'tokinami', 'Four'),
(5, 'shiney', 'Five');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
CREATE TABLE IF NOT EXISTS `enrollment` (
  `EnID` int NOT NULL AUTO_INCREMENT,
  `EnDate` date DEFAULT NULL,
  PRIMARY KEY (`EnID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`EnID`, `EnDate`) VALUES
(1, '2019-12-10'),
(2, '2019-12-16'),
(3, '2019-12-10'),
(4, '2019-12-12'),
(5, '2019-12-11'),
(12, '2023-05-25'),
(13, '2023-05-25'),
(14, '2023-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `stuId` int NOT NULL AUTO_INCREMENT,
  `stuName` varchar(250) DEFAULT NULL,
  `stuSex` varchar(100) DEFAULT NULL,
  `stuDOB` date DEFAULT NULL,
  `stuPhone` varchar(250) DEFAULT NULL,
  `stuEmail` varchar(250) DEFAULT NULL,
  `stuAddress` varchar(250) DEFAULT NULL,
  `FK_teaID` int DEFAULT NULL,
  `FK_clsID` int DEFAULT NULL,
  `FK_enroll` int DEFAULT NULL,
  PRIMARY KEY (`stuId`),
  KEY `FK_teaID` (`FK_teaID`),
  KEY `FK_clsID` (`FK_clsID`),
  KEY `FK_enroll` (`FK_enroll`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stuId`, `stuName`, `stuSex`, `stuDOB`, `stuPhone`, `stuEmail`, `stuAddress`, `FK_teaID`, `FK_clsID`, `FK_enroll`) VALUES
(1, 'Sok Dara', 'Male', '2003-05-15', '019238484', 'dara123@gamil.com', 'Kondal', 1, 3, 1),
(2, 'Chem chanDara', 'Male', '2002-01-13', '098349823', 'chandara123@gamil.com', 'Phnom Penh', 2, 1, 2),
(3, 'Sok Nita', 'Female', '2004-11-02', '0123462723', 'nita123@gamil.com', 'Phnom Penh', 3, 2, 3),
(4, 'Keo Zono', 'Male', '2004-05-29', '0784756473', 'zono123@gamil.com', 'Takev', 4, 4, 4),
(5, 'Ly Kanika', 'Female', '2001-04-25', '096748263', 'kanika123@gamil.com', 'Kompong cham', 5, 5, 5),
(13, 'yithsopheaktra', 'Male', '1999-01-07', '0967174832', 'tra@gmail.com', 'sihanouk province', 1, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `teaID` int NOT NULL AUTO_INCREMENT,
  `teaName` varchar(250) DEFAULT NULL,
  `teaSex` varchar(100) DEFAULT NULL,
  `teaSalary` float DEFAULT NULL,
  `teaSubject` varchar(250) DEFAULT NULL,
  `teaPhone` varchar(250) DEFAULT NULL,
  `teaEmail` varchar(250) DEFAULT NULL,
  `teaAddress` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`teaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teaID`, `teaName`, `teaSex`, `teaSalary`, `teaSubject`, `teaPhone`, `teaEmail`, `teaAddress`) VALUES
(1, 'Pich Nary', 'F', 500, 'Begginner 1', '096784830', 'nary222@gmail.com', 'Phnom Penh'),
(2, 'Kev Bora', 'M', 600, 'Begginner 2', '096756676', 'bora222@gmail.com', 'Phnom Penh'),
(3, 'Heng Dana', 'F', 750, 'English in Common ', '093784830', 'dana222@gmail.com', 'Ta Khmav'),
(4, 'Sok Bunlong', 'M', 700, 'Passage', '0123454830', 'bunlong222@gmail.com', 'Kompongspue'),
(5, 'Rany Sonita', 'F', 800, 'Academic Writting', '023484830', 'sonita222@gmail.com', 'Phnom Penh');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attandent`
--
ALTER TABLE `attandent`
  ADD CONSTRAINT `attandent_ibfk_1` FOREIGN KEY (`stuID`) REFERENCES `students` (`stuId`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`FK_teaID`) REFERENCES `teachers` (`teaID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`FK_clsID`) REFERENCES `classes` (`clsID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`FK_enroll`) REFERENCES `enrollment` (`EnID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
