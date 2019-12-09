-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 01:23 AM
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
  `itemName` varchar(50) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `amountWanted` float NOT NULL,
  `pawnOrSell` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinquirytable`
--

INSERT INTO `customerinquirytable` (`inquiryID`, `customerID`, `itemName`, `description`, `amountWanted`, `pawnOrSell`) VALUES
(4, 4, 'Dick Cheney', 'Hunting tips', 1000, 'sell'),
(5, 4, 'President Trump', 'How to disagree with other people without offending them', 750, 'pawn'),
(7, 4, 'Justin Trudeau', 'What to wear to a party', 1857, 'pawn'),
(8, 4, 'Michael Jackson', 'Sing like your hair is on fire', 45, 'sell'),
(9, 4, 'Bill Clinton', 'Faithful until the end ', 23, 'pawn'),
(11, 4, 'Marv Albert', 'A bite to eat', 100, 'sell'),
(13, 4, '2 Live Crew', 'Songs for the Kiddies', 25, 'sell'),
(14, 4, 'Jim Jones', 'OG Kool Aid Man', 750, 'sell'),
(16, 3, 'Safe', '4ft by 2ft and 3ft deep', 250, 'pawn'),
(17, 3, 'Ralph Kramden', 'Trip to the Moon', 45, 'sell'),
(19, 3, 'Mr. Ed', 'Straight from the horses mouth', 55, 'pawn');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `userID` int(11) NOT NULL,
  `hireDate` date NOT NULL,
  `salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`userID`, `hireDate`, `salary`) VALUES
(2, '2015-06-16', 34500),
(13, '2018-10-30', 43500),
(14, '2015-06-25', 35500),
(15, '2019-05-24', 35000),
(16, '2019-05-25', 45500);

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

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryID`, `itemID`, `employeeID`, `dateInserted`, `boughtFor`, `askingPrice`) VALUES
(2, 5, 13, '2019-12-06', 1875, 2675),
(3, 7, 16, '2019-12-05', 25, 37);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemName`, `description`) VALUES
(2, 'Marshall Applewhite', 'How to sell Nike shoes'),
(5, 'steel guitar ', 'once owned by Junior Brown'),
(6, 'Ted Cruz', 'My father the zodiac killer '),
(7, 'Nike', 'Freedom and fair wages (except in our factories)');

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
  `paymentRecieved` float NOT NULL DEFAULT '0',
  `paidOff` tinyint(1) NOT NULL DEFAULT '0',
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pawnitems`
--

INSERT INTO `pawnitems` (`pawnID`, `itemID`, `customerID`, `dateRecieved`, `loanAmount`, `paymentRecieved`, `paidOff`, `employeeID`) VALUES
(1, 2, 4, '2019-12-05', 135, 135, 1, 13),
(2, 6, 4, '2019-12-07', 135, 0, 0, 13);

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
(2, 'Kelly', 'Gates', 'KellyGates', 'kgater@me.org', '402-456-6789', 'KellyGates', 10),
(3, 'Scott', 'Gates', 'ScottJonGates', NULL, NULL, 'ScottJonGates', 30),
(4, 'Scott', 'Gates', 'ScottGates', NULL, NULL, 'ScottGates', 30),
(13, 'Peter', 'Gates', 'PeterGates', 'sgates699@windstream.net', '402-217-3885', 'PeterGates', 20),
(14, 'Bob', 'Smith', 'ScottGatesScottGates', 'bob@bob.bob', '402-456-6789', 'ScottGatesScottGates', 20),
(15, 'Caitlyn', 'Gates', 'CaitlynGates', 'sgates699@windstream.net', '402-217-3885', 'CaitlynGates', 20),
(16, 'Tommie', 'Gunn', 'TommieGunn', 'sgates699@windstream.net', '402-217-3885', 'TommieGunn', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerinquirytable`
--
ALTER TABLE `customerinquirytable`
  ADD PRIMARY KEY (`inquiryID`);

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
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerinquirytable`
--
ALTER TABLE `customerinquirytable`
  MODIFY `inquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pawnitems`
--
ALTER TABLE `pawnitems`
  MODIFY `pawnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solditems`
--
ALTER TABLE `solditems`
  MODIFY `soldID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
