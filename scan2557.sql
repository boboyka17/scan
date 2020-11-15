-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2020 at 02:21 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scan2557`
--

-- --------------------------------------------------------

--
-- Table structure for table `datescan`
--

CREATE TABLE `datescan` (
  `idday` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datescan`
--

INSERT INTO `datescan` (`idday`, `date`) VALUES
('1', '2020-12-12'),
('1.2', '2020-12-12'),
('2', '2020-12-13'),
('2.2', '2020-12-13'),
('3', '2020-12-14'),
('3.2', '2020-12-14'),
('4', '2020-12-15'),
('4.2', '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `scan2557`
--

CREATE TABLE `scan2557` (
  `count` int(11) NOT NULL,
  `counteducation` int(11) NOT NULL,
  `std_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `pre` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `card_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `age` int(2) NOT NULL,
  `grad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `std_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `groups` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datein` date NOT NULL,
  `dateout` date NOT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `term` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `oldschool` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `oldeducation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `repayment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `degree_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `chdate1` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chdate12` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chdate2` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chdate22` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chdate3` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chdate32` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chdate4` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chdate42` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `savejob` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type123` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `statustext` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scan2557`
--

INSERT INTO `scan2557` (`count`, `counteducation`, `std_id`, `pre`, `name`, `lastname`, `sex`, `card_id`, `birthday`, `age`, `grad`, `major`, `education`, `std_type`, `faculty`, `groups`, `level`, `datein`, `dateout`, `year`, `term`, `degree`, `oldschool`, `oldeducation`, `repayment`, `degree_id`, `chdate1`, `chdate12`, `chdate2`, `chdate22`, `chdate3`, `chdate32`, `chdate4`, `chdate42`, `status`, `savejob`, `type123`, `statustext`) VALUES
(0, 0, '6104305001022', 'นางสาว', 'กนกวรรณ', 'กอบกาญจน์', 'F', '1849901333343', '0000-00-00', 22, '3.99', 'วิทยาการคอมพิวเตอร์', 'วิทยาศาสตร์บัณฑิต (ห', '09', 'วิทยาศาสตร์', '61046.041 วิทยาการคอมพิวเตอร์', 'ปริญญาตรี 4 ปี', '0000-00-00', '0000-00-00', '2560', '1', '9', 'โรงเรียนกาญจนาภิเษกวิทยาลัย สุราษฎร์ธานี', 'มัธยมศึกษาปีที่ 6', 'Y', 'สฎ.010805/2559', '2020-11-11 | 21:15:4', '2020-11-11 | 21:17:5', '2020-11-11 | 21:18:0', '', '', '', '', '', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user2557`
--

CREATE TABLE `user2557` (
  `userid` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user2557`
--

INSERT INTO `user2557` (`userid`, `user`, `pass`, `status`) VALUES
(1, 'admin', 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datescan`
--
ALTER TABLE `datescan`
  ADD PRIMARY KEY (`idday`);

--
-- Indexes for table `scan2557`
--
ALTER TABLE `scan2557`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `user2557`
--
ALTER TABLE `user2557`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user2557`
--
ALTER TABLE `user2557`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
