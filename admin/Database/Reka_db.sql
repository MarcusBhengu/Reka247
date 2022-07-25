-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:3306
-- Generation Time: Apr 02, 2022 at 08:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Reka_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attributes`
--

CREATE TABLE `Attributes` (
  `attribute_id` int(100) NOT NULL,
  `attribute_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Attributes`
--

INSERT INTO `Attributes` (`attribute_id`, `attribute_name`) VALUES
(1, 'Color'),
(2, 'Size'),
(3, 'Material');

-- --------------------------------------------------------

--
-- Table structure for table `Brands`
--

CREATE TABLE `Brands` (
  `brand_id` int(11) NOT NULL,
  `brand_supplier` varchar(30) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Brands`
--

INSERT INTO `Brands` (`brand_id`, `brand_supplier`, `brand_name`) VALUES
(8, 'Mduduzi Dlamini', 'Grenade');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`category_id`, `category_name`) VALUES
(1, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `company_id` int(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(500) NOT NULL,
  `company_phone` varchar(20) NOT NULL,
  `company_vat` int(15) NOT NULL,
  `company_mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`company_id`, `company_name`, `company_address`, `company_phone`, `company_vat`, `company_mail`) VALUES
(2, 'Reka 247', 'Midstream', '(+27) 88 696-9696', 15, 'info@reka247.co.za');

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_status` varchar(15) NOT NULL,
  `customer_date` date DEFAULT current_timestamp(),
  `customer_mail` varchar(30) NOT NULL,
  `customer_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`customer_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_status`, `customer_date`, `customer_mail`, `customer_password`) VALUES
(2, 'Sthandwa Dlamini', '11127 matikweni', '(+27) 85 808-7609', 'Offline', '2022-03-28', 'sthandwa@gmail.com', 'Sthandwa@11'),
(3, 'Bongane Bhengu', 'Holton', '(+27) 34 343-6666', 'Online', '2022-03-28', 'bongane@sage.com', 'Bongane@11');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `product_id` int(100) DEFAULT NULL,
  `product_name` varchar(300) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL,
  `order_status` varchar(30) DEFAULT NULL,
  `order_arrival_date` date DEFAULT current_timestamp(),
  `order_quantity` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `customer_id`, `customer_name`, `product_id`, `product_name`, `product_price`, `order_status`, `order_arrival_date`, `order_quantity`) VALUES
(1, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Delivered', '2022-04-01', 20),
(2, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Delivered', '2022-04-01', 20),
(3, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 1),
(4, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 3),
(5, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 6),
(6, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 2),
(7, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 9),
(8, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 8),
(9, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 6),
(10, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 7),
(11, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 7),
(12, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 7),
(13, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 6),
(14, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 8),
(15, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 9),
(16, 3, 'Sthandwa Dlamini', 20, 'Round Neck T-shirt', '100', 'Processed', '2022-04-01', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `product_id` int(100) NOT NULL,
  `supplier_id` varchar(100) DEFAULT NULL,
  `brand_id` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_description` varchar(300) DEFAULT NULL,
  `attributes_id` varchar(100) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL,
  `product_main_category` varchar(100) DEFAULT NULL,
  `product_status` varchar(30) DEFAULT NULL,
  `product_arrival_date` date DEFAULT current_timestamp(),
  `product_quantity` int(100) DEFAULT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`product_id`, `supplier_id`, `brand_id`, `product_name`, `product_description`, `attributes_id`, `product_price`, `product_main_category`, `product_status`, `product_arrival_date`, `product_quantity`, `product_image`) VALUES
(20, 'Mduduzi Dlamini', 'Grenade', 'Round Neck T-shirt', 'Gym t-shirt, strong t-shirt for strong body', 'Size', '100', 'Clothing', 'Active', '2022-04-01', 7, '624674268d8a5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Sub_Attributes`
--

CREATE TABLE `Sub_Attributes` (
  `sub_attribute_id` int(100) NOT NULL,
  `attribute_name` varchar(100) NOT NULL,
  `sub_attribute_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Sub_Attributes`
--

INSERT INTO `Sub_Attributes` (`sub_attribute_id`, `attribute_name`, `sub_attribute_name`) VALUES
(2, 'Color', 'Red'),
(3, 'Color', 'Green'),
(4, 'Size', 'S'),
(7, 'Size', 'M'),
(9, 'Size', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `Sub_Category`
--

CREATE TABLE `Sub_Category` (
  `sub_category_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Sub_Category`
--

INSERT INTO `Sub_Category` (`sub_category_id`, `category_name`, `sub_category_name`) VALUES
(5, 'Clothing', 'Men');

-- --------------------------------------------------------

--
-- Table structure for table `Suppliers`
--

CREATE TABLE `Suppliers` (
  `supplier_id` int(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_company_name` varchar(100) NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  `supplier_status` varchar(15) NOT NULL,
  `supplier_date` date DEFAULT current_timestamp(),
  `supplier_image` varchar(224) DEFAULT NULL,
  `supplier_mail` varchar(30) NOT NULL,
  `supplier_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Suppliers`
--

INSERT INTO `Suppliers` (`supplier_id`, `supplier_name`, `supplier_company_name`, `supplier_phone`, `supplier_status`, `supplier_date`, `supplier_image`, `supplier_mail`, `supplier_password`) VALUES
(9, 'Mduduzi Dlamini', 'Grenade', '(+27) 99 485-8858', 'Active', '2022-04-01', NULL, 'mduduzi@grenade.co.za', 'Mduduzi@11');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `users_id` int(100) NOT NULL,
  `users_name` varchar(100) NOT NULL,
  `users_position` varchar(100) NOT NULL,
  `users_phone` varchar(20) NOT NULL,
  `users_status` varchar(15) NOT NULL,
  `users_date` date DEFAULT current_timestamp(),
  `users_email` varchar(30) NOT NULL,
  `users_password` varchar(20) NOT NULL,
  `users_immage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`users_id`, `users_name`, `users_position`, `users_phone`, `users_status`, `users_date`, `users_email`, `users_password`, `users_immage`) VALUES
(1, 'Mduduzi Magaduzela', 'Administrator', '(+27) 45 355-3666', 'Offline', '2022-03-28', 'mduduzi@reka.co.za', 'Mduduzi@11', ''),
(3, 'Mr LandLord Paris', 'CEO', '(+27) 07 607-0707', 'Offline', '2022-03-29', 'paris@reka.co.za', 'Paris@11', ''),
(4, 'Tshepiso Sekudu', 'CEO', '(+27) 95 959-5959', 'Offline', '2022-03-31', 'tshepiso@reka.co.za', 'Tshepiso@11', '624602ce6eaee.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attributes`
--
ALTER TABLE `Attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `Brands`
--
ALTER TABLE `Brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `Sub_Attributes`
--
ALTER TABLE `Sub_Attributes`
  ADD PRIMARY KEY (`sub_attribute_id`);

--
-- Indexes for table `Sub_Category`
--
ALTER TABLE `Sub_Category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `Suppliers`
--
ALTER TABLE `Suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attributes`
--
ALTER TABLE `Attributes`
  MODIFY `attribute_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Brands`
--
ALTER TABLE `Brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `company_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Sub_Attributes`
--
ALTER TABLE `Sub_Attributes`
  MODIFY `sub_attribute_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Sub_Category`
--
ALTER TABLE `Sub_Category`
  MODIFY `sub_category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Suppliers`
--
ALTER TABLE `Suppliers`
  MODIFY `supplier_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `users_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
