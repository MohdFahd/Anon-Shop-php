-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 03:28 PM
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
-- Database: `ecommernce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pro_id`, `qty`, `created_at`) VALUES
(18, 1, 84, 10, '2023-09-14 05:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` mediumtext NOT NULL,
  `slug` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `popular` tinyint(11) NOT NULL,
  `img` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `slug`, `status`, `popular`, `img`, `created_at`) VALUES
(84, 'DRESS & FROCK', '', 'Clothes', 1, 1, '1693747755.svg', '2023-09-03 13:29:15'),
(85, 'WINTER WEAR', '', 'Clothes', 1, 1, '1693747919.svg', '2023-09-03 13:31:59'),
(86, 'GLASSES & LENS', '', 'Bages', 1, 1, '1693747936.svg', '2023-09-03 13:32:16'),
(87, 'SHORTS & JEANS', '', '', 1, 1, '1693747967.svg', '2023-09-03 13:32:47'),
(88, 'T-SHIRTS', '', '', 1, 1, '1693748004.svg', '2023-09-03 13:33:24'),
(89, 'JACKET', '', '', 0, 0, '1693748066.svg', '2023-09-03 13:34:26'),
(90, 'WATCH', '', '', 1, 1, '1693748081.svg', '2023-09-03 13:34:41'),
(91, 'HAT & CAPS', '', '', 1, 1, '1693748110.svg', '2023-09-03 13:35:10'),
(110, 'Sports', '', 'Footwear', 1, 1, '1693840543flomar_Football_(soccer).svg', '2023-09-04 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `myfavorites`
--

CREATE TABLE `myfavorites` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myfavorites`
--

INSERT INTO `myfavorites` (`id`, `pro_id`, `user_id`, `created_at`) VALUES
(378, 86, 23, '2023-09-27 13:23:39'),
(379, 80, 23, '2023-09-27 13:23:44'),
(380, 79, 23, '2023-09-27 13:23:57'),
(381, 85, 23, '2023-09-30 10:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `city` varchar(191) NOT NULL,
  `Address` varchar(191) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `zip` int(11) NOT NULL,
  `BusinessName` varchar(191) DEFAULT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `tracking_mode` tinyint(5) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_mode` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `city`, `Address`, `phone`, `zip`, `BusinessName`, `tracking_no`, `tracking_mode`, `status`, `payment_mode`, `total`, `created_at`) VALUES
