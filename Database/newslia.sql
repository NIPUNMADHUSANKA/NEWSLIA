-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 02:59 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newslia`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Email` varchar(255) NOT NULL,
  `System_Actor_ID` char(10) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Deactivate` tinyint(1) NOT NULL,
  `Blacklist` tinyint(1) NOT NULL,
  `Staff_State` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email`, `System_Actor_ID`, `Password`, `Deactivate`, `Blacklist`, `Staff_State`) VALUES
('nipunmadhusanka201085@gmail.com', 'NL-M-00001', 'nipun1250', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `moderate_area`
--

CREATE TABLE `moderate_area` (
  `System_Actor_Id` char(10) NOT NULL,
  `Area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE `news_type` (
  `System_Actor_Id` char(10) NOT NULL,
  `Political` tinyint(1) NOT NULL,
  `Crime` tinyint(1) NOT NULL,
  `Inves` tinyint(1) NOT NULL,
  `Art` tinyint(1) NOT NULL,
  `Eduation` tinyint(1) NOT NULL,
  `Sport` tinyint(1) NOT NULL,
  `Entertainment` tinyint(1) NOT NULL,
  `Environment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `System_Actor_Id` char(10) NOT NULL,
  `News` tinyint(1) NOT NULL,
  `Article` tinyint(1) NOT NULL,
  `Notice` tinyint(1) NOT NULL,
  `Job_Vacancies` tinyint(1) NOT NULL,
  `Com_Ads` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `read_area`
--

CREATE TABLE `read_area` (
  `System_Actor_Id` char(10) NOT NULL,
  `Area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_area`
--

CREATE TABLE `report_area` (
  `System_Actor_Id` char(10) NOT NULL,
  `Area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_actor`
--

CREATE TABLE `system_actor` (
  `System_Actor_Id` char(10) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Mobile` char(10) NOT NULL,
  `DSA` varchar(255) NOT NULL,
  `Position` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_actor`
--

INSERT INTO `system_actor` (`System_Actor_Id`, `FirstName`, `LastName`, `UserName`, `NIC`, `Mobile`, `DSA`, `Position`) VALUES
('NL-M-00001', 'Nipun', 'Madhusanka', 'NIPUNM', '199934310393', '0784383142', 'Minuwangoda', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `System_Actor_ID` (`System_Actor_ID`);

--
-- Indexes for table `moderate_area`
--
ALTER TABLE `moderate_area`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `read_area`
--
ALTER TABLE `read_area`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `report_area`
--
ALTER TABLE `report_area`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `system_actor`
--
ALTER TABLE `system_actor`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`System_Actor_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderate_area`
--
ALTER TABLE `moderate_area`
  ADD CONSTRAINT `moderate_area_ibfk_1` FOREIGN KEY (`System_Actor_Id`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
