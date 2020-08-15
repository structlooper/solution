-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 12:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `desc`, `user_id`, `created_at`) VALUES
(1, 'test title', 'this is description of post', 1, '2020-08-15 00:32:14'),
(2, 'test updated', 'Description', 1, '2020-08-15 01:33:36'),
(3, 'test 3', 'Description of the post', 1, '2020-08-15 01:33:53'),
(4, 'admin 2 quote', 'Description of quote', 3, '2020-08-15 01:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` enum('user','admin','superadmin') NOT NULL,
  `profile_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `phone`, `name`, `password`, `user_type`, `profile_status`, `created_at`) VALUES
(1, '1234567890', 'admin', '$2y$10$cLRIDUsqBQk.P0/ubqbUveZ2f3FBYWw7VGf9/3Cx4Tw/meASaxq/S', 'admin', '1', '2020-08-14 22:32:47'),
(2, '9876543211', 'user', '$2y$10$SnXxVfjX2NZLe/7SI7T1Q.becjcNFNPp5dNznT5Z5.6M2xX9.Mvli', 'user', '1', '2020-08-15 00:36:33'),
(3, '1234567891', 'admin 2', '$2y$10$BLK4IMVY5kXIba8za05QXuaszkix7WwoaPYB40l9pkJi8geoEL9hG', 'admin', '1', '2020-08-15 01:41:55'),
(4, '7678178911', 'Structlooper', '$2y$10$waN8N6j3lpPoS.a3j/xS6.q/AYrKACg7Maa6STf27yO49CqWxvXnK', 'superadmin', '1', '2020-08-15 01:51:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
