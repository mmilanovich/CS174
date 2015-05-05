-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2015 at 09:06 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
DROP DATABASE IF EXISTS `MentorWeb`;
CREATE DATABASE `MentorWeb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `MentorWeb`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mentorweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
`id` int(11) NOT NULL,
  `interest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_mentee`
--

CREATE TABLE IF NOT EXISTS `mentor_mentee` (
  `mentor_user_id` char(20) NOT NULL,
  `mentee_user_id` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(45) DEFAULT NULL,
  `firstName` char(45) DEFAULT NULL,
  `lastName` char(45) DEFAULT NULL,
  `mentor` tinyint(1) DEFAULT NULL,
  `mentee` tinyint(1) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `lookingForMatch` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `senderID` CHAR(20) NULL,
  `recipientID` CHAR(20) NULL,
  `messageBody` VARCHAR(1000) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `reviewerID` CHAR(20) NULL,
  `revieweeID` CHAR(20) NULL,
  `stars` int(3) NULL,
  `messageBody` VARCHAR(1000) NULL,
  PRIMARY KEY (reviewerID, revieweeID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE IF NOT EXISTS `user_interests` (
  `user_id` char(20) NOT NULL,
  `interest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor_mentee`
--
ALTER TABLE `mentor_mentee`
 ADD PRIMARY KEY (`mentor_user_id`,`mentee_user_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
 ADD PRIMARY KEY (`user_id`,`interest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
