-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 04:01 PM
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
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_posts`
--

INSERT INTO `news_posts` (`id`, `admin_id`, `heading`, `category`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rs 4,228 For Grocery Bag?', 'business', 'Car lockouts are frustrating and very inconvenient. It can be expensive, too. Things can get even trickier (and pricier) to sort out, with today’s high-tech car locking systems', '1749633611_img.png', '2025-06-11 03:50:11', '2025-06-11 03:50:11'),
(2, 1, 'Crypto prices today: Bitcoin tops $110,500; Ethereum, Altcoins rally up to 11% ahead of US inflation data', 'business', 'Reducing the risk is easy with a few simple habits and precautions. Here are eight expert locksmith-approved practical steps to help you stay one step ahead.', '1749637435_img.jpg', '2025-06-11 04:53:55', '2025-06-11 04:53:55'),
(3, 1, 'India-U.S. trade pact: Officials discuss market access, digital trade, customs facilitation', 'business', 'Cutting is all about losing fat while keeping muscle, which is incredibly difficult in a calorie deficit.', '1749640788_img.jpg', '2025-06-11 05:49:48', '2025-06-11 05:49:48'),
(4, 1, 'Musk says he regrets some posts he made about Trump', 'business', 'Not all sources are trustworthy, so if you’re looking to buy steroids online, make sure you choose a reputable supplier with third-party testing.', '1749640856_img.jpg', '2025-06-11 05:50:56', '2025-06-11 05:50:56'),
(5, 1, 'U.S., China say they have agreed on framework to resolve their trade disputes', 'business', 'Question.AI distinguishes itself by packing a meticulously designed suite of practical tools, each addressing specific, common student needs.', '1749640932_img.jpg', '2025-06-11 05:52:12', '2025-06-11 05:52:12'),
(6, 1, 'World Bank cuts India’s FY26 growth forecast to 6.3% on subdued exports, investments', 'business', 'This is the flagship feature, engineered to tackle homework, essay writing, and research head-on with remarkable efficiency. The process is beautifully simple.', '1749641024_img.jpg', '2025-06-11 05:53:44', '2025-06-11 05:53:44'),
(7, 1, 'OpenAI rolls out o3-pro model; CEO Sam Altman says open-weights model needs more time', 'technology', ' Need verified historical dates for a timeline project? Searching for the core principles of a scientific theory explained simply?', '1749641208_img.jpg', '2025-06-11 05:56:48', '2025-06-11 05:56:48'),
(8, 1, 'Google rolls out Android 16 to supported Pixel devices', 'technology', 'Supporting robust translation across over 100 languages, this tool excels by moving far beyond simplistic, literal word swaps', '1749641288_img.jpg', '2025-06-11 05:58:08', '2025-06-11 05:58:08'),
(9, 1, 'France\'s Mistral unveils its first \'reasoning\' AI model', 'technology', 'Question.AI understands that learning doesn’t only happen at a desk; it’s integrated into the dynamic flow of student life.', '1749641460_img.jpg', '2025-06-11 06:01:00', '2025-06-11 06:01:00'),
(10, 1, '‘Devika & Danny’ review: Ritu Varma impresses', 'entertainment', 'The Question.AI Chrome extension proves indispensable for online study, trusted by a vast community of users spanning more than 30 countries.', '1749641676_img.webp', '2025-06-11 06:04:36', '2025-06-11 06:04:36'),
(11, 1, 'Mobile vs. Desktop Casino: Where Should You Really Play?', 'entertainment', 'The dedicated iPhone and Android apps deliver equally powerful, on-the-go support, seamlessly extending the desktop experience. ', '1749644028_img.webp', '2025-06-11 06:43:48', '2025-06-11 06:43:48'),
(12, 1, 'What is a Naturopathic Doctor?', 'science', 'Question.AI’s true strength and differentiation lie in its unwavering, dual commitment to pinpoint accuracy paired with crystal-clear communication of concepts. ', '1749644642_img.webp', '2025-06-11 06:54:02', '2025-06-11 06:54:02'),
(13, 1, 'Pain Management Billing: Best Practices for Accuracy', 'science', 'Complementing its text-based features, Question.AI offers another uniquely powerful and convenient tool.', '1749646048_img.webp', '2025-06-11 07:17:28', '2025-06-11 07:17:28'),
(14, 1, 'How to Book a Perfect Airport Transfer in New York', 'travel', 'The scope of its support is truly comprehensive. Are you diligently prepping for a high-stakes final exam that covers vast material? Question', '1749646137_img.webp', '2025-06-11 07:18:57', '2025-06-11 07:18:57'),
(15, 1, 'How to Travel to Bhutan Without a Passport: A Guide for Indian Tourists', 'travel', 'With Question.AI as your integrated study companion, every study session becomes a demonstrably more efficient.', '1749646468_img.webp', '2025-06-11 07:24:28', '2025-06-11 07:24:28');

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
('vhravkEA7pmkBFrdG7FNLVRDb9FXnoYi5bF3XhsP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibTlIMkZTTmZVS3JvbUJRWHBOR1dpd05wdWRqZ2NNQ1lXeDd3RmF6ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoidXNlcl9pZCI7aToxO3M6NToiZW1haWwiO3M6MTQ6InJhdmlAZ21haWwuY29tIjtzOjQ6Im5hbWUiO3M6NDoiUmF2aSI7fQ==', 1749736839);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
