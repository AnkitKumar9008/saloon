-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 12:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saloon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `branch` varchar(300) NOT NULL,
  `address` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `mobile`, `branch`, `address`, `status`) VALUES
(1, 'admin@gmail.com', '1234', 'omkar ', '9012345687', 'B Saloon', 'Noida', '0'),
(3, 'omkarsingh11121@gmail.com', '12345', 'Aman', '8912340098', 'A Saloon', 'Greater Noida', '0'),
(8, 'ankit@yopmail.com', '1234', 'omkar kumar', '9012345621', 'C Saloon', 'Noida', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bill_generate`
--

CREATE TABLE `bill_generate` (
  `id` int(10) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `bill_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_generate`
--

INSERT INTO `bill_generate` (`id`, `cname`, `adminname`, `branch`, `bill_id`, `service`, `price`, `bill_date`) VALUES
(7, 'Mohit', 'ankit@yopmail.com', 'C Saloon', 'Mohit-Hair Cut9070', 'Hair Cut', '120', '2024-02-03'),
(8, 'Manoj', 'ankit@yopmail.com', 'C Saloon', 'Manoj-saving7394', 'saving', '19', '2024-02-02'),
(9, 'test', 'admin@gmail.com', 'B Saloon', 'test-Hair Cut4040', 'Hair Cut', '120', '2024-02-03'),
(10, 'test2', 'admin@gmail.com', 'B Saloon', 'test2-saving6071', 'saving', '19', '2024-02-03'),
(11, 'sunny', 'ankit@yopmail.com', 'C Saloon', 'sunny-saving2730', 'saving', '200', '2024-02-02'),
(12, 'Ankit singht tes', 'ankit@yopmail.com', 'C Saloon', 'Ankit singht tes-Hair Cut9696', 'Hair Cut', '120', '2024-02-02'),
(13, 'Ankit test', 'ankit@yopmail.com', 'C Saloon', 'Ankit test-Hair Cut5332', 'Hair Cut', '120', '2024-02-02'),
(14, 'Ankit ', 'ankit@yopmail.com', 'C Saloon', 'Ankit -asa1563', 'asa', '121', '2024-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `sal_clients`
--

CREATE TABLE `sal_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sal_clients`
--

INSERT INTO `sal_clients` (`id`, `name`, `contact_number`, `email`, `gender`, `address`) VALUES
(2, 'abcd as', '9012345687', 'admin@gmail.com', 'Male', 'Noida'),
(3, 'Ankit kumar', '9012345610', 'ankit@gmail.com', 'Male', 'Noida');

-- --------------------------------------------------------

--
-- Table structure for table `sal_employee`
--

CREATE TABLE `sal_employee` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `doj` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `addhar` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sal_employee`
--

INSERT INTO `sal_employee` (`id`, `name`, `email`, `password`, `mobile`, `doj`, `salary`, `address`, `addhar`, `pan`, `branch`, `status`) VALUES
(5, 'Ankit Kumar', 'ankit@gmail.com', '12345', '9012345687', '2024-02-06', '12000', 'Noida', 'Ankit Kumar-adharcard.pdf', 'Ankit Kumar-pancard.pdf', 'admin@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sal_service`
--

CREATE TABLE `sal_service` (
  `id` int(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sal_service`
--

INSERT INTO `sal_service` (`id`, `gender`, `name`, `price`) VALUES
(4, '2', 'Hair Cut', '121'),
(5, '2', 'Hair Cut', '120'),
(6, '1', 'saving', '200'),
(7, '1', 'admina', '19'),
(16, '1', 'asa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sup-admin`
--

CREATE TABLE `sup-admin` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sup-admin`
--

INSERT INTO `sup-admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'ankitsup@gmail.com', '12345', 'Ankit Super');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_generate`
--
ALTER TABLE `bill_generate`
  ADD KEY `index` (`id`);

--
-- Indexes for table `sal_clients`
--
ALTER TABLE `sal_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sal_employee`
--
ALTER TABLE `sal_employee`
  ADD KEY `index` (`id`);

--
-- Indexes for table `sal_service`
--
ALTER TABLE `sal_service`
  ADD KEY `index` (`id`);

--
-- Indexes for table `sup-admin`
--
ALTER TABLE `sup-admin`
  ADD KEY `index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bill_generate`
--
ALTER TABLE `bill_generate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sal_clients`
--
ALTER TABLE `sal_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sal_employee`
--
ALTER TABLE `sal_employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sal_service`
--
ALTER TABLE `sal_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sup-admin`
--
ALTER TABLE `sup-admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
