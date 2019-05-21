-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 04:59 PM
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
-- Database: `dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `a_id` int(11) NOT NULL,
  `a_date` date NOT NULL,
  `a_time` int(11) NOT NULL,
  `a_description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a_completed` tinyint(1) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `d_id` int(11) NOT NULL,
  `d_first_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `d_last_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `d_phone` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `d_email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `d_gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `l_id` int(11) NOT NULL,
  `l_username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `l_password` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `p_id` int(11) NOT NULL,
  `p_first_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `p_last_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `p_gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `p_identification_number` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `p_address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `p_phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `p_mail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`p_id`, `p_first_name`, `p_last_name`, `p_gender`, `p_identification_number`, `p_address`, `p_phone`, `p_mail`) VALUES
(1, 'Joca', 'Koca', 'M', '52213514', 'Slobodana Lale Berberskog br.55', '0606161059', 'jocaboca@gmail.com'),
(2, 'Marica', 'Glavica', 'F', '123456789', 'Mikenska br.420', '0696969691', 'maricaglavica536723@gmail.com'),
(5, 'Å tuka', 'KariÄ‡', 'F', '1234', 'Madabre br.5422', '3894441359', 'stukakaric9995@hotmail.rs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `fk_patients_id` (`p_id`),
  ADD KEY `fk_doctor_id` (`d_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_doctor_id` FOREIGN KEY (`d_id`) REFERENCES `doctors` (`d_id`),
  ADD CONSTRAINT `fk_patients_id` FOREIGN KEY (`p_id`) REFERENCES `patients` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
