-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 12:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mstore_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart2s`
--

CREATE TABLE `cart2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(61, 11, '2023-05-22 19:43:11', '2023-05-22 19:43:11'),
(62, 11, '2023-05-24 19:34:02', '2023-05-24 19:34:02'),
(63, 11, '2023-05-24 19:37:47', '2023-05-24 19:37:47'),
(64, 13, '2023-05-26 00:06:22', '2023-05-26 00:06:22'),
(65, 11, '2023-05-30 18:15:05', '2023-05-30 18:15:05'),
(66, 11, '2023-05-30 18:15:46', '2023-05-30 18:15:46'),
(67, 12, '2023-05-31 05:36:01', '2023-05-31 05:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`id`, `cart_id`, `user_id`, `product_id`, `quantity`, `size`, `price`, `created_at`, `updated_at`) VALUES
(130, 67, 12, 128, 3, 's3_mths_2_yrs', 6, '2023-05-31 05:36:01', '2023-06-07 08:35:15'),
(131, 67, 12, 127, 1, 's10_16_yrs', 453, '2023-05-31 05:36:02', '2023-06-07 08:35:18'),
(132, 67, 12, 114, 2, 's10_16_yrs', 246, '2023-05-31 05:37:21', '2023-05-31 05:37:29'),
(173, 66, 11, 143, 1, 's3_mths_2_yrs', 123, '2023-06-14 19:47:20', '2023-06-14 19:47:56'),
(174, 66, 11, 144, 1, 's3_5_yrs', 145, '2023-06-14 19:47:21', '2023-06-14 19:47:21'),
(175, 66, 11, 142, 3, 's10_16_yrs', 1629, '2023-06-14 19:47:25', '2023-06-14 19:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_02_194147_create_products_table', 1),
(6, '2023_05_02_195736_create_products_table', 2),
(7, '2023_05_14_160253_create_carts_table', 3),
(8, '2023_05_14_160737_create_cart_product_table', 4),
(9, '2023_05_14_195151_create_cart_products_table', 5),
(10, '2023_05_25_221015_create_offers_table', 6),
(11, '2023_05_30_194731_create_cart2s_table', 7),
(12, '2023_06_05_202946_create_ordermodels_table', 8),
(13, '2023_06_05_203800_create_order_product_models_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer`, `image`, `p_id`, `created_at`, `updated_at`) VALUES
(2, 'Limited-time offer: Buy one, get one 50% off boys\' t-shirts', '20230605232555.jpg', 142, '2023-05-25 19:31:48', '2023-06-05 21:25:55'),
(3, 'Limited-time offer: Buy one, get one 50% off boys\' t-shirts', '20230605232445.jpg', 143, '2023-05-25 19:35:20', '2023-06-05 22:33:33'),
(4, 'Limited-time offer: Buy one, get one 50% off boys\' t-shirts', '20230605232322.jpg', 142, '2023-05-25 19:36:45', '2023-06-05 22:24:20'),
(6, 'Limited-time offer: Buy one, get one 50% off boys\' trousers', '20230605232644.jpg', 144, NULL, '2023-06-05 22:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `ordermodels`
--

CREATE TABLE `ordermodels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street_addres` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordermodels`
--

INSERT INTO `ordermodels` (`id`, `f_name`, `email`, `country`, `city`, `street_addres`, `code_postal`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'j', 'j@h', 'j', 'j', 'j', 'j', '145', '2023-06-14 12:56:35', '2023-06-14 12:56:35'),
(3, 'k', 'fhf@ffm.lf', 'lmfm', 'gf', 'fldfmdl', 'm', '1909', '2023-06-14 13:03:11', '2023-06-14 13:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_product_models`
--

CREATE TABLE `order_product_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product_models`
--

INSERT INTO `order_product_models` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 167, '2023-06-14 13:01:09', '2023-06-14 13:01:09'),
(2, 3, 168, '2023-06-14 13:03:11', '2023-06-14 13:03:11'),
(3, 3, 169, '2023-06-14 13:03:11', '2023-06-14 13:03:11'),
(4, 3, 170, '2023-06-14 13:03:11', '2023-06-14 13:03:11'),
(5, 3, 171, '2023-06-14 13:03:12', '2023-06-14 13:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `rprice` int(11) NOT NULL DEFAULT 0,
  `description` varchar(2505) NOT NULL,
  `category` varchar(255) NOT NULL,
  `s3_mths_2_yrs` int(11) NOT NULL,
  `s3_5_yrs` int(11) NOT NULL,
  `s6_9_yrs` int(11) NOT NULL,
  `s10_16_yrs` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `rprice`, `description`, `category`, `s3_mths_2_yrs`, `s3_5_yrs`, `s6_9_yrs`, `s10_16_yrs`, `img1`, `img2`, `img3`, `img4`, `created_at`, `updated_at`) VALUES
(104, 'Cotton Comfort Pack logo', 234.00, 0, 'desc', 'T-Shirts', 12, 23, 13, 76, '20230605224014.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-24 19:08:19', '2023-06-05 20:40:14'),
(105, 'Streetwear Hoodie Pack', 234.00, 0, 'desc', 'Trousers', 45, 64, 75, 23, '20230605223934.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-24 19:08:54', '2023-06-05 20:39:34'),
(106, 'Lightweight Windbreaker Set', 567.00, 0, 'desc', 'Hoodies', 123, 44, 67, 90, '20230605224415.webp', 'imageName2', 'imageName3', 'imageName4', '2023-05-24 19:10:07', '2023-06-05 20:44:15'),
(108, 'Sherpa Lined Collection', 123.00, 0, 'fdgfrterfe', 'Shorts', 34, 54, 65, 76, '20230605223859.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 15:32:47', '2023-06-05 20:38:59'),
(114, 'Zip-Up Track Jacket Pack', 123.00, 0, 'desc', 'Trousers', 90, 127, 982, 13, '20230605223837.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 21:31:48', '2023-06-05 20:38:37'),
(115, 'Everyday Hoodie Bundle', 345.00, 0, 'desc', 'Footwear', 345, 45, 43, 76, '20230605223808.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 21:35:20', '2023-06-05 20:38:08'),
(116, 'Printed Sweatshirt Set', 543.00, 0, 'desc', 'Trousers', 1234, 545, 76, 9, '20230605224450.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 21:36:45', '2023-06-05 20:44:50'),
(117, 'Premium Quality Pack', 453.00, 0, 'descf', 'Jackets', 34, 867, 123, 876, '20230605224350.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 21:38:13', '2023-06-05 20:43:50'),
(118, 'Athletic Performance Tee Bundle', 93.00, 0, 'descf', 'Trousers', 34, 867, 123, 876, '20230605223742.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:32:29', '2023-06-05 20:37:42'),
(119, 'Vintage Washed Set collection', 450.00, 0, 'descf', 'T-Shirts', 34, 867, 123, 876, '20230605224333.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:36:18', '2023-06-05 20:43:33'),
(120, 'Graphic Tee Collection', 345.00, 0, 'desc', 'Hoodies', 345, 45, 43, 76, '20230605224257.webp', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:40:40', '2023-06-05 20:42:57'),
(121, 'Soft Jersey Collection', 345.00, 0, 'desc', 'T-Shirts', 345, 45, 43, 76, '20230605224231.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:41:32', '2023-06-05 20:42:31'),
(122, 'Retro Logo Assortment', 345.00, 0, 'desc', 'Trousers', 345, 45, 43, 76, '20230605223711.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:42:52', '2023-06-05 20:37:11'),
(123, 'Basic Tee Multipack pack', 123.00, 0, 'Athletic Performance Tee Bundle: These moisture-wicking t-shirts are perfect for active kids who love sports and outdoor activities. They are designed to keep kids cool and dry during physical activities.', 'Jackets', 90, 127, 982, 13, '20230605224202.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:43:54', '2023-06-14 08:00:02'),
(125, 'Classic Crewneck Bundle', 543.00, 0, 'Athletic Performance Tee Bundle: These moisture-wicking t-shirts are perfect for active kids who love sports and outdoor activities. They are designed to keep kids cool and dry during physical activities.', 'Hoodies', 1234, 545, 76, 9, '20230605224128.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:47:54', '2023-06-05 20:41:28'),
(127, 'Vintage Washed Set pack', 453.00, 0, 'Vintage Washed Set: Add a touch of vintage style to your child\'s wardrobe with these pieces that feature a vintage washed finish. They are comfortable, stylish, and perfect for everyday wear.', 'T-Shirts', 34, 867, 123, 876, '20230605224110.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:52:37', '2023-06-05 20:41:10'),
(128, 'Graphic comfy Collection', 453.00, 0, 'Graphic Tee Collection: These eye-catching tees feature a variety of fun and bold designs that are sure to make a statement. They are perfect for any occasion, from playdates to family outings.', 'T-Shirts', 34, 867, 123, 876, '20230605224041.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-25 23:54:33', '2023-06-05 20:40:41'),
(129, 'Cotton Comfort Pack Collection', 2.00, 0, 'Cotton Comfort Pack: This pack includes soft cotton t-shirts in various colors that are perfect for everyday wear. These shirts are made of high-quality cotton, ensuring comfort and durability.', 'T-Shirts', 78, 54, 879, 100, '20230605223650.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-31 00:04:28', '2023-06-05 20:36:50'),
(130, 'Slip-On Sneaker Collection', 2.00, 0, 'Classic Crewneck Bundle: Cozy and versatile, these sweatshirts are a wardrobe staple for any kid. The bundle includes different colors that can be dressed up or down for any occasion.', 'Footwear', 89, 54, 76, 12, '20230605223619.webp', 'imageName2', 'imageName3', 'imageName4', '2023-05-31 00:05:28', '2023-06-05 20:36:19'),
(131, 'Retro Logo Assortment', 22.00, 0, 'Graphic Print Tee Set: Let your child\'s personality shine with these bold and fun graphic tees. The set includes a variety of designs that are sure to make a statement.', 'T-Shirts', 2, 65, 98, 90, '20230605223553.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-05-31 00:08:50', '2023-06-05 20:35:53'),
(137, 'Basic Tee Multipack Collection', 4.00, 0, 'Cotton Comfort Pack: This pack includes soft cotton t-shirts in various colors that are perfect for everyday wear. These shirts are made of high-quality cotton, ensuring comfort and durability.', 'Trousers', 12, 23, 13, 76, '20230605223535.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-06-07 10:28:00', '2023-06-05 20:35:35'),
(138, 'Printed Trouser Set pack', 543.00, 0, 'Graphic Tee Collection: These eye-catching tees feature a variety of fun and bold designs that are sure to make a statement. They are perfect for any occasion, from playdates to family outings.', 'Trousers', 1234, 545, 76, 9, '20230605232321.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-06-05 21:23:21', '2023-06-14 07:59:45'),
(139, 'Everyday Hoodie set collection', 345.00, 0, 'descGraphic Print Tee Set: Let your child\'s personality shine with these bold and fun graphic tees. The set includes a variety of designs that are sure to make a statement.', 'Hoodies', 345, 45, 43, 76, '20230605232445.webp', 'imageName2', 'imageName3', 'imageName4', '2023-06-05 21:24:45', '2023-06-14 07:59:18'),
(141, 'Basic Tee Multipack Collection', 45.00, 0, 'Cotton Comfort Pack: This pack includes soft cotton t-shirts in various colors that are perfect for everyday wear. These shirts are made of high-quality cotton, ensuring comfort and durability.', 'Jackets', 12, 23, 13, 76, '20230605232644.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-06-05 21:26:44', '2023-06-05 21:26:44'),
(142, 'Printed pack Set colection', 543.00, 599, 'Graphic Print Tee Set: Let your child\'s personality shine with these bold and fun graphic tees. The set includes a variety of designs that are sure to make a statement.', 'Jackets', 234, 545, 76, 9, '20230606002420.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-06-05 22:24:20', '2023-06-05 23:12:29'),
(143, 'Everyday t-shirt pack collection', 123.00, 189, 'Vintage Washed Set: Add a touch of vintage style to your child\'s wardrobe with these pieces that feature a vintage washed finish. They are comfortable, stylish, and perfect for everyday wear.', 'T-Shirts', 345, 45, 43, 76, '20230606003332.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-06-05 22:33:32', '2023-06-05 23:11:42'),
(144, 'Basic trouser Multipack Collection', 145.00, 245, 'Cotton Comfort Pack: This pack includes soft cotton t-shirts in various colors that are perfect for everyday wear. These shirts are made of high-quality cotton, ensuring comfort and durability.', 'Trousers', 12, 23, 13, 76, '20230606003615.jpeg', 'imageName2', 'imageName3', 'imageName4', '2023-06-05 22:36:15', '2023-06-05 22:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(11, 'Ahmed', 'a@a.a', NULL, '$2y$10$lKerAhzzty6lBwjbM6xmo.L1zOnu/2skGvS.kvkOkaTXNMFzQEwZK', 'xfyakuEzkfCnGHWWEjxy9yVANwMI8D9blyqtPWP6SsjTYbe5eLl8JkGQLFQD', '2023-05-10 20:34:23', '2023-05-10 20:34:23', 'ADMIN'),
(12, 'i', 'i@i.i', NULL, '$2y$10$dYy5cy9P5x1g7Ca03T8rc.LJhthYrsa.m5.iZiVBW.iJHFkpk.Fsy', NULL, '2023-05-11 17:28:34', '2023-05-11 17:28:34', 'USER'),
(13, 'Said', 'said@gmail.com', NULL, '$2y$10$HDJvEzSRbq9bUb6QgGtRMejMrUjZOy17Iy6/xqfWXaxosKbe08I2.', NULL, '2023-05-26 00:06:04', '2023-05-26 00:06:04', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart2s`
--
ALTER TABLE `cart2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_products_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordermodels`
--
ALTER TABLE `ordermodels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product_models`
--
ALTER TABLE `order_product_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart2s`
--
ALTER TABLE `cart2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordermodels`
--
ALTER TABLE `ordermodels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_product_models`
--
ALTER TABLE `order_product_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD CONSTRAINT `cart_products_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
