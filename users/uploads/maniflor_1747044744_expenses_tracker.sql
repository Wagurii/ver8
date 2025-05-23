-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 04:30 PM
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
-- Database: `expenses_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Food'),
(2, 'Transport'),
(3, 'Utilities'),
(4, 'Entertainment'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `expense_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_name`, `expense_amount`, `created_at`, `category_id`) VALUES
(19, 'bills', 1500.00, '2025-05-07 07:27:10', NULL),
(20, 'Shopping', 200.00, '2025-05-02 13:12:14', NULL),
(21, 'Grocery', 500.00, '2025-05-09 13:12:25', NULL),
(22, 'Bag', 250.00, '2025-05-09 13:12:33', NULL),
(23, 'Payong', 150.00, '2025-05-01 13:12:38', NULL),
(24, 'ukay-ukay', 100.00, '2025-05-01 13:12:48', NULL),
(25, 'Bills', 1572.00, '2025-05-09 13:13:00', NULL),
(26, 'Bills', 2521.00, '2025-02-01 14:16:13', NULL),
(28, 'fd', 123.00, '2025-05-09 14:05:36', 1),
(29, 'Finals exam', 1500.00, '2025-05-09 14:06:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` varchar(20) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `password`, `is_admin`, `firstname`, `lastname`, `middlename`) VALUES
(1, 'robertpradilla', 'pradilla1234', '', '', '', ''),
(2, 'admin', 'admin123', 'admin', '', '', ''),
(3, 'Akali', 'akali123', '', '', '', ''),
(8, 'test', '$2y$10$1gt4lyBGm44rCNOsWIzIS.V6sy15saOXdScK73JXQ7D', '', '', '', ''),
(9, 'test', 'hahahahaha', '', '', '', ''),
(10, 'test', 'test123', '', '', '', ''),
(17, 'last123', '123132', '', '', '', ''),
(32, '2131', '$2y$10$hjUK09ulAEziE58hgvkBiuKsgl31YAlPI/xbaXcDS1t', '', '13', '1232', '123'),
(33, '123', '$2y$10$i5gD9W/tpKkLz..3PTLO5.tGRbXgdQ8wagYQA0BTWS/', '', 'test', '123', '123'),
(34, 'haha', '$2y$10$WspojbVD/4SfS3mohKoSBuBScO1lSsZL94Ge/KSM.tn', '', '1231', '321', '2312'),
(35, 'haha', '$2y$10$rbLAQ7Pal4nOzTWTt2CaN.rDOBjKuMbCVK3g.pa8r/V', '', '1231', '321', '2312'),
(36, 'bert123', '$2y$10$ENPXc7Jc3RMU0dpeEncufuqKPze47H8uYzGBbULKlfx', '', 'robert', 'pradilla', ''),
(37, 'expense', '$2y$10$vtsV6yXDCRTx///u9vUyY.q5MvV0mUxOBcH2xHeIdC3', '', 'expense', 'tracker', ''),
(38, '12312', '$2y$10$12VpiHNXaF0sIUHHd1tvn.hijhJ18zS9ZBfxhdacgxv', '', '21312', '23112', ''),
(39, 'test123', '$2y$10$MagT0pOKxWfiZr4.O3pDvu5bdtLgJ64/XnEpPCcqfdG', '', 'robert', 'pradilla', ''),
(40, 'berto', '$2y$10$9PQihfR0y/SGdxk1lemgDeUjBgCbB1HUve8q7RtVrUa', '', 'bert', 'bert', ''),
(52, 'test321', '$2y$10$7AuJt4rzxquF/p1vyDK/jOWQDtDOOokWdKeAzTpiAhp', '', 'Robert', 'Pradilla', ''),
(53, 'hash', '$2y$10$vtl7A7AWpiH1rDcZB5jxzOhsm5hO9.wZ0nPvnzPnVer', '', 'haha', 'haha', 'haha'),
(54, 'hashing', '$2y$10$jW05wiAV3ZrQPF2m2LnvXOz/74JyhK7SEekTcSIfjyk', '', '123', '123', '123'),
(55, 'tet123', '$2y$10$96Liofwl8vuL21m6vkia7.xnmk5paC4AYSOXaUtTpNr', '', 'admin', 'sadada', 'asda'),
(56, 'robertpradilla1', '$2y$10$Xv5A501WPLKEtAWd3MGAkexjkUNz8hIxeimV/C.901T', '', 'robner', 'asdad', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
