-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 10:18 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_acsetlang`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_admin`
--

CREATE TABLE `cat_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `valid` varchar(2) NOT NULL,
  `privilege` varchar(512) NOT NULL,
  `token` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_admin`
--

INSERT INTO `cat_admin` (`id`, `username`, `password`, `valid`, `privilege`, `token`) VALUES
(1, 'admin', 'f3b0bc1be4b9f6095c902e4e4412509bfdcd59f7', '0', 'HM,AB,EX,PR,GR,IN,CS,MD,CR,ST', ''),
(12, 'admin_media', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '0', 'MD', 'qwerty'),
(13, 'admin_career', 'fb8596ab9645fc85cee5ddfa2d8bba7b730c40a7', '0', 'CR', 'karir123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_admin`
--
ALTER TABLE `cat_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_admin`
--
ALTER TABLE `cat_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