(9, 2, 'Mohammed Sad', 'asd', 'ads', 'sa', 0, 'asd', 'Anon6089', 2, 0, 0, 78, '2023-09-14 09:34:52'),
(10, 2, 'Mohammed Alsulami', 'asd', 'ads', 'sa', 0, 'asd', 'Anon1251', 0, 1, 0, 78, '2023-09-14 09:35:43'),
(11, 2, 'sad ', '', '', '', 0, '', 'Anon5447', 0, 2, 0, 60, '2023-09-14 10:19:23'),
(12, 2, 'SAM Lusif', '321', 'dssasdas', '321', 123, '3', 'Anon48161', 0, 3, 0, 118, '2023-09-14 10:31:28'),
(13, 2, 'sad ', 'sad', 'd', 'sda', 2, 'sad', 'Anon2829a', 0, 0, 0, 196, '2023-09-18 16:16:02'),
(14, 2, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 32, 'DSAS', 'Anon34943221', 0, 0, 0, 118, '2023-09-18 16:26:23'),
(15, 2, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 0, 'DSAS', 'Anon53003221', 0, 0, 0, 41, '2023-09-18 16:50:30'),
(16, 2, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 123, 'DSAS', 'Anon88743221', 0, 0, 2, 24, '2023-09-21 14:09:26'),
(17, 2, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 321, 'DSAS', 'Anon88873221', 0, 0, 2, 7, '2023-09-22 06:40:27'),
(18, 2, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 3, 'DSAS', 'Anon35513221', 0, 0, 2, 28, '2023-09-22 06:41:15'),
(19, 2, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 3, 'DSAS', 'Anon98643221', 0, 0, 2, 28, '2023-09-22 06:41:16'),
(20, 2, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 3, 'DSAS', 'Anon91363221', 0, 0, 2, 28, '2023-09-22 06:41:30'),
(21, 24, 'cars 123', 'dsa', 'das', '123', 32, 'asd', 'Anon69353', 0, 0, 2, 78, '2023-09-23 17:38:50'),
(22, 23, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 2, 'DSAS', 'Anon21953221', 5, 1, 2, 60, '2023-09-23 18:36:06'),
(23, 23, 'cars 123', 'dsa', 'das', '2132', 132, 'asd', 'Anon513032', 1, 2, 2, 56, '2023-09-24 08:57:35'),
(24, 23, 'ads sda', 'sdasad', 'sadasd', '132321', 3432, 'adsdas', 'Anon23752321', 1, 2, 2, 12, '2023-09-24 10:10:39'),
(25, 23, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 213, 'DSAS', 'Anon78903221', 5, 1, 2, 12, '2023-09-26 08:21:33'),
(26, 2, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 0, 'DSAS', 'Anon19313221', 0, 0, 2, 319, '2023-09-27 13:27:54'),
(27, 23, 'Mohammed Carsad', 'Sana\'a', 'Nothing', '883221', 213, 'DSAS', 'Anon11873221', 0, 0, 2, 61, '2023-10-01 09:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_iteam`
--

CREATE TABLE `order_iteam` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_iteam`
--

INSERT INTO `order_iteam` (`id`, `order_id`, `pro_id`, `qty`, `price`, `user_id`, `created_at`) VALUES
(10, 9, 78, 1, 29, 2, '2023-09-14 09:34:52'),
(11, 9, 79, 10, 49, 2, '2023-09-14 09:34:52'),
(12, 10, 78, 1, 29, 2, '2023-09-14 09:35:43'),
(13, 10, 79, 10, 49, 2, '2023-09-14 09:35:43'),
(14, 11, 76, 1, 12, 2, '2023-09-14 10:19:23'),
(15, 11, 78, 1, 29, 2, '2023-09-14 10:19:23'),
(16, 11, 85, 1, 7, 2, '2023-09-14 10:19:23'),
(17, 11, 86, 3, 12, 2, '2023-09-14 10:19:23'),
(18, 12, 76, 1, 12, 2, '2023-09-14 10:31:28'),
(19, 12, 78, 3, 29, 2, '2023-09-14 10:31:28'),
(20, 12, 85, 1, 7, 2, '2023-09-14 10:31:28'),
(21, 12, 86, 1, 12, 2, '2023-09-14 10:31:28'),
(22, 13, 79, 1, 49, 2, '2023-09-18 16:16:02'),
(23, 13, 84, 1, 99, 2, '2023-09-18 16:16:02'),
(24, 13, 76, 1, 12, 2, '2023-09-18 16:16:02'),
(25, 13, 78, 1, 29, 2, '2023-09-18 16:16:02'),
(26, 13, 85, 1, 7, 2, '2023-09-18 16:16:02'),
(27, 14, 85, 1, 7, 2, '2023-09-18 16:26:23'),
(28, 14, 86, 1, 12, 2, '2023-09-18 16:26:23'),
(29, 14, 84, 1, 99, 2, '2023-09-18 16:26:23'),
(30, 15, 78, 1, 29, 2, '2023-09-18 16:50:30'),
(31, 15, 76, 1, 12, 2, '2023-09-18 16:50:30'),
(32, 16, 76, 2, 12, 2, '2023-09-21 14:09:26'),
(33, 17, 85, 1, 7, 2, '2023-09-22 06:40:27'),
(34, 18, 85, 4, 7, 2, '2023-09-22 06:41:15'),
(35, 21, 78, 1, 29, 24, '2023-09-23 17:38:50'),
(36, 21, 79, 1, 49, 24, '2023-09-23 17:38:50'),
(37, 22, 86, 1, 12, 23, '2023-09-23 18:36:06'),
(38, 22, 76, 4, 12, 23, '2023-09-23 18:36:06'),
(39, 23, 85, 1, 7, 23, '2023-09-24 08:57:35'),
(40, 23, 79, 1, 49, 23, '2023-09-24 08:57:35'),
(41, 24, 86, 1, 12, 23, '2023-09-24 10:10:39'),
(42, 25, 86, 1, 12, 23, '2023-09-26 08:21:33'),
(43, 26, 81, 1, 99, 2, '2023-09-27 13:27:54'),
(44, 26, 76, 2, 12, 2, '2023-09-27 13:27:54'),
(45, 26, 85, 1, 7, 2, '2023-09-27 13:27:54'),
(46, 26, 86, 1, 12, 2, '2023-09-27 13:27:54'),
(47, 26, 78, 1, 29, 2, '2023-09-27 13:27:54'),
(48, 26, 79, 1, 49, 2, '2023-09-27 13:27:54'),
(49, 26, 84, 1, 99, 2, '2023-09-27 13:27:54'),
(50, 27, 79, 1, 49, 23, '2023-10-01 09:45:56'),
(51, 27, 76, 1, 12, 23, '2023-10-01 09:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` mediumtext NOT NULL,
  `orginal_price` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `img` varchar(191) NOT NULL,
  `second_img` varchar(191) DEFAULT NULL,
  `third_img` varchar(191) DEFAULT NULL,
  `forth_img` varchar(191) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `Sales` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `orginal_price`, `selling_price`, `img`, `second_img`, `third_img`, `forth_img`, `qty`, `status`, `trending`, `Sales`, `created_at`) VALUES
