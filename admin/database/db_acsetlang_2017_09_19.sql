-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 06:11 PM
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
-- Table structure for table `aboutus_privacy`
--

CREATE TABLE `aboutus_privacy` (
  `id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus_privacy`
--

INSERT INTO `aboutus_privacy` (`id`, `description`, `active`) VALUES
(1, '<p>English</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `aboutus_privacy_en`
--

CREATE TABLE `aboutus_privacy_en` (
  `id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus_privacy_en`
--

INSERT INTO `aboutus_privacy_en` (`id`, `description`, `active`) VALUES
(1, '1\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `aboutus_tnc`
--

CREATE TABLE `aboutus_tnc` (
  `id` int(11) NOT NULL,
  `descriptor` mediumtext NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus_tnc`
--

INSERT INTO `aboutus_tnc` (`id`, `descriptor`, `active`) VALUES
(1, '<p>Aksi perploncoan pelajar terjadi di Tangerang Selatan. Sejumlah siswa SMA memaksa Siswa SMP melepas pakaiannya sebagai syarat bergabung dengan kelompok mereka.</p>\r\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `aboutus_tnc_en`
--

CREATE TABLE `aboutus_tnc_en` (
  `id` int(11) NOT NULL,
  `descriptor` mediumtext NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus_tnc_en`
--

INSERT INTO `aboutus_tnc_en` (`id`, `descriptor`, `active`) VALUES
(1, '<p>The United States has great strength and patience, but if it is forced to defend itself or its allies, we will have no choice but to totally destroy North Korea,&quot; Trump said during his first address to the UN General Assembly</p>\r\n', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus_privacy`
--
ALTER TABLE `aboutus_privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aboutus_privacy_en`
--
ALTER TABLE `aboutus_privacy_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aboutus_tnc`
--
ALTER TABLE `aboutus_tnc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aboutus_tnc_en`
--
ALTER TABLE `aboutus_tnc_en`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus_privacy`
--
ALTER TABLE `aboutus_privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aboutus_privacy_en`
--
ALTER TABLE `aboutus_privacy_en`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aboutus_tnc`
--
ALTER TABLE `aboutus_tnc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aboutus_tnc_en`
--
ALTER TABLE `aboutus_tnc_en`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
