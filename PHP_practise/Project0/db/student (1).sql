-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 12:59 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam_date`, `academic_year`, `major`, `year`, `semester`, `subject_id`, `exam_type`, `exam_title`, `mark`, `percentage`) VALUES
(7, '', '2018', 'it', 'first', 'fsemester', 1, 'tuto', 'Tuto1', 100, 20),
(9, '', '2018', 'civil', 'first', 'fsemester', 1, 'practical', 'P1', 100, 30),
(10, '', '2018', 'civil', 'first', 'fsemester', 1, 'practical', 'P1', 100, 30),
(11, '', '2018', 'it', 'first', 'fsemester', 1, 'tuto', 't0', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_mark` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `practical`
--

CREATE TABLE `practical` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `mark` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `roll_no`, `major`, `year`, `status`, `academic_year`) VALUES
(1, 'Yuzana', 'roll-1', 'Computer Science', 'final year', 'Yes', ''),
(2, 'khaine', 'roll-2', 'CT', 'Third Year', 'fresher', ''),
(3, 'khaing', 'roll-2', 'IT', 'first', 'fresher', ''),
(4, 'admin', 'roll-2', 'CT', 'first', 'fresher', ''),
(5, 'khaine', '11', 'IT', 'final', 'fresher', ''),
(6, 'Sandar', 'it-112', 'IT', 'second', 'Fresher', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `major` varchar(255) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `major`, `sub_code`, `sub_name`, `academic_year`, `year`, `semester`, `teacher_id`) VALUES
(1, 'it', 'IT001', 'Java', '2018', 'first', 'fsemester', 1),
(4, 'it', 'IT002', 'OS', '2018', 'first', 'fsemester', 4),
(5, '', 'IT002', 'OS', '', 'first', 'fsemester', 4),
(6, '', 'IT003', 'Security', '', 'first', 'ssemester', 4),
(7, '', 'IT003', 'Security', '', 'first', 'ssemester', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `NRC` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `NRC`, `mobile_phone`, `address`, `major`) VALUES
(1, 'admin', '09987', '09799591600', 'mdy', 'it'),
(2, 'admin', '09987', '09799591600', 'mdy', 'it'),
(3, 'Khin Than', '099988', '09799591600', 'mdy', 'civil'),
(4, 'Khaing swe', '09554332', '09799591600', 'mdy', 'ssemester');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `mark` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `exam_id`, `student_id`, `mark`) VALUES
(1, 7, '5', 30),
(2, 11, '5', 50),
(3, 7, '6', 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `teacher_id`, `name`, `email`, `password`, `role`) VALUES
(1, 0, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin@gmail.com', 'dfea575fa55e08c9a0466cc9d00cea092e1761d2f9dc191b094d349cdbda0037', 'admin'),
(2, 0, '906a0eb7a452d7d3ef47d9e46c0cec48d45e8d5bcfb8aff0bb147094a2c954f2', 'kkk@gmail.com', '330ab5315ad8cdb57233fd00720fc1cb3009b87eec7745d8b31b3e513239a910', 'admin'),
(3, 0, '85e0583627357e85a5f1152c8fc46366f67206c8c4f6f962088d174abea651ba', 'khin@gmail.com', 'e82d0ce673b1b46efcf7f3e37ca42c83d971743d76ec0e72d312a5ec9d8b4d1c', 'lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practical`
--
ALTER TABLE `practical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `practical`
--
ALTER TABLE `practical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
