-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2017 at 03:06 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `iclassroom`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_user` (IN `id` VARCHAR(20), IN `inkey` VARCHAR(20), IN `password` VARCHAR(20), OUT `result` INT)  NO SQL
BEGIN
	DECLARE cntstudent INT;
    DECLARE cntteacher INT;
    SELECT COUNT(*) as cntstudent FROM student WHERE student.idstudent = id AND student.personalid = inkey;
    SELECT COUNT(*) as cntteacher FROM teacher WHERE teacher.idteacher = id AND teacher.personalid = inkey;
    IF(ISNULL(cntteacher) AND ISNULL(cntstudent)) THEN
       SET result=0;
    ELSE
       INSERT INTO user VALUES(id,password);
       SET result =1;
    END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `idhomework` int(11) NOT NULL,
  `idsection` int(11) NOT NULL,
  `idteacher` varchar(20) NOT NULL,
  `idsubject` int(11) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `duedate` datetime NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`idhomework`, `idsection`, `idteacher`, `idsubject`, `topic`, `duedate`, `filename`) VALUES
(1, 1, '1000', 1, 'HW1', '2017-11-14 12:00:00', 'chapter1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` varchar(20) NOT NULL,
  `query` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`idlog`, `timestamp`, `iduser`, `query`) VALUES
(2, '2017-11-25 18:13:07', 'admin', 'UPDATE teacher SET idteacher=\'1000\', fname=\'kru1\', lname=\'naja\', idmajor=\'1\' WHERE idteacher = 1000;');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `idmajor` int(11) NOT NULL,
  `majorname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`idmajor`, `majorname`) VALUES
(0, 'admin'),
(1, 'CPE'),
(2, 'IT'),
(3, 'CE'),
(4, 'CHE'),
(5, 'ME');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `idmessage` int(11) NOT NULL,
  `idfrom` varchar(30) NOT NULL,
  `idto` varchar(30) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`idmessage`, `idfrom`, `idto`, `topic`, `message`, `timestamp`) VALUES
(1, '1001', '1002', 'Hi there', 'This is the first message ever!!', '2017-11-25 20:19:46'),
(3, '1001', '5822780334', 'its me tonny', 'hithere tonny, love you xoxoxo tonny', '2017-11-25 20:45:10'),
(4, '1001', '1001', 'RE:Hi there', 'im talking to myself', '2017-11-25 20:59:30'),
(5, '1001', '1001', 'love you', 'yeyey', '2017-11-25 21:04:08'),
(6, '1001', '5822780334', 'do you wanna build a snowman?', 'do you?', '2017-11-25 21:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `idsection` int(11) NOT NULL,
  `numbersection` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL,
  `slot1` int(11) NOT NULL,
  `slot2` int(11) NOT NULL,
  `idteacher` int(11) NOT NULL,
  `room` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`idsection`, `numbersection`, `idsubject`, `slot1`, `slot2`, `idteacher`, `room`) VALUES
(1, 1, 1, 1, 2, 1000, '101'),
(2, 2, 1, 3, 4, 1000, '102'),
(3, 1, 2, 3, 4, 1001, '103'),
(4, 2, 2, 5, 6, 1001, '104'),
(5, 2, 3, 10, 12, 1000, '105'),
(6, 1, 3, 7, 9, 1001, '106'),
(7, 1, 4, 16, 17, 1000, '107'),
(8, 2, 4, 20, 21, 1001, '108');

-- --------------------------------------------------------

--
-- Table structure for table `section_has_student`
--

CREATE TABLE `section_has_student` (
  `idstudent` varchar(11) NOT NULL,
  `idsection` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section_has_student`
--

