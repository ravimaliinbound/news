-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2025 at 06:11 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labhaydz_palrecha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile`, `password`, `is_active`, `is_delete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@palrecha.com', '9462708110', '$2y$10$FhnRPV84WfXD/Ls1pQ5WH.Kx9K2YCir9OrEkBgeb/WFXa1X00Hdcy', 1, 0, NULL, '2024-03-21 18:34:43', '2024-03-21 18:34:43'),
(2, 'developer', 'dev@inboundwebhub.com', NULL, '$2y$10$lUYpD2ppkF6TFhvcQAS.buLreAcz0FrIOMN1jDM90lVfZ7tuOmK7C', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins_password_resets`
--

CREATE TABLE `admins_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins_password_resets`
--

INSERT INTO `admins_password_resets` (`email`, `token`, `created_at`) VALUES
('admin@plexpoindia.org', '$2y$10$EYhjzG5/j11lOdLWltXp0.BxKyKu13mxrfRMTujtAeRlD0MpXU79e', '2024-06-17 09:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `assorting`
--

CREATE TABLE `assorting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packaging_slip_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_quantity` decimal(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'visitor', 1, 0, '2025-01-08 13:31:58', '2025-01-09 06:40:03'),
(2, 'DEMO', 1, 0, '2025-01-08 14:06:02', '2025-01-09 06:09:34'),
(3, 'visitors', 1, 1, '2025-01-09 06:31:09', '2025-01-09 06:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `color_assortings`
--

CREATE TABLE `color_assortings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packaging_slip_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_assortings`
--

INSERT INTO `color_assortings` (`id`, `packaging_slip_id`, `color`, `quantity`, `created_at`, `updated_at`) VALUES
(16, '1', 'color_1', '12', '2025-06-18 13:13:37', '2025-06-18 13:13:37'),
(17, '1', 'color_3', '15', '2025-06-18 13:13:37', '2025-06-18 13:13:37'),
(18, '1', 'color_5', '09', '2025-06-18 13:13:37', '2025-06-18 13:13:37'),
(19, '1', 'color_6', '13', '2025-06-18 13:13:37', '2025-06-18 13:13:37'),
(20, '1', 'color_7', '09', '2025-06-18 13:13:37', '2025-06-18 13:13:37'),
(25, '2', 'color_1', '12', '2025-06-18 13:40:21', '2025-06-18 13:40:21'),
(26, '2', 'color_3', '38', '2025-06-18 13:40:21', '2025-06-18 13:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `defective`
--

CREATE TABLE `defective` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packaging_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `defective`
--

INSERT INTO `defective` (`id`, `packaging_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, '1', NULL, '5', '2025-06-18 12:56:45', '2025-06-18 12:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitor_password_resets`
--

CREATE TABLE `exhibitor_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gate_pass`
--

CREATE TABLE `gate_pass` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packaging_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `than` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gate_pass`
--

INSERT INTO `gate_pass` (`id`, `packaging_id`, `than`, `meter`, `delivery_location`, `car_number`, `driver_name`, `created_at`, `updated_at`) VALUES
(1, '1', '10', NULL, NULL, '1234', 'Test', '2025-06-18 10:30:14', '2025-06-18 10:33:11'),
(2, '3', '24', NULL, NULL, 'SSS', 'SSSS', '2025-06-20 05:43:48', '2025-06-20 05:43:48'),
(3, '7', '24', NULL, NULL, 'SSS', 'SSSS', '2025-06-20 05:46:14', '2025-06-20 05:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `inward_items`
--

CREATE TABLE `inward_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packaging_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ware_house_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inward_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inward_items`
--

INSERT INTO `inward_items` (`id`, `packaging_id`, `item_id`, `ware_house_id`, `gate_pass_id`, `inward_quantity`, `remaining_quantity`, `date`, `created_at`, `updated_at`) VALUES
(6, '2', NULL, '3', '1', '20', '8', '2026-06-06 13:48:00', '2025-06-18 13:48:31', '2025-06-18 13:48:31'),
(7, '7', NULL, '1', '222', '30', '520', '2026-08-06 05:48:00', '2025-06-20 05:48:07', '2025-06-20 05:48:07'),
(8, '7', NULL, '1', '222', '520', '0', '2026-08-06 05:53:00', '2025-06-20 05:53:34', '2025-06-20 05:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

CREATE TABLE `item_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packaging_slip_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `than` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_table`
--

INSERT INTO `item_table` (`id`, `packaging_slip_id`, `description`, `than`, `cut`, `meter`, `created_at`, `updated_at`) VALUES
(7, '1', 'Desc1', '12', '2', '24', '2025-06-18 13:13:37', '2025-06-18 13:13:37'),
(8, '1', 'Desc2', '10', '3', '30', '2025-06-18 13:13:37', '2025-06-18 13:13:37'),
(11, '2', 'Desc1', '21', '3', '63', '2025-06-18 13:40:21', '2025-06-18 13:40:21'),
(12, '3', 'POPLIN', '24', '24', '576', '2025-06-20 05:41:06', '2025-06-20 05:41:06'),
(13, '4', 'POPLIN', '24', '24', '576', '2025-06-20 05:42:24', '2025-06-20 05:42:24'),
(14, '4', 'POPLIN', '24', '26', '624', '2025-06-20 05:42:24', '2025-06-20 05:42:24'),
(15, '5', 'POPLIN', '24', '24', '576', '2025-06-20 05:45:35', '2025-06-20 05:45:35'),
(16, '5', 'POPLIN', '24', '26', '624', '2025-06-20 05:45:35', '2025-06-20 05:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"b958d821-dc38-4128-9e39-96966d6ca1e7\",\"displayName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVendorWelcomeMail\\\":1:{s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-01-08 19:39:37.938785\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:12:\\\"Asia\\/Kolkata\\\";}}\"}}', 0, NULL, 1736345377, 1736345372),
(2, 'default', '{\"uuid\":\"71fca80d-8a1a-4b92-bf4f-13fc5ad8bdf2\",\"displayName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVendorWelcomeMail\\\":1:{s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-01-08 19:40:23.952229\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:12:\\\"Asia\\/Kolkata\\\";}}\"}}', 0, NULL, 1736345423, 1736345418),
(3, 'default', '{\"uuid\":\"fc2a0908-3e6d-4a8e-a4f0-d80e6d524fc0\",\"displayName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVendorWelcomeMail\\\":1:{s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-01-08 19:42:20.078086\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:12:\\\"Asia\\/Kolkata\\\";}}\"}}', 0, NULL, 1736345540, 1736345535),
(4, 'default', '{\"uuid\":\"86ed59fa-62aa-4989-9ba1-6b80e118d47b\",\"displayName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVendorWelcomeMail\\\":1:{s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-01-08 19:45:57.321417\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:12:\\\"Asia\\/Kolkata\\\";}}\"}}', 0, NULL, 1736345757, 1736345752),
(5, 'default', '{\"uuid\":\"f5e7dc04-7b97-4b88-83af-1100901194d9\",\"displayName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVendorWelcomeMail\\\":1:{s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-01-08 19:55:55.805010\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:12:\\\"Asia\\/Kolkata\\\";}}\"}}', 0, NULL, 1736346355, 1736346350),
(6, 'default', '{\"uuid\":\"72e61b53-53af-4ced-b8dc-00f7f9e1e8a3\",\"displayName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVendorWelcomeMail\\\":1:{s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-01-09 11:16:33.554091\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:12:\\\"Asia\\/Kolkata\\\";}}\"}}', 0, NULL, 1736401593, 1736401589),
(7, 'default', '{\"uuid\":\"4fbcdd50-b7be-4647-a1cc-3ee3c3b7c8ed\",\"displayName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVendorWelcomeMail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVendorWelcomeMail\\\":1:{s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-01-09 17:18:28.928619\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:12:\\\"Asia\\/Kolkata\\\";}}\"}}', 0, NULL, 1736423308, 1736423305);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2022_07_28_104510_create_admins_table', 1),
(7, '2022_07_28_105010_create_admins_password_resets_table', 1),
(8, '2024_03_19_180523_create_exhibitors_table', 1),
(9, '2024_03_19_180616_create_countries_table', 1),
(10, '2024_03_19_180738_create_exhibitor_password_resets_table', 1),
(11, '2024_03_20_110504_create_states_table', 2),
(12, '2024_03_20_110903_create_categories_table', 3),
(13, '2024_03_21_102812_create_base_logics_table', 4),
(14, '2024_03_21_170548_create_inquiries_table', 5),
(15, '2024_03_21_170602_create_inquiry_details_table', 5),
(16, '2024_03_21_170906_create_inquiry_categories_table', 5),
(17, '2024_03_21_171200_create_inquiry_companies_table', 5),
(18, '2024_03_21_171558_create_stall_inquiries_table', 6),
(19, '2024_03_21_172808_create_heads_table', 6),
(20, '2024_03_22_074027_create_payment_logs_table', 7),
(21, '2024_04_10_174337_create_jobs_table', 8),
(22, '2024_06_12_182307_create_units_table', 9),
(23, '2024_06_15_174404_create_service_unit_table', 10),
(24, '2024_06_17_171925_create_vendor_password_resets_table', 11),
(26, '2024_06_17_191706_create_vendor_inventary', 12),
(27, '2024_11_28_115106_create_permission_tables', 13),
(28, '2025_01_08_180057_create_categories_table', 14),
(128, '2025_03_19_122433_create_assorting_table', 15),
(142, '2019_12_14_000001_create_personal_access_tokens_table', 16),
(143, '2025_03_12_104430_create_packaging_receipts_table', 16),
(144, '2025_03_12_172430_create_item_table_packaging_receipts_table', 16),
(145, '2025_03_18_182050_create_color_assotings_table', 16),
(146, '2025_03_31_160455_gatepass', 16),
(147, '2025_04_02_154853_create_inward_items_table', 16),
(149, '2025_04_03_184642_create_defectives_table', 16),
(150, '2025_04_10_121758_create_qualities_table', 16),
(152, '2025_04_03_162502_create_samples_table', 17),
(153, '2025_04_15_165132_create_warehouses_table', 17);

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

-- --------------------------------------------------------

--
-- Table structure for table `packaging_receipts`
--

CREATE TABLE `packaging_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` decimal(8,2) DEFAULT NULL,
  `waist` decimal(8,2) DEFAULT NULL,
  `length` decimal(8,2) DEFAULT NULL,
  `girth` decimal(8,2) DEFAULT NULL,
  `interlock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `petticoat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packaging_receipts`
--

INSERT INTO `packaging_receipts` (`id`, `receipt_number`, `jober_name`, `quality`, `size`, `waist`, `length`, `girth`, `interlock`, `petticoat`, `total_quantity`, `assort`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, '1', 'Tester', 'CHILLY XL', 2.00, 12.00, 23.00, 34.00, '12', 'Test', '27', 'yes', 0, '2025-06-18 10:12:13', '2025-06-18 13:10:30'),
(2, '2', 'Test2', 'SUPREME GOLD 8 PART', 2.18, 28.00, 26.00, 30.00, '32', 'Testing', '28', 'yes', 0, '2025-06-18 13:39:23', '2025-06-18 13:40:21'),
(3, '3', 'BABA RAMDEV', 'CHILLY XL', 2.00, 43.00, 39.00, 37.00, 'same', 'jain', '288', 'no', 0, '2025-06-20 05:41:06', '2025-06-20 05:41:06'),
(6, '4', 'VEER JINESWAR', 'CHILLY XL', 2.00, 43.00, 39.00, 37.00, 'SAME', 'JAIN', '600', 'no', 0, '2025-06-20 05:42:24', '2025-06-20 05:42:24'),
(7, '5', 'VEER JINESWAR', 'GOD CHOICE 8 PART', 2.18, 43.00, 39.00, 37.00, 'SAME', 'KAVITA', '550', 'no', 0, '2025-06-20 05:45:35', '2025-06-20 05:45:35');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualities`
--

CREATE TABLE `qualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualities`
--

INSERT INTO `qualities` (`id`, `name`, `size`, `created_at`, `updated_at`) VALUES
(10, 'CHILLY XL', 2.00, '2025-04-17 13:01:05', '2025-04-17 13:01:05'),
(11, 'CHILLY 8 PART', 2.18, '2025-04-17 13:01:05', '2025-04-17 13:01:05'),
(12, 'CHILLY XXL', 2.25, '2025-04-17 13:01:05', '2025-04-17 13:01:05'),
(13, 'SUPREME GOLD XL', 2.00, '2025-04-17 13:01:05', '2025-04-17 13:01:05'),
(14, 'SUPREME GOLD 8 PART', 2.18, '2025-04-17 13:01:05', '2025-04-17 13:01:05'),
(15, 'SUPREME GOLD XXL', 2.25, '2025-04-17 13:01:05', '2025-04-17 13:01:05'),
(16, 'GOD CHOICE XL', 2.00, '2025-04-17 13:01:05', '2025-04-17 13:01:05'),
(17, 'GOD CHOICE 8 PART', 2.18, '2025-04-17 13:01:05', '2025-04-17 13:01:05'),
(18, 'GOD CHOICE XXL', 2.25, '2025-04-17 13:01:05', '2025-04-17 13:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'GATE NO 3', '2025-04-30 14:04:05', '2025-04-30 14:04:05'),
(2, 'GATE NO 3', '2025-04-30 14:07:10', '2025-04-30 14:07:10'),
(3, 'MAIN FACTORY', '2025-04-30 14:07:22', '2025-04-30 14:07:22');

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
-- Indexes for table `admins_password_resets`
--
ALTER TABLE `admins_password_resets`
  ADD KEY `admins_password_resets_email_index` (`email`);

--
-- Indexes for table `assorting`
--
ALTER TABLE `assorting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_assortings`
--
ALTER TABLE `color_assortings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defective`
--
ALTER TABLE `defective`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibitor_password_resets`
--
ALTER TABLE `exhibitor_password_resets`
  ADD KEY `exhibitor_password_resets_email_index` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gate_pass`
--
ALTER TABLE `gate_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_items`
--
ALTER TABLE `inward_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_table`
--
ALTER TABLE `item_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `packaging_receipts`
--
ALTER TABLE `packaging_receipts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packaging_receipts_receipt_number_unique` (`receipt_number`);

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
-- Indexes for table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assorting`
--
ALTER TABLE `assorting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color_assortings`
--
ALTER TABLE `color_assortings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `defective`
--
ALTER TABLE `defective`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gate_pass`
--
ALTER TABLE `gate_pass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inward_items`
--
ALTER TABLE `inward_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_table`
--
ALTER TABLE `item_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `packaging_receipts`
--
ALTER TABLE `packaging_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
