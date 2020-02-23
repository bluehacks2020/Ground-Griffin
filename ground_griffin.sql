-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 12:56 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ground_griffin`
--

-- --------------------------------------------------------

--
-- Table structure for table `frequency_distribution`
--

CREATE TABLE `frequency_distribution` (
  `id` int(6) NOT NULL,
  `organization_name` varchar(50) NOT NULL,
  `year_data` int(6) NOT NULL,
  `tagalog` int(15) NOT NULL,
  `cebuano` int(15) NOT NULL,
  `ilocano` int(15) NOT NULL,
  `visayan` int(15) NOT NULL,
  `hiligaynon` int(15) NOT NULL,
  `bikol` int(15) NOT NULL,
  `waray` int(15) NOT NULL,
  `chinese` int(15) NOT NULL,
  `others` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frequency_distribution`
--

INSERT INTO `frequency_distribution` (`id`, `organization_name`, `year_data`, `tagalog`, `cebuano`, `ilocano`, `visayan`, `hiligaynon`, `bikol`, `waray`, `chinese`, `others`) VALUES
(1, 'Sunny Services, Inc.', 2020, 114, 51, 39, 15, 15, 9, 6, 21, 30),
(2, 'Sunny Services, Inc.', 2021, 136, 39, 30, 14, 14, 8, 6, 22, 31),
(3, 'Sunny Services, Inc.', 2022, 90, 37, 25, 23, 23, 17, 10, 10, 65),
(4, 'Sunny Services, Inc.', 2023, 105, 45, 40, 20, 20, 19, 7, 27, 17),
(5, 'Sunny Services, Inc.', 2024, 84, 39, 27, 24, 24, 18, 11, 7, 66);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `username` varchar(30) NOT NULL,
  `organization_name` varchar(50) NOT NULL,
  `account_password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`username`, `organization_name`, `account_password`) VALUES
('sunnyservices', 'Sunny Services, Inc.', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `people_impacted`
--

CREATE TABLE `people_impacted` (
  `id` int(6) NOT NULL,
  `organization_name` varchar(50) NOT NULL,
  `year_data` int(6) NOT NULL,
  `impact_count` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people_impacted`
--

INSERT INTO `people_impacted` (`id`, `organization_name`, `year_data`, `impact_count`) VALUES
(1, 'Sunny Services, Inc.', 2020, 22000),
(2, 'Sunny Services, Inc.', 2021, 21000),
(3, 'Sunny Services, Inc.', 2022, 32000),
(4, 'Sunny Services, Inc.', 2023, 24000),
(5, 'Sunny Services, Inc.', 2024, 34000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frequency_distribution`
--
ALTER TABLE `frequency_distribution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orgfreqdist` (`organization_name`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `organization_name` (`organization_name`);

--
-- Indexes for table `people_impacted`
--
ALTER TABLE `people_impacted`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orgimpact` (`organization_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frequency_distribution`
--
ALTER TABLE `frequency_distribution`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `people_impacted`
--
ALTER TABLE `people_impacted`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `frequency_distribution`
--
ALTER TABLE `frequency_distribution`
  ADD CONSTRAINT `fk_orgfreqdist` FOREIGN KEY (`organization_name`) REFERENCES `organizations` (`organization_name`);

--
-- Constraints for table `people_impacted`
--
ALTER TABLE `people_impacted`
  ADD CONSTRAINT `FK_orgimpact` FOREIGN KEY (`organization_name`) REFERENCES `organizations` (`organization_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
