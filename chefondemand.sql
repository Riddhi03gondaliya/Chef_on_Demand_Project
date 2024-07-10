-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 04:28 PM
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
-- Database: `chefondemand`
--

-- --------------------------------------------------------

--
-- Table structure for table `appetizers`
--

CREATE TABLE `appetizers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appetizers`
--

INSERT INTO `appetizers` (`id`, `name`, `type`, `price`) VALUES
(1, 'egg', 1, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `cook_username` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `price`, `quantity`, `total`, `cook_username`, `user_username`) VALUES
(1, 'cake', 1000.00, 1, 1000.00, 'chchc', 'Ririu'),
(2, 'egg', 1000.00, 1, 1000.00, 'chchc', 'Ririu'),
(3, 'Noddles', 600.00, 1, 600.00, 'chchc', 'Ririu'),
(4, 'egg', 1000.00, 1, 1000.00, 'chchc', 'Ririu'),
(5, 'Noddles', 600.00, 1, 600.00, 'chchc', 'Ririu'),
(6, 'cake', 1000.00, 1, 1000.00, 'chchc', 'Ririu'),
(7, 'egg', 1000.00, 1, 1000.00, 'chchc', 'Ririu');

-- --------------------------------------------------------

--
-- Table structure for table `chef_reg`
--

CREATE TABLE `chef_reg` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chef_reg`
--

INSERT INTO `chef_reg` (`id`, `username`, `email`, `password`) VALUES
(1, 'chchc', 'chef1@gmail.com', '$2y$10$g0QBs7sC7VeIpZHGWYMk2u6AdMpzNOYjV2R9vxZaL/h/In58au.aS');

-- --------------------------------------------------------

--
-- Table structure for table `cooks`
--

CREATE TABLE `cooks` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `experience` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cuisines` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cooks`
--

INSERT INTO `cooks` (`id`, `fname`, `lname`, `experience`, `gender`, `age`, `phone`, `address`, `city`, `zip_code`, `state`, `specialty`, `about`, `img`, `username`, `cuisines`) VALUES
(1, 'Chef2', 'Patel', 12, 'male', 23, '3698521478', 'ubujyb', 'Ahmed', '123654', 'Gujarat', 'i am very good at making punjabi', 'master chef', 'uploads/chchc.jpg', 'chchc', 'Chinese,French');

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`, `img_path`) VALUES
(1, 'Chinese', 'cuisines/Chinese.jpg'),
(2, 'French', 'cuisines/French.jpg'),
(3, 'Greek', 'cuisines/Greek.jpg'),
(4, 'Indian', 'cuisines/Indian.jpg'),
(5, 'Italian', 'cuisines/Italian.jpg'),
(6, 'Japanese', 'cuisines/Japanese.jpg'),
(7, 'Lebanese', 'cuisines/Lebanese.jpg'),
(8, 'Mexican', 'cuisines/Mexican.jpg'),
(9, 'Spanish', 'cuisines/Spanish.jpg'),
(10, 'Turkish', 'cuisines/Turkish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `desserts`
--

CREATE TABLE `desserts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(50) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desserts`
--

INSERT INTO `desserts` (`id`, `name`, `type`, `price`) VALUES
(1, 'cake', 1, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `main_course`
--

CREATE TABLE `main_course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_course`
--

INSERT INTO `main_course` (`id`, `name`, `type`, `price`) VALUES
(1, 'Noddles', 1, 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`) VALUES
(2, 'Riddhi', 'Ririu', 'riddhi@gmail.com', '$2y$10$e6yzW4Jqfgh.izbhl4RuWe51m4BLqDOVOw1XnVLoNcBPKPXdOJj2O');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `lastname`, `phone`, `address`, `email`, `pin_code`, `city`, `country`, `state`, `username`) VALUES
(1, 'Riddhi', 'Gondaliya', '3698521478', 'ubujyb', 'riddhigondaliya369@gmail.com', '123654', 'Ahmed', 'India', 'Gujarat', 'Ririu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appetizers`
--
ALTER TABLE `appetizers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chef_reg`
--
ALTER TABLE `chef_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooks`
--
ALTER TABLE `cooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_course`
--
ALTER TABLE `main_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appetizers`
--
ALTER TABLE `appetizers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chef_reg`
--
ALTER TABLE `chef_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cooks`
--
ALTER TABLE `cooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_course`
--
ALTER TABLE `main_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
