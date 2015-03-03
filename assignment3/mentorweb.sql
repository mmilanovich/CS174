-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2015 at 05:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `interest`) VALUES
(100, 'Drawing'),
(101, 'Computing'),
(102, 'Directing');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_mentee`
--

CREATE TABLE IF NOT EXISTS `mentor_mentee` (
  `mentor_user_id` int(11) NOT NULL,
  `mentee_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_mentee`
--

INSERT INTO `mentor_mentee` (`mentor_user_id`, `mentee_user_id`) VALUES
(1, 2),
(1, 6),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `username` char(20) NOT NULL,
  `password` char(45) DEFAULT NULL,
  `firstName` char(45) DEFAULT NULL,
  `lastName` char(45) DEFAULT NULL,
  `mentor` tinyint(1) DEFAULT NULL,
  `mentee` tinyint(1) DEFAULT NULL,
  `lookingForMatch` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`username`, `password`, `firstName`, `lastName`, `mentor`, `mentee`, `lookingForMatch`) VALUES
('boyce', 'avenue', 'Mark', 'Sohat', 3, 0, 1),
('jessica', 'hachi', 'Jessica', 'unknown', 0, 4, 1),
('keyboard', 'keren', 'Luke', 'bahagia', 0, 5, 0),
('randomize', 'yagitukeles', 'John', 'jakartabanget', 0, 6, 1),
('romans', 'sesame', 'Romans', 'sutradja', 0, 2, 1),
('timothy', 'bohongsih', 'Timothy', 'Gajelas', 7, 0, 0),
('williyanson', 'password', 'Matthew', 'Williyanson', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE IF NOT EXISTS `user_interests` (
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`user_id`, `interest_id`) VALUES
(1, 101),
(1, 102),
(2, 102),
(3, 101),
(4, 100),
(5, 100),
(6, 100),
(7, 100);

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
 ADD PRIMARY KEY (`username`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
