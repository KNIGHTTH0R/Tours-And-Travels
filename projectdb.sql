-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 05:00 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `projectdb`
--

CREATE TABLE `projectdb` (
  `Name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `psw` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectdb`
--

INSERT INTO `projectdb` (`Name`, `email`, `psw`, `gender`, `date`) VALUES
('Sudiksha Acharya', 'sudikshaacharya7@gma', 'dmn', 'female', '1997-04-05'),
('Sudiksha Acharya', 'dipikaacharya@gmail.', 'dkknd', 'female', '1997-04-05'),
('bsdj', 'dmnbfm', 'dhdmbfj', 'female', '1997-04-05'),
('Sudiksha Acharya', 'sudikshaacharya7@gma', '1234', 'female', '1997-04-05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
