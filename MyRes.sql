-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Aug 23, 2020 at 12:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyRes`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_contact` bigint(10) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_address`, `customer_ip`) VALUES
(7, 'Aadil', 'aadiluit@gmail.com', '123', 3332275446, 'Maymar avenue, block-4, gulshan, karachi', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `cus_orders`
--

CREATE TABLE `cus_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_orders`
--

INSERT INTO `cus_orders` (`order_id`, `customer_id`, `due_amount`, `total_products`, `order_date`, `order_status`) VALUES
(5, 7, 1325, 1, '2020-08-22 20:33:41', 'Pending'),
(6, 7, 5025, 1, '2020-08-23 07:26:24', 'Pending'),
(7, 7, 540, 1, '2020-08-23 07:30:40', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `product_id` int(10) NOT NULL,
  `product_title` text NOT NULL,
  `product_des` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_img` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`product_id`, `product_title`, `product_des`, `product_price`, `product_img`, `date`, `status`) VALUES
(1, 'Deal 1', '9 Pcs Chicken+2 coleslaws+1 Fries+1.5L Drink', 1675, 'xs (1).png', '2020-08-22 15:10:50', 'Yes'),
(2, 'Deal 2', '4 Krunch Burgers + 4 pcs chicken + 2 rolls + 1.5 ltr drink', 1475, 'xs.jfif', '2020-08-22 15:10:50', 'Yes'),
(3, 'Deal 3', 'Bucket of 9 pieces of hot and crispy chicken', 1250, 'xs.png', '2020-08-22 15:10:50', 'Yes'),
(4, 'Krunch Burger', 'Enjoy a crispy Krunchy chicken\r\n\r\n\r\n', 195, '1.png', '2020-08-22 15:10:50', 'Yes'),
(5, 'Krunch Burgur with drink\r\n\r\n\r\n', 'Krunch Burger + 345 ml drink', 265, '2.png', '2020-08-22 15:10:50', 'Yes'),
(6, 'Zingeratha', 'Crispy zinger with paratha', 270, '3.png', '2020-08-22 15:10:50', 'Yes'),
(7, 'Rice & Spice', 'Rice and spice with delicious raita', 270, '4.png', '2020-08-22 15:10:50', 'Yes'),
(8, 'Bone & Boneless', '1 Pc. Chicken and 2 zinger strips', 275, '5.png', '2020-08-22 15:10:50', 'Yes'),
(9, 'Krunch Combo', 'Burger + fries + 345 ml drink', 365, '6.png', '2020-08-22 15:10:50', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `pend_orders`
--

CREATE TABLE `pend_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pend_orders`
--

INSERT INTO `pend_orders` (`order_id`, `customer_id`, `product_id`, `qty`, `order_status`) VALUES
(5, 7, 5, 5, 'Pending'),
(6, 7, 1, 3, 'Pending'),
(7, 7, 7, 2, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `cart_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `cus_orders`
--
ALTER TABLE `cus_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pend_orders`
--
ALTER TABLE `pend_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cus_orders`
--
ALTER TABLE `cus_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pend_orders`
--
ALTER TABLE `pend_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
