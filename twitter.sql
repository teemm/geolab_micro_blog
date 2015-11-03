-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2015 at 02:01 PM
-- Server version: 5.6.27
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `content`, `user_id`, `add_date`) VALUES
(1, 'test tweet', 1, '2015-11-02 17:18:10'),
(2, 'test tweet 2', 1, '2015-11-02 17:31:14'),
(3, 'third tweet', 1, '2015-11-02 17:39:52'),
(4, 'third tweet', 1, '2015-11-02 17:40:17'),
(5, 'third tweet', 1, '2015-11-02 17:40:26'),
(6, '', 1, '2015-11-02 17:45:03'),
(7, 'patara tweet', 1, '2015-11-02 17:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` enum('male','female') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `reg_date`, `gender`) VALUES
(1, 'oto', 'b7ad03d0f70e378eff4df7d35d6e8f6effa64b3d', 'oto@gmail.com', '2015-11-02 15:52:17', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
