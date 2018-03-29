-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 10:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'rishabh', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `c_id` int(5) NOT NULL,
  `bill_id` int(5) NOT NULL,
  `amount` decimal(7,0) NOT NULL,
  `quantity` int(5) NOT NULL,
  `paid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`c_id`, `bill_id`, `amount`, `quantity`, `paid`) VALUES
(1, 9, '250', 5, 1),
(1, 10, '50', 1, 1),
(1, 11, '125', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_summary`
--

CREATE TABLE `bill_summary` (
  `bill_id` int(5) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `rate` int(7) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_summary`
--

INSERT INTO `bill_summary` (`bill_id`, `pname`, `rate`, `quantity`) VALUES
(9, 'sample1', 50, 5),
(10, 'sample1', 50, 1),
(11, 'sample1', 50, 2),
(11, 'sample2', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_id` int(5) NOT NULL,
  `Cust_Name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `login` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_id`, `Cust_Name`, `username`, `password`, `login`) VALUES
(1, 'Test1', 'test1', '12345', 0),
(2, 'Test2', 'test2', '23456', 0),
(5, 'Test3', 'test3', '98765', 0),
(6, 'Rishabh', 'dhoot', 'Rish', 0),
(7, 'phanindra', 'kothuri', 'phani', 0),
(8, 'ph', 'handy', 'phanindra', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_Id` int(5) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Price` decimal(7,0) NOT NULL,
  `Stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Product_Name`, `Price`, `Stock`) VALUES
(5, 'sample1', '50', 18),
(9, 'sample2', '25', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `bill_summary`
--
ALTER TABLE `bill_summary`
  ADD PRIMARY KEY (`bill_id`,`pname`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
