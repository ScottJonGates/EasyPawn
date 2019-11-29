-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 04:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easypawn`
--
CREATE DATABASE IF NOT EXISTS `easypawn` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `easypawn`;

-- --------------------------------------------------------

--
-- Table structure for table `customerinquirytable`
--

CREATE TABLE `customerinquirytable` (
  `inquiryID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
`itemName` int(50) NOT NULL,
`description` varchar(250) DEFAULT NULL,
  `askingFor` float NOT NULL,
  `pawnOrSell` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `userID` int(11) NOT NULL,
  `hireDate` date NOT NULL,
  `salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `dateInserted` date NOT NULL,
  `boughtFor` float NOT NULL,
  `askingPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pawnitems`
--

CREATE TABLE `pawnitems` (
  `pawnID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `dateRecieved` date NOT NULL,
  `loanAmount` float NOT NULL,
  `paymentRecieved` float NOT NULL,
  `paidOff` tinyint(1) NOT NULL,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solditems`
--

CREATE TABLE `solditems` (
  `soldID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `soldFor` float NOT NULL,
  `profit` float NOT NULL,
  `dateSold` date NOT NULL,
  `daysInInventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(14) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(2) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fName`, `lName`, `username`, `email`, `phoneNumber`, `password`, `admin`) VALUES
(1, 'Scott', 'Gates', 'Scott Jon Gates', NULL, NULL, 'Scott Jon Gates', 30),
(2, 'Kelly', 'Gates', 'KGater4545', NULL, NULL, '45TYghbn1!', 30),
(3, 'Scott', 'Gates', 'ScottJonGates', NULL, NULL, 'ScottJonGates', 30),
(4, 'Scott', 'Gates', 'ScottGates', NULL, NULL, 'ScottGates', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `pawnitems`
--
ALTER TABLE `pawnitems`
  ADD PRIMARY KEY (`pawnID`);

--
-- Indexes for table `solditems`
--
ALTER TABLE `solditems`
  ADD PRIMARY KEY (`soldID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pawnitems`
--
ALTER TABLE `pawnitems`
  MODIFY `pawnID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solditems`
--
ALTER TABLE `solditems`
  MODIFY `soldID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
