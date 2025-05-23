-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 05:04 PM
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
(7, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-04-10 10:51:26', 'logout'),
(8, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-05-06 22:08:31', 'logout'),
(9, ': Robert Pradilla | LOGIN', '2025-05-06 10:08:34 PM', 'login'),
(10, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:08:47', 'logout'),
(11, ': Robert Pradilla | LOGIN', '2025-05-06 10:08:50 PM', 'login'),
(12, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:10:20', 'logout'),
(13, ': Robert Pradilla | LOGIN', '2025-05-06 10:10:23 PM', 'login'),
(14, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:13:15', 'logout'),
(15, ': Robert Pradilla | LOGIN', '2025-05-06 10:13:18 PM', 'login'),
(16, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:15:00', 'logout'),
(17, ': Robert Pradilla | LOGIN', '2025-05-06 10:15:04 PM', 'login'),
(18, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:15:19', 'logout'),
(19, ': Robert Pradilla | LOGIN', '2025-05-06 10:15:46 PM', 'login'),
(20, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:18:46', 'logout'),
(21, ': Robert Pradilla | LOGIN', '2025-05-06 10:18:49 PM', 'login'),
(22, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:20:06', 'logout'),
(23, ': Robert Pradilla | LOGIN', '2025-05-06 10:20:09 PM', 'login'),
(24, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:21:06', 'logout'),
(25, 'admin: Robert Pradilla | LOGIN', '2025-05-06 10:21:49 PM', 'login'),
(26, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:21:53', 'logout'),
(27, 'student: maniflor dhenniel | LOGIN', '2025-05-06 10:22:50 PM', 'login'),
(28, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-05-06 22:33:02', 'logout'),
(29, 'admin: Robert Pradilla | LOGIN', '2025-05-06 10:33:13 PM', 'login'),
(30, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:33:15', 'logout'),
(31, 'STUDENT:   | LOGOUT', '2025-05-06 22:33:22', 'logout'),
(32, 'admin: Robert Pradilla | LOGIN', '2025-05-06 10:33:28 PM', 'login'),
(33, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 22:33:34', 'logout'),
(34, 'student: maniflor dhenniel | LOGIN', '2025-05-06 10:34:05 PM', 'login'),
(35, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-05-06 22:36:42', 'logout'),
(36, ': Robert Pradilla | LOGIN', '2025-05-06 10:36:46 PM', 'login'),
(37, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 23:00:15', 'logout'),
(38, ': Robert Pradilla | LOGIN', '2025-05-06 11:00:19 PM', 'login'),
(39, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 23:01:08', 'logout'),
(40, ': maniflor dhenniel | LOGIN', '2025-05-06 11:01:22 PM', 'login'),
(41, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-05-06 23:01:25', 'logout'),
(42, ': Robert Pradilla | LOGIN', '2025-05-06 11:01:27 PM', 'login'),
(43, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 23:11:21', 'logout'),
(44, ': Robert Pradilla | LOGIN', '2025-05-06 11:11:27 PM', 'login'),
(45, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 23:11:34', 'logout'),
(46, 'STUDENT: maniflor dhenniel | LOGOUT', '2025-05-06 23:11:43', 'logout'),
(47, ': Robert Pradilla | LOGIN', '2025-05-06 11:11:52 PM', 'login'),
(48, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 23:14:27', 'logout'),
(49, ': Robert Pradilla | LOGIN', '2025-05-06 11:14:39 PM', 'login'),
(50, 'ADMIN: Robert Pradilla | LOGOUT', '2025-05-06 23:17:27', 'logout'),
(51, 'admin: Robert Pradilla | LOGIN', '2025-05-06 11:19:04 PM', 'login'),
(52, 'admin: Robert Pradilla | LOGOUT', '2025-05-06 23:20:42', 'logout'),
(53, 'User Manager: manager kim | LOGIN', '2025-05-06 11:20:54 PM', 'login'),
(54, 'User Manager: manager kim | LOGOUT', '2025-05-06 23:23:13', 'logout'),
(55, 'User Manager: manager kim | LOGIN', '2025-05-06 11:23:20 PM', 'login'),
(56, 'User Manager: manager kim | LOGOUT', '2025-05-06 23:23:38', 'logout'),
(57, 'admin: Robert Pradilla | LOGIN', '2025-05-06 11:23:41 PM', 'login'),
(58, 'admin: Robert Pradilla | LOGOUT', '2025-05-06 23:25:50', 'logout'),
(59, 'admin: Robert Pradilla | LOGIN', '2025-05-06 11:25:53 PM', 'login'),
(60, 'admin: Robert Pradilla | LOGOUT', '2025-05-06 23:27:21', 'logout'),
(61, 'admin: Robert Pradilla | LOGIN', '2025-05-12 05:42:43 PM', 'login'),
(62, 'admin: Robert Pradilla | LOGOUT', '2025-05-12 18:03:25', 'logout'),
(63, 'admin: Robert Pradilla | LOGIN', '2025-05-13 03:02:28 PM', 'login'),
(64, 'admin: Robert Pradilla | LOGOUT', '2025-05-13 15:03:29', 'logout'),
(65, 'admin: robert pradilla | LOGOUT', '2025-05-13 16:19:22', 'logout'),
(66, 'admin: Robert Pradilla | LOGIN', '2025-05-13 04:19:25 PM', 'login'),
(67, 'admin: Robert Pradilla | LOGOUT', '2025-05-13 17:51:45', 'logout'),
(68, 'admin: Robert Pradilla | LOGIN', '2025-05-13 05:51:56 PM', 'login'),
(69, 'admin: Robert Pradilla | LOGOUT', '2025-05-13 18:46:56', 'logout'),
(70, 'admin: Robert Pradilla | LOGIN', '2025-05-13 07:24:35 PM', 'login'),
(71, 'admin: Robert Pradilla | LOGIN', '2025-05-21 10:04:29 PM', 'login'),
(72, 'admin: Robert Pradilla | LOGOUT', '2025-05-21 22:05:11', 'logout'),
(73, 'admin: Robert Pradilla | LOGIN', '2025-05-21 10:37:17 PM', 'login'),
(74, 'admin: Robert Pradilla | LOGOUT', '2025-05-21 23:23:31', 'logout'),
(75, 'admin: Robert Pradilla | LOGIN', '2025-05-21 11:23:37 PM', 'login'),
(76, 'admin: Robert Pradilla | LOGOUT', '2025-05-21 23:53:48', 'logout'),
(77, 'admin: Robert Pradilla | LOGIN', '2025-05-21 11:53:52 PM', 'login'),
(78, 'admin: Robert Pradilla | LOGIN', '2025-05-22 10:38:42 PM', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `student_staff_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `last_seen` varchar(255) DEFAULT NULL,
  `date_lost` date DEFAULT NULL,
  `claim_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `item_id`, `student_staff_id`, `name`, `description`, `last_seen`, `date_lost`, `claim_date`) VALUES
(9, 8, 's230112413', 'Jan Dhenniel Maniflor', 'yung wallpaper is yung personal pic ko tas yung pass is 123123 try nyo open', 'sa canteen', '2025-05-15', '2025-05-18 13:20:44'),
(10, 8, '123', 'bert', '31', 'ewan', '0000-00-00', '2025-05-21 12:42:00'),
(11, 8, '123', 'bert', '31', 'ewan', '0000-00-00', '2025-05-21 12:42:20'),
(12, 8, '123', 'bert', 'ewan', 'ewan', '0000-00-00', '2025-05-21 13:00:04'),
(15, 8, '123', '123', '123', '123', '2025-05-22', '2025-05-21 14:53:53'),
(16, 10, '213', 'bert', '12312', 'ewan', '2025-05-01', '2025-05-21 14:58:38'),
(17, 10, 'aha1', '23', '321', '321', '2025-05-02', '2025-05-21 14:59:20');

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
-- Table structure for table `found_items`
--

CREATE TABLE `found_items` (
  `id` int(11) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unclaimed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `found_items`
--

INSERT INTO `found_items` (`id`, `item_category`, `item_name`, `image`, `status`) VALUES
(8, 'wallets21312', 'wallets', 'wallet.jpg', 'claimed'),
(10, 'test', '123', 'rm logo 5 copy.png', 'claimed'),
(13, 'tesa', '123', 'peakpx.jpg', 'unclaimed');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `post_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `images` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `username`, `post_content`, `created_at`, `images`, `user_id`) VALUES
(150, 'robertpradilla', 'test', '2025-05-13 07:16:08', NULL, 4),
(153, 'maniflor', 'test', '2025-05-13 10:52:10', NULL, 3),
(154, 'maniflor', 'ID ko nawawala baka may nakapulot\r\n\r\nName: Robert Pradilla\r\n', '2025-05-13 10:52:47', NULL, 3),
(155, 'robertpradilla', 'nawawalang posa huhutes', '2025-05-13 10:53:26', 'posa.jpeg', 4),
(173, 'admin', 'announcement\r\n', '2025-05-13 11:25:55', NULL, 1),
(174, 'admin', 'test', '2025-05-13 11:26:15', NULL, 1),
(178, 'robertpradilla', 'test', '2025-05-22 14:11:37', NULL, 4),
(185, 'robertpradilla', 'ha', '2025-05-22 14:28:50', NULL, 4),
(186, 'robertpradilla', 'a', '2025-05-22 14:28:55', NULL, 4),
(187, 'robertpradilla', '1', '2025-05-22 14:31:20', NULL, 4),
(188, 'robertpradilla', 'ha', '2025-05-22 14:31:39', NULL, 4),
(189, 'robertpradilla', 'ha', '2025-05-22 14:31:46', NULL, 4),
(190, 'robertpradilla', 'ha', '2025-05-22 14:32:58', NULL, 4);

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
  `user_type` varchar(25) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `middlename`, `user_type`, `profile_image`) VALUES
(1, 'admin', 'admin123', 'Robert', 'Pradilla', 'Toledo', 'admin', NULL),
(2, 'manager', 'manager1', 'manager', 'kim', 'manager', 'User Manager', NULL),
(3, 'maniflor', 'maniflor123', 'maniflor', 'dhenniel', 'bonillo', 'student', 'uploads/avatar.png'),
(4, 'robertpradilla', 'pradilla123', 'robert', 'pradilla', '', 'student', 'uploads/robertpradilla_1747120697_posa.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claims_ibfk_1` (`item_id`);

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `found_items`
--
ALTER TABLE `found_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `found_items`
--
ALTER TABLE `found_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `claims_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `found_items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
