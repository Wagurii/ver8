-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 10, 2025 at 04:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lost_and_found`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `message`, `date`, `status`) VALUES
(1, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-04-10 10:48:38', 'logout'),
(2, ': Robert Pradilla | LOGIN', '2025-04-10 10:48:57 AM', 'login'),
(3, 'ADMIN: Robert Pradilla | LOGOUT', '2025-04-10 10:49:01', 'logout'),
(4, ': maniflor dhenniel | LOGIN', '2025-04-10 10:49:25 AM', 'login'),
(5, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-04-10 10:49:34', 'logout'),
(6, ': maniflor dhenniel | LOGIN', '2025-04-10 10:50:53 AM', 'login'),
(7, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-04-10 10:51:26', 'logout');

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `id` int(11) NOT NULL,
  `items` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `found`
--

INSERT INTO `found` (`id`, `items`, `created_at`, `images`) VALUES
(1, 'f', '', '20220315_125223-02.jpeg'),
(2, 'ga', '', '20220315_125223-02.jpeg'),
(3, 'ga', '', '20220315_125223-02.jpeg'),
(4, 'ga', '', '20220315_125223-02.jpeg'),
(5, 'wallet', '', '20220315_125223-02.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `post_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `post_content`, `created_at`, `images`) VALUES
(1, 'robertpradilla', 'Nawawala wallet ko ', '2025-03-23 07:46:49', NULL),
(2, 'robertpradilla', 'Nawawala wallet ko ', '2025-03-23 07:47:01', NULL),
(3, 'robertpradilla', 'Lf kaduo', '2025-03-23 07:47:22', NULL),
(4, 'robertpradilla', 'd', '2025-03-23 08:21:04', NULL),
(5, 'robertpradilla', 'Missing: Maniflor', '2025-03-23 08:34:38', NULL),
(6, 'robertpradilla', 'Text only', '2025-03-23 12:16:03', NULL),
(7, 'robertpradilla', 'with picture', '2025-03-23 12:16:17', 'backgroundjpg.jpg'),
(8, 'robertpradilla', 'hello', '2025-03-23 12:45:36', NULL),
(9, 'robertpradilla', 'hi I, back', '2025-03-24 13:24:07', NULL),
(10, 'robertpradilla', 'f', '2025-03-24 14:50:44', NULL),
(11, 'robertpradilla', 'goodnight', '2025-03-24 15:19:48', 'posa.jpeg'),
(12, 'robertpradilla', 'text', '2025-03-26 06:11:22', NULL),
(90, 'robertpradilla', 'Im Back', '2025-03-26 06:39:31', NULL),
(91, 'maniflor', 'f', '2025-04-09 10:58:21', NULL),
(92, 'maniflor', '', '2025-04-09 10:58:22', NULL),
(93, 'manager', 'missing kuya ko', '2025-04-09 12:34:28', '20220315_125223-02.jpeg'),
(94, 'manager', 'missing kuya ko', '2025-04-09 12:35:52', '20220315_125223-02.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `user_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `middlename`, `user_type`) VALUES
(1, 'admin', 'admin123', 'Robert', 'Pradilla', 'Toledo', 'admin'),
(2, 'manager', 'manager1', 'manager', 'kim', 'manager', 'User Manager'),
(3, 'maniflor', 'maniflor123', 'maniflor', 'dhenniel', 'bonillo', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
