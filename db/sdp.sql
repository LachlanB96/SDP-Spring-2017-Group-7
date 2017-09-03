-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2017 at 03:17 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `journalEntries`
--

DROP TABLE IF EXISTS `journalEntries`;
CREATE TABLE IF NOT EXISTS `journalEntries` (
  `title` varchar(255) NOT NULL,
  `journal` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `contents` varchar(255) NOT NULL,
  `dateCreated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journalEntries`
--

INSERT INTO `journalEntries` (`title`, `journal`, `creator`, `contents`, `dateCreated`) VALUES
('test entry', 'test1', 'default', 'Hey this is a sample journal entry!', '01/09/17'),
('test entry 2', 'test1', 'default', 'Hey this is a sample journal entry NUMBER TWO!', '01/09/17'),
('test not ours', 'fake', 'trump', 'This is a lost journal page!', '1/1/11'),
('default', 'test1', 'default', 'sdsddsfdf', '1/1/12'),
('defaultaaa', 'test1', 'default', 'sdsddsfdfgdggd', '1/1/12');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

DROP TABLE IF EXISTS `journals`;
CREATE TABLE IF NOT EXISTS `journals` (
  `title` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `creationDate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`title`, `creator`, `creationDate`, `status`) VALUES
('test1', 'default', '7/5/2221', 'active'),
('test1', 'default1', '7/5/2221', 'active'),
('test2', 'default', '7/5/2221', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('default', 'abc'),
('default0.92853900 1504412310', 'abc'),
('default1', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`title`,`creator`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
