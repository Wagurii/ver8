-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2025 at 07:43 AM
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
-- Database: `user_posts`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `post_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `post_content`, `created_at`, `image`) VALUES
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
(90, 'robertpradilla', 'Im Back', '2025-03-26 06:39:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
