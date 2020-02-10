-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 08:59 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `name`, `email`, `pass`) VALUES
(1, 'Nafis Chonchol', 'nafisislam161@gmail.com', 'db507c5fd0acd62973eee68c902ec342');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) DEFAULT 0,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(37, 8, 0, 'Tangail'),
(38, 8, 1, 'Dhaka'),
(39, 8, 0, 'Khulna'),
(40, 8, 0, 'Rangpur'),
(41, 6, 1, 'Shakib'),
(42, 6, 0, 'Tamim'),
(43, 6, 0, 'Musi'),
(44, 6, 0, 'Mas'),
(45, 1, 1, 'Sekh Hasina'),
(46, 1, 0, 'Kader'),
(47, 1, 0, 'Khaleda Jia'),
(48, 1, 0, 'None'),
(49, 2, 0, 'International Contest College'),
(50, 2, 0, 'Internation colleigate College'),
(51, 2, 1, 'International Cricket Council'),
(52, 2, 0, 'Internation College of Council'),
(53, 3, 0, 'Hasan Mahmud'),
(54, 3, 0, 'Hafis Khan'),
(55, 3, 1, 'Ruman Mondol'),
(56, 3, 0, 'Emon Chowdori'),
(57, 9, 0, 'Hasan Mahmud'),
(58, 9, 0, 'Hafis Khan'),
(59, 9, 1, 'Ruman Mondol'),
(60, 9, 0, 'Emon Chowdori'),
(65, 10, 0, 'Green '),
(66, 10, 1, 'Blue'),
(67, 10, 0, 'White'),
(68, 10, 0, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(14, 8, 'What is the capital of Bangladesh?'),
(15, 6, 'Captin name of Bangladesh Cricket Team'),
(16, 1, 'Prime Minister of Bangladesh-'),
(17, 2, 'Full name of ICC'),
(18, 3, 'The name of Musi Friend'),
(21, 9, 'The name of Musi Friend'),
(22, 10, 'What is favorite color of Nafis');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `username`, `email`, `pass`, `status`) VALUES
(3, 'Chonchol Miah', 'nafischonchol', 'chonchol@gmail.com', '123456', 0),
(4, 'nasir', 'nagsd', 'wweewe@n.com', '123456', 0),
(5, 'Nafis Chonchol', 'nafischonchol', 'nafisislam161@gmail.com', '123456', 0),
(6, 'Habib Khan', 'habi', 'habi@outlook.com', '123456', 0),
(7, 'Ruman Mndol', 'ruman', 'ruman@gmail.com', '123456', 0),
(8, 'habi Mndol', 'ruman', 'habi@gmail.com', '123456', 0),
(9, 'Hossain', 'admin', 'ho@gmai.com', '123456', 0),
(12, 'Chonchol Miah', 'miah219', 'nafis@outlook.com', '12213', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quesNo` (`quesNo`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
