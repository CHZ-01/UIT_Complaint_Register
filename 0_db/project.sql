-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 10:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
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
(1, '34567281901', 'first complaint', '86348254321', 'first solution ', '35376237271');

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
(1, 'retro', '34567281901', 'first complaint', 'first complaint', 'bca');

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
(1, 'dour', 'ghost', '35376237271', '$2y$10$VGGGC7IO1KStVLmxUMkApeod4H65ZURhOR/ZunQ2XYpKWJN1v8uBS', '', 'male');

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
(1, '34567281901', 'first complaint', '86348254321', 'first solution ', '35376237271');

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
(1, 'retro', 'dark', '34567281901', '$2y$10$GZu1/hneYQHpnVGorunSxuN0n0DS4dhJ6St3mY9iafD7QBZeJ.Oe6', '', 'male', 'bca');

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
(1, '34567281901', 'retro', 'first complaint', 'first complaint');

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
(1, 'chekutan', 'chz', '86348254321', '$2y$10$xm4ANDm.k73ORqW4vHWtcehtwzJ4FzuYcUu3OjbGr6/efgXZZIFV6', '', 'male', 'bca');

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
(1, '34567281901', '', '86348254321', '', 'first complaint', 'first solution ');

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
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_recieved`
--
ALTER TABLE `admin_recieved`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_send`
--
ALTER TABLE `admin_send`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `principal_approved`
--
ALTER TABLE `principal_approved`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `principal_dlt`
--
ALTER TABLE `principal_dlt`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `principal_pending_s`
--
ALTER TABLE `principal_pending_s`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `principal_pending_t`
--
ALTER TABLE `principal_pending_t`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_complaint`
--
ALTER TABLE `student_complaint`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_dlt`
--
ALTER TABLE `student_dlt`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_dlt`
--
ALTER TABLE `teacher_dlt`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_sol`
--
ALTER TABLE `teacher_sol`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
