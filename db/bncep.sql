-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 08:04 AM
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
-- Database: `bncep`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Header Menu', '2023-11-13 00:40:51', '2023-11-13 00:40:51'),
(2, 'Footer Menu 1', '2024-01-08 23:48:15', '2024-01-08 23:48:15'),
(3, 'Footer Menu 2', '2024-01-08 23:49:55', '2024-01-08 23:49:55'),
(4, 'Footer Menu 3', '2024-01-08 23:51:01', '2024-01-08 23:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `class` varchar(255) DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu_items`
--

INSERT INTO `admin_menu_items` (`id`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 0, 0, NULL, 1, 0, '2023-11-13 00:41:14', '2023-11-13 00:41:28'),
(2, 'About Us', 'about-us', 0, 1, NULL, 1, 0, '2023-11-13 00:41:28', '2023-11-13 00:41:46'),
(3, 'Programs', 'programs', 0, 2, NULL, 1, 0, '2023-11-13 00:41:45', '2023-11-13 00:42:01'),
(4, 'Events', 'events', 0, 3, NULL, 1, 0, '2023-11-13 00:42:00', '2023-11-13 00:42:21'),
(5, 'Resources', 'resources', 0, 4, NULL, 1, 0, '2023-11-13 00:42:20', '2023-11-13 00:42:41'),
(6, 'Products', 'products', 0, 5, NULL, 1, 0, '2023-11-13 00:42:40', '2023-11-13 00:43:00'),
(7, 'Contact Us', 'contact-us', 0, 6, NULL, 1, 0, '2023-11-13 00:43:00', '2023-11-13 00:43:17'),
(8, 'About Us', '#', 0, 0, NULL, 2, 0, '2024-01-08 23:48:35', '2024-01-08 23:49:01'),
(9, 'Members', '#', 0, 1, NULL, 2, 0, '2024-01-08 23:49:01', '2024-01-08 23:49:17'),
(10, 'Contact Us', 'contact-us', 0, 2, NULL, 2, 0, '2024-01-08 23:49:17', '2024-01-08 23:49:39'),
(11, 'Resources', '#', 0, 4, NULL, 2, 0, '2024-01-08 23:49:39', '2024-01-08 23:49:39'),
(12, 'What We Do', '#', 0, 0, NULL, 3, 0, '2024-01-08 23:50:12', '2024-01-08 23:50:23'),
(13, 'Membership', '#', 0, 1, NULL, 3, 0, '2024-01-08 23:50:23', '2024-01-08 23:50:33'),
(14, 'Career', '#', 0, 2, NULL, 3, 0, '2024-01-08 23:50:32', '2024-01-08 23:50:42'),
(15, 'Donate Us', 'donation', 0, 3, NULL, 3, 0, '2024-01-08 23:50:42', '2024-01-08 23:56:43'),
(16, 'Blogs', 'blogs', 0, 0, NULL, 4, 0, '2024-01-08 23:51:15', '2024-01-08 23:51:32'),
(17, 'Faq', '#', 0, 1, NULL, 4, 0, '2024-01-08 23:51:31', '2024-01-08 23:51:46'),
(18, 'Events', 'events', 0, 2, NULL, 4, 0, '2024-01-08 23:51:46', '2024-01-08 23:51:55'),
(19, 'Services', '#', 0, 3, NULL, 4, 0, '2024-01-08 23:51:55', '2024-01-08 23:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `banner_btn_label` varchar(255) DEFAULT NULL,
  `banner_btn_link` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `sub_title`, `banner_btn_label`, `banner_btn_link`, `banner`, `created_at`, `updated_at`) VALUES
(2, 'BNCEP aims to foster supportive networks for Black-led organizations', 'bncep-aims-to-foster-supportive-networks-for-black-led-organizations', 'Charity refers to the act of voluntarily giving assistance, support, or resources to those in need or to organizations dedicated to helping others.', 'Donate Now', 'https://fontawesome.com/v4/icon/home', '656eca076bac5.png', '2023-11-07 22:44:06', '2024-01-10 07:19:35'),
(3, 'BNCEP aims to foster supportive networks for Black-led organizations', 'bncep-aims-to-foster-supportive-networks-for-black-led-organizations', 'Charity refers to the act of voluntarily giving assistance, support, or resources to those in need or to organizations dedicated to helping others.', 'Donate Now', 'Id nulla sunt neque', '656eca334a208.jpg', '2023-11-07 22:45:30', '2023-12-05 01:28:59'),
(4, 'Harum sunt ullam la', 'harum-sunt-ullam-la', 'Molestias quisquam m', 'Donate Now', 'Hic aute voluptate c', '656ec6368f7ee.png', '2023-11-07 22:46:25', '2023-12-05 01:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `aurthor_name` varchar(255) DEFAULT NULL,
  `aurthor_image` varchar(255) DEFAULT NULL,
  `published_on` timestamp NULL DEFAULT NULL,
  `membership_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `short_description`, `long_description`, `image`, `thumbnail`, `aurthor_name`, `aurthor_image`, `published_on`, `membership_plan_id`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '65570f9f7164b.png', NULL, 'Selton Jackson', '65570f9f74f44.png', '1970-01-01 06:30:00', 3, '2023-11-17 01:30:47', '2024-01-10 08:42:07'),
(2, 'Repudiandae voluptat', 'repudiandae-voluptat', '<p>How do you create compelling presentations that wow your colleagues and impress your managers?</p>', '<p>Odio sint omnis volu.</p>', '6571c4049b47f.png', 'thumbnail_3628f6815018ee542f5979bb7750f873.png', 'Vivien Moses', NULL, '2023-11-22 06:30:00', 2, '2023-11-17 04:47:45', '2023-12-07 07:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Cade', 'Parrish', 'vala@mailinator.com', '+1 (531) 114-1685', 'Reprehenderit volup', 'Qui ut ratione enim', '2023-12-14 02:25:29', '2023-12-14 02:25:29'),
(2, 'Cade', 'Parrish', 'vala@mailinator.com', '+1 (531) 114-1685', 'Reprehenderit volup', 'Qui ut ratione enim', '2023-12-14 02:26:41', '2023-12-14 02:26:41'),
(3, 'Quynn', 'Johns', 'qylarole@mailinator.com', '+1 (279) 757-3475', 'Qui enim sit offici', 'Dolores eaque aute a', '2023-12-14 02:32:46', '2023-12-14 02:32:46'),
(4, 'Halee', 'Tyler', 'xegixujub@mailinator.com', '+1 (266) 524-4813', 'Duis sunt qui deser', 'Suscipit nobis non m', '2023-12-14 02:34:10', '2023-12-14 02:34:10'),
(5, 'Amy', 'Wong', 'ponu@mailinator.com', '+1 (752) 723-8129', 'Consequatur adipisi', 'Unde voluptas necess', '2023-12-14 02:34:38', '2023-12-14 02:34:38'),
(6, 'Fritz', 'Mcleod', 'wekyxo@mailinator.com', '+1 (468) 771-5906', 'Labore eum voluptate', 'Labore mollit qui do', '2023-12-14 02:34:56', '2023-12-14 02:34:56'),
(7, 'Thaddeus', 'Logan', 'kagamiluma@mailinator.com', '+1 (977) 542-1351', 'Enim maxime minim vo', 'Sit nulla perspiciat', '2023-12-14 02:35:53', '2023-12-14 02:35:53'),
(8, 'Imogene', 'Henderson', 'hody@mailinator.com', '+1 (914) 668-6335', 'Nihil laborum Dolor', 'Qui est explicabo', '2023-12-14 02:40:27', '2023-12-14 02:40:27'),
(9, 'Zia', 'Griffith', 'jyjomyvil@mailinator.com', '+1 (106) 163-8267', 'Doloribus iure ducim', 'Deserunt id dolorem', '2023-12-14 02:41:49', '2023-12-14 02:41:49'),
(10, 'Cheryl', 'Valentine', 'jyzubice@mailinator.com', '+1 (873) 884-6481', 'Aut et sit excepteu', 'Reprehenderit proide', '2023-12-14 02:43:04', '2023-12-14 02:43:04'),
(11, 'Bree', 'Hendrix', 'xaji@mailinator.com', '+1 (477) 589-2383', 'Do labore dolore nec', 'Aut et aperiam vel v', '2023-12-14 02:45:11', '2023-12-14 02:45:11'),
(12, 'Vivian', 'Beasley', 'barijax@mailinator.com', '+1 (125) 411-4513', 'Ut quo sint asperna', 'In ea qui occaecat d', '2023-12-14 02:45:25', '2023-12-14 02:45:25'),
(13, 'Allegra', 'Pratt', 'jefubasad@mailinator.com', '+1 (725) 687-5062', 'Hic ea nihil quibusd', 'Ab id sit laborios', '2023-12-14 02:46:28', '2023-12-14 02:46:28'),
(14, 'Owen', 'Finch', 'cejuqerev@mailinator.com', '+1 (698) 323-7937', 'In expedita nisi inc', 'Voluptate reprehende', '2023-12-14 02:46:35', '2023-12-14 02:46:35'),
(15, 'Ryan', 'Mccormick', 'cyjetog@mailinator.com', '+1 (223) 624-3422', 'Ex in culpa consecte', 'Amet consequat Eni', '2023-12-14 02:47:02', '2023-12-14 02:47:02'),
(16, 'Vaughan', 'Chase', 'hybyle@mailinator.com', '+1 (696) 643-8905', 'Est magna ea dolores', 'Ut quo quaerat simil', '2023-12-14 02:47:15', '2023-12-14 02:47:15'),
(17, 'Nelle', 'Holloway', 'nimore@mailinator.com', '+1 (901) 745-9877', 'Irure non saepe culp', 'Rerum quia saepe lab', '2023-12-14 02:47:40', '2023-12-14 02:47:40'),
(18, 'Cedric', 'Young', 'mybe@mailinator.com', '+1 (893) 769-7556', 'Tenetur quo in ut ad', 'Molestias autem Nam', '2023-12-14 02:48:17', '2023-12-14 02:48:17'),
(19, 'Macon', 'Short', 'cesysek@mailinator.com', '+1 (454) 736-6238', 'Inventore unde accus', 'Tempore non sit do', '2023-12-14 02:48:36', '2023-12-14 02:48:36'),
(21, 'Ezra', 'Schultz', 'firesaquhy@mailinator.com', '+1 (838) 597-7642', 'Minima sint reiciend', 'Porro autem esse nih', '2023-12-14 02:50:08', '2023-12-14 02:50:08'),
(22, 'Basil', 'Salas', 'bufymipow@mailinator.com', '+1 (209) 553-9209', 'Sint esse obcaecat', 'Autem voluptate aut', '2023-12-14 02:50:16', '2023-12-14 02:50:16'),
(23, 'Isaac', 'Guzman', 'johukaqa@mailinator.com', '+1 (637) 784-6028', 'Eum cum voluptas rem', 'Molestiae voluptas e', '2023-12-14 02:50:32', '2023-12-14 02:50:32'),
(24, 'Oleg', 'Allison', 'megezecyz@mailinator.com', '+1 (643) 577-9556', 'Et tempor molestiae', 'Autem culpa sed et', '2023-12-14 02:51:28', '2023-12-14 02:51:28'),
(25, 'Basil', 'Valencia', 'kixov@mailinator.com', '+1 (663) 122-3493', 'Iste magni eu est be', 'Enim dicta fugiat nu', '2023-12-14 02:51:45', '2023-12-14 02:51:45'),
(26, 'Dillon', 'Rodgers', 'cudukateca@mailinator.com', '+1 (996) 851-6037', 'Ex deleniti in numqu', 'Ut in et ipsa corpo', '2023-12-14 02:52:05', '2023-12-14 02:52:05'),
(27, 'Jason', 'Delacruz', 'byfi@mailinator.com', '+1 (944) 529-2943', 'Dolores aut voluptas', 'Eiusmod aut sint tem', '2023-12-14 02:52:24', '2023-12-14 02:52:24'),
(28, 'Owen', 'Raymond', 'najum@mailinator.com', '+1 (693) 219-6073', 'Vel est quis amet m', 'Occaecat iste provid', '2023-12-14 02:53:00', '2023-12-14 02:53:00'),
(29, 'Orson', 'Savage', 'sewirydoxo@mailinator.com', '+1 (287) 895-5884', 'Repudiandae incididu', 'Laboriosam sit sint', '2023-12-14 02:53:14', '2023-12-14 02:53:14'),
(30, 'Sydnee', 'Howard', 'tybibulale@mailinator.com', '+1 (381) 958-2371', 'Ab facere est minima', 'Perferendis nulla re', '2023-12-14 03:10:07', '2023-12-14 03:10:07'),
(31, 'Alana', 'Schwartz', 'jipemeqiby@mailinator.com', '+1 (445) 203-4519', 'Aut eius odit magni', 'Ut nisi anim ipsa e', '2023-12-14 03:13:24', '2023-12-14 03:13:24'),
(32, 'Quinn', 'Solomon', 'vileterih@mailinator.com', '+1 (836) 144-1405', 'Harum sunt officiis', 'Quia dolore dolore i', '2023-12-14 03:20:34', '2023-12-14 03:20:34'),
(33, 'Dillon', 'Wells', 'qary@mailinator.com', '+1 (439) 951-3659', 'Dolorem nihil lorem', 'Aliquip officiis vol', '2023-12-14 04:18:38', '2023-12-14 04:18:38'),
(34, 'Hadassah', 'Graves', 'kagitasyce@mailinator.com', '+1 (741) 871-8663', 'Distinctio Est pers', 'Cum enim velit exer', '2023-12-14 04:23:30', '2023-12-14 04:23:30'),
(35, 'Leroy', 'Parker', 'fapewisal@mailinator.com', '+1 (111) 505-2083', 'Voluptatem Nam aliq', 'Perferendis sed volu', '2023-12-14 04:24:10', '2023-12-14 04:24:10'),
(36, 'Doris', 'Schmidt', 'hygo@mailinator.com', '+1 (225) 511-3954', 'Id incidunt dolores', 'Amet molestiae dign', '2023-12-14 04:35:56', '2023-12-14 04:35:56'),
(37, 'Mari', 'Ward', 'rakopi@mailinator.com', '+1 (367) 193-8593', 'Dolores velit neque', 'Consectetur amet lo', '2023-12-14 04:37:23', '2023-12-14 04:37:23'),
(38, 'Ramona', 'Perez', 'sywyry@mailinator.com', '+1 (843) 686-1187', 'Deserunt reprehender', 'Quaerat maxime nihil', '2023-12-14 04:37:53', '2023-12-14 04:37:53'),
(39, 'MacKenzie', 'Marshall', 'voveme@mailinator.com', '+1 (555) 362-8169', 'Error aute illo quas', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', '2023-12-14 05:04:25', '2023-12-14 05:04:25'),
(40, 'Baxter', 'Ayers', 'borac@mailinator.com', '+1 (208) 856-3205', 'Inventore praesentiu', 'Earum quisquam rerum', '2023-12-14 05:31:06', '2023-12-14 05:31:06'),
(41, 'Samantha', 'Espinoza', 'parasuh@mailinator.com', '+1 (777) 574-5702', NULL, 'Excepteur natus ipsu', '2023-12-14 05:31:19', '2023-12-14 05:31:19'),
(42, 'Lana', 'Welch', 'kurico@mailinator.com', '+1 (339) 239-7646', 'Vel ex ad sed dolore', 'Dolorem pariatur Co', '2023-12-14 06:22:40', '2023-12-14 06:22:40'),
(43, 'Emma', 'Barrett', 'torudycap@mailinator.com', '+1 (148) 714-5268', 'Nisi non molestiae e', 'Quaerat quam similiq', '2023-12-14 07:02:32', '2023-12-14 07:02:32'),
(44, 'Gil', 'Vazquez', 'vipa@mailinator.com', '+1 (508) 624-5864', 'Velit occaecat aute', 'Laborum ea voluptate', '2023-12-14 07:06:14', '2023-12-14 07:06:14'),
(45, 'Halee', 'Jones', 'disiwymu@mailinator.com', '+1 (595) 826-8177', 'Necessitatibus ex na', 'Voluptas voluptate d', '2023-12-14 07:06:44', '2023-12-14 07:06:44'),
(46, 'Cecilia', 'Guerrero', 'mifozyvul@mailinator.com', '+1 (628) 404-9254', 'Possimus omnis moll', 'Quod sunt at occaec', '2023-12-14 07:10:43', '2023-12-14 07:10:43'),
(47, 'Echo', 'Livingston', 'caryvyno@mailinator.com', '+1 (583) 548-3546', 'Ratione ab ex ullam', 'Nisi esse alias inc', '2023-12-14 07:19:52', '2023-12-14 07:19:52'),
(48, 'Echo', 'Livingston', 'caryvyno@mailinator.com', '+1 (583) 548-3546', 'Ratione ab ex ullam', 'Nisi esse alias inc', '2023-12-14 07:22:04', '2023-12-14 07:22:04'),
(49, 'Lani', 'Mcfadden', 'repahor@mailinator.com', '+1 (874) 955-5693', 'Voluptatem fugiat om', 'Ea et cupidatat qui', '2023-12-14 07:26:25', '2023-12-14 07:26:25'),
(50, 'Piper', 'Whitfield', 'nahaluryl@mailinator.com', '+1 (683) 233-6504', 'Aliquid praesentium', 'Animi architecto et', '2023-12-14 07:26:50', '2023-12-14 07:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `core_values`
--

CREATE TABLE `core_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_values`
--

INSERT INTO `core_values` (`id`, `title`, `slug`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Respect', 'respect', '656dbafb36aa7.svg', '<p>We hold high esteem for each other. We center inquiry and reflection to drive communication enabling us to prioritize our constituents and our work, to have positive impact within the entire community, and respect the role and work of each member in strengthening our community</p>', '2023-11-17 03:00:53', '2023-12-04 06:12:02'),
(2, 'Equity', 'equity', '656dbb4024b5e.svg', '<p>We hold high esteem for each other. We center inquiry and reflection to drive communication enabling us to prioritize our constituents and our work, to have positive impact within the entire community, and respect the role and work of each member in strengthening our community</p>', '2023-11-21 06:30:10', '2023-12-04 06:12:56'),
(3, 'Trust', 'trust', '656dbb5eb6b93.svg', '<p>We hold high esteem for each other. We center inquiry and reflection to drive communication enabling us to prioritize our constituents and our work, to have positive impact within the entire community, and respect the role and work of each member in strengthening our community</p>', '2023-11-21 06:30:46', '2023-12-04 06:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `card_holder_name` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `fullname`, `email`, `country`, `amount`, `card_holder_name`, `customer_id`, `transaction_id`, `created_at`, `updated_at`) VALUES
(2, 'Jimmy Uso', 'jimmy@gmail.com', 'UK', '50', 'Jimmy Uso', 'cus_PDU4hQm8x8nfwQ', 'ch_3OP36lFrptn7tD2n16Qs0X44', '2023-12-19 07:43:16', '2023-12-19 07:43:16'),
(3, 'Harry Brook', 'harry@gmail.com', 'USA', '10', 'Harry', 'cus_PDUBjxYFX3ZJiI', 'ch_3OP3DBFrptn7tD2n0GC9K7MA', '2023-12-19 07:49:54', '2023-12-19 07:49:54'),
(4, 'Roman', 'roman@gmail.com', 'India', '50', 'Roman', 'cus_PDUWIqKJrW74xv', 'ch_3OP3X3Frptn7tD2n10aFpJxv', '2023-12-19 08:10:26', '2023-12-19 08:10:26'),
(5, 'Seth Rollins', 'seth@gmail.com', 'India', '20', 'Seth', 'cus_PDjrHWejWLUYFE', 'ch_3OPINRFrptn7tD2n1Fyb9y0S', '2023-12-20 00:01:31', '2023-12-20 00:01:31'),
(6, 'Adam Paul', 'adam@gmail.com', 'India', '500', 'Adam', 'cus_PDp2NxDHunFPls', 'ch_3OPNORFrptn7tD2n0JMmtA51', '2023-12-20 05:22:52', '2023-12-20 05:22:52'),
(7, 'Mat Henry', 'mat@gmail.com', 'India', '30', 'Mat Henry', 'cus_PDqzZbUHRI0H1c', 'ch_3OPPHGFrptn7tD2n04StpkyH', '2023-12-20 07:23:35', '2023-12-20 07:23:35'),
(8, 'Mat Henry', 'mat@gmail.com', 'India', '30', 'Mat', 'cus_PDr1jDZXPW5Z5j', 'ch_3OPPJFFrptn7tD2n164EFfzL', '2023-12-20 07:25:39', '2023-12-20 07:25:39'),
(9, 'Joa Flix', 'joa@gmail.com', 'India', '50', 'Joa', 'cus_PDr46u70QnzEcU', 'ch_3OPPMkFrptn7tD2n1NoTIRlc', '2023-12-20 07:29:15', '2023-12-20 07:29:15'),
(10, 'Solo Sikoa', 'solo@gmail.com', 'UK', '90', 'Solo', 'cus_PDr6kUWzWhoaOo', 'ch_3OPPO0Frptn7tD2n0SKb9mZL', '2023-12-20 07:30:33', '2023-12-20 07:30:33'),
(11, 'Alaxa Blis', 'alexa@malinator.com', 'USA', '10', 'Alaxa Blis', 'cus_PDr7PQIBSzUkjs', 'ch_3OPPPeFrptn7tD2n0vaZ9O29', '2023-12-20 07:32:15', '2023-12-20 07:32:15'),
(12, 'Nikki Bela', 'nikki@malinator.com', 'Canada', '70', 'Nikki', 'cus_PDrBMfCGNMp8oF', 'ch_3OPPTbFrptn7tD2n0HhzqFKD', '2023-12-20 07:36:20', '2023-12-20 07:36:20'),
(13, 'Jim Korbin', 'jim@gmail.com', 'Iran', '10', 'Jim', 'cus_PDrWrJZSfN1g12', 'ch_3OPPneFrptn7tD2n00ohAnd5', '2023-12-20 07:57:03', '2023-12-20 07:57:03'),
(14, 'Risabh Pant', 'risab@mailinator.com', 'India', '10', 'Risabh Pant', 'cus_PE8RS9qCLRRVKQ', 'ch_3OPgAQFrptn7tD2n0OECxKnb', '2023-12-21 01:25:40', '2023-12-21 01:25:40'),
(15, 'Json Holder', 'json@gmail.com', 'USA', '30', 'Json', 'cus_PE8TmR5RYl9NOO', 'ch_3OPgCDFrptn7tD2n1eyqIkBz', '2023-12-21 01:27:31', '2023-12-21 01:27:31'),
(16, 'Dinesh Gupta', 'dinesh@gmial.com', 'India', '50', 'Dinesh', 'cus_PE8VXQYbZQGUfE', 'ch_3OPgEKFrptn7tD2n1d3N22cb', '2023-12-21 01:29:42', '2023-12-21 01:29:42'),
(17, 'Rock Botom', 'rock@gmail.com', 'Iran', '50', 'Rock', 'cus_PE8glWwd4KE7RR', 'ch_3OPgOmFrptn7tD2n1FQEbDwU', '2023-12-21 01:40:30', '2023-12-21 01:40:30'),
(18, 'Monoz Tiwari', 'monoz@gmail.com', 'India', '10', 'Monoz', 'cus_PE8wLW3FXC6Bkz', 'ch_3OPgeBFrptn7tD2n0YZpRQHU', '2023-12-21 01:56:25', '2023-12-21 01:56:25'),
(19, 'Mark Wood', 'mark@gmail.com', 'India', '10', 'Mark', 'cus_PE8xmguhZqSHQD', 'ch_3OPgfMFrptn7tD2n1myBQsF8', '2023-12-21 01:57:38', '2023-12-21 01:57:38'),
(20, 'John', 'john@gmail.com', 'Bangladesh', '10', 'John', 'cus_PE8zaAzowxwUUA', 'ch_3OPghOFrptn7tD2n0mrq8yXj', '2023-12-21 01:59:44', '2023-12-21 01:59:44'),
(21, 'Charls', 'charls@gmail.com', 'India', '10', 'Charls', 'cus_PE92JYnaBpP1at', 'ch_3OPgjzFrptn7tD2n1ClLEkKt', '2023-12-21 02:02:25', '2023-12-21 02:02:25'),
(22, 'Rabi Bopara', 'rabi@gmail.com', 'India', '10', 'Rabi', 'cus_PE9CWCy1jfxBZN', 'ch_3OPgu9Frptn7tD2n0fu7sf7M', '2023-12-21 02:12:54', '2023-12-21 02:12:54'),
(23, 'Bruno Hampton', 'bemomul@mailinator.com', 'USA', '90', 'Vaughan Moss', 'cus_PE9gV3lxNgobxT', 'ch_3OPhMgFrptn7tD2n1049dmZT', '2023-12-21 02:42:24', '2023-12-21 02:42:24'),
(24, 'Zelenia Heath', 'zyhamydiqo@mailinator.com', 'India', '50', 'Nola Kerr', 'cus_PE9qLWgGk9ZQD1', 'ch_3OPhWQFrptn7tD2n1DqDgt5p', '2023-12-21 02:52:28', '2023-12-21 02:52:28'),
(25, 'Griffin Robertson', 'Griffin@mailinator.com', 'Bangladesh', '10', 'Griffin Robertson', 'cus_PE9rHgdPmbJgjc', 'ch_3OPhXlFrptn7tD2n12YB7R40', '2023-12-21 02:53:51', '2023-12-21 02:53:51'),
(26, 'Tony Jaa', 'tony@gmail.com', 'India', '10', 'Tony Jaa', 'cus_PE9uztxjkcLz50', 'ch_3OPhaFFrptn7tD2n0PDLROYX', '2023-12-21 02:56:25', '2023-12-21 02:56:25'),
(27, 'Martinez', 'martinez@gmail.com', 'India', '10', 'Martinez', 'cus_PE9xG9crpUCatW', 'ch_3OPhdSFrptn7tD2n0wJSMD4J', '2023-12-21 02:59:44', '2023-12-21 02:59:44'),
(28, 'Gail Thomas', 'xepa@mailinator.com', 'India', '10', 'Adele Sykes', 'cus_PEA1VtVUD0JDyj', 'ch_3OPhhtFrptn7tD2n1zB3FAMf', '2023-12-21 03:04:19', '2023-12-21 03:04:19'),
(29, 'Germaine Ortega', 'nuhynav@mailinator.com', 'India', '10', 'Germaine Ortega', 'cus_PEA5mfVXvNLAWG', 'ch_3OPhliFrptn7tD2n0ypQujRz', '2023-12-21 03:08:16', '2023-12-21 03:08:16'),
(30, 'Joel Haney', 'nyhy@mailinator.com', 'Bangladesh', '10', 'Joel Haney', 'cus_PEB6YuA6hcWmAB', 'ch_3OPijuFrptn7tD2n1Cf69U5J', '2023-12-21 04:10:28', '2023-12-21 04:10:28'),
(31, 'Genevieve Beck', 'qybamiky@mailinator.com', 'India', '10', 'Genevieve Beck', 'cus_PEB8WBHKHCKwpC', 'ch_3OPim5Frptn7tD2n0RPHFHoS', '2023-12-21 04:12:43', '2023-12-21 04:12:43'),
(32, 'Jerad Pique', 'jerad@mailinator.com', 'Canada', '10', 'Jerad Pique', 'cus_PEBOs2nKfHVFRz', 'ch_3OPj1dFrptn7tD2n1ES984bQ', '2023-12-21 04:28:47', '2023-12-21 04:28:47'),
(33, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:33:25', '2023-12-21 04:33:25'),
(34, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:34:02', '2023-12-21 04:34:02'),
(35, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:34:20', '2023-12-21 04:34:20'),
(36, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:34:32', '2023-12-21 04:34:32'),
(37, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:34:43', '2023-12-21 04:34:43'),
(38, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:35:39', '2023-12-21 04:35:39'),
(39, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:35:48', '2023-12-21 04:35:48'),
(40, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:36:24', '2023-12-21 04:36:24'),
(41, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:36:39', '2023-12-21 04:36:39'),
(42, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:37:01', '2023-12-21 04:37:01'),
(43, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:37:10', '2023-12-21 04:37:10'),
(44, 'Dolan Rhodes', 'hebexatuna@mailinator.com', 'India', '100', 'Porter Santana', NULL, NULL, '2023-12-21 04:37:12', '2023-12-21 04:37:12'),
(45, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:38:01', '2023-12-21 04:38:01'),
(46, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:38:15', '2023-12-21 04:38:15'),
(47, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:49:25', '2023-12-21 04:49:25'),
(48, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:49:47', '2023-12-21 04:49:47'),
(49, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:49:56', '2023-12-21 04:49:56'),
(50, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:50:03', '2023-12-21 04:50:03'),
(51, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:50:14', '2023-12-21 04:50:14'),
(52, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:51:08', '2023-12-21 04:51:08'),
(53, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:51:14', '2023-12-21 04:51:14'),
(54, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:51:43', '2023-12-21 04:51:43'),
(55, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:51:53', '2023-12-21 04:51:53'),
(56, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:52:33', '2023-12-21 04:52:33'),
(57, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:53:02', '2023-12-21 04:53:02'),
(58, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:53:29', '2023-12-21 04:53:29'),
(59, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:54:40', '2023-12-21 04:54:40'),
(60, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:54:52', '2023-12-21 04:54:52'),
(61, 'Uriah Lee', 'sony@mailinator.com', 'Iran', '100', 'Akeem Morin', NULL, NULL, '2023-12-21 04:55:06', '2023-12-21 04:55:06'),
(62, 'Sylvia Rojas', 'gijoxu@mailinator.com', 'India', '30', 'Yvette Morrow', NULL, NULL, '2023-12-21 04:56:02', '2023-12-21 04:56:02'),
(63, 'Noelani Mcintosh', 'bekagujefo@mailinator.com', 'India', '50', 'Kieran Weaver', NULL, NULL, '2023-12-21 04:56:30', '2023-12-21 04:56:30'),
(64, 'Carol Brennan', 'sydadiq@mailinator.com', 'Bangladesh', '70', 'Felicia Hickman', NULL, NULL, '2023-12-21 04:57:50', '2023-12-21 04:57:50'),
(65, 'Hasad Wolf', 'suzyzoz@mailinator.com', 'Iran', '90', 'Sydnee Benson', NULL, NULL, '2023-12-21 04:58:48', '2023-12-21 04:58:48'),
(66, 'Eugenia Fitzgerald', 'dilecy@mailinator.com', 'USA', '70', 'Melanie Clay', NULL, NULL, '2023-12-21 04:59:49', '2023-12-21 04:59:49'),
(67, 'Eugenia Fitzgerald', 'dilecy@mailinator.com', 'USA', '70', 'Melanie Clay', NULL, NULL, '2023-12-21 05:00:12', '2023-12-21 05:00:12'),
(68, 'Joel Wall', 'sykycy@mailinator.com', 'India', '10', 'Richard Rojas', NULL, NULL, '2023-12-21 05:03:33', '2023-12-21 05:03:33'),
(69, 'Joel Wall', 'sykycy@mailinator.com', 'India', '10', 'Richard Rojas', NULL, NULL, '2023-12-21 05:05:27', '2023-12-21 05:05:27'),
(70, 'Joel Wall', 'sykycy@mailinator.com', 'India', '10', 'Richard Rojas', NULL, NULL, '2023-12-21 05:05:40', '2023-12-21 05:05:40'),
(71, 'Naomi York', 'fafoxob@mailinator.com', 'India', '10', 'Imogene Cash', NULL, NULL, '2023-12-21 05:13:35', '2023-12-21 05:13:35'),
(72, 'Eon Morgan', 'eon@gmail.com', 'India', '10', 'Eon Morgan', NULL, NULL, '2023-12-21 05:15:31', '2023-12-21 05:15:31'),
(73, 'Jos Baily', 'jos@mailinator.com', 'Bangladesh', '10', 'Jos Baily', NULL, NULL, '2023-12-21 05:16:37', '2023-12-21 05:16:37'),
(74, 'Glen Maxwel', 'maxwel@mailinator.com', 'Canada', '10', 'Glen Maxwel', NULL, NULL, '2023-12-21 05:17:53', '2023-12-21 05:17:53'),
(75, 'Glen Maxwel', 'glen@mailinator.com', 'India', '30', 'Glen Maxwel', NULL, NULL, '2023-12-21 05:18:52', '2023-12-21 05:18:52'),
(76, 'Mufutau Gutierrez', 'malavoj@mailinator.com', 'Canada', '50', 'Lysandra Yang', NULL, NULL, '2023-12-21 05:25:49', '2023-12-21 05:25:49'),
(77, 'Amity Sanders', 'amity@mailinator.com', 'India', '30', 'Amity Sanders', NULL, NULL, '2023-12-21 05:27:10', '2023-12-21 05:27:10'),
(78, 'Mat Henry', 'fawim31990@astegol.com', 'India', '10', 'Mat Henry', NULL, NULL, '2023-12-21 05:29:26', '2023-12-21 05:29:26'),
(79, 'Inista', 'inista@mailinator.com', 'India', '70', 'Inista', NULL, NULL, '2023-12-21 05:33:33', '2023-12-21 05:33:33'),
(80, 'Macon Schroeder', 'marco@mailinator.com', 'India', '10', 'Macon Schroeder', NULL, NULL, '2023-12-21 05:35:38', '2023-12-21 05:35:38'),
(81, 'Macon Schroeder', 'marco@mailinator.com', 'India', '10', 'Macon Schroeder', NULL, NULL, '2023-12-21 05:36:53', '2023-12-21 05:36:53'),
(82, 'Macon Schroeder', 'marco@mailinator.com', 'India', '10', 'Macon Schroeder', NULL, NULL, '2023-12-21 05:40:24', '2023-12-21 05:40:24'),
(83, 'Macon Schroeder', 'marco@mailinator.com', 'India', '10', 'Macon Schroeder', NULL, NULL, '2023-12-21 05:40:48', '2023-12-21 05:40:48'),
(84, 'Macon Schroeder', 'marco@mailinator.com', 'India', '10', 'Macon Schroeder', NULL, NULL, '2023-12-21 05:41:26', '2023-12-21 05:41:26'),
(85, 'Macon Schroeder', 'marco@mailinator.com', 'India', '10', 'Macon Schroeder', NULL, NULL, '2023-12-21 05:42:23', '2023-12-21 05:42:23'),
(86, 'Json Roki', 'json@gmail.com', 'UK', '30', 'Json', NULL, NULL, '2023-12-21 05:45:16', '2023-12-21 05:45:16'),
(87, 'Glen Maxwel', 'glen@mailinator.com', 'USA', '30', 'Glen Moxli', NULL, NULL, '2023-12-21 05:47:32', '2023-12-21 05:47:32'),
(88, 'Glen Maxwel', 'glen@mailinator.com', 'USA', '30', 'Glen Moxli', NULL, NULL, '2023-12-21 05:48:18', '2023-12-21 05:48:18'),
(89, 'Glen Maxwel', 'glen@mailinator.com', 'USA', '30', 'Glen Moxli', NULL, NULL, '2023-12-21 05:48:40', '2023-12-21 05:48:40'),
(90, 'Glen Maxwel', 'glen@mailinator.com', 'USA', '30', 'Glen Moxli', NULL, NULL, '2023-12-21 05:48:56', '2023-12-21 05:48:56'),
(91, 'Joe Root', 'joe@gmail.com', 'UK', '10', 'Joe Root', NULL, NULL, '2023-12-21 05:59:17', '2023-12-21 05:59:17'),
(92, 'Hayley Greene', 'wihehic@mailinator.com', 'Bangladesh', '10', 'Hayley Greene', NULL, NULL, '2023-12-21 06:02:14', '2023-12-21 06:02:14'),
(93, 'Hayley Greene', 'wihehic@mailinator.com', 'Bangladesh', '10', 'Hayley Greene', NULL, NULL, '2023-12-21 06:02:32', '2023-12-21 06:02:32'),
(94, 'Kadeem Berry', 'nacaguc@mailinator.com', 'Bangladesh', '30', 'Kadeem Berry', NULL, NULL, '2023-12-21 06:04:50', '2023-12-21 06:04:50'),
(95, 'Kadeem Berry', 'nacaguc@mailinator.com', 'Bangladesh', '30', 'Kadeem Berry', NULL, NULL, '2023-12-21 06:05:05', '2023-12-21 06:05:05'),
(96, 'Rahul Dravid', 'rahul@gmail.com', 'India', '90', 'Rahul Dravid', NULL, NULL, '2023-12-21 06:12:40', '2023-12-21 06:12:40'),
(97, 'Rahul Dravid', 'rahul@gmail.com', 'India', '90', 'Rahul Dravid', NULL, NULL, '2023-12-21 06:13:26', '2023-12-21 06:13:26'),
(98, 'Rahul Dravid', 'rahul@gmail.com', 'India', '90', 'Rahul Dravid', NULL, NULL, '2023-12-21 06:15:00', '2023-12-21 06:15:00'),
(99, 'Christan Lala', 'christan@malinator.com', 'Bangladesh', '30', 'Christan Lala', 'cus_PEDVXrVFqIk0HS', 'ch_3OPl4bFrptn7tD2n1FQaFESB', '2023-12-21 06:39:58', '2023-12-21 06:39:58'),
(100, 'Mat Henry', 'json@mailinator.com', 'Bangladesh', '30', 'Mat Henry', 'cus_PEDYVFCpMJUgK7', 'ch_3OPl7FFrptn7tD2n0jdnuv1q', '2023-12-21 06:42:42', '2023-12-21 06:42:42'),
(101, 'Joseph Lila', 'joseph@malinator.com', 'India', '70', 'Joseph Lila', 'cus_PEEEdirLZQen1O', 'ch_3OPlmIFrptn7tD2n0MnkQLqV', '2023-12-21 07:25:07', '2023-12-21 07:25:07'),
(102, 'Tony Kroos', 'tony@gmail.com', 'India', '30', 'Tony Kroos', 'cus_PEEIWuhyPpVcMW', 'ch_3OPlqIFrptn7tD2n1PgxaTgY', '2023-12-21 07:29:15', '2023-12-21 07:29:15'),
(103, 'Sheldon Jackson', 'sheldon@malinator.ccom', 'Iran', '10', 'Sheldon Jackson', 'cus_PEEL4MrsZThOrw', 'ch_3OPlsNFrptn7tD2n11L1xYgd', '2023-12-21 07:31:23', '2023-12-21 07:31:23'),
(104, 'Santanu Ganguly', 'santanu@gmail.com', 'India', '100', 'Santanu Ganguly', 'cus_PEEuUWDFivb85g', 'ch_3OPmQuFrptn7tD2n1DeW2Wyh', '2023-12-21 08:07:05', '2023-12-21 08:07:05'),
(105, 'Santanu Ganguly', 'santanu@gmail.com', 'India', '100', 'Santanu Ganguly', 'cus_PEExPAzp14LAt6', 'ch_3OPmTAFrptn7tD2n1gOfawsy', '2023-12-21 08:09:25', '2023-12-21 08:09:25'),
(106, 'Harry Kane', 'harry.kane@malinator.com', 'USA', '40', 'Harry Kane', 'cus_PEVCuTnEYJyAe7', 'ch_3OQ2CIFrptn7tD2n1y0zMsbN', '2023-12-22 00:57:05', '2023-12-22 00:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `organizer_name` varchar(255) DEFAULT NULL,
  `from_date` varchar(120) DEFAULT NULL,
  `to_date` varchar(120) DEFAULT NULL,
  `event_date` timestamp NULL DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `event_type` enum('Free Event','Paid Event') DEFAULT NULL,
  `num_of_seat` varchar(255) DEFAULT NULL,
  `is_guest` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `short_description`, `long_description`, `image`, `organizer_name`, `from_date`, `to_date`, `event_date`, `price`, `location`, `event_type`, `num_of_seat`, `is_guest`, `created_at`, `updated_at`) VALUES
(1, 'Event 1', 'event-1', '<p>Charity refers to the act of voluntarily giving assistance, support, or resources to those in need or to organizations</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '65560d4850fcc.png', 'Microsoft', '11:30 AM', '12:30 PM', '2023-11-17 18:30:00', 499.00, 'Kolkata', 'Paid Event', '30', 0, '2023-11-16 07:08:32', '2024-01-04 05:36:09'),
(2, 'The collection, storage and use of information related to you', 'the-collection-storage-and-use-of-information-related-to-you', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '<h2>About this event</h2>\r\n<p>If you have questions, concerns, or suggestions regarding our privacy policy, we can be reached using the contact information on our &ldquo;Contact Us&rdquo; page or at privacy@BNCEP.com</p>\r\n<p>In certain cases, you may have the ability to view or edit your personal information online. In the event your information is not accessible online and you wish to obtain a copy of particular information you provided to us, or if you become aware the information is incorrect and you would like us to correct it, please contact us immediately</p>\r\n<p>Before we are able to provide you with any information or correct any inaccuracies, however, we may ask you to verify your identity and to provide other details to ascertain your identity and to help us to respond to your request. We will contact you within 30 days of your request</p>\r\n<h2>About the speaker</h2>\r\n<p>If you have questions, concerns, or suggestions regarding our privacy policy, we can be reached using the contact information on our &ldquo;Contact Us&rdquo; page or at privacy@BNCEP.com</p>\r\n<p>In certain cases, you may have the ability to view or edit your personal information online. In the event your information is not accessible online and you wish to obtain a copy of particular information you provided to us, or if you become aware the information is incorrect and you would like us to correct it, please contact us immediately.</p>', '65560d7658c16.png', 'Json Makkhi', '10:00 AM', '01:30 PM', '2023-11-17 18:30:00', NULL, 'Saltlake', 'Free Event', '20', 1, '2023-11-16 07:09:18', '2024-01-05 00:58:34'),
(5, 'Event 3', 'event-3', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '65560d7658c16.png', 'Json Makkhi', '12:30 PM', '07:30 PM', '2023-11-17 18:30:00', NULL, 'Saltlake', 'Free Event', '20', 1, '2023-11-16 07:09:18', '2024-01-05 01:14:45'),
(6, 'Event 01', 'event-01', NULL, NULL, '65966c6b5fde6.png', 'CMDE', '10:30 AM', '07:00 PM', '2023-12-27 18:30:00', NULL, 'South Dum Dum', 'Free Event', '36', 1, '2023-12-27 05:51:03', '2024-01-05 01:22:50'),
(7, 'Event 02', 'event-02', NULL, NULL, '65966d670edfc.png', 'CMDE', '12:30 PM', '13:30 PM', '2023-12-29 18:30:00', NULL, 'Sealdah', 'Free Event', '360', 1, '2023-12-27 05:52:21', '2024-01-04 05:36:40'),
(8, 'Event 03', 'event-03', NULL, NULL, '6596656a3fc96.png', 'XYZ', '00:00 AM', '16:30 PM', '2023-12-27 18:30:00', NULL, 'South Dum Dum', 'Free Event', '20', 1, '2023-12-27 05:56:11', '2024-01-04 05:36:42'),
(9, 'Event 04', 'event-04', NULL, NULL, '65966187bcea9.png', 'CMDE', '12:00 PM', '14:00 PM', '2023-12-27 18:30:00', NULL, 'Saltlake', 'Free Event', '25', 1, '2023-12-27 06:17:14', '2024-01-04 05:36:44'),
(10, 'Event 05', 'event-05', NULL, NULL, '659665ea0a1dc.png', 'CMDE', '00:00 AM', '15:00 PM', '2023-12-27 18:30:00', NULL, 'Saltlake', 'Free Event', '25', 1, '2023-12-27 06:18:52', '2024-01-04 05:36:47'),
(11, 'Event 11', 'event-11', NULL, NULL, NULL, 'XYZ', '12:00 PM', '18:00 PM', '2023-12-25 18:30:00', NULL, 'South Dum Dum', 'Free Event', '150', 1, '2023-12-27 06:26:49', '2024-01-04 05:36:49'),
(12, 'Event 200', 'event-200', NULL, NULL, NULL, 'XYZ', '00:00 AM', '20:30 PM', '2023-12-28 18:30:00', NULL, 'South Dum Dum', 'Free Event', '25', 1, '2023-12-27 06:29:22', '2024-01-04 05:36:52'),
(13, 'Event 2020', 'event-2020', NULL, NULL, NULL, 'ABC', '12:00 PM', '13:00 PM', '2023-12-26 18:30:00', NULL, 'Saltlake', 'Free Event', '36', 1, '2023-12-27 06:31:22', '2024-01-04 05:37:51'),
(14, 'Event 2023', 'event-2023', NULL, NULL, '659692c567e23.png', 'CMDE', '12:30 PM', '13:00 PM', '2023-12-27 18:30:00', 100.00, 'Saltlake', 'Paid Event', '69', 1, '2023-12-27 06:36:37', '2024-01-04 05:43:36'),
(15, 'Event 456', 'event-456', NULL, NULL, NULL, 'CMDE', '12:30 PM', '13:00 PM', '2023-12-26 18:30:00', NULL, 'Saltlake', 'Free Event', '55', 1, '2023-12-27 07:03:58', '2024-01-04 05:38:04'),
(16, 'Event 4589', 'event-4589', NULL, NULL, NULL, 'CMDE', '12:30 PM', '17:00 PM', '2023-12-26 18:30:00', NULL, 'Saltlake', 'Free Event', '25', 1, '2023-12-27 07:07:56', '2024-01-04 05:38:06'),
(17, 'Event 056', 'event-056', NULL, NULL, NULL, 'Oren Swanson', '12:30 PM', '20:30 PM', '2023-12-27 18:30:00', NULL, 'Saltlake', 'Free Event', '45', 1, '2023-12-27 07:14:32', '2024-01-04 05:38:09'),
(18, 'Recusandae Modi ali', 'recusandae-modi-ali', NULL, NULL, NULL, 'Solomon Leonard', '08:00 AM', '22:30 PM', '2023-12-29 18:30:00', NULL, 'Sit fugit voluptas', 'Free Event', '93', 1, '2023-12-27 07:17:19', '2024-01-04 05:38:13'),
(19, 'Amet quis blanditii', 'amet-quis-blanditii', NULL, NULL, NULL, 'Hamish Garrett', '12:30 PM', '21:30 PM', '2023-12-27 18:30:00', NULL, 'Corporis quia ex nul', 'Free Event', '100', 0, '2023-12-27 07:20:02', '2024-01-04 05:38:15'),
(20, 'Et error quia minus', 'et-error-quia-minus', NULL, NULL, NULL, 'Hope Knowles', '11:30 AM', '13:30 PM', '2023-12-27 18:30:00', NULL, 'Rerum ut voluptatem', 'Free Event', '32', 1, '2023-12-27 07:21:26', '2024-01-04 05:38:19'),
(21, 'Ad ratione ut eum re', 'ad-ratione-ut-eum-re', NULL, NULL, NULL, 'Darius Oconnor', '00:00 AM', '20:00 PM', '2023-12-27 18:30:00', NULL, 'Totam est illo quas', 'Free Event', '69', 1, '2023-12-27 07:22:09', '2024-01-04 05:38:22'),
(22, 'Veritatis consequatu', 'veritatis-consequatu', NULL, NULL, NULL, 'Claire Rodriquez', '11:30 AM', '13:30 PM', '2023-12-28 18:30:00', NULL, 'Veniam sunt volupta', 'Free Event', '55', 0, '2023-12-27 07:28:21', '2024-01-04 05:38:25'),
(23, 'Nam earum quo odio n', 'nam-earum-quo-odio-n', NULL, NULL, NULL, 'Avram Mcguire', '10:00 AM', '12:00 PM', '2023-12-29 18:30:00', 260.00, 'Mollitia incididunt', 'Paid Event', '3', 1, '2023-12-27 07:29:09', '2024-01-04 05:38:59'),
(24, 'Nesciunt nostrud occcccc', 'nesciunt-nostrud-occcccc', NULL, NULL, NULL, 'Winter Farrell', '10:00 AM', '14:30 PM', '2023-12-29 18:30:00', NULL, 'Sed consectetur et m', 'Free Event', '73', 1, '2023-12-27 07:31:03', '2024-01-04 05:39:06'),
(25, 'Eum autem ratione exam', 'eum-autem-ratione-exam', NULL, NULL, NULL, 'Thaddeus Kent', '00:00 AM', '16:30 PM', '2023-12-29 18:30:00', NULL, 'Consectetur fugiat', 'Free Event', '90', 0, '2023-12-27 07:31:52', '2024-01-04 05:39:10'),
(26, 'Event Sam', 'event-sam', NULL, NULL, NULL, 'CMDE', '11:30 AM', '14:30 PM', '2023-12-29 18:30:00', NULL, 'South Dum Dum', 'Free Event', '59', 1, '2023-12-27 07:34:00', '2024-01-04 05:39:14'),
(27, 'Minus quaerat enim e', 'minus-quaerat-enim-e', NULL, NULL, NULL, 'Gil Sanford', '12:00 PM', '20:30 PM', '2023-12-29 18:30:00', NULL, 'Placeat aliquam ips', 'Free Event', '38', 1, '2023-12-27 07:39:44', '2024-01-04 05:39:18'),
(28, 'Event 1258', 'event-1258', NULL, NULL, NULL, 'XYZ', '12:00 PM', '15:00 PM', '2023-12-28 18:30:00', 60.00, 'Saltlake', 'Paid Event', '120', 1, '2023-12-27 07:45:09', '2024-01-04 05:41:54'),
(29, 'Laboriosam rerum comkmm', 'laboriosam-rerum-comkmm', NULL, NULL, NULL, 'Guy Burch', '12:00 PM', '18:00 PM', '2023-12-27 18:30:00', NULL, 'Voluptatem Fuga No', 'Free Event', '74', 1, '2023-12-27 07:58:06', '2024-01-04 05:39:31'),
(30, 'Nihil ut dolorem repppppp', 'nihil-ut-dolorem-repppppp', NULL, NULL, '659691f11adad.png', 'Myles Mosley', '09:30 AM', '16:00 PM', '2023-12-27 18:30:00', NULL, 'Cumque ex est blandiiii', 'Free Event', '26', 0, '2023-12-27 08:10:46', '2024-01-04 05:39:37'),
(31, 'Extra Eventtt', 'extra-eventtt', '<p>Est inventore nulla .</p>', '<p>Laboris sapiente vol.</p>', '659691f79f245.png', 'Rooney Hicks', '12:00 PM', '13:00 PM', '2023-12-29 18:30:00', 25.00, 'Quaerat reiciendis i', 'Paid Event', '92', 1, '2023-12-28 06:37:48', '2024-01-04 05:39:43'),
(32, 'Sit quis molestiae', 'sit-quis-molestiae', '<p>Enim totam consectet.</p>', '<p>In qui quis optio, i.</p>', '659691feea9ce.png', 'Craig Burgess', '11:30 AM', '20:30 PM', '2023-12-29 18:30:00', 120.00, 'Nisi quam non unde q', 'Paid Event', '19', 1, '2023-12-28 06:40:12', '2024-01-04 05:39:50'),
(33, 'Event 2024', 'event-2024', NULL, NULL, NULL, 'Jp Duminy', '12:00 PM', '12:00 PM', '2024-01-09 18:30:00', NULL, 'South City', 'Free Event', '30', 1, '2024-01-03 01:16:35', '2024-01-04 05:40:14'),
(36, 'Event 2025', 'event-2025', NULL, NULL, NULL, 'Json Makkhi', '11:30 AM', '16:30 PM', '2024-01-11 18:30:00', 36.00, 'Kolkata', 'Paid Event', '25', 1, '2024-01-03 01:36:00', '2024-01-04 05:40:43'),
(37, 'Event 2026', 'event-2026', NULL, NULL, NULL, 'Akinson', '12:00 PM', '23:00 PM', '2024-01-16 18:30:00', NULL, 'Kolkata', 'Free Event', '30', 1, '2024-01-03 01:49:24', '2024-01-04 05:40:48'),
(38, 'Event 2027', 'event-2027', NULL, NULL, NULL, 'Joe Root', '11:30 AM', '16:30 PM', '2024-01-02 18:30:00', NULL, 'South City', 'Free Event', '15', 1, '2024-01-03 01:55:30', '2024-01-04 05:40:54'),
(39, 'Event 2028', 'event-2028', NULL, NULL, '65969248798e6.png', 'Johnson Charls', '12:00 PM', '19:00 PM', '2024-01-16 18:30:00', NULL, 'Saltlake', 'Free Event', '36', 1, '2024-01-03 02:00:23', '2024-01-04 05:41:04'),
(40, 'Event 2029', 'event-2029', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '65964fea9da39.png', 'Json Holder', '10:00 AM', '01:00 AM', '2024-01-23 18:30:00', NULL, 'Central Park', 'Free Event', '20', 0, '2024-01-04 00:40:04', '2024-01-04 23:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `event_membership`
--

CREATE TABLE `event_membership` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `membership_plan_id` bigint(20) UNSIGNED NOT NULL,
  `member_payment_type` enum('Free Event','Paid Event','Not Allowed') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_membership`
--

INSERT INTO `event_membership` (`id`, `event_id`, `membership_plan_id`, `member_payment_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Free Event', '2024-01-04 05:26:09', '2024-01-04 05:36:09'),
(2, 1, 2, 'Paid Event', '2024-01-04 05:26:09', '2024-01-04 05:36:09'),
(3, 1, 3, 'Free Event', '2024-01-04 05:26:09', '2024-01-04 05:36:09'),
(4, 2, 1, 'Free Event', '2024-01-04 05:26:12', '2024-01-05 00:58:34'),
(5, 2, 2, 'Free Event', '2024-01-04 05:26:12', '2024-01-05 00:58:34'),
(6, 2, 3, 'Free Event', '2024-01-04 05:26:12', '2024-01-05 00:58:34'),
(7, 5, 1, 'Paid Event', '2024-01-04 05:26:14', '2024-01-05 01:14:46'),
(8, 5, 2, 'Free Event', '2024-01-04 05:26:14', '2024-01-05 01:14:46'),
(9, 5, 3, 'Free Event', '2024-01-04 05:26:14', '2024-01-05 01:14:46'),
(10, 6, 1, 'Paid Event', '2024-01-04 05:26:17', '2024-01-05 01:22:50'),
(11, 6, 2, 'Paid Event', '2024-01-04 05:26:17', '2024-01-05 01:22:50'),
(12, 6, 3, 'Free Event', '2024-01-04 05:26:17', '2024-01-05 01:22:50'),
(13, 7, 1, 'Free Event', '2024-01-04 05:26:19', '2024-01-04 05:36:40'),
(14, 7, 2, 'Free Event', '2024-01-04 05:26:19', '2024-01-04 05:36:40'),
(15, 7, 3, 'Free Event', '2024-01-04 05:26:19', '2024-01-04 05:36:40'),
(16, 8, 1, 'Free Event', '2024-01-04 05:26:22', '2024-01-04 05:36:42'),
(17, 8, 2, 'Free Event', '2024-01-04 05:26:22', '2024-01-04 05:36:42'),
(18, 8, 3, 'Free Event', '2024-01-04 05:26:22', '2024-01-04 05:36:42'),
(19, 9, 1, 'Free Event', '2024-01-04 05:26:24', '2024-01-04 05:36:44'),
(20, 9, 2, 'Free Event', '2024-01-04 05:26:24', '2024-01-04 05:36:44'),
(21, 9, 3, 'Free Event', '2024-01-04 05:26:24', '2024-01-04 05:36:44'),
(22, 10, 1, 'Free Event', '2024-01-04 05:26:28', '2024-01-04 05:36:47'),
(23, 10, 2, 'Free Event', '2024-01-04 05:26:28', '2024-01-04 05:36:47'),
(24, 10, 3, 'Free Event', '2024-01-04 05:26:28', '2024-01-04 05:36:47'),
(25, 11, 1, 'Free Event', '2024-01-04 05:26:31', '2024-01-04 05:36:49'),
(26, 11, 2, 'Free Event', '2024-01-04 05:26:31', '2024-01-04 05:36:49'),
(27, 11, 3, 'Free Event', '2024-01-04 05:26:31', '2024-01-04 05:36:49'),
(28, 12, 1, 'Free Event', '2024-01-04 05:26:34', '2024-01-04 05:36:52'),
(29, 12, 2, 'Free Event', '2024-01-04 05:26:34', '2024-01-04 05:36:52'),
(30, 12, 3, 'Free Event', '2024-01-04 05:26:34', '2024-01-04 05:36:52'),
(31, 13, 1, 'Free Event', '2024-01-04 05:27:40', '2024-01-04 05:37:51'),
(32, 13, 2, 'Paid Event', '2024-01-04 05:27:40', '2024-01-04 05:37:51'),
(33, 13, 3, 'Free Event', '2024-01-04 05:27:40', '2024-01-04 05:37:51'),
(34, 14, 1, 'Free Event', '2024-01-04 05:27:43', '2024-01-04 05:43:36'),
(35, 14, 2, 'Free Event', '2024-01-04 05:27:43', '2024-01-04 05:43:36'),
(36, 14, 3, 'Free Event', '2024-01-04 05:27:43', '2024-01-04 05:43:36'),
(37, 15, 1, 'Free Event', '2024-01-04 05:27:45', '2024-01-04 05:38:04'),
(38, 15, 2, 'Free Event', '2024-01-04 05:27:45', '2024-01-04 05:38:04'),
(39, 15, 3, 'Free Event', '2024-01-04 05:27:45', '2024-01-04 05:38:04'),
(40, 16, 1, 'Free Event', '2024-01-04 05:27:47', '2024-01-04 05:38:06'),
(41, 16, 2, 'Free Event', '2024-01-04 05:27:47', '2024-01-04 05:38:06'),
(42, 16, 3, 'Free Event', '2024-01-04 05:27:47', '2024-01-04 05:38:06'),
(43, 17, 1, 'Free Event', '2024-01-04 05:27:49', '2024-01-04 05:38:09'),
(44, 17, 2, 'Free Event', '2024-01-04 05:27:49', '2024-01-04 05:38:09'),
(45, 17, 3, 'Free Event', '2024-01-04 05:27:49', '2024-01-04 05:38:09'),
(46, 18, 1, 'Free Event', '2024-01-04 05:27:52', '2024-01-04 05:38:13'),
(47, 18, 2, 'Free Event', '2024-01-04 05:27:52', '2024-01-04 05:38:13'),
(48, 18, 3, 'Free Event', '2024-01-04 05:27:52', '2024-01-04 05:38:13'),
(49, 19, 1, 'Free Event', '2024-01-04 05:27:54', '2024-01-04 05:38:15'),
(50, 19, 2, 'Free Event', '2024-01-04 05:27:54', '2024-01-04 05:38:15'),
(51, 19, 3, 'Free Event', '2024-01-04 05:27:54', '2024-01-04 05:38:15'),
(52, 20, 1, 'Free Event', '2024-01-04 05:27:56', '2024-01-04 05:38:19'),
(53, 20, 2, 'Free Event', '2024-01-04 05:27:56', '2024-01-04 05:38:19'),
(54, 20, 3, 'Free Event', '2024-01-04 05:27:56', '2024-01-04 05:38:19'),
(55, 21, 1, 'Free Event', '2024-01-04 05:27:59', '2024-01-04 05:38:22'),
(56, 21, 2, 'Free Event', '2024-01-04 05:27:59', '2024-01-04 05:38:22'),
(57, 21, 3, 'Free Event', '2024-01-04 05:27:59', '2024-01-04 05:38:22'),
(58, 22, 1, 'Free Event', '2024-01-04 05:28:01', '2024-01-04 05:38:25'),
(59, 22, 2, 'Free Event', '2024-01-04 05:28:01', '2024-01-04 05:38:25'),
(60, 22, 3, 'Free Event', '2024-01-04 05:28:01', '2024-01-04 05:38:25'),
(61, 23, 1, 'Free Event', '2024-01-04 05:28:31', '2024-01-04 05:38:59'),
(62, 23, 2, 'Free Event', '2024-01-04 05:28:31', '2024-01-04 05:38:59'),
(63, 23, 3, 'Free Event', '2024-01-04 05:28:31', '2024-01-04 05:38:59'),
(64, 24, 1, 'Free Event', '2024-01-04 05:28:34', '2024-01-04 05:39:06'),
(65, 24, 2, 'Free Event', '2024-01-04 05:28:34', '2024-01-04 05:39:06'),
(66, 24, 3, 'Free Event', '2024-01-04 05:28:34', '2024-01-04 05:39:06'),
(67, 25, 1, 'Free Event', '2024-01-04 05:28:36', '2024-01-04 05:39:10'),
(68, 25, 2, 'Free Event', '2024-01-04 05:28:36', '2024-01-04 05:39:10'),
(69, 25, 3, 'Free Event', '2024-01-04 05:28:36', '2024-01-04 05:39:10'),
(70, 26, 1, 'Free Event', '2024-01-04 05:28:38', '2024-01-04 05:39:14'),
(71, 26, 2, 'Free Event', '2024-01-04 05:28:38', '2024-01-04 05:39:14'),
(72, 26, 3, 'Free Event', '2024-01-04 05:28:38', '2024-01-04 05:39:14'),
(73, 27, 1, 'Free Event', '2024-01-04 05:28:40', '2024-01-04 05:39:18'),
(74, 27, 2, 'Free Event', '2024-01-04 05:28:40', '2024-01-04 05:39:18'),
(75, 27, 3, 'Free Event', '2024-01-04 05:28:40', '2024-01-04 05:39:18'),
(76, 28, 1, 'Free Event', '2024-01-04 05:28:43', '2024-01-04 05:41:54'),
(77, 28, 2, 'Free Event', '2024-01-04 05:28:43', '2024-01-04 05:41:54'),
(78, 28, 3, 'Free Event', '2024-01-04 05:28:43', '2024-01-04 05:41:54'),
(79, 29, 1, 'Free Event', '2024-01-04 05:28:45', '2024-01-04 05:39:31'),
(80, 29, 2, 'Free Event', '2024-01-04 05:28:45', '2024-01-04 05:39:31'),
(81, 29, 3, 'Free Event', '2024-01-04 05:28:45', '2024-01-04 05:39:32'),
(82, 30, 1, 'Free Event', '2024-01-04 05:28:47', '2024-01-04 05:39:37'),
(83, 30, 2, 'Free Event', '2024-01-04 05:28:47', '2024-01-04 05:39:37'),
(84, 30, 3, 'Free Event', '2024-01-04 05:28:48', '2024-01-04 05:39:37'),
(85, 31, 1, 'Free Event', '2024-01-04 05:28:50', '2024-01-04 05:39:43'),
(86, 31, 2, 'Free Event', '2024-01-04 05:28:50', '2024-01-04 05:39:43'),
(87, 31, 3, 'Free Event', '2024-01-04 05:28:50', '2024-01-04 05:39:43'),
(88, 32, 1, 'Free Event', '2024-01-04 05:28:52', '2024-01-04 05:39:51'),
(89, 32, 2, 'Free Event', '2024-01-04 05:28:52', '2024-01-04 05:39:51'),
(90, 32, 3, 'Free Event', '2024-01-04 05:28:52', '2024-01-04 05:39:51'),
(91, 33, 1, 'Free Event', '2024-01-04 05:29:09', '2024-01-04 05:40:14'),
(92, 33, 2, 'Free Event', '2024-01-04 05:29:09', '2024-01-04 05:40:14'),
(93, 33, 3, 'Free Event', '2024-01-04 05:29:09', '2024-01-04 05:40:14'),
(94, 36, 1, 'Free Event', '2024-01-04 05:29:14', '2024-01-04 05:40:43'),
(95, 36, 2, 'Free Event', '2024-01-04 05:29:14', '2024-01-04 05:40:43'),
(96, 36, 3, 'Free Event', '2024-01-04 05:29:14', '2024-01-04 05:40:43'),
(97, 37, 1, 'Free Event', '2024-01-04 05:29:19', '2024-01-04 05:40:48'),
(98, 37, 2, 'Free Event', '2024-01-04 05:29:19', '2024-01-04 05:40:48'),
(99, 37, 3, 'Free Event', '2024-01-04 05:29:19', '2024-01-04 05:40:48'),
(100, 38, 1, 'Free Event', '2024-01-04 05:29:21', '2024-01-04 05:40:54'),
(101, 38, 2, 'Free Event', '2024-01-04 05:29:21', '2024-01-04 05:40:54'),
(102, 38, 3, 'Free Event', '2024-01-04 05:29:21', '2024-01-04 05:40:54'),
(103, 39, 1, 'Free Event', '2024-01-04 05:29:23', '2024-01-04 05:41:04'),
(104, 39, 2, 'Free Event', '2024-01-04 05:29:23', '2024-01-04 05:41:04'),
(105, 39, 3, 'Free Event', '2024-01-04 05:29:23', '2024-01-04 05:41:04'),
(109, 40, 1, 'Paid Event', '2024-01-04 23:51:47', '2024-01-04 23:53:51'),
(110, 40, 2, 'Free Event', '2024-01-04 23:51:47', '2024-01-04 23:53:51'),
(111, 40, 3, 'Free Event', '2024-01-04 23:51:47', '2024-01-04 23:53:51');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Question 1', 'Eaque dolores totamd', '2023-11-08 01:37:29', '2024-01-10 02:26:31'),
(3, 'Question 2', 'Modi facere totam ab', '2023-11-08 01:38:40', '2023-11-08 01:38:40'),
(4, 'Question 3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '2023-12-08 02:55:19', '2023-12-08 02:55:19'),
(5, 'Question 4', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', '2023-12-08 02:55:47', '2023-12-08 02:55:47'),
(6, 'Question 5', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,', '2023-12-08 02:56:15', '2023-12-08 02:56:15'),
(7, 'Question 6', 'Unfortunately, we’re unable to offer free samples. As a retailer, we buy all magazines from their publishers at the regular trade price. However, you could contact the publisher directly.', '2023-12-08 03:03:49', '2023-12-08 03:03:49'),
(8, 'Question 7', 'We usually sell all copies of the magazines offered in our shop. Some publishers and distributors offer the retailer the option of returning any unsold magazines. However, because our range includes magazines from countries such as Australia, the USA and the United Kingdom, sending them back would involve considerable effort in terms of logistics and would also be very expensive. We therefore choose not to return any unsold magazines. At the same time, this allows us to also offer our customers older or out-of-print magazines.', '2023-12-08 03:04:16', '2023-12-08 03:04:16'),
(9, 'Question 8', 'All data will be treated as strictly confidential and will not be disclosed to third parties. Take a look on our disclaimer and Privacy Policy.', '2023-12-08 03:04:45', '2023-12-08 03:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `fund_raisers`
--

CREATE TABLE `fund_raisers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fund_raisers`
--

INSERT INTO `fund_raisers` (`id`, `title`, `value`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Volunteerss', '2688', '655c905e5d7c7.png', '2023-11-21 05:22:27', '2023-11-21 05:41:32'),
(2, 'Benificiaries', '6.5k', '655c8dbd73cd1.png', '2023-11-21 05:30:13', '2023-11-21 05:30:13'),
(3, 'Worth Donations', '$10M', '655c8dd6e43d8.png', '2023-11-21 05:30:38', '2023-11-21 05:30:38'),
(4, 'NGOs Impacted', '400', '655c8df0ce11c.png', '2023-11-21 05:31:04', '2023-11-21 05:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `name`, `slug`, `subject`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Refer Member', 'refer-member', 'Refer Member Testing', '<p>Dear {%fullname%}</p>\r\n<p>{%user_name%} has refer you.</p>\r\n<p>Here is the register URL: {%url%}</p>\r\n<p>Thanks, BNCEP</p>', 'active', '2023-12-11 05:30:38', '2023-12-12 02:59:55'),
(2, 'Contact info', 'contact-info', 'BNCEP Contact Message', '<p>Dear BNCEP Admin,<br>There is a new message from <strong>{%name%}</strong><br>Here are the details:<br><strong>Name:</strong> {%name%}<br><strong>Email:</strong>&nbsp;{%email%}<br><strong>Subject:</strong> {%subject%}<br><strong>Message:</strong> {%message%}<br>Thanks,<br>BNCEP</p>', 'active', '2023-12-14 06:45:07', '2023-12-14 06:58:52'),
(3, 'Donation Info', 'donation-info', 'Donation Info', '<p>Dear <strong>{%name%}</strong>,<br>Thank you for your valuable contribution<br>Here are the details:<br><strong>Name:</strong> {%name%}<br><strong>Email:</strong>&nbsp;{%email%}<br><strong>Amount:</strong> ${%amount%}<br><strong>Country:</strong> {%country%}&nbsp; &nbsp;<br>Thanks,<br>BNCEP</p>', 'active', '2023-12-20 06:39:28', '2023-12-21 07:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `membership_plans`
--

CREATE TABLE `membership_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `tenure` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `feature_title` varchar(255) DEFAULT NULL,
  `feature_content` text DEFAULT NULL,
  `member_child_data` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_plans`
--

INSERT INTO `membership_plans` (`id`, `name`, `slug`, `description`, `price`, `features`, `tenure`, `status`, `feature_title`, `feature_content`, `member_child_data`, `image`, `created_at`, `updated_at`) VALUES
(1, 'BNCEP Members', 'bncep-members', '<p><span>Ideal for individuals who need quick access to basic features.</span></p>', 50.00, '<ul>\r\n<li><span>Feature 1</span></li>\r\n<li><span>Feature 2</span></li>\r\n<li><span>Feature 3</span></li>\r\n<li><span>Feature 4</span></li>\r\n<li><span>Feature 5</span></li>\r\n<li><span>Feature 6</span></li>\r\n</ul>', 'Month', 'active', NULL, NULL, '{\"member_child_title\":[\"BNCEP Academy\",\"Executive Coaching\",\"Community Building and Networking\",\"Advancing Trust-Based Philanthropy\"],\"member_child_content\":[\"<p>BNCEP Academy<\\/p>\",\"<p>Executive Coaching<\\/p>\",\"<p>Community Building and Networking<\\/p>\",\"<p>Advancing Trust-Based Philanthropy<\\/p>\"],\"member_child_image\":[\"737041113.png\",\"679950091.png\",\"733026606.png\"]}', NULL, '2023-12-06 21:40:29', '2023-12-22 02:48:19'),
(2, 'BNCEP Mobilizers', 'bncep-mobilizers', '<p>Ideal for individuals who need quick access to basic features.</p>', 60.00, '<ul>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/check-ico.svg\" alt=\"\"></em>Feature 1</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/check-ico.svg\" alt=\"\"></em>Feature 2</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 3</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 4</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 5</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 6</li>\r\n</ul>', 'Month', 'active', NULL, NULL, '{\"member_child_title\":[\"BNCEP Academyy\",\"Community Building and Networking\"],\"member_child_content\":[\"<p>BNCEP Academyy<\\/p>\",\"<p>Community Building and Networking<\\/p>\"],\"member_child_image\":[\"865445360.png\",\"780552695.png\"]}', NULL, '2023-12-06 21:41:56', '2023-12-17 20:21:15'),
(3, 'BNCEP Leadership', 'bncep-leadership', '<p>Ideal for individuals who need quick access to basic features.</p>', 70.00, '<ul>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/check-ico.svg\" alt=\"\"></em>Feature 1</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/check-ico.svg\" alt=\"\"></em>Feature 2</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 3</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 4</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 5</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 6</li>\r\n</ul>', 'Day', 'active', NULL, NULL, '{\"member_child_title\":[\"Advancing Trust-Based Philanthropy\"],\"member_child_content\":[\"<p>Advancing Trust-Based Philanthropy<\\/p>\"],\"member_child_image\":[\"165081954.png\"]}', NULL, '2023-12-06 21:42:52', '2023-12-17 20:21:15'),
(10, 'BNCEP Leadership demo', 'bncep-leadership-demo', '<p>Ideal for individuals who need quick access to basic features.</p>', 70.00, '<ul>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/check-ico.svg\" alt=\"\"></em>Feature 1</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/check-ico.svg\" alt=\"\"></em>Feature 2</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 3</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 4</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 5</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 6</li>\r\n</ul>', 'Day', 'inactive', NULL, NULL, '{\"member_child_title\":[\"Advancing Trust-Based Philanthropy\"],\"member_child_content\":[\"<p>Advancing Trust-Based Philanthropy<\\/p>\"],\"member_child_image\":[\"165081954.png\"]}', NULL, '2023-12-06 21:42:52', '2023-12-17 20:18:37'),
(11, 'BNCEP Leadership demo1', 'bncep-leadership-demo1', '<p>Ideal for individuals who need quick access to basic features.</p>', 70.00, '<ul>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/check-ico.svg\" alt=\"\"></em>Feature 1</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/check-ico.svg\" alt=\"\"></em>Feature 2</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 3</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 4</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 5</li>\r\n<li><em class=\"ico__box\"><img src=\"assets/images/uncheck-ico.svg\" alt=\"\"></em>Feature 6</li>\r\n</ul>', 'Day', 'inactive', NULL, NULL, '{\"member_child_title\":[\"Advancing Trust-Based Philanthropy\"],\"member_child_content\":[\"<p>Advancing Trust-Based Philanthropy<\\/p>\"],\"member_child_image\":[\"165081954.png\"]}', NULL, '2023-12-06 21:42:52', '2023-12-17 20:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `membership_program`
--

CREATE TABLE `membership_program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `membership_plan_id` bigint(20) UNSIGNED NOT NULL,
  `member_payment_type` enum('Free Program','Paid Program','Not Allowed') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_program`
--

INSERT INTO `membership_program` (`id`, `program_id`, `membership_plan_id`, `member_payment_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Free Program', '2024-01-04 06:38:47', '2024-01-04 06:42:10'),
(2, 1, 2, 'Free Program', '2024-01-04 06:38:47', '2024-01-04 06:42:10'),
(3, 1, 3, 'Free Program', '2024-01-04 06:38:47', '2024-01-04 06:42:10'),
(4, 2, 1, 'Free Program', '2024-01-04 06:40:39', '2024-01-04 06:42:12'),
(5, 2, 2, 'Free Program', '2024-01-04 06:40:39', '2024-01-04 06:42:12'),
(6, 2, 3, 'Free Program', '2024-01-04 06:40:39', '2024-01-04 06:42:12'),
(7, 3, 1, 'Free Program', '2024-01-04 06:41:01', '2024-01-11 00:06:26'),
(8, 3, 2, 'Free Program', '2024-01-04 06:41:01', '2024-01-11 00:06:26'),
(9, 3, 3, 'Free Program', '2024-01-04 06:41:01', '2024-01-11 00:06:26'),
(10, 4, 1, 'Free Program', '2024-01-04 06:41:05', '2024-01-04 06:42:18'),
(11, 4, 2, 'Free Program', '2024-01-04 06:41:05', '2024-01-04 06:42:18'),
(12, 4, 3, 'Free Program', '2024-01-04 06:41:05', '2024-01-04 06:42:18'),
(13, 5, 1, 'Free Program', '2024-01-04 06:41:10', '2024-01-04 06:42:22'),
(14, 5, 2, 'Free Program', '2024-01-04 06:41:10', '2024-01-04 06:42:22'),
(15, 5, 3, 'Free Program', '2024-01-04 06:41:10', '2024-01-04 06:42:22'),
(16, 6, 1, 'Free Program', '2024-01-04 06:41:13', '2024-01-04 06:42:24'),
(17, 6, 2, 'Free Program', '2024-01-04 06:41:13', '2024-01-04 06:42:24'),
(18, 6, 3, 'Free Program', '2024-01-04 06:41:13', '2024-01-04 06:42:24'),
(19, 7, 1, 'Free Program', '2024-01-04 06:41:16', '2024-01-04 06:42:27'),
(20, 7, 2, 'Free Program', '2024-01-04 06:41:16', '2024-01-04 06:42:27'),
(21, 7, 3, 'Free Program', '2024-01-04 06:41:16', '2024-01-04 06:42:27'),
(58, 8, 1, 'Free Program', '2024-01-04 23:58:45', '2024-01-04 23:59:05'),
(59, 8, 2, 'Paid Program', '2024-01-04 23:58:45', '2024-01-04 23:59:05'),
(60, 8, 3, 'Free Program', '2024-01-04 23:58:45', '2024-01-04 23:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `member_ships`
--

CREATE TABLE `member_ships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_ships`
--

INSERT INTO `member_ships` (`id`, `name`, `slug`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Jos Buttler', 'jos-buttler', 'Minim placeat, sapie.gh', '655373e889608.jpg', NULL, '2023-11-14 01:20:48', '2023-11-14 02:19:36'),
(2, 'Ben Stokes', 'ben-stokes', 'Eum error aut ametdsfsd, .', '655366d7bc8c4.jpg', 1, '2023-11-14 01:23:52', '2023-11-14 02:27:35'),
(3, 'Jonny', 'jonny', 'Et autem reprehender.ss', '655375f523de4.jpg', 1, '2023-11-14 01:47:34', '2023-11-14 02:28:21');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_11_073824_create_menus_wp_table', 1),
(4, '2017_08_11_074006_create_menu_items_wp_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_10_05_110619_create_roles_table', 1),
(9, '2023_11_02_105735_create_site_settings_table', 1),
(11, '2023_11_07_104027_create_pages_table', 1),
(12, '2023_11_08_062845_create_banners_table', 1),
(13, '2023_11_08_112431_create_teams_table', 1),
(14, '2023_11_08_120218_create_faqs_table', 1),
(15, '2023_11_08_124340_create_member_ships_table', 1),
(28, '2023_11_16_075219_create_program_user_table', 8),
(31, '2023_11_08_124350_create_events_table', 10),
(32, '2023_11_13_102441_create_programs_table', 11),
(35, '2023_11_09_104739_create_blogs_table', 12),
(37, '2023_11_17_080411_create_core_values_table', 13),
(38, '2023_11_21_064132_create_strategic_priorities_table', 14),
(39, '2023_11_21_103226_create_fund_raisers_table', 15),
(40, '2023_11_23_103646_create_widgets_table', 16),
(41, '2023_12_11_082629_create_mail_templates_table', 17),
(42, '2023_12_14_071907_create_contacts_table', 18),
(47, '2023_11_03_094926_create_membership_plans_table', 20),
(50, '2023_12_18_100303_create_service_areas_table', 22),
(53, '2023_12_19_094935_create_donations_table', 24),
(56, '2024_01_02_111234_create_membership_program_table', 25),
(57, '2023_11_15_131504_create_event_membership_table', 26),
(60, '2023_10_05_110620_create_users_table', 29),
(61, '2024_01_05_124116_create_user_details_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `page_template` varchar(255) DEFAULT 'template_default',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `banner`, `page_template`, `meta_key`, `meta_content`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test', '{\"sub_title\":null,\"page_content\":\"Anim placeat, conseq.s\",\"category_title\":null,\"category_id\":null,\"brand_title\":null,\"brand_id\":null,\"medicine_title\":null,\"medicine_id\":null}', NULL, 'template_default', 'Possimus aut quae v', 'Dolores magni minima', '2023-11-07 01:55:09', '2023-11-07 02:24:11'),
(5, 'Home', 'home', '{\"page_content\":null,\"banner_slider_id\":[\"2\",\"3\",\"4\"],\"who_we_title\":\"Who We Are\",\"who_we_subtitle\":\"It\'s All Big When You Are Changing The Worlds\",\"who_we_content_title_1\":\"Our Mission\",\"who_we_content_1\":\"<p>BNCEP&rsquo;s mission is to cultivate supportive networks for Black-led organizations and increase the level of support they receive from the philanthropic community.<\\/p>\",\"who_we_content_title_2\":\"Our Vision\",\"who_we_content_2\":\"<p>BNCEP&rsquo;s mission is to cultivate supportive networks for Black-led organizations and increase the level of support they receive from the philanthropic community.<\\/p>\",\"team_id\":[\"1\",\"2\",\"3\"],\"core_value_title\":\"Core Values\",\"core_value_subtitle\":\"Black Non-profit Chief Executives of Philadelphia\",\"core_value_content\":\"<p>Most businesses sacrifice part of their margin in some way to encourage loyalty via commissions to a third party or providing discounts.<\\/p>\",\"core_value_id\":[\"1\",\"2\",\"3\"],\"program_title\":\"Upcoming Program\",\"program_subtitle\":\"Check Our Upcoming Program\",\"program_id\":[\"1\",\"2\",\"3\"],\"member_title\":\"Member Benefits\",\"member_subtitle\":\"Fostering connections with individuals and organizations that share common goals and values\",\"member_content\":\"<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,<\\/p>\",\"member_benefit_id\":[\"1\",\"2\",\"3\"],\"membership_title\":\"Pricing Of Members\",\"membership_subtitle\":\"Membership Plans\",\"membership_content\":\"<p>Most businesses sacrifice part of their margin in some way to encourage loyalty via commissions to a third party or providing discounts.<\\/p>\",\"membership_plan_id\":[\"1\",\"2\",\"3\"],\"event_title\":\"Upcoming Events\",\"event_subtitle\":\"Echeck our upcoming events\",\"event_id\":[\"1\",\"2\",\"5\",\"6\",\"7\"],\"donation_title\":\"Donation\",\"donation_subtitle\":\"Fostering connections with individuals and organizations that share common goals and values\",\"donation_content\":\"<p>Most businesses sacrifice part of their margin in some way to encourage loyalty via commissions to a third party or providing discounts.<\\/p>\",\"donation_btn_label\":\"Donate Now\",\"donation_btn_url\":\"donation\",\"blog_title\":\"News and Blogs\",\"blog_subtitle\":\"Recent Blog Posts\",\"blog_id\":[\"1\",\"2\"],\"faq_title\":\"FAQ\",\"faq_subtitle\":\"Frequently Asked Questions\",\"faq_content\":\"<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,<\\/p>\",\"faq_id\":[\"1\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"],\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":null,\"registration_content\":null,\"registration_image\":null,\"registration_image_content\":null}', NULL, 'template_home', NULL, NULL, '2023-11-22 01:21:49', '2024-01-05 01:23:42'),
(6, 'About Us', 'about-us', '{\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":\"Core Values\",\"core_value_content\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia<\\/p>\",\"core_value_id\":[\"1\",\"2\",\"3\"],\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":\"Donation\",\"donation_subtitle\":\"Fostering Connections with individuals\",\"donation_content\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia<\\/p>\",\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"About Us\",\"about_banner_content\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia<\\/p>\",\"about_who_we_title\":\"Who We Are\",\"about_who_we_subtitle\":\"Black Non-profit\",\"about_who_we_content\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia<\\/p>\",\"about_who_we_image_title_1\":\"Our Mission\",\"about_who_we_image_content_1\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia<\\/p>\",\"about_who_we_image_title_2\":\"Our Vision\",\"about_who_we_image_content_2\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia<\\/p>\",\"about_strategic_title\":\"Strategic Priority\",\"about_strategic_subtitle\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia\",\"about_fund_raiser_title\":\"Interesting Facts\",\"about_fund_raiser_subtitle\":\"Fund Raisers Facts & Figure\",\"about_fund_raiser_content\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia<\\/p>\"}', '655da97ebea55.png', 'template_about', NULL, NULL, '2023-11-22 01:40:55', '2023-11-22 01:40:55'),
(7, 'Contact Us', 'contact-us', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Contact Us\",\"about_banner_content\":\"<p>Connect with the BNCEP community at conferences, meetups, and hackathons around the world.<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":\"Contact Us\",\"contact_subtitle\":\"Getting in touch with us\",\"contact_content\":\"<p>Charity refers to the act of voluntarily giving assistance, support, or resources to those in need or to organizations<\\/p>\",\"contact_mobile_no\":\"+12569589633\",\"contact_email\":\"contact.bncep@gmail.com\",\"register_title\":\"To unlock exclusive features and content, join our community by registering today!\",\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":null,\"registration_content\":null,\"registration_image\":null,\"registration_image_content\":null}', '655db0d943d76.png', 'template_contact', NULL, NULL, '2023-11-22 02:12:17', '2023-12-14 01:22:20'),
(8, 'Terms & Condition', 'terms-condition', '{\"page_content\":\"<h2>Terms Of Use<\\/h2>\\r\\n<p>Please read terms of use before starting to use BNCEP website, service. Your use of the site BNCEP.org platform or app is expressly conditioned upon your accepting and agreeing to all of these Terms of Use.<\\/p>\\r\\n<div class=\\\"cms__content__list\\\">\\r\\n<h3>Acceptance of Terms<\\/h3>\\r\\n<p>It is a long-established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lore Issue is that it has a more-or-less normal distribution of letters, as opposed to using &lsquo;Content here, content here&rsquo;, making it look like readable English. Many desktop publishing packages and web page editors now use Lore Issue as their default model text, and a search for &lsquo;lorem ipsum&rsquo; will uncover many websites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humor and the like There are many variations of passages of Lore Issue available, but the majority have suffered alteration in some form, by injected humor, or randomized words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lore Issue, you need to be sure there isn&rsquo;t anything embarrassing hidden in the middle of text.<\\/p>\\r\\n<h3>Acceptance of Terms<\\/h3>\\r\\n<p>Contrary to popular belief, Lore Issue is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words<\\/p>\\r\\n<p>All the Lore Issue generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lore Issue which looks reasonable. The generated Lore Issue is therefore always free from repetition, injected humor, or non-characteristic words etc.<\\/p>\\r\\n<p>Lorem ipsum dolor sit amet, ConnectEDU advising elite, used do aimed temper incident Ut labor et Dolores magma clique. Ut denim ad minim venial, quit nostrum excitation Alamo labors Nisei Ut liquid ex ea commode consequent.<\\/p>\\r\\n<p>Luis acute inure dolor in reprehended in voltage RELIT else cilium Dolores Eu Fiat null painter. Excepted sent occaecat cupidity non provident, sent in cuppa quit official desert Mollie anime id est labrum.<\\/p>\\r\\n<p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.<\\/p>\\r\\n<h3>Protect Your Property<\\/h3>\\r\\n<p>Lore Issue is simply dummy text of the printing and typesetting industry. Lore Issue has been the industries standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularized in the 1960s with the release of Least sheets containing Lore Issue passages, Andes more recently with desktop publishing software like ALUs Pacemaker including versions of Lore Issue to make a type specimen book. Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularized in the 1960s with the release of Least sheets containing Lore Issue passages, Andes more recently with desktop publishing software like ALUs Pacemaker including versions of Lore Issue to make a type specimen book.<\\/p>\\r\\n<h3>Pricing and Payment Terms<\\/h3>\\r\\n<p>Lore Issue is simply dummy text of the printing and typesetting industry. Lore Issue has been the industries standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularized in the 1960s with the release of Least sheets containing Lore Issue passages, Andes more recently with desktop publishing software like ALUs Pacemaker including versions of Lore Issue to make a type specimen book.<\\/p>\\r\\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularized in the 1960s with the release of Least sheets containing Lore Issue passages, Andes more recently with desktop publishing software like ALUs Pacemaker including versions of Lore Issue to make a type specimen book. It wasn&rsquo;t popularized in the 1960s with the release of Least sheets containing Lore Issue passages, Andes more recently with desktop publishing software like ALUs Pacemaker including versions of Lore Issue to make a type specimen book.<\\/p>\\r\\n<p>Furthermore, it has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. Furthermore, it wasn&rsquo;t popularized in the 1960s with the release of Least sheets containing Lore Issue passages, Andes more recently with desktop<\\/p>\\r\\n<\\/div>\",\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Terms & Condition\",\"about_banner_content\":\"<p>The agreement was last modified on 04th August 2023<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":null,\"registration_content\":null,\"registration_image\":null,\"registration_image_content\":null}', '655ef8b12698b.png', 'template_default', NULL, NULL, '2023-11-22 02:42:13', '2023-12-15 03:34:08'),
(10, 'Privacy Policy', 'privacy-policy', '{\"page_content\":\"<p>We i.e. \\\"BNCEP\\\" are committed to protecting the privacy and security of your personal information. Your privacy is important to us and maintaining your trust is paramount. This privacy policy explains how we collect, use, process and disclose information about you. By using our website\\/ app\\/ platform and affiliated services, you consent to the terms of our privacy policy (&ldquo;Privacy Policy&rdquo;) in addition to our &lsquo;Terms of Use.&rsquo; We encourage you to read this privacy policy to understand the collection, use, and disclosure of your information from time to time, to keep yourself updated with the changes and updates that we make to this policy. This privacy policy describes our privacy practices for all websites, products and services that are linked to it. However, this policy does not apply to those affiliates and partners that have their own privacy policy. In such situations, we recommend that you read the privacy policy on the applicable site. Should you have any clarifications regarding this privacy policy, please write to us at privacy@BNCEP.com<\\/p>\\r\\n<h3>The collection, storage and use of information related to you<\\/h3>\\r\\n<p>We may automatically store certain information including but not limited to information about your web browser, IP address, cookies stored on your device and other information about you based upon your behavior on the website. We use this information to do internal research on our users&rsquo; demographics, interests and behavior to better understand, protect and serve our users. This information is compiled and analyzed on an aggregated basis. This information may include the URL that you just came from (whether this URL is on the website or not), which URL you next go to (whether this URL is on the website or not), your computer browser information, your IP address, and other information associated with your interaction with the website.<\\/p>\\r\\n<p>We may disclose personal information that we collect, or you provide with our group companies, holding, subsidiaries and affiliates, which are entities under common ownership or control of our ultimate parent company Tomato Limited.<\\/p>\\r\\n<p>We may also share your Mobile IP\\/Device IP with third party(is) and to the best of our knowledge, be-life and representations given to us by these third party(is) this information is not stored by them.<\\/p>\\r\\n<p>Furthermore, we also collect and store personal information provided by you from time to time on the website\\/app. Furthermore, we only collect and use such information from you that we consider necessary for achieving a seamless, efficient and safe experience, customized to your needs including:<\\/p>\\r\\n<p>To enable the provision of services opted by you;<\\/p>\\r\\n<p>To communicate necessary account and product\\/service related information from time to time;<\\/p>\\r\\n<p>To allow you to receive quality customer care services;<\\/p>\\r\\n<p>To undertake necessary fraud and money laundering prevention checks, and comply with the highest security standards;<\\/p>\\r\\n<p>To comply with applicable laws, rules and regulations, and<\\/p>\\r\\n<p>To provide you with information and offers on products and services, on updates, on promotions, on related, affiliated or associated service providers and partners, that we believe would be of interest to you<\\/p>\\r\\n<p>Where any service requested by you involves a third party, such information as is reasonably necessary by the Company to carry out your service request, may be shared with such third party.<\\/p>\\r\\n<p>We also do use your contact information to send you notifications based on the tasks allotted to you and also based on your interests and prior activity. The Company may also use contact information internally to direct its efforts for product improvement, to contact you as a survey respondent, to notify you if you win any contest, and to send you promotional materials from its contest sponsors or advertisers.<\\/p>\\r\\n<h3>Privacy questions and access to your personal information<\\/h3>\\r\\n<p>f you have questions, concerns, or suggestions regarding our privacy policy, we can be reached using the contact information on our &ldquo;Contact Us&rdquo; page or at privacy@BNCEP.com<\\/p>\\r\\n<p>In certain cases, you may have the ability to view or edit your personal information online. In the event your information is not accessible online, and you wish to obtain a copy of particular information you provided to us, or if you become aware the information is incorrect, and you would like us to correct it, please contact us immediately<\\/p>\\r\\n<p>Before we are able to provide you with any information or correct any inaccuracies, however, we may ask you to verify your identity and to provide other details to ascertain your identity and to help us to respond to your request. We will contact you within 30 days of your request<\\/p>\\r\\n<h3>Changes to the privacy policy<\\/h3>\\r\\n<p>BNCEP reserves the right to change this policy from time to time. Any changes shall be effective immediately upon the posting of the revised Privacy Policy. We encourage you to periodically review this page for the latest information on our privacy practices<\\/p>\",\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Privacy Policy\",\"about_banner_content\":\"<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":null,\"registration_content\":null,\"registration_image\":null,\"registration_image_content\":null}', '655db943d677d.png', 'template_default', NULL, NULL, '2023-11-22 02:48:11', '2023-12-15 03:46:48'),
(11, 'Events', 'events', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"donation_btn_label\":null,\"donation_btn_url\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Events\",\"about_banner_content\":\"<p>Connect with the BNCEP community at conferences, meetups, and hackathons around the world.<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":\"Events\",\"event_list_subtitle\":\"Upcoming Events\",\"program_list_title\":null,\"program_list_subtitle\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":null,\"registration_content\":null,\"registration_image\":null,\"registration_image_content\":null}', '655dd0af642d2.png', 'template_event', NULL, NULL, '2023-11-22 04:28:07', '2024-01-02 01:04:10'),
(13, 'Programs', 'programs', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"donation_btn_label\":null,\"donation_btn_url\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Programs\",\"about_banner_content\":\"<p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.&nbsp;<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":\"Programs\",\"event_list_subtitle\":\"Upcoming Programs\",\"program_list_title\":\"Programs\",\"program_list_subtitle\":\"Upcoming Programs\",\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":null,\"registration_content\":null,\"registration_image\":null,\"registration_image_content\":null}', '655dd3264b877.png', 'template_program', NULL, NULL, '2023-11-22 04:38:38', '2023-12-22 06:26:26'),
(14, 'Blogs', 'blogs', '{\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Blogs\",\"about_banner_content\":\"<p>Connect With BNCEP community<\\/p>\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":\"Events\",\"event_list_subtitle\":\"Upcoming Events\",\"event_list_id\":[\"1\",\"2\"],\"program_list_title\":\"Programs\",\"program_list_subtitle\":\"Upcoming Programs\",\"program_list_id\":[\"1\",\"2\",\"3\"],\"blog_list_title\":\"Blogs\",\"blog_list_subtitle\":\"Latest Blogs\",\"blog_list_id\":[\"1\",\"2\",\"3\"]}', NULL, 'template_blog', NULL, NULL, '2023-11-22 05:37:52', '2023-11-22 05:37:52'),
(18, 'About Test', 'about-test', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":[\"445636085.png\",\"772936922.png\",\"806651868.png\",\"519582952.png\",\"113920277.png\"],\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null}', NULL, 'template_about', NULL, NULL, '2023-11-23 02:50:45', '2023-11-23 02:50:45'),
(19, 'About 3', 'about-3', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":\"\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null}', NULL, 'template_about', NULL, NULL, '2023-11-23 02:56:39', '2023-11-23 02:56:39'),
(20, 'About 4', 'about-4', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":[\"public\\/pages\\/572270630.png\",\"public\\/pages\\/171747577.png\"],\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null}', NULL, 'template_about', NULL, NULL, '2023-11-23 02:59:01', '2023-11-23 04:57:43'),
(21, 'Resources', 'resources', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Bread Crumb title\",\"about_banner_subtitle\":\"Bread Crumb subtitle\",\"about_banner_content\":\"<p>Bread Crumb Content<\\/p>\",\"about_who_we_banner\":\"\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Resource Video head title\",\"resource_head_subtitle\":\"Resourse video subtitle\",\"resource_video_title\":\"[\\\"video title 1\\\"]\",\"resource_video_image\":[\"public\\/pages\\/234015778.png\"],\"resource_video\":[{}]}', NULL, 'template_resource', NULL, NULL, '2023-11-24 07:27:26', '2023-11-24 07:27:26'),
(22, 'Resource 2', 'resource-2', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":\"\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Head Title\",\"resource_head_subtitle\":\"Head SubTitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\",\\\"video title 3\\\"]\",\"resource_video_image\":[\"public\\/pages\\/237215969.png\",\"public\\/pages\\/952386253.png\",\"public\\/pages\\/440456164.png\"],\"resource_video\":\"\"}', NULL, 'template_resource', NULL, NULL, '2023-11-24 07:29:41', '2023-11-24 07:29:41'),
(23, 'Resourcesx', 'resourcesx', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":\"\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":\"[\\\"video title 1\\\"]\",\"resource_video_image\":\"\",\"resource_video\":\"\"}', NULL, 'template_resource', NULL, NULL, '2023-11-24 07:42:01', '2023-11-24 07:42:01');
INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `banner`, `page_template`, `meta_key`, `meta_content`, `created_at`, `updated_at`) VALUES
(24, 'Resourcee', 'resourcee', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":\"\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":\"{\\\"resource_video_title\\\":[\\\"video title 1\\\",\\\"video title 2\\\",\\\"video title 3\\\"]}\",\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-24 07:49:30', '2023-11-24 07:49:30'),
(26, 'Resource Final Test', 'resource-final-test', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":\"\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Head Title\",\"resource_head_subtitle\":\"Head SubTitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\",\\\"video title 3\\\"]\",\"resource_video_image\":[\"public\\/pages\\/217543936.png\",\"public\\/pages\\/692907840.png\",\"public\\/pages\\/393537693.png\"],\"resource_video\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-24 08:04:10', '2023-11-24 08:04:10'),
(27, 'Resourse Fianl', 'resourse-fianl', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":\"\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Head Title\",\"resource_head_subtitle\":\"Head SubTitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\",\\\"video title 3\\\"]\",\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-24 23:57:08', '2023-11-25 02:29:46'),
(28, 'Resource Fian l2', 'resource-fian-l2', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Head Title\",\"resource_head_subtitle\":\"Resourse video subtitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\",\\\"video title 3\\\"]\",\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-25 00:15:51', '2023-11-25 00:15:51'),
(29, 'About Final', 'about-final', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":\"Core Value Title\",\"core_value_content\":\"<p>Core Value Content<\\/p>\",\"core_value_id\":[\"1\",\"3\"],\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":\"Donation Title\",\"donation_subtitle\":\"Donation Subtitle\",\"donation_content\":\"<p>Donation Content<\\/p>\",\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Bread Crumb title\",\"about_banner_subtitle\":\"Bread Crumb Title Sub Title\",\"about_banner_content\":\"<p>Bread Crumb Content<\\/p>\",\"about_who_we_banner\":[\"public\\/pages\\/684349487.png\",\"public\\/pages\\/918789301.png\",\"public\\/pages\\/757403082.png\"],\"about_who_we_title\":\"Who We Are\",\"about_who_we_subtitle\":\"Black Non-profit\",\"about_who_we_content\":\"<p>Who We Are Content<\\/p>\",\"about_who_we_image_title_1\":\"Icon Title 1\",\"about_who_we_image_content_1\":\"<div class=\\\"form-group\\\">\\r\\n<div class=\\\"pt-2\\\">&nbsp;<\\/div>\\r\\n<\\/div>\\r\\n<div class=\\\"form-group\\\"><label class=\\\"form-label\\\">Icon Content 1<\\/label><\\/div>\",\"about_who_we_image_title_2\":\"Icon Title 2\",\"about_who_we_image_content_2\":\"<p>Icon Content 2<\\/p>\",\"about_strategic_title\":\"Strategic\",\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":\"[null]\",\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_about', NULL, NULL, '2023-11-25 05:07:11', '2023-11-25 05:07:11'),
(30, 'Resource Final 2', 'resource-final-2', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Banner Bread Crumb Title\",\"about_banner_subtitle\":\"Banner Bread Crumb Sub Title\",\"about_banner_content\":\"<p>Banner Bread Crumb Content<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Re\",\"resource_head_subtitle\":null,\"resource_video_title\":\"[null]\",\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_about', NULL, NULL, '2023-11-25 05:13:59', '2023-11-25 05:13:59'),
(31, 'Resource Last', 'resource-last', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Resource Last Bread Crumb Title\",\"about_banner_subtitle\":\"Resource Last Bread Crumb Sub Title\",\"about_banner_content\":\"<p>Resource Last Bread Crumb Content<\\/p>\",\"about_who_we_banner\":\"\",\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Resource Last Video Head Title\",\"resource_head_subtitle\":\"Resource Last Video Head SubTitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 3\\\"]\",\"resource_video_image\":[\"public\\/pages\\/649947443.png\",\"public\\/pages\\/382768603.png\"],\"resource_video\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-25 05:15:38', '2023-11-25 05:19:46'),
(32, 'Resource Last 1', 'resource-last-1', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Video Head Title\",\"resource_head_subtitle\":\"Video Head SubTitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\"]\",\"resource_video_image\":[\"public\\/pages\\/208765225.png\",\"public\\/pages\\/686543943.png\"],\"resource_video\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-25 05:20:56', '2023-11-25 05:20:56'),
(33, 'About Page', 'about-page', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":\"Core Value Title\",\"core_value_content\":\"<p>Core Value Content<\\/p>\",\"core_value_id\":[\"1\",\"2\"],\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":\"Donation Title\",\"donation_subtitle\":\"Donation\",\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":\"[null]\",\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_about', NULL, NULL, '2023-11-25 05:24:42', '2023-11-25 05:24:42'),
(34, 'About Final 123', 'about-final-123', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":\"Core Value Title\",\"core_value_content\":\"<p>Core Value Content<\\/p>\",\"core_value_id\":[\"1\",\"2\"],\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":\"Donation Title\",\"donation_subtitle\":\"Donation Subtitle\",\"donation_content\":\"<p>Donation Content<\\/p>\",\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Banner Bread Crumb Title\",\"about_banner_subtitle\":\"Bread Crumb subtitle\",\"about_banner_content\":\"<p>Bread Crumb Content<\\/p>\",\"about_who_we_banner\":[\"public\\/pages\\/829899582.png\",\"public\\/pages\\/822710225.png\"],\"about_who_we_title\":\"Who We Are Title\",\"about_who_we_subtitle\":\"Who We Are Subtitle\",\"about_who_we_content\":\"<p>Who We Are Content<\\/p>\",\"about_who_we_image_title_1\":\"Who We Are Icon 1 Title\",\"about_who_we_image_content_1\":\"<p>Who We Are Icon Content 1<\\/p>\",\"about_who_we_image_title_2\":\"Who We Icon Icon Title 2\",\"about_who_we_image_content_2\":\"<p>Who We Icon Content 2<\\/p>\",\"about_strategic_title\":\"Strategic Priority\",\"about_strategic_subtitle\":\"Strategic Priority Subtite\",\"about_fund_raiser_title\":\"Fund Raiser Title\",\"about_fund_raiser_subtitle\":\"Fund Raiser Subtitle\",\"about_fund_raiser_content\":\"<p>Fund Raiser Content<\\/p>\",\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":\"[null]\",\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_about', NULL, NULL, '2023-11-25 05:29:40', '2023-11-25 05:29:40'),
(35, 'About Test 1', 'about-test-1', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":\"[null]\",\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_about', NULL, NULL, '2023-11-25 05:36:33', '2023-11-25 05:36:33'),
(36, 'about 225', 'about-225', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":\"title 1\",\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":\"public\\/pages\\/6561ddf726260.png\",\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":\"public\\/pages\\/6561ddf726260.png\",\"about_who_we_image_title_2\":\"Who We Icon title 2\",\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null}', NULL, 'template_about', NULL, NULL, '2023-11-25 06:13:51', '2023-11-25 06:13:51'),
(37, 'Resource Policy', 'resource-policy', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Resource Video head title\",\"resource_head_subtitle\":\"Resourse video subtitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\"]\",\"resource_video_image\":null,\"resource_video\":null,\"policy_head_title\":\"Policy Head Title\",\"policy_head_subtitle\":\"Policy Head SubTitle\",\"policy_doc_title\":\"[\\\"Policy Title 1\\\",\\\"Policy Title 2\\\"]\",\"policy_doc_icon\":null,\"policy_doc\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-25 07:36:24', '2023-11-25 07:36:24'),
(38, 'Resource Last Testing', 'resource-last-testing', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Resource Banner Bread Crumb Title\",\"about_banner_subtitle\":\"Resource Banner Bread Crumb SubTitle\",\"about_banner_content\":\"<p>Resource Banner Bread Crumb Content<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Resource Video head title\",\"resource_head_subtitle\":\"Resourse video subtitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\"]\",\"resource_video_image\":[\"public\\/pages\\/595641847.png\",\"public\\/pages\\/587837613.png\"],\"resource_video\":null,\"resource_policy_head_title\":\"Policy Head Title\",\"resource_policy_head_subtitle\":\"Policy Head SubTitle\",\"resource_policy_doc_title\":\"[\\\"Policy Title 1\\\",\\\"Policy Title 2\\\"]\",\"resource_policy_doc_icon\":[\"public\\/pages\\/650891439.png\",\"public\\/pages\\/193335029.png\"],\"resource_policy_doc\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-25 08:02:33', '2023-11-29 05:46:05'),
(39, 'Resource testt', 'resource-testt', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Bread Crumb Title\",\"about_banner_subtitle\":\"Sub Title\",\"about_banner_content\":\"<p>Resource Content<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Video Head Title\",\"resource_head_subtitle\":\"Video Head dubtitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\"]\",\"resource_video_image\":\"[\\\"public\\\\\\/pages\\\\\\/604380124.png\\\",\\\"public\\\\\\/pages\\\\\\/664620868.png\\\"]\",\"resource_video\":null,\"resource_policy_head_title\":\"Plocy Head Title\",\"resource_policy_head_subtitle\":\"Policy Head Subtitle\",\"resource_policy_doc_title\":\"[\\\"Policy Title 1\\\",\\\"Policy Title 2\\\"]\",\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":\"Usefuldoc Head Title\",\"resource_document_head_subtitle\":\"Useful doc Head SubTitle\",\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":\"Story Title\",\"resource_story_head_subtitle\":\"Story SubTitle\",\"resource_story_image\":[\"public\\/pages\\/967333588.png\",\"public\\/pages\\/785278385.png\",\"public\\/pages\\/234766112.png\",\"public\\/pages\\/352085722.png\"]}', NULL, 'template_resource', NULL, NULL, '2023-11-27 23:50:19', '2023-11-30 00:18:33'),
(44, 'Donation Final Check', 'donation-final-check', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Donation Form\",\"about_banner_content\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, m<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"donation_who_we_title\":\"Donation\",\"donation_who_we_subtitle\":\"Make an Impact with Your Donation\",\"donation_who_we_content\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, m<\\/p>\",\"donation_who_we_image_1\":\"storage\\/pages\\/6568742134b0b.png\",\"donation_who_we_image_title_1\":\"Donation Icon Title 1\",\"donation_who_we_image_content_1\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, m<\\/p>\",\"donation_who_we_image_2\":\"storage\\/pages\\/6568742137eb7.png\",\"donation_who_we_image_title_2\":\"Donation Icon Title 2\",\"donation_who_we_image_content_2\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, m<\\/p>\"}', NULL, 'template_donation', NULL, NULL, '2023-11-30 06:08:09', '2023-11-30 06:08:09'),
(47, 'Resource Final Testing', 'resource-final-testing', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Resource Banner Bread Crumb Title\",\"about_banner_content\":\"<p>Resource Banner Bread Crumb Content<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":\"Head video head Title\",\"resource_head_subtitle\":\"Head video head SubTitle\",\"resource_video_title\":\"[\\\"video title 1\\\",\\\"video title 2\\\"]\",\"resource_video_image\":[\"storage\\/pages\\/128354878.png\",\"storage\\/pages\\/325712499.png\"],\"resource_video\":null,\"resource_policy_head_title\":\"Policy Head Title\",\"resource_policy_head_subtitle\":\"Policy Head SubTitle\",\"resource_policy_doc_title\":\"[\\\"Policy Title 1\\\",\\\"Policy Title 2\\\"]\",\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":\"Usefuldoc Head Title\",\"resource_document_head_subtitle\":\"Useful doc Head SubTitle\",\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":\"Visual Strory head title\",\"resource_story_head_subtitle\":\"visual story head subtitle\",\"resource_story_image\":[\"storage\\/pages\\/404212582.png\",\"storage\\/pages\\/861203783.png\",\"storage\\/pages\\/676096530.png\"],\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null}', NULL, 'template_resource', NULL, NULL, '2023-11-30 06:42:46', '2023-11-30 06:44:47'),
(48, 'About Us Final Test', 'about-us-final-test', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content\":null,\"team_id\":null,\"core_value_title\":\"Core Values\",\"core_value_content\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, m<\\/p>\",\"core_value_id\":[\"1\",\"2\",\"3\"],\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":\"Donation\",\"donation_subtitle\":\"Donation Subtitle\",\"donation_content\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.<\\/p>\",\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":\"FAQ\",\"faq_subtitle\":\"Frequently Asked Questions\",\"faq_content\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature,<\\/p>\",\"faq_id\":[\"1\",\"3\"],\"about_banner_bread_crumb_title\":\"Banner Bread Crumb Title\",\"about_banner_subtitle\":\"Banner Bread Crumb Sub Title\",\"about_banner_content\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.<\\/p>\",\"about_who_we_banner\":[\"storage\\/pages\\/385420146.png\",\"storage\\/pages\\/403832215.png\",\"storage\\/pages\\/296444489.png\"],\"about_who_we_title\":\"Who We Are\",\"about_who_we_subtitle\":\"Who We Are Subtitle\",\"about_who_we_content\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.<\\/p>\",\"about_who_we_image_1\":\"storage\\/pages\\/65688faea1037.png\",\"about_who_we_image_title_1\":\"Who We Are Icon 1 Title\",\"about_who_we_image_content_1\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, m<\\/p>\",\"about_who_we_image_2\":\"storage\\/pages\\/65688faea3486.png\",\"about_who_we_image_title_2\":\"Who We Icon Icon Title 2\",\"about_who_we_image_content_2\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, m<\\/p>\",\"about_strategic_title\":\"Strategic Priority Title\",\"about_strategic_subtitle\":\"Strategic Priority SubTitle\",\"strategic_priority_id\":[\"2\",\"5\"],\"about_fund_raiser_title\":\"Fund Raiser Title\",\"about_fund_raiser_subtitle\":\"Fund Raiser Subtitle\",\"about_fund_raiser_content\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, m<\\/p>\",\"fund_raiser_id\":[\"3\",\"4\"],\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null}', NULL, 'template_about', NULL, NULL, '2023-11-30 07:40:25', '2023-11-30 08:05:42');
INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `banner`, `page_template`, `meta_key`, `meta_content`, `created_at`, `updated_at`) VALUES
(49, 'Donation', 'donation', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"Home\",\"about_banner_subtitle\":\"Donation Form\",\"about_banner_content\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":\"Donation\",\"donation_who_we_subtitle\":\"Make an Impact with your Donation\",\"donation_who_we_content\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.<\\/p>\",\"donation_who_we_image_1\":\"storage\\/pages\\/656973af00c67.png\",\"donation_who_we_image_title_1\":\"Donation Icon Title 1\",\"donation_who_we_image_content_1\":\"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.<\\/p>\",\"donation_who_we_image_2\":\"storage\\/pages\\/656973af12ff9.png\",\"donation_who_we_image_title_2\":\"Donation Icon Title 2\",\"donation_who_we_image_content_2\":\"<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<\\/p>\",\"registration_title\":null,\"registration_content\":null,\"registration_image\":null,\"registration_image_content\":null}', NULL, 'template_donation', NULL, NULL, '2023-12-01 00:18:31', '2023-12-19 00:51:01'),
(52, 'Leadership Registration', 'leadership-registration', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":\"Welcome\",\"registration_content\":\"<p>Connect with the BNCEP community at conferences, meetups, and hackathons around the world.<\\/p>\",\"registration_image\":\"storage\\/pages\\/657ff674af8bf.jpg\",\"registration_image_content\":\"<h1>\\\"Fostering connections with individuals and organizations that share common goals and values<\\/h1>\\r\\n<div class=\\\"title__wrapp\\\">\\r\\n<h3>Annette Black<\\/h3>\\r\\n<p>BNCEP Academy<\\/p>\\r\\n<\\/div>\"}', NULL, 'template_leadership_registration', NULL, NULL, '2023-12-01 04:02:02', '2023-12-18 02:06:20'),
(53, 'Register', 'register', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":\"Welcome\",\"registration_content\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged<\\/p>\",\"registration_image\":\"storage\\/pages\\/6569c738aa82e.png\",\"registration_image_content\":\"<p>\\\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged<\\/p>\\r\\n<h2>Eon Morgan<\\/h2>\\r\\n<p>BNCEP Academy<\\/p>\"}', NULL, 'template_register', NULL, NULL, '2023-12-01 06:14:56', '2023-12-18 23:32:49'),
(54, 'Mobilizer Registration', 'mobilizer-registration', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":\"BNCEP Mobilizer Registration Bread Crumb Title\",\"about_banner_subtitle\":\"BNCEP Mobilizer Registration Bread Crumb Sub Title\",\"about_banner_content\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged<\\/p>\",\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":\"Welcome\",\"registration_content\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged<\\/p>\",\"registration_image\":\"storage\\/pages\\/6569c79c2cd17.png\",\"registration_image_content\":\"<h1>\\\"Fostering connections with individuals and organizations that share common goals and values<\\/h1>\\r\\n<div class=\\\"title__wrapp\\\">\\r\\n<h3>Annette Black<\\/h3>\\r\\n<p>BNCEP Academy<\\/p>\\r\\n<\\/div>\"}', NULL, 'template_mobilizer_registration', NULL, NULL, '2023-12-01 06:16:36', '2023-12-18 02:51:59'),
(55, 'Login', 'login', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":\"Welcome\",\"registration_content\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged<\\/p>\",\"registration_image\":\"storage\\/pages\\/6569c8198cf38.png\",\"registration_image_content\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged<\\/p>\"}', NULL, 'template_login', NULL, NULL, '2023-12-01 06:18:41', '2023-12-19 00:05:26'),
(56, 'Registerr', 'registerr', '{\"page_content\":null,\"banner_slider_id\":null,\"who_we_title\":null,\"who_we_subtitle\":null,\"who_we_content_title_1\":null,\"who_we_content_1\":null,\"who_we_content_title_2\":null,\"who_we_content_2\":null,\"team_id\":null,\"core_value_title\":null,\"core_value_subtitle\":null,\"core_value_content\":null,\"core_value_id\":null,\"program_title\":null,\"program_subtitle\":null,\"program_id\":null,\"member_title\":null,\"member_subtitle\":null,\"member_content\":null,\"member_benefit_id\":null,\"membership_title\":null,\"membership_subtitle\":null,\"membership_content\":null,\"membership_plan_id\":null,\"event_title\":null,\"event_subtitle\":null,\"event_id\":null,\"donation_title\":null,\"donation_subtitle\":null,\"donation_content\":null,\"blog_title\":null,\"blog_subtitle\":null,\"blog_id\":null,\"faq_title\":null,\"faq_subtitle\":null,\"faq_content\":null,\"faq_id\":null,\"about_banner_bread_crumb_title\":null,\"about_banner_subtitle\":null,\"about_banner_content\":null,\"about_who_we_banner\":null,\"about_who_we_title\":null,\"about_who_we_subtitle\":null,\"about_who_we_content\":null,\"about_who_we_image_1\":null,\"about_who_we_image_title_1\":null,\"about_who_we_image_content_1\":null,\"about_who_we_image_2\":null,\"about_who_we_image_title_2\":null,\"about_who_we_image_content_2\":null,\"about_strategic_title\":null,\"about_strategic_subtitle\":null,\"strategic_priority_id\":null,\"about_fund_raiser_title\":null,\"about_fund_raiser_subtitle\":null,\"about_fund_raiser_content\":null,\"fund_raiser_id\":null,\"contact_title\":null,\"contact_subtitle\":null,\"contact_content\":null,\"contact_mobile_no\":null,\"contact_email\":null,\"register_title\":null,\"event_list_title\":null,\"event_list_subtitle\":null,\"event_list_id\":null,\"program_list_title\":null,\"program_list_subtitle\":null,\"program_list_id\":null,\"blog_list_title\":null,\"blog_list_subtitle\":null,\"blog_list_id\":null,\"resource_head_title\":null,\"resource_head_subtitle\":null,\"resource_video_title\":null,\"resource_video_image\":null,\"resource_video\":null,\"resource_policy_head_title\":null,\"resource_policy_head_subtitle\":null,\"resource_policy_doc_title\":null,\"resource_policy_doc_icon\":null,\"resource_policy_doc\":null,\"resource_document_head_title\":null,\"resource_document_head_subtitle\":null,\"resource_document_doc_title\":null,\"resource_document_doc_icon\":null,\"resource_document_doc\":null,\"resource_story_head_title\":null,\"resource_story_head_subtitle\":null,\"resource_story_image\":null,\"donation_who_we_title\":null,\"donation_who_we_subtitle\":null,\"donation_who_we_content\":null,\"donation_who_we_image_1\":null,\"donation_who_we_image_title_1\":null,\"donation_who_we_image_content_1\":null,\"donation_who_we_image_2\":null,\"donation_who_we_image_title_2\":null,\"donation_who_we_image_content_2\":null,\"registration_title\":\"welcome\",\"registration_content\":\"<p>lorem<\\/p>\",\"registration_image\":null,\"registration_image_content\":null}', NULL, 'template_register', NULL, NULL, '2023-12-19 00:01:16', '2023-12-19 00:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `organizer_name` varchar(255) DEFAULT NULL,
  `from_date` varchar(150) DEFAULT NULL,
  `to_date` varchar(120) DEFAULT NULL,
  `program_date` timestamp NULL DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `program_type` enum('Free Program','Paid Program') DEFAULT NULL,
  `num_of_seat` varchar(255) DEFAULT NULL,
  `is_guest` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `slug`, `short_description`, `long_description`, `image`, `organizer_name`, `from_date`, `to_date`, `program_date`, `price`, `location`, `program_type`, `num_of_seat`, `is_guest`, `created_at`, `updated_at`) VALUES
(1, 'Program 1', 'program-1', '<p>Charity refers to the act of voluntarily giving assistance, support, or resources to those in need or to organizations</p>', '<h2>About this event</h2>\r\n<p>If you have questions, concerns, or suggestions regarding our privacy policy, we can be reached using the contact information on our &ldquo;Contact Us&rdquo; page or at privacy@BNCEP.com</p>\r\n<p>In certain cases, you may have the ability to view or edit your personal information online. In the event your information is not accessible online and you wish to obtain a copy of particular information you provided to us, or if you become aware the information is incorrect and you would like us to correct it, please contact us immediately</p>\r\n<p>Before we are able to provide you with any information or correct any inaccuracies, however, we may ask you to verify your identity and to provide other details to ascertain your identity and to help us to respond to your request. We will contact you within 30 days of your request</p>\r\n<h2>About the speaker</h2>\r\n<p>If you have questions, concerns, or suggestions regarding our privacy policy, we can be reached using the contact information on our &ldquo;Contact Us&rdquo; page or at privacy@BNCEP.com</p>\r\n<p>In certain cases, you may have the ability to view or edit your personal information online. In the event your information is not accessible online and you wish to obtain a copy of particular information you provided to us, or if you become aware the information is incorrect and you would like us to correct it, please contact us immediately.</p>', '65561063b61b4.png', 'Microsoft', '10:00 AM', '03:00 AM', '2023-11-17 18:30:00', 599.00, 'Saltlake', 'Paid Program', '20', 1, '2023-11-16 07:21:47', '2024-01-04 06:42:10'),
(2, 'Program 2', 'program-2', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>', '655610d471eff.png', 'IBM', '12:00 PM', '12:00 PM', '2023-11-23 18:30:00', 699.00, 'City Center', 'Free Program', '10', 0, '2023-11-16 07:23:40', '2024-01-04 06:42:12'),
(3, 'Program 3', 'program-3', '<p>Charity refers to the act of voluntarily giving assistance, support, or resources to those in need or to organizations</p>', '<h2>About this event</h2>\r\n<p>If you have questions, concerns, or suggestions regarding our privacy policy, we can be reached using the contact information on our &ldquo;Contact Us&rdquo; page or at privacy@BNCEP.com</p>\r\n<p>In certain cases, you may have the ability to view or edit your personal information online. In the event your information is not accessible online and you wish to obtain a copy of particular information you provided to us, or if you become aware the information is incorrect and you would like us to correct it, please contact us immediately</p>\r\n<p>Before we are able to provide you with any information or correct any inaccuracies, however, we may ask you to verify your identity and to provide other details to ascertain your identity and to help us to respond to your request. We will contact you within 30 days of your request</p>\r\n<h2>About the speaker</h2>\r\n<p>If you have questions, concerns, or suggestions regarding our privacy policy, we can be reached using the contact information on our &ldquo;Contact Us&rdquo; page or at privacy@BNCEP.com</p>\r\n<p>In certain cases, you may have the ability to view or edit your personal information online. In the event your information is not accessible online and you wish to obtain a copy of particular information you provided to us, or if you become aware the information is incorrect and you would like us to correct it, please contact us immediately.</p>', '6556127b8c8f1.png', 'TCS', '10:30 AM', '02:00 AM', '2023-11-23 18:30:00', NULL, 'City Center', 'Free Program', '26', 1, '2023-11-16 07:30:43', '2024-01-11 00:06:26'),
(4, 'Program 4', 'program-4', NULL, NULL, '65966da952ad3.png', 'XYZ', '07:30 AM', '00:00 AM', '2024-01-09 18:30:00', 150.00, 'Saltlake', 'Paid Program', '20', 1, '2024-01-02 06:22:25', '2024-01-04 06:42:18'),
(5, 'Program 5', 'program-5', NULL, NULL, '65966dbb9be0f.png', 'Oren Swanson', '00:00 AM', '00:00 AM', '2024-01-05 18:30:00', NULL, 'South Dum Dum', 'Free Program', '30', 1, '2024-01-02 06:29:01', '2024-01-04 06:42:22'),
(6, 'Program 6', 'program-6', NULL, NULL, '659667187bd9c.png', 'Gerad', '00:00 AM', '00:00 AM', '2024-01-17 18:30:00', 50.00, 'Kolkata', 'Paid Program', '40', 1, '2024-01-03 02:08:31', '2024-01-04 06:42:24'),
(7, 'Prgram 7', 'prgram-7', NULL, NULL, '65966de175c17.png', 'Json Makkhi', '02:00 AM', '00:00 AM', '2024-01-02 18:30:00', NULL, 'Saltlake', 'Free Program', '30', 0, '2024-01-03 07:01:06', '2024-01-04 06:42:27'),
(8, 'Program 8', 'program-8', NULL, NULL, '65966df5cd6aa.png', 'Akinson', '10:00 AM', '00:00 AM', '2024-01-15 18:30:00', NULL, 'Kolkata', 'Free Program', '40', 0, '2024-01-03 07:13:08', '2024-01-04 23:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-10-04 18:55:37', '2023-10-04 18:55:37'),
(2, 'User', '2023-10-04 18:55:37', '2023-10-04 18:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `service_areas`
--

CREATE TABLE `service_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_areas`
--

INSERT INTO `service_areas` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Service Area 1', 'service-area-1', '2023-12-18 05:15:09', '2023-12-18 05:15:09'),
(2, 'Service Area 2', 'service-area-2', '2023-12-18 05:15:15', '2023-12-18 05:15:15'),
(4, 'Service Area 3', 'service-area-3', '2023-12-18 05:23:45', '2023-12-18 05:23:45'),
(5, 'Service Area 4', 'service-area-4', '2023-12-18 05:23:51', '2023-12-18 05:23:51'),
(6, 'Service Area 5', 'service-area-5', '2023-12-18 05:23:57', '2023-12-18 05:23:57'),
(7, 'Service Area 6', 'service-area-6', '2023-12-18 05:24:05', '2023-12-18 05:24:05'),
(8, 'Service Area 7', 'service-area-7', '2023-12-18 05:26:50', '2023-12-18 05:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'BNCEP', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(2, 'site_logo', '1701695185_logo.png', '2023-12-03 18:30:00', '2023-12-04 07:36:25'),
(3, 'favicon', '1704892060_favicon.png', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(4, 'site_email', 'contact@bncep@gmail.com', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(5, 'site_mobile', '+1 1234568930', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(6, 'footer_text', 'BNCEP. All Rights Reserved.', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(7, 'copyright_text', NULL, '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(8, 'meta_title', NULL, '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(9, 'meta_keyword', NULL, '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(10, 'meta_description', 'hi', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(11, 'facebook_link', 'https://www.facebook.com/', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(12, 'instagram_link', 'https://www.youtube.com/', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(13, 'twitter_link', 'https://twitter.com/login', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(14, 'youtube_link', 'https://www.youtube.com/', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(15, 'footer_logo', '1702034126_logo.png', '2023-12-03 18:30:00', '2023-12-08 05:45:26'),
(16, 'subscribe_title', 'Sign Up To Get The Latest News', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(17, 'subscribe_subtitle', 'Subscribe Newsletter', '2023-12-03 18:30:00', '2024-01-10 07:37:40'),
(18, 'site_description', 'Charity refers to the act of voluntarily giving assistance, support, or resources to those in need or to organizations dedicated to helping others. It is an altruistic act that aims to improve the well-being and lives of individuals.', '2023-12-07 18:30:00', '2024-01-10 07:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `strategic_priorities`
--

CREATE TABLE `strategic_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `strategic_priorities`
--

INSERT INTO `strategic_priorities` (`id`, `title`, `slug`, `sub_title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Stratigic Priority 1', 'stratigic-priority-1', 'Gain new local customer', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>', '655c5573211ce.png', '2023-11-21 01:30:04', '2023-11-21 01:30:04'),
(2, 'Strategic Priority 1', 'strategic-priority-1', NULL, '{\"sub_title_1\":\"What is Lorem Ipsum?\",\"content_1\":\"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged<\\/p>\",\"sub_title_2\":\"Where does it come from?\",\"content_2\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,<\\/p>\"}', NULL, '2023-11-21 02:04:49', '2023-11-21 02:04:49'),
(3, 'See our top categories', 'see-our-top-categories', NULL, '{\"sub_title\":[\"subtitle 1\",\"subtitle 2\",\"subtitle 3\"],\"content\":[\"<p>content 1<\\/p>\",\"content 2\",\"content 3\"]}', NULL, '2023-11-21 04:16:49', '2023-11-21 04:16:49'),
(4, 'Strategic Priority', 'strategic-priority', NULL, '{\"sub_title_1\":\"Sub Title 101\",\"content_1\":\"<p>Sub Title 101<\\/p>\",\"sub_title_2\":\"Sub Title 201\",\"content_2\":\"<p>Content 201<\\/p>\"}', NULL, '2023-11-21 04:41:50', '2023-11-21 04:56:08'),
(5, 'Strategic Priority 3', 'strategic-priority-3', NULL, '{\"sub_title_1\":\"Strategic Priority 3 Sub Title 1\",\"content_1\":\"<p>Strategic Priority 3 Content 1<\\/p>\",\"sub_title_2\":\"Strategic Priority 3 Sub Title 2\",\"content_2\":\"<p>Strategic Priority 3 Content 2<\\/p>\"}', NULL, '2023-11-21 04:57:07', '2023-11-21 04:58:17'),
(6, 'Strategic Priority 4', 'strategic-priority-4', NULL, '{\"sub_title_1\":null,\"content_1\":null,\"sub_title_2\":null,\"content_2\":null}', NULL, '2023-11-21 04:58:53', '2023-11-21 04:58:53'),
(7, 'Sit molestias archit', 'sit-molestias-archit', NULL, '{\"sub_title_1\":null,\"content_1\":null,\"sub_title_2\":null,\"content_2\":null}', '655c91a547c0b.png', '2023-11-21 05:45:56', '2023-11-21 05:46:53'),
(8, 'Strategic Priority New', 'strategic-priority-new', NULL, '{\"sub_title\":null,\"content\":[\"<p>Content 1<\\/p>\",\"Content 2\",\"Content 3\",\"Content 4\"]}', NULL, '2023-11-24 02:06:24', '2023-11-24 02:06:24'),
(9, 'Strategic Priority 123', 'strategic-priority-123', NULL, '{\"subtitle\":[\"SubTitle\",\"SubTitle 2\",\"subtitle 101\"],\"content\":[\"<p>Content&nbsp;<\\/p>\",\"<p>Content 2<\\/p>\",\"content101\"]}', NULL, '2023-11-24 02:09:29', '2023-11-24 06:22:57'),
(10, 'Strategic Priority Test', 'strategic-priority-test', NULL, '{\"subtitle\":[\"SubTitle 1\",\"SubTitle 2\"],\"content\":[\"<p>Content 1<\\/p>\",\"Content 2\"]}', NULL, '2023-11-24 06:43:16', '2023-11-24 06:43:16'),
(11, 'Strategic Priority Final Test', 'strategic-priority-final-test', NULL, '{\"subtitle\":[\"SubTitle 1\",\"SubTitle 2\",\"SubTitle 3\"],\"content\":[\"<p>Content 1<\\/p>\",\"Content 2\",\"Content 3\"]}', NULL, '2023-11-25 00:51:26', '2023-11-25 00:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Team 1', '656db4368c63f.png', '2023-11-13 18:21:43', '2023-12-04 05:42:54'),
(2, 'Team 2', '656db6e9d7ee0.png', '2023-11-13 18:21:59', '2023-12-04 05:54:25'),
(3, 'Team 3', '656db45a84505.png', '2023-12-04 05:43:30', '2023-12-04 05:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `membership_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `service_area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `resource_id` varchar(255) DEFAULT NULL,
  `refer_by` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `fullname`, `username`, `email`, `password`, `mobile_number`, `profile_picture`, `role_id`, `membership_plan_id`, `role_name`, `service_area_id`, `resource_id`, `refer_by`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Wilkinson', NULL, 'Zella Kub MD', 'admin@admin.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1458968598', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-05 07:32:48', 'gOgcAN19fVJuNBN62mHhxagycd5jaad40RQVJfEhDSmblTShS2XpNIBEXrRf', '2024-01-05 07:32:48', '2024-01-10 07:37:47'),
(2, 'User', 'Bergstrom', NULL, 'Cordelia Gislason', 'user@mailinator.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(325) 285-2018', 'https://via.placeholder.com/200x200.png/001177?text=consequatur', 2, NULL, NULL, NULL, NULL, NULL, '2024-01-05 07:32:48', 'NlNOaeAvf5', '2024-01-05 07:32:48', '2024-01-05 07:32:48'),
(3, 'Json', 'McGlynn', 'Json McGlynn', 'Maggie Dietrich Sr.', 'sourav@mailinator.com', '$2y$10$VWfcX1lypNxLkzLFPAr0A.icRoYajczxRSHZrg3yXABIwD0p8qxGG', '1256485968', '659cd2b8eac0c.png', 2, 1, 'Founder, Orange Child Foundation', NULL, NULL, NULL, '2024-01-05 07:32:48', 'hjZbtS78aMFBPKETxDieAaB13EdKukjfGawRHRIkfVX4KqWjUu9MCE0FALrO', '2024-01-05 07:32:48', '2024-01-10 03:08:07'),
(4, 'Json', 'Konopelski', 'Json Konopelski', 'Miracle Lebsack', 'dipto@mailinator.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7897896859', '659beaed5f847.png', 2, 1, 'Founder, Green Child Foundation', NULL, NULL, NULL, '2024-01-05 07:32:48', 'fAEKujpude', '2024-01-05 07:32:48', '2024-01-08 07:00:37'),
(12, 'Mat', 'Henry', 'Mat Henry', NULL, 'sam@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1234567890', '659b9cd25c6e3.png', 2, 2, 'Founder, Yellow Child Foundation', 2, NULL, NULL, NULL, NULL, '2024-01-08 00:05:37', '2024-01-08 01:27:22'),
(13, 'Mercedes', 'Wiley', 'Mercedes Wiley', NULL, 'masak@mailinator.com', '$2y$10$cGYAItsHf0XavmHKjL1G6.XPoSHfvUuCNRLbQiYWibwipN.jlGC4q', '', NULL, 2, 3, 'Founder, Red Child Foundation', 4, NULL, 4, NULL, NULL, '2024-01-09 00:58:11', '2024-01-09 00:58:11'),
(14, 'Oliver', 'Girud', 'Oliver Girud', NULL, 'oliver@gmail.com', '$2y$10$jmiDnGbTVFDkLbsmMDJOiuiSZPew1zX7Os0ThgmYmB9M2YEXeYwUe', '', NULL, 2, 1, 'Athlatic', 1, NULL, NULL, NULL, NULL, '2024-01-10 02:19:42', '2024-01-10 02:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `about_your_self` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `other_contact_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `about_education` text DEFAULT NULL,
  `name_of_company` varchar(255) DEFAULT NULL,
  `company_turn_over` varchar(255) DEFAULT NULL,
  `number_of_employee` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `organization_size` varchar(255) DEFAULT NULL,
  `organization_budget` varchar(255) DEFAULT NULL,
  `focus_area` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `dob`, `about_your_self`, `city`, `country`, `other_contact_number`, `address`, `university_name`, `college_name`, `about_education`, `name_of_company`, `company_turn_over`, `number_of_employee`, `organization_name`, `organization_size`, `organization_budget`, `focus_area`, `created_at`, `updated_at`) VALUES
(4, 12, '01/01/1999', 'Paragraphs play a fundamental role in organizing and presenting written content. ', 'Kolkata', 'India', '8596858569', 'India', 'University of Southern California', 'CUNY Baruch College', NULL, 'ABCD', '25000', '20', 'ECB', '120', '360', 'Test Focus Area', '2024-01-07 18:35:37', '2024-01-08 02:46:18'),
(5, 4, '01/02/1970', 'Paragraphs play a fundamental role in organizing and presenting written content. ', 'Kolkata', 'India', '7985996996', '4517 Washington Ave. Manchester', 'University of London', 'CUNY Baruch College', NULL, 'CM', '1500', '50', 'IT', NULL, NULL, NULL, '2024-01-08 06:52:49', '2024-01-08 06:58:02'),
(6, 13, NULL, 'Paragraphs play a fundamental role in organizing and presenting written content. ', NULL, NULL, NULL, 'Uk', 'Calcutta', 'Techno India', NULL, 'PCS', '5000', '100', 'Marsh Wagner Co', 'Ewing Meyer Trading', 'Frazier Byrd Co', 'Aut similique provid', '2024-01-09 00:58:12', '2024-01-09 05:37:04'),
(7, 3, '01/01/1980', 'Paragraphs play a fundamental role in organizing and presenting written content. They serve as building blocks that help convey ideas and arguments in a coherent and structured manner. With their distinct beginnings and endings, paragraphs provide a visual break and aid in the readability and comprehension of text. Let\'s explore this important aspect of writing in eight concise paragraphs. Paragraphs play a fundamental role in organizing and presenting written content. They serve as building blocks that help convey ideas and arguments in a coherent and structured manner. With their distinct beginnings and endings, paragraphs provide a visual break and aid in the readability and comprehension of text. Let\'s explore this important aspect of writing in eight concise paragraphs.', 'California', 'Calexico', '7895868596', NULL, 'Abc University', 'Zyx College', 'Master of Technology (M.Tech), Reliability & Operations Research', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 01:09:03', '2024-01-10 01:19:41'),
(8, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABC', '200', '3000', 'TEST', '2024-01-10 02:19:42', '2024-01-10 02:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `bread_crumb_title` varchar(255) DEFAULT NULL,
  `bread_crumb_subtitle` varchar(255) DEFAULT NULL,
  `bread_crumb_content` varchar(255) DEFAULT NULL,
  `widget_type` enum('banner_widget') DEFAULT 'banner_widget',
  `banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `slug`, `bread_crumb_title`, `bread_crumb_subtitle`, `bread_crumb_content`, `widget_type`, `banner`, `created_at`, `updated_at`) VALUES
(3, 'Event Details', 'event-details', 'Home', 'Events', '<p>Connect with the BNCEP community at conferences, meetups, and hackathons around the world.</p>', 'banner_widget', '655f4b4a6217d.png', '2023-11-23 07:23:30', '2023-12-28 00:36:51'),
(4, 'Program Details', 'program-details', 'Home', 'Programs', '<p>Connect with the BNCEP community at conferences, meetups, and hackathons around the world.</p>', 'banner_widget', NULL, '2023-11-23 07:23:59', '2023-12-28 02:33:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_membership_plan_id_foreign` (`membership_plan_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_values`
--
ALTER TABLE `core_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- Indexes for table `event_membership`
--
ALTER TABLE `event_membership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_membership_event_id_foreign` (`event_id`),
  ADD KEY `event_membership_membership_plan_id_foreign` (`membership_plan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_raisers`
--
ALTER TABLE `fund_raisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_templates_name_unique` (`name`),
  ADD UNIQUE KEY `mail_templates_slug_unique` (`slug`);

--
-- Indexes for table `membership_plans`
--
ALTER TABLE `membership_plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `membership_plans_slug_unique` (`slug`);

--
-- Indexes for table `membership_program`
--
ALTER TABLE `membership_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_program_program_id_foreign` (`program_id`),
  ADD KEY `membership_program_membership_plan_id_foreign` (`membership_plan_id`);

--
-- Indexes for table `member_ships`
--
ALTER TABLE `member_ships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_ships_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_title_unique` (`title`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD UNIQUE KEY `pages_meta_key_unique` (`meta_key`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_areas`
--
ALTER TABLE `service_areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_areas_name_unique` (`name`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strategic_priorities`
--
ALTER TABLE `strategic_priorities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `strategic_priorities_slug_unique` (`slug`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_membership_plan_id_foreign` (`membership_plan_id`),
  ADD KEY `users_service_area_id_foreign` (`service_area_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `widgets_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `core_values`
--
ALTER TABLE `core_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `event_membership`
--
ALTER TABLE `event_membership`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fund_raisers`
--
ALTER TABLE `fund_raisers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `membership_plans`
--
ALTER TABLE `membership_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `membership_program`
--
ALTER TABLE `membership_program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `member_ships`
--
ALTER TABLE `member_ships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_areas`
--
ALTER TABLE `service_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `strategic_priorities`
--
ALTER TABLE `strategic_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD CONSTRAINT `admin_menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_membership_plan_id_foreign` FOREIGN KEY (`membership_plan_id`) REFERENCES `membership_plans` (`id`);

--
-- Constraints for table `event_membership`
--
ALTER TABLE `event_membership`
  ADD CONSTRAINT `event_membership_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_membership_membership_plan_id_foreign` FOREIGN KEY (`membership_plan_id`) REFERENCES `membership_plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `membership_program`
--
ALTER TABLE `membership_program`
  ADD CONSTRAINT `membership_program_membership_plan_id_foreign` FOREIGN KEY (`membership_plan_id`) REFERENCES `membership_plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `membership_program_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `member_ships`
--
ALTER TABLE `member_ships`
  ADD CONSTRAINT `member_ships_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `member_ships` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_membership_plan_id_foreign` FOREIGN KEY (`membership_plan_id`) REFERENCES `membership_plans` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_service_area_id_foreign` FOREIGN KEY (`service_area_id`) REFERENCES `service_areas` (`id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
