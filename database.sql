-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 01:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier`
--

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
(275, '2014_10_12_000000_create_users_table', 1),
(276, '2014_10_12_100000_create_password_resets_table', 1),
(277, '2019_08_19_000000_create_failed_jobs_table', 1),
(278, '2021_06_06_101009_create_permission_tables', 1),
(279, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(281, '2022_02_21_131009_create_shipping_rules_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', 'Role', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(2, 'role-create', 'web', 'Role', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(3, 'role-edit', 'web', 'Role', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(4, 'role-delete', 'web', 'Role', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(5, 'user-list', 'web', 'User', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(6, 'user-create', 'web', 'User', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(7, 'user-edit', 'web', 'User', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(8, 'user-delete', 'web', 'User', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(9, 'profile-view', 'web', 'Profile', '2022-02-20 07:34:56', '2022-02-20 07:34:56'),
(10, 'rule-list', 'web', 'Shipping-Rule', '2022-02-23 12:23:37', '2022-02-23 12:23:37'),
(11, 'rule-create', 'web', 'Shipping-Rule', '2022-02-23 12:23:37', '2022-02-23 12:23:37'),
(12, 'rule-edit', 'web', 'Shipping-Rule', '2022-02-23 12:23:37', '2022-02-23 12:23:37'),
(13, 'rule-delete', 'web', 'Shipping-Rule', '2022-02-23 12:23:37', '2022-02-23 12:23:37'),
(14, 'calculator-list', 'web', 'Shipping-Calculator', '2022-02-23 12:23:37', '2022-02-23 12:23:37'),
(15, 'calculator-create', 'web', 'Shipping-Calculator', '2022-02-23 12:23:37', '2022-02-23 12:23:37'),
(16, 'calculator-edit', 'web', 'Shipping-Calculator', '2022-02-23 12:23:37', '2022-02-23 12:23:37'),
(17, 'calculator-delete', 'web', 'Shipping-Calculator', '2022-02-23 12:23:37', '2022-02-23 12:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 5, 'MyApp', 'b5330b9e95b3d278205e261cae8fe5ab2b84dffed64f09d7c9189a6ecc8b3fa8', '[\"*\"]', NULL, '2022-02-22 09:56:35', '2022-02-22 09:56:35'),
(2, 'App\\Models\\User', 1, 'MyApp', '521006ba1e9efc339fa94aa5cd6075ef68ecaee4e47bc619d9935381b2304c14', '[\"*\"]', NULL, '2022-02-22 10:07:00', '2022-02-22 10:07:00'),
(3, 'App\\Models\\User', 6, 'MyApp', '7e1b17597d0aab189c5536f4e0934d855bc9e26911179e107c3fe797b8df9583', '[\"*\"]', '2022-02-22 12:46:16', '2022-02-22 10:45:05', '2022-02-22 12:46:16'),
(4, 'App\\Models\\User', 6, 'authToken', 'aff2889af81a157baeb0b1b11679d329f60d52e221280a773220e873e9ff58f8', '[\"*\"]', NULL, '2022-02-22 14:16:42', '2022-02-22 14:16:42'),
(5, 'App\\Models\\User', 6, 'authToken', '4f2624b5f172c5702638b1e077c9d685d7b1a4b25feb7edad6933f1c8ea6344a', '[\"*\"]', NULL, '2022-02-22 14:16:46', '2022-02-22 14:16:46'),
(6, 'App\\Models\\User', 6, 'authToken', 'e95edb93de4d4e7610c86aada8bb432f59e27f145f25512165d58d324bfbeff2', '[\"*\"]', NULL, '2022-02-22 14:16:48', '2022-02-22 14:16:48'),
(7, 'App\\Models\\User', 6, 'authToken', '10594effefe64491a593f14444d8a35cd7bfa53b35d67859dea4a1dcd09c28a2', '[\"*\"]', '2022-02-22 14:49:05', '2022-02-22 14:16:49', '2022-02-22 14:49:05'),
(8, 'App\\Models\\User', 6, 'authToken', '7ef2a1f989f0edae9a0c13062a683b4aa099d603917ab50955a88e91f5fd0de8', '[\"*\"]', NULL, '2022-02-22 14:18:22', '2022-02-22 14:18:22'),
(9, 'App\\Models\\User', 8, 'shipping-rule', '47d73722ba1cf67a22fc6974ce9cb35b8851042f03ee812ba192e98b30a7e7aa', '[\"*\"]', NULL, '2022-02-22 14:42:12', '2022-02-22 14:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-02-20 07:35:13', '2022-02-20 07:35:13'),
(2, 'Merchant', 'web', '2022-02-23 12:24:41', '2022-02-23 12:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rules`
--

