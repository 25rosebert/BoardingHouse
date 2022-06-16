-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 02:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_mapping`
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

--
-- Dumping data for table `boardinghouses`
--

INSERT INTO `boardinghouses` (`id`, `property_id`, `bed`, `rooms`, `comfortroom`, `kitchen`, `livingroom`, `floor_total`, `floor_area`, `created_at`, `updated_at`) VALUES
(27, 104, 30, 8, 8, 8, 2, 2, 560, '2022-01-12 08:00:15', '2022-01-12 08:00:15'),
(28, 105, 24, 4, 4, 4, 4, 2, 430, '2022-01-12 08:05:20', '2022-01-12 08:05:20'),
(29, 106, 39, 20, 20, 20, 4, 4, 1000, '2022-01-12 08:14:02', '2022-01-12 08:14:02');

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

--
-- Dumping data for table `houseandlots`
--

INSERT INTO `houseandlots` (`id`, `property_id`, `bedroom`, `comfortroom`, `kitchen`, `livingroom`, `floor_area`, `floor_total`, `parking_lot`, `land_size`, `created_at`, `updated_at`) VALUES
(26, 103, 3, 2, 2, 1, 356, 2, 1, 3500.00, '2022-01-12 07:55:17', '2022-01-13 16:59:03'),
(27, 107, 3, 3, 2, 3, 450, 2, 1, 560.00, '2022-01-12 08:24:24', '2022-01-12 08:24:24'),
(28, 108, 7, 4, 3, 2, 435, 2, 1, 543.00, '2022-01-12 08:31:11', '2022-01-12 08:31:11'),
(29, 110, 3, 2, 2, 1, 500, 1, 1, 1500.00, '2022-01-13 07:20:45', '2022-01-13 07:20:45'),
(30, 111, 3, 2, 2, 1, 500, 1, 1, 1500.00, '2022-01-13 07:20:45', '2022-01-13 07:20:45');

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

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `property_id`, `images`, `created_at`, `updated_at`) VALUES
(106, 107, '1642004665_house.jpg', '2022-01-12 08:24:25', '2022-01-12 08:24:25'),
(107, 108, '1642005071_bhouse.jpg', '2022-01-12 08:31:11', '2022-01-12 08:31:11'),
(108, 109, '1642005289_lot.jpg', '2022-01-12 08:34:49', '2022-01-12 08:34:49');

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

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `property_id`, `address`, `latitude`, `longitude`, `landmarks`, `created_at`, `updated_at`) VALUES
(87, 101, 'Marcos Avenue, Poblacion, Alaminos City, Pangasinan, Poblacion, Alaminos, Pangasinan, Philippines', '16.15552898', '119.98208094', 'Vinz Ihaw-ihaw Resto, Alaminos Market Vendors Multi-Purpose Cooperative, J&T Express', '2022-01-12 07:47:51', '2022-01-12 07:47:51'),
(88, 103, '5X2P+669, Poblacion, Alaminos, Pangasinan, Philippines', '16.15050000', '119.98560000', 'Domondon Store, JVR RSDNC', '2022-01-12 07:55:17', '2022-01-12 07:55:17'),
(89, 104, '4X79+W8 Alaminos, Pangasinan, Philippines', '16.11479882', '119.96830512', 'Pangasinan State University – Alaminos Campus, Mamas Love Canteen, Calvary Baptist Church', '2022-01-12 08:00:14', '2022-01-12 08:00:14'),
(90, 105, 'BCRD Building, Olongapo - Bugallon Rd, Alaminos, Pangasinan, Philippines', '16.11624183', '119.96886838', 'J\'s Ala Eh Lomihan & Food House, Kap\'s Food House, Pangasinan State University – Alaminos Campus', '2022-01-12 08:05:19', '2022-01-12 08:05:19'),
(91, 106, '4X78+VQM, Alaminos, Pangasinan, Philippines', '16.11413400', '119.96669043', 'Pangasinan State University – Alaminos Campus, Reyes Boarding House, Alaminos Heights Subdivision', '2022-01-12 08:14:02', '2022-01-12 08:14:02'),
(92, 107, '2404 Braganza Street, Poblacion, Alaminos, Pangasinan, Philippines', '16.15802281', '119.97869063', 'PhilHealth Regional Office - Alaminos, Pangasinan, CSI Warehouse Club Parking Lot, 7-Eleven', '2022-01-12 08:24:22', '2022-01-12 08:24:22'),
(93, 108, '6 V. Ungson St, Poblacion, Alaminos, Pangasinan, Philippines', '16.15379255', '119.98560536', 'Lola Lita Store, Texas Lodge, Pangasinan 1st District Engineering Office, Bos Jef BUILDERS ang Enterprises construction supply', '2022-01-12 08:31:11', '2022-01-12 08:31:11'),
(94, 109, '244 Alaminos - Bani Rd, Alaminos, Pangasinan, Philippines', '16.16591630', '119.95673943', 'REATE\'S EATERY, ReyZel Store, Romantic Samgyupsal', '2022-01-12 08:34:49', '2022-01-12 08:34:49'),
(95, 110, '189 Alaminos - Bani Rd, Alaminos, Pangasinan, Philippines', '16.16604511', '119.95901931', 'Near Muslim Church, Cocina de Marissa', '2022-01-13 07:20:44', '2022-01-13 07:20:44'),
(96, 111, '189 Alaminos - Bani Rd, Alaminos, Pangasinan, Philippines', '16.16604511', '119.95901931', 'Near Muslim Church, Cocina de Marissa', '2022-01-13 07:20:44', '2022-01-13 07:20:44');

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

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `property_id`, `land_size`, `created_at`, `updated_at`) VALUES
(31, 101, 2543.0000, '2022-01-12 07:47:52', '2022-01-12 07:47:52'),
(32, 109, 1000.0000, '2022-01-12 08:34:49', '2022-01-12 08:34:49');

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
('MJ@gmail.com', '$2y$10$jO95fGaVLc03uzbPHid1Iu5pCY1c.TIC.uvt4n5NrrLZD71B1yQ/2', '2022-01-13 07:42:13');

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

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `barangay_id`, `name`, `price`, `description`, `business_permit`, `image`, `status`, `category_id`, `classification_id`, `phone`, `user_id`, `created_at`, `updated_at`) VALUES
(101, 40, 'Joshua Residential Lot', 34422242, 'located at barangay poblacion', NULL, '1642002469_lot.jpg', 4, 3, 1, 639453245334, 3, '2022-01-12 07:47:49', '2022-01-12 07:47:49'),
(103, 64, 'Bria Homes', 15000000, 'bria homes is located at barangay pocal pocal.', NULL, '1642002917_briahome.jpg', 4, 1, 1, 639453245334, 3, '2022-01-12 07:55:17', '2022-01-13 16:58:27'),
(104, 46, 'Reyes Boarding House', 900, 'green boarding house nearby PSU ACC and at C.O.R.E Clinic', '1642003213_business permit.jpg', '1642003214_bhouse.jpg', 4, 2, 2, 639453245334, 3, '2022-01-12 08:00:14', '2022-01-12 08:00:14'),
(105, 46, 'C and A Building', 1000, 'C and A building is located at the side of BCRD bolaney', '1642003518_business permit.jpg', '1642003518_20211217_152936.jpg', 4, 2, 2, 639453245334, 3, '2022-01-12 08:05:18', '2022-01-12 08:05:18'),
(106, 46, 'Payas Dormitory', 1200, 'Orange building is located at back of PSU Alaminos City', '1642004031_business permit.jpg', '1642004032_apartment.jpg', 4, 2, 2, 639453245334, 3, '2022-01-12 08:13:52', '2022-01-12 08:13:52'),
(107, 63, 'Lumina Homes', 3024532, 'lumina homes two storey building', NULL, '1642004658_lumina.jpg', 4, 1, 1, 639361266245, 57, '2022-01-12 08:24:18', '2022-01-12 08:24:18'),
(108, 63, 'Residential House', 3043482, 'this is a residential house and lot', NULL, '1642005068_boarding house - Copy.jpg', 4, 1, 1, 639361266245, 57, '2022-01-12 08:31:08', '2022-01-12 08:31:08'),
(109, 65, 'Juans Commercial Lot', 3000000, 'the lot is about a thousand square meters and can be located at barangay pogo alaminos city', NULL, '1642005284_lot.jpg', 4, 3, 1, 639361266245, 57, '2022-01-12 08:34:44', '2022-01-12 08:34:44'),
(110, 65, 'Sebastian\'s Residence', 3000000, '5 years nagamit,\r\nno issues good as new,\r\nwith titulo\r\nnear highway.', NULL, '1642087234_house&lotsample1.jpg', 4, 1, 1, 639453245334, 3, '2022-01-13 07:20:35', '2022-01-13 07:20:35'),
(111, 65, 'Sebastian\'s Residence', 3000000, '5 years nagamit,\r\nno issues good as new,\r\nwith titulo\r\nnear highway.', NULL, '1642087234_house&lotsample1.jpg', 4, 1, 1, 639453245334, 3, '2022-01-13 07:20:35', '2022-01-13 07:20:35');

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

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `property_id`, `name`, `report_type`, `description`, `offense_count`, `created_at`, `updated_at`) VALUES
(44, 107, 'Rose Bert', 'Fake Property, Fake Property, Fake Property, Fake User', 'the property is fake, the property is not located at the same area, the property is unreal, thse user uses the fake user', 4, '2022-01-12 08:44:01', '2022-01-12 17:43:01'),
(45, 103, 'Joshua Sebastian', 'Wrong Information, Wrong Information', 'the property has a wrong information, Information in property\'s detail are not legit.', 2, '2022-01-12 18:15:18', '2022-01-13 06:41:45'),
(46, 109, 'Rose Bert', 'Wrong Information', 'Price indicated in the property details are not true.', 1, '2022-01-12 23:51:49', '2022-01-12 23:51:49');

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
(2, 'valeriiiii berbo', 'valerie@gmail.com', '2021-10-07 04:35:07', 0, '$2y$10$okcal2gYalcXehn2j3BvX.lV1Ti7wjUrnCX44SrZ8hiPnIUnZcaAu', 'UIMG_20211122619b596b2cdef.jpg', '0', 'NjEXJkk9SQBFtilaqCsDgu6zFfivtX45BHudm9Bddncln8Ox5bDJYK8gsF7t', '2021-09-22 01:09:49', '2022-01-12 23:34:56', 'valerie', 639563526833),
(3, 'Joshua Sebastian', 'joshuasebastian@gmail.com', '2021-10-07 01:14:23', 1, '$2y$10$HAbu145c6JMzJrs0fc6AEOEKBDEU8HMplx5XJz6qzYRsP3GTPN8wC', 'UIMG_20211111618c98d9e6984.jpg', '0', 'epub27ZOyHdMwshkuwXuTepmpYFrT4pLbPsIYXuawAADRNI0Do80Nd6fiHVb', '2021-09-22 16:09:00', '2022-01-13 07:51:51', 'Joshua', 639453245334),
(4, 'Joffrey Mapa', 'jopmapa@mapa.com', NULL, 0, '$2y$10$D3lh7qxGBjxIp7IG4r4wgep6hqPXTE2P4nOoE8YiQmxq3N.Tcff6W', NULL, '0', NULL, '2021-10-05 04:17:00', '2021-10-05 04:17:00', 'jopaymapa', 639353563453),
(53, 'Bert Cantillo', 'bertthumbolista@gmail.com', '2021-12-28 18:55:02', 0, '$2y$10$Gwq.7RxnWplZOZoR5/YzIuqKUZYC7Y0QxuKn7hkbp6/V7HWVxRHiW', NULL, '0', NULL, '2021-10-07 00:46:02', '2021-12-28 18:55:02', 'thumbolista', 639563526835),
(57, 'Rose Bert', 'rose@admin.com', '2021-10-16 18:20:58', 1, '$2y$10$OoLDYSLb8o3ZbiTN0moP5uHUrrlZSQ9kmXrAGpW0r44GzOvygH6Lu', '8711634437076_avatar.png', '1', 'NeDJQniKWj3xrH1mSzE8vlnoi1nR4IMprFLKnra5AGzxHyohEt2EVrNcfwr8', '2021-10-16 18:17:57', '2022-01-13 05:49:31', 'rose bert', 639361266245),
(61, 'Doods Sagabaen', 'sagabaendoods@user.com', '2021-11-28 20:22:48', 1, '$2y$10$F6t6E7IyQ4MkU4JptakcqeBTeOD7/1u8Nv2L.iq38ttQ5i5quBGWi', '323271638158548_avatar.png', '0', 'yY2zjR4ffQEv5PHxDFu555cjfBLWOcUBFrSohX4P0NZihBJKMmCQtiTILLkV', '2021-11-28 20:02:29', '2021-12-27 21:21:02', 'wewewewew', 639564352345),
(66, 'king buenaflor', 'king@user.com', NULL, 0, '$2y$10$7yaI5u/8ypnoiX9wBiKbW.1EezrAumErirx2GRPFQNnVE1GLQmSbi', '143201638188661_avatar.png', '0', NULL, '2021-11-29 04:24:22', '2021-11-29 04:24:22', 'kingkong', 639563453475),
(68, 'Tisoy Cortez', 'tisoycortez@gmail.com', '2021-12-03 16:54:18', 1, '$2y$10$no55cTEWcRDaG2TChFyikO.zQCL/DlJhsqNIeRf8m1Za4iChELXQ6', '301941638578351_avatar.png', '0', NULL, '2021-12-03 16:39:11', '2022-01-05 18:44:13', 'soyti', 639755357524),
(69, 'Leslyne Montemayor', 'motemayorles@gmail.com', '2021-12-03 19:55:02', 0, '$2y$10$iIKv/o2s10Yu41EnZFyhJegdB77WO40aiwu0/HQ0ZWxpMdpyWMqdu', '221401638579668_avatar.png', '0', 'u8A4V3v30GDabh5kBZOuwlPgYXbTmGzGtjPlvviiVeyzjLhgaaeFHr4WOloD', '2021-12-03 17:01:09', '2021-12-03 19:55:02', 'leslyne', 639543452642),
(70, 'Celia S. Basco', 'yangbasco@gmail.com', '2021-12-05 18:57:56', 0, '$2y$10$G6YmO.6oENikMMrB5qFH/Otfh1xnItBx9GcF9vu2LNg3J0ivcCifW', '56771638758501_avatar.png', '0', 'NI4vPIRNq1elnZbcLEybFfHyYAwHqIDFcAVlC9gK4R2xCyGY8RMHgdcCrmMe', '2021-12-05 18:41:42', '2021-12-05 18:57:56', 'yang', 639052472437),
(71, 'melen', 'mylinemontemayor123@gmail.com', NULL, 0, '$2y$10$NF9CLNW7YgybBFBKLdzOVuDdtD/JeFOTKm0V/YJ/dVYClMy0o2zk.', '222701638769112_avatar.png', '0', 'Dqd23Z1RxO2fLrwAfsWFHRG3fobthOD70XWEw2NDOfcQALOgjxurajqRjxO2', '2021-12-05 21:38:35', '2021-12-05 21:38:35', 'myline', 639122960911),
(73, 'chan', 'christiandumaran1999@gmail.com', NULL, 0, '$2y$10$hwEDxbnX5cgitbu9/FQsQ.TUkgGnkMXvRm8EU6Iwss.E9SPVtBJWa', '217571638777668_avatar.png', '0', NULL, '2021-12-06 00:01:08', '2021-12-06 00:01:08', 'chanong09', 639123456782),
(74, 'Maurene Joy', 'realinmaurene@gmail.com', '2021-12-06 00:19:34', 0, '$2y$10$tSTJhV4lTslcRc.w9Evs8Ote8wfv.nQZqunurR3CkwfOeNvN//t0G', '131471638778604_avatar.png', '0', '2OlQtpqJriuw4j9FcgVFbdSJtBAuNiVRPu3WgKXqoYpb5CEAgf12I3vMY7H4', '2021-12-06 00:16:44', '2021-12-06 00:19:34', 'mauuuuu', 639123456789),
(75, 'Patrick Rausa', 'rausa.patrick@gmail.com', '2021-12-06 00:49:21', 0, '$2y$10$eEMFZZDm/42.B3LWZeW09OT5iQEEh5jS47iL/rJ/tGBhNsRaE7OcW', '314941638780442_avatar.png', '0', NULL, '2021-12-06 00:47:22', '2021-12-06 00:49:21', 'bosspatttt', 639361232243),
(76, 'eric daragay', 'ddericmercado@gmail.com', '2021-12-06 06:38:01', 0, '$2y$10$3lZ5QgnEe852RgSGIqPbwOdmzOusfjY9IUQ.gkbHOacthu6piUgUu', '205731638801349_avatar.png', '0', NULL, '2021-12-06 06:35:49', '2021-12-06 06:38:01', 'daragay', 639807891021),
(77, 'Niel Patrick Morano', 'nielmorano@gmail.com', NULL, 0, '$2y$10$5BHClu.3oC1iNwdvptswNuD54bE02nhM1tHrl6Pcxrdy9Ruh4qgkG', '283821639411042_avatar.png', '0', NULL, '2021-12-13 07:57:23', '2021-12-13 07:57:23', 'niel patrick', 639065544937),
(78, 'Michellyn Itliong', 'michellynitliong@gmail.com', '2021-12-16 05:10:43', 0, '$2y$10$Xg9TNE80jMWMm7G66cfOC.n6DI53fuP8kKuL4Wx43Elji.xjuUwcG', '225321639660022_avatar.png', '0', 'ZQtiCQVCOxl4wOvHOOuMWtB08YNYVFCAgLa7Z8atbZ92BgriFqyZvjoR73sU', '2021-12-16 05:07:03', '2021-12-16 05:10:43', 'wanthusiast', 9158782239),
(79, 'Joffrey Leonard Mapa', 'joffreymapa@gmail.com', '2021-12-27 04:43:25', 1, '$2y$10$d1rPSpP04wxRmCPtJRJDDuClaoYe1wLKubuieclzdPWrITKkyL9Ym', '103241639900840_avatar.png', '0', NULL, '2021-12-19 00:00:41', '2022-01-11 19:56:10', 'joffrey', 9361266345),
(80, 'Valerie Berbon', 'valerieberbon@gmail.com', NULL, 0, '$2y$10$BnQWnYkU2i/eKyHrI/0AjuA9mRPn9Hduxxy.PfMyO9fxWIUr9QgZO', '1701639903165_avatar.png', '0', NULL, '2021-12-19 00:39:25', '2021-12-19 00:39:25', 'valerieee', 639563526834),
(81, 'Rose Bert Naraval Cantillo', 'rose1234@gmail.com', NULL, 0, '$2y$10$0bOKU9O2dbLds6flJhtXI.pNT95USqTQmEb8OhzfGbd7j2buykhoy', '170211639903803_avatar.png', '0', 'kW8yLur5Jyb1dh1n9PVcegU2LnKUcZk0CXrj54W9lcqffxdUEAzgqQgKdUdx', '2021-12-19 00:50:04', '2021-12-19 00:50:04', 'berto', 639563526845),
(83, 'Juan Dela Cruz', 'juandelacruz@gmail.com', '2021-12-19 02:25:48', 0, '$2y$10$fa.vA.044r.U.a.RDWvCkeRdqqTj2LRgcIqbDQX9v0YjRlBiPQuqK', '168791639909360_avatar.png', '0', 'IstU8p8mtxz8TaRKMJOYU8AxXW3VyLqRAalBF1SFNLnEnnFGzswQ2eYwTxDD', '2021-12-19 02:22:41', '2021-12-19 02:25:48', 'juan', 639361266345),
(84, 'Kaye Trenquitio', 'kaye12345@gmail.com', '2021-12-19 18:50:40', 1, '$2y$10$2GTHkHGi5QWMC9ILmXDAgOxxN6FxspwFwh2ktKOcqop.o.SY4cyeW', '315541639968289_avatar.png', '0', NULL, '2021-12-19 18:44:50', '2022-01-06 20:43:22', 'kayeeee', 639361266365),
(85, 'Neil Patrick Morano', 'nqweyuijkl@gmail.com', '2022-01-05 19:37:26', 0, '$2y$10$Bj/LDaVnLALgP0P0hyC6FOjP3GMBDtqtFyaVPjugb0wBPKT6vjioy', '46871641440020_avatar.png', '0', NULL, '2022-01-05 19:33:41', '2022-01-05 19:37:26', 'Nqweyuijkl', 9065544933),
(86, 'Juan Carlos Labajo', 'juancarlos@gmail.com', '2022-01-12 08:58:41', 0, '$2y$10$66THR/.Hm6wVJrXlIpVCpe8YFM04xEBdVU3rrjMp2JyLa7GzjzxTa', '210321642006291_avatar.png', '0', NULL, '2022-01-12 08:51:32', '2022-01-12 08:58:41', 'juanCarlos', 639563527546),
(88, 'Maria Jose', 'MJ@gmail.com', '2022-01-13 06:58:58', 1, '$2y$10$9BHIlayT7Qhin.66Vstxk.2r0mC2TX6xh8YLpVjJRxZ.liPCDND5u', '314541642085709_avatar.png', '0', 'MJvKQ1bKJ5c0dA3H0AHdSPl6d5wT1U7cwIYypo3TZ4CSetRdiQBOAKIoWGhm', '2022-01-13 06:55:09', '2022-01-13 07:37:43', 'MJ143', 639093346736);

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
(12, 2, 0, 21, '1999-09-12', 'postal_id', '1642041100_sampleID1.jpg', '1642041100_sampleID.jpg', '1642041100_OldDetails.PNG', '1642041100_OldHomepage2.PNG', '2022-01-12 18:31:40', '2022-01-12 18:31:40'),
(13, 88, 1, 35, '1987-10-22', 'voters_id', '1642086231_voter\'sIdSample.jpg', '1642086231_VIbackSample.jpg', '1642086231_2x2.jpg', '1642086231_brgyClearance.jfif', '2022-01-13 07:03:51', '2022-01-13 07:37:43');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `verified_users`
--
ALTER TABLE `verified_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
