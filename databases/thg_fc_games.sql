-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 01:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thg_fc_games`
--

-- --------------------------------------------------------

--
-- Table structure for table `adversaries`
--

CREATE TABLE `adversaries` (
  `ad_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adversaries`
--

INSERT INTO `adversaries` (`ad_id`, `name`) VALUES
(10, 'manchester city'),
(13, 'mnu');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `mt_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `play_ground` varchar(255) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`mt_id`, `date`, `play_ground`, `ref_id`, `ad_id`, `user_id`) VALUES
(8, '2022-07-01', 'stamfrombidge', 3, 10, 1),
(10, '2022-07-05', 'ot', 3, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `ref_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referees`
--

INSERT INTO `referees` (`ref_id`, `f_name`, `l_name`, `age`, `sex`, `telephone`) VALUES
(3, 'cluadette', 'mutoni', 20, 'male', 780501787);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `u_name`, `u_password`) VALUES
(1, 'thg', '#include'),
(2, 'pepe', '#include1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adversaries`
--
ALTER TABLE `adversaries`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `ad_id` (`ad_id`),
  ADD KEY `ref_id` (`ref_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `u_name` (`u_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adversaries`
--
ALTER TABLE `adversaries`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `adversaries` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`ref_id`) REFERENCES `referees` (`ref_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
