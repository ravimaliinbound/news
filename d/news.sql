-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 04:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_05_101753_create_customers_table', 1),
(5, '2025_06_10_053751_craete_news_users_table', 1),
(6, '2025_06_10_081100_craete_news_admins_table', 1),
(7, '2025_06_11_041405_craete_news_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_admins`
--

CREATE TABLE `news_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_admins`
--

INSERT INTO `news_admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ravi Mali', 'ravi@gmail.com', 'o7ciV8xuzURGGPOu62G4eYn7S9OjOfLfOLam1xRsBEgXOtIkM8GW', '2025-06-17 08:23:22', '2025-06-11 11:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `news_posts`
--

CREATE TABLE `news_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `category` enum('technology','business','entertainment','science','travel') NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_posts`
--

INSERT INTO `news_posts` (`id`, `admin_id`, `heading`, `category`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rs 4,228 For Grocery Bag?', 'business', 'An everyday cotton bag familiar to most Indian households is now being sold as a high-end \"souvenir\" on the US luxury retail platform Nordstrom - and it\'s priced at a whopping Rs 4,228 ($48).', '1749633611_img.png', '2025-06-11 03:50:11', '2025-06-11 03:50:11'),
(2, 1, 'Crypto prices today: Bitcoin tops $110,500; Ethereum, Altcoins rally up to 11% ahead of US inflation data', 'business', 'Bitcoin\'s price surge, fueled by corporate treasury investments, may face a potential market risk. A new analysis indicates that a mass corporate sell-off could be triggered.', '1749637435_img.jpg', '2025-06-11 04:53:55', '2025-06-11 04:53:55'),
(3, 1, 'India-U.S. trade pact: Officials discuss market access, digital trade, customs facilitation', 'business', 'India and the U.S. teams discussed issues pertaining to market access, digital trade, and customs facilitation during the week-long deliberations on the proposed bilateral trade agreement, an official said.', '1749640788_img.jpg', '2025-06-11 05:49:48', '2025-06-11 05:49:48'),
(4, 1, 'Musk says he regrets some posts he made about Trump', 'business', 'Billionaire Elon Musk said on Wednesday (June 11, 2025) that he regrets some of the posts he made last week about U.S. President Donald Trump, in a message on his social media platform X.', '1749640856_img.jpg', '2025-06-11 05:50:56', '2025-06-11 05:50:56'),
(5, 1, 'U.S., China say they have agreed on framework to resolve their trade disputes', 'business', 'Senior U.S. and Chinese negotiators agree on trade framework after disputes, aiming to resolve issues and restore truce', '1749640932_img.jpg', '2025-06-11 05:52:12', '2025-06-11 05:52:12'),
(6, 1, 'World Bank cuts India’s FY26 growth forecast to 6.3% on subdued exports, investments', 'business', 'The World Bank has cut its growth forecast for India to 6.3% in the current financial year 2025-26 from the 6.7% it had projected in January, citing dampened export and investment growth.', '1749641024_img.jpg', '2025-06-11 05:53:44', '2025-06-11 05:53:44'),
(7, 1, 'OpenAI rolls out o3-pro model; CEO Sam Altman says open-weights model needs more time', 'technology', 'OpenAI announced that its o3-pro model was rolling out to users, but CEO Sam Altman noted that an upcoming open weight model would not release this month.', '1749641208_img.jpg', '2025-06-11 05:56:48', '2025-06-11 05:56:48'),
(8, 1, 'Google rolls out Android 16 to supported Pixel devices', 'technology', 'Google announced the rollout of its Android 16 version, with the update first coming to supported Pixel devices before coming to other phone brands later in the year.', '1749641288_img.jpg', '2025-06-11 05:58:08', '2025-06-11 05:58:08'),
(9, 1, 'France\'s Mistral unveils its first \'reasoning\' AI model', 'technology', 'French artificial intelligence startup Mistral on Tuesday announced a so-called \"reasoning\" model it said was capable of working through complex problems, following in the footsteps of top US developers.', '1749641460_img.jpg', '2025-06-11 06:01:00', '2025-06-11 06:01:00'),
(10, 1, '‘Devika & Danny’ review: Ritu Varma impresses', 'entertainment', 'In the first few minutes of the Telugu web series Devika & Danny, streaming on Jio Hotstar, Devika Nandan (Ritu Varma) discloses that she has lived her life within a 25-kilometre radius. She teaches music at a nearby village and is the sort of young woman', '1749641676_img.webp', '2025-06-11 06:04:36', '2025-06-11 06:04:36'),
(11, 1, 'Mobile vs. Desktop Casino: Where Should You Really Play?', 'entertainment', 'Online casinos are everywhere now. Whether you’re chilling on your couch or sneaking a spin during lunch break, the digital poker table is always within reach. But one question keeps popping up for both seasoned players and curious newcomers.', '1749644028_img.webp', '2025-06-11 06:43:48', '2025-06-11 06:43:48'),
(12, 1, 'What is a Naturopathic Doctor?', 'science', 'As you seek medical care, you may have considered a number of specialists who might address the systems in your body. However, you may not be aware of which specialist to visit or what they can do for you.', '1749644642_img.webp', '2025-06-11 06:54:02', '2025-06-11 06:54:02'),
(13, 1, 'Pain Management Billing: Best Practices for Accuracy', 'science', 'Pain management is one of the most complex specialties in healthcare billing. With procedures ranging from epidural injections to spinal cord stimulators, accurate coding and strict compliance are vital.', '1749646048_img.webp', '2025-06-11 07:17:28', '2025-06-11 07:17:28'),
(14, 1, 'How to Book a Perfect Airport Transfer in New York', 'travel', 'New York hits you fast—horns blaring, crowds shoving, and that wild energy pulsing through every street. Landing at JFK.', '1749646137_img.webp', '2025-06-11 07:18:57', '2025-06-11 07:18:57'),
(15, 1, 'How to Travel to Bhutan Without a Passport: A Guide for Indian Tourists', 'travel', 'Did you know Bhutan is called “The Land of Thunder Dragon”? That’s why they say “Druk Yul la chin shuk su shuk,” which means “Welcome to the land of thunder dragon.”', '1749646468_img.webp', '2025-06-11 07:24:28', '2025-06-11 07:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `news_users`
--

CREATE TABLE `news_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_users`
--

INSERT INTO `news_users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ravi', 'ravi@gmail.com', '$2y$12$ESTJhsMqM.EzoP15z8NA9eSsFV3xiGuOcXaUnD9VWt1K8KiivIeLS', '2025-06-11 01:14:01', '2025-06-11 01:14:01'),
(2, 'Kamlesh', 'kamlesh@gmail.com', '$2y$12$/o7ciV8xuzURGGPOu62G4eYn7S9OjOfLfOLam1xRsBEgXOtIkM8GW', '2025-06-11 02:40:36', '2025-06-11 02:40:36');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('y6U0dXb6FhnXkcu21Vx4eyXDn4P4ec32yosLJBKF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVHlQM0FWNndGSEZ3d2lOaTYyQXFJS0JGS2JZVE9rdXhtTlp5eVZRbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmF2ZWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InVzZXJfaWQiO2k6MTtzOjU6ImVtYWlsIjtzOjE0OiJyYXZpQGdtYWlsLmNvbSI7czo0OiJuYW1lIjtzOjQ6IlJhdmkiO30=', 1749650409);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_admins`
--
ALTER TABLE `news_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_posts`
--
ALTER TABLE `news_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_posts_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `news_users`
--
ALTER TABLE `news_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_admins`
--
ALTER TABLE `news_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_posts`
--
ALTER TABLE `news_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news_users`
--
ALTER TABLE `news_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news_posts`
--
ALTER TABLE `news_posts`
  ADD CONSTRAINT `news_posts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `news_admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
