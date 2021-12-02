-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 08:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msa`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `dob`, `password`, `mobile`, `email`) VALUES
('admin', 'Admin', '2021-11-09', '123456789', '9876543210', 'something@msa.com');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `rack` varchar(50) NOT NULL,
  `required` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `category`, `vendor_id`, `rack`, `required`) VALUES
(1, 'test1', 'cat1', 2, 'R5', '3'),
(2, 'test2', 'cat2', 3, 'T4', '0'),
(3, 'test3', 'cat3', 4, 't5', '0'),
(4, 'test4', 'cat4', 2, 'fds', '0'),
(5, 'gfdg', 'gfdgfd', 3, 'gf', '0'),
(6, 'Paracetamol', 'painkiller', 6, 'R7', '0');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

CREATE TABLE `medicine_stock` (
  `medicine_stock_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `mfg` date NOT NULL,
  `exp` date NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `purchase_price` varchar(50) NOT NULL,
  `selling_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_stock`
--

INSERT INTO `medicine_stock` (`medicine_stock_id`, `medicine_id`, `batch_no`, `mfg`, `exp`, `quantity`, `purchase_price`, `selling_price`) VALUES
(5, 1, 'test1B', '2021-12-01', '2023-06-30', '77', '120', '200'),
(6, 3, 'test3B', '2021-12-01', '2023-02-28', '35', '150', '250'),
(14, 3, 'kjhkh', '2021-07-01', '2021-10-31', '4', '1', '1'),
(15, 1, 'jkh', '2021-06-01', '2021-07-31', '1', '765', '765'),
(16, 3, 'jhg', '2021-02-01', '2021-06-30', '3', '765', '765'),
(21, 1, 'ytr', '2021-07-01', '2021-01-31', '2', '654', '54654'),
(22, 4, 'ghf', '2021-07-01', '2021-07-31', '2', '6546', '564'),
(30, 4, 'tre', '2021-10-01', '2021-07-31', '4', '45', '5454'),
(31, 3, '543', '2021-06-01', '2021-07-31', '4', '54', '545'),
(36, 2, 'D240', '2021-10-01', '2023-06-30', '0', '100', '150'),
(37, 6, 'DT2562', '2021-11-01', '2023-06-30', '15', '100', '150');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `purchase_price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `medicine_id`, `date`, `purchase_price`, `quantity`, `paid`) VALUES
(1, 1, '2021-12-01', '56', '15', 'YES'),
(2, 3, '2021-12-01', '56', '20', 'YES'),
(3, 1, '2021-12-01', '80', '5', 'YES'),
(4, 4, '2021-12-01', '45', '4', 'YES'),
(5, 3, '2021-12-01', '54', '4', 'YES'),
(6, 5, '2021-12-01', '54', '3', 'YES'),
(7, 1, '2021-12-01', '100', '5', 'YES'),
(8, 2, '2021-12-01', '10', '1', 'YES'),
(9, 1, '2021-12-01', '10', '1', 'YES'),
(10, 2, '2021-12-02', '100', '15', 'YES'),
(11, 6, '2021-12-02', '100', '15', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `invoice_id` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `total_amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`invoice_id`, `date_time`, `total_amount`) VALUES
('20211201045645', '2021-12-01 04:56:45', '450'),
('20211201051246', '2021-12-01 05:12:46', '450'),
('20211201051338', '2021-12-01 05:13:38', '450'),
('20211201051533', '2021-12-01 05:15:33', '1150'),
('20211201061953', '2021-12-01 06:19:53', '1150'),
('20211201062152', '2021-12-01 06:21:52', '450'),
('20211201062316', '2021-12-01 06:23:16', '450'),
('20211201062551', '2021-12-01 06:25:51', '1150'),
('20211201063947', '2021-12-01 06:39:47', '700'),
('20211201064022', '2021-12-01 06:40:22', '450'),
('20211201064234', '2021-12-01 06:42:34', '2250'),
('20211201064340', '2021-12-01 06:43:40', '1500'),
('20211201064359', '2021-12-01 06:43:59', '1750'),
('20211201065138', '2021-12-01 06:51:38', '1150'),
('20211201065207', '2021-12-01 06:52:07', '1100'),
('20211202063931', '2021-12-02 06:39:31', '2250'),
('20211202080152', '2021-12-02 08:01:52', '600');

-- --------------------------------------------------------

--
-- Table structure for table `sold_medicine`
--

CREATE TABLE `sold_medicine` (
  `sold_item_id` int(11) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_medicine`
--

INSERT INTO `sold_medicine` (`sold_item_id`, `invoice_id`, `medicine_id`, `quantity`, `price`) VALUES
(32, '20211201064234', 1, '5', '200'),
(34, '20211201064340', 1, '5', '200'),
(36, '20211201064359', 1, '5', '200'),
(38, '20211201065138', 1, '2', '200'),
(40, '20211201065207', 1, '3', '200'),
(42, '20211202063931', 2, '15', '150'),
(43, '20211202080152', 1, '3', '200');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `name`, `address`, `phone`, `email`, `account_no`, `ifsc_code`) VALUES
(2, 'Alkem', 'Mumbai, India', '9876543210', 'something@alkem.com', '541456164164', 'SBIN4564IN'),
(3, 'hgf', 'hgfh', '6451324316', 'hgf@gfd', '765', 'SBIN5615'),
(4, 'fdsfds', 'fdsf', '6491364875', 'dsfds@gfd', '543', 'SBIN65'),
(5, 'Natcom', 'acb, india', '9876543210', 'some@xyz.com', '645137942', 'SBIN4564'),
(6, 'Cipla', 'mumbai,india', '9765412364', 'some@abc.com', '8975465155', 'SBIN45684');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  ADD PRIMARY KEY (`medicine_stock_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `sold_medicine`
--
ALTER TABLE `sold_medicine`
  ADD PRIMARY KEY (`sold_item_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  MODIFY `medicine_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sold_medicine`
--
ALTER TABLE `sold_medicine`
  MODIFY `sold_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