INSERT INTO `section_has_student` (`idstudent`, `idsection`) VALUES
('5822780334', '1'),
('5822780334', '3'),
('5822780334', '5'),
('5822771333', '1'),
('5822771333', '4'),
('5822771333', '3');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `idstudent` varchar(20) NOT NULL,
  `personalid` varchar(20) NOT NULL,
  `idmajor` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('active','nonactive','','') NOT NULL,
  `degree` enum('bachelor','master','phd','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fname`, `lname`, `idstudent`, `personalid`, `idmajor`, `year`, `dob`, `status`, `degree`) VALUES
('tonny', 'admin', '5822771333', '11004', 1, 3, '2017-11-10', 'active', 'bachelor'),
('admin2', 'admin', '5822780334', '11007', 1, 3, '2017-11-08', 'active', 'bachelor');

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentslot`
-- (See below for the actual view)
--
CREATE TABLE `studentslot` (
`idstudent` varchar(11)
,`idsection` int(11)
,`slot1` int(11)
,`slot2` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `idsubject` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`idsubject`, `code`, `name`, `credit`) VALUES
(1, 'CSS200', 'Subject1', 3),
(2, 'CSS201', 'Subject2', 3),
(3, 'CSS202', 'Subject3', 3),
(4, 'CSS203', 'Subject4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submithistory`
--

CREATE TABLE `submithistory` (
  `idsubmithistory` int(11) NOT NULL,
  `idstudent` varchar(30) NOT NULL,
  `idhomework` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `score` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submithistory`
--

INSERT INTO `submithistory` (`idsubmithistory`, `idstudent`, `idhomework`, `timestamp`, `score`) VALUES
(1, '5822780334', 1, '2017-11-25 14:46:41', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `idteacher` varchar(20) NOT NULL,
  `personalid` varchar(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `idmajor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`idteacher`, `personalid`, `fname`, `lname`, `idmajor`) VALUES
('1000', '1', 'admin23', 'admin', 1),
('1001', '1', 'admin23', 'admin', 2),
('admin', 'admin', 'admin23', 'admin', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `teacherslot`
-- (See below for the actual view)
--
CREATE TABLE `teacherslot` (
`idteacher` int(11)
,`idsection` int(11)
,`slot1` int(11)
,`slot2` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `teachsection`
-- (See below for the actual view)
--
CREATE TABLE `teachsection` (
`idsection` int(11)
,`code` varchar(10)
,`sname` varchar(30)
,`numbersection` int(11)
,`name` varchar(61)
,`slot1` int(11)
,`slot2` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `studentslot`
--
DROP TABLE IF EXISTS `studentslot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentslot`  AS  select `section_has_student`.`idstudent` AS `idstudent`,`section`.`idsection` AS `idsection`,`section`.`slot1` AS `slot1`,`section`.`slot2` AS `slot2` from (`section_has_student` left join `section` on((`section_has_student`.`idsection` = `section`.`idsection`))) ;

-- --------------------------------------------------------

--
-- Structure for view `teacherslot`
--
DROP TABLE IF EXISTS `teacherslot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `teacherslot`  AS  select `section`.`idteacher` AS `idteacher`,`section`.`idsection` AS `idsection`,`section`.`slot1` AS `slot1`,`section`.`slot2` AS `slot2` from `section` ;

-- --------------------------------------------------------

--
-- Structure for view `teachsection`
--
DROP TABLE IF EXISTS `teachsection`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `teachsection`  AS  select `section`.`idsection` AS `idsection`,`subject`.`code` AS `code`,`subject`.`name` AS `sname`,`section`.`numbersection` AS `numbersection`,concat(`teacher`.`fname`,' ',`teacher`.`lname`) AS `name`,`section`.`slot1` AS `slot1`,`section`.`slot2` AS `slot2` from ((`section` left join `subject` on((`section`.`idsubject` = `subject`.`idsubject`))) left join `teacher` on((`teacher`.`idteacher` = `section`.`idteacher`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`idhomework`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`idmajor`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idmessage`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idsection`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idstudent`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`idsubject`);

--
-- Indexes for table `submithistory`
--
ALTER TABLE `submithistory`
  ADD PRIMARY KEY (`idsubmithistory`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`idteacher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `idhomework` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `idmajor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `idsection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `idsubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `submithistory`
--
ALTER TABLE `submithistory`
  MODIFY `idsubmithistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
