-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 06:42 AM
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
-- Database: `bachelor_kitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$ZlEPLM4bqxKg8fnAo2nyUOKP5UzYp4L4A3sNE.t3EGg/28XF/GqgG', NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_dates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` int(11) NOT NULL DEFAULT 0,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `date`, `user_id`, `package_id`, `breakfast_price`, `lunch_price`, `dinner_price`, `no_of_person`, `no_of_days`, `subtotal`, `coupon_id`, `discount_amount`, `after_discount`, `tax`, `total`, `start_date`, `end_date`, `delivery_dates`, `order_id`, `pay_url`, `payment_id`, `payment_type`, `payment_status`, `otp`, `address_id`, `booking_status`, `status`, `created_at`, `updated_at`) VALUES
(32, '2020-12-29', '6', '12', NULL, '1', '1', '2', '30', '120', 'CODE20', '12', '108', '5.40', '113', '2021-01-01', '2021-01-30', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 0, 0, '2020-12-29 06:45:12', '2020-12-29 06:45:12'),
(33, '2020-12-29', '6', '12', '1', NULL, NULL, '2', '30', '60', 'CODE20', '6', '54', '2.70', '57', '2021-01-01', '2021-01-30', NULL, 'd8c0c014-b3f1-4e6e-ac73-9b0b62736930', 'https://paypage.sandbox.ngenius-payments.com/?code=aea1e99c0a26bc77', NULL, '1', '0', NULL, 2, 0, 0, '2020-12-29 06:46:36', '2020-12-29 06:46:36'),
(34, '2020-12-30', '6', '40', '350', '420', '490', '1', '2', '2520', 'CODE20', '100', '2420', '121.00', '2541', '2021-01-01', '2021-01-02', NULL, NULL, NULL, NULL, '0', '0', NULL, 9, 0, 0, '2020-12-29 20:57:59', '2020-12-29 20:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_dates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_id`, `category_name_arabic`, `category_name_english`, `image`, `status`, `created_at`, `updated_at`) VALUES
(16, '0', 'خطة الوجبات الأساسية', 'Basic Meals Plan', '467016242.jpg', '0', '2020-12-19 08:32:12', '2020-12-20 11:13:13'),
(17, '0', 'ااياتي', 'Diet Plan', '2045604625.jpg', '0', '2020-12-19 08:33:28', '2020-12-20 11:13:19'),
(18, '0', 'خطة وجبات زيادة الوزن', 'Weight Gain Meals Plan', '831649197.jpg', '0', '2020-12-19 08:34:17', '2020-12-20 11:13:26'),
(19, '0', 'خطة', 'Pro Meals Plan', '1738998534.jpg', '0', '2020-12-19 08:35:03', '2020-12-20 11:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `chat_to_customers`
--

CREATE TABLE `chat_to_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_to_customers`
--

INSERT INTO `chat_to_customers` (`id`, `customer_id`, `admin_id`, `message_from`, `date`, `time`, `text`, `staus`, `created_at`, `updated_at`) VALUES
(85, '6', NULL, '0', NULL, NULL, 'hi', '0', '2020-12-30 16:37:14', '2020-12-30 16:37:14'),
(86, '6', NULL, '1', NULL, NULL, 'hi', '0', '2020-12-30 16:38:18', '2020-12-30 16:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abudhabi', '0', '2020-12-29 09:23:13', '2020-12-29 09:23:13'),
(2, 'Dubai', '0', '2020-12-29 09:23:23', '2020-12-29 09:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kitchen_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_order_val` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_per_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_per_coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `kitchen_id`, `coupon_code`, `description`, `start_date`, `end_date`, `discount_type`, `amount`, `max_value`, `min_order_val`, `limit_per_user`, `limit_per_coupon`, `user_type`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'CODE20', 'test coupon', '2020-12-29', '2021-01-10', '2', '10', '100', '0', '5', NULL, NULL, '', '1', '2020-12-29 02:19:36', '2020-12-29 06:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_packages`
--

CREATE TABLE `food_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT 0,
  `package_title_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_title_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_enable` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_enable` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_enable` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_price` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_price` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_price` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_sunday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_monday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_tuesday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_wednesday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_thursday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_friday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast_saturday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_sunday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_monday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_tuesday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_wednesday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_thursday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_friday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_saturday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_sunday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_monday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_tuesday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_wednesday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_thursday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_friday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner_saturday_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_packages`
--

INSERT INTO `food_packages` (`id`, `category_id`, `package_title_arabic`, `package_title_english`, `description_arabic`, `description_english`, `kitchen_ids`, `breakfast_enable`, `lunch_enable`, `dinner_enable`, `breakfast_price`, `lunch_price`, `dinner_price`, `breakfast_sunday_items`, `breakfast_monday_items`, `breakfast_tuesday_items`, `breakfast_wednesday_items`, `breakfast_thursday_items`, `breakfast_friday_items`, `breakfast_saturday_items`, `lunch_sunday_items`, `lunch_monday_items`, `lunch_tuesday_items`, `lunch_wednesday_items`, `lunch_thursday_items`, `lunch_friday_items`, `lunch_saturday_items`, `dinner_sunday_items`, `dinner_monday_items`, `dinner_tuesday_items`, `dinner_wednesday_items`, `dinner_thursday_items`, `dinner_friday_items`, `dinner_saturday_items`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 16, 'وجبة جرين شور', 'GreenShore Meal', NULL, NULL, '1', '1', NULL, NULL, '200', NULL, NULL, '16', '2', '3', '4', '5', '20', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1826225437.jpg', '0', '2020-12-24 03:23:23', '2020-12-25 01:16:21'),
(8, 16, 'وجبة فودكريست', 'FoodCrest Meal', NULL, NULL, '1', '1', '1', '1', '350', '500', '400', '12', '9', '8', '7', '6', '16', '1', '2', '4', '1', '6', '3', '13', '8', '19', '3', '4', '7', '10', '11', '5', '216779332.jpg', '0', '2020-12-24 03:26:27', '2020-12-25 01:18:24'),
(9, 16, 'طعم حضري وجبة', 'UrbanTaste Meal', NULL, NULL, '1', '1', '1', '1', '500', '550', '425', '24', '14', '3', '4', '5', '8', '6', '25', '2', '23', '8', '9', '10', '13', '4', '11', '6', '7', '3', '26', '9', '1123977626.png', '0', '2020-12-24 03:30:49', '2020-12-25 01:47:57'),
(10, 16, 'وجبة فود لوف', 'Foodlove Meal', NULL, NULL, '1', '1', '1', '1', '400', '650', '500', '1', '3', '4', '7', '9', '10', '26', '4', '13', '2', '8', '21', '9', '10', '2', '5', '15', '26', '9', '24', '3', '1478167241.png', '0', '2020-12-24 03:33:43', '2020-12-25 01:49:36'),
(11, 16, 'جاهز للغاية', 'SuperReady', NULL, NULL, '1', '1', '1', '1', '480', '550', '500', '1', '4', '3', '25', '8', '21', '9', '2', '3', '26', '5', '23', '9', '10', '24', '5', '2', '7', '4', '17', '9', '1875514967.png', '0', '2020-12-24 03:41:19', '2020-12-25 01:50:52'),
(12, 16, 'وجبة ابيتوم', 'Epitome Meal', NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '2', '13', '4', '21', '6', '17', '3', '5', '8', '23', '24', '9', '10', '2', '15', '4', '8', '7', '1', '26', '266380481.jpg', '0', '2020-12-24 03:44:48', '2020-12-26 03:51:39'),
(13, 16, 'وجبة ويش', 'WishMeal', NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '23', '8', '5', '6', '7', '25', '1577521144.jpg', '0', '2020-12-24 03:46:57', '2020-12-25 02:36:01'),
(14, 16, 'وجبة ماير فود', 'MayerFood Meal', NULL, NULL, '1', NULL, '1', NULL, NULL, '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', '3', '8', '7', '9', '4', '17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '695770887.jpg', '0', '2020-12-24 04:08:45', '2020-12-25 02:36:48'),
(15, 16, 'ريتش ريليكس', 'RichRelics', NULL, NULL, '1', '1', NULL, NULL, '520', NULL, NULL, '15,16,18', '4', '6', '8', '21', '5', '24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1910965303.png', '0', '2020-12-24 04:10:36', '2020-12-25 03:04:00'),
(16, 16, 'اختر الوجبة', 'YouChoose Meal', NULL, NULL, '1', NULL, '1', NULL, NULL, '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10,11,13', '1,3', '1,4', '7,8', '8,10', '12,13,14,15,16', '19,20,21,23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '600690373.png', '0', '2020-12-24 04:16:39', '2020-12-29 09:27:35'),
(17, 17, 'وجبات سريعة صحية', 'Healthier Fast Food', NULL, NULL, '1', '1', '1', '1', '400', '500', '525', '1', '11', '13', '4', '5', '6', '7', '2', '3', '14', '5', '6', '16', '24', '5', '9', '10', '8', '15', '26', '17', '54939602.png', '0', '2020-12-24 04:23:23', '2020-12-25 02:42:22'),
(18, 17, 'سلة الشمس', 'sun basket', NULL, NULL, '1', '1', '1', '1', '500', '560', '350', '2', '3', '11', '6', '8', '17', '20', '4', '1', '14', '7', '24', '21', '13', '15', '4', '9', '10', '19', '5', '16', '524303851.png', '0', '2020-12-24 04:32:28', '2020-12-25 02:45:32'),
(19, 17, 'جائع', 'Hungryroot', NULL, NULL, '1', '1', '1', '1', '550', '400', '350', '1', '4', '11', '6', '10', '23', '9', '13', '3', '7', '9', '17', '25', '7', '14', '2', '15', '5', '8', '24', '26', '1593706981.png', '0', '2020-12-24 04:38:35', '2020-12-25 02:47:39'),
(20, 17, 'تذوق الأصدقاء', 'TasteBuddy', NULL, NULL, '1', '1', '1', '1', '300', '550', '450', '2', '13', '5', '6', '9', '19', '26', '1', '15', '3', '7', '14', '18', '24', '12', '4', '8', '10', '16', '9', '20', '200299149.png', '0', '2020-12-24 04:45:34', '2020-12-25 02:50:18'),
(21, 17, 'وجبة كاسا', 'CassaMeal', NULL, NULL, '1', '1', '1', '1', '350', '480', '600', '1', '4', '3', '10', '2', '10', '9', '3', '2', '4', '8', '6', '10', '10', '2', '5', '9', '4', '8', '1', '7', '1614089395.png', '0', '2020-12-24 04:48:01', '2020-12-24 04:48:01'),
(22, 17, 'طعام', 'FoodEaze', NULL, NULL, '1', NULL, '1', NULL, NULL, '520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18', '3', '4', '8', '15', '7', '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '399068123.png', '0', '2020-12-24 04:51:58', '2020-12-25 02:51:38'),
(23, 17, 'وجبة بريز', 'MealBreeze', NULL, NULL, '1', '1', NULL, NULL, '450', NULL, NULL, '11', '4', '2', '1', '9', '25', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '505156200.png', '0', '2020-12-24 04:55:23', '2020-12-25 02:52:08'),
(24, 17, 'ديلوبيلا', 'DelloBella', NULL, NULL, '1', NULL, '1', NULL, NULL, '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', '4', '26', '5', '9', '13', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '255642142.png', '0', '2020-12-24 05:07:49', '2020-12-25 02:52:44'),
(25, 17, 'علاج الطبيعة', 'natureCure', NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '430', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '21', '18', '14', '8', '19', '4', '353616537.png', '0', '2020-12-24 05:10:51', '2020-12-25 02:53:32'),
(26, 17, 'أجنحة حضرية', 'UrbanWings', NULL, NULL, '1', NULL, '1', NULL, NULL, '550', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', '21', '5', '7', '20', '8', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '386376173.png', '0', '2020-12-24 05:13:23', '2020-12-25 02:54:43'),
(27, 18, 'وجبة البرقوق', 'Plum meal', NULL, NULL, '1', '1', '1', '1', '650', '550', '450', '1', '11', '13', '8', '5', '17', '23', '2', '12', '15', '5', '6', '16', '8', '3', '4', '19', '6', '7', '18', '9', '37578053.jpg', '0', '2020-12-24 05:17:54', '2020-12-25 02:58:04'),
(28, 18, 'وجبات كابابيلا', 'Cappabella Meals', NULL, NULL, '1', '1', '1', '1', '400', '500', '300', '3', '4', '13', '8', '8', '17', '9', '1', '12', '14', '16', '7', '26', '25', '2', '5', '7', '15', '11', '10', '20', '68141113.jpg', '0', '2020-12-24 05:21:36', '2020-12-25 03:00:13'),
(29, 18, 'وجبات بلومفورد', 'BloomFord Meals', NULL, NULL, '1', '1', '1', '1', '500', '620', '700', '2', '15', '4', '18', '6', '10', '9', '1', '14', '5', '8', '4', '7', '24', '3', '16', '18', '17', '19', '25', '23', '1636450754.png', '0', '2020-12-24 05:28:01', '2020-12-25 03:02:10'),
(30, 18, 'وجبات بيوما سبايس', 'PeumaSpice Meals', NULL, NULL, '1', '1', '1', '1', '400', '320', '500', '1', '2', '4', '10', '16', '23', '24', '3', '14', '12', '9', '15', '12', '19', '4', '7', '6', '8', '18', '24', '17', '17364114.png', '0', '2020-12-24 05:33:09', '2020-12-25 03:05:06'),
(31, 18, 'وجبات وايت فاب', 'WhiteFab Meals', NULL, NULL, '1', '1', '1', '1', '250', '400', '480', '2', '4', '8', '3', '24', '6', '13', '1', '5', '10', '4', '10', '15', '17', '3', '7', '16', '19', '9', '20', '23', '1340549889.png', '0', '2020-12-24 05:38:10', '2020-12-25 03:07:27'),
(32, 18, 'وجبات سبايسبيري', 'Spiceberry Meals', NULL, NULL, '1', '1', NULL, NULL, '600', NULL, NULL, '24', '4', '2', '15', '8', '25', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '76509627.png', '0', '2020-12-24 05:42:22', '2020-12-25 03:08:07'),
(33, 18, 'وجبات تاستوس', 'Tastoos Meals', NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '3', '13', '9', '23', '16', '17', '1699175944.png', '0', '2020-12-24 05:51:39', '2020-12-25 03:10:57'),
(34, 18, 'وجبات سوكونوفا', 'Sauconova Meals', NULL, NULL, '1', '1', NULL, NULL, '430', NULL, NULL, '1,25', '3,15', '4,13', '8,18', '5,14', '10,24', '2,23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2030383236.png', '0', '2020-12-24 05:57:40', '2020-12-25 03:12:10'),
(35, 18, 'وجبات يومية', 'DayDelish Meals', NULL, NULL, '1', NULL, '1', NULL, NULL, '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3,6', '4,21', '15,25', '5,15,17', '7,24,26', '9,11', '2,10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1201332236.png', '0', '2020-12-24 06:01:18', '2020-12-25 03:13:38'),
(36, 18, 'سوبر سوسي', 'SuperSaucy', NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '520', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2,9,13', '1,14', '4,14,17', '6,26', '7,8,24', '9,23', '10,13', '63594837.png', '0', '2020-12-24 06:07:05', '2020-12-25 03:14:48'),
(37, 19, 'وجبات تيست ستار', 'TasteStar Meals', NULL, NULL, '1', '1', '1', '1', '550', '400', '520', '1', '12', '4', '15', '10', '8,24', '7', '2', '16', '6', '7', '11', '17', '8', '3', '5', '8', '9', '14', '23', '10', '1634251762.png', '0', '2020-12-24 06:11:45', '2020-12-25 03:17:14'),
(38, 19, 'وجبات ميستيففا', 'Mystivva Meals', NULL, NULL, '1', '1', '1', '1', '400', '580', '500', '1', '15', '6', '7', '9', '17', '21', '2', '7', '8', '11', '14', '18', '20', '3', '4', '10', '12', '16', '19', '24', '49524317.jpg', '0', '2020-12-24 06:17:24', '2020-12-25 03:19:33'),
(39, 19, 'وجبة البرقوق', 'Meal plum', NULL, NULL, '1', '1', '1', '1', '500', '480', '510', '1', '8', '10', '7', '6', '10', '3', '2', '7', '9', '8', '3', '1', '4', '4', '3', '1', '6', '8', '2', '10', '1332745675.png', '0', '2020-12-24 06:23:52', '2020-12-24 06:23:52'),
(40, 19, 'تيستي بايت', 'TastyBite', NULL, NULL, '1', '1', '1', '1', '350', '420', '490', '2', '3', '13', '5', '7', '9', '6', '1', '11', '14', '10', '9', '8', '21', '4', '12', '15', '16', '17', '18', '19', '411626925.png', '0', '2020-12-24 06:27:54', '2020-12-25 03:22:04'),
(41, 19, 'سيد الوجبة', 'MealMaster', NULL, NULL, '1', '1', '1', '1', '500', '540', '400', '2', '12', '5', '12', '15', '10', '6', '1', '8', '4', '13', '17', '9', '7', '3', '11', '13', '14', '19', '16', '8', '206051298.png', '0', '2020-12-24 06:31:52', '2020-12-25 03:25:08'),
(42, 19, 'دينر سويفت', 'DinerSwift', NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, '525', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '4', '7', '10', '9', '1', '6', '1704999169.png', '0', '2020-12-24 06:36:51', '2020-12-24 06:36:51'),
(43, 19, 'مارين ميس', 'MarinMess', NULL, NULL, '1', NULL, '1', NULL, NULL, '700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1,12', '4,13', '10,26', '8,13,16', '7,24', '9,11', '6,8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006417955.png', '0', '2020-12-24 06:40:31', '2020-12-25 03:26:28'),
(44, 19, 'الغذاء فيفانت', 'VIvante Food', NULL, NULL, '1', '1', NULL, NULL, '350', NULL, NULL, '1,3,4,7', '4,10', '3,13,25', '5,10,12', '18,20', '6,11', '7,9,14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1702449274.png', '0', '2020-12-24 06:43:23', '2020-12-25 03:27:41'),
(45, 19, 'CassaMeal', 'CassaMeal', NULL, NULL, '1', NULL, '1', NULL, NULL, '450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1,13', '4,11,24', '8,16', '2,3,12', '9,10,14', '9', '7,18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '306176151.png', '0', '2020-12-24 06:46:23', '2020-12-25 03:28:58'),
(46, 19, 'يبث الطعم', 'Infuse Taste', NULL, NULL, '1', NULL, '1', NULL, NULL, '550', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3,4', '1,7,10', '2,7,11', '7', '3,4', '10,14', '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '612146216.png', '0', '2020-12-24 06:49:33', '2020-12-25 03:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT 0,
  `item_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `item_name_arabic`, `item_name_english`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Chicken Briyani', 'Chicken Briyani', '12', '1047439837.png', '0', '2020-12-07 07:33:13', '2020-12-07 08:34:46'),
(2, NULL, 'Mutton Briyani', 'Mutton Briyani', '20', '873950438.png', '0', '2020-12-07 07:33:42', '2020-12-07 08:37:37'),
(3, 9, 'فلودة', 'Faluda', '100', '610663429.jpg', '0', '2020-12-15 01:07:55', '2020-12-15 01:07:55'),
(4, 8, 'برجر دجاج باربيكيو', 'bbq chicken burger', '200', '638663571.jpg', '0', '2020-12-15 01:10:19', '2020-12-15 01:10:19'),
(5, 14, 'ساندوتش بانير الفلفل الحار', 'chilli paneer sandwich', '150', '1635706082.jpg', '0', '2020-12-15 01:13:43', '2020-12-15 01:13:43'),
(6, 11, 'سلطة الباستا الإيطالية الشهية', 'zesty Italian pasta salad', '250', '1571759886.jpg', '0', '2020-12-15 01:16:51', '2020-12-15 01:16:51'),
(7, 16, 'شيش كباب لحم', 'Lamb shish kebab', '150', '845397168.png', '0', '2020-12-15 01:18:59', '2020-12-25 00:37:09'),
(8, 7, 'حلوى فرنسية كلاسيكية', 'classic french dessert', '100', '1439267583.jpg', '0', '2020-12-15 01:20:56', '2020-12-15 01:20:56'),
(9, 6, 'ماكي السوشي', 'maki sushi', '250', '1094493269.jpg', '0', '2020-12-15 01:22:17', '2020-12-15 01:22:17'),
(10, 13, 'دجاج حار', 'chilli chicken', '250', '1646671377.jpg', '0', '2020-12-15 01:24:15', '2020-12-15 01:24:15'),
(11, 19, 'لازانيا', 'Lasagna', '100', '2073010479.jpg', '0', '2020-12-25 00:40:45', '2020-12-25 00:40:45'),
(12, 18, 'بيتزا فلات بريد', 'Flatbread pizza', '500', '1151201466.jpg', '0', '2020-12-25 00:43:10', '2020-12-25 00:43:10'),
(13, 19, 'أبل الإسكافي', 'Apple Cobbler', '300', '1567982044.jpg', '0', '2020-12-25 00:45:39', '2020-12-25 00:45:39'),
(14, 18, 'حساء الدجاج بالكريمة', 'creamy chicken soup', '150', '638454569.jpeg', '0', '2020-12-25 00:48:13', '2020-12-25 00:48:13'),
(15, 18, 'ناجتس دجاج بارميزان', 'chicken parmesan nuggets', '250', '564289455.jpg', '0', '2020-12-25 01:00:57', '2020-12-25 01:00:57'),
(16, 19, 'السباغيتي مع كرات اللحم', 'Spaghetti with meatballs', '300', '608183115.jpg', '0', '2020-12-25 01:02:20', '2020-12-25 01:02:20'),
(17, 18, 'تغمس جبنة السبانخ بالرقائق', 'Spinach cheese dip with chips', '250', '1093856641.jpg', '0', '2020-12-25 01:04:21', '2020-12-25 01:04:21'),
(18, 18, 'تكساس باربيكيو بريسكت ناتشوز', 'Texas bbq brisket nachos', '400', '837418992.jpg', '0', '2020-12-25 01:08:40', '2020-12-25 01:08:40'),
(19, 19, 'تاكو بيل بوريتو سوبريم', 'Taco Bell Burrito Supreme', '450', '25063531.jpg', '0', '2020-12-25 01:13:44', '2020-12-25 01:13:44'),
(20, 19, 'ستاربكس ماكياتو', 'Starbucks Macchiato', '180', '1184628754.jpg', '0', '2020-12-25 01:15:22', '2020-12-25 01:15:22'),
(21, 16, 'تشيكرز فرايز متبلة', 'Checkers Seasoned Fries', '100', '1992877933.jpg', '0', '2020-12-25 01:20:27', '2020-12-25 01:20:27'),
(23, 16, 'شوربة خبز بانيرا مع البروكلي والجبن', 'Panera Bread Broccoli Cheddar Soup', '100', '1855618589.jpg', '0', '2020-12-25 01:22:11', '2020-12-25 01:22:11'),
(24, 18, 'بانج بانج روبيان تاكو', 'bang bang shrimp tacos', '450', '976086531.jpg', '0', '2020-12-25 01:30:33', '2020-12-25 01:30:33'),
(25, 19, 'غريس مع مرق دجاج بالزنجبيل والثوم', 'Gheerice with ginger garlic chicken gravy', '500', '661099653.jpg', '0', '2020-12-25 01:42:30', '2020-12-25 01:42:30'),
(26, 17, 'متنوعة دوسة', 'variety dosa\'s', '250', '942239230.jpg', '0', '2020-12-25 01:45:06', '2020-12-25 01:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_users`
--

CREATE TABLE `kitchen_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kitchen_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kitchen_users`
--

INSERT INTO `kitchen_users` (`id`, `kitchen_name`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '963258741', NULL, '$2y$10$ZlEPLM4bqxKg8fnAo2nyUOKP5UzYp4L4A3sNE.t3EGg/28XF/GqgG', NULL, '0', NULL, '2020-12-29 02:40:15');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_07_063211_create_admins_table', 1),
(5, '2020_12_07_063303_create_kitchen_users_table', 1),
(6, '2020_12_07_092818_create_items_table', 1),
(7, '2020_12_07_093016_create_food_packages_table', 1),
(8, '2020_12_07_093351_create_user_addresses_table', 1),
(9, '2020_12_12_123934_create_categories_table', 2),
(13, '2020_12_17_044501_create_tags_table', 3),
(14, '2020_12_25_133110_create_carts_table', 4),
(15, '2020_12_25_135232_create_bookings_table', 5),
(16, '2020_12_29_074054_create_coupons_table', 6),
(17, '2020_12_29_144010_create_cities_table', 7),
(18, '2020_12_30_092923_create_chat_to_customers_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_name_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name_arabic`, `tag_name_english`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'جنوب الهند', 'South Indian', '1765759810.jpg', '0', '2020-12-17 01:09:17', '2020-12-17 01:09:17'),
(2, 'شمال الهند', 'North Indian', '1370721398.jpg', '0', '2020-12-17 01:09:50', '2020-12-17 01:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `nationality`, `address_id`, `dob`, `gender`, `otp`, `status`, `created_at`, `updated_at`) VALUES
(6, 'LRB', 'INFO TECH', 'info@lrbtech.com', '088831919', NULL, '$2y$10$6p8I.Rmb4dIGRHEGMvtCiO6Aa9b2Loa3JhEYmesVD511WL.fNgNcG', NULL, NULL, '9', NULL, NULL, '9176', '1', '2020-12-24 03:39:58', '2020-12-29 20:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `map_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `map_title`, `lat`, `lng`, `addr_type`, `addr_title`, `address1`, `address2`, `address3`, `city`, `pincode`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '1', 'tower', '2/1/30, 1st St, Koodal Nagar, Madurai, Tamil Nadu 625018', NULL, '08883191962', 'Madurai', '625018', '6', NULL, '2020-12-26 03:10:06', '2020-12-26 03:10:06'),
(2, NULL, NULL, NULL, '2', 'LRB INFO TECH', '2/1/30, 1st St, Koodal Nagar, Madurai, Tamil Nadu 625018', NULL, '08883191962', 'Madurai', '625018', '6', NULL, '2020-12-26 03:14:10', '2020-12-26 03:14:10'),
(3, NULL, NULL, NULL, '3', 'tower', '12', 'test', '5432167', 'abu dhabi', '654321', NULL, NULL, '2020-12-28 09:45:26', '2020-12-28 09:45:26'),
(4, NULL, NULL, NULL, '3', 'tower', '12', 'test', '5432167', 'abu dhabi', '654321', NULL, NULL, '2020-12-28 09:45:38', '2020-12-28 09:45:38'),
(5, NULL, NULL, NULL, '3', 'tower', '12', 'test', '5432167', 'abu dhabi', '654321', NULL, NULL, '2020-12-28 10:29:27', '2020-12-28 10:29:27'),
(6, NULL, NULL, NULL, '3', 'tower', '12', 'test', '5432167', 'abu dhabi', '654321', NULL, NULL, '2020-12-28 10:29:29', '2020-12-28 10:29:29'),
(7, NULL, NULL, NULL, '3', 'tower', '12', 'test', '5432167', 'abu dhabi', '654321', NULL, NULL, '2020-12-28 10:29:29', '2020-12-28 10:29:29'),
(8, NULL, NULL, NULL, '3', 'tower', '12', 'test', '5432167', 'abu dhabi', '654321', NULL, NULL, '2020-12-28 10:29:29', '2020-12-28 10:29:29'),
(9, 'Office no- 873, Floor No- 8, Al Ghaith Tower,(opposite to ADCB BANK Hamdan Street Abu dhabi - Zone 1شرق 8 - أبو ظبي - United Arab Emirates', '24.4908877', '54.3638712', '1', 'mubarak tower', '50', NULL, '654321789', 'abudhabi', '125533', '6', NULL, '2020-12-29 20:57:43', '2020-12-29 20:57:43'),
(10, 'Office no- 873, Floor No- 8, Al Ghaith Tower,(opposite to ADCB BANK Hamdan Street Abu dhabi - Zone 1شرق 8 - أبو ظبي - United Arab Emirates', '24.4908877', '54.3638712', '1', 'lrb info tech', '50', NULL, NULL, 'abudhabi', '6789543', NULL, NULL, '2020-12-29 21:00:37', '2020-12-29 21:00:37'),
(11, 'Office no- 873, Floor No- 8, Al Ghaith Tower,(opposite to ADCB BANK Hamdan Street Abu dhabi - Zone 1شرق 8 - أبو ظبي - United Arab Emirates', '24.4908877', '54.3638712', '1', 'lrb info tech', '50', NULL, NULL, 'abudhabi', '6789543', NULL, NULL, '2020-12-29 21:00:41', '2020-12-29 21:00:41'),
(12, 'Office no- 873, Floor No- 8, Al Ghaith Tower,(opposite to ADCB BANK Hamdan Street Abu dhabi - Zone 1شرق 8 - أبو ظبي - United Arab Emirates', '24.4908877', '54.3638712', '1', 'lrb info tech', '50', NULL, NULL, 'abudhabi', '6789543', NULL, NULL, '2020-12-29 21:00:54', '2020-12-29 21:00:54'),
(13, 'Office no- 873, Floor No- 8, Al Ghaith Tower,(opposite to ADCB BANK Hamdan Street Abu dhabi - Zone 1شرق 8 - أبو ظبي - United Arab Emirates', '24.4908877', '54.3638712', '1', '23', '8755', NULL, '547776788998', 'abudhabi', '56789032', NULL, NULL, '2020-12-29 21:05:42', '2020-12-29 21:05:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_to_customers`
--
ALTER TABLE `chat_to_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food_packages`
--
ALTER TABLE `food_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitchen_users`
--
ALTER TABLE `kitchen_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kitchen_users_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `chat_to_customers`
--
ALTER TABLE `chat_to_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_packages`
--
ALTER TABLE `food_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kitchen_users`
--
ALTER TABLE `kitchen_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
