-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 10:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc_clothes_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_latest_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_latest_update`) VALUES
('GohWeeYang0001', 'Goh Wee Yang', '123456', '2025-01-01 15:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `clothes_id` int(11) NOT NULL,
  `clothes_name` varchar(100) NOT NULL,
  `clothes_type` int(11) NOT NULL,
  `clothes_brand` varchar(100) NOT NULL,
  `clothes_size` int(11) NOT NULL,
  `clothes_price` double NOT NULL,
  `clothes_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`clothes_id`, `clothes_name`, `clothes_type`, `clothes_brand`, `clothes_size`, `clothes_price`, `clothes_stock`) VALUES
(1, 'Nike T-Shirt V', 1, 'BD1', 0, 50, 20),
(2, 'Adidas Jeans A', 2, 'BD2', 2, 19.9, 126),
(3, 'Adidas Jacket A', 3, 'BD2', 4, 209.9, 35),
(4, 'Gucci Jacket V1', 3, 'BD3', 0, 3.2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `clothes_brand`
--

CREATE TABLE `clothes_brand` (
  `clothes_brand_id` varchar(100) NOT NULL,
  `clothes_brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes_brand`
--

INSERT INTO `clothes_brand` (`clothes_brand_id`, `clothes_brand_name`) VALUES
('BD1', 'Nike'),
('BD2', 'Adidas'),
('BD3', 'Gucci');

-- --------------------------------------------------------

--
-- Table structure for table `clothes_size`
--

CREATE TABLE `clothes_size` (
  `clothes_size_id` int(11) NOT NULL,
  `clothes_size_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes_size`
--

INSERT INTO `clothes_size` (`clothes_size_id`, `clothes_size_name`) VALUES
(0, 'XS'),
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'XXXL');

-- --------------------------------------------------------

--
-- Table structure for table `clothes_type`
--

CREATE TABLE `clothes_type` (
  `clothes_type_id` int(11) NOT NULL,
  `clothes_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes_type`
--

INSERT INTO `clothes_type` (`clothes_type_id`, `clothes_type_name`) VALUES
(1, 'T-Shirt'),
(2, 'Jeans'),
(3, 'Jacket');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`clothes_id`);

--
-- Indexes for table `clothes_brand`
--
ALTER TABLE `clothes_brand`
  ADD PRIMARY KEY (`clothes_brand_id`);

--
-- Indexes for table `clothes_size`
--
ALTER TABLE `clothes_size`
  ADD PRIMARY KEY (`clothes_size_id`);

--
-- Indexes for table `clothes_type`
--
ALTER TABLE `clothes_type`
  ADD PRIMARY KEY (`clothes_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `clothes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