(76, 84, 'Running & Trekking Shoes - White', '', 23, 12, '1693894261sports-1.jpg', '1693894261sports-2.jpg', '', '', 29, 1, 1, 1, '2023-09-05 06:11:01'),
(78, 88, 'Mens Winter Leathers Jackets', '', 48, 29, '1693922099jacket-3.jpg', '1693922099jacket-4.jpg', '', '', 30, 1, 1, 1, '2023-09-05 13:54:59'),
(79, 89, 'Pure Garment Dyed Cotton Shirt', '', 68, 49, '1693922156shirt-1.jpg', '1693922156shirt-2.jpg', '', '', 29, 1, 1, 1, '2023-09-05 13:55:56'),
(80, 90, 'Pocket Watch Leather Pouch', '', 99, 90, '1693922262watch-3.jpg', '1693922262watch-4.jpg', '', '', 30, 1, 1, 1, '2023-09-05 13:57:42'),
(81, 87, 'Better Basics French Terry Sweatshorts', '', 0, 99, '1693930080shorts-1.jpg', '1693930080shorts-2.jpg', '', '', 30, 1, 1, 1, '2023-09-05 16:08:00'),
(84, 91, 'baby fabric shoes', '', 120, 99, '16939334371.jpg', '', '', '', 30, 0, 1, 4, '2023-09-05 17:03:57'),
(85, 88, 'Men\'s Hoodies T-Shirt', '', 12, 7, '16939335232.jpg', '', '', '', 30, 1, 1, 3, '2023-09-05 17:05:23'),
(86, 88, 'Girls T-Shirt', '', 0, 12, '16939335803.jpg', '', '', '', 30, 1, 1, 2, '2023-09-05 17:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` double NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `role_id`, `active`, `create_at`) VALUES
(1, 'sam', 77962234, 'mmahmmad3878@gmail.com', '$2y$10$4sxq7P8QXgHjYbr0tYpLKuz6sMeNM1ZhFIHrLEjGGqUZvdx0Rv5mC', 1, 1, '2023-08-23 15:16:42'),
(2, 'Mohammed Fahd Al-Sulami', 773412324, 'carsad72@gmail.com', '$2y$10$eMU0OeBttO775ew0jDbDVuHMxz6gb9Jr1ZLMC1HrQp85r/gLR02vS', 2, 0, '2023-08-23 15:18:03'),
(23, 'Sam', 779628232, 'example@gmail.com', '$2y$10$D95XnSDhmwuxuVWm20tBB.kdxVpKHym9eBPSLi5TgzFg8IO0UkYfy', 2, 1, '2023-09-23 14:48:41'),
(24, 'sallm', 123, 'carsad7@gmail.com', '$2y$10$Ql1VBC6ez1WB9YUUvn39/eZYQuxzblnUXrL9fPaSZ8FtgXJWMtPxS', 2, 1, '2023-09-23 17:36:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myfavorites`
--
ALTER TABLE `myfavorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tracking_no` (`tracking_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_iteam`
--
ALTER TABLE `order_iteam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `myfavorites`
--
ALTER TABLE `myfavorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_iteam`
--
ALTER TABLE `order_iteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `myfavorites`
--
ALTER TABLE `myfavorites`
  ADD CONSTRAINT `fk_favid` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_iteam`
--
ALTER TABLE `order_iteam`
  ADD CONSTRAINT `order_iteam_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_iteam_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_iteam_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_proCat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
