-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 08:12 AM
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
-- Database: `khorcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `expense_title` varchar(100) DEFAULT NULL,
  `expcate_id` int(11) DEFAULT NULL,
  `expense_amount` varchar(10) DEFAULT NULL,
  `expense_date` varchar(20) DEFAULT NULL,
  `expense_creator` int(11) DEFAULT NULL,
  `expense_editor` int(11) DEFAULT NULL,
  `expense_slug` varchar(30) DEFAULT NULL,
  `expense_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_title`, `expcate_id`, `expense_amount`, `expense_date`, `expense_creator`, `expense_editor`, `expense_slug`, `expense_status`, `created_at`, `updated_at`) VALUES
(2, 'Semester fee', 2, '18000', '2023-10-26', 1, NULL, 'E206548bed53492c', 1, '2023-11-06 10:24:21', NULL),
(3, 'House Rent', 3, '28000', '2023-10-31', 1, NULL, 'E206548befbdf5a8', 1, '2023-11-06 10:24:59', NULL),
(4, 'Gas bill for Octoer', 3, '20000', '2023-10-31', 1, NULL, 'E206548beb9e9bd2', 1, '2023-11-06 10:23:53', NULL),
(6, 'Fluffy', 6, '500', '2023-11-01', 1, 1, 'E206548bee45a898', 1, '2023-11-06 10:24:36', '2023-11-07 04:48:47'),
(7, 'BMW', 4, '2312312', '2023-11-23', 1, 1, 'I206549c1bb98d16', 1, '2023-11-07 04:48:59', '2023-11-07 04:49:35'),
(9, 'ADASD', 3, '3123123', '2023-11-13', 1, NULL, 'I206549c5a08f9f0', 0, '2023-11-07 05:05:36', '2023-11-07 05:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `expcate_id` bigint(20) UNSIGNED NOT NULL,
  `expcate_name` varchar(50) NOT NULL,
  `expcate_remarks` varchar(200) DEFAULT NULL,
  `expcate_creator` int(11) DEFAULT NULL,
  `expcate_editor` int(11) DEFAULT NULL,
  `expcate_slug` varchar(30) DEFAULT NULL,
  `expcate_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`expcate_id`, `expcate_name`, `expcate_remarks`, `expcate_creator`, `expcate_editor`, `expcate_slug`, `expcate_status`, `created_at`, `updated_at`) VALUES
