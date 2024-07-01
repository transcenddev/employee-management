-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 04:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeetable`
--

CREATE TABLE `employeetable` (
  `emp_id` int(11) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_hired` date NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `department` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeetable`
--

INSERT INTO `employeetable` (`emp_id`, `account_type`, `first_name`, `last_name`, `date_hired`, `position`, `salary`, `department`, `username`, `password`) VALUES
(1, 'Admin', 'r3', 'kashi', '2023-04-02', 'Full Stack Developer', '300000.00', 'IT', 'r3kashi', '$2y$10$ALNvu6ngpjIpuJiYyX10hexNygL7vDoKTbLclhnXLXmxVGLgJW3My'),
(2, 'Admin', 'John', 'Dave', '2023-04-03', 'Full Stack Developer', '1210000.00', 'IT', 'johndave', '$2y$10$TZ9iAShFEt4r/WynR4tzI.qDVg6XmM/M/zH00J0B7.z/e8Y3xYZIu'),
(3, 'User', 'Kenjie', 'Abueg', '2023-03-27', 'Director', '1200000.00', 'IT', 'kenjie', '$2y$10$pZhyuCUv/Y2tM2BMlW8tAek72CuutBNUEAi7l5b6YOFEbIkmBd2s2'),
(4, 'Admin', 'John Mark', 'Pachico', '2023-04-04', 'Director', '9900000.00', 'IT', 'lokodata', '$2y$10$LhyzweSS34ZM5q4gdXeFtO/EBV/Wh8WlNlsMebZJDU8Gb6jq6oHxe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
