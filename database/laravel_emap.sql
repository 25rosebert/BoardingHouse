-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 06:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_emap`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `barangay`, `created_at`, `updated_at`) VALUES
(40, 'Alos', NULL, NULL),
(41, 'Amandiego', NULL, NULL),
(42, 'Amangbangan', NULL, NULL),
(43, 'Balangobong', NULL, NULL),
(44, 'Balayang', NULL, NULL),
(45, 'Bisocol', NULL, NULL),
(46, 'Bolaney', NULL, NULL),
(47, 'Baleyadaan', NULL, NULL),
(48, 'Bued', NULL, NULL),
(49, 'Cabatuan', NULL, NULL),
(50, 'Cayucay', NULL, NULL),
(51, 'Dulacac', NULL, NULL),
(52, 'Inerangan', NULL, NULL),
(53, 'Landoc', NULL, NULL),
(54, 'Linmansangan', NULL, NULL),
(55, 'Lucap', NULL, NULL),
(56, 'Maawi', NULL, NULL),
(57, 'Macatiw', NULL, NULL),
(58, 'Magsaysay', NULL, NULL),
(59, 'Mona', NULL, NULL),
(60, 'Palamis', NULL, NULL),
(61, 'Pandan', NULL, NULL),
(62, 'Pangapisan', NULL, NULL),
(63, 'Poblacion', NULL, NULL),
(64, 'Pocal-Pocal', NULL, NULL),
(65, 'Pogo', NULL, NULL),
(66, 'Polo', NULL, NULL),
(67, 'Quibuar', NULL, NULL),
(68, 'Sabangan', NULL, NULL),
(69, 'San Antonio', NULL, NULL),
(70, 'San Jose', NULL, NULL),
(71, 'San Roque', NULL, NULL),
(72, 'San Vicente', NULL, NULL),
(73, 'Santa Maria', NULL, NULL),
(74, 'Tanaytay', NULL, NULL),
(75, 'Tancarang', NULL, NULL),
(76, 'Tawintawin', NULL, NULL),
(77, 'Telbang', NULL, NULL),
(78, 'Victoria', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `boardinghouses`
--

CREATE TABLE `boardinghouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `bed` tinyint(4) NOT NULL,
  `rooms` tinyint(4) NOT NULL,
  `comfortroom` tinyint(4) NOT NULL,
  `kitchen` tinyint(4) NOT NULL,
  `livingroom` tinyint(4) NOT NULL,
  `floor_total` tinyint(4) NOT NULL,
  `floor_area` int(11) NOT NULL,
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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'House and Lot', 'available', 'House & Lot', 'List of all House and Lot properties that are listed in propertyfinder.com\r\n.', '1635859812.jpg', '2021-11-02 05:30:12', '2021-11-26 18:16:46'),
(2, 'Boarding House', 'available', 'Boarding House', 'List of All Boarding houses that are listed in property finder.', '1635859874.jpg', '2021-11-02 05:31:14', '2021-11-02 05:31:14'),
(3, 'Lot', 'available', 'Lot', 'List of All lots that are listed in property finder', '1635859916.jpg', '2021-11-02 05:31:56', '2021-11-02 05:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'For Sale', '2021-11-02 13:44:03', '2021-11-02 13:44:15'),
(2, 'For Rent', '2021-11-02 13:44:21', '2021-11-02 13:44:28'),
(3, 'For Lease', '2021-11-02 13:44:36', '2021-11-02 13:44:41');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `houseandlots`
--

CREATE TABLE `houseandlots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `bedroom` tinyint(4) NOT NULL,
  `comfortroom` tinyint(4) NOT NULL,
  `kitchen` tinyint(4) NOT NULL,
  `livingroom` tinyint(4) NOT NULL,
  `floor_area` int(11) NOT NULL,
  `floor_total` int(11) NOT NULL,
  `parking_lot` tinyint(4) NOT NULL,
  `land_size` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `landmarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lots`
--

CREATE TABLE `lots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `land_size` double(15,4) NOT NULL,
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_22_084234_users_table', 2),
(6, '2021_09_24_132826_create_category_table', 3),
(7, '2021_09_24_133453_create_properties_table', 3),
(8, '2021_09_25_003329_create_classifications_table', 3),
(9, '2021_09_25_005518_create_location_table', 3),
(10, '2021_09_25_010242_create_add_relationship_to_properties_table', 3),
(11, '2021_09_25_010340_add_relationship_to_properties_table', 3),
(12, '2021_09_25_010656_add_relationship_to_locations_table', 4),
(13, '2021_09_28_004949_create_images_table', 5),
(14, '2021_10_05_034901_add_user_id_to_properties', 6),
(16, '2021_10_06_102731_add_username_to_users_table', 7),
(21, '2021_10_06_141102_create_locations_table', 8),
(35, '2021_10_29_043917_create_categories_table', 9),
(36, '2021_10_29_045635_create_classifications_table', 9),
(37, '2021_10_29_052255_create_properties_table', 9),
(38, '2021_10_29_053233_create_locations_table', 9),
(39, '2021_10_29_055008_create_boardinghouses_table', 9),
(40, '2021_10_29_055301_create_houseandlots_table', 9),
(41, '2021_10_29_055530_create_lots_table', 9),
(42, '2021_10_29_055854_create_images_table', 9),
(43, '2021_11_02_144748_create_locations_table', 10),
(46, '2021_11_03_145140_create_boardinghouses_table', 11),
(47, '2021_11_27_022834_create_notifications_table', 12),
(54, '2021_11_30_130732_create_request_houses_table', 13),
(55, '2021_11_30_131059_create_request_properties_table', 13),
(72, '2021_11_30_131307_create_request_locations_table', 14),
(73, '2021_11_30_131356_create_request_lots_table', 14),
(74, '2021_11_30_131456_create_request_boardings_table', 14),
(75, '2021_11_30_131539_create_request_images_table', 14),
(76, '2021_12_14_043800_create_feedback_table', 15),
(80, '2021_12_17_135544_add_status_to_properties_table', 16),
(81, '2021_12_17_140951_add_status_to_request_properties_table', 16),
(82, '2021_12_17_141215_add_status_to_categories_table', 16),
(83, '2021_12_17_144835_create_statuses_table', 17),
(85, '2021_12_17_150607_create_barangays_table', 18),
(86, '2021_12_17_152701_add_relationship_to_locations_table', 19),
(87, '2021_12_17_153915_add_relationship_to_requestlocations_table', 20),
(90, '2021_12_27_134159_create_verified_users_table', 21),
(91, '2022_01_04_163618_create_reports_table', 22),
(93, '2022_01_10_143138_add_offense_to_reports_table', 23),
(96, '2022_01_12_130721_add_landmarks_to_locations_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rose@admin.com', '$2y$10$HlPp2KqRADzzv8v3D6hJrujdZBbz55YurDEEC4SiVAdOfyoZ9Ieeq', '2022-01-12 19:25:44'),
('rose@admin.com', '$2y$10$HlPp2KqRADzzv8v3D6hJrujdZBbz55YurDEEC4SiVAdOfyoZ9Ieeq', '2022-01-12 19:25:44');

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

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_permit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `classification_id` bigint(20) UNSIGNED NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offense_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'available', '2021-12-17 15:03:45', '0000-00-00 00:00:00'),
(5, 'unavailable', '2021-12-17 15:04:12', '2021-12-17 15:04:38'),
(6, 'sold', '2021-12-17 15:05:18', '2021-12-17 15:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `verified`, `password`, `picture`, `role_as`, `remember_token`, `created_at`, `updated_at`, `username`, `contact_number`) VALUES
(1, 'Rose Bert Thumbolista Cantillo', 'bertcantillo@gmail.com', '2021-10-07 01:03:56', 1, '$2y$10$ifg6rd0qQOnEsI66REiY/OqqpsjsAIJDOf47iUKxm/Glt4Y7osHu.', 'UIMG_2021121961bf0cf03c078.jpg', '1', 'TfF2858tFj5ufRtobOVO72vrnOJw863T7CWzkDkaC55LYYoB3R2F3h4GIDsK', '2021-09-22 00:48:36', '2021-12-19 02:45:42', 'bertcantillo', 9563526834),
(2, 'valeriiiii berbo', 'valerie@gmail.com', '2021-10-07 04:35:07', 0, '$2y$10$Wp.uiVXESoKNJTuZiZy4cuwMoVXKgLXOsEjO7wPyXTma5eSljo8/6', 'UIMG_20211122619b596b2cdef.jpg', '0', 'gNakhpPqbD0EnBuOoa3ZqHutMArfaNplFu87kMVOyolKHHmZq9BXs2v6fq5D', '2021-09-22 01:09:49', '2021-11-22 00:48:43', 'valerie', 639563526833),
(53, 'Bert Cantillo', 'bertthumbolista@gmail.com', '2021-12-28 18:55:02', 0, '$2y$10$Gwq.7RxnWplZOZoR5/YzIuqKUZYC7Y0QxuKn7hkbp6/V7HWVxRHiW', NULL, '0', NULL, '2021-10-07 00:46:02', '2021-12-28 18:55:02', 'thumbolista', 639563526835),
(57, 'Rose Bert', 'rose@admin.com', '2021-10-16 18:20:58', 1, '$2y$10$omc.WyzC9g32Az.XvnJnAO55xC9Z5JIIAZjxeqtp1emuzBCJxD76i', '8711634437076_avatar.png', '1', 'YfGhKlj0GhO7CzsjJfP1mXmcnAMHyuuWXX7aIpquaP34I1EI1hoz0D6q5ZHv', '2021-10-16 18:17:57', '2021-12-01 09:03:11', 'rose bert', 639361266245),
(87, 'christian bolofer', 'christbol@gmail.com', '2022-06-16 08:25:08', 0, '$2y$10$GiAaIpGw//BW9.19DKdLW.ApBsMtbNBh3OjipYon9G3dwqrC7xyuu', '30241655394780_avatar.png', '0', 'eHaseUZ3huRtTw7MbmP1ML9gZVaFEMnKq9DHynK70D8AmktyKUffol6OWXZ6', '2022-06-16 07:53:01', '2022-06-16 08:25:08', 'christs', 639365266234);

-- --------------------------------------------------------

--
-- Table structure for table `verified_users`
--

CREATE TABLE `verified_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frontOfID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backOfID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brgy_clearance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verified_users`
--

INSERT INTO `verified_users` (`id`, `users_id`, `status`, `age`, `birthdate`, `id_type`, `frontOfID`, `backOfID`, `photo`, `brgy_clearance`, `created_at`, `updated_at`) VALUES
(10, 84, 1, 34, '1997-01-23', 'voters_id', '1641529093_20211217_152936.jpg', '1641529093_20211217_152936.jpg', '1641529094_Carrier1.PNG', '1641529094_smallhouse.jpg', '2022-01-06 20:18:14', '2022-01-06 20:43:22'),
(11, 79, 1, 25, '1997-01-11', 'drivers_license', '1641893689_2.jpg', '1641893689_3.jpg', '1641893689_20211217_152936.jpg', '1641893689_20211217_162712.jpg', '2022-01-11 01:34:49', '2022-01-11 19:56:10'),
(12, 2, 0, 21, '1999-09-12', 'postal_id', '1642041100_sampleID1.jpg', '1642041100_sampleID.jpg', '1642041100_OldDetails.PNG', '1642041100_OldHomepage2.PNG', '2022-01-12 18:31:40', '2022-01-12 18:31:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boardinghouses`
--
ALTER TABLE `boardinghouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boardinghouses_property_id_foreign` (`property_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houseandlots`
--
ALTER TABLE `houseandlots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `houseandlots_property_id_foreign` (`property_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_property_id_foreign` (`property_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_property_id_foreign` (`property_id`);

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lots_property_id_foreign` (`property_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_category_id_foreign` (`category_id`),
  ADD KEY `properties_classification_id_foreign` (`classification_id`),
  ADD KEY `properties_phone_foreign` (`phone`),
  ADD KEY `properties_user_id_foreign` (`user_id`),
  ADD KEY `status` (`status`),
  ADD KEY `barangay_is` (`barangay_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_property_id_foreign` (`property_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_contact_number_unique` (`contact_number`);

--
-- Indexes for table `verified_users`
--
ALTER TABLE `verified_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `verified_users_users_id_unique` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `boardinghouses`
--
ALTER TABLE `boardinghouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houseandlots`
--
ALTER TABLE `houseandlots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `verified_users`
--
ALTER TABLE `verified_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boardinghouses`
--
ALTER TABLE `boardinghouses`
  ADD CONSTRAINT `boardinghouses_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `houseandlots`
--
ALTER TABLE `houseandlots`
  ADD CONSTRAINT `houseandlots_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lots`
--
ALTER TABLE `lots`
  ADD CONSTRAINT `lots_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_ibfk_2` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_phone_foreign` FOREIGN KEY (`phone`) REFERENCES `users` (`contact_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verified_users`
--
ALTER TABLE `verified_users`
  ADD CONSTRAINT `verified_users_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
