-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 09:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rd_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_links`
--

CREATE TABLE `account_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `rd_acc_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rupees` int(11) NOT NULL,
  `dop` date NOT NULL,
  `nominee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dom` date NOT NULL,
  `as_card_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark_kyc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `election_card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adhar_card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_collection`
--

CREATE TABLE `daily_collection` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `rupees` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2020_03_11_093957_rd_users', 1),
(4, '2020_03_19_173525_create_account_links_table', 1),
(5, '2020_03_26_152803_create_daily_collection_table', 1),
(6, '2020_04_08_113016_add_soft_deletes_to_rd_users_table', 1),
(7, '2020_04_08_130203_add_soft_deletes_to_account_links_table', 1);

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
-- Table structure for table `rd_users`
--

CREATE TABLE `rd_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `rd_acc_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dop` date NOT NULL,
  `rupees` int(11) NOT NULL,
  `nominee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `as_card_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dom` date NOT NULL,
  `remark_kyc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `election_card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adhar_card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rd_users`
--

INSERT INTO `rd_users` (`id`, `rd_acc_no`, `name`, `address`, `dop`, `rupees`, `nominee`, `as_card_no`, `dom`, `remark_kyc`, `pan_no`, `election_card_no`, `adhar_card_no`, `mobile_no`, `dob`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3003795027', 'John', 'Gadge nagar Amravati', '2014-07-26', 1000, 'Sharad S.Landage (B)', 'IMF 012116', '2019-07-26', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', '2020-06-18 17:03:27', '2020-06-18 17:03:27', NULL),
(2, '3003796017', 'Brad', 'Friends Colony,VMV Amt', '2014-07-26', 500, 'Rahul D.Kale    (S)', 'IMF 012177', '2019-07-26', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', '2020-06-18 17:03:27', '2020-06-18 17:03:27', NULL),
(3, '3003797441', 'Gine', 'Vitthalarpan colony,Farshi stop Amt', '2014-07-26', 600, 'Shrikant/Shushant (S)', 'IMF 012118', '2019-07-26', 'SB W/N A/c', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', '2020-06-18 17:03:27', '2020-06-18 17:03:27', NULL),
(4, '3003798790', 'Thomas', 'shushil nagar Amt', '2014-07-26', 200, 'Rupraj J.Chauhan(H)', 'IMF 012119', '2019-07-26', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', '2020-06-18 17:03:27', '2020-06-18 17:03:27', NULL),
(5, '3004800300', 'Stefan', 'Padam saurabh colony, Amt.', '2014-08-16', 1200, 'Jaya S.Bhadange (W)', 'IMF 012121', '2019-08-16', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', '2020-06-18 17:03:27', '2020-06-18 17:03:27', NULL),
(6, '3004801000', 'Nicky', 'Snmati colony,ShegaonRd, Amt', '2014-08-16', 500, 'Uma R.Gaikwad (W)', 'IMF 012122', '2019-08-16', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', '2020-06-18 17:03:27', '2020-06-18 17:03:27', NULL),
(7, '3004801215', 'Rick', 'Gadge Nagar, Amt', '2014-08-16', 500, 'Rekha A.Navaghare (M)', 'IMF 012123', '2019-08-16', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', '2020-06-18 17:03:27', '2020-06-18 17:03:27', NULL),
(8, '3004802250', 'Tim', 'Kanta Nagar,  Amt (KRIBHCO)', '2014-08-16', 1000, 'Dhananjay V.Gawande(H)', 'IMF 012124', '2019-08-16', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', '2020-06-18 17:03:27', '2020-06-18 17:03:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Minal', 'shendeminal2011@gmail.com', NULL, '$2y$10$yy/LNMBHqxyqZg2wuodFB.hg144BZsKE79TUbubXmpVmY9djcIzfG', '7nTVFarQX2mJVELcfiqZ3UtcFJg3gYu81ebcPWMQeNCwLGsctdDXtOnjGBeP', '2020-06-18 16:55:30', '2020-06-18 16:55:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_links`
--
ALTER TABLE `account_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_links_rd_acc_no_unique` (`rd_acc_no`);

--
-- Indexes for table `daily_collection`
--
ALTER TABLE `daily_collection`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rd_users`
--
ALTER TABLE `rd_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rd_users_rd_acc_no_unique` (`rd_acc_no`);

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
-- AUTO_INCREMENT for table `account_links`
--
ALTER TABLE `account_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_collection`
--
ALTER TABLE `daily_collection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rd_users`
--
ALTER TABLE `rd_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
