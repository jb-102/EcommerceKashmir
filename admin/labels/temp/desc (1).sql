-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2017 at 03:16 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desc`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence_profile`
--

DROP TABLE IF EXISTS `attendence_profile`;
CREATE TABLE `attendence_profile` (
  `Enroll` int(4) NOT NULL,
  `Attendence_Sub1` float NOT NULL,
  `Attendence_Sub2` float NOT NULL,
  `Attendence_Sub3` float NOT NULL,
  `Attendence_Sub4` float NOT NULL,
  `Attendence_Sub5` float NOT NULL,
  `Attendence_Sub6` float NOT NULL,
  `Total_Attendence` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence_profile`
--

INSERT INTO `attendence_profile` (`Enroll`, `Attendence_Sub1`, `Attendence_Sub2`, `Attendence_Sub3`, `Attendence_Sub4`, `Attendence_Sub5`, `Attendence_Sub6`, `Total_Attendence`) VALUES
(1234, 80, 80, 80, 80, 80, 80, 80),
(1235, 80, 80, 80, 80, 80, 80, 80),
(1236, 80, 80, 80, 80, 80, 80, 80),
(1237, 80, 80, 80, 80, 80, 80, 80),
(3601, 80, 80, 80, 80, 80, 80, 80),
(3619, 80, 80, 80, 80, 80, 80, 80),
(3781, 80, 80, 80, 80, 80, 80, 80),
(3789, 80, 80, 80, 80, 80, 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

DROP TABLE IF EXISTS `class_routine`;
CREATE TABLE `class_routine` (
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `total_classes` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`subject_name`, `subject_code`, `semester`, `teacher`, `total_classes`) VALUES
('Java ', '123', 7, 'Mr Shahid', 20),
('Computer Networks ', '456', 7, 'Mr Mudasir', 20),
('Wireless Networks ', '789', 7, 'Mr Khalid', 20),
('Wireless Networks ', '789', 7, 'Mr Khalid', 20),
('Artificial Intelligence ', '321', 7, 'Mr Ai', 20);

-- --------------------------------------------------------

--
-- Table structure for table `hod_credentials`
--

DROP TABLE IF EXISTS `hod_credentials`;
CREATE TABLE `hod_credentials` (
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod_credentials`
--

INSERT INTO `hod_credentials` (`username`, `password`) VALUES
('yas321', '07bfb8859869871cfc41d54040ed6dbd');

-- --------------------------------------------------------

--
-- Table structure for table `projects_profile`
--

DROP TABLE IF EXISTS `projects_profile`;
CREATE TABLE `projects_profile` (
  `Project_Id` varchar(15) NOT NULL,
  `Project_Name` varchar(100) NOT NULL,
  `No_Of_Menbers` int(1) NOT NULL,
  `Project_Members` varchar(250) NOT NULL,
  `Year` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_profile`
--

INSERT INTO `projects_profile` (`Project_Id`, `Project_Name`, `No_Of_Menbers`, `Project_Members`, `Year`) VALUES
('akshdk', 'aksj', 2, ' , ', '2016'),
('jash', 'aksjh', 3, ' ,  , ', '2016'),
('jashgdjah', 'ajhsgdj', 3, 'jzhxgcjgz ,  , ', '2016'),
('jhkashd', 'aksjdhakh', 3, ' ,  , ', '2016'),
('ljhahk', 'akjsh', 3, ' ,  , ', '2016'),
('P2016-787', 'DESC', 3, 'junaid , ilyas , munsif', '2016'),
('P2016-969', 'some project', 3, 'wajid , zahid , zubair', '2016'),
('qwe', 'qwew', 2, ' , ', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_profile`
--

DROP TABLE IF EXISTS `seminar_profile`;
CREATE TABLE `seminar_profile` (
  `Enroll` int(4) NOT NULL,
  `Topic_Name` varchar(100) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar_profile`
--

INSERT INTO `seminar_profile` (`Enroll`, `Topic_Name`, `Year`) VALUES
(3601, 'Speech Recognition using AI', 2016),
(3619, 'Big Data', 2016),
(3748, 'Ubicus', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `sessional_awards`
--

DROP TABLE IF EXISTS `sessional_awards`;
CREATE TABLE `sessional_awards` (
  `Enroll` int(4) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Sessional` int(2) NOT NULL DEFAULT '1',
  `Marks_Sub1` float NOT NULL,
  `Marks_Sub2` float NOT NULL,
  `Marks_Sub3` float NOT NULL,
  `Marks_Sub4` float NOT NULL,
  `Marks_Sub5` float NOT NULL,
  `Marks_Sub6` float NOT NULL,
  `Total_Marks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessional_awards`
--

INSERT INTO `sessional_awards` (`Enroll`, `Name`, `Sessional`, `Marks_Sub1`, `Marks_Sub2`, `Marks_Sub3`, `Marks_Sub4`, `Marks_Sub5`, `Marks_Sub6`, `Total_Marks`) VALUES
(3601, 'ilyas', 2, 1, 2, 3, 4, 5, 6, 21),
(3619, 'junaid', 2, 1, 2, 3, 4, 5, 6, 21),
(3620, 'mehreen', 2, 1, 2, 3, 4, 5, 6, 21),
(3699, 'ansah', 2, 1, 2, 3, 4, 5, 6, 21),
(3740, 'seerat', 2, 1, 2, 3, 4, 5, 6, 21),
(3788, 'asim', 2, 1, 2, 3, 4, 5, 6, 21),
(3601, 'ilyas', 1, 0, 0, 0, 0, 0, 0, 0),
(3619, 'junaid', 1, 0, 0, 0, 0, 0, 0, 0),
(3620, 'mehreen', 1, 0, 0, 0, 0, 0, 0, 0),
(3699, 'ansah', 1, 0, 0, 0, 0, 0, 0, 0),
(3740, 'seerat', 1, 0, 0, 0, 0, 0, 0, 0),
(3788, 'asim', 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_grevence`
--

DROP TABLE IF EXISTS `student_grevence`;
CREATE TABLE `student_grevence` (
  `grevience_id` int(5) NOT NULL,
  `grevience_subject` varchar(100) NOT NULL,
  `grevience_message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_grevence`
--

INSERT INTO `student_grevence` (`grevience_id`, `grevience_subject`, `grevience_message`) VALUES
(1, 'Internet', 'Internet in the department is very slow'),
(2, 'Internet', 'Internet in the department is very slow'),
(3, 'Internet', 'Internet in the department is very slow');

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

DROP TABLE IF EXISTS `student_profile`;
CREATE TABLE `student_profile` (
  `enroll` varchar(10) CHARACTER SET hp8 NOT NULL,
  `name` varchar(30) CHARACTER SET hp8 NOT NULL,
  `course` varchar(10) CHARACTER SET hp8 NOT NULL,
  `semester` varchar(10) CHARACTER SET hp8 NOT NULL,
  `section` varchar(5) NOT NULL,
  `address` text CHARACTER SET hp8 NOT NULL,
  `contact_no` varchar(15) CHARACTER SET hp8 NOT NULL,
  `email` varchar(30) CHARACTER SET hp8 NOT NULL,
  `reg_no` varchar(20) CHARACTER SET hp8 NOT NULL,
  `batch` varchar(10) CHARACTER SET hp8 NOT NULL,
  `reg_status` varchar(5) CHARACTER SET hp8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`enroll`, `name`, `course`, `semester`, `section`, `address`, `contact_no`, `email`, `reg_no`, `batch`, `reg_status`) VALUES
('1234', 'ilyas', 'DIPLOMA', '6', 'A', 'syed sahib rajouri kadal srinagar', '122133445', 'ilyas.shah3@iove.com', 'dip-123', '2012', 'yes'),
('3467', 'SEERAT HASSAN', 'BE', '8', 'B', 'badami bagh srinagar', '9979736666', 'seertahassan@ui.com', '1313-sme-1313', '2012', 'yes'),
('3601', 'Ilyas Shah', 'BE', '8', 'A', 'syed sahib rajouri kadal srinagar', '9622721287', 'ilyas.shah3@live.com', '2081-SME-2012', '2012', 'yes'),
('3619', 'junaid bhat', 'BE', '8', 'B', 'nishat srinagar', '8491546321', 'junaidbhat@gmail.com', '2082-SME-2012', '2012', 'yes'),
('3748', 'Munsif Zahoor', 'BE', '8', 'A', 'buchpora srinagar', '9622413008', 'munsifzahoor@yahoo.com', '2083-sme-2012', '2012', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `subject_name` varchar(20) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_name`, `subject_code`, `semester`, `course`) VALUES
('Java ', '123', 7, 'B.E'),
('Compiler Design ', '456', 6, 'B.E'),
('Algorithims ', '506', 5, 'B.E');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendence`
--

DROP TABLE IF EXISTS `teacher_attendence`;
CREATE TABLE `teacher_attendence` (
  `Teacher_Id` int(4) NOT NULL,
  `Total_Attendence` float NOT NULL,
  `Session` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendence`
--

INSERT INTO `teacher_attendence` (`Teacher_Id`, `Total_Attendence`, `Session`) VALUES
(123, 80, '2017'),
(456, 80, '2017'),
(789, 80, '2017');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_profile`
--

DROP TABLE IF EXISTS `teacher_profile`;
CREATE TABLE `teacher_profile` (
  `teacher_name` varchar(30) CHARACTER SET hp8 NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `qualification` varchar(20) CHARACTER SET hp8 NOT NULL,
  `designation` varchar(30) CHARACTER SET hp8 NOT NULL,
  `date_of_joining` varchar(20) NOT NULL,
  `coordinating_course` varchar(10) DEFAULT NULL,
  `coordinating_sem` varchar(10) DEFAULT NULL,
  `coordinating_sec` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_profile`
--

INSERT INTO `teacher_profile` (`teacher_name`, `teacher_id`, `type`, `address`, `contact_no`, `email`, `qualification`, `designation`, `date_of_joining`, `coordinating_course`, `coordinating_sem`, `coordinating_sec`) VALUES
('TEACHER 1', 1, 'coordinator', 'dasdadada', '3131311', 'dada@fsf.co', 'dsasss', 'dadass', '23-10-1993', 'DIPLOMA', '4', 'A'),
('TEACHER 5', 2, 'normal', 'dasdadadad', '313131313', 'dada@fsf.com', 'dsa', 'dada', '23-10-1993', NULL, NULL, NULL),
('TEACHER 2', 3, 'coordinator', 'dasdadadad', '313131313', 'dada@fsf.com', 'dsa', 'dada', '23-10-1993', 'BE', '3', 'A'),
('TEACHER 3', 4, 'normal', 'dasdadadad', '313131313', 'dada@fsf.com', 'dsa', 'dada', '23-10-1993', NULL, NULL, NULL),
('TEACHER 4', 5, 'normal', 'dasdadadad', '313131313', 'dada@fsf.com', 'dsa', 'dada', '23-10-1993', NULL, NULL, NULL),
('TEACHER 6', 6, 'normal', 'dasdadadad', '313131313', 'dada@fsf.com', 'dsa', 'dada', '23-10-1993', NULL, NULL, NULL),
('Majid Ahmad', 7, 'coordinator', 'baspoora soura', '90909909', 'majid@gmail.com', 'mtech', 'proffessor', '10-02-2012', 'BE', '4', 'A'),
('shahid', 9, 'normal', 'rajbajh', '98989898', 'shahid@gmail.com', 'phd', 'proffessor', '20-11-2002', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence_profile`
--
ALTER TABLE `attendence_profile`
  ADD PRIMARY KEY (`Enroll`);

--
-- Indexes for table `hod_credentials`
--
ALTER TABLE `hod_credentials`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `projects_profile`
--
ALTER TABLE `projects_profile`
  ADD PRIMARY KEY (`Project_Id`);

--
-- Indexes for table `student_grevence`
--
ALTER TABLE `student_grevence`
  ADD PRIMARY KEY (`grevience_id`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`enroll`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `teacher_attendence`
--
ALTER TABLE `teacher_attendence`
  ADD PRIMARY KEY (`Teacher_Id`);

--
-- Indexes for table `teacher_profile`
--
ALTER TABLE `teacher_profile`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `Teacher_Id` (`teacher_id`),
  ADD UNIQUE KEY `coordinating_course` (`coordinating_course`,`coordinating_sem`,`coordinating_sec`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_grevence`
--
ALTER TABLE `student_grevence`
  MODIFY `grevience_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teacher_profile`
--
ALTER TABLE `teacher_profile`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
