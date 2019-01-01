-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2019 at 11:29 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `updated_at`, `created_at`, `remember_token`) VALUES
(2, 'admin', '$2y$10$cjcxzf7dMgOWkqHbZnevQuPCeK5nJtfi/oVVMrb7tUitV9aA4XFWi', '2018-12-19 01:25:37', '2018-12-19 01:25:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(10) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productQuantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productImage` mediumblob,
  `currentQuantity` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `productId`, `productName`, `productPrice`, `productQuantity`, `session_id`, `created_at`, `updated_at`, `id`, `productImage`, `currentQuantity`) VALUES
(10, 36, 'Nàng Bạch Tuyết Và Bảy Chú Lùn', '90000', '1', '13', NULL, NULL, '13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryDetail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryDetail`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'Sách kinh tế', 'Sách cung cấp tri thức về kinh tế', '2018-12-17 14:01:11', '2018-12-17 12:28:55', NULL),
(3, 'Sách văn học', 'Văn học', '2018-12-17 13:00:37', '2018-12-17 13:00:37', NULL),
(4, 'Sách thiếu nhi', 'Sách thiếu nhi', '2018-12-19 08:56:48', '2018-12-19 08:56:48', NULL),
(5, 'Sách khoa học', 'Sách khoa học', '2018-12-19 08:57:16', '2018-12-19 08:57:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_06_21_174929_create_cart_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderId`, `productId`, `quantity`, `price`, `totalPrice`, `updated_at`, `created_at`, `remember_token`, `name`) VALUES
(48, 12, 1, 48000, 48000, '2018-12-27 10:36:21', '2018-12-27 10:36:21', NULL, 'Ngày vui'),
(49, 33, 1, 35000, 35000, '2018-12-27 10:56:03', '2018-12-27 10:56:03', NULL, '100 Truyện Hay Rèn Đức Tính Tốt'),
(49, 39, 1, 60000, 60000, '2018-12-27 10:56:03', '2018-12-27 10:56:03', NULL, 'Hỏi Và Đáp Địa Cầu Tiến Hóa'),
(51, 9, 1, 50000, 50000, '2018-12-27 14:24:19', '2018-12-27 14:24:19', NULL, 'Sau cành Violet'),
(53, 40, 1, 20000, 20000, '2018-12-27 14:36:51', '2018-12-27 14:36:51', NULL, 'Vừa Học Vừa Chơi'),
(54, 9, 1, 50000, 50000, '2018-12-27 14:54:10', '2018-12-27 14:54:10', NULL, 'Sau cành Violet'),
(55, 24, 1, 100000, 100000, '2018-12-27 19:33:00', '2018-12-27 19:33:00', NULL, 'Vũ Trụ Toàn Ảnh'),
(55, 37, 1, 60000, 60000, '2018-12-27 19:33:00', '2018-12-27 19:33:00', NULL, 'Khủng Long Và Các Loài Động Vật'),
(56, 9, 1, 50000, 50000, '2018-12-27 19:44:40', '2018-12-27 19:44:40', NULL, 'Sau cành Violet'),
(56, 28, 3, 65000, 195000, '2018-12-27 19:44:40', '2018-12-27 19:44:40', NULL, 'Chúng Em Viết Về Môi Trường'),
(57, 15, 3, 69000, 207000, '2018-12-27 19:48:40', '2018-12-27 19:48:40', NULL, 'Đọc Vị Bất Cứ Ai');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `orderStatus` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderAddress` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderTotal` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `id`, `orderDate`, `orderStatus`, `orderAddress`, `updated_at`, `created_at`, `remember_token`, `orderTotal`) VALUES
(46, 8, '2018-12-27', 'Cancelled', '123', '2018-12-27 10:34:48', '2018-12-27 09:27:35', NULL, NULL),
(47, 8, '2018-12-27', 'Cancelled', '123', '2018-12-27 10:34:52', '2018-12-27 10:10:53', NULL, NULL),
(48, 8, '2018-12-27', 'Processing', '123', '2018-12-27 10:36:21', '2018-12-27 10:36:21', NULL, NULL),
(49, 8, '2018-12-27', 'Processing', '123', '2018-12-27 10:56:03', '2018-12-27 10:56:03', NULL, NULL),
(50, 13, '2018-12-27', 'Cancelled', 'vn', '2018-12-27 11:39:09', '2018-12-27 11:38:51', NULL, NULL),
(51, 1, '2018-12-08', 'Processing', '156', '2018-12-27 14:15:43', '2018-12-27 14:15:43', NULL, NULL),
(52, 15, '2018-12-27', 'Cancelled', 'asdhajsdahd', '2018-12-27 14:40:20', '2018-12-27 14:34:57', NULL, NULL),
(53, 15, '2018-12-27', 'Delivering', 'Test,123', '2018-12-27 14:38:25', '2018-12-27 14:36:51', NULL, NULL),
(54, 15, '2018-12-27', 'Processing', 'hi,1234 st', '2018-12-27 14:54:10', '2018-12-27 14:54:10', NULL, NULL),
(55, 16, '2018-12-28', 'Completed', 'bestmonster,123 st', '2018-12-27 19:45:45', '2018-12-27 19:33:00', NULL, NULL),
(56, 16, '2018-12-28', 'Processing', 'bestmonster,23 st', '2018-12-27 19:44:40', '2018-12-27 19:44:40', NULL, NULL),
(57, 8, '2018-12-15', 'Processing', '123', '2018-12-27 19:48:31', '2018-12-27 19:48:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productImage` mediumblob NOT NULL,
  `categoryId` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productPrice`, `productQuantity`, `productImage`, `categoryId`, `updated_at`, `created_at`, `remember_token`) VALUES
(4, 'Tôi Tài Giỏi - Bạn Cũng Thế', 10000, 111, 0x33303530382e706e67, 1, '2018-12-27 08:55:38', '2018-12-17 22:37:35', NULL),
(6, 'Ván bài lật ngửa', 78000, 0, 0x31333732312e6a7067, 3, '2018-12-27 19:49:44', '2018-12-19 08:59:53', NULL),
(7, 'Đống rác cũ', 90000, 97, 0x35383339392e6a7067, 3, '2018-12-27 14:40:20', '2018-12-19 09:00:38', NULL),
(8, 'Quân khu Nam Đồng', 45000, 213, 0x343036392e6a7067, 3, '2018-12-27 08:56:17', '2018-12-19 09:01:17', NULL),
(9, 'Sau cành Violet', 50000, 93, 0x35393130322e6a7067, 3, '2018-12-27 19:44:40', '2018-12-19 09:01:39', NULL),
(10, 'Cuộc đời ngoài cửa sổ', 30000, 97, 0x333037352e6a7067, 3, '2018-12-27 14:21:58', '2018-12-19 09:02:06', NULL),
(11, 'Những ngã tư và những cột đèn', 90000, 100, 0x35363230312e6a7067, 3, '2018-12-27 14:26:41', '2018-12-19 09:02:37', NULL),
(12, 'Ngày vui', 48000, 99, 0x35323436392e6a7067, 3, '2018-12-27 10:36:21', '2018-12-19 09:03:05', NULL),
(13, 'Con hoang', 71000, 100, 0x373634342e6a7067, 3, '2018-12-20 19:05:57', '2018-12-19 09:03:27', NULL),
(14, 'Đoạn tình', 83000, 100, 0x39353331392e6a7067, 3, '2018-12-20 16:30:00', '2018-12-19 09:03:52', NULL),
(15, 'Đọc Vị Bất Cứ Ai', 69000, 97, 0x39333438332e4a5047, 1, '2018-12-27 19:48:40', '2018-12-19 09:04:56', NULL),
(16, 'Người Giàu Có Nhất Thành Babylon', 58000, 50, 0x34383537372e4a5047, 1, '2018-12-20 16:31:00', '2018-12-19 09:05:22', NULL),
(17, 'Giao Tiếp Với Khách Hàng', 89000, 50, 0x373937312e4a5047, 1, '2018-12-27 14:40:20', '2018-12-19 09:05:40', NULL),
(18, 'Cha Giàu, Cha Nghèo', 60000, 50, 0x343431342e4a5047, 1, '2018-12-27 08:56:59', '2018-12-19 09:06:31', NULL),
(19, 'Ngày Xưa Có Một Con Bò', 62000, 50, 0x36353336382e4a5047, 1, '2018-12-27 10:34:48', '2018-12-19 09:07:24', NULL),
(20, 'Người Nam Châm', 55000, 90, 0x31313632392e4a5047, 1, '2018-12-27 14:13:41', '2018-12-19 09:07:44', NULL),
(21, 'Tư Duy Nhanh Và Chậm', 200000, 100, 0x37323535392e4a5047, 1, '2018-12-19 09:08:10', '2018-12-19 09:08:10', NULL),
(22, '7 Thói Quen Hiệu Quả', 150000, 50, 0x35323930352e4a5047, 1, '2018-12-19 09:08:36', '2018-12-19 09:08:36', NULL),
(23, 'Tế Bào Gốc', 120000, 50, 0x33303832362e676966, 5, '2018-12-27 11:39:09', '2018-12-19 09:09:51', NULL),
(24, 'Vũ Trụ Toàn Ảnh', 100000, 99, 0x38333335392e676966, 5, '2018-12-27 19:33:00', '2018-12-19 09:10:47', NULL),
(25, 'Thân Nhiệt Sinh Lão Bệnh Tử', 50000, 57, 0x32333032382e676966, 5, '2018-12-27 14:16:45', '2018-12-19 09:11:06', NULL),
(26, 'Hỏi Đáp Về Kỹ Thuật Điện Áp', 90000, 60, 0x32323838332e676966, 1, '2018-12-19 09:11:28', '2018-12-19 09:11:28', NULL),
(27, 'Nước Và Con Người', 100000, 50, 0x31373838382e676966, 5, '2018-12-19 09:11:53', '2018-12-19 09:11:53', NULL),
(28, 'Chúng Em Viết Về Môi Trường', 65000, 47, 0x32343730372e676966, 5, '2018-12-27 19:44:40', '2018-12-19 09:12:22', NULL),
(29, 'Máy Lạnh Và Điều Hòa Không Khí', 65000, 50, 0x353431342e676966, 5, '2018-12-19 09:13:22', '2018-12-19 09:13:22', NULL),
(30, 'Cơ Sở Thiết Kế Và Gia Công Cơ Khí', 40000, 50, 0x39333330362e6a7067, 1, '2018-12-19 09:14:10', '2018-12-19 09:14:10', NULL),
(31, 'Đánh Giá Nghiên Cứu Khoa Học', 300000, 40, 0x35393638382e676966, 5, '2018-12-27 08:56:08', '2018-12-19 09:14:36', NULL),
(32, 'Cổ Tích Việt Nam', 60000, 60, 0x34303938332e676966, 4, '2018-12-27 08:56:34', '2018-12-19 09:15:27', NULL),
(33, '100 Truyện Hay Rèn Đức Tính Tốt', 35000, 99, 0x38303839362e676966, 4, '2018-12-27 10:56:03', '2018-12-19 09:15:53', NULL),
(34, '10 Vạn Câu Hỏi Vì Sao', 40000, 90, 0x37363333322e676966, 4, '2018-12-27 08:55:57', '2018-12-19 09:16:47', NULL),
(35, 'Truyện Cổ Tích Thế Giới Chọn Lọc', 50000, 50, 0x32373130362e676966, 4, '2018-12-19 09:17:34', '2018-12-19 09:17:34', NULL),
(36, 'Nàng Bạch Tuyết Và Bảy Chú Lùn', 90000, 60, 0x35313437352e676966, 4, '2018-12-27 10:34:52', '2018-12-19 09:17:57', NULL),
(37, 'Khủng Long Và Các Loài Động Vật', 60000, 49, 0x31363738302e676966, 4, '2018-12-27 19:33:00', '2018-12-19 09:19:03', NULL),
(38, 'Rèn Luyện Khả Năng Sáng Tạo', 30000, 40, 0x33333838352e676966, 4, '2018-12-19 09:19:25', '2018-12-19 09:19:25', NULL),
(39, 'Hỏi Và Đáp Địa Cầu Tiến Hóa', 60000, 79, 0x37303735342e676966, 4, '2018-12-27 10:56:03', '2018-12-19 09:19:53', NULL),
(40, 'Vừa Học Vừa Chơi', 20000, 59, 0x37363838392e676966, 4, '2018-12-27 14:36:51', '2018-12-19 09:20:29', NULL),
(41, 'Thế Giới Động Vật', 60000, 50, 0x39303135362e676966, 4, '2018-12-19 09:20:53', '2018-12-19 09:20:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportId` int(11) NOT NULL,
  `reportDate` date DEFAULT NULL,
  `reportType` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportId`, `reportDate`, `reportType`, `productId`, `quantity`, `price`, `totalPrice`, `updated_at`, `created_at`, `remember_token`) VALUES
(6, '2018-12-14', 'Export', 159, 30, 5, 150, '2018-12-27 14:15:23', '2018-12-27 09:19:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `male` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `male`, `birthday`, `email`, `phoneNumber`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'user10', '$2y$10$HA5nlgmlvZ5o5KcJ3nAy9OeWDbgDhpVbVSJbpE4LSzA4Xps26SPDC', 'Hieu', 'Nam', '2018-12-14', 'hieu@gmail.com', '15', '2018-12-19 00:13:15', '2018-12-17 10:24:23', 't1aYv70gLP6yY4nAVAIJMorJMisP44u0YN2BUKZsWvQTHRgSmNdwuez0HtE6'),
(8, 'user1', '$2y$10$J5ElxU1eHmVQPxp1jT.uAOne2HuO3okD3Ebl7hT3lWsFd7.avjODu', 'vuong', 'Nữ', NULL, 'vuong@gmai.com', '', '2018-12-27 18:37:16', '2018-12-19 14:49:14', 'Qgp2a6H3yiDgne6iTmp0NJDics1pBVqrnpp3tjLppa2E0j7iB68XaGOlWUMQ'),
(13, 'hihi', '$2y$10$8qjskFqOb0PnLV2ayfdujeBlB26IivEcIQcyGfGnAW/4D2vmeFyBi', 'hihi', 'Nam', NULL, 'deoco@hihi.com', '', '2018-12-27 18:39:45', '2018-12-27 11:38:19', '2cwQRnirtNqISsbubEPowqxlaX0f7RsQ9XMTmxThkNGuGHemAhfLTjLCEYBQ'),
(15, 'test1', '$2y$10$iTpkBnx6pVwpjROHG1w3E.hAyBkmK22Ani3NNcLaVtaLHUFp7l1r.', 'Test', 'Nam', '2018-12-28', 'test@mail.com', '1234', '2018-12-27 21:49:40', '2018-12-27 14:31:56', 'vLDiFgHFn134f9rgWpSmlUhx1CyES5VXbniJUCscT36mJsDD0XWX8WL5tuja'),
(16, 'bestmonster', '$2y$10$FxDL88GYW1OjgkcGrTlp8up/htKsZGvdTDRkdryjvPZ0m1m/psRIq', 'bestmonster', 'Nam', '1998-02-03', 'nbviet98@gmail.com', 'jklfdsfz', '2018-12-28 02:28:18', '2018-12-27 19:26:31', 'sVTuWGThA7Q80xZuvm6LpEqz8mcVWpiFqQ6lwKmdlUy1rYru57fzQRchh4mL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderId`,`productId`),
  ADD KEY `fk_orderDetail_Product` (`productId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `fk_Order_User` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `fk_Product_Category` (`categoryId`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_Orderdetail_Order` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `fk_orderDetail_Product` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_Order_User` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_Product_Category` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
