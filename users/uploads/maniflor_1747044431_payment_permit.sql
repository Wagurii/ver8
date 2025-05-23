-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 09:40 AM
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
-- Database: `barangay_clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_permit`
--

CREATE TABLE `payment_permit` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_permit` text NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `residentAddress` varchar(50) NOT NULL,
  `locationAddress` varchar(50) NOT NULL,
  `property_status` text NOT NULL,
  `lessor` varchar(20) NOT NULL,
  `lengthofStay` text NOT NULL,
  `structureType` text NOT NULL,
  `applicant_signature` varchar(255) DEFAULT NULL,
  `location_sketch` varchar(255) DEFAULT NULL,
  `pending_cases` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_permit`
--

INSERT INTO `payment_permit` (`id`, `date`, `payment_permit`, `fullName`, `contactNo`, `residentAddress`, `locationAddress`, `property_status`, `lessor`, `lengthofStay`, `structureType`, `applicant_signature`, `location_sketch`, `pending_cases`) VALUES
(82, '2025-05-28', 'Renovation Permit: Php 500', 'Robert Pradilla', '09263422473', 'Batasan Hills', 'Katuparan Ext Batasan Hills Q.c', 'Owned', 'Landlord', '3 years', 'Renovating with...............', 'posa.jpeg', 'backgroundjpg.jpg', 'NO PENDING CASE AT LUPON TAGAPAMAYAPA, NO PENDING CASE AT BLOTTER BOOK, NO PENDING CASE/VIOLATION OF ENVIRONMENTAL ORDINANCES'),
(84, '2025-05-06', 'Building Permit: Php 600, Renovation Permit: Php 500', 'Kevin Nash Fontanilla', '09132165489', 'Payatas', 'Barangay 123 Payatas Quezon City', 'Rented', 'Renter', '3 years', 'none', 'mochi-blue-roses.gif', 'peakpx.jpg', 'NO PENDING CASE AT BLOTTER BOOK'),
(85, '2025-07-24', 'Building Permit: Php 600, Renovation Permit: Php 500, Fencing Permit: Php 450', 'Jan Ronald Pablo', '09123645789', 'Fairview', 'Barangay Gwapo Quezon City', 'Owned', 'Landlord', '2 years', 'none', 'hand-paper.png', '8181968.jpg', 'NO PENDING CASE AT LUPON TAGAPAMAYAPA, NO PENDING CASE AT BLOTTER BOOK, NO PENDING CASE/VIOLATION OF ENVIRONMENTAL ORDINANCES'),
(86, '0000-00-00', 'Building Permit: Php 600', 'Robert Pradilla', '09263422473', 'Batasan Hills', 'Katuparan Ext Batasan Hills Q.c', 'Owned', 'Landlord', '3 years', 'Renovating with...............', 'nc.jfif', 'nc.jfif', 'NO PENDING CASE AT LUPON TAGAPAMAYAPA, NO PENDING CASE/VIOLATION OF ENVIRONMENTAL ORDINANCES'),
(87, '0000-00-00', 'Building Permit: Php 600', 'Robert Pradilla', '09263422473', 'Batasan Hills', 'Katuparan Ext Batasan Hills Q.c', 'Owned', 'Landlord', '3 years', 'Renovating with...............', 'nc.jfif', 'nc.jfif', 'NO PENDING CASE AT LUPON TAGAPAMAYAPA, NO PENDING CASE/VIOLATION OF ENVIRONMENTAL ORDINANCES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_permit`
--
ALTER TABLE `payment_permit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_permit`
--
ALTER TABLE `payment_permit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
