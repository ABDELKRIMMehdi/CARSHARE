-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2021 at 07:42 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsharedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `notifId` int(11) NOT NULL AUTO_INCREMENT,
  `subject` int(11) NOT NULL,
  `content` text NOT NULL,
  `Type` enum('Bann','CanceledRide','Join','CanceledParticipation','mail') NOT NULL,
  `source` int(11) DEFAULT NULL,
  `date` varchar(10) NOT NULL,
  `ReadouNot` enum('yes','no') NOT NULL,
  PRIMARY KEY (`notifId`),
  KEY `source` (`source`),
  KEY `subject` (`subject`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `rideId` int(11) NOT NULL,
  `participantId` int(11) NOT NULL,
  `nbPlaces` int(11) NOT NULL DEFAULT '1',
  KEY `participantId` (`participantId`) USING BTREE,
  KEY `rideId` (`rideId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

DROP TABLE IF EXISTS `rides`;
CREATE TABLE IF NOT EXISTS `rides` (
  `rideId` int(11) NOT NULL AUTO_INCREMENT,
  `startingPoint` varchar(150) NOT NULL,
  `arrival` varchar(150) NOT NULL,
  `hour` varchar(150) NOT NULL,
  `journeyDate` varchar(15) NOT NULL,
  `seats` int(3) NOT NULL,
  `model` varchar(100) NOT NULL,
  `tripBio` text,
  `music` enum('yes','no') NOT NULL,
  `animals` enum('yes','no') NOT NULL,
  `smoking` enum('yes','no') NOT NULL,
  `luggage` enum('yes','no') NOT NULL,
  `price` int(11) NOT NULL,
  `driver` int(11) NOT NULL,
  `numLeft` int(11) NOT NULL,
  PRIMARY KEY (`rideId`),
  KEY `rides_ibfk_1` (`driver`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(15) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `birthday` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `tel` varchar(17) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `inscdate` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailUnique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `birthday`, `gender`, `tel`, `email`, `password`, `inscdate`) VALUES
(1, 'ADMIN', 'ADMIN', '2007-12-12', 'Male', '', 'ADMIN@gmail.com', '$2y$10$RMd5iaqzusN/PR.4sk2ZhuhfLaRo55p4GmDjI/yS7TAXbCZh7TjVu', '2021-07-13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk` FOREIGN KEY (`source`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`subject`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`rideId`) REFERENCES `rides` (`rideId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`participantId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_ibfk_1` FOREIGN KEY (`driver`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
