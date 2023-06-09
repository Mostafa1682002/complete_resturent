-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 12:50 AM
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
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'mostafaxxx', '9addbf544119efa4a64223b649750a510f0d463f'),
(4, 'mostafa', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message_text` text NOT NULL,
  `message_register` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_id`, `name`, `email`, `number`, `message_text`, `message_register`) VALUES
(1, 0, 'mostafa168522222', 'ma@131.gmail.com', '01064564850', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2023-04-04'),
(2, 0, 'xxxxxxxx', 'xxxxx', '01064564850', 'xxxxxx', '2023-04-18'),
(3, 0, 'مصطفي حسام رزق سيد', 'ma9856603@gmail.com', '0104685232', 'مشكلة منتج 1', '2023-04-18'),
(4, 0, 'مصطفي حسام رزق سيد', 'ma9856603@gmail.com', '1123', 'xvzxczxcbzcxb', '2023-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `total_products` varchar(500) NOT NULL,
  `total_price` int(11) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'xxx', '01064564850', 'most1682002@gmail.com', 'xxxxxxxxxxxxxx', 'cairo', 'pizza 01 (1) - main dish 02 (3)', 50, '2023-04-15', 'pending'),
(2, 1, 'car', '01064564850', 'most1682002@gmail.com', 'xxxxxxxxxxxxxx', 'cccccc', 'ccccc', 150, '2023-04-21', 'completed'),
(3, 6, ' مصطفي حسام رزق سيد احمد', ' مصطفي حسام رزق سيد احمد', 'ma9856603@gmail.com', 'paytm', 'Mansoura.', 'delicious pizza 02(7) - ', 14, '2023-04-21', 'completed'),
(4, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'credit card', '30-rubik-Mansoura.', 'fresh drink 01(7) - delicious dessert 04(8) - ', 124, '2023-04-22', 'pending'),
(5, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'cash on delivery', '30-rubik-Mansoura.', 'main dish 01(7) - delicious pizza 01(1) - delicious dessert 01(5) - main dish 02(7) - ', 59, '2023-05-06', 'pending'),
(6, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'cash on delivery', '30-rubik-Mansoura.', '', 0, '2023-05-06', 'pending'),
(7, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'cash on delivery', '30-rubik-Mansoura.', '', 0, '2023-05-06', 'pending'),
(8, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'paytm', '30-rubik-Mansoura.', 'main dish 01(5) - ', 10, '2023-05-06', 'pending'),
(9, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'paytm', '30-rubik-Mansoura.', 'main dish 01(1) - ', 2, '2023-05-06', 'pending'),
(10, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'paytm', '30-rubik-Mansoura.', '', 0, '2023-05-06', 'pending'),
(11, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'credit card', '30-rubik-Mansoura.', '', 0, '2023-05-06', 'pending'),
(12, 6, 'Mostafa Hossam Rizk', '01013590372', 'ma9856603@gmail.com', 'credit card', '30-rubik-Mansoura.', 'main dish 01(5) - ', 10, '2023-05-06', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_price`, `product_img`) VALUES
(9, 'delicious pizza 01', 'fast food', 12, '2122239085pizza-1.png'),
(10, 'main dish 01', 'main dish', 2, 'dish-1.png'),
(11, 'chezzy hamburger 01', 'fast food', 3, 'burger-1.png'),
(12, 'delicious dessert 01', 'desserts', 1, 'dessert-1.png'),
(13, 'fresh drink 01', 'drinks', 4, 'drink-1.png'),
(14, 'main dish 02', 'main dish', 4, 'dish-2.png'),
(15, 'chezzy hamburger 02', 'fast food', 3, 'burger-2.png'),
(16, 'delicious pizza 02', 'fast food', 2, 'pizza-2.png'),
(17, 'delicious dessert 02', 'desserts', 5, 'dessert-2.png'),
(18, 'delicious dessert 03', 'desserts', 10, 'dessert-3.png'),
(19, 'delicious dessert 04', 'desserts', 12, 'dessert-4.png'),
(20, 'delicious pizza 03', 'fast food', 14, 'pizza-3.png'),
(21, 'delicious pizza 04', 'fast food', 14, 'pizza-4.png'),
(22, 'fresh drink 02', 'drinks', 8, 'drink-2.png'),
(23, 'fresh drink 03', 'drinks', 7, 'drink-3.png'),
(24, 'fresh drink 04', 'drinks', 10, '735885885drink-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_number` varchar(12) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(200) NOT NULL DEFAULT 'xx',
  `user_register` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_number`, `user_password`, `user_address`, `user_register`) VALUES
(3, 'ali', 'ali@gmail.com', '01064564850', '123456', 'cairo', '2023-04-06'),
(5, 'ali222', 'ali222@gmail.com', '01064564850', '123456', 'cairo', '2023-04-06'),
(6, 'Mostafa Hossam Rizk', 'ma9856603@gmail.com', '01013590372', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '30-rubik-Mansoura.', '2023-04-16'),
(7, 'Khaled Hassan', 'Khaled1020@gmail.com', '01064564789', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Alex', '2023-04-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_img` (`product_img`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
