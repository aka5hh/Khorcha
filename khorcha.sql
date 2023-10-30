-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 08:33 AM
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
(1, 'Salary', 'Job Salary', 1, NULL, 'IC206534e7ae534e8123124', 1, '2023-10-22 09:00:12', NULL),
(2, 'Freelancing', 'Side income.', 1, NULL, 'IC206534e7ae534e8123', 1, '2023-10-22 09:05:41', NULL),
(3, 'Tuition', 'Private tuition', 1, NULL, 'IC206534e7ae534e8', 1, '2023-10-22 09:13:18', NULL),
(4, 'Lalalalal', 'Babababa', 1, 1, 'lalalalal', 0, '2023-10-22 09:18:35', '2023-10-30 07:19:28'),
(5, 'Sdohasd Asdkass Dda', 'Babababa', 1, NULL, 'sdohasd-asdkass-dda', 0, '2023-10-22 09:19:32', '2023-10-30 07:19:24'),
(6, 'Amar Shonar Bangla', '123', 1, 1, 'amar-shonar-bangla', 0, '2023-10-22 09:20:05', '2023-10-30 07:19:21'),
(8, 'asdasd', 'asdasd', 1, NULL, 'asdasd', 0, '2023-10-23 09:39:39', '2023-10-30 07:19:14'),
(9, 'Skdjkbaobq  asdqe', 'asd 23sd a213123 asd', 1, NULL, 'skdjkbaobq-asdqe', 0, '2023-10-26 03:46:43', '2023-10-30 07:18:30'),
(10, 'Shoz', 'lololololol', 1, 1, 'shoz', 0, '2023-10-26 04:43:07', '2023-10-30 07:18:25'),
(11, 'Shoz.com.orgd', 'aspojd 0ahdpasj dpoasjd0pj- jaspdja spdj qwe qweqwe', 1, 1, 'shozcomorgd', 0, '2023-10-26 04:43:45', '2023-10-30 07:18:20'),
(12, 'asdas', 'asdasdasd', 1, NULL, 'asdas', 0, '2023-10-30 04:12:54', '2023-10-30 07:18:16'),
(13, 'asdasdasdasd', 'asdasdasdasdasdassd', 1, NULL, 'asdasdasdasd', 0, '2023-10-30 04:46:53', '2023-10-30 07:18:12'),
(14, 'dfgsdfg', 'dfgsdfg', 1, NULL, 'dfgsdfg', 0, '2023-10-30 05:05:50', '2023-10-30 07:18:02'),
(15, 'asdadasdasdasd', 'asdasdasdasdasasdasasdasd', 1, 1, 'asdadasdasdasd', 0, '2023-10-30 06:24:43', '2023-10-30 07:17:59');

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
(6, '2023_10_21_163413_create_expense_categories_table', 1);

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
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abu Bakar Siddique Akash', 'akash@gmail.com', NULL, '$2y$10$IF29eShk0PiFgiQEaEvdRuxda4/Gv6v4NbRGVwrGHTdJmmoftjBDS', NULL, '2023-10-21 22:29:55', '2023-10-21 22:29:55');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `expcate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `incate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
