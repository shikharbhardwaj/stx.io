-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2014 at 06:20 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `teamno` int(2) NOT NULL,
  `qno` int(2) NOT NULL,
  `accuracy` float NOT NULL,
  `attempts` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`teamno`, `qno`, `accuracy`, `attempts`) VALUES
(0, 1, 0, 0),
(1, 1, 0, 0),
(1, 2, 0, 0),
(1, 3, 0, 0),
(1, 4, 0, 0),
(1, 5, 0, 0),
(1, 6, 0, 0),
(1, 7, 0, 0),
(1, 8, 0, 0),
(1, 9, 0, 0),
(1, 10, 0, 0),
(2, 1, 0, 0),
(2, 2, 0, 0),
(2, 3, 0, 0),
(2, 4, 0, 0),
(2, 5, 0, 0),
(2, 6, 0, 0),
(2, 7, 0, 0),
(2, 8, 0, 0),
(2, 9, 0, 0),
(2, 10, 0, 0),
(3, 1, 0, 0),
(3, 2, 0, 0),
(3, 3, 0, 0),
(3, 4, 0, 0),
(3, 5, 0, 0),
(3, 6, 0, 0),
(3, 7, 0, 0),
(3, 8, 0, 0),
(3, 9, 0, 0),
(3, 10, 0, 0),
(4, 1, 0, 0),
(4, 2, 0, 0),
(4, 3, 0, 0),
(4, 4, 0, 0),
(4, 5, 0, 0),
(4, 6, 0, 0),
(4, 7, 0, 0),
(4, 8, 0, 0),
(4, 9, 0, 0),
(4, 10, 0, 0),
(5, 1, 0, 0),
(5, 2, 0, 0),
(5, 3, 0, 0),
(5, 4, 0, 0),
(5, 5, 0, 0),
(5, 6, 0, 0),
(5, 7, 0, 0),
(5, 8, 0, 0),
(5, 9, 0, 0),
(5, 10, 0, 0),
(6, 1, 0, 0),
(6, 2, 0, 0),
(6, 3, 0, 0),
(6, 4, 0, 0),
(6, 5, 0, 0),
(6, 6, 0, 0),
(6, 7, 0, 0),
(6, 8, 0, 0),
(6, 9, 0, 0),
(6, 10, 0, 0),
(7, 1, 0, 0),
(7, 2, 0, 0),
(7, 3, 0, 0),
(7, 4, 0, 0),
(7, 5, 0, 0),
(7, 6, 0, 0),
(7, 7, 0, 0),
(7, 8, 0, 0),
(7, 9, 0, 0),
(7, 10, 0, 0),
(8, 1, 0, 0),
(8, 2, 0, 0),
(8, 3, 0, 0),
(8, 4, 0, 0),
(8, 5, 0, 0),
(8, 6, 0, 0),
(8, 7, 0, 0),
(8, 8, 0, 0),
(8, 9, 0, 0),
(8, 10, 0, 0),
(9, 1, 0, 0),
(9, 2, 0, 0),
(9, 3, 0, 0),
(9, 4, 0, 0),
(9, 5, 0, 0),
(9, 6, 0, 0),
(9, 7, 0, 0),
(9, 8, 0, 0),
(9, 9, 0, 0),
(9, 10, 0, 0),
(10, 1, 0, 0),
(10, 2, 0, 0),
(10, 3, 0, 0),
(10, 4, 0, 0),
(10, 5, 0, 0),
(10, 6, 0, 0),
(10, 7, 0, 0),
(10, 8, 0, 0),
(10, 9, 0, 0),
(10, 10, 0, 0),
(11, 1, 0, 0),
(11, 2, 0, 0),
(11, 3, 0, 0),
(11, 4, 0, 0),
(11, 5, 0, 0),
(11, 6, 0, 0),
(11, 7, 0, 0),
(11, 8, 0, 0),
(11, 9, 0, 0),
(11, 10, 0, 0),
(12, 1, 0, 0),
(12, 2, 0, 0),
(12, 3, 0, 0),
(12, 4, 0, 0),
(12, 5, 0, 0),
(12, 6, 0, 0),
(12, 7, 0, 0),
(12, 8, 0, 0),
(12, 9, 0, 0),
(12, 10, 0, 0),
(13, 1, 0, 0),
(13, 2, 0, 0),
(13, 3, 0, 0),
(13, 4, 0, 0),
(13, 5, 0, 0),
(13, 6, 0, 0),
(13, 7, 0, 0),
(13, 8, 0, 0),
(13, 9, 0, 0),
(13, 10, 0, 0),
(14, 1, 0, 0),
(14, 2, 0, 0),
(14, 3, 0, 0),
(14, 4, 0, 0),
(14, 5, 0, 0),
(14, 6, 0, 0),
(14, 7, 0, 0),
(14, 8, 0, 0),
(14, 9, 0, 0),
(14, 10, 0, 0),
(15, 1, 0, 0),
(15, 2, 0, 0),
(15, 3, 0, 0),
(15, 4, 0, 0),
(15, 5, 0, 0),
(15, 6, 0, 0),
(15, 7, 0, 0),
(15, 8, 0, 0),
(15, 9, 0, 0),
(15, 10, 0, 0),
(16, 1, 0, 0),
(16, 2, 0, 0),
(16, 3, 0, 0),
(16, 4, 0, 0),
(16, 5, 0, 0),
(16, 6, 0, 0),
(16, 7, 0, 0),
(16, 8, 0, 0),
(16, 9, 0, 0),
(16, 10, 0, 0),
(17, 1, 0, 0),
(17, 2, 0, 0),
(17, 3, 0, 0),
(17, 4, 0, 0),
(17, 5, 0, 0),
(17, 6, 0, 0),
(17, 7, 0, 0),
(17, 8, 0, 0),
(17, 9, 0, 0),
(17, 10, 0, 0),
(18, 1, 0, 0),
(18, 2, 0, 0),
(18, 3, 0, 0),
(18, 4, 0, 0),
(18, 5, 0, 0),
(18, 6, 0, 0),
(18, 7, 0, 0),
(18, 8, 0, 0),
(18, 9, 0, 0),
(18, 10, 0, 0),
(19, 1, 0, 0),
(19, 2, 0, 0),
(19, 3, 0, 0),
(19, 4, 0, 0),
(19, 5, 0, 0),
(19, 6, 0, 0),
(19, 7, 0, 0),
(19, 8, 0, 0),
(19, 9, 0, 0),
(19, 10, 0, 0),
(20, 1, 0, 0),
(20, 2, 0, 0),
(20, 3, 0, 0),
(20, 4, 0, 0),
(20, 5, 0, 0),
(20, 6, 0, 0),
(20, 7, 0, 0),
(20, 8, 0, 0),
(20, 9, 0, 0),
(20, 10, 0, 0),
(21, 1, 0, 0),
(21, 2, 0, 0),
(21, 3, 0, 0),
(21, 4, 0, 0),
(21, 5, 0, 0),
(21, 6, 0, 0),
(21, 7, 0, 0),
(21, 8, 0, 0),
(21, 9, 0, 0),
(21, 10, 0, 0),
(22, 1, 0, 0),
(22, 2, 0, 0),
(22, 3, 0, 0),
(22, 4, 0, 0),
(22, 5, 0, 0),
(22, 6, 0, 0),
(22, 7, 0, 0),
(22, 8, 0, 0),
(22, 9, 0, 0),
(22, 10, 0, 0),
(23, 1, 0, 0),
(23, 2, 0, 0),
(23, 3, 0, 0),
(23, 4, 0, 0),
(23, 5, 0, 0),
(23, 6, 0, 0),
(23, 7, 0, 0),
(23, 8, 0, 0),
(23, 9, 0, 0),
(23, 10, 0, 0),
(24, 1, 0, 0),
(24, 2, 0, 0),
(24, 3, 0, 0),
(24, 4, 0, 0),
(24, 5, 0, 0),
(24, 6, 0, 0),
(24, 7, 0, 0),
(24, 8, 0, 0),
(24, 9, 0, 0),
(24, 10, 0, 0),
(25, 1, 0, 0),
(25, 2, 0, 0),
(25, 3, 0, 0),
(25, 4, 0, 0),
(25, 5, 0, 0),
(25, 6, 0, 0),
(25, 7, 0, 0),
(25, 8, 0, 0),
(25, 9, 0, 0),
(25, 10, 0, 0),
(26, 1, 0, 0),
(26, 2, 0, 0),
(26, 3, 0, 0),
(26, 4, 0, 0),
(26, 5, 0, 0),
(26, 6, 0, 0),
(26, 7, 0, 0),
(26, 8, 0, 0),
(26, 9, 0, 0),
(26, 10, 0, 0),
(27, 1, 0, 0),
(27, 2, 0, 0),
(27, 3, 0, 0),
(27, 4, 0, 0),
(27, 5, 0, 0),
(27, 6, 0, 0),
(27, 7, 0, 0),
(27, 8, 0, 0),
(27, 9, 0, 0),
(27, 10, 0, 0),
(28, 1, 0, 0),
(28, 2, 0, 0),
(28, 3, 0, 0),
(28, 4, 0, 0),
(28, 5, 0, 0),
(28, 6, 0, 0),
(28, 7, 0, 0),
(28, 8, 0, 0),
(28, 9, 0, 0),
(28, 10, 0, 0),
(29, 1, 0, 0),
(29, 2, 0, 0),
(29, 3, 0, 0),
(29, 4, 0, 0),
(29, 5, 0, 0),
(29, 6, 0, 0),
(29, 7, 0, 0),
(29, 8, 0, 0),
(29, 9, 0, 0),
(29, 10, 0, 0),
(30, 1, 0, 0),
(30, 2, 0, 0),
(30, 3, 0, 0),
(30, 4, 0, 0),
(30, 5, 0, 0),
(30, 6, 0, 0),
(30, 7, 0, 0),
(30, 8, 0, 0),
(30, 9, 0, 0),
(30, 10, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
