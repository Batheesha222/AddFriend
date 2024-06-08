-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 01:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seng_21253`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_id` int(11) NOT NULL,
  `friend_email` varchar(50) NOT NULL,
  `passwrd` varchar(20) NOT NULL,
  `profile_name` varchar(30) NOT NULL,
  `date_started` timestamp NOT NULL DEFAULT current_timestamp(),
  `num_of_friends` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `friend_email`, `passwrd`, `profile_name`, `date_started`, `num_of_friends`) VALUES
(1, 'batta@gmail.com', 'batta1', 'batta', '2023-10-08 13:16:32', 7),
(2, 'nimal@gmail.com', 'nimal1', 'nimal', '2023-10-08 14:26:54', 5),
(3, 'shashi@gmail.com', 'shashi1', 'shashi', '2023-10-08 17:23:32', 4),
(4, 'amal@gmail.com', 'amal1', 'amal', '2023-10-08 17:23:59', 0),
(5, 'peheliya@gmail.com', 'peheliya1', 'peheliya', '2023-10-08 17:24:31', 0),
(6, 'kojja@gmail.com', 'kojja1', 'kojja', '2023-10-08 17:25:52', 5),
(7, 'sadeepa@gmail.com', 'sadeepa1', 'sadeepa', '2023-10-09 04:31:57', 0),
(8, 'chulle@gmail.com', 'chulle1', 'chulle', '2023-10-09 08:55:23', 0),
(9, 'wazuu@gmail.com', 'wazuu1', 'wazuu', '2023-10-09 08:55:51', 0),
(10, 'monti@gmail.com', 'monti1', 'monti', '2023-10-09 08:56:15', 0),
(11, 'kalla@gmail.com', 'kalla1', 'kalla', '2023-10-09 08:56:44', 0),
(12, 'dadoriya@gmail.com', 'dadoriya1', 'dadoriya', '2023-10-09 08:57:23', 6),
(13, 'dore@gmail.com', 'dore1', 'dore', '2023-10-09 08:57:44', 0),
(14, 'pushpe@gmail.com', 'pushpe1', 'pushpe', '2023-10-09 08:58:08', 0),
(15, 'sudujola@gmail.com', 'sudujola1', 'sudujola', '2023-10-09 08:58:43', 0),
(16, 'nakiya@gmail.com', 'nakiya1', 'nakiya', '2023-10-09 08:59:25', 0),
(17, 'ataless@gmail.com', 'ataless1', 'ataless', '2023-10-09 09:00:02', 0),
(27, 'browni@gmail.com', 'browni1', 'browni', '2023-10-10 11:10:42', 5),
(28, 'Kadol@gmail.com', 'Kadol1', 'Kadol', '2023-10-10 11:17:15', 0),
(29, 'tharaawa@gmail.com', 'tharaawa1', 'tharaawa', '2023-10-10 11:18:09', 0),
(30, 'sumudu@gmail.com', 'sumudu1', 'sumudu', '2023-10-10 11:19:48', 0),
(31, 'natta@gmail.com', 'natta1', 'natta', '2023-10-10 11:21:05', 3),
(32, 'maluwa@gmail.com', 'maluwa1', 'maluwa', '2023-10-10 11:24:18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