CREATE TABLE `shipping_rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_rate` double NOT NULL,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_rules`
--

INSERT INTO `shipping_rules` (`id`, `delivery_type`, `delivery_route`, `title`, `weight_range`, `expiry_date`, `shipping_rate`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(9, 'Regular', 'OSD', 'Outside Dhaka - Regular', '{\"1\":{\"min\":\"1\",\"max\":\"500\",\"cost\":\"10\"},\"2\":{\"min\":\"501\",\"max\":\"1000\",\"cost\":\"5\"},\"3\":{\"min\":\"1001\",\"max\":\"2000\",\"cost\":\"5\"}}', '2022-02-23', 70, 1, 1, '2022-02-23 03:52:41', '2022-02-23 04:10:18'),
(10, 'Express', 'OSD', 'Outside Dhaka - Express', '{\"1\":{\"min\":\"1\",\"max\":\"500\",\"cost\":\"10\"},\"3\":{\"min\":\"501\",\"max\":\"1000\",\"cost\":\"5\"}}', '2022-02-28', 80, 1, 1, '2022-02-23 04:08:10', '2022-02-23 04:08:10'),
(11, 'Regular', 'ISD', 'Inside Dhaka-Regular', '{\"1\":{\"min\":\"1\",\"max\":\"500\",\"cost\":\"10\"},\"2\":{\"min\":\"1001\",\"max\":\"1500\",\"cost\":\"5\"}}', '2022-02-28', 30, 1, 1, '2022-02-23 04:12:20', '2022-02-23 04:12:20'),
(12, 'Express', 'ISD', 'Inside Dhaka - Express', '{\"1\":{\"min\":\"1\",\"max\":\"500\",\"cost\":\"0\"},\"2\":{\"min\":\"1001\",\"max\":\"2000\",\"cost\":\"10\"}}', '2022-02-28', 40, 1, 1, '2022-02-23 04:15:03', '2022-02-23 04:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `token`, `email`, `role`, `is_active`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ruman', NULL, 'md.rhbappy@gmail.com', '[\"Admin\"]', 1, '$2y$10$vBm/K6PuvbkJ6RPQP7Ncd.gDWlslbKudDEcsT8.SPRfK2IS74kXrW', NULL, NULL, '2022-02-20 07:35:13', '2022-02-22 10:07:00'),
(4, 'Test', NULL, 'P232@hil.com.bd', '[\"Admin\"]', 1, '$2y$10$BbtZ4Nrc9Ph7gYgygj.viOv60jXZwcuz6wROXf0w8kkY7i7Iyzt56', NULL, NULL, '2022-02-20 11:24:55', '2022-02-20 11:39:58'),
(5, 'Cxc', NULL, 'admin@gmail.com', '[\"Admin\"]', 1, '$2y$10$S1EyyrJJRO1CPqysTA3Zd.ljubjdw4OZhVpX./Chhvr9IOQiD05XK', NULL, NULL, '2022-02-20 11:40:25', '2022-02-22 09:56:34'),
(6, 'api', NULL, 'api@test.com', '[\"Merchant\"]', 1, '$2y$10$A3NTr4t546JhptqZQRODkeq.MXtIdAeAHI6uBeNpv3h5bPKCD8Ivy', NULL, NULL, '2022-02-22 10:45:05', '2022-02-23 12:28:24'),
(7, 'TestApi', NULL, 'test@gmail.com', '[\"Merchant\"]', 1, '$2y$10$5frcK3QqjYPungh0zIvS1.I/DaLdK4YYQKUvwo9kKf6rH7zmh/yru', NULL, NULL, '2022-02-22 14:40:17', '2022-02-23 12:29:28'),
(8, 'dfdf', '9|oHw63Y0oTrSlBIp19jFCBEkZxU83mGc7tsZW8RZa', 'ddf@rr.com', '[\"Merchant\"]', 1, '$2y$10$m1ILhNDrwxLX37PH2sK0ZO7z9klmWakT2s46L8xtRxCsJTzwXXx32', NULL, NULL, '2022-02-22 14:42:12', '2022-02-23 12:29:04');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shipping_rules`
--
ALTER TABLE `shipping_rules`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_rules`
--
ALTER TABLE `shipping_rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
