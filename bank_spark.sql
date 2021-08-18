-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2021 at 08:22 AM
-- Server version: 5.7.24
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
-- Database: `bank_spark`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TID` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `S_NAME` varchar(50) NOT NULL,
  `R_ID` int(11) NOT NULL,
  `R_NAME` varchar(50) NOT NULL,
  `AMOUNT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TID`, `S_ID`, `S_NAME`, `R_ID`, `R_NAME`, `AMOUNT`) VALUES
(101, 8, 'Rohit Sharma', 4, 'Pawan', '500'),
(102, 1, 'Tushar', 3, 'Gagan', '500'),
(103, 8, 'Rohit Sharma', 5, 'Aniket', '3000'),
(104, 7, 'Sachin', 2, 'Abhishek', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `BALANCE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `NAME`, `EMAIL`, `BALANCE`) VALUES
(1, 'Tushar', 'Tushar@gmail.com', '24500'),
(2, 'Abhishek', 'Abhi@gmail.com', '16500'),
(3, 'Gagan', 'gagan@gmail.com', '11000'),
(4, 'Pawan', 'Pawan@gmail.com', '8000'),
(5, 'Aniket', 'Aniket@gmail.com', '8000'),
(6, 'Gautam', 'Gautami@gmail.com', '9000'),
(7, 'Sachin', 'Sachin100@gmail.com', '8500'),
(8, 'Rohit Sharma', 'Sharma200@gmail.com', '12000'),
(9, 'Alexander', 'Alex@gmail.com', '12000'),
(10, 'Baron', 'Baronet@gmail.com', '25000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
