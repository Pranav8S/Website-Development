-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2019 at 08:47 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `mobile_number`, `email`, `pwd`, `address`) VALUES
(1, 'pppp', 2222222222, 'xjv@g.com', '123', 'kalyan'),
(2, 'ppppp', 9999999999, 'p@g.com', '123', 'nerul'),
(3, 'asdf', 11111111111, 'e@g.com', 'pp', 'banglore'),
(4, 'pa', 8888888888, 'ppp@g.com', 'abcd', 'delhi');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `fb` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `mobile_number`, `fb`) VALUES
('pranav', 'ppp@g.com', 9896995544, 'good'),
('vivek', 'vivek@hotmail.com', 4565423120, 'bad'),
('ganesh', 'g@h.com', 7898654520, 'fair'),
('ppp', 'ppp@g.com', 8956412230, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orderid`
--

CREATE TABLE `orderid` (
  `id` int(10) NOT NULL,
  `t1` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderid`
--

INSERT INTO `orderid` (`id`, `t1`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `product` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `amount` float NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`product`, `user`, `quantity`, `amount`, `order_id`) VALUES
('ram', 'user', 2, 10000, 17),
('ram', 'user', 3, 15000, 18),
('cpu', 'user', 1, 5000, 18),
('gpu', 'user', 1, 20000, 18),
('ram', 'ppp@g.com', 3, 15000, 19),
('cpu', 'ppp@g.com', 1, 5000, 19),
('gpu', 'ppp@g.com', 1, 20000, 19),
('ram', 'ppp@g.com', 3, 15000, 20),
('cpu', 'ppp@g.com', 1, 5000, 20),
('gpu', 'ppp@g.com', 1, 20000, 20),
('ram', 'ppp@g.com', 3, 15000, 21),
('cpu', 'ppp@g.com', 1, 5000, 21),
('gpu', 'ppp@g.com', 1, 20000, 21),
('gpu', 'ppp@g.com', 2, 40000, 22),
('cpu', 'ppp@g.com', 1, 5000, 22),
('ram', 'ppp@g.com', 1, 5000, 22),
('ram', 'ppp@g.com', 2, 10000, 23),
('gpu', 'ppp@g.com', 1, 20000, 23),
('gpu', 'ppp@g.com', 1, 1500, 24),
('ram', 'ppp@g.com', 1, 25500, 24);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(10) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pcost` int(10) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `pname`, `pcost`, `stock`) VALUES
(2, 'gpu', 1500, 5),
(3, 'ram', 25500, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orderid`
--
ALTER TABLE `orderid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`pname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderid`
--
ALTER TABLE `orderid`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
