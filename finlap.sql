-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 02:59 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finlap`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `operation` varchar(24) DEFAULT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `balance` decimal(10,2) DEFAULT 0.00,
  `account_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `operation`, `memo`, `created_at`, `updated_at`, `balance`, `account_type`, `created_by`, `updated_by`) VALUES
(1, 'Cash ', 'Increase', 'eeee', 1641805136, 1649677270, '-25000.00', 1, 2, 2),
(2, 'Computers', 'Increase', '', 1649256103, 1649683026, '-25000.00', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `account_categories`
--

CREATE TABLE `account_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `memo` varchar(125) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_categories`
--

INSERT INTO `account_categories` (`id`, `name`, `memo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Asset ', 'xxxx', 1641804970, 1641804970, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `account` varchar(55) NOT NULL,
  `name` char(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `currency` varchar(55) NOT NULL,
  `balance` decimal(10,2) DEFAULT 0.00,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`account`, `name`, `bank`, `created_at`, `updated_at`, `currency`, `balance`, `created_by`, `updated_by`) VALUES
('1111-11', 'LAP', 'BANK OF KIGALI', 1641805237, 1649677270, 'RWF', '75000.00', 2, 2),
('1111-133', 'LAP', 'BANK OF KIGALI', 1649256884, 1649683026, 'USD', '-25000.00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `no` varchar(55) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `bill_document` varchar(100) DEFAULT NULL,
  `purchase_order` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) DEFAULT 0,
  `branch` varchar(45) NOT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`no`, `created_at`, `updated_at`, `memo`, `bill_document`, `purchase_order`, `created_by`, `updated_by`, `status`, `branch`, `currency`) VALUES
('1', 1649402816, 1649676800, '', NULL, '202204/001', 2, 2, 1, '', ''),
('2', 1649414537, 1649414537, 'rrr', NULL, '202204/002', 2, 2, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `bill` varchar(55) NOT NULL,
  `purchase_order` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `item` varchar(25) NOT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`quantity`, `price`, `tax`, `created_at`, `updated_at`, `bill`, `purchase_order`, `created_by`, `updated_by`, `item`, `currency`) VALUES
(5, 5000, 18, 1649402816, 1649402816, '1', '202204/001', 2, 2, 'Coffe', ''),
(5, 5000, 18, 1649414537, 1649414537, '2', '202204/002', 2, 2, 'ddddd', '');

-- --------------------------------------------------------

--
-- Table structure for table `bill_payments`
--

CREATE TABLE `bill_payments` (
  `no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `payment_mode` varchar(55) NOT NULL,
  `bill` varchar(55) NOT NULL,
  `purchase_order` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `bank_account` varchar(55) NOT NULL,
  `branch` int(11) NOT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_payments`
--

INSERT INTO `bill_payments` (`no`, `amount`, `created_at`, `updated_at`, `payment_mode`, `bill`, `purchase_order`, `created_by`, `updated_by`, `account`, `bank_account`, `branch`, `currency`) VALUES
(3, 100000, 1649418740, 1649418740, 'Africa/Kigali', '2', '202204/002', 2, 2, 1, '1111-11', 0, ''),
(4, 100000, 1649666658, 1649666658, 'Africa/Kigali', '1', '202204/001', 2, 2, 1, '1111-133', 0, ''),
(5, 25000, 1649676515, 1649676515, 'Africa/Kigali', '1', '202204/001', 2, 2, 1, '1111-11', 0, ''),
(6, 25000, 1649676800, 1649676800, 'Africa/Kigali', '1', '202204/001', 2, 2, 1, '1111-11', 0, ''),
(7, 25000, 1649676843, 1649676843, 'Africa/Kigali', '1', '202204/001', 2, 2, 1, '1111-11', 0, ''),
(8, 25000, 1649677061, 1649677061, 'Africa/Kigali', '1', '202204/001', 2, 2, 1, '1111-11', 0, ''),
(9, 25000, 1649677239, 1649677239, 'Africa/Kigali', '1', '202204/001', 2, 2, 1, '1111-11', 0, ''),
(10, 25000, 1649677270, 1649677270, 'Africa/Kigali', '1', '202204/001', 2, 2, 1, '1111-11', 0, ''),
(11, 25000, 1649683025, 1649683025, 'Africa/Kigali', '1', '202204/001', 2, 2, 2, '1111-133', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `location`, `contact`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'MAIN', 'Kigali', '783883833', NULL, NULL, NULL, NULL),
(2, 'NYABUGOGO', 'KIGALI', '22222222', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_service`
--

CREATE TABLE `branch_service` (
  `branch` int(11) NOT NULL,
  `service` varchar(45) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_service`
--

INSERT INTO `branch_service` (`branch`, `service`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Parking', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `abr` varchar(10) NOT NULL,
  `name` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`abr`, `name`) VALUES
('RWF', 'Rwanda Frangs');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `country_code` int(11) DEFAULT NULL,
  `contact` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `web` varchar(55) DEFAULT NULL,
  `skype` varchar(55) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `type`, `address`, `country`, `country_code`, `contact`, `fax`, `email`, `web`, `skype`, `created_at`, `updated_at`, `status`, `created_by`, `updated_by`) VALUES
('32222', 'Desire HABIMANA', '1', 'Hyundai Building, KK 6 Ave', 'Kigali', 1, 11111111, NULL, 'habimana.desire@lapafrica.com', '', '', 1641285171, 1641285171, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `estmates`
--

CREATE TABLE `estmates` (
  `no` varchar(55) NOT NULL,
  `expiration_date` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `branch` int(11) NOT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estmates`
--

INSERT INTO `estmates` (`no`, `expiration_date`, `status`, `discount`, `created_at`, `updated_at`, `memo`, `created_by`, `updated_by`, `customer`, `branch`, `currency`) VALUES
('11111', '2022-01-01', 1, 0, 1641974023, 1641974023, '', 2, 2, '32222', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `estmate_details`
--

CREATE TABLE `estmate_details` (
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `item` varchar(25) NOT NULL,
  `estimate` varchar(55) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estmate_details`
--

INSERT INTO `estmate_details` (`quantity`, `price`, `created_at`, `updated_at`, `item`, `estimate`, `created_by`, `updated_by`, `currency`) VALUES
(11, 1000, 1641974023, 1641974023, 'Coffe', '11111', 2, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `no` varchar(55) NOT NULL,
  `discount` int(11) NOT NULL,
  `memo` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT '0',
  `payment_due` varchar(25) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `branch` int(11) DEFAULT NULL,
  `idate` varchar(45) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`no`, `discount`, `memo`, `status`, `payment_due`, `created_at`, `updated_at`, `customer`, `created_by`, `updated_by`, `branch`, `idate`, `currency`) VALUES
('11111', 0, '', '1', '', 1641980788, 1641980788, '32222', 2, 2, NULL, NULL, NULL),
('112', 0, '2222', '1', '', 1655975283, 1655975283, '32222', 2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `reconciled` int(11) NOT NULL,
  `item` varchar(25) NOT NULL,
  `invoice` varchar(55) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`quantity`, `price`, `currency`, `created_at`, `updated_at`, `reconciled`, `item`, `invoice`, `created_by`, `updated_by`) VALUES
(1, 10000, 0, 1641980788, 1641980788, 0, 'Coffe', '11111', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `payment_mode` varchar(45) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `invoice` varchar(55) NOT NULL,
  `account` int(11) NOT NULL,
  `bank_account` varchar(55) NOT NULL,
  `branch` int(11) DEFAULT NULL,
  `_date` varchar(45) DEFAULT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`no`, `amount`, `created_at`, `updated_at`, `payment_mode`, `created_by`, `updated_by`, `invoice`, `account`, `bank_account`, `branch`, `_date`, `currency`) VALUES
(4, 10000, 1646747201, 1646747201, 'Africa/Kigali', 2, 2, '11111', 1, '1111-11', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `tax` int(11) DEFAULT 0,
  `quantitt` int(11) DEFAULT 0,
  `buying_price` int(11) DEFAULT 0,
  `selling_price` int(11) DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `memo` varchar(100) DEFAULT NULL,
  `unit` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `type`, `code`, `category`, `tax`, `quantitt`, `buying_price`, `selling_price`, `created_at`, `updated_at`, `status`, `memo`, `unit`, `created_by`, `updated_by`) VALUES
('Coffe', 0, 'Coffe', NULL, 18, NULL, NULL, NULL, 1641281995, 1641281995, 1, '', 'KG', 1, 1),
('ddd', 1, 'ddddd', 'dddddd', 12, 222, 222, 222, 1641232954, 1641232954, 0, '22222', '1wwww', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `no` varchar(10) NOT NULL,
  `status` int(11) DEFAULT 0,
  `billing_cycle` varchar(55) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `supplier` varchar(25) NOT NULL,
  `branch` int(11) NOT NULL,
  `currency` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`no`, `status`, `billing_cycle`, `created_at`, `updated_at`, `created_by`, `updated_by`, `supplier`, `branch`, `currency`) VALUES
('202204/001', 1, 'aaaa', 1649324984, 1649324984, 2, 2, '111', 0, NULL),
('202204/002', 1, 'aaaa', 1649325012, 1649414537, 2, 2, '111', 0, NULL),
('202204/003', 0, 'Montly', 1649664506, 1649664506, 2, 2, '111', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

CREATE TABLE `purchase_order_details` (
  `no` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `product` varchar(25) NOT NULL,
  `order_no` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`no`, `created_at`, `updated_at`, `quantity`, `price`, `memo`, `tax`, `product`, `order_no`, `created_by`, `updated_by`, `currency`) VALUES
(2, 1649325012, 1649325012, 555, 5000, NULL, NULL, 'ddddd', '202204/002', 2, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `title`, `branch`, `currency`) VALUES
(1, 'XXXXXXX', NULL, ''),
(2, 'ttttttttttttttttttttttttttt', NULL, ''),
(3, '1111111111', NULL, ''),
(4, '44444', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `id` int(11) NOT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_detail`
--

INSERT INTO `receipt_detail` (`id`, `receipt_id`, `item_name`, `currency`) VALUES
(1, 1, 'ZZZZZZZZZZZ', ''),
(2, 1, 'YYYYYYYYYYYYY', ''),
(3, 1, 'KKKKKKKKKKKKKKKKK', ''),
(4, 2, 'ZZZZZZZZZZZ', ''),
(5, 2, 'YYYYYYYYYYYYY', ''),
(6, 2, 'KKKKKKKKKKKKKKKKK', ''),
(7, 3, 'ZZZZZZZZZZZ', ''),
(8, 3, 'YYYYYYYYYYYYY', ''),
(9, 3, 'KKKKKKKKKKKKKKKKK', ''),
(10, 4, 'ZZZZZoooo', ''),
(11, 4, 'ooooo', '');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `web` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `country`, `country_code`, `contact`, `email`, `web`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('111', 'Desire HABIMANA', 'Hyundai Building, KK 6 Ave', 'Kigali', 'Rwanda', NULL, 'habimana.desire@lapafrica.com', NULL, 1641287115, 1641287115, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cr` int(11) NOT NULL,
  `dr` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `branch` int(11) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token_id` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `lang` varchar(100) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `token_id`, `is_active`, `lang`, `mobile`, `role`, `created_by`, `updated_by`, `created_at`, `updated_at`, `branch`) VALUES
(1, 'Desire Habimana', 'habdes', '$2y$13$lMFdp5Af3zBTY7y.mJXTA.orDobJO1qlSZZPc72153K5ZrQ1XoEUC', NULL, 1, 'fr', 785495363, 101, 1, 1, NULL, 1641299884, NULL),
(2, '0785495363', '0785495363', '$2y$13$ARTjz4EWlAvIZr7xdg6ptOIcX9MOfEQxa9ipMthQ4XzxpGn4VVNuS', '', 1, 'en', NULL, 101, 1, 2, 1641214752, 1675414128, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_type` (`account_type`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `account_categories`
--
ALTER TABLE `account_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`account`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`no`,`purchase_order`),
  ADD KEY `purchase_order` (`purchase_order`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`bill`,`purchase_order`,`item`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `bill_payments`
--
ALTER TABLE `bill_payments`
  ADD PRIMARY KEY (`no`),
  ADD KEY `bill` (`bill`,`purchase_order`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `account` (`account`),
  ADD KEY `bank_account` (`bank_account`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `branch_service`
--
ALTER TABLE `branch_service`
  ADD PRIMARY KEY (`branch`,`service`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`abr`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `estmates`
--
ALTER TABLE `estmates`
  ADD PRIMARY KEY (`no`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `customer` (`customer`);

--
-- Indexes for table `estmate_details`
--
ALTER TABLE `estmate_details`
  ADD PRIMARY KEY (`item`,`estimate`),
  ADD KEY `estimate` (`estimate`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`no`),
  ADD KEY `customer` (`customer`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`item`,`invoice`),
  ADD KEY `invoice` (`invoice`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `invoice` (`invoice`),
  ADD KEY `account` (`account`),
  ADD KEY `bank_account` (`bank_account`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`code`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`no`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `supplier` (`supplier`),
  ADD KEY `purchase_orders_ibfk_4_idx` (`branch`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `product` (`product`,`order_no`),
  ADD KEY `order_no` (`order_no`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_detail_receipt_fk` (`receipt_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account` (`account`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_categories`
--
ALTER TABLE `account_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_payments`
--
ALTER TABLE `bill_payments`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`account_type`) REFERENCES `account_categories` (`id`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `account_categories`
--
ALTER TABLE `account_categories`
  ADD CONSTRAINT `account_categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `account_categories_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `bank_accounts_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`purchase_order`) REFERENCES `purchase_orders` (`no`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `bills_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_ibfk_1` FOREIGN KEY (`bill`,`purchase_order`) REFERENCES `bills` (`no`, `purchase_order`),
  ADD CONSTRAINT `bill_details_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `bill_details_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `bill_details_ibfk_4` FOREIGN KEY (`item`) REFERENCES `products` (`code`);

--
-- Constraints for table `bill_payments`
--
ALTER TABLE `bill_payments`
  ADD CONSTRAINT `bill_payments_ibfk_1` FOREIGN KEY (`bill`,`purchase_order`) REFERENCES `bills` (`no`, `purchase_order`),
  ADD CONSTRAINT `bill_payments_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `bill_payments_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `bill_payments_ibfk_4` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `bill_payments_ibfk_5` FOREIGN KEY (`bank_account`) REFERENCES `bank_accounts` (`account`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `estmates`
--
ALTER TABLE `estmates`
  ADD CONSTRAINT `estmates_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `estmates_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `estmates_ibfk_3` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`);

--
-- Constraints for table `estmate_details`
--
ALTER TABLE `estmate_details`
  ADD CONSTRAINT `estmate_details_ibfk_1` FOREIGN KEY (`item`) REFERENCES `products` (`code`),
  ADD CONSTRAINT `estmate_details_ibfk_2` FOREIGN KEY (`estimate`) REFERENCES `estmates` (`no`),
  ADD CONSTRAINT `estmate_details_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `estmate_details_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `invoices_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`item`) REFERENCES `products` (`code`),
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`invoice`) REFERENCES `invoices` (`no`),
  ADD CONSTRAINT `invoice_details_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `invoice_details_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD CONSTRAINT `invoice_payments_ibfk_3` FOREIGN KEY (`invoice`) REFERENCES `invoices` (`no`),
  ADD CONSTRAINT `invoice_payments_ibfk_4` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `invoice_payments_ibfk_5` FOREIGN KEY (`bank_account`) REFERENCES `bank_accounts` (`account`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `purchase_orders_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `purchase_orders_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `purchase_orders_ibfk_3` FOREIGN KEY (`supplier`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD CONSTRAINT `purchase_order_details_ibfk_1` FOREIGN KEY (`product`) REFERENCES `products` (`code`),
  ADD CONSTRAINT `purchase_order_details_ibfk_2` FOREIGN KEY (`order_no`) REFERENCES `purchase_orders` (`no`),
  ADD CONSTRAINT `purchase_order_details_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `purchase_order_details_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD CONSTRAINT `receipt_detail_receipt_fk` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `suppliers_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
