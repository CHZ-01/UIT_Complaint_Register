-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2024 at 03:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uit complaint register`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(10) NOT NULL,
  `adname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `adid` varchar(20) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `adname`, `lname`, `adid`, `pass`, `phno`, `gender`) VALUES
(1, 'vaisakh', 'nirupam', '12345678910', '$2y$10$Vo/KsvXuzRuNGDbqT.sXcuv6EO1mUuE7sUwyL7C.YIqLaeD6kutLq', '9497588666', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `admin_pending`
--

CREATE TABLE `admin_pending` (
  `sno` int(10) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `cmp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_pending`
--

INSERT INTO `admin_pending` (`sno`, `sid`, `sub`, `cmp`) VALUES
(11, '33221965004', 'Wi-Fi issues', 'Campus Wi-Fi isn\'t strong enough to handle all the systems in the lab, it could become a problem during lab exams.'),
(12, '33221965007', 'complaint regarding a teacher', 'I am having trouble understanding the math teacher lessons, she isn\'t fit for it.'),
(14, '33221965007', 'complaint regarding a teacher', 'I am having trouble understanding her math classes, I think she isn\'t a fit for it.'),
(16, '33221965001', 'Complaint regarding a teacher.', 'I cannot understand the math classes I think she isn\'t a fit for it.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_recieved`
--

CREATE TABLE `admin_recieved` (
  `sno` int(10) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `sol` varchar(300) NOT NULL,
  `pid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_recieved`
--

INSERT INTO `admin_recieved` (`sno`, `sid`, `sub`, `tid`, `sol`, `pid`) VALUES
(1, '33221965003', 'Attendance problem', '86348254321', 'Sorry for the inconvenience, I will fix it soon. ', '35376237271'),
(2, '33221965002', 'Missing phone', '86348254321', 'Yes, Ayyapan I have found it on another drawer.', '35376237271');

-- --------------------------------------------------------

--
-- Table structure for table `admin_send`
--

CREATE TABLE `admin_send` (
  `sno` int(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `cmp` varchar(300) NOT NULL,
  `send` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_send`
--

INSERT INTO `admin_send` (`sno`, `sname`, `sid`, `sub`, `cmp`, `send`) VALUES
(1, 'abhijith', '33221965001', 'Internal mark issue', 'My internal mark is not updated in the latest list, it is still showing the old result.', 'bcom'),
(2, 'Ayyapan', '33221965002', 'Missing phone', 'I have kept my phone on the office yesterday during exam but now its missing.', 'bca'),
(3, 'devadethan', '33221965003', 'Attendance problem', 'I have an attendance of 85%, but I am only given 80%. I need it updated.', 'bca');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `sno` int(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`sno`, `pname`, `lname`, `pid`, `pass`, `phno`, `gender`) VALUES
(1, 'swapna', 'jamal', '35376237271', '$2y$10$vZsv12s15my5MNHqWkZryONOSKBSI.KGDlV1hnh2F9NA9xjkW0CIS', '', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `principal_approved`
--

CREATE TABLE `principal_approved` (
  `sno` int(10) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `sol` varchar(300) NOT NULL,
  `pid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal_approved`
--

INSERT INTO `principal_approved` (`sno`, `sid`, `sub`, `tid`, `sol`, `pid`) VALUES
(1, '33221965003', 'Attendance problem', '86348254321', 'Sorry for the inconvenience, I will fix it soon. ', '35376237271'),
(2, '33221965002', 'Missing phone', '86348254321', 'Yes, Ayyapan I have found it on another drawer.', '35376237271');

-- --------------------------------------------------------

--
-- Table structure for table `principal_dlt`
--

CREATE TABLE `principal_dlt` (
  `sno` int(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal_dlt`
--

INSERT INTO `principal_dlt` (`sno`, `pname`, `lname`, `pid`, `gender`) VALUES
(1, 'karthik', 'kc', '35376237272', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `principal_pending_s`
--

CREATE TABLE `principal_pending_s` (
  `sno` int(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `cmp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `principal_pending_t`
--

CREATE TABLE `principal_pending_t` (
  `sno` int(10) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `cmp` varchar(300) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `sol` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal_pending_t`
--

INSERT INTO `principal_pending_t` (`sno`, `sid`, `sub`, `cmp`, `tid`, `sol`) VALUES
(6, '33221965001', 'Internal mark issue', 'My internal mark is not updated in the latest list, it is still showing the old result.', '86348254322', 'don\'t know! don\'t care!');

-- --------------------------------------------------------

--
-- Table structure for table `principal_rejected`
--

CREATE TABLE `principal_rejected` (
  `sno` int(10) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `sol` varchar(300) NOT NULL,
  `pid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `principal_sol`
--

CREATE TABLE `principal_sol` (
  `sno` int(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `sol` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sno` int(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sno`, `sname`, `lname`, `sid`, `pass`, `phno`, `gender`, `course`) VALUES
(1, 'abhijith', 'm', '33221965001', '$2y$10$MZl1Iyd8XsnqxkbEkvvv3.eapugrUmPbo.MxREy6b/8eKI8Tv7Xwm', '9048019873', 'male', 'bca'),
(2, 'Ayyapan', 'A', '33221965002', '$2y$10$wh3nZKEEts45tX4xCF5mzuC.94q.RE8uIPbSv79XRDMjWK6lGvqC2', '9567833906', 'male', 'bca'),
(3, 'devadethan', 'nair', '33221965003', '$2y$10$egmIowhzupw.In/pCD1Cn.V.DLv6zUaElDNXteEnC7HDCU0IpdrUq', '9061247650', 'male', 'bca'),
(4, 'jithu', 'krishnan', '33221965004', '$2y$10$nnRDwIFns.2eTvGd.MNb7elTxL6HnB10qwNDq8GhbJadyilwhc8ja', '9778784316', 'male', 'bca'),
(5, 'kashi', 'h', '33221965005', '$2y$10$ABIvLASOh8ta9f0d.n1eGOMMff3xWwxnDz7thNfuv2g.Q3egs0okK', '8136946279', 'male', 'bca'),
(6, 'shifan', 'muhammed', '33221965006', '$2y$10$2TWftFNVkFY9JUT0F5aM2.IhHvHs.8kmxfTzNNbjB4dj4hjsDtyZC', '8592950493', 'male', 'bca'),
(7, 'vaisakh', 'nirupam', '33221965007', '$2y$10$DGHLWQrx/5ABZ2lZe12Twutb46XHR8hnOeBaBZf8KkWTZ07CJpnka', '9497588666', 'male', 'bca');

-- --------------------------------------------------------

--
-- Table structure for table `student_complaint`
--

CREATE TABLE `student_complaint` (
  `sno` int(10) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `cmp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_complaint`
--

INSERT INTO `student_complaint` (`sno`, `sid`, `sname`, `sub`, `cmp`) VALUES
(8, '33221965001', 'abhijith', 'Internal mark issue', 'My internal mark is not updated in the latest list, it is still showing the old result.'),
(9, '33221965002', 'Ayyapan', 'Missing phone', 'I have kept my phone on the office yesterday during exam but now its missing.'),
(10, '33221965003', 'devadethan', 'Attendance problem', 'I have an attendance of 85%, but I am only given 80%. I need it updated.'),
(11, '33221965004', 'jithu', 'Wi-Fi issues', 'Campus Wi-Fi isn\'t strong enough to handle all the systems in the lab, it could become a problem during lab exams.'),
(14, '33221965007', 'vaisakh', 'complaint regarding a teacher', 'I am having trouble understanding her math classes, I think she isn\'t a fit for it.'),
(16, '33221965001', 'abhijith', 'Complaint regarding a teacher.', 'I cannot understand the math classes I think she isn\'t a fit for it.');

-- --------------------------------------------------------

--
-- Table structure for table `student_dlt`
--

CREATE TABLE `student_dlt` (
  `sno` int(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_dlt`
--

INSERT INTO `student_dlt` (`sno`, `sname`, `lname`, `sid`, `gender`, `course`) VALUES
(1, 'akhil', 'js', '33221965008', 'male', 'bca');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `sno` int(10) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`sno`, `tname`, `lname`, `tid`, `pass`, `phno`, `gender`, `course`) VALUES
(1, 'sini', 'mohan', '86348254320', '$2y$10$3Q03i8va41gcU/yYGZF4TOL05/POUIbv0T2Jy.jZIC/hqqoFIZlgy', '', 'female', 'bca'),
(2, 'athira', 'nair', '86348254321', '$2y$10$Sjoo7Q41rVLxvIZATKLdyenSILBazO0.ewPHygBXvFl5tQLbUa0M6', '', 'female', 'bca'),
(4, 'larry', 'james', '86348254322', '$2y$10$I6nWC0.no0gba00DGLwBa.vEWd1wVoSMaR1O/VRoDOJB.atjRDx.q', '', 'male', 'bcom');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_dlt`
--

CREATE TABLE `teacher_dlt` (
  `sno` int(10) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_dlt`
--

INSERT INTO `teacher_dlt` (`sno`, `tname`, `lname`, `tid`, `gender`, `course`) VALUES
(1, 'harry', 'james', '86348254322', 'male', 'bcom');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_sol`
--

CREATE TABLE `teacher_sol` (
  `sno` int(10) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `sub` varchar(300) NOT NULL,
  `sol` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_sol`
--

INSERT INTO `teacher_sol` (`sno`, `sid`, `sname`, `tid`, `tname`, `sub`, `sol`) VALUES
(5, '33221965002', '', '86348254321', '', 'Missing phone', 'Yes, Ayyapan I have found it on another drawer.'),
(6, '33221965001', '', '86348254322', '', 'Internal mark issue', 'don\'t know! don\'t care!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `adid` (`adid`);

--
-- Indexes for table `admin_pending`
--
ALTER TABLE `admin_pending`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `admin_recieved`
--
ALTER TABLE `admin_recieved`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `admin_send`
--
ALTER TABLE `admin_send`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `principal_approved`
--
ALTER TABLE `principal_approved`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `principal_dlt`
--
ALTER TABLE `principal_dlt`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `principal_pending_s`
--
ALTER TABLE `principal_pending_s`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `principal_pending_t`
--
ALTER TABLE `principal_pending_t`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `principal_rejected`
--
ALTER TABLE `principal_rejected`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `principal_sol`
--
ALTER TABLE `principal_sol`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `student_complaint`
--
ALTER TABLE `student_complaint`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `student_dlt`
--
ALTER TABLE `student_dlt`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `tid` (`tid`);

--
-- Indexes for table `teacher_dlt`
--
ALTER TABLE `teacher_dlt`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `tid` (`tid`);

--
-- Indexes for table `teacher_sol`
--
ALTER TABLE `teacher_sol`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_pending`
--
ALTER TABLE `admin_pending`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_recieved`
--
ALTER TABLE `admin_recieved`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_send`
--
ALTER TABLE `admin_send`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `principal_approved`
--
ALTER TABLE `principal_approved`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `principal_dlt`
--
ALTER TABLE `principal_dlt`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `principal_pending_s`
--
ALTER TABLE `principal_pending_s`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `principal_pending_t`
--
ALTER TABLE `principal_pending_t`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `principal_rejected`
--
ALTER TABLE `principal_rejected`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `principal_sol`
--
ALTER TABLE `principal_sol`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_complaint`
--
ALTER TABLE `student_complaint`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_dlt`
--
ALTER TABLE `student_dlt`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_dlt`
--
ALTER TABLE `teacher_dlt`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_sol`
--
ALTER TABLE `teacher_sol`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