(2, 'IUB', 'University Expense.', 1, 1, 'iub', 1, '2023-11-05 09:37:00', '2023-11-05 10:23:39'),
(3, 'Rent', 'house rent, car rent, etc', 1, NULL, 'rent', 1, '2023-11-05 09:38:17', NULL),
(4, 'Car', 'maintenance, driver, fuel, tolls, garage.', 1, NULL, 'car', 1, '2023-11-05 09:50:39', NULL),
(5, 'asdasdasdasasdasd', 'dasdasdadasdasdasd', 1, 1, 'asdasdasdasasdasd', 0, '2023-11-05 10:52:06', '2023-11-05 10:52:19'),
(6, 'Pet', 'food and accessories', 1, NULL, 'pet', 0, '2023-11-06 09:17:43', '2023-11-07 05:16:12'),
(7, 'Biye', 'fml', 1, NULL, 'biye', 0, '2023-11-06 10:00:25', '2023-11-06 10:00:42');

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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `income_id` bigint(20) UNSIGNED NOT NULL,
  `income_title` varchar(100) DEFAULT NULL,
  `incate_id` int(11) DEFAULT NULL,
  `income_amount` varchar(10) DEFAULT NULL,
  `income_date` varchar(20) DEFAULT NULL,
  `income_creator` int(11) DEFAULT NULL,
  `income_editor` int(11) DEFAULT NULL,
  `income_slug` varchar(30) DEFAULT NULL,
  `income_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`income_id`, `income_title`, `incate_id`, `income_amount`, `income_date`, `income_creator`, `income_editor`, `income_slug`, `income_status`, `created_at`, `updated_at`) VALUES
(2, 'September Salary', 1, '7000', '2023-11-05', 1, 2, 'I2065422607ca7e8', 1, '2023-11-01 10:18:47', '2023-11-02 09:40:25'),
(3, 'October Salary', 1, '800', '2023-11-15', 1, 2, 'I206542273c550db', 1, '2023-11-02 09:39:20', '2023-11-05 05:05:50'),
(4, 'A-Levels teaching', 3, '5000', '2023-10-31', 1, NULL, 'I20654227ab62994', 0, '2023-11-01 10:25:47', '2023-11-07 05:14:18'),
(5, 'Web App Development', 2, '2000', '2023-11-12', 1, 2, 'I2065422d331e22c', 1, '2023-11-01 10:49:23', '2023-11-02 09:44:51'),
(6, 'Makers', 1, '5000', '2023-11-01', 1, 2, 'I20654324033be21', 1, '2023-11-02 04:22:27', '2023-11-02 09:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `incate_id` bigint(20) UNSIGNED NOT NULL,
  `incate_name` varchar(50) NOT NULL,
  `incate_remarks` varchar(200) DEFAULT NULL,
  `incate_creator` int(11) DEFAULT NULL,
  `incate_editor` int(11) DEFAULT NULL,
  `incate_slug` varchar(30) DEFAULT NULL,
  `incate_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`incate_id`, `incate_name`, `incate_remarks`, `incate_creator`, `incate_editor`, `incate_slug`, `incate_status`, `created_at`, `updated_at`) VALUES
(1, 'Salary', 'official job salary', 1, 1, 'salary', 1, '2023-11-01 10:47:19', '2023-11-07 05:02:11'),
(2, 'Freelancing', 'fiver, upwork', 1, 1, 'freelancing', 1, '2023-11-01 10:47:25', '2023-11-07 05:15:50'),
(3, 'Tuition', 'side income', 1, 1, 'tuition', 1, '2023-11-01 10:47:50', '2023-11-07 05:01:36'),
(4, 'Consultancy', 'other company', 1, 1, 'consultancy', 1, '2023-11-01 10:48:13', '2023-11-07 05:01:23');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_21_142158_create_income_categories_table', 1),
(6, '2023_10_21_163413_create_expense_categories_table', 1),
(7, '2023_11_01_145755_create_incomes_table', 2),
(8, '2023_11_01_150953_create_expenses_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `slug` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `username`, `role`, `photo`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abu Bakar Siddique Akash', NULL, 'akash@gmail.com', NULL, '$2y$10$IF29eShk0PiFgiQEaEvdRuxda4/Gv6v4NbRGVwrGHTdJmmoftjBDS', NULL, NULL, NULL, NULL, '', 1, '2023-10-21 22:29:55', '2023-10-21 22:29:55'),
(2, 'Sanjana', NULL, 'sanjana@gmail.com', NULL, '$2y$10$hQtnJiOAmR/k/1WMEnFIGe4yos9lK9yGtUcwVOc9PvQVZtuvwV3im', NULL, NULL, NULL, NULL, '', 1, '2023-11-02 09:44:01', '2023-11-02 09:44:01'),
(3, 'Ms Shawa', NULL, 'shawa@gmail.com', NULL, '$2y$10$S9yocW2VFHMIubVjhLRCbeX8ZuMXypfF9K5blxKYob0fypg.uaMRK', NULL, NULL, NULL, NULL, '', 1, '2023-11-07 06:52:56', '2023-11-07 06:52:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`expcate_id`),
  ADD UNIQUE KEY `expense_categories_expcate_name_unique` (`expcate_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`incate_id`),
  ADD UNIQUE KEY `income_categories_incate_name_unique` (`incate_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `expcate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `income_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `incate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
