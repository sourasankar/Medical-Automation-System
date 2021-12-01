-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 05:16 PM
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
  `rack` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `category`, `vendor_id`, `rack`) VALUES
(1, 'test1', 'cat1', 2, 'R5'),
(2, 'test2', 'cat2', 3, 'T4'),
(3, 'test3', 'cat3', 4, 't5'),
(4, 'test4', 'cat4', 2, 'fds'),
(5, 'gfdg', 'gfdgfd', 3, 'gf');

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
(5, 1, 'test1B', '2021-12-01', '2023-06-30', '5', '120', '200'),
(6, 3, 'test3B', '2021-12-01', '2023-02-28', '10', '150', '250'),
(7, 2, 'gfd', '2021-06-01', '2021-07-31', '10', '14', '24'),
(8, 4, 'gfd', '2021-02-01', '2021-10-31', '15', '14', '24'),
(9, 1, 'gfd', '2021-06-01', '2021-07-31', '3', '654', '654'),
(10, 2, 'gfd', '2021-07-01', '2021-11-30', '2', '2', '1'),
(11, 1, 'gfd', '2021-07-01', '2021-11-30', '2', '1', '2'),
(12, 1, 'gfd', '2021-06-01', '2021-11-30', '3', '2', '2'),
(13, 1, 'kjh', '2021-07-01', '2021-11-30', '2', '1', '1'),
(14, 3, 'kjhkh', '2021-07-01', '2021-10-31', '4', '1', '1'),
(15, 1, 'jkh', '2021-06-01', '2021-07-31', '1', '765', '765'),
(16, 3, 'jhg', '2021-02-01', '2021-06-30', '3', '765', '765'),
(17, 1, 'gfd', '2021-06-01', '2021-11-30', '1', '645', '543'),
(18, 2, 'gfd', '2021-05-01', '2021-06-30', '1', '543', '654'),
(19, 1, 'fds', '2021-07-01', '2021-06-30', '2', '43', '342'),
(20, 3, 'fds', '2021-07-01', '2021-11-30', '3', '432', '432'),
(21, 1, 'ytr', '2021-07-01', '2021-01-31', '2', '654', '54654'),
(22, 4, 'ghf', '2021-07-01', '2021-07-31', '2', '6546', '564'),
(23, 1, 'hgf', '2021-10-01', '2021-07-31', '1', '5', '56'),
(24, 1, 'gfd', '2021-07-01', '2021-10-31', '1', '543', '543'),
(25, 4, 'gfd', '2021-06-01', '2021-02-28', '3', '543', '543'),
(26, 5, 'gfd', '2021-07-01', '2021-11-30', '4', '4', '54'),
(27, 2, 'gfd', '2021-06-01', '2021-06-30', '50', '2', '54'),
(28, 1, 'hgf', '2021-06-01', '2021-07-31', '15', '56', '7845'),
(29, 3, 'hgf', '2021-07-01', '2021-03-31', '20', '56', '7845'),
(30, 4, 'tre', '2021-10-01', '2021-07-31', '4', '45', '5454'),
(31, 3, '543', '2021-06-01', '2021-07-31', '4', '54', '545'),
(32, 5, 'gfd', '2021-07-01', '2021-07-31', '3', '54', '54'),
(33, 1, 'kootty', '2021-12-01', '2021-11-30', '5', '100', '200'),
(34, 2, 'soura', '2021-12-01', '2021-12-31', '1', '10', '50'),
(35, 1, 'something', '2021-07-01', '2022-01-31', '1', '10', '100');

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
(9, 1, '2021-12-01', '10', '1', 'YES');

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
('20211201051533', '2021-12-01 05:15:33', '1150');

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
(5, '20211201045645', 1, '3', '200'),
(6, '20211201045645', 3, '2', '250'),
(7, '20211201051246', 1, '2', '200'),
(8, '20211201051246', 3, '3', '250'),
(9, '20211201051338', 1, '2', '200'),
(10, '20211201051338', 3, '3', '250'),
(11, '20211201051533', 1, '2', '200'),
(12, '20211201051533', 3, '3', '250');

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
(3, 'hgf', 'hgfh', 'hgf', 'hgf@gfd', '765', '564hf'),
(4, 'fdsfds', 'fdsf', 'dsf', 'dsfds@gfd', '543', '543543');

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
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  MODIFY `medicine_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sold_medicine`
--
ALTER TABLE `sold_medicine`
  MODIFY `sold_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
